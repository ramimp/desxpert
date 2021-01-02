<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	private $client_id      = 'QoBZf3VVR9maIROLMSwSQ';
	private $client_secret 	= 'JAqraOpxsYneTB4eW1cU8lT7CHP4Bwya';
	private $redirect_uri   = 'https://desxpert.com/checkout/generate_token';

	private $paypalClientID = 'AYgCsiTCoE-b3wytnLL0jGyiMumO_21eRVwGJ778mQV61GdD_MYQplUejW27fXCqaQ9Rs5pcfIbFz9T-';
	private $paypalSecret   = 'EFHgVfkRQCjHoy3e-2_SHuXVatk5ZBEw9GCMw7LpRduzVENsGSHXxKcJEPLc8z12_kTtK3UnxzTRAOIi';	


	function __construct()
    { 
        parent::__construct();
        $this->load->library('zoom');
		

        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'errorpage');
        }

        $this->load->model('professional_model');
        $this->load->model('checkout_model');
        $this->load->model('booking_model');
		date_default_timezone_set('Asia/Manila');

    }

    //Clean Input
	private function clean_input($data = null) 
	{
		if($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		else
			redirect(base_url().'errorpage');
		
	}

	//Load Request Booking page
    public function prof($param = null)
	{
		if($param)
		{
			$data['userData'] = $this->session->userdata('userData');
			$data['userData']['title'] = 'DesxPert | Checkout';
			$data['userData']['background'] = true;
			$arr_param 		 = explode('.', $param);
			$prof_id   		 = $arr_param[0];
			$bkn_id    		 = base64_decode($arr_param[1]);
			$data['prof'] 	 = $this->professional_model->get_professionals($prof_id);
			$data['booking'] = $this->booking_model->check_book_now($bkn_id);
			if($data['booking'])
			{
				if($data['prof'])
				{
					$this->load->view('user/_header', $data);
		        	$this->load->view('user/checkout', $data);
		        	$this->load->view('user/_footer', $data);
				}
				else
				{
					redirect(base_url().'errorpage');
				}
			}
			else
			{
				redirect(base_url().'errorpage');
			}
			
			
		}
		else
		{
			redirect(base_url().'errorpage');	
		}
	}
	
    //VALIDATE PAYPAL PAYMENT ID
    public function paypal_validate()
    {	
    	if(isset($_POST['payment_id']))
    	{
    		$payment_id = $this->clean_input($this->input->post('data1'));

	    	$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.paypal.com/v1/oauth2/token');
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_USERPWD, $this->paypalClientID.":".$this->paypalSecret);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
			$response = curl_exec($ch);
			curl_close($ch);
			if(empty($response)){
				echo "failed";
				exit();
			}else{
				$jsonData = json_decode($response);
				$curl = curl_init('https://api.sandbox.paypal.com/v1/payments/payment/'.$payment_id);
				curl_setopt($curl, CURLOPT_POST, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					'Authorization: Bearer ' . $jsonData->access_token,
					'Accept: application/json',
					'Content-Type: application/xml'
				));
				$response = curl_exec($curl);
				curl_close($curl);

				//transaction details
				$result = json_decode($response);
				
				
				if($result && $result->state == 'approved') 
				{	
					$oauth_uid     = $this->session->userdata['userData']['oauth_uid'];
					$booking_id    = $this->clean_input($this->input->post('data2'));
					$check_booking = $this->checkout_model->check_booking_for_checkout($oauth_uid, $booking_id);
					if($check_booking)
					{
						$payment_data = array(
							'booking_id' 	=> $booking_id,
							'transaction_id'=> $payment_id,
							'payment_type'	=> $this->input->post('payment_type'),
							'payment_amount'=> $this->input->post('total_amount'),
							'payment_status'=> 'Approved',
						);
						$payment = $this->checkout_model->create_payment($payment_data);
						if($payment)
						{
							echo 'https://zoom.us/oauth/authorize?response_type=code&client_id='.$this->client_id.'&state='.$payment_id.'&redirect_uri='.urlencode($this->redirect_uri);
						}
						else
						{
							echo "failed_payment";
						}
					}
					
				}else {
					echo 'failed_payment';
				}
			}
    	}
    	else
    	{
    		redirect(base_url().'errorpage');
    	}
    	
    }
	
	//GENERATE ZOOM TOKEN
	public function generate_token()
	{
		if(isset($_GET['code']) && isset($_GET['state']))
		{
			$this->load->view('user/working');
			$booking_details = $this->checkout_model->check_booking_exists($_GET['state']);
			if($booking_details)
			{
				try 
				{
				    $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
				    $response = $client->request('POST', '/oauth/token', [
				        "headers" => [
				            "Authorization" => "Basic ". base64_encode($this->client_id.':'.$this->client_secret)
				        ],
				        'form_params' => [
				            "grant_type" => "authorization_code",
				            "code" => $_GET['code'],
				            "redirect_uri" => $this->redirect_uri
				        ],
				    ]);
				    $token 		= json_decode($response->getBody()->getContents(), true);
				   	$zoom_info 	= $this->create_meeting($token['access_token'], $booking_details[0]->start_date, $booking_details[0]->duration);
				   	if($zoom_info)
				   	{
					   if($this->checkout_model->update_booking($_GET['state'], $zoom_info))
					   {
						   	$prof_id   	= $booking_details[0]->professional_id;
						   	$prof 		= $this->professional_model->get_professionals($this->input->post('prof_id'));
							$phone 		= $prof[0]->phone;
							$fullname 	= $prof[0]->fname . ' ' . $prof[0]->lname;
							
							if($prof[0]->prof_type == "Lawyer")
								$suffix = "Atty.";
							else if($prof[0]->prof_type == "Doctor")
								$suffix = "Dr.";
							else
								$suffix = "Engr.";
			
							$sms = $this->send_sms($phone, $fullname, $suffix, $zoom_info['str_url']);
							if($sms)
							{
								redirect(base_url() . 'user/bookings');
							}
							else
							{
								echo "false_sms";
							}
					   }
					   else
					   {
						   echo "false_zoom";
					   }
				   	}
				   	
				} 
				catch(Exception $e) 
				{
				    echo $e->getMessage();
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			redirect(base_url() . 'errorpage');
		}
	}

    //CREATING MEETING IN ZOOM
	private function create_meeting($token, $str_time, $duration) 
	{
		$client = new GuzzleHttp\Client(['base_uri' => 'https://api.zoom.us']);
	    $accessToken = $token;
	    try 
	    {
	        $response = $client->request('POST', '/v2/users/me/meetings', [
	            "headers" => [
	                "Authorization" => "Bearer $accessToken"
	            ],
	            'json' => [
	                "topic" => "Online Consultation",
	                "type" => 2,
	                "start_time" => $str_time,
	                "duration" => $duration,
	                "password" => $this->generate_zoom_pass()
	            ],
	        ]);
	 
	        $data = json_decode($response->getBody());
	        $arr = array(
				'meeting_id'	=> $data->id,
				'meeting_pass'  => $data->password,
	        	'join_url' 		=> $data->join_url,
				'str_url' 		=> $data->start_url
		    );
	        return $arr;
	 
	    } 
	    catch(Exception $e) 
	    {
	        if( 401 == $e->getCode() ) 
	        {
	            $refresh_token = $token;
	 
	            $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
	            $response = $client->request('POST', '/oauth/token', [
	                "headers" => [
	                    "Authorization" => "Basic ". base64_encode($this->client_id.':'.$this->client_secret)
	                ],
	                'form_params' => [
	                    "grant_type" => "refresh_token",
	                    "refresh_token" => $refresh_token
	                ],
	            ]);

				$token 		= json_decode($response->getBody()->getContents(), true);
			   	$zoom_info 	= $this->create_meeting($token['refresh_token']);
				
	        } else {
	            echo $e->getMessage();
	        }
	    }
	}
	
	//Generate zoom pass
	private function generate_zoom_pass()
	{
		$random_numbers = [];
        $zoom_pass = "";
        while(count($random_numbers) < 7)
		{
            do  
			{
				$random_number = floor(mt_rand(1,9));    
            } 
			while (in_array($random_number, $random_numbers));
            $random_numbers[] = $random_number;
            $zoom_pass .= $random_number;
        }

        return $zoom_pass;
	}
	
	//SENDING SMS
	private function send_sms($to, $fullname, $suffix, $link)
	{
		$shortcode = "21587369";
		$access_token = "9oIkcKV9k_ucW3mF8NFIBKJ8Nzb4puVa2x-jspjdPk4";
		$address = $to;
		$clientCorrelator = "264801";
		$message = "Hello " . $suffix . ' ' . $fullname . " your zoom link is: " . $link;

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://devapi.globelabs.com.ph/smsmessaging/v1/outbound/".$shortcode."/requests?access_token=".$access_token ,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "{\"outboundSMSMessageRequest\": { \"clientCorrelator\": \"".$clientCorrelator."\", \"senderAddress\": \"".$shortcode."\", \"outboundSMSTextMessage\": {\"message\": \"".$message."\"}, \"address\": \"".$address."\" } }",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json"
		  ),
		));
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		if ($err) {
		  return false;
		} else {
		  return true;
		}
	}


	private function send_email()
	{
		
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	function __construct()
    { 
        parent::__construct();
        $this->load->library('zoom');
		

        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'errorpage');
        }

        $this->load->model('professional_model');
        $this->load->model('booking_model');
        $this->load->helper(array('form', 'url'));
		date_default_timezone_set('Asia/Manila');

    }

    //Generate otp
    private function generate_bkn_id()
    {
        $random_numbers = [];
        $bkn_id = "";
        while(count($random_numbers) < 6){
            do  {
                $random_number = floor(mt_rand(1,9));    
            } while (in_array($random_number, $random_numbers));
            $random_numbers[] = $random_number;
            $bkn_id .= $random_number;
        }

        return $bkn_id;
    }

	//Load Request Booking page for user
    public function request($prof_id = null)
	{	

		if($prof_id)
		{
			$data['userData'] = $this->session->userdata('userData');
			$data['userData']['title'] = 'DesxPert | Request Booking';
			$data['userData']['background'] = true;
			$data['tom'] = date('m/d/Y', strtotime(' +1 day'));
			$data['prof'] = $this->professional_model->get_professionals($prof_id);
		    $data['time'] = $this->check_sched($data['tom'], $prof_id, "return");
			
			if($data['prof'])
			{
				$this->load->view('user/_header', $data);
	        	$this->load->view('user/request_booking', $data);
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

	//Check professional schedule
	public function check_sched($date, $prof_id, $action)
	{
		$date = date('Y-m-d', strtotime($date));
		$prof = $this->booking_model->check_professional($prof_id);

		if($prof)
		{
			if(date("l", strtotime($date)) != "Sunday")
			{
				$oauth_pid 	= $prof[0]->oauth_pid;
				$oauth_uid 	= $this->session->userdata['userData']['oauth_uid'];;
				$open_time 	= strtotime("08:00");
			    $close_time = strtotime("17:00");
				$output 	= "";
				$bool 		= true;
				$check 		= "";

				for( $i=$open_time; $i<$close_time; $i+=3600 ) 
			    {
			    	$plus 	   = $i + 3600;
					$str_date  = $date . 'T' . date('H:i:s', $i);
					$dsbld     = $this->booking_model->check_sched($str_date,$oauth_pid,$oauth_uid)?"disabled='disabled'":"";
					$rdo_dsbld = $this->booking_model->check_sched($str_date, $oauth_pid, $oauth_uid)?"radio-disabled":"";

					if($dsbld == "" && $bool == true) {
						$check = "checked";
						$bool  = false;
					}
					else {
						$check = "";
					}

					$output .= '<label class="radio radio-success '.$rdo_dsbld.'">';
					$output .= '<input type="radio" name="radio_time" data-name="'.date("h:i A",$i).' - '.date("h:i A", $plus).'" value="'.date("H:i:s",$i).'"'.$dsbld.' '.$check.'/>';
					$output .= '<span></span>';
			    	$output .= date("h:i A",$i) . ' - ';
					$output .= date("h:i A", $plus);
					$output .= '</label>';
				}
				if($action == "echo")
					echo $output;
				elseif ($action == "return")
					return $output;
				else
					redirect(base_url() . 'errorpage');
			}
			else
			{
				echo "<span class='text-danger'> Sunday is not available as of now. </span>";
			}
		}
		else
		{
			redirect(base_url().'errorpage');
		}
	}

	//Get client ip address
	private function get_ip()
	{
		//whether ip is from share internet
		if (!empty($_SERVER['HTTP_CLIENT_IP']))   
		  {
		    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
		  }
		//whether ip is from proxy
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
		  {
		    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		  }
		//whether ip is from remote address
		else
		  {
		    $ip_address = $_SERVER['REMOTE_ADDR'];
		  }
		return $ip_address;
	}

	//Insert in book now pending
	public function book_now()
	{	
		if(isset($_POST['short_desc']))
		{
			$bkn_id 	= "BKN-IB-" . $this->generate_bkn_id()."-".$this->booking_model->booking_last_id();
			$oauth_uid 	= $this->session->userdata['userData']['oauth_uid'];
			$ip_address = $this->get_ip();
			$short_desc = $this->clean_input($this->input->post('short_desc'));
			$status 	= "Pending";
			$user_type 	= "Auth";
			$attemps 	= 1;

			$data = array(
				'bkn_id' 	 => $bkn_id,
				'oauth_uid'  => $oauth_uid,
				'ip_address' => $ip_address,
				'short_desc' => $short_desc,
				'status' 	 => $status,
				'user_type'  => $user_type,
				'attemps' 	 => $attemps
			);

			$res = $this->booking_model->book_now_pending($data);

			if($res != "failed_insert" && $res != "failed_update" && $res != "failed_update")
			{
				if($res == "inserted")
				{
					echo base64_encode($bkn_id);
				}
				else
				{
					echo base64_encode($res);
				}
			}
			elseif($res == "failed_email")
			{
				echo "failed_email";
			}
			else
			{
				echo "failed_book";
			}
		}
		else
		{
			redirect(base_url().'errorpage');
		}
	}

	public function find_available_lawyer()
	{
		$bkn_id    = base64_decode($this->clean_input($this->input->post('bkn_id')));
		$oauth_uid = $this->session->userdata['userData']['oauth_uid'];
		$available = $this->booking_model->find_available_lawyer($bkn_id, $oauth_uid);		
		if($available)
		{
			$output = "";
			$arr = explode("," , $available[0]->oauth_pids);
			for($i = 0; $i < count($arr); $i++)
			{
				$oauth_pid = $arr[$i];
				$prof = $this->professional_model->get_oauth_professionals($oauth_pid);

				$pic = base_url() . 'assets/media/professionals/' . $prof[0]->picture;

				if($prof[0]->prof_type == 'Lawyer') { $suf = 'Atty.'; }
				else if($prof[0]->prof_type == 'Doctor') { $suf = 'Dr.'; }
				else { $suf = 'Engr.'; }

				$fullname      = $suf.' '.$prof[0]->fname.' '.$prof[0]->lname;
				$link_checkout = base_url(). 'checkout/prof/'.$prof[0]->professional_id . '.' . base64_encode($bkn_id);
				$link_profile  = base_url(). 'user/profile/' .$prof[0]->professional_id;

				$output .= '<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
								<div class="card card-custom gutter-b card-stretch card-home shadow">
									<div class="card-body pt-4">
										<div class="d-flex align-items-end mb-7">
											<div class="d-flex align-items-center">
												<div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
													<div class="symbol symbol-circle symbol-lg-75">
														<img src="'.$pic.'">
													</div>
												</div>
												<div class="d-flex flex-column">
													<a href="'.$link_profile.'" class="text-dark font-weight-bold text-hover-primary font-size-h5 mb-0">
														'.$fullname.'
													</a>
													<span class="text-muted font-weight-bold">
														'.$prof[0]->prof_type.'
													</span>
												</div>
											</div>
										</div>
										<div class="mb-7">
											<div class="d-flex justify-content-between align-items-center">
												<span class="text-dark-75 font-weight-bolder mr-2">Location:</span>
												<span class="text-muted font-weight-bold">
													'.$prof[0]->city.'
												</span>
											</div>
											<div class="d-flex justify-content-between align-items-center">
												<span class="text-dark-75 font-weight-bolder mr-2">Experience:</span>
												<span class="text-muted font-weight-bold">
													'.$prof[0]->experience.'
												</span>
											</div>
										</div>
										<a href="'.$link_checkout.'" class="btn btn-block btn-sm btn-custom2 font-weight-bolder text-uppercase py-4">
											Checkout
										</a>
									</div>
								</div>
							</div>';
			}
			echo $output;
		}
		else
		{
			echo "no_response";
		}
	}

	//Create Request Booking
	public function request_booking()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('prof_id', 'Prof_id', 'required');
  		$this->form_validation->set_rules('booking_type', 'Booking_type', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
  		$this->form_validation->set_rules('payment_type', 'Payment_type', 'required');
  		$this->form_validation->set_rules('short_desc', 'Short_desc', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            echo "failed!";
        }
        else
        {
        	$prof_id  = $this->clean_input($this->input->post('prof_id'));
        	$prof 	  = $this->booking_model->check_professional($prof_id);
        	//Check if professional is existing
        	if(!$prof)
        	{
        		echo "failed_prof_id";
        		exit();
        	}
        	else
        	{
        		$oauth_uid 		= $this->session->userdata['userData']['oauth_uid'];
	        	$oauth_pid 		= $prof[0]->oauth_pid;
	        	$start_date 	= date('Y-m-d', strtotime($this->input->post('date'))) . 'T' . $this->input->post('time');
	        	$bkn_id 		= "BKN-SB-" . $this->generate_bkn_id()."-".$this->booking_model->booking_last_id();

	        	//Check bkn id existing, if yes regenerate;
	        	if($this->booking_model->check_bkn_id($bkn_id))
	        		$bkn_id 	= "BKN-SB-" . $this->generate_bkn_id()."-".$this->booking_model->booking_last_id();


	        	//Check if the date is valid
        		if($this->booking_model->check_booking($start_date, $oauth_pid, $oauth_uid))
        		{
        			echo "failed_sched";
        			exit();
        		}
        		else
        		{
        			$booking_type 	= $this->clean_input($this->input->post('booking_type'));
        			$booking_status = "Pending";
		        	$duration 		= "60";
		        	$payment_type 	= $this->clean_input($this->input->post('payment_type'));
		        	$short_desc 	= $this->clean_input($this->input->post('short_desc'));
		        	$date_created 	= date('Y-m-d H:i:s');

					$booking_data = array(
						'oauth_uid'		  => $oauth_uid,
						'oauth_pid'		  => $oauth_pid,
						'booking_type' 	  => $booking_type,
						'booking_status'  => $booking_status,
						'start_date' 	  => $start_date,
						'duration' 		  => $duration,
						'payment_type' 	  => $payment_type,
						'short_desc'  	  => $short_desc,
						'date_created'    => $date_created
					);

					$request_booking = $this->booking_model->request_booking($booking_data);

					if($request_booking)
						echo "success";
					else
						echo "failed_request";
        		}
        	}
        }
	}

	//Update Booking Status
	public function update_booking_status()
	{
		if(isset($_POST['booking_id']) && $_POST['status'])
		{
			$booking_id = $this->clean_input($this->input->post('booking_id'));
			$status  = $this->clean_input($this->input->post('status'));

			if($status === "Accepted" || $status === "Decline")
			{
				$booking = $this->booking_model->check_booking_exist($booking_id);
				if($booking)
				{
					echo $this->booking_model->update_booking_status($booking_id, $status);
				}
				else
				{
					redirect(base_url()."errorpage");
				}
			}
			else
			{
				redirect(base_url()."errorpage");
			}
		}
		else
		{
			redirect(base_url()."errorpage");
		}
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

}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
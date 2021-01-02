<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professional extends CI_Controller {

	function __construct()
    { 
        parent::__construct(); 
         
        // Load google oauth library 
        $this->load->library('google'); 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('booking_model');
        $this->load->model('professional_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
    	if($this->session->userdata('loggedInProf'))
        { 
            redirect(base_url() . 'professional/home');
        }
        else
        {
        	redirect(base_url() . 'professional/login');
        }
    }

    //Load Login Page
	public function login($uri = null)
	{
		if($this->session->userdata('loggedInProf'))
        { 
            redirect(base_url() . 'professional/home');
        }

		$data['profData']['title'] = "DesxPert | Login";
        $data['profData']['background'] = true;
        $data['redirect_uri'] = "";
        if($uri)
        {
        	$arr = explode('.', $uri);
        	$data['redirect_uri'] = base_url() . $arr[0] . "/" . $arr[1] . "/" . $arr[2];
        }
		$this->load->view('professional/login', $data);
	}

	//Load Home
	public function home()
	{
		if(!$this->session->userdata('loggedInProf'))
        { 
            redirect(base_url() . 'professional');
        }

		$data['profData']['title'] = "DesxPert | Professional Panel";
        $data['profData']['background'] = true;
		$this->load->view('professional/_header', $data);
		$this->load->view('professional/home', $data);
		$this->load->view('professional/_footer', $data);
	}


	//Load Calendar
	public function calendar()
	{
		if(!$this->session->userdata('loggedInProf'))
        { 
            redirect(base_url() . 'professional');
        }

		$data['profData']['title'] = "DesxPert | Calendar";
        $data['profData']['background'] = true;
		$this->load->view('professional/_header', $data);
		$this->load->view('professional/calendar', $data);
		$this->load->view('professional/_footer', $data);
	}


	//Load Bookings
	public function bookings()
	{
		if(!$this->session->userdata('loggedInProf'))
        { 
            redirect(base_url() . 'professional');
        }

		$data['profData']['title'] = "DesxPert | Bookings ";
        $data['profData']['background'] = true;
        $oauth_pid = $this->session->userdata['profData']['oauth_pid'];
        $data['bookings'] = $this->booking_model->prof_bookings($oauth_pid, "Pending");
		$this->load->view('professional/_header', $data);
		$this->load->view('professional/bookings', $data);
		$this->load->view('professional/_footer', $data);
	}

	//Booking Details
	public function booking_details()
	{
		if(isset($_POST['booking_id']))
		{
			$booking_id = $_POST['booking_id'];
			$booking_details = $this->booking_model->prof_booking_details($booking_id);
			echo json_encode($booking_details);
		}
		else
		{
			redirect(base_url().'errorpage');
		}
	}

	//Load response page in booking via asap
    public function response($bkn_id = null)
    {	
    	if(!$this->session->userdata('loggedInProf'))
        { 
        	$url = "professional.response." . $bkn_id;
            redirect(base_url() . 'professional/login/' . $url );
        }

        if($bkn_id == null)
        {
        	redirect(base_url().'errorpage');
        }
        else
        {
        	$bkn_id = base64_decode($bkn_id);
        	$booking = $this->booking_model->check_book_now($bkn_id);
        	if($booking)
        	{
        		$data['profData']['title'] = "DesxPert | Reponse ";
		        $data['profData']['background'] = true;
		        $data['client']  = $this->booking_model->get_user_data($booking[0]->oauth_uid);
		        $data['booking'] = $booking;
		        $data['bkn_id']  = base64_encode($bkn_id);
				$this->load->view('professional/_header', $data);
				$this->load->view('professional/response_page', $data);
				$this->load->view('professional/_footer', $data);
        	}
        	else
        	{
        		redirect(base_url().'errorpage');
        	}
        	
        }
		
    }

    //Professional response in book now
    public function prof_response()
    {
    	$response = $this->input->post('response');
    	if($response == "Accept")
    	{
    		$bkn_id = base64_decode($this->input->post('bkn_id'));
    		if(!$this->booking_model->check_book_now($bkn_id))
    		{
    			echo "not_found";
    			exit();
    		}
    		else
    		{
    			
    			$oauth_pid = $this->session->userdata['profData']['oauth_pid'];
    			$update = $this->booking_model->update_book_now($bkn_id, $oauth_pid);
    			if($update)
    				echo "success";
    			else
    				echo "failed_update";
    		}
    		
    	}
    	else if($response == "Decline")
    	{
    		echo "success";
    	}
    }


	//Click Login
	public function check_login()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$data = array();
	        $data['username']   = htmlspecialchars($_POST['username']);
	        $data['password']   = htmlspecialchars($_POST['password']);
	        $data['login_type'] = $this->check_username_input($data['username']);

	        $prof = $this->professional_model->check_login($data);
	        if($prof)
	        {
	            $this->session->set_userdata('loggedInProf', true); 
	            $this->session->set_userdata('profData', $prof);
	            echo base_url() . "professional/home";
	        }
	        else
	        {
	            echo false;
	        }
		}
		else
		{
			redirect(base_url().'errorpage');
		}
	}

	//Check username if phone or email
    private function check_username_input($username)
    {
        if(strpos($username, '@') || strpos($username, '.com'))
        {
            return "email";
        }
        else
        {
            return "phone";
        }
    } 

    public function logout()
    { 
        $this->session->unset_userdata('loggedInProf'); 
        $this->session->unset_userdata('profData'); 
        $this->session->sess_destroy(); 
        redirect(base_url() . "professional/");
    }

}

/* End of file Professional.php */
/* Location: ./application/controllers/Professional.php */
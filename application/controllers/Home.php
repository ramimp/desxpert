<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    { 
        parent::__construct(); 
         
        // Load google oauth library 
        $this->load->library('google'); 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user_model');
		$this->load->model('professional_model');
    }

    //Load Home
	public function index()
	{
		// Redirect to profile page if the user already logged in 
        if($this->session->userdata('loggedIn') == true)
        { 
            redirect(base_url(). 'user/'); 
        }

		$arr = array(
			"background" => true,
			"title" => "DesxPert | Home",
		); 
		$data['loginURL'] = $this->google->loginURL(); 
        $data['authURL'] =  $this->facebook->login_url();
		$data['userData'] = $arr;
		$data['professionals'] = $this->professional_model->get_professionals();
		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer');
	}

	public function search()
	{
		$data['userData']['background'] = true;
		$data['userData']['title'] = "DesxPert | Search";
		$data['loginURL'] = $this->google->loginURL(); 
        $data['authURL'] =  $this->facebook->login_url();
		$data['professionals'] = $this->professional_model->get_professionals();
		$this->load->view('header', $data);
		$this->load->view('search', $data);
		$this->load->view('footer');
	}


	//Load Professional Profile
	public function prof($prof_id = null)
	{
		if($prof_id)
		{
			$data['userData']['background'] = true;
			$data['userData']['title'] = "Profile";
			$data['prof'] = $this->professional_model->get_professionals($prof_id);
			if($data['prof'])
	        {
	            $this->load->view('header', $data);
	            $this->load->view('profile', $data);
	            $this->load->view('footer');
	        }
	        else
	        {
	            redirect(base_url() . 'errorpage');
	        }
		}
		else
		{
			redirect(base_url() . 'errorpage');
		}
	}

}
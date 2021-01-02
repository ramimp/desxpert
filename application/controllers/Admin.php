<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    { 
        parent::__construct(); 
         
        // Load google oauth library 
        $this->load->library('google'); 
        $this->load->library('facebook'); 
         
        // Load user model 
        $this->load->model('user_model');
        $this->load->model('professional_model');
        $this->load->model('booking_model');
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$this->load->view('_admin/_login');
	}

	public function home()
	{
		// if(!$this->session->userdata('loggedInProf'))
  //       { 
  //           redirect(base_url() . 'errorpage');
  //       }

		$data['adminData']['title'] = "Admin | Calendar";
        $data['adminData']['background'] = true;
		$this->load->view('_admin/_header', $data);
		$this->load->view('_admin/_home', $data);
		$this->load->view('_admin/_footer', $data);
	}

	public function bookings()
    {
        $data['adminData']['title'] = "Admin | Bookings ";
        $data['adminData']['background'] = true;
        $data['bookings'] = $this->booking_model->admin_bookings();
        $this->load->view('_admin/_header', $data);
        $this->load->view('_admin/_bookings', $data);
        $this->load->view('_admin/_footer', $data);
    }

	public function logout()
    { 
        $this->session->unset_userdata('loggedIn'); 
        $this->session->unset_userdata('userData'); 
        $this->session->sess_destroy(); 
        redirect(base_url() . "admin/");
    }

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
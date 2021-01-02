<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desxpert extends CI_Controller {

	public function policy()
	{
		$this->load->view('doc/policy');
	}
	
	public function terms()
	{
		$this->load->view('doc/terms');
	}
	
	public function support()
	{
		$this->load->view('doc/support');
	}
	
	public function docs()
	{
		$this->load->view('doc/docs');
	}
	
	public function endpoint()
	{
		$this->load->view('doc/endpoint');
	}
	
	public function about()
	{
		if(!$this->session->userdata('loggedIn'))
        { 
        	$data['userData']['background'] = true;
			$data['userData']['title'] = "DesxPert | About us";
			$this->load->view('header', $data);
			$this->load->view('about');
			$this->load->view('footer');
	    }
	    else
	    {
	    	$data['userData'] = $this->session->userdata('userData');
	    	$data['userData']['background'] = true;
			$data['userData']['title'] = "DesxPert | About us";
			$this->load->view('user/_header', $data);
			$this->load->view('about');
			$this->load->view('user/_footer', $data);
	    }
		
	}

	public function contact()
	{
		if(!$this->session->userdata('loggedIn'))
        { 
        	$data['userData']['background'] = true;
			$data['userData']['title'] = "DesxPert | Contact us";
			$this->load->view('header', $data);
			$this->load->view('contact');
			$this->load->view('footer');
	    }
	    else
	    {
	    	$data['userData'] = $this->session->userdata('userData');
	    	$data['userData']['background'] = true;
			$data['userData']['title'] = "DesxPert | Contact us";
			$this->load->view('user/_header', $data);
			$this->load->view('contact');
			$this->load->view('user/_footer', $data);
	    }
	}

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */
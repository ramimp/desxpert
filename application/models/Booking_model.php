<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {

	function __construct() { 
        $this->tableName = 'booking'; 
        date_default_timezone_set('Asia/Manila');
    }

    //Check bkn id exist
	public function check_bkn_id($bkn_id)
	{
		return $this->db->get_where('booking', array('bkn_id' => $bkn_id))->result();
	}

	//Fetch booking last_id
	public function booking_last_id()
	{
		$last_id = 1;
		$this->db->select('booking_id');
		$this->db->from('booking');
		$this->db->order_by('booking_id', 'desc');
		$this->db->limit(1);
		$res = $this->db->get()->result();
		if(!$res)
			return $last_id;
		else
		{
			return $last_id += $res[0]->booking_id;
		}
	}

    //Check booking if existing
    public function check_booking_exist($booking_id)
    {
    	return $this->db->get_where('booking', array('booking_id' => $booking_id))->result();
    }

    //Check booking schedule if existing
    public function check_booking($str_date, $oauth_pid, $oauth_uid)
    {
    	$this->db->select('*');
    	$this->db->from('booking');
    	$where = "start_date='$str_date' AND (oauth_pid='$oauth_pid' OR oauth_uid='$oauth_uid')";
    	$this->db->where($where);
    	$res = $this->db->get();
    	if($res->result())
    		return true;
    	else
    		return false;
    }

    //Request Booking
    public function request_booking($object)
	{
		return $this->db->insert('booking', $object);
	}

	//Check if the booking is existing
	public function check_sched($str_date, $oauth_pid, $oauth_uid)
	{
		$this->db->select('*');
    	$this->db->from('booking');
    	$where = "start_date='$str_date' AND (oauth_pid='$oauth_pid' OR oauth_uid='$oauth_uid')";
    	$this->db->where($where);
    	$res = $this->db->get();
    	return $res->result();
	}

	//Check if the prof is exisitng
	public function check_professional($prof_id)
	{
		return $this->db->get_where('professionals', array('professional_id' => $prof_id))->result();
	}

	//Fetch user bookings
	public function user_bookings($oauth_uid, $booking_status)
	{
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('professionals', 'booking.oauth_pid = professionals.oauth_pid');
		$this->db->join('location', 'location.location_id = professionals.location_id');
		$this->db->where('booking.oauth_uid', $oauth_uid);
		//$this->db->where('booking.booking_status', $booking_status);
        $this->db->order_by('booking.date_created', 'desc');
		$res = $this->db->get();
		return $res->result();
	}

	//Get user data who book now this is for professional response page
	public function get_user_data($oauth_uid)
	{
		$this->db->select('users.oauth_uid, users.oauth_provider, users.picture, user_individual.fname, user_individual.lname');
		$this->db->from('users');
		$this->db->join('user_individual', 'user_individual.oauth_uid = users.oauth_uid');
		$this->db->where('users.oauth_uid', $oauth_uid);
		return $this->db->get()->result();
	}

	//Check booking now if exists
	public function check_book_now($bkn_id)
	{	
		$con = array(
			'bkn_id' 	=> $bkn_id,
			'status' 	=> "Pending"
		);
		return $this->db->get_where('book_now_pending', $con)->result();
	}

	//Insert in book now pending
	public function book_now_pending($object)
	{
		$oauth_uid = $object['oauth_uid'];
		$status = $object['status'];
		$check  = $this->db->get_where('book_now_pending', array('oauth_uid' => $oauth_uid, "status" => $status))->result();
		if($check)
		{
			$this->db->where('bkn_id', $check[0]->bkn_id);
			$update = $this->db->update('book_now_pending', array( 'short_desc' => $object['short_desc'] ));
			if($update)
				return $check[0]->bkn_id;
			else
				return "failed_update";
		}
		else
		{
			$profs  = $this->db->get('professionals');
			$res    = $profs->result();
			$bkn_id = $object['bkn_id'];
			$err    = 0;
			$err_msg= "";

			//Send Email to all professionals
			// foreach ($res as $prof) {
			// 	$prof_name = $prof->fname . ' ' . $prof->lname;

			// 	if(!$this->book_and_send_email($bkn_id, $prof->email, $prof_name))
			// 	{
			// 		$err += 1;
			// 		$err_msg = "failed_email";
			// 		exit();
			// 	}
			// }

			if($err == 0)
			{
				$insert = $this->db->insert('book_now_pending', $object);
				if($insert)
					return "inserted";
				else
					return "failed_insert";
			}
			else
			{
				return $err_msg;
			}
		}
	}

	//Update book now pending when triggered by professional
	public function update_book_now($bkn_id, $oauth_pid)
	{
		$isExists = false;
		$this->db->where('bkn_id', $bkn_id);
		$res  = $this->db->get('book_now_pending', 1)->result();
		$oauth_pids = "";
		if($res[0]->oauth_pids == null)
			$oauth_pids = $oauth_pid;
		else
		{
			$arr = explode(",", $res[0]->oauth_pids);
			for($i = 0; $i < count($arr); $i++)
			{
				if($arr[$i] == $oauth_pid)
				{
					$isExists = true;
					break;
				}
			}
			if($isExists)
				$oauth_pids = $res[0]->oauth_pids;
			else
				$oauth_pids = $res[0]->oauth_pids . "," . $oauth_pid;
		}
		$this->db->where('bkn_id', $bkn_id);
		return $this->db->update('book_now_pending', array('oauth_pids' => $oauth_pids));
	}

	//Fetch available lawyers who respond yes in book now
	public function find_available_lawyer($bkn_id, $oauth_uid)
	{
		$con = "bkn_id = '$bkn_id' AND oauth_uid = '$oauth_uid' AND oauth_pids IS NOT NULL";
		$this->db->where($con); 
		$res = $this->db->get('book_now_pending', 1)->result();
		return $res;
	}

	//Get attemps in book now pending
	public function get_attemps($bkn_id)
	{
		$res = $this->db->get_where('book_now_pending', array('bkn_id' => $bkn_id))->result();
	}

	//Send email in professionals
    private function book_and_send_email($bkn_id, $email, $prof_name) 
    {
        $home  = 'inquiry@thecogitosolutions.com';
        $cname = 'Desxpert';
        $link  = base_url() . 'professional/response/' . base64_encode($bkn_id);

        $sender=$cname.' <'.$home.'>';
        $subject='Professional Response';
        $to=$prof_name.' <'.$email.'>';
        $html_body='
        <p>Hi, <b> Atty.'.$prof_name.',</b>
        <br />
        <br />
        <br />Desxpert is looking for a lawyer right now.
        <br />Are you available for a online consultation right now?
        <br />If you yes, you may response in this link below.
        <br />Reponse link:
        <br /><a class="text-info" href="' . $link . '"> Click here to response </a>
        <br />
        <br />If you need further assistance or still have questions, please let us know.
        <br />
        <br />Just call, send an email or private message through the following channels.
        <br />My team will be more than happy to assist you:
        <br />
        <br />Facebook @ facebook.com/companyname
        <br />
        <br />
        <br />Thank you,
        <br /><b>Desxpert</b>

        </p>';
        $text_body='Email from Desxpert';

        $apikey='api-BA17A4DEA91B11E99C7EF23C91C88F4E';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        curl_setopt($curl, CURLOPT_URL, "https://api.smtp2go.com/v3/email/send");
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode(array(
            "api_key" => $apikey,
            "to" => array(0 => $to),
            "sender" => $sender,
            "subject" => $subject,
            "html_body" => $html_body,
            "text_body" => $text_body
        )));
        $result=curl_exec($curl);
        return json_encode($result);
    }



	//Fetch professional bookings
	public function prof_bookings($oauth_pid, $booking_status)
	{
		$this->db->select('*');
        $this->db->from('booking');
        $this->db->join('users', 'booking.oauth_uid = users.oauth_uid');
        $this->db->join('user_individual', 'booking.oauth_uid = user_individual.oauth_uid');
        $this->db->where('booking.oauth_pid', $oauth_pid);
        //$this->db->where('booking.booking_status', $booking_status);
        $this->db->order_by('booking.date_created', 'desc');
        $res = $this->db->get();
        return $res->result();
	}

	//Fetch booking deatils in professional panel
	public function prof_booking_details($booking_id)
	{
		$this->db->select('*, users.oauth_uid as uid, users.oauth_provider as client_type');
        $this->db->from('booking');
        $this->db->join('users', 'booking.oauth_uid = users.oauth_uid');
        $this->db->join('user_individual', 'booking.oauth_uid = user_individual.oauth_uid');
        $this->db->where('booking.booking_id', $booking_id);
        $this->db->limit(1);
        $res = $this->db->get();
        return $res->result();
	}

	//Update bookings
	public function update_booking_status($booking_id, $status)
	{	
		$this->db->where('booking_id', $booking_id);
		return $this->db->update('booking', array('booking_status' => $status));
	}

	//Fetch bookings for admin
	public function admin_bookings($booking_status = null)
	{
		$this->db->select('*');
        $this->db->from('booking');
        $this->db->join('users', 'booking.oauth_uid = users.oauth_uid');
        $this->db->join('user_individual', 'booking.oauth_uid = user_individual.oauth_uid');
        $this->db->join('professionals', 'booking.oauth_pid = professionals.oauth_pid');
        //$this->db->where('booking.booking_status', $booking_status);
        $this->db->order_by('booking.date_created', 'desc');
        $res = $this->db->get();
        return $res->result();
	}

}

/* End of file Booking_model.php */
/* Location: ./application/models/Booking_model.php */
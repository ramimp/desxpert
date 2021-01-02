<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() { 
        $this->tableName = 'professionals'; 
        date_default_timezone_set('Asia/Manila');
    }

	//Get professional bookings
    public function get_bookings($oauth_pid)
    {
        $this->db->select('*');
        $this->db->from('booking');
        //$this->db->join('payment', 'payment.booking_id = booking.booking_id');
        $this->db->join('users', 'booking.oauth_uid = users.oauth_uid');
        $this->db->join('user_individual', 'booking.oauth_uid = user_individual.oauth_uid');
        $this->db->where('booking.oauth_pid', $oauth_pid);
        $this->db->order_by('booking.date_created', 'desc');
        $res = $this->db->get();
        return $res->result();
    }

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
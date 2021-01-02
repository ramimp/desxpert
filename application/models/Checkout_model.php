<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends CI_Model {

	//Create Payment
	public function create_payment($object)
	{
		return $this->db->insert('payment', $object);
	}
	
	//Check if booking is existing
	public function check_booking_exists($trans_id)
	{
		return $this->db->get_where('booking', array('transaction_id =' => $trans_id))->result();
	}
	
	//Update booking
	public function update_booking($trans_id, $object)
	{
		$this->db->where('transaction_id', $trans_id);
		return $this->db->update('booking', $object);
	}
	

}

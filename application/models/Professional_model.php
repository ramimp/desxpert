<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professional_model extends CI_Model {

	function __construct() { 
        $this->tableName = 'professionals'; 
        date_default_timezone_set('Asia/Manila');
    }

    //Get all professional or Single Professional
    public function get_professionals($prof_id = null)
    {
    	$this->db->select('*');
    	$this->db->from('professionals');
        $this->db->join('education', 'education.professional_id = professionals.professional_id');
    	$this->db->join('location', 'location.location_id = professionals.location_id');
    	$this->db->where('professionals.status', 'Verified');
    	if($prof_id) $this->db->where('professionals.professional_id', $prof_id);

    	$result = $this->db->get();
    	return $result->result();
    }

    //Get Single Professional using Oauth_id
    public function get_oauth_professionals($oauth_pid)
    {
        $this->db->select('*');
        $this->db->from('professionals');
        $this->db->join('education', 'education.professional_id = professionals.professional_id');
        $this->db->join('location', 'location.location_id = professionals.location_id');
        $this->db->where('professionals.status', 'Verified');
        $this->db->where('professionals.oauth_pid', $oauth_pid);

        $result = $this->db->get();
        return $result->result();
    }
    
    //Check prof id existing
    public function check_prof_id($prof_id)
    {
        $res = $this->db->get_where('professionals', array('professional_id' => $prof_id))->result();
        if($res)
            return true;
        else
            return false;
    }

    //Professional Login
    public function check_login($data = array())
    {
        $this->db->select('*'); 
        $this->db->from($this->tableName);

        if($data['login_type'] == "email") 
        {
            $condition = array( 
                'email'     => $data['username'], 
                'password'  => $data['password'] 
            ); 
        }
        else if($data['login_type'] == "phone")
        {
            $condition = array( 
                'phone'           => $data['username'], 
                'password'        => $data['password'],
                'phone_verified'  => true  
            );
        }

        $this->db->where($condition);
        $query = $this->db->get();
        $check = $query->num_rows();

        if($check > 0)
        { 
            // Get prev user data 
            $prof = $query->row();

            $prof_data = array(
                'oauth_pid'      => $prof->oauth_pid,
                'email'          => $prof->email,
                'fname'          => $prof->fname,
                'lname'          => $prof->lname,
                'phone'          => $prof->phone,
                'prof_type'      => $prof->prof_type,
                'picture'        => base_url() . 'assets/media/users/' . $prof->picture,
                'experience'     => $prof->experience
            );

            return $prof_data;
        }
        else
        { 

            return false;
        } 
    }

}

/* End of file Professional_model.php */
/* Location: ./application/models/Professional_model.php */
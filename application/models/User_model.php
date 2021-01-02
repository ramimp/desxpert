<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User_model extends CI_Model { 
     
    function __construct() { 
        $this->tableName = 'users'; 
        date_default_timezone_set('Asia/Manila');
    }

    //===========================================REGISTRATION=========================================================== 

    //Check phne number if existing and return false if existing
    public function check_phone($phone)
    {
        $result = $this->db->get_where('user_register', array('phone =' => $phone))->result();
        if($result)
            return false;
        else
            return true;
    }

    //Check email in user_register table
    public function check_email($email)
    {
        $result = $this->db->get_where('user_register', array('email =' => $email))->result();
        if($result)
            return false;
        else
            return true;
    }

    //Check email in user_register_company table
    public function check_email_company($email)
    {
        $result = $this->db->get_where('user_register_company', array('email =' => $email))->result();
        if($result)
            return false;
        else
            return true;
    }

    //Check if the otp is already verified and return true
    public function is_otp_verified($email)
    {
       $result = $this->db->get_where('user_register', array('email =' => $email, 'otp_verified' => true))->result();
        if($result)
            return true;
        else
            return false;
    }

    //Check email in users table
    public function check_email_users($email)
    {
        $result = $this->db->get_where('users', array('email =' => $email))->result();
        if($result)
            return false;
        else
            return true;
    }
    
    //Insert into table user_register
    public function register($data = array())
    {
        $response = "";

        // if(!$this->check_phone($data['phone']))
        //     $error = "phone_exists";

        if(!$this->check_email_users($data['email']))
            $response = "email_exists";
        else
        {
            //generate otp
            $otp = $this->generate_otp();
            while(!$this->check_otp($data['email'], $otp))
            {
                $otp = $this->generate_otp();
            }

            //send email
            $isSend = $this->send_email($data['email'], $data['fname'], $otp, md5('individual'));

            if($isSend != "false") 
            {   
                /*
                check_email function will return false if the email in the
                table user_register is EXISTING 
                */

                if($this->check_email($data['email']))
                {   
                    /*
                    IF the registry is NOT existing in table user_register
                    This will update the data in table user_register 
                    */
                    if($this->db->insert("user_register", $data))
                    {
                        $insert_otp = array(
                            'email'     => $data['email'],
                            'otp'       => $otp,
                            'expiration'=> date('Y-m-d H:i:s', strtotime('+3 hour')),
                            'status'    => 'not_verified'
                        );

                        if($this->db->insert('user_otp', $insert_otp))
                            $response = "true";
                        else
                            $response = "failed_otp";
                    }
                    else
                    {
                        $response = "failed_register";
                    }
                }
                else
                {
                    /*
                    IF the registry is existing in table user_register
                    This will update the data in table user_register 
                    */

                    $this->db->where('email', $data['email']);
                    if($this->db->update("user_register", $data))
                    {
                        $update_otp = array(
                            'otp'       => $otp,
                            'expiration'=> date('Y-m-d H:i:s', strtotime('+3 hour')),
                            'status'    => 'not_verified'
                        );

                        $this->db->where('email', $data['email']);
                        if($this->db->update('user_otp', $update_otp))
                            $response = "true";
                        else
                            $response = "failed_otp_update";
                    }
                    else
                    {
                        $response = "failed_register_update";
                    }
                }
            }
            else
            {
                $response = "internet";
            }

        }

        return $response;
    }

    //Generate otp
    private function generate_otp()
    {
        $random_numbers = [];
        $otp = "";
        while(count($random_numbers) < 5){
            do  {
                $random_number = floor(mt_rand(1,9));    
            } while (in_array($random_number, $random_numbers));
            $random_numbers[] = $random_number;
            $otp .= $random_number;
        }

        return $otp;
    }

    //Check otp if existing
    private function check_otp($email, $otp)
    {
        $result = $this->db->get_where('user_otp', array('email =' => $email, 'otp =' => $otp))->result();
        if($result)
            return false;
        else
            return true;
    }

    //Check otp if existing
    public function verify_otp($otp, $email)
    {
        $result = $this->db->get_where('user_otp', array('email =' => $email, 'otp =' => $otp))->result();
        if($result) 
            return true;
        else
            return false;
    }


    //Insert in tbl user if the otp is valid
    public function insert_to_user($email, $type)
    {
        if(!$this->check_email_users($email))
        {
            return "existing";
            exit();
        }
        else
        {
            $user = '';
            if($type == "individual")
            {
                $user = $this->db->get_where('user_register', array('email =' => $email))->row();
            }
            else if($type == "company")
            {
                $user = $this->db->get_where('user_register_company', array('email =' => $email))->row();
            }
            
            $oauth_uid = md5($user->email);
            $data = array(
                'oauth_provider' => $user->oauth_provider,
                'oauth_uid'      => $oauth_uid,
                'phone'          => $user->phone,
                'email'          => $user->email,
                'password'       => $user->password,
                'picture'        => 'blank.png',
                'phone_verified' => 0,
                'created'        => date("Y-m-d H:i:s"),
                'modified'       => date("Y-m-d H:i:s")
            );

            if($this->db->insert('users', $data))
            {
                //If individual
                if($type == "individual")
                {
                    $individual_data = array(
                        'oauth_uid'  => $oauth_uid,
                        'fname'      => $user->fname,
                        'lname'      => $user->lname
                    );

                    if($this->db->insert('user_individual', $individual_data))
                    {
                        //Update otp status in tbl user_register
                        $this->db->where('email', $email);
                        $this->db->update('user_register', array('otp_verified' => true));

                        $this->db->where('email', $email);
                        $this->db->update('user_otp', array('status' => 'verified'));

                        $general_data = array(
                            'oauth_provider' => $user->oauth_provider,
                            'oauth_uid'      => $oauth_uid,
                            'phone'          => $user->phone,
                            'email'          => $user->email,
                            'fname'          => $user->fname,
                            'lname'          => $user->lname,
                            'picture'        => 'blank.png',
                            'type'           => 'individual'
                        );
                        return $general_data;
                    }
                    else
                    {
                        return "failed_insert_to_user_individual";
                    }
                }
                //If company
                else if($type == "company")
                {
                    $company_data = array(
                        'oauth_uid'       => $oauth_uid,
                        'company_name'    => $user->company_name,
                        'representative'  => $user->representative
                    );

                    if($this->db->insert('user_company', $company_data))
                    {
                        //Update otp status in tbl user_register
                        $this->db->where('email', $email);
                        $this->db->update('user_register_company', array('otp_verified' => true));

                        $this->db->where('email', $email);
                        $this->db->update('user_otp', array('status' => 'verified'));

                        $general_data = array(
                            'oauth_provider' => $user->oauth_provider,
                            'oauth_uid'      => $oauth_uid,
                            'phone'          => $user->phone,
                            'email'          => $user->email,
                            'company_name'   => $user->company_name,
                            'representative' => $user->representative,
                            'picture'        => 'blank.png',
                            'type'           => 'company'
                        );
                        return $general_data;
                    }
                    else
                    {
                        return "failed_insert_to_user_individual";
                    } 
                }
            }
            else
            {
                return "failed_insert_to_user_individual";
            }
        }
    }

    //Insert into table user_register_company
    public function register_company($data = array())
    {
        $response = "";

        // if(!$this->check_phone($data['phone']))
        //     $error = "phone_exists";

        if(!$this->check_email_users($data['email']))
            $response = "email_exists";
        else
        {
            //generate otp
            $otp = $this->generate_otp();
            while(!$this->check_otp($data['email'], $otp))
            {
                $otp = $this->generate_otp();
            }

            //send email
            $isSend = $this->send_email($data['email'], $data['company_name'], $otp, md5('company'));

            if($isSend != "false") 
            {   
                /*
                check_email function will return false if the email in the
                table user_register is EXISTING 
                */

                if($this->check_email_company($data['email']))
                {   
                    /*
                    IF the registry is NOT existing in table user_register
                    This will update the data in table user_register 
                    */

                    if($this->db->insert("user_register_company", $data))
                    {
                        $insert_otp = array(
                            'email'     => $data['email'],
                            'otp'       => $otp,
                            'expiration'=> date('Y-m-d H:i:s', strtotime('+3 hour')),
                            'status'    => 'not_verified'
                        );

                        if($this->db->insert('user_otp', $insert_otp))
                            $response = "true";
                        else
                            $response = "failed_otp";
                    }
                    else
                    {
                        $response = "failed_register";
                    }
                }
                else
                {
                    /*
                    IF the registry is existing in table user_register
                    This will update the data in table user_register 
                    */

                    $this->db->where('email', $data['email']);
                    if($this->db->update("user_register_company", $data))
                    {
                        $update_otp = array(
                            'otp'       => $otp,
                            'expiration'=> date('Y-m-d H:i:s', strtotime('+3 hour')),
                            'status'    => 'not_verified'
                        );

                        $this->db->where('email', $data['email']);
                        if($this->db->update('user_otp', $update_otp))
                            $response = "true";
                        else
                            $response = "failed_otp_update";
                    }
                    else
                    {
                        $response = "failed_register_update";
                    }
                }
            }
            else
            {
                $response = "internet";
            }

        }

        return $response;
    }

    public function resend_email($email, $type)
    {

        $name = '';
        $otp = $this->generate_otp();

        while(!$this->check_otp($email, $otp))
        {
            $otp = $this->generate_otp();
        }

        if($type == md5('individual'))
        {
            $res = $this->db->get_where('user_register', array('email =' => $email))->row();
            $name = $res->fname;
        }
        else if($type == md5('company'))
        {
            $res = $this->db->get_where('user_register_company', array('email =' => $email))->row();
            $name = $res->company_name;
        }

        $this->db->update('user_otp', array('otp' => $otp), array('email =' => $email));

        //send email
        $isSend = $this->send_email($email, $name, $otp, $type);
        if($isSend != 'false')
            return true;
        else
            return false;
    }

    //===========================================END REGISTRATION=========================================================







    //===========================================LOGIN===================================================================
    
    //Facebook or Google Login
    public function check_user($data = array())
    { 
        $this->db->select('id'); 
        $this->db->from($this->tableName);

        $user_data = array(
            'oauth_provider'    => $data['oauth_provider'],
            'oauth_uid'         => $data['oauth_uid'],
            'email'             => $data['email'],
            'picture'           => $data['picture'],
            'phone_verified'    => 0,
            'created'           => date("Y-m-d H:i:s"),
            'modified'          => date("Y-m-d H:i:s")
        );

        $details_data = array(
            'oauth_uid' => $data['oauth_uid'],
            'fname'     => $data['fname'],
            'lname'     => $data['lname'],
            'gender'    => $data['gender'],
            'link'      => $data['link']
        );

        $condition = array( 
            'oauth_provider'=> $data['oauth_provider'], 
            'oauth_uid'     => $data['oauth_uid'],
            'email'         => $data['email']
        );  
        
        $this->db->where($condition); 
        $query = $this->db->get(); 
         
        $check = $query->num_rows(); 
        if($check > 0)
        { 
            // Get prev user data 
            $result = $query->row_array(); 
             
            // Update user data 
            $data['modified'] = date("Y-m-d H:i:s"); 
            $this->db->update($this->tableName, $user_data, array('id' => $result['id']));
            $this->db->update('user_individual', $details_data, array('id' => $result['id']));
             
            // Get user ID 
            $userID = $result['id']; 
        }
        else
        { 
            // Insert user data 
            $this->db->insert($this->tableName, $user_data);
            $this->db->insert('user_individual', $details_data);
             
            // Get user ID 
            $userID = $this->db->insert_id(); 
        } 
        // Return user ID 
        return $userID?$userID:false; 
    }

    //Manual log in
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
            $user = $query->row();

            $user_data = array(
                'oauth_provider' => $user->oauth_provider,
                'oauth_uid'      => $user->oauth_uid,
                'phone'          => $user->phone,
                'email'          => $user->email,
                'picture'        => base_url() . 'assets/media/users/' . $user->picture,
                'isLogin'        => true
            );

            if($user->oauth_provider == "individual") 
            {
                $details = $this->db->get_where('user_individual', array('oauth_uid =' => $user->oauth_uid))->row();
                $user_data['fname']  = $details->fname;
                $user_data['lname']  = $details->lname;
                $user_data['mname']  = $details->mname;
                $user_data['gender'] = $details->gender;
                $user_data['link']   = $details->link;
                $user_data['name']   = $details->fname;
            }

            else if($user->oauth_provider == "company") 
            {
                $details = $this->db->get_where('user_company', array('oauth_uid =' => $user->oauth_uid))->row();
                $user_data['company_name']   = $details->company_name;
                $user_data['representative'] = $details->representative;
                $user_data['name']   = $details->company_name;
            }

            return $user_data;
        }
        else
        { 

            return false;
        } 
    }

    //===========================================END LOGIN===============================================================

    //Send Email to be convert in code igniter
    private function send_email($email, $name, $otp, $type) 
    {
        $home  = 'inquiry@thecogitosolutions.com';
        $cname = 'Company name';
        $link  = 'http://desxpert.com/user/verify_page/' . urlencode(base64_encode($email)) . '/' . $type;

        $sender=$cname.' <'.$home.'>';
        $subject='Verfication Code';
        $to=$name.' <'.$email.'>';
        $html_body='<div><img src="C:\xampp\htdocs\work\cogito\assets\img\logo\logo.png"></div>
        <p>Hi <b>'.$name.',</b>
        <br />
        <br />Thank you for joining Online Consult.
        <br />To complete the activation of your account, just copy the code below:
        <br />
        <br />Verification code: <b>' . $otp . ' </b>
        <!--<br />Link: <a class="text-info" href="' . $link . '"> Click here to verify </a> -->
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
        <br /><b>Company name</b>

        </p>';
        $text_body='Welcome to Company name';

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





    //===========================================ACCOUNT MANAGEMENT===============================================================

    //Fetch User Data
    public function get_user_data($oauth_uid)
    {
        $result = $this->db->get_where('users', array('oauth_uid =' => $oauth_uid))->row_array();
        return $result;
    }

    //Update personal info of user
    public function update_user_info($oauth_uid, $object)
    {
        $this->db->where('oauth_uid', $oauth_uid);
        return $this->db->update('user_individual', $object);
    }

    //Update picture of user
    public function update_user_picture($oauth_uid, $object)
    {
        $this->db->where('oauth_uid', $oauth_uid);
        return $this->db->update('users', $object);
    }

    public function update_pass($old_pass, $new_pass, $oauth_uid)
    {
        $result = $this->db->get_where('users', array('password =' => $old_pass, 'oauth_uid' => $oauth_uid))->row_array();
        if(!$result)
        {
            return "failed_pass";
            exit();
        }
        else
        {
            $this->db->where('oauth_uid', $oauth_uid);
            if($this->db->update('users', array('password' => $new_pass)))
                return "good";
            else
                return "error";
        }
    }

    //===========================================END ACCOUNT MANAGEMENT===========================================================




}
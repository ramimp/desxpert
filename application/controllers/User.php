<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class User extends CI_Controller { 

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
        //NEW CODES
        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'home');
        }

        $data['userData'] = $this->session->userdata('userData');
        $data['userData']['title'] = "DesxPert | User Panel";
        $data['userData']['background'] = true;
        $data['professionals'] = $this->professional_model->get_professionals();
        $this->load->view('user/_header', $data);
        $this->load->view('user/home', $data);
        $this->load->view('user/_footer', $data);
    }




    //===========================================REGISTRATION===========================================================

    //User register
    public function register()
    {
        $data = array(
            'oauth_provider'    => "individual",
            'fname'             => htmlspecialchars($this->input->post('first_name')),
            'lname'             => htmlspecialchars($this->input->post('last_name')),
            'phone'             => htmlspecialchars($this->input->post('phone')),
            'email'             => htmlspecialchars($this->input->post('email')),
            'password'          => htmlspecialchars($this->input->post('password')),
            'otp_verified'      => 0
        );
        
        $result = $this->user_model->register($data, 'individual');
        if($result == "true")
        {
            echo urlencode(base64_encode($this->input->post('email')));
        }
        else
            echo $result;
    }

    //Check phone if exists
    public function check_phone()
    {
        $return = $this->user_model->check_phone($this->input->post('phone'));
        echo json_encode($return);
    }

    //Check email if exists in table user_register
    public function check_email()
    {
        $return = $this->user_model->check_email($this->input->post('email'));
        if(!$return)
            echo "false";
        else
            echo "true";
    }

    //Check email if exists table users
    public function check_email_users()
    {
        if(!$this->user_model->check_email_users($this->input->post('email')))
            echo "false";
        else
            echo "true";
    }


    //Company Register
    public function register_company()
    {
        $data = array(
            'oauth_provider'    => "company",
            'company_name'      => htmlspecialchars($this->input->post('company_name')),
            'representative'    => htmlspecialchars($this->input->post('representative')),
            'phone'             => htmlspecialchars($this->input->post('phone_company')),
            'email'             => htmlspecialchars($this->input->post('email_company')),
            'password'          => htmlspecialchars($this->input->post('password_company')),
            'otp_verified'      => 0
        );
        
        $result = $this->user_model->register_company($data, 'company');
        if($result == "true")
        {
            echo urlencode(base64_encode($this->input->post('email_company')));
        }
        else
            echo $result;
    }

    //===========================================END REGISTRATION========================================================







    //===========================================VERIFY OTP==============================================================

    //Check email if exists and load verify page
    public function verify_page($email = null, $type)
    {  
        $t = "";
        if($type == md5('company'))
            $t = 'company';
        else if($type == md5('individual'))
            $t = 'individual';
        else
            redirect(base_url() . 'home/');

        $d = urldecode($email);
        $e = base64_decode($d);
        $data['email'] = $e;
        $data['type']  = $type;
        
        if($t == 'individual')
        {
            if($this->user_model->check_email($e) || $email == "")
                redirect(base_url() . 'home/');
        }
        else if($t == 'company')
        {
            if($this->user_model->check_email_company($e) || $email == "")
                redirect(base_url() . 'home/');
        }
        else
        {
            redirect(base_url(). "errorpage");
        }

        if($this->user_model->is_otp_verified($e))
            redirect(base_url() . 'home/');

        else
        {
            // $data['userData']['background'] = false;
		    // $data['userData']['title'] = "DesxPert | Verification";
            // $this->load->view('header', $data);
            $this->load->view('user/verify', $data);
            //$this->load->view('footer');
        }    
    }

    //Click submit in verify page
    public function verify_otp()
    {
        $email = base64_decode($this->input->post('email'));
        $otp = htmlspecialchars($this->input->post('otp'));
        $type = htmlspecialchars($this->input->post('type'));
        $t = '';


        if($type == md5('individual'))
            $t = 'individual';
        else if($type == md5('company'))
            $t = 'company';
        else
        {
            echo 'failed';
            exit();
        }

        if($this->user_model->verify_otp($otp, $email))
        {
            $res = $this->user_model->insert_to_user($email, $t);
            if(gettype($res) == "array")
            {
                if($t == 'individual')
                {
                    $userData = array(
                        'oauth_provider'  => $res['oauth_provider'],
                        'oauth_uid'       => $res['oauth_uid'],
                        'fname'           => $res['fname'],
                        'lname'           => $res['lname'],
                        'email'           => $res['email'],
                        'phone'           => $res['phone'],
                        'picture'         => base_url() . 'assets/media/users/' . $res['picture'],
                        'type'            => $res['type'],
                        'name'            => $res['fname']
                    );
                }
                else if($t == 'company')
                {
                    $userData = array(
                        'oauth_provider'  => $res['oauth_provider'],
                        'oauth_uid'       => $res['oauth_uid'],
                        'company_name'    => $res['company_name'],
                        'representative'  => $res['representative'],
                        'email'           => $res['email'],
                        'phone'           => $res['phone'],
                        'picture'         => base_url() . 'assets/media/users/' . $res['picture'],
                        'type'            => $res['type'],
                        'name'            => $res['company_name']
                    );
                }
                

                $this->session->set_userdata('loggedIn', true); 
                $this->session->set_userdata('userData', $userData);

                echo "success";
            }
            else
            {
                echo "failed";
            }
        }
        else
        {
            echo "invalid";
        }
    }

    public function resend_email()
    {
        $email = htmlspecialchars(base64_decode($this->input->post('email')));
        $type = htmlspecialchars($this->input->post('type'));
        $result = $this->user_model->resend_email($email, $type);
        echo json_encode($result);
    }

    //===========================================END VERIFY OTP==========================================================








    //===========================================LOGIN===================================================================
    //Login with google
    public function google()
    {
        if(isset($_GET['code']))
        { 
            // Authenticate user with google 
            if($this->google->getAuthenticate())
            { 
                // Get user info from google 
                $gpInfo = $this->google->getUserInfo(); 
                 
                // Preparing data for database insertion 
                $userData['oauth_provider'] = 'google'; 
                $userData['oauth_uid']      = $gpInfo['id']; 
                $userData['fname']          = $gpInfo['given_name']; 
                $userData['lname']          = $gpInfo['family_name']; 
                $userData['email']          = $gpInfo['email']; 
                $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:''; 
                $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:''; 
                $userData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';
                 
                // Insert or update user data to the database 
                $userID = $this->user_model->check_user($userData);
                $userData['login_type'] = "Google";
                $userData['type'] = "individual";
                 
                // Store the status and user profile info into session 
                $this->session->set_userdata('login_with', "google");
                $this->session->set_userdata('loggedIn', true); 
                $this->session->set_userdata('userData', $userData); 
                 
                // Redirect to profile page 
                header('location: ../user/profile');
            } 
        }
    }

    //Login with facebook
    public function facebook()
    {
        $userData = array(); 
        // Authenticate user with facebook 
        if($this->facebook->is_authenticated())
        { 
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture'); 
 
            $userData['oauth_provider'] = 'facebook'; 
            $userData['oauth_uid']      = !empty($fbUser['id'])?$fbUser['id']:'';; 
            $userData['fname']          = !empty($fbUser['first_name'])?$fbUser['first_name']:''; 
            $userData['lname']          = !empty($fbUser['last_name'])?$fbUser['last_name']:''; 
            $userData['email']          = !empty($fbUser['email'])?$fbUser['email']:''; 
            $userData['gender']         = !empty($fbUser['gender'])?$fbUser['gender']:''; 
            $userData['picture']        = !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''; 
            $userData['link']           = !empty($fbUser['link'])?$fbUser['link']:'https://www.facebook.com/'; 

            $userID = $this->user_model->check_user($userData);

            $userData['login_type'] = "Facebook";
            $userData['locale'] = "N/A";
            $userData['type'] = "individual";
            if(!empty($userID))
            { 
                $data['userData'] = $userData;
                $this->session->set_userdata('login_with', "fb");
                $this->session->set_userdata('loggedIn', true); 
                $this->session->set_userdata('userData', $userData);

                // Redirect to profile page 
                header('location: ../user/profile');
            }
            else
            { 
               $data['userData'] = array(); 
            } 
             
            //$data['logoutURL'] = $this->facebook->logout_url();
        }
    }

    //Login manaully
    public function login()
    {
        $data = array();
        $data['username']   = htmlspecialchars($_POST['username']);
        $data['password']   = htmlspecialchars($_POST['password']);
        $data['login_type'] = $this->check_username_input($data['username']);

        $user = $this->user_model->check_login($data);
        if($user)
        {
            $this->session->set_userdata('loggedIn', true); 
            $this->session->set_userdata('userData', $user);
            echo base_url() . "user/";
        }
        else
        {
            echo false;
        }
    }

    //Book and Login
    public function book_and_login()
    {
        $data = array();
        $data['username']   = htmlspecialchars($_POST['username']);
        $data['password']   = htmlspecialchars($_POST['password']);
        $data['login_type'] = $this->check_username_input($data['username']);
        
        if(isset($_POST['prof_id']))
        {
            $prof_id = htmlspecialchars($_POST['prof_id']);
        
            if($this->professional_model->check_prof_id($prof_id))
            {
                $user = $this->user_model->check_login($data);
                if($user)
                {
                    $this->session->set_userdata('loggedIn', true); 
                    $this->session->set_userdata('userData', $user);
                    echo base_url() . "booking/request/" . $prof_id;
                }
                else
                {
                    echo false;
                }
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

        if($this->session->get_userdata('login_with') == "google")
        {
            $this->google->revokeToken();
        }
        else
        {
            $this->facebook->destroy_session(); 
        } 
        $this->session->unset_userdata('loggedIn'); 
        $this->session->unset_userdata('userData'); 
        $this->session->sess_destroy(); 
        redirect(base_url() . "home/");
    }
    //===========================================END LOGIN==============================================================







    //===========================================LOAD PAGES=============================================================

    //Load Professional Profile
    public function prof($prof_id = null)
    { 
        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'errorpage');
        }  

        if($prof_id)
        {
            $data['userData'] = $this->session->userdata('userData');
            $data['userData']['title'] = "DesxPert | Profile";
            $data['userData']['background'] = true;
            $data['prof'] = $this->professional_model->get_professionals($prof_id);
            if($data['prof'])
            {
                $this->load->view('user/_header', $data);
                $this->load->view('profile', $data);
                $this->load->view('user/_footer');
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

    //Load book now
    public function book()
    {
        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'errorpage');
        } 

        $data['userData'] = $this->session->userdata('userData');
        $data['userData']['title'] = "DesxPert | Book now";
        $data['userData']['background'] = true;
        $data['professionals'] = $this->professional_model->get_professionals();
        $this->load->view('user/_header', $data);
        $this->load->view('user/book', $data);
        $this->load->view('user/_footer', $data);
    }

    //Load user account
    public function account()
    {
        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'errorpage');
        } 

        $data['userData'] = $this->session->userdata('userData');
        $data['userData']['title'] = "DesxPert | My Account";
        $data['userData']['background'] = true;
        $this->load->view('user/_header', $data);
        $this->load->view('user/account', $data);
        $this->load->view('user/_footer', $data);
    }

    //Load my bookings
    public function bookings()
    {
        if(!$this->session->userdata('loggedIn'))
        { 
            redirect(base_url() . 'errorpage');
        } 

        $data['userData'] = $this->session->userdata('userData');
        $data['userData']['title'] = "DesxPert | My Bookings";
        $data['userData']['background'] = true;
        $oauth_uid = $this->session->userdata['userData']['oauth_uid'];
        $data['bookings'] = $this->booking_model->user_bookings($oauth_uid, "Pending");
        $this->load->view('user/_header', $data);
        $this->load->view('user/bookings', $data);
        $this->load->view('user/_footer', $data);
    }

    //===========================================END LOAD PAGES===========================================================







    //===========================================ACCOUNT MANAGEMENT=======================================================

    //Update User Info
    public function update_user_info()
    {
        $oauth_uid = $this->session->userdata['userData']['oauth_uid'];
        $fname     = htmlspecialchars($this->input->post('fname'));
        $lname     = htmlspecialchars($this->input->post('lname'));
        $avatar    = htmlspecialchars($_FILES["profile_avatar"]["name"]);
        $user      = $this->user_model->get_user_data($oauth_uid);
        $error     = "";

        if($avatar)
        {
            $error = $this->do_upload($avatar, $oauth_uid, $user['picture']);
        }

        if($error == "")
        {
            $data = array(
                'fname' => $fname,
                'lname' => $lname
            );

            if($this->user_model->update_user_info($oauth_uid, $data))
            {
                $this->session->userdata['userData']['fname'] = $fname;
                $this->session->userdata['userData']['lname'] = $lname;
                if($avatar)
                {
                    $arr = explode('.', $avatar);
                    $uid = str_replace("=", "", base64_encode($oauth_uid));
                    echo $uid.".".$arr[1];
                }
                else
                    echo "success";
                
            }
            else
            {
                //echo "falied_update_profile";
                echo "failed";
            }
        }
        else
        {
            echo false;
        }
    }

    //Upload picture and Update
    private function do_upload($avatar, $oauth_uid, $user_picture)  
    {  
        //Delete Image if blank.png
        if($user_picture != "blank.png")
        {
            unlink('assets/media/users/' . $user_picture);
        }

        $arr = explode('.', $avatar);
        $uid = str_replace("=", "", base64_encode($oauth_uid));
        $filename = $uid.".".$arr[1];
        $this->load->library('image_lib');

        $config['upload_path']      = './assets/media/users/';
        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['file_name']        = $filename;

        $this->load->library('upload', $config); 

        if(!$this->upload->do_upload('profile_avatar'))
        {  
            return 'failed_upload'; 
        }  
        else  
        {   
            //Resize Image and Upload
            $image_data = $this->upload->data();
            $configer   =  array(
                'image_library'   => 'gd2',
                'source_image'    =>  $image_data['full_path'],
                'maintain_ratio'  =>  TRUE,
                'width'           =>  100,
                'height'          =>  100
            );

            $this->image_lib->clear();
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
            
            if($image_data) 
            {
                //Update picture in database if the current picture is blank.png
                if($user_picture == "blank.png")
                {
                    $upload_data = array(
                        'picture' => $filename
                    );
                    if($this->user_model->update_user_picture($oauth_uid, $upload_data))
                    {
                        $this->session->userdata['userData']['picture'] = base_url().'assets/media/users/'.$filename;
                        return "";
                    }
                    else
                        return "failed_update_picture";
                }
            }
            else
            {
                return "failed_resize";
            }
        } 
    }

    public function change_pass()
    {
        $old_pass  = htmlspecialchars($this->input->post('old_password'));
        $new_pass  = htmlspecialchars($this->input->post('new_password'));
        $oauth_uid = $this->session->userdata['userData']['oauth_uid'];
        echo $this->user_model->update_pass($old_pass, $new_pass, $oauth_uid);
    }  

    //===========================================END ACCOUNT MANAGEMENT===================================================

     
}
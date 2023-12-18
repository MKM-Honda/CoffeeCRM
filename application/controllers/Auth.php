<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Auth_model', 'Trial_model'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function login()
    {
        if ($this->session->userdata('user_logedin') == true) {

            redirect(base_url() . 'kanban');

        } else {

            $this->checking_failed();

            if (isset($_POST['Login']) != 'Login') {
                $this->template->load('template', 'login');
            }else{
                //get data from FORM
                $username =  $this->input->post("username", true);
                $password =  $this->input->post('password', true);

                //checking data via model
                $checking = $this->Auth_model->get_by_username($username);

                if ($username != '' && $password != ''){
                    $check_username = $this->Auth_model->exist_row_check('users', 'username', $username);
                    $check_email = $this->Auth_model->exist_row_check('users', 'email', $username);
                    
                    if ($check_username > 0 || $check_email > 0) {

                        if ($this->bcrypt->check_password($password, $checking->password)) {
                            if ($checking->user_status == "1") {
                                
                                include(APPPATH . 'third_party/MobileDetect/Mobile_Detect.php');
                                $detect = new Mobile_Detect;

                                $session_data = array(
                                    'user_id'           => $checking->user_id,
                                    'user_firstname'    => $checking->user_firstname,
                                    'user_lastname'     => $checking->user_lastname,
                                    'username'     	    => $checking->username,
                                    'level_id'          => $checking->level_id,
                                    'roles_id'          => $checking->roles_id,
                                    'department_id'     => $checking->department_id,
                                    'is_mobile'         => $detect->isMobile(),
                                    'is_tablet'         => $detect->isTablet(),
                                    'user_logedin'      => true,
                                );
                                
                                //update user_lastlog
                                $this->Auth_model->update_lastlog($id= $checking->user_id, $data=date("Y-m-d H:i:s"));

                                $this->login_success();

                                $this->session->set_userdata($session_data);
                                set_cookie('darkmode', 'false', 0);

                                redirect(base_url() . 'mini_dashboard');

                            } else {
                                $data['error'] = "This user is not active";
                                $this->template->load('template', 'login', $data);
                            }
                        } else {
                            $this->login_failed();
                        }
                    } else {
                        $this->login_failed();
                    }
                }else if($username == '' || $password == ''){
                    $data['error'] = "Username or password can't be empty";
                    $this->template->load('template', 'login', $data);
                }
            }
        } 
    }

    public function checking_failed()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $failed = $this->Trial_model->login_failed($ip);

        if ($failed != null){
            if ($failed[0]->attemp_failed >= 3){
                $data['error'] = "<h6>Your IP Address has been permanently blocked after too many failed login attempts!</h6><hr> Please contact our IT Admin.";
                $this->template->load('template', 'blocked_ip', $data);
            }
        }
    }

    public function login_failed()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $failed = $this->Trial_model->login_failed($ip);

        if ($failed == null){
            $body = array(
                'attemp_ipaddress' => $ip,
                'attemp_timestamp' => date('Y-m-d H:i:s'),
                'attemp_failed' => 1
            );
            $this->Trial_model->insert_failed($body);

            $data['error'] = "Username or password is not correct!";
            $this->template->load('template', 'login', $data);
        }else{
            $body2 = array(
                'attemp_timestamp' => date('Y-m-d h:i:s a'),
                'attemp_failed' => $failed[0]->attemp_failed + 1
            );
            $this->Trial_model->update_failed($ip, $body2);

            $data['error'] = "Username or password is not correct!";
            $this->template->load('template', 'login', $data);
        }
    }

    public function login_success()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $failed = $this->Trial_model->login_failed($ip);

        if ($failed != null){
            $body = array(
                'attemp_timestamp' => date('Y-m-d h:i:s a'),
                'attemp_failed' => 0
            );
            $this->Trial_model->update_failed($ip, $body);
        }
    }

    public function logout()
    {
        delete_cookie('darkmode');
        set_cookie('darkmode', 'false', 0);
        $this->session->sess_destroy();
        
        redirect(base_url().'auth/login');
    }
}

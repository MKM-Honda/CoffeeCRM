<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mini_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model(array('Auth_model','Level_model','Group_model','Product_model','Customer_model','Location_model','Prospek_model'));

        if ($this->session->userdata('user_logedin') != 'TRUE') {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $this->template->load('template', 'minidashboard/minidash');
    }

    public function prospect_cmo()
    {
        $start = $this->input->post('start');
        $end = $this->input->post('end');

        if ($start == '' || $end == ''){
            $start = date('Y-m-d');
            $end = date('Y-m-d');
        }

        if ($this->session->userdata('roles_id') == 1)
        {
            $query = $this->Prospek_model->prospect_cmo($start, $end, $userid=null);
        }else{
            $userid = $this->session->userdata('user_id');
            $query = $this->Prospek_model->prospect_cmo($start, $end, $userid);
        }
        echo json_encode($query);
    }


    public function list_leads()
    {
        if ($this->session->userdata('roles_id') == 1)
        {
            $query = $this->Prospek_model->get_leadlist($userid=null);
        }else{
            $userid = $this->session->userdata('user_id');
            $query = $this->Prospek_model->get_leadlist($userid);
        }
        echo json_encode($query);
    }

}

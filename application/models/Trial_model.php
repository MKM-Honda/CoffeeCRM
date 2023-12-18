<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Trial_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login_failed($ip)
    {
        $this->db->select('*');
        $this->db->where('attemp_ipaddress', $ip);
        return $this->db->get('login_failed')->result();
    }

    public function insert_failed($data)
    {
        $this->db->insert('login_failed', $data);
    }

    public function update_failed($ip, $data)
    {
        $this->db->where('attemp_ipaddress', $ip);
        $this->db->update('login_failed', $data);
    }

}

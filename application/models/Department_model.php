<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Department_model extends CI_Model
{
    public $table = 'department';
    public $id = 'department_id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get data 
    public function get_all()
    {
        // $this->db->where('level_status', 1);
        return $this->db->get($this->table)->result();
    }

     // get data 
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
        
    }

     public function get_list()
    {
        return $this->db->get($this->table)->result();
    }
    

    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
  

    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

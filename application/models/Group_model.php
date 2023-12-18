<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Group_model extends CI_Model
{
    public $table = 'groups';
    public $id = 'group_id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get data 
    public function get_all()
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
        $this->db->update('users', $data);
    }
  

    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

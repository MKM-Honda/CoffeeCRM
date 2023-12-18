<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Location_model extends CI_Model
{
    public $table = 'locations';
    public $id = 'location_id';
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

    public function get_sosmed()
    {
        $this->db->where('location_id', '6');
        return $this->db->get('source_details')->result();
    }

     public function get_pameran()
    {
        $this->db->where('location_id', '5');
        $this->db->or_where('location_id', '3');
        return $this->db->get('source_details')->result();
    }

      // get data 
    public function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
        
    }

    public function get_location_details($detail_id)
    {
        $this->db->where($this->id, $detail_id);
        return $this->db->get('source_details')->result();
        
    }
    public function get_count_all()
    {
        $this->db->select('count(*)');
        $this->db->group_by('location_id');
        return $this->db->get('prospek')->result();
    }

    // SECTION DASHBOARD
    public function get_dashboard_location($cmoid, $period,$start, $end)
    {
        $level = $this->session->userdata('level_id');
        if ($cmoid == null) {
            if($start != null && $end != null ){
                $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and pros_date between  '$start'::date and '$end'::date) from locations l";
            }else{
               if ($period == 'monthly') {
                    $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and pros_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' and  date_trunc('month', CURRENT_DATE)- interval '1 days') from locations l";
                } elseif ($period == 'weekly') {
                    $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and  pros_date between  CURRENT_DATE - interval '7 days' and CURRENT_DATE) from locations l";
                } else {
                    $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and pros_date between  date_trunc('month', CURRENT_DATE) and CURRENT_DATE) from locations l";
                } 
            }
        }else{
            if($start != null && $end != null ){
                $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and pros_date between  '$start'::date and '$end'::date and user_id='$cmoid') from locations l";
            }else{
               if ($period == 'monthly') {
                    $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and pros_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' and  date_trunc('month', CURRENT_DATE)- interval '1 days' and user_id='$cmoid') from locations l";
                } elseif ($period == 'weekly') {
                    $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and  pros_date between  CURRENT_DATE - interval '7 days' and CURRENT_DATE and user_id='$cmoid') from locations l";
                } else {
                    $query = "SELECT location_name,(select count(*) from prospek ps where ps.location_id = l.location_id::int and pros_date between  date_trunc('month', CURRENT_DATE) and CURRENT_DATE and user_id='$cmoid') from locations l";
                } 
            }
         }
            
        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }
    // !SECTION DASHBOARD

    // SECTION CRUD LOCATIONS
    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function insert_detail($data)
    {
        $this->db->insert('source_details', $data);
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

    // delete data
    public function delete_details($id)
    {
        $this->db->where('sd_id', $id);
        $this->db->delete('source_details');
    }
    // !SECTION
}

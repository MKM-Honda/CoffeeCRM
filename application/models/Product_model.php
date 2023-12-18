<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Product_model extends CI_Model
{
    public $table = 'product';
    public $id = 'product_id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // NOTE get data
    public function get_all()
    {
        $this->db->join('product_groups', 'product_groups.productgroup_id = (product.product_group)::int', 'left');
        $this->db->where('product_status', '1');
        return $this->db->get($this->table)->result();
    }



    // NOTE get data
    public function get_product_group()
    {
        return $this->db->get('product_groups')->result();
    }

     public function get_product_detail($id)
    {
        $this->db->where('product_group', $id);
        $this->db->where('product_status', '1');
        return $this->db->get('product')->result();
    }


    public function get_list()
    {
        $query = "SELECT *, p.create_at as created_date FROM product p 
        LEFT JOIN product_groups pg ON p.product_group::int=pg.productgroup_id::int 
        LEFT JOIN product_type pt ON p.product_type::int=pt.producttype_id::int
        where product_status='1'";
        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }

    // get data by id
    public function get_by_id($id)
    {
        $this->db->where('product_id', $id);
        return $this->db->get($this->table)->row();
    }

    // get prodcut group 
    public function get_productgroup()
    {
        return $this->db->get('product_groups')->result();
    }

     // get prodcut type 
    public function get_producttype()
    {
        return $this->db->get('product_type')->result();
    }

    public function get_count_all()
    {
        $this->db->select('count(*)');
        $this->db->group_by($this->id);
        return $this->db->get('prospek')->result();
    }

    // SECTION DASHBOARD
    public function get_dashboard_product($cmoid, $period ,$start, $end)
    {
        $level = $this->session->userdata('level_id');
        if ($cmoid == null){
             if($start != null && $end != null ){
                    $query = "SELECT productgroup_name, (select count(*) from prospek ps where ps.product_id = pg.productgroup_id and pros_date  between  '$start'::date and '$end'::date ) from product_groups pg";
            }else{
                if ($period == 'monthly') {
                    $query = "SELECT productgroup_name, (select count(*) from prospek ps where ps.product_id = pg.productgroup_id and pros_date  between date_trunc('month', CURRENT_DATE)- interval '1 month' and  date_trunc('month', CURRENT_DATE)- interval '1 days' ) from product_groups pg";
                } elseif ($period == 'weekly') {
                    $query = "SELECT productgroup_name, (select count(*) from prospek ps where ps.product_id = pg.productgroup_id and  pros_date between  CURRENT_DATE - interval '7 days' and CURRENT_DATE) from product_groups pg";
                } else {
                    $query = "SELECT productgroup_name,(select count(*) from prospek ps where ps.product_id = pg.productgroup_id and pros_date between  date_trunc('month', CURRENT_DATE) and CURRENT_DATE) from product_groups pg";
                }
            }
        }else{
            if($start != null && $end != null ){
                    $query = "SELECT productgroup_name, (select count(*) from prospek ps where ps.product_id = pg.productgroup_id and pros_date  between  '$start'::date and '$end'::date and user_id='$cmoid') from product_groups pg";
            }else{
                if ($period == 'monthly') {
                    $query = "SELECT productgroup_name, (select count(*) from prospek ps where ps.product_id = pg.productgroup_id and pros_date  between date_trunc('month', CURRENT_DATE)- interval '1 month' and  date_trunc('month', CURRENT_DATE)- interval '1 days' and user_id='$cmoid' ) from product_groups pg";
                } elseif ($period == 'weekly') {
                    $query = "SELECT productgroup_name, (select count(*) from prospek ps where ps.product_id = pg.productgroup_id and  pros_date between  CURRENT_DATE - interval '7 days' and CURRENT_DATE  and user_id='$cmoid') from product_groups pg";
                } else {
                    $query = "SELECT productgroup_name,(select count(*) from prospek ps where ps.product_id = pg.productgroup_id and pros_date between  date_trunc('month', CURRENT_DATE) and CURRENT_DATE  and user_id='$cmoid') from product_groups pg";
                }
            }
        }
           
        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }
    // !SECTION DASHBOARD

    // SECTION CRUD PRODUCT
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    // !SECTION CRUD PRODUCT
}

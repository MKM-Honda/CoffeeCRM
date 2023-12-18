<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth_model extends CI_Model
{
    public $table = 'users';
    public $id = 'user_id';
    public $order = 'DESC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all data
    public function get_all()
    {
        $this->db->where('user_status', 1);
        $this->db->where('department_id', 3);
        return $this->db->get($this->table)->result();

    }

    public function get_team_leads()
    {
        return $this->db->get('teams')->result();
    }

    public function list_team()
    {
        $id = $this->session->userdata('user_id');
        $level = $this->session->userdata('level_id');

        $this->db->where('user_status', 1);
        $this->db->where('emp_id', '1');
        if($level == 4){
            $this->db->where('user_id', $id);
        }
        return $this->db->get($this->table)->result();
    }

    public function get_kadiv_name()
    {
        $this->db->where('user_status', 1);
        $this->db->where('department_id', 6);
        return $this->db->get($this->table)->row();
    }

     public function get_pe_name()
    {
        $this->db->where('user_status', 1);
        $this->db->where('department_id', 9);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    public function get_by_id($id)
    {
        $this->db->select('users.*, group_name, level_name, teams_name, department_name, target_name,
        target_prospek, target_kredit, target_survey, target_berjalan, target_pencairan, roles_name');
        $this->db->join('groups', 'users.group_id = groups.group_id', 'LEFT');
        $this->db->join('level', 'users.level_id = level.level_id', 'LEFT');
        $this->db->join('teams', 'users.emp_id = teams.teams_id', 'LEFT');
        $this->db->join('department', 'users.department_id = department.department_id', 'LEFT');
        $this->db->join('target', 'users.group_id = target.group_id', 'LEFT');
        $this->db->join('roles', 'users.roles_id = roles.roles_id', 'LEFT');
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->row();
    }


    // login by username
    public function get_by_username($username)
    {
        $this->db->where('username', $username);
        $this->db->or_where('email', $username);
        return $this->db->get($this->table)->row();
    }

    // row checking for login
    public function exist_row_check($table, $field, $data)
    {
        $this->db->where($field, $data);
        $this->db->from($table);
        $query = $this->db->get();
        return $query->num_rows();
    }


    // list user
    public function list_user()
    {
        $this->db->join('groups', 'users.group_id = groups.group_id', 'LEFT');
        $this->db->join('level', 'users.level_id = level.level_id', 'LEFT');
        $this->db->join('teams', 'users.emp_id = teams.teams_id', 'LEFT');
        $this->db->join('department', 'users.department_id = department.department_id', 'LEFT');
        $this->db->join('roles', 'users.roles_id = roles.roles_id', 'LEFT');
        $this->db->where('user_id !=', 'BPR.00000074');
        $this->db->order_by('users.user_status', 'desc');
        $this->db->order_by('users.user_id', 'asc');

        return $this->db->get($this->table)->result();
    }

    // list cmo
    public function list_cmo()
    {
        $this->db->join('groups', 'users.group_id = groups.group_id', 'LEFT');
        $this->db->join('level', 'users.level_id = level.level_id', 'LEFT');
        $this->db->join('teams', 'users.emp_id = teams.teams_id', 'LEFT');
        $this->db->join('department', 'users.department_id = department.department_id', 'LEFT');
        $this->db->where('user_status', 1);
        $this->db->where('users.department_id', 3);
        return $this->db->get($this->table)->result();
    }

    //get cmo
    public function get_cmo($id, $roles)
    {
        if ($roles != 1) {
            $this->db->where('user_id', $id);
        }
        $this->db->where('user_status', 1);
        $this->db->where('roles_id !=', 1);
        $this->db->where('department_id', 3);
        return $this->db->get($this->table)->result();
    }

    public function sumber_prospek($id, $level)
    {
        if ($level == 4) {
            $this->db->where('user_id', $id);
        }else{
            $this->db->where('user_status', 1);
            $this->db->where('roles_id !=', 1);
            $this->db->where('users.department_id', 3); // CMO
            $this->db->or_where('users.department_id', 9); // PE Marketing
            $this->db->or_where('users.department_id', 14); // CS
            $this->db->or_where('users.department_id', 22); //TL Marketing
        }
        
        $this->db->join('department', 'users.department_id = department.department_id', 'LEFT');

        return $this->db->get($this->table)->result();
    }

    //get pemarketing
    public function get_pemarketing()
    {
        $this->db->where('user_status', 1);
        $this->db->where('department_id', 9);
        return $this->db->get($this->table)->result();
    }

    //get pemarketing
    public function get_kadiv()
    {
        $this->db->where('user_status', 1);
        $this->db->where('department_id', 6);
        return $this->db->get($this->table)->result();
    }

    //get direksi
    public function get_direksi()
    {
        $this->db->where('user_status', 1);
        $this->db->where('department_id', 5);
        return $this->db->get($this->table)->result();
    }

    public function get_team()
    {
        return $this->db->get('teams')->result();
    }

    // get all contract
    public function get_all_contract($id)
    {
        $this->db->join('groups', 'users.group_id = groups.group_id', 'LEFT');
        $this->db->join('level', 'users.level_id = level.level_id', 'LEFT');
        $this->db->join('teams', 'users.emp_id = teams.teams_id', 'LEFT');
        $this->db->join('department', 'users.department_id = department.department_id', 'LEFT');
        $this->db->where('user_status', 1);
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->result();
    }
    
    // get profile
    public function get_profile($id)
    {
        $this->db->select('users.*, level_name, group_name');
        $this->db->join('groups', 'users.group_id = groups.group_id', 'LEFT');
        $this->db->join('level', 'users.level_id = level.level_id', 'LEFT');
        $this->db->where('user_status', 1);
        $this->db->where('user_id', $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // upadate user
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update('users', $data);
    }
  
    // update user password
    public function reset_pass($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update('users', $data);
    }

    // update user last login
    public function update_lastlog($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->set('user_lastlog', $data);
        $this->db->update($this->table);
    }

    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->set('user_status', 0);
        $this->db->update($this->table);
    }
}

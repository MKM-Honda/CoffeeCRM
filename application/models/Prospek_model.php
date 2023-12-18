<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Prospek_model extends CI_Model
{
    public $table = 'prospek';
    public $id = 'pros_id';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_leadlist($userid, $date)
    {
        if ($userid == null){
            $userid = "!= ''";
        }else{
            $userid = "= '$userid'";
        }

        $query ="SELECT p.pros_id, p.pros_date, p.pros_stage,
		p.pros_name, u.username,
        fu.fu_type, fu.fu_next, fu.fu_result, fu.fu_date, fu.fu_note,
        case 
        when fu.fu_date is not null and fu.fu_date = current_date then 'Terlaksana'
        when (fu.fu_date != current_date) and fu.fu_result = 'pending' and fu.fu_next > current_date and fu.fu_date != current_date  then 'Pending'
        when ((fu.fu_date != current_date and fu.fu_date is not null) or fu.fu_date is null) and (fu.fu_next >= current_date and fu.fu_result is null) or (fu.fu_result = 'unreachable' and fu.fu_next >= current_date) or (fu.fu_result = 'pending' and fu.fu_next >= current_date) then 'Terjadwal'
        when ((fu.fu_date != current_date and fu.fu_date is not null) or fu.fu_date is null) and ((fu.fu_next < current_date and (fu.fu_result = 'unreachable' or fu.fu_result is null)) or (fu.fu_result = 'pending' and fu.fu_next < current_date)) then 'Terlewati'
        end status

        from prospek p
        LEFT JOIN users u on u.user_id = p.user_id
		LEFT JOIN follow_up fu ON fu.fu_id=p.fu_id
        where date_part('year', pros_date) = date_part('year', CURRENT_DATE) and p.user_id".$userid."
        and p.pros_stage = 1
		order by p.pros_date desc, p.pros_id desc";

        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }

    // cmo prospect
    public function prospect_cmo($start, $end, $userid)
    {
        if ($userid == null){
            $userid = "!= ''";
        }else{
            $userid = "= '$userid'";
        }

        $query = "SELECT  u.user_firstname, u.user_lastname, u.user_avatar,
        (select count(pros_id) from prospek where prospek.user_id = u.user_id 
        and pros_date between '$start'::date and '$end'::date and date_part('year', pros_date) = date_part('year', CURRENT_DATE) ) as count_prospek,
        (select count(pros_id) from prospek where prospek.user_id = u.user_id 
        and date_part('year', pros_date) = date_part('year', CURRENT_DATE) ) as total_prospek,
        (select count(pros_id) from prospek where prospek.user_id = u.user_id and pros_stage = 7
        and date_part('year', pros_date) = date_part('year', CURRENT_DATE) ) as count_trash
            
        from users u
        
        where u.user_status = '1' and u.level_id = '4'
        and u.user_id".$userid;

        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }

}

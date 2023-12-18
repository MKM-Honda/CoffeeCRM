<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customer_model extends CI_Model
{
    public $table = 'customer';
    public $id = 'cust_id';


    public function __construct()
    {
        parent::__construct();
    }

    public function check_acc($pros_id)
    {
        $this->db->select('slikfile_verif, attach_verif, cust_verif, infile_verif, mortfile_verif, addfile_verif, ankredit_verif');
        $this->db->where('fs.pros_id', $pros_id);
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');

        return $this->db->get('file_slik fs')->row();
    }

    // get data by hp
    public function get_by_hp($cust_hp)
    {
        $this->db->where('cust_hp', $cust_hp);
        return $this->db->get($this->table)->row();
    }

    public function get_rules_config()
    {
        $this->db->select('config_value');
        $this->db->where('config_group', '4');
        return $this->db->get('configurations')->result();
    }

    public function get_cust($pros_id)
    {
        $this->db->select();
        $this->db->join('customer_details', 'customer.cust_id = customer_details.cust_id', 'left');
        $this->db->where('pros_id', $pros_id);
        return $this->db->get($this->table)->row();
    }

    public function get_custname($pros_id)
    {
        $this->db->select('pros_id, cust_fullname');
        $this->db->where('pros_id', $pros_id);
        return $this->db->get($this->table)->row();
    }

    // get data by id
    public function get_by_id($pros_id)
    {
        $this->db->join('customer_details', 'customer.cust_id = customer_details.cust_id', 'left');
        $this->db->join('customer_job', 'customer.cust_id = customer_job.cust_id', 'left');
        $this->db->join('customer_business', 'customer.cust_id = customer_business.cust_id', 'left');
        $this->db->join('partner_job', 'customer.cust_id = partner_job.cust_id', 'left');
        $this->db->join('partner_business', 'customer.cust_id = partner_business.cust_id', 'left');
        $this->db->join('customer_contact', 'customer.cust_id = customer_contact.cust_id', 'left');
        $this->db->join('customer_finance', 'customer.cust_id = customer_finance.cust_id', 'left');
        $this->db->join('customer_loan', 'customer.cust_id = customer_loan.cust_id', 'left'); 
        $this->db->join('product_type', "product_type.producttype_id = (customer_loan.custloan_mortgage)::INT", 'left'); 
        $this->db->where('pros_id', $pros_id);
        return $this->db->get($this->table)->row();
    } 

    // get verfification status
    public function get_verif_status($pros_id)
    {
        $this->db->select('c.cust_id as custid, *');
        $this->db->where('fs.pros_id', $pros_id);
        $this->db->join('attachment', 'fs.pros_id = attachment.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id = fs.pros_id', 'left');
        $this->db->join('customer_details', 'c.cust_id = customer_details.cust_id', 'left');

        return $this->db->get('file_slik fs')->row();
    }

    // get verfification status FROM LIST
    public function get_all_status($pros_id)
    {
        $this->db->select('customer.cust_id as custid, *');
        $this->db->join('customer_details', 'customer.cust_id = customer_details.cust_id', 'left');
        $this->db->join('customer_job', 'customer.cust_id = customer_job.cust_id', 'left');
        $this->db->join('customer_business', 'customer.cust_id = customer_business.cust_id', 'left');
        $this->db->join('partner_job', 'customer.cust_id = partner_job.cust_id', 'left');
        $this->db->join('partner_business', 'customer.cust_id = partner_business.cust_id', 'left');
        $this->db->join('customer_contact', 'customer.cust_id = customer_contact.cust_id', 'left');
        $this->db->join('customer_finance', 'customer.cust_id = customer_finance.cust_id', 'left');
        $this->db->join('customer_loan', 'customer.cust_id = customer_loan.cust_id', 'left'); 
        $this->db->join('product_type', "product_type.producttype_id = (customer_loan.custloan_mortgage)::INT", 'left'); 
        $this->db->join('file_income', 'file_income.cust_id = customer.cust_id', 'left');
        $this->db->join('file_mortgage', 'file_mortgage.cust_id = customer.cust_id', 'left');
        $this->db->join('file_address', 'file_address.cust_id = customer.cust_id', 'left');
        $this->db->join('analisa_kredit', 'analisa_kredit.pros_id = customer.pros_id', 'left');

        $this->db->where('customer.pros_id', $pros_id);
        return $this->db->get($this->table)->row();
    }

    // get all verfification status
    public function get_all_verif_status()
    {
        $this->db->select('fs.pros_id, cmo_name, pros_name, slikfile_verifnote, cust_verifnote');
        $this->db->join('prospek', 'fs.pros_id = prospek.pros_id', 'left');
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');
        
        $this->db->where('slikfile_verif', '2');
        $this->db->or_where('attach_verif', '2');
        $this->db->or_where('cust_verif', '2');
        $this->db->or_where('infile_verif', '2');
        $this->db->or_where('mortfile_verif', '2');
        $this->db->or_where('addfile_verif', '2');
        $this->db->or_where('ankredit_verif', '2');

        return $this->db->get('file_slik fs')->result();
    }

    public function get_all_request_status()
    {
        $this->db->select('fs.pros_id, cmo_name, pros_name, slikfile_requestby, slikfile_requestat, cust_requestby, cust_requestat');
        $this->db->join('prospek', 'fs.pros_id = prospek.pros_id', 'left');
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');
        
        $this->db->where('slikfile_verif', '3');
        $this->db->or_where('attach_verif', '3');
        $this->db->or_where('cust_verif', '3');
        $this->db->or_where('infile_verif', '3');
        $this->db->or_where('mortfile_verif', '3');
        $this->db->or_where('addfile_verif', '3');
        $this->db->or_where('ankredit_verif', '3');

        return $this->db->get('file_slik fs')->result();
    }

    public function get_all_verified_status()
    {
        $this->db->select('distinct(prospek.pros_id), prospek.pros_id, cmo_name, pros_name, slikfile_verifat, cust_verifat');
        $this->db->join('prospek', 'fs.pros_id = prospek.pros_id', 'left');
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');
        
        $this->db->where('slikfile_verif', '1');
        $this->db->where('attach_verif', '1');
        $this->db->where('cust_verif', '1');
        $this->db->where('infile_verif', '1');
        $this->db->where('mortfile_verif', '1');
        $this->db->where('addfile_verif', '1');
        $this->db->where('ankredit_verif', '1');

        return $this->db->get('file_slik fs')->result();
    }

    public function get_all_verif_num()
    {
        $this->db->join('prospek', 'fs.pros_id = prospek.pros_id', 'left');
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');
        
        $this->db->where('slikfile_verif', '3');
        $this->db->or_where('attach_verif', '3');
        $this->db->or_where('cust_verif', '3');
        $this->db->or_where('infile_verif', '3');
        $this->db->or_where('mortfile_verif', '3');
        $this->db->or_where('addfile_verif', '3');
        $this->db->or_where('ankredit_verif', '3');

        return $this->db->get('file_slik fs')->num_rows();
    }

    public function get_all_revised_num()
    {
        $this->db->join('prospek', 'fs.pros_id = prospek.pros_id', 'left');
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');
        
        $this->db->where('slikfile_verif', '2');
        $this->db->or_where('attach_verif', '2');
        $this->db->or_where('cust_verif', '2');
        $this->db->or_where('infile_verif', '2');
        $this->db->or_where('mortfile_verif', '2');
        $this->db->or_where('addfile_verif', '2');
        $this->db->or_where('ankredit_verif', '2');

        return $this->db->get('file_slik fs')->num_rows();
    }

    public function get_all_verified_num()
    {
        $this->db->join('prospek', 'fs.pros_id = prospek.pros_id', 'left');
        $this->db->join('attachment a', 'a.pros_id=fs.pros_id', 'left');
        $this->db->join('customer c', 'c.pros_id=fs.pros_id', 'left');
        $this->db->join('file_income fi', 'fi.cust_id=c.cust_id', 'left');
        $this->db->join('file_mortgage fm', 'fm.cust_id=c.cust_id', 'left');
        $this->db->join('file_address fa', 'fa.cust_id=c.cust_id', 'left');
        $this->db->join('analisa_kredit ak', 'ak.pros_id=c.pros_id', 'left');
        
        $this->db->where('slikfile_verif', '1');
        $this->db->where('attach_verif', '1');
        $this->db->where('cust_verif', '1');
        $this->db->where('infile_verif', '1');
        $this->db->where('mortfile_verif', '1');
        $this->db->where('addfile_verif', '1');
        $this->db->where('ankredit_verif', '1');

        return $this->db->get('file_slik fs')->num_rows();
    }

    // SECTION DASHBOARD
    public function get_dashboard_survey($cmoid, $period,$start, $end)
    {
        $level = $this->session->userdata('level_id');
        if ($cmoid == null) {
            if($start != null && $end != null ){
                $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                    from prospek pr
                    left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between '$start'::date and '$end'::date
                    left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between '$start'::date and '$end'::date
                    left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between '$start'::date and '$end'::date";
            }else{
                if ($period == 'monthly') {
                    $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                        from prospek pr
                        left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' 
                        and  date_trunc('month', CURRENT_DATE)- interval '1 days'
                        left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' 
                        and  date_trunc('month', CURRENT_DATE)- interval '1 days'
                        left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' 
                        and  date_trunc('month', CURRENT_DATE)- interval '1 days'";
                }elseif($period == 'weekly') {
                    $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                        from prospek pr
                        left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between date_trunc('month', CURRENT_DATE)- interval '7 day' and CURRENT_DATE
                        left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between date_trunc('month', CURRENT_DATE)- interval '7 day' and CURRENT_DATE
                        left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between date_trunc('month', CURRENT_DATE)- interval '7 day' and CURRENT_DATE";
                }else{
                    $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                        from prospek pr
                        left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE
                        left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE
                        left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE";
                } 
            }
        }else{
            if($start != null && $end != null ){
                $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                from prospek pr
                left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between '$start'::date and '$end'::date
                left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between '$start'::date and '$end'::date
                left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between '$start'::date and '$end'::date
                where pr.user_id='$cmoid'";    
            }else{
                if ($period == 'monthly') {
                    $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                        from prospek pr
                        left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' 
                        and  date_trunc('month', CURRENT_DATE)- interval '1 days'
                        left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' 
                        and  date_trunc('month', CURRENT_DATE)- interval '1 days'
                        left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between  date_trunc('month', CURRENT_DATE)- interval '1 month' 
                        and  date_trunc('month', CURRENT_DATE)- interval '1 days'
                        where pr.user_id='$cmoid'";
                }elseif($period == 'weekly') {
                    $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                        from prospek pr
                        left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between date_trunc('month', CURRENT_DATE)- interval '7 day' and CURRENT_DATE
                        left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between date_trunc('month', CURRENT_DATE)- interval '7 day' and CURRENT_DATE
                        left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between date_trunc('month', CURRENT_DATE)- interval '7 day' and CURRENT_DATE
                        where pr.user_id='$cmoid'";
                }else{
                    $query = "SELECT count(sha.pros_id) as acc, count(shr.pros_id) as reject, count(shp.pros_id) as pending
                        from prospek pr
                        left join stage_history sha on sha.sh_id = pr.sh_id and sha.stage_name='Kredit Baru' and sha.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE
                        left join stage_history shr on shr.sh_id = pr.sh_id and (shr.stage_name='Reject' or shr.stage_name='Batal') and shr.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE
                        left join stage_history shp on shp.sh_id = pr.sh_id and (shp.stage_name='Prospek' or shp.stage_name='Survey' or shp.stage_name='Proses PK') and shp.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE
                        where pr.user_id='$cmoid'";
                } 
            }
        }

        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }
    // !SECTION DASHBOARD

    public function get_dashboard_interest($cmoid, $period,$start, $end)
    {
        $level = $this->session->userdata('level_id');
        if ($cmoid == null) {
            if($start != null && $end != null ){
                $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                from prospek pr
                left join stage_history sh on sh.sh_id = pr.sh_id
                left join customer c on c.pros_id = pr.pros_id
                left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                where sh.stage_name = 'Kredit Baru' and sh.sh_date between '$start'::date and '$end'::date";
            }else{
                if ($period == 'monthly') {
                    $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                    from prospek pr
                    left join stage_history sh on sh.sh_id = pr.sh_id
                    left join customer c on c.pros_id = pr.pros_id
                    left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                    left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                    left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                    where sh.stage_name = 'Kredit Baru' and sh.sh_date between date_trunc('year', CURRENT_DATE) and CURRENT_DATE + interval '1 year' - interval '1 day'";
                } elseif ($period == 'weekly') {
                    $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                    from prospek pr
                    left join stage_history sh on sh.sh_id = pr.sh_id
                    left join customer c on c.pros_id = pr.pros_id
                    left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                    left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                    left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                    where sh.stage_name = 'Kredit Baru' and sh.sh_date between date_trunc('day', CURRENT_DATE) - interval '7 day' and CURRENT_DATE";
                } else {
                    $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                    from prospek pr
                    left join stage_history sh on sh.sh_id = pr.sh_id
                    left join customer c on c.pros_id = pr.pros_id
                    left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                    left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                    left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                    where sh.stage_name = 'Kredit Baru' and sh.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE";
                }
            }
        }else{
            if($start != null && $end != null ){
                $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                from prospek pr
                left join stage_history sh on sh.sh_id = pr.sh_id
                left join customer c on c.pros_id = pr.pros_id
                left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                where sh.stage_name = 'Kredit Baru' and sh.sh_date between '$start'::date and '$end'::date and pr.user_id='$cmoid'";
            }else{
                if ($period == 'monthly') {
                    $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                    from prospek pr
                    left join stage_history sh on sh.sh_id = pr.sh_id
                    left join customer c on c.pros_id = pr.pros_id
                    left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                    left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                    left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                    where sh.stage_name = 'Kredit Baru' and sh.sh_date between date_trunc('year', CURRENT_DATE) and CURRENT_DATE + interval '1 year' - interval '1 day' and pr.user_id='$cmoid'";
                } elseif ($period == 'weekly') {
                    $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                    from prospek pr
                    left join stage_history sh on sh.sh_id = pr.sh_id
                    left join customer c on c.pros_id = pr.pros_id
                    left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                    left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                    left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                    where sh.stage_name = 'Kredit Baru' and sh.sh_date between date_trunc('day', CURRENT_DATE) - interval '7 day' and CURRENT_DATE and pr.user_id='$cmoid'";
                } else {
                    $query = "SELECT count(clf.cust_id) as menetap, count(clm.cust_id) as menurun, count(cla.cust_id) as annuitas
                    from prospek pr
                    left join stage_history sh on sh.sh_id = pr.sh_id
                    left join customer c on c.pros_id = pr.pros_id
                    left join customer_loan clf on clf.cust_id = c.cust_id and clf.custloan_interest_type = 'Flat'
                    left join customer_loan clm on clm.cust_id = c.cust_id and clf.custloan_interest_type = 'Menurun'
                    left join customer_loan cla on cla.cust_id = c.cust_id and clf.custloan_interest_type = 'Annuitas'
                    where sh.stage_name = 'Kredit Baru' and sh.sh_date between date_trunc('month', CURRENT_DATE) and CURRENT_DATE and pr.user_id='$cmoid'";
                }
            }
        }
           
        $execquery = $this->db->query($query);
        return $execquery->result_array();
    }

    // get data by hp
    public function get_custid($pros_id)
    {
        $this->db->where('pros_id', $pros_id);
        return $this->db->get($this->table)->row();
    }

    //--------------------------CRUD CUSTOMER------------------------------------
    //--------------------------------------------------------------------------

    // insert data
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }

    // update data
    public function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

     // update data
    public function verif_permohonan_data($verif_id, $data)
    {
        $this->db->where($this->id, $verif_id);
        $this->db->update($this->table, $data);
    }

    public function update_verif($prosid, $data)
    {
        $this->db->where('pros_id', $prosid);
        $this->db->update($this->table, $data);
    }


    public function read_verif($cust_id)
    {
        $this->db->where('a', $cust_id);
        return $this->db->get($this->table)->row();
    }


    // delete data
    public function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //------------------------------------END CRUD PROSPEK------------------------------------
    //-----------------------------------------------------------------------------
}

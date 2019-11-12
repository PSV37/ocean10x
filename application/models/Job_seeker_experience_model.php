<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_seeker_experience_model extends MY_Model
{

    protected $_table_name  = 'js_experience';
    protected $_primary_key = 'js_experience_id';
    protected $_order_by    = "js_experience_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function experience_list_by_id($job_seeker_id)
    {
        $this->db->select("*");
        $this->db->from($this->_table_name);
		$this->db->join('designation', 'designation.designation_id = js_experience.designation_id');
		//$this->db->join('company_profile', 'company_profile.company_profile_id = js_experience.company_profile_id');
		$this->db->join('department', 'department.dept_id = js_experience.dept_id');
        $this->db->where('job_seeker_id', $job_seeker_id);
        $this->db->order_by('start_date', "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function experience_list($id)
    {
        $this->db->select("*");
        $this->db->from($this->_table_name);
        $this->db->order_by($this->_primary_key, "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function experience_caculator($job_seeker_id)
    {
       $experience_list=$this->db->select('start_date,end_date')
             ->from($this->_table_name)
              ->where('job_seeker_id', $job_seeker_id)
              ->get()->result();
              $total=array();
            foreach ($experience_list as $experience) {
                $start=$experience->start_date;
                $end=$experience->end_date;
                $total[]= abs(strtotime($end) - strtotime($start));
        }
        return $total[0];

    }


    function search_companies($title){
        $this->db->like('company_name', $title , 'both');
        $this->db->order_by('company_name', 'ASC');
        // $this->db->WHERE('status', '1');
        // $this->db->limit(10);
        return $this->db->get('company_profile')->result();
    }
    
    function search_skills($title){
        $this->db->like('skill_name', $title , 'both');
        $this->db->order_by('skill_name', 'ASC');
        $this->db->WHERE('status', '1');
        // $this->db->limit(10);
        return $this->db->get('skill_master')->result();
    }

    function search_country($title){
        $this->db->like('country_name', $title , 'both');
        $this->db->order_by('country_name', 'ASC');
        return $this->db->get('country')->result();
    }

    function search_city($title){
        $this->db->like('city_name', $title , 'both');
        $this->db->order_by('city_name', 'ASC');
        return $this->db->get('city')->result();
    }

    function search_industry_name($title){
        $this->db->like('job_category_name', $title , 'both');
        $this->db->order_by('job_category_name', 'ASC');
       
        return $this->db->get('job_category')->result();
    }
    
}

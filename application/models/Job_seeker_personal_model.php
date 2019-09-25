<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_seeker_personal_model extends MY_Model {

    protected $_table_name = 'js_personal_info';
    protected $_primary_key = 'job_personal_info_id';
    protected $_order_by = "job_personal_info_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function personalinfo_list_by_id($job_seeker_id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
            $this->db->where('job_seeker_id',$job_seeker_id);
            $this->db->order_by($this->_primary_key,"desc");
            $query = $this->db->get();        
            return $query->row();
    }



  }



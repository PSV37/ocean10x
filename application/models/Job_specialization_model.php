<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_specialization_model extends MY_Model {

    protected $_table_name = 'js_specialization';
    protected $_primary_key = 'js_specialization_id';
    protected $_order_by = "js_specialization_id desc";

    public function __construct()
    {
        parent::__construct();
    }


    public function specialization_by_seeker($job_seeker_id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
            $this->db->where('job_seeker_id',$job_seeker_id);
            $this->db->order_by($this->_primary_key,"desc");
            $query = $this->db->get();        
            return $query->row();
    }

  }


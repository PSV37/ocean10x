<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_reference_model extends MY_Model {

    protected $_table_name = 'js_reference';
    protected $_primary_key = 'js_reference_id';
    protected $_order_by = "js_reference_id desc";

    public function __construct()
    {
        parent::__construct();
    }


    public function reference_list_by_id($job_seeker_id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
			$this->db->join('designation', 'designation.designation_id = js_reference.designation_id');
            $this->db->where('job_seeker_id',$job_seeker_id);
            $this->db->order_by("js_reference_id","desc");
            $query = $this->db->get();        
            return $query->result();
    }

  public function reference_list($id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
            $this->db->order_by("js_reference_id","desc");
            $query = $this->db->get();        
            return $query->result();
    }

  }


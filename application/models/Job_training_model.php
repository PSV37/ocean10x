<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_training_model extends MY_Model {

    protected $_table_name = 'js_training';
    protected $_primary_key = 'js_training_id';
    protected $_order_by = "js_training_id desc";

    public function __construct()
    {
        parent::__construct();
    }


    public function training_list_by_id($job_seeker_id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
			$this->db->join('country', 'country.country_id = js_training.country_id');
			$this->db->join('state', 'state.state_id = js_training.state_id');
			$this->db->join('city', 'city.id = js_training.city_id');
            $this->db->join('passingyear', 'passingyear.passing_id = js_training.training_year');
            $this->db->where('job_seeker_id',$job_seeker_id);
            $this->db->order_by("js_training_id","desc");
            $query = $this->db->get();        
            return $query->result();
    }

  public function training_list($id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
            $this->db->order_by("js_training_id","desc");
            $query = $this->db->get();        
            return $query->result();
    }

  }


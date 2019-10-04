<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_seeker_education_model extends MY_Model {

    protected $_table_name = 'js_education';
    protected $_primary_key = 'js_education_id';
    protected $_order_by = "js_education_id desc";

    public function __construct()
    {
        parent::__construct();
    }


    public function education_list_by_id($job_seeker_id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
			$this->db->join('education_level', 'education_level.education_level_id = js_education.education_level_id');
			$this->db->join('education_specialization', 'education_specialization.id = js_education.specialization_id');
            $this->db->where('job_seeker_id',$job_seeker_id);
            $this->db->order_by("js_year_of_passing","desc");
            $query = $this->db->get();        
            return $query->result();
    }

  public function education_list($id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
            $this->db->order_by("js_education_id","desc");
            $query = $this->db->get();        
            return $query->result();
    }
    
    public function delete_cv($jsid) {
          
$this->db->delete('js_career_info', array('job_seeker_id' => $jsid));
$this->db->delete('js_education', array('job_seeker_id' => $jsid));
$this->db->delete('js_experience', array('job_seeker_id' => $jsid));
$this->db->delete('js_photo', array('job_seeker_id' => $jsid));
$this->db->delete('js_reference', array('job_seeker_id' => $jsid));
$this->db->delete('js_specialization', array('job_seeker_id' => $jsid));
$this->db->delete('js_training', array('job_seeker_id' => $jsid));
$this->db->delete('js_personal_info', array('job_seeker_id' => $jsid));


            return true;
    }
    
    
    

  }


<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_career_model extends MY_Model {

    protected $_table_name = 'js_career_info';
    protected $_primary_key = 'js_career_info_id';
    protected $_order_by = "js_career_info_id desc";

    public function __construct()
    {
        parent::__construct();
    }


    public function js_careerinfo_by_seeker($job_seeker_id) {
           $this->db->select("*");
        $this->db->from($this->_table_name);
 $this->db->where('job_seeker_id', $job_seeker_id);
        
        $this->db->order_by($this->_primary_key, "desc");
        $query = $this->db->get();
        return $query->result();
    }



    public function delete_career($job_seeker_id) {
           $this->db->where('job_seeker_id', $job_seeker_id);
          $this->db->delete($this->_table_name);

}
    





  }


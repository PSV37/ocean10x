<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_seeker_photo_model extends MY_Model {

    protected $_table_name = 'js_photo';
    protected $_primary_key = 'js_photo_id';
    protected $_order_by = "js_photo_id desc";

    public function __construct()
    {
        parent::__construct();
    }


   public function photo_by_seeker($job_seeker_id) {
            $this->db->select("*");
            $this->db->from($this->_table_name);
            $this->db->where('job_seeker_id',$job_seeker_id);
            $this->db->order_by($this->_primary_key,"desc");
            $query = $this->db->get();        
            return $query->row();
    }



    public function get_jobseeker_photo($job_seeker_id)
    {
        $this->db->select('photo_path');
        $this->db->where('job_seeker_id', $job_seeker_id);
        $result = $this->db->get($this->_table_name)->result();
       return $result[0]->photo_path;
    }
	
	public function update_photo_new($data, $id = null)
    {
        $this->db->set($data);
        $this->db->where('job_seeker_id', $id);
        $this->db->update($this->_table_name);
    }


  }



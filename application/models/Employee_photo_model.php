<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_seeker_photo_model extends MY_Model {

    protected $_table_name = 'employee';
    protected $_primary_key = 'emp_id';
    protected $_order_by = "emp_id desc";

    public function __construct()
    {
        parent::__construct();
    }
   
    public function get_employee_photo($emp_id)
    {
        $this->db->select('photo');
        $this->db->where('emp_id', $emp_id);
        $result = $this->db->get($this->_table_name)->result();
       return $result[0]->photo;
    }
    

}



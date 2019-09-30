<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Job_Salary_Range_Model extends MY_Model{

    protected $_table_name = 'job_salary_range';
    protected $_primary_key = 'salary_range_id';
    protected $_order_by = "salary_range_id desc";

    public function __construct()
    {
        parent::__construct();
    }

         public function selected($id=null)
    {
        $salaryrangelist=$this->get();
        $output='';
        foreach($salaryrangelist as $salary)
        {
            $selected=$salary->salary_range_id==$id?'selected="selected"':'';
            $output.=sprintf('<option %s value="%s">%s</option> ',$selected,$salary->salary_range_id,$salary->salary_range_name);
        }
        return $output;
    }



    public function get_job_salrayrange_by_id($id)
    {
        $this->db->select("salary_range_name");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->salary_range_name;
    }

    }


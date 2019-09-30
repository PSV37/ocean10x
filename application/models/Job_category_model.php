<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_Category_Model extends MY_Model{

    protected $_table_name = 'job_category';
    protected $_primary_key = 'job_category_id';
    protected $selected_name = 'job_category_name';
    protected $_order_by = "job_category_id asc";

    public function __construct()
    {
        parent::__construct();
    }

     public function selected($id=null)
    {
        $categorylist=$this->get();
        $output='';
        foreach($categorylist as $category)
        {
            $selected=$category->job_category_id==$id?'selected="selected"':'';
            $output.=sprintf('<option %s value="%s">%s</option> ',$selected,$category->job_category_id,$category->job_category_name);
        }
        return $output;
    }
        

    public function get_job_category_by_id($id)
    {
        $this->db->select("job_category_name");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->job_category_name;
    }

    }


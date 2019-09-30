<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Job_Location_Model extends MY_Model{

    protected $_table_name = 'job_location';
    protected $_primary_key = 'job_location_id';
    protected $_order_by = "job_location_id desc";

    public function __construct()
    {
        parent::__construct();
    }

        public function selected($id=null)
    {
        $joblocationlist=$this->get();
        $output='';
        foreach($joblocationlist as $location)
        {
            $selected=$location->job_location_id==$id?'selected="selected"':'';
            $output.=sprintf('<option %s value="%s">%s</option> ',$selected,$location->job_location_id,$location->job_location_name);
        }
        return $output;
    }

            public function get_location_name_by_id($id)
            {
                $this->db->select("job_location_name");
                $this->db->where($this->_primary_key,$id);
                $result=$this->db->get($this->_table_name)->result();
                return $result[0]->job_location_name;
            }


    }


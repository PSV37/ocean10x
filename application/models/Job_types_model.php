<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_types_model extends MY_Model{

    protected $_table_name = 'job_types';
    protected $_primary_key = 'job_types_id';
    protected $selected_name = 'job_types_name';
    protected $_order_by = "job_types_id asc";

    public function __construct()
    {
        parent::__construct();
    }

     public function selected($id=null)
    {
        $Jobtypeslist=$this->get();
        $output='';
        foreach($Jobtypeslist as $jobtype)
        {
            $selected=$jobtype->job_types_id==$id?'selected="selected"':'';
            $output.=sprintf('<option %s value="%s">%s</option> ',$selected,$jobtype->job_types_id,$jobtype->job_types_name);
        }
        return $output;
    }

       public function selected_types($id=null)
    {
        $Jobtypeslist=$this->get();
        $output='';
        foreach($Jobtypeslist as $jobtype)
        {
            if($jobtype->job_types_name=="Selected Resume "){
              continue;
            }
            $selected=$jobtype->job_types_id==$id?'selected="selected"':'';
            $output.=sprintf('<option %s value="%s">%s</option> ',$selected,$jobtype->job_types_id,$jobtype->job_types_name);
        }
        return $output;
    }
        
        

    }


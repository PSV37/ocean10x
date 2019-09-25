<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Education_level_model extends MY_Model{

    protected $_table_name = 'education_level';
    protected $_primary_key = 'education_level_id';
    protected $_order_by = "education_level_id desc";

    public function __construct()
    {
        parent::__construct();
    }

        public function selected($id=null)
    {
        $education_levellist=$this->get();
        $output='';
        foreach($education_levellist as $v_level)
        {
            $selected=$v_level->education_level_id==$id?'selected="selected"':'';
            $output.=sprintf('<option %s value="%s">%s</option> ',$selected,$v_level->education_level_id,$v_level->education_level_name);
        }
        return $output;
    }

            public function get_education_level_name_by_id($id)
            {
                $this->db->select("education_level_name");
                $this->db->where($this->_primary_key,$id);
                $result=$this->db->get($this->_table_name)->result();
                return $result[0]->education_level_name;
            }


    }


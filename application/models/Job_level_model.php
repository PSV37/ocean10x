<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_Level_Model extends MY_Model
{

    protected $_table_name   = 'job_level';
    protected $_primary_key  = 'job_level_id';
    protected $_order_by     = "job_level_id desc";
    protected $selected_name = 'job_level_name';

    public function __construct()
    {
        parent::__construct();
    }

    public function selected($id = null)
    {
        $joblevellist = $this->get();
        $output       = '';
        foreach ($joblevellist as $job_level) {
            $selected = $job_level->job_level_id == $id ? 'selected="selected"' : '';
            $output .= sprintf('<option %s value="%s">%s</option> ', $selected, $job_level->job_level_id, $job_level->job_level_name);
        }
        return $output;
    }

    public function get_job_level_by_id($id)
    {
        $this->db->select("job_level_name");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->job_level_name;
    }

}

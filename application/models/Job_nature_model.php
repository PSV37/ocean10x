<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_Nature_Model extends MY_Model
{

    protected $_table_name  = 'job_nature';
    protected $_primary_key = 'job_nature_id';
    protected $_order_by    = "job_nature_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function selected($id = null)
    {
        $jobnaturelist = $this->get();
        $output        = '';
        foreach ($jobnaturelist as $nature) {
            $selected = $nature->job_nature_id == $id ? 'selected="selected"' : '';
            $output .= sprintf('<option %s value="%s">%s</option> ', $selected, $nature->job_nature_id, $nature->job_nature_name);
        }
        return $output;
    }

    public function get_job_nature_by_id($id)
    {
        $this->db->select("job_nature_name");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->job_nature_name;
    }

}

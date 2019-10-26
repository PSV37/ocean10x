<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Emp_model extends MY_Model
{

    protected $_table_name  = 'employee';
    protected $_primary_key = 'emp_id';
    protected $_order_by    = "emp_id desc";

    public function __construct()
    {
        parent::__construct();
    }

   

    public function email_check($email)
    {
        $this->db->select("*");
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    


}

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_invoice_model extends MY_Model{

    protected $_table_name = 'package_invoice';
    protected $_primary_key = 'package_invoice_id';
    protected $_order_by = "package_invoice_id asc";

    public function __construct()
    {
        parent::__construct();
    }

         public function invoice_details_id($order_id)
    {
        $this->db->select('*');
        $this->db->where($this->_primary_key,$order_id);
        $this->db->from($this->_table_name);
        $this->db->join('package_order', 'package_order.package_order_id ='.$this->_table_name.'.order_no');
        $query = $this->db->get()->row();
        return $query;
    }


    }


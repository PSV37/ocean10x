<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Login_Model extends MY_Model
{

     protected $_table_name = 'business_admin_tbl';
    protected $_primary_key = 'admin_user_id';
    protected $_order_by = "admin_user_id asc";

    public function __construct()
    {
        parent::__construct();
    }

    public function check_login_info($username,$password) {
            $this->db->select('*');
            $this->db->from($this->_table_name);
            $this->db->where('user_name',$username);
            $this->db->where('password',$password);
            $query = $this->db->get();
            $result=$query->row();
            return $result;
        }


    public function logout()
    {
        $this->session->sess_destroy();
    }

    }


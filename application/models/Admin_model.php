<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Admin_model extends MY_Model
{

     protected $_table_name = 'business_admin_tbl';
    protected $_primary_key = 'admin_user_id';
    protected $_order_by = "admin_user_id asc";

    public function __construct()
    {
        parent::__construct();
    }



    }


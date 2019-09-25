<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Training_user_model extends MY_Model{

    protected $_table_name = 'training_users';
    protected $_primary_key = 'training_user_id';
    protected $_order_by = "training_user_id desc";

    public function __construct()
    {
        parent::__construct();
    }       
        

    }


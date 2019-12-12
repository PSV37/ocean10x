<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employee extends CI_controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_login_model');
        $emp_id = $this->session->userdata('emp_id');
        

    }
    public function index()
    {
        echo $emp_id = $this->session->userdata('emp_id');
        echo $emp_name = $this->session->userdata('name');

        echo "string";
    }
	public function edit_profile()
	{

		echo "string";
	}
}
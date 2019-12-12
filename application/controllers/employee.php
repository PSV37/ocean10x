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
        if ($emp_id != null) {
            redirect('employee', 'refresh');
        }

    }
	public function edit_profile()
	{
		// echo "string";
		$emp_id=$this->session->userdata('emp_id');
		 $whereres = "emp_id='$emp_id'";
        $employee_data= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        print_r($employee_data);
		

	}
}
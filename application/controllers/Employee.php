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
        $this->load->model('Employee_photo_model');
        $emp_id = $this->session->userdata('emp_id');
        echo $emp_id;
        if ($emp_id != null) {
            // redirect('employee/index');
        // $this->load->view('fontend/employee/employee_dashboard');

        }else{
            // redirect('employee_login/index');
        $this->load->view('fontend/employee/login');

        }

    }
    public function index()
    {
        $emp_id = $this->session->userdata('emp_id');
         // $emp_name = $this->session->userdata('name');
        $this->load->view('fontend/employee/employee_dashboard');
        // echo "string";
    }   
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('employee_login');
    }

	public function edit_profile()
	{
        $employee_id=$this->input->post('emp_id');
        if (isset($employee_id) && !empty($employee_id)) {

            $employee_data['emp_no'] = $this->input->post('emp_no');
            $employee_data['emp_name'] = $this->input->post('emp_name');
            $employee_data['email'] = $this->input->post('email');
            $employee_data['mobile'] = $this->input->post('mobile');
            $employee_data['dept_id'] = $this->input->post('dept_id');
            $employee_data['address'] = $this->input->post('address');
            $employee_data['country_id'] = $this->input->post('country_id');
            $employee_data['state_id'] = $this->input->post('state_id');
            $employee_data['city_id'] = $this->input->post('city_id');
            $employee_data['pincode'] = $this->input->post('pincode');
            $employee_data['emp_status'] = $this->input->post('emp_status');
            $employee_data['emp_updated_date'] = date('Y-m-d H:i:s');
            $employee_data['emp_updated_by'] = $employee_id;
            $id = $this->input->post('cid');
            $where['emp_id']=$employee_id;
            $this->Master_model->master_update($employee_data,'employee',$where);
             $whereres = "emp_id='$emp_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        print_r($data['result']['org_id']);
        $data['department'] = $this->Master_model->getMaster('department',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $this->load->view('fontend/employee/employee_edit',$data);
           
        }
        else
        {
		
		$emp_id=$this->session->userdata('emp_id');
		$whereres = "emp_id='$emp_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        $data['department'] = $this->Master_model->getMaster('department',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $this->load->view('fontend/employee/employee_edit',$data);
    }

		


		
	}
}
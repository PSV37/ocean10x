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
        // echo $emp_id;
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
            // $where['emp_id']=$employee_id;
            $this->Master_model->master_update($employee_data,'employee',$where);
             $whereres = "emp_id='$employee_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        $org_id=$data['result']['org_id'];
        $name=$data['result']['emp_name'];
        $wherecond = "company_profile_id='$org_id'";

        $company_info= $this->Master_model->get_master_row('company_profile',$select = FALSE,$wherecond);
        $to_mail= $company_info['company_email'];
        $company_name= $company_info['company_name'];
         



        $data['department'] = $this->Master_model->getMaster('department',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Company Profile details have been successfully updated !</div>');
        $this->load->view('fontend/employee/employee_edit',$data);
        $subject = $name.' Updated profile';
                $message = '
                        <style>
                            .btn-primary,.btn-info{
                                width: 232px;
                                color: #fff;
                                text-align: center;
                                margin: 0 0 0 5%;
                                background-color: #6495ED;
                                padding: 5px;
                                text-decoration: none;
                            }
                        
                        </style>
                    <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                    <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                    <br><br>Hi '.$company_name.',<br>Your Employee '.$name.' Updated Ocean Profile.<br/>
                    Thank You<br>Ocean Team..
                        ';
                         
                   $send = sendEmail_JobRequest($to_mail,$message,$subject);
                   // print_r($message);
        // echo "string";
           
        }
        else
        {
		
		$emp_id=$this->session->userdata('emp_id');
        // print_r($emp_id);   
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
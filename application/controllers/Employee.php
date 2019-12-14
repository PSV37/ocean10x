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
        $this->load->model('job_posting_model');
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

            print_r($employee_id);

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
           
             $where['emp_id']=$employee_id;

         $this->Master_model->master_update($employee_data,'employee',$where);
        // print_r($this->db->last_query());die;       //    
          $whereres = "emp_id='$employee_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        // print_r($this->db->last_query());die;       //    
        // print_r($data);
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
                    Thank You<br>Ocean Team';
                         
                   $send = sendEmail_JobRequest($to_mail,$message,$subject);
                   // echo $send;
        $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Company Profile details have been successfully updated !</div>');
        $this->load->view('fontend/employee/employee_edit',$data);
        
                   // print_r($message);
        // echo "string";
           
        }
        else
        {
		
		$emp_id=$this->session->userdata('emp_id');
        print_r($emp_id);   
		$whereres = "emp_id='$emp_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        $data['department'] = $this->Master_model->getMaster('department',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $this->load->view('fontend/employee/employee_edit',$data);
    }

		


		
	}

    public function change_password()
            {

                if ($_POST) {
                    $emp_id = $this->session->userdata('emp_id');
                    $oldpassword = md5($this->input->post('oldpassword'));
                    $newpassword = array(
                        'password' => md5($this->input->post('newpassword')),
                    );
                    $data = $this->employee_login_model->change_password($emp_id, $oldpassword);
                    if ($data == true) {

                        if ($emp_id) {
                             $where['emp_id']=$emp_id;

                            $this->Master_model->master_update($newpassword,'employee',$where);
                         $whereres = "emp_id='$emp_id'";

                           $result= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
                            $org_id=$result['org_id'];
                            $name=$result['emp_name'];
                            $wherecond = "company_profile_id='$org_id'";

                            $company_info= $this->Master_model->get_master_row('company_profile',$select = FALSE,$wherecond);
                            $to_mail= $company_info['company_email'];
                            $company_name= $company_info['company_name'];
                            $subject = 'Your Employee'.$name.' Updated profile.';
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
                    <br><br>Hi '.$company_name.',<br>Your Employee '.$name.' changed the password of  Ocean Account.<br/>
                    Thank You<br>Ocean Team';
                         
                   $send = sendEmail_JobRequest($to_mail,$message,$subject);
                            $this->session->set_flashdata('change_password',
                                '<span class="label label-info"> Password Changed Sucessfully!</span>');
                            redirect('employee/change_password');
                        }

                    } else {
                        $this->session->set_flashdata('change_password',
                            '<span class="label label-info">Your Old Password Not Found</span>');
                            redirect('employee/change_password');
                        
                    }
                } else {
                    $this->load->view('fontend/employee/change_password');
                }
            }

            public function current_jobs()
            {
                $emp_id=$this->session->userdata('emp_id');   
                $whereres = "emp_id='$emp_id'";
                $result= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
                $employer_id=$result['org_id'];
                $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
                $this->load->view('fontend/employee/active_job.php', compact('company_active_jobs', 'employer_id'));
                // print_r($company_active_jobs);
            }

            public function get_fav_consultants()
            {
                $employer_id=$this->input->post('id');
                // print_r($employee_id);

                $where_cond = "consultant_company_mapping.company_id='$employer_id' AND consultant_company_mapping.is_favourite='yes'";
                $join_cond = array('company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|Left outer');
                $select='company_email';
        
            $result = $this->Master_model->getMaster('consultant_company_mapping',$where = $where_cond, $join =$join_cond, $order = false, $field = false, $select = $select,$limit=false,$start=false, $search=false);
        //     
         if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->company_email;
                echo json_encode($arr_result);

            }

                         

            }
                
}
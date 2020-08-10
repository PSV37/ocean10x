<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employer_Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employer_login_model');
        $company_profile_id = $this->session->userdata('company_profile_id');
        if ($company_profile_id != null) {
            redirect('employer', 'refresh');
        }

    }

    public function index()
    {
        // $data['title'] = 'User Login';
        // $data['subview'] = $this->load->view('login', $data, true);
        $this->load->view('fontend/employer/employer_login');

    }

    public function check_login()
    {

        $redirect         = $this->input->get('redirect');
        $company_email    = $this->input->post('email');
        $company_password = md5($this->input->post('password'));
        $result           = $this->employer_login_model->check_login_info($company_email, $company_password);
        if (!empty($result)) {
            $data['company_profile_id'] = $result->company_profile_id;
            $data['company_name']       = $result->company_name;
            $data['comp_type']          = $result->comp_type;
            $this->session->set_userdata($data);
            $company_profile_id=$this->session->userdata('company_profile_id');
             
            $where="org_id='".$company_profile_id."' and created_by_system='Yes'";
            $emp_data = $this->Master_model->getMaster('employee', $where);
            // print_r($this->db->last_query());die;
            if (isset($emp_data) && empty($emp_data)) {
                 $update_data=array('last_login'=>"0000-00-00 00:00:00");
                 $where11['company_profile_id']=$company_profile_id;
             
                $this->Master_model->master_update($update_data,'company_profile',$where11);

                $data3['org_id'] = $company_profile_id;
                $data3['emp_name'] ='Employee-1';
                $data3['access_to_employee']='Post A job,Add question Bank,Add Consultant,view question bank,CV Bank,Contractis';
               
                $data3['emp_created_date'] = date('Y-m-d H:i:s');
                $data3['user_role']='1';
                $data3['emp_created_by'] = $company_profile_id;
                $data3['created_by_system'] ='Yes';
                $this->Master_model->master_insert($data3,'employee');

                $data1['org_id'] = $company_profile_id;
                $data1['emp_name'] ='Employee-2';
                $data1['access_to_employee']='Post A job,Add Consultant,view question bank CV Bank,Contractis';
                $data1['emp_created_date'] = date('Y-m-d H:i:s');
                $data1['user_role']='2';
                $data1['emp_created_by'] = $company_profile_id;
                $data1['created_by_system'] ='Yes';
                $this->Master_model->master_insert($data1,'employee');

                $data2['org_id'] = $company_profile_id;
                $data2['emp_name'] ='Employee-3';
                $data2['access_to_employee']='view question bank,CV Bank';
                $data2['emp_created_date'] = date('Y-m-d H:i:s');
                $data2['user_role']='3';
                $data2['emp_created_by'] = $company_profile_id;
                $data2['created_by_system'] ='Yes';
                $this->Master_model->master_insert($data2,'employee');
               
            }

            $whereres = "company_profile_id='$company_profile_id'";
            $employer_data= $this->Master_model->get_master_row('company_profile',$select = FALSE,$whereres);
          
            if($employer_data['last_login']=="0000-00-00 00:00:00")
            {
                $this->session->set_flashdata('emp_msg', '<div class="alert alert-success alert-dismissable">Thank You for joining “TheOcean” !</div>');

                $this->session->set_flashdata('emp_msg', '<div class="alert alert-success alert-dismissable">Please fill the details!</div>');
               
        // print_r($this->db->last_query());die;

                $this->session->set_flashdata('emp_msg', '<div class="alert alert-success text-center">“Add Superadmin Details</div>');
                $this->load->view('fontend/employer/Superadmin', $data);
                // redirect('employer/profile_setting');
            }else{
             $this->session->set_flashdata('emp_msg', '<div class="alert alert-success alert-dismissable">Welcome to TheOcean ! You are logged in as Administrator for '.$this->session->userdata('company_name').' !</div>');
             $this->session->set_flashdata('employee', '<div class="alert alert-success alert-dismissable">To start using TheOcean resources, we have created 3 users. Please enter their details !</div>');
               $update_data=array('last_login'=>date('Y-m-d H:i:s'));
          $where11['company_profile_id']=$company_profile_id;
             
        $this->Master_model->master_update($update_data,'company_profile',$where11);
        // print_r($this->db->last_query());die;


                redirect('employer/index');
         }
         
       
        } else {
            $this->session->set_flashdata('emp_msg',
                '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   Incorrect Email or Password Try Again
                  </div>');
            redirect('employer_login');

        }
    }
    
    
    public function forgot_pass()
    {
    	if($this->input->post('email')==''){
    	 $this->load->view('fontend/employer/forgot');
    	 return;
	    }
	 
        $jobseeker_email    = $this->input->post('email');
        $result             = $this->employer_login_model->check_forgot_user_info($jobseeker_email);
        if (!empty($result)) {
            $data['job_seeker_id'] = $result->job_seeker_id;
            $data['user_name']     = $result->user_name;
            $this->session->set_userdata($data);
             $this->session->set_flashdata('invalid', '<div class="alert alert-success text-center">Please check your Email Inbox or Spam folder for the password change secure link !</div>');
            redirect('employer_login');
        } else {
            $this->session->set_flashdata('invalid', '<div class="alert alert-danger text-center">Sorry! Invalid email address provided!</div>');
            redirect('employer_login/forgot_pass');
        }
    }
    
     public function reset_password($hash = '')
    {
    
    	if(!$this->input->post('password')){
    	 $this->load->view('fontend/employer/reset_password');
    	 return;
    	}

        $this->form_validation->set_rules('password', 'password', 'required|max_length[15]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]');
           
        $this->form_validation->set_message('regex_match', 'You must provide One Uppercase,One Lowercase,Numbers and special Character');
        if ($this->form_validation->run() == FALSE)
           {
                $this->load->view('fontend/employer/reset_password');

           } 
	   else{
	    $pass    = md5($this->input->post('password'));
        print_r($hash);

        $whereres = "token='$hash'";
        $employer_data= $this->Master_model->get_master_row('company_profile',$select = FALSE,$whereres);

        $company_email = $employer_data['company_email'];
        $company_password = $employer_data['company_password'];
       
        // print_r($this->employer_login_model->reset_account($hash,$pass));
   
        if ($this->employer_login_model->reset_account($hash,$pass) || ($company_password==$pass)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your password is successfully reset! Please login to access your account!</div>');
            $subject = "Password changed Succcessfully";

            $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Your password changed successfully<br><br><br>

Team ConsultnHire!<br>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                            $send = sendEmail_JobRequest($company_email,$message,$subject);
            redirect('employer_login');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error in verifying your account!</div>');
            redirect('employer_login');
        }
    }

    }
    
}

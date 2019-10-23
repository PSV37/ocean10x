<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employee_Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_login_model');
        $emp_id = $this->session->userdata('emp_id');
        if ($company_profile_id != null) {
            redirect('employee', 'refresh');
        }

    }

    public function index()
    {
        // $data['title'] = 'User Login';
        // $data['subview'] = $this->load->view('login', $data, true);
        $this->load->view('fontend/employee/login');

    }

    public function check_login()
    {

        $redirect         = $this->input->get('redirect');
        $email    = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $result           = $this->employee_login_model->check_login_info($email, $password);
        if (!empty($result)) {
            $data['emp_id'] = $result->emp_id;
            $data['name']       = $result->name;
           
            $this->session->set_userdata($data);
                redirect('employee');
        } else {
            $this->session->set_flashdata('emp_msg',
                '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   Incorrect Email or Password Try Again
                  </div>');
            redirect('employee_login');

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
            $this->session->set_flashdata('invalid', '<div class="alert alert-success text-center">An email has been sent to you to reset password.</div>');
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
	
	    $pass    = md5($this->input->post('password'));
   
        if ($this->employer_login_model->reset_account($hash,$pass)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your password is successfully reset! Please login to access your account!</div>');
            redirect('employer_login');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error in verifying your account!</div>');
            redirect('employer_login');
        }

    }
    
}

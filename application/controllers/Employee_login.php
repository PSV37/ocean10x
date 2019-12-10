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
             $this->session->set_flashdata('emp_msg', "Welcome Admin!");
                redirect('employee_dashboard');
        } else {
            $this->session->set_flashdata('emp_msg',
                '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   Incorrect Email or Password Try Again
                  </div>');
            redirect('employee_login');

        }
    }
    
    
    
   
    
}

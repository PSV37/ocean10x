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
        if ($emp_id != null) {
            redirect('employee/index', 'refresh');
        }

    }

    public function index()
    {
        // $data['title'] = 'User Login';
        // $data['subview'] = $this->load->view('login', $data, true);
        $this->load->view('fontend/employee/login');

    }

    // public function check_login()
    // {
    //     $emp_email    = $this->input->post('email');
    //     $email_password = md5($this->input->post('password'));
    //     $result             = $this->employee_login_model->check_login_info($emp_email,$email_password);
    //      print_r($result);
    //     if ($result) {
    //         $data['emp_id'] = $result->emp_id;
    //         $data['name'] = $result->emp_name;
    //         $this->session->set_userdata($data);
    //         print_r($this->session->userdata());
    //          $this->session->set_flashdata('welcome','Welcome' );
    //            $this->load->view('fontend/employee/employee_dashboard');
    //         // redirect_back();
    //     } else {
    //         $this->session->set_flashdata('invalid', '<div class="alert alert-danger text-center">Sorry! incorrect email or password</div>');
    //         redirect_back();
    //     }
    // }
    


    public function check_login()
    {

        $redirect       = $this->input->get('redirect');
        $emp_email      = $this->input->post('email');
        $emp_password   = md5($this->input->post('password'));
        $result         = $this->employee_login_model->check_login_info($emp_email, $emp_password);
        if (!empty($result)) {
            $data['emp_id'] = $result->emp_id;
            $data['name']       = $result->emp_name;
            $data['company_id']         = $result->org_id;
            $this->session->set_userdata($data);
             $this->session->set_flashdata('welcome', "Welcome Back!");
                redirect('employee/index');
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

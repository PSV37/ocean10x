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
            redirect('employee/index');
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

        $redirect       = $this->input->get('redirect');
        $emp_email      = $this->input->post('email');
        $emp_password   = md5($this->input->post('password'));
        $result         = $this->employee_login_model->check_login_info($emp_email, $emp_password);
        echo $this->db->last_query(); die;
        if (!empty($result)) {
            $data['emp_id'] = $result->emp_id;
            $data['name']       = $result->emp_name;
            $data['company_id'] = $result->org_id;
            $data['photo']      = $result->photo;
            $data['status']      = $result->emp_status;

            if ($data['status']=='1') {
               $this->session->set_userdata($data);
             $this->session->set_flashdata('welcome', '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Welcome '.$data['name'].'</div>');
                redirect('employee/index');
            }elseif ($data['status']=='3') {
               $this->session->set_flashdata('emp_msg',
                '<div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   Your account has been suspended please contact your admin to activate it..
                  </div>');
            redirect('employee_login');
            }


            
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

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
     $this->load->model('login_model');
      $user_id="";
            $user_id=$this->session->userdata('admin_user_id');
                if($user_id!=null) {
                    redirect('admin/dashboard','refresh');
                }
       
    }

    public function index()
    {
        $data['title'] = 'User Login';
        $data['subview'] = $this->load->view('login', $data, true);
        $this->load->view('login', $data);

    }

    public function check_login () {
        $emp_user_name=$this->input->post('user_name');
        $emp_password=md5($this->input->post('password'));
          $result=$this->login_model->check_login_info($emp_user_name,$emp_password);
            if(!empty($result)) {
                $data['admin_user_id']=$result->admin_user_id;
                $data['name']=$result->name;
				$data['UserType']=$result->user_type;
                $this->session->set_userdata($data);
                 redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">User Name or Password Wrong Try Again</div>');
                 redirect('login');
                }
    }
    
    
   


}

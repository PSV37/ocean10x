<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Jobapply extends MY_Fontend_Controller {

   public function __construct()
    {

        parent::__construct();
        // $this->load->model('dashboard_model');
        //$this->load->model('global_model');
    }


   public function check_login()
    {
        $jobseeker_email    = $this->input->post('email');
        $jobseeker_password = md5($this->input->post('password'));
        $result             = $this->Job_seeker_model->check_login_info($jobseeker_email, $jobseeker_password);
        if ($result) {
            $data['job_seeker_id'] = $result->job_seeker_id;
            $data['user_name']     = $result->user_name;
            $this->session->set_userdata($data);
            redirect_back();
        } else {
            $this->session->set_flashdata('invalid', '<div class="alert alert-danger text-center">Sorry! incorrect email or password</div>');
            redirect_back();
        }
    }

}
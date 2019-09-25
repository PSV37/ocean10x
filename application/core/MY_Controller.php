<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

       // $this->load->model('login_model');
        $this->load->model('job_category_model');
        $this->load->model('public_demand_model');
        $this->load->model('admin_model');
        $this->load->model('job_seeker_model');
        $this->load->model('job_location_model');
        $this->load->model('job_level_model');
        $this->load->model('job_nature_model');
        $this->load->model('job_salary_range_model');
        $this->load->model('company_profile_model');
        $this->load->model('job_posting_model');
        $this->load->model('job_types_model');
        $this->load->model('Job_seeker_experience_model');
        $this->load->model('job_apply_model');
        $this->load->model('Job_seeker_education_model');
        $this->load->model('Job_reference_model');
        $this->load->model('Job_training_model');
        $this->load->model('Job_specialization_model');
        $this->load->model('Job_seeker_photo_model');
        $this->load->model('Job_language_model');
        $this->load->model('Job_career_model');
        $this->load->model('education_level_model');
        $this->load->model('training_info_model');
        $this->load->library('form_validation');
        $this->load->model('training_user_model');
        $this->load->helper('form');
        $this->load->library("pagination");

         $user_id=$this->session->userdata('admin_user_id');
            if($user_id==null) {
                redirect('index.php/login','refresh');
         } 
        //$this->load->model('global_model');


        // // Login check
        // $exception_uris = array(
        //     'login',
        //     'login/logout',
        // );
        // if (in_array(uri_string(), $exception_uris) == false) {
        //     if ($this->login_model->loggedin() == false) {
        //         redirect('login');
        //     }
        // }




    }
}

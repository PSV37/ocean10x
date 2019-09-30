<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Seeker_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
      $this->load->model('Job_seeker_model');
      $this->load->model('job_seeker_personal_model');
      $this->load->model('Job_seeker_education_model');
      $this->load->model('Job_seeker_experience_model');
      $this->load->model('public_demand_model');
      $this->load->model('job_level_model');
      $this->load->model('job_nature_model');
      $this->load->model('Job_specialization_model');
      $this->load->model('Job_seeker_photo_model');
      $this->load->model('Job_language_model');
      $this->load->model('Job_career_model');
      $this->load->model('Job_reference_model');
      $this->load->model('Job_training_model');
      $this->load->model('education_level_model');
      $this->load->model('company_profile_model');
      $this->load->model('job_posting_model');
      $this->load->model('job_apply_model');
      $this->load->model('job_category_model');
      $this->load->library("pagination");
      $this->load->model('training_info_model');

    }


}

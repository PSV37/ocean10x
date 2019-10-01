<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_posting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'job_slugs',
            'table' => 'job_posting',
        );
        $this->load->library('slug', $config);
    }

    /*** Dashboard ***/

    public function index()
    {
        $title = "Create New Job";
        $this->load->view('admin/jobsetting/createjob', compact('title'));
    }

    public function save_job($id = null)
    {
        // $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
        // $this->form_validation->set_rules('job_category', 'Job Category', 'trim|required');
        // $this->form_validation->set_rules('salary_range', 'Salary Offered', 'trim|required');
        // $this->form_validation->set_rules('job_level', 'Job Level', 'trim|required');
        // $this->form_validation->set_rules('job_nature', 'Job Nature', 'trim|required');
        // $this->form_validation->set_rules('job_location', 'Job Location', 'trim|required');
        // $this->form_validation->set_rules('working_hours', 'Working Hours', 'trim|required');
        // $this->form_validation->set_rules('company_profile_id', 'Select Compnay', 'trim|required');
        // $this->form_validation->set_rules('preferred_age', 'Preferred Age', 'trim|required');

        // $this->form_validation->set_rules('job_status', 'Job Status', 'trim|required');
        // $this->form_validation->set_rules('job_types', 'Job Types', 'trim|required');
        // $this->form_validation->set_rules('preferred_age', 'Preferred Age', 'trim|required');

        // $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');

        $job_info = array(
            'job_title'          => $this->input->post('job_title'),
            'company_profile_id' => $this->input->post('company_profile_id'),
            'job_desc'           => $this->input->post('job_desc'),
            'education'          => $this->input->post('education'),
            'benefits'           => $this->input->post('benefits'),
            'experience'         => $this->input->post('experience'),
            'job_edu'            => $this->input->post('job_edu'),
            'no_jobs'            => $this->input->post('no_jobs'),
                       
                                   
            'job_category'       => $this->input->post('job_category'),
            'job_location'       => $this->input->post('job_location'),
            'job_nature'         => $this->input->post('job_nature'),
            'job_slugs'          => $this->slug->create_uri($this->input->post('job_title')),
            'job_status'         => $this->input->post('job_status'),
            'job_types'          => $this->input->post('job_types'),
            'job_level'          => $this->input->post('job_level'),
            'salary_range'       => $this->input->post('salary_range'),
            "job_deadline"       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('job_deadline')))),
            'preferred_age'      => $this->input->post('preferred_age'),
            'working_hours'      => $this->input->post('working_hours'),
        );
        // var_dump($job_info);
        //  exit();
        if (empty($id)) {
            $this->job_posting_model->insert($job_info);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Job Sucessfully Posting</div>');
            redirect('admin/job_posting');
        } else {
            $this->job_posting_model->update($job_info, $id);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Sucessfully Update</div>');
            redirect_back();
        }
    }

    public function edit_jobs($id)
    {
        $title    = "Jobs Edit";
        $job_info = $this->job_posting_model->get($id);
        $this->load->view('admin/jobsetting/createjob', compact('job_info', 'title'));
    }

}

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_level extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   
        $title = 'Add Job Level';
        $all_joblevels=$this->job_level_model->get();
        $this->load->view('admin/jobsetting/joblevel', compact('all_joblevels','title'));
    }


    public function save_level($id = null){
        $job_level=array(
            'job_level_name' => $this->input->post('job_level_name'),
            );
        if(empty($id)){
            $this->job_level_model->insert($job_level);
            redirect('admin/job_level');
        }
        else {
        $this->job_level_model->update($job_level,$id);
            redirect('admin/job_level');
        }
    }

    public function delete_level($id) {
        $this->job_level_model->delete($id);
        redirect('admin/job_level');
    }

    public function edit_level($id){
        $title="Job Level Edit";
         $all_joblevels=$this->job_level_model->get();
        $joblevel_info=$this->job_level_model->get($id);
        $this->load->view('admin/jobsetting/joblevel',compact('all_joblevels','joblevel_info','title'));
    }

}

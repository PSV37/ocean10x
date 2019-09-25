<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_Nature extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   
        $title = 'Add Job Nature';
        $all_jobnatures=$this->job_nature_model->get();
        $this->load->view('admin/jobsetting/jobnature', compact('all_jobnatures','title'));
    }


    public function save_nature($id = null){
        $job_nature=array(
            'job_nature_name' => $this->input->post('job_nature_name'),
            );
        if(empty($id)){
            $this->job_nature_model->insert($job_nature);
            redirect('admin/job_nature');
        }
        else {
        $this->job_nature_model->update($job_nature,$id);
            redirect('admin/job_nature');
        }
    }

    public function delete_nature($id) {
        $this->job_nature_model->delete($id);
        redirect('admin/job_nature');
    }

    public function edit_nature($id){
        $title="Job nature Edit";
         $all_jobnatures=$this->job_nature_model->get();
        $jobnature_info=$this->job_nature_model->get($id);
        $this->load->view('admin/jobsetting/jobnature',compact('all_jobnatures','jobnature_info','title'));
    }

}

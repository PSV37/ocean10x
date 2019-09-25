<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Job_category extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   
        $title = 'Add Job Category';
        $all_category=$this->job_category_model->get();
        $this->load->view('admin/jobsetting/category', compact('all_category','title'));
    }


    public function save_category($id = null){
        $job_category=array(
            'job_category_name' => $this->input->post('category_name'),
            );
        if(empty($id)){
            $this->job_category_model->insert($job_category);
            redirect('admin/job_category');
        }
        else {
        $this->job_category_model->update($job_category,$id);
            redirect('admin/job_category');
        }
    }

    public function delete_category($id) {
        $this->job_category_model->delete($id);
        redirect('admin/job_category');
    }

    public function edit_category($id){
        $title="Category Edit";
         $all_category=$this->job_category_model->get();
        $category_info=$this->job_category_model->get($id);
        $this->load->view('admin/jobsetting/category',compact('all_category','category_info','title'));
    }

}

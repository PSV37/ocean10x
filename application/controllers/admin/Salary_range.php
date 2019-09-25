<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Salary_range extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   
        $title = 'Add Job Salary Range';
        $all_salaryranges=$this->job_salary_range_model->get();
        $this->load->view('admin/jobsetting/salaryrange', compact('all_salaryranges','title'));
    }


    public function save_salaryrange($id = null){
        $salary_range=array(
            'salary_range_name' => $this->input->post('salary_range_name'),
            );
        if(empty($id)){
            $this->job_salary_range_model->insert($salary_range);
            redirect('admin/salary_range');
        }
        else {
        $this->job_salary_range_model->update($salary_range,$id);
            redirect('admin/salary_range');
        }
    }

    public function delete_salaryrange($id) {
        $this->job_salary_range_model->delete($id);
        redirect('admin/salary_range');
    }

    public function edit_salaryrange($id){
        $title="Job Salary Range Edit";
         $all_salaryranges=$this->job_salary_range_model->get();
        $salaryrange_info=$this->job_salary_range_model->get($id);
        $this->load->view('admin/jobsetting/salaryrange',compact('all_salaryranges','salaryrange_info','title'));
    }

}

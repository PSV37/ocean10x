<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Education_specialization extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $title = 'Add Education Specialization';
        $all_educationlevels=$this->education_level_model->get();
        $this->load->view('admin/jobsetting/education_specialization', compact('all_educationlevels','title'));
    }


    //     public function save_educaiton($id = null){
    //         // var_dump($id); die;
    //         $education_level=array(
    //             'education_level_name' => $this->input->post('education_level_name'),
    //             );
    //         if(empty($id)){
    //             $this->education_level_model->insert($education_level);
    //             redirect('admin/education_level');
    //         }
    //         else {
    //         $this->education_level_model->update($education_level,$id);
    //             redirect('admin/education_level');
    //         }
    //     }

    // public function delete_education_level($id) {
    //     $this->education_level_model->delete($id);
    //     redirect('admin/education_level');
    // }

    // public function edit_education_level($id){
    //     $title="education_level Edit";
    //      $all_educationlevels=$this->education_level_model->get();
    //     $educaiton_level_info=$this->education_level_model->get($id);
    //     $this->load->view('admin/jobsetting/education_level',compact('all_educationlevels','educaiton_level_info','title'));
    // }



}

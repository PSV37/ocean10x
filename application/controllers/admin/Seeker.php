<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Seeker extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


    public function index(){

        $title= "Seeker List";
        $seekerlist=$this->job_seeker_model->seeker_list();
        $this->load->view('admin/seeker/seeker_list',compact('seekerlist','title'));
    }

    public function active_seeker(){
        $title= "Active Seeker List";
        $activeseekerlist=$this->job_seeker_model->active_seeker_list();
        $this->load->view('admin/seeker/active_seeker',compact('activeseekerlist','title'));
    }

        public function deactive_seeker(){
        $title= "Deactive Seeker List";
        $deactiveseekerlist=$this->job_seeker_model->deactive_seeker_list();
        $this->load->view('admin/seeker/deactive_seeker',compact('deactiveseekerlist','title'));
    }

    public function experience_cv(){
        $title= "Experience Seeker List";
        $experience_cvlist=$this->job_seeker_model->experience_cv();
         $this->load->view('admin/seeker/experience_seeker',compact('experience_cvlist','title'));
    }

    public function internship_cv(){
        $title= "Enternship Seeker List";
        $enternship_cvlist=$this->job_seeker_model->internship_cv();
         $this->load->view('admin/seeker/internship_seeker',compact('enternship_cvlist','title'));
    }


    public function delete_seeker($seeker_id){
        $this->job_seeker_model->delete($seeker_id);
        redirect_back();
    }


       public function downloadcv_admin($jobseeker_id)
    {
        $resume          = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
        $edcuaiton_list  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        $training_list   = $this->Job_training_model->training_list_by_id($jobseeker_id);
        $reference_list  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
        $this->load->view('fontend/downloadcv', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list','language_list'));
    }



}

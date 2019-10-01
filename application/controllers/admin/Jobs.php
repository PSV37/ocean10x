<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Jobs extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }


        public function index()
    {      
        $title = 'All Jobs';
        $all_jobs=$this->job_posting_model->get();
        $this->load->view('admin/jobs/all_jobs', compact('all_jobs','title'));
    }


    /*** Dashboard ***/
    public function active_selected_job()
    {      
        $title = 'Selected Job';
        $all_selectedjobs=$this->job_posting_model->get_active_selected_jobs();
        $this->load->view('admin/jobs/active_selected_job', compact('all_selectedjobs','title'));
    }

        public function bank_books()
    {      
        $title = 'Bank Books';
        $all_bank_books=$this->job_posting_model->get_active_banks_book();
        $this->load->view('admin/jobs/bank_books.php', compact('all_bank_books','title'));
    }

          public function university_jobs()
    {      
        $title = 'University Jobs';
        $university_jobs=$this->job_posting_model->get_active_university_job();
        $this->load->view('admin/jobs/university_jobs.php', compact('university_jobs','title'));
    }

     public function training()
    {      
        $title = 'Training';
        $training=$this->job_posting_model->get_active_training();
        $this->load->view('admin/jobs/training.php', compact('training','title'));
    }



       public function active_non_selected_job()
    {      
        $title = 'Selected Job';
        $all_nonselectedjobs=$this->job_posting_model->get_activenonselected_jobs();
        $this->load->view('admin/jobs/active_non_selected_job', compact('all_nonselectedjobs','title'));
    }

        public function deactive_selected_job()
    {      
        $title = 'Selected Job';
        $all_selectedjobs=$this->job_posting_model->get_deactive_selected_jobs();
        $this->load->view('admin/jobs/deactive_selected_job', compact('all_selectedjobs','title'));
    }

       public function deactive_non_selected_job()
    {      
        $title = 'Selected Job';
        $all_nonselectedjobs=$this->job_posting_model->get_deactivenonselected_jobs();
        $this->load->view('admin/jobs/deactive_non_selected_job', compact('all_nonselectedjobs','title'));
    }

    public function pending_jobs()
    {      
        $title = 'Pending Job';
        $all_pendingjobs=$this->job_posting_model->get_pending_jobs();
        $this->load->view('admin/jobs/pending_jobs', compact('all_pendingjobs','title'));
    }

    public function job_details($job_id,$company_id){
        $title = 'Job Details Job';
        $total_applicantlist=$this->job_apply_model->only_job_applicants($job_id,$company_id);
        $job_details=$this->job_posting_model->get($job_id);
        $this->load->view('admin/jobs/job_details', compact('job_id','company_id','job_details','title','total_applicantlist'));
    }

    public function sortlist_cv($job_id,$company_id){
        $title = 'Sortlist CV';
        $sortlist_cvs=$this->job_apply_model->sorlist_applicants_cv($job_id,$company_id);
        $job_details=$this->job_posting_model->get($job_id);
        $this->load->view('admin/jobs/sortlist_cv', compact('job_id','company_id','job_details','title','sortlist_cvs'));
    }

    public function interview_cv($job_id,$company_id){
        $title = 'Interview CV';
        $interview_cvs=$this->job_apply_model->interview_applicants_cv($job_id,$company_id);
        $job_details=$this->job_posting_model->get($job_id);
        $this->load->view('admin/jobs/interview_cv', compact('job_id','company_id','job_details','title','interview_cvs'));
    }


    public function final_cv($job_id,$company_id){
        $title = 'Final  CV';
        $final_cvs=$this->job_apply_model->final_applicants_cv($job_id,$company_id);
        $job_details=$this->job_posting_model->get($job_id);
        $this->load->view('admin/jobs/final_cv', compact('job_id','company_id','job_details','title','final_cvs'));
    }


    public function approve_btn($job_posting_id){
        $this->job_posting_model->approve_job($job_posting_id);
        redirect('admin/jobs/pending-jobs');
    }   

    public function deactive_btn($job_posting_id){
        $this->job_posting_model->deactive_job($job_posting_id);
        // redirect('admin/jobs/deactive_selected_job');
        redirect_back();
    }   

    public function delete_job($id){
        $this->job_posting_model->delete($id);
        redirect('admin/jobs');
    }


}

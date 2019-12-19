<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employee_job extends MY_Employee_Controller
{

public function show($slug = null)
    {
    
        if (!empty($slug) && ($this->job_posting_model->check_slug($slug) == true)) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $job_id       = $this->job_posting_model->get_job_id_by_job_slug($slug);
            $radom_jobs       = $this->job_posting_model->get_random_jobs();

          $employer_id = $this->session->userdata('company_id');

           if(!empty($employer_id)){
                $singlejob    = $this->job_posting_model->get_job_details_employer($job_id);
            }
            else{ 
                $singlejob    = $this->job_posting_model->get_job_details($job_id);
                $totalview=$singlejob->search_view+1;
                $this->job_posting_model->update_Searchview($job_id,$totalview);

                $where_apply = "job_apply.job_seeker_id='$jobseeker_id' AND job_apply.job_post_id='$job_id'";
                $select_status ="job_apply.forword_job_status,job_apply.job_apply_id";
                $forward_status = $this->Master_model->getMaster('job_apply',$where_apply, $join=false, $order = false, $field = false, $select_status,$limit=false,$start=false, $search=false);
           }

       //  print_r($singlejob);

            $this->load->view('fontend/employee/Job_details.php', compact('singlejob', 'jobseeker_id','radom_jobs','forward_status'));
        } else {
            echo "Not Found";
        }

    }
}
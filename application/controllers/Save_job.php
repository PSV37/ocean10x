<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Save_job extends MY_Fontend_Controller {

   public function __construct()
    {

        parent::__construct();
        // $this->load->model('dashboard_model');
        //$this->load->model('global_model');
    }


   public function check_login($slug = null)
    {
        if (!empty($slug) && ($this->job_posting_model->check_slug($slug) == true)) {
            
            $job_id       = $this->job_posting_model->get_job_id_by_job_slug($slug);
            $singlejob    = $this->job_posting_model->get($job_id);

            $jobseeker_email    = $this->input->post('email');
            $jobseeker_password = md5($this->input->post('password'));
            $result             = $this->Job_seeker_model->check_login_info($jobseeker_email, $jobseeker_password);
            if ($result) {
                $data['job_seeker_id'] = $result->job_seeker_id;
                $data['user_name']     = $result->user_name;
                $this->session->set_userdata($data);

                $job_save = $this->Master_model->get_master_row('js_saved_jobs', $select =FALSE ,$where="job_seeker_id='$result->job_seeker_id' AND job_post_id='$job_id'",$join = false); 
            //    echo $this->db->last_query();die;
                if(!empty($job_save))
                {   
                    
                    // redirect('job/show/'.$slug);
                      echo "Not Foundsss"; 
                }else{
                    $sv_info = array(
                    'job_seeker_id'   => $result->job_seeker_id,
                    'job_post_id'     => $job_id,
                    'created_on'      => date('Y-m-d H:i:s'),
                    'created_by'      => $result->job_seeker_id,
                    );
                    $this->Master_model->master_insert($sv_info,'js_saved_jobs');
                    redirect('job/show/'.$slug);
                }

            } else {
                $this->session->set_flashdata('invalid', '<div class="alert alert-danger text-center">Sorry! incorrect email or password</div>');
                redirect_back();
            }

          
        } else {
            echo "Not Found";
        }

       
    }

}
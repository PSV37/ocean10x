<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_applicant extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }



    public function update_sortlist($apply_id){
        $this->job_apply_model->update_sortlist($apply_id);
       	echo "sucess";    
    }

        public function update_interviewlist($apply_id){
        $this->job_apply_model->update_interviewlist($apply_id);
       	echo "sucess";    
    }

    public function update_finallist($apply_id){
        $this->job_apply_model->update_finallist($apply_id);
       	echo "sucess";    
    }


}

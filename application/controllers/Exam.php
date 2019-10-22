<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Exam extends MY_Seeker_Controller
{
    public function __construct()
    {
        parent::__construct();
        $jobseeker_id = $this->session->userdata('job_seeker_id');
        if ($jobseeker_id == null) {
            redirect('register/jobseeker_login', 'refresh');
        }

    }

    /*** Exam Index ***/
    public function index($id = null)
    {   
        $job_id = base64_decode($id);
        if (!empty($job_id)) {
                 
            $data['title'] = 'Exam Instructions';

            $data['job_id'] = $job_id;
            $this->load->view('fontend/exam/exam_instruction',$data);
        } else {
            redirect('/');
        }
       
    }
	public function exam_start($job_id=null)
    {   
        $jobseeker_id = $this->session->userdata('job_seeker_id');
       $job_id = base64_decode($job_id);
        if (!empty($job_id)) {
                 
            $data['title'] = 'Exam Start';

            $whereskill = "job_seeker_id='$jobseeker_id'";
            $data['skills'] = $this->Master_model->getMaster('job_seeker_skills`',$wherechk);

            foreach($data['skills'] as $skill_row)
            {
                $skill_row['skills'];
                
                $wherechk = "skill_name='".$skill_row['skills']."'";
               // $select ="skill_master.id";
                $data['can_skill'] = $this->Master_model->getMaster('skill_master',$wherechk,$join = FALSE, $order = false, $field = false, $select=false,$limit=false,$start=false, $search=false);
               echo $this->db->last_query(); echo "<br><br>";
               foreach($data['can_skill'] as $skill_id)
          
               {
                    $wherechks = "technical_id='".$skill_id['id']."'";
                    $data['questions'] = $this->Master_model->getMaster('questionbank',$wherechks);
                     //echo $this->db->last_query();
               }
                

            }
            // $wherechk = "job_id='$job_id'";
            // $data['topics'] = $this->Master_model->getMaster('job_test_topics',$wherechk);

            $this->load->view('fontend/exam/exam_start',$data);
        } else {
            redirect('Exam');
        }
       
    }
	
	
  
}

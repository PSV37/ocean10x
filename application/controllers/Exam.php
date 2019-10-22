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
            $data['job_id'] = $job_id;

            $whereskill = "job_seeker_id='$jobseeker_id'";
            $data['skills'] = $this->Master_model->getMaster('job_posting`',$wherechk);
            foreach($data['skills'] as $skill_row){}
            
                $skill_id = $skill_row['skills_required'];
                $where_req_skill="technical_id IN (".$skill_id.")";
                
               // $data['questions'] = $this->Master_model->getMaster('questionbank',$where_req_skill);
                $data['questions'] = $this->Master_model->getMaster('questionbank',$where_req_skill,$join = FALSE, $order = false, $field = false, $select = false,$limit='1',$start=false, $search=false);
            // $wherechk = "job_id='$job_id'";
            // $data['topics'] = $this->Master_model->getMaster('job_test_topics',$wherechk);

            $this->load->view('fontend/exam/exam_start',$data);
        } else {
            redirect('Exam');
        }
       
    }
	 
     public function insert_data($id=null)
     {

        $jobseeker_id = $this->session->userdata('job_seeker_id');
        echo $job_id = base64_decode($job_id);
       echo "ques:" .$this->input->post('question_id');
        echo "option2:" .$this->input->post('option2');
       

     }
	
  
}

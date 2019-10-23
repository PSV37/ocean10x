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

            $whereskill = "job_post_id='$job_id'";
            $data['skills'] = $this->Master_model->getMaster('job_posting`',$whereskill);
            foreach($data['skills'] as $skill_row){}

            $skill_id = $skill_row['skills_required'];
            $where_req_skill="technical_id IN (".$skill_id.")";
            
            $data['questions'] = $this->Master_model->getMaster('questionbank',$where_req_skill,$join = FALSE, $order = false, $field = false, $select = false,$limit='1',$start=false, $search=false);
            foreach($data['questions'] as $qrow){}
            $question_id = $qrow['ques_id'];

            $wherechks = "question_id='$question_id'";
            $data['ans'] = $this->Master_model->getMaster('questionbank_answer',$wherechks);
            //echo $this->db->last_query(); echo "<br><br>";
            $this->load->view('fontend/exam/exam_start',$data);
        } else {
            redirect('exam');
        }
       
    }
	 
    public function insert_data()
    {

        $jobseeker_id = $this->session->userdata('job_seeker_id');
       
        $jid= $this->input->post('job_id');
        $job_post_id = base64_decode($jid);

        $data['job_id'] = $job_post_id;
        $question_id = $this->input->post('question_id');
        $option = $this->input->post('option');
      
        $wherechk = "job_id='$job_post_id' AND question_id='$question_id' AND js_id='$jobseeker_id'";
        $testdata= $this->Master_model->master_get_num_rows('js_test_info', $wherechk, $like = false, $join=false, $select = false);
        if($testdata == 0){

            for($i=0;$i<sizeof($option);$i++)
            {
                $where_queans = "question_id='$question_id' AND answer_id='$option[$i]'";
                $test_ans_data= $this->Master_model->getMaster('questionbank_answer', $where_queans, $like = false, $join=false, $select = false);
                if($test_ans_data == true)
                {
                    $status = 'Yes';
                }else{
                    $status = 'No';
                }

                $exam_array = array(
                    'job_id'            => $job_post_id,
                    'js_id'             => $jobseeker_id,  
                    'question_id'       => $question_id,
                    'answer_selected'   => $option[$i],
                    'correct_status'    => $status,
                    'date_time'         => date('Y-m-d H:i:s'),

                );

                $last_id = $this->Master_model->master_insert($exam_array, 'js_test_info');
            }
            // check for next questions
            $whereskill = "job_post_id='$job_post_id'";
            $data['skills'] = $this->Master_model->get_master_row('job_posting', $select ='skills_required' , $whereskill, $join = FALSE);
            $skill_id = $data['skills']['skills_required'];

            $where_que = "job_id='$job_post_id' AND js_id='$jobseeker_id' ";
            $test_data= $this->Master_model->getMaster('js_test_info', $where_que, $like = false, $join=false, $select = false);
            $tested_question=array();
            foreach($test_data as $row_test)
            {
                $qus = $row_test['question_id'];
                array_push($tested_question,$qus);
            }

            $where_req_skill="technical_id IN (".$skill_id.") AND ques_id not in(".implode(',',$tested_question).")";
            $data['questions'] = $this->Master_model->getMaster('questionbank',$where_req_skill,$join = FALSE, $order = false, $field = false, $select = false,$limit='1',$start=false, $search=false);
            $ques_id = $data['questions'][0]['ques_id'];

            $wherechks = "question_id='$ques_id'";
            $data['ans'] = $this->Master_model->getMaster('questionbank_answer',$wherechks);    
                
            $where_last = "job_id='$job_post_id' AND js_id='$jobseeker_id'";
            $data['last_count']= $this->Master_model->getList($condition, $field_by, $order_by, $offset, $perpage, 'js_test_info', $search, $join = FALSE, $where_last, $select = FALSE, $distinct = FALSE, $group_by = 'question_id');

           //echo $this->db->last_query();

           
            // if(!empty($ques_id))
            // {
                 $this->load->view('fontend/exam/exam_next_question',$data);
            // }else{
            //      $this->load->view('fontend/exam/exam_success');
            // }
           

        }else{
            echo "attempted Question";
        }
        

       

    }
	
  
}

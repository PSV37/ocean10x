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
            
            //To get topics fir
            $where_topic="job_id='$job_id'";
            $job_test_topics = $this->Master_model->getMaster('job_test_topics',$where_topic,$join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
            
           foreach($job_test_topics as $topic_row)
           {
            
               $tid = $topic_row['test_question_id']; //test topic primary key
               $topic_id = $topic_row['topic_id'];
               $level = $topic_row['test_level'];
               $no_ques = $topic_row['no_questions'];
                
            $where_topic="topic_id='$topic_id' AND level='$level' LIMIT $no_ques";
            $data['questions'] = $this->Master_model->getMaster('questionbank',$where_topic,$join = FALSE, $order = false, $field = false, $select = false,$limit =false ,$start=false, $search=false);
                
            $question_id = $data['questions'][0]['ques_id'];

            $wherechks = "question_id='$question_id'";
            $data['ans'] = $this->Master_model->getMaster('questionbank_answer',$wherechks);

                echo $this->db->last_query(); echo "<br><br>";
                echo "<pre>";
                print_r($data['ans']);
           }

            
            die;
          // get all requried skills for this job post
            $whereskill = "job_post_id='$job_id'";
            $data['skills'] = $this->Master_model->get_master_row('job_posting', $select ='skills_required' , $whereskill, $join = FALSE);
            $skill_id = $data['skills']['skills_required'];

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
         
            $status = array();
           // $mark ='';
            for($i=0;$i<sizeof($option);$i++)
            {
                $where_queans = "question_id='$question_id' AND answer_id='$option[$i]'";
                $test_ans_data= $this->Master_model->getMaster('questionbank_answer', $where_queans, $like = false, $join=false, $select = false);
                if($test_ans_data == true)
                {
                    $status[]= 'Yes';
                }else{
                    $status[]= 'No';
                }
            }
            if (count(array_unique($status)) === 1 && end($status) === 'Yes') {
                $mark=1;
                $cstatus = 'Yes';
            }else {
                $mark =0;
                $cstatus = 'No';
            } 
            
                $exam_array = array(
                    'job_id'            => $job_post_id,
                    'js_id'             => $jobseeker_id,  
                    'question_id'       => $question_id,
                    //'answer_selected'   => $option[$i],
                    'marks'              => $mark,
                    'correct_status'    => $cstatus,

                    'date_time'         => date('Y-m-d H:i:s'),

                );

                $last_id = $this->Master_model->master_insert($exam_array, 'js_test_info');
            
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
           
            if(count($data['last_count']) < NUMBER_QUESTIONS )
            {
                $this->load->view('fontend/exam/exam_next_question',$data);
            }else{

                $attend_array = array(
                    'is_test_done' => '1',
                );
                $where['job_seeker_id'] = $jobseeker_id;
                $where['job_post_id'] = $job_post_id;
                $this->Master_model->master_update($attend_array,'job_apply',$where);
                // echo $this->db->last_query(); die;
                $this->load->view('fontend/exam/exam_success');
            }
           

        }else{
            echo "attempted Question";
        }
        

       

    }
	
  
}

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
        $jobseeker_id = $this->session->userdata('job_seeker_id');
        $job_id = base64_decode($id);

        if (!empty($job_id)) {
                 
            $data['title'] = 'Exam Instructions';
            $data['job_id'] = $job_id; 
            $temp_array = array();
            //To get topics for exam questions
            $where_topic="job_id='$job_id'";
            $job_test_topics = $this->Master_model->getMaster('job_test_topics',$where_topic,$join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
            if($job_test_topics)
            {
                $exam_question = array();
               
               foreach($job_test_topics as $topic_row)
               {
                    $topic_id = $topic_row['topic_id'];
                    $level = $topic_row['test_level'];
                    $no_ques = $topic_row['no_questions'];
                    
                    $where_topic="topic_id='$topic_id' AND level='$level' LIMIT $no_ques";
                    $questions = $this->Master_model->getMaster('questionbank',$where_topic,$join = FALSE, $order = false, $field = false, $select = false,$limit =false ,$start=false, $search=false);
                    array_push($exam_question,$questions); //push all questions to store in json file
               }
               // check for number of questions and fetch answer
               for($n=0;$n<sizeof($exam_question);$n++)
               {
                  $temp = $exam_question[$n];
                    for($n1=0;$n1<sizeof($temp);$n1++)
                    {
                        $individual_question=array();
                        $question_id = $temp[$n1]['ques_id'];
                        $wherechks = "question_id='$question_id'";
                        $answer = $this->Master_model->getMaster('questionbank_answer',$wherechks);
                        $temp[$n1]['answer']=$answer;
                        $individual_question[]=$temp[$n1];
                        array_push($temp_array, $temp[$n1]);
                    }
               }
               // creating json file of all questions based on topic
               $fp = fopen('./exam_questions/'.$job_id.'_'.$jobseeker_id.'.json', 'w');
               fwrite($fp, json_encode($temp_array));

            }else{
               
                // get all requried skills for this job post
                $whereskill = "job_post_id='$job_id'";
                $data['skills'] = $this->Master_model->get_master_row('job_posting', $select ='skills_required' , $whereskill, $join = FALSE);
                $skill_id = $data['skills']['skills_required'];

                $where_req_skill="technical_id IN (".$skill_id.")";
                $exam_question = $this->Master_model->getMaster('questionbank',$where_req_skill,$join = FALSE, $order = false, $field = false, $select = false,$limit=NUMBER_QUESTIONS,$start=false, $search=false);
               // check for answers
                for($n1=0;$n1<sizeof($exam_question);$n1++)
                {
                    $individual_question=array();
                    $question_id = $exam_question[$n1]['ques_id']; 
                    $wherechks = "question_id='$question_id'";
                    $answer = $this->Master_model->getMaster('questionbank_answer',$wherechks);
                    $exam_question[$n1]['answer']=$answer;
                    $individual_question[]=$exam_question[$n1];
                    array_push($temp_array, $exam_question[$n1]);
                }
                
                $fp = fopen('./exam_questions/'.$job_id.'_'.$jobseeker_id.'.json', 'w');
                fwrite($fp, json_encode($temp_array));

            }
          
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

             $start_array = array(
                'is_test_done' => '2',
            );
            $where_start['job_seeker_id'] = $jobseeker_id;
            $where_start['job_post_id']   = $job_id;
            $start_status = $this->Master_model->master_update($start_array,'job_apply',$where_start);
           // if($start_status)
           // {
                $str = file_get_contents('./exam_questions/'.$job_id.'_'.$jobseeker_id.'.json');
                $json = json_decode($str, true);

                foreach ($json  as $value) {
                   $data['questions'] = $value;
                   break;
                }
                
                $this->load->view('fontend/exam/exam_start',$data);
           // }

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
        $status = array();
        $str = file_get_contents('./exam_questions/'.$job_post_id.'_'.$jobseeker_id.'.json');

        $json = json_decode($str, true);

        foreach ($json  as $value) {
           $data['questions'] = $value;
           break;
        }
        // print_r($data['questions']);
        // print_r($data['questions']['answer']);
        for($q=0;$q<sizeof($data['questions']['answer']);$q++)
        {
             $answer_id = $data['questions']['answer'][$q]['answer_id'];
            $status = array();
            for($i=0;$i<sizeof($option);$i++)
            {   
                echo $option[$i]; echo "<br>";
                echo $answer_id;
                if($answer_id == $option[$i])
                {
                    $status[]= 'Yes';
                }else{
                    $status[]= 'No';
                }
            }
        }
        // if($question_id == $data['questions']['ques_id'])
        // {
        //     echo "Yes";
            //unset($data['questions']['ques_id']);
//             echo array_shift($a)."<br>";
// print_r ($a);
        // }
        // else{
        //     echo "No";
        // }
        // print_r($data['questions']); 
        die;







        $wherechk = "job_id='$job_post_id' AND question_id='$question_id' AND js_id='$jobseeker_id'";
        $testdata= $this->Master_model->master_get_num_rows('js_test_info', $wherechk, $like = false, $join=false, $select = false);

        if($testdata == 0){
            $status = array();
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

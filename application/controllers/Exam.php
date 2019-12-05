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
    
            $str = file_get_contents('./exam_questions/'.$job_id.'_'.$jobseeker_id.'.json');
            $json = json_decode($str, true);

            foreach ($json  as $value) {
               $data['questions'] = $value;
               break;
            }
            
            $this->load->view('fontend/exam/exam_start',$data);

        } else {
            redirect('exam');
        }
       
    }

    
    public function restart_exam($job_id=null)
    {   
        $jobseeker_id = $this->session->userdata('job_seeker_id');
        $job_id = base64_decode($job_id);
        if (!empty($job_id)) {
                 
            $data['title'] = 'Exam Restart';
            $data['job_id'] = $job_id;
            
            $where_time = "job_id='$job_id' AND job_seeker_id='$jobseeker_id' ORDER BY id DESC";
            $data['exam_previous_time'] = $this->Master_model->get_master_row('js_exam_session_info', $select ='exam_time' , $where_time, $join = FALSE);
           
            $str = file_get_contents('./exam_questions/'.$job_id.'_'.$jobseeker_id.'.json');
            $json = json_decode($str, true);
        
            foreach ($json  as $value) {
               $data['questions'] = $value;
               break;
            }

            
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
        $status = array();
        $str = file_get_contents('./exam_questions/'.$job_post_id.'_'.$jobseeker_id.'.json');

        $json = json_decode($str, true);

        foreach ($json  as $value) {
           $data['questions'] = $value;
           break;
        }
       
        for($q=0;$q<sizeof($data['questions']['answer']);$q++)
        {
            $answer_id = $data['questions']['answer'][$q]['answer_id'];
            
            for($i=0;$i<sizeof($option);$i++)
            {   
                if($answer_id == $option[$i])
                {
                     $status[]= 'Yes';
                }else{
                     $status[]= 'No';
                }
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
            'marks'             => $mark,
            'correct_status'    => $cstatus,
            'date_time'         => date('Y-m-d H:i:s'),
        );
        $last_id = $this->Master_model->master_insert($exam_array, 'js_test_info');
        if($last_id)
        {
            array_shift($json); // remove completed element from json array
           // update json file with remaining questions
           $fp = fopen('./exam_questions/'.$job_post_id.'_'.$jobseeker_id.'.json', 'w');
           fwrite($fp, json_encode($json));

            $new_str = file_get_contents('./exam_questions/'.$job_post_id.'_'.$jobseeker_id.'.json');
            $data['new_json'] = json_decode($new_str, true);

            foreach ($data['new_json']  as $value) {
               $data['questions'] = $value;
               break;
            }
            if(count($data['new_json']) >= 1 )
            {
                $this->load->view('fontend/exam/exam_next_question',$data);
            }else{
                unlink('./exam_questions/'.$job_post_id.'_'.$jobseeker_id.'.json');
                $attend_array = array(
                    'is_test_done' => '1',
                );
                $where['job_seeker_id'] = $jobseeker_id;
                $where['job_post_id'] = $job_post_id;
                $this->Master_model->master_update($attend_array,'job_apply',$where);
                // echo $this->db->last_query(); die;
                $this->load->view('fontend/exam/exam_success');
            }
        }
       

    }

	public function insert_exam_session_data()
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
       
        $jid= $this->input->post('job_id');
        $job_post_id = base64_decode($jid);

        $timer= $this->input->post('timer');

        $data_array = array(
            'job_id'        => $job_post_id,
            'job_seeker_id' => $jobseeker_id,
            'exam_time'     => $timer,
        );

        $this->Master_model->master_insert($data_array, 'js_exam_session_info');

    }


    /*OCEAN CHAMP TEST SECTION*/
    public function ocean_champ_test()
    {   
        $jobseeker_id = $this->session->userdata('job_seeker_id');

        if($_POST)
        {
            $created_on = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($created_on)));

            $topics = $this->input->post('topics');
            $temp_array= array();
            if(!empty($topics))
            {
                $all_topics = implode(',', $this->input->post('topics'));
                $skill = $this->input->post('skill_name');
                $level = $this->input->post('level');

                $where_time = "skill_id='$skill' AND job_seeker_id='$jobseeker_id' AND topic_id IN (".$all_topics.")";
                $exists = $this->Master_model->get_master_row('js_ocean_exam_topics', $select =FALSE , $where_time, $join = FALSE);
                if($exists)
                {   
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">You have already given test for this skill</div>');                
                    redirect('exam/ocean_champ_test');

                }else{
                    $data_array = array(
                        'job_seeker_id' => $jobseeker_id,
                        'topic_id'      => implode(',', $this->input->post('topics')),
                        'level'         => $this->input->post('level'),
                        'skill_id'      => $this->input->post('skill_name'),
                        'created_on'    => $cenvertedTime,
                        'created_by'    => $jobseeker_id,
                    );

                    $last_id = $this->Master_model->master_insert($data_array, 'js_ocean_exam_topics');

                    $where_req_skill="topic_id IN (".$all_topics.") AND level='$level'";
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

                    $fp = fopen('./exam_questions/'.$skill.'_'.$jobseeker_id.'.json', 'w');
                    fwrite($fp, json_encode($temp_array));
                                  
                    $data['skill'] =  $skill;

                    $this->load->view('fontend/exam/ocean_exam_instruction',$data);
                }
             
               
            }
            else{
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please select topic</div>');                
                redirect('exam/ocean_champ_test');
            }


        }else{
            $temp_array2= array();
            $temp_array3= array();
            $data= array();
            $where_js = "job_seeker_id='$jobseeker_id'";
            $select_can_sk = "skills";
            $can_skills = $this->Master_model->getMaster('job_seeker_skills', $where_js, $join = FALSE, $order = false, $field = false, $select_can_sk,$limit=false,$start=false, $search=false);
        
            for($i=0;$i<sizeof($can_skills); $i++)
            {
                $where_req_skill="skill_name ='".$can_skills[$i]['skills']."'";
                $select = "id,skill_name";
                $skill_data = $this->Master_model->getMaster('skill_master',$where_req_skill,$join = FALSE, $order = false, $field = false, $select, $limit=false, $start=false, $search=false);
                $can_skills[$i]['skill_name']= $skill_data[0]['skill_name'];
                $can_skills[$i]['id']= $skill_data[0]['id'];
                
               array_push($temp_array2, $can_skills[$i]);

                // $whereadd="skill_name !='".$can_skills[$i]['skills']."'";
                // $selectadd = "id,skill_name";
                // $add_skill_data = $this->Master_model->getMaster('skill_master',$whereadd, $join = FALSE, $order = false, $field = false, $selectadd, $limit=false, $start=false, $search=false);
              
                //$can_skills[$i]['skill_name']= $add_skill_data[0]['skill_name'];
                //$can_skills[$i]['id']= $add_skill_data[0]['id'];
               array_push($temp_array3, $can_skills[$i]['skills']);

            }
            $data['skill_data']  = $temp_array2;
            //$data['add_skill_data'] = $temp_array3;
                echo implode(',', $temp_array3);

             $whereadd="skill_name NOT IN (".implode(',', $temp_array3).")";
                $selectadd = "id,skill_name";
                $data['add_skill_data'] = $this->Master_model->getMaster('skill_master',$whereadd, $join = FALSE, $order = false, $field = false, $selectadd, $limit=false, $start=false, $search=false);
             echo $this->db->last_query();
            echo "<pre>";
            print_r($temp_array3);
            die;
            $this->load->view('fontend/exam/ocean_champ_select_topic',$data);
        }
    }

    function gettopic(){
        $topic_id = $this->input->post('id');
        $where['technical_id'] = $topic_id;
        $topics = $this->Master_model->getMaster('topic',$where);
        $result = '';
        if(!empty($topics)){ 
            // $result .='<option value="">Select Topic</option>';
            foreach($topics as $key){
             // $result .='<option value="'.$key['topic_id'].'">'.$key['topic_name'].'</option>';
              
              $result .="<input type='checkbox' name='topics[]' style='height:15px; width:20px;' id='topics' value=".$key['topic_id']." checked> ".$key['topic_name']."";
            }
        }else{
            $result .='<p>Topics not available</p>';
        }
        echo $result;
    }


    public function oceanchamp_additional_exam()
    {   
        $jobseeker_id = $this->session->userdata('job_seeker_id');

        if($_POST)
        {
            $created_on = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($created_on)));

            $topics = $this->input->post('topics');
            $temp_array= array();
            if(!empty($topics))
            {
                $all_topics = implode(',', $this->input->post('add_topics'));
                $skill = $this->input->post('add_skill_name');
                $level = $this->input->post('add_level');

                $where_time = "skill_id='$skill' AND job_seeker_id='$jobseeker_id' AND topic_id IN (".$all_topics.")";
                $exists = $this->Master_model->get_master_row('js_ocean_exam_topics', $select =FALSE , $where_time, $join = FALSE);
                if($exists)
                {   
                    $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">You have already given test for this skill</div>');                
                    redirect('exam/ocean_champ_test');

                }else{
                    $data_array = array(
                        'job_seeker_id' => $jobseeker_id,
                        'topic_id'      => implode(',', $this->input->post('topics')),
                        'level'         => $this->input->post('add_level'),
                        'skill_id'      => $this->input->post('add_skill_name'),
                        'created_on'    => $cenvertedTime,
                        'created_by'    => $jobseeker_id,
                    );

                    $last_id = $this->Master_model->master_insert($data_array, 'js_ocean_exam_topics');

                    $where_req_skill="topic_id IN (".$all_topics.") AND level='$level'";
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

                    $fp = fopen('./exam_questions/'.$skill.'_'.$jobseeker_id.'.json', 'w');
                    fwrite($fp, json_encode($temp_array));
                                  
                    $data['skill'] =  $skill;

                    $this->load->view('fontend/exam/ocean_exam_instruction',$data);
                }
             
               
            }
            else{
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please select topic</div>');                
                redirect('exam/ocean_champ_test');
            }


        }
    }

    public function ocean_exam_start($skill_id=null)
    {   
        $jobseeker_id = $this->session->userdata('job_seeker_id');
        $skill_id = base64_decode($skill_id);
        if (!empty($skill_id)) {
                 
            $data['title'] = 'Exam Start';
            $data['skill_id'] = $skill_id;
    
            $str = file_get_contents('./exam_questions/'.$skill_id.'_'.$jobseeker_id.'.json');
            $json = json_decode($str, true);

            foreach ($json  as $value) {
               $data['questions'] = $value;
               break;
            }
            
            $this->load->view('fontend/exam/ocean_exam_start',$data);

        } else {
            redirect('exam');
        }
       
    }

    public function insert_ocean_data()
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
       
        $jid= $this->input->post('skill_id');
        $skill_id = base64_decode($jid);
        $data['skill_id'] = $skill_id;
        $question_id = $this->input->post('question_id');
        $option = $this->input->post('option');
        $status = array();
        $str = file_get_contents('./exam_questions/'.$skill_id.'_'.$jobseeker_id.'.json');

        $json = json_decode($str, true);
        $created_on = date('Y-m-d H:i:s');
        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($created_on)));

        foreach ($json  as $value) {
           $data['questions'] = $value;
           break;
        }
       
        for($q=0;$q<sizeof($data['questions']['answer']);$q++)
        {
            $answer_id = $data['questions']['answer'][$q]['answer_id'];
            
            for($i=0;$i<sizeof($option);$i++)
            {   
                if($answer_id == $option[$i])
                {
                     $status[]= 'Yes';
                }else{
                     $status[]= 'No';
                }
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
            'skill_id'          => $skill_id,
            'job_seeker_id'     => $jobseeker_id,  
            'question_id'       => $question_id,
            'marks'             => $mark,
            'correct_status'    => $cstatus,
            'date_time'         => $cenvertedTime,
        );
        $last_id = $this->Master_model->master_insert($exam_array, 'js_ocean_exam_result');
        if($last_id)
        {
            array_shift($json); // remove completed element from json array
           // update json file with remaining questions
           $fp = fopen('./exam_questions/'.$skill_id.'_'.$jobseeker_id.'.json', 'w');
           fwrite($fp, json_encode($json));

            $new_str = file_get_contents('./exam_questions/'.$skill_id.'_'.$jobseeker_id.'.json');
            $data['new_json'] = json_decode($new_str, true);

            foreach ($data['new_json']  as $value) {
               $data['questions'] = $value;
               break;
            }
            if(count($data['new_json']) >= 1 )
            {
                $this->load->view('fontend/exam/ocean_exam_next_question',$data);
            }else{
                unlink('./exam_questions/'.$skill_id.'_'.$jobseeker_id.'.json');
             
                $this->load->view('fontend/exam/exam_success');
            }
        }

    }
    
    public function insert_ocean_exam_session()
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
       
        $jid= $this->input->post('skill_id');
        $skill_id = base64_decode($jid);

        $timer= $this->input->post('timer');

        $data_array = array(
            'skill_id'        => $skill_id,
            'job_seeker_id'   => $jobseeker_id,
            'exam_time'       => $timer,
        );

        $this->Master_model->master_insert($data_array, 'js_ocean_exam_session');

    }

    public function autosubmit()
    {
        $this->load->view('fontend/exam/end_exam');
    }

    
     public function ocean_champ_result()
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
       

        $where_req_skill="js_ocean_exam_topics.job_seeker_id ='$jobseeker_id'";
        $join_r = array(
            'skill_master' => 'skill_master.id = js_ocean_exam_topics.skill_id | INNER',
        );
        $select = "js_ocean_exam_topics.id as exam_id,js_ocean_exam_topics.skill_id,js_ocean_exam_topics.level,js_ocean_exam_topics.topic_id,js_ocean_exam_topics.created_on,skill_master.skill_name";
        
        $data['final_result'] = $this->Master_model->getMaster('js_ocean_exam_topics',$where_req_skill,$join_r, $order = false, $field = false, $select, $limit=false, $start=false, $search=false);

        // echo $this->db->last_query();

        // echo "<pre>";
        // print_r($data['final_result']);
        $this->load->view('fontend/exam/ocean_champ_result', $data);
    }
    /*END OCEAN CHAMP TEST SECTION*/

  
}

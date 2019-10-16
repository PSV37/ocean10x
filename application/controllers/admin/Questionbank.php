<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Questionbank extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Questionbank';

        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

        $where_state= "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
        $where_subtopic = "subtopic.subtopic_status='1'";
		$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
        $join_emp = array(
                'skill_master' => 'skill_master.id=questionbank.technical_id |INNER',
                'topic' => 'topic.topic_id=questionbank.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |INNER',
            );
        $data['questionbank'] = $this->Master_model->getMaster('questionbank',$where_all,$join_emp);

        $this->load->view('admin/jobsetting/questionbank_master', $data);
    }

        public function save_questionbank($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'technical_id' => $this->input->post('technical_id'),
                'topic_id' => $this->input->post('topic_id'),
                'subtopic_id' => $this->input->post('subtopic_id'),
				'level' => $this->input->post('level'),
				'ques_type' => $this->input->post('ques_type'),
				'question' => $this->input->post('question'),
				'option1' => $this->input->post('option1'),
				'option2' => $this->input->post('option2'),
				'option3' => $this->input->post('option3'),
				'option4' => $this->input->post('option4'),
				'option5' => $this->input->post('option5')
            );

            if(empty($id)){
                $state_dt['ques_created_date']=date('Y-m-d H:i:s');
                $state_dt['ques_created_by']=$user_id;

                $q_id=$this->Master_model->master_insert($state_dt,'questionbank');
                if($this->input->post('ques_type')=='MCQ'){
					$tablename='questionbank_answer';
					$where_delete['question_id']=$q_id;
					$this->Master_model->master_delete($tablename, $where_delete);
					$c_answer=$this->input->post('correct_answer');
					//var_dump($c_answer); die;
					for($i=0;$i<sizeof($c_answer);$i++){
						$data_answer=array();
						$data_answer['question_id']=$q_id;
						$data_answer['answer_id']=$c_answer[$i];
						 $this->Master_model->master_insert($data_answer,'questionbank_answer');
					}
				}
                redirect('admin/questionbank');
            }
            else {
                $state_dt['ques_updated_date']=date('Y-m-d H:i:s');
                $state_dt['ques_updated_by']=$user_id;

                $where['ques_id']=$id;
                $this->Master_model->master_update($state_dt,'questionbank',$where);
                if($this->input->post('ques_type')=='MCQ'){
					$tablename='questionbank_answer';
					$where_delete['question_id']=$id;
					$this->Master_model->master_delete($tablename, $where_delete);
					$c_answer=$this->input->post('correct_answer');
					for($i=0;$i<sizeof($c_answer);$i++){
						$data_answer=array();
						$data_answer['question_id']=$id;
						$data_answer['answer_id']=$c_answer[$i];
						 $this->Master_model->master_insert($data_answer,'questionbank_answer');
					}
				}
                redirect('admin/questionbank');
            }
        }

    public function delete_questionbank($id) {
        
      //  $this->education_level_model->delete($id);
        $education_level_status = array(
            'ques_status'=>0,
        );
        $where_del['ques_id']=$id;
        $this->Master_model->master_update($education_level_status,'questionbank',$where_del);
        redirect('admin/questionbank');
    }

    public function edit_questionbank($id){
        $data['title']="Edit Questionbank";

        $where_all = "questionbank.ques_status='1'";
        $join_emp = array(
                 'skill_master' => 'skill_master.id=questionbank.technical_id |INNER',
                'topic' => 'topic.topic_id=questionbank.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |INNER',
            );
        $data['questionbank'] = $this->Master_model->getMaster('questionbank',$where_all,$join_emp);
		
        $where_ct = "ques_id='$id'";
        $data['edit_questionbank_info'] = $this->Master_model->getMaster('questionbank',$where_ct);
        
        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

        $where_state= "topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
		$where_subtopic = "subtopic.subtopic_status='1'";
		$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
		
        $this->load->view('admin/jobsetting/questionbank_master',$data);
    }



function gettopic(){
	$topic_id = $this->input->post('id');
	$where['technical_id'] = $topic_id;
	$topics = $this->Master_model->getMaster('topic',$where);
	
	
	$result = '';
	if(!empty($topics)){ 
		$result .='<option value="">Select Topic</option>';
		foreach($topics as $key){
		  $result .='<option value="'.$key['topic_id'].'">'.$key['topic_name'].'</option>';
		}
	}else{
	
		$result .='<option value="">Topic not available</option>';
	}
	 echo $result;
}



 function getsubtopic(){
	$subtopic_id = $this->input->post('id');
	$where['topic_id'] = $subtopic_id;
	$subtopics = $this->Master_model->getMaster('subtopic',$where);
	$result = '';
	
	if(!empty($subtopics)){ 
		$result .='<option value="">Select Subtopics</option>';
		foreach($subtopics as $key){
		  $result .='<option value="'.$key['subtopic_id'].'">'.$key['subtopic_name'].'</option>';
		}
	}else{
	
		$result .='<option value="">Subtopic not available</option>';
	}
	 echo $result;
}


}

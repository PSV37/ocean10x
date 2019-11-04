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

        $where_skill= "status=1";
		
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_skill);
				
        $where_topic= "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_topic);
        
        $where_subtopic = "subtopic.subtopic_status='1'";
		$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
		
		$where_lineitem = "lineitem.lineitem_status='1'";
		$data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
		
		$where_lineitemlevel = "lineitemlevel.lineitemlevel_status='1'";
		$data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel',$where_lineitemlevel);
		
		
        $data['options'] = $this->Master_model->getMaster('options');
		
        $data['questionbank'] = $this->Master_model->getMaster('questionbank');

        $this->load->view('admin/jobsetting/questionbank_master', $data);
    }
						/*Add /Edit Question */

        public function save_questionbank($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'technical_id' => $this->input->post('technical_id'),
                'topic_id' => $this->input->post('topic_id'),
                'subtopic_id' => $this->input->post('subtopic_id'),
				'lineitem_id' => $this->input->post('lineitem_id'),
				'lineitemlevel_id' => $this->input->post('lineitemlevel_id'),
				'level' => $this->input->post('level'),
				'ques_type' => $this->input->post('ques_type'),
				'question' => $this->input->post('question'),
				'option1' => $this->input->post('option1'),
				'option2' => $this->input->post('option2'),
				'option3' => $this->input->post('option3'),
				'option4' => $this->input->post('option4'),
				'option5' => $this->input->post('option5'),
				'is_admin' => $this->input->post('is_admin')
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
				
				if($this->input->post('ques_type')=='Subjective'){
					$tablename='questionbank_answer';
					$where_delete['question_id']=$q_id;
					$this->Master_model->master_delete($tablename, $where_delete);
					
					$where_update_sub_answer=array();
					$ans_update['sub_answer']=$this->input->post('sub_answer');
					$where_update_sub_answer['ques_id']=$q_id;
					$this->Master_model->master_update($ans_update,'questionbank',$where_update_sub_answer);
				}
                redirect('admin/questions');
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
				if($this->input->post('ques_type')=='Subjective'){
					$tablename='questionbank_answer';
					$where_delete['question_id']=$id;
					$this->Master_model->master_delete($tablename, $where_delete);
					
					$where_update_sub_answer=array();
					$ans_update['sub_answer']=$this->input->post('sub_answer');
					$where_update_sub_answer['ques_id']=$id;
					$this->Master_model->master_update($ans_update,'questionbank',$where_update_sub_answer);
				}
                redirect('admin/questions');
            }
        }
					
					/*Edit Question */
					
    public function edit_questionbank($id){
        $data['title']="Edit Questionbank";
         $data['options'] = $this->Master_model->getMaster('options');		
        $where_questionbank = "ques_id='$id'";
        $data['edit_questionbank_info'] = $this->Master_model->getMaster('questionbank',$where_questionbank);
		
		$where_answer = "question_id='$id'";
        $data['questionbank_answer'] = $this->Master_model->getMaster('questionbank_answer',$where_answer);
        
		$where_lineitem = "lineitem.lineitem_status='1'";
		$data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
		 
        $where_skill= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_skill);
		
        $this->load->view('admin/jobsetting/questionbank_master',$data);
    }

			/*Delete Question */

 public function delete_questionbank($id) {
        
        $ques_status = array(
            'ques_status'=>0,
        );
        $where_del['ques_id']=$id;
        $this->Master_model->master_update($ques_status,'questionbank',$where_del);
        redirect('admin/questions');
    }

			/*import question*/

	public function importquestion(){
		//load model
		$this->load->model('Questionbank_model');
		// Check form submit or not 
 		if($this->input->post('upload') != NULL ){ 
   			$data = array(); 
   			if(!empty($_FILES['file']['name'])){ 
    			// Set preference 
    			$config['upload_path'] = 'question_excel/files/'; 
    			$config['allowed_types'] = 'csv'; 
    			$config['max_size'] = '3000'; // max_size in kb 
    			$config['file_name'] = $_FILES['file']['name']; 

    			// Load upload library 
    			$this->load->library('upload',$config); 
   
    			// File upload
    			if($this->upload->do_upload('file')){ 
     				// Get data about the file
     				$uploadData = $this->upload->data(); 
     				$filename = $uploadData['file_name']; 

     				// Reading file
                    $file = fopen("question_excel/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 3000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
							echo "<pre>";
							//print_r($userdata); 
							$tech_id=$userdata[0];
							$where_skill="skill_name='".$tech_id."'";
							$tech_data = $this->Master_model->getMaster('skill_master', $where_skill);
							//print_r($tech_data);
							$userdata[0]=$tech_data[0]['id'];
							
							$topic_id=$userdata[1];
							$where_topic="topic_name='".$topic_id."'";
							$topic_data = $this->Master_model->getMaster('topic', $where_topic);
							//print_r($topic_data);
							$userdata[1]=$topic_data[0]['topic_id'];
							
							$subtopic=$userdata[2];
							$where_subtopic="subtopic_name='".$subtopic."'";
							$subtopic_data = $this->Master_model->getMaster('subtopic', $where_subtopic);
							//print_r($subtopic_data);
							$userdata[2]=$subtopic_data[0]['subtopic_id'];
							
							$lineitem=$userdata[3];
							$where_lineitem="title='".$lineitem."'";
							$lineitem_data = $this->Master_model->getMaster('lineitem', $where_lineitem);
							//print_r($lineitem_data); 
							$userdata[3]=$lineitem_data[0]['lineitem_id'];
							
							
							$lineitemlevel=$userdata[4];
							$where_lineitemlevel="titles='".$lineitemlevel."'";
							$lineitemlevel_data = $this->Master_model->getMaster('lineitemlevel', $where_lineitemlevel);
							//print_r($lineitemlevel_data);die(); 
							$userdata[4]=$lineitemlevel_data[0]['lineitemlevel_id'];
							
																					
							$options=$userdata[13];
							$where_options="options_type='".$options."'";
							$options_data = $this->Master_model->getMaster('options', $where_options);
							print_r($options_data);die(); 
							$userdata[13]=$options_data[0]['options_id'];
							
                           $this->Questionbank_model->insertRecord($userdata);
							//echo $this->db->last_query();die();
                        }
                        $skip ++;
                    }
					redirect('admin/questionbank-import');
     				$data['response'] = 'successfully uploaded '.$filename;
					
				   
    			}else{ 
     				$data['response'] = 'failed'; 
    			} 
   			}else{ 
    			$data['response'] = 'failed'; 
   			} 
   			// load view 
   			$this->load->view('admin/jobsetting/questionbank_view',$data); 
  		}else{
   			// load view 
   			$this->load->view('admin/jobsetting/questionbank_view'); 
  		} 

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
		$result .='<option value="">Select Subtopic</option>';
		foreach($subtopics as $key){
		  $result .='<option value="'.$key['subtopic_id'].'">'.$key['subtopic_name'].'</option>';
		}
	}else{
	
		$result .='<option value="">Subtopic not available</option>';
	}
	 echo $result;
}


function getlineitem(){
	$lineitem_id = $this->input->post('id');
	$where['subtopic_id'] = $lineitem_id;
	$lineitems = $this->Master_model->getMaster('lineitem',$where);
	$result = '';
	
	if(!empty($lineitems)){ 
		$result .='<option value="">Select Lineitem</option>';
		foreach($lineitems as $key){
		  $result .='<option value="'.$key['lineitem_id'].'">'.$key['title'].'</option>';
		}
	}else{
	
		$result .='<option value="">Lineitem not available</option>';
	}
	 echo $result;
}


function getLineitemlevel(){
	$lineitemlevel_id = $this->input->post('id');
	$where['lineitem_id'] = $lineitemlevel_id;
	$lineitemlevels = $this->Master_model->getMaster('lineitemlevel',$where);
	$result = '';
	
	if(!empty($lineitemlevels)){ 
		$result .='<option value="">Select Lineitem Level 2</option>';
		foreach($lineitemlevels as $keys){
		  $result .='<option value="'.$keys['lineitemlevel_id'].'">'.$keys['titles'].'</option>';
		}
	}else{
	
		$result .='<option value="">Lineitem Level not available</option>';
	}
	 echo $result;
}


	

}

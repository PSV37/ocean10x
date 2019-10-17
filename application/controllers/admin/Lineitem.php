<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Lineitem extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index($id = null)
    {   

        if (!empty($id)) {
                 
            $data['title'] = 'Add Lineitems';

            $where_cn= "status=1";
            $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

            $where_topic= "topic.topic_status=1";
            $data['topic'] = $this->Master_model->getMaster('topic',$where_topic);
            
            $where_subtopic= "subtopic.subtopic_status=1 AND subtopic.subtopic_id ='$id'";
            $data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
            
            
            $data['lineitem'] = $this->Master_model->getMaster('lineitem');

            $this->load->view('admin/jobsetting/lineitem_master', $data);
                
            } else {
                redirect('admin/subtopic');
            }

       
    }



        public function save_lineitem($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
			 // $where_subtopics= "subtopic.subtopic_status=1";
    //          $subtopic = $this->Master_model->getMaster('subtopic',$where_subtopics);

            //  $where_req_skill="subtopic.subtopic_id ='$id'";
            //    $select_skill = "skill_master.skill_name";
            // $req_skill_details = $this->Master_model->getMaster('subtopic', $where_req_skill, $join=false, $order = false, $field = false, $select_skill=false,$limit=false,$start=false, $search=false);

            //print_r($req_skill_details); die;
            $state_dt=array(
				'technical_id' => $this->input->post('technical_id'),
				'topic_id' => $this->input->post('topic_id'),
				'subtopic_id' => $subtopic,
				'title' => $this->input->post('title'),
				'lineitem_desc' => $this->input->post('lineitem_desc'),
				//'subtopic_id'=$subtopic;
            );

            if(empty($id)){
                $state_dt['lineitem_created_date']=date('Y-m-d H:i:s');
                $state_dt['lineitem_created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'lineitem');
               
                redirect('admin/lineitem');
            }
            else {
                $state_dt['lineitem_updated_date']=date('Y-m-d H:i:s');
                $state_dt['lineitem_updated_by']=$user_id;

                $where['lineitem_id']=$id;
                $this->Master_model->master_update($state_dt,'lineitem',$where);
               
                redirect('admin/subtopic');
            }
        }

    public function delete_lineitem($id) {
        
        $lineitem_status = array(
            'lineitem_status'=>0,
        );
        $where_del['lineitem_id']=$id;
        $this->Master_model->master_update($lineitem_status,'lineitem',$where_del);
        redirect('admin/lineitem');
    }
  public function edit_lineitem($id){
   $data['title']="Edit Lineitem";
		
        
        
        $data['lineitem'] = $this->Master_model->getMaster('lineitem');
		
        $where_ct = "lineitem_id='$id'";
        $data['edit_lineitem_info'] = $this->Master_model->getMaster('lineitem',$where_ct);
        
		//$where_sub = "subtopic_id='$id'";
		//$data['edit_subtopic_info'] = $this->Master_model->getMaster('subtopic',$where_sub);
		
        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

        $where_state= "topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
		$where_subtopic = "subtopic.subtopic_status='1' AND subtopic.subtopic_id ='$id'";
		$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
		
		
        $this->load->view('admin/jobsetting/lineitem_master',$data);
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

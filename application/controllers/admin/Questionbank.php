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

        $data['title'] = 'Add Subtopic';

        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

        $where_state= "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
        $where_all = "subtopic.subtopic_status='1'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=subtopic.technical_id |INNER',
                'topic' => 'topic.topic_id=subtopic.topic_id |INNER',
            );
        $data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_all,$join_emp);

        $this->load->view('admin/jobsetting/subtopic_master', $data);
    }

        public function save_subtopic($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'technical_id' => $this->input->post('technical_id'),
                'topic_id' => $this->input->post('topic_id'),
                'subtopic_name' => $this->input->post('subtopic_name'),
				'subtopic_desc' => $this->input->post('subtopic_desc'),
            );

            if(empty($id)){
                $state_dt['subtopic_created_date']=date('Y-m-d H:i:s');
                $state_dt['subtopic_created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'subtopic');
               
                redirect('admin/subtopic');
            }
            else {
                $state_dt['subtopic_updated_date']=date('Y-m-d H:i:s');
                $state_dt['subtopic_updated_by']=$user_id;

                $where['subtopic_id']=$id;
                $this->Master_model->master_update($state_dt,'subtopic',$where);
               
                redirect('admin/subtopic');
            }
        }

    public function delete_subtopic($id) {
        
        $state_status = array(
            'subtopic_status'=>0,
        );
        $where_del['subtopic_id']=$id;
        $this->Master_model->master_update($state_status,'subtopic',$where_del);
        redirect('admin/subtopic');
    }

    public function edit_subtopic($id){
        $data['title']="Edit Subtopic";

        $where_all = "subtopic.subtopic_status='1'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=subtopic.technical_id |INNER',
                'topic' => 'topic.topic_id=subtopic.topic_id |INNER',
            );
        $data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_all,$join_emp);

        $where_ct = "subtopic_id='$id'";
        $data['edit_subtopic_info'] = $this->Master_model->getMaster('subtopic',$where_ct);
        
        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

        $where_state= "topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
        $this->load->view('admin/jobsetting/subtopic_master',$data);
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



//  function getcity(){
//     $state_id = $this->input->post('id');
//     $where['state_id'] = $state_id;
//     $citys = $this->Master_model->getMaster('city',$where);
//     $result = '';
//     if(!empty($citys)){ 
//         $result .='<option value="">Select City</option>';
//         foreach($citys as $key){
//           $result .='<option value="'.$key['id'].'">'.$key['city_name'].'</option>';
//         }
//     }else{
    
//         $result .='<option value="">State not available</option>';
//     }
//      echo $result;
// }


}

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
            
            $where_all = "lineitem.lineitem_status='1'";
			$join_emp = array(
                'skill_master' => 'skill_master.id=lineitem.technical_id |INNER',
                'topic' => 'topic.topic_id=lineitem.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitem.subtopic_id |INNER',
            );
        $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_all,$join_emp);
            

            $this->load->view('admin/jobsetting/lineitem_master', $data);
                
            } else {
                redirect('admin/lineitem');
            }

       
    }
	
	
	 public function save_lineitem($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
			$where['lineitem_id']=$id;
            $state_dt=array(
				'technical_id' => $this->input->post('technical_id'),
				'topic_id' => $this->input->post('topic_id'),
				'subtopic_id' => $this->input->post('subtopic_id'),
				'title' => $this->input->post('title'),
				'lineitem_desc' => $this->input->post('lineitem_desc'),
				//'subtopic_id'=$subtopic;
            );

            if(empty($id)){
                $state_dt['lineitem_created_date']=date('Y-m-d H:i:s');
                $state_dt['lineitem_created_by']=$user_id;
				
				//$where_add['lineitem_id']=$id;
                $this->Master_model->master_insert($state_dt,'lineitem',$where);
               
                redirect('admin/lineitem/index/'.$id);
            }
            else {
                $state_dt['lineitem_updated_date']=date('Y-m-d H:i:s');
                $state_dt['lineitem_updated_by']=$user_id;

                
                $this->Master_model->master_update($state_dt,'lineitem',$where);
               
                redirect('admin/lineitem/index/'.$id);
            }
        }

    
  public function edit_lineitem($id){
   $data['title']="Edit Lineitem";
		
        $where_all = "lineitem.lineitem_status='1'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=lineitem.technical_id |INNER',
                'topic' => 'topic.topic_id=lineitem.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitem.subtopic_id |INNER',
            );
        $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_all,$join_emp);
        	
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
		
		
        $this->load->view('admin/jobsetting/edit_lineitem_master',$data);
    }

	
    public function delete_lineitem($id) {
        
        $lineitem_status = array(
            'lineitem_status'=>0,
        );
        $where_del['lineitem_id']=$id;
        $this->Master_model->master_update($lineitem_status,'lineitem',$where_del);
         redirect('admin/lineitem/index/'.$id);
    }
  
}

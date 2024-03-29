<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Lineitemlevel extends MY_Controller
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
            
           // $where_subtopic= "subtopic.subtopic_status=1";
            //$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
			
			$where_lineitem= "lineitem.lineitem_status=1 AND lineitem.lineitem_id ='$id'";
            $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_subtopic);
            
            $where_all = "lineitemlevel.lineitemlevel_status='1'";
			$join_emp = array(
                'skill_master' => 'skill_master.id=lineitemlevel.technical_id |INNER',
                'topic' => 'topic.topic_id=lineitemlevel.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitemlevel.subtopic_id |INNER',
				'lineitem' => 'lineitem.lineitem_id=lineitemlevel.lineitem_id |INNER',
            );
        $data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel',$where_all,$join_emp);
            

            $this->load->view('admin/jobsetting/lineitemlevel', $data);
                
            } else {
                redirect('admin/lineitemlevel');
            }

       
    }
	
	
	 public function save_lineitemlevel($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');

            $state_dt=array(
				'technical_id' => $this->input->post('technical_id'),
				'topic_id' => $this->input->post('topic_id'),
				'subtopic_id' => $this->input->post('subtopic_id'),
				'titles' => $this->input->post('titles'),
				'lineitem_id' => $this->input->post('lineitem_id'),
				'lineitemlevel_desc' => $this->input->post('lineitemlevel_desc'),
				//'subtopic_id'=$subtopic;
            );

            if(empty($id)){
                $state_dt['lineitemlevel_created_date']=date('Y-m-d H:i:s');
                $state_dt['lineitemlevel_created_by']=$user_id;
				
				$where_add['lineitemlevel_id']=$id;
                $this->Master_model->master_insert($state_dt,'lineitemlevel',$where_add);
               
                redirect('admin/lineitem/index/'.$id);
            }
            else {
                $state_dt['lineitemlevel_updated_date']=date('Y-m-d H:i:s');
                $state_dt['lineitemlevel_updated_by']=$user_id;

                $where['lineitemlevel_id']=$id;
                $this->Master_model->master_update($state_dt,'lineitemlevel',$where);
               
                redirect('admin/lineitem/index/'.$id);
            }
        }

    
  public function edit_lineitemlevel($id){
   $data['title']="Edit Lineitem";
		
        $where_all = "lineitemlevel.lineitemlevel_status='1'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=lineitemlevel.technical_id |INNER',
                'topic' => 'topic.topic_id=lineitemlevel.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitemlevel.subtopic_id |INNER',
				'lineitem' => 'lineitem.lineitem_id=lineitemlevel.lineitem_id |INNER',
            );
        $data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel',$where_all,$join_emp);
        	
        $where_ct = "lineitemlevel_id='$id'";
        $data['edit_lineitemlevel_info'] = $this->Master_model->getMaster('lineitemlevel',$where_ct);
        
		//$where_sub = "subtopic_id='$id'";
		//$data['edit_subtopic_info'] = $this->Master_model->getMaster('subtopic',$where_sub);
		
        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);

        $where_state= "topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
		//$where_subtopic = "subtopic_status='1'";
		//$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
		
		$where_lineitem= "lineitem.lineitem_status=1 AND lineitem.lineitem_id ='$id'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_subtopic);
		
        $this->load->view('admin/jobsetting/lineitemlevel_master',$data);
    }

  
}

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
                 
            $data['title'] = 'Select Lineitems';
            $where_all = "lineitem.lineitem_status!='0' and lineitem.subtopic_id='".$id."'";
			$join_emp = array(
                'skill_master' => 'skill_master.id=lineitem.technical_id |INNER',
                'topic' => 'topic.topic_id=lineitem.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitem.subtopic_id |INNER',
            );
			$data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_all,$join_emp);
            $data['sub_topic_id']=$id;

            $this->load->view('admin/jobsetting/lineitem_master', $data);
                
        } else {
                redirect('admin/lineitem');
        }
    }
	
	public function save_lineitem($sub_topic_id=0,$id = 0){
            if(isset($_POST['save_line_item'])){
				$user_id = $this->session->userdata('admin_user_id');
				
				$state_dt=array(
					'technical_id' => $this->input->post('technical_id'),
					'topic_id' => $this->input->post('topic_id'),
					'subtopic_id' => $this->input->post('subtopic_id'),
					'title' => $this->input->post('title'),
					'lineitem_desc' => $this->input->post('lineitem_desc'),
				);

				if($id==0){
					$state_dt['lineitem_created_date']=date('Y-m-d H:i:s');
					$state_dt['lineitem_created_by']=$user_id;
					
					//$where_add['lineitem_id']=$id;
					$this->Master_model->master_insert($state_dt,'lineitem');
					
					redirect('admin/lineitem/index/'.$sub_topic_id);
				}
				else {
					$state_dt['lineitem_updated_date']=date('Y-m-d H:i:s');
					$state_dt['lineitem_updated_by']=$user_id;

					$where['lineitem_id']=$id;
					$this->Master_model->master_update($state_dt,'lineitem',$where);
				   
					redirect('admin/lineitem/index/'.$sub_topic_id);
				}
			}else{
				$join_emp = array(
					'skill_master' => 'skill_master.id=subtopic.technical_id |INNER',
					'topic' => 'topic.topic_id=subtopic.topic_id |INNER',
				);
				$where_all="subtopic.subtopic_id='".$sub_topic_id."'";
				$data['subtopic_data'] = $this->Master_model->getMaster('subtopic',$where_all,$join_emp);
				if($id!=0){
					$where_lineitem="lineitem.lineitem_id='".$id."'";
					$data['line_item_data'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
				}
				$this->load->view('admin/jobsetting/lineitems_master', $data);
			}
    }
	
	public function delete_lineitem($sub_topic_id=0,$id = 0){
		$where['lineitem_id']=$id;
		$data['lineitem_status']=0;
		$this->Master_model->master_update($data,'lineitem',$where);	   
		redirect('admin/lineitem/index/'.$sub_topic_id);
	}
	
	
	
	
	public function select($id = null)
    {   
        if (!empty($id)) {
                 
            $data['title'] = 'Select Lineitems';
            $where_all = "lineitemlevel.lineitemlevel_status!='0' and lineitemlevel.lineitem_id='".$id."'";
			$join_emp = array(
                'skill_master' => 'skill_master.id=lineitemlevel.technical_id |INNER',
                'topic' => 'topic.topic_id=lineitemlevel.topic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitemlevel.subtopic_id |INNER',
				'subtopic' => 'subtopic.subtopic_id=lineitemlevel.subtopic_id |INNER',
				'lineitem' => 'lineitem.lineitem_id=lineitemlevel.lineitem_id |INNER',
            );
			$data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel',$where_all,$join_emp);
            $data['line_item_id']=$id;

            $this->load->view('admin/jobsetting/lineitemlevel', $data);
                
        } else {
                redirect('admin/lineitem');
        }
    }
	
	public function save_lineitemlevel($line_item_id=0,$id = 0){
            if(isset($_POST['save_line_itemlevel'])){
				$user_id = $this->session->userdata('admin_user_id');
				
				$state_dt=array(
					'technical_id' => $this->input->post('technical_id'),
					'topic_id' => $this->input->post('topic_id'),
					'subtopic_id' => $this->input->post('subtopic_id'),
					'lineitem_id' => $this->input->post('lineitem_id'),
					'titles' => $this->input->post('titles'),
				);

				if($id==0){
					$state_dt['lineitemlevel_created_date']=date('Y-m-d H:i:s');
					$state_dt['lineitemlevel_created_by']=$user_id;
					
					//$where_add['lineitem_id']=$id;
					$this->Master_model->master_insert($state_dt,'lineitemlevel');
					
					redirect('admin/lineitem/index/'.$line_item_id);
				}
				else {
					$state_dt['lineitemlevel_updated_date']=date('Y-m-d H:i:s');
					$state_dt['lineitemlevel_updated_by']=$user_id;

					$where['lineitemlevel_id']=$id;
					$this->Master_model->master_update($state_dt,'lineitemlevel',$where);
				   
					redirect('admin/lineitem/index/'.$line_item_id);
				}
			}else{
				$join_emp = array(
					'skill_master' => 'skill_master.id=topic.technical_id |INNER',
					'topic' => 'topic.topic_id=subtopic.topic_id |INNER',
					'subtopic' => 'subtopic.subtopic_id=lineitem.subtopic_id |INNER',
				);
				$where_all="lineitem.lineitem_id='".$line_item_id."'";
				$data['lineitem_data'] = $this->Master_model->getMaster('lineitem',$where_all,$join_emp);
				if($id!=0){
					$where_lineitemlevel="lineitemlevel.lineitemlevel_id='".$id."'";
					$data['line_itemlevel_data'] = $this->Master_model->getMaster('lineitemlevel',$where_lineitemlevel);
				}
				$this->load->view('admin/jobsetting/lineitemlevel_master', $data);
			}
    }
	
	public function delete_lineitemlevel($line_item_id=0,$id = 0){
		$where['lineitemlevel_id']=$id;
		$data['lineitemlevel_status']=0;
		$this->Master_model->master_update($data,'lineitemlevel',$where);	   
		redirect('admin/lineitem/index/'.$line_item_id);
	}
	
	
	
	
}




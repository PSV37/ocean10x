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



      

    public function delete_lineitem($id) {
        
        $lineitem_status = array(
            'lineitem_status'=>0,
        );
        $where_del['lineitem_id']=$id;
        $this->Master_model->master_update($lineitem_status,'lineitem',$where_del);
        redirect('admin/lineitem');
    }

}

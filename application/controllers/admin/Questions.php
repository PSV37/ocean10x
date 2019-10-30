<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Questions extends MY_Controller
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
		
		//$where_opt= "options.status=1";
        $data['options'] = $this->Master_model->getMaster('options');
		
        $where_state= "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
        $where_subtopic = "subtopic.subtopic_status!='0'";
		$data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
		
		$where_lineitem = "lineitem.lineitem_status!='0'";
		$data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
		
		$where_all = "questionbank.ques_status!='0' and questionbank.ques_id='".$id."'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=questionbank.technical_id |INNER',
                'topic' => 'topic.topic_id=questionbank.topic_id |INNER',
				
            );
			
        $data['questionbank'] = $this->Master_model->getMaster('questionbank',$where_all,$join_emp,$where_all);

        $this->load->view('admin/jobsetting/questions_master', $data);
    }

       
}

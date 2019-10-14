<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Subtopic extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Topic';

		$data['skill_master'] = $this->Master_model->getMaster('skill_master',$where=false);
          // $where_all = "topic.topic_status='1'";
        // $join_emp = array(
        //         'skill_master' => 'skill_master.id=topic.technical_id |INNER',
        //     );
        // $data['edu_spectial_info'] = $this->Master_model->getMaster('topic',$where_all,$join_emp);
        // $all_educationlevels=$this->education_level_model->get();
        $this->load->view('admin/jobsetting/subtopic_master', $data);
    }


}

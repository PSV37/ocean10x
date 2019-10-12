<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Topic extends MY_Controller
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
          $where_all = "topic.topic_status='1'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=topic.technical_id |INNER',
            );
        $where_edu = "topic_id='$id'";
        $data['edit_topic_info'] = $this->Master_model->getMaster('topic',$where_edu);
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where=false);
        // $all_educationlevels=$this->education_level_model->get();
        $this->load->view('admin/jobsetting/topic_master', $data);
    }


        public function save_topic($id = null){
            // var_dump($id); die;
            $user_id = $this->session->userdata('admin_user_id');
            

            $education_level=array(
                'technical_id   ' => $this->input->post('technical_id'),
                'topic_name' => $this->input->post('topic_name'),
                'topic_desc   ' => $this->input->post('topic_desc'),
            );

            if(empty($id)){
                $education_level['topic_created_date']=date('Y-m-d H:i:s');
                $education_level['topic_created_by']=$user_id;

                $this->Master_model->master_insert($education_level,'topic');
               
                redirect('admin/topic');
            }
            else {
                $education_level['topic_updated_date']=date('Y-m-d H:i:s');
                $education_level['topic_updated_by']=$user_id;

                $where['topic_id']=$id;
                $this->Master_model->master_update($education_level,'topic',$where);
               
                redirect('admin/topic');
            }
			
        }

    public function delete_topic($id) {
        
      //  $this->education_level_model->delete($id);
        $education_level_status = array(
            'topic_status'=>0,
        );
        $where_del['topic_id']=$id;
        $this->Master_model->master_update($education_level_status,'topic',$where_del);
        redirect('admin/topic');
    }

}

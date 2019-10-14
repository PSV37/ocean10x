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

        $data['title'] = 'Add Subtopic';

		$data['skill_master'] = $this->Master_model->getMaster('skill_master',$where=false);
          $where_all = "subtopic.subtopic_status='1'";
       // $join_emp = array(
                //'skill_master' => 'skill_master.id=subtopic.technical_id |INNER',
         //   );
        $data['edu_spectial_info'] = $this->Master_model->getMaster('subtopic',$where_all);
        // $all_educationlevels=$this->education_level_model->get();
        $this->load->view('admin/jobsetting/subtopic_master', $data);
    }


        public function save_topic($id = null){
            // var_dump($id); die;
            $user_id = $this->session->userdata('admin_user_id');
            

            $education_level=array(
                'technical_id   ' => $this->input->post('technical_id'),
                'topic_id' => $this->input->post('topic_id'),
				'subtopic_name' => $this->input->post('subtopic_name'),
                'subtopic_desc   ' => $this->input->post('topic_desc'),
            );

            if(empty($id)){
                $education_level['subtopic_created_date']=date('Y-m-d H:i:s');
                $education_level['subtopic_created_by']=$user_id;

                $this->Master_model->master_insert($education_level,'subtopic');
               
                redirect('admin/subtopic');
            }
            else {
                $education_level['subtopic_updated_date']=date('Y-m-d H:i:s');
                $education_level['subtopic_updated_by']=$user_id;

                $where['subtopic_id']=$id;
                $this->Master_model->master_update($education_level,'subtopic',$where);
               
                redirect('admin/subtopic');
            }
        }

    public function delete_subtopic($id) {
        
      //  $this->education_level_model->delete($id);
        $education_level_status = array(
            'subtopic_status'=>0,
        );
        $where_del['subtopic_id']=$id;
        $this->Master_model->master_update($education_level_status,'subtopic',$where_del);
        redirect('admin/subtopic');
    }

    public function edit_subtopic($id){
        $data['title']="Subtopic Edit";
        $where_all = "subtopic.subtopic_status='1'";
        //$join_emp = array(
		//'skill_master' => 'skill_master.id=subtopic.technical_id |INNER',
           // );
       // $data['edu_spectial_info'] = $this->Master_model->getMaster('subtopic',$where_all,$join_emp);

        $where_edu = "subtopic_id='$id'";
        $data['edit_spectial_info'] = $this->Master_model->getMaster('subtopic',$where_edu);
		$data['skill_master'] = $this->Master_model->getMaster('skill_master',$where=false);

        $this->load->view('admin/jobsetting/subtopic_master',$data);
    }



}

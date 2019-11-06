<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Skill_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Skill';

        $where_cn= "status=1";
        $select = "skill_name, id";
        $data['skills_data'] = $this->Master_model->getMaster('skill_master',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/skill_master', $data);
    }

        public function save_skill($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'skill_name' => $this->input->post('skill_name'),
            );

            if(empty($id)){
                $state_dt['created_date']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'skill_master');
               
                redirect('admin/skill_master');
            }
            else {
                $state_dt['updated_date']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['id']=$id;
                $this->Master_model->master_update($state_dt,'skill_master',$where);
               
                redirect('admin/skill_master');
            }
        }

    public function delete_skill($id) {
        
        $state_status = array(
            'status'=>0,
        );
        $where_del['id']=$id;
        $this->Master_model->master_update($state_status,'skill_master',$where_del);
        redirect('admin/skill_master');
    }

    public function edit_skill($id){
        $data['title']="Skills Master Edit";

        $where_st = "id='$id'";
        $selectedit = "skill_name, id";
        $data['edit_skill_info'] = $this->Master_model->getMaster('skill_master',$where_st,$join = FALSE, $order = false, $field = false, $selectedit,$limit=false,$start=false, $search=false);
        
        $where_cn= "status=1";
        $select = "skill_name, id";
        $data['skills_data'] = $this->Master_model->getMaster('skill_master',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/skill_master',$data);
    }



}

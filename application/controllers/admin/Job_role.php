<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Job_role extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Job Role';

        $where_cn= "status=1";
        $select = "job_role_title, skill_set ,id";
        $data['job_role_data'] = $this->Master_model->getMaster('job_role',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        $where_sk= "status=1";
        $select_sk = "skill_name ,id";
        $data['skills_data'] = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/job_role', $data);
    }

        public function save_role($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'skill_name' => $this->input->post('job_role'),
            );

            if(empty($id)){
                $state_dt['created_date']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'job_role');
               
                redirect('admin/job_role');
            }
            else {
                $state_dt['updated_date']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['id']=$id;
                $this->Master_model->master_update($state_dt,'job_role',$where);
               
                redirect('admin/job_role');
            }
        }

    public function delete_role($id) {
        
        $state_status = array(
            'status'=>0,
        );
        $where_del['id']=$id;
        $this->Master_model->master_update($state_status,'job_role',$where_del);
        redirect('admin/job_role');
    }

    public function edit_role($id){
        $data['title']="Skills Master Edit";

        $where_st = "id='$id'";
        $selectedit = "skill_name, id";
        $data['edit_skill_info'] = $this->Master_model->getMaster('job_role',$where_st,$join = FALSE, $order = false, $field = false, $selectedit,$limit=false,$start=false, $search=false);
        
        $where_cn= "status=1";
        $select = "skill_name, id";
        $data['skills_data'] = $this->Master_model->getMaster('job_role',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/job_role',$data);
    }



}

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
            $skill_set = $this->input->post('job_role');

            $role_array=array(
                'job_role_title' => $this->input->post('job_role_title'),
                'skill_set' => implode(',', $skill_set),
            );

            if(empty($id)){
                $role_array['created_on']=date('Y-m-d H:i:s');
                $role_array['created_by']=$user_id;

                $this->Master_model->master_insert($role_array,'job_role');
               
                redirect('admin/job_role');
            }
            else {
                $role_array['updated_on']=date('Y-m-d H:i:s');
                $role_array['updated_by']=$user_id;

                $where['id']=$id;
                $this->Master_model->master_update($role_array,'job_role',$where);
               
                redirect('admin/job_role');
            }
        }

    public function delete_role($id) {
        
        $role_status = array(
            'status'=>0,
        );
        $where_del['id']=$id;
        $this->Master_model->master_update($role_status,'job_role',$where_del);
        redirect('admin/job_role');
    }

    public function edit_role($id){
        $data['title']="Role Master Edit";

        $where_st = "id='$id'";
        $selectedit = "job_role_title, skill_set, id";
        $data['edit_role_info'] = $this->Master_model->getMaster('job_role',$where_st,$join = FALSE, $order = false, $field = false, $selectedit,$limit=false,$start=false, $search=false);
        
        $where_cn= "status=1";
        $select = "job_role_title, skill_set ,id";
        $data['job_role_data'] = $this->Master_model->getMaster('job_role',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        $where_sk= "status=1";
        $select_sk = "skill_name ,id";
        $data['skills_data'] = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/job_role',$data);
    }



}

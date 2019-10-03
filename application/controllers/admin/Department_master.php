<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Department_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Department';

        $where_cn= "dept_status=1";
        $data['department_data'] = $this->Master_model->getMaster('department',$where_cn);
        
        $this->load->view('admin/jobsetting/department_master', $data);
    }

        public function save_department($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'department_name' => $this->input->post('department_name'),
                'description' => addslashes($this->input->post('dept_desc')),
            );

            if(empty($id)){
                $state_dt['created_date']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'department');
               
                redirect('admin/department_master');
            }
            else {
                $state_dt['updated_date']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['dept_id']=$id;
                $this->Master_model->master_update($state_dt,'department',$where);
               
                redirect('admin/department_master');
            }
        }

    public function delete_department($id) {
        
      //  $this->education_level_model->delete($id);
        $state_status = array(
            'dept_status'=>0,
        );
        $where_del['dept_id']=$id;
        $this->Master_model->master_update($state_status,'department',$where_del);
        redirect('admin/department_master');
    }

    public function edit_department($id){
        $data['title']="Department Master Edit";

        $where_st = "dept_id='$id'";
        $data['edit_dept_info'] = $this->Master_model->getMaster('department',$where_st);
        
        $where_cn= "dept_status=1";
        $data['department_data'] = $this->Master_model->getMaster('department',$where_cn);
        
        $this->load->view('admin/jobsetting/department_master',$data);
    }



}

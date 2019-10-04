<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Designation_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Designation';

        $where_cn= "status=1";
        $select = "designation_name, description, designation_id";
        $data['designation_data'] = $this->Master_model->getMaster('designation',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/designation_master', $data);
    }

        public function save_designation($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'designation_name' => $this->input->post('desig_name'),
                'description' => addslashes($this->input->post('desig_desc')),
            );

            if(empty($id)){
                $state_dt['created_date']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'designation');
               
                redirect('admin/designation_master');
            }
            else {
                $state_dt['updated_date']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['designation_id']=$id;
                $this->Master_model->master_update($state_dt,'designation',$where);
               
                redirect('admin/designation_master');
            }
        }

    public function delete_designation($id) {
        
      //  $this->education_level_model->delete($id);
        $state_status = array(
            'status'=>0,
        );
        $where_del['designation_id']=$id;
        $this->Master_model->master_update($state_status,'designation',$where_del);
        redirect('admin/designation_master');
    }

    public function edit_designation($id){
        $data['title']="Designation Master Edit";

        $where_st = "designation_id='$id'";
        $data['edit_desig_info'] = $this->Master_model->getMaster('designation',$where_st);
        
        // $where_cn= "status=1";
        // $data['designation_data'] = $this->Master_model->getMaster('designation',$where_cn);
        $where_cn= "status=1";
        $select = "designation_name, description, designation_id";
        $data['designation_data'] = $this->Master_model->getMaster('designation',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/designation_master',$data);
    }



}

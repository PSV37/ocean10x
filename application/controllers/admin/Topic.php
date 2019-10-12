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

        $where_cn= "status=1";
        $select = "industry_name, description, id";
        $data['topic_data'] = $this->Master_model->getMaster('topic',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/topic_master', $data);
    }

        public function save_industry($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'industry_name' => $this->input->post('industry_name'),
                'description' => addslashes($this->input->post('industry_desc')),
            );

            if(empty($id)){
                $state_dt['created_on']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'industry_master');
               
                redirect('admin/industry_master');
            }
            else {
                $state_dt['updated_on']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['id']=$id;
                $this->Master_model->master_update($state_dt,'industry_master',$where);
               
                redirect('admin/industry_master');
            }
        }

    public function delete_industry($id) {
        
        $state_status = array(
            'status'=>0,
        );
        $where_del['id']=$id;
        $this->Master_model->master_update($state_status,'industry_master',$where_del);
        redirect('admin/industry_master');
    }

    public function edit_industry($id){
        $data['title']="Industry Master Edit";

        $where_st = "id='$id'";
        $selectedit = "industry_name, description, id";
        $data['edit_industry_info'] = $this->Master_model->getMaster('industry_master',$where_st,$join = FALSE, $order = false, $field = false, $selectedit,$limit=false,$start=false, $search=false);
        
        $where_cn= "status=1";
        $select = "industry_name, description, id";
        $data['industry_data'] = $this->Master_model->getMaster('industry_master',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        $this->load->view('admin/jobsetting/industry_master',$data);
    }



}

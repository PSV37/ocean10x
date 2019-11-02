<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class State_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add State';

        $where_cn= "status=1";
        $data['country_data'] = $this->Master_model->getMaster('country',$where_cn);
        
        $where_all = "state.state_status='1'";
        $join_emp = array(
                'country' => 'country.country_id=state.country_id |OUTER JOIN',
            );
        $data['state_info'] = $this->Master_model->getMaster('state',$where_all,$join_emp);

        $this->load->view('admin/jobsetting/state_master', $data);
    }

        public function save_state($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'country_id' => $this->input->post('country_name'),
                'state_name' => $this->input->post('state_name'),
            );

            if(empty($id)){
                $state_dt['created_date']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'state');
               
                redirect('admin/state_master');
            }
            else {
                $state_dt['state_updated_date']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['state_id']=$id;
                $this->Master_model->master_update($state_dt,'state',$where);
               
                redirect('admin/state_master');
            }
        }

    public function delete_state($id) {
        
      //  $this->education_level_model->delete($id);
        $state_status = array(
            'state_status'=>0,
        );
        $where_del['state_id']=$id;
        $this->Master_model->master_update($state_status,'state',$where_del);
        redirect('admin/state_master');
    }

    public function edit_state($id){
        $data['title']="State Master Edit";

        $where_all = "state.state_status='1'";
        $join_emp = array(
                'country' => 'country.country_id=state.country_id |INNER',
            );
        $data['state_info'] = $this->Master_model->getMaster('state',$where_all,$join_emp);

        $where_st = "state_id='$id'";
        $data['edit_state_info'] = $this->Master_model->getMaster('state',$where_st);
        
        $where_cn= "status=1";
        $data['country_data'] = $this->Master_model->getMaster('country',$where_cn);
        
        $this->load->view('admin/jobsetting/state_master',$data);
    }



}

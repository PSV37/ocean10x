<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Pincode_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Pincode';

       
        $data['pincode'] = $this->Master_model->getMaster('pincode');

        $this->load->view('admin/jobsetting/pincode_master', $data);
    }

        public function save_pincode($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $pincode_dt=array(
                'pincode' => $this->input->post('pincode'),
            );

            if(empty($id)){
                $pincode_dt['pincode_created_date']=date('Y-m-d H:i:s');
                $pincode_dt['pincode_created_by']=$user_id;

                $this->Master_model->master_insert($pincode_dt,'pincode');
               
                redirect('admin/pincode_master');
            }
            else {
                $pincode_dt['pincode_updated_date']=date('Y-m-d H:i:s');
                $pincode_dt['pincode_updated_by']=$user_id;

                $where['pincode_id']=$id;
                $this->Master_model->master_update($pincode_dt,'pincode',$where);
               
                redirect('admin/pincode_master');
            }
        }

    public function delete_pincode($id) {
        
        $pincode_status = array(
            'pincode_status'=>0,
        );
        $where_del['pincode_id']=$id;
        $this->Master_model->master_update($pincode_status,'pincode',$where_del);
        redirect('admin/pincode_master');
    }

    public function edit_pincode($id){
        $data['title']="Pincode Edit";

        $where_all = "pincode.pincode_status='1'";
        
        $data['pincode_info'] = $this->Master_model->getMaster('pincode');

        $where_pincode = "pincode_id='$id'";
        $data['edit_pincode_info'] = $this->Master_model->getMaster('pincode',$where_ct);
        
        
        $this->load->view('admin/jobsetting/pincode_master',$data);
    }



}

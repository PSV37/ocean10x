<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Public_demand extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        //$this->load->model('global_model');
    }

    /*** Dashboard ***/
    public function index()
    {   
        $title= 'Public Demand Here';
        $publicdemandlist=$this->public_demand_model->get();
        $this->load->view('admin/public/pbdemandlist',compact('title','publicdemandlist'));
    }

    public function delete_demand($id){
        $this->public_demand_model->delete($id);
        redirect('admin/public-demand');
    }

    public function edit_demand($id){
        $title="Update Public Deamnd";
        $public=$this->public_demand_model->get($id);
       $this->load->view('admin/public/edit_demand',compact('public','title'));
    }

    public function update_demand(){
       echo  $public_demand_id=$this->input->post('public_demand_id');

        $public_info=array(
            'public_name'=>$this->input->post('public_name'),
            'public_email'=>$this->input->post('public_email'),
            'public_comment'=>$this->input->post('public_comment'),
            );
        $this->public_demand_model->update($public_info,$public_demand_id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Public Deamand Upudate Sucessfully </div>');
        redirect_back();
    }


}

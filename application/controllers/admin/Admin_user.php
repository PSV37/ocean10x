<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Admin_user extends MY_Controller
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
        $title = 'Add Job Category';
        $all_user=$this->admin_model->get();
        $this->load->view('admin/user/user',compact('title','all_user'));
    }

    public function save_admin($id = null){
		$id=(empty($this->input->post('id'))?'':$this->input->post('id'));
        $user_info=array(
            'name' => $this->input->post('name'),
            'user_name' => $this->input->post('user_name'),
            'email' => $this->input->post('email'),
			'user_type' => $this->input->post('user_type'),
            'password' => md5($this->input->post('password')),
            );
        if(empty($id)){
            $this->admin_model->insert($user_info);
             $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Admin Add Sucessfully </div>');
            redirect('admin/admin_user');
        }
        else {
        $this->admin_model->update($user_info,$id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Admin Update Sucessfully </div>');
            redirect('admin/admin_user');
        }
    }

    public function edit_admin($id){
        $title="Admin User Edit";
         $all_user=$this->admin_model->get();
        $user_info=$this->admin_model->get($id);
        $this->load->view('admin/user/user',compact('all_user','user_info','title'));
    }

    public function delete_admin($id) {
        $this->admin_model->delete($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Admin Delete Sucessfully </div>');
        redirect('admin/create-users');
    }


}

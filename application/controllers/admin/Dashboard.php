<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Dashboard extends MY_Controller
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
        $title= 'Dashboard Here';
        $recentSeekerlist=$this->job_seeker_model->recent_seeker_list();
        $recentJoblist=$this->job_posting_model->recent_all_jobs();  
        $this->load->view('admin/dashboard',compact('title','recentSeekerlist','recentJoblist'));
    }

    public function logout()
    {
        $this->login_model->logout();
        redirect('login');
    }


}

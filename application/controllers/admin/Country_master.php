<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Country_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   
        $title = 'Add Job Location';
        $all_locations=$this->job_location_model->get();
        $this->load->view('admin/jobsetting/country_master', compact('all_locations','title'));
    }


        public function save_locaiton($id = null){
            $job_location=array(
                'job_location_name' => $this->input->post('location_name'),
                );
            if(empty($id)){
                $this->job_location_model->insert($job_location);
                redirect('admin/job_location');
            }
            else {
            $this->job_location_model->update($job_location,$id);
                redirect('admin/job_location');
            }
        }

    public function delete_location($id) {
        $this->job_location_model->delete($id);
        redirect('admin/job_location');
    }

    public function edit_location($id){
        $title="Location Edit";
         $all_locations=$this->job_location_model->get();
        $location_info=$this->job_location_model->get($id);
        $this->load->view('admin/jobsetting/location',compact('all_locations','location_info','title'));
    }



}

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
       $data['title'] = 'Add Job Location';
       $where_con= "status=1"
       $data['country_data'] = $this->Master_model->getMaster('country',$where_con);

        $this->load->view('admin/jobsetting/country_master', $data);
    }


        public function save_country($id = null){
            $user_id = $this->session->userdata('admin_user_id');

            $country_array=array(
                'country_name' => $this->input->post('country_name'),
                );
            if(empty($id)){
                $country_array['created_date']=date('Y-m-d H:i:s');
                $country_array['created_by']=$user_id;

                $this->Master_model->master_insert($country_array,'country');
               
                redirect('admin/country_master');
            }
            else {
                $country_array['updated_date']=date('Y-m-d H:i:s');
                $country_array['updated_by']=$user_id;

                $where['country_id']=$id;
                $this->Master_model->master_update($country_array,'country',$where);
            
                redirect('admin/country_master');
            }
        }

    public function delete_location($id) {
        $this->job_location_model->delete($id);
        redirect('admin/country_master');
    }

    public function edit_location($id){
        $title="Location Edit";
        $all_locations=$this->job_location_model->get();
        $location_info=$this->job_location_model->get($id);

        $this->load->view('admin/jobsetting/country_master',compact('all_locations','location_info','title'));
    }



}

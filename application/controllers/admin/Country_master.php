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

        $data['title'] = 'Add Country';

		$data['country'] = $this->Master_model->getMaster('country',$where=false);
          $where_all = "country.status='1'";
        $data['edu_spectial_info'] = $this->Master_model->getMaster('country',$where_all);
        // $all_educationlevels=$this->education_level_model->get();
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

    public function delete_country($id) {

        $country_status = array(
            'status'=>0,
        );
        $where_del['country_id']=$id;
        $this->Master_model->master_update($country_status,'country',$where_del);
        redirect('admin/country_master');
    }

    public function edit_country($id){
        $data['title']="Edit Country";
        $where_all = "country.status='1'";
        $data['edu_spectial_info'] = $this->Master_model->getMaster('country',$where_all,$join_emp);

        $where_edu = "country_id='$id'";
        $data['country'] = $this->Master_model->getMaster('country',$where_edu);
		

        $this->load->view('admin/jobsetting/country_master',$data);
    }


}

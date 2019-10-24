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

        $where_cn= "status=1";
        $select = "country_name, country_id";
        $data['country_data'] = $this->Master_model->getMaster('country',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        $this->load->view('admin/jobsetting/country', $data);
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
        $data['title']="Country Master Edit";

        $where_st = "country_id='$id'";
        $select = "country_name, country_id";
        $data['edit_country_info'] = $this->Master_model->getMaster('country',$where_st);
        
        $where_cn= "status=1";
        $select = "country_name, dept_id";
        $data['country_data'] = $this->Master_model->getMaster('country',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        
        $this->load->view('admin/jobsetting/country_master',$data);
    }


}

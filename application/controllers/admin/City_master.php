<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class City_master extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add City';

        $where_cn= "status=1";
        $data['country_data'] = $this->Master_model->getMaster('country',$where_cn);

        $where_state= "state_status=1";
        $data['state_data'] = $this->Master_model->getMaster('state',$where_state);
        
        $where_all = "city.city_status='1'";
        $join_emp = array(
                'country' => 'country.country_id=city.country_id |INNER',
                'state' => 'state.state_id=city.state_id |INNER',
            );
        $data['city_info'] = $this->Master_model->getMaster('city',$where_all,$join_emp);

        $this->load->view('admin/jobsetting/city_master', $data);
    }

        public function save_city($id = null){
          
            $user_id = $this->session->userdata('admin_user_id');
            
            $state_dt=array(
                'country_id' => $this->input->post('country_name'),
                'state_id' => $this->input->post('state_name'),
                'city_name' => $this->input->post('city_name'),
            );

            if(empty($id)){
                $state_dt['created_date']=date('Y-m-d H:i:s');
                $state_dt['created_by']=$user_id;

                $this->Master_model->master_insert($state_dt,'city');
               
                redirect('admin/city_master');
            }
            else {
                $state_dt['city_updated_date']=date('Y-m-d H:i:s');
                $state_dt['updated_by']=$user_id;

                $where['id']=$id;
                $this->Master_model->master_update($state_dt,'city',$where);
               
                redirect('admin/city_master');
            }
        }

    public function delete_city($id) {
        
        $state_status = array(
            'city_status'=>0,
        );
        $where_del['id']=$id;
        $this->Master_model->master_update($state_status,'city',$where_del);
        redirect('admin/city_master');
    }

    public function edit_city($id){
        $data['title']="City Edit";

        $where_all = "city.city_status='1'";
        $join_emp = array(
                'country' => 'country.country_id=city.country_id |INNER',
                'state' => 'state.state_id=city.state_id |INNER',
            );
        $data['city_info'] = $this->Master_model->getMaster('city',$where_all,$join_emp);

        $where_ct = "id='$id'";
        $data['edit_city_info'] = $this->Master_model->getMaster('city',$where_ct);
        
        $where_cn= "status=1";
        $data['country_data'] = $this->Master_model->getMaster('country',$where_cn);

        $where_state= "state_status=1";
        $data['state_data'] = $this->Master_model->getMaster('state',$where_state);
        
        $this->load->view('admin/jobsetting/city_master',$data);
    }



function getstate(){
    $country_id = $this->input->post('id');
    $where['country_id'] = $country_id;
    $states = $this->Master_model->getMaster('state',$where);
    $result = '';
    if(!empty($states)){ 
        $result .='<option value="">Select State</option>';
        foreach($states as $key){
          $result .='<option value="'.$key['state_id'].'">'.$key['state_name'].'</option>';
        }
    }else{
    
        $result .='<option value="">State not available</option>';
    }
     echo $result;
}


//  function getcity(){
//     $state_id = $this->input->post('id');
//     $where['state_id'] = $state_id;
//     $citys = $this->Master_model->getMaster('city',$where);
//     $result = '';
//     if(!empty($citys)){ 
//         $result .='<option value="">Select City</option>';
//         foreach($citys as $key){
//           $result .='<option value="'.$key['id'].'">'.$key['city_name'].'</option>';
//         }
//     }else{
    
//         $result .='<option value="">State not available</option>';
//     }
//      echo $result;
// }


}

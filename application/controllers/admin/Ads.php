<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ads extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
       
        $this->load->model('Ads_model');
    }

    /*** Dashboard ***/
    public function index()
    {
   
        $title       = 'Ads List';
        $res = $this->Ads_model->get_all_ads();
		$res_home = $this->Ads_model->get_all_ads_by_position('home');
        $this->load->view('admin/ads/ads_view', compact('res', 'res_home', 'title'));
    }

    public function save_ads()
    {
        if ($_POST) {
            $config['upload_path']   = 'upload/ads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']  = true;
            $config['max_size']      = 12000;
            

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ad_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please upload a valid images. </div>');
                redirect('admin/ads');
            } else {
                $img             = $this->upload->data();
                $file_name       = $img['file_name'];
                $data = array(
                    'ad_image'     => $file_name,
                    'ad_link'     => 	$this->input->post('ad_link'),
                    'position'     => 	$this->input->post('position'),
                   
                );
                //print_r($data);exit;
               $this->Ads_model->add($data);
            redirect('admin/ads');
            }
        }
    }


 public function edit_ads($id='')
    {
   
        $title       = 'Edit Ad';
        $row = $this->Ads_model->get_ads_by_id($id);
        $res = $this->Ads_model->get_all_ads();
		$res_home = $this->Ads_model->get_all_ads_by_position('home');
        $this->load->view('admin/ads/edit_ads_view', compact('row','res','res_home', 'title'));
    }
    
    
    public function update_ads()
    {

        if ($_POST) {
        $id = $this->input->post('aid');
            $config['upload_path']   = 'upload/ads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']  = true;
            $config['max_size']      = 12000;
            
            $data = array(
                    'ad_link'     => 	$this->input->post('ad_link'),
                    'position'     => 	$this->input->post('position'),
                   
                );
                
if (!empty($_FILES['ad_image']['name']))
{
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('ad_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please upload a valid images. </div>');
                redirect('admin/ads');
                
		}
		 $img             = $this->upload->data();
                $data['ad_image']=$img['file_name'];
} 
               
            
               $this->Ads_model->update_rec($id, $data);
           // redirect('admin/ads');
}
    // print_r($data); exit;
             $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Ad Sucessfully Update</div>');
             redirect('admin/ads');

    }

   
    public function del_ads($ad_id = null)
    {

        if (!empty($ad_id)) {
            $this->Ads_model->delete($ad_id);
            redirect_back();
        } else {
            echo "not Found";
        }
    }


}

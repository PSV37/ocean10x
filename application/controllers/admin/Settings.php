<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
        $this->load->library(array('pagination', 'form_validation', 'session','upload', 'image_lib'));

        $this->load->helper(array('form', 'url','admin_helper'));
        $this->load->helper(array('form', 'url', 'text', 'inflector'));
        //$this->load->helper(array('text','inflector','download'));
    }

    public function index() {
        // $data['contact_email_result'] = $this->settings_model->get_single_records();
        $this->load->view('admin/settings_view/general_setting_view');
    }
    
    public function do_upload() { 
        $id=2;
        if (!empty($_FILES['post_img']['name'])) {
            // file rename here...
            $file_name = $_FILES['post_img']['name'];
            $new_file_name = date('vs') . '_' . underscore($file_name);
            
            chmod('files/', 0777);
            
            chmod('files/thumb', 0777);

            $config['upload_path'] = 'files/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['overwrite'] = true;

            $config['max_size'] = 6000;
            $new_file_name=get_file_name($new_file_name);
            $config['file_name'] = $new_file_name;
            $this->upload->initialize($config);
            if ($this->upload->do_upload('post_img')) {
                $fileData = $this->upload->data();
                $configthumb['image_library'] = 'gd2';
                $configthumb['source_image'] = $fileData['full_path'];
                $configthumb['new_image'] = 'files/thumb/' . $config['file_name'];
                //$configthumb['create_thumb'] = TRUE;
                $configthumb['maintain_ratio'] = TRUE;
                $configthumb['width'] = 220;
                $configthumb['height'] = 110;
                $this->image_lib->clear(); // added this line
                $this->image_lib->initialize($configthumb);
                $this->image_lib->resize();
                $ministers_arrays = array();
                $post_img['filename'] = $new_file_name;
            }
            
            $this->settings_model->update($id,$post_img);
        }
            redirect(base_url('admin/settings/index'));
          
      } 
      
       public function add_email(){
        $data['msg'] = '';
       
        //$this->form_validation->set_rules('email', 'Email', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
       
        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        // if ($this->form_validation->run() === FALSE) {
        //     $this->index();
        //     return;
        // }
        if ($this->form_validation->run() == FALSE)
        {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }
        else{
            $post_email = array(
                'email' => $this->input->post('email'),
            ); 

            $this->settings_model->update_email($post_email);
            echo json_encode(['success'=>'Email Updated Successfully!']);
        }
            
            // $this->session->set_flashdata('added_action', true);
            //redirect(base_url('admin/settings/index'));
       

       
    }
       public function add_metas(){
        $data['msg'] = '';
       
        $this->form_validation->set_rules('meta_title', 'Meta Title', 'trim|required');
        $this->form_validation->set_rules('meta_keywords', 'Add Meta Keywords', 'trim|required');
        $this->form_validation->set_rules('meta_description', 'Add Meta Description', 'trim|required');
       
        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        if ($this->form_validation->run() === FALSE) {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $post_metas = array(
                'meta_title' => $this->input->post('meta_title'),
                'meta_keywords' => $this->input->post('meta_keywords'),
                'meta_description' => $this->input->post('meta_description'),
            ); 

            $this->settings_model->update_metas($post_metas);
             echo json_encode(['success'=>'Metas Updated Successfully!']);
            // $this->session->set_flashdata('added_action', true);
            // redirect(base_url('admin/settings/index'));
        }

        
    }
      
       public function add_phone(){
        $data['msg'] = '';
       
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
       
        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        if ($this->form_validation->run() === FALSE) {
            // $this->index();
            // return;
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }else{
            $post_phone = array(
                'phone' => $this->input->post('phone'),
            ); 
            $this->settings_model->update_phone($post_phone);
            echo json_encode(['success'=>'Phone Number Updated Successfully!']);
        // $this->session->set_flashdata('added_action', true);
        // redirect(base_url('admin/settings/index'));

        }


       
    }
       public function add_address(){
        $data['msg'] = '';
       
        $this->form_validation->set_rules('address', 'address', 'required|trim');
       
        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
    
        if ($this->form_validation->run() == FALSE)
        {
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }
        else{

            $post_addr = array(
                'address' => addslashes($this->input->post('address')),
            ); 
            $this->settings_model->update_address($post_addr);
            echo json_encode(['success'=>'Address Updated Successfully!']);
        }
    }
      
      
      
      
      
      public function get_logo_by_id() {
       
            $row = $this->settings_model->get_logo_by_id();
            $json_data = json_encode($row);
            echo $json_data;
            return;
        
    }
      public function get_email_by_id() {
       
            $row = $this->settings_model->get_email_by_id();
            $json_data = json_encode($row);
            echo $json_data;
            return;
        
    }
    

	
}

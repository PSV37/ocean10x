<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Social_media extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('social_media_model');

        $this->load->helper('admin_helper');
        //$this->load->model('global_model');
    }

    /*** Dashboard ***/
    public function index()
    {    
          $get_social = $this->social_media_model->get_social();
          $data['get_social'] = $get_social;
          $this->load->view('admin/social_media/social',$data);
    }

   public function add_social(){
        $data['title'] = SITE_NAME . ': Social Media';
        $data['msg'] = '';
        $post_img = array();
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('class', 'Class', 'trim|required');
        $this->form_validation->set_rules('link', 'Link', 'trim|required');
     
        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        if ($this->form_validation->run() === FALSE) {
            // $this->index();
            // return;
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }
       else{
             $post = array(
                'title' => $this->input->post('title'),
                'class' => $this->input->post('class'),
                'link' => $this->input->post('link'),
            ); 
        
            $this->social_media_model->add($post);
            echo json_encode(['success'=>'Social Media Icon Added Successfully!']);
       }
       
        // $this->session->set_flashdata('added_action', true);
        // redirect(base_url('admin/social_media'));
    }
    
    
    public function get_social_by_id($id = '') {

        if ($id != '') {
            $row = $this->social_media_model->get_social_by_id($id);
            $json_data = json_encode($row);
            echo $json_data;
            return;
        }
    }
    
    public function edit_social() {
//        echo'<pre>';
//        print_r($_POST);
//        exit;
        $id = $this->input->post('social_id');
        $data['msg'] = '';
         $this->form_validation->set_rules('edit_title', 'Title', 'trim|required');
        $this->form_validation->set_rules('edit_class', 'Class', 'trim|required');
        $this->form_validation->set_rules('edit_link', 'Link', 'trim|required');
    

        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        if ($this->form_validation->run() === FALSE) {
            // $this->index();
            // return;
            $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
        }
        else{
            
            $post = array(
                'title' => $this->input->post('edit_title'),
                'class' => $this->input->post('edit_class'),
                'link' => $this->input->post('edit_link'),
            );
            $this->social_media_model->update($id, $post);
            echo json_encode(['success'=>'Social Media Icon Added Successfully!']);
            // $this->session->set_flashdata('update_action', true);
            // redirect(base_url('admin/social_media'));
            // return;
        }
        

    }
    
      public function delete_social($id = '') {
        if ($id == '') {
            echo 'error';
            exit;
        }
       
        $obj_row = $this->social_media_model->delete($id);

        echo 'done';
        exit;
    }

}

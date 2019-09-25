<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Manage_content extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manage_content_model');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->load->helper('admin_helper');
        //$this->load->model('global_model');
    }

    /*** Dashboard ***/
    public function index()
    {    
          $get_posts = $this->manage_content_model->get_posts();
          $data['get_posts'] = $get_posts;
        $this->load->view('admin/manage_content/manage',$data);
    }

   public function add_content(){
        $data['title'] = SITE_NAME . ': Content Management';
        $data['msg'] = '';
        $post_img = array();
        $this->form_validation->set_rules('heading', 'Heading', 'trim|required');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
     //   $this->form_validation->set_rules('editor1', 'Page Content', 'trim|required');
        $this->form_validation->set_rules('content_ck', 'Content', 'trim|required');
        $this->form_validation->set_rules('meta_title', 'meta Title', 'trim');
        $this->form_validation->set_rules('meta_keywords', 'meta Keywords', 'trim');
        $this->form_validation->set_rules('meta_description', 'meta Description', 'trim');
        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        if ($this->form_validation->run() === FALSE) {
            $this->index();
            return;
        }
        $slug = $this->input->post('slug');
        $slugs = create_unique_slug($slug, 'content_management', $field = 'slug', $key = NULL, $value = NULL);
        // $category_Ids=implode(",",$this->input->post('blog_cat'));
        $post = array(
            'heading' => $this->input->post('heading'),
            'slug' => $this->input->post('slug'),
            'description' => $this->input->post('content_ck'),
           
            'meta_title' => $this->input->post('meta_title'),
            'meta_keywords' => $this->input->post('meta_keywords'),
            'meta_description' => $this->input->post('meta_description'),
        ); 
        
        $this->manage_content_model->add($post);
        $this->session->set_flashdata('added_action', true);
        redirect(base_url('admin/manage_content'));
    }
    
    
    public function get_post_by_id($id = '') {

        if ($id != '') {
            $row = $this->manage_content_model->get_post_by_id($id);
            $json_data = json_encode($row);
            echo $json_data;
            return;
        }
    }
    
    public function edit_content() {
//        echo'<pre>';
//        print_r($_POST);
//        exit;
        $id = $this->input->post('cms_id');
        $data['title'] = SITE_NAME . ': Edit Page';
        $data['msg'] = '';
         $this->form_validation->set_rules('edit_heading', 'Heading', 'trim|required');
        $this->form_validation->set_rules('edit_slug', 'Slug', 'trim|required');
     //   $this->form_validation->set_rules('editor1', 'Page Content', 'trim|required');
        $this->form_validation->set_rules('edit_content_ck', 'Content', 'trim|required');
        $this->form_validation->set_rules('edit_meta_title', 'meta Title', 'trim');
        $this->form_validation->set_rules('edit_meta_keywords', 'meta Keywords', 'trim');
        $this->form_validation->set_rules('edit_meta_description', 'meta Description', 'trim');

        $this->form_validation->set_error_delimiters('<span class="err" style="padding-left:2px;">', '</span>');
        if ($this->form_validation->run() === FALSE) {
            $this->index();
            return;
        }

        $slug = $this->input->post('edit_slug');
        $slugs = create_unique_slug($slug, 'content_management', $field = 'slug', 'ID', $id);
        

        $post = array(
            'heading' => $this->input->post('edit_heading'),
            'slug' => $this->input->post('edit_slug'),
            'description' => $this->input->post('edit_content_ck'),
           
            'meta_title' => $this->input->post('edit_meta_title'),
            'meta_keywords' => $this->input->post('edit_meta_keywords'),
            'meta_description' => $this->input->post('edit_meta_description'),
        );

        
        $this->manage_content_model->update($id, $post);
        $this->session->set_flashdata('update_action', true);
        redirect(base_url('admin/manage_content'));
        return;
    }
    
      public function delete_post($id = '') {
        if ($id == '') {
            echo 'error';
            exit;
        }
       
        $obj_row = $this->manage_content_model->delete($id);

        echo 'done';
        exit;
    }

}

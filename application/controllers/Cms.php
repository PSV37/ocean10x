<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Cms extends MY_Fontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms_model');
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');
        $this->load->helper('admin_helper');
        //$this->load->model('global_model');
    }

   public function cms_page($slug){
        $data['title'] = SITE_NAME . ': Content Management';
        $data['row']= $this->cms_model->get_post_by_slug($slug);
       
//        echo'<pre>';
//        print_r($data);
//        exit;

        $this->load->view('fontend/about_us', $data);
    }
    
    


}

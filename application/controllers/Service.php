<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Service extends MY_Fontend_Controller {

  public function index(){
    			
  	$package_lists=$this->job_package_model->get();
  		$this->load->view('fontend/service.php',compact('package_lists'));

  }
  



}
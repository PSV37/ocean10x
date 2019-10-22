<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Exam extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Exam Index ***/
    public function index($id = null)
    {   

        if (!empty($id)) {
                 
            $data['title'] = 'Exam Instructions';
                $this->load->view('fontend/exam/exam_instruction');
            } else {
                redirect('/');
            }

       
    }
	
	
	
  
}

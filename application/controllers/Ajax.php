<?php
class Ajax extends MY_Seeker_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
    }
 
    public function index(){
     $this->load->view('fontend/jobseeker/update_personalinfo');
    }
 
    public function search(){
 
        $term = $this->input->get('term');
 
        $this->db->like('pincode', $term);
 
        $data = $this->db->get("pincode")->result();
 
        echo json_encode( $data);
    }
     
}
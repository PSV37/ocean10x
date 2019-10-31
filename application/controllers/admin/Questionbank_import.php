<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questionbank_import extends MY_Controller {

	public function __construct(){

		parent::__construct();

		// Load Model
		
	}
	
	public function index(){
	$this->load->model('Questionbank_model');
		// Check form submit or not 
 		if($this->input->post('upload') != NULL ){ 
   			$data = array(); 
   			if(!empty($_FILES['file']['name'])){ 
    			// Set preference 
    			$config['upload_path'] = 'asset/files/'; 
    			$config['allowed_types'] = 'csv|xlsx'; 
    			$config['max_size'] = '1000'; // max_size in kb 
    			$config['file_name'] = $_FILES['file']['name']; 

    			// Load upload library 
    			$this->load->library('upload',$config); 
   
    			// File upload
    			if($this->upload->do_upload('file')){ 
     				// Get data about the file
     				$uploadData = $this->upload->data(); 
     				$filename = $uploadData['file_name']; 

     				// Reading file
                    $file = fopen("asset/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
                            $this->Questionbank_model->insertRecord($userdata);
                        }
                        $skip ++;
                    }
     				$data['response'] = 'successfully uploaded '.$filename; 
    			}else{ 
     				$data['response'] = 'failed'; 
    			} 
   			}else{ 
    			$data['response'] = 'failed'; 
   			} 
   			// load view 
   			$this->load->view('admin/jobsetting/questionbank_view',$data); 
  		}else{
   			// load view 
   			$this->load->view('admin/jobsetting/questionbank_view'); 
  		} 

	}

	
}

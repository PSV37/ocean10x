<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_forword_seeker extends CI_Controller {
	public function __construct() {  
	    parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}


	public function apply_forworded_job()
	{
	    $email_id = base64_decode($this->input->get('apply_id'));
	    $job_id =base64_decode($this->input->get('job_id'));
	    
	        $wherecan="email= '$email_id'";
	        $check_candidate = $this->Master_model->getMaster('js_info', $wherecan);
	        // echo $this->db->last_query(); echo "<br><br>"; 
	        if($check_candidate)
	        {
	            foreach($check_candidate as $row)
	            {
	                $job_seeker_id = $row['job_seeker_id'];
	                $email_id = $row['email'];
	                $pass = $row['password'];
	            }
	           // echo $pass;
	           var_dump($check_candidate);

	            if($pass!='')
	            {
	                echo "1";
	                //var_dump($pass);
	              redirect('register/jobseeker_login', 'refresh');
	            }else{
	                echo "2";
	                var_dump($check_candidate);

	                    $data['job_seeker_id'] = $job_seeker_id;
	                    $this->load->view('jobseeker/jobseeker_set_password',$data);
	                }
	        } // verify password empty cond else
	          
	       else{
	            echo "3";
	            var_dump($check_candidate); 
	                redirect('register/jobseeker_login', 'refresh');
	            }
	}




}// end class
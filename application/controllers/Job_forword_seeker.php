<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_forword_seeker extends CI_Controller {
	public function __construct() {  
	    parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$job_seeker_id = $this->session->userdata('job_seeker_id');
        if ($job_seeker_id != null) {
            redirect('job_seeker/seeker_info');
   		}

        $this->load->view('fontend/jobseeker/login');
		
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
	         
	            if($pass!='')
	            {
	              	$data_ck = array(
						'job_seeker_id' => "'".$job_seeker_id."'",
					);
					$validate = $this->Master_model->getMaster("js_info",$data_ck);
			        if(!empty($validate))
			        {
						foreach($validate as $row)
						{
							$data['email'] =>$row['email'],
							$data['job_seeker_id'] =>$row['job_seeker_id'],
						}
						// print_r($LoginAdmin); die();
			            $this->session->set_userdata($data);
			            redirect('register/jobseeker_login', 'refresh');

					}else{
						//$Message = array('Message' => 'Invalid User...!');
						$this->session->set_flashdata('type', 'danger');
						$this->session->set_flashdata('Message', 'Invalid User...!');
						$this->session->set_userdata($data);
      					redirect('Job_forword_seeker/index');
					}  
	            }else{
	                    $data['job_seeker_id'] = $job_seeker_id;
	                    $data['email_id'] = $email_id;
	                    $this->load->view('fontend/jobseeker/jobseeker_set_password',$data);
	                }
		             // To update job status
					$data_status=array( 
		            	'forword_job_status' => 2,
			        );
					$where_update1['job_apply_id'] = $job_id;
					$this->Master_model->master_update($data_status, 'job_apply', $where_update1);


	        } // verify password empty cond else
	          
	       else{
	                redirect('register/jobseeker_login', 'refresh');
	            }
	}




}// end class
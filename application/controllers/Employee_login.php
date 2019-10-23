<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Employee_login extends CI_Controller {
	public function __construct() {  
	    parent::__construct();
		$this->load->library('session');
	}



//function to check login credentials.
public function index()
{	
		if ($this->session->userdata('EmpLogged_In'))
        {
		  redirect(base_url().'employee_dashboard');
		}
		else
		{
			if(isset($_POST['submit'])) {
				
				$data = array(
					'email' => "'".$this->input->post('txtUserName')."'",
					'password' => "'".$this->input->post('txtPassword')."'"
				);
				$validate = $this->Master_model->getMaster("employee",$data);
		        if(!empty($validate)){
				
				//	$LoginAdmin = array();
					foreach($validate as $row)
					{
						$LoginAdmin = array(
							'email' =>$row['email'],
							'emp_id' =>$row['emp_id'],
							'emp_name' =>$row['emp_name'],
						);
							
					}
					//print_r($LoginAdmin); die();
		            $this->session->set_userdata('EmpLogged_In', $LoginAdmin);
		            redirect(base_url().'Employee_dashboard');
				}else{
					$Message = array('Message' => 'Invalid UserName Or Password...!');
					$this->session->set_flashdata('type', 'danger');
					$this->session->set_flashdata('Message', 'Invalid UserName Or Password...!');
					redirect(base_url().'employee_login');			
				}                 
			}		
		}
			
			$data['page_title'] = "Employee Login";
		    $this->load->view('fontend/employee/employee_login',$data); 
}
//function for logout 
public function logout()
{
	$this->session->unset_userdata('email');
    $this->session->unset_userdata('EmpLogged_In');
    redirect(base_url().'employee_login','refresh');
}
//function for redirect page on side bar menu click

    
}//end of class
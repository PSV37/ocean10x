<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_forword_seeker extends CI_Controller {
	public function __construct() {  
	    parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper("captcha");
		$this->load->model('Job_seeker_model');
        $this->load->model('Job_seeker_personal_model');
        $this->load->model('Job_seeker_photo_model');
        $this->load->model('Job_career_model');
        $this->load->model('Job_specialization_model');
        $this->load->model('Job_apply_model');
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

        // to get details about apply job table 
        $select_result = "job_post_id,company_id,";
        $tablename = "job_apply";
        $where_res['job_apply_id'] = $job_id;
        $apply_res = $this->Master_model->get_master_row($tablename, $select_result, $where_res, $join = FALSE);

           $company_id = $apply_res['company_id'];
           $job_post_id = $apply_res['job_post_id'];
	   
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
						foreach($validate as $rows)
						{
							$data['email'] = $rows['email'];
							$data['job_seeker_id'] = $rows['job_seeker_id'];
						}
                            $this->session->set_userdata($data);
                            // redirect('register/jobseeker_login', 'refresh');
                            if($this->Job_apply_model->check_apply_forwarded_job($job_seeker_id, $company_id, $job_post_id))
                            {
                                $this->load->view('fontend/alreadyapply');
                            } else {
                            // To update forwarded job status
                                $data_status=array( 
                                    'forword_job_status' => 2,
                                );
                                $where_update1['job_apply_id'] = $job_id;
                                $status = $this->Master_model->master_update($data_status, 'job_apply', $where_update1);
                                if($status==true)
                                {
                                    $wherejob = "job_post_id='$job_post_id' AND company_profile_id='$company_id'";
                                    $select_test = "is_test_required,job_post_id,company_profile_id";
                                  
                                    $data1['job_test'] = $this->Master_model->getMaster('job_posting',$wherejob,$join = FALSE, $order = false, $field = false, $select_test,$limit=false,$start=false, $search=false);
                                        
                                    $this->load->view('fontend/applysucess',$data1);
                                }
                            }
			            

					}else{
						$this->session->set_flashdata('type', 'danger');
						$this->session->set_flashdata('Message', 'Invalid User...!');
						$this->session->set_userdata($data);

                        // redirect('Job_forword_seeker/index');
                        if($this->Job_apply_model->check_apply_forwarded_job($job_seeker_id, $company_id, $job_post_id))
                        {
                            $this->load->view('fontend/alreadyapply');
                        } else {
                            // To update job status
                            $data_status=array( 
                                'forword_job_status' => 2,
                            );
                            $where_update1['job_apply_id'] = $job_id;
                            $status = $this->Master_model->master_update($data_status, 'job_apply', $where_update1);
                            if($status==true)
                            {
                                $wherejob = "job_post_id='$job_post_id' AND company_profile_id='$company_id'";
                                $select_test = "is_test_required,job_post_id,company_profile_id";
                              
                                $data1['job_test'] = $this->Master_model->getMaster('job_posting',$wherejob,$join = FALSE, $order = false, $field = false, $select_test,$limit=false,$start=false, $search=false);
                                    
                                $this->load->view('fontend/applysucess',$data1);
                            }
                        }
                        
      					
					}  
	            }else{
                        // To update job status
                        $data_status=array( 
                            'forword_job_status' => 2,
                        );
                        $where_update1['job_apply_id'] = $job_id;
                        $status = $this->Master_model->master_update($data_status, 'job_apply', $where_update1);
                        if($status==true)
                        {
    	                    $data['job_seeker_id'] = $job_seeker_id;
    	                    $data['email_id'] = $email_id;
    	                    $this->load->view('fontend/jobseeker/jobseeker_set_password',$data);
                        }
	                }
		         
	        } // verify password empty cond else
	          
	       else{
	                redirect('register/jobseeker_login', 'refresh');
	            }
	}

	
 public function create_seeker_account()
    {

        if ($_POST) {
            $js_info = array(
                'full_name' => $this->input->post('full_name'),
                'gender'    => $this->input->post('gender'),
                // 'user_name' => $this->input->post('user_name'),
                'password'  => md5($this->input->post('password')),
                'profession' => $this->input->post('profession'),
                // 'mobile_no'    => $this->input->post('mobile'),
                'js_status' => 1,
                'cv_type'   => 1,
            );
           
            $email_to = base64_decode($this->input->get('apply_id'));
	    	$seeker_id =$this->input->post('seeker_id');

          
                $inputCaptcha = $this->input->post('captcha');
                $sessCaptcha  = $this->session->userdata('captchaCode');
                if ($inputCaptcha === $sessCaptcha) {
                    
				$where_up['job_seeker_id'] = $seeker_id;
				$this->Master_model->master_update($js_info, 'js_info', $where_up); 
            
                // Last Id Add Personal Info Table
                $js_personal = array(
                    'job_seeker_id' => $seeker_id,
                );
                $this->Job_seeker_personal_model->insert($js_personal);

                // Last ID add Js Photo Table
                $js_photo = array(
                    'job_seeker_id' => $seeker_id,
                );
                $this->Job_seeker_photo_model->insert($js_photo);

                // Last ID add Js Carrer Table
                $js_career = array(
                    'job_seeker_id' => $seeker_id,
                );
                $this->Job_career_model->insert($js_career);

                // Last ID add Js Special Table
                $js_specialiazation = array(
                    'job_seeker_id' => $seeker_id,
                );

                $this->Job_specialization_model->insert($js_specialiazation);
                
                $subject = "Resisteration done successfully";
               	$message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"><?php echo get_logo();?></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Your account has been created successfully.<br><br>Good luck for Job search! 
Team ConsultnHire!<br>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

                    // successfully sent mail
                  // $this->job_seeker_model->sendEmail($email_to);

                   $send = sendEmail_JobRequest($email_to,$message,$subject);
                   // echo $message;);

                    $this->session->unset_userdata('reg_jobseeker');
  

                    $this->load->view('fontend/jobseeker/forward_register_success');
                } else {
                    $this->session->set_flashdata('captcha_msg', '<div class="alert alert-warning text-center">Captcha Code Does not Match Please Try Again</div>');
                    redirect_back();
                }
            

        } else {

            $config = array(
                'img_path'    => 'captcha_images/',
                'img_url'     => base_url() . 'captcha_images/',
                'img_width'   => '150',
                'img_height'  => 50,
                'word'        => strtoupper(substr(md5(time()), 0, 4)),
                'font_path' => FCPATH . 'captcha_images/font/captcha4.ttf',

            );
            $captcha = create_captcha($config);
            // Unset previous captcha and store new captcha word
            $this->session->unset_userdata('captchaCode');
            $this->session->set_userdata('captchaCode', $captcha['word']);
            // Send captcha image to view
            $captcha_images = $captcha['image'];
            $this->load->view('fontend/jobseeker/jobseeker_set_password', compact('captcha_images'));
        }

    }




}// end class
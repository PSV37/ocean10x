<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Confirm_interview extends CI_Controller {
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

	public function confirm_interview_now()
	{
	    $rec_id = base64_decode($this->input->get('apply_id'));
	    $email_id =base64_decode($this->input->get('js_id'));

        // to get details about apply job table 
        $select_result = "job_post_id,company_id,job_seeker_id";
        $tablename = "interview_scheduler";
        $where_res['id'] = $rec_id;
        $apply_res = $this->Master_model->get_master_row($tablename, $select_result, $where_res, $join = FALSE);

           $company_id = $apply_res['company_id'];
           $job_post_id = $apply_res['job_post_id'];

        $select_result1 = "interview_id,interview_date,start_time,end_time";
        $tablename1 = "interview_dates";
        $where_res1['interview_id'] = $rec_id;
        $apply_res1 = $this->Master_model->get_master_row($tablename1, $select_result1, $where_res1, $join = FALSE);

        $interview_id = $apply_res1['interview_id'];
        $interview_date = $apply_res1['interview_date'];
        $start_time = $apply_res1['start_time'];
        $end_time = $apply_res1['end_time'];
	   
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
                            $where_chlk = "id='$rec_id' AND is_slot_selected='1'";
                            $check_res1 = $this->Master_model->get_master_row('interview_scheduler', $select = FALSE, $where_chlk, $join = FALSE);
                        if($check_res1)
                            {
                                $this->load->view('fontend/alreadyconfirmed');
                            } else {
                            // To update forwarded job status
                                $data_status=array( 
                                    'interview_date'    => $interview_date,
                                    'start_time'        => $start_time,
                                    'end_time'          => $end_time,
                                    'confirm_status'    => 1,
                                    'is_slot_selected'  => 1,
                                    'updated_by'        => $job_seeker_id,
                                    'updated_on'        => date('Y-m-d H'),
                                );

                                $where_update1['id'] = $rec_id;
                                $status = $this->Master_model->master_update($data_status, 'interview_scheduler', $where_update1);
                                if($status==true)
                                {
                                    $wherejob = "interview_scheduler.job_post_id='$job_post_id' AND interview_scheduler.company_id='$company_id' AND interview_scheduler.job_seeker_id='$job_seeker_id'";
                                    $Join_data = array(
                                        'job_posting' => 'job_posting.job_post_id = interview_scheduler.job_post_id|INNER',
                                    );
                                    $select = "job_posting.job_title,interview_scheduler.interview_date,interview_scheduler.start_time,interview_scheduler.end_time,interview_scheduler.interview_type,interview_scheduler.interview_details,interview_scheduler.message_to_candidate,interview_scheduler.company_id";
                                    $data1['interview_data'] = $this->Master_model->getMaster('interview_scheduler',$wherejob, $Join_data, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);


                                    $email = $email_id;
                                    $subject = 'CONFIRMED. Interview request for '.$check_candidate['full_name'];
                                    $message = '
                                        <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                                        <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                                        <br><br>Hi '.$check_candidate['full_name'].',<br> Your interview is scheduled successfully: <br/>';

                                        $message .='<br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                                       $send = sendEmail_JobRequest($email,$message,$subject);
                                        
                                    $this->load->view('fontend/confirmsucess',$data1);
                                }
                            }
			            

					}else{
						$this->session->set_flashdata('type', 'danger');
						$this->session->set_flashdata('Message', 'Invalid User...!');
						$this->session->set_userdata($data);

                        $where_chlk = "id='$rec_id' AND is_slot_selected='1'";
                            $check_res1 = $this->Master_model->get_master_row('interview_scheduler', $select = FALSE, $where_chlk, $join = FALSE);
                        if($check_res1==true)
                        {
                            $this->load->view('fontend/alreadyconfirmed');
                        } else {
                            // To update job status
                            $data_status=array( 
                                'interview_date'    => $interview_date,
                                'start_time'        => $start_time,
                                'end_time'          => $end_time,
                                'confirm_status'    => 1,
                                'is_slot_selected'  => 1,
                                'updated_by'        => $job_seeker_id,
                                'updated_on'        => date('Y-m-d H'),
                            );
                            $where_update1['id'] = $rec_id;
                            $status = $this->Master_model->master_update($data_status, 'interview_scheduler', $where_update1);
                            if($status==true)
                            {
                                 $wherejob = "interview_scheduler.job_post_id='$job_post_id' AND interview_scheduler.company_id='$company_id' AND interview_scheduler.job_seeker_id='$job_seeker_id'";
                                    $Join_data = array(
                                        'job_posting' => 'job_posting.job_post_id = interview_scheduler.job_post_id|INNER',
                                    );
                                    $select = "job_posting.job_title,interview_scheduler.interview_date,interview_scheduler.start_time,interview_scheduler.end_time,interview_scheduler.interview_type,interview_scheduler.interview_details,interview_scheduler.message_to_candidate,interview_scheduler.company_id";
                                    $data1['interview_data'] = $this->Master_model->getMaster('interview_scheduler',$wherejob, $Join_data, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

                                    $email = $email_id;
                                    // $email = 'shyam@itdivine.in';
                                    $subject = 'CONFIRMED. Interview request for '.$check_candidate['full_name'];
                                    $message = '
                                        <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                                        <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                                        <br><br>Hi '.$check_candidate['full_name'].',<br> Your interview is scheduled successfully: <br/>';

                                        $message .='<br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

                                    $send = sendEmail_JobRequest($email,$message,$subject);

                                $this->load->view('fontend/confirmsucess',$data1);
                            }
                        }
                        
      					
					}  
	            }else{
                        // To update job status
                       $data_status=array( 
                            'interview_date'    => $interview_date,
                            'start_time'        => $start_time,
                            'end_time'          => $end_time,
                            'confirm_status'    => 1,
                            'is_slot_selected'  => 1,
                            'updated_by'        => $job_seeker_id,
                            'updated_on'        => date('Y-m-d H'),
                        );
                        $where_update1['id'] = $rec_id;
                        $status = $this->Master_model->master_update($data_status, 'interview_scheduler', $where_update1);
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


    public function select_slot()
    {
        $rec_id = base64_decode($this->input->get('apply_id'));
        $email_id =base64_decode($this->input->get('js_id'));

        // to get details about apply job table 
        $select_result = "interview_id,interview_date,start_time,end_time";
        $tablename = "interview_dates";
        $where_res['id'] = $rec_id;
        $apply_res = $this->Master_model->get_master_row($tablename, $select_result, $where_res, $join = FALSE);

        $interview_id = $apply_res['interview_id'];
        $interview_date = $apply_res['interview_date'];
        $start_time = $apply_res['start_time'];
        $end_time = $apply_res['end_time'];

        $select_result1 = "job_post_id,company_id,job_seeker_id";
        $tablename1 = "interview_scheduler";
        $where_res1['id'] = $interview_id;
        $apply_res1 = $this->Master_model->get_master_row($tablename1, $select_result1, $where_res1, $join = FALSE);

           $company_id = $apply_res1['company_id'];
           $job_post_id = $apply_res1['job_post_id'];


        $wherecan="email= '$email_id'";
        $check_candidate = $this->Master_model->get_master_row('js_info', $select = FALSE, $wherecan, $join = FALSE);
            // echo $this->db->last_query(); echo "<br><br>"; 
            if($check_candidate)
            {
                $job_seeker_id = $check_candidate['job_seeker_id'];
                $email_id = $check_candidate['email'];
                $pass = $check_candidate['password'];
                             
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

                        $where_chlk = "id='$interview_id' AND is_slot_selected='1'";
                        $check_res1 = $this->Master_model->get_master_row('interview_scheduler', $select = FALSE, $where_chlk, $join = FALSE);

                            // if($this->Job_apply_model->check_confirmed_interview($job_seeker_id, $company_id, $job_post_id))
                            if($check_res1==ture)
                            {
                                $this->load->view('fontend/alreadyconfirmed');
                            } else {
                            // To update forwarded job status
                                $data_status=array( 
                                    'interview_date'    => $interview_date,
                                    'start_time'        => $start_time,
                                    'end_time'          => $end_time,
                                    'confirm_status'    => 1,
                                    'is_slot_selected'  => 1,
                                    'updated_by'        => $job_seeker_id,
                                    'updated_on'        => date('Y-m-d H'),
                                );
                                $where_update1['id'] = $interview_id;
                                $status = $this->Master_model->master_update($data_status, 'interview_scheduler', $where_update1);
      
                                if($status==true)
                                {
                                    $wherejob = "interview_scheduler.job_post_id='$job_post_id' AND interview_scheduler.company_id='$company_id' AND interview_scheduler.job_seeker_id='$job_seeker_id'";
                                    $Join_data = array(
                                        'job_posting' => 'job_posting.job_post_id = interview_scheduler.job_post_id|INNER',
                                    );
                                    $select = "job_posting.job_title,interview_scheduler.interview_date,interview_scheduler.start_time,interview_scheduler.end_time,interview_scheduler.interview_type,interview_scheduler.interview_details,interview_scheduler.message_to_candidate,interview_scheduler.company_id";
                                    $data1['interview_data'] = $this->Master_model->getMaster('interview_scheduler',$wherejob, $Join_data, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);


                                    $email = $email_id;
                                    // $email = 'shyam@itdivine.in';
                                    $subject = 'CONFIRMED. Interview date and time for '.$check_candidate['full_name'];
                                    $message = '
                                        <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                                        <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                                        <br><br>Hi '.$check_candidate['full_name'].',<br> Your interview slot is scheduled successfully here are the details: <br/><b>Interview Date:</b>'.$interview_date.'<br/><b>Start Time:</b>'.$start_time.'<br/><b>End Time:</b>'.$end_time.'<br/>';

                                        $message .='<br><br>Good luck!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                                       $send = sendEmail_JobRequest($email,$message,$subject);
                                        
                                    $this->load->view('fontend/confirmsucess',$data1);
                                }
                            }
                        

                    }else{
                        $this->session->set_flashdata('type', 'danger');
                        $this->session->set_flashdata('Message', 'Invalid User...!');
                        $this->session->set_userdata($data);

                        // redirect('Job_forword_seeker/index');
                        $where_chlk = "id='$interview_id' AND is_slot_selected='1'";
                        $check_res1 = $this->Master_model->get_master_row('interview_scheduler', $select = FALSE, $where_chlk, $join = FALSE);

                            // if($this->Job_apply_model->check_confirmed_interview($job_seeker_id, $company_id, $job_post_id))
                        if($check_res1==ture)
                        // if($this->Job_apply_model->check_confirmed_interview($job_seeker_id, $company_id, $job_post_id))
                        {
                            $this->load->view('fontend/alreadyconfirmed');
                        } else {
                            // To update job status
                            $data_status=array( 
                                'interview_date'    => $interview_date,
                                'start_time'        => $start_time,
                                'end_time'          => $end_time,
                                'confirm_status'    => 1,
                                'is_slot_selected'  => 1,
                                'updated_by'        => $job_seeker_id,
                                'updated_on'        => date('Y-m-d H'),
                            );
                            $where_update1['id'] = $interview_id;
                            $status = $this->Master_model->master_update($data_status, 'interview_scheduler', $where_update1);
                            if($status==true)
                            {
                                 $wherejob = "interview_scheduler.job_post_id='$job_post_id' AND interview_scheduler.company_id='$company_id' AND interview_scheduler.job_seeker_id='$job_seeker_id'";
                                    $Join_data = array(
                                        'job_posting' => 'job_posting.job_post_id = interview_scheduler.job_post_id|INNER',
                                    );
                                    $select = "job_posting.job_title,interview_scheduler.interview_date,interview_scheduler.start_time,interview_scheduler.end_time,interview_scheduler.interview_type,interview_scheduler.interview_details,interview_scheduler.message_to_candidate,interview_scheduler.company_id";
                                    $data1['interview_data'] = $this->Master_model->getMaster('interview_scheduler',$wherejob, $Join_data, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

                                    $email = $email_id;
                                    // $email = 'shyam@itdivine.in';
                                    $subject = 'CONFIRMED. Interview date and time for '.$check_candidate['full_name'];
                                    $message = '
                                        <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                                        <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                                        <br><br>Hi '.$check_candidate['full_name'].',<br> Your interview slot is scheduled successfully here are the details: <br/><b>Interview Date:</b>'.$interview_date.'<br/><b>Start Time:</b>'.$start_time.'<br/><b>End Time:</b>'.$end_time.'<br/>';

                                    $message .='<br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

                                    $send = sendEmail_JobRequest($email,$message,$subject);

                                $this->load->view('fontend/confirmsucess',$data1);
                            }
                        }
                        
                        
                    }  
                }else{
                        // To update job status
                       $data_status=array( 
                            'interview_date'    => $interview_date,
                            'start_time'        => $start_time,
                            'end_time'          => $end_time,
                            'confirm_status'    => 1,
                            'is_slot_selected'  => 1,
                            'updated_by'        => $job_seeker_id,
                            'updated_on'        => date('Y-m-d H'),
                        );
                        $where_update1['id'] = $interview_id;
                        $status = $this->Master_model->master_update($data_status, 'interview_scheduler', $where_update1);
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


    public function accept_invitation()
    {
        $jobseeker_id = base64_decode($this->input->get('apply_id'));
        $conn_id =base64_decode($this->input->get('connection_id'));
        $created_on = date('Y-m-d H:i:s');
        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($created_on)));

        $where_hlk = "(job_seeker_id='$jobseeker_id' AND connection_id='$conn_id') OR (job_seeker_id='$conn_id' AND connection_id='$jobseeker_id')";
        $result = $this->Master_model->get_master_row('message_connections', $select = FALSE, $where_hlk, $join = FALSE);
         $rec = $result['id'];
        // echo $this->db->last_query(); die;
        $data_ck = array(
            'job_seeker_id' => "'".$conn_id."'",
        );
        $validate = $this->Master_model->get_master_row('js_info', $select = FALSE, $data_ck, $join = FALSE);
        if(!empty($validate))
        {
            $data['email'] = $validate['email'];
            $data['job_seeker_id'] = $validate['job_seeker_id'];
           
            $this->session->set_userdata($data);
            $where_chlk = "(job_seeker_id='$jobseeker_id' AND connection_id='$conn_id' AND connect_status='1') OR (job_seeker_id='$conn_id' AND connection_id='$jobseeker_id' AND connect_status='1')";
            $check_res1 = $this->Master_model->get_master_row('message_connections', $select = FALSE, $where_chlk, $join = FALSE);
        if($check_res1)
            {
                $this->load->view('fontend/alreadyconnected');
            } else {

                $data_status=array( 
                    'connect_status'    => 1,
                    'updated_by'        => $conn_id,
                    'updated_on'        => $cenvertedTime,
                );
                $where_u1['id']=$rec;
                $status = $this->Master_model->master_update($data_status, 'message_connections', $where_u1);
               
                if($status==true)
                {
                    $where_c = "job_seeker_id='$jobseeker_id'";
                    $data['sender'] = $this->Master_model->get_master_row('js_info', $select = FALSE, $where_c, $join = FALSE);

                    //$email = $email_id;
                    // $subject = 'CONFIRMED. Interview request for '.$check_candidate['full_name'];
                    // $message = '
                    //     <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                    //     <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                    //     <br><br>Hi '.$check_candidate['full_name'].',<br> Your interview is scheduled successfully: <br/>';
                    //     $message .='<br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                    //    $send = sendEmail_JobRequest($email,$message,$subject);
                        
                    $this->load->view('fontend/accept_invitation',$data);
                }
            }

        }else{
                redirect('register/jobseeker_login', 'refresh');
            }
    }


    public function reschedule_interview()
    {
        $interview_id = base64_decode($this->input->get('apply_id'));
        $email_id =base64_decode($this->input->get('js_id'));
        $interview_date=$this->input->post('resc_interview_date');
        $start_time=$this->input->post('start_time');
        
         $Join_data = array(
                                        'company_profile' => 'company_profile.company_profile_id = interview_scheduler.company_id|Left OUTER ',
                                         'js_info' => 'js_info.job_seeker_id = interview_scheduler.job_seeker_id|Left OUTER ',
                                    );
        $where_cond['id']=$interview_id;
       
         $interview_data = $this->Master_model->getMaster('interview_scheduler',$where_cond, $Join_data, $order = false, $field = false, $select=FALSE,$limit=false,$start=false, $search=false);
        print_r($interview_data['company_email']);
        // $email=$interview_data['company_email'];
        // $subject="Reschedule Interview for";
        // $message='<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
        //                 <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
        //                 <br><br>Hi '.$interview_data['company_name'].',<br>'.$interview_data['full_name'].' wants to Reschedule the Interview on'.$interview_date.' at '.$start_time.' <br/>';
        //                 $message .='<br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


        //                $send = sendEmail_JobRequest($email,$message,$subject);
               
               

    }


}// end class
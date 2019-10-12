<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_forword_seeker extends CI_Controller {
	public function __construct() {  
	    parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper("captcha");
		$this->load->model('job_seeker_model');
        $this->load->model('job_seeker_personal_model');
        $this->load->model('job_seeker_photo_model');
        $this->load->model('Job_career_model');
        $this->load->model('Job_specialization_model');
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
						foreach($validate as $rows)
						{
							$data['email'] = $rows['email'];
							$data['job_seeker_id'] = $rows['job_seeker_id'];
						}
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

	
 public function create_seeker_account()
    {

        if ($_POST) {
            $js_info = array(
                'full_name' => $this->input->post('full_name'),
                // 'email'     => $this->input->post('email'),
                'gender'    => $this->input->post('gender'),
                'user_name' => $this->input->post('user_name'),
                'password'  => md5($this->input->post('password')),
                // 'js_token'  => md5($this->input->post('email')),
                'js_status' => 0,
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
                $this->job_seeker_personal_model->insert($js_personal);

                // Last ID add Js Photo Table
                $js_photo = array(
                    'job_seeker_id' => $seeker_id,
                );
                $this->job_seeker_photo_model->insert($js_photo);

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
                    // successfully sent mail
                   $this->job_seeker_model->sendEmail($email_to);
                    $this->session->unset_userdata('reg_jobseeker');
  

                    $this->load->view('fontend/jobseeker/register_success');
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
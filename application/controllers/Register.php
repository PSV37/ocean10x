<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('job_seeker_model');
        $this->load->model('job_seeker_personal_model');
        $this->load->model('job_seeker_photo_model');
        $this->load->model('Job_career_model');
        $this->load->model('Job_specialization_model');
        $this->load->helper("captcha");
    }

    public function index()
    {

        if ($_POST) {
            $js_info = array(
                'full_name' => $this->input->post('full_name'),
                'email'     => $this->input->post('email'),
                'gender'    => $this->input->post('gender'),
                // 'user_name' => $this->input->post('user_name'),
                'password'  => md5($this->input->post('password')),
                'js_token'  => md5($this->input->post('email')),
                'js_status' => 0,
                'cv_type'   => 1,
            );
            $email_to = $this->input->post('email');
            $exist_email    = $this->job_seeker_model->email_check($this->input->post('email'));
            // $exist_username = $this->job_seeker_model->username_check($this->input->post('user_name'));
                 $this->session->set_userdata('reg_jobseeker', $js_info );

			// if ($exist_username) {
   //              // all Ready Account Message
   //              $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your username Or Account Already Use This!</div>');
   //              redirect('register');
   //          }

            if ($exist_email) {
                // all Ready Account Message
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Or Account Already Use This!</div>');
                redirect('register');
            } else {
                $inputCaptcha = $this->input->post('captcha');
                $sessCaptcha  = $this->session->userdata('captchaCode');
                if ($inputCaptcha === $sessCaptcha) {
                    
                $last_id = $this->job_seeker_model->insert($js_info);

                // Last Id Add Personal Info Table
                $js_personal = array(
                    'job_seeker_id' => $last_id,
                );
                $this->job_seeker_personal_model->insert($js_personal);

                // Last ID add Js Photo Table
                $js_photo = array(
                    'job_seeker_id' => $last_id,
                );
                $this->job_seeker_photo_model->insert($js_photo);

                // Last ID add Js Carrer Table
                $js_career = array(
                    'job_seeker_id' => $last_id,
                );
                $this->Job_career_model->insert($js_career);

                // Last ID add Js Special Table
                $js_specialiazation = array(
                    'job_seeker_id' => $last_id,
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
            $this->load->view('fontend/jobseeker/register', compact('captcha_images'));
        }

    }

    public function refresh()
    {
        // Captcha configuration
        $config = array(
            'img_path'    => 'captcha_images/',
            'img_url'     => base_url() . 'captcha_images/',
            'img_width'   => '150',
            'img_height'  => 50,
            'word_length' => 4,
            'font_path' => FCPATH . 'captcha_images/font/captcha4.ttf',
        );
        $captcha = create_captcha($config);

        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);

        // Display captcha image
        echo $captcha['image'];
    }

    public function verify($hash = null)
    {
        if ($this->job_seeker_model->verifyEmailID($hash)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            $this->load->view('fontend/jobseeker/verify_success');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('register/jobseeker_login');
        }

    }

    public function jobseeker_login()
    {

        $job_seeker_id = $this->session->userdata('job_seeker_id');
        if ($job_seeker_id != null) {
            redirect('job_seeker/seeker_info');
    }

        $this->load->view('fontend/jobseeker/login');
    }

    public function check_login()
    {

        $jobseeker_email    = $this->input->post('email');
        $jobseeker_password = md5($this->input->post('password'));
        $result             = $this->job_seeker_model->check_login_info($jobseeker_email, $jobseeker_password);
        if (!empty($result)) {
            $data['job_seeker_id'] = $result->job_seeker_id;
            $data['user_name']     = $result->user_name;
            $this->session->set_userdata($data);
            redirect('job_seeker/seeker_info');
        } else {
            $this->session->set_flashdata('invalid', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('register/jobseeker_login');
        }
    }

    public function getCaptcha(){
        $data=$this->session->userdata('captchaCode');
        header('Content-Type: application/json');
        echo json_encode($this->session->userdata('captchaCode'));
    }
    
    
     public function forgot_pass()
    {
    	if($this->input->post('email')==''){
	 $this->load->view('fontend/jobseeker/forgot');
	 return;
	 }
	 
        $jobseeker_email    = $this->input->post('email');
        $result             = $this->job_seeker_model->check_forgot_user_info($jobseeker_email);
        if (!empty($result)) {
            $data['job_seeker_id'] = $result->job_seeker_id;
            $data['user_name']     = $result->user_name;
            $this->session->set_userdata($data);
             $this->session->set_flashdata('invalid', '<div class="alert alert-success text-center">An email has been sent to you to reset password.</div>');
             redirect('register/jobseeker_login');
        } else {
            $this->session->set_flashdata('invalid', '<div class="alert alert-danger text-center">Sorry! Invalid email address provided!</div>');
            redirect('register/forgot_pass');
        }
    }
    
     public function reset_password($hash = '')
    {
    
 
    	if(!$this->input->post('password')){
	 $this->load->view('fontend/jobseeker/reset_password');
	 return;
	 }
	
	  $pass    = md5($this->input->post('password'));
   
         
        if ($this->job_seeker_model->reset_account($hash,$pass)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your password is successfully reset! Please login to access your account!</div>');
            redirect('register/jobseeker_login');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error in verifying your account!</div>');
            redirect('register/jobseeker_login');
        }

    }
    
}

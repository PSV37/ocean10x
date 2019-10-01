<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employer_register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'company_slug',
            'table' => 'company_profile',
        );


        $this->load->library('slug', $config);
        $this->load->model('company_profile_model');
        $this->load->helper("captcha");
    }

    public function index()
    {
         $config = array(
            'img_path'      => 'captcha_images/',
            'img_url'       => base_url().'captcha_images/',
            'img_width'     => '150',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_path' => FCPATH . 'captcha_images/font/captcha4.ttf',
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Send captcha image to view
        $captcha_images = $captcha['image'];
		
        $this->load->view('fontend/employer/employer_register.php',compact('captcha_images'));

    }

    public function create()
    {


        if($_POST){
        $company_name    = $this->input->post('company_name');
        $company_slug    = slugify($company_name);
        $company_profile = array(
            'company_name'     => $this->input->post('company_name'),
            'company_slug'     => $this->slug->create_uri($this->input->post('company_name')),
            'company_email'    => $this->input->post('company_email'),
            'company_username' => $this->input->post('company_username'),
            'company_service'  => $this->input->post('company_service'),
            'company_address'  => $this->input->post('company_address'),
            'company_password' => md5($this->input->post('company_password')),
            'token'            => md5($this->input->post('company_email')),
        );

        $to_email=$this->input->post('company_email');
        $exist_email    = $this->company_profile_model->email_check($this->input->post('company_email'));
        $exist_username = $this->company_profile_model->username_check($this->input->post('company_username'));
$this->session->set_userdata('reg_in', $company_profile );
  $company_logo = isset($_FILES['company_logo']['name']) ? $_FILES['company_logo']['name'] : null;


       if (!empty($company_id) || !empty($company_logo)) {
                if (!empty($company_logo)) {
                    $config['upload_path']   = 'upload/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['encrypt_name']  = true;
                     $config['max_width']     = 300;
                    $config['max_height']    = 300;

                    $this->load->library('upload', $config);
                    $result_upload                   = $this->upload->do_upload('company_logo');
                    $upload_data                     = $this->upload->data();
                    $company_logo                    = $upload_data['file_name'];
                    $company_profile['company_logo'] = $company_logo;

                    if (!$result_upload == true) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Logo Size Max size 300*300</div>');
                        echo "error";
                        ///redirect('employer/profile-setting');
                    } 
                }
            }


        if ($exist_email) {
            // all Ready Account Message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Or Account Already Use This!</div>');
            redirect('employer_register');
        } else {
              $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){

            $this->company_profile_model->insert($company_profile);
            $this->company_profile_model->sendEmail($to_email);

            $this->session->unset_userdata($company_profile);
 $this->session->unset_userdata('reg_in');


            // successfully sent mail
            $this->load->view('fontend/employer/register_success');
        } else {
             $this->session->set_flashdata('captchaCode_msg', '<div class="alert alert-warning text-center">captcha code does not match please try again</div>');
                redirect_back();
        }

        } 
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
        if ($this->company_profile_model->verifyEmailID($hash)) {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
             $this->load->view('fontend/employer/verify_success');
        } else {
            $this->session->set_flashdata('verify_msg', '<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('employer_register');
        }

    }


     public function getCaptcha(){
        $data=$this->session->userdata('captchaCode');
        header('Content-Type: application/json');
        echo json_encode($this->session->userdata('captchaCode'));
    }

}

// public function check_login () {

//     $company_email=$this->input->post('email');
//     $company_password=$this->input->post('password');
//    $result=$this->employer_login_model->check_login_info($company_email,$company_password);
//         if(!empty($result)) {
//             $data['company_profile_id']=$result->company_profile_id;
//             $data['company_name']=$result->company_name;
//             $this->session->set_userdata($data);
//              redirect('employer/dashboard');
//         } else {
//             echo "This Password is Not Valid ";
//             }
// }

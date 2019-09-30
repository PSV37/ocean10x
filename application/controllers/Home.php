<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends MY_Fontend_Controller
{
     public function __construct()
    {

        parent::__construct();
       $this->load->helper("captcha");
    }

    public function index()
    {

        $categorys        = $this->job_category_model->get();
        $selected_company = $this->company_profile_model->get_all_company_by_selected_cv();
        $result_latest_jobs = $this->job_posting_model->recent_all_jobs2();
       // print_r($result_latest_jobs);exit;
        $this->load->view('fontend/index.php', compact('categorys', 'selected_company','result_latest_jobs'));
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

    public function contact_us()
    {
        $data['row']= $this->company_profile_model->get_settings();
//        echo '<pre>';
//        print_r($data);
//        exit;
        
        if ($_POST) {
            $fname=$this->input->post('fname');
            $lname=$this->input->post('lname');
            $email=$this->input->post('email');
            $feedback=$this->input->post('feedback');
            $msg=$this->input->post('msg');

            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){

            $adminmail='sharjil.hz@gmail.com';
          $this->public_demand_model->publicMail($fname,$email);
          $this->public_demand_model->adminMail($adminmail,$fname,$email,$feedback,$msg);
           $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Thank you for contact Career Portals</div>');
           redirect('home/contact_us');
       } else {
        $this->session->set_flashdata('captcha_msg', '<div class="alert alert-warning text-center">captcha code does not match please try again</div>');
                redirect_back();
       }
        } else {
            $config = array(
            'img_path'    => 'captcha_images/',
            'img_url'     => base_url() . 'captcha_images/',
            'img_width'   => '150',
            'img_height'  => 50,
            'font_path' => FCPATH . 'captcha_images/font/captcha4.ttf',
            'word_length' => 4,
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and store new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Send captcha image to view
        $data['captcha_images'] = $captcha['image'];
            $this->load->view('fontend/contact_us.php', $data);
        }
    }

    public function about_us()
    {
        $this->load->view('fontend/about_us.php');
    }

       public function terms()
    {
        $this->load->view('fontend/terms_and_conditions.php');
    }

    public function how_to_build_cv()
    {
        $this->load->view('fontend/how_to_build_cv.php');
    }



    public function save_publicdemand()
    {
        if ($_POST) {
            $public_demand = array(
                'public_name'    => $this->input->post('public_name'),
                'public_email'   => $this->input->post('public_email'),
                'public_comment' => $this->input->post('public_comment'),
            );
            $this->public_demand_model->insert($public_demand);
           $this->load->view('fontend/publicmsg');
        } else {
            redirect('home');
        }
    }

    public function test123()
    {

        $data = $this->company_profile_model->get_company_info_by_slug('brac-it-center');
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function employer_selectedcv($company_slug)
    {
        if ($this->company_profile_model->check_slug_name($company_slug) == true) {
            $company_info = $this->company_profile_model->get_company_info_by_slug($company_slug);
            $this->load->view('fontend/employer_profile', compact('company_info'));
        } else {
            echo "not found";
        }
    }

    public function employer_internship($company_slug)
    {
        if ($this->company_profile_model->check_slug_name($company_slug) == true) {
            $company_info = $this->company_profile_model->get_company_info_by_slug($company_slug);
            $this->load->view('fontend/ep_internship', compact('company_info'));
        } else {
            echo "not found";
        }
    }

    public function employer_bankbooks($company_slug)
    {
        if ($this->company_profile_model->check_slug_name($company_slug) == true) {
            $company_info = $this->company_profile_model->get_company_info_by_slug($company_slug);
            $this->load->view('fontend/ep_bankbook', compact('company_info'));
        } else {
            echo "not found";
        }
    }

    public function internship()
    {

        $internship = $this->company_profile_model->get_all_company_by_internship_cv();
        $this->load->view('fontend/internshipjob.php', compact('internship'));
    }

    public function banksbook()
    {
        $bankbook = $this->company_profile_model->get_all_company_by_banksbook();
        $this->load->view('fontend/bankbookjob.php', compact('bankbook'));
    }


    public function zohoverify(){
        $this->load->view('zohoverify/verifyforzoho.html');
    }

      public function getCaptcha(){
        $data=$this->session->userdata('captchaCode');
        header('Content-Type: application/json');
        echo json_encode($this->session->userdata('captchaCode'));
    }
    
     public function fast_upload_resume()
    {
      if ($_POST) {
            $fname=$this->input->post('full_names');
            $em=$this->input->post('emails');
            
            //$_FILES["filenames"]["tmp_name"]
            
            //send email
            $this->load->library('email');
            
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

            $message='<p>Resume Upload form has been submited. Attached is the resume and below are details:</p>
			<p>Full Name: '.$fname.'</p>
			<p>Email Address: '.$em.'</p>
			<p>&nbsp;</p>
			<p>Thank you,</p>
			<p>&nbsp;</p>
			';

            $this->email->initialize($config);
            $this->email->from('notification@yourdomain.com', 'Career Portal');
            $this->email->to('youremail@domain.com');
            $this->email->cc('youremail@domain.com');
            $this->email->bcc('demo@hotmail.com');
            $this->email->reply_to($fname, $em);
            $this->email->subject('Resume Uploaded');
            $this->email->attach($_FILES["filenames"]["tmp_name"], 'attachment', $_FILES["filenames"]["name"]);
            $this->email->message($message);
            $this->email->send(FALSE);
         //  echo $this->email->print_debugger(array('headers'));
          //  exit;
          $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Success!</strong> Thank you for your submission. We will contact you soon.</div>');
            redirect(base_url());
            
            
            }
    }
   

}

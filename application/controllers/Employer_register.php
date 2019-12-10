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
		$city = $this->Master_model->getMaster('city',$where=false);
		$country = $this->Master_model->getMaster('country',$where=false);
		$state = $this->Master_model->getMaster('state',$where=false);
		$job_category = $this->Master_model->getMaster('job_category',$where=false);
        $this->load->view('fontend/employer/employer_register.php',compact('captcha_images', 'js_personal_info', 'city', 'country', 'state', 'job_category'));

    }

    public function create()
    {


        if($_POST){
           $this->form_validation->set_rules('company_password', 'password', 'required|max_length[15]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]');
           array('required' => 'You must provide a %s.','regex_match' =>'You must provide One Uppercase,One Lowercase,Numbers');
             if ($this->form_validation->run() == FALSE)
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
        $city = $this->Master_model->getMaster('city',$where=false);
        $country = $this->Master_model->getMaster('country',$where=false);
        $state = $this->Master_model->getMaster('state',$where=false);
        $job_category = $this->Master_model->getMaster('job_category',$where=false);
        $this->load->view('fontend/employer/employer_register.php',compact('captcha_images', 'js_personal_info', 'city', 'country', 'state', 'job_category'));
               // redirect('Employer_register');
               $this->load->view('fontend/employer/employer_register');    
            }
            else
            {
        $company_name    = $this->input->post('company_name');
        $company_slug    = slugify($company_name);
        $company_profile = array(
            'comp_type'        => $this->input->post('company_type'),
            'company_name'     => $this->input->post('company_name'),
            'company_slug'     => $this->slug->create_uri($this->input->post('company_name')),
            'company_email'    => $this->input->post('company_email'),
            'company_username' => $this->input->post('company_username'),
            //'dept_id'  => $this->input->post('dept_id'),
            'company_address'  => $this->input->post('company_address'),
			'company_address2'  => $this->input->post('company_address2'),
			'country_id'       => $this->input->post('country_id'),
			'state_id'         => $this->input->post('state_id'),
			'city_id'          => $this->input->post('city_id'),
			// 'company_pincode'          => $this->input->post('company_pincode'),
            'company_password' => md5($this->input->post('company_password')),
            'token'            => md5($this->input->post('company_email')),
        );

        $to_email=$this->input->post('company_email');
		$exist_companyname = $this->company_profile_model->companyname_check($this->input->post('company_name'));
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
		if ($exist_companyname) {
            // all Ready Account Message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Company Name Or Account Already Use This!</div>');
            redirect('employer_register');
        } 

        if ($exist_email) {
            // all Ready Account Message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Or Account Already Use This!</div>');
            redirect('employer_register');
        }
		if ($exist_username) {
            // all Ready Account Message
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Username Or Account Already Use This!</div>');
            redirect('employer_register');
        } 
		
		else {
              $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){

            $this->company_profile_model->insert($company_profile);
            $this->company_profile_model->sendEmail($to_email);

            $this->session->unset_userdata($company_profile);
             $this->session->unset_userdata('reg_in');
             $data['company_name']=$this->input->post('company_name');


            // successfully sent mail
            $this->load->view('fontend/employer/register_success',$data);
        } else {
             $this->session->set_flashdata('captchaCode_msg', '<div class="alert alert-warning text-center">captcha code does not match please try again</div>');
                redirect_back();
        }

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
	

   /* Autosearch Pincode */
    public function search(){
 
        $term = $this->input->get('term');
 
        $this->db->like('pincode', $term);
 
        $data = $this->db->get("pincode")->result();
 
        echo json_encode( $data);
    }
     
	/*Username Checked */
	/* public function checkUsername()
 {
  $this->load->model('Search_model');
  if($this->Search_model->getUsername($_POST['username'])){
   echo '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true">
   </i> This user is already registered</span></label>';
  }
  else {
   echo '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Username is available</span></label>';
  }
 } */
 
	
	
		function getstate(){
	$country_id = $this->input->post('id');
	$where['country_id'] = $country_id;
	$states = $this->Master_model->getMaster('state',$where);
	$result = '';
	if(!empty($states)){ 
		$result .='<option value="">Select State</option>';
		foreach($states as $key){
		  $result .='<option value="'.$key['state_id'].'">'.$key['state_name'].'</option>';
		}
	}else{
	
		$result .='<option value="">State not available</option>';
	}
	 echo $result;
}


 function getcity(){
	$state_id = $this->input->post('id');
	$where['state_id'] = $state_id;
	$citys = $this->Master_model->getMaster('city',$where);
	$result = '';
	if(!empty($citys)){ 
		$result .='<option value="">Select City</option>';
		foreach($citys as $key){
		  $result .='<option value="'.$key['id'].'">'.$key['city_name'].'</option>';
		}
	}else{
	
		$result .='<option value="">State not available</option>';
	}
	 echo $result;
}
public function password_check($str)
{
   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
     return TRUE;
   }
   return FALSE;
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



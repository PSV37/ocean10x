<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Training extends MY_Fontend_Controller
{

    public function __construct() {
        parent:: __construct();
        $this->load->helper("captcha");
    }



    public function index($offset = 0)
    {
        $limit        = $this->config->item('postper_page');
        $traininglist = $traininglist = $this->training_info_model->get_all_training($limit, $offset);
        $totalrow     = $traininglist['total_row'];
        $traininglist = $traininglist['result'];
        $this->load->view('fontend/training/all_training.php', compact('totalrow', 'traininglist', 'limit', 'offset'));
    }

    public function page($offset = 0)
    {
        $this->index($offset);
    }

    public function show($training_slug = null)
    {

        if (!empty($training_slug) && $this->training_info_model->check_training_slug($training_slug) == true) {
            $training_info = $this->training_info_model->get_training_by_slug($training_slug);
            $this->load->view('fontend/training/training_details.php', compact('training_info'));
        } else {
            echo 'not found';
        }

    }

    public function training_type($training_type, $offset = 0)
    {
        if (!empty($training_type)) {

            if ($training_type == "workshop") {
                $training_type = 1;
            } else if ($training_type == "customized-course") {
                $training_type = 2;
            } else if ($training_type == "international") {
                $training_type = 3;
            }

            $limit        = $this->config->item('postper_page');
            $traininglist = $this->training_info_model->get_all_training_by_trainingtype($limit, $offset, $training_type);
            $totalrow     = $traininglist['total_row'];
            $traininglist = $traininglist['result'];
            $this->load->view('fontend/training/all_training_by_type.php', compact('totalrow', 'traininglist', 'limit', 'offset', 'training_type'));

        }

    }

    public function registration($training_slug = null)
    {

        if (!empty($training_slug) && $this->training_info_model->check_training_slug($training_slug) == true) {

            // Captcha configuration
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

            $training_info = $this->training_info_model->get_training_by_slug($training_slug);
            $this->load->view('fontend/training/training_registration.php', compact('training_info','captcha_images'));
        } else {
            echo 'not found';
        }

        
    }

    public function refresh(){
        // Captcha configuration
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
        
        // Display captcha image
        echo $captcha['image'];
    }

    public function submit_registration()
    {

        if ($_POST) {

            $training_users = array(

                'training_info_id'  => $this->input->post('training_info_id'),
                'full_name'         => $this->input->post('full_name'),
                'email'             => $this->input->post('email'),
                'voice'             => $this->input->post('voice'),
                'training_title'    => $this->input->post('training_title'),
                'training_duration' => $this->input->post('training_duration'),
                'venue'             => $this->input->post('venue'),
                'training_fee'      => $this->input->post('training_fee'),
                'payment_method'    => $this->input->post('payment_method'),
            );

            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){
                 $this->training_user_model->insert($training_users);
                  $this->load->view('fontend/training/training_registration_success.php');
            }else{
                 $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">captcha code does not match please try again</div>');
                redirect_back();
            }
           
        } else {
            echo "not Found";
        }

    }
     public function getCaptcha(){
        $data=$this->session->userdata('captchaCode');
        header('Content-Type: application/json');
        echo json_encode($this->session->userdata('captchaCode'));
    }
    

}

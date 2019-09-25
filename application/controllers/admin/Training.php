<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Training extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'training_slug',
            'table' => 'training_info',
        );
        $this->load->library('slug', $config);
    }

    /*** Dashboard ***/
    public function index()
    {
        $title = 'Training List';
        $this->load->view('admin/training/traininglist', compact('all_training', 'title'));
    }

    public function save_training()
    {
        $training_logo = 0;
        if ($_POST) {

            $training_id      = $this->input->post('training_id');
            $training_profile = array(
                'training_title'   => $this->input->post('training_title'),
                'training_slug'    => $this->slug->create_uri($this->input->post('training_title')),
                'trainar_name'     => $this->input->post('trainar_name'),
                'training_type'    => $this->input->post('training_type'),
                'start_date'       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('start_date')))),
                'end_date'         => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('end_date')))),
                'deadline'         => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('deadline')))),
                'trainer_details'  => $this->input->post('trainer_details'),
                'benefits'         => $this->input->post('benefits'),
                'venus'            => $this->input->post('venus'),
                'training_fee'     => $this->input->post('training_fee'),
                'training_content' => $this->input->post('training_content'),
            );

            $training_logo = isset($_FILES['training_logo']['name']) ? $_FILES['training_logo']['name'] : null;
            $trainer_image = isset($_FILES['trainer_image']['name']) ? $_FILES['trainer_image']['name'] : null;
            if (empty($training_id) || !empty($training_logo) || !empty($trainer_image)) { 

                    // $data['training_logo']= $_FILES['training_logo']['name'];
                    //print_r($data);
                    // die;

                    if (!empty($training_logo)) {

                        $config['upload_path']   = 'upload/training/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['encrypt_name']  = true;
                        $config['max_size']      = 1000;
                        $config['max_width']     = 350;
                        $config['max_height']    = 350;

                        $this->load->library('upload', $config);
                        $result_upload                     = $this->upload->do_upload('training_logo');
                        $upload_data                       = $this->upload->data();
                        $training_logo                     = $upload_data['file_name'];
                        $training_profile['training_logo'] = $training_logo;

                        if (!$result_upload == true) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Image Size</div>');
                            redirect('admin/training/save-training');
                            $upload_data = $this->upload->data();
                        }
                    }
                    
                    if (!empty($trainer_image)) {

                        $config['upload_path']   = 'upload/training/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['encrypt_name']  = true;
                        $config['max_size']      = 1000;
                        $config['max_width']     = 350;
                        $config['max_height']    = 350;

                        $this->load->library('upload', $config);
                        $result_upload                     = $this->upload->do_upload('trainer_image');
                        $upload_data                       = $this->upload->data();
                        $trainer_image                     = $upload_data['file_name'];
                        $training_profile['trainer_image'] = $trainer_image;
                        if (!$result_upload == true) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Image Size</div>');
                            redirect('admin/training/save-training');
                        }
                    }
                }
                if (empty($training_id)) { 
                    $this->training_info_model->insert($training_profile);
                     $training_slug= $training_profile['training_slug'];
                    redirect(base_url().'training/show/'.$training_slug,'refresh');
                } else {
                    $this->training_info_model->update($training_profile, $training_id);
                    $training_slug= $training_profile['training_slug'];
                    redirect(base_url().'training/show/'.$training_slug,'refresh');
                }
            } else {
                $title = "Training Added";
                $this->load->view('admin/training/create_training', compact('title'));
            } 
    }

    public function edit_training($training_id)
    {
        $title         = "Training Update";
        $training_info = $this->training_info_model->get($training_id);
        $this->load->view('admin/training/create_training', compact('training_info', 'title'));
    }

    public function training_list()
    {
        $training_list = $this->training_info_model->get();
        $title         = "Training List";
        $this->load->view('admin/training/traininglist.php', compact('training_list', 'title'));
    }

    public function enrolled_list()
    {
        $title         = "Enrolled List";
        $enrolled_list = $this->training_user_model->get();
        $this->load->view('admin/training/enrolled', compact('enrolled_list', 'title'));
    }

    public function training_delete($id) {
        $this->training_info_model->delete($id);
        redirect_back();
    }

}

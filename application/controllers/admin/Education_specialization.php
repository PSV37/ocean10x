<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Education_specialization extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*** Dashboard ***/
    public function index()
    {   

        $data['title'] = 'Add Education Specialization';

        $data['educaiton_level_info'] = $this->Master_model->getMaster('education_level',$where=false);

        // $all_educationlevels=$this->education_level_model->get();
        $this->load->view('admin/jobsetting/education_specialization', $data);
    }


        public function save_education_specializaton($id = null){
            // var_dump($id); die;
            $user_id = $this->session->userdata('admin_user_id');
            

            $education_level=array(
                'edu_level_id   ' => $this->input->post('education_level_name'),
                'education_specialization' => $this->input->post('specialization'),
                'course_type   ' => $this->input->post('course_type'),
            );

            if(empty($id)){
                $education_level['created_on']=date('Y-m-d H:i:s');
                $education_level['created_by']=$user_id;

                $this->Master_model->master_insert($education_level,'education_specialization');
               
                redirect('admin/education_specialization');
            }
            else {
                $education_level['updated_on']=date('Y-m-d H:i:s');
                $education_level['updated_by']=$user_id;

                $where['id']=$id;
                $this->Master_model->master_update($data,'education_specialization',$where);
               
                redirect('admin/education_specialization');
            }
        }

    // public function delete_education_level($id) {
    //     $this->education_level_model->delete($id);
    //     redirect('admin/education_level');
    // }

    // public function edit_education_level($id){
    //     $title="education_level Edit";
    //     $all_educationlevels=$this->education_level_model->get();
    //     $educaiton_level_info=$this->education_level_model->get($id);
    //     $this->load->view('admin/jobsetting/education_level',compact('all_educationlevels','educaiton_level_info','title'));
    // }



}

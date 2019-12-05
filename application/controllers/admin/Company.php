<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Company extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'company_slug',
            'table' => 'company_profile',
        );
        $this->load->library('slug', $config);
    }

    /*** Dashboard ***/
    public function index()
    {
        $title       = 'Compnay List';
        $all_company = $this->company_profile_model->get();
        $this->load->view('admin/company/companylist', compact('all_company', 'title'));
    }

    public function save_company()
    {
        if ($_POST) {
            $config['upload_path']   = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']  = true;
           
            $config['max_width']     = 300;
            $config['max_height']    = 300;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('company_logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please upload a valid logo,  max  size 300*300 and  file size limit to 1MB</div>');
                redirect('admin/company/save_company');
            } else {
                $img             = $this->upload->data();
                $file_name       = $img['file_name'];
                $company_profile = array(
                    'company_name'     => $this->input->post('company_name'),
                    'company_slug'     => $this->slug->create_uri($this->input->post('company_name')),
                    'company_status'   => $this->input->post('company_status'),
                    'company_email'    => $this->input->post('company_email'),
                    'company_url'      => $this->input->post('company_url'),
                    'company_phone'    => $this->input->post('company_phone'),
                    'company_category' => $this->input->post('company_category'),
                    'company_logo'     => $file_name,
                    'company_address2'  => $this->input->post('company_address2'),
                    'company_address'  => $this->input->post('company_address'),
                    'hot_jobs'         => '1',
                    'company_aboutus'  => $this->input->post('company_aboutus'),
                    'company_career_link'  => $this->input->post('company_career_link'),

                    //newly added fields
                    'comp_type'            => $this->input->post('company_type'),
                    'contact_name'  => $this->input->post('contact_person'),
                    'cont_person_email'    => $this->input->post('cont_person_email'),
                    'cont_person_mobile'   => $this->input->post('cont_person_mobile'),
                    'comp_gstn_no'         => $this->input->post('comp_gst_no'),
                    'comp_pan_no'          => $this->input->post('comp_pan_no'),
                    'company_password'     => md5($this->input->post('comp_password')),
                    'country_id'           => $this->input->post('country_id'),
                    'state_id'             => $this->input->post('state_id'),
                    'city_id'              => $this->input->post('city_id'),
                    'token'                => md5($this->input->post('company_email')),
                    
                );
                $exist_email    = $this->company_profile_model->email_check($this->input->post('company_email'));
                $exist_username = $this->company_profile_model->username_check($this->input->post('company_username'));
                 if ($exist_email) {
                    // all Ready Account Message
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Email Already Use This!</div>');
                    redirect('admin/company/save_company');
                } else {

                    $this->company_profile_model->insert($company_profile);
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Company Added Sucessfully</div>');
                    redirect('admin/company/save_company');}
            }} else {
            $data['title'] = "Company Added";
            $where_cnty = "status=1";
            $data['country'] = $this->Master_model->getMaster('country',$where_cnty);

            $this->load->view('admin/company/save_company', $data);
        }
    }

    public function update_company()
    {

        $company_id = $this->input->post('company_profile_id');
        $company_logo = isset($_FILES['company_logo']['name']) ? $_FILES['company_logo']['name'] : null;
         $company_profile = array(
                'company_name'     => $this->input->post('company_name'),
                'company_slug'     => $this->slug->create_uri($this->input->post('company_name')),
                'company_username' => $this->input->post('company_username'),
                'company_status'   => $this->input->post('company_status'),
                'company_email'    => $this->input->post('company_email'),
                'company_url'      => $this->input->post('company_url'),
                'company_phone'    => $this->input->post('company_phone'),
                'company_category' => $this->input->post('company_category'),
                'contact_name'     => $this->input->post('contact_person'),
                'company_address2'  => $this->input->post('company_address2'),
                'company_address'  => $this->input->post('company_address'),
                'hot_jobs'  => $this->input->post('hot_jobs'),
                'company_aboutus'  => $this->input->post('company_aboutus'),
                'company_career_link'  => $this->input->post('company_career_link'),
                
                //newly added fields
                    'comp_type'            => $this->input->post('company_type'),
                   // 'contact_person_name'  => $this->input->post('contact_person'),
                    'cont_person_email'    => $this->input->post('cont_person_email'),
                    'cont_person_mobile'   => $this->input->post('cont_person_mobile'),
                    'comp_gstn_no'         => $this->input->post('comp_gst_no'),
                    'comp_pan_no'          => $this->input->post('comp_pan_no'),
                    // 'company_password'     => md5($this->input->post('comp_password')),
                    'country_id'           => $this->input->post('country_id'),
                    'state_id'             => $this->input->post('state_id'),
                    'city_id'              => $this->input->post('city_id'),
                    'token'                => md5($this->input->post('company_email')),


            );


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

            if(!empty($company_id)) {
            $this->company_profile_model->update($company_profile, $company_id);
             $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Company Sucessfully Update</div>');
             redirect_back();
        }

    }

    public function edit_company($company_id = null)
    {
        if (!empty($company_id)) {
            $data['title']           = "Comapany Edit";
            $data['company_profile'] = $this->company_profile_model->get($company_id);
            $where_cnty = "status=1";
            $data['country'] = $this->Master_model->getMaster('country',$where_cnty);
            $this->load->view('admin/company/update_company', $data);
        } else {
            echo "not Found";
        }
    }

    public function company_details($company_id)
    {
        $title            = 'Compnay details';
        $company_all_jobs = $this->job_posting_model->get_company_all_jobs($company_id);
        $this->load->view('admin/company/company_details', compact('company_id', 'company_all_jobs', 'title','company_type'));
    }

    public function jobs_delete($id)
    {
        $this->job_posting_model->delete($id);
       // redirect('admin/company/companylist');
        redirect_back();
    }

    public function delete_company($companyid = null)
    {

        if (!empty($companyid)) {
            $this->company_profile_model->delete($companyid);
            redirect_back();
        } else {
            echo "not Found";
        }
    }

    public function active_company()
    {
        $title           = 'Active Company List';
        $active_companys = $this->company_profile_model->active_company();
        $this->load->view('admin/company/active_companylist', compact('active_companys', 'title'));
    }

    public function deactive_company()
    {
        $title             = 'Active Company List';
        $deactive_companys = $this->company_profile_model->deactive_company();
        $this->load->view('admin/company/deactive_companylist', compact('deactive_companys', 'title'));
    }

    public function company_active_jobs($company_id)
    {
        $title              = 'Active Job List';
        $company_activejobs = $this->job_posting_model->get_company_active_jobs($company_id);
        $this->load->view('admin/company/active_jobs', compact('company_id', 'company_activejobs', 'title','company_type'));
    }

    public function company_deactive_jobs($company_id)
    {
        $title                = 'DeActive Job List';
        $company_deactivejobs = $this->job_posting_model->get_company_deactive_jobs($company_id);
        $this->load->view('admin/company/deactive_jobs', compact('company_id', 'company_deactivejobs', 'title','company_type'));
    }

    public function company_pending_jobs($company_id)
    {
        $title               = 'Pending Job List';
        $company_pendingjobs = $this->job_posting_model->get_company_pending_jobs($company_id);
        $this->load->view('admin/company/pending_jobs', compact('company_id', 'company_pendingjobs', 'title','company_type'));
    }

    public function company_selected_jobs($company_id)
    {
        $title                = 'Selected Job List';
        $company_selectedjobs = $this->job_posting_model->get_company_selected_jobs($company_id);
        $this->load->view('admin/company/selected_jobs', compact('company_id', 'company_selectedjobs', 'title'));
    }

    public function company_nonselected_jobs($company_id)
    {
        $title                    = 'Non Selected Job List';
        $company_nonselected_jobs = $this->job_posting_model->get_company_non_selected_jobs($company_id);
        $this->load->view('admin/company/non_selectedjob', compact('company_id', 'company_nonselected_jobs', 'title'));
    }

    // Selected company Added

    public function save_selected_company()
    {
        if ($_POST) {
            $config['upload_path']   = 'upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name']  = true;
            $config['max_size']      = 1000;
            $config['max_width']     = 300;
            $config['max_height']    = 300;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('company_logo')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please upload a valid logo,  max  size 300*300 and  file size limit to 1MB</div>');
                redirect('admin/company/save_company');
            } else {
                $img             = $this->upload->data();
                $file_name       = $img['file_name'];
                $company_profile = array(
                    'company_name'     => $this->input->post('company_name'),
                    'company_slug'     => $this->slug->create_uri($this->input->post('company_name')),
                    'company_status'   => $this->input->post('company_status'),
                    'company_email'    => $this->input->post('company_email'),
                    'company_url'      => $this->input->post('company_url'),
                    'company_phone'    => $this->input->post('company_phone'),
                    'company_category' => $this->input->post('company_category'),
                    'company_logo'     => $file_name,
                    'company_service'  => $this->input->post('company_service'),
                    'company_address'  => $this->input->post('company_address'),
                    'hot_jobs'         => 1,
                    'company_aboutus'  => $this->input->post('company_aboutus'),
                    'company_career_link'  => $this->input->post('company_career_link'),
                );

                // echo "<pre>";
                // print_r($company_profile);
                // echo "</pre>";
                // exit();
                $this->selected_company_model->insert($company_profile);
                $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Selected Company Added Sucessfully</div>');
                redirect('admin/company/save_selected_company');
            }
        } else {
            $title = "Selected Resume Added";
            $this->load->view('admin/company/save_selected_company', compact('title'));
        }
    }

    function getstate(){
        $country_id = $this->input->post('id');
        $where['country_id'] = $country_id;
        $states = $this->Master_model->getMaster('state',$where);
        $result = '';
        if(!empty($states)){ 
            $result .='<option value="">Select State</option>';
            foreach($states as $st_row){
              $result .='<option value="'.$st_row['state_id'].'">'.$st_row['state_name'].'</option>';
            }
        }else{
            $result .='<option value="">States Not Found</option>';
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
            foreach($citys as $city_row){
              $result .='<option value="'.$city_row['id'].'">'.$city_row['city_name'].'</option>';
            }
        }else{
            $result .='<option value="">Cities Not Found</option>';
        }
         echo $result;
    }

  
} // class end here

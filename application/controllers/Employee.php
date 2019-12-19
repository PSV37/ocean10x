<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employee extends MY_Employee_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_login_model');
        $this->load->model('Employee_photo_model');
        $this->load->model('job_posting_model');
        $this->load->model('company_profile_model');
        $config = array(
            'field' => 'job_slugs',
            'table' => 'job_posting',
        );
        $this->load->library('slug', $config);

        $emp_id = $this->session->userdata('emp_id');
        // echo $emp_id;
        if ($emp_id != null) {
            // redirect('employee/index');
        // $this->load->view('fontend/employee/employee_dashboard');

        }else{
            // redirect('employee_login/index');
        $this->load->view('fontend/employee/login');

        }

    }
    public function index()
    {
        $emp_id = $this->session->userdata('emp_id');
         // $emp_name = $this->session->userdata('name');
        $this->load->view('fontend/employee/employee_dashboard');
        // echo "string";
    }   
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('employee_login');
    }

	public function edit_profile()
	{
        $employee_id=$this->input->post('emp_id');
        if (isset($employee_id) && !empty($employee_id)) {

            print_r($employee_id);

            $employee_data['emp_no'] = $this->input->post('emp_no');
            $employee_data['emp_name'] = $this->input->post('emp_name');
            $employee_data['email'] = $this->input->post('email');
            $employee_data['mobile'] = $this->input->post('mobile');
            $employee_data['dept_id'] = $this->input->post('dept_id');
            $employee_data['address'] = $this->input->post('address');
            $employee_data['country_id'] = $this->input->post('country_id');
            $employee_data['state_id'] = $this->input->post('state_id');
            $employee_data['city_id'] = $this->input->post('city_id');
            $employee_data['pincode'] = $this->input->post('pincode');
            $employee_data['emp_status'] = $this->input->post('emp_status');
            $employee_data['emp_updated_date'] = date('Y-m-d H:i:s');
            $employee_data['emp_updated_by'] = $employee_id;
           
             $where['emp_id']=$employee_id;

         $this->Master_model->master_update($employee_data,'employee',$where);
        $this->Master_model->master_insert($employee_data,'emp_record_history');
        // print_r($this->db->last_query());die;       //    
          $whereres = "emp_id='$employee_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        // print_r($this->db->last_query());die;       //    
        // print_r($data);
        $org_id=$data['result']['org_id'];
        $name=$data['result']['emp_name'];
        $wherecond = "company_profile_id='$org_id'";

        $company_info= $this->Master_model->get_master_row('company_profile',$select = FALSE,$wherecond);
        $to_mail= $company_info['company_email'];
        $company_name= $company_info['company_name'];
         



        $data['department'] = $this->Master_model->getMaster('department',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $subject = $name.' Updated profile';
                $message = '
                        <style>
                            .btn-primary,.btn-info{
                                width: 232px;
                                color: #fff;
                                text-align: center;
                                margin: 0 0 0 5%;
                                background-color: #6495ED;
                                padding: 5px;
                                text-decoration: none;
                            }
                        
                        </style>
                    <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                    <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                    <br><br>Hi '.$company_name.',<br>Your Employee '.$name.' Updated Ocean Profile.<br/>
                    Thank You<br>Ocean Team';
                         
                   $send = sendEmail_JobRequest($to_mail,$message,$subject);
                   // echo $send;
        $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Company Profile details have been successfully updated !</div>');
        $this->load->view('fontend/employee/employee_edit',$data);
        
                   // print_r($message);
        // echo "string";
           
        }
        else
        {
		
		$emp_id=$this->session->userdata('emp_id');
        print_r($emp_id);   
		$whereres = "emp_id='$emp_id'";
        $data['result']= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
        $data['department'] = $this->Master_model->getMaster('department',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $this->load->view('fontend/employee/employee_edit',$data);
    }

		


		
	}

    public function change_password()
            {

                if ($_POST) {
                    $emp_id = $this->session->userdata('emp_id');
                    $oldpassword = md5($this->input->post('oldpassword'));
                    $newpassword = array(
                        'password' => md5($this->input->post('newpassword')),
                    );
                    $data = $this->employee_login_model->change_password($emp_id, $oldpassword);
                    if ($data == true) {

                        if ($emp_id) {
                             $where['emp_id']=$emp_id;

                            $this->Master_model->master_update($newpassword,'employee',$where);
                         $whereres = "emp_id='$emp_id'";

                           $result= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
                            $org_id=$result['org_id'];
                            $name=$result['emp_name'];
                            $wherecond = "company_profile_id='$org_id'";

                            $company_info= $this->Master_model->get_master_row('company_profile',$select = FALSE,$wherecond);
                            $to_mail= $company_info['company_email'];
                            $company_name= $company_info['company_name'];
                            $subject = 'Your Employee'.$name.' Updated profile.';
                $message = '
                        <style>
                            .btn-primary,.btn-info{
                                width: 232px;
                                color: #fff;
                                text-align: center;
                                margin: 0 0 0 5%;
                                background-color: #6495ED;
                                padding: 5px;
                                text-decoration: none;
                            }
                        
                        </style>
                    <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                    <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                    <br><br>Hi '.$company_name.',<br>Your Employee '.$name.' changed the password of  Ocean Account.<br/>
                    Thank You<br>Ocean Team';
                         
                   $send = sendEmail_JobRequest($to_mail,$message,$subject);
                            $this->session->set_flashdata('change_password',
                                '<span class="label label-info"> Password Changed Sucessfully!</span>');
                            redirect('employee/change_password');
                        }

                    } else {
                        $this->session->set_flashdata('change_password',
                            '<span class="label label-info">Your Old Password Not Found</span>');
                            redirect('employee/change_password');
                        
                    }
                } else {
                    $this->load->view('fontend/employee/change_password');
                }
            }

            public function current_jobs()
            {
                $emp_id=$this->session->userdata('emp_id');   
                $whereres = "emp_id='$emp_id'";
                $result= $this->Master_model->get_master_row('employee',$select = FALSE,$whereres);
                $employer_id=$result['org_id'];
                $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
                $this->load->view('fontend/employee/active_job.php', compact('company_active_jobs', 'employer_id'));
                // print_r($company_active_jobs);
            }
    public function profile_setting()
    {

        $employee_id = $this->session->userdata('emp_id');
        $employer_id= $this->session->userdata('org_id');
        // print_r($employer_id);

        if ($_POST) {

            $company_profile = array(
                'company_name'     => $this->input->post('company_name'),
                'company_url'      => $this->input->post('company_url'), 
                'country_code'     => $this->input->post('country_code'),
                'company_phone'    => $this->input->post('company_phone'),
                'company_category' => $this->input->post('company_category'),
                'contact_name'     => $this->input->post('contact_name'),
                'hot_jobs'         => $this->input->post('hot_jobs'),
                'company_career_link'     => $this->input->post('company_career_link'),
                //'company_service'  => $this->input->post('company_service'),
                'company_address'  => $this->input->post('company_address'),
                'company_address2'  => $this->input->post('company_address2'),
                'country_id'       => $this->input->post('country_id'),
                'state_id'         => $this->input->post('state_id'),
                'city_id'          => $this->input->post('city_id'),
                'company_pincode'          => $this->input->post('company_pincode'),
                'company_aboutus'  => $this->input->post('company_aboutus'),
                'cont_person_level' =>$this->input->post('cont_person_level'),
                'alternate_email_id'=>$this->input->post('alternate_email_id'),
                'cont_person_email'    => $this->input->post('cont_person_email'),
                'cont_person_mobile'   => $this->input->post('cont_person_mobile'),
                'comp_gstn_no'         => $this->input->post('comp_gst_no'),
                'comp_pan_no'          => $this->input->post('comp_pan_no'),
            );
         
            $company_logo = isset($_FILES['company_logo']['name']) ? $_FILES['company_logo']['name'] : null;

            if (!empty($employer_id) || !empty($company_logo)) {
                if (!empty($company_logo)) {

                    $config['upload_path']   = 'upload/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['encrypt_name']  = true;
                    $config['max_size']      = 1000;
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
                        redirect('employee/profile-setting');
                    } 
                }
            }

            if(!empty($employer_id)) {
                $branch_address=$this->input->post('Branchname');
                $country=$this->input->post('BranchCountry');
                $state=$this->input->post('Branchstate');
                $city=$this->input->post('BranchCity');
                $pincode=$this->input->post('Branchpincodes');
                // print_r($pincode);
                if (isset($branch_address) && !empty($branch_address) && !empty($country) && !empty($state) && !empty($city) && !empty($pincode)) {
                    # code...
               
                // print_r($branch_address);
                $branchadddata=explode(",",$branch_address);
                $branchcountrydata=explode(",",$country);
                $branchstatedata=explode(",",$state);
                $branchcitydata=explode(",",$city);
                $branchpincodedata=explode(",",$pincode);
                $size=sizeof($branchadddata);
                for ($i=0; $i <$size ; $i++) { 
                    // print_r($branchadddata[$i]);
                    $response['branch_address']=$branchadddata[$i];
                    $response['country']=$branchcountrydata[$i];
                    $response['state']=$branchstatedata[$i];
                    $response['city']=$branchcitydata[$i];
                    $response['pincode']=$branchpincodedata[$i];
                    $response['company_profile_id']=$employer_id;
                    $response['created_on']=date('Y-m-d H:i:s');
                     // print_r($response);
                    $result=$this->Master_model->master_insert($response,'company_branches');

                }
            }
             
                $wheres="status='0' AND company_profile_id='$employer_id' ";
                
                $branches = $this->Master_model->getMaster('company_branches',$where=$wheres);

                $this->company_profile_model->update($company_profile, $employer_id);
                $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Company Profile details have been successfully updated !</div>');
                $company_info = $this->company_profile_model->get($employer_id);

                $country = $this->Master_model->getMaster('country',$where=false);

                $this->load->view('fontend/employee/edit_company', compact('company_info', 'country', 'branches'));
                 
            }

            } else {
                $wheres="status='0' AND company_profile_id='$employer_id'";
                 $branches = $this->Master_model->getMaster('company_branches',$where=$wheres);
                $company_info = $this->company_profile_model->get($employer_id);
                $country = $this->Master_model->getMaster('country',$where=false);
                // print_r($this->db->last_query());
                 $this->load->view('fontend/employee/edit_company', compact('company_info', 'country', 'branches'));
            }
    }
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

    public function search(){
        $term = $this->input->get('term');
        $this->db->like('pincode', $term);
        $data = $this->db->get("pincode")->result();
        echo json_encode( $data);
    }
    public function job_post()
            {
                $employer_id = $this->session->userdata('company_id');
                if ($_POST) {
                    $employer_id  = $this->session->userdata('company_id');
                    $job_deadline = strtolower($this->input->post('job_deadline'));
                    $job_post_id  = $this->input->post('job_post_id');
                    $job_info     = array(
                        'company_profile_id' => $employer_id,
                        'job_title'          => $this->input->post('job_title'),
                        'job_slugs'          => $this->slug->create_uri($this->input->post('job_title')),
                        'job_desc'           => $this->input->post('job_desc'),
                        'job_category'       => $this->input->post('job_category'),
                        'education'          => $this->input->post('education'),
                        'benefits'           => $this->input->post('benefits'),
                        'experience'         => $this->input->post('experience'),
                        'city_id'            => $this->input->post('city_id'),
                        'job_nature'         => $this->input->post('job_nature'),
                        'job_edu'            => $this->input->post('job_edu'),
                        'no_jobs'            => $this->input->post('no_jobs'),
                        'edu_specialization' => $this->input->post('job_edu_special'),   //new added 
                        'job_role'           => $this->input->post('job_role'),   //new added field
                        'skills_required'    => implode(',', $this->input->post('skill_set')), //new 
                        'job_level'          => $this->input->post('job_level'),
                        'salary_range'       => $this->input->post('salary_range'),
                        "job_deadline"       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('job_deadline')))),
                        'working_hours'      => $this->input->post('working_hours'),
                        'is_test_required'      => $this->input->post('job_test_requirment'),
                        
                    );
                if (empty($job_post_id)) 
                {
                        $this->job_posting_model->insert($job_info);
                        $this->session->set_flashdata('success',
                            '<div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            Job posted successfully</div>');
                            redirect('job/show/'.$job_info['job_slugs']);
                } else {
                        $this->job_posting_model->update($job_info, $job_post_id);
                        $this->session->set_flashdata('update','<div class="alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>Job post updated successfully;</div>');
                        redirect('job/show/'.$job_info['job_slugs']);
                    }
            } else {
                    $data['city'] = $this->Master_model->getMaster('city',$where=false);
                    $data['country'] = $this->Master_model->getMaster('country',$where=false);
                    $data['state'] = $this->Master_model->getMaster('state',$where=false);
                    $data['education_level'] = $this->Master_model->getMaster('education_level',$where=false);

                    $where_cn= "status=1";
                    $select = "job_role_title, skill_set ,id";
                    $data['job_role_data'] = $this->Master_model->getMaster('job_role',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);


                    $this->load->view('fontend/employee/job_post', $data);
                }
            }

      function search_city(){
        if (isset($_GET['term'])) {

            $result = $this->job_posting_model->search_city($_GET['term']);
        
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->city_name;
                echo json_encode($arr_result);
            }
        }
    }
     function getSkillsByRole() {
        $id=$this->input->post('role_id');
        $whereres = "id='$id'";
        $role_data= $this->Master_model->get_master_row('job_role',$select = FALSE,$whereres);

        $sk = $role_data['skill_set'];
        
        if ($sk) {
            $where_sk= "id IN (".$sk.") AND status=1";
            $select_sk = "skill_name ,id";
            $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=false,$start=false, $search=false);
              
               $result = '';
                if(!empty($skills)){ 
                    foreach($skills as $skill_row){
                      $result .="<input type='checkbox' name='skill_set[]' style='height:15px; width:20px;' id='skill_set' value=".$skill_row['id']." checked> ".$skill_row['skill_name']."";

                    }
                }else{
                    $result .='Skills Not Found ';
                }
                                        
        }
        else{
            $result .='Skills Not Found ';
        }
         echo $result;    
    }
    function getEducation_specialization(){
        $level_id = $this->input->post('id');
        $where['edu_level_id'] = $level_id;
        $special = $this->Master_model->getMaster('education_specialization',$where);
        $result = '';
        if(!empty($special)){ 
            $result .='<option value="">Select Specilazation</option>';
            foreach($special as $spec_row){
              $result .='<option value="'.$spec_row['id'].'">'.$spec_row['education_specialization'].'</option>';
            }
        }else{
            $result .='<option value="">Specilazation Not Found </option>';
        }
         echo $result;
    }      


    
        
       
                
}
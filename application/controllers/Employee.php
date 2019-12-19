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
        $this->load->model('employee_photo_model');
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

            // print_r($employee_id);

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

     public function active_job()
        {
            $employer_id         = $this->session->userdata('company_id');
            $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
            $this->load->view('fontend/employee/active_forward_jobs.php', compact('company_active_jobs', 'employer_id'));
        }  
     public function all_applicant($job_id = null)
            {
                $company_id = $this->session->userdata('company_id');
                if (!empty($job_id) && $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                    $total_applicantlist = $this->job_apply_model->only_job_applicants($job_id, $company_id);
                    $totalrow = $total_applicantlist['total_row'];
                    $job_details         = $this->job_posting_model->get_job_details($job_id);

                    $wherejob = "job_post_id='$job_id' AND company_id='$company_id'";
                    $Join_data = array(
                                        'interview_dates' => 'interview_dates.interview_id = interview_scheduler.id|Left OUTER ',
                                         
                                    );
                    $interview_data = $this->Master_model->getMaster('interview_scheduler',$wherejob, $Join=$Join_data, $order = false, $field = false, $select=false,$limit=false,$start=false, $search=false);
                    $this->load->view('fontend/employee/job_details', compact('job_id', 'company_id', 'job_details', 'total_applicantlist','interview_data'));
                } else {
                    echo "not found";
                }
            }
    public function all_exam_result($job_id = null)
    {
        $company_id = $this->session->userdata('company_id');
        if (!empty($job_id) && $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                    
            $data['job_id'] = $job_id;
            
            $where_test = "js_test_info.job_id='$job_id'";
            $join_arr = array(
                'js_info' => 'js_info.job_seeker_id=js_test_info.js_id |INNER',
            );
            $select_result = "js_test_info.marks,js_test_info.test_id,js_test_info.js_id, js_info.full_name";
            $data['exam_attended_candidates']= $this->Master_model->getList($condition, $field_by, $order_by, $offset, $perpage, 'js_test_info', $search, $join_arr, $where_test, $select_result, $distinct = FALSE, $group_by = 'js_id');
            //echo $this->db->last_query(); die;

            $this->load->view('fontend/exam/result_details',$data);
        } else {
            echo "not found";  
        }
    }
    public function update_job($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id = $this->session->userdata('company_id');
                    if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                        $data['job_info'] = $this->job_posting_model->get($job_id);
                        $data['city'] = $this->Master_model->getMaster('city',$where=false);
                        $data['country'] = $this->Master_model->getMaster('country',$where=false);
                        $data['state'] = $this->Master_model->getMaster('state',$where=false);
                        $data['education_level'] = $this->Master_model->getMaster('education_level',$where=false);
                        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where=false);

                        $where_cn= "status=1";
                        $select = "job_role_title, skill_set ,id";
                        $data['job_role_data'] = $this->Master_model->getMaster('job_role',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
                        $data['education_specialization'] = $this->Master_model->getMaster('education_specialization',$where=false);
                        $this->load->view('fontend/employee/edit_job', $data);
                    } else {
                        echo "error";
                    }
                } else {
                    echo "not found";
                }

            }
        public function delete_job($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id = $this->session->userdata('company_id');
                    if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                        $this->job_posting_model->delete_job_by_company($job_id, $company_id);
                        redirect_back();
                    } else {
                        echo "error";
                    }
                } else {
                    echo "not found";
                }

            }
    public function forword_job($job_id = null)
        {
            if (!empty($job_id)) {
                 
                 $company_id = $this->session->userdata('company_id');
                 $avail = $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id);
             
                if ($avail) {
                    $data['job_id'] = $job_id; 
                    $this->load->view('fontend/employee/forword_job',$data);
                } else {
                    redirect('employee/active_job');
                }
            } else {
                redirect('employee/active_job');
            }

        }
     public function forword_job_post()
        {
            $employer_id = $this->session->userdata('company_id');
                $send_to=$this->input->post('consultant');
                 // echo $send_to;
               

                if ($_POST) {
                    $employer_id  = $this->session->userdata('company_id');
                    $candiate_email  = $this->input->post('candiate_email');
                    $job_post_id  = $this->input->post('job_post_id');
                    $job_desc  = $this->input->post('job_desc');
                    
                    $email = explode(',', $candiate_email);

                $where_req="job_post_id= '$job_post_id'";
                $join_req = array(
                    'job_types' => 'job_types.job_types_id = job_posting.job_types|LEFT OUTER',
                    'company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id|LEFT OUTER',
                    'city' => 'city.id = job_posting.city_id|LEFT OUTER',
                    'country' => 'country.country_id = job_posting.job_location|LEFT OUTER',
                    'state' => 'state.state_id = job_posting.state_id|LEFT OUTER',
                    'job_category' => 'job_category.job_category_id = job_posting.job_category|LEFT OUTER',
                    'job_nature' => 'job_nature.job_nature_id = job_posting.job_nature|LEFT OUTER',
                    'job_level' => 'job_level.job_level_id = job_posting.job_level|LEFT OUTER',
                    'job_role' => 'job_role.id = job_posting.job_role|LEFT OUTER',
                    'education_level' => 'education_level.education_level_id = job_posting.job_edu|LEFT OUTER',
                    'education_specialization' => 'education_specialization.id = job_posting.edu_specialization|LEFT OUTER',
                    
                );
                $select_job = "job_role.job_role_title,education_specialization.education_specialization,education_level.education_level_name,job_level.job_level_name,job_nature.job_nature_name,job_category.job_category_name,state.state_name,country.country_name,city.city_name,company_profile.company_name,company_profile.company_logo,job_types.job_types_name,job_posting.job_title,job_posting.job_position,job_posting.job_desc,job_posting.education,job_posting.salary_range,job_posting.job_deadline,job_posting.preferred_age,job_posting.preferred_age_to,job_posting.working_hours,job_posting.no_jobs,job_posting.benefits,job_posting.experience,job_posting.skills_required";
                $req_details = $this->Master_model->getMaster('job_posting', $where_req, $join_req, $order = false, $field = false, $select_job,$limit=false,$start=false, $search=false);
              
                if($req_details)
                {
                    foreach($req_details as $require){
                    }
                    
                }
                $skill_id = $require['skills_required'];
                
                $where_req_skill="skill_master.id IN (".$skill_id.")";
                $select_skill = "skill_master.skill_name";
                $req_skill_details = $this->Master_model->getMaster('skill_master', $where_req_skill, $join=false, $order = false, $field = false, $select_skill,$limit=false,$start=false, $search=false);
                  // echo $this->db->last_query(); die;
                    for($i=0;$i<sizeof($email);$i++)
                    {

                         if ($send_to=="consultant") 
                         {
                                $where_cndn = "company_email='$email[$i]'";

                                $consultant_data = $this->Master_model->getMaster('company_profile',$where_cndn);
                                if ($consultant_data) {
                                    $comp_id=$consultant_data[0]['company_profile_id'];
                                }
                                 else{
                               $new_JS_array = array(
                                    'company_email' => $email[$i],
                                    'token' => md5($email[$i]),
                                    'create_at' => date('Y-m-d H:i:s'),
                                    'comp_type' =>"HR Consultant"
                                );

                                $comp_id = $this->Master_model->master_insert($new_JS_array,'company_profile');
                                // echo $comp_id;
                                }
                                 $apply_array = array(
                                    'company_profile_id' => $comp_id,
                                    'job_post_id'   => $job_post_id,
                                    'created_on' =>date('Y-m-d H:i:s'),
                                    'created_by' =>$comp_id
                                );
                                $apply = $this->Master_model->master_insert($apply_array,'consultants_jobs');
                                if($apply)
                                {
                                     $email_name = explode('@', $email[$i]);

                            $subject = 'Job | Urgent requirement for '.$require['job_title'];

                            $message = '
                                <style>
                                    .btn-primary{
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
                            <a href="#"><img src="'.base_url().'upload/'.$require['company_logo'].'" style="height: 50px;"> </a>
                            <br><br>Hi '.$email_name[0].',<br>'.$job_desc.'<br/><br/><em><b>Now Hiring!!</b></em> <br/><br/><b>Company Name:</b>' .$require['company_name'].'<br/><br/> <b>Job Profile:</b><br/> <b>Job Title: </b> '.$require['job_title'].'<br/> <b>Experience: </b> '.$require['experience'].'<br/><b>Salary Offered: </b> '.$require['salary_range'].'<br/><b>Vacancies: </b> '.$require['no_jobs'].'<br/><b>Job Location: </b> '.$require['city_name'].'-'.$require['state_name'].','.$require['country_name'].'<br/><b>Job Role: </b> '.$require['job_role_title'].'<br/><b>Job Type: </b> '.$require['job_types_name'].'<br/><b>Job Nature: </b> '.$require['job_nature_name'].'<br/><b>Wrking Hrs: </b> '.$require['working_hours'].'<br/><b>Job Deadline: </b> '.$require['job_deadline'].'<br/><b>Education Required: </b> '.$require['education_level_name'].'('.$require['education_specialization'].')'.'<br/><b>Preferred Age: </b> '.$require['preferred_age'].'-'.$require['preferred_age_to'].'<br/><b>Required Skills: </b> ';
                                for($j=0;$j<sizeof($req_skill_details);$j++){
                                    $message .= ' <br>'.$req_skill_details[$j]['skill_name'];
                                }

                            $message .='<br/><b>Job Description: </b> '.$require['job_desc'].'<br/><b>Job Benefits: </b> '.$require['benefits'].'<br/><b>Other Job Description: </b> '.$require['education'].'<br><br><a href="'.base_url().'job_forword_seeker/open_forworded_job?comp_mail='.base64_encode($email[$i]).'&job_id='.base64_encode($apply).'" class="btn btn-primary" value="open" align="center" target="_blank">Open</a> <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><small>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</small><br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                           $send = sendEmail_JobRequest($email[$i],$message,$subject);
                           //echo $send;
                            echo $message;
                        }

                }else
                {  
                        $where_can = "email='$email[$i]'";

                        $can_data = $this->Master_model->getMaster('js_info',$where_can);

                        if($can_data)
                        {
                            $seeker_id = $can_data[0]['job_seeker_id'];
                        }
                        else{
                           $new_JS_array = array(
                                'email' => $email[$i],
                                'js_token' => md5($email[$i]),
                                'create_at' => date('Y-m-d H:i:s'),
                            );

                            $seeker_id = $this->Master_model->master_insert($new_JS_array,'js_info');
                        }
                       
                        $apply_array = array(
                            'job_seeker_id' => $seeker_id,
                            'company_id'    => $employer_id,
                            'job_post_id'   => $job_post_id,
                            'forword_job_status' => 1,
                        );
                        $apply = $this->Master_model->master_insert($apply_array,'job_apply');

                        if($apply)
                        {
                          $email_name = explode('@', $email[$i]);

                            $subject = 'Job | Urgent requirement for '.$require['job_title'];

                            $message = '
                                <style>
                                    .btn-primary{
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
                            <a href="#"><img src="'.base_url().'upload/'.$require['company_logo'].'" style="height: 50px;"> </a>
                            <br><br>Hi '.$email_name[0].',<br>'.$job_desc.'<br/><br/><em><b>Now Hiring!!</b></em> <br/><br/><b>Company Name:</b>' .$require['company_name'].'<br/><br/> <b>Job Profile:</b><br/> <b>Job Title: </b> '.$require['job_title'].'<br/> <b>Experience: </b> '.$require['experience'].'<br/><b>Salary Offered: </b> '.$require['salary_range'].'<br/><b>Vacancies: </b> '.$require['no_jobs'].'<br/><b>Job Location: </b> '.$require['city_name'].'-'.$require['state_name'].','.$require['country_name'].'<br/><b>Job Role: </b> '.$require['job_role_title'].'<br/><b>Job Type: </b> '.$require['job_types_name'].'<br/><b>Job Nature: </b> '.$require['job_nature_name'].'<br/><b>Wrking Hrs: </b> '.$require['working_hours'].'<br/><b>Job Deadline: </b> '.$require['job_deadline'].'<br/><b>Education Required: </b> '.$require['education_level_name'].'('.$require['education_specialization'].')'.'<br/><b>Preferred Age: </b> '.$require['preferred_age'].'-'.$require['preferred_age_to'].'<br/><b>Required Skills: </b> ';
                                for($j=0;$j<sizeof($req_skill_details);$j++){
                                    $message .= ' <br>'.$req_skill_details[$j]['skill_name'];
                                }

                            $message .='<br/><b>Job Description: </b> '.$require['job_desc'].'<br/><b>Job Benefits: </b> '.$require['benefits'].'<br/><b>Other Job Description: </b> '.$require['education'].'<br><br><a href="'.base_url().'job_forword_seeker/apply_forworded_job?apply_id='.base64_encode($email[$i]).'&job_id='.base64_encode($apply).'" class="btn btn-primary" value="Apply Now" align="center" target="_blank">Apply Now</a> <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><small>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</small><br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                           $send = sendEmail_JobRequest($email[$i],$message,$subject);
                           
                        }
                       
                    }

                    }
                   
                   
                }
               
        }
        function get_fav_consultants()
    {
       
        $emp_id =$this->input->post('emp_id');
        $where_cond = "consultant_company_mapping.company_id='$emp_id' AND consultant_company_mapping.is_favourite='yes'";
        $join_cond = array('company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|Left outer');
      
        $select ="company_email";
        $result = $this->Master_model->getMaster('consultant_company_mapping', $where_cond, $join = $join_cond, $order = false, $field = false, $select = $select,$limit=false,$start=false, $search=false);
                echo json_encode($result);

    }
                   
        

    
        
       
                
}
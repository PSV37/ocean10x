<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employer extends MY_Employer_Controller
{
    public $employer_id = "";
    public function __construct()
    {

        parent::__construct();
        // $this->load->model('dashboard_model');
        //$this->load->model('global_model');
        $config = array(
            'field' => 'job_slugs',
            'table' => 'job_posting',
        );
        $this->load->library('slug', $config);
    }

    public function index()
    {
        //$this->profile_setting();
        $company_info = $this->company_profile_model->get($employer_id);
        $this->load->view('fontend/employer/dashboard_main', compact('company_info'));
    }

    /*** Dashboard ***/
    public function profile_setting()
    {

        $employer_id = $this->session->userdata('company_profile_id');

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
                        redirect('employer/profile-setting');
                    } 
                }
            }

            if(!empty($employer_id)) {
                $response['branch_address']=$this->input->post('Branchname');
                $response['country']=$this->input->post('BranchCountry');
                $response['state']=$this->input->post('Branchstate');
                $response['city']=$this->input->post('BranchCountry');
                $response['pincode']=$this->input->post('BranchCity');
                $response['company_profile_id']=$employer_id;
                $response['created_on']=date('Y-m-d H:i:s');
                 
                

                // print_r($response);
                 $size=sizeof($this->input->post('Branchname'));
                 print_r($size);

                //  $result=$this->Master_model->master_insert($response,'company_branches');

              


                // $this->company_profile_model->update($company_profile, $employer_id);
                // $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Company Profile details have been successfully updated !</div>');
                //  redirect('employer/profile-setting');
            }

            } else {
                $company_info = $this->company_profile_model->get($employer_id);
				$city = $this->Master_model->getMaster('city',$where=false);
				$country = $this->Master_model->getMaster('country',$where=false);
				$state = $this->Master_model->getMaster('state',$where=false);
                $this->load->view('fontend/employer/dashboard', compact('company_info', 'city', 'country', 'state'));
            }
    }

            public function job_post()
            {
                $employer_id = $this->session->userdata('company_profile_id');
                if ($_POST) {
                    $employer_id  = $this->session->userdata('company_profile_id');
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
                        
      //                   'job_location'       => $this->input->post('city_id'),
						// 'state_id'           => $this->input->post('state_id'),
						'city_id'            => $this->input->post('city_id'),
                        'job_nature'         => $this->input->post('job_nature'),
                        'job_edu'            => $this->input->post('job_edu'),
                        'no_jobs'            => $this->input->post('no_jobs'),
                        'edu_specialization' => $this->input->post('job_edu_special'),   //new added field
                        'job_role'           => $this->input->post('job_role'),   //new added field
                        'skills_required'    => implode(',', $this->input->post('skill_set')), //new added field

                        'job_level'          => $this->input->post('job_level'),
                        'salary_range'       => $this->input->post('salary_range'),
                        // 'job_types'          => $this->input->post('job_types'),
                        "job_deadline"       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('job_deadline')))),

      //                   'preferred_age'      => $this->input->post('preferred_age_from'),
						// 'preferred_age_to'   => $this->input->post('preferred_age_to'),
                        'working_hours'      => $this->input->post('working_hours'),
                        'is_test_required'      => $this->input->post('job_test_requirment'),
                        
                    );
                    if (empty($job_post_id)) {
                        $this->job_posting_model->insert($job_info);
                        $this->session->set_flashdata('success',
                            '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  Vacancy post is sucessfully created  
                  </div>');
                      redirect('job/show/'.$job_info['job_slugs']);
                    } else {
                        $this->job_posting_model->update($job_info, $job_post_id);
                        $this->session->set_flashdata('update',
                            '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   Vacancy post is sucessfully Update;
                  </div>');
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


                    $this->load->view('fontend/employer/job_post', $data);
                }
            }

            public function manage_job()
            {
                $employer_id      = $this->session->userdata('company_profile_id');
                $company_all_jobs = $this->job_posting_model->get_company_all_jobs($employer_id);
                $this->load->view('fontend/employer/managejob', compact('company_all_jobs', 'employer_id'));
            }

            public function delete_job($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id = $this->session->userdata('company_profile_id');
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

            public function update_job($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id = $this->session->userdata('company_profile_id');
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
                        $this->load->view('fontend/employer/update_job', $data);
                    } else {
                        echo "error";
                    }
                } else {
                    echo "not found";
                }

            }

            public function logout()
            {
                $this->session->sess_destroy();
                redirect('employer_login');
            }

            public function applicants($postid = null, $company_id = null)
            {
                $postid     = $postid;
                $company_id = $company_id;
                if ($postid == null || $company_id == null) {
                    echo "404 ";
                } else {
                    $applicants = $this->job_apply_model->only_job_applicants($postid, $company_id);
                    $this->load->view('fontend/employer/job_applicants', compact('applicants'));
                }
            }



            public function view_cv($job_seeker_id, $job_post_id)
            {
                $company_id = $this->session->userdata('company_profile_id');

                if ($this->job_apply_model->check_apply_job($job_seeker_id, $company_id, $job_post_id) == true) {
                    $cv = $this->job_seeker_model->resume_view_by_id($job_seeker_id);
                    $this->load->view('fontend/employer/view_cv', compact('cv'));
                } else {
                    $this->load->view('fontend/employer/cv_notfound');
                }
            }

            public function uff()
            {
                $this->load->view('fontend/employer/job_details');
            }

            public function change_password()
            {

                if ($_POST) {
                    $employer_id = $this->session->userdata('company_profile_id');
                    $oldpassword = md5($this->input->post('oldpassword'));
                    $newpassword = array(
                        'company_password' => md5($this->input->post('newpassword')),
                    );
                    $data = $this->company_profile_model->change_password($employer_id, $oldpassword);
                    if ($data == true) {

                        if ($employer_id) {
                            $this->company_profile_model->update($newpassword, $employer_id);
                            $this->session->set_flashdata('change_password',
                                '<span class="label label-info">Sucessfully Password Changed!</span>');
                            redirect('employer/change_password');
                        }

                    } else {
                        $this->session->set_flashdata('change_password',
                            '<span class="label label-info">Your Old Password Not Found</span>');
                        redirect('employer/change_password');
                    }
                } else {
                    $this->load->view('fontend/employer/change_password');
                }
            }

            public function active_job()
            {
                $employer_id         = $this->session->userdata('company_profile_id');
                $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
                $this->load->view('fontend/employer/active_job.php', compact('company_active_jobs', 'employer_id'));
            }

            public function pending_job()
            {
                $employer_id          = $this->session->userdata('company_profile_id');
                $company_pending_jobs = $this->job_posting_model->get_company_pending_jobs($employer_id);
                $this->load->view('fontend/employer/pending_job.php', compact('company_pending_jobs', 'employer_id'));
            }

            public function selected_job()
            {
                $employer_id           = $this->session->userdata('company_profile_id');
                $company_selected_jobs = $this->job_posting_model->get_company_selected_jobs($employer_id);
                $this->load->view('fontend/employer/selected_job.php', compact('company_selected_jobs', 'employer_id'));
            }

            public function non_selected_job()
            {
                $employer_id               = $this->session->userdata('company_profile_id');
                $company_non_selected_jobs = $this->job_posting_model->get_company_non_selected_jobs($employer_id);
                $this->load->view('fontend/employer/non_selected_job.php', compact('company_non_selected_jobs', 'employer_id'));
            }

            public function all_applicant($job_id = null)
            {
                $company_id = $this->session->userdata('company_profile_id');
                if (!empty($job_id) && $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                    $total_applicantlist = $this->job_apply_model->only_job_applicants($job_id, $company_id);
                    $totalrow = $total_applicantlist['total_row'];
                    $job_details         = $this->job_posting_model->get_job_details($job_id);

                    $wherejob = "job_post_id='$job_id' AND company_id='$company_id'";
                    $interview_data = $this->Master_model->getMaster('interview_scheduler',$wherejob, $Join=false, $order = false, $field = false, $select=false,$limit=false,$start=false, $search=false);
                    $this->load->view('fontend/employer/job_details', compact('job_id', 'company_id', 'job_details', 'total_applicantlist','interview_data'));
                } else {
                    echo "not found";
                }
            }

            public function reject_resume($resume_id = null)
            {
                if (!empty($resume_id)) {
                    $this->job_apply_model->delete($resume_id);
                    redirect_back();
                } else {
                    echo "not found";
                }
            }

            public function sortlist_cv($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id   = $this->session->userdata('company_profile_id');
                    $sortlist_cvs = $this->job_apply_model->sorlist_applicants_cv($job_id, $company_id);
                    $job_details  = $this->job_posting_model->get($job_id);
                    $this->load->view('fontend/employer/sortlistcv', compact('job_id', 'company_id', 'job_details', 'sortlist_cvs'));
                } else {
                    echo "not found";
                }
            }

            public function interview_cv($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id    = $this->session->userdata('company_profile_id');
                    $interview_cvs = $this->job_apply_model->interview_applicants_cv($job_id, $company_id);
                    $job_details   = $this->job_posting_model->get($job_id);
                    $this->load->view('fontend/employer/interviewcvlist', compact('job_id', 'company_id', 'job_details', 'interview_cvs'));
                } else {
                    echo "not found";
                }
            }

            public function final_cv($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id  = $this->session->userdata('company_profile_id');
                    $final_cvs   = $this->job_apply_model->final_applicants_cv($job_id, $company_id);
                    $job_details = $this->job_posting_model->get($job_id);
                    $this->load->view('fontend/employer/finalcvlist', compact('job_id', 'company_id', 'job_details', 'final_cvs'));
                } else {
                    echo "not Found";
                }
            }

            public function view_resumelist($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id      = $this->session->userdata('company_profile_id');
                    $view_resumelist = $this->job_apply_model->view_resumelist($job_id, $company_id);
                    $job_details     = $this->job_posting_model->get($job_id);
                    $this->load->view('fontend/employer/view_resumelist', compact('job_id', 'company_id', 'job_details', 'view_resumelist'));
                } else {
                    echo "not found";
                }
            }

            public function not_view_resumelist($job_id = null)
            {
                if (!empty($job_id)) {
                    $company_id          = $this->session->userdata('company_profile_id');
                    $not_view_resumelist = $this->job_apply_model->not_view_resumelist($job_id, $company_id);
                    $job_details         = $this->job_posting_model->get($job_id);
                    $this->load->view('fontend/employer/not_view_resumelist', compact('job_id', 'company_id', 'job_details', 'not_view_resumelist'));
                } else {
                    echo "not found";
                }
            }

            public function update_sortlist($apply_id,$email)
            {
                	$email= base64_decode($email);
				$this->job_apply_model->sendEmail_job($email,'short');
                
				$this->job_apply_model->update_sortlist($apply_id);
			
				
                redirect_back();
            }

            public function update_interviewlist($apply_id,$email)
            {
                	$email= base64_decode($email);
				$this->job_apply_model->sendEmail_job($email,'interview');
                
				$this->job_apply_model->update_interviewlist($apply_id,$job_seeker_id);
			
                redirect_back();
            }

            public function update_finallist($apply_id,$email)
            {
                $email= base64_decode($email);
				$this->job_apply_model->sendEmail_job($email,'final');
                
				$this->job_apply_model->update_finallist($apply_id);
				
                redirect_back();
            }

	

            public function downloadcv($jobseeker_id = null)
            {
                if (!empty($jobseeker_id)) {
                    $company_id = $this->session->userdata('company_profile_id');
                    if ($this->job_apply_model->check_resume_by_id($jobseeker_id, $company_id) == true) {

                        $data['resume'] = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
						//echo "222";
						//echo $this->db->last_query();
						//echo "4444";
                        $data['edcuaiton_list']  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
                        $data['experinece_list'] = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                        $data['training_list']   = $this->Job_training_model->training_list_by_id($jobseeker_id);
                        $data['reference_list']  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
						//$data['js_personal_info'] = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
						
						//$data['js_info'] = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
						//echo $this->db->last_query();
						//$data['city'] = $this->Master_model->getMaster('city',$where=false);
						//$data['country'] = $this->Master_model->getMaster('country',$where=false);
						//$data['state'] = $this->Master_model->getMaster('state',$where=false);
						
                        echo $this->load->view('fontend/downloadcv', $data,true); die;
						
                    } else {
                        echo "not found";
                    }
                } else {
                    echo "not found";
                }

            }

            public function view_resume($jobseeker_id = null, $job_id = null)
            {
                if (!empty($jobseeker_id)) {
                    $company_id = $this->session->userdata('company_profile_id');
                    if ($this->job_apply_model->check_apply_job($jobseeker_id, $company_id, $job_id) == true) {

                        $resume          = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
                        $edcuaiton_list  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
                        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                        $training_list   = $this->Job_training_model->training_list_by_id($jobseeker_id);
                        $reference_list  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
                        $this->job_apply_model->update_resume_view($jobseeker_id, $company_id, $job_id);
                        $this->load->view('fontend/viewresume', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'language_list','job_id'));
                    } else {
                        echo "not found";
                    }
                } else {
                    echo "not found";
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
    
     // To fetch getProfssionalSkillsDetails details
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
    
    public function forword_job($job_id = null)
        {
            if (!empty($job_id)) {
                 
                 $company_id = $this->session->userdata('company_profile_id');
                 $avail = $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id);
             
                if ($avail) {
                    $data['job_id'] = $job_id; 
                    $this->load->view('fontend/employer/forword_job',$data);
                } else {
                    redirect('employer/active_job');
                }
            } else {
                redirect('employer/active_job');
            }

        }

        public function forword_job_post()
        {
            $employer_id = $this->session->userdata('company_profile_id');
                $send_to=$this->input->post('consultant');
                 // echo $send_to;
               

                if ($_POST) {
                    $employer_id  = $this->session->userdata('company_profile_id');
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
                           //echo $send;
                            echo $message;
                           
                        }
                        // else{
                        //     redirect('employer/active_job');
                        // }
                    }

                    }
                   
                   
                }
               
        }



        //Function for Test topics tab 
 public function topics_for_test($id)
    {
        //$data['job_info'] = $this->job_posting_model->get($id);
        $user_id = $this->session->userdata('company_profile_id');
        
        if($_POST)
        {
            $topic_chk = $this->input->post('topic_chk');
            // $no_questions = $this->input->post('no_questions');
            $post_data=$this->input->post();

            if(empty($topic_chk))
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Check Minimum One Checkbox</div>');
                $data['title']    = "Topic's For Test";
                $data['test_job_id'] = $id;

                $data['test_level'] = $this->Master_model->getMaster('job_level',$where = FALSE,$join = FALSE, $order = false, $field = false, $select = FALSE ,$limit=false,$start=false, $search=false);

                $where_test_top = "job_test_topics.job_id='$id'";
                $select_test_topic = "job_test_topics.topic_id as test_topic,job_test_topics.no_questions,job_test_topics.test_level";
                $data['test_topic_master'] = $this->Master_model->getMaster('job_test_topics',$where_test_top,$join = FALSE, $order = false, $field = false, $select_test_topic,$limit=false,$start=false, $search=false);

                $where_top = "topic.topic_status='1'";
                $select_topic = "topic_name,topic_id";
                $data['topic_master'] = $this->Master_model->getMaster('topic',$where_top,$join = FALSE, $order = false, $field = false, $select_topic,$limit=false,$start=false, $search=false);

                $this->load->view('fontend/employer/create_topics_fortest', $data);

            }else{

                $where_del = "job_id='$id'";
                $del = $this->Master_model->master_delete('job_test_topics',$where_del);
                if($del==true)
                {
                    for($k=0; $k<sizeof($topic_chk);$k++)
                    {
                        $ques_array = array(
                            'job_id'          => $id,
                            'topic_id'        => $topic_chk[$k],
                            'test_level'      => $post_data['test_level'.$topic_chk[$k]],
                            'no_questions'    => $post_data['no_questions'.$topic_chk[$k]],
                            'created_by'      => $user_id,
                            'created_date'    => date('Y-m-d H:i:s'),
                            
                        );
                        $this->Master_model->master_insert($ques_array,'job_test_topics');
                       
                    }
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Job Test Topic Sucessfully Inserted</div>');
                }
                redirect('employer/active_job');
            }

        }else{
            $data['title']    = "Topic's For Test";
            $data['test_job_id'] = $id;

            $data['test_level'] = $this->Master_model->getMaster('job_level',$where = FALSE,$join = FALSE, $order = false, $field = false, $select = FALSE ,$limit=false,$start=false, $search=false);

            $where_test_top = "job_test_topics.job_id='$id'";
            $select_test_topic = "job_test_topics.topic_id as test_topic,job_test_topics.no_questions,job_test_topics.test_level";
            $data['test_topic_master'] = $this->Master_model->getMaster('job_test_topics',$where_test_top,$join = FALSE, $order = false, $field = false, $select_test_topic,$limit=false,$start=false, $search=false);

            $where_top = "topic.topic_status='1'";
            $select_topic = "topic_name,topic_id";
            $data['topic_master'] = $this->Master_model->getMaster('topic',$where_top,$join = FALSE, $order = false, $field = false, $select_topic,$limit=false,$start=false, $search=false);

            $this->load->view('fontend/employer/create_topics_fortest', $data);
        }
        
    }

  public function all_questions()
    {
        $employer_id         = $this->session->userdata('company_profile_id');

        $where_cn= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_cn);
        
        //$where_opt= "options.status=1";
        $data['options'] = $this->Master_model->getMaster('options');
        
        $where_state= "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_state);
        
        $where_subtopic = "subtopic.subtopic_status='1'";
        $data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
        
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
        
        $where_all = "questionbank.ques_status='1' AND ques_created_by='$employer_id'";
        $join_emp = array(
                'skill_master' => 'skill_master.id=questionbank.technical_id |left outer',
                'topic' => 'topic.topic_id=questionbank.topic_id |left outer',
                'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer',
                'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer',
                'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer',
            );
        
        $data['questionbank'] = $this->Master_model->getMaster('questionbank',$where_all,$join_emp);
        // echo  $this->db->last_query(); die;


        $this->load->view('fontend/employer/all_questions.php', $data);
    }


    /*** Dashboard ***/
    public function add_new_question()
    {   

        $data['title'] = 'Add Questionbank';

        $where_skill= "status=1";
        
        $data['skill_master'] = $this->Master_model->getMaster('skill_master',$where_skill);
        
        //$where_opt= "options.status=1";
        $data['options'] = $this->Master_model->getMaster('options');
        
        $where_topic= "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic',$where_topic);
        
        $where_subtopic = "subtopic.subtopic_status='1'";
        $data['subtopic'] = $this->Master_model->getMaster('subtopic',$where_subtopic);
        
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
        
        $where_lineitemlevel = "lineitemlevel.lineitemlevel_status='1'";
        $data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel',$where_lineitemlevel);
        
        $data['questionbank'] = $this->Master_model->getMaster('questionbank');

        $this->load->view('fontend/employer/add_new_question', $data);
    }

        public function save_questionbank($id = null){
          
            $user_id = $this->session->userdata('company_profile_id');
            
            $state_dt=array(
                'technical_id'      => $this->input->post('technical_id'),
                'topic_id'          => $this->input->post('topic_id'),
                'subtopic_id'       => $this->input->post('subtopic_id'),
                'lineitem_id'       => $this->input->post('lineitem_id'),
                'lineitemlevel_id'  => $this->input->post('lineitemlevel_id'),
                'level'             => $this->input->post('level'),
                'ques_type'         => $this->input->post('ques_type'),
                'question'          => $this->input->post('question'),
                'option1'           => $this->input->post('option1'),
                'option2'           => $this->input->post('option2'),
                'option3'           => $this->input->post('option3'),
                'option4'           => $this->input->post('option4'),
                'option5'           => $this->input->post('option5'),
                'is_admin'          => $this->input->post('is_admin')
            );

            if(empty($id)){
                
                $state_dt['ques_created_date']=date('Y-m-d H:i:s');
                $state_dt['ques_created_by']=$user_id;

                $q_id=$this->Master_model->master_insert($state_dt,'questionbank');
                if($this->input->post('ques_type')=='MCQ'){
                    $tablename='questionbank_answer';
                    $where_delete['question_id']=$q_id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    $c_answer=$this->input->post('correct_answer');
                    //var_dump($c_answer); die;
                    for($i=0;$i<sizeof($c_answer);$i++){
                        $data_answer=array();
                        $data_answer['question_id']=$q_id;
                        $data_answer['answer_id']=$c_answer[$i];
                         $this->Master_model->master_insert($data_answer,'questionbank_answer');
                    }
                }
                
                if($this->input->post('ques_type')=='Subjective'){
                    $tablename='questionbank_answer';
                    $where_delete['question_id']=$q_id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    
                    $where_update_sub_answer=array();
                    $ans_update['sub_answer']=$this->input->post('sub_answer');
                    $where_update_sub_answer['ques_id']=$q_id;
                    $this->Master_model->master_update($ans_update,'questionbank',$where_update_sub_answer);
                }
               redirect('employer/all_questions');
            }
            else {
                $state_dt['ques_updated_date']=date('Y-m-d H:i:s');
                $state_dt['ques_updated_by']=$user_id;

                $where['ques_id']=$id;
                $this->Master_model->master_update($state_dt,'questionbank',$where);
                if($this->input->post('ques_type')=='MCQ'){
                    $tablename='questionbank_answer';
                    $where_delete['question_id']=$id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    $c_answer=$this->input->post('correct_answer');
                    for($i=0;$i<sizeof($c_answer);$i++){
                        $data_answer=array();
                        $data_answer['question_id']=$id;
                        $data_answer['answer_id']=$c_answer[$i];
                         $this->Master_model->master_insert($data_answer,'questionbank_answer');
                    }
                }
                if($this->input->post('ques_type')=='Subjective'){
                    $tablename='questionbank_answer';
                    $where_delete['question_id']=$id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    
                    $where_update_sub_answer=array();
                    $ans_update['sub_answer']=$this->input->post('sub_answer');
                    $where_update_sub_answer['ques_id']=$id;
                    $this->Master_model->master_update($ans_update,'questionbank',$where_update_sub_answer);
                }
                redirect('employer/all_questions');
            }
        }

    public function edit_questionbank($id){
        $data['title']="Edit Questionbank";

        $data['options'] = $this->Master_model->getMaster('options');
        
        $data['questionbank'] = $this->Master_model->getMaster('questionbank',$where_all,$join_emp);
        
        $where_questionbank = "ques_id='$id'";
        $data['edit_questionbank_info'] = $this->Master_model->getMaster('questionbank',$where_questionbank);
        
        $where_answer = "question_id='$id'";
        $data['questionbank_answer'] = $this->Master_model->getMaster('questionbank_answer',$where_answer);
        
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem',$where_lineitem);
         
        $where_skill= "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_skill);
        
        $this->load->view('fontend/employer/add_new_question', $data);
    }



    public function delete_questionbank($id) {
        
        $ques_status = array(
            'ques_status'=>0,
        );
        $where_del['ques_id']=$id;
        $this->Master_model->master_update($ques_status,'questionbank',$where_del);
        redirect('employer/all_questions');
    }

/*Add Employee*/

    public function addemployee(){
    	$user_id = $this->session->userdata('company_profile_id');
    	if(isset($_POST['submit_employee'])){
    		$this->form_validation->set_rules('emp_no', 'Employee No.', 'required|min_length[3]|max_length[6]|alpha_numeric');
    		$this->form_validation->set_rules('emp_name', 'Name', 'required');
    		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]');
    		$this->form_validation->set_rules('mobile', ' Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
    		$this->form_validation->set_rules('password', 'password', 'required|max_length[15]|min_length[6]|alpha_numeric');
    		$this->form_validation->set_rules('dept_id', 'Department', 'required');
    		$this->form_validation->set_rules('address', 'Address', 'required');
    		$this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric');
    		
            array('required' => 'You must provide a %s.');
    		
            if ($this->form_validation->run() == FALSE)
            {
                $data['result'] = $this->Master_model->getMaster('department' ,$select=false);
    	       //$this->load->view('organization/add_employee',$data);		
            }
            else
            {
    					
    			$NewFileName;
    	        if($_FILES['photo']['name']!='')
    	            {
    	                $this->load->helper('string'); 

    	                $NewFileName = $_FILES['photo']['name']; 
    	                
    					$config['upload_path'] = 'employee/';
    	                $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|odt|xlsm|xls|xlm|xla|xlsx|bmp|docm|dotx|dotm|docb|gif';
    	                $config['max_size']    = '10000';
    	                //$config['max_width']  = '1024';
    	                //$config['max_height']  = '768';
    	                $config['file_name'] = $NewFileName;
    	            
    	                 $this->load->library('upload', $config);      
    	                 $field_name = "photo";
    	                        // print_r($config);die();
    	               if (! $this->upload->do_upload($field_name))
    	                {
    	                    $error = array('error' => $this->upload->display_errors());
    	                   	$this->session->set_flashdata('type', 'success');
    						//$this->session->set_flashdata('Message', 'Profile Added Successfully');
    	                }
    	               else {
    	                    // Success of file 
    	                }

    	            }//END of file checking if loop
    	            else
                    {     
                      $NewFileName = '';
                    }    
    					
        		//$data['org_id'] = $this->input->post('org_id');		
        		$data['emp_no'] = $this->input->post('emp_no');
        		$data['org_id'] = $user_id;
        		$data['emp_name'] = $this->input->post('emp_name');
        		$data['email'] = $this->input->post('email');
        		$data['mobile'] = $this->input->post('mobile');
        		$data['password'] = md5($this->input->post('password'));
        		$data['dept_id'] = $this->input->post('dept_id');
        		$data['country_id'] = $this->input->post('country_id');
        		$data['state_id'] = $this->input->post('state_id');
        		$data['city_id'] = $this->input->post('city_id');
        		$data['pincode'] = $this->input->post('pincode');
        		$data['address'] = $this->input->post('address');
        		$data['emp_created_date'] = $this->input->post('emp_created_date');
        		$data['emp_created_by'] = $user_id;
        		$data['photo'] =$NewFileName;
        		
        		$data['emp_created_date'] = date('Y-m-d H:i:s');
        		$this->Master_model->master_insert($data,'employee');
               $comp_name = $this->session->userdata('company_name');
                $to_email=$this->input->post('email');
                $pass=$this->input->post('password');
                $subject = "Registration done successfully";

            $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Your account has been created successfully by '.$comp_name.' <br><br>You can login to our portal using following credentials<br>
username: '.$to_email.'<br>
Password: '.$pass.'<br>
Team ConsultnHire!<br>Thank You for choosing us!<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                           $send = sendEmail_JobRequest($to_email,$message,$subject);
        		redirect(base_url().'employer/allemployee');
    	    }
    	}

        $data['result'] = $this->Master_model->getMaster('department' ,$select=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
    	$this->load->view('fontend/employee/add_employee',$data);		
    }

    public function addconsultant()
    {
        $user_id = $this->session->userdata('company_profile_id');
        
            # code...
        
        // if(isset($_POST['add_consultant'])) {
            $pass=rand(100,999);
          $company_profile = array(
                'company_name'     => $this->input->post('company_name'),
                'company_email'     => $this->input->post('company_email'),
                'company_url'      => $this->input->post('company_url'),
                'country_code'     => $this->input->post('country_code'),
                'company_phone'    => $this->input->post('company_phone'),
                'contact_name'     => $this->input->post('contact_name'),
                'company_career_link' => $this->input->post('company_career_link'),
                'company_address'  => $this->input->post('company_address'),
                'city_id'          => $this->input->post('city_id'),
                'company_pincode'          => $this->input->post('company_pincode'),
                'cont_person_email'    => $this->input->post('cont_person_email'),
                'cont_person_mobile'   => $this->input->post('cont_person_mobile'),
                'comp_gstn_no'         => $this->input->post('comp_gst_no'),
                'comp_pan_no'          => $this->input->post('comp_pan_no'),
                'comp_type'            =>"HR Consultant",
                'company_slug'     => $this->slug->create_uri($this->input->post('company_name')),
                 'token'            => md5($this->input->post('company_email')),
            );

            
             
            if(isset($_POST['add_consultant'])) 
            {
                $company_id=$this->input->post('company_profile_id');
                echo $company_id;
                if (isset($company_id) && !empty($company_id)) {
                    
                    $exist_companyid = $this->company_profile_model->companyid_check($company_id,$user_id);
                       if ($exist_companyid) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">This consultant is already added in your list</div>');
                             redirect('employer/addconsultant');
                        }else{ 
                                $consultanat_data=array(
                                'consultant_id' =>$company_id,
                                'company_id'=>$user_id,
                                'created_on' => date('Y-m-d H:i:s'),
                                'created_by' =>$user_id,
                                'is_favourite' =>$this->input->post('Favorite'),
                                );
                            $consultant=$this->Master_model->master_insert($consultanat_data,'consultant_company_mapping');
                            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">This consultant Added Successfully</div>');
                             redirect('employer/addconsultant');
                    }
                }else{
                        $to_email=$this->input->post('cont_person_email');
                        $exist_companyname = $this->company_profile_model->companyname_check($this->input->post('company_name'));
                       if ($exist_companyname) {
                            // all Ready Account Message
                            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Company Name Or Account Already Use This!</div>');
                             redirect('employer/addconsultant');
                        } 
                        else
                        {
                                $company_profile['company_password']=md5($pass);
                            $comp_id=$this->Master_model->master_insert($company_profile,'company_profile');
                            // echo $comp_id
                                if (isset($comp_id) && !empty($comp_id)) {
                                # code...
                                $consultanat_data=array(
                                'consultant_id' =>$comp_id,
                                'company_id'=>$user_id,
                                'created_on' => date('Y-m-d H:i:s'),
                                'created_by' =>$user_id,
                                'is_favourite' =>$this->input->post('Favorite'),

                                );
                            $consultant=$this->Master_model->master_insert($consultanat_data,'consultant_company_mapping');
                            // send mail to consultant
                            $user_id = $this->session->userdata('company_profile_id');

                            $comp_name = $this->session->userdata('company_name');
                           
                            if (isset($consultant) && !empty($consultant)) {
                                

                            // successfully sent mail
                          // $this->job_seeker_model->sendEmail($email_to);

                                
                          }
                      }

                    }
            }
             $subject = "Registration done successfully";

            $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Your account has been created successfully by '.$comp_name.' <br><br>You can login to our portal using following credentials<br>
username: '.$to_email.'<br>
Password: '.$pass.'<br>
Team ConsultnHire!<br>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                           $send = sendEmail_JobRequest($to_email,$message,$subject);
                                

        }
            elseif (isset($_POST['update_consultant'])) {
            $company_profile_id=$this->input->post('company_profile_id');
            // echo $consultant_id;
            if (isset($company_profile_id)) {
                $where['company_profile_id']=$consultant_id;
                // print_r($company_profile);
            $this->Master_model->master_update($company_profile,'company_profile',$where);
            $consultant_id=$this->input->post('consultant_id');
            $whr['con_comp_map_id']=$consultant_id;
            $data['is_favourite']=$this->input->post('Favorite');
            $this->Master_model->master_update($data,'consultant_company_mapping',$whr);


            // redirect(base_url().'employer/allconsultants');
            }
                # code...
            }

                    
        
               
       
    
                $data['city'] = $this->Master_model->getMaster('city',$where=false);
                $data['country'] = $this->Master_model->getMaster('country',$where=false);
                $data['state'] = $this->Master_model->getMaster('state',$where=false);
                $this->load->view('fontend/consultant/add_consultant',$data);
}
/*Employee Listing */
    public function allemployee(){
    	$employer = $this->session->userdata('company_profile_id');
    	//$company=$employer['company_profile_id'];
    	$where='employee.org_id="'.$employer.'" and employee.emp_status!= 0';
    	//$data['result'] = $this->Master_model->getMaster('industry',$where=FALSE);
    	$join = array(
    		'department' => 'department.dept_id = employee.dept_id|INNER',
    		'country' => 'country.country_id = employee.country_id|INNER',
    		'state' => 'state.state_id = employee.state_id|INNER',
    		'city' => 'city.id = employee.city_id|INNER',
    	);
	
    	$res = $this->Master_model->getMaster('employee',$where, $join);
    	$config = array();
    		$config["base_url"] = base_url('employer/index');
    		$config["total_rows"] = count($res);
    		$config['per_page'] =5;
    		$config['uri_segment'] = 3;
    		  
    		$config['full_tag_open'] = '<div class="pagination">';
    		$config['full_tag_close'] = '</div>';
    			 
    		$config['first_link'] = '<button>First Page</button>';
    		$config['first_tag_open'] = '<span class="firstlink">';
    		$config['first_tag_close'] = '</span>';
    		$config['last_link'] = '<button style="">Last Page</button>';
    		$config['last_tag_open'] = '<span class="lastlink">';
    		$config['last_tag_close'] = '</span>';
    		$config['next_link'] = '<span style="margin-left:8px;"><button style="color:#FFF; background:#008000;">Next Page</button></span>';
    		$config['next_tag_open'] = '<span class="nextlink">';
    		$config['next_tag_close'] = '</span>';
    		$config['prev_link'] = '<button style="color:#FFF; background:#0000FF;">Prev Page</button>';
    		$config['prev_tag_open'] = '<span class="prevlink">';
    		$config['prev_tag_close'] = '</span>';
    		$config['cur_tag_open'] = '<span style="margin-left:8px;">';
    		$config['cur_tag_close'] = '</span>';
    		$config['num_tag_open'] = '<span style="margin-left:8px;">';
    		$config['num_tag_close'] = '</span>';
    		$this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          
            $this->pagination->initialize($config);

           $data["links"] = $this->pagination->create_links();
    	   
           $data["result"] = $this->Master_model->getMaster("employee", $where, $join, $order = "ASC", $field = "employee.emp_id", $select = false,$config["per_page"],$page, $search=false, $group_by = FALSE);
    	$this->load->view('fontend/employee/employee_master',$data);
    }

    public function allconsultants()
    {
        $employer=$this->session->userdata('company_profile_id');
        $where='employee.org_id="'.$employer.'" and employee.emp_status!= 0';

        $where='consultant_company_mapping.company_id="'.$employer.'"and consultant_company_mapping.cons_status!=1';
        $join = array(
            'company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|INNER',
            
        );
    
        $data['result'] = $this->Master_model->getMaster('consultant_company_mapping',$where, $join, $order ="ASC", $field = "con_comp_map_id", $select = false, $config["per_page"],$page, $search=false, $group_by = false);
       
            $config = array();
            $config["base_url"] = base_url('employer/index');
            $config["total_rows"] = count($res);
            $config['per_page'] =5;
            $config['uri_segment'] = 3;
              
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
                 
            $config['first_link'] = '<button>First Page</button>';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
            $config['last_link'] = '<button style="">Last Page</button>';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '<span style="margin-left:8px;"><button style="color:#FFF; background:#008000;">Next Page</button></span>';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '<button style="color:#FFF; background:#0000FF;">Prev Page</button>';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span style="margin-left:8px;">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span style="margin-left:8px;">';
            $config['num_tag_close'] = '</span>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $this->pagination->initialize($config);

           $data["links"] = $this->pagination->create_links();

           $this->load->view('fontend/consultant/consultant_master',$data);
       


    }

    /*Delete Employee*/

    public function deleteemployee()
    {
        $id = $this->input->post('id');
    	$del = array(
    		'emp_status' =>'0',
    	);
    	$where11['emp_id']=$id;
    	$this->Master_model->master_update($del,'employee',$where11);
    }
	
	/*Edit Employee*/
	public function editemployee(){
    	$c_id = $this->input->get('id');
    	$where = "emp_id='$c_id'";
    	$data['result'] = $this->Master_model->get_master_row('employee',$select = FALSE,$where);
    	$data['department'] = $this->Master_model->getMaster('department',$where=false);
    	$data['country'] = $this->Master_model->getMaster('country',$where=false);
    	$data['state'] = $this->Master_model->getMaster('state',$where=false);
    	$data['city'] = $this->Master_model->getMaster('city',$where=false);
    	//echo $this->db->last_query(); die;
    	$this->load->view('fontend/employee/edit_employee',$data);
    }

    public function edit_consultant()
    {
        $consultant_id = $this->input->get('id');
        $where_cond = "consultant_company_mapping.con_comp_map_id='$consultant_id'";
        $join_cond = array(
            'company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|INNER',
           
            
        );
        $data['consultant_id']=$consultant_id;
        $data['country'] = $this->Master_model->getMaster('country',$where=false);
        $data['state'] = $this->Master_model->getMaster('state',$where=false);
        $data['city'] = $this->Master_model->getMaster('city',$where=false);
         $data['company_info'] = $this->Master_model->get_master_row('consultant_company_mapping',$select = FALSE, $where = $where_cond , $join = $join_cond);
        $this->load->view('fontend/consultant/edit_consultant',$data);
               
    }
     public function delete_consultant()
    {
        $id = $this->input->post('id');
        $del = array(
            'cons_status' =>'1',
        );
        $where11['con_comp_map_id']=$id;
        $this->Master_model->master_update($del,'consultant_company_mapping',$where11);
    }

    public function postEditData(){
        $this->form_validation->set_rules('emp_no', 'Employee No.', 'required|min_length[3]|max_length[6]|alpha_numeric');
		$this->form_validation->set_rules('emp_name', 'Name', 'required');
		$this->form_validation->set_rules('mobile', ' Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('dept_id', 'Department', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric');
		
        array('required' => 'You must provide a %s.');

        if ($this->form_validation->run() == FALSE)
        {
            $c_id = $this->input->get('id');
        	$where = "emp_id='$c_id'";
        	$data['result'] = $this->Master_model->get_master_row('employee',$select = FALSE,$where);
        	$data['department'] = $this->Master_model->getMaster('department',$where=false);
        	$data['country'] = $this->Master_model->getMaster('country',$where=false);
        	$data['state'] = $this->Master_model->getMaster('state',$where=false);
        	$data['city'] = $this->Master_model->getMaster('city',$where=false);
        	//echo $this->db->last_query(); die;
        	$this->load->view('fontend/employee/edit_employee',$data);	
        }
        else
		{
					
    		$data['emp_no'] = $this->input->post('emp_no');
    		$data['emp_name'] = $this->input->post('emp_name');
    		$data['email'] = $this->input->post('email');
    		$data['mobile'] = $this->input->post('mobile');
    		$data['dept_id'] = $this->input->post('dept_id');
    		$data['address'] = $this->input->post('address');
    		$data['country_id'] = $this->input->post('country_id');
    		$data['state_id'] = $this->input->post('state_id');
    		$data['city_id'] = $this->input->post('city_id');
			$data['pincode'] = $this->input->post('pincode');
    		$data['emp_status'] = $this->input->post('emp_status');
    		$data['emp_updated_date'] = date('Y-m-d H:i:s');
    		$data['emp_updated_by'] = $user_id;
    		$id = $this->input->post('cid');
    		$where['emp_id']=$id;
    		$this->Master_model->master_update($data,'employee',$where);
    		redirect(base_url().'employer/allemployee');
		}
    }


    public function search(){
        $term = $this->input->get('term');
        $this->db->like('pincode', $term);
        $data = $this->db->get("pincode")->result();
        echo json_encode( $data);
    }
     
    function gettopic(){
        $topic_id = $this->input->post('id');
        $where['technical_id'] = $topic_id;
        $topics = $this->Master_model->getMaster('topic',$where);
        $result = '';
        if(!empty($topics)){ 
            $result .='<option value="">Select Topic</option>';
            foreach($topics as $key){
              $result .='<option value="'.$key['topic_id'].'">'.$key['topic_name'].'</option>';
            }
        }else{
            $result .='<option value="">Topic not available</option>';
        }
        echo $result;
    }

    function getsubtopic(){
        $subtopic_id = $this->input->post('id');
        $where['topic_id'] = $subtopic_id;
        $subtopics = $this->Master_model->getMaster('subtopic',$where);
        $result = '';
        
        if(!empty($subtopics)){ 
            $result .='<option value="">Select Subtopic</option>';
            foreach($subtopics as $key){
              $result .='<option value="'.$key['subtopic_id'].'">'.$key['subtopic_name'].'</option>';
            }
        }else{
            $result .='<option value="">Subtopic not available</option>';
        }
        echo $result;
    }

    function getlineitem(){
        $lineitem_id = $this->input->post('id');
        $where['subtopic_id'] = $lineitem_id;
        $lineitems = $this->Master_model->getMaster('lineitem',$where);
        $result = '';
        
        if(!empty($lineitems)){ 
            $result .='<option value="">Select Lineitem</option>';
            foreach($lineitems as $key){
              $result .='<option value="'.$key['lineitem_id'].'">'.$key['title'].'</option>';
            }
        }else{
            $result .='<option value="">Lineitem not available</option>';
        }
         echo $result;
    }

    function getLineitemlevel(){
        $lineitemlevel_id = $this->input->post('id');
        $where['lineitem_id'] = $lineitemlevel_id;
        $lineitemlevels = $this->Master_model->getMaster('lineitemlevel',$where);
        $result = '';
        
        if(!empty($lineitemlevels)){ 
            $result .='<option value="">Select Lineitem Level 2</option>';
            foreach($lineitemlevels as $keys){
              $result .='<option value="'.$keys['lineitemlevel_id'].'">'.$keys['titles'].'</option>';
            }
        }else{
        
            $result .='<option value="">Lineitem Level not available</option>';
        }
         echo $result;
    }


    public function all_exam_result($job_id = null)
    {
        $company_id = $this->session->userdata('company_profile_id');
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

     // search city 
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

/*import question*/

	public function importquestion(){
		//load model
		$this->load->model('Questionbank_employer_model');
		// Check form submit or not 
 		if($this->input->post('upload') != NULL ){ 
   			$data = array(); 
   			if(!empty($_FILES['file']['name'])){ 
    			// Set preference 
    			$config['upload_path'] = 'question_excel/files/'; 
    			$config['allowed_types'] = 'csv'; 
    			$config['max_size'] = '1000'; // max_size in kb 
    			$config['file_name'] = $_FILES['file']['name']; 

    			// Load upload library 
    			$this->load->library('upload',$config); 
   
    			// File upload
    			if($this->upload->do_upload('file')){ 
     				// Get data about the file
     				$uploadData = $this->upload->data(); 
     				$filename = $uploadData['file_name']; 

     				// Reading file
                    $file = fopen("question_excel/files/".$filename,"r");
                    $i = 0;

                    $importData_arr = array();
                       
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);

                        for ($c=0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    $skip = 0;

                    // insert import data
                    foreach($importData_arr as $userdata){
                        if($skip != 0){
							echo "<pre>";
							//print_r($userdata); 
							$tech_id=$userdata[0];
							$where_skill="skill_name='".$tech_id."'";
							$tech_data = $this->Master_model->getMaster('skill_master', $where_skill);
							//print_r($tech_data);
							$userdata[0]=$tech_data[0]['id'];
							
							$topic_id=$userdata[1];
							$where_topic="topic_name='".$topic_id."'";
							$topic_data = $this->Master_model->getMaster('topic', $where_topic);
							//print_r($topic_data);
							$userdata[1]=$topic_data[0]['topic_id'];
							
							$subtopic=$userdata[2];
							$where_subtopic="subtopic_name='".$subtopic."'";
							$subtopic_data = $this->Master_model->getMaster('subtopic', $where_subtopic);
							//print_r($subtopic_data);
							$userdata[2]=$subtopic_data[0]['subtopic_id'];
							
							$lineitem=$userdata[3];
							$where_lineitem="title='".$lineitem."'";
							$lineitem_data = $this->Master_model->getMaster('lineitem', $where_lineitem);
							//print_r($lineitem_data); 
							$userdata[3]=$lineitem_data[0]['lineitem_id'];
							
							
							$lineitemlevel=$userdata[4];
							$where_lineitemlevel="titles='".$lineitemlevel."'";
							$lineitemlevel_data = $this->Master_model->getMaster('lineitemlevel', $where_lineitemlevel);
							//print_r($lineitemlevel_data);die(); 
							$userdata[4]=$lineitemlevel_data[0]['lineitemlevel_id'];
							
																					
							$options=$userdata[13];
							$where_options="options_type='".$options."'";
							$options_data = $this->Master_model->getMaster('options', $where_options);
							//print_r($options_data);die(); 
							$userdata[13]=$options_data[0]['options_id'];
							
                           $this->Questionbank_employer_model->insertRecord($userdata);
							//echo $this->db->last_query();die();
                        }
                        $skip ++;
                    }
					redirect('employer/questionbank-import');
     				$data['response'] = 'successfully uploaded '.$filename;
					
				   
    			}else{ 
     				$data['response'] = 'failed'; 
    			} 
   			}else{ 
    			$data['response'] = 'failed'; 
   			} 
   			// load view 
   			$this->load->view('fontend/employer/questionbank_view',$data); 
  		}else{
   			// load view 
   			$this->load->view('fontend/employer/questionbank_view'); 
  		} 

	}


public function interview_scheduler()
    {
        $company_id = $this->session->userdata('company_profile_id');
       
       // $emails= base64_decode($this->input->post('job_apply_email'));
        
        $job_apply_id = $this->input->post('job_apply_id');

        $where_apply="job_apply_id='$job_apply_id'";
        $select_edu = "job_seeker_id,job_post_id,job_apply_id";
        $data['js_apply_data'] = $this->Master_model->get_master_row("job_apply", $select_edu, $where_apply, $join = FALSE);
        $job_seeker_id = $data['js_apply_data']['job_seeker_id'];
        $job_post_id = $data['js_apply_data']['job_post_id'];

        $where_js="job_seeker_id='$job_seeker_id'";
        $data['js_info_data'] = $this->Master_model->get_master_row("js_info", $select= FALSE, $where_js, $join = FALSE);

        $where_int="job_seeker_id='$job_seeker_id' AND job_post_id='$job_post_id'";
        $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select= FALSE, $where_int, $join = FALSE);
        
        $this->load->view('fontend/employer/interview_form',$data);
       
    }

    public function update_interview_scheduler()
    {
        $company_id = $this->session->userdata('company_profile_id');
       
        $job_apply_id = $this->input->post('apply_id');
        
        $interview_id = $this->input->post('interview_id');
       
        $where_apply="job_apply_id='$job_apply_id'";
        $select_edu = "job_seeker_id,job_post_id,job_apply_id";
        $data['js_apply_data'] = $this->Master_model->get_master_row("job_apply", $select_edu, $where_apply, $join = FALSE);
        $job_seeker_id = $data['js_apply_data']['job_seeker_id'];
        $job_post_id = $data['js_apply_data']['job_post_id'];

        $where_js="job_seeker_id='$job_seeker_id'";
        $data['js_info_data'] = $this->Master_model->get_master_row("js_info", $select= FALSE, $where_js, $join = FALSE);

        $where_int="id='$interview_id'";
        $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select= FALSE, $where_int, $join = FALSE);
       
        $this->load->view('fontend/employer/update_interview_from',$data);
    }

    
    public function send_interview_invitation($job_apply_id = null)
    {
        $company_id = $this->session->userdata('company_profile_id');
       
        $apply_id= $job_apply_id;

        $where_apply="job_apply_id='$apply_id'";
        $select_s = "job_seeker_id,job_post_id";
        $js_apply = $this->Master_model->get_master_row("job_apply", $select_s, $where_apply, $join = FALSE);

        $where_edu="job_seeker_id='".$js_apply['job_seeker_id']."'";
        $select_edu = "full_name,email";
        $js_data = $this->Master_model->get_master_row("js_info", $select_edu, $where_edu, $join = FALSE);

        $where_job="job_post_id='".$js_apply['job_post_id']."'";
        $select_job = "job_post_id,job_title";
        $job_data = $this->Master_model->get_master_row("job_posting", $select_job, $where_job, $join = FALSE);

        $interview_date = $this->input->post('interview_date');
        $start_time = $this->input->post('start_time');
        $end_time = $this->input->post('end_time');
        $interview_type = $this->input->post('interview_type');
        $interview_address = addslashes($this->input->post('interview_address'));
        $user_message = addslashes($this->input->post('message'));
        $interview_id = $this->input->post('interview_id');
       // echo date('Y-m-d', strtotime(str_replace('/', '-', $interview_date))); die;

        $inte_array = array(
            'job_post_id'           => $js_apply['job_post_id'],
            'job_seeker_id'         => $js_apply['job_seeker_id'],
            'company_id'            => $company_id,
            // 'interview_date'        => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date))),
            // 'start_time'            => $start_time,
            // 'end_time'              => $end_time,
            'interview_type'        => $interview_type,
            'interview_details'     => $interview_address,
            'message_to_candidate'  => $user_message,
        );

        $inter_his_array = array(
            'job_post_id'           => $js_apply['job_post_id'],
            'job_seeker_id'         => $js_apply['job_seeker_id'],
            'company_id'            => $company_id,
           // 'interview_date'        => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date))),
          //  'start_time'            => $start_time,
            //'end_time'              => $end_time,
            'interview_type'        => $interview_type,
            'interview_details'     => $interview_address,
            'message_to_candidate'  => $user_message,
            'created_on'            => date('Y-m-d H:i:s'),
            'created_by'            => $company_id,
        );
        $this->Master_model->master_insert($inter_his_array,'interview_history');

        if(empty($interview_id)){
            $inte_array['created_by']  = $company_id;
            $inte_array['created_on']  = date('Y-m-d H:i:s');
            $ins_id = $this->Master_model->master_insert($inte_array,'interview_scheduler');
            if($ins_id)
            {
                $where_del = "interview_id='$ins_id'";
                $del = $this->Master_model->master_delete('interview_dates',$where_del);
                if($del==true)
                {
                    for($l=0;$l<sizeof($interview_date);$l++)
                    {
                        if($interview_date[$l]!=''){
                           
                            $lang_array = array(
                                'interview_id'   => $ins_id,
                                'interview_date' => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date[$l]))),
                                'start_time'     => $start_time[$l],
                                'end_time'       => $end_time[$l],
                            );
                           $this->Master_model->master_insert($lang_array, 'interview_dates');
                           $this->Master_model->master_insert($lang_array, 'interview_dates_history');
                        }
                    }
                }
                $where['interview_id'] = $ins_id;
                $interview_dates = $this->Master_model->getMaster('interview_dates',$where);
                
                $email = $js_data['email'];
                // $email = 'shyam@itdivine.in';
                $subject = 'UNCONFIRMED. Interview request for '.$js_data['full_name'];
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
                    <br><br>Hi '.$js_data['full_name'].',<br>'.$user_message.'<br/><br/>Please check the following interview details: <br/><b>Job Title: </b> '.$job_data['job_title'].'<br/>
                        <table>
                        <tr><td>Interview Date</td><td>Start Time</td><td>End Time</td><td></td></tr>';

         
                if(sizeof($interview_dates)==1)
                    {
                        for($l1=0;$l1<sizeof($interview_dates);$l1++)
                        {
                            $message .='<tr><td>'.$interview_dates[$l1]['interview_date'].'</td><td>'.$interview_dates[$l1]['start_time'].'</td><td>'.$interview_dates[$l1]['end_time'].'</td><td></td></tr>';
                        }
                            $message .= '
                                </table><br/><b>Interview Type: </b> '.$interview_type.'<br/><b>Interview Details: </b> '.$interview_address.'<br>';
                                
                            $message .= '
                                <br><br><a href="'.base_url().'Confirm_interview/confirm_interview_now?apply_id='.base64_encode($ins_id).'&js_id='.base64_encode($email).'" class="btn btn-primary" value="Confirm Interview" align="center" target="_blank">Confirm Interview</a>
                                <a href="'.base_url().'Confirm_interview/reschedule_interview?apply_id='.base64_encode($ins_id).'&js_id='.base64_encode($email).'" class="btn btn-info" value="Reschedule Interview" align="center" target="_blank">Reschedule Interview</a>';
                    }else{

                        for($l1=0;$l1<sizeof($interview_dates);$l1++)
                        {
                            $message .='<tr><td>'.$interview_dates[$l1]['interview_date'].'</td><td>'.$interview_dates[$l1]['start_time'].'</td><td>'.$interview_dates[$l1]['end_time'].'</td><td><a href="#">Select</a></td></tr>';
                        }
                        $message .= '
                                </table><br/><b>Interview Type: </b> '.$interview_type.'<br/><b>Interview Details: </b> '.$interview_address.'<br>';
                    }
                    $message .=' <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                   $send = sendEmail_JobRequest($email,$message,$subject);
                   redirect('employer/all_applicant/'.$js_apply['job_post_id']);
            }

        }else{
            $inte_array['updated_by']  = $company_id;
            $inte_array['updated_on']  = date('Y-m-d H:i:s');

            $where_ins['id']=$interview_id;
            $ins_id = $this->Master_model->master_update($inte_array,'interview_scheduler',$where_ins);

            if($ins_id)
            {

                $where_del = "interview_id='$interview_id'";
                $del = $this->Master_model->master_delete('interview_dates',$where_del);
                if($del==true)
                {
                    for($l=0;$l<sizeof($interview_date);$l++)
                    {
                        if($interview_date[$l]!=''){
                           
                            $lang_array = array(
                                'interview_id'   => $interview_id,
                                'interview_date' => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date[$l]))),
                                'start_time'     => $start_time[$l],
                                'end_time'       => $end_time[$l],
                            );
                           $this->Master_model->master_insert($lang_array, 'interview_dates');
                           $this->Master_model->master_insert($lang_array, 'interview_dates_history');
                        }
                    }
                }

                $where['interview_id'] = $interview_id;
                $interview_datess = $this->Master_model->getMaster('interview_dates',$where);

                $email = $js_data['email'];
                // $email = 'shyam@itdivine.in';
                $subject = 'UNCONFIRMED RESCHEDULED. Interview request for '.$js_data['full_name'];
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
                    <br><br>Hi '.$js_data['full_name'].',<br>'.$user_message.'<br/><br/>Please check the following rescheduled interview details: <br/><b>Job Title: </b> '.$job_data['job_title'].'<br/>
                         <table>
                        <tr><td><b>Interview Date</b></td><td><b>Start Time</b></td><td><b>End Time</b></td></tr>';

                if(sizeof($interview_datess)==1)
                    {
                        for($l1=0;$l1<sizeof($interview_datess);$l1++)
                        {
                            $message .='<tr><td>'.$interview_datess[$l1]['interview_date'].'</td><td>'.$interview_datess[$l1]['start_time'].'</td><td>'.$interview_datess[$l1]['end_time'].'</td><td></td></tr>';
                        }
                            $message .= '
                                </table><br/><b>Interview Type: </b> '.$interview_type.'<br/><b>Interview Details: </b> '.$interview_address.'<br>';
                                
                            $message .= '
                                <br><br><a href="'.base_url().'Confirm_interview/confirm_interview_now?apply_id='.base64_encode($ins_id).'&js_id='.base64_encode($email).'" class="btn btn-primary" value="Confirm Interview" align="center" target="_blank">Confirm Interview</a>
                                <a href="'.base_url().'Confirm_interview/reschedule_interview?apply_id='.base64_encode($ins_id).'&js_id='.base64_encode($email).'" class="btn btn-info" value="Reschedule Interview" align="center" target="_blank">Reschedule Interview</a>';
                    }else{

                        for($l1=0;$l1<sizeof($interview_datess);$l1++)
                        {
                          
                            $message .='<tr><td>'.$interview_datess[$l1]['interview_date'].'</td><td>'.$interview_datess[$l1]['start_time'].'</td><td>'.$interview_datess[$l1]['end_time'].'</td><td><a href="'.base_url().'Confirm_interview/select_slot?apply_id='.base64_encode($interview_datess[$l1]['id']).'&js_id='.base64_encode($email).'" target="_blank">Select</a></td></tr>';
                        }
                        $message .= '
                                </table><br/><b>Interview Type: </b> '.$interview_type.'<br/><b>Interview Details: </b> '.$interview_address.'<br>';
                    }
                    $message .=' <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                   $send = sendEmail_JobRequest($email,$message,$subject);
                   redirect('employer/all_applicant/'.$js_apply['job_post_id']);
            }
        }
            
        
    }

    public function update_interview_status()
    {
        $company_id = $this->session->userdata('company_profile_id');
     
        $interview_id = $this->input->post('interview_id');
        $job_id = $this->input->post('job_id');
       
        $where_int="id='$interview_id'";
        $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select= FALSE, $where_int, $join = FALSE);
       
        $this->load->view('fontend/employer/interview_status_form',$data); 
      
    }
     public function update_inter_status()
    {
        $company_id = $this->session->userdata('company_profile_id');
     
        $interview_id = $this->input->post('interview_id');
        $job_id = $this->input->post('job_id');

        $status_array['interview_complete_status'] = $this->input->post('interview_status');
        $status_array['updated_by']  = $company_id;
        $status_array['updated_on']  = date('Y-m-d H:i:s');

        $where_ins['id']=$interview_id;
        $ins_id = $this->Master_model->master_update($status_array,'interview_scheduler',$where_ins);
        redirect('employer/all_applicant/'.$job_id);
    }

    public function cancel_interview($interview_id,$job_post_id)
    {
       // $this->Job_career_model->delete_career($job_seeker_id);
        $job_id = $job_post_id;
        $interview_id1 = $interview_id;
        $where1 = "id='$interview_id1'";
        $del1 = $this->Master_model->master_delete('interview_scheduler',$where1);
        
        if($del1){
            $where_del = "interview_id='$interview_id1'";
            $del = $this->Master_model->master_delete('interview_dates',$where_del);
        }

        redirect('employer/all_applicant/'.$job_id);
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            // $this->load->model('Consultant_autocomplete_model');
            $result = $this->Job_seeker_experience_model->autocomplete_companies($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->company_name;
                echo json_encode($arr_result);

            }
        }
    }

    function get_company_info()
    {
       
        $s =$this->input->post('comp_name');
        $where1 = "company_name = '$s'";
        $join = array( "country"=>"country.country_id=company_profile.country_id | LEFT OUTER",
                        "city"=>"city.id=company_profile.city_id | LEFT OUTER",
                        "state"=>"state.state_id=company_profile.state_id | LEFT OUTER");
      
        $select ="company_profile_id,company_name,company_email,company_url,country_code,company_phone,contact_name,cont_person_email,cont_person_mobile,company_career_link,company_address,company_address2,company_pincode,comp_gstn_no,comp_pan_no,company_profile.country_id,city.city_name,state.state_name,company_profile.state_id,company_profile.city_id";
        $result = $this->Master_model->getMaster('company_profile', $where1, $join = $join, $order = false, $field = false, $select = $select,$limit=false,$start=false, $search=false);
                echo json_encode($result);

    }


    public function corporate_cv_bank()
    {
        $company_id = $this->session->userdata('company_profile_id');

        $where_c['company_id'] = $company_id;
        $data['cv_bank_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join = false, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
       
        $this->load->view('fontend/employer/corporate_cv_bank',$data);
    }

    public function add_new_cv()
    {
        $company_id = $this->session->userdata('company_profile_id');

        if($_POST)
        {
            $cv_data = array(
                'company_id'                 => $company_id,
                'js_name'                    => $this->input->post('candidate_name'),
                'js_email'                   => $this->input->post('candidate_email'),
                'js_mobile'                  => $this->input->post('candidate_phone'),
                'js_job_type'                => $this->input->post('job_type'),
                'js_current_designation'     => $this->input->post('current_job_desig'),
                'js_current_work_location'   => $this->input->post('current_work_location'),
                'js_working_since'           => date('Y-m-d', strtotime($this->input->post('working_current_since'))),
                'js_current_ctc'             => $this->input->post('current_ctc'),
                'js_current_notice_period'   => $this->input->post('candidate_notice_period'),
                'js_experience'              => $this->input->post('candidate_experiance'),
                'js_last_salary_hike'        => date('Y-m-d', strtotime($this->input->post('last_salary_hike'))),
                'js_top_education'           => $this->input->post('top_education'),
                // 'js_edu_special'             => $this->input->post('education_specialization'),
                'js_skill_set'               => $this->input->post('candidate_skills'),
                'js_certifications'          => $this->input->post('candidate_certification'),
                'js_industry'                => $this->input->post('candidate_industry'),
                'js_role'                    => $this->input->post('candidate_role'),
                'js_expected_salary'         => $this->input->post('candidate_expected_sal'),
                'js_desired_work_location'   => $this->input->post('desired_wrok_location'),
            );
            
                $cv_data['created_on'] = date('Y-m-d H:i:s');
                $cv_data['created_by'] = $company_id;

                $this->Master_model->master_insert($cv_data, 'corporate_cv_bank');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">New CV added sucessfully!</div>');
                redirect('employer/add_new_cv');
          

        }else{
            $data['industry_master'] = $this->Master_model->getMaster('job_category',$where=false);
            $data['department'] = $this->Master_model->getMaster('department',$where=false);
            $data['job_role'] = $this->Master_model->getMaster('job_role',$where=false);

            //$data['cv_info'] = $this->Master_model->getMaster('corporate_cv_bank',$where=false);

            $this->load->view('fontend/employer/add_new_cv', $data);
        }
        
    }


 function get_candidate_by_email(){
        if (isset($_GET['term'])) {
            // $this->load->model('Consultant_autocomplete_model');
            $result = $this->Job_seeker_experience_model->autocomplete_candidate($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->email;
                echo json_encode($arr_result);

            }
        }
    }

    // desired career
    function get_candidate_info_by_email()
    {
       
        $email_id =$this->input->post('email');
        $where1 = "js_info.email = '$email_id'";
        $join = array( 
            "js_career_info"=>"js_career_info.job_seeker_id=js_info.job_seeker_id | LEFT OUTER",
            // "js_education"=>"js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER",
        );
      
        $select ="js_career_info.notice_period,js_career_info.serving_notice_period,js_career_info.immediate_join,js_career_info.desired_industry,js_career_info.job_area,js_career_info.js_career_salary,js_career_info.avaliable,js_career_info.skills,js_career_info.job_role,js_career_info.industry_id,js_info.full_name,js_info.mobile_no,js_info.job_seeker_id";

        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        echo json_encode($result);

    }
    
    function get_cand_other_info_by_email()
    {
       
        $email_id =$this->input->post('email');
        $where1 = "js_info.email = '$email_id'";
        $join = array( 
            "js_education"=>"js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER",
        );
        $select ="min(js_education.education_level_id) as edu_high,js_education.job_seeker_id";
        $res = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        $ed  = $res[0]['edu_high'];
        $js = $res[0]['job_seeker_id'];
        
        $where_int="education_level_id='$ed'";
        $result = $this->Master_model->getMaster('education_level', $where_int, $join= false, $order = false, $field = false, $select= false,$limit=false,$start=false, $search=false);

        echo json_encode($result);

    }


    function get_cand_skills_by_email()
    {
       
        $email_id =$this->input->post('email');
        $where1 = "js_info.email = '$email_id'";
        $join = array( 
            "job_seeker_skills"=>"job_seeker_skills.job_seeker_id=js_info.job_seeker_id | LEFT OUTER",
        );
        $select ="job_seeker_skills.skills,job_seeker_skills.js_skill_id";
        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        
        echo json_encode($result);

    }


    public function add_Corporate_Documents()
    {
        $company_id = $this->session->userdata('company_profile_id');

        $whereres = "company_profile_id='$company_id' and status!='1'";
         $documents = $this->Master_model->getMaster('corporate_documents',$whereres,$join = FALSE, $order = false, $field = false, $select = FALSE,$limit=false,$start=false, $search=false);
              
        // $data['documents']=$this->Master_model->get_master('corporate_documents',$select=FALSE,$whereres);
        $this->load->view('fontend/employer/corporate_documents',compact('documents'));
    }

    public function savedocumets()
    {
        $company_id = $this->session->userdata('company_profile_id');

        
            $config['upload_path']   = 'upload/corporate_documents/';
            $config['allowed_types'] =   '*';
            $config['encrypt_name']  = true;
           
            
             $config['max_size']      = 1000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('corporate_doc')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please upload a valid Document</div>');
                redirect('employer/add_Corporate_Documents');
            }
            else
            {
                 $img             = $this->upload->data();
                 $file_name       = $img['file_name'];
                 $documets=array('company_profile_id'=>$company_id,
                    'document_type'=>$this->input->post('document_type'),
                    'document'=>$file_name,
                    'created_on'=>date('Y-m-d H:i:s'),
                    'created_by'=>$company_id);
                 $result=$this->Master_model->master_insert($documets,'corporate_documents');
                 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Document Uploaded sucessfully</div>');
                redirect('employer/add_Corporate_Documents');
                 
            }
        }
         public function delete_document($id) {
        
        $status = array(
            'status'=> '1',
        );
        $where_del['document_id']=$id;
        $this->Master_model->master_update($status,'corporate_documents',$where_del);
                redirect('employer/add_Corporate_Documents');
          
    }
        
// to get skill master for autocomplete
    function get_skills_autocomplete(){
        if (isset($_GET['term'])) {

            $result = $this->Job_seeker_experience_model->search_skills($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->skill_name;
                echo json_encode($arr_result);
            }
        }
    }

    function get_candidate_experiance_by_email()
    {
       
        $email_id =$this->input->post('email');
        $where1 = "js_info.email = '$email_id' AND end_date IS NULL";
        $join = array( 
            "js_experience"=>"js_experience.job_seeker_id=js_info.job_seeker_id | LEFT OUTER",
            "job_role"=>"job_role.id=js_experience.designation_id | LEFT OUTER",

        );
      
        $select ="job_role.job_role_title,js_experience.company_profile_id,js_experience.js_career_salary,js_experience.designation_id,js_experience.start_date,js_experience.address";

        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);
        
        echo json_encode($result);

    }
    
} // end class


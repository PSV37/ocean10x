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
				'country_code'    => $this->input->post('country_code'),
                'company_phone'    => $this->input->post('company_phone'),
                'company_category' => $this->input->post('company_category'),
                'contact_name'     => $this->input->post('contact_name'),
				'hot_jobs'     => $this->input->post('hot_jobs'),
				'company_career_link'     => $this->input->post('company_career_link'),
                'company_service'  => $this->input->post('company_service'),
                'company_address'  => $this->input->post('company_address'),
				'country_id'  => $this->input->post('country_id'),
				'state_id'  => $this->input->post('state_id'),
				'city_id'  => $this->input->post('city_id'),
				'company_aboutus'  => $this->input->post('company_aboutus'),

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
                $this->company_profile_model->update($company_profile, $employer_id);
                $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Successfully Update Your Profile</div>');
                 redirect('employer/profile-setting');
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
                        
                        'job_location'       => $this->input->post('country_id'),
						'state_id'           => $this->input->post('state_id'),
						'city_id'            => $this->input->post('city_id'),
                        'job_nature'         => $this->input->post('job_nature'),
                        'job_edu'            => $this->input->post('job_edu'),
                        'no_jobs'            => $this->input->post('no_jobs'),
                        'edu_specialization' => $this->input->post('job_edu_special'),   //new added field
                        'job_role'           => $this->input->post('job_role'),   //new added field
                        'skills_required'    => implode(',', $this->input->post('skill_set')), //new added field

                        'job_level'          => $this->input->post('job_level'),
                        'salary_range'       => $this->input->post('salary_range'),
                        'job_types'          => $this->input->post('job_types'),
                        "job_deadline"       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('job_deadline')))),

                        'preferred_age'      => $this->input->post('preferred_age_from'),
						'preferred_age_to'   => $this->input->post('preferred_age_to'),
                        'working_hours'      => $this->input->post('working_hours'),
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

                    $this->load->view('fontend/employer/job_details', compact('job_id', 'company_id', 'job_details', 'total_applicantlist'));
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

                if ($_POST) {
                    $employer_id  = $this->session->userdata('company_profile_id');
                    $candiate_email  = $this->input->post('candiate_email');
                    $job_post_id  = $this->input->post('job_post_id');
                    $job_desc  = $this->input->post('job_desc');
                    
                    $email = explode(',', $candiate_email);

                $where_req="job_post_id= '$job_post_id'";
                $join_req = array(
                    'job_types' => 'job_types.job_types_id = job_posting.job_types|INNER',
                    'company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id|INNER',
                    'city' => 'city.id = job_posting.city_id|INNER',
                    'country' => 'country.country_id = job_posting.job_location|INNER',
                    'state' => 'state.state_id = job_posting.state_id|INNER',
                    'job_category' => 'job_category.job_category_id = job_posting.job_category|INNER',
                    'job_nature' => 'job_nature.job_nature_id = job_posting.job_nature|INNER',
                    'job_level' => 'job_level.job_level_id = job_posting.job_level|INNER',
                    'job_role' => 'job_role.id = job_posting.job_role|INNER',
                    'education_level' => 'education_level.education_level_id = job_posting.job_edu|INNER',
                    'education_specialization' => 'education_specialization.id = job_posting.edu_specialization|INNER',
                    
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
                  // echo $this->db->last_query();
                    for($i=0;$i<sizeof($email);$i++)
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

                            $message .='<br/><b>Job Description: </b> '.$require['job_desc'].'<br/><b>Job Benefits: </b> '.$require['benefits'].'<br/><b>Other Job Description: </b> '.$require['education'].'<br><br><a href="'.base_url().'job_forword_seeker/apply_forworded_job?apply_id='.base64_encode($email[$i]).'&job_id='.base64_encode($apply).'" class="btn btn-primary" value="Apply Now" align="center" target="_blank">Apply Now</a> <br><br><br>You should receive an update form the employer very soon. If you have any queries please feel free to contact<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                           $send = sendEmail_JobRequest($email[$i],$message,$subject);
                            echo $message;
                          //  if ($send) {
                          //   $this->session->set_flashdata('success',
                          //   '<div class="alert alert-success alert-dismissable">
                          //   <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                          // Job post is sucessfully Send To Candidates  
                          // </div>');
                          //   redirect('employer/active_job');
                          //  }
                        }
                        // else{
                        //     redirect('employer/active_job');
                        // }

                    }
                   
                   
                }
               
        }

} // end class


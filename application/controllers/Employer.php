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
                'company_phone'    => $this->input->post('company_phone'),
                'company_category' => $this->input->post('company_category'),
                'contact_name'     => $this->input->post('contact_name'),
				'hot_jobs'     => $this->input->post('hot_jobs'),
				'company_career_link'     => $this->input->post('company_career_link'),
                'company_service'  => $this->input->post('company_service'),
                'company_address'  => $this->input->post('company_address'),
				'company_aboutus'  => $this->input->post('company_aboutus'),
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
                    $this->load->view('fontend/employer/dashboard', compact('company_info'));
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
                        'experience'           => $this->input->post('experience'),
                        
                        'job_location'       => $this->input->post('job_location'),
                        'job_nature'         => $this->input->post('job_nature'),
                        'job_edu'            => $this->input->post('job_edu'),
                        'no_jobs'            => $this->input->post('no_jobs'),
                         'job_level'          => $this->input->post('job_level'),
                        'salary_range'       => $this->input->post('salary_range'),
                        'job_types'          => $this->input->post('job_types'),
                        "job_deadline"       => (empty($job_deadline)) ? null : date('Y-m-d', strtotime(str_replace('/', '-', $job_deadline))),
                        'preferred_age'      => $this->input->post('preferred_age_from'),
						'preferred_age_to'      => $this->input->post('preferred_age_to'),
						'job_deadline_day'      => $this->input->post('job_deadline_day'),
						'job_deadline_month'      => $this->input->post('job_deadline_month'),
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
                    $this->load->view('fontend/employer/job_post');
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
                        $job_info = $this->job_posting_model->get($job_id);
                        $this->load->view('fontend/employer/update_job', compact('job_info'));
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

                        $resume          = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
                        $edcuaiton_list  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
                        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                        $training_list   = $this->Job_training_model->training_list_by_id($jobseeker_id);
                        $reference_list  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
                        $this->load->view('fontend/downloadcv', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'language_list'));
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

        }

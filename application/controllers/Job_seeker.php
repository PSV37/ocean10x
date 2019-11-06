<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_seeker extends MY_Seeker_Controller
{
    public function __construct()
    {
        parent::__construct();
        $jobseeker_id = $this->session->userdata('job_seeker_id');
        if ($jobseeker_id == null) {
            redirect('register/jobseeker_login', 'refresh');
        }
    }

    /*** Dashboard ***/
	
	public function seeker_info()
    {
			
        $this->load->view('fontend/jobseeker/seeker_info');
    }
	

	
    public function update_personalinfo()
    {

        if ($_POST) {
            $jobseeker_id     = $this->session->userdata('job_seeker_id');
            $personal_info_id = $this->input->post('js_personal_info_id');
            $personal_info    = array(
                'job_seeker_id'     => $jobseeker_id,
                'father_name'       => $this->input->post('father_name'),
                'mother_name'       => $this->input->post('mother_name'),
                "date_of_birth"     => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('date_of_birth')))),
                'nationality'       => $this->input->post('nationality'),
               // 'national_id'       => $this->input->post('national_id'),
				'country_code'      => $this->input->post('country_code'),
                'mobile'            => $this->input->post('mobile'),
				'alternatecountry_code'      => $this->input->post('alternatecountry_code'),
                'alternatemobile'            => $this->input->post('alternatemobile'),
				'country_id'        => $this->input->post('country_id'),
				'state_id'          => $this->input->post('state_id'),
				'city_id'           => $this->input->post('city_id'),
				'pincode'          => $this->input->post('pincode'),
                'present_address'   => $this->input->post('present_address'),
				'country1_id'       => $this->input->post('country1_id'),
				'state1_id'         => $this->input->post('state1_id'),
				'city1_id'          => $this->input->post('city1_id'),
				'pincode1'          => $this->input->post('pincode1'),
                'parmanent_address' => $this->input->post('parmanent_address'),

            );
            if (empty($personal_info_id)) {
                $this->job_seeker_personal_model->insert($personal_info);
                $in_arr= array(
                    'mobile_no'            => $this->input->post('mobile')
                );
                 $where_update['job_seeker_id']=$jobseeker_id;
                $this->Master_model->master_update($in_arr,'js_info',$where_update);
                redirect('job_seeker/seeker_info',$data);
            } else {
                $this->job_seeker_personal_model->update($personal_info, $personal_info_id);
                $in_arr= array(
                    'mobile_no'            => $this->input->post('mobile')
                );
                $where_update['job_seeker_id']=$jobseeker_id;
                $this->Master_model->master_update($in_arr,'js_info',$where_update);
                redirect('job_seeker/seeker_info',$data);
            }
        } else {
            $jobseeker_id     = $this->session->userdata('job_seeker_id');
            $js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
			$job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
			$name = $this->Job_seeker_model->resume_view_by_id($jobseeker_id);
			$city = $this->Master_model->getMaster('city',$where=false);
			$country = $this->Master_model->getMaster('country',$where=false);
			$state = $this->Master_model->getMaster('state',$where=false);
			$where_sek['job_seeker_id'] = $jobseeker_id;
            $join1 = array(
				'country' => 'country.country_id = js_personal_info.country1_id|INNER',
				'state' => 'state.state_id = js_personal_info.state1_id|INNER',
				'city' => 'city.id = js_personal_info.city1_id|INNER'
			);
			
			$results = $this->Master_model->get_master_row("js_personal_info", $select = false, $where_sek, $join1);
			//echo $this->db->last_query();
            echo $this->load->view('fontend/jobseeker/update_personalinfo', compact('jobseeker_id', 'js_personal_info', 'job_seeker_photo', 'name', 'city', 'country', 'state', 'results'),true);
        }
    }

    public function delete_education($id)
    {
        $this->Job_seeker_education_model->delete($id);
        redirect('job_seeker/seeker_info');
    }

    public function update_education()
    {
        if ($_POST) {
            $jobseeker_id      = $this->session->userdata('job_seeker_id');
            $education_info_id = $this->input->post('js_education_id');
            $education_info    = array(
                'job_seeker_id'      => $jobseeker_id,
                'education_level_id'          => $this->input->post('education_level_id'),
                'specialization_id'           => $this->input->post('specialization_id'),
				'course_id'          => $this->input->post('course_id'),
				'board_id'          => $this->input->post('board_id'),
                'js_institute_name'  => $this->input->post('js_institute_name'),
                'js_resut'           => $this->input->post('js_resut'),
                'js_year_of_passing' => $this->input->post('js_year_of_passing'),
            );
            if (empty($education_info_id)) {
                $this->Job_seeker_education_model->insert($education_info);
                redirect('job_seeker/seeker_info');
            } else {
                $this->Job_seeker_education_model->update($education_info, $education_info_id);
                redirect('job_seeker/seeker_info');
            }
        } else {
            $jobseeker_id   = $this->session->userdata('job_seeker_id');
            $edcuaiton_list = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
			$schoolboard = $this->Master_model->getMaster('schoolboard',$where=false);
			$course = $this->Master_model->getMaster('course',$where=false);
			$passingyear = $this->Master_model->getMaster('passingyear',$where=false);
			$education_level = $this->Master_model->getMaster('education_level',$where=false);
			$education_specialization = $this->Master_model->getMaster('education_specialization',$where=false);
           echo $this->load->view('fontend/jobseeker/update_education.php', compact('edcuaiton_list', 'schoolboard', 'course', 'passingyear', 'education_level', 'education_specialization'),true);
        }
    }

    public function update_experience()
    {

        if ($_POST) { 
            $enddate            = strtolower($this->input->post('end_date'));
            $jobseeker_id       = $this->session->userdata('job_seeker_id');
            $experience_info_id = $this->input->post('js_experience_id');
            $experience_info    = array(
                'job_seeker_id'    => $jobseeker_id,
                'company_profile_id'     => $this->input->post('company_profile_id'),
                'designation_id'      => $this->input->post('designation_id'),
                'job_level'        => $this->input->post('job_level'),
                'dept_id'       => $this->input->post('dept_id'),
                'start_date'       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('start_date')))),
                'end_date'         => (empty($enddate)) ? null : date('Y-m-d', strtotime(str_replace('/', '-', $enddate))),
                'address'          => $this->input->post('address'),
                'major_activity'   => $this->input->post('major_activity'),
                'achievement'      => $this->input->post('achievement'),
                'responsibilities' => $this->input->post('responsibilities'),

            );
            if (empty($experience_info_id)) {
                $this->Job_seeker_experience_model->insert($experience_info);
                redirect('job_seeker/seeker_info');
            } else {
                $this->Job_seeker_experience_model->update($experience_info, $experience_info_id);
                redirect('job_seeker/seeker_info');
            }
        } else {
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
            $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
			$company_profile = $this->Master_model->getMaster('company_profile',$where=false);
			$designation = $this->Master_model->getMaster('designation',$where=false);
			$department = $this->Master_model->getMaster('department',$where=false);
			//echo $this->db->last_query();
           echo $this->load->view('fontend/jobseeker/update_experience.php', compact('experinece_list', 'company_profile', 'designation', 'department'),true);
        }
    }

    public function update_photo()
    {
        $jobseeker_id     = $this->session->userdata('job_seeker_id');
        $job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
        $this->load->view('fontend/jobseeker/update_photo.php', compact('job_seeker_photo'));
    }
    
	public function save_photo2($id)
    {
		
		
		$asrc = isset($_POST['avatar_src']) ? $_POST['avatar_src'] : NULL;
  		$adata = isset($_POST['avatar_data']) ? $_POST['avatar_data'] : NULL;
  		$afile = isset($_FILES['avatar_file']) ? $_FILES['avatar_file'] : NULL;
  		
		$data_array = array($asrc,$adata,$afile);
		print_r($data_array); exit;
		$response = $this->load->library('Cropavatar',$data_array);
		
		/*
		$response = array(
  'state'  => 200,
  'message' => $this->Cropavatar->getMsg(),
  'result' => $this->Cropavatar->getResult()
);
*/
exit;
//echo json_encode($response);

		$job_seeker_photo = array(
                'job_seeker_id' => $jobseeker_id,
                'photo_path'    => $file_name,
            );
            $this->Job_seeker_photo_model->update($job_seeker_photo, $id);
			 redirect('job_seeker/seeker_info');
	}
	
    public function save_photo($id)
    {
		$data = $this->input->post('avatar_data');
		$data =json_decode($data);
/*echo "<pre>";
$data = $this->input->post('avatar_data');
$data =json_decode($data);
print_r($data);
exit;*/
        $id     = $this->session->userdata('job_seeker_id');

		$job_seeker_photo_row = $this->Job_seeker_photo_model->photo_by_seeker($id);
        $config['upload_path']   = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name']  = true;
        $config['max_size']      = 12000;
       /* $config['max_width']     = 310;
        $config['max_height']    = 310;*/

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('avatar_file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">'.$this->upload->display_errors().'</div>');
            redirect('job_seeker/seeker_info');
        } else {
            $img              = $this->upload->data();
            $file_name        = $img['file_name'];
            $jobseeker_id     = $this->session->userdata('job_seeker_id');
            $job_seeker_photo = array(
                'job_seeker_id' => $jobseeker_id,
                'photo_path'    => $file_name,
            );
            
            if (!$job_seeker_photo_row) {
                	$this->Job_seeker_photo_model->insert($job_seeker_photo);
            } else {
            	$this->Job_seeker_photo_model->update_photo_new($job_seeker_photo, $id);
            }
			//echo $this->db->last_query(); die;
            $this->save_cropped_photo($data->x,$data->y,$data->width,$data->height,$file_name);
           // redirect('job_seeker/seeker_info');
        }
    }

     public function save_cropped_photo($x,$y,$w,$h,$file_name)
    {
	
	//crop it
        $data['x'] = $x;
        $data['y'] = $y;
        $data['w'] = $w;
        $data['h'] = $h;
        
        $config['image_library'] = 'gd2';
        //$path =  'uploads/apache.jpg';
        
        $configc['source_image'] = 'upload/'.$file_name;
       // $config['create_thumb'] = TRUE;
        //$config['new_image'] = './uploads/new_image.jpg';
        $configc['maintain_ratio'] = FALSE;
        $configc['width']  = $data['w'];
        $configc['height'] = $data['h'];
        $configc['x_axis'] = $data['x'];
        $configc['y_axis'] = $data['y'];

//print_r($configc); exit;
        $this->load->library('image_lib', $configc); 

        if(!$this->image_lib->crop())
        {
            echo $this->image_lib->display_errors();
            exit;
        }  
         redirect('job_seeker/seeker_info');
        
       
     }
     public function change_password()
            {

                if ($_POST) {
                    $jobseeker_id  = $this->session->userdata('job_seeker_id');
                    $oldpassword = md5($this->input->post('oldpassword'));

                    $newpassword = array('password' => md5($this->input->post('newpassword')),);
                    $data = $this->Job_seeker_model->change_password($jobseeker_id, $oldpassword);

                    if ($data == true) {

                        if ($jobseeker_id) {
                            $this->Job_seeker_model->update($newpassword, $jobseeker_id);
                            $this->session->set_flashdata('change_password',
                                '<span class="label label-info">Sucessfully Password Changed!</span>');
                            redirect('job_seeker/change_password');
                        }

                    } else {
                        $this->session->set_flashdata('change_password',
                            '<span class="label label-info">Your Old Password Not Found</span>');
                        redirect('job_seeker/change_password');
                    }
                } else {
                    $this->load->view('fontend/jobseeker/change_password');
                }
            }

    
    public function delete_experience($id)
    {
        $this->Job_seeker_experience_model->delete($id);
        redirect('job_seeker/seeker_info');
    }

    public function update_sepcialization()
    {

        if ($_POST) {
            $js_specializations_id = $this->input->post('js_specializations_id');
            $jobseeker_id          = $this->session->userdata('job_seeker_id');
            $specializations       = array(
                'job_seeker_id'  => $jobseeker_id,
                'specialization' => $this->input->post('specialization'),
                'skills'         => $this->input->post('skills'),
            );
            $this->Job_specialization_model->update($specializations, $js_specializations_id);
            redirect('job_seeker/update_sepcialization');
        } else {
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
            $specializations = $this->Job_specialization_model->specialization_by_seeker($jobseeker_id);
            $all_language    = $this->Job_language_model->language_list_by_id($jobseeker_id);

            $this->load->view('fontend/jobseeker/update_sepcialization', compact('specializations', 'all_language'));
        }
    }

    public function save_language()
    {
        if ($_POST) {
            $jobseeker_id   = $this->session->userdata('job_seeker_id');
            $js_language_id = $this->input->post('js_language_id');
            $language       = array(
                'job_seeker_id' => $jobseeker_id,
                'language'      => $this->input->post('language'),
                'reading'       => $this->input->post('reading'),
                'writing'       => $this->input->post('writing'),
                'speaking'      => $this->input->post('speaking'),
            );
            if (empty($js_language_id)) {
                $this->Job_language_model->insert($language);
                redirect('job_seeker/update_sepcialization');
            } else {
                $this->Job_language_model->update($language, $js_language_id);
                redirect('job_seeker/update_sepcialization');
            }
        } else {
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
            $specializations = $this->Job_specialization_model->specialization_by_seeker($jobseeker_id);
            $all_language    = $this->Job_language_model->language_list_by_id($jobseeker_id);

            $this->load->view('fontend/jobseeker/update_sepcialization', compact('specializations', 'all_language'));
        }
    }

    public function delete_language($id)
    {
        $this->Job_language_model->delete($id);
        redirect('job_seeker/update_sepcialization');
    }

     public function delete_career($job_seeker_id)
    {
       $this->Job_career_model->delete_career($job_seeker_id);
        redirect('job_seeker/seeker_info');
    }


    public function update_career()
    {
        if ($_POST) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $js_career_id = $this->input->post('js_career_id');
            $js_skills = $this->input->post('skills');

            $career_info  = array(
                'job_seeker_id'        => $jobseeker_id,
                'js_career_sum'        => $this->input->post('js_career_sum'),
                'field_sepicalization' => $this->input->post('field_sepicalization'),
                'extracurricular'      => $this->input->post('extracurricular'),
                'js_career_salary'     => $this->input->post('js_career_salary'),
                'avaliable'            => $this->input->post('avaliable'),
                'skills'               => $this->input->post('skills'),
                'job_area'             => $this->input->post('job_area'),
                'js_career_exp'        => $this->input->post('js_career_exp'),
            );
            
            if (empty($js_career_id)) {
                $ins_id = $this->Job_career_model->insert($career_info);
               
                redirect('job_seeker/seeker_info');
            } else {
            	$this->Job_career_model->update($career_info, $js_career_id);
            }
            
            $where_del = "job_seeker_id='$jobseeker_id'";
            $del = $this->Master_model->master_delete('job_seeker_skills',$where_del);
            if($del==true)
            {
                if(!empty($js_skills)) {
                $skill = explode(',', $js_skills);

                for($k=0; $k<sizeof($skill); $k++)
                    {
                        $skill_array= array(
                            'job_seeker_id' => $jobseeker_id,
                            'skills'        => $skill[$k],
                            'created_by'    => $jobseeker_id,
                            'created_on'    => date('Y-m-d H:i:s'),
                        );
                        $this->Master_model->master_insert($skill_array,'job_seeker_skills');
                    }
                }
                   
            }
     
            redirect('job_seeker/seeker_info');
        } else {
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
            $job_career_info = $this->Job_career_model->js_careerinfo_by_seeker($jobseeker_id);
            $this->load->view('fontend/jobseeker/update_career', compact('job_career_info'));
        }
    }

    public function update_reference()
    {

        if ($_POST) {
            $jobseeker_id      = $this->session->userdata('job_seeker_id');
            $reference_info_id = $this->input->post('reference_info_id');
            $reference_info    = array(
                'job_seeker_id' => $jobseeker_id,
                'name'          => $this->input->post('name'),
                'company_profile_id'      => $this->input->post('company_profile_id'),
                'designation_id'   => $this->input->post('designation_id'),
                'email'         => $this->input->post('email'),
				'country_code'         => $this->input->post('country_code'),
                'mobile'        => $this->input->post('mobile'),
                'relation'      => $this->input->post('relation'),
            );
            if (empty($reference_info_id)) {
                $this->Job_reference_model->insert($reference_info);
                redirect('job_seeker/seeker_info');
            } else {
                $this->Job_reference_model->update($reference_info, $reference_info_id);
                redirect('job_seeker/seeker_info');
            }
        } else {
            $jobseeker_id   = $this->session->userdata('job_seeker_id');
            $reference_list = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
			$designation = $this->Master_model->getMaster('designation',$where=false);
			//$company_profile = $this->Master_model->getMaster('company_profile',$where=false);
			
           echo $this->load->view('fontend/jobseeker/update_reference', compact('reference_list', 'designation'),true);
        }
    }

    public function delete_reference($id)
    {
        $this->Job_reference_model->delete($id);
        redirect('job_seeker/seeker_info');
    }

    public function update_training()
    {
        if ($_POST) {
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
            $job_training_id = $this->input->post('job_training_id');
            $training_info   = array(
                'job_seeker_id'  => $jobseeker_id,
                'training_title' => $this->input->post('training_title'),
                'training_topic' => $this->input->post('training_topic'),
                'institute'      => $this->input->post('institute'),
                'country_id'        => $this->input->post('country_id'),
                'state_id'       => $this->input->post('state_id'),
				'city_id'       => $this->input->post('city_id'),
                'duration'       => $this->input->post('duration'),
                'training_year'       => $this->input->post('training_year'),
            );
            if (empty($job_training_id)) {
                $this->Job_training_model->insert($training_info);
                redirect('job_seeker/seeker_info');
            } else {
                $this->Job_training_model->update($training_info, $job_training_id);
                redirect('job_seeker/seeker_info');
            }
        } else {
            $jobseeker_id  = $this->session->userdata('job_seeker_id');
            $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
			$passingyear = $this->Master_model->getMaster('passingyear',$where=false);
			$city = $this->Master_model->getMaster('city',$where=false);
			$country = $this->Master_model->getMaster('country',$where=false);
			$state = $this->Master_model->getMaster('state',$where=false);
            echo $this->load->view('fontend/jobseeker/update_training', compact('training_list', 'passingyear', 'country', 'state', 'city'),true);
        }
    }

    public function delete_training($id)
    {
        $this->Job_training_model->delete($id);
        redirect('job_seeker/seeker_info');
    }

    public function view_resume()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $resume          = $this->Job_seeker_model->resume_view_by_id($jobseeker_id);
        $edcuaiton_list  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        $training_list   = $this->Job_training_model->training_list_by_id($jobseeker_id);
        $reference_list  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
		$js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
		$job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
		$city = $this->Master_model->getMaster('city',$where=false);
		$country = $this->Master_model->getMaster('country',$where=false);
		$state = $this->Master_model->getMaster('state',$where=false);
        //echo $this->db->last_query();
		$this->load->view('fontend/jobseeker/view_resume', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'js_personal_info', 'job_seeker_photo', 'country', 'state', 'city'));
    
	}

    public function my_application()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $applicationlist = $this->job_apply_model->seeker_all_application($jobseeker_id);
        $forward_applicationlist = $this->job_apply_model->seeker_all_application_send($jobseeker_id);
        
        $this->load->view('fontend/jobseeker/onlineapplication', compact('applicationlist', 'forward_applicationlist'));
    }

    public function logout()
    {
        $LogOutDateTime = date('Y-m-d H:i:s');
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
      
        $where_sek = "job_seeker_id='$jobseeker_id' ORDER BY id DESC";
        $results = $this->Master_model->get_master_row("js_login_logs", $select ='id', $where_sek, $join = false);
    
        $id = $results['id'];

        $logs = array(
            'logout'     =>$LogOutDateTime,
        );

        $where_update['id'] = $id;
        $this->Master_model->master_update($logs, 'js_login_logs', $where_update);

        $this->session->sess_destroy();
        redirect('register/jobseeker_login');
    }
        
    public function downloadcv()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $resume          = $this->Job_seeker_model->resume_view_by_id($jobseeker_id);
        $edcuaiton_list  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        $training_list   = $this->Job_training_model->training_list_by_id($jobseeker_id);
        $reference_list  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
		$js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
		$job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
		$city = $this->Master_model->getMaster('city',$where=false);
		$country = $this->Master_model->getMaster('country',$where=false);
		$state = $this->Master_model->getMaster('state',$where=false);
		//echo $this->db->last_query();
        $this->load->view('fontend/downloadcv', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'language_list', 'js_personal_info', 'job_seeker_photo', 'country', 'state', 'city'));
    }

     public function downloadcvone()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $resume          = $this->Job_seeker_model->resume_view_by_id($jobseeker_id);
        $edcuaiton_list  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        $training_list   = $this->Job_training_model->training_list_by_id($jobseeker_id);
        $reference_list  = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
        $this->load->view('fontend/downloadcv_one', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'language_list'));
    }
    
    public function deletecv()
    {
    	$jobseeker_id    = $this->session->userdata('job_seeker_id');
        $this->Job_seeker_education_model->delete_cv($jobseeker_id);
        redirect('job_seeker/seeker_info');
    }
		
    public function upload_resume()
    {
        $jobseeker_id     = $this->session->userdata('job_seeker_id');
        $job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
        $this->load->view('fontend/jobseeker/upload_resume.php', compact('job_seeker_photo'));
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

  function getEducation_specialization(){
        $level_id = $this->input->post('id');
        $where['edu_level_id'] = $level_id;
        $special = $this->Master_model->getMaster('education_specialization',$where);
        //$result = '';
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


// to get companies
    function get_autocomplete(){
        if (isset($_GET['term'])) {

            $result = $this->Job_seeker_experience_model->search_country($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->company_name;
                echo json_encode($arr_result);
            }
        }
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

    



function getspecilization(){
	$specilization_id = $this->input->post('id');
	$where['education_level_id'] = $specilization_id;
	$specialization = $this->Master_model->getMaster('education_specialization',$where);
	
	
	$result = '';
	if(!empty($specialization)){ 
		$result .='<option value="">Select Specilazation</option>';
		foreach($specialization as $key){
		  $result .='<option value="'.$key['id'].'">'.$key['education_specialization'].'</option>';
		}
	}else{
	
		$result .='<option value="">Specilazation not available</option>';
	}
	 echo $result;
}


} //end function



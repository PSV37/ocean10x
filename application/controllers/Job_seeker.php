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
            $language = $this->input->post('language');
            $proficiency = $this->input->post('proficiency');
            $lang_write = $this->input->post('lang_write');
            $lang_speak = $this->input->post('lang_speak');
            $lang_read = $this->input->post('lang_read');
            
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
				'pincode'           => $this->input->post('pincode'),
                'present_address'   => $this->input->post('present_address'),
				'country1_id'       => $this->input->post('country1_id'),
				'state1_id'         => $this->input->post('state1_id'),
				'city1_id'          => $this->input->post('city1_id'),
				'pincode1'          => $this->input->post('pincode1'),
                'parmanent_address' => $this->input->post('parmanent_address'),

                'marital_status'          => $this->input->post('matrial_status'),
                'work_permit_usa'          => $this->input->post('work_permit_usa'),
                'work_permit_countries' => $this->input->post('other_country_work_permit'),
                
            );
            if (empty($personal_info_id)) {
                $ins = $this->job_seeker_personal_model->insert($personal_info);
                $in_arr= array(
                    'mobile_no'            => $this->input->post('mobile')
                );
                $where_update['job_seeker_id']=$jobseeker_id;
                $this->Master_model->master_update($in_arr,'js_info',$where_update);

                $where_del = "job_seeker_id='$jobseeker_id'";
                $del = $this->Master_model->master_delete('js_languages',$where_del);
                if($del==true)
                {
                    for($l=0;$l<sizeof($language);$l++)
                    {
                        if($language[$l]!=''){
                           
                            $lang_array = array(
                                'job_seeker_id'  => $jobseeker_id,
                                'language'       => $language[$l],
                                'proficiency'    => $proficiency[$l],
                                'lang_write'     => $lang_write[$l],
                                'lang_speak'     => $lang_speak[$l],
                                'lang_read'      => $lang_read[$l],
                                
                            );
                            $last_id = $this->Master_model->master_insert($lang_array, 'js_languages');
                        }
                    }
                }
                redirect('job_seeker/seeker_info',$data);
            } else {
                $this->job_seeker_personal_model->update($personal_info, $personal_info_id);
                $in_arr= array(
                    'mobile_no'            => $this->input->post('mobile')
                );
                $where_update['job_seeker_id']=$jobseeker_id;
                $this->Master_model->master_update($in_arr,'js_info',$where_update);
               
                $where_del = "job_seeker_id='$jobseeker_id'";
                $del = $this->Master_model->master_delete('js_languages',$where_del);
                if($del==true)
                {
                    for($l=0;$l<sizeof($language);$l++)
                    {
                        if($language[$l]!=''){
                           
                            $lang_array = array(
                                'job_seeker_id'  => $jobseeker_id,
                                'language'       => $language[$l],
                                'proficiency'    => $proficiency[$l],
                                'lang_write'     => $lang_write[$l],
                                'lang_speak'     => $lang_speak[$l],
                                'lang_read'      => $lang_read[$l],
                                
                            );
                            $last_id = $this->Master_model->master_insert($lang_array, 'js_languages');
                        }
                    }
                }
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
            $where_lang="job_seeker_id='$jobseeker_id' ORDER BY language ASC";
            $languages = $this->Master_model->getMaster('js_languages',$where_lang);
			//echo $this->db->last_query();
            echo $this->load->view('fontend/jobseeker/update_personalinfo', compact('jobseeker_id', 'js_personal_info', 'job_seeker_photo', 'name', 'city', 'country', 'state', 'results','languages'),true);
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
                'job_seeker_id'         => $jobseeker_id,
                'education_level_id'    => $this->input->post('education_level_id'),
                'specialization_id'     => $this->input->post('specialization_id'),
				'js_institute_name'     => $this->input->post('js_institute_name'),
				'education_type_id'     => $this->input->post('education_type_id'),
				'js_year_of_passing'    => $this->input->post('js_year_of_passing'),
				'gradding'              => $this->input->post('gradding'),
				'js_resut'              => $this->input->post('js_resut'),
				'board_id'              => $this->input->post('board_id'),
				'totalmarks_id'         => $this->input->post('totalmarks_id'),
				'schoolmedium_id'       => $this->input->post('schoolmedium_id'),
				            
                
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
			$schoolmedium = $this->Master_model->getMaster('schoolmedium',$where=false);
			$passingyear = $this->Master_model->getMaster('passingyear',$where=false);
			$totalmarks = $this->Master_model->getMaster('totalmarks',$where=false);
			$education_level = $this->Master_model->getMaster('education_level',$where=false);
			$education_specialization = $this->Master_model->getMaster('education_specialization',$where=false);
           echo $this->load->view('fontend/jobseeker/update_education.php', compact('edcuaiton_list', 'schoolboard', 'course', 'schoolmedium', 'passingyear', 'totalmarks', 'education_level', 'education_specialization'),true);
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
               // 'job_level'        => $this->input->post('job_level'),
                'dept_id'       => $this->input->post('dept_id'),
                'start_date'       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('start_date')))),
                'end_date'         => (empty($enddate)) ? null : date('Y-m-d', strtotime(str_replace('/', '-', $enddate))),
                'address'          => $this->input->post('address'),
				'js_career_salary'          => $this->input->post('js_career_salary'),
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

            $career_info  = array(
                'job_seeker_id'        => $jobseeker_id,
				'industry_id'        => $this->input->post('industry_id'),
				'dept_id'        => $this->input->post('dept_id'),
				'job_role'        => $this->input->post('job_role'),
				'avaliable'        => $this->input->post('avaliable'),
				'shift_id'        => $this->input->post('shift_id'),
				'js_career_salary'        => $this->input->post('js_career_salary'),
				'job_area'        => $this->input->post('job_area'),
				
            );
            
            if (empty($js_career_id)) {
                $ins_id = $this->Job_career_model->insert($career_info);
               
                redirect('job_seeker/seeker_info');
            } else {
            	$this->Job_career_model->update($career_info, $js_career_id);
            }
			redirect('job_seeker/seeker_info');
        } else {
            $jobseeker_id    = $this->session->userdata('job_seeker_id');
            $job_career_info = $this->Job_career_model->js_careerinfo_by_seeker($jobseeker_id);
			$employe_jobtype = $this->Master_model->getMaster('employe_jobtype',$where=false);
			$industry_master = $this->Master_model->getMaster('industry_master',$where=false);
			$shift = $this->Master_model->getMaster('shift',$where=false);
			$department = $this->Master_model->getMaster('department',$where=false);
			$job_role = $this->Master_model->getMaster('job_role',$where=false);
			$where_sek['job_seeker_id'] = $jobseeker_id;
			$join1 = array(
				'industry_master' => 'industry_master.id = js_career_info.industry_id|INNER',
				'department' => 'department.dept_id = js_career_info.dept_id|INNER',
				'job_role' => 'job_role.id = js_career_info.job_role|INNER',
				'shift' => 'shift.shift_id = js_career_info.shift_id|INNER',
			);
			
			$results = $this->Master_model->get_master_row("js_career_info", $select = false, $where_sek, $join1);
			//echo $this->db->last_query();
			//print_r($results);die();
			
            $this->load->view('fontend/jobseeker/update_career', compact('job_career_info','employe_jobtype', 'industry_master', 'shift', 'department', 'job_role', 'results'));
        }
    }
	
	
	
	
	
	
	public function update_skills()
    {
        if ($_POST) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $js_skills = $this->input->post('skills');
			
            $career_info  = array(
				'skills'               => $this->input->post('skills'),
                
            );
            
           
            
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
           // $job_career_info = $this->Job_career_model->js_careerinfo_by_seeker($jobseeker_id);
			//$worktill = $this->Master_model->getMaster('worktill',$where=false);
			$where_skill['job_seeker_id']=$jobseeker_id;
			$js_skills = $this->Master_model->getMaster('job_seeker_skills',$where_skill);
            $this->load->view('fontend/jobseeker/update_skills', compact('js_skills'));
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
        // $job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
        $job_seeker_resume = $this->Master_model->get_master_row('js_attached_resumes', $select =FALSE ,$where="job_seeker_id='$jobseeker_id'",$join = false); 
        // echo $this->db->last_query();
        $this->load->view('fontend/jobseeker/upload_resume.php', compact('job_seeker_resume'));
    }

    
    public function save_attached_resume()
    {
        $jobseeker_id     = $this->session->userdata('job_seeker_id');
        if ($_POST) {

            $NewFileName;
            if($_FILES['txt_resume']['name']!='')
            {
                $this->load->helper('string'); 
                $NewFileName = $_FILES['txt_resume']['name']; 
                
                $config['upload_path'] = './upload/Resumes/';
                $config['allowed_types'] = 'doc|docx|rtf|pdf';
                // $config['max_size']    = '2000000';
                //$config['encrypt_name']  = true;
                $config['max_size']      = 2000000; //2 mb
                $config['file_name'] = $NewFileName;
            
                 $this->load->library('upload', $config);      
                 $field_name = "txt_resume";
                 if (! $this->upload->do_upload($field_name))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">'.$this->upload->display_errors().'</div>');
                        redirect('job_seeker/seeker_info');
                    }
                    else {}
                }//END of file checking if loop
                else
                    {     
                      $NewFileName = $this->input->post('oldresume'); 
                    }
                $res = $this->input->post('resume_id');
               
                if($res)
                {
                    $data['job_seeker_id']  = $jobseeker_id;
                    $data['resume']         = $NewFileName;
                    $data['updated_by']     = $jobseeker_id;
                    $data['updated_on']     = date('Y-m-d H:i:s');

                    $where_cans['id']=$res;
                    $this->Master_model->master_update($data,'js_attached_resumes',$where_cans);
                    redirect('job_seeker/seeker_info');
                }else{
                    $data['job_seeker_id']  = $jobseeker_id;
                    $data['resume']         = $NewFileName;
                    $data['created_by']     = $jobseeker_id;
                    $data['created_on']     = date('Y-m-d H:i:s');
                    $this->Master_model->master_insert($data,'js_attached_resumes');
                    redirect('job_seeker/seeker_info');
                }
            }else{
                $job_seeker_resume = $this->Master_model->get_master_row('js_attached_resumes',$select =FALSE ,$where="job_seeker_id='$jobseeker_id'",$join = false);
                $this->load->view('fontend/jobseeker/upload_resume.php', compact('job_seeker_resume'));
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

            $result = $this->Job_seeker_experience_model->search_companies($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->company_name;
                echo json_encode($arr_result);
            }
        }
    }

    function get_country_autocomplete(){
        if (isset($_GET['term'])) {

            $result = $this->Job_seeker_experience_model->search_country($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->country_name;
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
    	$education_id = $this->input->post('id');
    	$where['edu_level_id'] = $education_id;
    	$specialization = $this->Master_model->getMaster('education_specialization',$where);
    	
    	$result = '';
    	if(!empty($specialization)){ 
    		//$result .='<option value="">Select Specilazation</option>';
    		foreach($specialization as $key){
    		  $result .='<option value="'.$key['id'].'">'.$key['education_specialization'].'</option>';
    		}
    	}else{
    	
    		$result .='<option value="">Specilazation not available</option>';
    	}
    	echo $result;
    }


public function search(){
 
        $term = $this->input->get('term');
 
        $this->db->like('city_name', $term);
 
        $data = $this->db->get("city")->result();
 
        echo json_encode( $data);
    }
    // search city 
  function search_city(){
        if (isset($_GET['term'])) {

            $result = $this->Job_seeker_experience_model->search_city($_GET['term']);
            // $where_city = "city_name like '$term' ORDER BY city_name ASC"; 
            // $select_city = "city_name";
            // $result = $this->Master_model->getMaster('city',$where_city,$join = FALSE, $order = false, $field = false, $select_city,$limit=false,$start=false, $search=false);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->city_name;
                echo json_encode($arr_result);
            }
        }
    }


} //end function



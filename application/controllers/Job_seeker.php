<?php
 ini_set('file_uploads ', 'on');
 ini_set('post_max_size  ', '100M');
 ini_set('upload_max_filesize  ', '100M');
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


    
    public function my_dashboard()
    {
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'dashboard';
         $this->session->set_userdata($data);

        $jobseeker_id = $this->session->userdata('job_seeker_id');
        $where_int="job_seeker_id='$jobseeker_id'";
        $data['intro_data'] = $this->Master_model->get_master_row("js_info", $select= FALSE, $where_int, $join = FALSE);
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        $job_career_info = $this->Job_career_model->js_careerinfo_by_seeker($jobseeker_id);

         $data['job_seeker_resume'] = $this->Master_model->get_master_row('js_attached_resumes',$select =FALSE ,$where="job_seeker_id='$jobseeker_id'",$join = false);

        // foreach ($experinece_list as $row) {
        //     $joblevel=$row->job_level;
        // }
        // foreach ($job_career_info as $row) {
        //     $category=$row->industry_id;
        // }
        $today=date('Y-m-d');
        $days_ago = date('Y-m-d', strtotime('-2 days', strtotime($today)));
        $forward_applicationlist = $this->job_apply_model->seeker_2days_application_send($jobseeker_id,$days_ago);
            if (!empty($forward_applicationlist)) {

               $data['job_alert']=sizeof($forward_applicationlist);
                $data['jobs']= $forward_applicationlist;
            }
            else
            {
              $recent_all_jobs= $this->job_posting_model->recent_all_jobs();
               $data['job_alert']=sizeof($recent_all_jobs);
                $data['jobs']= $recent_all_jobs;
            }

        $where_edu="js_saved_jobs.job_seeker_id='$jobseeker_id'";
        $join_save = array(
            'job_posting' => 'job_posting.job_post_id=js_saved_jobs.job_post_id | LFET OUTER',
                        );
           
            $select_edu = "job_posting.job_title,job_posting.job_slugs,job_posting.job_position,job_posting.company_profile_id,js_saved_jobs.created_on,js_saved_jobs.job_post_id,js_saved_jobs.job_seeker_id,js_saved_jobs.id,job_posting.city_id";
            $saved_job_data = $this->Master_model->getMaster("js_saved_jobs", $where_edu, $join_save, $order = false, $field = false, $select_edu,$limit=false,$start=false, $search=false);

        $forward_applicationlist = $this->job_apply_model->seeker_all_application_send($jobseeker_id);


        $data['saved_jobs']=sizeof($saved_job_data);

        $Join_data      = array('messaging' => 'messaging.connection_id = emp_js_connection.emp_js_connection_id|Left OUTER ');

        $whereres   = "js_id='$jobseeker_id' or emp_id = '$jobseeker_id'";
        $whereres   .= "group by emp_js_connection.emp_js_connection_id";

        $data['chatbox'] = $this->Master_model->getMaster('emp_js_connection', $where =  $whereres, $join = $Join_data, $order = 'desc', $field = 'max', $select = ' messaging.*, MAX( messaging.message_id) as max,emp_js_connection.*',$limit=false,$start=false, $search=false);
        
        // print_r($this->db->last_query());die();
        $this->load->view('fontend/jobseeker/dashboard_new',$data);
    }
	
	public function seeker_info()
    {

        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'seeker_info';
         $this->session->set_userdata($data);

          $this->session->unset_userdata('activetab');
        $data['activetab'] = 'update_personalinfo';
         $this->session->set_userdata($data);
            $jobseeker_id = $this->session->userdata('job_seeker_id');

        $data['job_seeker_resume'] = $this->Master_model->get_master_row('js_attached_resumes', $select =FALSE ,$where="job_seeker_id='$jobseeker_id'",$join = false); 


     

			$data['city'] = $this->Master_model->getMaster('city',$where=false);
            $data['country'] = $this->Master_model->getMaster('country',$where=false);
            $data['state'] = $this->Master_model->getMaster('state',$where=false);
            $data['jobseeker_id']     = $this->session->userdata('job_seeker_id');
            $data['js_personal_info'] = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
            // $data['job_seeker_photo'] = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);

            // $where['edu_level_id'] = '1';
            // $data['phdspecial'] = $this->Master_model->getMaster('education_specialization',$where);

            // $where['edu_level_id'] = '2';
            // $data['pgdspecial'] = $this->Master_model->getMaster('education_specialization',$where);

            // $where['edu_level_id'] = '3';
            // $data['gddspecial'] = $this->Master_model->getMaster('education_specialization',$where);
            $data['course'] = $this->Master_model->getMaster('course',$where=false);
            $data['schoolboard'] = $this->Master_model->getMaster('schoolboard',$where=false);
            $data['schoolmedium'] = $this->Master_model->getMaster('schoolmedium',$where=false);
            

           

            $data['edcuaiton_list']  = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
        $this->load->view('fontend/jobseeker/jobseeker_profile',$data);
    }
	

	
    public function update_personalinfo()
    {

        if ($_POST) {

             $this->session->unset_userdata('activetab');
        $data['activetab'] = 'update_personalinfo';
         $this->session->set_userdata($data); 

            $jobseeker_id     = $this->session->userdata('job_seeker_id');
            $personal_info_id = $this->input->post('js_personal_info_id');
           
               

            
            $personal_info    = array(
                'job_seeker_id'     => $jobseeker_id,
                // 'father_name'       => $this->input->post('father_name'),
                // 'mother_name'       => $this->input->post('mother_name'),
                "date_of_birth"     => date('Y-m-d', strtotime($this->input->post('dob'))),
                'dob_visiblity'       => $this->input->post('dobmake_public'),
               // 'national_id'       => $this->input->post('national_id'),
				'country_code'      => $this->input->post('country_code'),
                'mobile'            => $this->input->post('mobile'),
				'alternatecountry_code'      => $this->input->post('alternatecountry_code'),
                'alternatemobile'            => $this->input->post('alternatemobile'),
				'country_id'        => $this->input->post('country_id'),
				'state_id'          => $this->input->post('state_id'),
				'city_id'           => $this->input->post('city_id'),
				'pincode'           => $this->input->post('pincode'),
                'present_address'   => addslashes($this->input->post('present_address')),
				// 'country1_id'       => $this->input->post('country1_id'),
				// 'state1_id'         => $this->input->post('state1_id'),
				// 'city1_id'          => $this->input->post('city1_id'),
				// 'pincode1'          => $this->input->post('pincode1'),
                // 'update_at' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),
                'resume_title'              => addslashes($this->input->post('tagline')),
                'marital_status'            => $this->input->post('matrial_status'),
                'work_permit_usa'           => $this->input->post('work_permit_usa'),
                'work_permit_countries'     => $this->input->post('other_country_work_permit'),
                'website'                   => addslashes($this->input->post('website')),
                
                
                
            );
            if (empty($personal_info_id)) {
                $ins = $this->job_seeker_personal_model->insert($personal_info);
                $in_arr= array(
                    'mobile_no'            => $this->input->post('mobile'),
                    'full_name'            => $this->input->post('full_name')
                );
                $where_update['job_seeker_id']=$jobseeker_id;
                $this->Master_model->master_update($in_arr,'js_info',$where_update);

                
                redirect('job_seeker/seeker_info',$data);
            } else {
                $this->job_seeker_personal_model->update($personal_info, $personal_info_id);
                $in_arr= array(
                    'mobile_no'            => $this->input->post('mobile'),
                    'full_name'            => $this->input->post('full_name')
                );
                $where_update['job_seeker_id']=$jobseeker_id;
                $this->Master_model->master_update($in_arr,'js_info',$where_update);
               
               
                redirect('job_seeker/seeker_info',$data);
            }
        } else {
            $jobseeker_id     = $this->session->userdata('job_seeker_id');
            $js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
			$job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($jobseeker_id);
			$name = $this->Job_seeker_model->get_jobseeker_fullname($jobseeker_id);
			$city = $this->Master_model->getMaster('city',$where=false);
			$country = $this->Master_model->getMaster('country',$where=false);
			$state = $this->Master_model->getMaster('state',$where=false);

            $where_int="job_seeker_id='$jobseeker_id'";
            $intro_data = $this->Master_model->get_master_row("js_info", $select= FALSE, $where_int, $join = FALSE);
            $where_lang="job_seeker_id='$jobseeker_id' ORDER BY language ASC";
            $languages = $this->Master_model->getMaster('js_languages',$where_lang);
			//echo $this->db->last_query();
            // echo $this->load->view('fontend/jobseeker/update_personalinfo', compact('jobseeker_id', 'js_personal_info', 'job_seeker_photo', 'name', 'city', 'country', 'state','languages','intro_data'),true);
             echo $this->load->view('fontend/jobseeker/jobseeker_profile', compact('jobseeker_id', 'js_personal_info', 'job_seeker_photo', 'name', 'city', 'country', 'state','languages','intro_data'),true);
        }
    }

    public function add_language()
    {

            $jobseeker_id     = $this->session->userdata('job_seeker_id');

         $language = $this->input->post('language');
            $proficiency = $this->input->post('proficiency');
            $lang_write = $this->input->post('lang_write');
            $lang_speak = $this->input->post('lang_speak');
            $lang_read = $this->input->post('lang_read');
           
             $lang_array = array(
                                'job_seeker_id'  => $jobseeker_id,
                                'language'       => $language,
                                'proficiency'    => $proficiency,
                                'lang_write'     => $lang_write,
                                'lang_speak'     => $lang_speak,
                                'lang_read'      => $lang_read,
                                
                            );
              $language_id=$this->input->post('lang_id');
         if (isset($language_id) && ! empty($language_id)) {
             $where_update['id']=$language_id;
                $this->Master_model->master_update($lang_array,'js_languages',$where_update);
         }else{
    $last_id = $this->Master_model->master_insert($lang_array, 'js_languages');
}
    redirect('job_seeker/seeker_info');
}
 function edit_language()
{
    // $lang_id=$this->input->post('language_id');
    // $where_lang="id='$lang_id'";
    // $language_data = $this->Master_model->get_master_row("js_languages", $select= FALSE, $where_lang, $join = FALSE);
    // echo json_encode($language_data);
    $id=$this->input->post('language_id');
    // $data = $this->Admin_model->show_child_data($id);
    $data = $this->job_seeker_personal_model->show_language($id);
    echo json_encode($data); 

    // print_r($this->db->last_query());

}
     

    
    


    public function delete_mylanguage($id)
    {
        $where_del = "id='$id'";
        $del = $this->Master_model->master_delete('js_languages',$where_del);
        redirect('job_seeker/seeker_info');
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
				// 'gradding'              => $this->input->post('gradding'),
				'js_resut'              => round($this->input->post('js_resut')),
				'board_id'              => $this->input->post('board_id'),
				'totalmarks_id'         => round($this->input->post('totalmarks_id')),
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
			//$totalmarks = $this->Master_model->getMaster('totalmarks',$where=false);
			$education_level = $this->Master_model->getMaster('education_level',$where=false);
			$education_specialization = $this->Master_model->getMaster('education_specialization',$where=false);
           echo $this->load->view('fontend/jobseeker/update_education.php', compact('edcuaiton_list', 'schoolboard', 'course', 'schoolmedium', 'passingyear', 'totalmarks', 'education_level', 'education_specialization'),true);
        }
    }

    public function education_data()
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
       
        $edu_id= $this->input->post('edu_id');

        $where_edu="education_level_id='$edu_id'";
        $select_edu = "education_level_name,education_level_id";
        $data['education_level'] = $this->Master_model->get_master_row("education_level", $select_edu, $where_edu, $join = FALSE);

        $where_edu_spec="edu_level_id='$edu_id'";
        $select_edu_spec = "education_specialization,id";
        $data['education_specialization'] = $this->Master_model->getMaster('education_specialization',$where_edu_spec,$join = FALSE, $order = false, $field = false, $select_edu_spec,$limit=false,$start=false, $search=false);

        $data['schoolboard'] = $this->Master_model->getMaster('schoolboard',$where=false);
        $data['course'] = $this->Master_model->getMaster('course',$where=false);
        $data['schoolmedium'] = $this->Master_model->getMaster('schoolmedium',$where=false);
       // $data['passingyear'] = $this->Master_model->getMaster('passingyear',$where=false);
        $data['totalmarks'] = $this->Master_model->getMaster('totalmarks',$where=false);


        $edit_edu_id= $this->input->post('edit_edu_id');
        $where_ress = "js_education.js_education_id='$edit_edu_id'";
        $data['edit_edu_res'] = $this->Master_model->get_master_row('js_education', $select=false, $where_ress, $join = FALSE);
               // echo $this->db->last_query(); die;
        $this->load->view('fontend/jobseeker/education_form',$data);
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
                // 'major_activity'   => $this->input->post('major_activity'),
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
              $jobtype = $this->input->post('avaliable'); //JOB TYPE
              $job_type = implode(', ', $jobtype);
              
            $avail_to_join = $this->input->post('avail_to_join');
            $join_immediate = $this->input->post('join_immediate');
               if(isset($join_immediate))
               {
                   $available = 'Yes';
               }else{
                    $available = 'No';
               }
              
              $srving = $this->input->post('Serving_notice_period');
              if(isset($srving))
               {
                   $srving_notice = 'Yes';
               }else{
                    $srving_notice = 'No';
               }

            $career_info  = array(
                'job_seeker_id'         => $jobseeker_id,
				'industry_id'           => $this->input->post('industry_id'),
				'dept_id'               => $this->input->post('dept_id'),
				'job_role'              => $this->input->post('job_role'),
				'avaliable'             => $job_type,
				'shift_id'              => $this->input->post('shift_id'),
                'salary_type'           => $this->input->post('salary_type'),
				'js_career_salary'      => $this->input->post('js_career_salary'),
				'job_area'              => $this->input->post('job_area'),
                'desired_industry'      => $this->input->post('desired_industry'),
			    'immediate_join'        => $available,
                'availability_date'     => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('avail_to_join')))),
                'last_salary_hike'      => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('last_salary_hike')))),
                'notice_period'         => $this->input->post('Notice_period'),
                'serving_notice_period' => $srving_notice,
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
			$industry_master = $this->Master_model->getMaster('job_category',$where=false);
			$shift = $this->Master_model->getMaster('shift',$where=false);
			$department = $this->Master_model->getMaster('department',$where=false);
			$job_role = $this->Master_model->getMaster('job_role',$where=false);
            $months = $this->Master_model->getMaster('worktill',$where=false);
            
			$where_sek['job_seeker_id'] = $jobseeker_id;
			$join1 = array(
				'job_category' => 'job_category.job_category_id = js_career_info.industry_id|LFET OUTER',
				'department' => 'department.dept_id = js_career_info.dept_id|LFET OUTER',
				'job_role' => 'job_role.id = js_career_info.job_role|LFET OUTER',
				'shift' => 'shift.shift_id = js_career_info.shift_id|LFET OUTER',
			);
			
			$results = $this->Master_model->get_master_row("js_career_info", $select = false, $where_sek, $join1);
			//echo $this->db->last_query();
			//print_r($results);die();
			
            $this->load->view('fontend/jobseeker/update_career', compact('job_career_info','employe_jobtype', 'industry_master', 'shift', 'department', 'job_role', 'results','months'));
        }
    }
	
	public function update_skills()
    {
        if ($_POST) {

            $this->session->unset_userdata('activetab');
        $data['activetab'] = 'update_skills';
         $this->session->set_userdata($data);

            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $js_skills = $this->input->post('skills');
			
            $career_info  = array(
				'skills' => $this->input->post('skills'),
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
                            'skills'        => trim($skill[$k]),
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
	
    public function oceanhunt_activities()
    {

        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'oceanhunt';
        $this->session->set_userdata($data);

        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $applicationlist = $this->job_apply_model->seeker_all_application($jobseeker_id);

        $forward_application = $this->job_apply_model->seeker_all_application_send($jobseeker_id);

         
        // $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "forwarded_tests.status != 'Test Completed' AND job_seeker_id = '$jobseeker_id'";

        $oceanchamp_tests = $this->Master_model->get_master_row('forwarded_tests', $select = FALSE, $where = $where_all, $join = FALSE);
        $config['base_url'] = base_url() . 'job_seeker/oceanhunt_activities';
            $config['total_rows'] = sizeof($forward_application);
            $config['per_page'] = 5;
            $config['attributes'] = array('class' => 'myclass');
            $config['page_query_string'] = TRUE;
            $config['num_links'] = 2;
            // $config['use_page_numbers'] = TRUE;
            $config['query_string_segment'] = 'page';
           
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = '<button>First Page</button>';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
            $config['last_link'] = '<button style="color:#FFF;background: #18c5bd;border: none;">Last Page</button>';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '<span style="margin-left:8px;"><button style="color:#FFF;background: #18c5bd;border: none;">Next Page</button></span>';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '<button style="color:#FFF;background: #18c5bd;border: none;">Prev Page</button>';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span style="margin-left:8px;">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span style="margin-left:8px;">';
            $config['num_tag_close'] = '</span>';
            $offset = 0;
            $page = $this->input->get('page');
            if ($page) {
                $offset = ($page - 1) * $config['per_page'];
            }
            $this->pagination->initialize($config);
             $links = $this->pagination->create_links();
            $forward_applicationlist = $this->job_apply_model->seeker_all_application_send($jobseeker_id,$config['per_page'],$page);
        // print_r($this->db->last_query());die;
        $this->load->view('fontend/jobseeker/oceanhunt', compact('forward_applicationlist','applicationlist' ,'oceanchamp_tests' ,'links'));
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
            $training_title = $this->input->post('training_title');
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
            $training   = array(
               
                'name' => $this->input->post('training_title'),
                'status' => '1',
                'created_on'      => date('Y-m-d H:i:s'),
                'created_by'        => $jobseeker_id
            );

            $where_name = "name='$training_title'";

            $exist_training=$this->Master_model->get_master_row('training', $select = FALSE, $where_name, $join = FALSE);
            if (empty($exist_training)) {
                $this->Master_model->master_insert($training,'training');
            }
             
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
			$training = $this->Master_model->getMaster('training',$where=false);
            echo $this->load->view('fontend/jobseeker/update_training', compact('training_list', 'passingyear', 'country', 'state', 'city' ,'training'),true);
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
       $final_result = $this->Master_model->getMaster('js_ocean_exam_topics',$where_req_skill,$join_r, $order = false, $field = false, $select, $limit=false, $start=false, $search=false);
		$this->load->view('fontend/jobseeker/view_resume', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'js_personal_info', 'job_seeker_photo', 'country', 'state', 'city','final_result'));
    
	}

    public function my_application()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $applicationlist = $this->job_apply_model->seeker_all_application($jobseeker_id);

        $this->load->view('fontend/jobseeker/onlineapplication', compact('applicationlist', 'forward_applicationlist'));
    }

    public function my_inbound_application()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $forward_applicationlist = $this->job_apply_model->seeker_all_application_send($jobseeker_id);
        
        $this->load->view('fontend/jobseeker/inbound_application', compact('forward_applicationlist'));
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

public function save_profile_details()
{
    $jobseeker_id     = $this->session->userdata('job_seeker_id');
   // echo $photo=$this->input->post('photo');die;
     if ($_POST) {
         // if($_FILES['txt_resume']['name']!='')
        // print_r($_FILES);die;
        
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
                 if (!$this->upload->do_upload($field_name))
                    {
                        $error = array('error' => $this->upload->display_errors());
            
// print_r($this->upload->display_errors()); die;
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
               // print_r($res); die;
                if($res)
                {
                    $data['job_seeker_id']  = $jobseeker_id;
                    $data['resume']         = $NewFileName;
                    $data['updated_by']     = $jobseeker_id;
                    $data['updated_on']     = date('Y-m-d H:i:s');

                    $where_cans['id']=$res;
                    $this->Master_model->master_update($data,'js_attached_resumes',$where_cans);
                    // redirect('job_seeker/seeker_info');
                }else{
                    $data['job_seeker_id']  = $jobseeker_id;
                    $data['resume']         = $NewFileName;
                    $data['created_by']     = $jobseeker_id;
                    $data['created_on']     = date('Y-m-d H:i:s');
                    $this->Master_model->master_insert($data,'js_attached_resumes');
                    // redirect('job_seeker/seeker_info');
                }
            $NewFileName;
            if($_FILES['txt_media']['name']!='')
            {
                $this->load->helper('string'); 
                $NewFileName = $_FILES['txt_media']['name']; 
                
                $config['upload_path'] = './upload/Media/';
                $config['allowed_types'] = 'doc|docx|rtf|pdf|gif|jpg|png|ppt|pps|pptx|ppsx|pot|potx';
                // $config['max_size']    = '2000000';
                //$config['encrypt_name']  = true;
                $config['max_size']      = 100000000; //100 mb
                $config['file_name'] = $NewFileName;
            
                 $this->load->library('upload', $config);      
                 $field_name = "txt_media";
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
                      $NewFileName = $this->input->post('oldmedia'); 
                    }


            $profile_data    = array(
                'job_seeker_id'     => $jobseeker_id,
                'uploded_media'     => $NewFileName,
                'about_me'          => addslashes($this->input->post('profile_summary')),
                'media_link'        => addslashes($this->input->post('txt_link')),
            );
            if (empty($profile_summary_id)) {
                $profile_data['created_on'] = date('Y-m-d H:i:s');
                $profile_data['created_by'] = $jobseeker_id;

               $this->Master_model->master_insert($profile_data,'js_profile_summary');
                // redirect('job_seeker/seeker_info');
            } else {
                $profile_data['updated_on'] = date('Y-m-d H:i:s');
                $profile_data['updated_by'] = $jobseeker_id;
                $where_cans['id']=$profile_summary_id;
                $this->Master_model->master_update($profile_data,'js_profile_summary',$where_cans);
                // redirect('job_seeker/seeker_info');
            }

            $id     = $this->session->userdata('job_seeker_id');

        $job_seeker_photo_row = $this->Job_seeker_photo_model->photo_by_seeker($id);
        $config['upload_path']   = 'upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name']  = true;
        // $config['max_size']      = 12000;
       /* $config['max_width']     = 310;
        $config['max_height']    = 310;*/

        $this->load->library('upload', $config);
         $field_name = "js_photo";
        if (!$this->upload->do_upload($field_name)) {
            // print_r($this->upload->display_errors()); die;
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
            // echo "success"; die;

            
            if (!$job_seeker_photo_row) {
                    $this->Job_seeker_photo_model->insert($job_seeker_photo);
            } else {
                $this->Job_seeker_photo_model->update_photo_new($job_seeker_photo, $id);
            }
            //echo $this->db->last_query(); die;
            // $this->save_cropped_photo($data->x,$data->y,$data->width,$data->height,$file_name);
           // redirect('job_seeker/seeker_info');
        }
            redirect('job_seeker/seeker_info');
            
      }
      else
      {
        redirect('job_seeker/seeker_info');
      }
      // seeker_info

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
        
    public function profile_summary($profile_summary_id=null)
    {
        $jobseeker_id     = $this->session->userdata('job_seeker_id');
       
         if ($_POST) {
            $jobseeker_id      = $this->session->userdata('job_seeker_id');
           // $profile_summary_id = $this->input->post('prof_id');

            $NewFileName;
            if($_FILES['txt_media']['name']!='')
            {
                $this->load->helper('string'); 
                $NewFileName = $_FILES['txt_media']['name']; 
                
                $config['upload_path'] = './upload/Media/';
                $config['allowed_types'] = 'doc|docx|rtf|pdf|gif|jpg|png|ppt|pps|pptx|ppsx|pot|potx';
                // $config['max_size']    = '2000000';
                //$config['encrypt_name']  = true;
                $config['max_size']      = 100000000; //100 mb
                $config['file_name'] = $NewFileName;
            
                 $this->load->library('upload', $config);      
                 $field_name = "txt_media";
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
                      $NewFileName = $this->input->post('oldmedia'); 
                    }


            $profile_data    = array(
                'job_seeker_id'     => $jobseeker_id,
                'uploded_media'     => $NewFileName,
                'about_me'          => addslashes($this->input->post('profile_summary')),
                'media_link'        => addslashes($this->input->post('txt_link')),
            );
            if (empty($profile_summary_id)) {
                $profile_data['created_on'] = date('Y-m-d H:i:s');
                $profile_data['created_by'] = $jobseeker_id;

               $this->Master_model->master_insert($profile_data,'js_profile_summary');
                redirect('job_seeker/seeker_info');
            } else {
                $profile_data['updated_on'] = date('Y-m-d H:i:s');
                $profile_data['updated_by'] = $jobseeker_id;
                $where_cans['id']=$profile_summary_id;
                $this->Master_model->master_update($profile_data,'js_profile_summary',$where_cans);
                redirect('job_seeker/seeker_info');
            }
        } else {
            $jobseeker_id   = $this->session->userdata('job_seeker_id');
            $job_seeker_profile = $this->Master_model->get_master_row('js_profile_summary', $select =FALSE ,$where="job_seeker_id='$jobseeker_id'",$join = false); 
            // echo $this->db->last_query();
            $this->load->view('fontend/jobseeker/profile_summary.php', compact('job_seeker_profile'));


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

    // to get industry master for autocomplete
    function search_industry(){
        if (isset($_GET['term'])) {

            $result = $this->Job_seeker_experience_model->search_industry_name($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->job_category_name;
                echo json_encode($arr_result);
            }
        }
    }
        function search_job()
        {
            if (isset($_GET['term'])) {

                  
                        $result = $this->Job_seeker_experience_model->search_jobs($_GET['term']);
                        if (count($result) > 0) {
                        foreach ($result as $row)
                            $arr_result[] = $row->job_title;
                            echo json_encode($arr_result);
                        }
                   

                    
                }

        }

        function search_people()
        {
            if (isset($_GET['term'])) {

                  
                       $result = $this->Job_seeker_experience_model->search_companies($_GET['term']);
                        if (count($result) > 0) {
                        foreach ($result as $row)
                            $arr_result[] = $row->company_name;
                            echo json_encode($arr_result);
                        }
                   

                    
                }

        }
    // to get industry master for autocomplete
    function search_people_job(){
        // $term = $this->input->post('term');
        $search = $_GET['search'];
        if (isset($_GET['term'])) {

            if ($search=='week3') {
                $result = $this->Job_seeker_experience_model->search_companies($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->company_name;
                    echo json_encode($arr_result);
                }
            }
            else
            {
                $result = $this->Job_seeker_experience_model->search_jobs($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->company_name;
                    echo json_encode($arr_result);
                }
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
        
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->city_name;
                echo json_encode($arr_result);
            }
        }
    }


    public function my_saved_jobs()
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
           
        $where_edu="js_saved_jobs.job_seeker_id='$jobseeker_id'";
        $join_save = array(
            'job_posting' => 'job_posting.job_post_id=js_saved_jobs.job_post_id | LFET OUTER',
            // 'city' => 'city.id=job_posting.city_id | LFET OUTER',
            );
           
            $select_edu = "job_posting.job_title,job_posting.job_slugs,job_posting.job_position,job_posting.company_profile_id,js_saved_jobs.created_on,js_saved_jobs.job_post_id,js_saved_jobs.job_seeker_id,js_saved_jobs.id,job_posting.city_id";
            $data['saved_job_data'] = $this->Master_model->getMaster("js_saved_jobs", $where_edu, $join_save, $order = false, $field = false, $select_edu,$limit=false,$start=false, $search=false);
      
        // echo $this->db->last_query(); die;
        // $this->load->view('fontend/jobseeker/saved_jobs',$data);
        $this->load->view('fontend/jobseeker/seeker_saved_jobs',$data);
    }

    public function delete_saved_job($id)
    {
        $where_del = "id='$id'";
        $del = $this->Master_model->master_delete('js_saved_jobs',$where_del);
        redirect('job_seeker/my_saved_jobs');
    }
    
    public function instant_message()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        if ($_POST) {

            $send_to = $this->input->post('send_to');
            $created_on = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($created_on)));

            $where_sks="(job_seeker_id='$jobseeker_id' AND connection_id='$send_to') OR (job_seeker_id='$send_to' AND connection_id='$jobseeker_id')";
            $connect_data = $this->Master_model->get_master_row("message_connections", $select= FALSE, $where_sks, $join=FALSE);

            $con_data   = array(
                'job_seeker_id'    => $jobseeker_id,
                'connection_id'    => $connect_data['id'],
                'chat_js_id'       => $this->input->post('send_to'),
                'message_desc'     => $this->input->post('user_msg'),
                'created_on'       => $cenvertedTime,
                'created_by'       => $jobseeker_id,
            );
           $this->Master_model->master_insert($con_data,'message_chat');

            $wheremsg = "created_by='$jobseeker_id'";
            // $saved_job_data = $this->Master_model->getMaster("message_chat", $where_edu, $join_save, $order = false, $field = false, $select_edu,$limit=false,$start=false, $search=false);
            $saved_job_data = $this->Master_model-> getList($condition= FALSE, $field_by= FALSE, $order_by= 'chat_id desc', $offset= FALSE, $perpage= FALSE, 'message_chat', $search= FALSE, $join = FALSE, $wheremsg, $select = FALSE, $distinct = FALSE, $group_by = 'chat_js_id');

           
            echo $this->load->view('fontend/jobseeker/instant_message', compact('connection_requests','seeker_data','saved_job_data'),true);

        } else {
            $wheremsg = "created_by='$jobseeker_id'";
            // $saved_job_data = $this->Master_model->getMaster("message_chat", $where_edu, $join_save, $order = false, $field = false, $select_edu,$limit=false,$start=false, $search=false);
            $saved_job_data = $this->Master_model-> getList($condition= FALSE, $field_by= FALSE, $order_by= 'chat_id desc', $offset= FALSE, $perpage= FALSE, 'message_chat', $search= FALSE, $join = FALSE, $wheremsg, $select = FALSE, $distinct = FALSE, $group_by = 'chat_js_id');




            $seeker_data = $this->Master_model->getMaster('js_info',$where="js_status=1");
            $connection_requests = $this->Master_model->getMaster('message_connections',$where=false);
           
            echo $this->load->view('fontend/jobseeker/instant_message', compact('connection_requests','seeker_data','saved_job_data'),true);
        }
    }

    public function search_user()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        if (isset($_GET['term'])) 
        {
              $where= "js_info.js_status=1 AND js_info.job_seeker_id!='$jobseeker_id' AND js_info.full_name like '%".$_GET['term']."%'";
              $tablename='js_info';
              $join_a = array(
                'js_photo' => 'js_photo.job_seeker_id=js_info.job_seeker_id | left outer',
              );
              $select = "js_photo.photo_path,js_info.job_seeker_id,js_info.full_name";
              $result = $this->Master_model->getMaster($tablename, $where, $join_a, $order = false, $field = false, $select ,$limit=false,$start=false, $search=false);

              $final_array=array();

              if (count($result) > 0) 
              {
                foreach ($result as $row)
                {
                    $arr_result= array(
                       'id'=>$row['job_seeker_id'],
                       'value'=>$row['full_name'],
                       'label'=>$row['full_name'],
                       'img'=>$row['photo_path']
                    ); 
                  array_push($final_array,$arr_result);
                }
              }
                echo json_encode($final_array);
        }
    }

public function user_profile()
{
    $jobseeker_id    = $this->session->userdata('job_seeker_id');
    $js_id = base64_decode($this->input->get('seeker_id'));

        $where_int= "js_info.job_seeker_id='$js_id'";
        $join_a = array(
            'js_photo'              => 'js_photo.job_seeker_id=js_info.job_seeker_id | left outer',
            'js_profile_summary'    => 'js_profile_summary.job_seeker_id=js_info.job_seeker_id | left outer',
          );
        $select = "js_profile_summary.about_me,js_photo.photo_path,js_info.job_seeker_id,js_info.full_name,js_info.profession";
        $data['intro_data'] = $this->Master_model->get_master_row("js_info", $select, $where_int, $join_a);

        $where_p= "js_personal_info.job_seeker_id='$js_id'";
        $join_p = array(
            'city'      => 'city.id=js_personal_info.city_id | left outer',
            'country'   => 'country.country_id=js_personal_info.country_id | left outer',
            'state'     => 'state.state_id=js_personal_info.state_id | left outer',
          );
        $data['personal_data'] = $this->Master_model->get_master_row("js_personal_info", $select= FALSE, $where_p, $join_p);
  
        $data['exp_data'] = $this->Job_seeker_experience_model->experience_list_by_id($js_id);
         // echo $this->db->last_query();echo "<br>";
        $where_sk="job_seeker_skills.job_seeker_id='$js_id'";
        $data['skill_data'] = $this->Master_model->getMaster("job_seeker_skills", $where_sk, $join = FALSE, $order = false, $field = false, $select= FALSE ,$limit=false,$start=false, $search=false);
         
        $where_sks="(job_seeker_id='$jobseeker_id' AND connection_id='$js_id') OR (job_seeker_id='$js_id' AND connection_id='$jobseeker_id')";
        $data['connect_data'] = $this->Master_model->get_master_row("message_connections", $select= FALSE, $where_sks, $join=FALSE);
      
       $this->load->view('fontend/jobseeker/seeker_profile',$data);
}
   public function connection_request()
   {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        $connecter_id = $this->input->post('js_id');
        $message = addslashes($this->input->post('message'));

        $where_sks="job_seeker_id='$connecter_id'";
        $select_eml="email,full_name";
        $emails = $this->Master_model->get_master_row("js_info", $select_eml, $where_sks, $join=FALSE);
        $email = $emails['email']; 
        $name = $emails['full_name'];

        $where_sks1="job_seeker_id='$jobseeker_id'";
        $select_eml1="email,full_name";
        $sender_email = $this->Master_model->get_master_row("js_info", $select_eml1, $where_sks1, $join=FALSE);
        $senderemail = $sender_email['email']; 
        $sender_name = $sender_email['full_name'];

        $created_on = date('Y-m-d H:i:s');
        $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour +30 minutes',strtotime($created_on)));
        
        $con_data = array(
            'job_seeker_id' => $jobseeker_id,
            'connection_id' => $connecter_id,
            'created_on'    => $cenvertedTime,
            'created_by'    => $jobseeker_id,
        );
        $cid = $this->Master_model->master_insert($con_data,'message_connections');
        if($cid){
            $con_data = array(
                'job_seeker_id' => $jobseeker_id,
                'connection_id' => $cid,
                'chat_js_id'    => $connecter_id,
                'message_desc'  => $message,
                'created_on'    => $cenvertedTime,
                'created_by'    => $jobseeker_id,
            );
            $chtid = $this->Master_model->master_insert($con_data,'message_chat');

            $subject = 'Hi '.$name.', please add me to your professional network';
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
                <br><br>Hi '.$name.', I would like to join your Ocean network <br/>';

                $message .='<br><a href="'.base_url().'confirm_interview/accept_invitation?apply_id='.base64_encode($jobseeker_id).'&connection_id='.base64_encode($connecter_id).'" class="btn btn-primary" value="Accept" align="center" target="_blank">Accept</a> <br><br>Regards,<br> '.$sender_name.'<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


                $send = sendEmail_JobRequest($email,$message,$subject);
        }
        $this->session->set_flashdata('con_message','<div class="alert alert-success text-center">Connection request sent successfully!</div>');

        redirect(base_url()."job_seeker/user_profile?seeker_id=".base64_encode($connecter_id));

   }

   public function ReadAllMessages()
   {
       $jobseeker_id    = $this->session->userdata('job_seeker_id');

        $data_status=array( 
            'status'    => 1,
        );
        $where_u1['chat_js_id']=$jobseeker_id;
        $status = $this->Master_model->master_update($data_status, 'message_chat', $where_u1);
        redirect('job_seeker/my_dashboard');
   }

   public function message_history($chat_js_id=null)
   {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
        
        $wheremsg = "(created_by='$jobseeker_id' AND chat_js_id='$chat_js_id') OR (created_by='$chat_js_id' AND chat_js_id='$jobseeker_id')";
        $data['message_data'] = $this->Master_model->getMaster("message_chat", $wheremsg, $join = false, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
            
        $this->load->view('fontend/jobseeker/message_history',$data);
   }

   
    public function all_notifications()
    {
        $jobseeker_id    = $this->session->userdata('job_seeker_id');
       
        $wheremsg = "message_connections.connection_id = '$jobseeker_id' AND message_connections.connect_status=0 order by id desc";
        $join_save = array(
            'js_info' => 'js_info.job_seeker_id=message_connections.created_by | left outer',
            'message_chat' => 'message_chat.connection_id=message_connections.id | left outer',
        );
        $select_result = "message_chat.message_desc,message_chat.status,js_info.full_name,message_connections.id,message_connections.created_on,message_connections.job_seeker_id";
        $notification_data = $this->Master_model->getMaster("message_connections", $wheremsg, $join_save, $order = false, $field = false, $select_result,$limit=false,$start=false, $search=false);
     
       
        echo $this->load->view('fontend/jobseeker/notification', compact('connection_requests','seeker_data','saved_job_data'),true);
        
    }

    public function skill_upgrade()
    {
        $jobseeker_id     = $this->session->userdata('job_seeker_id');
        // $job_seeker_resume = $this->Master_model->get_master_row('js_attached_resumes', $select =FALSE ,$where="job_seeker_id='$jobseeker_id'",$join = false); 
        $this->load->view('fontend/jobseeker/upgrade_skills');
    
    }

    function getsorteddata()
    {

        $jobseeker_id = $this->session->userdata('job_seeker_id');
        $type=$this->input->post('type');
         if ($type=='week') {

                $lastWeek = date("Y-m-d", strtotime("-7 days"));
                $today = date("Y-m-d");
                // echo $lastWeek;date("Y-m-d",strtotime($datetime))
                $where_edu="js_saved_jobs.job_seeker_id='$jobseeker_id' and DATE_FORMAT(created_at, '%Y-%m-%d') between '$lastWeek' and '$today' ";
            }
            elseif ($type=='month') {
                $lastMonth = date("Y-m-d", strtotime("-30 days"));
                $today = date("Y-m-d");
                // echo $lastWeek;
                $where_edu="js_saved_jobs.job_seeker_id='$jobseeker_id' and DATE_FORMAT(created_at, '%Y-%m-%d') between '$lastMonth' and '$today' ";
            }
            elseif ($type=='all') {
                
                 $where_edu="js_saved_jobs.job_seeker_id='$jobseeker_id'";
            }
                
                 $join_save = array(
                'job_posting' => 'job_posting.job_post_id=js_saved_jobs.job_post_id | LFET OUTER',
                // 'city' => 'city.id=job_posting.city_id | LFET OUTER',
                );
               
                $select_edu = "job_posting.job_title,job_posting.job_slugs,job_posting.job_position,job_posting.company_profile_id,js_saved_jobs.created_on,js_saved_jobs.job_post_id,js_saved_jobs.job_seeker_id,js_saved_jobs.id,job_posting.city_id";
                $saved_job_data = $this->Master_model->getMaster("js_saved_jobs", $where_edu, $join_save, $order = false, $field = false, $select_edu,$limit=false,$start=false, $search=false);

                foreach ($saved_job_data as $applicaiton) 
                {
                    $base_url= base_url();
                    $company_logo=$this->company_profile_model->company_logoby_id($applicaiton["company_profile_id"]);
                    $company_slug=$this->job_posting_model->get_slug_nameby_id($applicaiton["job_post_id"]);
                    $job_title= $this->job_posting_model->job_title_by_name($applicaiton["job_post_id"]);
                    $company_name =$this->company_profile_model->company_name($applicaiton["company_profile_id"]);
                    
                    $result .='<div class="job-voucher alert alert-dismissible" ><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                        <img src="'.$base_url.'upload/'.$company_logo.'"class="dimen_img-s" />

                        <div class="job_title"><a href="'.$base_url.'job/show/'.$company_slug.'"'.$job_title.'</a></div> 
                        <div class="organization">'.$company_name.
                    '</div>
                    <div class="location">'.$applicaiton["city_id"]. 
                    '</div>
                    <a href="'.$base_url.'job/show/'.$applicaiton["job_slugs"].'" class="btn btn-success btn-xs apply_job_btn">Apply job</a>
                    <!-- <div class="apply_job_btn">Apply job</div> -->
                    <button class="job_dis_btn">Details</button></div>';
                }
                  echo $result;
                // echo $this->db->last_query();

    }

    public function test()
    {
         $seeker_id  = $this->input->post('job_seeker_id');
        // $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "oceanchamp_tests.status != 'Test Completed' AND job_seeker_id = '$job_seeker_id'";

        $oceanchamp_tests = $this->Master_model->get_master_row('forwarded_tests', $select = FALSE, $where = $where_all, $join = FALSE);
    }
    public function ocean_test_instructions($test_id = null,$apply_id= null,$job_post_id=NULL)
    {
        $data['test_id'] = base64_decode($test_id);
        $data['apply_id'] = base64_decode($apply_id);
        $data['job_post_id'] = $job_post_id;
        $test = $data['test_id'];

       
        $where_all = "oceanchamp_tests.status='1'  AND test_id = '$test'";
        $data['oceanchamp_tests'] = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where = $where_all, $join = FALSE);
         $this->load->view('fontend/jobseeker/ocean_test_instructions',$data);
    }
   public function ocean_test_start($test_id = null,$apply_id= null,$job_post_id=NULL)
    {
        $job_seeker_id = $this->session->userdata('job_seeker_id');
        $test_id           = base64_decode($test_id);
        $apply_id           = base64_decode($apply_id);
       
        // print_r($test_id);
        // print_r($job_post_id);die;
        if (!empty($job_post_id)) {
            $singlejob    = $this->job_posting_model->get_job_details_employer($job_post_id);
        $company_id = $singlejob->company_profile_id;
            
            $job_apply = $this->job_apply_model->check_apply_job($job_seeker_id, $company_id, $job_post_id);
        // print_r($job_apply);
        //  print_r($this->db->last_query());die;
        
            if ($job_apply) {
                $where = "job_seeker_id='$job_seeker_id' and company_id = '$company_id' and job_post_id = '$job_post_id'";
                $apply = $this->Master_model->get_master_row('job_apply', $select = FALSE, $where , $join = FALSE);
                $apply_id=$apply['job_apply_id'];
            }else
            {
                
                 $apply_info   = array(
                            'job_seeker_id'   => $job_seeker_id,
                            'company_id'      => $company_id,
                            'job_post_id'     => $job_post_id
                           
                        );
                $apply_id = $this->job_apply_model->insert($apply_info);
            }
        }
        
  
        
        if (!empty($test_id)) {
            
            // $employer_id = $this->session->userdata('company_profile_id');
            $where_all = "oceanchamp_tests.status='1' AND  test_id = '$test_id'";

            $oceanchamp_tests = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where = $where_all, $join = FALSE);
                  // print_r($this->db->last_query());
            $technical_id = $oceanchamp_tests['topics'];
            $level = $oceanchamp_tests['level'];
            $ques_type = 'MCQ';
            $where = "technical_id IN('".$technical_id."')  and level ='$level' and ques_type ='$ques_type' ";
        $questions = $this->Master_model->getMaster('questionbank', $where, $join = FALSE, $order = 'RANDOM', $field = 'ques_id', $select = false, $limit = 10, $start = 'ques_id', $search = false);
        // print_r($this->db->last_query());die;
            $all_questions = array();
           // foreach ($oceanchamp_tests as $question) {
                # code...

             
                 
                // $questions = explode(',',$oceanchamp_tests['questions']);
                
             // print_r($questions);
                foreach ($questions as $row) {
                 $ques_id = $row['ques_id'];
                  $where = "questionbank.ques_id='$ques_id'";

                   $Join_data      = array(
                    'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|Left OUTER '
                
            );
            
                  $question_data  = $this->Master_model->get_master_row('questionbank', $select = 'questionbank.question,JSON_OBJECT("a",questionbank.option1,"b",questionbank.option2,"c",questionbank.option3,"d",questionbank.option4 ) as answers,time_for_question,questionbank_answer.answer_id as correctAnswer', $where, $join = $Join_data);
                  // print_r($this->db->last_query());die;
                    $resultArray['question'] = $question_data['question'];
                    $resultArray['time_for_question'] = $question_data['time_for_question'];
                    if ($question_data['correctAnswer']==1) {
                        $resultArray['correctAnswer'] = 'a';
                    }
                    elseif ($question_data['correctAnswer']==2) {
                        $resultArray['correctAnswer'] = 'b';
                    }
                    elseif ($question_data['correctAnswer']==3) {
                        $resultArray['correctAnswer'] = 'c';
                    }
                    elseif ($question_data['correctAnswer']==4) {
                        $resultArray['correctAnswer'] = 'd';
                    }
                    // $resultArray['correctAnswer'] = $question_data['correctAnswer'];

                    $resultArray['answers'] = json_decode($question_data['answers']);
           

                   // $answer_data  = $this->Master_model->get_master_row('questionbank', $select = 'questionbank.option 1 as a', $where, $join = false);
                
                  array_push($all_questions, $resultArray);
              }
        
            $data['all_questions'] = $all_questions;
            $data['test_duration'] = $oceanchamp_tests['test_duration'];
            $data['oceanchamp_tests'] = $oceanchamp_tests;
            
            $data['test_id'] = $test_id;
            $data['apply_id'] = $apply_id;
            $this->load->view('fontend/exam/ocean_test_questions', $data);
           
            
        } 
    }

    public function insert_test_data()
    {
        if (!empty($_POST)) {
            # code...
      
        // print_r($_POST);die;
      
          $seeker_id = $this->session->userdata('job_seeker_id');
        $test_id              = $this->input->post('test_id');
        $apply_id              = $this->input->post('apply_id');

        // $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "oceanchamp_tests.status='1' AND test_id = '$test_id'";

        $oceanchamp_tests = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where = $where_all, $join = FALSE);
        $questions = explode(',',$oceanchamp_tests['questions']);
        $i=0;
         $created_on    = date('Y-m-d H:i:s');
        $cenvertedTime = date('Y-m-d H:i:s', strtotime('+5 hour +30 minutes', strtotime($created_on)));
        foreach ($questions as $row) {
            if ($_POST['question'.$i] == 'a') {
                $option = '1';
            }
            elseif ($_POST['question'.$i] == 'b') {
                $option = '2';
            }
            elseif ($_POST['question'.$i] == 'c') {
                $option = '3';
            }
            elseif ($_POST['question'.$i] == 'd') {
                $option = '4';
            }

            $question_id      = $row;
            $option           = $option;

            $where_all = "questionbank_answer.question_id='$row' ";

            $oceanchamp_tests1 = $this->Master_model->get_master_row('questionbank_answer', $select = FALSE, $where = $where_all, $join = FALSE);

             if ($option == $oceanchamp_tests1['answer_id']) {
                     $mark    = 1;
                    $status = 'Yes';
                } 
                else {
                    if (isset($oceanchamp_tests) && $oceanchamp_tests['negative_marks'] == 'Y') {
                        $status = 'No';
                        $mark    = '-1';
                    }
                    else
                    {
                        $status = 'No';
                        $mark    = 0;
                    }
                    

                }

            $exam_array = array(
            'test_id' => $test_id,
            // 'employee_id' => $employer_id,
            'question_id' => $row,
            'marks' => $mark,
            'correct_status' => $status,
            'date_time' => $cenvertedTime
        );
        $last_id    = $this->Master_model->master_insert($exam_array, 'seeker_test_result');
    }
    $where_forward = "forwarded_tests.test_id='$test_id' and job_seeker_id = '$seeker_id'";
    $forward_test = $this->Master_model->get_master_row('forwarded_tests', $select = FALSE, $where_forward , $join = FALSE);
    if (!empty($forward_test)) {
        $test_array = array(
                 'status' => 'Test Completed',
                  'updated_on' => date('Y-m-d'));
             $where_tesf['test_id'] = $test_id;
             $where_tesf['job_seeker_id'] = $seeker_id;
            $this->Master_model->master_update($test_array, 'forwarded_tests', $where_tesf);
    }
        
        
        
            
          // if (isset($oceanchamp_tests) && $oceanchamp_tests['final_result'] == 'Y') 
          // { 
            $data['total_questions'] = sizeof($questions);
            $data['attended_questions'] = $this->input->post('green');
            $data['skipped_questions'] = $this->input->post('gray') +  $this->input->post('white') ;
            $data['correct_ans'] = $this->input->post('correct');
            $data['wrong_ans'] = sizeof($questions)-$this->input->post('correct');
            if (isset($oceanchamp_tests) && $oceanchamp_tests['final_result'] == 'Y') 
            { 
             $data['result'] =  $data['correct_ans']-$data['wrong_ans'];
            }
            else
            {
                $data['result'] =  $data['correct_ans'];

            }
            if (isset($apply_id) && ! empty($apply_id)) {
            $test_array = array(
                        
                        'tracking_status' => 2,
                        'updated_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')));
                        
                
             $whereapp['apply_id'] = $apply_id;
           
            $this->Master_model->master_update($test_array, 'forwarded_jobs_cv', $whereapp);

            $job_apply_update =array('forword_job_status'=> 2,'is_test_done'=>1);
             $wherejob['job_apply_id'] = $apply_id;

            $this->Master_model->master_update($job_apply_update, 'job_apply', $wherejob);

            $score = $data['correct_ans'] ."/". $data['total_questions'];

            $update_array = array(
                        
                        'tracking_status' => 2,
                        'score' => $score,
                        'updated_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'))
                        
                    );
             $where_ex['apply_id'] = $apply_id;
             // $where_ex['job_seeker_id'] = $seeker_id;
            $this->Master_model->master_update($update_array, 'external_tracker', $where_ex);
            $join =array('job_apply' => 'job_apply.job_post_id = external_tracker.job_post_id');
            $where_cond = "external_tracker.apply_id = '$apply_id'";
            $total_ranks = $this->Master_model->getMaster('external_tracker',  $where_cond, $join , $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
               // print_r($this->db->last_query());die;
            $before_sorting = array();
            foreach ($total_ranks as $row) {
                $scores = explode('/', $row['score']);
               

                array_push($before_sorting, $scores[0]);

            }

            $sorted_array =array(sort(array_unique($before_sorting)));
             // print_r($sorted_array);die;
            $k=1;
            foreach ($sorted_array as $row) {
                $array = array(
                        
                        'rank' => $k,
                        'updated_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')));
                        
                
             $wherescore['score'] = $row.'/'.$data['total_questions'];
           
            $this->Master_model->master_update($array,'external_tracker', $wherescore);

            $k++;
            // print_r($this->db->last_query());die;
                
            }





            }

            $join_company = array('company_profile' => 'company_profile.company_profile_id = forwarded_tests.company_id',
                'js_info' => 'js_info.job_seeker_id = forwarded_tests.job_seeker_id');
            $where_test = "forwarded_tests.test_id = '$test_id' and forwarded_tests.job_seeker_id = '$seeker_id' ";
            $check_farwarded = $this->Master_model->get_master_row('forwarded_tests', $select = FALSE, $where_test, $join_company);

           

            // print_r($this->db->last_query());
            // die;

            if ($check_farwarded) {
               $subject = 'Candidate has Completed The test';
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
                <br><br>Hi '. $check_farwarded['company_name'].' <br/>';

                $message .='<br>
                '.$check_farwarded['full_name'].' has completed the test that you have farwarded<br><br>Regards,<br><br> Team TheOcean<br><br>© 2020 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table><br><br>Regards,<br><br>Team TheOcean.</div>';


                $send = sendEmail_JobRequest($check_farwarded['company_email'],$message,$subject);
            }
           
            $this->load->view('fontend/exam/exam_success',$data);

        
           
          
        }
    }

     function search_people_connection()
    {
        // $employer_id = $this->session->userdata('company_profile_id');
        if (isset($_GET['term'])) {
            
            $result1 = $this->job_posting_model->search_connection($_GET['term']);
            $result2 = $this->job_posting_model->search_company_connection($_GET['term']);
           $result = array_merge($result1,$result2);
            
            if (count($result) > 0) {
                $i=0;
                foreach ($result as $row)
                {
                    $arr_result[$i]['label'] = $row->name;
                    $arr_result[$i]['value'] = $row->id;
                    $i++;
                }
                echo json_encode($arr_result);
            
        }
    }
}

    function add_new_connection()
    {
        $employer_id = $this->input->post('id');
        $name = $this->input->post('name');
        $js_id = $this->session->userdata('job_seeker_id');

        $whereres   = "emp_id='$employer_id' and js_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres);

        $where_js   = "job_seeker_id='$employer_id' and full_name = '$name'";
        $check_js = $this->Master_model->get_master_row('js_info', $select = FALSE, $where_js);


        if (empty($check_js)) 
        {
            $where_emp   = "company_profile_id='$employer_id' and company_name = '$name'";
            $check_emp = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where_emp);
            if (!empty($check_emp)) {
                $type = 'js-emp';
            }
          
        }
        else
        {
            // echo "string";die;

            $type = 'js-js';
        }


        $whereres   = "emp_id='$employer_id' and js_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres);

        if (empty($check)) {
           $connection_data['emp_id'] = $employer_id;
           $connection_data['js_id'] = $js_id;
           $connection_data['status'] = 1;
           $connection_data['type'] = $type;
           $connection_data['created_by'] = $js_id;
           $connection_data['created_date'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));

           $insert_id = $this->Master_model->master_insert($connection_data, 'emp_js_connection');
        }
       

     
       $Join_data      = array('messaging' => 'messaging.connection_id = emp_js_connection.emp_js_connection_id|Left OUTER ');

        $whereres   = "js_id='$js_id' or emp_id = '$js_id'";
        $whereres   .= "group by emp_js_connection.emp_js_connection_id";

        $data['chatbox'] = $this->Master_model->getMaster('emp_js_connection', $where =  $whereres, $join = $Join_data, $order = 'desc', $field = 'max', $select = ' messaging.*, MAX( messaging.message_id) as max,emp_js_connection.*',$limit=false,$start=false, $search=false);

        $this->load->view('fontend/jobseeker/chatting_list.php',$data);

    }

    function get_list_connections()
    {
         // $employer_id = $this->input->post('id');
        $name = $this->input->post('name');
        $jobseeker_id = $this->session->userdata('job_seeker_id');

       $Join_data      = array('messaging' => 'messaging.connection_id = emp_js_connection.emp_js_connection_id|Left OUTER ');

        $whereres   = "js_id='$jobseeker_id' or emp_id = '$jobseeker_id'";
        $whereres   .= "group by emp_js_connection.emp_js_connection_id";

        $data['chatbox'] = $this->Master_model->getMaster('emp_js_connection', $where =  $whereres, $join = $Join_data, $order = 'desc', $field = 'max', $select = ' messaging.*, MAX( messaging.message_id) as max,emp_js_connection.*',$limit=false,$start=false, $search=false);

        $this->load->view('fontend/jobseeker/chatting_list.php',$data);

    }

    function get_messages()
    {
        $connection_id = $this->input->post('id');
        $js_id = $this->session->userdata('job_seeker_id');
        $del   = array(
            'message_status' => '1'
          );
        $where11['connection_id'] = $connection_id;
        $where11['msg_to'] = $js_id;
        
        
        $this->Master_model->master_update($del, 'messaging', $where11);

        $whereres   = " emp_js_connection_id = '$connection_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);

        if ($check['type'] == 'js-js' && $check['created_by'] == $js_id) 
        {
                                  // echo "string";
            $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.emp_id|Left OUTER ');
                                 
        }
        elseif ($check['type'] == 'js-js' && $check['created_by'] != $js_id) 
        {
            $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
        }
        else
        {
          $Join_data      = array(
            
             'company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');   
        }

        $whereres   = " emp_js_connection_id = '$connection_id'";
        $data['check'] = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);
        $where   = "connection_id = '$connection_id' ";

        // $where .= "group by msg_from";
        
        $data['chatbox'] = $this->Master_model->getMaster('messaging', $where =  $where, $join = false, $order = 'asc', $field = 'message_id', $select = false,$limit=false,$start=false, $search=false);

        // print_r($this->db->last_query());die;
        $this->load->view('fontend/jobseeker/chatting_card.php',$data);

    }

    function send_message()
    {
        $js_id = $this->session->userdata('job_seeker_id');

        $connection_id = $this->input->post('id');
        $message = $this->input->post('message');

         $del   = array(
            'message_status' => '1'
          );
        $where11['msg_to'] = $js_id;
        // $where11['msg_from'] = $js_id;
        $this->Master_model->master_update($del, 'messaging', $where11);


         $whereres   = "emp_js_connection_id = '$connection_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);

        if ($check['type'] == 'js-js' && $check['created_by'] == $js_id) 
        {
                                  // echo "string";
            $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.emp_id|Left OUTER ');
            $mesg_to = 'emp_id';
                                 
        }
        elseif ($check['type'] == 'js-js' && $check['created_by'] != $js_id) 
        {
            $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
            $mesg_to = 'js_id';

        }
        else
        {
          $Join_data      = array(
            
             'company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');   
            $mesg_to = 'emp_id';
        }

        $whereres   = "emp_js_connection_id='$connection_id'";
        // $whereres   = " emp_js_connection_id = '$connection_id'";
        $data['check'] = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);

        $meg_data['msg_from'] = $js_id;
        $meg_data['msg_to'] =  $data['check'][$mesg_to];
        $meg_data['connection_id'] = $data['check']['emp_js_connection_id'];
        $meg_data['msg'] = $message;
        $meg_data['status'] = 1;
        $meg_data['created_by'] = $js_id;
        $meg_data['created_date'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));

        $insert_id = $this->Master_model->master_insert($meg_data, 'messaging');

        $where   = "connection_id = '$connection_id' ";


        $data['chatbox'] = $this->Master_model->getMaster('messaging', $where =  $where, $join = false, $order = 'asc', $field = 'message_id', $select = false,$limit=false,$start=false, $search=false);

        // print_r($this->db->last_query());die;
        $this->load->view('fontend/jobseeker/chatting_card.php',$data);
    }
 public function forword_job_post() {
        $job_seeker_id = $this->session->userdata('job_seeker_id');
        $send_to = $this->input->post('consultant');
        // echo $send_to;
        if ($_POST) {
            $employer_id = $this->input->post('employer_id');
            $candiate_email = $this->input->post('candiate_email');
            $job_post_id = $this->input->post('job_post_id');
            $job_desc = $this->input->post('message_id');
            // $mandatory = $this->input->post('mandatory');
            $email = preg_split('/;|,/', $candiate_email);
            // $email = explode(',', $candiate_email);
            $where_req = "job_post_id= '$job_post_id'";
            $join_req = array('job_types' => 'job_types.job_types_id = job_posting.job_types|LEFT OUTER', 'company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id|LEFT OUTER', 'city' => 'city.id = job_posting.city_id|LEFT OUTER', 'country' => 'country.country_id = job_posting.job_location|LEFT OUTER', 'state' => 'state.state_id = job_posting.state_id|LEFT OUTER', 'job_category' => 'job_category.job_category_id = job_posting.job_category|LEFT OUTER', 'job_nature' => 'job_nature.job_nature_id = job_posting.job_nature|LEFT OUTER', 'job_level' => 'job_level.job_level_id = job_posting.job_level|LEFT OUTER', 'job_role' => 'job_role.id = job_posting.job_role|LEFT OUTER', 'education_level' => 'education_level.education_level_id = job_posting.job_edu|LEFT OUTER', 'education_specialization' => 'education_specialization.id = job_posting.edu_specialization|LEFT OUTER');
            $select_job = "job_role.job_role_title,education_specialization.education_specialization,education_level.education_level_name,job_level.job_level_name,job_nature.job_nature_name,job_category.job_category_name,state.state_name,country.country_name,city.city_name,company_profile.company_name,company_profile.company_logo,job_types.job_types_name,job_posting.job_title,job_posting.job_position,job_posting.job_desc,job_posting.education,job_posting.salary_range,job_posting.job_deadline,job_posting.preferred_age,job_posting.preferred_age_to,job_posting.working_hours,job_posting.no_jobs,job_posting.benefits,job_posting.experience,job_posting.skills_required,job_posting.test_for_job";
            $req_details = $this->Master_model->getMaster('job_posting', $where_req, $join_req, $order = false, $field = false, $select_job, $limit = false, $start = false, $search = false);
            // print_r($this->db->last_query());die;
            if ($req_details) {
                foreach ($req_details as $require) {
                }
            }
            $test_id = $require['test_for_job'];
            $skill_id = $require['skills_required'];
            $where_req_skill = "skill_master.id IN (" . $skill_id . ")";
            $select_skill = "skill_master.skill_name";
            $req_skill_details = $this->Master_model->getMaster('skill_master', $where_req_skill, $join = false, $order = false, $field = false, $select_skill, $limit = false, $start = false, $search = false);
            // echo $this->db->last_query(); die;
            for ($i = 0;$i < sizeof($email);$i++) {
                
                    $where_can = "email='$email[$i]'";
                    $can_data = $this->Master_model->getMaster('js_info', $where_can);
                    if ($can_data) {
                        $seeker_id = $can_data[0]['job_seeker_id'];
                    } else {
                        $new_JS_array = array('email' => $email[$i], 'js_token' => md5($email[$i]), 'create_at' => date('Y-m-d H:i:s'));
                        $seeker_id = $this->Master_model->master_insert($new_JS_array, 'js_info');
                    }
                    $where_can = "email='$email[$i]'";
                    $can_data = $this->Master_model->getMaster('js_info', $where_can);
                    $where_cv = "js_email='$email[$i]' and company_id='$employer_id'";
                    $cv_data = $this->Master_model->getMaster('corporate_cv_bank', $where_cv);
                    if (empty($cv_data)) {
                        $cv_array = array(
                            'company_id' => $employer_id, 
                            'js_name' => $can_data[0]['full_name'], 
                            'js_email' => $can_data[0]['email'], 
                            'js_mobile' => $can_data[0]['mobile_no'], 
                            'created_on' => date('Y-m-d'), 
                            'created_by' => $employer_id);
                        $add_cv = $this->Master_model->master_insert($cv_array, 'corporate_cv_bank');
                        $cv_id = $add_cv;
                    } else {
                        $cv_id = $cv_data[0]['cv_id'];
                    }
                    $apply_array = array('job_seeker_id' => $seeker_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'forword_job_status' => 1, 'updated_on' => date('Y-m-d'));
                    $whereres = "job_seeker_id='$seeker_id' and company_id = '$employer_id' and job_post_id = '$job_post_id'";
                    $job_apply_data = $this->Master_model->get_master_row('
                        job_apply', $select = FALSE, $whereres);
                    if (empty($job_apply_data)) {
                        $apply = $this->Master_model->master_insert($apply_array, 'job_apply');
                        $external_array = array(
                            'cv_id' => $cv_id, 
                            'company_id' => $employer_id, 
                            'job_post_id' => $job_post_id, 
                            'apply_id' => $apply, 
                            'status' => 1, 
                            'company_id' => $employer_id, 
                            'name' => $can_data[0]['full_name'], 
                            'email' => $can_data[0]['email'], 
                            'mobile' => $can_data[0]['mobile_no'], 
                            'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                        $frwd = $this->Master_model->master_insert($external_array, 'external_tracker');
                        $frwd_array = array('cv_id' => $cv_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                        $frwd = $this->Master_model->master_insert($frwd_array, 'forwarded_jobs_cv');
                        if (isset($test_id)) {
                            $test_array = array('job_seeker_id' => $seeker_id, 'company_id' => $employer_id, 'test_id' => $test_id, 'status' => 'Farwarded Test with job', 'updated_on' => date('Y-m-d'),);
                            $whereres = "job_seeker_id='$seeker_id' and company_id = '$employer_id' and test_id = '$test_id'";
                            $test_data = $this->Master_model->get_master_row('
                                forwarded_tests', $select = FALSE, $whereres);
                            if (empty($test_data)) {
                                $frwd = $this->Master_model->master_insert($test_array, 'forwarded_tests');
                            }
                        }
                    }
                    if ($apply) {
                        $email_name = explode('@', $email[$i]);
                        $subject = $require['company_name'] . ' has invited you to apply for a New Job Post ';
                        $message = '
                                <style>
 
  .following-info{margin-bottom:10px;}
  .following-info2{margin-bottom:10px;}   
  .following-info3{margin-bottom:10px; margin-top: -154px;}
  li.left-title {
  list-style-type: none;
  float: left;
  font-size: 12px;
  font-weight: 100;
  width: 83px;
  height: 15px;
  }
  li.right-title {
  list-style-type: none;
  font-size: 12px;
  font-weight: 100;
  width: 179px;
  }
</style>
<div style="max-width:600px!important;padding:4px">
  <table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
        <td align="center">
          <table width="100%" cellspacing="0" border="0">
            <tbody>
              <tr>
                <td style="font-size:0px;text-align:left" valign="top"></td>
              </tr>
            </tbody>
          </table>
          <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
              <tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left">
                <td>
                  <a href="#"><img src="' . base_url() . 'upload/' . $require['company_logo'] . '" style="height: 50px;"> </a>
                  <br><br>Hi ' . $email_name[0] . ',<br><br/><br/>A new job post invitation has been sent to you by ' . $require['company_name'] . ' . Details of this job post are as follows:-<em><b>
                  <div class="card">
                    <div class="front">
                      <div class="job-info">
                        <p class="job_title">' . $require['job_title'] . '</p>
                      </div>
                      <div class="icon-info">
                        <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
                        <li class="right-icon-title"> &emsp;' . $require['city_id'] . '</li>
                        <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
                        <li class="right-title" style="width:100%;"> &emsp;' . $require['experience'] . '(experience)</li>
                        <div class="clear"></div>
                      </div>
                      <div class="following-info">
                        <li class="left-title"
                          >Job Roll</li>
                        <li class="right-title">&nbsp;: ' . $require['job_role_title'] . '</li>
                        <li class="left-title">Engagement</li>
                        <li class="right-title">&nbsp;: ' . $require['job_nature_name'] . '</li>
                        <li class="left-title">Domain</li>
                        <li class="right-title">&nbsp;:' . $require['job_category_name'] . '</li>
                        <!--  <li class="left-title">Role Type </li><li class="right-title">&nbsp;:</li>
                          <li class="left-title">Dummy1</li>
                          <li class="right-title">&nbsp;:</li>
                          <!--  <li class="left-title">Dummy2</li><li class="right-title">&nbsp;:</li> -->
                        <div class="clear"></div>
                      </div>
                      <div class="following-info2">
                        <li class="left-title">Education</li>
                        <li class="right-title">&nbsp;: ' . $require['education_level_name'] . '</li>
                        <li class="left-title">experience</li>
                        <li class="right-title">&nbsp;:' . $require['experience'] . '</li>
                        <li class="left-title">CTC</li>
                        <li class="right-title">&nbsp;:' . $require['salary_range'] . '</li>
                        <li class="left-title">Vacancies</li>
                        <li class="right-title">&nbsp;: ' . $require['no_jobs'] . '</li>
                      
                        <div class="clear"></div>
                      </div>
                      <div class="following-info3">
                        <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>
                        <li class="right-title">&nbsp;: ';
                        if (isset($require['jd_file']) && !empty($require['jd_file'])) {
                            $message.= 'Yes <a style="margin-left: 15px" href="' . base_url() . 'upload/job_description/' . $require['jd_file'] . '" download><i class="fa fa-download" aria-hidden="true"></i></a> ';
                        } else {
                            $message.= "No";
                        }
                        '
                        </li>
                        <li class="left-title">Ocean Test</li>
                        <li class="right-title">&nbsp;:' . $require['is_test_required'] . '</li>
                        <li class="left-title">Published on</li>
                        <li class="right-title">&nbsp;:';
                        if (!is_null($require['created_at'])) {
                            $message.= date('M j Y', strtotime($require->created_at));
                        }
                        '
                        </li>
                        <li class="left-title">Job expiry</li>
                        <li class="right-title">&nbsp;:';
                        if (!is_null($require['job_deadline'])) {
                            $message.= date('M j Y', strtotime($require['job_deadline']));
                        }
                        '
                        </li>
                        <div class="clear"></div>
                      </div>
                      <!-- <div id="skills"> -->
                      <span>Skill sets</span>:';
                        $sk = $require['skills_required'];
                        if (isset($sk) && !empty($sk)) {
                            $where_sk = "id IN (" . $sk . ") AND status=1";
                            $select_sk = "skill_name ,id";
                            $skills = $this->Master_model->getMaster('skill_master', $where_sk, $join = FALSE, $order = false, $field = false, $select_sk, $limit = 10, $start = false, $search = false);
                            if (!empty($skills)) {
                                foreach ($skills as $skill_row) {
                                    $message.= '
                      <lable class=""><button id="sklbtn">' . $skill_row['skill_name'] . '</button></lable>
                      ';
                                }
                            }
                        }
                        $message.= '</div>
                  </label<br><br>   <a href="' . base_url() . 'job/show/' . $v_companyjobs['job_slugs'] . '">Link</a>
                  <br><br>Thanks,<br><br>Team TheOcean<br><br>
                </td>
              </tr>
              <tr>
                <td height="40"></td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</div>
';
                        $send = sendEmail_JobRequest($email[$i], $message, $subject);
                        //echo $send;
                        // echo $message;
                        $company_name = $this->session->userdata('company_name');
                        $data = array('company' => $company_name, 'action_taken_for' => $email[$i], 'field_changed' => 'Forwarded Job ', 'Action' => $company_name . ' Forwarded job for the position of ' . $require['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Job Post has been Forwarded & Tracker Entry Created Successfully  !</div>');
                    } else {
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Jobseeker ha already applied for this job</div>');
                    }
                }
            }
            redirect('job_seeker/oceanhunt_activities');
        }
    public function ocean_test() {
      
        $data['activemenu'] = 'ocean_bank';
        $this->session->set_userdata($data);
        $job_seeker_id = $this->session->userdata('job_seeker_id');
       
        $where = "oceanchamp_tests.status='1' AND forwarded_tests.job_seeker_id='$job_seeker_id' and forwarded_tests.status != 'Test Completed'";
        $sort_val = $this->input->post('sort_val');
        if (isset($sort_val) && !empty($sort_val)) {
            $join = array('oceanchamp_tests'=>'oceanchamp_tests.test_id = forwarded_tests.test_id','topic' => 'find_in_set(topic.topic_id, oceanchamp_tests.topics)|LEFT OUTER',
         'questionbank' => 'find_in_set(questionbank.ques_id, oceanchamp_tests.questions)|LEFT OUTER', 'skill_master' => 'skill_master.id = questionbank.technical_id|LEFT OUTER'  );
              $data['ocean_tests'] = $this->Master_model->getMaster('forwarded_tests', $where = $where, $join , $order = 'desc', $field = $sort_val, $select = '*,group_concat(DISTINCT topic.topic_name) as topic_names,group_concat(DISTINCT skill_master.skill_name) as skill_name', $limit = false, $start = false, $search = false);
              $data['sort'] = $sort_val;
        }
        else
        {
             $join = array('oceanchamp_tests'=>'oceanchamp_tests.test_id = forwarded_tests.test_id');
              $data['ocean_tests'] = $this->Master_model->getMaster('forwarded_tests', $where = $where, $join , $order = 'desc', $field = 'forwarded_tests.id', $select = false, $limit = false, $start = false, $search = false);
        }
        
      
        $where_cn = "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_cn);
        //$where_opt= "options.status=1";
        $data['options'] = $this->Master_model->getMaster('options');
        $where_state = "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic', $where_state);
        $where_subtopic = "subtopic.subtopic_status='1'";
        $data['subtopic'] = $this->Master_model->getMaster('subtopic', $where_subtopic);
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem', $where_lineitem);
        $data['company_active_jobs'] = $this->job_posting_model->get_company_active_jobs($employer_id);
        // echo  $this->db->last_query(); die;
        $this->load->view('fontend/jobseeker/list_tests', $data);
        // $this->load->view('fontend/employer/all_questions.php', $data);
        
    }
    public function ocean_champ()
    {
         $data['activemenu'] = 'ocean_champ';
        $this->session->set_userdata($data);
        $job_seeker_id = $this->session->userdata('job_seeker_id');
         $join = array("skill_master"=>"skill_master.skill_name LIKE Concat('%', job_seeker_skills.skills, '%') | LEFT OUTER","topic"=>"topic.technical_id = skill_master.id | LEFT OUTER ",
        "oceanchamp_tests"=>"find_in_set(topic.topic_id, oceanchamp_tests.topics)| LEFT OUTER"
   );
        $where = "job_seeker_skills.job_seeker_id='$job_seeker_id' ";
      $sort_val = $this->input->post('sort_val');
        if (empty($sort_val)) {
           $sort_val = $this->input->get('sort');
        }
         $ocean_tests = $this->Master_model->getMaster('job_seeker_skills', $where = $where, $join , $order = 'desc', $field = 'job_seeker_skills.js_skill_id', $select = false, $limit = false, $start = false, $search = false);
      
         $config['base_url'] = base_url() . 'job_seeker/ocean_champ?sort='.$sort_val;
            $config['total_rows'] = sizeof($ocean_tests);
            $config['per_page'] = 5;
            $config['attributes'] = array('class' => 'myclass');
            $config['page_query_string'] = TRUE;
            $config['num_links'] = 2;
            // $config['use_page_numbers'] = TRUE;
            $config['query_string_segment'] = 'pages';
           
            $config['full_tag_open'] = '<div class="pagination">';
            $config['full_tag_close'] = '</div>';
            $config['first_link'] = '<button>First Page</button>';
            $config['first_tag_open'] = '<span class="firstlink">';
            $config['first_tag_close'] = '</span>';
            $config['last_link'] = '<button style="color:#FFF;background: #18c5bd;border: none;">Last Page</button>';
            $config['last_tag_open'] = '<span class="lastlink">';
            $config['last_tag_close'] = '</span>';
            $config['next_link'] = '<span style="margin-left:8px;"><button style="color:#FFF;background: #18c5bd;border: none;">Next Page</button></span>';
            $config['next_tag_open'] = '<span class="nextlink">';
            $config['next_tag_close'] = '</span>';
            $config['prev_link'] = '<button style="color:#FFF;background: #18c5bd;border: none;">Prev Page</button>';
            $config['prev_tag_open'] = '<span class="prevlink">';
            $config['prev_tag_close'] = '</span>';
            $config['cur_tag_open'] = '<span style="margin-left:8px;">';
            $config['cur_tag_close'] = '</span>';
            $config['num_tag_open'] = '<span style="margin-left:8px;">';
            $config['num_tag_close'] = '</span>';
            $offset = 0;
            $page = $this->input->get('pages');
            if ($page) {
                $offset = ($page - 1) * $config['per_page'];
                 $data['submenu'] = '2';
                $this->session->set_userdata($data);
            }

            $this->pagination->initialize($config);
            $data["link"] = $this->pagination->create_links();
         
        if (isset($sort_val) && !empty($sort_val)) {
             $data['ocean_tests'] = $this->Master_model->getMaster('job_seeker_skills', $where = $where, $join , $order = 'desc', $field = $sort_val, $select = false, $limit = $config['per_page'], $start = $page, $search = false);
              $data['sort'] = $sort_val;

        }else{
             $data['ocean_tests'] = $this->Master_model->getMaster('job_seeker_skills', $where = $where, $join , $order = 'desc', $field = 'job_seeker_skills.js_skill_id', $select = false, $limit = $config['per_page'], $start = $page, $search = false);
        }
      
       
        
        // echo  $this->db->last_query(); die;
        $this->load->view('fontend/jobseeker/list_skills', $data);
    }
    function search_test_keywords() {
      
        if (isset($_GET['term'])) {
            $result = $this->job_posting_model->search_test_keywords($_GET['term']);
            if (count($result) > 0) {
                $i = 0;
                foreach ($result as $row)
                { $arr_result[$i]['label'] = $row->test_name;
                $arr_result[$i]['value'] = $row->test_id;
                $i++;
                }
                echo json_encode($arr_result);
            }
        }
    }

    public function get_test_details()
    {
        $data['activemenu'] = 'ocean_champ';
        $this->session->set_userdata($data);
        $job_seeker_id = $this->session->userdata('job_seeker_id');
        $test_id = $this->input->post('test_id');
        // $join = array('oceanchamp_tests'=>'oceanchamp_tests.test_id = forwarded_tests.test_id');
        $where = "oceanchamp_tests.status='1' AND oceanchamp_tests.test_id='$test_id' ";
        $data['ocean_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where, $join = false , $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = false, $limit = false, $start = false, $search = false);
        $where_cn = "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_cn);
        //$where_opt= "options.status=1";
        $data['options'] = $this->Master_model->getMaster('options');
        $where_state = "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic', $where_state);
        $where_subtopic = "subtopic.subtopic_status='1'";
        $data['subtopic'] = $this->Master_model->getMaster('subtopic', $where_subtopic);
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem', $where_lineitem);
        $data['company_active_jobs'] = $this->job_posting_model->get_company_active_jobs($employer_id);
        // echo  $this->db->last_query(); die;
        $this->load->view('fontend/jobseeker/list_skills', $data);
    }
     public function forword_test() {
        $employer_id = $this->input->post('company_id');
        if ($_POST) {
           
            $candiate_email = $this->input->post('candiate_email');
            $test_id = $this->input->post('test_id');
            $job_desc = $this->input->post('message');
            $email = explode(',', $candiate_email);
            $where_req = "test_id= '$test'";
            $join_req = array('topic' => 'topic.topic_id = oceanchamp_tests.topics');
            $req_details = $this->Master_model->getMaster('oceanchamp_tests', $where_req, $join_req, $order = false, $field = false, $select_job = false, $limit = false, $start = false, $search = false);
            for ($i = 0;$i < sizeof($email);$i++) {
                $where_can = "email='$email[$i]'";
                $can_data = $this->Master_model->getMaster('js_info', $where_can);
                if ($can_data) {
                    $seeker_id = $can_data[0]['job_seeker_id'];
                } else {
                    $new_JS_array = array('email' => $email[$i], 'js_token' => md5($email[$i]), 'create_at' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')));
                    $seeker_id = $this->Master_model->master_insert($new_JS_array, 'js_info');
                }
                $where_can = "email='$email[$i]'";
                $can_data = $this->Master_model->getMaster('js_info', $where_can);
                $where_cv = "js_email='$email[$i]' and company_id='$employer_id'";
                $cv_data = $this->Master_model->getMaster('corporate_cv_bank', $where_cv);
                if (empty($cv_data)) {
                    $cv_array = array('company_id' => $employer_id, 'js_name' => $can_data[0]['full_name'], 'js_email' => $can_data[0]['email'], 'js_mobile' => $can_data[0]['mobile_no'], 'created_on' => ddate('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')), 'created_by' => $employer_id);
                    $add_cv = $this->Master_model->master_insert($cv_array, 'corporate_cv_bank');
                    $cv_id = $add_cv;
                } else {
                    $cv_id = $cv_data[0]['cv_id'];
                }
                $test_array = array('job_seeker_id' => $seeker_id, 'company_id' => $employer_id, 'test_id' => $test_id, 'status' => 'Farwarded Test individually', 'updated_on' => date('Y-m-d'),);
                $whereres = "job_seeker_id='$seeker_id' and company_id = '$employer_id' and test_id = '$test_id'";
                $test_data = $this->Master_model->get_master_row('
                        forwarded_tests', $select = FALSE, $whereres);
                if (empty($test_data)) {
                    $frwd = $this->Master_model->master_insert($test_array, 'forwarded_tests');
                }
                if ($req_details) {
                    foreach ($req_details as $require) {
                    }
                }
                //     $external_array = array(
                //     'cv_id' => $cv_id,
                //     'company_id' => $employer_id,
                //     'job_post_id' => $job_post_id,
                //     'apply_id' => $apply,
                //     'status' => 1,
                //     'company_id' => $employer_id,
                //     'name' => $can_data[0]['full_name'],
                //     'email' => $can_data[0]['email'],
                //     'mobile' => $can_data[0]['mobile_no'],
                //   'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),
                // );
                // $frwd = $this->Master_model->master_insert($external_array, 'external_tracker');
                //     $frwd_array = array(
                //     'cv_id' => $cv_id,
                //     'company_id' => $employer_id,
                //     'job_post_id' => $job_post_id,
                //     'apply_id' => $apply,
                //     'status' => 1,
                //     'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),
                // );
                //      $frwd = $this->Master_model->master_insert($frwd_array, 'forwarded_jobs_cv');
                if ($frwd) {
                    $email_name = explode('@', $email[$i]);
                    $company_name = $this->session->userdata('company_name');
                    $subject = $company_name . ' has asked you to take a ' . $require['topic_name'] . ' Test ';
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
                            <a href="#"><img src="' . base_url() . 'upload/' . $require['company_logo'] . '" style="height: 50px;"> </a>
                            <br><br>Hi ' . $email_name[0] . ',<br>';
                    $message.= '<br/><b>' . $company_name . '</b> has asked you to take a test. Kindly click on the Test URL give below and follow the steps thereon. <br><br>
                        <a href="' . base_url() . 'job_seeker/ocean_test_start/' . base64_encode($test_id) . '"><button >Give Test</button></a><br><br><br></td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table><br><br>
                        Regards,<br><br>Team TheOcean.</div>';
                    $send = sendEmail_JobRequest($email[$i], $message, $subject);
                    //echo $send;
                    // echo $message;
                    $company_name = $this->session->userdata('company_name');
                    $data = array('company' => $company_name, 'action_taken_for' => $email[$i], 'field_changed' => 'Forwarded Job ', 'Action' => $company_name . ' Forwarded job for the position of ' . $require['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                }
                // else{
                //     redirect('employer/active_job');
                // }
                
            }
        }
        redirect('job_seeker/ocean_champ');
    }

} //end function



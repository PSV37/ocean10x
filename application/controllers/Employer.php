<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Employer extends MY_Employer_Controller {
    public $employer_id = "";
    public function __construct() {
        parent::__construct();
        $this->load->model('employer_login_model');
        $this->load->model('employer_login_model');
        $this->load->model('job_seeker_model');
        // $this->load->model('dashboard_model');
        //$this->load->model('global_model');
        $config = array('field' => 'job_slugs', 'table' => 'job_posting');
        $this->load->library('slug', $config);
    }
    public function index() {
        $employer_id = $this->session->userdata('company_profile_id');
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'dashboard';
        $this->session->set_userdata($data);
        $company_info = $this->company_profile_model->get($employer_id);
        $wheremsg = "created_by='$employer_id'";
        $Join_data = array('messaging' => 'messaging.connection_id = emp_js_connection.emp_js_connection_id|Left OUTER ');
        $whereres = "emp_id='$employer_id' or js_id = '$employer_id'";
        $whereres.= "group by emp_js_connection.emp_js_connection_id";
        $chatbox = $this->Master_model->getMaster('emp_js_connection', $where = $whereres, $join = $Join_data, $order = 'desc', $field = 'max', $select = ' messaging.*, MAX( messaging.message_id) as max,emp_js_connection.*', $limit = false, $start = false, $search = false);
        $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
        $where_c['company_id'] = $employer_id;
        $cv_bank_data = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join = false, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
        $open_positions = $this->job_posting_model->open_positions_active_jobs($employer_id);
        //echo $this->db->last_query(); die;
        //print_r($open_positions); die;
        $open_positions = (array)$open_positions;
        $where_offer = "job_apply.job_post_id='$job_id' and (forwarded_jobs_cv.tracking_status=7 or external_tracker.tracking_status=7)";
        $join_test_passed = array('forwarded_jobs_cv' => 'forwarded_jobs_cv.job_post_id=job_apply.job_post_id | Left ', 'external_tracker' => 'external_tracker.job_post_id=job_apply.job_post_id | Left ');
        $success_full_hiring = $this->Master_model->getMaster('job_apply', $where = $where_offer, $join = $join_test_passed, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        $today=date('Y-m-d');
        $where_comp = "company_profile_id='$employer_id'  ";
         $company_info = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where = $where_comp, $join = FALSE);
         $job_category = $company_info['company_skillset'];
          $where = "job_posting.job_category IN('".$job_category."') and job_deadline >= '$today' ";
         $jobs = $this->Master_model->getMaster('job_posting', $where , $join = FALSE, $order = 'desc', $field = 'job_post_id', $select = false,$limit=false,$start=false, $search=false);
        // print_r($this->db->last_query());die();s
         $config['base_url'] = base_url() . 'employer';
            $config['total_rows'] = sizeof($jobs);
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
               
                $this->session->set_userdata($data);
            }

            $this->pagination->initialize($config);
            $link = $this->pagination->create_links();
            $jobs = $this->Master_model->getMaster('job_posting', $where , $join = FALSE, $order = 'desc', $field = 'job_post_id', $select = false,$limit=$config['per_page'],$start=$page, $search=false);
        $this->load->view('fontend/employer/employer_dashboard', compact('success_full_hiring', 'open_positions', 'cv_bank_data', 'company_active_jobs', 'company_info', 'chatbox','jobs','link'));
    }
    /*** Dashboard ***/
    public function profile_setting() {
        $employer_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            $this->form_validation->set_rules('company_name', 'Company Name', 'required|regex_match[/^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i]');
            $this->form_validation->set_rules('company_email', 'Company Email', 'required');
            $this->form_validation->set_rules('company_url', 'Company URL', 'required|valid_url');
            $this->form_validation->set_rules('country_code', 'Country Code', 'required');
            $this->form_validation->set_rules('company_phone', 'Company Phone', 'required|min_length[10]|integer');
            $this->form_validation->set_rules('company_category', 'Company Services', 'required');
            $this->form_validation->set_rules('company_address1', 'Company Address 1', 'required');
            $this->form_validation->set_message('required', 'This field is mandatory');
            if ($this->form_validation->run() == FALSE) {
                $wheres = "status='0' AND company_profile_id='$employer_id'";
                $branches = $this->Master_model->getMaster('company_branches', $where = $wheres);
                // $company_info = $this->company_profile_model->get($employer_id);
                $country = $this->Master_model->getMaster('country', $where = false);
                $this->load->view('fontend/employer/profile', compact('company_info', 'country', 'branches'));
            } else {
                $company_profile_id = $this->session->userdata('company_profile_id');
                $whereres = "company_profile_id='$company_profile_id'";
                $old_company_profile = $this->Master_model->get_master_row('company_profile', $select = FALSE, $whereres);
                $old_array_keys = array_keys($old_company_profile);
                $old_array_values = array_values($old_company_profile);
                $size = sizeof($old_array_keys);
                for ($i = 0;$i < $size;$i++) {
                    $parameter = $old_array_keys[$i];
                    $old_data = $old_array_values[$i];
                    $new_data = $this->input->post($parameter);
                    if (isset($new_data) && !empty($new_data)) {
                        if ($old_data == $new_data) {
                        } else {
                            $company_name = $this->session->userdata('company_name');
                            $action = str_replace("_", ' ', $parameter);
                            $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => $action, 'Action' => 'Changed ' . $action, 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                            // print_r($this->db->last_query());die;
                            
                        }
                    }
                }
                // $skill_set=explode(delimiter, string)
                $company_profile = array('company_name' => $this->input->post('company_name'), 'company_url' => $this->input->post('company_url'), 'country_code' => $this->input->post('country_code'), 'company_phone' => $this->input->post('company_phone'), 'company_category' => $this->input->post('company_category'), 'contact_name' => $this->input->post('contact_name'), 'hot_jobs' => $this->input->post('hot_jobs'), 'company_skillset' => implode(',', $this->input->post('company_skillset')) ,
                    'alert_comp' => $this->input->post('alert_comp'),'company_career_link' => $this->input->post('company_career_link'), 'company_address' => $this->input->post('company_address1'), 'company_address2' => $this->input->post('company_address2'), 'country_id' => $this->input->post('country_id'), 'state_id' => $this->input->post('state_id'), 'city_id' => $this->input->post('city_id'), 'company_pincode' => $this->input->post('company_pincode'), 'company_aboutus' => $this->input->post('company_aboutus'), 'cont_person_level' => 'Admin', 'alternate_email_id' => $this->input->post('alternate_email_id'), 'cont_person_email' => $this->input->post('cont_person_email'), 'cont_person_mobile' => $this->input->post('cont_person_mobile'), 'comp_gstn_no' => $this->input->post('comp_gst_no'), 'comp_pan_no' => $this->input->post('comp_pan_no'), 'updated_by' => $this->session->userdata('company_profile_id'), 'update_at' => date('Y-m-d H:i:s'));
                $company_logo = isset($_FILES['company_logo']['name']) ? $_FILES['company_logo']['name'] : null;
                if (!empty($employer_id) || !empty($company_logo)) {
                    if (!empty($company_logo)) {
                        $config['upload_path'] = 'upload/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['encrypt_name'] = true;
                        $config['max_size'] = 1000;
                        $config['max_width'] = 300;
                        $config['max_height'] = 300;
                        $this->load->library('upload', $config);
                        $result_upload = $this->upload->do_upload('company_logo');
                        $upload_data = $this->upload->data();
                        $company_logo = $upload_data['file_name'];
                        $company_profile['company_logo'] = $company_logo;
                        if (!$result_upload == true) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Logo Size Max size 300*300</div>');
                            redirect('employer/profile-setting');
                        }
                    }
                }
                if (!empty($employer_id)) {
                    $branch_address = $this->input->post('Branchname');
                    $country = $this->input->post('BranchCountry');
                    $state = $this->input->post('Branchstate');
                    $city = $this->input->post('BranchCity');
                    $pincode = $this->input->post('Branchpincodes');
                    if (isset($branch_address) && !empty($branch_address) && !empty($country) && !empty($state) && !empty($city) && !empty($pincode)) {
                        $branchadddata = explode(",", $branch_address);
                        $branchcountrydata = explode(",", $country);
                        $branchstatedata = explode(",", $state);
                        $branchcitydata = explode(",", $city);
                        $branchpincodedata = explode(",", $pincode);
                        $size = sizeof($branchadddata);
                        for ($i = 0;$i < $size;$i++) {
                            $response['branch_address'] = $branchadddata[$i];
                            $response['country'] = $branchcountrydata[$i];
                            $response['state'] = $branchstatedata[$i];
                            $response['city'] = $branchcitydata[$i];
                            $response['pincode'] = $branchpincodedata[$i];
                            $response['company_profile_id'] = $employer_id;
                            $response['created_on'] = date('Y-m-d H:i:s');
                            // print_r($response);
                            $result = $this->Master_model->master_insert($response, 'company_branches');
                        }
                    }
                    $wheres = "status='0' AND company_profile_id='$employer_id' ";
                    $branches = $this->Master_model->getMaster('company_branches', $where = $wheres);
                    $this->company_profile_model->update($company_profile, $employer_id);
                    $del = array('address' => $this->input->post('company_address'));
                    $where11['org_id'] = $employer_id;
                    $this->Master_model->master_update($del, 'employee', $where11);
                    $company_profile_id = $this->session->userdata('company_profile_id');
                    $whereres = "company_profile_id='$company_profile_id'";
                    $employer_data = $this->Master_model->get_master_row('company_profile', $select = FALSE, $whereres);
                    if ($employer_data['last_login'] == "0000-00-00 00:00:00") {
                        $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">“To start using TheOcean resources, we have created 3 users. Please enter their details !</div>');
                        redirect('employer/addemployee');
                    } else {
                        $this->session->set_flashdata('success_msg', '<div class="alert alert-success text-center">Profile Updated Successfully !</div>');
                        $company_info = $this->company_profile_model->get($employer_id);
                        $country = $this->Master_model->getMaster('country', $where = false);
                        $this->load->view('fontend/employer/profile', compact('company_info', 'country', 'branches'));
                    }
                }
            }
        } else {
            $wheres = "status='0' AND company_profile_id='$employer_id'";
            $branches = $this->Master_model->getMaster('company_branches', $where = $wheres);
            $company_info = $this->company_profile_model->get($employer_id);
            $country = $this->Master_model->getMaster('country', $where = false);
            $this->load->view('fontend/employer/profile', compact('company_info', 'country', 'branches'));
        }
    }
    public function job_post() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'job_post';
        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
        if (isset($_POST['preview'])) {
            // echo "preview"; die();
            $this->form_validation->set_rules('job_title', 'job title', 'required');
            $this->form_validation->set_rules('city_id', 'Job Location', 'required');
            $this->form_validation->set_rules('exp_from', 'Experience To', 'required|max_length[2]');
            $this->form_validation->set_rules('exp_to', 'Experience To', 'required|max_length[2]');
            $this->form_validation->set_rules('no_jobs', 'Number of Positions', 'required');
            $this->form_validation->set_rules('job_edu', 'Education Level', 'required');
            $this->form_validation->set_rules('job_nature', 'Engagement Model', 'required');
            // $this->form_validation->set_rules('preffered_certificates', 'Certification Preferred', 'required');
            $this->form_validation->set_rules('job_test_requirment', 'Ocean Test Required', 'required');
            $this->form_validation->set_rules('salrange_from', 'Salary Range From', 'required|max_length[2]');
            $this->form_validation->set_rules('salrange_to', 'Salary Range To', 'required|max_length[2]');
            $this->form_validation->set_rules('benefits[]', 'benefits', 'required');
            $this->form_validation->set_rules('skill_set[]', 'skills', 'required');
            $this->form_validation->set_message('required', 'This field is mandatory');
            $this->form_validation->set_message('max_length', 'max_length');
            if ($this->form_validation->run() == FALSE) {
                // $data['country']         = $this->Master_model->getMaster('country', $where = false);
                // $data['state']           = $this->Master_model->getMaster('state', $where = false);
                $data['benefits'] = $this->Master_model->getMaster('common_company_benifits', $where = false);
                $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
                $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
                $where_cn = "status=1";
                $select = "job_role_title, skill_set ,id";
                $data['job_role_data'] = $this->Master_model->getMaster('job_role', $where_cn, $join = FALSE, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
                $this->load->view('fontend/employer/post_new_job', $data);
            } else {
                $salrange_from = $this->input->post('salrange_from');
                $salrange_to = $this->input->post('salrange_to');
                $salary_range = $salrange_from . '-' . $salrange_to;
                $exp_from = $this->input->post('exp_from');
                $exp_to = $this->input->post('exp_to');
                $experience = $exp_from . '-' . $exp_to;
                $employer_id = $this->session->userdata('company_profile_id');
                $job_deadline = strtolower($this->input->post('job_deadline'));
                $job_post_id = $this->input->post('job_post_id');
                $job_description = isset($_FILES['job_description']['name']) ? $_FILES['job_description']['name'] : null;
                // print_r($_FILES);die;
                if (!empty($job_description)) {
                    $config['upload_path'] = 'upload/job_description/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = false;
                    $config['max_size'] = 1000;
                    $config['max_width'] = 300;
                    $config['max_height'] = 300;
                    $this->load->library('upload', $config);
                    $result_upload = $this->upload->do_upload('job_description');
                    $upload_data = $this->upload->data();
                    $jd_file = $upload_data['file_name'];
                    $job_desc_file = $jd_file;
                    if (!$result_upload == true) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Logo Size Max size 300*300</div>');
                        redirect('employer/profile-setting');
                    }
                }
                $all_skills = array();
                $skills = $this->input->post('skill_set');
                foreach ($skills as $row) {
                    if (is_numeric($row) == 1) {
                        array_push($all_skills, $row);
                    } else {
                        $where_sk = "skill_name = '$row' and status=1";
                        $select_sk = "skill_name ,id";
                        $skills_data = $this->Master_model->getMaster('skill_master', $where_sk, $join = FALSE, $order = false, $field = false, $select_sk, $limit = false, $start = false, $search = false);
                        if (empty($skills_data)) {
                            $skill = array('skill_name' => $row, 'created_by' => $employer_id, 'created_date' => date('Y-m-d'));
                            $result = $this->Master_model->master_insert($skill, 'skill_master');
                            if (isset($result) && !empty($result)) {
                                array_push($all_skills, $result);
                            }
                        } else {
                            // print_r($skills_data);/
                            $skill_id = $skills_data[0]['id'];
                            if (isset($skill_id) && !empty($skill_id)) {
                                array_push($all_skills, $skill_id);
                            }
                        }
                    }
                    # code...
                    
                }
                $job_info = array(
                    'company_profile_id'=> $employer_id, 
                    'job_title'=>$this->input->post('job_title'), 
                    'job_slugs' => $this->slug->create_uri($this->input->post('job_title')), 
                    'job_desc' => $this->input->post('job_desc'), 
                    'job_category' => $this->input->post('job_category'), 
                    'education' => $this->input->post('education'), 
                    'benefits' => implode(',', $this->input->post('benefits')), 
                    'experience' => $experience, 
                    'city_id' => $this->input->post('city_id'), 
                    'job_nature' => $this->input->post('job_nature'), 
                    'job_edu' => $this->input->post('job_edu'), 
                    'no_jobs' => $this->input->post('no_jobs'), 
                    'preffered_certificates' => $this->input->post('preffered_certificates'), 
                    'job_role' => $this->input->post('job_role'), //new added field
                'skills_required' => implode(',', $all_skills), //new added field
                'salary_range' => $salary_range, 
                "job_deadline" => date('Y-m-d', strtotime($this->input->post('job_deadline'))), "job_status" => '0', 
                'is_test_required' => $this->input->post('job_test_requirment'),
               'test_for_job' => $this->input->post('test_for_job'),
               'created_at'      => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                if (isset($job_desc_file) && !empty($job_desc_file)) {
                    $job_info['jd_file'] = $job_desc_file;
                } elseif (empty($this->input->post('jd_session'))) {
                    $job_info['jd_file'] = "";
                } else {
                    $whereres = "job_post_id='$job_post_id'";
                    $old_job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $whereres);
                    $job_info['jd_file'] = $old_job_details['jd_file'];
                }
                if (isset($job_post_id) && !empty($job_post_id)) {
                    $whereres = "job_post_id='$job_post_id'";
                    $old_job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $whereres);
                    $old_array_keys = array_keys($old_job_details);
                    $old_array_values = array_values($old_job_details);
                    // print_r($old_array_keys);
                    // print_r($old_array_values);die;
                    $size = sizeof($old_array_keys);
                    for ($i = 0;$i < $size;$i++) {
                        $parameter = $old_array_keys[$i];
                        $old_data = $old_array_values[$i];
                        $new_data = $job_info[$parameter];
                        if (isset($new_data) && !empty($new_data)) {
                            if (($old_data == $new_data) || ($parameter == 'job_slugs')) {
                            } else {
                                $company_name = $this->session->userdata('company_name');
                                $action = str_replace("_", ' ', $parameter);
                                $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => $action, 'Action' => 'Changed ' . $action . ' In posted job for ' . $this->input->post('job_title'), 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                                // print_r($this->db->last_query());die;
                                
                            }
                        }
                    }
                    $this->job_posting_model->update($job_info, $job_post_id);
                    $job_info['job_id'] = $job_post_id;
                } else {
                    $job_info['job_id'] = $this->job_posting_model->insert($job_info);
                }
                // $job_info['skills'] = $all_skills;
                $job_info['benefits'] = $this->input->post('benefits');
                $ed = $this->input->post('job_edu');
                $job_info['edu'] = $ed;
                $where_int = "education_level_id='$ed'";
                $job_info['education'] = $this->Master_model->get_master_row('education_level', $select = FALSE, $where_int, $join = FALSE);
                $job_role = $this->input->post('job_role');
                $job_info['jobrole'] = $job_role;
                $where_role = "id='$job_role'";
                $job_info['job_role'] = $this->Master_model->get_master_row('job_role', $select = FALSE, $where_role, $join = FALSE);
                $job_nature = $this->input->post('job_nature');
                $job_info['jobnature'] = $job_nature;
                $where_int = "job_nature_id='$job_nature'";
                $job_info['job_nature'] = $this->Master_model->get_master_row('job_nature', $select = FALSE, $where_int, $join = FALSE);
                // print_r($job_info);
                // if (empty($job_post_id)) {
                $this->load->view('fontend/employer/job_preview', $job_info);
            }
        } elseif (isset($_POST['edit'])) {
            $company_id = $this->session->userdata('company_profile_id');
            $job_id = $this->input->post('job_id');
            if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                $data['job_info'] = $this->job_posting_model->get($job_id);
                // $data['country']         = $this->Master_model->getMaster('country', $where = false);
                // $data['state']           = $this->Master_model->getMaster('state', $where = false);
                $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
                $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where = false);
                $data['benefits'] = $this->Master_model->getMaster('common_company_benifits', $where = false);
                $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
                $where_cn = "status=1";
                $select = "job_role_title, skill_set ,id";
                $data['job_role_data'] = $this->Master_model->getMaster('job_role', $where_cn, $join = FALSE, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
                $data['education_specialization'] = $this->Master_model->getMaster('education_specialization', $where = false);
                $this->load->view('fontend/employer/post_new_job', $data);
            }
        } elseif (isset($_POST['post_preview'])) {
            $job_post_id = $this->input->post('job_id');
            $company_profile_id = $this->session->userdata('company_profile_id');
            $whereres = "job_post_id='$job_post_id'";
            $job_info['job_status'] = '1';
            $this->job_posting_model->update($job_info, $job_post_id);
            // redirect('job/show/'.$job_info['job_slugs']);
            $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  A New Job Post has been created Successfully ! 
                  </div>');
            redirect('employer/active_job');
        } elseif ($_POST) {
            $this->form_validation->set_rules('job_title', 'job title', 'required');
            $this->form_validation->set_rules('city_id', 'Job Location', 'required');
            $this->form_validation->set_rules('exp_from', 'Experience To', 'required|max_length[2]');
            $this->form_validation->set_rules('exp_to', 'Experience To', 'required|max_length[2]');
            $this->form_validation->set_rules('no_jobs', 'Number of Positions', 'required');
            $this->form_validation->set_rules('job_edu', 'Education Level', 'required');
            $this->form_validation->set_rules('job_nature', 'Engagement Model', 'required');
            $this->form_validation->set_rules('preffered_certificates', 'Certification Preferred', 'required');
            $this->form_validation->set_rules('job_test_requirment', 'Ocean Test Required', 'required');
            $this->form_validation->set_rules('salrange_from', 'Salary Range From', 'required|max_length[2]');
            $this->form_validation->set_rules('salrange_to', 'Salary Range To', 'required|max_length[2]');
            $this->form_validation->set_rules('benefits[]', 'benefits', 'required');
            $this->form_validation->set_rules('skill_set[]', 'skills', 'required');
            // $this->form_validation->set_rules('job_description', 'job description file', 'contactVerify');
            // if(empty($this->input->post('job_desc')) && empty($_FILES['job_description'] )){
            //     $this->form_validation->set_rules('job_desc', 'job description', 'required');
            //        $this->form_validation->set_message('contactVerify', 'Please enter atleast one of Job Description or Upload JD');
            //    }
            $this->form_validation->set_message('required', 'This field is mandatory');
            $this->form_validation->set_message('max_length', 'max_length');
            if ($this->form_validation->run() == FALSE) {
                // $data['country']         = $this->Master_model->getMaster('country', $where = false);
                // $data['state']           = $this->Master_model->getMaster('state', $where = false);
                $data['benefits'] = $this->Master_model->getMaster('common_company_benifits', $where = false);
                $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
                $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
                $where_cn = "status=1";
                $select = "job_role_title, skill_set ,id";
                $data['job_role_data'] = $this->Master_model->getMaster('job_role', $where_cn, $join = FALSE, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
                $this->load->view('fontend/employer/post_new_job', $data);
            } else {
                $salrange_from = $this->input->post('salrange_from');
                $salrange_to = $this->input->post('salrange_to');
                $salary_range = $salrange_from . '-' . $salrange_to;
                $exp_from = $this->input->post('exp_from');
                $exp_to = $this->input->post('exp_to');
                $experience = $exp_from . '-' . $exp_to;
                $employer_id = $this->session->userdata('company_profile_id');
                $job_deadline = strtolower($this->input->post('job_deadline'));
                $job_post_id = $this->input->post('job_post_id');
                $skills = $this->input->post('skill_set');
                $job_description = isset($_FILES['job_description']['name']) ? $_FILES['job_description']['name'] : null;
                // print_r($_FILES);die;
                if (!empty($job_description)) {
                    $config['upload_path'] = 'upload/job_description/';
                    $config['allowed_types'] = '*';
                    $config['encrypt_name'] = false;
                    $config['max_size'] = 1000;
                    $config['max_width'] = 300;
                    $config['max_height'] = 300;
                    $this->load->library('upload', $config);
                    $result_upload = $this->upload->do_upload('job_description');
                    $upload_data = $this->upload->data();
                    $jd_file = $upload_data['file_name'];
                    $job_desc_file = $jd_file;
                    if (!$result_upload == true) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Logo Size Max size 300*300</div>');
                        redirect('employer/profile-setting');
                    }
                }
                $all_skills = array();
                foreach ($skills as $row) {
                    if (is_numeric($row) == 1) {
                        array_push($all_skills, $row);
                    } else {
                        $where_sk = "skill_name = '$row' and status=1";
                        $select_sk = "skill_name ,id";
                        $skills_data = $this->Master_model->getMaster('skill_master', $where_sk, $join = FALSE, $order = false, $field = false, $select_sk, $limit = false, $start = false, $search = false);
                        if (empty($skills_data)) {
                            $skill = array('skill_name' => $row, 'created_by' => $employer_id, 'created_date' => date('Y-m-d'));
                            $result = $this->Master_model->master_insert($skill, 'skill_master');
                            if (isset($result) && !empty($result)) {
                                array_push($all_skills, $result);
                            }
                        } else {
                            // print_r($skills_data);/
                            $skill_id = $skills_data[0]['id'];
                            if (isset($skill_id) && !empty($skill_id)) {
                                array_push($all_skills, $skill_id);
                            }
                        }
                    }
                }
                $job_info = array('company_profile_id' => $employer_id, 
                    'job_title' => $this->input->post('job_title'), 
                    'job_slugs' => $this->slug->create_uri($this->input->post('job_title')), 
                    'job_desc' => $this->input->post('job_desc'), 
                    'job_category' => $this->input->post('job_category'), 
                    'education' => $this->input->post('education'), 
                    'benefits' => implode(',', $this->input->post('benefits')), 
                    'experience' => $experience, 
                    'city_id' => $this->input->post('city_id'), 
                    'job_nature' => $this->input->post('job_nature'), 
                    'job_edu' => $this->input->post('job_edu'), 
                    'no_jobs' => $this->input->post('no_jobs'), 
                    'preffered_certificates' => $this->input->post('preffered_certificates'), 
                    'job_role' => $this->input->post('job_role'), //new added field
                'skills_required' => implode(',', $skills), //new added field
                'salary_range' => $salary_range, 
                "job_deadline" => date('Y-m-d', strtotime($this->input->post('job_deadline'))),
                //                   'preferred_age'      => $this->input->post('preferred_age_from'),
                'test_for_job' => $this->input->post('test_for_job'),
               
                'is_test_required' => $this->input->post('job_test_requirment'));
                if (isset($job_desc_file) && !empty($job_desc_file)) {
                    $job_info['jd_file'] = $job_desc_file;
                }
                // print_r($job_info);
                if (empty($job_post_id)) {
                    $job_info['created_at']  = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                    $job_id = $this->job_posting_model->insert($job_info);
                    $company_name = $this->session->userdata('company_name');
                    $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Posted A new Job', 'Action' => 'Posted A new  Job ', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                    $where_job = "job_post_id = '$job_id'";
                    $join_job = array('job_nature' => 'job_nature.job_nature_id=job_posting.job_nature', 'job_category' => 'job_category.job_category_id=job_posting.job_category', 'job_role' => 'job_role.id=job_posting.job_role', 'education_level' => 'education_level.education_level_id=job_posting.job_edu');
                    $job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $where = $where_job, $join = $join_job);
                    $to_email = $this->session->userdata('email');
                    $this->company_profile_model->sendjobEmail($to_email, $job_details);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                  A New Job Post has been created Successfully !
                  </div>');
                    // redirect('job/show/'.$job_info['job_slugs']);
                    redirect('employer/active_job');
                } else {
                    $company_profile_id = $this->session->userdata('company_profile_id');
                    $whereres = "job_post_id='$job_post_id'";
                    $old_job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $whereres);
                    $old_array_keys = array_keys($old_job_details);
                    $old_array_values = array_values($old_job_details);
                    // print_r($old_array_keys);
                    // print_r($old_array_values);die;
                    $size = sizeof($old_array_keys);
                    for ($i = 0;$i < $size;$i++) {
                        $parameter = $old_array_keys[$i];
                        $old_data = $old_array_values[$i];
                        $new_data = $job_info[$parameter];
                        if (isset($new_data) && !empty($new_data)) {
                            if (($old_data == $new_data) || ($parameter == 'job_slugs')) {
                            } else {
                                $company_name = $this->session->userdata('company_name');
                                $action = str_replace("_", ' ', $parameter);
                                $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => $action, 'Action' => 'Changed ' . $action . ' In posted job for ' . $this->input->post('job_title'), 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                                // print_r($this->db->last_query());die;
                                
                            }
                        }
                    }
                    $job_info['update_at']  = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                    $this->job_posting_model->update($job_info, $job_post_id);
                    $this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                   Job Details Updated Succcessfully!
                  </div>');
                    // redirect('job/show/'.$job_info['job_slugs']);
                    redirect('employer/active_job');
                }
            }
        } else {
            $array_items = array('title', 'job_desc', 'edu', 'benefits', 'experience', 'location', 'jobnature', 'no_jobs', 'jobrole', 'skills', 'salary_range', 'jd_file', 'exp_from', 'exp_to', 'salrange_to', 'salrange_from', 'job_category');
            $this->session->unset_userdata($array_items);
            $data['country'] = $this->Master_model->getMaster('country', $where = false);
            $data['state'] = $this->Master_model->getMaster('state', $where = false);
            $data['benefits'] = $this->Master_model->getMaster('common_company_benifits', $where = false);
            $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
            $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
            $where_cn = "status=1";
            $select = "job_role_title, skill_set ,id";
            $data['job_role_data'] = $this->Master_model->getMaster('job_role', $where_cn, $join = FALSE, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
            $employer_id = $this->session->userdata('company_profile_id');
            $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id'";
            $data['oceanchamp_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where_all);
            $this->load->view('fontend/employer/post_new_job', $data);
            // $this->load->view('fontend/employer/job_post', $data);
            
        }
    }
    public function manage_job() {
        $employer_id = $this->session->userdata('company_profile_id');
        $company_all_jobs = $this->job_posting_model->get_company_all_jobs($employer_id);
        $this->load->view('fontend/employer/managejob', compact('company_all_jobs', 'employer_id'));
    }
    public function delete_job($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                $this->job_posting_model->delete_job_by_company($job_id, $company_id);
                $whereres = "job_post_id='$job_id'";
                $old_job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $whereres);
                $company_name = $this->session->userdata('company_name');
                $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted Job', 'Action' => 'Deleted ' . $old_job_details['job_title'] . ' Job .', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                redirect_back();
            } else {
                echo "error";
            }
        } else {
            echo "not found";
        }
    }
    public function deactivate_job($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                $del = array('job_status' => '2');
                $where11['job_post_id'] = $job_id;
                $this->Master_model->master_update($del, 'job_posting', $where11);
                $whereres = "job_post_id='$job_id'";
                $old_job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $whereres);
                $company_name = $this->session->userdata('company_name');
                $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted Job', 'Action' => 'Deleted ' . $old_job_details['job_title'] . ' Job .', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Job Post has been moved to Trash !</div>');
                redirect_back();
            } else {
                echo "error";
            }
        } else {
            echo "not found";
        }
    }
    public function delete_cv($cv_id = NULL) {
        $cv = base64_decode($cv_id);
        $del = array('js_status' => '1');
        $where11['cv_id'] = $cv;
        $this->Master_model->master_update($del, 'corporate_cv_bank', $where11);
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CV moved to the trash Successfully!</div>');
        redirect('employer/corporate_cv_bank');
    }
    public function recover_cv($cv_id) {
        $cv_status = array('js_status' => '0');
        $where11['cv_id'] = $cv_id;
        $this->Master_model->master_update($cv_status, 'corporate_cv_bank', $where11);
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CV restored Successfully!</div>');
        redirect('employer/corporate_cv_bank');
    }
    public function recover_job_post($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                $del = array('job_status' => '1');
                $where11['job_post_id'] = $job_id;
                $this->Master_model->master_update($del, 'job_posting', $where11);
                $whereres = "job_post_id='$job_id'";
                $old_job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $whereres);
                $company_name = $this->session->userdata('company_name');
                $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted Job', 'Action' => 'Deleted ' . $old_job_details['job_title'] . ' Job .', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Job Post has been restored Successfully!</div>');
                redirect_back();
            } else {
                echo "error";
            }
        } else {
            echo "not found";
        }
    }
    public function update_job($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            if ($this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
                $data['job_info'] = $this->job_posting_model->get($job_id);
                $data['city'] = $this->Master_model->getMaster('city', $where = false);
                $data['country'] = $this->Master_model->getMaster('country', $where = false);
                $data['state'] = $this->Master_model->getMaster('state', $where = false);
                $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
                $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where = false);
                $data['benefits'] = $this->Master_model->getMaster('common_company_benifits', $where = false);
                $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
                $where_cn = "status=1";
                $select = "job_role_title, skill_set ,id";
                $data['job_role_data'] = $this->Master_model->getMaster('job_role', $where_cn, $join = FALSE, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
                $data['education_specialization'] = $this->Master_model->getMaster('education_specialization', $where = false);
                $employer_id = $this->session->userdata('company_profile_id');
                $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id'";
                $data['oceanchamp_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where_all);
                $this->load->view('fontend/employer/post_new_job', $data);
            } else {
                echo "error";
            }
        } else {
            echo "not found";
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('employer_login');
    }
    public function applicants($postid = null, $company_id = null) {
        $postid = $postid;
        $company_id = $company_id;
        if ($postid == null || $company_id == null) {
            echo "404 ";
        } else {
            $applicants = $this->job_apply_model->only_job_applicants($postid, $company_id);
            $this->load->view('fontend/employer/job_applicants', compact('applicants'));
        }
    }
    public function view_cv($job_seeker_id, $job_post_id) {
        $company_id = $this->session->userdata('company_profile_id');
        if ($this->job_apply_model->check_apply_job($job_seeker_id, $company_id, $job_post_id) == true) {
            $cv = $this->job_seeker_model->resume_view_by_id($job_seeker_id);
            $this->load->view('fontend/employer/view_cv', compact('cv'));
            print_r($cv);
        } else {
            $this->load->view('fontend/employer/cv_notfound');
        }
    }
    public function uff() {
        $this->load->view('fontend/employer/job_details');
    }
    public function change_password() {
        if ($_POST) {
            $employer_id = $this->session->userdata('company_profile_id');
            $oldpassword = md5($this->input->post('oldpassword'));
            $newpassword = array('company_password' => md5($this->input->post('newpassword')));
            $data = $this->company_profile_model->change_password($employer_id, $oldpassword);
            if ($data == true) {
                if ($employer_id) {
                    $this->company_profile_model->update($newpassword, $employer_id);
                    $company_name = $this->session->userdata('company_name');
                    $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Changed Password', 'Action' => 'Changed Password', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                    $where_id = "company_profile_id = '$employer_id'";
                    $company_email = $this->Master_model->get_master_row('company_profile', $select = 'company_email', $where = $where_id, $join = FALSE);
                    $subject = "Password changed Succcessfully";
                    $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Your password changed successfully<br><br><br>

Team ConsultnHire!<br>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                    $send = sendEmail_JobRequest($company_email, $message, $subject);
                    $this->session->set_flashdata('change_password', '<div class="alert alert-success text-center">Password Changed Successfully !</div>');
                    redirect('employer/change_password');
                }
            } else {
                $this->session->set_flashdata('change_password', '<div class="alert alert-danger text-center"> Current Password is Incorrect !</div>');
                redirect('employer/change_password');
            }
        } else {
            $this->load->view('fontend/employer/change_password');
        }
    }
    public function active_job() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'active_job';
        $this->session->set_userdata($data);
        $data['employer_id'] = $this->session->userdata('company_profile_id');
        $employer_id = $data['employer_id'];
        $sort_val = $this->input->get('s');
        if (empty($sort_val)) {
            $sort_val = $this->input->post('sort_val');
        }
       
        // $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
        $where = "job_status = '1' and company_profile_id = '$employer_id'";
        $join = array('job_nature'=>'job_nature.job_nature_id=job_posting.job_nature',
            'job_category'=>'job_category.job_category_id=job_posting.job_category',
            'job_role'=>'job_role.id=job_posting.job_role',
            'education_level'=>'education_level.education_level_id=job_posting.job_edu',
            'oceanchamp_tests'=>'oceanchamp_tests.test_id = job_posting.test_for_job | Left');
        $select = "*,job_posting.created_at as posting_date";
        $jobs = $this->Master_model->getMaster('job_posting', $where , $join , $order = 'desc', $field = 'job_post_id', $select ,$limit=false,$start=false, $search=false);
        $config['base_url'] = base_url() . 'employer/active_job?s='.$sort_val;
            $config['total_rows'] = sizeof($jobs);
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
             $data["links"] = $this->pagination->create_links();
             if (isset($sort_val)) {
                $data['company_active_jobs'] = $this->Master_model->getMaster('job_posting', $where , $join , $order = 'desc', $field = $sort_val, $select,$limit=$config['per_page'],$start=$page, $search=false);
             }
             else
             {
                $data['company_active_jobs'] = $this->Master_model->getMaster('job_posting', $where , $join , $order = 'desc', $field = 'job_post_id', $select,$limit=$config['per_page'],$start=$page, $search=false);
             }
        $data['sort'] = $sort_val;
        $this->load->view('fontend/employer/posted_jobs', $data);
    }
    public function pending_job() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'pending_job';
        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
        $company_pending_jobs = $this->job_posting_model->get_company_pending_jobs($employer_id);
        $this->load->view('fontend/employer/pending_job.php', compact('company_pending_jobs', 'employer_id'));
    }
    public function selected_job() {
        $employer_id = $this->session->userdata('company_profile_id');
        $company_selected_jobs = $this->job_posting_model->get_company_selected_jobs($employer_id);
        $this->load->view('fontend/employer/selected_job.php', compact('company_selected_jobs', 'employer_id'));
    }
    public function non_selected_job() {
        $employer_id = $this->session->userdata('company_profile_id');
        $company_non_selected_jobs = $this->job_posting_model->get_company_non_selected_jobs($employer_id);
        $this->load->view('fontend/employer/non_selected_job.php', compact('company_non_selected_jobs', 'employer_id'));
    }
    public function all_applicant($job_id = null) {
        $company_id = $this->session->userdata('company_profile_id');
        if (!empty($job_id) && $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
            $total_applicantlist = $this->job_apply_model->only_job_applicants($job_id, $company_id);
            $totalrow = $total_applicantlist['total_row'];
            $job_details = $this->job_posting_model->get_job_details($job_id);
            $wherejob = "job_post_id='$job_id' AND company_id='$company_id'";
            $Join_data = array('interview_dates' => 'interview_dates.interview_id = interview_scheduler.id|Left OUTER ');
            $interview_data = $this->Master_model->getMaster('interview_scheduler', $wherejob, $Join = $Join_data, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
            $this->load->view('fontend/employer/job_details', compact('job_id', 'company_id', 'job_details', 'total_applicantlist', 'interview_data'));
        } else {
            echo "not found";
        }
    }
    public function reject_resume($resume_id = null) {
        if (!empty($resume_id)) {
            $this->job_apply_model->delete($resume_id);
            // $company_name=$this->session->userdata('company_name');
            //         $data=array('company'=>$company_name,
            //         'action_taken_for'=>$company_name,
            //         'field_changed' =>'Changed Password',
            //         'Action'=>$company_name.' Changed Password',
            //         'datetime'=>date('Y-m-d H:i:s'),
            //         'updated_by' =>$company_name);
            //         $result=$this->Master_model->master_insert($data,'employer_audit_record');
            redirect_back();
        } else {
            echo "not found";
        }
    }
    public function sortlist_cv($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            $sortlist_cvs = $this->job_apply_model->sorlist_applicants_cv($job_id, $company_id);
            $job_details = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/employer/sortlistcv', compact('job_id', 'company_id', 'job_details', 'sortlist_cvs'));
        } else {
            echo "not found";
        }
    }
    public function interview_cv($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            $interview_cvs = $this->job_apply_model->interview_applicants_cv($job_id, $company_id);
            $job_details = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/employer/interviewcvlist', compact('job_id', 'company_id', 'job_details', 'interview_cvs'));
        } else {
            echo "not found";
        }
    }
    public function final_cv($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            $final_cvs = $this->job_apply_model->final_applicants_cv($job_id, $company_id);
            $job_details = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/employer/finalcvlist', compact('job_id', 'company_id', 'job_details', 'final_cvs'));
        } else {
            echo "not Found";
        }
    }
    public function view_resumelist($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            $view_resumelist = $this->job_apply_model->view_resumelist($job_id, $company_id);
            $job_details = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/employer/view_resumelist', compact('job_id', 'company_id', 'job_details', 'view_resumelist'));
        } else {
            echo "not found";
        }
    }
    public function not_view_resumelist($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            $not_view_resumelist = $this->job_apply_model->not_view_resumelist($job_id, $company_id);
            $job_details = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/employer/not_view_resumelist', compact('job_id', 'company_id', 'job_details', 'not_view_resumelist'));
        } else {
            echo "not found";
        }
    }
    public function update_sortlist($apply_id, $email) {
        $email = base64_decode($email);
        $this->job_apply_model->sendEmail_job($email, 'short');
        $this->job_apply_model->update_sortlist($apply_id);
        redirect_back();
    }
    public function update_interviewlist($apply_id, $email) {
        $email = base64_decode($email);
        $this->job_apply_model->sendEmail_job($email, 'interview');
        $this->job_apply_model->update_interviewlist($apply_id, $job_seeker_id);
        redirect_back();
    }
    public function update_finallist($apply_id, $email) {
        $email = base64_decode($email);
        $this->job_apply_model->sendEmail_job($email, 'final');
        $this->job_apply_model->update_finallist($apply_id);
        redirect_back();
    }
    public function downloadcv($jobseeker_id = null) {
        if (!empty($jobseeker_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            if ($this->job_apply_model->check_resume_by_id($jobseeker_id, $company_id) == true) {
                $data['resume'] = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
                //echo "222";
                //echo $this->db->last_query();
                //echo "4444";
                $data['edcuaiton_list'] = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
                $data['experinece_list'] = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                $data['training_list'] = $this->Job_training_model->training_list_by_id($jobseeker_id);
                $data['reference_list'] = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
                //$data['js_personal_info'] = $this->job_seeker_personal_model->personalinfo_list_by_id($jobseeker_id);
                //$data['js_info'] = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
                //echo $this->db->last_query();
                //$data['city'] = $this->Master_model->getMaster('city',$where=false);
                //$data['country'] = $this->Master_model->getMaster('country',$where=false);
                //$data['state'] = $this->Master_model->getMaster('state',$where=false);
                echo $this->load->view('fontend/downloadcv', $data, true);
                die;
            } else {
                echo "not found";
            }
        } else {
            echo "not found";
        }
    }
    public function view_resume($jobseeker_id = null, $job_id = null) {
        if (!empty($jobseeker_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            if ($this->job_apply_model->check_apply_job($jobseeker_id, $company_id, $job_id) == true) {
                $where_req_skill = "js_ocean_exam_topics.job_seeker_id ='$jobseeker_id'";
                $join_r = array('skill_master' => 'skill_master.id = js_ocean_exam_topics.skill_id | INNER');
                $select = "js_ocean_exam_topics.id as exam_id,js_ocean_exam_topics.skill_id,js_ocean_exam_topics.level,js_ocean_exam_topics.topic_id,js_ocean_exam_topics.created_on,skill_master.skill_name";
                $final_result = $this->Master_model->getMaster('js_ocean_exam_topics', $where_req_skill, $join_r, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
                $resume = $this->job_seeker_model->resume_view_by_id($jobseeker_id);
                $edcuaiton_list = $this->Job_seeker_education_model->education_list_by_id($jobseeker_id);
                $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
                $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
                $reference_list = $this->Job_reference_model->reference_list_by_id($jobseeker_id);
                $this->job_apply_model->update_resume_view($jobseeker_id, $company_id, $job_id);
                $this->load->view('fontend/viewresume', compact('resume', 'edcuaiton_list', 'experinece_list', 'training_list', 'reference_list', 'language_list', 'job_id', 'final_result', 'jobseeker_id'));
            } else {
                echo "not found";
            }
        } else {
            echo "not found";
        }
    }
    function getstate() {
        $country_id = $this->input->post('id');
        $where['country_id'] = $country_id;
        $states = $this->Master_model->getMaster('state', $where);
        $result = '';
        if (!empty($states)) {
            $result.= '<option value="">Select State</option>';
            foreach ($states as $key) {
                $result.= '<option value="' . $key['state_id'] . '">' . $key['state_name'] . '</option>';
            }
        } else {
            $result.= '<option value="0">State not available</option>';
        }
        echo $result;
    }
    function getcity() {
        $state_id = $this->input->post('id');
        $where['state_id'] = $state_id;
        $citys = $this->Master_model->getMaster('city', $where);
        $result = '';
        if (!empty($citys)) {
            $result.= '<option value="" >Select City</option>';
            foreach ($citys as $key) {
                $result.= '<option value="' . $key['id'] . '" >' . $key['city_name'] . '</option>';
            }
        } else {
            $result.= '<option value="0">State not available</option>';
        }
        echo $result;
    }
    function get_access_specifierss() {
        $role_id = $this->input->post('id');
        $where['user_role_id'] = $role_id;
        $select_edu = "access_specifiers";
        $data = $this->Master_model->get_master_row("employee_access", $select_edu, $where, $join = FALSE);
        $accessSpecifiers = explode(',', $data['access_specifiers']);
        $result = '';
        if (!empty($accessSpecifiers)) {
            $result.= '<option value="">Select One</option>';
            foreach ($accessSpecifiers as $key) {
                // print_r($key);
                $result.= '<option value="' . $key . '">' . $key . '</option>';
            }
        } else {
            $result.= '<option value="">No access available</option>';
        }
        echo $result;
    }
    // To fetch getProfssionalSkillsDetails details
    function getSkillsByRole() {
        $id = $this->input->post('role_id');
        $whereres = "id='$id'";
        $role_data = $this->Master_model->get_master_row('job_role', $select = FALSE, $whereres);
        $sk = $role_data['skill_set'];
        if ($sk) {
            $where_sk = "id IN (" . $sk . ") AND status=1";
            $select_sk = "skill_name ,id";
            $skills = $this->Master_model->getMaster('skill_master', $where_sk, $join = FALSE, $order = false, $field = false, $select_sk, $limit = false, $start = false, $search = false);
            if (!empty($this->session->userdata('skills'))) {
                $sesseion_sk = $this->session->userdata('skills');
                if ($sesseion_sk) {
                    $where_sk = "id IN (" . $sesseion_sk . ") AND status=1";
                    $select_sk = "skill_name ,id";
                    $sesseion_skills = $this->Master_model->getMaster('skill_master', $where_sk, $join = FALSE, $order = false, $field = false, $select_sk, $limit = false, $start = false, $search = false);
                    $result = '';
                    if (!empty($sesseion_skills)) {
                        foreach ($sesseion_skills as $skill_row) {
                            $result.= '
                                  <div  id="myfields" class="myfields" >
                                  <ul class="rating-comments" >


                                    <label>
                                        <input type="checkbox" name="skill_set[]"  value=' . $skill_row['id'] . '  class="btn-default1" checked>
                                        <span>' . $skill_row['skill_name'] . '</span>
                                    </label>

                                
                                 </ul>
                              
                             </div>';
                        }
                        if (!empty($skills)) {
                            foreach ($skills as $skill_row) {
                                if (!in_array($skill_row, $sesseion_skills)) {
                                    $result.= '
                                      <div  id="myfields" class="myfields" >
                                      <ul class="rating-comments" >


                                        <label>
                                            <input type="checkbox" name="skill_set[]"  value=' . $skill_row['id'] . '  class="btn-default1" >
                                            <span>' . $skill_row['skill_name'] . '</span>
                                        </label>

                                    
                                     </ul>
                                  
                                 </div>';
                                }
                            }
                            //             $result .='<button type="button" value="other_skill"
                            
                        } else {
                            $result.= 'Skills Not Found ';
                        }
                    } else {
                        $result.= 'Skills Not Found ';
                    }
                }
            } else {
                $result = '';
                if (!empty($skills)) {
                    foreach ($skills as $skill_row) {
                        $result.= '
                              <div  id="myfields" class="myfields" >
                              <ul class="rating-comments" >


                                <label>
                                    <input type="checkbox" name="skill_set[]"  value=' . $skill_row['id'] . '  class="btn-default1" checked>
                                    <span>' . $skill_row['skill_name'] . '</span>
                                </label>

                            
                             </ul>
                          
                         </div>';
                    }
                } else {
                    $result.= 'Skills Not Found ';
                }
            }
        } else {
            $result.= 'Skills Not Found ';
        }
        echo $result;
    }
    function getEducation_specialization() {
        $level_id = $this->input->post('id');
        $where['edu_level_id'] = $level_id;
        $special = $this->Master_model->getMaster('education_specialization', $where);
        $result = '';
        if (!empty($special)) {
            $result.= '<option value="">Select Specilazation</option>';
            foreach ($special as $spec_row) {
                $result.= '<option value="' . $spec_row['id'] . '">' . $spec_row['education_specialization'] . '</option>';
            }
        } else {
            $result.= '<option value="">Specilazation Not Found </option>';
        }
        echo $result;
    }
    public function forword_job($job_id = null) {
        if (!empty($job_id)) {
            $company_id = $this->session->userdata('company_profile_id');
            $avail = $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id);
            if ($avail) {
                $data['job_id'] = $job_id;
                $company_name = $this->session->userdata('company_name');
                $data1 = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Forward Job', 'Action' => 'visited forward job.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data1, 'employer_audit_record');
                $this->load->view('fontend/employer/forword_job', $data);
            } else {
                redirect('employer/active_job');
            }
        } else {
            redirect('employer/active_job');
        }
    }
    public function forward_posted_job($fid=NULL) {
        $employer_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            if (!empty($this->input->post('forward_job_emails'))) {
                $candiate_email = $this->input->post('forward_job_emails');
            } elseif (!empty($this->input->post('forward_job_email'))) {
                $candiate_email = $this->input->post('forward_job_email');
                # code...
                
            }
            $job_post_id = $this->input->post('job_post_id');
            $job_desc = $this->input->post('message');
            // $mandatory       = $this->input->post('mandatory');
            if (isset($job_post_id) && !empty($job_post_id)) {
                # code...
                $email = explode(',', $candiate_email);
                $where_req = "job_post_id= '$job_post_id'";
                $join_req = array('job_types' => 'job_types.job_types_id = job_posting.job_types|LEFT OUTER', 'company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id|LEFT OUTER', 'city' => 'city.id = job_posting.city_id|LEFT OUTER', 'country' => 'country.country_id = job_posting.job_location|LEFT OUTER', 'state' => 'state.state_id = job_posting.state_id|LEFT OUTER', 'job_category' => 'job_category.job_category_id = job_posting.job_category|LEFT OUTER', 'job_nature' => 'job_nature.job_nature_id = job_posting.job_nature|LEFT OUTER', 'job_level' => 'job_level.job_level_id = job_posting.job_level|LEFT OUTER', 'job_role' => 'job_role.id = job_posting.job_role|LEFT OUTER', 'education_level' => 'education_level.education_level_id = job_posting.job_edu|LEFT OUTER', 'education_specialization' => 'education_specialization.id = job_posting.edu_specialization|LEFT OUTER');
                $select_job = "job_role.job_role_title,education_specialization.education_specialization,education_level.education_level_name,job_level.job_level_name,job_nature.job_nature_name,job_category.job_category_name,state.state_name,country.country_name,city.city_name,company_profile.company_name,company_profile.company_logo,job_types.job_types_name,job_posting.job_title,job_posting.job_position,job_posting.job_desc,job_posting.education,job_posting.salary_range,job_posting.job_deadline,job_posting.preferred_age,job_posting.preferred_age_to,job_posting.working_hours,job_posting.no_jobs,job_posting.benefits,job_posting.experience,job_posting.skills_required";
                $req_details = $this->Master_model->getMaster('job_posting', $where_req, $join_req, $order = false, $field = false, $select_job, $limit = false, $start = false, $search = false);
                // print_r($this->db->last_query());die;
                if ($req_details) {
                    foreach ($req_details as $require) {
                    }
                }
                $skill_id = $require['skills_required'];
                $where_req_skill = "skill_master.id IN (" . $skill_id . ")";
                $select_skill = "skill_master.skill_name";
                $req_skill_details = $this->Master_model->getMaster('skill_master', $where_req_skill, $join = false, $order = false, $field = false, $select_skill, $limit = false, $start = false, $search = false);
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
                        $cv_array = array('company_id' => $employer_id, 'js_name' => $can_data[0]['full_name'], 'js_email' => $can_data[0]['email'], 'js_mobile' => $can_data[0]['mobile_no'], 'created_on' => date('Y-m-d'), 'created_by' => $employer_id);
                        $add_cv = $this->Master_model->master_insert($cv_array, 'corporate_cv_bank');
                    }
                     $where_apply_job = "job_apply.job_seeker_id='$seeker_id' and company_id='$employer_id'and job_post_id = '$job_post_id'";
                    $apply_data = $this->Master_model->getMaster('job_apply', $where_apply_job);
                    if (empty($apply_data)) {
                        $apply_array = array('job_seeker_id' => $seeker_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'forword_job_status' => 1, 'updated_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),
                    // 'mandatory_parameters' => implode(',', $mandatory)
                    );
                    $apply = $this->Master_model->master_insert($apply_array, 'job_apply');
                    $external_array = array(
                        'cv_id' => $cv_data[0]['cv_id'], 
                        'company_id' => $employer_id, 
                        'job_post_id' => $job_post_id, 
                        'apply_id' => $apply, 'status' => 1, 
                        'company_id' => $employer_id, 
                        'name' => $can_data[0]['full_name'], 
                        'email' => $can_data[0]['email'], 
                        'mobile' => $can_data[0]['mobile_no'], 
                        'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                        $frwd = $this->Master_model->master_insert($external_array, 'external_tracker');
                        $frwd_array = array('cv_id' => $cv_data[0]['cv_id'], 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                        $frwd = $this->Master_model->master_insert($frwd_array, 'forwarded_jobs_cv');
                    if ($apply) {
                        $email_name = explode('@', $email[$i]);
                        $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . ',<br>' . $job_desc . '<br/><br/><em><b>Now Hiring!!</b></em> <br/><br/><b>Company Name:</b>' . $require['company_name'] . '<br/><br/> <b>Job Profile:</b><br/> <b>Job Title: </b> ' . $require['job_title'] . '<br/> <b>Experience: </b> ' . $require['experience'] . '<br/><b>Salary Offered: </b> ' . $require['salary_range'] . '<br/><b>Vacancies: </b> ' . $require['no_jobs'] . '<br/><b>Job Location: </b> ' . $require['city_name'] . '-' . $require['state_name'] . ',' . $require['country_name'] . '<br/><b>Job Role: </b> ' . $require['job_role_title'] . '<br/><b>Job Type: </b> ' . $require['job_types_name'] . '<br/><b>Job Nature: </b> ' . $require['job_nature_name'] . '<br/><b>Wrking Hrs: </b> ' . $require['working_hours'] . '<br/><b>Job Deadline: </b> ' . $require['job_deadline'] . '<br/><b>Education Required: </b> ' . $require['education_level_name'] . '(' . $require['education_specialization'] . ')' . '<br/><b>Preferred Age: </b> ' . $require['preferred_age'] . '-' . $require['preferred_age_to'] . '<br/><b>Required Skills: </b> ';
                        for ($j = 0;$j < sizeof($req_skill_details);$j++) {
                            $message.= ' <br>' . $req_skill_details[$j]['skill_name'];
                        }
                        $message.= '<br/><b>Job Description: </b> ' . $require['job_desc'] . '<br/><b>Job Benefits: </b> ' . $require['benefits'] . '<br/><b>Other Job Description: </b> ' . $require['education'] . '<br><br><a href="' . base_url() . 'job_forword_seeker/apply_forworded_job?apply_id=' . base64_encode($email[$i]) . '&job_id=' . base64_encode($apply) . '" class="btn btn-primary" value="Apply Now" align="center" target="_blank">Apply Now</a> <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><small>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</small><br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                        $send = sendEmail_JobRequest($email[$i], $message, $subject);
                        // echo $send;die;
                        // echo $message;
                        $company_name = $this->session->userdata('company_name');
                        $data = array('company' => $company_name, 'action_taken_for' => $email[$i], 'field_changed' => 'Forwarded Job ', 'Action' => $company_name . ' Forwarded job for the position of ' . $require['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    }
                    }
                    
                    
                    // else{
                    //     redirect('employer/active_job');
                    // }
                    
                }
                $tracker_type =$this->input->post('tracker_type');
                if (!empty($tracker_type)) {
                   $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Job Forwarded Successfully</div>');
                redirect('employer/internal_tracker');
                }
                else
                {
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Candidate added to this tracker and Job Forwarded Successfully !</div>');
                redirect('employer/corporate_cv_bank/'.$fid);
                }
            } else {
                $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">Please Select Appropriate Job Post..</div>');
                redirect('employer/corporate_cv_bank/'.$fid);
            }
        }
        redirect('employer/corporate_cv_bank');
    }
    public function forword_job_post() {
        $employer_id = $this->session->userdata('company_profile_id');
        $send_to = $this->input->post('consultant');
        // echo $send_to;
        if ($_POST) {
            $employer_id = $this->session->userdata('company_profile_id');
            $candiate_email = $this->input->post('candiate_email');
            $job_post_id = $this->input->post('job_post_id');
            $job_desc = $this->input->post('message_id');
            $mandatory = $this->input->post('mandatory');
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
                if ($send_to == "consultant") {
                    $where_cndn = "company_email='$email[$i]'";
                    $consultant_data = $this->Master_model->getMaster('company_profile', $where_cndn);
                    if ($consultant_data) {
                        $comp_id = $consultant_data[0]['company_profile_id'];
                    } else {
                        $new_JS_array = array('company_email' => $email[$i], 'token' => md5($email[$i]), 'create_at' => date('Y-m-d H:i:s'), 'comp_type' => "HR Consultant");
                        $comp_id = $this->Master_model->master_insert($new_JS_array, 'company_profile');
                        // echo $comp_id;
                        
                    }
                    $apply_array = array('company_profile_id' => $comp_id, 'job_post_id' => $job_post_id, 'created_on' => date('Y-m-d H:i:s'), 'created_by' => $comp_id);
                    $apply = $this->Master_model->master_insert($apply_array, 'consultants_jobs');
                    $whereres = "job_seeker_id='$seeker_id' and company_id = '$employer_id' and job_post_id = '$job_post_id'";
                    $job_apply_data = $this->Master_model->get_master_row('
                        job_apply', $select = FALSE, $whereres);
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Jobseeker has already applied to this job post</div>');
                    if (empty($job_apply_data)) {
                        $apply = $this->Master_model->master_insert($apply_array, 'job_apply');
                        $external_array = array(
                        'cv_id' => $cv_id, 
                        'company_id' => $employer_id, 
                        'job_post_id' => $job_post_id, 
                        'apply_id' => $apply, 
                        'status' => 1, 
                        'company_id' => $employer_id, 
                        'name'=>$can_data[0]['full_name'], 
                        'email'=> $can_data[0]['email'], 
                        'mobile'=>$can_data[0]['mobile_no'], 
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
                        $subject = $require['company_name'] . 'has invited you to apply for a New Job Post ';
                        $message = '
                                <style>
  .card div {border-radius:0px !important;}    
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
                  <br><br>Hi ' . $email_name[0] . ',<br>' . $job_desc . '<br/><br/>A new job post invitation has been sent to you by ' . $require['company_name'] . ' . Details of this job post are as follows:-<em><b>
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
                        <!-- <li class="left-title">Specialization</li><li class="right-title">&nbsp;:' . $require['education_specialization'] . '</li> -->
                        <!--  <li class="left-title">Joining ETA</li><li class="right-title">&nbsp;:30 days</li> -->
                        <!--  <li class="left-title">Benifits</li><li class="right-title">&nbsp;:' . $require->benefits . ' </li> -->
                        <!--   <li class="left-title">Dummy3</li><li class="right-title">&nbsp;:value</li> -->
                        <div class="clear"></div>
                      </div>
                      <div class="following-info3">
                        <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>
                        <li class="right-title">&nbsp;: ';
                        if (isset($require->jd_file) && !empty($require->jd_file)) {
                            $message.= 'Yes <a style="margin-left: 15px" href="' . base_url() . 'upload/job_description/' . $require->jd_file . '" download><i class="fa fa-download" aria-hidden="true"></i></a> ';
                        } else {
                            $message.= "No";
                        }
                        '
                        </li>
                        <li class="left-title">Ocean Test</li>
                        <li class="right-title">&nbsp;:' . $require['is_test_required'] . '</li>
                        <li class="left-title">Published on</li>
                        <li class="right-title">&nbsp;:';
                        if (!is_null($require->created_at)) {
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
                      <span>Skill sets</span>:
                      ';
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
                        $message.= '<br>
                      <span>Benefits</span>:';
                        $benefits = explode(',', $require['benefits']);
                        if (!empty($benefits)) {
                            $i = 0;
                            foreach ($benefits as $benefit) {
                                $message.= '
                      <lable class=""><button id="sklbtn">' . $benefits[$i] . '</button></lable>
                      ';
                                $i++;
                            }
                        }
                        if ($v_companyjobs->job_deadline > date('Y-m-d')) {
                            // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                            $message.= '<span class="active-span">Active</span>';
                        } else {
                            // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
                            $message.= '<span class="pasive-span">Expired</span>';
                        }
                        $message.= '
                    </div>
                  </div>
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
                        $data = array('company' => $company_name, 'action_taken_for' => $email[$i], 'field_changed' => 'Forwarded Job ', 'Action' => 'Forwarded job for the position of ' . $require['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Job Post has been Forwarded & Tracker Entry Created Successfully  !</div>');
                        redirect('employer/active_job');
                    }
                } else {
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
                        $cv_array = array('company_id' => $employer_id, 'js_name' => $can_data[0]['full_name'], 'js_email' => $can_data[0]['email'], 'js_mobile' => $can_data[0]['mobile_no'], 'created_on' => date('Y-m-d'), 'created_by' => $employer_id);
                        $add_cv = $this->Master_model->master_insert($cv_array, 'corporate_cv_bank');
                        $cv_id = $add_cv;
                    } else {
                        $cv_id = $cv_data[0]['cv_id'];
                    }
                    $apply_array = array('job_seeker_id' => $seeker_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'forword_job_status' => 1, 'updated_on' => date('Y-m-d'), 'mandatory_parameters' => implode(',', $mandatory));
                    $whereres = "job_seeker_id='$seeker_id' and company_id = '$employer_id' and job_post_id = '$job_post_id'";
                    $job_apply_data = $this->Master_model->get_master_row('
                        job_apply', $select = FALSE, $whereres);
                    if (empty($job_apply_data)) {
                        $apply = $this->Master_model->master_insert($apply_array, 'job_apply');
                        $external_array = array('cv_id' => $cv_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'company_id' => $employer_id, 'name' => $can_data[0]['full_name'], 'email' => $can_data[0]['email'], 'mobile' => $can_data[0]['mobile_no'], 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
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
            redirect('employer/active_job');
        }
    }
    public function forword_test() {
        $employer_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            $employer_id = $this->session->userdata('company_profile_id');
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
                    $new_JS_array = array('email' => $email[$i], 'js_token' => md5($email[$i]), 'create_at' => date('Y-m-d H:i:s'));
                    $seeker_id = $this->Master_model->master_insert($new_JS_array, 'js_info');
                }
                $where_can = "email='$email[$i]'";
                $can_data = $this->Master_model->getMaster('js_info', $where_can);
                $where_cv = "js_email='$email[$i]' and company_id='$employer_id'";
                $cv_data = $this->Master_model->getMaster('corporate_cv_bank', $where_cv);
                if (empty($cv_data)) {
                    $cv_array = array('company_id' => $employer_id, 'js_name' => $can_data[0]['full_name'], 'js_email' => $can_data[0]['email'], 'js_mobile' => $can_data[0]['mobile_no'], 'created_on' => date('Y-m-d'), 'created_by' => $employer_id);
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
        redirect('employer/all_tests');
    }
    //Function for Test topics tab
    public function topics_for_test($id) {
        //$data['job_info'] = $this->job_posting_model->get($id);
        $user_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            $topic_chk = $this->input->post('topic_chk');
            // $no_questions = $this->input->post('no_questions');
            $post_data = $this->input->post();
            if (empty($topic_chk)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Please Check Minimum One Checkbox</div>');
                $data['title'] = "Topic's For Test";
                $data['test_job_id'] = $id;
                $data['test_level'] = $this->Master_model->getMaster('job_level', $where = FALSE, $join = FALSE, $order = false, $field = false, $select = FALSE, $limit = false, $start = false, $search = false);
                $where_test_top = "job_test_topics.job_id='$id'";
                $select_test_topic = "job_test_topics.topic_id as test_topic,job_test_topics.no_questions,job_test_topics.test_level";
                $data['test_topic_master'] = $this->Master_model->getMaster('job_test_topics', $where_test_top, $join = FALSE, $order = false, $field = false, $select_test_topic, $limit = false, $start = false, $search = false);
                $where_top = "topic.topic_status='1'";
                $select_topic = "topic_name,topic_id";
                $data['topic_master'] = $this->Master_model->getMaster('topic', $where_top, $join = FALSE, $order = false, $field = false, $select_topic, $limit = false, $start = false, $search = false);
                $this->load->view('fontend/employer/create_topics_fortest', $data);
            } else {
                $where_del = "job_id='$id'";
                $del = $this->Master_model->master_delete('job_test_topics', $where_del);
                if ($del == true) {
                    for ($k = 0;$k < sizeof($topic_chk);$k++) {
                        $ques_array = array('job_id' => $id, 'topic_id' => $topic_chk[$k], 'test_level' => $post_data['test_level' . $topic_chk[$k]], 'no_questions' => $post_data['no_questions' . $topic_chk[$k]], 'created_by' => $user_id, 'created_date' => date('Y-m-d H:i:s'));
                        $this->Master_model->master_insert($ques_array, 'job_test_topics');
                        $job_info = $this->job_posting_model->get($id);
                        $company_name = $this->session->userdata('company_name');
                        $data = array('company' => $company_name, 'action_taken_for' => $email[$i], 'field_changed' => 'Test Topics', 'Action' => 'Added Test Topics for ' . $job_info['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    }
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Job Test Topic Sucessfully Inserted</div>');
                }
                redirect('employer/active_job');
            }
        } else {
            $data['title'] = "Topic's For Test";
            $data['test_job_id'] = $id;
            $data['test_level'] = $this->Master_model->getMaster('job_level', $where = FALSE, $join = FALSE, $order = false, $field = false, $select = FALSE, $limit = false, $start = false, $search = false);
            $where_test_top = "job_test_topics.job_id='$id'";
            $select_test_topic = "job_test_topics.topic_id as test_topic,job_test_topics.no_questions,job_test_topics.test_level";
            $data['test_topic_master'] = $this->Master_model->getMaster('job_test_topics', $where_test_top, $join = FALSE, $order = false, $field = false, $select_test_topic, $limit = false, $start = false, $search = false);
            $where_top = "topic.topic_status='1'";
            $select_topic = "topic_name,topic_id";
            $data['topic_master'] = $this->Master_model->getMaster('topic', $where_top, $join = FALSE, $order = false, $field = false, $select_topic, $limit = false, $start = false, $search = false);
            $this->load->view('fontend/employer/create_topics_fortest', $data);
        }
    }
    public function all_questions() {
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'questionbank';
        
        $data['Total_questions_in_q_bank'] = $this->Master_model->master_get_num_rows('questionbank', $where = FALSE, $like = false, $join=false, $select = false);


        $select = "SUM(oceanchamp_tests.total_questions) aS TOTAL";
        //$select = "array_sum(oceanchamp_tests.total_questions)";
        $data['Appeared_in_test_papers'] = $this->Master_model->getMaster('oceanchamp_tests', $where = FALSE, $join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        



        $sort_val = $this->input->post('sort_val');
        if (empty($sort_val)) {
           $sort_val = $this->input->get('sort');
        }

        

        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
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
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' and test_status = '1'";
        $data['oceanchamp_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where_all, $join = FALSE, $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = false, $limit = false, $start = false, $search = false);
        $join = array("topic" => "find_in_set(topic.topic_id, oceanchamp_tests.topics)");
        $where = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id'and test_status != '3' group  by oceanchamp_tests.test_id ";
        $ocean_tests = $this->Master_model->getMaster('oceanchamp_tests', $where = $where, $join = $join, $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = '*,group_concat(topic.topic_name) as topic_names', $limit = false, $start = false, $search = false);
         $config['base_url'] = base_url() . 'employer/all_questions?sort='.$sort_val;
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
             $data['ocean_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where, $join = $join, $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = '*,group_concat(topic.topic_name) as topic_names', $limit = $config['per_page'], $start = $page, $search = false);
        $data['company_active_jobs'] = $this->job_posting_model->get_company_active_jobs($employer_id);
        $where_all = "questionbank.ques_status='1' AND ques_created_by='$employer_id'";
        $join_emp = array('skill_master' => 'skill_master.id=questionbank.technical_id |left outer', 'topic' => 'topic.topic_id=questionbank.topic_id |left outer', 'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer', 'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer', 'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer', 'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
        $questionbank = $this->Master_model->getMaster('questionbank', $where_all, $join_emp, $order = 'desc', $field = 'ques_id', $select = false, $limit = false, $start = false, $search = false);
            $data['total_question'] = sizeof($questionbank);
            $config['base_url'] = base_url() . 'employer/all_questions?sort='.$sort_val;
            $config['total_rows'] = sizeof($questionbank);
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
            $this->session->unset_userdata('submenu');

            }
            $this->pagination->initialize($config);
            $data["links"] = $this->pagination->create_links();
            
            $data['sort'] = $sort_val;
            if (!empty($sort_val) ) {
                $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where_all, $join_emp, $order = 'asc', $field = $sort_val, $select = false, $limit = $config['per_page'], $start = $page, $search = false);
            }
            else
            {
                $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where_all, $join_emp, $order = 'desc', $field = 'ques_id', $select = false, $limit = $config['per_page'], $start = $page, $search = false);
            }
             
           
            
            
        $this->load->view('fontend/employer/list_questions', $data);
        // $this->load->view('fontend/employer/all_questions.php', $data);
        
    }
    public function attach_to_job() {
        $test_id = $this->input->post('test_id');
        $job_id = $this->input->post('job_id');
        $test_data['test_for_job'] = $test_id;
        $test_data['is_test_required'] = 'Yes';
        $where['job_post_id'] = $job_id;
        $this->Master_model->master_update($test_data, 'job_posting', $where);
        $where_seeker = "job_apply.job_post_id = '$job_id' and apply_status < '2' ";
        $join_seeker = array('js_info' => 'js_info.job_seeker_id = job_apply.job_seeker_id | Left', 'job_posting' => 'job_posting.job_post_id = job_apply.job_post_id');
        $all_seekers = $this->Master_model->getMaster('job_apply', $where_seeker, $join_seeker, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        $where_req = "job_post_id= '$job_id'";
        $join_req = array('job_types' => 'job_types.job_types_id = job_posting.job_types|LEFT OUTER', 'company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id|LEFT OUTER', 'city' => 'city.id = job_posting.city_id|LEFT OUTER', 'country' => 'country.country_id = job_posting.job_location|LEFT OUTER', 'state' => 'state.state_id = job_posting.state_id|LEFT OUTER', 'job_category' => 'job_category.job_category_id = job_posting.job_category|LEFT OUTER', 'job_nature' => 'job_nature.job_nature_id = job_posting.job_nature|LEFT OUTER', 'job_level' => 'job_level.job_level_id = job_posting.job_level|LEFT OUTER', 'job_role' => 'job_role.id = job_posting.job_role|LEFT OUTER', 'education_level' => 'education_level.education_level_id = job_posting.job_edu|LEFT OUTER', 'education_specialization' => 'education_specialization.id = job_posting.edu_specialization|LEFT OUTER');
        $select_job = "job_role.job_role_title,education_specialization.education_specialization,education_level.education_level_name,job_level.job_level_name,job_nature.job_nature_name,job_category.job_category_name,state.state_name,country.country_name,city.city_name,company_profile.company_name,company_profile.company_logo,job_types.job_types_name,job_posting.job_title,job_posting.job_position,job_posting.job_desc,job_posting.education,job_posting.salary_range,job_posting.job_deadline,job_posting.preferred_age,job_posting.preferred_age_to,job_posting.working_hours,job_posting.no_jobs,job_posting.benefits,job_posting.experience,job_posting.skills_required,job_posting.test_for_job";
        $req_details = $this->Master_model->getMaster('job_posting', $where_req, $join_req, $order = false, $field = false, $select_job, $limit = false, $start = false, $search = false);
        // print_r($this->db->last_query());die;
        if ($req_details) {
            foreach ($req_details as $require) {
            }
        }
        foreach ($all_seekers as $row) {
            $email_name = explode('@', $row['email']);
            $company_name = $this->session->userdata('company_name');
            $subject = 'New Test has been added to the Job Post' . $row['job_title'];
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
            $message.= '<br/><b>A new test has been added to the job post by ' . $company_name . '. Kindly click on the below given URL to view details<br><br>
                        <a href="' . base_url() . 'job_seeker/ocean_test_start/' . base64_encode($test_id) . '"> <div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                            <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                           
                            <br>' . $job_desc . '<br/><br/><em><b>Now Hiring!!</b></em> <br/><br/><b>Company Name:</b>' . $require['company_name'] . '<br/><br/> <b>Job Profile:</b><br/> <b>Job Title: </b> ' . $require['job_title'] . '<br/> <b>job Description: </b> ' . $require['job_desc'] . '<br/> <b>Experience: </b> ' . $require['experience'] . '<br/><b>Salary Offered: </b> ' . $require['salary_range'] . '<br/><b>Vacancies: </b> ' . $require['no_jobs'] . '<br/><b>Job Location: </b> ' . $require['city_name'] . '-' . $require['state_name'] . ',' . $require['country_name'] . '<br/><b>Job Role: </b> ' . $require['job_role_title'] . '<br/><b>Job Type: </b> ' . $require['job_types_name'] . '<br/><b>Job Nature: </b> ' . $require['job_nature_name'] . '<br/><b>Wrking Hrs: </b> ' . $require['working_hours'] . '<br/><b>Job Deadline: </b> ' . $require['job_deadline'] . '<br/><b>Education Required: </b> ' . $require['education_level_name'] . '(' . $require['education_specialization'] . ')' . '<br/><b>Preferred Age: </b> ' . $require['preferred_age'] . '-' . $require['preferred_age_to'] . '<br/><b>Required Skills: </b> ';
            for ($j = 0;$j < sizeof($req_skill_details);$j++) {
                $message.= ' <br>' . $req_skill_details[$j]['skill_name'];
            }
            $message.= '<br/><b>Job Description: </b> ' . $require['job_desc'] . '<br/><b>Job Benefits: </b> ' . $require['benefits'] . '<br/><b>Other Job Description: </b> ' . $require['education'] . '<br><br><a href="' . base_url() . 'job_forword_seeker/open_forworded_job?comp_mail=' . base64_encode($row['email']) . '&job_id=' . base64_encode($job_id) . '" class="btn btn-primary" value="open" align="center" target="_blank">Open</a> <br><br><br><br><br></td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table><br>
                        Regards,<br>Team TheOcean.</div>';
            $send = sendEmail_JobRequest($row['email'], $message, $subject);
        }
        redirect('employer/active_job');
    }
    /*** Dashboard ***/
    public function add_new_question() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $data['submenu'] = 'qbank';
        $this->session->set_userdata($data);
        $data['title'] = 'Add Questionbank';
        $where_skill = "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_skill);
        //$where_opt= "options.status=1";
        $data['options'] = $this->Master_model->getMaster('options');
        $where_topic = "topic.topic_status=1";
        $data['topic'] = $this->Master_model->getMaster('topic', $where_topic);
        $where_subtopic = "subtopic.subtopic_status='1'";
        $data['subtopic'] = $this->Master_model->getMaster('subtopic', $where_subtopic);
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem', $where_lineitem);
        $where_lineitemlevel = "lineitemlevel.lineitemlevel_status='1'";
        $data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel', $where_lineitemlevel);
        $join = array('questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
        $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where = FALSE, $join, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        // $this->load->view('fontend/employer/list_questions', $data);
        $this->load->view('fontend/employer/add_question', $data);
    }
    public function create_test() {
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'test_papers';
        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
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
        $where_lineitemlevel = "lineitemlevel.lineitemlevel_status='1'";
        $data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel', $where_lineitemlevel);
        $where_all = "questionbank.ques_status='1' AND ques_created_by='$employer_id'";
        $join_emp = array('skill_master' => 'skill_master.id=questionbank.technical_id |left outer', 'topic' => 'topic.topic_id=questionbank.topic_id |left outer', 'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer', 'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer', 'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer', 'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
        $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where_all, $join_emp);
        // $this->load->view('fontend/employer/qbank', $data);
        $this->load->view('fontend/employer/create_ocean_test', $data);
    }
    public function get_test_questions() {
        $employer_id = $this->session->userdata('company_profile_id');
        $subject = $this->input->post('subject');
        $topics = $this->input->post('topic_id');
        $subtopic = $this->input->post('subtopic_id') ;
        $ques_type = $this->input->post('ques_type');
        $level = $this->input->post('level');

       
       

       
        
        if (!empty($subject)) {
            //  $sub=array_filter($subject);
            // $subject = implode(',',$sub);

            $where_all = "questionbank.ques_status='1' AND ques_created_by='$employer_id' and questionbank.technical_id = '$subject' AND time_for_question != ''";
        }
        if (!empty($topics)) {
            $topic=array_filter($topics);
            $topic_id = implode(',', $topic);
            $where_all.= " and questionbank.topic_id IN (".$topic_id.")";
        }
        if (!empty($subtopic)) {
            $subtopic=array_filter($subtopic);
            $subtopic_id = implode(',',$subtopic);
            $where_all.= " and questionbank.subtopic_id  IN (".$subtopic_id.")";
        }
        if (!empty($level)) {
            $where_all.= " and questionbank.level = '$level'";
        }
        if (!empty($ques_type)) {
            $where_all.= " and questionbank.ques_type = '$ques_type'";
        }
        // and questionbank.topic_id = '$topic_id' and questionbank.subtopic_id  = '$subtopic_id' and questionbank.ques_type = '$ques_type' and questionbank.level = '$level'  ";
        $join_emp = array('skill_master' => 'skill_master.id=questionbank.technical_id |left outer', 'topic' => 'topic.topic_id=questionbank.topic_id |left outer', 'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer', 'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer', 'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer', 'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
        $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where_all, $join_emp);
        // print_r($this->db->last_query());die;
        $this->load->view('fontend/employer/qb_test_card.php', $data);
    }
    public function add_to_test() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $data['submenu'] = '1';
        $this->session->set_userdata($data);
        $test_name = $this->input->post('test_name');
        $test_id = $this->input->post('test_id');
        $up_date = $this->input->post('data_arr');
        $test_time = $this->input->post('test_time');
        $level_data = $this->input->post('level_data');
        $subject_data = $this->input->post('subject_data');
        $topic_id = $this->input->post('topic_id');
        $type = $this->input->post('ques_type');
        // echo  $test_id;
        // echo  $test_name; die;
        // print_r($_POST);die();
        $employer_id = $this->session->userdata('company_profile_id');
        if (isset($test_name) && !empty($test_name)) {
            $where_all = "oceanchamp_tests.test_name='$test_name'";
            $old_question_data = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where_all);
            if (empty($old_question_data)) {
                $test_data['test_name'] = $test_name;
                $test_data['company_id'] = $employer_id;
                $test_data['questions'] = $up_date;
                $test_data['type'] = $type;
                $test_data['total_questions'] = sizeof(explode(',', $up_date));
                $test_data['test_duration'] = $test_time;
                $test_data['level'] = $level_data;
                $test_data['topics'] = implode(',', $topic_id);
                $test_data['test_status'] = '1';
                $test_data['status'] = '1';
                $test_data['test_deadline'] =  date('Y-m-d', strtotime($this->input->post('test_deadline')));
                // $test_data['previous_option'] = $this->input->post('previous_option');
                // $test_data['review_option'] = $this->input->post('review_option');
                // $test_data['negative_marks'] = $this->input->post('negative');
                // $test_data['correct_ans_each_ques'] = $this->input->post('each_question_ans');
                // $test_data['final_result'] = $this->input->post('display_result');
                $test_data['created_by'] = $this->session->userdata('company_profile_id');
                $test_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                $result = $this->Master_model->master_insert($test_data, 'oceanchamp_tests');
                if ($result) {
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test Created Successfully</div>');
                }
            }
        } elseif (isset($test_id) && !empty($test_id)) {
            $where['test_id'] = $test_id;
            $old_question_data = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where);
            $old_questions = explode(',', $old_question_data['questions']);
            $ques = explode(',', $up_date);
            $new_arr = array_unique(array_merge($old_questions, $ques));
            $old_type = explode(',', $old_question_data['type']);
            $ques_type = explode(',', $type);
            $new_arr_type = array_unique(array_merge($old_type, $ques_type));
            $old_level = explode(',', $old_question_data['level']);
            $ques_level = explode(',', $level_data);
            $new_arr_level = array_unique(array_merge($old_level, $ques_level));
            $old_topic = explode(',', $old_question_data['topic']);
            $ques_topic = explode(',', $topic);
            $new_arr_topic = array_unique(array_merge($old_topic, $ques_topic));
            $old_test_duration = explode(',', $old_question_data['test_duration']);
            $ques_test_duration = explode(',', $test_time);
            $new_arr_test_duration = array_merge($old_test_duration, $ques_test_duration);
            $test_data['questions'] = implode(',', $new_arr);
            $test_data['type'] = implode(',', $new_arr_type);
            $test_data['level'] = implode(',', $new_arr_level);
            $test_data['topics'] = implode(',', $new_arr_topic);
            $test_data['total_questions'] = sizeof($new_arr);
            $test_data['test_duration'] = array_sum($new_arr_test_duration);
            $test_data['test_deadline'] = date('Y-m-d', strtotime($this->input->post('test_deadline')));
            $test_data['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $result = $this->Master_model->master_update($test_data, 'oceanchamp_tests', $where);
            if ($result) {
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test Updated Successfully</div>');
            }
        }
        redirect('employer/all_questions');
    }
    public function randomly_create_test() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $data['submenu'] = '2';
        $this->session->set_userdata($data);
        $test_name = $this->input->post('test_name');
        $test_duration = $this->input->post('test_duration');
        $technical_id = $this->input->post('technical_id');
        $topic_id = $this->input->post('topic_id');
        $subtopic_id = $this->input->post('subtopic_id');
        $test_deadline = date('Y-m-d', strtotime($this->input->post('test_deadline')));
        $level = $this->input->post('level');
        $ques_type = $this->input->post('ques_type');
        $employer_id = $this->session->userdata('company_profile_id');
        $time = $test_duration / 20;
        // $where = "technical_id = '$technical_id' and topic_id ='$topic_id' and subtopic_id ='$subtopic_id' and level ='$level' and ques_type ='$ques_type' ";
        $where = "technical_id IN('".$technical_id."')  and level ='$level' and ques_type ='$ques_type' ";
        $questions = $this->Master_model->getMaster('questionbank', $where, $join = FALSE, $order = 'RANDOM', $field = 'ques_id', $select = false, $limit = false, $start = false, $search = false);
        // print_r($this->db->last_query());
        $test_questions = array();
        foreach ($questions as $row) {
            array_push($test_questions, $row['ques_id']);
        }
        // print_r($test_questions);
        if (isset($test_name) && !empty($test_name)) {
            $where_all = "oceanchamp_tests.test_name='$test_name'";
            $old_question_data = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where_all);
            if (empty($old_question_data)) {
                $test_data['test_name'] = $test_name;
                $test_data['company_id'] = $employer_id;
                $test_data['questions'] = implode(',', $test_questions);
                $test_data['test_deadline'] = date('Y-m-d', strtotime($test_deadline));
                // $test_data['type'] = $type;
                $test_data['total_questions'] = sizeof($test_questions);
                $test_data['test_duration'] = $test_duration;
                $test_data['level'] = $level;
                $test_data['topics'] = implode(',', $topic_id);
                $test_data['test_status'] = '2';
                $test_data['status'] = '1';
                // $test_data['timer_on_each_que'] = $this->input->post('timer');
                // $test_data['previous_option'] = $this->input->post('previous_option');
                // $test_data['review_option'] = $this->input->post('review_option');
                // $test_data['negative_marks'] = $this->input->post('negative');
                // $test_data['correct_ans_each_ques'] = $this->input->post('each_question_ans');
                // $test_data['final_result'] = $this->input->post('display_result');
                $test_data['created_by'] = $this->session->userdata('company_profile_id');
                $test_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                $this->Master_model->master_insert($test_data, 'oceanchamp_tests');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test Created Successfully</div>');
            }
        }
        redirect('employer/all_questions');
    }
    public function randomly_create_oceantest() {
        $test_name = $this->input->post('test_name');
        $test_duration = $this->input->post('test_duration');
        $technical_id = $this->input->post('technical_id');
        $topic_id = $this->input->post('topic_id');
        $subtopic_id = $this->input->post('subtopic_id');
        $level = $this->input->post('level');
        $ques_type = $this->input->post('ques_type');
        $employer_id = $this->session->userdata('company_profile_id');
        $test_deadline = $this->input->post('test_deadline');
        $time = $test_duration / 20;
        // $where = "technical_id = '$technical_id' and topic_id ='$topic_id' and subtopic_id ='$subtopic_id' and level ='$level' and ques_type ='$ques_type' ";
         $where = "technical_id IN('".$technical_id."')  and level ='$level' and ques_type ='$ques_type' ";
        $questions = $this->Master_model->getMaster('questionbank', $where, $join = FALSE, $order = 'RANDOM', $field = 'ques_id', $select = false, $limit = 20, $start = false, $search = false);
        $test_questions = array();
        foreach ($questions as $row) {
            array_push($test_questions, $row['ques_id']);
        }
        // print_r($test_questions);
        if (isset($test_name) && !empty($test_name)) {
            $where_all = "oceanchamp_tests.test_name='$test_name'";
            $old_question_data = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where_all);
            if (empty($old_question_data)) {
                $test_data['test_name'] = $test_name;
                $test_data['company_id'] = $employer_id;
                $test_data['questions'] = implode(',', $test_questions);
                // $test_data['type'] = $type;
                $test_data['total_questions'] = sizeof($test_questions);
                $test_data['test_duration'] = $test_duration;
                $test_data['level'] = $level;
                $test_data['topics'] = implode(',', $topic_id);
                $test_data['test_status'] = '3';
                $test_data['test_deadline'] = $test_deadline;
                // $test_data['timer_on_each_que'] = $this->input->post('timer');
                // $test_data['previous_option'] = $this->input->post('previous_option');
                // $test_data['review_option'] = $this->input->post('review_option');
                // $test_data['negative_marks'] = $this->input->post('negative');
                // $test_data['correct_ans_each_ques'] = $this->input->post('each_question_ans');
                // $test_data['final_result'] = $this->input->post('display_result');
                $test_data['created_by'] = $this->session->userdata('company_profile_id');
                $test_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                $this->Master_model->master_insert($test_data, 'oceanchamp_tests');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test Created Successfully</div>');
            }
        }
        redirect('employer/all_tests');
    }
    public function update_test() {
        $test_id = $this->input->post('test_id');
        $test_duration = $this->input->post('test_duration');
        if (isset($test_id) && !empty($test_id)) {
            $test_data['timer_on_each_que'] = $this->input->post('timer');
            $test_data['previous_option'] = $this->input->post('previous_option');
            $test_data['review_option'] = $this->input->post('review_option');
            $test_data['negative_marks'] = $this->input->post('negative');
            $test_data['correct_ans_each_ques'] = $this->input->post('each_question_ans');
            $test_data['final_result'] = $this->input->post('display_result');
             $test_data['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
             if (isset($test_duration) && !empty($test_duration)) {
               $test_data['test_duration'] = $test_duration;
             }
            $where['test_id'] = $test_id;
            $this->Master_model->master_update($test_data, 'oceanchamp_tests', $where);

            $old_question_data = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where);

            if ($old_question_data->test_status !=3) {
              $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test Details updated Successfully</div>');
                  $data['submenu'] = '2';
                $this->session->set_userdata($data);
              redirect('employer/all_questions');
            }
            else
            {
              $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test Details updated Successfully</div>');
              redirect('employer/all_tests');
            }
        }
       
    }
    public function show_saved_tests() {
        $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id'";
        $data['oceanchamp_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where_all);
        $this->load->view('fontend/employer/saved_tests', $data);
    }
    function get_test_details() {
        $employer_id = $this->session->userdata('company_profile_id');
        $test_id = $this->input->post('test_id');
        if (!empty($test_id)) {
            $where_all = "oceanchamp_tests.status ='1' AND oceanchamp_tests.company_id='$employer_id' and oceanchamp_tests.test_id = '$test_id'";
            $data = $this->Master_model->getMaster('oceanchamp_tests', $where_all);
            // print_r($this->db->last_query());die;
            // $this->load->view('fontend/employer/test_card.php',$data);
            
        }
        echo json_encode($data);
    }
    public function get_test_card() {
        $employer_id = $this->session->userdata('company_profile_id');
        $test_id = $this->input->post('test_id');
        if (!empty($test_id)) {
            $where_all = "oceanchamp_tests.status ='1' AND oceanchamp_tests.company_id='$employer_id' and oceanchamp_tests.test_id = '$test_id'";
            $data['test_questions'] = $this->Master_model->getMaster('oceanchamp_tests', $where_all);
            // print_r($this->db->last_query());die;
            $this->load->view('fontend/employer/test_card.php', $data);
        }
    }
    public function all_tests() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'test_papers';
        $this->session->set_userdata($data);

        $sort_val = $this->input->post('sort_val');

        $employer_id = $this->session->userdata('company_profile_id');

        $where = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' and test_status = '3' GROUP by oceanchamp_tests.test_id";
  
        if (isset($_POST['sort']) || !empty($sort_val)) {


         $join = array('topic' => 'find_in_set(topic.topic_id, oceanchamp_tests.topics)|LEFT OUTER',
         'questionbank' => 'find_in_set(questionbank.ques_id, oceanchamp_tests.questions)|LEFT OUTER', 'skill_master' => 'skill_master.id = questionbank.technical_id|LEFT OUTER'  );

         $data['ocean_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where, $join = $join , $order = 'desc', $field = $sort_val, $select = '*,group_concat(DISTINCT topic.topic_name) as topic_names,group_concat(DISTINCT skill_master.skill_name) as skill_name', $limit = false, $start = false, $search = false);
         // print_r($this->db->last_query());die;

        }

         else {
             $join = array("topic" => "find_in_set(topic.topic_id, oceanchamp_tests.topics)");
        $data['ocean_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where, $join , $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = '*,group_concat(topic.topic_name) as topic_names', $limit = false, $start = false, $search = false);

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
        $this->load->view('fontend/employer/list_tests', $data);
        // $this->load->view('fontend/employer/all_questions.php', $data);
        
    }
    public function save_questionbank($id = null) {
        $this->form_validation->set_rules('technical_id', 'Subject', 'required');
        // $this->form_validation->set_rules('topic_id', 'Main Topic', 'required');
        // $this->form_validation->set_rules('subtopic_id', 'Sub Topic', 'required');
        // $this->form_validation->set_rules('lineitem_id', 'Line Item Level 1', 'required');
        // $this->form_validation->set_rules('lineitemlevel_id', 'Line Item Level 2', 'required');
        $this->form_validation->set_rules('ques_type', 'Question Type', 'required');
        $this->form_validation->set_rules('question', 'Question', 'required');
        $this->form_validation->set_rules('option1', 'Option 1', 'required');
        $this->form_validation->set_rules('option2', 'Option 2', 'required');
        $this->form_validation->set_rules('option3', 'Option 3', 'required');
        $this->form_validation->set_rules('option4', 'Option 4', 'required');
        $this->form_validation->set_rules('correct_answer[]', 'Correct Answer', 'required');
        $this->form_validation->set_message('required', 'This field is mandatory');
        if ($this->form_validation->run() == FALSE) {
            $where_skill = "status=1";
            $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_skill);
            //$where_opt= "options.status=1";
            $data['options'] = $this->Master_model->getMaster('options');
            $where_topic = "topic.topic_status=1";
            $data['topic'] = $this->Master_model->getMaster('topic', $where_topic);
            $where_subtopic = "subtopic.subtopic_status='1'";
            $data['subtopic'] = $this->Master_model->getMaster('subtopic', $where_subtopic);
            $where_lineitem = "lineitem.lineitem_status='1'";
            $data['lineitem'] = $this->Master_model->getMaster('lineitem', $where_lineitem);
            $where_lineitemlevel = "lineitemlevel.lineitemlevel_status='1'";
            $data['lineitemlevel'] = $this->Master_model->getMaster('lineitemlevel', $where_lineitemlevel);
            $join = array('questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
            $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where = FALSE, $join, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
            $this->load->view('fontend/employer/add_question'); //die;
            
        } else {
            $user_id = $this->session->userdata('company_profile_id');
            $state_dt = array(
             'technical_id' => $this->input->post('technical_id'), 
             'topic_id' => $this->input->post('topic_id'), 
             'subtopic_id' => $this->input->post('subtopic_id'), 
             'lineitem_id' => $this->input->post('lineitem_id'), 
             'lineitemlevel_id' => $this->input->post('lineitemlevel_id'), 
             'level' => $this->input->post('level'), 
             'ques_type' => $this->input->post('ques_type'), 
             'question' => $this->input->post('question'), 
             'option1' => $this->input->post('option1'), '
             option2' => $this->input->post('option2'), 
             'option3' => $this->input->post('option3'), 
             'option4' => $this->input->post('option4'), 
             'time_for_question' => $this->input->post('time'), 
             'is_admin' => $this->input->post('is_admin'));
            if (empty($id)) {
                $state_dt['ques_created_date'] = date('Y-m-d H:i:s');
                $state_dt['ques_created_by'] = $user_id;
                $q_id = $this->Master_model->master_insert($state_dt, 'questionbank');
                $company_name = $this->session->userdata('company_name');
                $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Added a new Question.', 'Action' => 'Added a new Question to Questionbank.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                if ($this->input->post('ques_type') == 'MCQ') {
                    $tablename = 'questionbank_answer';
                    $where_delete['question_id'] = $q_id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    $c_answer = $this->input->post('correct_answer');
                    // var_dump($c_answer); die;
                    // for ($i = 0;$i < sizeof($c_answer);$i++) {
                        $data_answer = array();
                        $data_answer['question_id'] = $q_id;
                        $ans=array_filter($c_answer);
                        $ans_id = implode(',', $ans);
                        $data_answer['answer_id'] = $ans_id;
                        $this->Master_model->master_insert($data_answer, 'questionbank_answer');
                    // }
                }
                if ($this->input->post('ques_type') == 'Subjective') {
                    $tablename = 'questionbank_answer';
                    $where_delete['question_id'] = $q_id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    $where_update_sub_answer = array();
                    $ans_update['sub_answer'] = $this->input->post('sub_answer');
                    $where_update_sub_answer['ques_id'] = $q_id;
                    $this->Master_model->master_update($ans_update, 'questionbank', $where_update_sub_answer);
                }
                //$this->session->set_flashdata('success', '<div class="alert alert-success text-center">New Question Added Successfully!</div>');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Question added to Corp Q-Bank Successfully !!</div>');
                redirect('employer/all_questions');
            } else {
                $state_dt['ques_updated_date'] = date('Y-m-d H:i:s');
                $state_dt['ques_updated_by'] = $user_id;
                $company_profile_id = $this->session->userdata('company_profile_id');
                $where['ques_id'] = $id;
                $old_question_data = $this->Master_model->get_master_row('questionbank', $select = FALSE, $where);
                $old_array_keys = array_keys($old_question_data);
                $old_array_values = array_values($old_question_data);
                // print_r($old_array_keys);
                // print_r($old_array_values);die;
                $size = sizeof($old_array_keys);
                for ($i = 0;$i < $size;$i++) {
                    $parameter = $old_array_keys[$i];
                    $old_data = $old_array_values[$i];
                    $new_data = $state_dt[$parameter];
                    if (isset($new_data) && !empty($new_data)) {
                        if (($old_data == $new_data) || (($parameter != 'ques_updated_date') || ($parameter != 'ques_updated_by'))) {
                        } else {
                            $company_name = $this->session->userdata('company_name');
                            $action = str_replace("_", ' ', $parameter);
                            $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => $action, 'Action' => 'Changed ' . $action, 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                            // print_r($this->db->last_query());die;
                            
                        }
                    }
                }
                $where['ques_id'] = $id;
                $this->Master_model->master_update($state_dt, 'questionbank', $where);
                if ($this->input->post('ques_type') == 'MCQ') {
                    $tablename = 'questionbank_answer';
                    $where_delete['question_id'] = $id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    $c_answer = $this->input->post('correct_answer');
                    // for ($i = 0;$i < sizeof($c_answer);$i++) {
                        $data_answer = array();
                        $data_answer['question_id'] = $id;
                        $ans=array_filter($c_answer);
                        $ans_id = implode(',', $ans);
                        $data_answer['answer_id'] = $ans_id;
                        $this->Master_model->master_insert($data_answer, 'questionbank_answer');
                    // }
                }
                if ($this->input->post('ques_type') == 'Subjective') {
                    $tablename = 'questionbank_answer';
                    $where_delete['question_id'] = $id;
                    $this->Master_model->master_delete($tablename, $where_delete);
                    $where_update_sub_answer = array();
                    $ans_update['sub_answer'] = $this->input->post('sub_answer');
                    $where_update_sub_answer['ques_id'] = $id;
                    $this->Master_model->master_update($ans_update, 'questionbank', $where_update_sub_answer);
                }
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Question Updated Successfully!</div>');
                redirect('employer/all_questions');
            }
        }
    }
    public function edit_questionbank($id) {
        $data['title'] = "Edit Questionbank";
        $data['options'] = $this->Master_model->getMaster('options');
        $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where_all, $join_emp);
        $join = array('questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
        $where_questionbank = "ques_id='$id'";
        $data['edit_questionbank_info'] = $this->Master_model->getMaster('questionbank', $where = $where_questionbank, $join, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        $where_answer = "question_id='$id'";
        $data['questionbank_answer'] = $this->Master_model->getMaster('questionbank_answer', $where_answer);
        $where_lineitem = "lineitem.lineitem_status='1'";
        $data['lineitem'] = $this->Master_model->getMaster('lineitem', $where_lineitem);
        $where_skill = "status=1";
        $data['skill_master'] = $this->Master_model->getMaster('skill_master', $where_skill);
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Question Updated Successfully!</div>');
        // $this->load->view('fontend/employer/add_new_question', $data);
        $this->load->view('fontend/employer/add_question', $data);
    }
    public function delete_questionbank($id) {
        $ques_status = array('ques_status' => 0);
        $where_del['ques_id'] = $id;
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted a Question.', 'Action' => 'Deleted a Question.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
        $this->Master_model->master_update($ques_status, 'questionbank', $where_del);
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Question Deleted Successfully!</div>');
        redirect('employer/all_questions');
    }
    public function recover_questionbank($id) {
        $ques_status = array('ques_status' => 1);
        $where_del['ques_id'] = $id;
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted a Question.', 'Action' => 'Deleted a Question.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
        $this->Master_model->master_update($ques_status, 'questionbank', $where_del);
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Question restored Successfully!</div>');
        redirect('employer/all_questions');
    }
    /*Add Employee*/
    public function addemployee() {
        $this->session->unset_userdata('activemenu');
        $session_data['activemenu'] = 'addemployee';
        $this->session->set_userdata($session_data);
        $user_id = $this->session->userdata('company_profile_id');
        if (isset($_POST['submit_employee'])) {
            $this->form_validation->set_rules('Password', 'password', 'required|max_length[15]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]');
            $this->form_validation->set_rules('emp_no', 'Employee No.', 'required|min_length[3]|max_length[6]|alpha_numeric');
            $this->form_validation->set_rules('emp_name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employee.email]');
            $this->form_validation->set_rules('mobile', ' Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('dept_id', 'Department', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric');
            array('required' => 'You must provide a %s.');
            $this->form_validation->set_message('required', 'You must provide this field');
            $this->form_validation->set_message('regex_match', 'You must provide One Uppercase,One Lowercase,Numbers and special Character');
            // print_r($this->form_validation->run());die;
            if ($this->form_validation->run() == FALSE) {
                $data['result'] = $this->Master_model->getMaster('department', $select = false);
                //$this->load->view('organization/add_employee',$data);
                
            } else {
                $NewFileName;
                if ($_FILES['photo']['name'] != '') {
                    $this->load->helper('string');
                    $NewFileName = $_FILES['photo']['name'];
                    $config['upload_path'] = 'employee/';
                    $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|odt|xlsm|xls|xlm|xla|xlsx|bmp|docm|dotx|dotm|docb|gif';
                    $config['max_size'] = '10000';
                    //$config['max_width']  = '1024';
                    //$config['max_height']  = '768';
                    $config['file_name'] = $NewFileName;
                    $this->load->library('upload', $config);
                    $field_name = "photo";
                    // print_r($config);die();
                    if (!$this->upload->do_upload($field_name)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('type', 'success');
                        //$this->session->set_flashdata('Message', 'Profile Added Successfully');
                        
                    } else {
                        // Success of file
                        
                    }
                } //END of file checking if loop
                else {
                    $NewFileName = '';
                }
                //$data['org_id'] = $this->input->post('org_id');
                $List = implode(',', $this->input->post('user_acc'));
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
                $data['access_to_employee'] = $List;
                $data['emp_created_by'] = $user_id;
                $data['photo'] = $NewFileName;
                $data['emp_created_date'] = date('Y-m-d H:i:s');
                $this->Master_model->master_insert($data, 'employee');
                $company_name = $this->session->userdata('company_name');
                $data = array('company' => $company_name, 'action_taken_for' => $this->input->post('emp_name'), 'field_changed' => 'Added new Employee', 'Action' => 'Added ' . $this->input->post('emp_name') . ' As an Employee.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                $data1 = array('company' => $company_name, 'action_taken_for' => $this->input->post('emp_name'), 'field_changed' => 'Added new Employee', 'Action' => 'Added ' . $this->input->post('emp_name') . ' As an Employee.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                $result = $this->Master_model->master_insert($data1, 'employer_audit_record');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">New Employee added sucessfully!</div>');
                $comp_name = $this->session->userdata('company_name');
                $to_email = $this->input->post('email');
                $pass = $this->input->post('password');
                $subject = "Registration done successfully";
                $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Your account has been created successfully by ' . $comp_name . ' <br><br>You can login to our portal using following credentials<br>
username: ' . $to_email . '<br>
Password: ' . $pass . '<br>
<a href="https://www.consultnhire.com/employee_login" class="btn btn-primary" value="Login" align="center" target="_blank">Login Now</a>
Team ConsultnHire!<br>Thank You for choosing us!<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                $send = sendEmail_JobRequest($to_email, $message, $subject);
                //redirect(base_url() . 'employer/employee_management');
                
            }
        }
        $c_id = $this->input->get('id');
        if (isset($c_id) && !empty($c_id)) {
            $where = "emp_id='$c_id'";
            $data['result'] = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
        }
        $where = 'employee.org_id="' . $user_id . '" and employee.emp_status!="0" ';
        //$data['result'] = $this->Master_model->getMaster('industry',$where=FALSE);
        $join = array('department' => 'department.dept_id = employee.dept_id|LEFT OUTER', 'country' => 'country.country_id = employee.country_id|LEFT OUTER', 'state' => 'state.state_id = employee.state_id|LEFT OUTER', 'city' => 'city.id = employee.city_id|LEFT OUTER');
        $res = $this->Master_model->getMaster('employee', $where, $join);
        $config = array();
        $config["base_url"] = base_url('employer/addemployee');
        $config["total_rows"] = count($res);
        $config['per_page'] = 10;
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
        $day = date("Y-m-d H:i:s", strtotime('-24 hours', time()));
        $where = 'employee.org_id="' . $user_id . '" AND (employee.emp_status="1" or employee.emp_status="2" or(employee.emp_status="3" and employee.emp_updated_date >"' . $day . '") or (employee.emp_status="1" and employee.emp_updated_date >"' . $day . '") )';
        $data["emptbl"] = $this->Master_model->getMaster("employee", $where = $where, $join, $order = "ASC", $field = "employee.emp_id", $select = false, $config["per_page"], $page, $search = false, $group_by = FALSE);
        $data['department'] = $this->Master_model->getMaster('department', $where = false);
        // $data['result'] = $this->Master_model->getMaster('department' ,$select=false);
        $data['city'] = $this->Master_model->getMaster('city', $where = false);
        $data['country'] = $this->Master_model->getMaster('country', $where = false);
        $data['state'] = $this->Master_model->getMaster('state', $where = false);
        $data['roles'] = $this->Master_model->getMaster('user_role', $where = false);
        $this->load->view('fontend/employer/employee_management', $data);
        // $this->load->view('fontend/employer/add_new_employee',$data);

    }
    public function addconsultant() {
        $user_id = $this->session->userdata('company_profile_id');
        # code...
        // if(isset($_POST['add_consultant'])) {
        $pass = rand(100, 999);
        $company_profile = array('company_name' => $this->input->post('company_name'), 'company_email' => $this->input->post('company_email'), 'company_url' => $this->input->post('company_url'), 'country_code' => $this->input->post('country_code'), 'company_phone' => $this->input->post('company_phone'), 'contact_name' => $this->input->post('contact_name'), 'company_career_link' => $this->input->post('company_career_link'), 'company_address' => $this->input->post('company_address'), 'company_pincode' => $this->input->post('company_pincode'), 'cont_person_email' => $this->input->post('cont_person_email'), 'cont_person_mobile' => $this->input->post('cont_person_mobile'), 'comp_gstn_no' => $this->input->post('comp_gst_no'), 'comp_pan_no' => $this->input->post('comp_pan_no'), 'comp_type' => "HR Consultant", 'company_slug' => $this->slug->create_uri($this->input->post('company_name')), 'token' => md5($this->input->post('company_email')));
        if (isset($_POST['add_consultant'])) {
            $company_id = $this->input->post('company_profile_id');
            if (isset($company_id) && !empty($company_id)) {
                $exist_companyid = $this->company_profile_model->companyid_check($company_id, $user_id);
                if ($exist_companyid) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">This consultant is already added in your list</div>');
                    redirect('employer/addconsultant');
                } else {
                    $consultanat_data = array('consultant_id' => $company_id, 'company_id' => $user_id, 'created_on' => date('Y-m-d H:i:s'), 'created_by' => $user_id, 'is_favourite' => $this->input->post('Favorite'));
                    $consultant = $this->Master_model->master_insert($consultanat_data, 'consultant_company_mapping');
                    $company_name = $this->session->userdata('company_name');
                    $data = array('company' => $company_name, 'action_taken_for' => $this->input->post('company_name'), 'field_changed' => 'Added  consultant', 'Action' => 'Added ' . $this->input->post('company_name') . ' As a consultant.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">This consultant Added Successfully</div>');
                    redirect('employer/addconsultant');
                }
            } else {
                $exist_companyname = $this->company_profile_model->companyname_check($this->input->post('company_name'));
                $exist_email = $this->company_profile_model->email_check($this->input->post('company_email'));
                $exist_username = $this->company_profile_model->username_check($this->input->post('company_username'));
                $exist_phone_name = $this->company_profile_model->phonenumber_check($this->input->post('company_phone'));
                if ($exist_companyname) {
                    // all Ready Account Message
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Company Name Or Account Already Use This!</div>');
                    redirect('add_consultant');
                }
                if ($exist_email) {
                    // all Ready Account Message
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Email Or Account Already Use This!</div>');
                    redirect('add_consultant');
                }
                if ($exist_username) {
                    // all Ready Account Message
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Username Or Account Already Use This!</div>');
                    redirect('add_consultant');
                }
                if ($exist_phone_name) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Your Phone Number Or Account Already Use This!</div>');
                    redirect('add_consultant');
                } else {
                    $company_profile['company_password'] = md5($pass);
                    $comp_id = $this->Master_model->master_insert($company_profile, 'company_profile');
                    $company_name = $this->session->userdata('company_name');
                    $data = array('company' => $company_name, 'action_taken_for' => $this->input->post('emp_name'), 'field_changed' => 'Added  consultant', 'Action' => 'Added ' . $this->input->post('company_name') . ' As a consultant.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                    // echo $comp_id
                    if (isset($comp_id) && !empty($comp_id)) {
                        # code...
                        $consultanat_data = array('consultant_id' => $comp_id, 'company_id' => $user_id, 'created_on' => date('Y-m-d H:i:s'), 'created_by' => $user_id, 'is_favourite' => $this->input->post('Favorite'));
                        $consultant = $this->Master_model->master_insert($consultanat_data, 'consultant_company_mapping');
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
            $to_email = $this->input->post('cont_person_email');
            // echo $to_email;
            $subject = "Registration done successfully";
            $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                <br><br>Hi Dear,<br>Your account has been created successfully by ' . $comp_name . ' <br><br>You can login to our portal using following credentials<br>
                username: ' . $to_email . '<br>
                Password: ' . $pass . '<br>
                <a href="https://www.consultnhire.com/employer_login" class="btn btn-primary" value="Login" align="center" target="_blank">Login Now</a>

                Team ConsultnHire!<br>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
            $send = sendEmail_JobRequest($to_email, $message, $subject);
        } elseif (isset($_POST['update_consultant'])) {
            $company_profile_id = $this->input->post('company_profile_id');
            // echo $consultant_id;
            if (isset($company_profile_id)) {
                $where['company_profile_id'] = $company_profile_id;
                $old_company_profile = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where);
                $old_array_keys = array_keys($old_company_profile);
                $old_array_values = array_values($old_company_profile);
                // print_r($old_array_keys);
                // print_r($old_array_values);die;
                $size = sizeof($old_array_keys);
                for ($i = 0;$i < $size;$i++) {
                    $parameter = $old_array_keys[$i];
                    $old_data = $old_array_values[$i];
                    $new_data = $company_profile[$parameter];
                    if (isset($new_data) && !empty($new_data)) {
                        if (($old_data == $new_data) || (($parameter == 'company_slug') || ($parameter == 'token'))) {
                        } else {
                            $company_name = $this->session->userdata('company_name');
                            $action = str_replace("_", ' ', $parameter);
                            $data = array('company' => $company_name, 'action_taken_for' => $this->input->post('company_name'), 'field_changed' => $action, 'Action' => 'Changed ' . $action . ' for ' . $this->input->post('company_name'), 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                            // print_r($this->db->last_query());die;
                            
                        }
                    }
                }
                // print_r($company_profile);
                $this->Master_model->master_update($company_profile, 'company_profile', $where);
                $consultant_id = $this->input->post('consultant_id');
                $whr['con_comp_map_id'] = $consultant_id;
                $data1['is_favourite'] = $this->input->post('Favorite');
                $this->Master_model->master_update($data1, 'consultant_company_mapping', $whr);
                redirect('employer/show-all-consultant');
            }
            # code...
            
        }
        $data['city'] = $this->Master_model->getMaster('city', $where = false);
        $data['country'] = $this->Master_model->getMaster('country', $where = false);
        $data['state'] = $this->Master_model->getMaster('state', $where = false);
        $this->load->view('fontend/consultant/add_consultant', $data);
    }
    /*Employee Listing */
    public function allemployee() {
        $employer = $this->session->userdata('company_profile_id');
        //$company=$employer['company_profile_id'];
        $where = 'employee.org_id="' . $employer . '" and employee.emp_status!="0" ';
        //$data['result'] = $this->Master_model->getMaster('industry',$where=FALSE);
        $join = array('department' => 'department.dept_id = employee.dept_id|LEFT OUTER', 'country' => 'country.country_id = employee.country_id|LEFT OUTER', 'state' => 'state.state_id = employee.state_id|LEFT OUTER', 'city' => 'city.id = employee.city_id|LEFT OUTER');
        $res = $this->Master_model->getMaster('employee', $where, $join);
        $config = array();
        $config["base_url"] = base_url('employer/index');
        $config["total_rows"] = count($res);
        $config['per_page'] = 10;
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
        $day = date("Y-m-d H:i:s", strtotime('-24 hours', time()));
        // $where=employee.org_id="149" AND (employee.emp_status=1 or (employee.emp_status=3 and employee.emp_updated_date > '2020-01-07 04:53:51') or (employee.emp_status=0 and employee.emp_updated_date > '2020-01-07 04:53:51') or (employee.emp_status=1 and employee.emp_updated_date > '2020-01-07 04:53:51') );
        $where = 'employee.org_id="' . $employer . '" AND (employee.emp_status="1" or employee.emp_status="2" or(employee.emp_status="3" and employee.emp_updated_date >"' . $day . '") or (employee.emp_status="1" and employee.emp_updated_date >"' . $day . '") )';
        $data["result"] = $this->Master_model->getMaster("employee", $where = $where, $join, $order = "ASC", $field = "employee.emp_id", $select = false, $config["per_page"], $page, $search = false, $group_by = FALSE);
        // print_r($this->db->last_query());die;
        $this->load->view('fontend/employer/employee_master', $data);
    }
    public function deactivated_employees() {
        $employer = $this->session->userdata('company_profile_id');
        //$company=$employer['company_profile_id'];
        $day = date("Y-m-d H:i:s", strtotime('-24 hours', time()));
        $where = 'employee.org_id="' . $employer . '" and employee.emp_status="0"  and employee.emp_updated_date < "' . $day . '"';
        //$data['result'] = $this->Master_model->getMaster('industry',$where=FALSE);
        $join = array('department' => 'department.dept_id = employee.dept_id|LEFT OUTER', 'country' => 'country.country_id = employee.country_id|LEFT OUTER', 'state' => 'state.state_id = employee.state_id|LEFT OUTER', 'city' => 'city.id = employee.city_id|LEFT OUTER');
        $res = $this->Master_model->getMaster('employee', $where, $join);
        // print_r($this->db->last_query());die;
        $config = array();
        $config["base_url"] = base_url('employer/index');
        $config["total_rows"] = count($res);
        $config['per_page'] = 5;
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
        $data["result"] = $this->Master_model->getMaster("employee", $where, $join, $order = "ASC", $field = "employee.emp_id", $select = false, $config["per_page"], $page, $search = false, $group_by = FALSE);
        $this->load->view('fontend/employer/deactivated_employees', $data);
    }
    public function suspended_employees() {
        $employer = $this->session->userdata('company_profile_id');
        //$company=$employer['company_profile_id'];
        $day = date("Y-m-d H:i:s", strtotime('-24 hours', time()));
        $where = 'employee.org_id="' . $employer . '" and employee.emp_status="3"  and employee.emp_updated_date < "' . $day . '"';
        //$data['result'] = $this->Master_model->getMaster('industry',$where=FALSE);
        $join = array('department' => 'department.dept_id = employee.dept_id|LEFT OUTER', 'country' => 'country.country_id = employee.country_id|LEFT OUTER', 'state' => 'state.state_id = employee.state_id|LEFT OUTER', 'city' => 'city.id = employee.city_id|LEFT OUTER');
        $res = $this->Master_model->getMaster('employee', $where, $join);
        // print_r($this->db->last_query());die;
        $config = array();
        $config["base_url"] = base_url('employer/index');
        $config["total_rows"] = count($res);
        $config['per_page'] = 5;
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
        $data["result"] = $this->Master_model->getMaster("employee", $where, $join, $order = "ASC", $field = "employee.emp_id", $select = false, $config["per_page"], $page, $search = false, $group_by = FALSE);
        $this->load->view('fontend/employer/suspended', $data);
    }
    public function allconsultants() {
        $employer = $this->session->userdata('company_profile_id');
        $where = 'consultant_company_mapping.company_id="' . $employer . '"and consultant_company_mapping.cons_status="0"';
        $join = array('company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|LEFT OUTER');
        $data['result'] = $this->Master_model->getMaster('consultant_company_mapping', $where, $join, $order = "ASC", $field = "con_comp_map_id", $select = false, $config["per_page"], $page, $search = false, $group_by = false);
        $config = array();
        $config["base_url"] = base_url('employer/index');
        $config["total_rows"] = count($res);
        $config['per_page'] = 5;
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
        $this->load->view('fontend/consultant/consultant_master', $data);
    }
    /*Delete Employee*/
    public function deleteemployee() {
        $id = $this->input->post('id');
        $del = array('emp_status' => '0');
        $where11['emp_id'] = $id;
        $old_employee_profile = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where11);
        $this->Master_model->master_update($del, 'employee', $where11);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $old_employee_profile['emp_name'], 'field_changed' => 'Deleted Employee', 'Action' => 'Deleted ' . $old_employee_profile['emp_name'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
    }
    function change_status() {
        $id = $this->input->post('id');
        $where11['emp_id'] = $id;
        $result = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
        // print_r($result['emp_status']);die;
        $status = array('emp_status' => '0');
        $this->Master_model->master_update($status, 'employee', $where11);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $result['emp_name'], 'field_changed' => 'Deactivated Employee', 'Action' => 'Deactivated employee ' . $result['emp_name'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
        // print_r($this->db->last_query());die();
        
    }
    function activate() {
        $id = $this->input->post('id');
        $where11['emp_id'] = $id;
        $result = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
        // print_r($result['emp_status']);die;
        $status = array('emp_status' => '1');
        $this->Master_model->master_update($status, 'employee', $where11);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $result['emp_name'], 'field_changed' => 'Activated Employee', 'Action' => 'Activated employee ' . $result['emp_name'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
    }
    function suspend() {
        $id = $this->input->post('id');
        $where11['emp_id'] = $id;
        $result = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
        // print_r($result['emp_status']);die;
        $status = array('emp_status' => '3');
        $this->Master_model->master_update($status, 'employee', $where11);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $result['emp_name'], 'field_changed' => 'Suspended Employee', 'Action' => 'Suspended employee ' . $result['emp_name'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
    }
    /*Edit Employee*/
    public function editemployee() {
        $c_id = $this->input->get('id');
        $where = "emp_id='$c_id'";
        $data['result'] = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
        $data['department'] = $this->Master_model->getMaster('department', $where = false);
        $data['country'] = $this->Master_model->getMaster('country', $where = false);
        $data['state'] = $this->Master_model->getMaster('state', $where = false);
        $data['city'] = $this->Master_model->getMaster('city', $where = false);
        $data['roles'] = $this->Master_model->getMaster('user_role', $where = false);
        //echo $this->db->last_query(); die;
        $this->load->view('fontend/employer/employee_management', $data);
        // $this->load->view('fontend/employer/edit_employee',$data);
        
    }
    public function edit_consultant() {
        $consultant_id = $this->input->get('id');
        $where_cond = "consultant_company_mapping.con_comp_map_id='$consultant_id'";
        $join_cond = array('company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|INNER');
        $data['consultant_id'] = $consultant_id;
        $data['country'] = $this->Master_model->getMaster('country', $where = false);
        $data['state'] = $this->Master_model->getMaster('state', $where = false);
        $data['city'] = $this->Master_model->getMaster('city', $where = false);
        $data['company_info'] = $this->Master_model->get_master_row('consultant_company_mapping', $select = FALSE, $where = $where_cond, $join = $join_cond);
        $this->load->view('fontend/consultant/edit_consultant', $data);
    }
    public function delete_consultant() {
        $id = $this->input->post('id');
        $del = array('cons_status' => '1');
        $where11['con_comp_map_id'] = $id;
        $this->Master_model->master_update($del, 'consultant_company_mapping', $where11);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted Consultant', 'Action' => 'Deleted Consultant', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
    }
    public function postEditData() {
        $user_id = $this->session->userdata('company_profile_id');
        // $this->form_validation->set_rules('Password', 'Password', 'required|max_length[15]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]');
        $this->form_validation->set_rules('emp_no', 'Employee No.', 'required|min_length[3]|max_length[6]|alpha_numeric');
        $this->form_validation->set_rules('emp_name', 'Name', 'required');
        $this->form_validation->set_rules('mobile', ' Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('dept_id', 'Department', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        // $this->form_validation->set_rules('pincode', 'Pincode', 'required|numeric');
        array('required' => 'You must provide a %s.');
        // $this->form_validation->set_message('regex_match', 'You must provide One Uppercase,One Lowercase,Numbers and special Character');
        if ($this->form_validation->run() == FALSE) {
            $c_id = $this->input->get('id');
            $where = "emp_id='$c_id'";
            $data['result'] = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
            $data['department'] = $this->Master_model->getMaster('department', $where = false);
            $data['country'] = $this->Master_model->getMaster('country', $where = false);
            $data['state'] = $this->Master_model->getMaster('state', $where = false);
            $data['city'] = $this->Master_model->getMaster('city', $where = false);
            $this->load->view('fontend/employer/employee_management', $data);
        } else {
            $id = $this->input->post('cid');
            $where['emp_id'] = $id;
            $old_employee_profile = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
            $old_array_keys = array_keys($old_employee_profile);
            $old_array_values = array_values($old_employee_profile);
            // print_r($old_array_keys);
            // print_r($old_array_values);die;
            $size = sizeof($old_array_keys);
            $List = implode(',', $this->input->post('user_acc'));
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
            $data['password'] = md5($this->input->post('password'));
            $data['emp_updated_date'] = date('Y-m-d H:i:s');
            $data['emp_updated_by'] = $user_id;
            $data['access_to_employee'] = $List;
            $data['user_role'] = $this->input->post('user_role');
            $id = $this->input->post('cid');
            $where['emp_id'] = $id;
            // print_r($data);
            $company_profile_id = $this->session->userdata('company_profile_id');
            $whereres = "company_profile_id='$company_profile_id'";
            $employer_data = $this->Master_model->get_master_row('company_profile', $select = FALSE, $whereres);
            $this->Master_model->master_update($data, 'employee', $where);
            for ($i = 0;$i < $size;$i++) {
                $parameter = $old_array_keys[$i];
                $old_data = $old_array_values[$i];
                $new_data = $data[$parameter];
                if (isset($new_data) && !empty($new_data)) {
                    if (($old_data == $new_data) || (($parameter == 'emp_updated_date') || ($parameter == 'emp_updated_by'))) {
                    } else {
                        $employee_name = $this->input->post('emp_name');
                        $company_name = $this->session->userdata('company_name');
                        $action = str_replace("_", ' ', $parameter);
                        $data = array('company' => $company_name, 'action_taken_for' => $employee_name, 'field_changed' => $action, 'Action' => 'Updated ' . $action . ' of ' . $employee_name, 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">' . $this->input->post('emp_name') . ' Employee Details have been updated Successfully !</div>');
                        // print_r($this->db->last_query());die;
                        
                    }
                }
            }
            if ($employer_data['last_login'] == "0000-00-00 00:00:00") {
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">“Add Superadmin Details</div>');
                $this->load->view('fontend/employer/Superadmin', $data);
            } else {
                $update_data = array('last_login' => date('Y-m-d H:i:s'));
                $where11['company_profile_id'] = $user_id;
                $this->Master_model->master_update($update_data, 'company_profile', $where11);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">' . $this->input->post('emp_name') . ' Changes happen updated successfully !</div>');
                redirect(base_url() . 'employer/addemployee');
            }
        }
    }
    public function search() {
        $term = $this->input->get('term');
        $this->db->like('pincode', $term);
        $data = $this->db->get("pincode")->result();
        echo json_encode($data);
    }
    function gettopic() {
        $topic_id = $this->input->post('id');
        $where['technical_id'] = $topic_id;
        $topics = $this->Master_model->getMaster('topic', $where);
        $result;
        if (!empty($topics)) {
            $result.= '<option value="0">General</option>';
            foreach ($topics as $key) {
                $result.= '<option value="' . $key['topic_id'] . '">' . $key['topic_name'] . '</option>';
            }
        } 

            // else {
        //     // $result.= '<option value="">Topic not available</option>';
        //     $result.= '';
        // }
        echo $result;
    }
    function getsubtopic() {
        $subtopic_id = $this->input->post('id');
        $where['topic_id'] = $subtopic_id;
        $subtopics = $this->Master_model->getMaster('subtopic', $where);
        $result = '';
        if (!empty($subtopics)) {
            $result.= '<option value="0">General</option>';
            foreach ($subtopics as $key) {
                $result.= '<option value="' . $key['subtopic_id'] . '">' . $key['subtopic_name'] . '</option>';
            }
        } else {
            // $result.= '<option value="">Subtopic not available</option>';
            $result.= '';
        }
        echo $result;
    }
    function getlineitem() {
        $lineitem_id = $this->input->post('id');
        $where['subtopic_id'] = $lineitem_id;
        $lineitems = $this->Master_model->getMaster('lineitem', $where);
        $result = '';
        if (!empty($lineitems)) {
            $result.= '<option value="0">General</option>';
            foreach ($lineitems as $key) {
                $result.= '<option value="' . $key['lineitem_id'] . '">' . $key['title'] . '</option>';
            }
        } else {
            // $result.= '<option value="">Lineitem not available</option>';
            $result.= '';
        }
        echo $result;
    }
    function getLineitemlevel() {
        $lineitemlevel_id = $this->input->post('id');
        $where['lineitem_id'] = $lineitemlevel_id;
        $lineitemlevels = $this->Master_model->getMaster('lineitemlevel', $where);
        $result = '';
        if (!empty($lineitemlevels)) {
            $result.= '<option value="0">General</option>';
            foreach ($lineitemlevels as $keys) {
                $result.= '<option value="' . $keys['lineitemlevel_id'] . '">' . $keys['titles'] . '</option>';
            }
        } else {
            $result.= '<option value="">Lineitem Level not available</option>';
            $result.= '';
        }
        echo $result;
    }
    public function all_exam_result($job_id = null) {
        $company_id = $this->session->userdata('company_profile_id');
        if (!empty($job_id) && $this->job_posting_model->check_jobid_and_post_id($job_id, $company_id) == true) {
            $data['job_id'] = $job_id;
            $where_test = "js_test_info.job_id='$job_id'";
            $join_arr = array('js_info' => 'js_info.job_seeker_id=js_test_info.js_id |INNER');
            $select_result = "js_test_info.marks,js_test_info.test_id,js_test_info.js_id, js_info.full_name";
            $data['exam_attended_candidates'] = $this->Master_model->getList($condition, $field_by, $order_by, $offset, $perpage, 'js_test_info', $search, $join_arr, $where_test, $select_result, $distinct = FALSE, $group_by = 'js_id');
            //echo $this->db->last_query(); die;
            $this->load->view('fontend/exam/result_details', $data);
        } else {
            echo "not found";
        }
    }
    // search city
    function search_city() {
        if (isset($_GET['term'])) {
            $result = $this->job_posting_model->search_city($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) $arr_result[] = $row->city_name;
                echo json_encode($arr_result);
            }
        }
    }
    function search_title() {
        if (isset($_GET['term'])) {
            $result = $this->job_posting_model->search_job_title($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) $arr_result[] = $row->name;
                echo json_encode($arr_result);
            }
        }
    }
    function search_job_keywords() {
        $employer_id = $this->session->userdata('company_profile_id');
        if (isset($_GET['term'])) {
            $result = $this->job_posting_model->search_job_keywords($_GET['term'], $employer_id);
            if (count($result) > 0) {
                $i = 0;
                foreach ($result as $row) $arr_result[$i]['label'] = $row->job_title;
                $arr_result[$i]['value'] = $row->job_post_id;
                $i++;
                echo json_encode($arr_result);
            }
        }
    }

    function search_candidate() {
        $employer_id = $this->session->userdata('company_profile_id');
        if (isset($_GET['term'])) {
            $result = $this->job_posting_model->search_candidate($_GET['term'], $employer_id);
            if (count($result) > 0) {
                $i = 0;
                foreach ($result as $row) $arr_result[$i]['label'] = $row->js_email;
                $arr_result[$i]['value'] = $row->cv_id;
                $i++;
                echo json_encode($arr_result);
            }
        }
    }
    function search_people() {
        $employer_id = $this->session->userdata('company_profile_id');
        if (isset($_GET['term'])) {
            $result1 = $this->job_posting_model->search_connection($_GET['term']);
            $result2 = $this->job_posting_model->search_company_connection($_GET['term']);
            $result = array_merge($result1, $result2);
            if (count($result) > 0) {
                $i = 0;
                foreach ($result as $row) {
                    $arr_result[$i]['label'] = $row->name;
                    $arr_result[$i]['value'] = $row->id;
                    $i++;
                }
                echo json_encode($arr_result);
            }
        }
    }
    function search_skill() {
        if (isset($_GET['term'])) {
            $result = $this->job_posting_model->search_skills($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) $arr_result[] = $row->skill_name;
                echo json_encode($arr_result);
            }
        }
    }
    /*import question*/
    public function importquestion() {
        //load model
        $this->load->model('Questionbank_employer_model');
        // Check form submit or not
        //   print_r($_POST);
        //   print_r($_FILES);die;
        // if ($this->input->post('upload') != NULL) {
        //     $data = array();
            // print_r($_FILES);
            if (!empty($_FILES['file']['name'])) {
                // Set preference
                $config['upload_path'] = 'question_excel/files/';
                $config['allowed_types'] = '*';
                $config['max_size'] = '1000'; // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                // Load upload library
                $this->load->library('upload', $config);
                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    // Reading file
                    $file = fopen("question_excel/files/" . $filename, "r");
                    $i = 0;
                    $importData_arr = array();
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                        $num = count($filedata);
                        for ($c = 0;$c < $num;$c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    $skip = 0;
                    // insert import data
                foreach ($importData_arr as $userdata) {
                        if ($skip != 0) {
                            echo "<pre>";
                            //print_r($userdata);
                            $tech_id = $userdata[0];
                            $where_skill = "skill_name='" . $tech_id . "'";
                            $tech_data = $this->Master_model->getMaster('skill_master', $where_skill);
                            //print_r($tech_data);
                            $userdata[0] = $tech_data[0]['id'];
                            $topic_id = $userdata[1];
                            $where_topic = "topic_name='" . $topic_id . "'";
                            $topic_data = $this->Master_model->getMaster('topic', $where_topic);
                            //print_r($topic_data);
                            $userdata[1] = $topic_data[0]['topic_id'];
                            $subtopic = $userdata[2];
                            $where_subtopic = "subtopic_name='" . $subtopic . "'";
                            $subtopic_data = $this->Master_model->getMaster('subtopic', $where_subtopic);
                            //print_r($subtopic_data);
                            $userdata[2] = $subtopic_data[0]['subtopic_id'];
                            $lineitem = $userdata[3];
                            $where_lineitem = "title='" . $lineitem . "'";
                            $lineitem_data = $this->Master_model->getMaster('lineitem', $where_lineitem);
                            //print_r($lineitem_data);
                            $userdata[3] = $lineitem_data[0]['lineitem_id'];
                            $lineitemlevel = $userdata[4];
                            $where_lineitemlevel = "titles='" . $lineitemlevel . "'";
                            $lineitemlevel_data = $this->Master_model->getMaster('lineitemlevel', $where_lineitemlevel);
                            //print_r($lineitemlevel_data);die();
                            $userdata[4] = $lineitemlevel_data[0]['lineitemlevel_id'];
                            $options = $userdata[13];
                            $where_options = "options_type='" . $options . "'";
                            $options_data = $this->Master_model->getMaster('options', $where_options);
                            //print_r($options_data);die();
                            $userdata[13] = $options_data[0]['options_id'];
                            $this->Questionbank_employer_model->insertRecord($userdata);
                            $company_name = $this->session->userdata('company_name');
                            $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Imported Questions', 'Action' => 'Imported new Questions.', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                            //echo $this->db->last_query();die();
                            
                        }
                        $skip++;
                    }
            redirect('employer/all_questions');
                    
                    // redirect('employer/questionbank-import');
                    $data['response'] = 'successfully uploaded ' . $filename;
                } else {
                     $error = array('error' => $this->upload->display_errors());
                     // print_r($error);die;
                $data['response'] = 'failed'.$error;
                }
            } else {
                
                $data['response'] = 'failed';
            }
            // load view
            redirect('employer/all_questions');
            // $this->load->view('fontend/employer/questionbank_view', $data);
        // } 
        // else {
        //     // load view
        //     $this->load->view('fontend/employer/questionbank_view', $data);
        // }
    }
    public function interview_scheduler() {
        $company_id = $this->session->userdata('company_profile_id');
        // $emails= base64_decode($this->input->post('job_apply_email'));
        $job_apply_id = $this->input->post('job_apply_id');
        $where_apply = "job_apply_id='$job_apply_id'";
        $select_edu = "job_seeker_id,job_post_id,job_apply_id";
        $data['js_apply_data'] = $this->Master_model->get_master_row("job_apply", $select_edu, $where_apply, $join = FALSE);
        $job_seeker_id = $data['js_apply_data']['job_seeker_id'];
        $job_post_id = $data['js_apply_data']['job_post_id'];
        $where_js = "job_seeker_id='$job_seeker_id'";
        $data['js_info_data'] = $this->Master_model->get_master_row("js_info", $select = FALSE, $where_js, $join = FALSE);
        $where_int = "job_seeker_id='$job_seeker_id' AND job_post_id='$job_post_id'";
        $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select = FALSE, $where_int, $join = FALSE);
        $this->load->view('fontend/employer/interview_form', $data);
    }
    public function get_details_report() {
        $company_id = $this->session->userdata('company_profile_id');
        // $emails= base64_decode($this->input->post('job_apply_email'));
        $job_seeker_id = $this->input->post('job_seeker_id');
        $job_id = $this->input->post('job_id');
        $exam_res = getExamResultByID($job_seeker_id, $job_id);
        $table = "js_test_info";
        $where_res['job_id'] = $job_id;
        $where_res['js_id'] = $job_seeker_id;
        $join = array("questionbank" => "questionbank.ques_id=js_test_info.question_id | LEFT OUTER");
        $exam_result = $this->Master_model->getMaster($table, $where_res, $join, 'asc', 'date_time', $select_result, $limit = false, $start = false, $search = false);
        $where_start['job_seeker_id'] = $job_seeker_id;
        $where_start['job_post_id'] = $job_id;
        $exam_start = $this->Master_model->getMaster('job_apply', $where_start, FALSE, false, FALSE, FALSE, $limit = false, $start = false, $search = false);
        // print_r($exam_result);die;
        // $where_apply="job_apply_id='$job_apply_id'";
        // $select_edu = "job_seeker_id,job_post_id,job_apply_id";
        // $data['js_apply_data'] = $this->Master_model->get_master_row("job_apply", $select_edu, $where_apply, $join = FALSE);
        // $job_seeker_id = $data['js_apply_data']['job_seeker_id'];
        // $job_post_id = $data['js_apply_data']['job_post_id'];
        // $where_js="job_seeker_id='$job_seeker_id'";
        // $data['js_info_data'] = $this->Master_model->get_master_row("js_info", $select= FALSE, $where_js, $join = FALSE);
        // $where_int="job_seeker_id='$job_seeker_id' AND job_post_id='$job_post_id'";
        // $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select= FALSE, $where_int, $join = FALSE);
        $this->load->view('fontend/employer/detail_result', compact('exam_res', 'exam_result', 'exam_start'));
    }
    public function interview_rescheduler() {
        $company_id = $this->session->userdata('company_profile_id');
        $data['interview_id'] = $this->input->post('interview_id');
        $this->load->view('fontend/employer/confirm_reschedule', $data);
    }
    public function update_interview_scheduler() {
        $company_id = $this->session->userdata('company_profile_id');
        $job_apply_id = $this->input->post('apply_id');
        $interview_id = $this->input->post('interview_id');
        $where_apply = "job_apply_id='$job_apply_id'";
        $select_edu = "job_seeker_id,job_post_id,job_apply_id";
        $data['js_apply_data'] = $this->Master_model->get_master_row("job_apply", $select_edu, $where_apply, $join = FALSE);
        $job_seeker_id = $data['js_apply_data']['job_seeker_id'];
        $job_post_id = $data['js_apply_data']['job_post_id'];
        $where_js = "job_seeker_id='$job_seeker_id'";
        $data['js_info_data'] = $this->Master_model->get_master_row("js_info", $select = FALSE, $where_js, $join = FALSE);
        $where_int = "id='$interview_id'";
        $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select = FALSE, $where_int, $join = FALSE);
        $this->load->view('fontend/employer/update_interview_from', $data);
    }
    public function send_interview_invitation($job_apply_id = null) {
        $company_id = $this->session->userdata('company_profile_id');
        $apply_id = $job_apply_id;
        $where_apply = "job_apply_id='$apply_id'";
        $select_s = "job_seeker_id,job_post_id";
        $js_apply = $this->Master_model->get_master_row("job_apply", $select_s, $where_apply, $join = FALSE);
        $where_edu = "job_seeker_id='" . $js_apply['job_seeker_id'] . "'";
        $select_edu = "full_name,email";
        $js_data = $this->Master_model->get_master_row("js_info", $select_edu, $where_edu, $join = FALSE);
        $where_job = "job_post_id='" . $js_apply['job_post_id'] . "'";
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
        $inte_array = array('job_post_id' => $js_apply['job_post_id'], 'job_seeker_id' => $js_apply['job_seeker_id'], 'company_id' => $company_id,
        // 'interview_date'        => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date))),
        // 'start_time'            => $start_time,
        // 'end_time'              => $end_time,
        'interview_type' => $interview_type, 'interview_details' => $interview_address, 'message_to_candidate' => $user_message);
        $inter_his_array = array('job_post_id' => $js_apply['job_post_id'], 'job_seeker_id' => $js_apply['job_seeker_id'], 'company_id' => $company_id,
        // 'interview_date'        => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date))),
        //  'start_time'            => $start_time,
        //'end_time'              => $end_time,
        'interview_type' => $interview_type, 'interview_details' => $interview_address, 'message_to_candidate' => $user_message, 'created_on' => date('Y-m-d H:i:s'), 'created_by' => $company_id);
        $this->Master_model->master_insert($inter_his_array, 'interview_history');
        if (empty($interview_id)) {
            $inte_array['created_by'] = $company_id;
            $inte_array['created_on'] = date('Y-m-d H:i:s');
            $ins_id = $this->Master_model->master_insert($inte_array, 'interview_scheduler');
            $company_name = $this->session->userdata('company_name');
            $data = array('company' => $company_name, 'action_taken_for' => $js_data['full_name'], 'field_changed' => 'Interview Invitation', 'Action' => 'Interview Invitation has been sent to ' . $js_data['full_name'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
            if ($ins_id) {
                $where_del = "interview_id='$ins_id'";
                $del = $this->Master_model->master_delete('interview_dates', $where_del);
                if ($del == true) {
                    for ($l = 0;$l < sizeof($interview_date);$l++) {
                        if ($interview_date[$l] != '') {
                            $lang_array = array('interview_id' => $ins_id, 'interview_date' => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date[$l]))), 'start_time' => $start_time[$l], 'end_time' => $end_time[$l]);
                            $this->Master_model->master_insert($lang_array, 'interview_dates');
                            $this->Master_model->master_insert($lang_array, 'interview_dates_history');
                        }
                    }
                }
                $where['interview_id'] = $ins_id;
                $interview_dates = $this->Master_model->getMaster('interview_dates', $where);
                $email = $js_data['email'];
                // $email = 'shyam@itdivine.in';
                $subject = 'UNCONFIRMED. Interview request for ' . $js_data['full_name'];
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
                    <br><br>Hi ' . $js_data['full_name'] . ',<br>' . $user_message . '<br/><br/>Please check the following interview details: <br/><b>Job Title: </b> ' . $job_data['job_title'] . '<br/>
                        <table>
                        <tr><td>Interview Date</td><td>Start Time</td><td>End Time</td><td></td></tr>';
                if (sizeof($interview_dates) == 1) {
                    for ($l1 = 0;$l1 < sizeof($interview_dates);$l1++) {
                        $message.= '<tr><td>' . $interview_dates[$l1]['interview_date'] . '</td><td>' . $interview_dates[$l1]['start_time'] . '</td><td>' . $interview_dates[$l1]['end_time'] . '</td><td></td></tr>';
                    }
                    $message.= '
                                </table><br/><b>Interview Type: </b> ' . $interview_type . '<br/><b>Interview Details: </b> ' . $interview_address . '<br>';
                    $message.= '
                                <br><br><a href="' . base_url() . 'Confirm_interview/confirm_interview_now?apply_id=' . base64_encode($ins_id) . '&js_id=' . base64_encode($email) . '" class="btn btn-primary" value="Confirm Interview" align="center" target="_blank">Confirm Interview</a>
                                <a href="' . base_url() . 'Confirm_interview/reschedule_interview?apply_id=' . base64_encode($ins_id) . '&js_id=' . base64_encode($email) . '" class="btn btn-info" value="Reschedule Interview" align="center" target="_blank">Reschedule Interview</a>';
                } else {
                    for ($l1 = 0;$l1 < sizeof($interview_dates);$l1++) {
                        $message.= '<tr><td>' . $interview_dates[$l1]['interview_date'] . '</td><td>' . $interview_dates[$l1]['start_time'] . '</td><td>' . $interview_dates[$l1]['end_time'] . '</td><td><a href="#">Select</a></td></tr>';
                    }
                    $message.= '
                                </table><br/><b>Interview Type: </b> ' . $interview_type . '<br/><b>Interview Details: </b> ' . $interview_address . '<br>';
                }
                $message.= ' <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                $send = sendEmail_JobRequest($email, $message, $subject);
                redirect('employer/all_applicant/' . $js_apply['job_post_id']);
            }
        } else {
            $where_ins['id'] = $interview_id;
            $old_interview_data = $this->Master_model->get_master_row('interview_scheduler', $select = FALSE, $where_ins);
            $old_array_keys = array_keys($old_interview_data);
            $old_array_values = array_values($old_interview_data);
            // print_r($old_array_keys);
            // print_r($old_array_values);die;
            $size = sizeof($old_array_keys);
            for ($i = 0;$i < $size;$i++) {
                $parameter = $old_array_keys[$i];
                $old_data = $old_array_values[$i];
                $new_data = $inte_array[$parameter];
                if (isset($new_data) && !empty($new_data)) {
                    if ($old_data == $new_data) {
                    } else {
                        $company_name = $this->session->userdata('company_name');
                        $action = str_replace("_", ' ', $parameter);
                        $data = array('company' => $company_name, 'action_taken_for' => $js_data['full_name'], 'field_changed' => $action, 'Action' => 'Changed ' . $action, 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                        // print_r($this->db->last_query());die;
                        
                    }
                }
            }
            $inte_array['updated_by'] = $company_id;
            $inte_array['updated_on'] = date('Y-m-d H:i:s');
            $where_ins['id'] = $interview_id;
            $ins_id = $this->Master_model->master_update($inte_array, 'interview_scheduler', $where_ins);
            if ($ins_id) {
                $where_del = "interview_id='$interview_id'";
                $del = $this->Master_model->master_delete('interview_dates', $where_del);
                if ($del == true) {
                    for ($l = 0;$l < sizeof($interview_date);$l++) {
                        if ($interview_date[$l] != '') {
                            $lang_array = array('interview_id' => $interview_id, 'interview_date' => date('Y-m-d', strtotime(str_replace('/', '-', $interview_date[$l]))), 'start_time' => $start_time[$l], 'end_time' => $end_time[$l]);
                            $this->Master_model->master_insert($lang_array, 'interview_dates');
                            $this->Master_model->master_insert($lang_array, 'interview_dates_history');
                        }
                    }
                }
                $where['interview_id'] = $interview_id;
                $interview_datess = $this->Master_model->getMaster('interview_dates', $where);
                $email = $js_data['email'];
                // $email = 'shyam@itdivine.in';
                $subject = 'UNCONFIRMED RESCHEDULED. Interview request for ' . $js_data['full_name'];
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
                    <br><br>Hi ' . $js_data['full_name'] . ',<br>' . $user_message . '<br/><br/>Please check the following rescheduled interview details: <br/><b>Job Title: </b> ' . $job_data['job_title'] . '<br/>
                         <table>
                        <tr><td><b>Interview Date</b></td><td><b>Start Time</b></td><td><b>End Time</b></td></tr>';
                if (sizeof($interview_datess) == 1) {
                    for ($l1 = 0;$l1 < sizeof($interview_datess);$l1++) {
                        $message.= '<tr><td>' . $interview_datess[$l1]['interview_date'] . '</td><td>' . $interview_datess[$l1]['start_time'] . '</td><td>' . $interview_datess[$l1]['end_time'] . '</td><td></td></tr>';
                    }
                    $message.= '
                                </table><br/><b>Interview Type: </b> ' . $interview_type . '<br/><b>Interview Details: </b> ' . $interview_address . '<br>';
                    $message.= '
                                <br><br><a href="' . base_url() . 'Confirm_interview/confirm_interview_now?apply_id=' . base64_encode($ins_id) . '&js_id=' . base64_encode($email) . '" class="btn btn-primary" value="Confirm Interview" align="center" target="_blank">Confirm Interview</a>
                                <a href="' . base_url() . 'Confirm_interview/reschedule_interview?apply_id=' . base64_encode($ins_id) . '&js_id=' . base64_encode($email) . '" class="btn btn-info" value="Reschedule Interview" align="center" target="_blank">Reschedule Interview</a>';
                } else {
                    for ($l1 = 0;$l1 < sizeof($interview_datess);$l1++) {
                        $message.= '<tr><td>' . $interview_datess[$l1]['interview_date'] . '</td><td>' . $interview_datess[$l1]['start_time'] . '</td><td>' . $interview_datess[$l1]['end_time'] . '</td><td><a href="' . base_url() . 'Confirm_interview/select_slot?apply_id=' . base64_encode($interview_datess[$l1]['id']) . '&js_id=' . base64_encode($email) . '" target="_blank">Select</a></td></tr>';
                    }
                    $message.= '
                                </table><br/><b>Interview Type: </b> ' . $interview_type . '<br/><b>Interview Details: </b> ' . $interview_address . '<br>';
                }
                $message.= ' <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                $send = sendEmail_JobRequest($email, $message, $subject);
                redirect('employer/all_applicant/' . $js_apply['job_post_id']);
            }
        }
    }
    public function update_interview_status() {
        $company_id = $this->session->userdata('company_profile_id');
        $interview_id = $this->input->post('interview_id');
        $job_id = $this->input->post('job_id');
        $where_int = "id='$interview_id'";
        $data['interview_data'] = $this->Master_model->get_master_row("interview_scheduler", $select = FALSE, $where_int, $join = FALSE);
        $this->load->view('fontend/employer/interview_status_form', $data);
    }
    public function update_inter_status() {
        $company_id = $this->session->userdata('company_profile_id');
        $interview_id = $this->input->post('interview_id');
        $job_id = $this->input->post('job_id');
        $status_array['interview_complete_status'] = $this->input->post('interview_status');
        $status_array['updated_by'] = $company_id;
        $status_array['updated_on'] = date('Y-m-d H:i:s');
        $ins_id = $this->Master_model->master_update($status_array, 'interview_scheduler', $where_ins);
        if ($this->input->post('interview_status') == '1') {
            $status = 'Completed';
        } else {
            $status = 'Not Completed';
        }
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => 'Jobseeker', 'field_changed' => 'Interview Status', 'Action' => 'Updated Interview Status to ' . $status, 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
        redirect('employer/all_applicant/' . $job_id);
    }
    public function cancel_interview($interview_id, $job_post_id) {
        // $this->Job_career_model->delete_career($job_seeker_id);
        $job_id = $job_post_id;
        $interview_id1 = $interview_id;
        $where1 = "id='$interview_id1'";
        $del1 = $this->Master_model->master_delete('interview_scheduler', $where1);
        // print_r($this->db->last_query());die;
        if ($del1) {
            $where_del = "interview_id='$interview_id1'";
            $del = $this->Master_model->master_delete('interview_dates', $where_del);
        }
        redirect('employer/all_applicant/' . $job_id);
    }
    function get_autocomplete() {
        if (isset($_GET['term'])) {
            // $this->load->model('Consultant_autocomplete_model');
            $result = $this->Job_seeker_experience_model->autocomplete_companies($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) $arr_result[] = $row->company_name;
                echo json_encode($arr_result);
            }
        }
    }
    function get_company_info() {
        $s = $this->input->post('comp_name');
        $where1 = "company_name = '$s'";
        $join = array("country" => "country.country_id=company_profile.country_id | LEFT OUTER", "city" => "city.id=company_profile.city_id | LEFT OUTER", "state" => "state.state_id=company_profile.state_id | LEFT OUTER");
        $select = "company_profile_id,company_name,company_email,company_url,country_code,company_phone,contact_name,cont_person_email,cont_person_mobile,company_career_link,company_address,company_address2,company_pincode,comp_gstn_no,comp_pan_no,company_profile.country_id,city.city_name,state.state_name,company_profile.state_id,company_profile.city_id";
        $result = $this->Master_model->getMaster('company_profile', $where1, $join = $join, $order = false, $field = false, $select = $select, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    public function corporate_cv_bank($fid = null) {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'cv_bank';
        $this->session->set_userdata($data);
        $company_id = $this->session->userdata('company_profile_id');
        $this->load->model('Pincode_model');
        $data['active_cv_total'] = $this->Pincode_model->getactive_cvs($company_id);
        $data['Total_CVs_in_CVBank'] = $this->Pincode_model->gettotal_cvs($company_id);
        $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
        $sort_val = $this->input->post('sort_val');
        if (isset($fid) && !empty($fid) && empty($sort_val)) {
            $this->session->unset_userdata('activesubmenu');
            $data['activesubmenu'] = $fid;
            $this->session->set_userdata($data);
            // $where_c['cv_folder_id'] = $fid;
            // $where_c['status'] = 1;
            $where_c = "cv_folder_relation.cv_folder_id = '$fid' and cv_folder_relation.status = '1' and js_status = '0' group by cv_folder_relation.cv_id ";
            $join_cond = array('corporate_cv_bank' => 'corporate_cv_bank.cv_id = cv_folder_relation.cv_id|Left outer',
                'cv_folder' => 'cv_folder.id=cv_folder_relation.cv_folder_id');
            $data['cv_bank_data'] = $this->Master_model->getMaster('cv_folder_relation', $where_c, $join_cond, $order = 'desc', $field = 'relation_id', $select = false, $limit = false, $start = false, $search = false);
            $data['total_cvs']=sizeof($data['cv_bank_data']);
            $data['active_cv'] = $this->Pincode_model->getactive_folder_cvs($company_id,$fid);
             // print_r($this->db->last_query());die;
            $data['fid'] = $fid;
            $data['fname'] = $data['cv_bank_data'][0]['folder_name'];
            $data['company_active_jobs'] = $this->job_posting_model->get_company_activedeasline_jobs($company_id);
            $where_trash = "company_id ='$company_id' and js_status = '1'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_trash_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_trash, $join, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
            $this->load->view('fontend/employer/cv_bank', $data);
        } elseif (isset($_POST['sort']) || !empty($sort_val)) {
            $this->session->unset_userdata('activesubmenu');
            $data['activesubmenu'] = $fid;
            $this->session->set_userdata($data);
            $sort_val = $this->input->post('sort_val');
            if (isset($sort_val) && !empty($sort_val)) {
                // $where_c['company_id'] = $company_id;
                // $where_c['js_status'] = '0';
                if (isset($fid) && !empty($fid)) {
                   $where_c = "cv_folder_id = '$fid' and status = '1' and js_status = '0' group by cv_folder_relation.cv_id ";
                   $data['fid'] = $fid;
                    $config['base_url'] = base_url() . 'employer/corporate_cv_bank/'.$fid;
                }
                else
                {
                     $where_c = "corporate_cv_bank.cv_id NOT IN (select cv_id from cv_folder_relation) and company_id ='$company_id' and js_status = '0'";
                      $config['base_url'] = base_url() . 'employer/corporate_cv_bank';
                }
                $join_cond = array('cv_folder_relation' => 'cv_folder_relation.cv_id = corporate_cv_bank.cv_id|Left outer');
            $cv_bank_data = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join_cond , $order = 'desc', $field = $sort_val, $select = false, $limit = false, $start = false, $search = false);
                // print_r($this->db->last_query());die;
            // $config['base_url'] = base_url() . 'employer/corporate_cv_bank';
             $data['total_cvs']=sizeof($cv_bank_data);
            $data['active_cv'] = $this->Pincode_model->getactive_folder_cvs($company_id,$fid);
               

            $config['total_rows'] = sizeof($cv_bank_data);
            $config['per_page'] = 5;
            $config['attributes'] = array('class' => 'myclass');
            $config['page_query_string'] = TRUE;
            $config['num_links'] = 2;
            // $config['use_page_numbers'] = TRUE;
            $config['query_string_segment'] = 'page';
            // $config['first_url'] = base_url() . 'index.php/store/items_details?merch_cat=' . $merch_cat . '&page=1';
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
              $data['cv_bank_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join = $join_cond, $order = 'desc', $field = $sort_val, $select = false, $limit = $config['per_page'], $start = $page, $search = false);
            $this->pagination->initialize($config);
            // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
           $data['sort'] =  $sort_val;
            $data["links"] = $this->pagination->create_links();
            $data['company_active_jobs'] = $this->job_posting_model->get_company_activedeasline_jobs($company_id);
                 $where_trash = "company_id ='$company_id' and js_status = '1'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_trash_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_trash, $join, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
                $this->load->view('fontend/employer/cv_bank', $data);
            }
        } else {
            $where_c = "corporate_cv_bank.cv_id NOT IN (select cv_id from cv_folder_relation) and company_id ='$company_id' and js_status = '0'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $cv_bank_data = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
          
                $data['total_cvs']=sizeof($cv_bank_data);
                  $data['active_cv'] = $this->Pincode_model->getactive_cvs($company_id);
            $data['company_active_jobs'] = $this->job_posting_model->get_company_activedeasline_jobs($company_id);
                    $config['base_url'] = base_url() . 'employer/corporate_cv_bank';
                    $config['total_rows'] = sizeof($cv_bank_data);
                    $config['per_page'] = 5;
                    $config['attributes'] = array('class' => 'myclass');
                    $config['page_query_string'] = TRUE;
                    $config['num_links'] = 2;
                    // $config['use_page_numbers'] = TRUE;
                    $config['query_string_segment'] = 'page';
                    // $config['first_url'] = base_url() . 'index.php/store/items_details?merch_cat=' . $merch_cat . '&page=1';
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
                    // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                   
                    $data["links"] = $this->pagination->create_links();
             $data['company_active_jobs'] = $this->job_posting_model->get_company_activedeasline_jobs($company_id);
            $where_c = "corporate_cv_bank.cv_id NOT IN (select cv_id from cv_folder_relation) and company_id ='$company_id' and js_status = '0'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_bank_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join, $order = 'desc', $field = 'cv_id', $select = false, $config["per_page"], $page, $search = false);
            $where_trash = "company_id ='$company_id' and js_status = '1'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_trash_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_trash, $join, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
       
            $this->load->view('fontend/employer/cv_bank', $data);
        }
        // $this->load->view('fontend/employer/corporate_cv_bank',$data);
        
    }
    public function add_new_cv($id = Null) {
        if (isset($id) && !empty($id)) {
            $data['id'] = $id;
        }
        $company_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            $this->form_validation->set_rules('candidate_name', 'Full Name', 'required');
            $this->form_validation->set_rules('candidate_email', 'Email Id', 'required|valid_email');
            $this->form_validation->set_rules('candidate_phone', 'Phone Number', 'required|integer|max_length[10]');
            // $this->form_validation->set_rules('candidate_experiance', 'Candidate Experiance','required|integer|max_length[2]');
            // $this->form_validation->set_rules('candidate_notice_period','Notice Period at Current Job','required|integer|max_length[2]');
            // $this->form_validation->set_rules('job_type','Job Type', 'required');
            // $this->form_validation->set_rules('current_job_desig','Company Job Designation', 'required|alpha');
            // //$this->form_validation->set_rules('current_work_location','Current Work Location', 'required');
            // $this->form_validation->set_rules('candidate_skills','skills', 'required');
            // $this->form_validation->set_rules('current_ctc','Current CTC', 'required|integer|max_length[2]');
            // $this->form_validation->set_rules('last_salary_hike','Last Salary Hike', 'required|integer|max_length[6]');
            // $this->form_validation->set_rules('top_education','Top Education', 'required|alpha');
            //         $this->form_validation->set_rules('candidate_skills','Skills', 'required|alpha_numeric_spaces');
            // $this->form_validation->set_rules('candidate_certification','Certifications', 'required|alpha_numeric_spaces');
            // $this->form_validation->set_rules('candidate_industry','Industry', 'required');
            // $this->form_validation->set_rules('candidate_role','Role', 'required');
            // $this->form_validation->set_rules('candidate_expected_sal','Expected Salary', 'required|integer|max_length[6]');
            // $this->form_validation->set_rules('desired_wrok_location','Desired Work Location', 'required|alpha');
            $this->form_validation->set_message('required', 'This field is mandatory!');
            if ($this->form_validation->run() == FALSE) {
                $data['industry_master'] = $this->Master_model->getMaster('job_category', $where = false);
                $data['department'] = $this->Master_model->getMaster('department', $where = false);
                $data['job_role'] = $this->Master_model->getMaster('job_role', $where = false);
                $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
                $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
                $data['skills'] = $this->Master_model->getMaster('skill_master', $where = false);
                $this->load->view('fontend/employer/add_cv', $data);
            } else {
                $update_cv_id = $this->input->post('cv_id');
                if (isset($update_cv_id) && !empty($update_cv_id)) {
                    $candidate_resume = isset($_FILES['candidate_resume']['name']) ? $_FILES['candidate_resume']['name'] : null;
                    // print_r($_FILES);die;
                    if (!empty($candidate_resume)) {
                        $config['upload_path'] = 'upload/Resumes/';
                        $config['allowed_types'] = '*';
                        $config['encrypt_name'] = false;
                        $config['max_size'] = 1000;
                        $config['max_width'] = 300;
                        $config['max_height'] = 300;
                        $this->load->library('upload', $config);
                        $result_upload = $this->upload->do_upload('candidate_resume');
                        $upload_data = $this->upload->data();
                        $resume = $upload_data['file_name'];
                        $cand_resume = $resume;
                        if (!$result_upload == true) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Logo Size Max size 300*300</div>');
                            redirect('employer/profile-setting');
                        }
                    }
                    $cv_data = array(
                        'company_id' => $company_id, 
                        'js_name' => $this->input->post('candidate_name'), 
                        'js_email' => $this->input->post('candidate_email'), 
                        'js_mobile' => $this->input->post('candidate_phone'), 
                        'js_job_type' => $this->input->post('job_type'),
                        'js_skype_id' => $this->input->post('skypid'),
                        'js_current_work_location' => $this->input->post('current_work_location'), 
                        'js_current_designation' => $this->input->post('current_job_desig'), 
                        'js_working_since' => date('Y-m-d', strtotime($this->input->post('working_current_since'))), 
                        'js_current_ctc' => $this->input->post('current_ctc'), 
                        'js_proposed_interview_date' => $this->input->post('proposed_interview_date'), 
                        'js_current_notice_period' => $this->input->post('candidate_notice_period'), 
                        'js_experience' => $this->input->post('candidate_experiance'), 
                        'js_last_salary_hike' => date('Y-m-d', strtotime($this->input->post('last_salary_hike'))), 
                        'js_top_education' => $this->input->post('top_education'),
                    // 'js_edu_special'             => $this->input->post('education_specialization'),
                    'js_skill_set' => implode(',', $this->input->post('candidate_skills')), 
                    'js_certifications' => $this->input->post('candidate_certification'), 
                    'js_industry' => $this->input->post('candidate_industry'), 
                    'js_role' => $this->input->post('candidate_role'), 
                    'js_expected_salary' => $this->input->post('candidate_expected_sal'), 
                    'js_desired_work_location' => $this->input->post('desired_wrok_location'), 
                    'current_org' => $this->input->post('current_org'), 
                    'ocean_candidate' => $ocean_candidate, 'js_resume' => $cand_resume,);
                    $cv_data['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                    $cv_data['updated_by'] = $company_id;
                    $where_del['cv_id'] = $update_cv_id;
                    $this->Master_model->master_update($cv_data, 'corporate_cv_bank', $where_del);
                    $fid=$this->input->get('fid');
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CV Updated Successfully !</div>');
                    redirect('employer/corporate_cv_bank/'.$fid);
                }
                $email = $this->input->post('candidate_email');
                $where_find = "js_email= '$email'";
                $exists = $this->Master_model->get_master_row('corporate_cv_bank', $select = FALSE, $where_find, $join = FALSE);
                $where_finds = "email= '$email'";
                $on_ocean = $this->Master_model->get_master_row('js_info', $select = FALSE, $where_finds, $join = FALSE);
                if ($on_ocean == true) {
                    $ocean_candidate = 'Yes';
                } else {
                    $ocean_candidate = 'No';
                }
                if ($exists == true) {
                    if (isset($id) && !empty($id)) {
                        $email = $this->input->post('candidate_email');
                        $job_post_id = $id;
                        $where_can = "email='$email'";
                        $can_data = $this->Master_model->getMaster('js_info', $where_can);
                        if (!empty($can_data)) {
                            $seeker_id = $can_data[0]['job_seeker_id'];
                        } else {
                            $new_JS_array = array('email' => $email, 'js_token' => md5($email), 'create_at' => date('Y-m-d H:i:s'));
                            $seeker_id = $this->Master_model->master_insert($new_JS_array, 'js_info');
                        }
                        $where_can = "email='$email'";
                        $can_data = $this->Master_model->getMaster('js_info', $where_can);
                        $where_cv = "js_email='$email' and company_id='$company_id'";
                        $cv_data = $this->Master_model->getMaster('corporate_cv_bank', $where_cv);
                        if (empty($cv_data)) {
                            $cv_array = array('company_id' => $company_id, 'js_name' => $can_data[0]['full_name'], 'js_email' => $can_data[0]['email'], 'js_mobile' => $can_data[0]['mobile_no'], 'created_on' => date('Y-m-d'), 'created_by' => $company_id);
                            $add_cv = $this->Master_model->master_insert($cv_array, 'corporate_cv_bank');
                            $cv_id = $add_cv;
                        } else {
                            $cv_id = $cv_data[0]['cv_id'];
                        }
                        // print_r($seeker_id);
                        $apply_array = array('job_seeker_id' => $seeker_id, 'company_id' => $company_id, 'job_post_id' => $job_post_id, 'forword_job_status' => 1, 'updated_on' => date('Y-m-d'),
                        // 'mandatory_parameters' => implode(',', $mandatory)
                        );
                        $whereres = "job_seeker_id='$seeker_id' and company_id = '$company_id' and job_post_id = '$id'";
                        $job_apply_data = $this->Master_model->get_master_row('
                        job_apply', $select = FALSE, $whereres);
                        // print_r($this->db->last_query());die;
                        if (empty($job_apply_data)) {
                            $apply = $this->Master_model->master_insert($apply_array, 'job_apply');
                            $frwd_array = array('cv_id' => $cv_id, 'company_id' => $company_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                            $frwd = $this->Master_model->master_insert($frwd_array, 'forwarded_jobs_cv');
                            $external_array = array('cv_id' => $cv_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'company_id' => $company_id, 'name' => $this->input->post('candidate_name'), 
                                'email' => $this->input->post('candidate_email'), 
                                'mobile' => $this->input->post('candidate_phone'), 
                                'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                            $frwd = $this->Master_model->master_insert($external_array, 'external_tracker');
                        }
                        if ($apply) {
                            $email_name = explode('@', $email);
                            $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . ',<br>' . $job_desc . '<br/><br/><em><b>Now Hiring!!</b></em> <br/><br/><b>Company Name:</b>' . $require['company_name'] . '<br/><br/> <b>Job Profile:</b><br/> <b>Job Title: </b> ' . $require['job_title'] . '<br/> <b>Experience: </b> ' . $require['experience'] . '<br/><b>Salary Offered: </b> ' . $require['salary_range'] . '<br/><b>Vacancies: </b> ' . $require['no_jobs'] . '<br/><b>Job Location: </b> ' . $require['city_name'] . '-' . $require['state_name'] . ',' . $require['country_name'] . '<br/><b>Job Role: </b> ' . $require['job_role_title'] . '<br/><b>Job Type: </b> ' . $require['job_types_name'] . '<br/><b>Job Nature: </b> ' . $require['job_nature_name'] . '<br/><b>Wrking Hrs: </b> ' . $require['working_hours'] . '<br/><b>Job Deadline: </b> ' . $require['job_deadline'] . '<br/><b>Education Required: </b> ' . $require['education_level_name'] . '(' . $require['education_specialization'] . ')' . '<br/><b>Preferred Age: </b> ' . $require['preferred_age'] . '-' . $require['preferred_age_to'] . '<br/><b>Required Skills: </b> ';
                            for ($j = 0;$j < sizeof($req_skill_details);$j++) {
                                $message.= ' <br>' . $req_skill_details[$j]['skill_name'];
                            }
                            $message.= '<br/><b>Job Description: </b> ' . $require['job_desc'] . '<br/><b>Job Benefits: </b> ' . $require['benefits'] . '<br/><b>Other Job Description: </b> ' . $require['education'] . '<br><br><a href="' . base_url() . 'job_forword_seeker/apply_forworded_job?apply_id=' . base64_encode($email) . '&job_id=' . base64_encode($apply) . '" class="btn btn-primary" value="Apply Now" align="center" target="_blank">Apply Now</a> <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><small>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</small><br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                            $send = sendEmail_JobRequest($email, $message, $subject);
                            //echo $send;
                            // echo $message;
                            $company_name = $this->session->userdata('company_name');
                            $data = array('company' => $company_name, 'action_taken_for' => $email, 'field_changed' => 'Forwarded Job ', 'Action' => $company_name . ' Forwarded job for the position of ' . $require['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                        }
                        $data['job_id'] = $id;
                        $this->session->set_userdata($data);
                        redirect('employer/internal_tracker');
                    }
                    $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">This CV already exists!</div>');
                } else {
                    $candidate_resume = isset($_FILES['candidate_resume']['name']) ? $_FILES['candidate_resume']['name'] : null;
                    // print_r($_FILES);die;
                    if (!empty($candidate_resume)) {
                        $config['upload_path'] = 'upload/Resumes/';
                        $config['allowed_types'] = '*';
                        $config['encrypt_name'] = false;
                        $config['max_size'] = 1000;
                        $config['max_width'] = 300;
                        $config['max_height'] = 300;
                        $this->load->library('upload', $config);
                        $result_upload = $this->upload->do_upload('candidate_resume');
                        $upload_data = $this->upload->data();
                        $resume = $upload_data['file_name'];
                        $cand_resume = $resume;
                        if (!$result_upload == true) {
                            $error = array('error' => $this->upload->display_errors());
                            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please Upload a Valid Logo Size Max size 300*300</div>');
                            redirect('employer/profile-setting');
                        }
                    }
                $cv_data = array('company_id' => $company_id, 
                    'js_name' => $this->input->post('candidate_name'), 
                    'js_email' => $this->input->post('candidate_email'), 
                    'js_mobile' => $this->input->post('candidate_phone'), 
                    'js_job_type' => $this->input->post('job_type'), 
                    'js_current_designation' => $this->input->post('current_job_desig'), 
                    'js_working_since' => date('Y-m-d', strtotime($this->input->post('working_current_since'))), 
                    'js_current_ctc' => $this->input->post('current_ctc'), 
                    'js_proposed_interview_date' => date('Y-m-d', strtotime($this->input->post('proposed_interview_date'))),
                    'js_current_notice_period' => $this->input->post('candidate_notice_period'), 
                    'js_experience' => $this->input->post('candidate_experiance'), 
                    'js_last_salary_hike' => date('Y-m-d', strtotime($this->input->post('last_salary_hike'))), 
                    'js_top_education' => $this->input->post('top_education'),
                     'js_skype_id' => $this->input->post('skypid'),
                        'js_current_work_location' => $this->input->post('current_work_location'),
                    // 'js_edu_special'             => $this->input->post('education_specialization'),
                    'js_skill_set' => implode(',', $this->input->post('candidate_skills')), 'js_certifications' => $this->input->post('candidate_certification'), 'js_industry' => $this->input->post('candidate_industry'), 'js_role' => $this->input->post('candidate_role'), 'js_expected_salary' => $this->input->post('candidate_expected_sal'), 'js_desired_work_location' => $this->input->post('desired_wrok_location'), 'current_org' => $this->input->post('current_org'), 'ocean_candidate' => $ocean_candidate, 'js_resume' => $cand_resume,);
                    $cv_data['created_on'] = date('Y-m-d H:i:s');
                    $cv_data['created_by'] = $company_id;
                    $update_cv_id = $this->input->post('cv_id');
                    $cv_id = $this->Master_model->master_insert($cv_data, 'corporate_cv_bank');
                    $to_email = $this->input->post('candidate_email');
                    if (isset($_POST['send_email'])) {
                        $this->company_profile_model->sendcandEmail($to_email);
                    }
                    $fid = $this->input->get('fid');
                    // print_r($fid);die;
                    if (isset($fid) && !empty($fid)) {
                        $cv_folder_data['cv_folder_id'] = $fid;
                        $cv_folder_data['cv_id'] = $cv_id;
                        $cv_folder_data['status'] = '1';
                        $result = $this->Master_model->master_insert($cv_folder_data, 'cv_folder_relation');
                    }
                    $company_name = $this->session->userdata('company_name');
                    $data = array('company' => $company_name, 'action_taken_for' => $this->input->post('candidate_name'), 'field_changed' => 'Added  CV', 'Action' => 'Added  CV of ' . $this->input->post('candidate_name'), 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                    $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                    $email = $this->input->post('candidate_email');
                    $job_post_id = $id;
                    $where_can = "email='$email'";
                    $can_data = $this->Master_model->getMaster('js_info', $where_can);
                    if (!empty($can_data)) {
                        $seeker_id = $can_data[0]['job_seeker_id'];
                    } else {
                        $new_JS_array = array('full_name' => $this->input->post('candidate_name'), 'email' => $email, 'js_token' => md5($email), 'create_at' => date('Y-m-d H:i:s'));
                        $seeker_id = $this->Master_model->master_insert($new_JS_array, 'js_info');
                    }
                    if (isset($id) && !empty($id)) {
                        $email = $this->input->post('candidate_email');
                        $job_post_id = $id;
                        $where_can = "email='$email'";
                        $can_data = $this->Master_model->getMaster('js_info', $where_can);
                        if (!empty($can_data)) {
                            $seeker_id = $can_data[0]['job_seeker_id'];
                        } else {
                            $new_JS_array = array('email' => $email, 'js_token' => md5($email), 'create_at' => date('Y-m-d H:i:s'));
                            $seeker_id = $this->Master_model->master_insert($new_JS_array, 'js_info');
                        }
                        $where_can = "email='$email'";
                        $can_data = $this->Master_model->getMaster('js_info', $where_can);
                        $where_cv = "js_email='$email' and company_id='$company_id'";
                        $cv_data = $this->Master_model->getMaster('corporate_cv_bank', $where_cv);
                        if (empty($cv_data)) {
                            $cv_array = array('company_id' => $company_id, 'js_name' => $can_data[0]['full_name'], 'js_email' => $can_data[0]['email'], 'js_mobile' => $can_data[0]['mobile_no'], 'created_on' => date('Y-m-d'), 'created_by' => $company_id);
                            $add_cv = $this->Master_model->master_insert($cv_array, 'corporate_cv_bank');
                            $cv_id = $add_cv;
                        } else {
                            $cv_id = $cv_data[0]['cv_id'];
                        }
                        // print_r($seeker_id);
                        $apply_array = array('job_seeker_id' => $seeker_id, 'company_id' => $company_id, 'job_post_id' => $job_post_id, 'forword_job_status' => 1, 'updated_on' => date('Y-m-d'),
                        // 'mandatory_parameters' => implode(',', $mandatory)
                        );
                        $whereres = "job_seeker_id='$seeker_id' and company_id = '$company_id' and job_post_id = '$id'";
                        $job_apply_data = $this->Master_model->get_master_row('
                        job_apply', $select = FALSE, $whereres);
                        // print_r($this->db->last_query());die;
                        if (empty($job_apply_data)) {
                            $apply = $this->Master_model->master_insert($apply_array, 'job_apply');
                            $frwd_array = array('cv_id' => $cv_id, 'company_id' => $company_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                            $frwd = $this->Master_model->master_insert($frwd_array, 'forwarded_jobs_cv');
                            $external_array = array('cv_id' => $cv_id, 'company_id' => $employer_id, 'job_post_id' => $job_post_id, 'apply_id' => $apply, 'status' => 1, 'company_id' => $company_id, 'name' => $this->input->post('candidate_name'), 'email' => $this->input->post('candidate_email'), 'mobile' => $this->input->post('candidate_phone'), 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                            $frwd = $this->Master_model->master_insert($external_array, 'external_tracker');
                        }
                        if ($apply) {
                            $email_name = explode('@', $email);
                            $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . ',<br>' . $job_desc . '<br/><br/><em><b>Now Hiring!!</b></em> <br/><br/><b>Company Name:</b>' . $require['company_name'] . '<br/><br/> <b>Job Profile:</b><br/> <b>Job Title: </b> ' . $require['job_title'] . '<br/> <b>Experience: </b> ' . $require['experience'] . '<br/><b>Salary Offered: </b> ' . $require['salary_range'] . '<br/><b>Vacancies: </b> ' . $require['no_jobs'] . '<br/><b>Job Location: </b> ' . $require['city_name'] . '-' . $require['state_name'] . ',' . $require['country_name'] . '<br/><b>Job Role: </b> ' . $require['job_role_title'] . '<br/><b>Job Type: </b> ' . $require['job_types_name'] . '<br/><b>Job Nature: </b> ' . $require['job_nature_name'] . '<br/><b>Wrking Hrs: </b> ' . $require['working_hours'] . '<br/><b>Job Deadline: </b> ' . $require['job_deadline'] . '<br/><b>Education Required: </b> ' . $require['education_level_name'] . '(' . $require['education_specialization'] . ')' . '<br/><b>Preferred Age: </b> ' . $require['preferred_age'] . '-' . $require['preferred_age_to'] . '<br/><b>Required Skills: </b> ';
                            for ($j = 0;$j < sizeof($req_skill_details);$j++) {
                                $message.= ' <br>' . $req_skill_details[$j]['skill_name'];
                            }
                            $message.= '<br/><b>Job Description: </b> ' . $require['job_desc'] . '<br/><b>Job Benefits: </b> ' . $require['benefits'] . '<br/><b>Other Job Description: </b> ' . $require['education'] . '<br><br><a href="' . base_url() . 'job_forword_seeker/apply_forworded_job?apply_id=' . base64_encode($email) . '&job_id=' . base64_encode($apply) . '" class="btn btn-primary" value="Apply Now" align="center" target="_blank">Apply Now</a> <br><br><br><br><br>Good luck for Job search!<br> Team ConsultnHire!<br><small>Enjoy personalized job searching experience<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</small><br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                            $send = sendEmail_JobRequest($email, $message, $subject);
                            //echo $send;
                            // echo $message;
                            $company_name = $this->session->userdata('company_name');
                            $data = array('company' => $company_name, 'action_taken_for' => $email, 'field_changed' => 'Forwarded Job ', 'Action' => $company_name . ' Forwarded job for the position of ' . $require['job_title'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                        }
                        $data['job_id'] = $id;
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Changes to this Internal Tracker have been Saved !</div>');
                        redirect('employer/internal_tracker');
                    }
                    $this->session->set_flashdata('success', '<div class="alert alert-success text-center">New CV Added Successfully !</div>');
                }
                redirect('employer/corporate_cv_bank/' . $fid);
            }
        } else {
            $data['industry_master'] = $this->Master_model->getMaster('job_category', $where = false);
            $data['department'] = $this->Master_model->getMaster('department', $where = false);
            $data['job_role'] = $this->Master_model->getMaster('job_role', $where = false);
            $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
            $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
            $data['skills'] = $this->Master_model->getMaster('skill_master', $where = false);
            $data['fid'] = $this->input->get('fid');
            //$data['cv_info'] = $this->Master_model->getMaster('corporate_cv_bank',$where=false);
            $this->load->view('fontend/employer/add_cv', $data);
        }
    }
    public function edit_cv($id = NULL) {
        if (isset($id)) {
            $cv_id = base64_decode($id);
            $data['industry_master'] = $this->Master_model->getMaster('job_category', $where = false);
            $data['department'] = $this->Master_model->getMaster('department', $where = false);
            $data['job_role'] = $this->Master_model->getMaster('job_role', $where = false);
            $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
            $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
            $data['skills'] = $this->Master_model->getMaster('skill_master', $where = false);
            $where_cv = "corporate_cv_bank.cv_id = '$cv_id'";
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_bank_data'] = $this->Master_model->get_master_row('corporate_cv_bank', $select = FALSE, $where = $where_cv, $join);
            $data['fid']=$this->input->get('fid');
            //$data['cv_info'] = $this->Master_model->getMaster('corporate_cv_bank',$where=false);
            $this->load->view('fontend/employer/add_cv', $data);
        }
    }

    public function forward_cv()
    {
        $company_id = $this->session->userdata('company_profile_id');
        $emails = $this->input->post('consultant_email');
        $cons_emails = explode(',', $emails);
        foreach ($cons_emails as $email) {
            # code...
      
        $where_comp="company_profile.company_email = '$email'";
        $comp_data = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where = $where_comp, $join = FALSE);
        if (empty($comp_data)) {
            $randomNumber = rand(1000, 9999);
                $new_array = array(
                    'company_email' => $email, 
                    'token' => md5($email), 
                    'create_at' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),
                    'comp_type' => "HR Consultant", 
                    'company_password' => md5($randomNumber),);
                $comp_id = $this->Master_model->master_insert($new_array, 'company_profile');
        }
        else
        {
            $comp_id = $comp_data['company_profile_id'];
        }
        $cv_ids = explode(',',$this->input->post('cv_id'));
        foreach ($cv_ids as $cv_id) {
            $where = "corporate_cv_bank.cv_id ='$cv_id'";
        $cv_data=$this->Master_model->get_master_row('corporate_cv_bank', $select = FALSE, $where, $join = FALSE);
        $cv_data_insert = array(
            'company_id'=> $comp_id, 
            'js_name' => $cv_data['js_name'], 
            'js_email' => $cv_data['js_email'], 
            'js_mobile' => $cv_data['js_mobile'], 
            'js_job_type' => $cv_data['js_job_type'], 
            'js_current_designation' => $cv_data['js_current_designation'], 
            'js_working_since' => $cv_data['js_working_since'], 
            'js_current_ctc' => $cv_data['js_current_ctc'], 
            'js_current_notice_period' => $cv_data['js_current_notice_period'], 
            'js_experience' => $cv_data['js_experience'], 
            'js_last_salary_hike' => $cv_data['js_last_salary_hike'], 
            'js_top_education' => $cv_data['js_top_education'],
            'js_skype_id' => $cv_data['js_skype_id'],
            'js_current_work_location' => $cv_data['js_current_work_location'],
            'js_skill_set' =>  $cv_data['js_skill_set'], 
            'js_certifications' => $cv_data['js_certifications'], 
            'js_industry' => $cv_data['js_industry'], 
            'js_role' => $cv_data['js_role'], 
            'js_expected_salary' => $cv_data['js_expected_salary'], 
            'js_desired_work_location'=> $cv_data['js_desired_work_location'], 
            'current_org' => $cv_data['current_org'], 
            'ocean_candidate' => $cv_data['ocean_candidate'], 
            'forwarded_cv'=>'1',
            'js_resume' => $cv_data['js_resume'],);
            $cv_data_insert['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $cv_data_insert['created_by'] = $company_id;
            // $update_cv_id = ['cv_id'];
            $cv_id = $this->Master_model->master_insert($cv_data_insert, 'corporate_cv_bank');
        }
        
        }
             $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CV Forwarded Successfully !</div>');
                $fid= $this->input->post('folder_id');
                redirect('employer/corporate_cv_bank/' .$fid);
    }
    function get_candidate_by_email() {
        if (isset($_GET['term'])) {
            // $this->load->model('Consultant_autocomplete_model');
            $result = $this->Job_seeker_experience_model->autocomplete_candidate($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) 
                    {
                        $arr_result[] = $row->email;
                    }
             echo json_encode($arr_result);
               
            }
        }
    }
     function get_company_by_email() {
        if (isset($_GET['term'])) {
            // $this->load->model('Consultant_autocomplete_model');
            $result = $this->Job_seeker_experience_model->autocomplete_employer($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) 
                    {
                        $arr_result[] = $row->company_email;
                    }
             echo json_encode($arr_result);
               
            }
        }
    }
    // desired career
    function get_candidate_info_by_email() {
        $email_id = $this->input->post('email');
        $where1 = "js_info.email = '$email_id'";
        $join = array("js_career_info" => "js_career_info.job_seeker_id=js_info.job_seeker_id | LEFT OUTER"
        // "js_education"=>"js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER",
        );
        $select = "js_career_info.notice_period,js_career_info.serving_notice_period,js_career_info.immediate_join,js_career_info.desired_industry,js_career_info.job_area,js_career_info.js_career_salary,js_career_info.avaliable,js_career_info.skills,js_career_info.job_role,js_career_info.industry_id,js_career_info.last_salary_hike,js_info.full_name,js_info.mobile_no,js_info.job_seeker_id";
        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    function get_cand_other_info_by_email() {
        $email_id = $this->input->post('email');
        $where1 = "js_info.email = '$email_id'";
        $join = array("js_education" => "js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER");
        $select = "min(js_education.education_level_id) as edu_high,js_education.job_seeker_id";
        $res = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
        $ed = $res[0]['edu_high'];
        $js = $res[0]['job_seeker_id'];
        $where_int = "education_level_id='$ed'";
        $result = $this->Master_model->getMaster('education_level', $where_int, $join = false, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    function get_cand_skills_by_email() {
        $email_id = $this->input->post('email');
        $where1 = "js_info.email = '$email_id'";
        $join = array("job_seeker_skills" => "job_seeker_skills.job_seeker_id=js_info.job_seeker_id | LEFT OUTER");
        $select = "job_seeker_skills.skills,job_seeker_skills.js_skill_id";
        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    public function add_Corporate_Documents() {
        $company_id = $this->session->userdata('company_profile_id');
        $whereres = "company_profile_id='$company_id' and status!='1'";
        $documents = $this->Master_model->getMaster('corporate_documents', $whereres, $join = FALSE, $order = false, $field = false, $select = FALSE, $limit = false, $start = false, $search = false);
        // $data['documents']=$this->Master_model->get_master('corporate_documents',$select=FALSE,$whereres);
        $this->load->view('fontend/employer/corporate_documents', compact('documents'));
    }
    public function savedocumets() {
        $company_id = $this->session->userdata('company_profile_id');
        $config['upload_path'] = 'upload/corporate_documents/';
        $config['allowed_types'] = '*';
        $config['encrypt_name'] = true;
        $config['max_size'] = 1000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('corporate_doc')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">Please upload a valid Document</div>');
            redirect('employer/add_Corporate_Documents');
        } else {
            $img = $this->upload->data();
            $file_name = $img['file_name'];
            $documets = array('company_profile_id' => $company_id, 'document_type' => $this->input->post('document_type'), 'document' => $file_name, 'created_on' => date('Y-m-d H:i:s'), 'created_by' => $company_id);
            $result = $this->Master_model->master_insert($documets, 'corporate_documents');
            $company_name = $this->session->userdata('company_name');
            $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Added Document', 'Action' => 'Added document related to' . $this->input->post('document_type'), 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Document Uploaded sucessfully</div>');
            redirect('employer/add_Corporate_Documents');
        }
    }
    public function delete_document($id) {
        $status = array('status' => '1');
        $where_del['document_id'] = $id;
        $old_Document = $this->Master_model->get_master_row('corporate_documents', $select = FALSE, $where_del);
        $this->Master_model->master_update($status, 'corporate_documents', $where_del);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Deleted Document', 'Action' => 'Deleted document related to' . $old_Document['document_type'], 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
        redirect('employer/add_Corporate_Documents');
    }
    // to get skill master for autocomplete
    function get_skills_autocomplete() {
        if (isset($_GET['term'])) {
            $result = $this->Job_seeker_experience_model->search_skills($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row) $arr_result[] = $row->skill_name;
                echo json_encode($arr_result);
            }
        }
    }
    function get_candidate_experiance_by_email() {
        $email_id = $this->input->post('email');
        $where1 = "js_info.email = '$email_id' AND end_date IS NULL";
        $join = array("js_experience" => "js_experience.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "job_role" => "job_role.id=js_experience.designation_id | LEFT OUTER");
        $select = "job_role.job_role_title,js_experience.company_profile_id,js_experience.js_career_salary,js_experience.designation_id,js_experience.start_date,js_experience.address";
        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    function delete_branch($id) {
        $status = array('status' => '1');
        $where_del['comp_branch_id'] = $id;
        $this->Master_model->master_update($status, 'company_branches', $where_del);
        redirect('employer/profile_setting');
    }
    /*BULK UPLOAD CV's*/
    public function bulk_upload_cvs() {
        $company_id = $this->session->userdata('company_profile_id');
        //load model
        $this->load->model('Questionbank_employer_model');
        // Check form submit or not
        // print_r($_POST);die();
        if (isset($_POST['upload'])) {
            $data = array();
            // print_r($_FILES);die;
            if (!empty($_FILES['file']['name'])) {
                // Set preference
                $config['upload_path'] = 'cv_bank_excel/files/';
                $ext = strtolower(end(explode('.', $_FILES['file']['name'])));
                $config['allowed_types'] = 'csv';
                $config['max_size'] = '1000'; // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                // Load upload library
                $this->load->library('upload', $config);
                // File upload
                if ($ext === 'csv') {
                    if ($this->upload->do_upload('file')) {
                        // Get data about the file
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];
                        // Reading file
                        $file = fopen("cv_bank_excel/files/" . $filename, "r");
                        $i = 0;
                        $importData_arr = array();
                        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                            $num = count($filedata);
                            for ($c = 0;$c < $num;$c++) {
                                $importData_arr[$i][] = $filedata[$c];
                            }
                            $i++;
                        }
                        fclose($file);
                        $skip = 0;
                        // insert import data
                        foreach ($importData_arr as $userdata) {
                            if ($skip != 0) {
                                $this->Questionbank_employer_model->InsertCVData($userdata);
                                $company_name = $this->session->userdata('company_name');
                                $data = array('company' => $company_name, 'action_taken_for' => $this->session->userdata('company_name'), 'field_changed' => 'Imported CVs', 'Action' => 'Imported Multiple CVs', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
                                $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                            }
                            $skip++;
                        }
                        // $data['response'] = 'successfully uploaded '.$filename;
                        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CVs Uploaded successfully!</div>');
                        // redirect('employer/bulk_upload_cvs');
                        
                    } else {
                        //$data['response'] = 'failed';
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">CVs Upload failed!' . $error . '</div>');
                    }
                } else {
                    $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">File Format not supported</div>');
                }
            } else {
                // $data['response'] = 'failed';
                $this->session->set_flashdata('success', '<div class="alert alert-danger text-center">CVs Upload failed!</div>');
            }
            // $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">CVs Uploaded successfully!</div>');
            redirect('employer/corporate_cv_bank');
            // load view
            // $this->load->view('fontend/employer/bulk_cv_upload_view',$data);
            
        } else {
            // load view
            redirect('employer/corporate_cv_bank');
        }
    }
    public function bulk_upload_folder() {
    ini_set('upload_max_filesize', '10M');
    ini_set('post_max_size', '10M');
    ini_set('max_input_time', 0);
    ini_set('max_execution_time', 0);
    $employer_id = $this->session->userdata('company_profile_id');
        $this->load->model('Questionbank_employer_model');
        if (isset($_POST['upload'])) {
        if (!empty($_FILES['file']['name'])) {
                // Set preference
            $config['upload_path'] = 'cv_bank_excel/files/';
            $ext = strtolower(end(explode('.', $_FILES['file']['name'])));
            $config['allowed_types'] = 'csv';
            $config['max_size'] = '10000'; // max_size in kb
            $config['file_name'] = $_FILES['file']['name'];
                // Load upload library
            $this->load->library('upload', $config);
                // File upload
            if ($ext === 'csv') {
             if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                        // Reading file
                $file = fopen("cv_bank_excel/files/" . $filename, "r");
                  $i = 0;
                   $importData_arr = array();
                    while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                     $num = count($filedata);
                     for ($c = 0;$c < $num;$c++) {
                        $importData_arr[$i][] = $filedata[$c];
                       }
                         $i++;
                        }
                       fclose($file);
                       $skip = 0;
                        // insert import data
                       $cv = array();
    foreach ($importData_arr as $userdata) 
    {
      if ($skip != 0) 
      {
        $cv_id = $this->Questionbank_employer_model->InsertCVData($userdata);
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $this->session->userdata('company_name'), 'field_changed' => 'Imported CVs', 'Action' => 'Imported Multiple CVs', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
           array_push($cv, $cv_id);
        }
         $skip++;
     }
       $count = 0;
       $company_id = $this->session->userdata('company_profile_id');
      $paths = $this->input->post('paths');
      $folder_path = explode(',', $paths);
      $uploadDir = 'cv_folder/';
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           foreach ($_FILES['files']['name'] as $i => $name) 
           {
             $folders = explode('/', $folder_path[$i]);
              for ($k = 0;$k <= sizeof($folders);$k++) {
              $folder_name = $folders[$k];
              if ($folder_name == $_FILES['files']['name'][$i]) 
              {
               if (strlen($_FILES['files']['name'][$i]) > 1) 
               {
                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $folder_path_final . '/' . $name)) 
                {
                 $count++;
                }
               }
              } else
              {
               if ($k > 0) 
               {
                $j =$k-1;
                $folder_struct = array();
                for ($n = 0;$n <= $j;$n++) 
                {
                  array_push($folder_struct, $folders[$n]);
                }
                 $names = implode('/', $folder_struct);
                if (!file_exists('cv_folder/' . $names . '/' . $folder_name)) 
                {
                 mkdir('cv_folder/' . $names . '/' . $folder_name, 0777, true);
                }
                $folder_path_final = 'cv_folder/' . $names . '/' .$folder_name;
                $where_curr_folder = "cv_folder.folder_name = '$folder_name' and company_id = '$employer_id'";
                $curr_foldr = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_curr_folder, $join = FALSE);
                $previous_folder = $folders[$j];
                $where_folder = "cv_folder.folder_name = '$previous_folder' and company_id = '$employer_id'";
                $parent = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_folder, $join = FALSE);
                 // print_r($parent);
                 // print_r($folder_name); die;
                if ($parent && empty($curr_foldr)) 
                {
                  $insert_folder_data['folder_name'] = $folder_name;
                  $insert_folder_data['company_id'] = $employer_id;
                  $insert_folder_data['parent_id'] = $parent['id'];
                  $insert_folder_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                 $insert_folder_data['created_by'] = $employer_id;
                 $result = $this->Master_model->master_insert($insert_folder_data, 'cv_folder');
                 }
               } else
                {
                if (!file_exists('cv_folder/' . $folder_name)) 
                {
                 mkdir('cv_folder/' . $folder_name, 0777, true);
                }
                $folder_path_final = 'cv_folder/' . $folder_name;
                $where_folder = "cv_folder.folder_name = '$folder_name' and company_id = '$employer_id'";
                $parent = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_folder, $join = FALSE);
                if (empty($parent)) 
                {
                 $insert_folder_data['folder_name'] = $folder_name;
                 $insert_folder_data['company_id'] = $employer_id;
                 $insert_folder_data['parent_id'] = '0';
                 $insert_folder_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                 $insert_folder_data['created_by'] = $employer_id;
                 $result = $this->Master_model->master_insert($insert_folder_data, 'cv_folder');
                }
               }
             }
             foreach ($cv as $cvs) 
             {
              $where = "corporate_cv_bank.cv_id = '$cvs'";
              $cv_name = $this->Master_model->get_master_row('corporate_cv_bank', $select = 'js_name', $where, $join = FALSE);
              $js_name = explode(' ', $cv_name['js_name']);
              if (strpos($name, $js_name[0]) !== false) 
              {
               $where11['cv_id'] = $cvs;
               $path = $folder_path_final;
                // print_r($path);die;
               $update_doc['js_document'] = $path;
               $this->Master_model->master_update($update_doc, 'corporate_cv_bank', $where11);
               print_r($k);
               print_r($folders);
               print_r($previous_folder);
               $previous_folder = $folders[$k];
               $where_folder = "cv_folder.folder_name = '$previous_folder' and company_id = '$employer_id'";
               $parent = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_folder, $join = FALSE);
               print_r($this->db->last_query());die;
               $folder_id = $parent['id'];
               $whereres = "cv_folder_id='$folder_id' and cv_id = '$cvs' ";
               $folder_dbdata = $this->Master_model->get_master_row('cv_folder_relation', $select = FALSE, $whereres);
               if (empty($folder_dbdata) && !empty($folder_id)) 
               {
                 $cv_folder_data['cv_folder_id'] = $folder_id;
                 $cv_folder_data['cv_id'] =$cvs;
                 $cv_folder_data['status'] ='1';
                 $result = $this->Master_model->master_insert($cv_folder_data, 'cv_folder_relation');
               }
                // echo 'The specific word is present.';
                                            
              }
             }
            }
           }
          }
           $folder_data['company_id'] = $company_id;
           $folders = explode('/', $folder_path[0]);
           $folder_data['folder_name'] = $folders[0];
           $folder_data['cv'] = implode(',', $cv);
           $result = $this->Master_model->master_insert($folder_data, 'folder_company_mapping');
           $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CVs Uploaded successfully!</div>');
           } else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">CVs Upload failed!' . $error . '</div>');
           }
         } else {
           $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">File Format not supported</div>');
          }
        } else {
          $error = $_FILES['file']['error'];
                $this->session->set_flashdata('success', '<div class="alert alert-danger text-center">CVs Upload failed!' . $error . '</div>');
            }
            // $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">CVs Uploaded successfully!</div>');
            redirect('employer/corporate_cv_bank');
            // load view
            // $this->load->view('fontend/employer/bulk_cv_upload_view',$data);
            
        } else {
            // load view
            redirect('employer/corporate_cv_bank');
        }
    }
    function get_fav_consultants() {
        $emp_id = $this->input->post('emp_id');
        $where_cond = "consultant_company_mapping.company_id='$emp_id' AND consultant_company_mapping.is_favourite='yes'";
        $join_cond = array('company_profile' => 'company_profile.company_profile_id = consultant_company_mapping.consultant_id|Left outer');
        $select = "company_email";
        $result = $this->Master_model->getMaster('consultant_company_mapping', $where_cond, $join = $join_cond, $order = false, $field = false, $select = $select, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    function get_access_data() {
        $u_id = $this->input->post('id');
        $where['user_role_id'] = $u_id;

        // $lineitemlevels = $this->Master_model->getMaster('employee_access',$where);
        $exists = $this->Master_model->get_master_row('employee_access', $select = FALSE, $where, $join = FALSE);
        $result = '';
        $dd = $exists['access_specifiers'];
        $a = explode(',', $dd);
        if (!empty($dd)) {
            $result.= '<option value="">Select</option>';
            // foreach($a as $keys){
            for ($i = 0;$i < sizeof($a);$i++) {
                $result.= '<option value="' . $a[$i] . '">' . $a[$i] . '</option>';
            }
        } else {
            $result = '<option value="">Data not available</option>';
        }
        echo $result;
    }
    public function getocean_profile($email = NULL) {
        $fid = $this->input->get('fid');
        $emails = $this->input->post('cv_email');
        if (isset($email) && !empty($email)) {
            $email_id = base64_decode($email);
            $where1 = "js_info.email = '$email_id' ";
            // AND js_experience.end_date IS NULL
            $join = array("js_career_info" => "js_career_info.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_experience" => "js_experience.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "job_role" => "job_role.id=js_experience.designation_id | LEFT OUTER", "job_seeker_skills" => "job_seeker_skills.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_education" => "js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_training" => "js_training.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "industry_master" => "industry_master.id=js_career_info.industry_id | LEFT OUTER");
            $select = "js_career_info.notice_period,js_career_info.serving_notice_period,js_career_info.immediate_join,js_career_info.desired_industry,js_career_info.job_area,js_career_info.js_career_salary,js_career_info.avaliable,js_career_info.skills,js_career_info.job_role,js_career_info.industry_id,js_career_info.last_salary_hike,js_info.full_name,js_info.mobile_no,js_info.job_seeker_id,job_role.job_role_title,js_experience.company_profile_id,js_experience.js_career_salary,js_experience.designation_id,js_experience.start_date,js_experience.address,min(js_education.education_level_id) as edu_high,job_seeker_skills.skills,js_career_info.js_career_exp,js_training.training_title,industry_master.industry_name,js_info.update_at";
            $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
            $where_c = "corporate_cv_bank.js_email = '$email_id'  and js_status = '0'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $cv_bank_data = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
            // echo $this->db->last_query();
            // echo "<pre>";
            $latest = $result['0'];
            if ($latest['update_at'] >= $cv_bank_data[0]['updated_on'] ) {
                # code...
          
            $update_profile = array(
                'js_name' => $latest['full_name'], 
                'js_mobile' => $latest['mobile_no'], 
                'js_current_designation' => $latest['job_role_title'], 
                'js_current_work_location' => $latest['address'], 
                'js_current_ctc' => $latest['js_career_salary'], 
                'js_current_notice_period' => $latest['notice_period'], 
                'js_experience' => $latest['js_career_exp'], 
                'js_last_salary_hike' => $latest['last_salary_hike'], 
                'js_top_education' => $latest['edu_high'], 
                'js_skill_set' => $latest['skills'], 
                'js_certifications' => $latest['training_title'], 
                'js_industry' => $latest['industry_name'], 
                'js_role' => $latest['job_role_title'], 
                'js_expected_salary' => $latest['js_career_salary'], 
                'js_desired_work_location' => $latest['job_area'], 
                'updated_on' => date('Y-m-d H:i:s'), 'updated_by' => $this->session->userdata('company_profile_id'));
            $where11['js_email'] = $email_id;
            $where11['company_id'] = $this->session->userdata('company_profile_id');
            $this->Master_model->master_update($update_profile, 'corporate_cv_bank', $where11);
             $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Profile Updated successfully with the latest ocean profile...!</div>');
                redirect('employer/corporate_cv_bank/'.$fid);
              }
              else
              {

                 $this->session->set_flashdata('success', '<div class="alert alert-success text-center"> CV is already updated with latest data from Ocean.</div>');
                redirect('employer/corporate_cv_bank/'.$fid);
              }
            // echo $this->db->last_query();die;
            
        } elseif (isset($emails) && !empty($emails)) {
            $email = explode(',', $emails);
            foreach ($email as $email_id) {
                $where1 = "js_info.email = '$email_id' ";
                $join = array("js_career_info" => "js_career_info.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_experience" => "js_experience.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "job_role" => "job_role.id=js_experience.designation_id | LEFT OUTER", "job_seeker_skills" => "job_seeker_skills.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_education" => "js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_training" => "js_training.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "industry_master" => "industry_master.id=js_career_info.industry_id | LEFT OUTER");
                $select = "js_career_info.notice_period,js_career_info.serving_notice_period,js_career_info.immediate_join,js_career_info.desired_industry,js_career_info.job_area,js_career_info.js_career_salary,js_career_info.avaliable,js_career_info.skills,js_career_info.job_role,js_career_info.industry_id,js_career_info.last_salary_hike,js_info.full_name,js_info.mobile_no,js_info.job_seeker_id,job_role.job_role_title,js_experience.company_profile_id,js_experience.js_career_salary,js_experience.designation_id,js_experience.start_date,js_experience.address,min(js_education.education_level_id) as edu_high,job_seeker_skills.skills,js_career_info.js_career_exp,js_training.training_title,industry_master.industry_name";
                $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
                // echo $this->db->last_query();
                // echo "<pre>";
                $latest = $result['0'];
                $update_profile = array(
                    'js_name' => $latest['full_name'], 
                'js_mobile' => $latest['mobile_no'], 
                'js_current_designation' => $latest['job_role_title'], 
                'js_current_work_location' => $latest['address'], 
                'js_current_ctc' => $latest['js_career_salary'], 
                'js_current_notice_period' => $latest['notice_period'], 
                'js_experience' => $latest['js_career_exp'], 
                'js_last_salary_hike' => $latest['last_salary_hike'], 
                'js_top_education' => $latest['edu_high'], 
                'js_skill_set' => $latest['skills'], 'js_certifications' => $latest['training_title'], 
                'js_industry' => $latest['industry_name'], 
                'js_role' => $latest['job_role_title'], 
                'js_expected_salary' => $latest['js_career_salary'], 
                'js_desired_work_location' => $latest['job_area'], 
                'updated_on' => date('Y-m-d H:i:s'), 'updated_by' => $this->session->userdata('company_profile_id'));
                $where11['js_email'] = $email_id;
                 $where11['company_id'] = $this->session->userdata('company_profile_id');
                $this->Master_model->master_update($update_profile, 'corporate_cv_bank', $where11);
            }
            $fid = $this->input->get('fid');
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Profile Updated successfully with the latest ocean profile...!</div>');
                redirect('employer/corporate_cv_bank/'.$fid);
              }
        
       
    }
    public function get_profile() {
        $email_id = $this->input->post('email');
        $where1 = "js_info.email = '$email_id' AND js_experience.end_date IS NULL";
        $join = array("js_career_info" => "js_career_info.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_experience" => "js_experience.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "job_role" => "job_role.id=js_experience.designation_id | LEFT OUTER", "job_seeker_skills" => "job_seeker_skills.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_education" => "js_education.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "js_training" => "js_training.job_seeker_id=js_info.job_seeker_id | LEFT OUTER", "industry_master" => "industry_master.id=js_career_info.industry_id | LEFT OUTER");
        $select = "js_career_info.notice_period,js_career_info.serving_notice_period,js_career_info.immediate_join,js_career_info.desired_industry,js_career_info.job_area,js_career_info.js_career_salary,js_career_info.avaliable,js_career_info.skills,js_career_info.job_role,js_career_info.industry_id,js_career_info.last_salary_hike,js_info.full_name,js_info.mobile_no,js_info.job_seeker_id,job_role.job_role_title,js_experience.company_profile_id,js_experience.js_career_salary,js_experience.designation_id,js_experience.start_date,js_experience.address,min(js_education.education_level_id) as edu_high,job_seeker_skills.skills,js_career_info.js_career_exp,js_training.training_title,industry_master.industry_name";
        $result = $this->Master_model->getMaster('js_info', $where1, $join, $order = false, $field = false, $select, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    public function audit() {
        $company = $this->session->userdata('company_name');
        $where1 = "employer_audit_record.company = '$company' ";
        $data['result'] = $this->Master_model->getMaster('employer_audit_record', $where1, $join, $order = 'desc', $field = 'datetime', $select, $limit = '20', $start = false, $search = false);
        // print_r($this->db->last_query());die;
        $this->load->view('fontend/employer/audit', $data);
        // print_r($result);die;
        
    }
    public function get_acess_details() {
        $emp_id = $this->input->post('user');
        $where = "emp_id='$emp_id'";
        $data = $this->Master_model->get_master_row('employee', $select = FALSE, $where);
        $dd = $data['access_to_employee'];
        $a = explode(',', $dd);
        if (!empty($dd)) {
            $result.= '<table>';
            // foreach($a as $keys){
            for ($i = 0;$i < sizeof($a);$i++) {
                $j = $i + 1;
                $result.= '<tr>';
                $result.= '<td>' . $j . '. </td>';
                $result.= '<td value="' . $a[$i] . '">' . $a[$i] . '</td>';
                $result.= '</tr>';
            }
            $result.= '</table>';
        } else {
            $result.= '<table>';
            $result.= '<tr>';
            $result.= '<td value="">No access given!! Edit  Employee Details and assign  Access rights... </td>';
            $result.= '</tr>';
            $result.= '</table>';
            // $result ='<tr value="">Data not available</tr>';
            
        }
        echo $result;
    }
    public function add_to_audit() {
        $action = $this->input->post('var1');
        $company_name = $this->session->userdata('company_name');
        $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => $action, 'Action' => 'visited ' . $action, 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
        $result = $this->Master_model->master_insert($data, 'employer_audit_record');
    }
    public function superadmin() {
        $employer_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $where = "company_id='$employer_id'";
            $data = $this->Master_model->get_master_row('company_superadmin', $select = FALSE, $where);
            $superadmin = array('superadmin_name' => $username, 'superadmin_email' => $email, 'superadmin_password' => md5($password), 'created_by' => $employer_id, 'company_id' => $employer_id, 'created_on' => date('Y-m-d H:i:s'));
            if (isset($data) && !empty($data)) {
                $where11['company_profile_id'] = $employer_id;
                $this->Master_model->master_update($superadmin, 'company_superadmin', $where);
            } else {
                $result = $this->Master_model->master_insert($superadmin, 'company_superadmin');
            }
            $company_name = $this->session->userdata('company_name');
            $data = array('company' => $company_name, 'action_taken_for' => $company_name, 'field_changed' => 'Superadmin', 'Action' => 'Created superadmin and superadmin password', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
            $result = $this->Master_model->master_insert($data, 'employer_audit_record');
            $comp_name = $this->session->userdata('company_name');
            $subject = "Successfully Registered as a Superadmin..";
            $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>You are registered as a Superadmin for company ' . $comp_name . ' <br><br>You can login to Ocean portal using following credentials<br>
username: ' . $email . '<br>
Password: ' . $password . '<br>

Team ConsultnHire!<br>Thank You for choosing us!<br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.<br><br>You have received this mail because your e-mail ID is registered with Consultnhire.com. This is a system-generated e-mail regarding your Consultnhire account preferences, please do not reply to this message. The jobs sent in this mail have been posted by the clients of Consultnhire.com. And we have enabled auto-login for your convenience, you are strongly advised not to forward this email to protect your account from unauthorized access. IEIL has taken all reasonable steps to ensure that the information in this mailer is authentic. Users are advised to research bonafides of advertisers independently. Please do not pay any money to anyone who promises to find you a job. IEIL shall not have any responsibility in this regard. We recommend that you visit our Terms & Conditions and the Security Advice for more comprehensive information.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
            $send = sendEmail_JobRequest($email, $message, $subject);
            $update_data = array('last_login' => date('Y-m-d H:i:s'));
            $where11['company_profile_id'] = $employer_id;
            $this->Master_model->master_update($update_data, 'company_profile', $where11);
            $this->session->set_flashdata('emp_msg', '<div class="alert alert-success text-center">Successfully created Superadmin Password !! Thank You for choosing The Ocean !!</div>');
            $company_info = $this->company_profile_model->get($employer_id);
            $this->load->view('fontend/employer/employer_dashboard', compact('company_info'));
        }
    }
    function check_super_pass() {
        // echo "string";
        $password = $this->input->post('Password');
        $redirect = $this->input->post('redirect_id');
        $pass = md5($password);
        $company_profile_id = $this->session->userdata('company_profile_id');
        $whereres = "company_id='$company_profile_id' and superadmin_password ='$pass' ";
        $superadmin = $this->Master_model->get_master_row('company_superadmin', $select = FALSE, $whereres);
        // print_r($this->db->last_query());die;
        // print_r($redirect);die;
        if (!empty($superadmin)) {
            redirect('employer/' . $redirect);
        } else {
            redirect_back();
        }
    }
    public function ocean_champ_test() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $data['activemenu'] = 'oceanchamp';
        $this->session->set_userdata($data);
        $company_profile_id = $this->session->userdata('company_profile_id');
        if ($_POST) {
            $created_on = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s', strtotime('+5 hour +30 minutes', strtotime($created_on)));
            $topics = $this->input->post('topics');
            $temp_array = array();
            if (!empty($topics)) {
                $all_topics = implode(',', $this->input->post('topics'));
                $skill = $this->input->post('skill_name');
                $level = $this->input->post('level');
                // $where_time = "skill_id='$skill' AND job_seeker_id='$company_profile_id' AND topic_id IN (".$all_topics.")";
                // $exists = $this->Master_model->get_master_row('js_ocean_exam_topics', $select =FALSE , $where_time, $join = FALSE);
                // // print_r($this->db->last_query());die;
                // if($exists)
                // {
                //     $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">You have already given test for this skill</div>');
                //     redirect('exam/ocean_champ_test');
                // }else{
                //     $data_array = array(
                //         'job_seeker_id' => $company_profile_id,
                //         'topic_id'      => implode(',', $this->input->post('topics')),
                //         'level'         => $this->input->post('level'),
                //         'skill_id'      => $this->input->post('skill_name'),
                //         'created_on'    => $cenvertedTime,
                //         'created_by'    => $company_profile_id,
                //     );
                // $last_id = $this->Master_model->master_insert($data_array, 'js_ocean_exam_topics');
                $where_req_skill = "topic_id IN (" . $all_topics . ") AND level='$level'";
                $exam_question = $this->Master_model->getMaster('questionbank', $where_req_skill, $join = FALSE, $order = false, $field = false, $select = false, $limit = NUMBER_QUESTIONS, $start = false, $search = false);
                // check for answers
                for ($n1 = 0;$n1 < sizeof($exam_question);$n1++) {
                    $individual_question = array();
                    $question_id = $exam_question[$n1]['ques_id'];
                    $wherechks = "question_id='$question_id'";
                    $answer = $this->Master_model->getMaster('questionbank_answer', $wherechks);
                    $exam_question[$n1]['answer'] = $answer;
                    $individual_question[] = $exam_question[$n1];
                    array_push($temp_array, $exam_question[$n1]);
                }
                $fp = fopen('./exam_questions/' . $skill . '_' . $company_profile_id . '.json', 'w');
                fwrite($fp, json_encode($temp_array));
                $data['skill'] = $skill;
                $this->load->view('fontend/employer/oceantchamp_instructions', $data);
            }
            // }
            else {
                $selectadd = "id,skill_name";
                $data['skill_data'] = $this->Master_model->getMaster('skill_master', $whereadd = FALSE, $join = FALSE, $order = false, $field = false, $selectadd, $limit = false, $start = false, $search = false);
                $this->load->view('fontend/employer/oceantchamp_exp', $data);
            }
        } else {
            // $data['skill_data']  = $temp_array2;
            $selectadd = "id,skill_name";
            $data['skill_data'] = $this->Master_model->getMaster('skill_master', $whereadd = FALSE, $join = FALSE, $order = false, $field = false, $selectadd, $limit = false, $start = false, $search = false);
            $this->load->view('fontend/employer/oceantchamp_exp', $data);
        }
    }
    public function oceanchamp_test($skill_id = null) {
        $company_profile_id = $this->session->userdata('company_profile_id');
        $skill_id = base64_decode($skill_id);
        if (!empty($skill_id)) {
            $data['title'] = 'Exam Start';
            $data['skill_id'] = $skill_id;
            $str = file_get_contents('./exam_questions/' . $skill_id . '_' . $company_profile_id . '.json');
            $json = json_decode($str, true);
            foreach ($json as $value) {
                $data['questions'] = $value;
                break;
            }
            // print_r($data['questions']);die;
            $this->load->view('fontend/employer/oceanchamp_test', $data);
            // $this->load->view('fontend/exam/oceantest_test',$data);
            
        } else {
            redirect('exam');
        }
    }
    public function insert_ocean_data() {
        $company_profile_id = $this->session->userdata('company_profile_id');
        $jid = $this->input->post('skill_id');
        $skill_id = base64_decode($jid);
        $data['skill_id'] = $skill_id;
        $question_id = $this->input->post('question_id');
        $option = $this->input->post('optRdBtn');
        $status = array();
        $str = file_get_contents('./exam_questions/' . $skill_id . '_' . $company_profile_id . '.json');
        $json = json_decode($str, true);
        $created_on = date('Y-m-d H:i:s');
        $cenvertedTime = date('Y-m-d H:i:s', strtotime('+5 hour +30 minutes', strtotime($created_on)));
        foreach ($json as $value) {
            $data['questions'] = $value;
            break;
        }
        // print_r($option);
        // print_r($data['questions']['answer']);die;
        for ($q = 0;$q < sizeof($data['questions']['answer']);$q++) {
            $answer_id = $data['questions']['answer'][$q]['answer_id'];
            // print_r($answer_id);
            // print_r($option);die;
            for ($i = 0;$i < sizeof($option);$i++) {
                if ($answer_id == $option[$i]) {
                    $status[] = 'Yes';
                } else {
                    $status[] = 'No';
                }
            }
        }
        if (count(array_unique($status)) === 1 && end($status) === 'Yes') {
            $mark = 1;
            $cstatus = 'Yes';
        } else {
            $mark = 0;
            $cstatus = 'No';
        }
        $exam_array = array('skill_id' => $skill_id, 'employee_id' => $company_profile_id, 'question_id' => $question_id, 'marks' => $mark, 'correct_status' => $cstatus, 'date_time' => $cenvertedTime);
        $last_id = $this->Master_model->master_insert($exam_array, 'employee_ocean_exam_result');
        if ($last_id) {
            array_shift($json); // remove completed element from json array
            // update json file with remaining questions
            $fp = fopen('./exam_questions/' . $skill_id . '_' . $company_profile_id . '.json', 'w');
            fwrite($fp, json_encode($json));
            $new_str = file_get_contents('./exam_questions/' . $skill_id . '_' . $company_profile_id . '.json');
            $data['new_json'] = json_decode($new_str, true);
            foreach ($data['new_json'] as $value) {
                $data['questions'] = $value;
                break;
            }
            if (count($data['new_json']) >= 1) {
                $this->load->view('fontend/employer/oceanchamp_test', $data);
            } else {
                unlink('./exam_questions/' . $skill_id . '_' . $company_profile_id . '.json');
                $this->load->view('fontend/employer/result_page');
            }
        }
    }
    function gettopics() {
        $topic_id = $this->input->post('id');
        $where['technical_id'] = $topic_id;
        $topics = $this->Master_model->getMaster('topic', $where);
        $result = '';
        if (!empty($topics)) {
            // $result .= '<option value="">Select Topic</option>';
            foreach ($topics as $key) {
                $result.= "<input type='checkbox' name='topics[]' style='height:15px; width:20px;' id='topics' value=" . $key['topic_id'] . " checked> " . $key['topic_name'] . "";
            }
        } else {
            $result.= '<p value="">Topic not available</p>';
        }
        echo $result;
    }
    public function Recruiter() {
        $data['activemenu'] = 'Recruiter';
        $this->session->set_userdata($data);
        $this->load->view('fontend/employer/ocean_history');
    }
    public function forword_external_tracker() {
        $company_id = $this->session->userdata('company_profile_id');
        $tracking_id = $this->input->post('tracking_id');
        $consultant_email = $this->input->post('consultant_email');
        $company = $this->input->post('company');
        $access_value = $this->input->post('access_value');

         $array=explode(',',$tracking_id);
        $track=array_filter($array);
         $job_post_id = $this->input->post('job_post_id');
       
      
       
        for ($i=0; $i < sizeof($company) ; $i++) { 
            for ($j=0; $j < sizeof($track) ; $j++) {

             $update_data['acess_given'] = $access_value[$i];
            $where11['consultant_id'] = $company[$i];
            $where11['tracking_id'] = $track[$j];
            $this->Master_model->master_update($update_data, 'tracker_consultant_mapping', $where11);
        }
           
        }
        // print_r($company);
        // print_r($track);
        // print_r($access_value);die;

        $email = explode(',', $consultant_email);
        for ($i = 0;$i < sizeof($email);$i++) {
            $where_cndn = "company_email='$email[$i]'";
            $consultant_data = $this->Master_model->getMaster('company_profile', $where_cndn);
            if ($consultant_data) {
                $comp_id = $consultant_data[0]['company_profile_id'];
                $email_name = explode('@', $email[$i]);
                $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . '<br>' . $this->session->userdata("company_name") . '</b></em> <br/>Foarwarded You the tracking sheet<br/><b></b> please login to your account to explore more..<br> <a href="https://www.consultnhire.com/employer_login"><button>Login</button></a> ';
                $send = sendEmail_JobRequest($email[$i], $message, $subject);
            } else {
                $randomNumber = rand(1000, 9999);
                $new_JS_array = array(
                    'company_email' => $email[$i], 
                    'token' => md5($email[$i]), 
                    'create_at' => date('Y-m-d H:i:s'), 
                    'comp_type' => "HR Consultant", 
                    'company_password' => md5($randomNumber),);
                $comp_id = $this->Master_model->master_insert($new_JS_array, 'company_profile');
                $email_name = explode('@', $email[$i]);
                $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . '<br>' . $this->session->userdata("company_name") . '</b></em> <br/>Foarwarded You the tracking sheet<br/><b></b> please login to your account to explore more.. <br><b>Your username:</b>' . $email[$i] . '<br><b>Your password:</b>' . $randomNumber . '</b><br><a href="https://www.consultnhire.com/employer_login"><button>Login</button></a> ';
                $send = sendEmail_JobRequest($email[$i], $message, $subject);
                // echo $comp_id;
                
            }
            $array=explode(',',$tracking_id);
            $tracker_type = $this->input->post('tracker_type');
            $tracking_ids = array_filter($array);
            if (empty($tracking_ids)) {
                 $external_array = array(
                        // 'cv_id' => $cv_data[0]['cv_id'], 
                        'company_id' => $company_id, 
                        'job_post_id' => $job_post_id, 
                        // 'apply_id' => $apply, 
                        'status' => 1, 
                      
                        
                        'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                        $tracking_ids = $this->Master_model->master_insert($external_array, 'external_tracker');
            }
            foreach ($tracking_ids as $row) {
                $whereres = "tracking_id='$row' and consultant_id = '$comp_id' ";
                $tracking_data = $this->Master_model->get_master_row('
                        tracker_consultant_mapping', $select = FALSE, $whereres);
                if (empty($tracking_data)) {
                    $tracking_mapping = array('tracking_id' => $row, 'consultant_id' => $comp_id,'acess_given'=>'Editor','tracker_type'=> $tracker_type);
                    $map_id = $this->Master_model->master_insert($tracking_mapping, 'tracker_consultant_mapping');
                }
            }
        }
        redirect('employer/external_tracker');
    }
     public function forword_internal_tracker() {
        $company_id = $this->session->userdata('company_profile_id');
        $tracking_id = $this->input->post('tracking_id');
        
        $consultant_email = $this->input->post('consultant_email');
        $company = $this->input->post('company');
        $access_value = $this->input->post('access_value');

         $array=explode(',',$tracking_id);
        $track=array_filter($array);
      $job_post_id = $this->input->post('job_post_id');
       
        for ($i=0; $i < sizeof($company) ; $i++) { 
            for ($j=0; $j < sizeof($track) ; $j++) {

             $update_data['acess_given'] = $access_value[$i];
            $where11['consultant_id'] = $company[$i];
            $where11['tracking_id'] = $track[$j];
            $update_data['tracker_type'] = 'internal';
            $this->Master_model->master_update($update_data, 'tracker_consultant_mapping', $where11);
        }
           
        }
        // print_r($company);
        // print_r($track);
        // print_r($access_value);die;

        $email = explode(',', $consultant_email);
        for ($i = 0;$i < sizeof($email);$i++) {
            $where_cndn = "company_email='$email[$i]'";
            $consultant_data = $this->Master_model->getMaster('company_profile', $where_cndn);
            if ($consultant_data) {
                $comp_id = $consultant_data[0]['company_profile_id'];

                
                $email_name = explode('@', $email[$i]);
                $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . '<br>' . $this->session->userdata("company_name") . '</b></em> <br/>Foarwarded You the tracking sheet<br/><b></b> please login to your account to explore more..<br> <a href="https://www.consultnhire.com/employer_login"><button>Login</button></a> ';
                $send = sendEmail_JobRequest($email[$i], $message, $subject);
            } else {
                $randomNumber = rand(1000, 9999);
                $new_JS_array = array('company_email' => $email[$i], 'token' => md5($email[$i]), 'create_at' => date('Y-m-d H:i:s'), 'comp_type' => "HR Consultant", 'company_password' => md5($randomNumber),);
                $comp_id = $this->Master_model->master_insert($new_JS_array, 'company_profile');
                $email_name = explode('@', $email[$i]);
                $subject = 'Job | Urgent requirement for ' . $require['job_title'];
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
                            <br><br>Hi ' . $email_name[0] . '<br>' . $this->session->userdata("company_name") . '</b></em> <br/>Foarwarded You the tracking sheet<br/><b></b> please login to your account to explore more.. <br><b>Your username:</b>' . $email[$i] . '<br><b>Your password:</b>' . $randomNumber . '</b><br><a href="https://www.consultnhire.com/employer_login"><button>Login</button></a> ';
                $send = sendEmail_JobRequest($email[$i], $message, $subject);
                // echo $comp_id;
                
            }
            $array=explode(',',$tracking_id);
            $tracker_type = $this->input->post('tracker_type');
            $tracking_ids = array_filter($array);
             if (empty($tracking_ids)) {
                     $frwd_array = array( 'company_id' =>  $company_id, 'job_post_id' => $job_post_id,  'status' => 1, 'created_on' => date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes')),);
                        $tracking_ids = $this->Master_model->master_insert($frwd_array, 'forwarded_jobs_cv');
                }
            foreach ($tracking_ids as $row) {
                $whereres = "tracking_id='$row' and consultant_id = '$comp_id' ";
                $tracking_data = $this->Master_model->get_master_row('
                        tracker_consultant_mapping', $select = FALSE, $whereres);
                if (empty($tracking_data)) {
                    $tracking_mapping = array('tracking_id' => $row, 'consultant_id' => $comp_id,'acess_given'=>$access_value[0],'tracker_type'=> $tracker_type);
                    $map_id = $this->Master_model->master_insert($tracking_mapping, 'tracker_consultant_mapping');
                }
            }
        }
        redirect('employer/internal_tracker');
    }
    function create_zip() {
        $zip = new ZipArchive();
        $filename = "upload/Resumes/test.zip";
        unlink($filename);
        if ($zip->open($filename, ZipArchive::CREATE) === TRUE) {
            $files = $this->input->post('myArray');
            foreach ($files as $row) {
                // print_r($row);
                $zip->addFile('upload/Resumes/' . $row, $row);
            }
        }
        $zip->close();
        echo base_url() . $filename;
    }
    function get_copy_folders() {
        $cv_id = $this->input->post('cv_id');
        $folder_id = $this->input->post('folder_id');
        $where = "cv_folder_relation.cv_id = '$cv_id'";
        if (isset($folder_id) && !empty($folder_id)) {
            $where.= "and cv_folder_relation.cv_folder_id != '$folder_id'";
        }
        $join = array('cv_folder' => 'cv_folder.id = cv_folder_relation.cv_folder_id ');
        $result = $this->Master_model->getMaster('cv_folder_relation', $where, $join, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        echo json_encode($result);
    }
    public function add_cv_folder() {
        $employer_id = $this->session->userdata('company_profile_id');
        $parent = $this->input->post('parent');
        $name = $this->input->post('folder_name');
        if (empty($name)) {
            $date = date('H:i:s');
            $name = 'new Folder' . $date;
        }
        $whereres = "company_id='$employer_id' and folder_name = '$name'";
        $folder_dbdata = $this->Master_model->get_master_row('cv_folder', $select = FALSE, $whereres);
        if (empty($folder_dbdata)) {
            $folder_data['folder_name'] = $name;
            $folder_data['company_id'] = $employer_id;
            $folder_data['parent_id'] = $parent;
            $folder_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $folder_data['created_by'] = $employer_id;
            $result = $this->Master_model->master_insert($folder_data, 'cv_folder');
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">New Folder Created Succesfully !</div>');
            redirect('employer/corporate_cv_bank');
        } else {
            $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">The Folder With This Name Already Exists ! please try adding another Folder</div>');
            redirect('employer/corporate_cv_bank');
        }
    }
    public function copy_cvto_folder() {
        $employer_id = $this->session->userdata('company_profile_id');
        $folder_id = $this->input->post('folder_id');
        $cv_idS = $this->input->post('cv_id');
        $cv = explode(',', $cv_idS);
        foreach ($cv as $row) {
            $whereres = "cv_folder_id='$folder_id' and cv_id = '$row'";
            $folder_dbdata = $this->Master_model->get_master_row('cv_folder_relation', $select = FALSE, $whereres);
            if (empty($folder_dbdata)) {
                $folder_data['cv_folder_id'] = $folder_id;
                $folder_data['cv_id'] = $row;
                $folder_data['status'] = '1';
                $result = $this->Master_model->master_insert($folder_data, 'cv_folder_relation');
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CV Copied to the folder Succesfully</div>');
            }
        }
        redirect('employer/corporate_cv_bank/' . $folder_id);
    }
    public function move_cvto_folder() {
        $employer_id = $this->session->userdata('company_profile_id');
        $folder_id = $this->input->post('folder_id');
        $cv_idS = $this->input->post('cv_id');
        $cv = explode(',', $cv_idS);
        foreach ($cv as $row) {
            $whereres = "cv_folder_id='$folder_id' and cv_id = '$row'";
            $folder_dbdata = $this->Master_model->get_master_row('cv_folder_relation', $select = FALSE, $whereres);
            if (empty($folder_dbdata)) {
                $where['cv_id'] = $row;
                $folder_data['cv_folder_id'] = $folder_id;
                $folder_data['cv_id'] = $row;
                $folder_data['status'] = '1';
                $this->Master_model->master_delete('cv_folder_relation', $where);
                $result = $this->Master_model->master_insert($folder_data, 'cv_folder_relation', $where);
                $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CV Moved to the folder Succesfully</div>');
            }
        }
        redirect('employer/corporate_cv_bank/' . $folder_id);
    }
    public function delete_folder() {
        $folder_id = $this->input->post('id');
        if (isset($folder_id) && !empty($folder_id)) {
            $update_data = array('status' => '0');
            $where11['id'] = $folder_id;
            $this->Master_model->master_update($update_data, 'cv_folder', $where11);
            $update_relation = array('status' => '0');
            $where_rel['cv_folder_id'] = $folder_id;
            $this->Master_model->master_update($update_relation, 'cv_folder_relation', $where_rel);
        }
    }
    public function rename_folder() {
        $folder_id = str_replace(' ', '', $this->input->post('folder_id'));
        $folder_name = $this->input->post('folder_name');
        if (isset($folder_id) && !empty($folder_id) && !empty($folder_name)) {
            $update_data = array('folder_name' => $folder_name);
            $where11['id'] = $folder_id;
            $this->Master_model->master_update($update_data, 'cv_folder', $where11);
        }
        redirect('employer/corporate_cv_bank/' . $folder_id);
    }
    public function internal_tracker() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'internal_tracker';
        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
        if (isset($_POST['sort'])) {
            $sort_val = $this->input->post('sort_val');
            if (isset($sort_val) && !empty($sort_val)) {
                if ($sort_val == 'active_jobs') {
                    $company_active_jobs = $this->job_posting_model->get_company_activedeasline_jobs($employer_id);
                } elseif ($sort_val == 'expired_jobs') {
                    $company_active_jobs = $this->job_posting_model->get_company_expired_jobs($employer_id);
                }
                $this->load->view('fontend/employer/internal_tracker.php', compact('company_active_jobs', 'employer_id'));
            }
        } else {
            $company_active_jobs = $this->job_posting_model->get_company_activedeasline_jobs($employer_id);
            $this->load->view('fontend/employer/internal_tracker.php', compact('company_active_jobs', 'employer_id'));
        }
    }
    public function external_tracker() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'external_tracker';
        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
         if (isset($_POST['sort'])) {
            $sort_val = $this->input->post('sort_val');
            if (isset($sort_val) && !empty($sort_val)) {
                if ($sort_val == 'active_jobs') {
                    $company_active_jobs = $this->job_posting_model->get_company_activedeasline_jobs($employer_id);
                } elseif ($sort_val == 'expired_jobs') {
                    $company_active_jobs = $this->job_posting_model->get_company_expired_jobs($employer_id);
                }
                $this->load->view('fontend/employer/external_tracker.php', compact('company_active_jobs', 'employer_id'));
            }
        }else
        {
             $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
        $this->load->view('fontend/employer/external_tracker.php', compact('company_active_jobs', 'employer_id'));
        }
       
    }
    public function shared_tracker() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'shared_tracker';
        $this->session->set_userdata($data);
        $employer_id = $this->session->userdata('company_profile_id');
        $company_active_jobs = $this->job_posting_model->get_shared_jobs($employer_id);
        $this->load->view('fontend/employer/shared_tracker.php', compact('company_active_jobs', 'employer_id'));
    }
    public function get_tracker_card() {
        $job_id = $this->input->post('job_id');
        $stage_id = $this->input->post('stage');
        if (!empty($job_id)) {
            $forwarded_job_tracking = $this->job_posting_model->get_job_forwarded_candidate($job_id);

            $education_level = $this->Master_model->getMaster('education_level', $where = false);
            $tracking_stages = $this->Master_model->getMaster('tracking_stages', $where = false);
            $this->load->view('fontend/employer/internal_tracker_card.php', compact('forwarded_job_tracking', 'employer_id', 'education_level', 'tracking_stages', 'job_id','stage_id'));
        }
    }
    public function get_shared_tracker_card() {
        $job_id = $this->input->post('job_id');
        if (!empty($job_id)) {
            $shared = $this->job_posting_model->get_shared_tracker($job_id);
            // echo $this->db->last_query();die;
            $education_level = $this->Master_model->getMaster('education_level', $where = false);
            $tracker_status = $this->Master_model->getMaster('tracker_status_master', $where = false);
             $tracking_stages = $this->Master_model->getMaster('tracking_stages', $where = false);
            $this->load->view('fontend/employer/shared_tracker_card.php', compact('shared', 'employer_id', 'education_level', 'tracker_status','tracking_stages' ,'job_id'));
        }
    }
    public function get_extracker_card() {
        $job_id = $this->input->post('job_id');
        $stage_id = $this->input->post('stage');
        
        if (!empty($job_id)) {
            $get_external_tracker = $this->job_posting_model->get_external_tracker($job_id);
            $education_level = $this->Master_model->getMaster('education_level', $where = false);
            $tracker_status = $this->Master_model->getMaster('tracker_status_master', $where = false);
             $tracking_stages = $this->Master_model->getMaster('tracking_stages', $where = false);
            $this->load->view('fontend/employer/external_tracker_card.php', compact('get_external_tracker', 'employer_id', 'education_level', 'tracker_status', 'job_id' , 
                'stage_id','tracking_stages'));
        }
    }
    function get_status()
    {
        $stage_id = $this->input->post('stage');
        $where_stage = "tracker_status_master.stage_id ='$stage_id'";
        $status = $this->Master_model->getMaster('tracker_status_master', $where = $where_stage, $join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
         if (!empty($status)) {
            // $result.= '<option value="">Select Test</option>';
            foreach ($status as $key) {
                $result.= '<option value="' . $key['status_id'] . '">' . $key['status_name'] . '</option>';
            }
        }
         echo $result; 
    }
    function update_cv() {
        // print_r( ); die();
        $up_date = json_decode($this->input->post('data_arr'));
        // print_r($up_date);die;
        foreach ($up_date as $row) {
            $update_cv['js_email'] = $row->email;
            $update_cv['js_name'] = $row->name;
            $update_cv['js_mobile'] = $row->mobile;
            $update_cv['js_current_ctc'] = $row->ctc;
            $update_cv['js_experience'] = $row->exp;

            $update_cv['js_current_notice_period'] = $row->notice;
            $update_cv['js_top_education'] = $row->edu;
            $update_cv['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $where_cv['cv_id'] = $row->value;
            $update = $this->Master_model->master_update($update_cv, 'corporate_cv_bank', $where_cv);
            $value = $this->session->userdata('company_name');
            $fname = strtok($value, " "); // Test
            if (!empty($row->comment)) {
                $frwrd_update_cv['comments'] = $fname . ' : ' . $row->comment;
            }
            if (!empty($row->action)) {
                $frwrd_update_cv['action_item'] = $row->action;
            }
            if (!empty($row->reminder)) {
                $frwrd_update_cv['reminder'] = $row->reminder;
            }
             $frwrd_update_cv['tracking_stage'] = $row->stage;
            $frwrd_update_cv['tracking_status'] = $row->status;
            $frwrd_update_cv['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $where_frwdcv['cv_id'] = $row->value;

            $update = $this->Master_model->master_update($frwrd_update_cv, 'forwarded_jobs_cv', $where_frwdcv);
            // echo $this->db->last_query();
        }
        // echo json_encode($update);
        // echo $this->db->last_query();
    }
    function update_external() {
        $up_date = json_decode($this->input->post('data_arr'));
        foreach ($up_date as $row) {
            if (empty($row->update)) {
                $value = $this->session->userdata('company_name');
                $fname = strtok($value, " "); // Test
                if (!empty($row->comment)) {
                    $update_external['comments'] = $fname . ' : ' . $row->comment;
                }
                if (!empty($row->action)) {
                    $update_external['action_item'] = $row->action;
                }
                if (!empty($row->reminder)) {
                    $update_external['reminder'] = $row->reminder;
                }
            }
            $update_external['email'] = $row->email;
            $update_external['name'] = $row->name;
            $update_external['mobile'] = $row->mobile;
            $update_external['salary'] = $row->ctc;
            $update_external['work_exp'] = $row->exp;
            $update_external['notice_period'] = $row->notice;
            $update_external['current_org'] = $row->org;
            $update_external['education'] = $row->edu;
            $update_external['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $update_external['tracking_status'] = $row->status;
            $update_external['tracking_stage'] = $row->stage;
            $update_external['updated_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $where_frwdcv['cv_id'] = $row->value;
            $update = $this->Master_model->master_update($update_external, 'external_tracker', $where_frwdcv);
        }
        echo json_encode($update);
    }
    public function export_internal_tracker($job_id = NULL) {
        // file name
        // echo $job_id;
        // if(!empty($job_id)) {
        $forwarded_job_tracking = $this->job_posting_model->get_job_forwarded_candidate($job_id);
        // create file name
        $today = date("d.m.y");
        $fileName = 'data-' . $today . '.xlsx';
        // load excel library
        $this->load->library('excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $alpha = 'A';
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Name');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Email');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Mobile');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Salary');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Work Experience');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Notice (days)');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Education');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Status');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Action Items');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Notes');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Reminders');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Updated On');
        $alpha++;
        // TABLE DATA START HERE
        // set Row
        // set Row
        $rowCount = 2;
        foreach ($forwarded_job_tracking as $row1) {
            $forwarded_job_tracking_date = $this->job_posting_model->get_job_forwarded_candidate_by_date($job_id, $row1->datecreation);
            // echo $this->db->last_query();die;
            $alpha = 'A';
            $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row1->datecreation);
            $alpha++;
            $rowCount++;
            foreach ($forwarded_job_tracking_date as $row) {
                // print_r($this->db->last_query());die;
                $alpha = 'A';
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->js_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->js_email);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->js_mobile);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->js_current_ctc);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->js_experience);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->js_current_notice_period);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->education_level_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->status_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->action_item);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->comments);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->reminder);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->updated_on);
                $alpha++;
                $rowCount++;
            }
        }
        // foreach ($skus as $element) {
        $filename = "internal_tracker." . date("jS F Y") . ".csv";
        //
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');
        // print_r($objWriter); die();
        // }
        // redirect(base_url().'?url=login','refresh');
        
    }
    public function export_external_tracker($job_id = NULL) {
        // file name
        // echo $job_id;
        // if(!empty($job_id)) {
        $forwarded_job_tracking = $this->job_posting_model->get_external_tracker($job_id);
        // create file name
        $today = date("d.m.y");
        $fileName = 'data-' . $today . '.xlsx';
        // load excel library
        $this->load->library('excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $alpha = 'A';
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Name');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Email');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Mobile');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Salary');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Work Experience');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Notice (days)');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Education');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Status');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Action Items');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Notes');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Reminders');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Updated On');
        $alpha++;
        // TABLE DATA START HERE
        // set Row
        // set Row
        $rowCount = 2;
        foreach ($forwarded_job_tracking as $row1) {
            $forwarded_job_tracking_date = $this->job_posting_model->get_external_tracker_date($job_id, $row1->datecreation);
            // echo $this->db->last_query();die;
            $alpha = 'A';
            $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row1->datecreation);
            $alpha++;
            $rowCount++;
            foreach ($forwarded_job_tracking_date as $row) {
                // print_r($this->db->last_query());die;
                $alpha = 'A';
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->email);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->mobile);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->salary);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->work_exp);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->notice_period);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->education_level_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->status_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->action_item);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->comments);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->reminder);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->updated_on);
                $alpha++;
                $rowCount++;
            }
        }
        // foreach ($skus as $element) {
        $filename = "internal_tracker." . date("jS F Y") . ".csv";
        //
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');
        // print_r($objWriter); die();
        // }
        // redirect(base_url().'?url=login','refresh');
        
    }
    public function export_shared_tracker($job_id = NULL) {
        // file name
        // echo $job_id;
        // if(!empty($job_id)) {
        $forwarded_job_tracking = $this->job_posting_model->get_shared_tracker($job_id);
        // create file name
        $today = date("d.m.y");
        $fileName = 'data-' . $today . '.xlsx';
        // load excel library
        $this->load->library('excel');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $alpha = 'A';
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Name');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Email');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Mobile');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Salary');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Work Experience');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Notice (days)');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Education');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Status');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Action Items');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Notes');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Reminders');
        $alpha++;
        $objPHPExcel->getActiveSheet()->SetCellValue($alpha . '1', 'Updated On');
        $alpha++;
        // TABLE DATA START HERE
        // set Row
        // set Row
        $rowCount = 2;
        foreach ($forwarded_job_tracking as $row1) {
            $forwarded_job_tracking_date = $this->job_posting_model->get_shared_tracker_date($job_id, $job_row1->datecreation);
            // echo $this->db->last_query();die;
            $alpha = 'A';
            $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row1->datecreation);
            $alpha++;
            $rowCount++;
            foreach ($forwarded_job_tracking_date as $row) {
                // print_r($this->db->last_query());die;
                $alpha = 'A';
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->email);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->mobile);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->salary);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->work_exp);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->notice_period);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->education_level_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->status_name);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->action_item);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->comments);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->reminder);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $row->updated_on);
                $alpha++;
                $rowCount++;
            }
        }
        // foreach ($skus as $element) {
        $filename = "internal_tracker." . date("jS F Y") . ".csv";
        //
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
        $objWriter->save('php://output');
        // print_r($objWriter); die();
        // }
        // redirect(base_url().'?url=login','refresh');
        
    }
    public function oceantest() {
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id'";
        $data['oceanchamp_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where_all, $join = FALSE, $order = false, $field = false, $select = 'DISTINCT type', $limit = false, $start = false, $search = false);
        $this->load->view('fontend/employer/ocean_test_type_selection', $data);
    }
    public function ocean_test_choose_test() {
        $test_type = $this->input->post('test_type');
        $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' AND type = '$test_type'";


        $data['oceanchamp_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where_all);
        $this->load->view('fontend/employer/ocean_test_test_selection', $data);
    }
    public function ocean_test_instructions() {
        $data['test_id'] = $this->input->post('test_name');
        $test_id = $data['test_id'];
        $employer_id = $this->session->userdata('company_profile_id');
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' AND test_id = '$test_id'";
        $data['oceanchamp_tests'] = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where = $where_all, $join = FALSE);
        $this->load->view('fontend/employer/ocean_test_instructions', $data);
    }
    public function ocean_test_start($test_id = null) {
        $company_profile_id = $this->session->userdata('company_profile_id');
        $test_id = base64_decode($test_id);
        if (!empty($test_id)) {
            $employer_id = $this->session->userdata('company_profile_id');
            $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' AND test_id = '$test_id'";
            $oceanchamp_tests = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where = $where_all, $join = FALSE);
            $all_questions = array();
            // foreach ($oceanchamp_tests as $question) {
            # code...
            $questions = explode(',', $oceanchamp_tests['questions']);
            //    $i=0;

            foreach ($questions as $row) {
                //
                $where = "questionbank.ques_id='$row'";
                $Join_data = array('questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|Left OUTER ');
                $question_data = $this->Master_model->get_master_row('questionbank', $select = 'questionbank.question,JSON_OBJECT("a",questionbank.option1,"b",questionbank.option2,"c",questionbank.option3,"d",questionbank.option4 ) as answers,time_for_question,questionbank_answer.answer_id as correctAnswer', $where, $join = $Join_data);
                $resultArray['question'] = $question_data['question'];
                $resultArray['time_for_question'] = $question_data['time_for_question'];
                if ($question_data['correctAnswer'] == 1) {
                    $resultArray['correctAnswer'] = 'a';
                } elseif ($question_data['correctAnswer'] == 2) {
                    $resultArray['correctAnswer'] = 'b';
                } elseif ($question_data['correctAnswer'] == 3) {
                    $resultArray['correctAnswer'] = 'c';
                } elseif ($question_data['correctAnswer'] == 4) {
                    $resultArray['correctAnswer'] = 'd';
                }
                // $resultArray['correctAnswer'] = $question_data['correctAnswer'];
                $resultArray['answers'] = json_decode($question_data['answers']);
                // $answer_data  = $this->Master_model->get_master_row('questionbank', $select = 'questionbank.option 1 as a', $where, $join = false);
                array_push($all_questions, $resultArray);
            }
            // print_r($questions);die;
            $data['all_questions'] = $all_questions;
            $data['test_duration'] = $oceanchamp_tests['test_duration'];
            $data['oceanchamp_tests'] = $oceanchamp_tests;
            $data['test_id'] = $test_id;
            $this->load->view('fontend/employer/ocean_test_questions', $data);
            // $this->load->view('fontend/exam/oceantest_test',$data);
            
        }
    }
    public function insert_test_data() {
        if (!empty($_POST)) {
            # code...
            // print_r($_POST);die;
            $test_id = $this->input->post('test_id');
            $employer_id = $this->session->userdata('company_profile_id');
            $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' AND test_id = '$test_id'";
            $oceanchamp_tests = $this->Master_model->get_master_row('oceanchamp_tests', $select = FALSE, $where = $where_all, $join = FALSE);
            $questions = explode(',', $oceanchamp_tests['questions']);
            $i = 0;
            $created_on = date('Y-m-d H:i:s');
            $cenvertedTime = date('Y-m-d H:i:s', strtotime('+5 hour +30 minutes', strtotime($created_on)));
                $avg_time = array();
             $answers_selected = explode(',', $this->input->post('answers_selected'));
             $ans=array();
              $new_array=array();
              
             foreach ($answers_selected as $row) {
               
               $ans_option = explode('-',$row);
               array_push($ans, $ans_option[0]);
               // array_push($new_array['id'], var)
               $new_array[$i]['id'] = $ans_option[0];
               $new_array[$i]['val'] = $ans_option[1];
               $i++;
             }
             // print_r($new_array);
             //  echo "<br>";die;
             $data['reviews_exercised'] = count(array_count_values($ans)) ;
             $i=0;
              $j=0;
              $rarray =array();
               foreach ($new_array as $key) {
                 $id = $new_array[$j]['id'];
                 $val=  $new_array[$j]['val'];

                 // echo $id;
                 // echo $val;
                 $qid = $questions[$id];
                  // echo 'q'.$qid;
                   // echo "<br>";
                 $where_all = "questionbank_answer.question_id='$qid' ";
                $oceanchamp_tests1 = $this->Master_model->get_master_row('questionbank_answer', $select = FALSE, $where = $where_all, $join = FALSE);
                //   # code...
                 // echo 'a'.$oceanchamp_tests1['answer_id'];
                 //   echo "<br>";
                   if ($oceanchamp_tests1['answer_id']==1) {
                    $ans_id ='a';
                   }
                   else if ($oceanchamp_tests1['answer_id']==2) {
                    $ans_id ='b';
                   }
                   else if ($oceanchamp_tests1['answer_id']==3) {
                    $ans_id ='c';
                   }
                   else if ($oceanchamp_tests1['answer_id']==4) {
                    $ans_id ='d';
                   }
                 if($val == $ans_id) {
                  // array_push($rarray, 'c');
                  $res[$j]['id'] = $id;
                  $res[$j]['val'] = 'c';
                 }
                 else {
                  // array_push($rarray, 'W');

                   $res[$j]['id'] = $id;
                   $res[$j]['val'] = 'w';
                 }
                 // $res[$id]['val']=$rarray;
                
                 $j++;
                }
              //   echo "<br><pre>";
              // print_r($res); 
              //   echo "</pre><br>";
                 $_data = array();
                foreach ($res as $v) {
                 if (isset($_data[$v['id']])) {
                   // found duplicate
                  // array_push($rarray,$_data[$v['val']])
                   continue;
                 }
                 // remember unique item
                 $_data[$v['id']] = $v;
               }
       
        $my_array = array_values($_data);
        $res_revers =array_reverse($res);
        $_data = array();
                foreach ($res_revers as $v) {
                 if (isset($_data[$v['id']])) {
                   // found duplicate
                  // array_push($rarray,$_data[$v['val']]);
                   continue;
                 }
                 // remember unique item
                 $_data[$v['id']] = $v;
               }

        $my_array1 = array_values($_data);
         $revers =array_reverse($my_array1);
         
                $led_right = 0;
                $led_wrong = 0;
                $dosnt_matter = 0;
               for ($k=0; $k <sizeof($my_array) ; $k++) { 
                 if($my_array[$k]['val']=='w' && $revers[$k]['val']=='c')
                 {
                  $led_right=+1;
                 }
                 elseif($my_array[$k]['val']=='c' && $revers[$k]['val']=='w')
                 {
                  $led_wrong+=1;
                 }
                 else
                 {
                  $dosnt_matter+=1;
                 }
               }
             
            foreach ($questions as $row) {
                if ($_POST['question' . $i] == 'a') {
                    $option = '1';
                } elseif ($_POST['question' . $i] == 'b') {
                    $option = '2';
                } elseif ($_POST['question' . $i] == 'c') {
                    $option = '3';
                } elseif ($_POST['question' . $i] == 'd') {
                    $option = '4';
                }
                $question_id = $row;
                $option = $option;
                $where_all = "questionbank_answer.question_id='$row' ";
                $oceanchamp_tests1 = $this->Master_model->get_master_row('questionbank_answer', $select = FALSE, $where = $where_all, $join = FALSE);
                if ($option == $oceanchamp_tests1['answer_id']) {
                    $mark = 4;
                    $status = 'Yes';
                } else {
                    if (isset($oceanchamp_tests) && $oceanchamp_tests['negative_marks'] == 'Y') {
                        $status = 'No';
                        $mark = '-1';
                    } else {
                        $status = 'No';
                        $mark = 0;
                    }
                }

                array_push($avg_time, $_POST['time_taken' . $i]);
                $exam_array = array(
                 'test_id' => $test_id, 
                 'employee_id' => $employer_id, 
                 'question_id' => $row, 
                 'marks' => $mark, 
                 'correct_status' => $status,
                 'time_taken' => $_POST['time_taken' . $i], 
                 'date_time' => $cenvertedTime);
                $last_id = $this->Master_model->master_insert($exam_array, 'emp_test_result');
              
               
            }
          
          
            $avg_time = array_filter($avg_time);
            $average = array_sum($avg_time)/count($avg_time);
            $data['test_id'] = $test_id; 
            $data['employer_id']= $employer_id;
            $data['total_questions'] = sizeof($questions); 
           
            $data['total_questions'] = sizeof($questions);
            $data['test_start_time'] = $this->input->post('start_time');
            $data['test_end_time'] = date('d-m-Y H:i:s', strtotime('+5 hours +30 minutes'));
            $data['max_test_duration'] = $oceanchamp_tests['test_duration']/60;
            $data['time_taken'] =array_sum($avg_time)/60;
            $data['avg_time_per_question'] = $average/60;
            $data['total_attempted'] = $this->input->post('green');
            $data['total_skipped'] = $this->input->post('gray') + $this->input->post('white');
            $data['correct_ans'] = $this->input->post('correct');
            $data['wrong_ans'] = sizeof($questions) - $this->input->post('correct');
            $data['review_led_right'] = $led_right;
            $data['review_led_wrong'] = $led_wrong;
            $data['review_didnt_matter'] =$dosnt_matter;
            $data['max_achievable_score'] =sizeof($questions)*4;
            
           
            if (isset($oceanchamp_tests) && $oceanchamp_tests['final_result'] == 'Y') {
                    $data['final_score'] = ($data['correct_ans']*4) - $data['wrong_ans'];
                    $data['total_positive_score'] =$data['correct_ans']*4;
                    $data['total_negative_score'] = $data['wrong_ans'];
                } else {
                    $data['final_score'] = $data['correct_ans']*4;
                    $data['total_positive_score'] =$data['correct_ans']*4;
                     $data['total_negative_score'] ='0';
                }
                 $data['final_percentage'] = ($data['final_score']/$data['max_achievable_score'])*100;
                $last_id = $this->Master_model->master_insert($data, 'emp_test_report');
                  if (isset($oceanchamp_tests) && $oceanchamp_tests['final_result'] == 'Y') {
                $this->load->view('fontend/employer/result_page', $data);
            } else {
                $this->load->view('fontend/exam/exam_success', $data);
            }
        }
    }
    

    function add_new_connection() {
        $js_id = $this->input->post('id');
        $name = $this->input->post('name');
        $employer_id = $this->session->userdata('company_profile_id');
        $whereres = "emp_id='$employer_id' and js_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres);
        $where_js = "job_seeker_id='$js_id' and full_name = '$name'";
        $check_js = $this->Master_model->get_master_row('js_info', $select = FALSE, $where_js);
        if (empty($check_js)) {
            $where_emp = "company_profile_id='$js_id' and company_name = '$name'";
            $check_emp = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where_emp);
            if (!empty($check_emp)) {
                $type = 'emp-emp';
            }
        } else {
            $type = 'emp-js';
        }
        $whereres = "emp_id='$employer_id' and js_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres);
        if (empty($check)) {
            $connection_data['emp_id'] = $employer_id;
            $connection_data['js_id'] = $js_id;
            $connection_data['status'] = 1;
            $connection_data['type'] = $type;
            $connection_data['created_by'] = $employer_id;
            $connection_data['created_date'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
            $insert_id = $this->Master_model->master_insert($connection_data, 'emp_js_connection');
        }
        // print_r($js_id);
        if ($check['type'] == 'emp-emp' && $check['created_by'] == $this->session->userdata('company_profile_id')) {
            $Join_data = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.js_id|Left OUTER ');
        } elseif ($check['type'] == 'emp-emp' && $check['created_by'] != $this->session->userdata('company_profile_id')) {
            $Join_data = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');
        } else {
            $Join_data = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
        }
        // $Join_data      = array(
        //    'js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER '
        $Join_data = array('messaging' => 'messaging.connection_id = emp_js_connection.emp_js_connection_id|Left OUTER ');
        $whereres = "emp_id='$employer_id' or js_id = '$employer_id'";
        $whereres.= "group by emp_js_connection.emp_js_connection_id";
        $data['chatbox'] = $this->Master_model->getMaster('emp_js_connection', $where = $whereres, $join = $Join_data, $order = 'desc', $field = 'max', $select = ' messaging.*, MAX( messaging.message_id) as max,emp_js_connection.*', $limit = false, $start = false, $search = false);
        $this->load->view('fontend/employer/chatting_list.php', $data);
    }
    function get_list_connections() {
        $employer_id = $this->session->userdata('company_profile_id');
        $Join_data = array('messaging' => 'messaging.connection_id = emp_js_connection.emp_js_connection_id|Left OUTER ');
        $whereres = "emp_id='$employer_id' or js_id = '$employer_id'";
        $whereres.= "group by emp_js_connection.emp_js_connection_id";
        $data['chatbox'] = $this->Master_model->getMaster('emp_js_connection', $where = $whereres, $join = $Join_data, $order = 'desc', $field = 'max', $select = ' messaging.*, MAX( messaging.message_id) as max,emp_js_connection.*', $limit = false, $start = false, $search = false);
        $this->load->view('fontend/employer/chatting_list.php', $data);
    }
    function get_messages() {
        $js_id = $this->input->post('id');
        $employer_id = $this->session->userdata('company_profile_id');
        $del = array('message_status' => '1');
        $where11['msg_to'] = $employer_id;
        $where11['connection_id'] = $js_id;
        $this->Master_model->master_update($del, 'messaging', $where11);
        $whereres = " emp_js_connection_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres, $Join_data);
        $whereres = "emp_js_connection_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres, $Join_data);
        if ($check['type'] == 'emp-emp' && $check['created_by'] == $this->session->userdata('company_profile_id')) {
            $Join_data = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.js_id|Left OUTER ');
        } elseif ($check['type'] == 'emp-emp' && $check['created_by'] != $this->session->userdata('company_profile_id')) {
            $Join_data = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');
        } else {
            $Join_data = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
        }
        $whereres = " emp_js_connection_id = '$js_id'";
        $data['check'] = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres, $Join_data);
        $where = "connection_id = '$js_id' ";
        // $where .= "group by msg_from";
        $data['chatbox'] = $this->Master_model->getMaster('messaging', $where = $where, $join = false, $order = 'asc', $field = 'message_id', $select = false, $limit = false, $start = false, $search = false);
        // print_r($this->db->last_query());die;
        $this->load->view('fontend/employer/chatting_card.php', $data);
    }
    function send_message() {
        $employer_id = $this->session->userdata('company_profile_id');
        $js_id = $this->input->post('id');
        $message = $this->input->post('message');
        $whereres = "emp_js_connection_id = '$js_id'";
        $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres, $Join_data);
        if ($check['type'] == 'emp-emp' && $check['created_by'] == $this->session->userdata('company_profile_id')) {
            $Join_data = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.js_id|Left OUTER ');
        } elseif ($check['type'] == 'emp-emp' && $check['created_by'] != $this->session->userdata('company_profile_id')) {
            $Join_data = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');
        } else {
            $Join_data = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
        }
        $whereres = "emp_js_connection.emp_js_connection_id = '$js_id' ";
        $data['check'] = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres, $Join_data);
        $meg_data['msg_from'] = $employer_id;
        $meg_data['msg_to'] = $data['check']['js_id'];
        $meg_data['connection_id'] = $data['check']['emp_js_connection_id'];
        $meg_data['msg'] = $message;
        $meg_data['status'] = 1;
        $meg_data['created_by'] = $employer_id;
        $meg_data['created_date'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
        $insert_id = $this->Master_model->master_insert($meg_data, 'messaging');
        // $where   = "(msg_from='$employer_id' or msg_to = '$employer_id') and (msg_from='$js_id' or msg_to = '$js_id' ) ";
        $where = "connection_id = '$js_id' ";
        // $where .= "group by msg_from";
        $data['chatbox'] = $this->Master_model->getMaster('messaging', $where = $where, $join = false, $order = 'asc', $field = 'message_id', $select = false, $limit = false, $start = false, $search = false);
        // print_r($this->db->last_query());die;
        $this->load->view('fontend/employer/chatting_card.php', $data);
    }
    function get_active_cvs() {
        $domain_var = $this->input->post('domain');
        $exp_var = $this->input->post('exp');
        $notice_period_var = $this->input->post('notice_period');
        $education_var = $this->input->post('education');
        $current_ctc_var = $this->input->post('current_ctc');
        //$stablity_var = $this->input->post('stability');
        $company_id = $this->session->userdata('company_profile_id');
        $where_active = "(corporate_cv_bank.company_id = '$company_id' and login BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) And  NOW() )";
        $stability = $this->input->post('stability');
        //$days_count=30*stability;
        if ($stability == 6) {
            $before_date.= date('Y-m-d', strtotime("-" . $stability . " months"));
            $where_active = "corporate_cv_bank.js_working_since <= '" . $before_date . "'";
        }
        if ($stability == 12) {
            $before_months = 6;
            $after_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $before_date = date('Y-m-d', strtotime("-" . $before_months . " months"));
            $where_active.= "corporate_cv_bank.js_working_since <= '" . $after_date . "' and corporate_cv_bank.js_working_since >= '" . $before_date . "'";
        }
        if ($stability == 24) {
            $before_months = 12;
            $after_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $before_date = date('Y-m-d', strtotime("-" . $before_months . " months"));
            $where_active.= "corporate_cv_bank.js_working_since <= '" . $after_date . "' and corporate_cv_bank.js_working_since >= '" . $before_date . "'";
        }
        if ($stability == 30) {
            $before_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $where_active.= "corporate_cv_bank.js_working_since >= '" . $before_date . "'";
        }
        $where_active.= "  and (corporate_cv_bank.js_industry='$domain_var' OR corporate_cv_bank.js_experience='$exp_var' OR corporate_cv_bank.js_current_notice_period='$notice_period_var' OR corporate_cv_bank.js_top_education = '$education_var' OR corporate_cv_bank.js_current_ctc='$current_ctc_var' OR corporate_cv_bank.js_working_since = '$stability')";
        $where_active.= ' GROUP by cv_id';
        $join_cond = array('js_info' => 'js_info.email = corporate_cv_bank.js_email|Left', 'js_login_logs' => 'js_info.job_seeker_id = js_login_logs.job_seeker_id|Left');
        $active_cv = $this->Master_model->getMaster('corporate_cv_bank', $where = $where_active, $join = $join_cond, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        //echo $this->db->last_query();
        //echo $this->db->last_query();
        echo json_encode($active_cv);
    }
    public function get_own_cvs() {
        $exp_var = $this->input->post('exp');
        $notice_period_var = $this->input->post('notice_period');
        $education_var = $this->input->post('education');
        $current_ctc_var = $this->input->post('current_ctc');
        $company_id = $this->session->userdata('company_profile_id');
        $where_active = "(corporate_cv_bank.company_id = '$company_id' )";
        $stability = $this->input->post('stability');
        //$days_count=30*stability;
        if ($stability == 6) {
            $before_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $where_active.= "corporate_cv_bank.js_working_since <= '" . $before_date . "'";
        }
        if ($stability == 12) {
            $before_months = 6;
            $after_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $before_date = date('Y-m-d', strtotime("-" . $before_months . " months"));
            $where_active.= "corporate_cv_bank.js_working_since <= '" . $after_date . "' and corporate_cv_bank.js_working_since >= '" . $before_date . "'";
        }
        if ($stability == 24) {
            $before_months = 12;
            $after_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $before_date = date('Y-m-d', strtotime("-" . $before_months . " months"));
            $where_active.= "corporate_cv_bank.js_working_since <= '" . $after_date . "' and corporate_cv_bank.js_working_since >= '" . $before_date . "'";
        }
        if ($stability == 30) {
            $before_date = date('Y-m-d', strtotime("-" . $stability . " months"));
            $where_active.= "corporate_cv_bank.js_working_since >= '" . $before_date . "'";
        }
        $where_active.= " and (corporate_cv_bank.company_id = '$company_id' and corporate_cv_bank.js_experience='$exp_var' and corporate_cv_bank.js_current_notice_period='$notice_period_var' and corporate_cv_bank.js_top_education = '$education_var' and corporate_cv_bank.js_current_ctc='$current_ctc_var' and corporate_cv_bank.js_working_since = '$stability')";
        $where_active.= ' GROUP by corporate_cv_bank.cv_id';
        $join_cond = array('cv_folder_relation' => 'cv_folder_relation.cv_folder_id = cv_folder.id | Left', 'corporate_cv_bank' => 'corporate_cv_bank.cv_id = cv_folder_relation.cv_id | Left');
        $own_cvs = $this->Master_model->getMaster('cv_folder', $where = $where_active, $join = $join_cond, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        echo json_encode($own_cvs);
    }
    public function job_post_report() {
        $job_id = $this->input->post('id');
        $where_forwarded = "job_apply.job_post_id='$job_id' and job_apply.forword_job_status = 1";
        $data['Total_count_forwarded'] = $this->Master_model->getMaster('job_apply', $where = $where_forwarded, $join = FALSE, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);

        $where_applied = "job_apply.job_post_id='$job_id'";
        $data['Total_count_applied'] = $this->Master_model->getMaster('job_apply', $where = $where_applied, $join = FALSE, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        //// $where_applied = "job_apply.apply_date <= apply_date(NOW(),INTERVAL 7 DAYS )') and job_posting.created_at <=created_at(NOW(),INTERVAL 7 DAYS )') job_apply.job_post_id='$job_id'";
        $where_test_attempt_mandatory = "job_posting.is_test_required='Yes' and job_posting.job_post_id = '$job_id' group by job_apply.job_apply_id";
        $join_test = array('job_apply' => 'job_apply.job_post_id=job_posting.job_post_id', 'seeker_test_result' => 'seeker_test_result.test_id=job_posting.test_for_job');
        $data['Total_count_test_given'] = $this->Master_model->getMaster('job_posting', $where = $where_test_attempt_mandatory, $join = $join_test, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        // print_r($this->db->last_query());
        $where_test_passed = "job_posting.is_test_required='Yes' and seeker_test_result.correct_status = 'Yes'and job_posting.job_post_id = '$job_id' ";
        $where_test_passed.= "HAVING count(*) > min_marks ";
        $join_test_passed = array('job_posting' => 'job_posting.job_post_id=job_apply.job_post_id | Left ', 'seeker_test_result' => 'seeker_test_result.test_id=job_posting.test_for_job | Left ', 'oceanchamp_tests' => 'oceanchamp_tests.test_id = seeker_test_result.test_id | Left');
        $data['Total_count_test_passed'] = $this->Master_model->getMaster('job_apply', $where = $where_test_passed, $join = $join_test_passed, $order = false, $field = false, $select = 'count(*),oceanchamp_tests.total_questions/2 as min_marks', $limit = false, $start = false, $search = false);
        $where_finalized = "job_apply.job_post_id='$job_id' and job_apply.apply_status = 3";
        $data['Total_count_inteviewed_passed'] = $this->Master_model->getMaster('job_apply', $where = $where_finalized, $join = FALSE, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);

        $where_finalized = "job_apply.job_post_id='$job_id' and job_apply.apply_status = 2";
        $data['Total_count_inteviewed_failed'] = $this->Master_model->getMaster('job_apply', $where = $where_finalized, $join = FALSE, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);

        $where_offer = "job_apply.job_post_id='$job_id' and (forwarded_jobs_cv.tracking_status=7 or external_tracker.tracking_status=7)";
        $join_test_passed = array('forwarded_jobs_cv' => 'forwarded_jobs_cv.job_post_id=job_apply.job_post_id | Left ', 'external_tracker' => 'external_tracker.job_post_id=job_apply.job_post_id | Left ');
        $data['Total_offer_accepted'] = $this->Master_model->getMaster('job_apply', $where = $where_offer, $join = $join_test_passed, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);

        $where_applied = "job_apply.job_post_id='$job_id' AND job_apply.apply_date BETWEEN job_posting.created_at AND DATE_ADD(job_posting.created_at, INTERVAL 7 DAY)";
        $join_test = array('job_posting' => 'job_posting.job_post_id=job_apply.job_post_id');
        $data['Total_count_early_applied'] = $this->Master_model->getMaster('job_apply', $where = $where_applied, $join = $join_test, $order = false, $field = false, $select = false, $limit = false, $start = false, $search = false);
        //echo $this->db->last_query();
        // echo $this->db->last_query();
        echo json_encode($data);
    }
    public function get_test_list() {
        $employer_id = $this->session->userdata('company_profile_id');
        $test_status = $this->input->post('test_status');
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' and test_status = '$test_status'";
        $oceanchamp_tests = $this->Master_model->getMaster('oceanchamp_tests', $where = $where_all, $join = FALSE, $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = false, $limit = false, $start = false, $search = false);
        $result;
        // print_r($this->db->last_query());
        if (!empty($oceanchamp_tests)) {
            // $result.= '<option value="">Select Test</option>';
            foreach ($oceanchamp_tests as $key) {
                $result.= '<option value="' . $key['test_id'] . '">' . $key['test_name'] . '</option>';
            }
        } 
        // else {
        //     $result.= '<option value="0">Test not available</option>';
        // }
        echo $result;
    }
    public function attach_test() {
        $job_post_id = $this->input->post('job_post_id');
        $test_id = $this->input->post('test_id');
        $test_data['test_for_job'] = $test_id;
        $where['job_post_id'] = $job_post_id;
        $this->Master_model->master_update($test_data, 'job_posting', $where);
        $this->session->set_flashdata('success', '<div class="alert alert-success text-center">Test attached Successfully</div>');
        redirect('employer/active_job');
    }
    public function trash_cv() {
        $type = $this->input->post('type');
        if ($type == 'cv') {
            $company_id = $this->session->userdata('company_profile_id');
            $where_c = "company_id ='$company_id' and js_status = '1'";
            // $where_c['company_id'] = $company_id;
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_bank_data'] = $this->Master_model->getMaster('corporate_cv_bank', $where_c, $join, $order = 'desc', $field = 'cv_id', $select = false, $limit = false, $start = false, $search = false);
            $data['company_active_jobs'] = $this->job_posting_model->get_company_active_jobs($company_id);
            $this->load->view('fontend/employer/cv_trash', $data);
        } elseif ($type == 'qbqnk') {
            $employer_id = $this->session->userdata('company_profile_id');
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
            $where_all = "questionbank.ques_status='0' AND ques_created_by='$employer_id'";
            $join_emp = array('skill_master' => 'skill_master.id=questionbank.technical_id |left outer', 'topic' => 'topic.topic_id=questionbank.topic_id |left outer', 'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer', 'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer', 'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer', 'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER');
            $data['questionbank'] = $this->Master_model->getMaster('questionbank', $where_all, $join_emp, $order = 'desc', $field = 'ques_id', $select = false, $limit = false, $start = false, $search = false);
            $this->load->view('fontend/employer/trash_questions', $data);
        } elseif ($type == 'jobs') {
            $employer_id = $this->session->userdata('company_profile_id');
            $company_active_jobs = $this->job_posting_model->get_company_deleted_jobs($employer_id);
            //$Job_Post_was_sent = $this->job_apply_model->job_post($company_id, $job_post_id);
            $this->load->view('fontend/employer/posted_jobs_trash.php', compact('company_active_jobs', 'employer_id'));
        }
    }

    public function preview_job_post($job_id = NULL)
    {
      
      $join = array("oceanchamp_tests"=>"oceanchamp_tests.test_id = job_posting.test_for_job");
        $where = "job_post_id = '$job_id'";
        $job_details = $this->Master_model->get_master_row('job_posting', $select = FALSE, $where, $join );
        $employer_id = $this->session->userdata('company_profile_id');
        $job_info = array(
                'company_profile_id'=> $employer_id, 
                'job_title'=>$job_details['job_title'], 
                'job_slugs' =>$job_details['job_slugs'], 
                'job_desc' => $job_details['job_desc'], 
                'job_category'=>$job_details['job_category'], 
                'experience'=>$job_details['experience'], 
                'no_jobs'=>$job_details['no_jobs'],
                'test_for_job'=>$job_details['test_for_job'],
                 'test_name'=>$job_details['test_name'], 
                'job_role' => $job_details['job_role'], //new added field
                'city_id' => $job_details['city_id'], //new added field
                'skills_required' => $job_details['skills_required'], //new added field
                'salary_range' => $job_details['salary_range'], 
                "job_deadline" => date('d-m-Y', strtotime($job_details['job_deadline'])), "job_status" => '1', 
                'is_test_required' => $job_details['is_test_required']);
                 $job_info['benefits'] = explode(',', $job_details['benefits']);
                   $ed = $job_details['job_edu'];
                $where_int = "education_level_id='$ed'";
            $job_info['education'] = $this->Master_model->get_master_row('education_level', $select = FALSE, $where_int, $join = FALSE);
           
            $job_role = $job_details['job_role'];
            $job_info['jobrole'] = $job_role;
                $where_role = "id='$job_role'";
            $job_info['job_role'] = $this->Master_model->get_master_row('job_role', $select = FALSE, $where_role, $join = FALSE);
                $job_nature = $job_details['job_nature'];
            $job_info['jobnature'] = $job_nature;
                $where_int = "job_nature_id='$job_nature'";
            $job_info['job_nature'] = $this->Master_model->get_master_row('job_nature', $select = FALSE, $where_int, $join = FALSE);
            $job_info['job_id'] = $job_id;
                 $job_info['preview'] = 'true';
                 $this->load->view('fontend/employer/job_preview', $job_info);
    }

    public function preview_cv($id = NULL)
    {
        if (isset($id)) {
          $cv_id = base64_decode($id);
            $data['industry_master'] = $this->Master_model->getMaster('job_category', $where = false);
            $data['department'] = $this->Master_model->getMaster('department', $where = false);
            $data['job_role'] = $this->Master_model->getMaster('job_role', $where = false);
            $data['education_level'] = $this->Master_model->getMaster('education_level', $where = false);
            $data['certificates'] = $this->Master_model->getMaster('certification_master', $where = false);
            $data['skills'] = $this->Master_model->getMaster('skill_master', $where = false);
            $where_cv = "corporate_cv_bank.cv_id = '$cv_id'";
            $join = array('education_level' => 'education_level.education_level_id = corporate_cv_bank.js_top_education | left outer');
            $data['cv_bank_data'] = $this->Master_model->get_master_row('corporate_cv_bank', $select = FALSE, $where = $where_cv, $join);
            $email = $data['cv_bank_data']['js_email'];
            $where_js = "js_info.email = '$email'";
            $join_ex = array('js_experience' => 'js_experience.job_seeker_id = js_info.job_seeker_id | left outer',
                'designation' => 'designation.designation_id = js_experience.designation_id');
            $data['js_details'] = $this->Master_model->getMaster('js_info', $where = $where_js, $join = $join_ex, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);

            $this->load->view('fontend/employer/preview_cv', $data);
        }
    }

    function get_shared_list()
    {
        $employer_id =$this->session->userdata('company_profile_id');
        $company_name = $this->session->userdata('company_name');
        $company_email = $this->session->userdata('email');
        $tracker_id = $this->input->post('tracker_id');
        $job_id = $this->input->post('job_id');
        $type = $this->input->post('type');
 
        $array=explode(',',$tracker_id);
        $filter=array_filter($array);
        $array = implode("','",$filter);
      
             // $join = array('company_profile'=>'company_profile.company_profile_id = tracker_consultant_mapping.consultant_id ');
             $where ="tracker_consultant_mapping.tracking_id IN ('".$array."') ";
             if ($type == 'external') {
                $join = array('company_profile'=>'company_profile.company_profile_id = tracker_consultant_mapping.consultant_id ',
                    'external_tracker'=> 'external_tracker.id = tracker_consultant_mapping.tracking_id');
                $where .= " OR external_tracker.job_post_id = '$job_id' and tracker_type = '$type' ";
             }
             elseif($type == 'internal')
             {
                $join = array('company_profile'=>'company_profile.company_profile_id = tracker_consultant_mapping.consultant_id ',
                    'forwarded_jobs_cv'=> 'forwarded_jobs_cv.id = tracker_consultant_mapping.tracking_id');
                $where .= " OR forwarded_jobs_cv.job_post_id = '$job_id' and tracker_type = '$type'";
             }
            $where .=' group by tracker_consultant_mapping.consultant_id';
           $shared_list = $this->Master_model->getMaster('tracker_consultant_mapping', $where , $join , $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);

           $result ='<li class="shared_li" role="menuitem" tabindex="-1" aria-selected="false">
    <div role="img" class="profile_img">A</div>
    <div class="boqDrivesharedialogPermissionslistPermissionrowMain" data-hovercard-id="amishra@tele-kinetics.com" data-hovercard-owner-id="130">
        <div class="shared_name" aria-label="'.$company_name.'">'.$company_name.' (you)</div>
        <div class="boqDrivesharedialogPermissionslistPermissionrowSecondary" aria-label="'.$company_email.'.">'.$company_email.'</div>
        <input type="hidden" name="company[]" value="'.$employer_id.'">
        <div class = "btn-group">
   <button type = "button" class = "btn btn-primary dropdown-toggle btn-sm" data-toggle = "dropdown">
    Owner

      <span class = "caret"></span>
   </button></div>'
   ;
        
 
  

           // print_r($this->db->last_query);die;
           if (!empty($shared_list)) {
               foreach ($shared_list as $row) {
            $comp_id = $row['company_profile_id'];
            $where_job = "job_post_id = '$job_id' and company_profile_id ='$comp_id'";
            $job_data = $this->Master_model->get_master_row('job_posting', $select = FALSE, $where_job , $join = FALSE);

           
                $type =$row['acess_given'];
             
            $profile_pic = $this->Company_profile_model->company_logoby_id($employer_id);
              $result.= '<li class="shared_li" role="menuitem" tabindex="-1" aria-selected="false">
    <div role="img" class="profile_img">A</div>
    <div class="boqDrivesharedialogPermissionslistPermissionrowMain" data-hovercard-id="amishra@tele-kinetics.com" data-hovercard-owner-id="130">
        <div class="shared_name" aria-label="'.$row['company_name'].'">'.$row['company_name'].'</div>
        <div class="boqDrivesharedialogPermissionslistPermissionrowSecondary" aria-label="'.$row['company_email'].'.">'.$row['company_email'].'</div>

        <input type="hidden" name="company[]" value="'.$row['company_profile_id'].'">
        <div class = "btn-group">
   <button type = "button" id="btn_val'.$row['company_profile_id'].'" class = "btn btn-primary dropdown-toggle btn-sm" data-toggle = "dropdown">
    '.$type.'

      <span class = "caret"></span>
   </button>';
   if ($type != 'Owner') {
      $result.= '
   <ul id="option_list" class = "dropdown-menu" role = "menu">
      <li data-value="Viewer" data-one="'.$row['company_profile_id'].'"><a href = "#">Viewer</a></li>
      <li data-value="Commenter" data-one="'.$row['company_profile_id'].'"><a href = "#">Commenter</a></li>
      <li data-value="Editor" data-one="'.$row['company_profile_id'].'"><a href = "#">Editor</a></li>
      
      <li class = "divider"></li>
      <li data-value="Remove" onclick="remove('.$row['company_profile_id'].')" data-one="'.$row['company_profile_id'].'"><a href = "#">Remove</a></li>
   </ul>
    <input id="accessvalue'.$row['company_profile_id'].'" size="15" name="access_value[]" type="hidden" />
</div>
    </div>
    
</li>';
   }
   else
   {
     $result.= '<input id="accessvalue" size="15" name="access_value[]" value="Owner" type="hidden" />';
   }
  
          }
           }
          
           
        echo $result;
    }

    function remove_from_share()
    {
        $company_id = $this->input->post('company_id');
        $job_id = $this->input->post('job_id');
        $type = $this->input->post('type');
        $tracking_id = $this->input->post('tracking_id');
         $array=explode(',',$tracking_id);
        $track=array_filter($array);
         $array = implode("','",$track);
      
             // $join = array('company_profile'=>'company_profile.company_profile_id = tracker_consultant_mapping.consultant_id ');
            

        
            $where="consultant_id = '$company_id' and  tracker_consultant_mapping.tracking_id IN ('".$array."') ";
           
            $this->Master_model->master_delete('tracker_consultant_mapping', $where);
       
        echo true;
    }

    public function choose_questions($id = NULL)
    {

         $employer_id = $this->session->userdata('company_profile_id');
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
        $where_all = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' and test_status = '1'";
        if (isset($id)) {
            $this->load->view('fontend/employer/choose_questions',$data);
        }
        else
        {
             $this->load->view('fontend/employer/create_test',$data);
        }
       
    }
    public function show_test_details($test=Null)
    {
        $test_id = base64_decode($test);
        $this->session->unset_userdata('submenu');
        $this->session->unset_userdata('activesubmenu');
        $this->session->unset_userdata('activemenu');
        $data['activemenu'] = 'test_papers';
        $this->session->set_userdata($data);

        $sort_val = $this->input->post('sort_val');

        $employer_id = $this->session->userdata('company_profile_id');

        $where = "oceanchamp_tests.status='1' AND oceanchamp_tests.company_id='$employer_id' and test_id = '$test_id' GROUP by oceanchamp_tests.test_id";
  
       
        $join = array("topic" => "find_in_set(topic.topic_id, oceanchamp_tests.topics)");
        $data['ocean_tests'] = $this->Master_model->getMaster('oceanchamp_tests', $where = $where, $join , $order = 'desc', $field = 'oceanchamp_tests.test_id', $select = '*,group_concat(topic.topic_name) as topic_names', $limit = false, $start = false, $search = false);
            $where_cn = "status=1";
       
            $data['company_active_jobs'] = $this->job_posting_model->get_company_active_jobs($employer_id);
            // print_r($data['ocean_tests'][0]['test_status']);die;
            if ($data['ocean_tests'][0]['test_status'] == '3') {
                $this->load->view('fontend/employer/list_tests', $data);
            }
            else
            {
                  $data['submenu'] = '1';
                $this->session->set_userdata($data);
                  $this->load->view('fontend/employer/list_questions', $data);
            }
        
      
      
      
    }
public  function upload_folder()
 {
  $employer_id = $this->session->userdata('company_profile_id');
  $this->load->model('Questionbank_employer_model');
  if (isset($_POST['upload'])) 
  {
    if (!empty($_FILES['file']['name'])) 
    {
      $config['upload_path'] = 'cv_bank_excel/files/';
      $ext = strtolower(end(explode('.', $_FILES['file']['name'])));
      $config['allowed_types'] = 'csv';
      $config['max_size'] = '10000'; // max_size in kb
      $config['file_name'] = $_FILES['file']['name'];
      $this->load->library('upload', $config);
      if ($ext === 'csv') 
      {
        if ($this->upload->do_upload('file')) 
        {
          $uploadData = $this->upload->data();
          $filename = $uploadData['file_name'];
          $file = fopen("cv_bank_excel/files/" . $filename, "r");
          $i = 0;
          $importData_arr = array();
          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) 
          {
            $num = count($filedata);
            for ($c = 0;$c < $num;$c++) 
            {
             $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
           }
           fclose($file);
           $skip = 0;
           $cv = array();
           foreach ($importData_arr as $userdata) 
           {
             if ($skip != 0) 
             {
               $cv_id = $this->Questionbank_employer_model->InsertCVData($userdata);
               $company_name = $this->session->userdata('company_name');
               $data = array('company' => $company_name, 'action_taken_for' => $this->session->userdata('company_name'), 'field_changed' => 'Imported CVs', 'Action' => 'Imported Multiple CVs', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
               $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                  array_push($cv, $cv_id);
               }
                $skip++;
           }
            $this->session->set_flashdata('success', '<div class="alert alert-success text-center">CVs Uploaded successfully!</div>');
           redirect('employer/corporate_cv_bank');
          }
          else {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">CVs Upload failed!' . $error . '</div>');
           }
        }
         else {
           $this->session->set_flashdata('success', '<div class="alert alert-warning text-center">File Format not supported</div>');
          }
     }
     else
     {
      // print_r($_FILES);
      $count = 0;
       $company_id = $this->session->userdata('company_profile_id');
      $paths = $this->input->post('paths');
      $folder_path = explode(',', $paths);
      $uploadDir = 'cv_folder/';
      $this->load->library('excel');
            $objPHPExcel = new PHPExcel();
            $objPHPExcel->setActiveSheetIndex(0);
            $alpha = 'A';
           
            $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Name');
            $alpha++;
            $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'EmailID');
            $alpha++;
            $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Mobile No');
            $alpha++;
            
             $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'file name');
            $alpha++;
            $rowCount = 2;
            $m=0;
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           foreach ($_FILES['files']['name'] as $i => $name) 
           {
            $folders = explode('/', $folder_path[$i]);
              for ($k = 0;$k <= sizeof($folders);$k++) {
              $folder_name = $folders[$k];
              if ($folder_name == $_FILES['files']['name'][$i]) 
              {
               if (strlen($_FILES['files']['name'][$i]) > 1) 
               {
                if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $folder_path_final . '/' . $name)) 
                {
                 $count++;
                }
               }
              } else
              {
               if ($k > 0) 
               {
                $j =$k-1;
                $folder_struct = array();
                for ($n = 0;$n <= $j;$n++) 
                {
                  array_push($folder_struct, $folders[$n]);
                }
                 $names = implode('/', $folder_struct);
                
                if (!$n==$j) {
                 if(!is_readable('cv_folder/' . $names . '/' . $folder_name)) 
                     {
                     mkdir('cv_folder/' . $names . '/' . $folder_name, 0777, true);
                     }
                 }
               
                $folder_path_final = 'cv_folder/' . $names . '/' .$folder_name;
                $where_curr_folder = "cv_folder.folder_name = '$folder_name' and company_id = '$employer_id'";
                $curr_foldr = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_curr_folder, $join = FALSE);
                $previous_folder = $folders[$j];
                $where_folder = "cv_folder.folder_name = '$previous_folder' and company_id = '$employer_id'";
                $parent = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_folder, $join = FALSE);
                $parent_id = $parent['id'];
                $where_curr_folder = "cv_folder.folder_name = '$folder_name' and company_id = '$employer_id' and parent_id = '$parent_id'";
                $curr_foldr = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_curr_folder, $join = FALSE);
                 // print_r($parent);
                 // print_r($folder_name); die;
                if ($parent && empty($curr_foldr)) 
                {
                  $insert_folder_data['folder_name'] = $folder_name;
                  $insert_folder_data['company_id'] = $employer_id;
                  $insert_folder_data['parent_id'] = $parent['id'];
                  $insert_folder_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                 $insert_folder_data['created_by'] = $employer_id;
                 $result = $this->Master_model->master_insert($insert_folder_data, 'cv_folder');
                 }
               } else
                {
                if (!is_readable('cv_folder/' . $folder_name)) 
                {
                 mkdir('cv_folder/' . $folder_name, 0777, true);
                }
                $folder_path_final = 'cv_folder/' . $folder_name;
                $where_folder = "cv_folder.folder_name = '$folder_name' and company_id = '$employer_id'";
                $parent = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_folder, $join = FALSE);
                if (empty($parent)) 
                {
                 $insert_folder_data['folder_name'] = $folder_name;
                 $insert_folder_data['company_id'] = $employer_id;
                 $insert_folder_data['parent_id'] = '0';
                 $insert_folder_data['created_on'] = date('Y-m-d H:i:s', strtotime('+5 hours +30 minutes'));
                 $insert_folder_data['created_by'] = $employer_id;
                 $result = $this->Master_model->master_insert($insert_folder_data, 'cv_folder');
                }
               }
             }


            }
            $first_name = explode(" ", $name);
             $string = preg_replace('/\\.[^.\\s]{3,4}$/', '', $name);
            $ext = strtolower(end(explode('.',  $name)));
           $last_letter = substr($folder_path_final, -1);
           if ($last_letter == '/') {
               $filenams=rtrim($folder_path_final, "/");

           }
           else
           {
            $filenams=$folder_path_final;
           }
           if (strpos($filenams,$name) !== false)
           {
                // echo 'Car exists.';
            } else {
                // echo 'No cars.';
                $filenams = $filenams.'/'.$name;
            }
            // print_r($filenams);
if(file_exists($filenams))
{       
             // $docObj = new Doc2Txt($inputfile);
if ($ext == 'doc') {
    $fileHandle = fopen($filenams, "r");
    $line = @fread($fileHandle, filesize($filenams));   
    $lines = explode(chr(0x0D),$line);
    $outtext = "";
    foreach($lines as $thisline)
      {
        $pos = strpos($thisline, chr(0x00));
        if (($pos !== FALSE)||(strlen($thisline)==0))
          {
          } else {
            $outtext .= $thisline." ";
          }
      }
       $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
      
}
elseif ($ext == 'pdf')
{

 include 'system/vendor/autoload.php';
 
$parser = new \Smalot\PdfParser\Parser();
$pdf    = $parser->parseFile($filenams);


$outtext  = $pdf->getText();

}
}
// print_r($outtext);
// print_r($ext);
//   die;
    
     preg_match_all('/\b[0-9]{3}\s*[-]?\s*[0-9]{3}\s*[-]?\s*[0-9]{4}\b/',$outtext,$phone);
     preg_match_all('/[a-z0-9_\-\+\.]+@[a-z0-9\-]+\.([a-z]{2,4})(?:\.[a-z]{2})?/i',$outtext,$email);
// print_r($email[0][0]);
// print_r($phone[0][0]);die;
    $fname = $first_name[0];
     $pattern = "/^.*$fname.*\$/m";
     preg_match_all($pattern, $outtext, $name_matches);
     
            $fileName = 'data-' . $today . '.xlsx';
                $alpha = 'A';
               
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $string);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $email[0][0]);
                $alpha++;
                $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $phone[0][0]);
                $alpha++;
                 
                 $objPHPExcel->getActiveSheet()->SetCellValue($alpha . $rowCount, $name);
                $alpha++;
                 $rowCount++;
               
                
               
        // foreach ($skus as $element) {
        
           }
           $filename = "folder_data" . date("d-m-Y H:i:s") . ".csv";
        //
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
      $upname = 'cv_bank_excel/files/'.$filename;
     
        $objWriter->save($upname);
         // print_r($upname);die;
        $objWriter->save('php://output');
        // $ext = strtolower(end(explode('.', $filename)));
      // $config['allowed_types'] = 'csv';
      // $config['max_size'] = '10000'; // max_size in kb
      // $config['file_name'] = $filename;
      // $this->load->library('upload', $config);
      
        // if ($this->upload->do_upload('file')) 
        // {
        //   $uploadData = $this->upload->data();
        //   $filename = $uploadData['file_name'];
          $file = fopen( $upname, "r");
          $i = 0;
          $importData_arr = array();
          while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) 
          {
            $num = count($filedata);
            for ($c = 0;$c < $num;$c++) 
            {
             $importData_arr[$i][] = $filedata[$c];
            }
            $i++;
           }
           fclose($file);
           $skip = 0;
           $cv = array();
           foreach ($importData_arr as $userdata) 
           {
             if ($skip != 0) 
             {
               $cv_id = $this->Questionbank_employer_model->InsertCVData($userdata);
               $company_name = $this->session->userdata('company_name');
               $data = array('company' => $company_name, 'action_taken_for' => $this->session->userdata('company_name'), 'field_changed' => 'Imported CVs', 'Action' => 'Imported Multiple CVs', 'datetime' => date('Y-m-d H:i:s'), 'updated_by' => $company_name);
               $result = $this->Master_model->master_insert($data, 'employer_audit_record');
                  array_push($cv, $cv_id);
               }
                $skip++;
           }
           for ($k = 0;$k <= sizeof($folders);$k++) {
           foreach ($cv as $cvs) 
             {
              $where = "corporate_cv_bank.cv_id = '$cvs'";
              $cv_name = $this->Master_model->get_master_row('corporate_cv_bank', $select = 'js_name', $where, $join = FALSE);
              $js_name = explode(' ', $cv_name['js_name']);
              if (strpos($name, $js_name[0]) !== false) 
              {
               $where11['cv_id'] = $cvs;
               $path = $folder_path_final;
                // print_r($folders);
                // print_r($k);
                // print_r($path);
               $update_doc['js_document'] = $path;
               $this->Master_model->master_update($update_doc, 'corporate_cv_bank', $where11);
               $previous_folder = $folders[$k];
               $where_folder = "cv_folder.folder_name = '$previous_folder' and company_id = '$employer_id'";
               $parent = $this->Master_model->get_master_row('cv_folder', $select = 'id', $where = $where_folder, $join = FALSE);
               // print_r($this->db->last_query());die;
               $folder_id = $parent['id'];
               $whereres = "cv_folder_id='$folder_id' and cv_id = '$cvs' ";
               $folder_dbdata = $this->Master_model->get_master_row('cv_folder_relation', $select = FALSE, $whereres);
               if (empty($folder_dbdata) && !empty($folder_id)) 
               {
                 $cv_folder_data['cv_folder_id'] = $folder_id;
                 $cv_folder_data['cv_id'] =$cvs;
                 $cv_folder_data['status'] ='1';
                 $result = $this->Master_model->master_insert($cv_folder_data, 'cv_folder_relation');
               }
                // echo 'The specific word is present.';
                                            
              }
             }
         }
             $m++;
        //   } 
        //   else
        //   {
        //     echo "string";die;
        //   }
        
        } 
    }   
    }else
    {
     redirect('employer/corporate_cv_bank');
    }
 }
private function read_doc() {
    
    return $outtext;
}
public function convertToText() {

    if(isset($this->filename) && !file_exists($this->filename)) {
        return "File Not exists";
    }

    $fileArray = pathinfo($this->filename);
    $file_ext  = $fileArray['extension'];
    if($file_ext == "doc" || $file_ext == "docx")
    {
        if($file_ext == "doc") {
            return $this->read_doc();
        } else {
            return $this->read_docx();
        }
    } else {
        return "Invalid File Type";
    }
}
 public function track_tests()
 {
    $employer_id = $this->session->userdata('company_profile_id');
    $where = "oceanchamp_tests.company_id = '$employer_id'";
    $join =array("oceanchamp_tests"=>"oceanchamp_tests.test_id = js_test_report.test_id","js_info"=>"js_info.job_seeker_id=js_test_report.js_id");
    $data['all_test_details']= $this->Master_model->getMaster('js_test_report', $where , $join , $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);

    $this->load->view('fontend/employer/view_all_test_details',$data);
 }

 public function detail_reports()
 {
    $employer_id = $this->session->userdata('company_profile_id');
    $test_id  = $this->input->get('t');
    $js_id  = $this->input->get('j');
    $where = "oceanchamp_tests.company_id = '$employer_id' and js_test_report.test_id ='$test_id' and js_id = '$js_id'";
    $join =array("oceanchamp_tests"=>"oceanchamp_tests.test_id = js_test_report.test_id","js_info"=>"js_info.job_seeker_id=js_test_report.js_id");
    $all_test_details= $this->Master_model->get_master_row('js_test_report', $select = FALSE, $where , $join );

            $data['test_id'] = $test_id; 
            $data['employer_id']= $employer_id;
            $data['total_questions'] = $all_test_details['total_questions']; 
           
            
            $data['test_start_time'] = $all_test_details['test_start_time'];
            $data['test_end_time'] = $all_test_details['test_end_time'];
            $data['max_test_duration'] = $all_test_details['max_test_duration'];
            $data['time_taken'] =$all_test_details['time_taken'];
            $data['avg_time_per_question'] = $all_test_details['avg_time_per_question'];
            $data['total_attempted'] = $all_test_details['total_attempted'];
            $data['total_skipped'] = $all_test_details['total_skipped'];
            $data['correct_ans'] = $all_test_details['correct_ans'];
            $data['wrong_ans'] = $all_test_details['wrong_ans'];
            $data['review_led_right'] = $all_test_details['review_led_right'];
            $data['review_led_wrong'] = $all_test_details['review_led_wrong'];
            $data['review_didnt_matter'] =$all_test_details['review_didnt_matter'];
            $data['max_achievable_score'] =$all_test_details['max_achievable_score'];
            $data['final_score'] = $all_test_details['final_score'];
            $data['total_positive_score'] =$all_test_details['total_positive_score'];
            $data['total_negative_score'] = $all_test_details['total_negative_score'];
                
            $data['final_percentage'] = $all_test_details['final_percentage'];
            $this->load->view('fontend/employer/result_page', $data);
    // print_r($this->db->last_query());die;
 }

}
?>


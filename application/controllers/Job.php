<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job extends MY_Fontend_Controller
{
    public function index($offset = 0)
    {
   
        $all_category = $this->job_category_model->get();
        $all_locaiton = $this->job_location_model->get();
        $company_list = $this->company_profile_model->get();
        $jobtype_list = $this->job_nature_model->get();

        $selectedcategory = $this->input->post('category_name');
        $selectedlocation = $this->input->post('location_name');
        $selectedcompany  = $this->input->post('company_name');
        $selectednature   = $this->input->post('job_nature');
        $selectedcategory = is_null($selectedcategory) ? array() : $selectedcategory;
        $selectedlocation = is_null($selectedlocation) ? array() : $selectedlocation;
        $selectedcompany  = is_null($selectedcompany) ? array() : $selectedcompany;
        $selectednature   = is_null($selectednature) ? array() : $selectednature;
        //pagination for Job list
        $limit   = $this->config->item('postper_page');
        $alljobs = $this->job_posting_model->
            get_all_job($selectedcategory, $selectedlocation, $selectedcompany, $selectednature, $limit, $offset);
        $totalrow = $alljobs['total_row'];
        $alljobs  = $alljobs['result']; 
		$city = $this->Master_model->getMaster('city',$where=false);
		$country = $this->Master_model->getMaster('country',$where=false);
		$state = $this->Master_model->getMaster('state',$where=false);

        $this->load->view('fontend/job/all_jobbackup', compact('category', 'joblevel', 'totalrow', 'offset', 'limit', 'alljobs', 'all_category', 'all_locaiton', 'company_list', 'jobtype_list', 'selectedcategory', 'selectedlocation', 'selectedcompany', 'selectednature', 'country', 'state', 'city'));

    }

    public function page($offset = 0)
    {
        $this->index($offset);
    }

    public function category_and_level_job($category, $joblevel, $offset = 0)
    {

        if (!empty($category) && !empty($joblevel)) {

            $all_category = $this->job_category_model->get();
            $all_locaiton = $this->job_location_model->get();
            $company_list = $this->company_profile_model->get();
            $jobtype_list = $this->job_nature_model->get();

            $selectedcategory = $this->input->post('category_name');
            $selectedlocation = $this->input->post('location_name');
            $selectedcompany  = $this->input->post('company_name');
            $selectednature   = $this->input->post('job_nature');
            $selectedcategory = is_null($selectedcategory) ? array() : $selectedcategory;
            $selectedlocation = is_null($selectedlocation) ? array() : $selectedlocation;
            $selectedcompany  = is_null($selectedcompany) ? array() : $selectedcompany;
            $selectednature   = is_null($selectednature) ? array() : $selectednature;
            $limit            = $this->config->item('postper_page');
            $alljobs          = $this->job_posting_model->getJob_by_categoryandlevel($category, $joblevel, $limit, $offset);
            $totalrow         = $alljobs['total_row'];
          $this->load->view('fontend/job/levelandcatjob', compact('category', 'joblevel', 'totalrow', 'offset', 'limit', 'alljobs', 'all_category', 'all_locaiton', 'company_list', 'jobtype_list', 'selectedcategory', 'selectedlocation', 'selectedcompany', 'selectednature'));

        } else {
            echo "not found";
        }
    }

    public function get_job_types_job($job_types, $offset = 0)
    {

        if (!empty($job_types)) {

            $all_category = $this->job_category_model->get();
            $all_locaiton = $this->job_location_model->get();
            $company_list = $this->company_profile_model->get();
            $jobtype_list = $this->job_nature_model->get();

            $selectedcategory = $this->input->post('category_name');
            $selectedlocation = $this->input->post('location_name');
            $selectedcompany  = $this->input->post('company_name');
            $selectednature   = $this->input->post('job_nature');
            $selectedcategory = is_null($selectedcategory) ? array() : $selectedcategory;
            $selectedlocation = is_null($selectedlocation) ? array() : $selectedlocation;
            $selectedcompany  = is_null($selectedcompany) ? array() : $selectedcompany;
            $selectednature   = is_null($selectednature) ? array() : $selectednature;
            $limit            = $this->config->item('postper_page');
            $alljobs          = $this->job_posting_model->get_job_by_job_type($job_types, $limit, $offset);
            $totalrow         = $alljobs['total_row'];
            $this->load->view('fontend/job/job_types', compact('job_types', 'joblevel', 'totalrow', 'offset', 'limit', 'alljobs', 'all_category', 'all_locaiton', 'company_list', 'jobtype_list', 'selectedcategory', 'selectedlocation', 'selectedcompany', 'selectednature'));

        } else {
            echo "not found";
        }
    }

    public function show($slug = null)
    {
    
        if (!empty($slug) && ($this->job_posting_model->check_slug($slug) == true)) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $job_id       = $this->job_posting_model->get_job_id_by_job_slug($slug);
            $radom_jobs       = $this->job_posting_model->get_random_jobs();

          $employer_id = $this->session->userdata('company_profile_id');
          $company_id = $this->session->userdata('company_id');

           if(!empty($employer_id) || !empty($company_id) ){
                $singlejob    = $this->job_posting_model->get_job_details_employer($job_id);
            }
            else{ 
                $singlejob    = $this->job_posting_model->get_job_details($job_id);
                $totalview=$singlejob->search_view+1;
                $this->job_posting_model->update_Searchview($job_id,$totalview);

                $where_apply = "job_apply.job_seeker_id='$jobseeker_id' AND job_apply.job_post_id='$job_id'";
                $select_status ="job_apply.forword_job_status,job_apply.job_apply_id";
                $forward_status = $this->Master_model->getMaster('job_apply',$where_apply, $join=false, $order = false, $field = false, $select_status,$limit=false,$start=false, $search=false);
           }

       //  print_r($singlejob);

            $this->load->view('fontend/job/job_details.php', compact('singlejob', 'jobseeker_id','radom_jobs','forward_status'));
        } else {
            echo "Not Found";
        }

    }


    public function jobapply($slug = null)
    {
        if (!empty($slug) && ($this->job_posting_model->check_slug($slug) == true)) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $job_id       = $this->job_posting_model->get_job_id_by_job_slug($slug);
            $singlejob    = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/job/jobapply.php', compact('singlejob', 'jobseeker_id'));
        } else {
            echo "Not Found";
        }

    }

    public function apply_job()
    {
        if ($_POST) {
            $jobseeker_id = $this->input->post('job_seeker_id');
            $company_id   = $this->input->post('company_id');
            $job_post_id  = $this->input->post('job_post_id');
            $forward_status  = $this->input->post('forward_status');
            $job_apply_id  = $this->input->post('job_apply_id');
           
        
            if($forward_status==1)
            {
                // To update job status
                $data_status=array( 
                 'forword_job_status' => 2,
                  'expected_salary' => $this->input->post('expected_salary'),
                );
                $where_update1['job_apply_id'] = $job_apply_id;
                $this->Master_model->master_update($data_status, 'job_apply', $where_update1);

                $wherejob = "job_post_id='$job_post_id' AND company_profile_id='$company_id'";
                $select_test = "is_test_required,job_post_id,company_profile_id";
              
                $data['job_test'] = $this->Master_model->getMaster('job_posting',$wherejob,$join = FALSE, $order = false, $field = false, $select_test,$limit=false,$start=false, $search=false);
                    
                $this->load->view('fontend/applysucess',$data);

                // $this->load->view('fontend/applysucess');
                   
            }else{

                    $apply_info   = array(
                        'job_seeker_id'   => $jobseeker_id,
                        'company_id'      => $company_id,
                        'job_post_id'     => $job_post_id,
                        'expected_salary' => $this->input->post('expected_salary'),
                    );

                    if ($this->job_apply_model->check_apply_job($jobseeker_id, $company_id, $job_post_id)) {
                       
                        $this->load->view('fontend/alreadyapply');
                    } else {
                        $this->job_apply_model->insert($apply_info);

                        $wherejob = "job_post_id='$job_post_id' AND company_profile_id='$company_id'";
                        $select_test = "is_test_required,job_post_id,company_profile_id";
                      
                        $data['job_test'] = $this->Master_model->getMaster('job_posting',$wherejob,$join = FALSE, $order = false, $field = false, $select_test,$limit=false,$start=false, $search=false);
                            
                        $this->load->view('fontend/applysucess',$data);
                    }
            }
            
        } else {
            redirect('job');
        }
    }

    
    public function save_my_job($slug = null)
    {
        if (!empty($slug) && ($this->job_posting_model->check_slug($slug) == true)) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $job_id       = $this->job_posting_model->get_job_id_by_job_slug($slug);
            $singlejob    = $this->job_posting_model->get($job_id);

          $sv_info = array(
                    'job_seeker_id'   => $jobseeker_id,
                    'job_post_id'     => $job_id,
                    'created_on'      => date('Y-m-d H:i:s'),
                    'created_by'      => $jobseeker_id,
                );
            $this->Master_model->master_insert($sv_info,'js_saved_jobs');
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Job saved successfully!</div>');
            redirect('job/show/'.$slug);
        } else {
             $this->session->set_flashdata('msg', '<div class="alert alert-warning text-center">This job is already saved by you!</div>');
             redirect('job/show/'.$slug);
        }

    }
// 
    public function save_this_job($slug = null)
    {
        if (!empty($slug) && ($this->job_posting_model->check_slug($slug) == true)) {
            $jobseeker_id = $this->session->userdata('job_seeker_id');
            $job_id       = $this->job_posting_model->get_job_id_by_job_slug($slug);
            $singlejob    = $this->job_posting_model->get($job_id);
            $this->load->view('fontend/job/job_save.php', compact('singlejob', 'jobseeker_id'));
        } else {
            echo "Not Found";
        }

    }
    public function application($postid = null, $company_id = null)
    {
        $postid     = $postid;
        $company_id = $company_id;
        if ($postid == null || $company_id == null) {
            echo "not found";
        } else {
            $applicaitons = $this->job_apply_model->show_apply_user($postid, $company_id);
            $this->load->view('fontend/employer/job_application_details', compact('applicaitons'));
        }
    }

    public function test()
    {
        $this->load->view('fontend/job/all_jobtest.php');
    }
    public function teste()
    {
        $this->load->view('fontend/job/teste.php');
    }

    public function all_exam_result($job_id = null)
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');
        if (!empty($job_id) && $this->job_posting_model->check_jobid_and_js_id($job_id, $jobseeker_id) == true) {
                
            $data['job_id'] = $job_id;
            
            $where_test = "js_test_info.job_id='$job_id' AND js_test_info.js_id='$jobseeker_id'";
            $join_arr = array(
                'js_info' => 'js_info.job_seeker_id=js_test_info.js_id |INNER',
            );
            $select_result = "js_test_info.marks,js_test_info.test_id,js_test_info.js_id, js_info.full_name";
            $data['exam_attended_candidates']= $this->Master_model->getList($condition, $field_by, $order_by, $offset, $perpage, 'js_test_info', $search, $join_arr, $where_test, $select_result, $distinct = FALSE, $group_by = 'js_id');
            //echo $this->db->last_query(); die;

            $this->load->view('fontend/exam/seeker_result_details',$data);
        } else {
            echo "not found";  
        }
    }

    public function all_interview_list($job_id = null)
    {
        $jobseeker_id = $this->session->userdata('job_seeker_id');

        $where_chlk = "job_seeker_id='$jobseeker_id' AND job_post_id='$job_id'";
        $check_res = $this->Master_model->get_master_row('interview_scheduler', $select = FALSE, $where_chlk, $join = FALSE);

         // echo $this->db->last_query(); die;
        if ($check_res == true) {
                
            $data['job_id'] = $job_id;
            
            $where_int = "interview_scheduler.job_post_id='$job_id' AND interview_scheduler.job_seeker_id='$jobseeker_id'";
            $data['interview_details'] = $this->Master_model->getMaster('interview_scheduler',$where_int, $join_arr=false, $order = false, $field = false, $select_int=false, $limit=false,$start=false, $search=false);

            $where_edu="job_seeker_id='$jobseeker_id'";
            $select_edu = "full_name,email";
            $data['js_data'] = $this->Master_model->get_master_row("js_info", $select_edu, $where_edu, $join = FALSE);
            // echo $this->db->last_query(); die;

            $this->load->view('fontend/jobseeker/seeker_interview_details',$data);
        } else {
            $data['job_id'] = $job_id;
            
            $where_int = "interview_scheduler.job_post_id='$job_id' AND interview_scheduler.job_seeker_id='$jobseeker_id'";
            $data['interview_details'] = $this->Master_model->getMaster('interview_scheduler',$where_int, $join_arr=false, $order = false, $field = false, $select_int=false, $limit=false,$start=false, $search=false);

            $where_edu="job_seeker_id='$jobseeker_id'";
            $select_edu = "full_name,email";
            $data['js_data'] = $this->Master_model->get_master_row("js_info", $select_edu, $where_edu, $join = FALSE);
            // echo $this->db->last_query(); die;

            $this->load->view('fontend/jobseeker/seeker_interview_details',$data);
        }
    }

    function get_keyword_suggesions(){
        if (isset($_GET['term'])) {

            $result = $this->job_posting_model->search_job_keywords($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->job_title;
                echo json_encode($arr_result);
            }
        }
    }



}

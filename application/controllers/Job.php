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

           if(!empty($employer_id)){

            $singlejob    = $this->job_posting_model->get_job_details_employer($job_id);}
            else{  $singlejob    = $this->job_posting_model->get_job_details($job_id);
            $totalview=$singlejob->search_view+1;
            $this->job_posting_model->update_Searchview($job_id,$totalview);

           }

       //  print_r($singlejob);

                        $this->load->view('fontend/job/job_details.php', compact('singlejob', 'jobseeker_id','radom_jobs'));
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
                $this->load->view('fontend/applysucess');
            }
        } else {
            redirect('job');
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

}

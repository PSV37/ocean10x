<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_posting extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'job_slugs',
            'table' => 'job_posting',
        );
        $this->load->library('slug', $config);
    }

    /*** Dashboard ***/

    public function index()
    {
        $data['title'] = "Create New Job";

        $where_cnty = "status=1";
        $data['country'] = $this->Master_model->getMaster('country',$where_cnty);
       
        $where_cn= "status=1";
        $select = "job_role_title, skill_set ,id";
        $data['job_role_data'] = $this->Master_model->getMaster('job_role',$where_cn,$join = FALSE, $order = false, $field = false, $select,$limit=false,$start=false, $search=false);

        $where_sk= "status=1";
        $select_sk = "skill_name ,id";
        $data['skills_data'] = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=false,$start=false, $search=false);

        $this->load->view('admin/jobsetting/createjob', $data);
    }

    public function save_job($id = null)
    {
        $job_info = array(
            'job_title'          => $this->input->post('job_title'),
            'company_profile_id' => $this->input->post('company_profile_id'),
            'job_desc'           => $this->input->post('job_desc'),
            'education'          => $this->input->post('education'),
            'benefits'           => $this->input->post('benefits'),
            'experience'         => $this->input->post('experience'),
            'no_jobs'            => $this->input->post('no_jobs'),

            'job_edu'            => $this->input->post('job_edu'),
            'edu_specialization' => $this->input->post('job_edu_special'),   //new added field

            'job_category'       => $this->input->post('job_category'),
           
            'job_location'       => $this->input->post('country_id'),
            'state_id'           => $this->input->post('state_id'),
            'city_id'            => $this->input->post('city_id'),

            'job_nature'         => $this->input->post('job_nature'),
            'job_slugs'          => $this->slug->create_uri($this->input->post('job_title')),
            'job_status'         => $this->input->post('job_status'),
            'job_types'          => $this->input->post('job_types'),
            'job_level'          => $this->input->post('job_level'),
            'salary_range'       => $this->input->post('salary_range'),
            "job_deadline"       => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('job_deadline')))),
            'preferred_age'      => $this->input->post('preferred_age'),
            'working_hours'      => $this->input->post('working_hours'),
        );
        // var_dump($job_info);
        //  exit();
        if (empty($id)) {
            $this->job_posting_model->insert($job_info);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Job Sucessfully Posting</div>');
            redirect('admin/job_posting');
        } else {
            $this->job_posting_model->update($job_info, $id);
            $this->session->set_flashdata('msg', '<div class="alert alert-success text-center"> Sucessfully Update</div>');
            redirect_back();
        }
    }

    public function edit_jobs($id)
    {
        $title    = "Jobs Edit";
        $job_info = $this->job_posting_model->get($id);
        $this->load->view('admin/jobsetting/createjob', compact('job_info', 'title'));
    }

    function getstate(){
        $country_id = $this->input->post('id');
        $where['country_id'] = $country_id;
        $states = $this->Master_model->getMaster('state',$where);
        $result = '';
        if(!empty($states)){ 
            $result .='<option value="">Select State</option>';
            foreach($states as $st_row){
              $result .='<option value="'.$st_row['state_id'].'">'.$st_row['state_name'].'</option>';
            }
        }else{
            $result .='<option value="">States Not Found</option>';
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
            foreach($citys as $city_row){
              $result .='<option value="'.$city_row['id'].'">'.$city_row['city_name'].'</option>';
            }
        }else{
            $result .='<option value="">Cities Not Found</option>';
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
    

    // To fetch getProfssionalSkillsDetails details
function getSkillsByRole() {
    $id=$this->input->post('role_id');
    $whereres = "id='$id'";
    $role_data= $this->Master_model->get_master_row('job_role',$select = FALSE,$whereres);

    $sk = $data['skill_set'];
   // explode(',', string)
    $where_sk= "id IN ($sk) AND status=1";
    $select_sk = "skill_name ,id";
    $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=false,$start=false, $search=false);
       echo $this->db->last_query();
        $result = '';
        if(!empty($skills)){ 
            //$result .='<option value="">Select Specilazation</option>';
            foreach($skills as $skill_row){
              $result .="<input type='checkbox' name='skill_set[]' id='skill_set' value='<?php echo $skill_row['id'];?>'> <?php echo $skill_row['skill_name'];?>";
            }
        }else{
            $result .='Skills Not Found ';
        }
         echo $result;                                 
    die;

    echo json_encode($data); 
} 



} // end class

<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_Posting_Model extends MY_Model
{

    protected $_table_name  = 'job_posting';
    protected $_primary_key = 'job_post_id';
    protected $_order_by    = "job_post_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function check_slug($job_slugs)
    {
        $this->db->select("*");
        $this->db->where('job_slugs', $job_slugs);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function count_all_job()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_status', "1");
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
	
	
	public function get_random_jobssssssssss()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_status', "1");
         $this->db->order_by('job_post_id', 'RANDOM');
    	$this->db->limit(3);
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
    
    
    public function recent_all_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_status', "1")->order_by($this->_order_by);
        $this->db->limit(5);
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function recent_all_jobs2()
    {
        $query = $this->db->query("select t1.*, t2.company_name, t2.company_logo, t2.company_slug,t3.job_location_name, t4.job_nature_name
from job_posting t1
left join company_profile t2 on t1.company_profile_id=t2.company_profile_id
inner join job_location t3 on t3.job_location_id=t1.job_location
inner join job_nature t4 on t1.job_nature=t4.job_nature_id 
where job_status=1
order by job_post_id desc limit 10");
  	
        return $query->result();
    }
    
    public function get_random_jobs()
    {
        $query = $this->db->query("select t1.*, t2.company_name, t2.company_logo, t2.company_slug,t3.country_name, t4.job_nature_name
from job_posting t1
inner join company_profile t2 on t1.company_profile_id=t2.company_profile_id
left join country t3 on t3.country_id=t1.job_location
inner join job_nature t4 on t1.job_nature=t4.job_nature_id 
where job_status=1
order by RAND() limit 3");
  	
        return $query->result();
    }
    
    
     public function get_job_details($jobid)
    {
        $query = $this->db->query("select t1.*, t2.company_name, t2.company_logo, t2.company_slug, t4.job_nature_name, t5.job_category_name, t6.job_level_name, t7.job_types_name, t8.education_level_name,t11.education_specialization
            from job_posting t1
            left join company_profile t2 on t1.company_profile_id=t2.company_profile_id
            left join job_nature t4 on t1.job_nature=t4.job_nature_id 
            left join job_category t5 on t1.job_category=t5.job_category_id
            left join job_level t6 on t1.job_level=t6.job_level_id
            left join job_types t7 on t1.job_types=t7.job_types_id
            left join education_level t8 on t1.job_edu=t8.education_level_id
            left join education_specialization t11 on t1.edu_specialization=t11.id
            where job_status=1
            AND t1.job_post_id='$jobid'");
  	
        return $query->row();
    }

      public function get_all_msges($js_id,$employer_id)
    {
        $query = $this->db->query("select m1.*, m2.*
from messaging m1,messaging m2

where (msg_from='$employer_id' or msg_to = '$employer_id') and (msg_from='$js_id' or msg_to = '$js_id' )
order by created_date asc limit 10");
    
        return $query->result();
    }
    
//Old Function
// public function get_job_details_employer($jobid)
//     {
//        $query = $this->db->query("select t1.*, t2.company_name, t2.company_logo, t2.company_slug,t3.country_name, t4.job_nature_name, t5.job_category_name, t6.job_level_name, t7.job_types_name, t8.education_level_name
//             from job_posting t1
//             left join company_profile t2 on t1.company_profile_id=t2.company_profile_id
//             left join country t3 on t3.country_id=t1.job_location
//             left join job_nature t4 on t1.job_nature=t4.job_nature_id 
//             left join job_category t5 on t1.job_category=t5.job_category_id
//             left join job_level t6 on t1.job_level=t6.job_level_id
//             left join job_types t7 on t1.job_types=t7.job_types_id
//             left join education_level t8 on t1.job_edu=t8.education_level_id
//             where  t1.job_post_id='$jobid'");
    
//         return $query->row();
//     }

 public function get_job_details_employer($jobid)
    {
       $query = $this->db->query("select t1.*, t2.company_name, t2.company_logo, t2.company_slug, t4.job_nature_name, t5.job_category_name, t6.job_level_name, t7.job_types_name, t8.education_level_name,t11.education_specialization
            from job_posting t1
            left join company_profile t2 on t1.company_profile_id=t2.company_profile_id
           
            left join job_nature t4 on t1.job_nature=t4.job_nature_id 
            left join job_category t5 on t1.job_category=t5.job_category_id
            left join job_level t6 on t1.job_level=t6.job_level_id
            left join job_types t7 on t1.job_types=t7.job_types_id
            left join education_level t8 on t1.job_edu=t8.education_level_id
            left join education_specialization t11 on t1.edu_specialization=t11.id
            where job_status=1
            AND t1.job_post_id='$jobid'");
  	
        return $query->row();
    }

    public function get_company_all_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_company_jobs_count($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function company_active_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status', "1");
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function company_deactive_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status', "2");
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function company_pending_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status', "0");
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function get_company_active_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status',"1")->order_by($this->_order_by);
        $this->db->join('job_nature','job_nature.job_nature_id=job_posting.job_nature');
        $this->db->join('job_category','job_category.job_category_id=job_posting.job_category');
        // $this->db->join('education_specialization','education_specialization.id=job_posting.edu_specialization');
        $this->db->join('job_role','job_role.id=job_posting.job_role');
        $this->db->join('education_level','education_level.education_level_id=job_posting.job_edu');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_company_deleted_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status',"2")->order_by($this->_order_by);
        $this->db->join('job_nature','job_nature.job_nature_id=job_posting.job_nature');
        $this->db->join('job_category','job_category.job_category_id=job_posting.job_category');
        // $this->db->join('education_specialization','education_specialization.id=job_posting.edu_specialization');
        $this->db->join('job_role','job_role.id=job_posting.job_role');
        $this->db->join('education_level','education_level.education_level_id=job_posting.job_edu');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }


    public function get_company_activedeasline_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_deadline >', date('Y-m-d'));
        $this->db->where('job_status',"1")->order_by($this->_order_by);
        $this->db->join('job_nature','job_nature.job_nature_id=job_posting.job_nature');
        $this->db->join('job_category','job_category.job_category_id=job_posting.job_category');
        // $this->db->join('education_specialization','education_specialization.id=job_posting.edu_specialization');
        $this->db->join('job_role','job_role.id=job_posting.job_role');
        $this->db->join('education_level','education_level.education_level_id=job_posting.job_edu');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

     public function get_company_expired_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_deadline <', date('Y-m-d'));
        $this->db->where('job_status',"1")->order_by($this->_order_by);
        $this->db->join('job_nature','job_nature.job_nature_id=job_posting.job_nature');
        $this->db->join('job_category','job_category.job_category_id=job_posting.job_category');
        // $this->db->join('education_specialization','education_specialization.id=job_posting.edu_specialization');
        $this->db->join('job_role','job_role.id=job_posting.job_role');
        $this->db->join('education_level','education_level.education_level_id=job_posting.job_edu');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

    public function open_positions_active_jobs($company_id)
    {
        $current_date=date('Y-m-d');
        $this->db->select_SUM('no_jobs');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_deadline >=' ,$current_date);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_shared_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('tracker_consultant_mapping');
        $this->db->where('consultant_id', $company_id);
        $this->db->where('job_status',"1");
        $this->db->order_by('job_posting.job_post_id','desc');
         $this->db->join('external_tracker','external_tracker.id=tracker_consultant_mapping.tracking_id','left');
        $this->db->join('job_posting','job_posting.job_post_id=external_tracker.job_post_id');
        $this->db->join('job_nature','job_nature.job_nature_id=job_posting.job_nature');
        $this->db->join('job_category','job_category.job_category_id=job_posting.job_category');
        // $this->db->join('education_specialization','education_specialization.id=job_posting.edu_specialization');
        $this->db->join('job_role','job_role.id=job_posting.job_role');
        $this->db->join('education_level','education_level.education_level_id=job_posting.job_edu');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_job_forwarded_candidate($job_id)
    {
        $this->db->select('DATE_FORMAT(forwarded_jobs_cv.created_on,"%y-%m-%d")as datecreation');
        $this->db->from('forwarded_jobs_cv');
        $this->db->where('forwarded_jobs_cv.job_post_id', $job_id);
       
        $this->db->order_by('datecreation','desc');
        $this->db->group_by('datecreation');
       
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_external_tracker($job_id)
    {
        $this->db->select('DATE_FORMAT(external_tracker.created_on,"%y-%m-%d")as datecreation');
        $this->db->from('external_tracker');
        $this->db->where('external_tracker.job_post_id', $job_id);
       
        $this->db->order_by('datecreation','desc');
        $this->db->group_by('datecreation');
       
        $query = $this->db->get()->result();
        return $query;
    }

     public function get_shared_tracker($job_id)
    {
        $employer_id = $this->session->userdata('company_profile_id');
        $this->db->select('DATE_FORMAT(external_tracker.created_on,"%y-%m-%d")as datecreation');
        $this->db->from('tracker_consultant_mapping');
        $this->db->where('external_tracker.job_post_id', $job_id);
        $this->db->where('tracker_consultant_mapping.consultant_id', $employer_id);
        $this->db->join('external_tracker','external_tracker.id=tracker_consultant_mapping.tracking_id','left');
        $this->db->order_by('datecreation','desc');
        $this->db->group_by('datecreation');
       
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_job_forwarded_candidate_by_date($job_id,$date)
    {
        $this->db->select('forwarded_jobs_cv.*,corporate_cv_bank.*,education_level.*,DATE_FORMAT(forwarded_jobs_cv.created_on,"%Y-%m-%d")as datecreation ,DATE_FORMAT(forwarded_jobs_cv.updated_on,"%Y-%m-%d")as updated_on');
        $this->db->from('forwarded_jobs_cv');
        $this->db->where('forwarded_jobs_cv.job_post_id', $job_id);
        $this->db->where('DATE_FORMAT(forwarded_jobs_cv.created_on,"%y-%m-%d")',$date);
        $this->db->join('corporate_cv_bank','corporate_cv_bank.cv_id=forwarded_jobs_cv.cv_id','LEFT OUTER');
        
        $this->db->join('education_level','education_level.education_level_id=corporate_cv_bank.js_top_education','LEFT OUTER');
        $this->db->join('tracker_status_master','tracker_status_master.status_id=forwarded_jobs_cv.tracking_status','LEFT OUTER');
        $this->db->order_by('forwarded_jobs_cv.id','desc');
        // $this->db->group_by('job_apply.job_seeker_id');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

     public function get_external_tracker_date($job_id,$date)
    {
        $this->db->select('external_tracker.*,education_level.*,DATE_FORMAT(external_tracker.created_on,"%y-%m-%d")as datecreation');
        $this->db->from('external_tracker');
        $this->db->where('external_tracker.job_post_id', $job_id);
        $this->db->where('DATE_FORMAT(external_tracker.created_on,"%y-%m-%d")',$date);
      
        
        $this->db->join('education_level','education_level.education_level_id=external_tracker.education','LEFT OUTER');
        $this->db->join('tracker_status_master','tracker_status_master.status_id=external_tracker.tracking_status','LEFT OUTER');
        $this->db->order_by('external_tracker.id','desc');
        // $this->db->group_by('job_apply.job_seeker_id');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_shared_tracker_date($job_id,$date)
    {
         $employer_id = $this->session->userdata('company_profile_id');
        $this->db->select('external_tracker.*,education_level.*,DATE_FORMAT(external_tracker.created_on,"%y-%m-%d")as datecreation');
        $this->db->from('tracker_consultant_mapping');
        $this->db->where('external_tracker.job_post_id', $job_id);
        $this->db->where('DATE_FORMAT(external_tracker.created_on,"%y-%m-%d")',$date);
         $this->db->where('tracker_consultant_mapping.consultant_id', $employer_id);
      
         $this->db->join('external_tracker','external_tracker.id=tracker_consultant_mapping.tracking_id','LEFT OUTER');
        $this->db->join('education_level','education_level.education_level_id=external_tracker.education','LEFT OUTER');
        $this->db->join('tracker_status_master','tracker_status_master.status_id=external_tracker.tracking_status','LEFT OUTER');
        $this->db->order_by('external_tracker.id','desc');
        // $this->db->group_by('job_apply.job_seeker_id');
       
        // $job_types = array('1', '3', '4','5','6');
        // $this->db->where_in('job_types',$job_types);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_company_deactive_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status', "2");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_company_pending_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_status', "0");
        $query = $this->db->get()->result();
        return $query;

    }

    public function get_pending_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_status', "0");
        $this->db->order_by($this->_order_by);
        $query = $this->db->get()->result();
        return $query;

    }

    public function get_company_selected_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "2");
        $query = $this->db->get()->result();
        return $query;

    }

    public function count_selected_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "2");
        $this->db->where('job_status', "1");
        $query  = $this->db->get();
        $result = $query->num_rows();
        return $result;

    }

    public function count_nonselected_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "1");
        $this->db->where('job_status', "1");
        $query  = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function count_internship_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "3");
        $this->db->where('job_status', "1");
        $query  = $this->db->get();
        $result = $query->num_rows();
        return $result;
    }

    public function count_company_selected_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "2");
        $query  = $this->db->get();
        $result = $query->num_rows();
        return $result;

    }

    public function count_company_nonselected_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "1");
        $query  = $this->db->get();
        $result = $query->num_rows();
        return $result;

    }

    public function get_active_selected_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "2");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;
    }

        public function get_active_banks_book()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "5");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;
    }


        public function get_active_university_job()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "3");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;
    }

          public function get_active_training()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "4");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;
    }


    public function get_active_selected_jobs_limit()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "2");
        $this->db->where('job_status', "1");
        $this->db->order_by($this->_order_by);
        $this->db->limit(20);
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_deactive_selected_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "2");
        $this->db->where('job_status', "2");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_activenonselected_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "1");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_deactivenonselected_jobs()
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('job_types', "1");
        $this->db->where('job_status', "2");
        $query = $this->db->get()->result();
        return $query;
    }

    public function get_company_non_selected_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "1");
        $query = $this->db->get()->result();
        return $query;

    }

    public function get_all_selected_jobs()
    {
        $this->db->select('company_profile_id');
        $this->db->from('job_posting');
        $this->db->where('job_status', "1");
        $this->db->where('job_types', "2");
        $results      = $this->db->get()->result();
        $selected_job = array();
        foreach ($results as $result) {
            $job                       = array();
            $job['company_profile_id'] = $result->company_profile_id;
            $job['job_post_id']        = $result->company_profile_id;
            $job['selected_job_list']  = $this->get_company_selected_jobs($result->company_profile_id);
            array_push($selected_job, $job);
        }
        return $selected_job;
    }

    public function job_title_by_name($id)
    {
        $this->db->select("job_title");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return isset($result[0]->job_title) ? $result[0]->job_title : '';
    }

    public function job_salary_by_id($id)
    {
        $this->db->select("salary_range");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return isset($result[0]->job_title) ? $result[0]->job_title : '';
    }

    public function job_deadline($id)
    {
        $this->db->select("job_deadline");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return isset($result[0]->job_deadline) ? $result[0]->job_deadline : '';
    }

    public function get_job_id_by_job_slug($slug)
    {
        $this->db->select('job_post_id');
        $this->db->where('job_slugs', $slug);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->job_post_id;
    }

    public function get_slug_nameby_id($id)
    {
        $this->db->select('job_slugs');
        $this->db->where('job_post_id', $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->job_slugs;
    }

    public function getJob_by_categoryandlevel($categoryId, $levelId, $limit, $offset = 0)
    {
        $data = array();
        $this->db->select('*');
        $this->db->where('job_category', $categoryId);
        $_thisdb           = clone $this->db->where('job_level', $levelId);
        $query             = $this->db->get($this->_table_name);
        $data['total_row'] = $query->num_rows();
        $_thisdb->limit($limit, $offset);
        $query = $_thisdb->get($this->_table_name);
        if ($query->num_rows() > 0) {
            $data['result'] = $query->result();
            return $data;
        }
        return false;
    }

      public function get_job_jobseeker($categoryId, $levelId, $date)
    {
        $data = array();
        $this->db->select('*');
        // $this->db->where('job_category', $categoryId);
        // $this->db->where('DATE_FORMAT(created_at, '%Y-%m-%d')',$date);
        $_thisdb           = clone $this->db->where('job_category', $categoryId);
        $query             = $this->db->get($this->_table_name);
        $data['total_row'] = $query->num_rows();
        // $_thisdb->limit($limit, $offset);
        $query = $_thisdb->get($this->_table_name);
        if ($query->num_rows() > 0) {
            $data['result'] = $query->result();
            return $data;
        }
        return false;
    }

    public function get_job_by_job_type($job_types, $limit, $offset = 0)
    {
        $data = array();
        $this->db->select('*');
        $_thisdb           = clone $this->db->where('job_types', $job_types);
        $query             = $this->db->get($this->_table_name);
        $data['total_row'] = $query->num_rows();
        $_thisdb->limit($limit, $offset);
        $query = $_thisdb->get($this->_table_name);
        if ($query->num_rows() > 0) {
            $data['result'] = $query->result();
            return $data;
        }
        return false;
    }

    public function get_all_job($category, $location, $company, $nature, $limit, $offset)
    {
        $data      = array();
        $query_str = "SELECT * FROM job_posting";
        //
        $condation = " WHERE ";

        $query_str .= $condation . "job_status=1";
        $condation = " AND ";
        if (!empty($category) && is_array($category)) {
            $query_str .= $condation . "job_category IN (" . implode(",", $category) . ")";
            $condation = " AND ";
        }



        if (!empty(array_filter($location))) { 
            $query_str .= $condation . "job_location IN (" . implode(",", $location) . ")";
            $condation = " AND ";
        }

        if (!empty($company) && is_array($company)) {
            $query_str .= $condation . "company_profile_id IN (" . implode(",", $company) . ")";
            $condation = " AND ";
        }

        if (!empty($nature) && is_array($nature)) {
            $query_str .= $condation . "job_nature IN (" . implode(",", $nature) . ")";
            $condation = " AND ";
        }

        if (!empty($this->input->post('keyword'))) {
            //$query_str .= $condation . "(MATCH(`job_title`) AGAINST ('" . $this->input->post('keyword') . "') OR MATCH(job_tags) AGAINST ('" . $this->input->post('keyword') . "'))";
            $query_str .= $condation . " (job_title LIKE '%" . $this->input->post('keyword') . "%') OR (job_tags LIKE '%" . $this->input->post('keyword') . "%')";
        }
        $query_str.=" ORDER BY job_post_id DESC";
        //$query = $this->db->query($query_str);
        //$data['total_row'] = $query->num_rows();
        //$query_str .= " LIMIT " . $limit . " OFFSET " . $offset;
        $query = $this->db->query($query_str);
        if ($query->num_rows() > 0) {
            $data['result'] = $query->result();
            return $data;
        }
        return false;

    }

    public function row_count()
    {
        return $this->db->count_all($this->_table_name);
    }

    public function approve_job($job_post_id)
    {
        $this->db->set('job_status', 1);
        $this->db->where('job_post_id', $job_post_id);
        return $this->db->update($this->_table_name);
    }

    public function deactive_job($job_post_id)
    {
        $this->db->set('job_status', 2);
        $this->db->where('job_post_id', $job_post_id);
        return $this->db->update($this->_table_name);
    }

    public function get_all_company_by_selected_cv()
    {
        $this->db->distinct();
        $this->db->select('company_profile_id');
        $this->db->where('job_types', 2);
        $this->db->where('job_status', 1);
        $query = $this->db->get($this->_table_name)->result();
        return $query;
    }


 public function get_all_company_by_internship_cv()
    {
        $this->db->distinct();
        $this->db->select('company_profile_id');
        $this->db->where('job_types', 3);
        $this->db->where('job_status', 1);
        $query = $this->db->get($this->_table_name)->result();
        return $query;
    }


public function get_all_company_by_banksbook()
    {
        $this->db->distinct();
        $this->db->select('company_profile_id');
        $this->db->where('job_types', 5);
        $this->db->where('job_status', 1);
        $query = $this->db->get($this->_table_name)->result();
        return $query;
    }


    public function get_company_active_selected_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "2");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;

    }

        public function get_company_active_internship_jobs($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "3");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;

    }

       public function get_company_active_banksbook($company_id)
    {
        $this->db->select('*');
        $this->db->from('job_posting');
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_types', "5");
        $this->db->where('job_status', "1");
        $query = $this->db->get()->result();
        return $query;

    }

   public function update_Searchview($job_id,$total)
    {
        $this->db->set('search_view', $total);
        $this->db->where('job_post_id', $job_id);
        return $this->db->update($this->_table_name);
        }


    public function check_jobid_and_post_id($job_id, $company_id)
    {
        $this->db->select("*");
        $this->db->where('company_profile_id', $company_id);
        $this->db->where('job_post_id', $job_id);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // Delete Job By Company ID

    public function delete_job_by_company($job_id,$company_id){
         $this->db->where('job_post_id', $job_id);
         $this->db->where('company_profile_id', $company_id);
         $query=$this->db->delete($this->_table_name);
    }

    public function check_jobid_and_js_id($job_id, $js_id)
    {
        $this->db->select("*");
        $this->db->where('js_id', $js_id);
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('js_test_info');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function search_city($title){
        $this->db->like('city_name', $title , 'after');
        $this->db->order_by('city_name', 'ASC');
        // $this->db->limit('10');
        return $this->db->get('city')->result();
    }

     function search_city_keywords($title){
        $this->db->select("city_name,id");

         $this->db->like('city_name', $title , 'after');
        $this->db->order_by('city_name', 'ASC');
       

        return $this->db->get('city')->result();
    }

    function search_job_title($title)
    {
        $this->db->like('name', $title , 'both');
        $this->db->order_by('name', 'ASC');
        return $this->db->get('job_designation')->result();
    }

    function search_skills($title)
    {
        $this->db->like('skill_name', $title , 'both');
        $this->db->order_by('skill_name', 'ASC');
        return $this->db->get('skill_master')->result();
    }

    function search_job_keywords($title,$employer_id){
        $this->db->select("job_title,job_post_id");

        $this->db->like('job_title', $title , 'both');
        $this->db->order_by('job_title', 'ASC');
         $this->db->where('company_profile_id', $employer_id);

        return $this->db->get('job_posting')->result();
    }

    function search_test_keywords($title){
        $this->db->select("test_name,test_id");

        $this->db->like('test_name', $title , 'both');
        $this->db->order_by('test_name', 'ASC');
         // $this->db->where('company_profile_id', $employer_id);

        return $this->db->get('oceanchamp_tests')->result();
    }

    function search_candidate($title,$employer_id){
        $this->db->select("cv_id,js_email");

        $this->db->like('js_email', $title , 'both');
        $this->db->order_by('js_email', 'ASC');
         $this->db->where('corporate_cv_bank.company_id', $employer_id);

        return $this->db->get('corporate_cv_bank')->result();
    }

    function search_connection($title){
        $this->db->select("full_name as name,job_seeker_id as id");

        $this->db->like('full_name', $title , 'both');
        $this->db->order_by('full_name', 'ASC');
         // $this->db->where('company_profile_id', $employer_id);

        return $this->db->get('js_info')->result();
    }

    function search_company_connection($title){
        $this->db->select("company_name as name,company_profile_id as id");

        $this->db->like('company_name', $title , 'both');
        $this->db->order_by('company_name', 'ASC');
         // $this->db->where('company_profile_id', $employer_id);

        return $this->db->get('company_profile')->result();
    }

     public function cv_folder($id)
    {
       
         
                $this->db->select('cv.*');
                // ->select('cv.*')
                $this->db->from('cv_folder cv');
               $this->db ->join('cv_folder cvp ','cvp.parent_id = cv.id','left');
                // ->join('at_shops as','as.shop_id = ao.shop_id','left')
                $this->db->where('cv.id',$id);
                $query = $this->db->get();
            return $query->row();
    }  

}

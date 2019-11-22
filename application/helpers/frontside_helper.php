<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function get_ads($position)
	{
    		$CI =& get_instance();
    		return $CI->Ads_model->get_all_ads_by_position($position);
	}
        
        
        
function get_logo() {

        $ci=& get_instance();

        $ci->load->database(); 

        $sql = "select * from settings where id=2"; 

        $query = $ci->db->query($sql);

        $row = $query->result_array();

        $tag ='';

        foreach($row as $value){
            
            $tag.="<img src='".base_url().'files/'.$value['filename']."'>";

        }

        return $tag;

    }
function social_media() {

        $ci=& get_instance();

        $ci->load->database(); 

        $sql = "select * from social_media"; 

        $query = $ci->db->query($sql);

        $row = $query->result_array();

        $tag ='';

        foreach($row as $value){
            
            $tag.="<a href='".$value['link']."'><span><i class='".$value['class']."' aria-hidden='true'></i></span>".$value['title']."</a>";

        }

        return $tag;

    }
function get_metas() {

        $ci=& get_instance();

        $ci->load->database(); 

        $sql = "select * from settings where id=2"; 

        $query = $ci->db->query($sql);

        $row = $query->result_array();

        $tag ='';

        foreach($row as $value){
            
            $tag.="<title>".$value['meta_title']."</title>"
                . "<meta name='description' content=".$value['meta_description'].">"."<meta name='keywords' content=".$value['meta_keywords'].">";

        }

        return $tag;

    }

 function sendEmail_JobRequest($to_email,$message,$subject)
    {
        // $ci = get_instance();
        // $ci->load->library('email');
        
        // $config['protocol']     = 'smtp';
        // $config['smtp_host']    = 'mail.consultnhire.com';
        // $config['smtp_port']    = '465';
        // $config['smtp_timeout'] = '7'; 
        // $config['smtp_user']    = "info@consultnhire.com";
        // $config['smtp_pass']    = "yQB;H[V&o64I";
        // $config['charset']      = 'utf-8';
        // $config['newline']      = "\r\n";
        // $config['mailtype']     = 'html'; // or html
        // $config['validation']   = TRUE;
        // $ci->email->initialize($config);        
                
        // $ci->email->from('info@consultnhire.com', 'ConsultnHire');
        // $ci->email->to($to_email);
        // $ci->email->bcc('careerportal02@gmail.com');
       
        // $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
        // $ci->email->subject($subject);
        // $ci->email->message($message);
        // $ci->email->send();
        
        // return true;
        $ci = get_instance();
        $ci->load->library('email');
            /*$config['protocol'] = "smtp";
            $config['smtp_host'] = "ssl://smtp.gmail.com";
            $config['smtp_port'] = "465";
            $config['smtp_user'] = "notification@yourdomain.com"; 
            $config['smtp_pass'] = "Romesh-shil1995";*/
            
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";


            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject($subject);
            $ci->email->message($message);
            $ci->email->send(FALSE);
          //  $ci->email->print_debugger(array('headers'));
          //  exit;
            return true;
    }

    // to fetch exam result by job seeker ids
    function getExamResultByID($js_id,$job_id){
        $CI = get_instance();
        $select_result = "SUM(marks) as total_marks,COUNT(test_id) as total_questions,js_test_info.js_id";
        $table = "js_test_info";
        $where_res['job_id'] = $job_id;
        $where_res['js_id'] = $js_id;
        $exam_result = $CI->Master_model->getMaster($table, $where_res, false, false ,false, $select_result, $limit =false, $start =false, $search= false);
     //   echo $CI->db->last_query(); die;

        return $exam_result;
    } 

    function getExamRequired($job_id){
        $CI = get_instance();
        $select_result = "is_test_required";
        $tablename = "job_posting";
        $where_res['job_post_id'] = $job_id;
        $exam_res = $CI->Master_model->get_master_row($tablename, $select_result, $where_res, $join = FALSE);
     //   echo $CI->db->last_query(); die;

        return $exam_res;
    } 

    function geSeekerEducationByid($jobseeker_id,$seeker_edu_id)
    {
        $CI = get_instance();
        // $select_result = "is_test_required";
        $table = "js_education";
        $where_ress = "js_education.job_seeker_id='$jobseeker_id' AND js_education.education_level_id='$seeker_edu_id'";
        $join_edu = array(
                'education_level' => 'education_level.education_level_id = js_education.education_level_id|left outer',
                'education_specialization' => 'education_specialization.id = js_education.specialization_id|left outer',
                'schoolboard' => 'schoolboard.schoolboard_id = js_education.board_id|left outer',
                'course' => 'course.education_type_id = js_education.education_type_id|left outer',
                'schoolmedium' => 'schoolmedium.schoolmedium_id = js_education.schoolmedium_id|left outer'
            );

        $select_edu = "education_level.education_level_name,education_specialization.education_specialization,schoolboard.schoolboard_name,course.education_type,schoolmedium.school_medium,js_education.js_institute_name,js_education.js_resut,js_education.js_year_of_passing,js_education.totalmarks_id,js_education.gradding,js_education.js_education_id";

        $edu_res = $CI->Master_model->getMaster($table, $where_ress, $join_edu, $order = false, $field = false, $select_edu,$limit=false,$start=false, $search=false);

       // echo $CI->db->last_query(); die;

        return $edu_res;
    } 

    
    // to fetch interview dates by ids
    function getinerviewdates($inter_id){
        $CI = get_instance();
        $select_result = "interview_date,start_time,end_time";
        $table = "interview_dates";
        $where_res['interview_id'] = $inter_id;
        $intr_result = $CI->Master_model->getMaster($table, $where_res, false, false ,false, $select_result, $limit =false, $start =false, $search= false);
       // echo $CI->db->last_query(); die;

        return $intr_result;
    } 

 function getinterviewstatus($js_id,$job_id){
        $CI = get_instance();
        $select_result = "interview_complete_status";
        $table = "interview_scheduler";
        $where_res="job_post_id = $job_id AND job_seeker_id='$js_id' order by id desc";
        $intrv_result = $CI->Master_model->getMaster($table, $where_res, false, false ,false, $select_result, $limit ='1', $start =false, $search= false);
       // echo $CI->db->last_query(); die;

        return $intrv_result;
    } 
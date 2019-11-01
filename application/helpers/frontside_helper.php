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
        $ci = get_instance();
        $ci->load->library('email');
        
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.consultnhire.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7'; 
        $config['smtp_user'] = "info@consultnhire.com";
        $config['smtp_pass'] = "yQB;H[V&o64I";
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE;
        $ci->email->initialize($config);        
                
        $ci->email->from('info@consultnhire.com', 'ConsultnHire');
        $ci->email->to($to_email);
        $ci->email->bcc('careerportal02@gmail.com');
       
        $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
        $ci->email->subject($subject);
        $ci->email->message($message);
        $ci->email->send();
   
        

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
        echo $this->db->last_query(); die;

        return $exam_result;
    } 
    
    

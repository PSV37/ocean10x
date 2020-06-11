<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_apply_model extends MY_Model
{

    protected $_table_name  = 'job_apply';
    protected $_primary_key = 'job_apply_id';
    protected $_order_by    = "job_apply_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function check_apply_job($userId, $company_id,$job_post_id)
    {
        $this->db->select("*");
        $this->db->where('job_seeker_id', $userId);
        $this->db->where('company_id', $company_id);
        $this->db->where('job_post_id', $job_post_id);
        // $this->db->where('forword_job_status',0);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
 
    public function check_confirmed_interview($userId, $company_id,$job_post_id)
    {
        $this->db->select("*");
        $this->db->where('job_seeker_id', $userId);
        $this->db->where('company_id', $company_id);
        $this->db->where('job_post_id', $job_post_id);
        $this->db->where('confirm_status',1);
        $query = $this->db->get('interview_scheduler');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function check_apply_forwarded_job($userId, $company_id,$job_post_id)
    {
        $this->db->select("*");
        $this->db->where('job_seeker_id', $userId);
        $this->db->where('company_id', $company_id);
        $this->db->where('job_post_id', $job_post_id);
        $this->db->where('forword_job_status',2);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function check_resume_by_id($userId, $company_id)
    {
        $this->db->select("*");
        $this->db->where('job_seeker_id', $userId);
        $this->db->where('company_id', $company_id);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function count_job_apply($job_id,$company_id){
      $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $query = $this->db->get($this->_table_name); 
        return $query->num_rows();
    }

      public function count_job_apply_sortedlist($job_id,$company_id){
      $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('apply_status',1);
        $query = $this->db->get($this->_table_name); 
        return $query->num_rows();
    }

      public function count_job_apply_inteviewlist($job_id,$company_id){
      $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('apply_status',2);
        $query = $this->db->get($this->_table_name); 
        return $query->num_rows();
    }

      public function count_job_apply_finallist($job_id,$company_id){
      $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('apply_status',3);
        $query = $this->db->get($this->_table_name); 
        return $query->num_rows();
    }


    public function only_job_applicants($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }

        public function sorlist_applicants_cv($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('apply_status',1);
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }
      public function interview_applicants_cv($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('apply_status',2);
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }

    public function view_resumelist($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('view_not_view',1);
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }


  public function not_view_resumelist($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('view_not_view',0);
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }


    public function count_resume_not_view($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('view_not_view',0);
        $query = $this->db->get($this->_table_name); 
        return $query->num_rows();
    }

     public function count_resume_view($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('view_not_view',1);
        $query = $this->db->get($this->_table_name); 
        return $query->num_rows();
    }

    public function update_resume_view($seeker_id,$company_id,$job_id){
        $this->db->set('view_not_view', '1');
        $this->db->where('job_seeker_id', $seeker_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('job_post_id', $job_id);
         $this->db->update($this->_table_name);
        return $this->db->affected_rows();
    }



      public function final_applicants_cv($job_id,$company_id){
        $this->db->select("*");
        $this->db->where('job_post_id', $job_id);
        $this->db->where('company_id', $company_id);
        $this->db->where('apply_status',3);
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }


    public function update_sortlist($apply_id){
        $this->db->set('apply_status', '1');
        $this->db->where('job_apply_id', $apply_id);
         $this->db->update($this->_table_name);
        return $this->db->affected_rows();
    }

    public function update_interviewlist($apply_id){
        $this->db->set('apply_status', '2');
        $this->db->where('job_apply_id', $apply_id);
         $this->db->update($this->_table_name);
        return $this->db->affected_rows();
    }

    public function update_finallist($apply_id){
        $this->db->set('apply_status', '3');
        $this->db->where('job_apply_id', $apply_id);
        $this->db->update($this->_table_name);
        return $this->db->affected_rows();
    }

     public function seeker_all_applications($job_seeker_id){
        $this->db->select("*");
        $this->db->where('job_seeker_id', $job_seeker_id);
        // $this->db->where('forword_job_status', '0');
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }

    public function seeker_all_application($job_seeker_id){
        $this->db->select("*");
        $this->db->where('job_seeker_id', $job_seeker_id);
        $this->db->where('forword_job_status', '0');
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }
    // forwarded  jobs
    public function seeker_all_application_send($job_seeker_id){
        $this->db->select("*");
        $this->db->where('job_seeker_id', $job_seeker_id);
        $this->db->where('forword_job_status!=', '0');
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }
 public function expedited_salary($job_seeker_id,$job_id){
        $this->db->select("*");
        $this->db->where('job_seeker_id', $job_seeker_id);
 $this->db->where('job_post_id', $job_id);
       
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }


 public function expedited_salary_admin($job_seeker_id){
        $this->db->select("*");
        $this->db->where('job_seeker_id', $job_seeker_id)->order_by($this->_order_by);
 
        $query = $this->db->get($this->_table_name); 
        return $query->result();
    }


	public function sendEmail_job($to_email,$reason)
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
				
		if($reason=='interview'){
			$str=" We are glad to inform you that your interview scheduled at 9.00PM.";
		}
		if($reason=='short'){
			$str=" We are glad to inform you that your resume has been shortlisted.";
		}
		if($reason=='final'){
			$str=" We are glad to inform you that your seleted for this job.further details share on call letter.";
		}
        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Thank you for being a part of ConsultnHire leading jobs site.'.$str.'<br><br><br>You should receive an update form the employer very soon. If you have any queries please feel free to contact<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

       

        $ci->email->from('info@consultnhire.com', 'ConsultnHire');
        $ci->email->to($to_email);
		$ci->email->bcc('careerportal02@gmail.com');
       
        $this->email->reply_to('info@consultnhire.com', 'ConsultnHire');
        $ci->email->subject('Career Support Information');
        $ci->email->message($message);
        $ci->email->send();
   
        

        return true;
    }

// to fetch total exam attended candidates
	public function count_exam_attended($job_id){
        $this->db->select("*");
        $this->db->where('job_id', $job_id)->group_by('js_id');
        $query = $this->db->get('js_test_info'); 
        return $query->num_rows();
    }

}

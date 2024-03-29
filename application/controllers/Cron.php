<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Cron extends CI_controller {
	public function index()
	{
		$where =  "DATE_FORMAT(now(), '%Y-%m-%d') BETWEEN DATE_FORMAT(company_profile.create_at, '%Y-%m-%d') AND DATE_ADD(DATE_FORMAT(company_profile.create_at, '%Y-%m-%d') , INTERVAL 3 DAY) and company_status = 0";
		$all_mails = $this->Master_model->getMaster('company_profile', $where , $join = FALSE, $order = false, $field = false, $select = 'company_email',$limit=false,$start=false, $search=false);
		// print_r($all_mails);
		// print_r($this->db->last_query());
		foreach ($all_mails as $row) {
			 $company_name = $this->session->userdata('company_name');
			 $to_email = $row['company_email'];
          $ci = get_instance();
          $ci->load->library('email');
            $email_name = explode('@', $to_email);
          
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
		<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
		<br><br>Hi '.ucfirst($email_name[0]).',<br><br>Please verify your e-mail to activate your TheOcean Account.<br><br>Once verified, you can browse TheOcean ! <br><br>You can confirm your e-mail by clicking the button below.<br><br><a style="border-radius:4px;font-size:15px;color:white;text-decoration:none;padding:14px 7px 14px 7px;width:210px;max-width:210px;font-family:&quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Arial;margin:0;display:block;background-color:#6caa4d;text-align:center" href="' . base_url() . 'employer_register/verify/' . md5($to_email) . '">Activate Account</a><br><br>Alternatively, copy paste and open the link in your browser.<br><br>
		    <a href="'. base_url() . 'employer_register/verify/' . md5($to_email) .' ">'. base_url() . 'employer_register/verify/' . md5($to_email) .'</a>
		    <br><br>Thanks,<br><br>Team TheOcean<br><br>Copyright © 2020 TheOcean, All rights reserved.
		</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';



            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('Account Verification Reminder - TheOcean');
            
            $ci->email->message($message);
            $ci->email->send(FALSE);
		}
		$join = array('company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id');
		$where_job =  "DATE_FORMAT(now(), '%Y-%m-%d') BETWEEN  DATE_SUB(DATE_FORMAT(job_posting.job_deadline, '%Y-%m-%d') , INTERVAL 3 DAY) AND DATE_FORMAT(job_posting.job_deadline, '%Y-%m-%d') AND job_status = 1";
		$all_jobs = $this->Master_model->getMaster('job_posting', $where_job , $join, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
		// print_r($all_mails);
		// print_r($this->db->last_query());
		foreach ($all_jobs as $row) {
			 $company_name = $this->session->userdata('company_name');
			 $to_email = $row['company_email'];
          $ci = get_instance();
          $ci->load->library('email');
            $email_name = explode('@', $to_email);
          
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
			<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
			<br><br>Hi '.ucfirst($row['company_name']).',<br><br>Kindly note that your job post '.$row['job_title'].' is about to expire on '.$row['job_deadline'].'. <br><br>You can login to TheOcean and extend the job post deadline, if required.<br><br><a href="'.base_url().'job/show/'. $row['job_slugs'].'">Job Post</a>
			    <br><br>Thanks,<br><br>Team TheOcean
				</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';



            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('Your job post is about to expire on '.$row['job_deadline']);
            
            $ci->email->message($message);
            $ci->email->send(FALSE);
		}

		$join_expired = array('company_profile' => 'company_profile.company_profile_id = job_posting.company_profile_id');
		$where_expired =  "DATE_FORMAT(now(), '%Y-%m-%d') BETWEEN DATE_FORMAT(job_posting.job_deadline, '%Y-%m-%d') and DATE_ADD(DATE_FORMAT(job_posting.job_deadline, '%Y-%m-%d') , INTERVAL 1 DAY) AND job_status = 1";
		$all_expired_jobs = $this->Master_model->getMaster('job_posting', $where_expired , $join_expired, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
		// print_r($all_mails);
		// print_r($this->db->last_query());
		foreach ($all_expired_jobs as $row) {
			 $company_name = $this->session->userdata('company_name');
			 $to_email = $row['company_email'];
          $ci = get_instance();
          $ci->load->library('email');
            $email_name = explode('@', $to_email);
          
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
			<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
			<br><br>Hi '.ucfirst($row['company_name']).',<br><br>Kindly note that your job post '.$row['job_title'].'  has expired on '.$row['job_deadline'].'. <br><br>You can login to TheOcean and check the performance metrics related to this job post by clicking on the below given URL.<br><br>OR<br><br>In case you wish to re-activate this job post the you can click on the below given URL and proceed further. <br><br><a href="'.base_url().'job/show/'. $row['job_slugs'].'">Job Post</a>
			    <br><br>Thanks,<br><br>Team TheOcean
				</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';



            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('Your job post has expired on '.$row['job_deadline']);
            
            $ci->email->message($message);
            $ci->email->send(FALSE);
		}

		$join_tests = array('js_info' => 'js_info.job_seeker_id = forwarded_tests.job_seeker_id',
			'company_profile' =>'company_profile.company_profile_id = forwarded_tests.company_id',
			'oceanchamp_tests' => 'oceanchamp_tests.test_id = forwarded_tests.test_id',
			'topic' => ' FIND_IN_SET(topic.topic_id,oceanchamp_tests.topics) <> 0 |LEFT');
		$where_tests =  "DATE_FORMAT(now(), '%Y-%m-%d') BETWEEN DATE_FORMAT(forwarded_tests.updated_on, '%Y-%m-%d') and DATE_ADD(DATE_FORMAT(forwarded_tests.updated_on, '%Y-%m-%d') , INTERVAL 1 DAY) AND forwarded_tests.status = 'Farwarded Test individually'";
		$tests_forwarded = $this->Master_model->getMaster('forwarded_tests', $where_tests , $join_tests, $order = false, $field = false, $select = 'GROUP_CONCAT(topic.topic_name) as topics_common,js_info.*,company_profile.*,oceanchamp_tests.*',$limit=false,$start=false, $search=false);
		// print_r($all_mails);
		// print_r($this->db->last_query());
		foreach ($tests_forwarded as $row) {
			 $company_name = $this->session->userdata('company_name');
			 $to_email = $row['email'];
          $ci = get_instance();
          $ci->load->library('email');
            $email_name = explode('@', $to_email);
          
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
			<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
			<br><br>Hi '.ucfirst($email_name[0]).',<br><br>'.$row['company_name'].' has asked you to take a test. Kindly click on the Test URL give below and follow the steps thereon. <br><br><a href="' . base_url() . 'job_seeker/ocean_test_start/' . base64_encode($row['test_id']) . '"><button >Give Test</button></a>
			    <br><br>Thanks,<br><br>Team TheOcean
				</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';



            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('REMINDER '.$row['company_name'].' has asked you to take a '.$row['topics_common'] .' Test ');
            
            $ci->email->message($message);
            $ci->email->send(FALSE);
		}




	}

}
?>
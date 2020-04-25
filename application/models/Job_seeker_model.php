<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Job_seeker_model extends MY_Model
{

    protected $_table_name  = 'js_info';
    protected $_primary_key = 'job_seeker_id';
    protected $_order_by    = "job_seeker_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function jobseeker_name($id)
    {
        $this->db->select("full_name");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->full_name;
    }
    public function get_jobseeker_fullname($id)
    {
        $this->db->select('full_name');
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->full_name;
    }

    public function get_jobseeker_email($id)
    {
        $this->db->select('email');
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
       return $result[0]->email;
    }

    public function email_check($email)
    {
        $this->db->select("*");
        $this->db->where('email', $email);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function username_check($user_name)
    {
        $this->db->select("*");
        $this->db->where('user_name', $user_name);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_login_info($email, $password)
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('email', $email);
        // $where = "email='$email' OR mobile_no='$email' AND password='$password' AND js_status='1'";
        // $this->db->where($where);
        $this->db->where('password', $password);
        $this->db->where('js_status', "1");
        $query         = $this->db->get();
        return $result = $query->row();
    }

 
	
    //send verification email to user's email id 

    public function sendEmail($to_email,$full_name)
    {
        $ci = get_instance();
        $ci->load->library('email');

		$config['protocol']    = 'mail';
		// $config['smtp_host']    = 'mail.consultnhire.com';
		// $config['smtp_port']    = '465';
		// $config['smtp_timeout'] = '7'; 
		// $config['smtp_user'] = "info@consultnhire.com";
		// $config['smtp_pass'] = "yQB;H[V&o64I";
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html'; // or html

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"><?php echo get_logo();?></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Dear '.$full_name.',<br>Please click on the below activation link to verify your email address <br><br><a style="border-radius:4px;font-size:15px;color:white;text-decoration:none;padding:14px 7px 14px 7px;width:210px;max-width:210px;font-family:&quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Arial;margin:0;display:block;background-color:#6caa4d;text-align:center" href="' . base_url() . 'register/verify/' . md5($to_email) . '">Active Account</a><br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

        $ci->email->initialize($config);

        $ci->email->from('info@consultnhire.com', 'ConsultnHire');
        $ci->email->to($to_email);
        $this->email->reply_to('info@consultnhire.com', 'ConsultnHire');
        $ci->email->subject('verify email account');
        $ci->email->message($message);
        $ci->email->send(FALSE);

        return true;

    }

    //activate user account
    public function verifyEmailID($key)
    {
        $this->db->set('js_status', 1);
        $this->db->where('js_token', $key);
        $this->db->update($this->_table_name);
        return $this->db->affected_rows();
    }

    public function resume_view_by_id($job_seeker_id)
    {
        $this->db->select('*');
        $this->db->where('js_info.job_seeker_id', $job_seeker_id);
        $this->db->from($this->_table_name);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
        $this->db->join('js_career_info', 'js_career_info.job_seeker_id = js_info.job_seeker_id');
        $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
    		$this->db->join('country', 'country.country_id = js_personal_info.country_id');
    		$this->db->join('state', 'state.state_id = js_personal_info.state_id');
    		$this->db->join('city', 'city.id = js_personal_info.city_id');
        $query = $this->db->get();
        return $query->row();
    }


public function applicant_job_seeker($job_seeker_id){

     $this->db->select('full_name,email,resume_title,mobile,photo_path');
        $this->db->where('js_info.job_seeker_id', $job_seeker_id);
        $this->db->from($this->_table_name);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
        $query = $this->db->get();
        return $query->row();
}

public function seeker_list(){
     $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
       return $query = $this->db->get()->result();
}

public function seeker_list_count()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

  public function ative_seeker_list_count()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('js_status', "1");
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }



public function active_seeker_list(){
     $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('js_status',1);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
       return $query = $this->db->get()->result();
}

public function recent_seeker_list(){
     $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('js_status',1);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
    $this->db->order_by("js_info.job_seeker_id", 'desc');
    $this->db->limit(5);
       return $query = $this->db->get()->result();
}


public function deactive_seeker_list(){
     $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('js_status',0);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
       return $query = $this->db->get()->result();
}
 public function change_password($job_seeker_id, $password)
    {

        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where($this->_primary_key, $job_seeker_id);
        $this->db->where('password', $password);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

public function experience_cv(){
     $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('js_status',1);
        $this->db->where('cv_type',1);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
       return $query = $this->db->get()->result();
}

public function internship_cv(){
     $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('js_status',1);
        $this->db->where('cv_type',0);
        $this->db->join('js_personal_info', 'js_personal_info.job_seeker_id = js_info.job_seeker_id');
         $this->db->join('js_photo', 'js_photo.job_seeker_id = js_info.job_seeker_id');
       return $query = $this->db->get()->result();
}

public function get_cvtype_by_id($job_seeker_id){
        $this->db->select('cv_type');
        $this->db->where($this->_primary_key, $job_seeker_id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->cv_type;
}



//--------------

public function check_forgot_user_info($email)
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('email', $email);
       // $this->db->where('js_status', "1");
        $query         = $this->db->get();
        $result = $query->row();
        if($result)
        {
            print_r($result);die;
         	$this->forgot_pass_email($email);
         	return true;
         }
         else{
         	return false;
         }
    }
	
 //send forgot password email to user's email id
    public function forgot_pass_email($to_email)
    {
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

            $message='<div style="max-width:600px!important;padding:4px">
              <table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                  <tr>
                    <td align="center"><table width="100%" cellspacing="0" border="0">
                        <tbody>
                          <tr>
                            <td style="font-size:0px;text-align:left" valign="top"><?php echo get_logo();?></td>
                          </tr>
                        </tbody>
                      </table>
                      <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                          <tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left">
                            <td><br>
                              <br>
                              Hello Dear,<br>
                              Please click on link below to reset your password: <br>
                              <a href="'.base_url().'register/reset_password/' . md5($to_email) . '"> Reset</a>
                              
                           <a style="border-radius:4px;font-size:15px;color:white;text-decoration:none;padding:14px 7px 14px 7px;width:210px;max-width:210px;font-family:&quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Arial;margin:0;display:block;background-color:#6caa4d;text-align:center" href="'.base_url().'register/reset_password/' . md5($to_email) . '">Reset Password</a>
                              <br>
                              <br>
                              © 2017 ConsultnHire All Rights Reserved.</td>
                          </tr>
                          <tr>
                            <td height="40"></td>
                          </tr>
                        </tbody>
                      </table></td>
                  </tr>
                </tbody>
              </table>
            </div>
            ';

            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('Account Recovery');
            $ci->email->message($message);
            $ci->email->send(FALSE);
          //  $ci->email->print_debugger(array('headers'));
          //  exit;
            return true;
    }
    
    //reset user account
    public function reset_account($js_token,$password)
    {
        $this->db->set('password', $password);
        $this->db->where('js_token', $js_token);
        $this->db->update($this->_table_name);
        return $this->db->affected_rows();
    }	


}

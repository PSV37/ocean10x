<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Company_Profile_Model extends MY_Model
{

    protected $_table_name  = 'company_profile';
    protected $_primary_key = 'company_profile_id';
    protected $_order_by    = "company_profile_id ASC";

    public function __construct()
    {
        parent::__construct();
    }

    
    public function get_settings() {
            $this->db->select('*');
            $this->db->from('settings');
                    $this->db->where('id', 2);
            $Q = $this->db->get();
            if ($Q->num_rows() > 0) {
                $return = $Q->row_array();
            } else {
                $return = 0;
            }
            $Q->free_result();
            return $return;
        }
    

        public function selected($id = null)
    {
        $commpany_list = $this->get();
        $output       = '';
        foreach ($commpany_list as $company) {
            $selected = $company->company_profile_id == $id ? 'selected="selected"' : '';
            $output .= sprintf('<option %s value="%s">%s</option> ', $selected, $company->company_profile_id, $company->company_name);
        }
        return $output;
    }

    //send verification email to user's email id
    public function sendEmail($to_email)
    {
  //      $ci = get_instance();
  //       $ci->load->library('email');
  //       $config['protocol']    = 'smtp';
		// $config['smtp_host']    = 'mail.consultnhire.com';
		// $config['smtp_port']    = '465';
		// $config['smtp_timeout'] = '7'; 	
		// $config['smtp_user'] = "info@consultnhire.com";
		// $config['smtp_pass'] = "yQB;H[V&o64I";
		// $config['charset']    = 'utf-8';
		// $config['newline']    = "\r\n";
		// $config['mailtype'] = 'html'; // or html
	   


        // $ci->email->initialize($config);

        // $ci->email->from('info@consultnhire.com', 'ConsultnHire');
        // $ci->email->to($to_email);
        // $this->email->reply_to('info@consultnhire.com', 'ConsultnHire');
        // $ci->email->subject('verify email account');
        // $ci->email->message($message);
        // $ci->email->send();


          $ci = get_instance();
          $ci->load->library('email');
          
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            
        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Please click on the below activation link to verify your email address <br><br><a style="border-radius:4px;font-size:15px;color:white;text-decoration:none;padding:14px 7px 14px 7px;width:210px;max-width:210px;font-family:&quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Arial;margin:0;display:block;background-color:#6caa4d;text-align:center" href="' . base_url() . 'employer_register/verify/' . md5($to_email) . '">Active Account</a><br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('verify email account');
            $ci->email->message($message);
            $ci->email->send(FALSE);
            
        return true;
    }

    public function verifyEmailID($key)
    {
        $this->db->set('company_status', 1);
        $this->db->where('token', $key);
        return $this->db->update('company_profile');
    }

    public function company_name($id)
    {
        $this->db->select("company_name");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->first_row();

        return isset($result->company_name) ? $result->company_name : '';
    }


 public function get_phone_number($company_id)
    {
        $this->db->select('company_phone');
         $this->db->where($this->_primary_key, $company_id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->company_phone;
    }

public function get_slug_name($company_id)
    {
        $this->db->select('company_slug');
         $this->db->where($this->_primary_key, $company_id);
        $result = $this->db->get($this->_table_name)->result();
        return $result[0]->company_slug;
    }

    public function company_logoby_id($id)
    {
        $this->db->select("company_logo");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->first_row();

        return isset($result->company_logo) ? $result->company_logo : '';
    }

    public function companyname_check($company_name)
    {
        $this->db->select("*");
        $this->db->where('company_name', $company_name);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
	
	
	public function email_check($email)
    {
        $this->db->select("*");
        $this->db->where('company_email', $email);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
	

	
	public function User_status_check(){
		$str='';
		$type=$this->session->userdata('UserType');
		
		if($type=='super'){
			$str='style="display:block !important;"';
		}
		else{
		$str='style="display:none !important;"';
			
		}
		
		return $str;
		
	}
    public function check_slug_name($company_slug)
    {
        $this->db->select('*');
        $this->db->where('company_slug', $company_slug);
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
        $this->db->where('company_username', $user_name);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

        public function phonenumber_check($company_phone)
    {
        $this->db->select("*");
        $this->db->where('company_phone', $company_phone);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function active_company()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('company_status','1');
        $query=$this->db->get()->result();
        return $query;

    }

    public function deactive_company()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('company_status','0');
        $query=$this->db->get()->result();
        return $query;

    }

    public function get_company_info_by_slug($slug){
         $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('company_slug', $slug);
        $query=$this->db->get()->row();
        return $query;
    }


    public function change_password($companyId, $password)
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where($this->_primary_key, $companyId);
        $this->db->where('company_password', $password);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }


    public function company_list_count()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

        public function active_company_list_count()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->where('company_status','1');
        $query    = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }


    public function get_all_company_by_banksbook()
    {
        $this->db->select('*');
        $this->db->where('hot_jobs', 3);
        $this->db->where('company_status', 1);
        $query = $this->db->get($this->_table_name)->result();
        return $query;
    }

    public function get_all_company_by_selected_cv()  {
        $this->db->select('*');
        $this->db->where('hot_jobs', 1);
        $this->db->where('company_status', 1);
        $query = $this->db->get($this->_table_name)->result();
        return $query;
    }

      public function get_all_company_by_internship_cv()  {
        $this->db->select('*');
        $this->db->where('hot_jobs', 2);
        $this->db->where('company_status', 1);
        $query = $this->db->get($this->_table_name)->result();
        return $query;
    }



}

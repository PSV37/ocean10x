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
            $ci->email->subject('Account Verification - TheOcean');
            $ci->email->message($message);
            $ci->email->send(FALSE);

        return true;
    }

     public function sendjobEmail($to_email,$v_companyjobs)
    {
        
       
          $ci = get_instance();
          $ci->load->library('email');
            $email_name = explode('@', $to_email);
          
            $config['protocol'] = "mail";
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi '.ucfirst($email_name[0]).',<br><br>A new job has been posted by <username> from your organization. Details of this job post are as follows:-<br><br><label>
      <div class="border-top1"></div>
      <
      <div class="card">
         <div class="front">
           
            <div class="job-info">
               <p class="job_title">'. $v_companyjobs->job_title.'</p>
            </div>
            <div class="icon-info">
               <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
               <li class="right-icon-title"> &emsp;'.$v_companyjobs->city_id.'</li>
               <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
               <li class="right-title" style="width:100%;"> &emsp;'.$v_companyjobs->experience.'(experience)</li>
               <div class="clear"></div>
            </div>
            <div class="following-info">
               <li class="left-title"
                  >Job Roll</li>
               <li class="right-title">&nbsp;: '.$v_companyjobs->job_role_title.'</li>
               <li class="left-title">Engagement</li>
               <li class="right-title">&nbsp;: '.$v_companyjobs->job_nature_name.'</li>
               <li class="left-title">Domain</li>
               <li class="right-title">&nbsp;:'.$v_companyjobs->job_category_name.'</li>
               <!--  <li class="left-title">Role Type </li><li class="right-title">&nbsp;:</li> -->
               <li class="left-title">Dummy1</li>
               <li class="right-title">&nbsp;:</li>
               <!--  <li class="left-title">Dummy2</li><li class="right-title">&nbsp;:</li> -->
               <div class="clear"></div>
            </div>
            <div class="following-info2">
               <li class="left-title">Education</li>
               <li class="right-title">&nbsp;: '.$v_companyjobs->education_level_name.'</li>
               <li class="left-title">experience</li>
               <li class="right-title">&nbsp;:'.$v_companyjobs->experience.'</li>
               <li class="left-title">CTC</li>
               <li class="right-title">&nbsp;:'.$v_companyjobs->salary_range.'</li>
               <li class="left-title">Vacancies</li>
               <li class="right-title">&nbsp;: '.$v_companyjobs->no_jobs.'</li>
               <!-- <li class="left-title">Specialization</li><li class="right-title">&nbsp;:'.$v_companyjobs->education_specialization.'</li> -->
               <!--  <li class="left-title">Joining ETA</li><li class="right-title">&nbsp;:30 days</li> -->
               <!--  <li class="left-title">Benifits</li><li class="right-title">&nbsp;:'.$v_companyjobs->benefits.' </li> -->
               <!--   <li class="left-title">Dummy3</li><li class="right-title">&nbsp;:value</li> -->
               <div class="clear"></div>
            </div>
            <div class="following-info3">
               <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>
               <li class="right-title">&nbsp;: '.if (isset($v_companyjobs->jd_file) && !empty($v_companyjobs->jd_file)) { echo "Yes".'  <a style="margin-left: 15px" href="'. base_url('upload/job_description/' .$v_companyjobs->jd_file.'" download><i class="fa fa-download" aria-hidden="true"></i></a> ' } else { echo "No";} '</li>
               <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:'.$v_companyjobs->is_test_required .'</li>
               <li class="left-title">Published on</li>
               <li class="right-title">&nbsp;:'if(!is_null($v_companyjobs->created_at)) { echo date('M j Y',strtotime($v_companyjobs->created_at)); }'</li>
               <li class="left-title">Job expiry</li>
               <li class="right-title">&nbsp;:'if(!is_null($v_companyjobs->job_deadline)) { echo date('M j Y',strtotime($v_companyjobs->job_deadline)); }'</li>
               <div class="clear"></div>
            </div>
            <!-- <div id="skills"> -->
            <span>Skill sets</span>:
           '
               $sk=$v_companyjobs->skills_required;
               if (isset($sk) && !empty($sk)) {
                  $where_sk= "id IN (".$sk.") AND status=1";
                $select_sk = "skill_name ,id";
                $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                if(!empty($skills)){ 
                  foreach($skills as $skill_row){ ?>
            '<lable class=""><button id="sklbtn">'.$skill_row['skill_name'].'</button></lable>'
             }
               } }   
            '<br>
            <span>Benefits</span>:'
               $benefits=explode(',', $v_companyjobs->benefits);
               
                if(!empty($benefits)){ 
                  $i=0;
                  foreach($benefits as $benefit){ ?>
            '<lable class=""><button id="sklbtn">'. $benefits[$i].'</button></lable>'
           $i++; }
               } '
            <!--  <div class="clear"></div>
               </div> -->         
       
            'if ($v_companyjobs->job_deadline > date('Y-m-d')){
               // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
               echo '<span class="active-span">Active</span>';
               }
               else {
               // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
               echo '<span class="pasive-span">Expired</span>';
               } '
            
         </div>
      </div>
   </label<br><br>You can confirm your e-mail by clicking the button below.<br><br><a style="border-radius:4px;font-size:15px;color:white;text-decoration:none;padding:14px 7px 14px 7px;width:210px;max-width:210px;font-family:&quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Arial;margin:0;display:block;background-color:#6caa4d;text-align:center" href="' . base_url() . 'employer_register/verify/' . md5($to_email) . '">Activate Account</a><br><br>Alternatively, copy paste and open the link in your browser.<br><br>
    <a href="'. base_url() . 'employer_register/verify/' . md5($to_email) .' ">'. base_url() . 'employer_register/verify/' . md5($to_email) .'</a>
    <br><br>Thanks,<br><br>Team TheOcean<br><br>Copyright © 2020 TheOcean, All rights reserved.
</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';


            $ci->email->initialize($config);
            $ci->email->from('info@consultnhire.com', 'ConsultnHire');
            $ci->email->to($to_email);
            $ci->email->reply_to('info@consultnhire.com', 'ConsultnHire');
            $ci->email->subject('New Job Posted ');
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

     public function companyid_check($consultant_id,$company_id)
    {
        $this->db->select("*");
        $this->db->where('consultant_id', $consultant_id);
        $this->db->where('company_id', $company_id);
        $query = $this->db->get('consultant_company_mapping');
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

    public function check_name($company_token)
    {
        $this->db->select('*');
        $this->db->where('token', $company_token);
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

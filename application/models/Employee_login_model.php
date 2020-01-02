<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Employee_Login_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_login_info($email,$password) { 
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('email',$email);
            $this->db->where('password',$password);
            $this->db->where('emp_status','1' || 'emp_status','3');
            // $this->db->where();

            //$this->db->cache_off();
            $query = $this->db->get();
            $result=$query->row();
            return $result;
        }


    public function logout()
    {
        $this->session->sess_destroy();
    }
    
    
    //--------------

public function check_forgot_user_info($email)
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('email', $email);
       // $this->db->where('js_status', "1");
        $query         = $this->db->get();
        $result = $query->row();
        if($result)
        {
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
                  
               <a style="border-radius:4px;font-size:15px;color:white;text-decoration:none;padding:14px 7px 14px 7px;width:210px;max-width:210px;font-family:&quot;Open Sans&quot;,&quot;Helvetica Neue&quot;,Arial;margin:0;display:block;background-color:#6caa4d;text-align:center" href="'.base_url().'employer_login/reset_password/' . md5($to_email) . '">Reset Password</a>
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
            $ci->email->reply_to('info@consultnhire.com', 'Vorerpata Mail');
            $ci->email->subject('Account Recovery');
            $ci->email->message($message);
            $ci->email->send(FALSE);
          //  $ci->email->print_debugger(array('headers'));
          //  exit;
            return true;
    }
    
    //reset user account
    public function reset_account($token,$password)
    {
        $this->db->set('password', $password);
        $this->db->where('token', $token);
        $this->db->update('employee');
        return $this->db->affected_rows();
    }	

    //verify user account
    public function verify_account($token)
    {
        $this->db->set('verify', 'Y');
        $this->db->where('token', $token);
        $this->db->update('employee');
        return $this->db->affected_rows();
    }

    public function change_password($employee_id, $password)
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('emp_id', $employee_id);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }	    
    
    

    }


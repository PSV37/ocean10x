<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Public_demand_model extends MY_Model{

    protected $_table_name = 'public_demand';
    protected $_primary_key = 'public_demand_id';
    protected $_order_by = "public_demand_id asc";

    public function __construct()
    {
        parent::__construct();
    }

 


 //send verification email to user's email id
    public function publicMail($name,$email)
    {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "youremail@domain.com";
        $config['smtp_pass'] = "Romesh-shil";
        $config['charset']   = "utf-8";
        $config['mailtype']  = "html";
        $config['newline']   = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi '.$name.',<br>Thanks you for contact Career Portals<br><br><br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 Career Portal. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

        $ci->email->initialize($config);

        $ci->email->from('youremail@domain.com', 'Career Portal');
        $ci->email->to($email);
        $this->email->reply_to('my-email@gmail.com', 'Career Mail');
        $ci->email->subject('verify email account');
        $ci->email->message($message);
        $ci->email->send();

        return true;
    }


 //send verification email to user's email id
    public function adminMail($adminmail,$name,$email,$feedback, $msg)
    {
        $ci = get_instance();
        $ci->load->library('email');
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "youremail@domain.com";
        $config['smtp_pass'] = "Romesh-shil";
        $config['charset']   = "utf-8";
        $config['mailtype']  = "html";
        $config['newline']   = "\r\n";

        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Name '.$name.',<br> <br>E-mail '.$email.',<br> <br>feedback '.$feedback.',<br>'.$msg.'<br><br><br>Goa a Question? Check out how works and our support team are ready to help.<br><br>© 2017 Career Portal. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

        $ci->email->initialize($config);

        $ci->email->from('youremail@domain.com', 'Career Portal');
        $ci->email->to($adminmail);
        $this->email->reply_to('my-email@gmail.com', 'Career Mail');
        $ci->email->subject('verify email account');
        $ci->email->message($message);
        $ci->email->send();

        return true;
    }


    }


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

 function sendEmail_JobRequest($to_email)
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
                
       
       // $str=" We are glad to inform you that your interview scheduled at 9.00PM.";
        
        $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;border:1px solid #f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
<table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
<br><br>Hi Dear,<br>Thank you for being a part of ConsultnHire leading jobs site.'.$to_email.'<br><br><br>You should receive an update form the employer very soon. If you have any queries please feel free to contact<br><br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';

       

        $ci->email->from('info@consultnhire.com', 'ConsultnHire');
        $ci->email->to($to_email);
        $ci->email->bcc('careerportal02@gmail.com');
       
        $this->email->reply_to('info@consultnhire.com', 'ConsultnHire');
        $ci->email->subject('Career Support Information');
        $ci->email->message($message);
        $ci->email->send();
   
        

        return true;
    }

    
    
    

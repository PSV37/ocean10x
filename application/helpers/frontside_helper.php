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

    
    
    

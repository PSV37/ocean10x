<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Consultant_autocomplete_model extends CI_Model
{
	function search_companies($title){
        $this->db->like('company_name', $title , 'both');
        $this->db->order_by('company_name', 'ASC');
        // $this->db->WHERE('status', '1');
        // $this->db->limit(10);
        return $this->db->get('company_profile')->result();
    }
}
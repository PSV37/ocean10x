<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends MY_Model {

 public function getUsername($company_username)
 {
  $this->db->where('company_username' , $company_username);
  $query = $this->db->get('company_profile');

  if($query->num_rows()>0){
   return true;
  }
  else {
   return false;
  }
 }
}
<?php  
 class Main_model extends MY_Model  
 {  
      function is_email_available($email)  
      {  
           $this->db->where('email', $email);  
           $query = $this->db->get("employee");  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      }  
 }  
 ?>  
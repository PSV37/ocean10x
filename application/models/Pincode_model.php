<?php
class Pincode_model extends MY_Model{
 
    function search_blog($title){
        $this->db->like('pincode', $pincode , 'both');
        $this->db->order_by('pincode', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pincode')->result();
    }
 
}
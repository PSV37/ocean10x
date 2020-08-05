<?php
class Pincode_model extends MY_Model{
 
    function search_pincode($pincode){
        $this->db->like('pincode', $pincode , 'both');
        $this->db->order_by('pincode', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pincode')->result();
    }


    public function getactive_cvs()
    {
    $sql = $this->db->query("SELECT * FROM corporate_cv_bank LEFT JOIN js_info on js_info.email = corporate_cv_bank.js_email LEFT JOIN js_login_logs on js_info.job_seeker_id = js_login_logs.job_seeker_id WHERE login BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW() and corporate_cv_bank.company_id='149' GROUP by 'cv_id'");
    return $sql->result();
    }


}
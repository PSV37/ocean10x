<?php
class Pincode_model extends MY_Model{
 
    function search_pincode($pincode){
        $this->db->like('pincode', $pincode , 'both');
        $this->db->order_by('pincode', 'ASC');
        $this->db->limit(10);
        return $this->db->get('pincode')->result();
    }


    public function getactive_cvs($company_id){
    $sql = $this->db->query("SELECT * FROM corporate_cv_bank LEFT  OUTER JOIN js_info on js_info.email = corporate_cv_bank.js_email LEFT OUTER  JOIN js_login_logs on js_info.job_seeker_id = js_login_logs.job_seeker_id WHERE login BETWEEN DATE_SUB(NOW(), INTERVAL 90 DAY) AND NOW() and corporate_cv_bank.company_id='$company_id' GROUP by cv_id");
    return $sql->result();
    }

    public function getactive_folder_cvs($company_id,$fid){
    $sql = $this->db->query("SELECT * FROM corporate_cv_bank LEFT  OUTER JOIN js_info on js_info.email = corporate_cv_bank.js_email LEFT OUTER  JOIN js_login_logs on js_info.job_seeker_id = js_login_logs.job_seeker_id left OUTER join cv_folder_relation on cv_folder_relation.cv_id = corporate_cv_bank.cv_id WHERE login BETWEEN DATE_SUB(NOW(), INTERVAL 90 DAY) AND NOW() and corporate_cv_bank.company_id='$company_id' and cv_folder_relation.cv_folder_id ='$fid' GROUP by corporate_cv_bank.cv_id");
    return $sql->result();
    }

    public function gettotal_cvs($company_id){
    $sql = $this->db->query("SELECT *  FROM corporate_cv_bank WHERE corporate_cv_bank.company_id='$company_id'  and js_status= '0'");
    return $sql->result();
    }



}
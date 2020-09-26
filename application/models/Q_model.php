<?php
class Q_model extends MY_Model{

	public function Total_questions_in_q_bank($company_id){
    $sql = $this->db->query("select count(*) from questionbank");
    return $sql->result();
    }

 }
<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Cron extends CI_controller {
	public function index()
	{
		$where =  "company_profile.create_at BETWEEN NOW() AND DATE_ADD(company_profile.create_at, INTERVAL 3 DAY) and company_status = '0'";
		$all_mails = $this->Master_model->getMaster('company_profile', $where , $join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
		print_r($all_mails);
		print_r($this->db->last_query());

	}

}
?>
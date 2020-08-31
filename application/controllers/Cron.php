<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Cron extends MY_Employer_Controller {
	public function index()
	{
		$where =  "company_profile.create_at BETWEEN NOW() AND DATE_ADD(company_profile.create_at, INTERVAL 3 DAY) and verify = 'N'";
		$all_mails = $this->Master_model->getMaster('company_profile', $where , $join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
		print_r($all_mails);

	}

}
?>
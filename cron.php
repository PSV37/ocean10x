<?php 

$where =  "company_profile.created_at BETWEEN NOW() AND DATE_ADD(company_profile.created_at, INTERVAL 3 DAY) and verify = 'N'";
$all_mails = $this->Master_model->getMaster('company_profile', $where , $join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
print_r($all_mails);
?>
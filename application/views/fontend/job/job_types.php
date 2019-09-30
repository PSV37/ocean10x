<?php 



  $company_profile_id = $this->session->userdata('company_profile_id');

 $jobseeker_id = $this->session->userdata('job_seeker_id');

        if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_header.php');

            }

        elseif($jobseeker_id != null) {

             $this->load->view('fontend/layout/seeker_header.php');

        } else {

    $this->load->view('fontend/layout/header.php');

    }

?>

<form action="<?php echo base_url() ?>job" method="post">
<div class="container job-search">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12 search-jobs-main-sec">
<div class="jobs-all clearfix">
  <h3>All Vacancy</h3>
</div>
<form id="submit" class="submit-form">
  <div class="col-md-6 col-sm-3 col-xs-12 col-md-offset-1">
    <div class="form-group">
      <label class="control-label">Keyword</label>
      <input name="keyword" type="text" class="form-control" placeholder="Keyword">
    </div>
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12">
    <div class="form-group form-select-section">
      <button type="submit" class="btn btn-default job-src"> Search Vacancy </button>
    </div>
  </div>
</form>
</div>
<?php $this->load->view('fontend/layout/jobsearch_leftbar.php'); ?>
<div class="col-sm-9 col-md-9 col-lg-9 jobsectionsbottom">
  <div class="clear"></div>
  <div class="panel panel-jobdisc">
    <div class="col-sm-6">
      <h4 class="refine-color">Job Description</h4>
    </div>
    <div class="col-sm-2">
      <h4 class="refine-color">Company</h4>
    </div>
    <div class="col-sm-2">
      <h4 class="refine-color">Location</h4>
    </div>
    <div class="col-sm-2">
      <h4 class="refine-color">Salary</h4>
    </div>
    <div class="clear"></div>
  </div>
  <?php 

                    

                    if (isset($alljobs['result']) && !empty($alljobs['result'])): foreach ($alljobs['result'] as $v_job) : ?>
  <?php



                         ?>
  <div class="jobsearch-main-content-body">
    <div class="col-sm-6 col-md-6">
      <div class="jobs-title"><a href="<?php echo base_url(); ?>job/show/<?php echo $v_job->job_slugs;?>"><?php echo $v_job->job_title ?></a></div>
      <div class="main-desc">
        <p><span>Job Description:</span> Job Responsibilities: IT technical support officers are mainly responsible for the</p>
      </div>
    </div>
    <div class="col-sm-2 col-md-2">
      <div class="company-logo">
        <?php $logo=$this->company_profile_model->company_logoby_id($v_job->company_profile_id);?>
        <img src="<?php echo base_url() ?>upload/<?php if(!empty($logo)) {echo $logo;} else {echo "notfound.gif";} ?>"> </div>
    </div>
    <div class="col-sm-2 col-md-2">
      <div class="company-locations">
        <?php $joblocation=$this->job_location_model->get($v_job->job_location); echo $joblocation->job_location_name;  ?>
      </div>
    </div>
    <div class="col-sm-2 col-md-2">
      <div class="emp-salary">
        <?php $salary=$this->job_salary_range_model->get($v_job->salary_range); echo $salary->salary_range_name;  ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <?php  endforeach;   ?>
  <?php else : ?>
  <!--get error message if this empty-->
  
  <td colspan="3"><strong>There is no record for display</strong></td>
  <!--/ get error message if this empty-->
  
  <?php

                    endif; ?>
  <?php //echo $links; ?>
  </p>
  <?php if($totalrow>=10): ?>
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <?php if($offset>0): ?>
      <li> <a href="<?php echo base_url('jobs/types/'.$job_types.'/'.($offset-1)); ?>" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
      <?php endif; ?>
      <?php 

                        $maxpage=ceil($totalrow/$limit);

                        for($i=0; $i<$maxpage; $i++): ?>
      <li><a class="<?php echo $offset==$i?'active':''; ?>" href="<?php echo base_url('jobs/types/'.$job_types.'/'.($i*$limit)); ?>"><?php echo $i+1; ?></a></li>
      <?php endfor; ?>
      <?php if($offset<$maxpage-1): ?>
      <li> <a href="<?php echo base_url('jobs/types/'.$job_types.'/'.($offset+1)); ?>" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
      <?php endif; ?>
      <?php ?>
    </ul>
  </nav>
  <?php endif; ?>
</div>
</div>
</div>
</form>
<?php $this->load->view("fontend/layout/footer.php"); ?>

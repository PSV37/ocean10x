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



<!-- Page Title start -->

<div class="pageTitle">

  <div class="container">

    <div class="row">

      <div class="col-md-6 col-sm-6">

        <h1 class="page-heading">About Us</h1>

      </div>

      <div class="col-md-6 col-sm-6">

        <div class="breadCrumb"><a href="#.">Home</a> / <span>About Us</span></div>

      </div>

    </div>

  </div>

</div>

<!-- Page Title End --> 

 <div class="job-search">

    <div class="container">

        <div class="col-md-12 col-sm-12 col-xs-12 search-jobs-main-sec">

            <div class="jobs-all clearfix">

            <form id="submit" action="<?php echo base_url() ?>job" method="post" class="submit-form">

                <div class="col-md-5 col-sm-5 col-xs-12">

                    <div class="form-group">
                        <label class="control-label">Keyword</label>
                        <input type="text" class="form-control" placeholder="Keyword" id="keyword">
                    </div>

                </div>

                <div class="col-md-5 col-sm-5 col-xs-12">

                    <label class="control-label">Location</label>

                    <select class="selectpicker" data-style="btn-default" data-live-search="true">

                      <option value=""> Select Locaiton</option>

                         <?php echo $this->job_location_model->selected(); ?>

                    </select>

                </div>

                <div class="col-md-2 col-sm-2 col-xs-12">

                    <div class="form-group form-select-section">

                        <button type="submit" class="btn btn-default job-src"> Search Vacancy </button>

                    </div>

                </div>                        

            </div>

        </div>

    </div>

</div>

<div class="container job-list-show">

    <div class="row">
    <?php $this->load->view('fontend/layout/jobsearch_leftbar.php'); ?>
        <div class="col-md-6 col-sm-6 all-job-list">
        <?php if (!empty($alljobs)): foreach ($alljobs as $v_job) : ?>
            <a href="<?php echo base_url(); ?>job/show/<?php echo $v_job->job_slugs;?>" class="main-area-job-list">

                <div class="heading-logo">
                <?php $logo=$this->company_profile_model->company_logoby_id($v_job->company_profile_id);?>
                    <h3><?php echo $v_job->job_title ?> <img src="<?php echo base_url() ?>upload/<?php if(!empty($logo)) {echo $logo;} else {echo "notfound.gif";} ?>" alt="" class="img-responsive pull-right"></h3>

                    <p class="name-company"><?php echo $v_job->job_position ?></p>
                    <p class="experience-location">
                        <span class="pull-left"><i class="fa fa-flask" aria-hidden="true"></i> <?php echo $v_job->preferred_age ?> Age</span>
                        <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php $joblocation=$this->job_location_model->get($v_job->job_location); echo $joblocation->job_location_name;  ?></span>
                    </p>
                </div>

                <div class="job-sor-description">

                    <p><span>Job Description:</span> Job Responsibilities: IT technical support officers are mainly responsible for the</p>

                </div>

                <div class="salary">
                    <p class="pull-left"><i class="fa fa-eur" aria-hidden="true"></i>  <?php echo $v_job->salary_range;?></p>
                    <p class="pull-right"> Posted  by <span><?php echo $this->company_profile_model->company_name($v_job->company_profile_id); ?></span> <?php echo date('d-m-Y',strtotime($v_job->created_at)); ?></p>
                </div>

            </a>

           <?php  endforeach;   ?>
            <?php else : ?> <!--get error message if this empty-->

            <td colspan="3">

                <strong>There is no record for display</strong>

            </td><!--/ get error message if this empty-->

        <?php

        endif; ?>



                    <?php //echo $links; ?></p>

                    <nav aria-label="Page navigation">

                        <ul class="pagination">

                        <?php if($offset>0): ?>

                            <li>

                                <a href="<?php echo base_url('job/page/'.($offset-1)); ?>" aria-label="Previous"> <span aria-hidden="true">«</span> </a>

                            </li>

                        <?php endif; ?>

                        <?php 

                        $maxpage=ceil($totalrow/$limit);

                        for($i=0; $i<$maxpage; $i++): ?>

                            <li><a class="<?php echo $offset==$i?'active':''; ?>" href="<?php echo base_url('job/page/'.($i*$limit)); ?>"><?php echo $i+1; ?></a></li>

                        <?php endfor; ?>

                        <?php if($offset<$maxpage-1): ?>

                            <li>

                                <a href="<?php echo base_url('job/page/'.($offset+1)); ?>" aria-label="Next"> <span aria-hidden="true">»</span> </a>

                            </li>

                        <?php endif; ?>

                            <?php ?>

                        </ul>

                    </nav>

                </div>

        </form>

        <div class="col-md-3 col-sm-3 job-list-page-add">
            <a href="#"><img src="<?php echo base_url() ?>fontend/images/venus.jpg"></a>
            <a href="#"><img src="<?php echo base_url() ?>fontend/images/venus.jpg"></a>
        </div>

    </div>

</div>

<script>
     $(function() {
      $("#keyword").autocomplete({
          source: "<?php echo base_url('job/get_keyword_suggesions'); ?>",
          select: function(a,b)
            {
                // alert(b.item.value);
                $(this).val(b.item.value); //grabed the selected value
            }
        });
    });
</script>

 <?php $this->load->view("fontend/layout/footer.php"); ?>
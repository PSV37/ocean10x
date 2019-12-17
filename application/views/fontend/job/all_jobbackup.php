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

<style>
h4.panel-title > .small, .panel-title > .small > a, .panel-title > a, .panel-title > small, .panel-title > small > a {
    color: #00A0C6 !important;
}
</style>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">All Vacancy</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>About Us</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->


<div class="listpgWraper">
<form id="allJobsearch" action="<?php echo base_url() ?>job" method="post">
        <div class="container">
            
            
            <div class="pageSearch">
      <div class="row">
        <!--<div class="col-md-3"><a href="#lookingjob" role="button" data-toggle="modal" class="btn"><i class="fa fa-file-text" aria-hidden="true"></i> Upload Your Resume</a></div>-->
        <div class="col-md-9">
          <div class="searchform">
            <div class="row">
              <div class="col-md-5 col-sm-4">
                <input name="keyword" type="text" class="keyword-form form-control" placeholder="Keyword" id="keyword">
              </div>
              <div class="col-md-6 col-sm-6 select-location-padding">
                <select name="location_name[]"  class="form-control" data-style="form-control" data-live-search="true">
                                <option value="" >Select Location</option>
                                   <?php echo $this->job_location_model->selected(); ?>
                            </select>
              </div>              
              
             
              <div class="col-md-1 col-sm-2">
                <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i> </button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
          
            <div class="row">
              
                <?php $this->load->view('fontend/layout/jobsearch_leftbar.php'); ?>

                <div class="col-md-6 col-sm-12"> 
                  <ul class="searchList">                    
                    <?php if (!empty($alljobs)): foreach ($alljobs as $v_job) : ?>
                    <!-- job start -->
                      <li>
                        <div class="row">
                          <div class="col-md-8 col-sm-8">
                            <div class="jobimg"><?php $logo=$this->company_profile_model->company_logoby_id($v_job->company_profile_id);?><img src="<?php echo base_url() ?>upload/<?php if(!empty($logo)) {echo $logo;} else {echo "notfound.gif";} ?>"></div>
                            <div class="jobinfo">
                              <h3><a href="<?php echo base_url(); ?>job/show/<?php echo $v_job->job_slugs;?>"><?php echo ucfirst($v_job->job_title); ?></a></h3>
                              <!--<div class="companyName"><a href="#.">Datebase Management Company</a></div>-->
                               <div class="companyName"><?php echo $v_job->company_name;?> </div>
                             <div class="location">Salary: <strong><?php echo $v_job->salary_range;?></strong></div>
                              
                            </div>
                            <div class="clearfix"></div>
                          </div>
                          <div class="col-md-4 col-sm-4">
                          	
                            <div class="listbtn"><a href="<?php echo base_url(); ?>job/show/<?php echo $v_job->job_slugs;?>">View Detail</a></div>
                          </div>
                        </div>
                        <p><?php echo strip_tags(substr($v_job->job_desc,0,120)); ?></p>
                        
                        <div class="greybox">
                      	<div class="infobox"><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php $joblocation=$this->job_location_model->get($v_job->job_location); echo $joblocation->country_name;  ?></span></div>
                        <div class="infobox"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo $v_job->experience;?> year(s)</div>
                        <div class="infobox"><i class="fa fa-calendar" aria-hidden="true"></i> <?php // echo $v_job->created_at; ?>
                        
                        <!-- <?php if(!is_null($v_job->created_at)) { echo date('F j Y',strtotime($v_job->created_at)); } ?> -->

                        <?php if(!is_null($v_job->created_at)) { $mtime = time_ago_in_php($v_job->created_at);
                            echo $mtime;} ?>
                        
                        </div>
                        <div class="infobox"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php $jobnature=$this->job_nature_model->get($v_job->job_nature); echo $jobnature->job_nature_name;?></div>            
                        <div class="clearfix"></div>
                      </div>
                        
                      </li>
                      <!-- job end -->                    
                    
                    
                    <?php  endforeach;   ?>
                    <?php else : ?> <!--get error message if this empty-->
                        <br>
                            <strong>No job found with this keyword
                            Sorry, could not find any matching job.
                            Please modify your search to get more results</strong>
                        
                    <?php
                    endif; ?>
                  </ul>    
                    <?php //echo $links; ?></p>
                  <div class="clearfix"></div>
                    <?php if($totalrow>=15): ?>

                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                        <?php    if($offset>0): ?>
                            <li>
                                <a href="<?php echo base_url('job/page/'.($offset-1)); ?>" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                            </li>
                        <?php endif; ?>

                        <?php 
                        $maxpage=ceil($totalrow/$limit); 
                        for($i=0; $i<$maxpage; $i++): ?>
                            <li><a class="<?php echo $offset==$i?'active':''; ?>" href="<?php echo base_url('job/page/'.$i); ?>"><?php echo $i+1; ?></a></li>
                        <?php endfor; ?>
                        <?php if($offset<$maxpage-1): ?>
                            <li>
                                <a href="<?php echo base_url('job/page/'.($offset+1)); ?>" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                            </li>
                        <?php endif; ?>
                            <?php ?>
                        </ul>
                    </nav>
                <?php endif; ?>
                </div>
           
        </div>
        </div>
 </form>
 </div>
<script type="text/javascript">
  $("li").lazyload({
      effect : "fadeIn"
  });
</script>
  <?php 

    if ($company_profile_id != null) {
    ?>


    <script type="text/javascript">
      $(document).ready(function(){
        $("#allJobsearch").on("change", "input:checkbox", function(){
            $("#allJobsearch").submit();
        });
      });
    </script>
   <script>
       $(function() {
        $("#keyword").autocomplete({
            source: "<?php echo base_url('job/get_keyword_suggesions'); ?>",
            select: function(a,b)
              {
                $(this).val(b.item.value); //grabed the selected value
              }
          });
      });
  </script>
  <?php $this->load->view("fontend/layout/footer.php"); ?>

  <?php
    }
    elseif($jobseeker_id != null) {
    ?>
    <?php $this->load->view("fontend/layout/footer.php"); ?>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#allJobsearch").on("change", "input:checkbox", function(){
            $("#allJobsearch").submit();
        });
      });
    </script>
   <script>
       $(function() {
        $("#keyword").autocomplete({
            source: "<?php echo base_url('job/get_keyword_suggesions'); ?>",
            select: function(a,b)
              {
                $(this).val(b.item.value); //grabed the selected value
              }
          });
      });
  </script>

  <?php
    } else {
  ?>
    <script type="text/javascript">
       $(document).ready(function(){
      $("#allJobsearch").on("change", "input:checkbox", function(){
          $("#allJobsearch").submit();
      });
  });
   </script>
   <script>
       $(function() {
        $("#keyword").autocomplete({
            source: "<?php echo base_url('job/get_keyword_suggesions'); ?>",
            select: function(a,b)
              {
                $(this).val(b.item.value); //grabed the selected value
              }
          });
      });
  </script>

   <?php $this->load->view("fontend/layout/footer.php"); ?>
  <?php
    }
  ?>


 
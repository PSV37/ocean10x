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

     $admin_id = $this->session->userdata('admin_user_id');

?>

<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Job Detail</h1>
      </div>
      <div class="col-md-6 col-sm-6"> </div>
    </div>
  </div>
</div>

<!-- Page Title End -->

<div class="listpgWraper">
  <div class="container">
    <div class="row">
      <div class="col-md-8"> 
        
        <!-- Job Description start -->
        
        <div class="job-header">
          <div class="contentbox">
            <div class="jobinfo">
              <?php if(!empty($admin_id)) {

                    echo '<a href="'.base_url().'/admin/jobs" class="btn btn-primary">Back </a>';

                    } ?>
              <br>
              <div class="row">
                <?php echo $this->session->flashdata('msg'); ?>
                <div class="col-md-7">
                  <h2 id="heading_2title"><?php echo $singlejob->job_title; ?></h2>
                  <div class="ptext">Date Posted: <?php  echo date('F j Y',strtotime($singlejob->created_at));?></div>
                  
                  <!-- <div class="salary">Monthly Salary: <strong>$500 - $3000</strong></div>--> 

            </div>
                <div class="col-md-5">
                  <div class="companyinfo">
                    <div class="title">Company Name <strong><?php echo $singlejob->company_name;?></strong></div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <ul class="jobinfolist">
                  <li>
                    <h4>Number of Position:</h4>
                    <strong><?php echo $singlejob->no_jobs; ?></strong></li>
                  <li>
                    <h4>Expected Domain:</h4>
                    <strong><?php echo $singlejob->job_category_name; ?></strong></li>
                  <li>
                    <h4>Job Level:</h4>
                    <strong><?php echo $singlejob->job_level_name; ?></strong></li>
                  <?php /*?><li><h4>Job Type:</h4> <strong><?php echo $singlejob->job_types_name; ?></strong></li><?php */?>
                  <li>
                    <h4>Working Hours:</h4>
                    <strong><?php echo $singlejob->working_hours; ?></strong></li>
                  <li>
                    <h4>Work Experience </h4>
                    <strong> <?php echo $singlejob->experience;?></strong></li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul class="jobinfolist">
                  <li>
                    <h4>Compensation Range:</h4>
                    <strong>Rs.<?php echo $singlejob->salary_range; ?></strong></li>
                  <li>
                    <h4>Job Locations:</h4>
                    <strong><?php echo $singlejob->city_id; ?></strong></li>
                  <!-- <li>
                    <h4>Preferred Age:</h4> 
                    <strong><?php echo $singlejob->preferred_age; ?> (years)</strong></li> -->
                  <li>
                    <h4>Required Education:</h4>
                    <strong> <?php echo $singlejob->education_level_name.'('.$singlejob->education_specialization.')'; ?></strong></li>
                  <li>
                    <h4>Engagement Model:</h4>
                    <strong> <?php echo $this->job_nature_model->get_job_nature_by_id($singlejob->job_nature);?> </strong></li>
                </ul>
              </div>
            </div>
            <h3>Job Description (JD)</h3>
            <pre><?php echo $singlejob->job_desc; ?></pre>
            <h3>Other Expected Skills</h3>
            <pre><?php echo $singlejob->education; ?></pre>
            <h3>Company Benefits Offered </h3>
            <pre><?php echo $singlejob->benefits; ?></pre>
            <hr>
            <div class="jobButtons">
			      <?php if ($singlejob->job_deadline > date('Y-m-d')): ?>
            <?php  if(!$this->session->userdata('company_profile_id')):?>
            <?php  $jobseeker_id;
                if($jobseeker_id==null): ?>
              <a href="<?php echo base_url(); ?>job-apply/<?php echo $singlejob->job_slugs; ?>" class="btn apply">Apply For This Vacancy</a>

              <a href="<?php echo base_url(); ?>save-job/<?php echo $singlejob->job_slugs; ?>" class="btn btn-info">Save This Jobs</a>

              <?php else: 
                ?>
              
              <a href="#" data-toggle="modal" data-target="#ApplyJob"  class="btn apply">  Apply For This Vacancy</a>
                <?php $saved = getsavedjobsdetails($singlejob->job_post_id,$jobseeker_id); 
                  if(!empty($saved)) {
                    echo '<div class="deadlinie"><b style="color:green">Saved Job</b> </div>';
                  }else{
                ?>
                  <a href="<?php echo base_url(); ?>job/save_my_job/<?php echo $singlejob->job_slugs; ?>" class="btn btn-info">Save This Job</a>
              <?php } ?>
              <?php endif; ?>
              <?php endif; ?>
			  <div class="deadlinie">Job Deadline : <!-- <?php echo $singlejob->job_deadline; ?> --><?php  echo date('F j Y',strtotime($singlejob->job_deadline));?></div>
			
			  <?php else: ?>
              <div class="deadlinie">Job Deadline : <b style="color:red">Expired</b>   </div>
			  <?php endif; ?>
            </div>
          </div>
        </div>
        
        <!-- Job Description end --> 
        
        <!-- related jobs start -->
        
        <div class="relatedJobs">
          <h3>Related Jobs</h3>
          <ul class="searchList">
            <?php 

      		  	if($radom_jobs): foreach($radom_jobs as $row_related):

      		  ?>
            
            <!-- Job start -->
            
            <li>
              <div class="row">
                <div class="col-md-8 col-sm-8">
                  <div class="jobimg"> <img src="<?php echo base_url() ?>upload/<?php echo (!empty($row_related->company_logo)?$row_related->company_logo:"notfound.gif"); ?>"> </div>
                  <div class="jobinfo">
                    <h3><a href="<?php echo $row_related->job_slugs;?>"><?php echo $row_related->job_title;?></a></h3>
                    <div class="companyName"><a href="<?php echo site_url();?>selected-cv/<?php echo $row_related->company_slug;?>"><?php echo $row_related->company_name;?></a></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="col-md-4 col-sm-4">
                  <div class="listbtn"><a href="<?php echo $row_related->job_slugs;?>">Apply Now</a></div>
                </div>
              </div>
              <p><?php echo substr(strip_tags($row_related->job_desc),0,130);?>...</p>
              <div class="greybox">
                <div class="infobox"><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php echo $row_related->job_location_name;?></span></div>
                <div class="infobox"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo $row_related->experience;?> years</div>
                <div class="infobox"><i class="fa fa-calendar" aria-hidden="true"></i> Posted : <!-- <?php echo $row_related->created_at;  ?> -->
                 <?php if(!is_null($row_related->created_at)) { $mtime = time_ago_in_php($row_related->created_at);
                            echo $mtime;} ?>

              </div>
                <div class="infobox"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row_related->job_nature_name;?></div>
                <div class="clearfix"></div>
              </div>
            </li>
            
            <!-- Job end -->
            
            <?php endforeach; endif;?>
          </ul>
        </div>
      </div>
      
      <!-- related jobs end -->
      
      <div class="col-md-4"> 
        
        <!-- Job Detail start -->
        
        <div class="job-header">
          <div class="jobdetail">
            <?php $ads_right = get_ads('rightside');
 
 if($ads_right): foreach($ads_right as $row_right):?>
            <div class="adbanner2"><a href="<?php echo $row_right->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$row_right->ad_image); ?>" alt=""></a></div>
            <?php endforeach; endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->

<div id="ApplyJob" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Apply Job</h4>
      </div>
      <div class="modal-body">
        <form  class="form-horizontal" action="<?php echo base_url() ?>job/apply_job" method="post" style="padding: 30px;">
          <input type="hidden" name="forward_status" class="form-control" id="forward_status" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['forword_job_status'];
          } }?>" placeholder="">
          <input type="hidden" name="job_apply_id" class="form-control" id="job_apply_id" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['job_apply_id'];
          } }?>" placeholder="">
                   
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">User Name:</label>
            <div class="col-sm-8">
              <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""

                   value="<?php if(!empty($jobseeker_id)){ echo $this->Job_seeker_model->jobseeker_name($jobseeker_id);} ?>">
            </div>
          </div>
          <input type="hidden" name="job_seeker_id" value="<?php echo $jobseeker_id ?>">
          <input type="hidden" name="job_post_id" value="<?php echo $singlejob->job_post_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Company Name:</label>
            <div class="col-sm-8">
              <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$singlejob->company_profile_id;
                         echo $this->company_profile_model->company_name($company_id);?>">
            </div>
          </div>
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"> Expected Salary:</label>
            <div class="col-sm-8">
              <input type="text" name="expected_salary" required class="form-control" id="avaliable" placeholder="Expected Salary"

                   >
            </div>
          </div>
          <?php $test=$singlejob->is_test_required;
            if ($test=='Yes') {
          ?>
          <div><b>Note: This job has a Online Test.</b></div>
          <div class="panel-body"></div>
        <?php }else{} ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){

    var text = $('#heading_title').text();

    var text_array = text.split(" ");

    var element = "<p class='main-title'>";

    for(var i =0 ; i< text_array.length; i++){

        //alert(text_array[i][0]);

        var split_text = "";

        for(var j =1; j< text_array[i].length; j++){

            split_text+=text_array[i][j];

        }

        element += "<span class='s'>"+text_array[i][0]+"</span>"+split_text+"&nbsp";

        

    }

    element+="</p>";

    $("#heading_title").html(element);

  })

</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>

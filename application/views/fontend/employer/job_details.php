<?php 
  $this->load->view('fontend/layout/employer_header.php');
  foreach ($total_applicantlist as $v_applicant)
  {
   $array_id[]= $v_applicant->job_seeker_id;
  }

?>
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="viewrevdet">
        <div class="post-padding">

        	<h4>Job Title: <?php echo $job_details->job_title; ?></h4>
        	
            <div class="rsumeinfo">
            	<div class="row">
                	<div class="col-md-7 col-sm-6">
                    	<div class="jbinfo">
                        	<strong>Job Status</strong><br>
                         
                          <?php 
                          // if($job_details->job_status=="1")
                          if ($job_details->job_deadline > date('Y-m-d'))
                            {
                              echo '<span class="label label-success">Live</span>';}
                            else {
                              echo '<span class="label label-danger">Expired</span>';
                            }
                          ?>
                          
                        </div>
                        <div class="jbinfo">
                        	<strong>Job Type</strong><br>
                            <span class=""><i class="fa fa-file-text-o" aria-hidden="true"></i> <?=$job_details->job_types_name;?></span>
                        </div>
                        <div class="jbinfo">
                        	<strong>Published On</strong><br>
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo date('F j Y',strtotime($job_details->created_at));?></span>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                    	<div class="moreint">
                        <div class="row">
                					<div class="col-md-6 col-sm-6">
                          	<i class="fa fa-search" aria-hidden="true"></i>
                              <span>Search Views</span>
                              <strong><?=$job_details->search_view;?></strong>
                          </div>
                          <div class="col-md-6 col-sm-6">                                    	
                          	<i class="fa fa-file-o" aria-hidden="true"></i>
                              <span>Applicants</span>
                              <strong> <?php echo $this->job_apply_model->count_job_apply($job_id,$company_id);?></strong>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            
            
          <div class="postviewbox">
          	<h4>All Resume</h4>
          	
            <ul class="countlist row">
            	<li class="col-md-2 col-sm-4 col-xs-6">
                	<div class="countcirc"><a href="<?php echo base_url() ?>employer/all-applicants/<?php echo $job_id;?>" class="active">
                    <?php echo $this->job_apply_model->count_job_apply($job_id,$company_id);?>
                  </a>  </div>
                    <h6>All list</h6>
                </li>
                <li class="col-md-2 col-sm-4 col-xs-6">
                	<div class="countcirc"><a href="<?php echo base_url() ?>employer/view_resumelist/<?php echo $job_id; ?>">
                    <?php echo $this->job_apply_model->count_resume_view($job_id,$company_id);?>
                  </a></div>
                    <h6>View</h6>
                </li>
                <li class="col-md-2 col-sm-4 col-xs-6">
                	<div class="countcirc"><a href="<?php echo base_url() ?>employer/not_view_resumelist/<?php echo $job_id; ?>">
                    <?php echo $this->job_apply_model->count_resume_not_view($job_id,$company_id);?>
                  </a> </div>
                    <h6>Not View</h6>
                </li>
                <li class="col-md-2 col-sm-4 col-xs-6">
                	<div class="countcirc"><a href="<?php echo base_url() ?>employer/sortlist-cv/<?php echo $job_id; ?>">
                    <?php echo $this->job_apply_model->count_job_apply_sortedlist($job_id,$company_id);?>
                  </a> </div>
                    <h6>Short Listed</h6>
                </li>
                <li class="col-md-2 col-sm-4 col-xs-6">
                	<div class="countcirc"><a href="<?php echo base_url() ?>employer/interview-cv/<?php echo $job_id; ?>">
                    <?php echo $this->job_apply_model->count_job_apply_inteviewlist($job_id,$company_id);?>
                  </a></div>
                    <h6>Interview</h6>
                </li>
                <li class="col-md-2 col-sm-4 col-xs-6">
                	<div class="countcirc"><a href="<?php echo base_url() ?>employer/final-cv/<?php echo $job_id; ?>">
                    <?php echo $this->job_apply_model->count_job_apply_finallist($job_id,$company_id);?>
                  </a></div>
                    <h6>Final list</h6>
                </li>
                
            </ul>          
          </div>
          
          <hr>
          
          <div class="totalcandi">Total Candidates <span><?php echo $this->job_apply_model->count_job_apply($job_id,$company_id);?></span></div>
          
          <div class="sortbycad">
          	<div class="row">
            	<div class="col-md-4"><strong>Download this List: <a href="#" onclick="download_cv_all(<?php $array_id; ?>);"><i class="fa fa-file-word-o" aria-hidden="true"></i></a></strong></div>
               
          	</div>
          </div>
            
            
                      
          <ul class="viewseekers">
          	<?php $i=1; if (!empty($total_applicantlist)): foreach ($total_applicantlist as $v_applicant) : $seeker_info=$this->job_seeker_model->applicant_job_seeker($v_applicant->job_seeker_id);?>
          	<li>
            	<div class="row">
                	<!--<div class="col-md-2">
                      <?php if (!empty($seeker_info->photo_path)):  ?>
                      <img src="<?php echo base_url(); ?>upload/<?php echo $seeker_info->photo_path; ?>" />
                      <?php else:?>
                      <img src="<?php echo base_url() ?>upload/compnay/company.png" alt="company Image">
                      <?php endif; ?>
                    </div>-->
                    <div class="col-md-4">
                    	<h3><a target="_blank" href="<?php echo base_url() ?>employer/view_resume/<?php echo $v_applicant->job_seeker_id."/".$job_id; ?>"><?php echo $seeker_info->full_name; ?></a></h3>
                        <div class="uniname"><?= $this->Job_seeker_education_model->education_list_by_id($v_applicant->job_seeker_id)[0]->js_institute_name;?></div>
                        <div class="uniname"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $seeker_info->mobile; ?></div>
                        <div class="uniname"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $seeker_info->email; ?> </div>
                    </div>

                   <div class="col-md-4">
                      <?php $exp=($this->Job_seeker_experience_model->experience_list_by_id($v_applicant->job_seeker_id));?>

                    	 <!--<div class="exp">
						            <label>Company Name</label>
                        <?=(!empty($exp[0]->company_name)?'<strong>'.$exp[0]->company_name.'</strong>':'');?></strong>
							         <!--<div>
                            <?=(!empty($exp[0]->company_name)?''.$exp[0]->designation.'('.$exp[0]->duration.')':'');?></strong>
                            </div>
                        </div>
                        <div class="exp">
                        	<?=(!empty($exp[1]->company_name)?'<strong>'.$exp[1]->company_name.'</strong>':'');?></strong>
                          <?=(!empty($exp[1]->company_name)?''.$exp[1]->designation.'('.$exp[1]->duration.')':'');?></strong>
                        </div>-->
                    </div>
                    <?php $career = ($this->job_career_model->js_careerinfo_by_seeker($v_applicant->job_seeker_id));?>
                    <div class="col-md-2">
                    	<div class="moreinfo"><i class="fa fa-briefcase" aria-hidden="true"></i><?=(!empty($career[0]->js_career_exp)?$career[0]->js_career_exp:'');?></div>
                        <div class="moreinfo"><i>Rs.</i> 
                          <?php echo $this->job_apply_model->expedited_salary($v_applicant->job_seeker_id,$job_id)[0]->expected_salary; ?> 
                        </div>
                        <div class="sorted">
              						<?php
              							if($v_applicant->apply_status == 0)
              							{ ?>
                          <span class="label label-warning">
                            <?php echo 'Not Shorted' ?>
                          </span>
                          <?php } elseif($v_applicant->apply_status == 1) { ?>
                          <span class="label label-primary">
                            <?php echo 'Shorted' ?>
                          </span>
                          <?php } elseif($v_applicant->apply_status == 2) { ?>
                          <span class="label label-primary">
                            <?php echo 'Interview' ?>
                          </span>
                          <?php } elseif($v_applicant->apply_status == 3) { ?>
                          <span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i>
                            <?php echo 'Final' ?>
                          </span>
                          <?php } ?>
                        </div>
                          
                        <a href="<?php echo base_url() ?>employer/downloadcv/<?php echo $v_applicant->job_seeker_id; ?>" class="downcv" title="Download CV">
                        	<i class="fa fa-download" aria-hidden="true"></i> Download
                      	</a>
                          
                          
                    </div>
                    <div class="col-md-2">
                    	
                      <div class="action">
                        <?php 
            							if($v_applicant->apply_status==0){
            							echo btn_sorted('employer/update_sortlist/' . $v_applicant->job_apply_id.'/'. base64_encode($seeker_info->email)).'<br> short listed '; }
            							else if($v_applicant->apply_status==1) {
            							echo btn_interview('employer/update_interviewlist/' . $v_applicant->job_apply_id.'/'. base64_encode($seeker_info->email)).'<br> interview list';
            							} 
            							else if($v_applicant->apply_status==2) {
            							echo btn_final('employer/update_finallist/' . $v_applicant->job_apply_id.'/'. base64_encode($seeker_info->email)).'<br> final list';
            							} 
            							else if($v_applicant->apply_status==3) {
            							echo '<span class="label label-primary"><i class="fa fa-check" aria-hidden="true"></i> Selected</span>';
            							} 
							          ?>
							        </div>
                      <a href="<?php echo base_url() ?>employer/reject-resume/<?php echo $v_applicant->job_seeker_id; ?>" class="reject"><i class="fa fa-times" aria-hidden="true"></i> <strong>Reject</strong> 
                      </a>  <br>

                     
                      
                    </div>
                    <div class="col-md-6">
                      <?php if($v_applicant->forword_job_status==1){ ?>
                       <a class="btn btn-info btn-xs">Forwared</a>
                      <?php }else if($v_applicant->forword_job_status==2){ ?>
                        <a class="btn btn-success btn-xs">Forwared And Applied</a>
                      <?php } else{?>
                        <a class="btn btn-success btn-xs">Normal Applied</a>
                      <?php } ?>
                    </div>
                    <div class="col-md-6">
                      <?php if($job_details->is_test_required=='Yes'){ ?>
                        <?php if($v_applicant->is_test_done==1){ ?>
                          <a class="btn btn-info btn-xs">Test Completed</a>
                        <?php } else{?>
                           <a class="btn btn-danger btn-xs">Test Not Completed</a>
                        <?php } ?>
                      <?php } ?>
                        
                    </div>
                    <div class="panel-body"></div>
                     <div class="col-md-12">
                     
                    <?php if($v_applicant->is_test_done==1){ ?>
                      <b>Schedule interviews through Ocean:</b>
                      <a href="#" class="btn btn-info btn-xs getformbylevel"  data-level_id='<?php echo $v_applicant->job_apply_id; ?>' title="Set Up Interview" data-toggle="modal" data-target="#schedule_interview"><strong>Set Up Interview</strong> 
                      </a>
                    
                        <table class="table">
                            <thead>
                              <tr>
                                <th> Date</th>
                                <th> Start Time</th>
                                <th> End Time</th>
                                <th> Interview Type</th>
                                <th> Interview Details</th>
                                <th> Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php if(!empty($interview_data)) {foreach ($interview_data as $introw) {
                                
                                if($introw['job_seeker_id']==$v_applicant->job_seeker_id)
                                {
                              ?>
                              <tr>
                                <td><?php echo $introw['interview_date']; ?></td>
                                <td><?php echo $introw['start_time']; ?></td>
                                <td><?php echo $introw['end_time']; ?></td>
                                <td><?php echo $introw['interview_type']; ?></td>
                                <td><?php echo $introw['interview_details']; ?></td>
                                <td> <a href="#" class="btn btn-success btn-xs geteditformbylevel"  data-level_id='<?php echo $v_applicant->job_apply_id.'|'.$introw['id']; ?>' title="Reschedule Interview" data-toggle="modal" data-target="#update_schedule_interview"><strong>Reschedule Interview</strong> </a></td>
                              </tr>
                            <?php } } }else{ echo "<td>No Data Found</td>";}?>
                            </tbody>
                        </table>
                      <?php } ?>
                    </div>
                </div>
            </li>
            <?php
endforeach;
?>

<?php else : ?> 
<!--get error message if this empty-->
<li>
<strong>There is no data to display</strong>
</li>
<!--/ get error message if this empty-->
<?php endif; ?>

          </ul>
           
          
          <!-- end row -->
        </div>
        
        </div>
        <!-- end post-padding -->
      </div>
    </div> 
    <!--end row -->
  </div>
  <!-- end container -->
</div>
<!-- end section -->

<div id="schedule_interview" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Invite to interview</h4>
      </div>
      <div class="modal-body interview_frm">
    
      </div>
   
    </div>

  </div>
</div>

<div id="update_schedule_interview" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" align="center">Invite to interview</h4>
      </div>
      <div class="modal-body upinterview_frm">
    
      </div>
   
    </div>

  </div>
</div>
<script>
function download_cv_all(array_id){
var jArray= <?php echo json_encode($array_id); ?>;
var total=<?php echo count($array_id); ?>;

    for(var i=0;i<total;i++){
   var launch_code = "http://yourdomain.com/employer/downloadcv/"+jArray[i];
         window.open(launch_code, '_blank');
     
    }
}

$(".getformbylevel").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //(... rest of your JS code)
    var job_apply_id = $(this).data('level_id');
     $.ajax({
              url: "<?php echo base_url();?>Employer/interview_scheduler",
              type: "POST",
              data: {job_apply_id:job_apply_id},
          
              success: function(data)
              {
                $('.interview_frm').html(data);
                // Display Modal
                $('#schedule_interview').modal('show'); 
                // $( "#datepicker" ).datepicker();
                $(".datepicker").datepicker({
                  dateFormat: 'dd-mm-yy'     
                });
            
              }
        });
       
});

$(".geteditformbylevel").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //(... rest of your JS code)
    var int_apply_id = $(this).data('level_id');
    var level_id = int_apply_id.split('|');
    var apply_id = level_id[0];
    var int_id = level_id[1];

     $.ajax({
              url: "<?php echo base_url();?>Employer/update_interview_scheduler",
              type: "POST",
              data: {apply_id:apply_id,interview_id:int_id},
          
              success: function(data)
              {
                $('.upinterview_frm').html(data);
                // Display Modal
                $('#update_schedule_interview').modal('show'); 
                // $( "#datepicker" ).datepicker();
                $(".datepicker").datepicker({
                  dateFormat: 'dd-mm-yy'     
                });
            
              }
        });
       
});
</script>

<!-- <style>
  .datepicker{z-index:1151 !important;}
</style>  -->
<?php $this->load->view("fontend/layout/footer.php"); ?>

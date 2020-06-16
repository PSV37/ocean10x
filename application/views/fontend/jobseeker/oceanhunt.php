


<!---header---->

<?php 
    $this->load->view('fontend/layout/new_seeker_header.php');

?> 
    
<!---header end--->

<div class="container-fluid">
	<div class="container">
        <div class="col-md-12">
        	<?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
            <div class="col-md-9 ocen-activities">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#activity1">Invitations</a></li>
    <li><a data-toggle="tab" href="#activity2">Applications</a></li>
    <li><a data-toggle="tab" href="#activity3">Interview</a></li>
    <li><a data-toggle="tab" href="#activity4">Calender</a></li>
    
  </ul>

  <div class="tab-content">
    <div id="activity1" class="tab-pane fade in active">
       
           <?  if (!empty($forward_applicationlist)): foreach ($forward_applicationlist as $forward_applicaiton) :
                // for ($i=0; $i <sizeof($forward_applicationlist) ; $i++) { 
                $singlejob    = $this->job_posting_model->get_job_details_employer($forward_applicaiton->job_post_id);


                            $sr_no++; ?>
                        <div class="invi-div">
                            <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($forward_applicaiton->company_id); ?>" class="invitation-img"/>
                            <div class="info-invitation">
                                <p class="head-invi"><?php echo $this->job_posting_model->job_title_by_name($forward_applicaiton->job_post_id); ?></p>

                                <span class="salary-info">Slaray: <?php echo $this->job_posting_model->job_salary_by_id($forward_applicaiton->job_post_id); ?><span>

                                <p>Company name:<?php echo $this->company_profile_model->company_name($forward_applicaiton->company_id); ?></p>
                                 <div class="detail-b"><a href="<?php echo base_url(); ?>job/show/<?php echo $forward_applicaiton->job_slugs; ?>">Details</a></div>
                                    <div class="last-row-invitation">
                                    <ul>
                                        <li><div class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $forward_applicaiton->city_id;  ?></div></li>
                                       <li> <div class="year-inv"><i class="fas fa-save"></i>&emsp;<?php echo $forward_applicaiton->experience;  ?> years</div></li>
                                        <li> <div class="calender-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($forward_applicaiton->created_at)) { $mtime = time_ago_in_php($forward_applicaiton->created_at);
                            echo $mtime;} ?></div></li>
                                        <li> <div class="fulltime-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $forward_applicaiton->job_nature_name;  ?></div></li>
                                    </ul>
                                    </div>
                            
                                <button class="apply-invi" data-toggle="modal" data-target="#ApplyJob1<?php echo $forward_applicaiton->job_post_id; ?>">Apply</button>
                            </div>
                            <div class="clear"></div>   
                              </div>
                        <?php
                  // $sr_no++;
                   // }

              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
           
                        
     
        <div class="btn-more">
                <button class="more-btn">show more</button>
                </div>
   </div>


   <?php foreach ($forward_applicationlist as $applicaiton) : ?>
 <div id="ApplyJob1<?php echo $applicaiton->job_post_id; ?>" class="modal fade" role="dialog">
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
                   <?php
               $job_seeker=$this->session->userdata('job_seeker_id');
          $js_name= $this->Job_seeker_model->jobseeker_name($job_seeker); ?>
         

          <input type="hidden" name="job_seeker_id" value="<?php echo $job_seeker ?>">
          <input type="hidden" name="job_post_id" value="<?php echo $applicaiton->job_post_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Company Name:</label>
            <div class="col-sm-8">
              <input type="text" name="company_name" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$applicaiton->company_profile_id;
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
          <?php $test=$applicaiton->is_test_required;
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
<?php  endforeach;  ?>


    <div id="activity2" class="tab-pane fade">
     
           <?  if (!empty($applicationlist)): foreach ($applicationlist as $forward_applicaiton) :
                // for ($i=0; $i <sizeof($forward_applicationlist) ; $i++) { 
                $singlejob    = $this->job_posting_model->get_job_details_employer($forward_applicaiton->job_post_id);
                // print_r($forward_applicaiton->job_post_id);
                $salary= $this->job_posting_model->job_salary_by_id($forward_applicaiton->job_post_id); 
                // print_r($salary);


                            $sr_no++; ?>
                        <div class="invi-div">
                            <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($forward_applicaiton->company_id); ?>" class="invitation-img"/>
                            <div class="info-invitation">
                                <p class="head-invi"><?php echo $this->job_posting_model->job_title_by_name($forward_applicaiton->job_post_id); ?></p>

                                <span class="salary-info">Salaray: <?php print_r($this->job_posting_model->job_salary_by_id($forward_applicaiton->job_post_id)) ;  ?><span>

                                <p>Company name:<?php echo $this->company_profile_model->company_name($forward_applicaiton->company_id); ?></p>
                                 <a href="<?php echo base_url(); ?>job/show/<?php echo $v_companyjobs->job_slugs; ?>"><div class="detail-b">Details</div></a>
                                    <div class="last-row-invitation">
                                    <ul>
                                        <li><div class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $forward_applicaiton->city_id;  ?></div></li>
                                       <li> <div class="year-inv"><i class="fas fa-save"></i>&emsp;<?php echo $forward_applicaiton->experience;  ?> years</div></li>
                                        <li> <div class="calender-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($forward_applicaiton->created_at)) { $mtime = time_ago_in_php($forward_applicaiton->created_at);
                            echo $mtime;} ?></div></li>
                                        <li> <div class="fulltime-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $forward_applicaiton->job_nature_name;  ?></div></li>
                                    </ul>
                                    </div>
                            
                                <button class="apply-invi" data-toggle="modal" data-target="#ApplyJob2<?php echo $forward_applicaiton->job_post_id; ?>">Apply</button>
                            </div>
                            <div class="clear"></div>   
                              </div>
                        <?php
                  // $sr_no++;
                   // }

              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
       
        <div class="btn-more">
                <button class="more-btn">show more</button>
                </div>
    </div>
   
    <div id="activity3" class="tab-pane fade">
    </div>
    
     <div id="activity4" class="tab-pane fade">
    </div>
   
   
   
  </div>
</div>
      </div>
      
 </div>           
			
 <?php foreach ($applicationlist as $applicaiton) : ?>
 <div id="ApplyJob2<?php echo $applicaiton->job_post_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog"> 
    
    <!-- Modal content-->
    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Apply Job</h4>
      </div>
        <?php
               $job_seeker=$this->session->userdata('job_seeker_id');
          $js_name= $this->Job_seeker_model->jobseeker_name($job_seeker); ?>
      <div class="modal-body">
        <form  class="form-horizontal" action="<?php echo base_url() ?>job/apply_job" method="post" style="padding: 30px;">

          <input type="hidden" name="forward_status" class="form-control" id="forward_status" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['forword_job_status'];
          } }?>" placeholder="">

          <input type="hidden" name="job_apply_id" class="form-control" id="job_apply_id" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['job_apply_id'];
          } }?>" placeholder="">
                   
         
          <input type="hidden" name="job_seeker_id" value="<?php echo $job_seeker ?>">
          <input type="hidden" name="job_post_id" value="<?php echo $applicaiton->job_post_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Company Name:</label>
            <div class="col-sm-8">
              <input type="text" name="company_name" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$applicaiton->company_profile_id;
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
          <?php $test=$applicaiton->is_test_required;
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
<?php  endforeach;  ?>
 
 
 
  
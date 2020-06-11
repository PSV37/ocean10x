


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
                                 <div class="detail-b">Details</div>
                                    <div class="last-row-invitation">
                                    <ul>
                                        <li><div class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $forward_applicaiton->city_id;  ?></div></li>
                                       <li> <div class="year-inv"><i class="fas fa-save"></i>&emsp;<?php echo $forward_applicaiton->experience;  ?> years</div></li>
                                        <li> <div class="calender-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($forward_applicaiton->created_at)) { $mtime = time_ago_in_php($forward_applicaiton->created_at);
                            echo $mtime;} ?></div></li>
                                        <li> <div class="fulltime-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $forward_applicaiton->job_nature_name;  ?></div></li>
                                    </ul>
                                    </div>
                            
                                <button class="apply-invi">Apply</button>
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
                                 <div class="detail-b">Details</div>
                                    <div class="last-row-invitation">
                                    <ul>
                                        <li><div class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $forward_applicaiton->city_id;  ?></div></li>
                                       <li> <div class="year-inv"><i class="fas fa-save"></i>&emsp;<?php echo $forward_applicaiton->experience;  ?> years</div></li>
                                        <li> <div class="calender-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($forward_applicaiton->created_at)) { $mtime = time_ago_in_php($forward_applicaiton->created_at);
                            echo $mtime;} ?></div></li>
                                        <li> <div class="fulltime-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $forward_applicaiton->job_nature_name;  ?></div></li>
                                    </ul>
                                    </div>
                            
                                <button class="apply-invi">Apply</button>
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
			
 
 
 
 
  
<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/cv_bank.css">
<?php $this->load->view('fontend/layout/employer_new_header.php');?>  


<!---header--->


<div class="container-fluid main-d">
	<div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
        <div class="col-md-9 cv-bank-section">
          <form action="/action_page.php">
            <button class="sort-serach" type="submit"><i class="fas fa-search"></i></button>
				    <input type="text" placeholder="Search.." name="search">
   		    </form>
            
          <button class="all-btn sort-active">All</button>
          <button class="all-btn">sort</button>
          <a href="<?php echo base_url() ?>employer/add-new-cv"><button class="btn btn-primary">Add New CV</button></a>

           <?php $key = 1; if (!empty($cv_bank_data)): foreach ($cv_bank_data as $cv_row) : 
           $on_ocean = $cv_row['ocean_candidate'];
                 if($on_ocean == 'Yes')
                 {
                    $resume = getUploadedResume($cv_row['js_email']);
                    $photo = getSeekerPhoto($cv_row['js_email']);
                    $updates = getSeekerlastUpdates($cv_row['js_email']);
                    if (!empty($updates)) {
                      if($updates[0]['update_at']=='0000-00-00 00:00:00') { 
                        $mtime = date('d-M-y',strtotime($updates[0]['create_at']));
                      } else{
                        $mtime = date('d-M-y',strtotime($updates[0]['update_at']));
                      }
                    }else{
                      $mtime = date('d-M-y',strtotime($cv_row['created_on']));
                    }
                 }else{
                  $mtime = date('d-M-y',strtotime($cv_row['created_on']));
                 }
                
                ?>
          <div class="section">
            <div class="job-voucher alert alert-dismissible">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <?php
                if($on_ocean == 'Yes')
                  {
                    if(!empty($photo)){ ?>
                    <img src="<?php echo  base_url(); ?>upload/<?php if(!empty($photo[0]['photo_path'])){echo $photo[0]['photo_path'];} ?>" class="dimen_img-s" />
                    <?php }else{ ?>
                    <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" class="dimen_img-s" />
                    <?php } 
                    }else{?>
                    <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" class="dimen_img-s" />
                    <?php } ?>

                    <div class="job_title">
                      <?php echo $cv_row['js_name']; ?>
                    </div> 
                    <div class="organization">
                      Email: <?php echo $cv_row['js_email']; ?>
                    </div>
                    <div class="location">
                      Mobile no: <?php echo $cv_row['js_mobile']; ?>
                    </div>
                         
                    <button class="job_dis_btn" onclick="myFunction()">Details</button>
                    <a href="<?php echo base_url(); ?>employer/getocean_profile/<?php echo base64_encode($cv_row['js_email']); ?>"><button class="get_cv">get Ocean Profile</button></a>
                    
                    
                    
            </div>
          <div id="myDIV">
            <div class="col-md-12 bg-hide">
              <div class="col-md-4">
 							  <ul class="jobinfolist">
                  <li>
                    <h4>Year of Experience</h4>
                    <strong>: <?php echo $cv_row['js_experience']; ?></strong></li>
                  <li>
                    <h4>Current notice period</h4>
                    <strong>: <?php echo $cv_row['js_current_notice_period']; ?></strong></li>
                  <li>
                    <h4>Job Type</h4>
                    <strong>: <?php echo $cv_row['js_job_type']; ?></strong></li>
                </ul>
              </div>
                            
              <div class="col-md-4">
   							<ul class="jobinfolist">
                  <li>
                    <h4>Working at current job</h4>
                    <strong>:<?php echo date('d M Y', strtotime($cv_row['js_working_since'])); ?></strong></li>
                  <li>
                    <h4>Current CTC</h4>
                    <strong>: <?php echo $cv_row['js_current_ctc']; ?> </strong></li>
                  <li>
                   <h4>Last salary Hike</h4>
                    <strong>: <?php echo date('M `y', strtotime($cv_row['js_last_salary_hike'])); ?></strong></li>
                </ul>
              </div>
                              
              <div class="col-md-4">
   							<ul class="jobinfolist">
                  <li>
                    <h4>Top Education</h4>
                    <strong>: <?php echo $cv_row['js_top_education']; ?> </strong></li>
                  <li>
                    <h4>Skills</h4>
                    <strong>: <?php echo $cv_row['js_skill_set']; ?></strong></li>
                  <li>
                    <h4>Current Job Role</h4>
                    <strong>: <?php echo $cv_row['js_current_designation']; ?></strong></li>
                </ul>
              </div>
            </div>     
          </div>
			</div>
       <?php
        $key++;
          endforeach;
       ?>
        <?php else : ?> 
          <li colspan="3">
            <strong>There is no record for display</strong>
          </li>
        <?php endif; ?>
		</div>
	</div>
</div>
</div>        
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}</script>

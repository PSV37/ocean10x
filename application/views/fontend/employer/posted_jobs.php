

<!---header-->
<?php 
$company_profile_id = $this->session->userdata('company_profile_id');

 $this->load->view('fontend/layout/employer_new_header.php');
 
?>
<!---header--->


<div class="container-fluid main-d">
	<div class="container">
        <div class="col-md-12">
          <div class="col-md-6 active-job">
          <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
        
           <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?> 
            
            
            <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                  php developer
                   </div> 
                    <div class="organization">
                    	Published : <?php if(!is_null($v_companyjobs->created_at)) { echo date('F j Y',strtotime($v_companyjobs->created_at)); } ?>
                    </div>
                    <div class="location">
                    	Deadline :<?php if(!is_null($v_companyjobs->job_deadline)) { echo date('F j Y',strtotime($v_companyjobs->job_deadline)); } ?>
                    </div>
                   <a href="<?php echo base_url() ?>employer/forword_job/<?php echo $v_companyjobs->job_post_id ?>"><div class="apply_job_btn">forward</div></a> 
                   
                   
                   	<div class="dropdown right-arrow">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">...
                       </button>
                        <ul class="dropdown-menu">
                          
                          <li><a href="#">Copy link to post</a></li>
                          <li><a href="#">save job</a></li>
                          <li><a href="#">JavaScript</a></li>
                          
                        </ul>
                      </div>
                   
                </div>
            
            
            
           
             <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <div>
                            <strong>There is no active Vacancy Post to Show</strong>
                        </div>
                    <?php endif; ?>
                     </div>
			<div class="col-md-3">
            <!--future use-->
            </div>            
		</div>
    </div>
</div>        
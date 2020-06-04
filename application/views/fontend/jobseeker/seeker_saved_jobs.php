<!--header--->
<div class="container-fluid main-box_Scroll">

<div clas="row">
	<div class="col-md-12">
    
    <?php 
    $this->load->view('fontend/layout/new_seeker_header.php');
?> 
        
 <div class="col-md-9">
        <div class="row">
  
                <div class="col-md-12">
                
                    <div class="gradient_strip"></div>
                    <div class="text-grad">
                    <h1 class="ml10">
                      <span class="text-wrapper">
                        <span class="letters">My Profile</span>
                         <p>Profile</p>
                      </span>
                    </h1>
                    </div>
                    
                   
        		
            	<h3 class="profile_heading">SAVED JOB</h3>
             
                  <div class="seperate-btn">   
                    <button class="all_b active_save_btn">All</button>  
                    <button class="sort_b">Sort</button>  
                  </div>
                  
             
             
            <div class="col-md-12">
            <div class="col-md-9">
            <?php
             $sr_no=0;
            if (!empty($saved_job_data)): foreach ($saved_job_data as $applicaiton) : $sr_no++;

            ?>
            <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <img src="<?php echo $this->company_profile_model->company_logoby_id($applicaiton['company_profile_id']);echo $this->db->last_query();  ?>" class="dimen_img-s" />
                   <div class="job_title"><a href="<?php  echo base_url();?>job/show/<?php echo $this->job_posting_model->get_slug_nameby_id($applicaiton['job_post_id']) ?>"><?php echo $this->job_posting_model->job_title_by_name($applicaiton['job_post_id']); ?></a>
                   <!-- The person/job specification can be presented as a stand-alone  -->
                   
                   </div> 
                    <div class="organization">
                     <?php echo $this->company_profile_model->company_name($applicaiton['company_profile_id']); ?>
                    </div>
                    <div class="location">
                      <?php echo $applicaiton['city_id'];  ?>
                    </div>
                    <a href="<?php echo base_url(); ?>job/show/<?php echo $applicaiton['job_slugs']; ?>" class="btn btn-success btn-xs apply_job_btn">Apply job</a>
                    <!-- <div class="apply_job_btn">Apply job</div> -->
                    <button class="job_dis_btn">Details</button>
                </div>
            <?php
              endforeach;
            ?>
            <?php else : ?> 
            
                <td colspan="7">
                    <strong>There is no data to display</strong>
                </td><!--/ get error message if this empty-->
              
            <?php endif; ?>
            	
                <!-- <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div> -->
                
            </div>
            <div class="col-md-3"></div>
            	</div>
            </div>
              
              
                 
			</div>
            
            
            
            
            	
          </div>
        </div>
      </div>
          
         
          
  </div>               
              
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script> 
<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
 <script>
 // Wrap every letter in a span
var textWrapper = document.querySelector('.ml10 .letters');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: ""})
  .add({
    targets: '.ml10 .letter',
    rotateY: [-90, 0],
    duration: 1300,
    delay: (el, i) => 45 * i
  })
 </script>
 

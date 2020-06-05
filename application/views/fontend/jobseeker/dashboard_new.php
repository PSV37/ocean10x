<div class="container-fluid">

<div clas="row">
    <div class="col-md-12">
         <?php 
    $this->load->view('fontend/layout/new_seeker_header.php');
?>  
        
        
        <div class="col-md-9">
        <div class="row">
                <div class="col-md-12">
               <!---header---> 
                    <div class="gradient_strip"></div>
                    <div class="text-grad">
                    <h1 class="ml10">
                      <span class="text-wrapper">
                        <span class="letters">Dashboard</span>
                         <p>Profile</p>
                      </span>
                    </h1>
                    </div>
                 </div>  
                 <!---hedaer--->
                    <!---main dashboard-->
                  <div class="col-md-12"> 
                    <div class="col-md-9"> 
                    <h3 class="heading-dash">My Dashboard</h3>
                    <div class="row">
                        <div class="col-md-4 card-lb">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-fw fa-download"></i>
                            </div>
                            <span>Saved Job</span>
                            </div>
                             <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url(); ?>seeker/my-saved-jobs">
                            <span class="float-left" style="font-size:22px;"><?php echo $saved_jobs; ?></span>
                            </a>
                           <!--  <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url(); ?>seeker/my-saved-jobs">
                            <span class="float-left" style="font-size:2px;">10</span>
                            </a> -->
                            </div>
                        </div>
                        <div class="col-md-4 card-lb">
                            <div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                          <i class="fas fa-volume-up fa-fw"></i>
                            </div>
                            <div >Job Alerts</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url(); ?>seeker/my-inbound-job-invitations">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                       
                        <div class="col-md-4 card-lb">
                            <div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-users fa-fw"></i>
                            </div>
                            <div>Profile Views</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 card-lb">
                        <div class="card text-white bg-bluish o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-fw fa-download"></i>
                            </div>
                            <span>Article Views</span>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">10</span>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-4 card-lb">
                            <div class="card text-white bg-link o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                          <i class="fas fa-volume-up fa-fw"></i>
                            </div>
                            <div>courses Completed</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                          
                        <div class="col-md-4 card-lb">
                            <div class="card text-white bg-green o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-users fa-fw"></i>
                            </div>
                            <div>News Feed</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                       </div>
                    </div>
                    
                    <div class="col-md-3">
                        <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
                    <div class="col-md-3 col-sm-6">
            <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
        </div>
       
                    
                    </div>
                    </div>
                    
                    <div class="col-md-12 profile-section">
                  
                        <div class="col-md-9"> 
                    <h3 class="heading-dash">My Profile</h3>
                    <div class="row">
                        <div class="col-md-4 ">
                        <div class="pro-card ">
                            <div class="icon-pro p_color_red">
                            <i class="fas fa-th-large"></i>
                            </div>
                            <div class="text-pro">
                            <span>Ocean Profile</span>
                           
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                        <div class="pro-card">
                            <div class="icon-pro p_color_green">
                            <i class="fas fa-th-large"></i>
                            </div>
                            <div class="text-pro">
                            <span>Job Settings</span>
                           
                            </div>
                            </div>
                        </div>
                       
                        <div class="col-md-4 ">
                        <div class="pro-card">
                            <div class="icon-pro p_color_blue">
                            <i class="fas fa-th-large"></i>  
                            </div>
                            <div class="text-pro">
                            <span>Cover Letter</span>
                           
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                        <div class="col-md-3">
                         <div class="paragraph_p_level">
        <p>Create your own, and see what different functions produce. Get to understand what is really happening. What type of Graph do you want</p> 
        </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12 profile-section">
                  
                        <div class="col-md-9"> 
                    <h3 class="heading-dash">MY Trainers</h3>
                    <div class="row">
                        <div class="col-md-4 ">
                        <div class="pro-card ">
                            <div class="icon-pro p_color_red">
                            <i class="fas fa-th-large"></i>
                            </div>
                            <div class="text-pro">
                            <span>Ocean Courses</span>
                           
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                        <div class="pro-card">
                            <div class="icon-pro p_color_green">
                            <i class="fas fa-th-large"></i>
                            </div>
                            <div class="text-pro">
                            <a href="<?php echo base_url() ?>seeker/skill-upgrade"><span>Skill Upgrade</span></a>
                           
                            </div>
                            </div>
                        </div>
                       
                        <div class="col-md-4 ">
                        <div class="pro-card">
                            <div class="icon-pro p_color_blue">
                            <i class="fas fa-th-large"></i>  
                            </div>
                            <div class="text-pro">
                            <span>Ocean Champ</span>
                           
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                        <div class="col-md-3"></div>
                    </div>
                    
                    <div class="col-md-12">
                   
                        
                        <h3 class="heading-dash">OCEAN SERVICES</h3>
                            <div class="col-lg-3 col-sm-6">
                                <div class="circle-tile">
                                   
                                        <div class="circle-tile-heading dark-blue">
                                            250
                                        </div>
                                    
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                            Resume Writer
                                        </div>
                                        
                                       
                                    </div>
                                   </div>
                                </div>
                            
                            <div class="col-lg-3 col-sm-6">
                                <div class="circle-tile">
                                   
                                        <div class="circle-tile-heading dark-blue">
                                           30
                                        </div>
                                  
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                            Career Advice
                                        </div>
                                        
                                       
                                    </div>
                                   </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-6">
                                <div class="circle-tile">
                                    
                                        <div class="circle-tile-heading dark-blue">
                                          40
                                        </div>
                                   
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                            PMS
                                        </div>
                                        
                                       
                                    </div>
                                   </div>
                                </div>
                                
                                <div class="col-lg-3 col-sm-6">
                                <div class="circle-tile">
                                    
                                        <div class="circle-tile-heading dark-blue">
                                          30
                                        </div>
                                   
                                    <div class="circle-tile-content dark-blue">
                                        <div class="circle-tile-description text-faded">
                                         On Bording
                                        </div>
                                        
                                    </div>
                                   </div>
                                </div>
                     
                    </div>
                    
                    
                    
              
        </div>     
        </div>
       
       
       
 <!---main div end col-row--->      
</div>
    
<div> 
   <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script> 
<!---common script--->
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
<!---common---->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
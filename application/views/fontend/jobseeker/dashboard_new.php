
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/new_ui.css">
<div class="container-fluid">

<div clas="row">
    <div class="col-md-12">
        <div class="col-md-3">
        <aside id="left-panel" style="overflow:scroll; border-right: 1px solid rgba(240, 240, 240, 0.3);box-shadow: 2px 2px 4px 0px #00000033;">
    <div class="inner-left-pannel">
        
        
        <!-- menus -->
        <div class="my-moving-parts">
            <div class="my-param-content"></div>
            <div class="my-normal-content">
               <div class="inner-tabs-navigation" data-active="menu">
                </div>
                <div class="inner-tabs">
                    <div class="account-tab">
                        <div class="language-selection" title="Change language">
                                        <div class="btn-header transparent pull-right dropdown" style="margin-top: -1px;">
                                            <span><a href="#" class="dropdown-toggle locale" data-toggle="dropdown">
                                              <i class="flag flag-us"></i> 
                                                 </a>
                                             </span>
                                        </div>
                        </div>
                    </div>
                    
                    <div class="menu-tab">
                        
                        <nav class="menu-principal">
                        <div class="menu_logo" style="height: 115px;">
                            <img src="https://www.consultnhire.com/files/1506847224_00024vs-logo.jpg" />
                        </div>
                            <ul class="menu-principal-list" style="">
                                 <li class="active">
                                     <a data-dl-view="true" data-dl-title="Dashboard" href="#">
                                    <span class="icon-container">
                                         <i class="fas fa-tachometer-alt"></i>
                                    </span>
                                    <span class="text item">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                     <a data-dl-view="true" data-dl-title="My profile" href="/candidate/detail">
                                    <span class="icon-container">
                                        <i class="fas fa-user-alt"></i>
                                   </span>
                                <span class="text item">My profil</span>
                                      </a>
                               </li>
                               
                              <li>
                             <a data-dl-view="true" data-dl-title="Contacts" href="/candidate">
                               <span class="icon-container">
                                 <i class="fas fa-phone-volume"></i>
                             </span>
                                <span class="text item">Contacts</span>
                             </a>
                              </li>
                                 <li>
                                 <a data-dl-view="true" data-dl-title="Recruitments" href="/campaign">
                                    <span class="icon-container">
                                      <i class="fas fa-filter"></i>
                                      </span>
                                <span class="text item">Recruitments </span>
                                  </a>
                                </li>
                                 <li>
                                    <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                    <span class="icon-container">
                                      <i class="fas fa-map-signs"></i>
                                      </span>
                                <span class="text item">Mobility</span>
                                      </a>
                                 </li>
                                    <li>
                            <a data-dl-view="true" data-dl-title="Predictive models" href="/jobprofile">
                            <span class="icon-container">
                               <i class="fas fa-th-large"></i>
                              </span>
                                <span class="text item">Predictive models</span>
                             </a>
                                 </li>
                                  <li>
                                 <a data-dl-view="true" data-dl-title="Talent mapper" href="/talentmapper/generate">
                                    <span class="icon-container">
                                 <i class="fas fa-th-large"></i>
                                  </span>
                                <span class="text item"> Talent mapper</span>
                                 </a>
                                 </li>
                                 <li>
                              <a data-dl-view="true" data-dl-title="Settings" href="/params" class="hidden-xs hidden-sm                                       hidden-md hidden-lg">
                                <span class="icon-container">
                                <i class="fas fa-cog"></i>
                                </span>
                                <span class="text item">Settings</span>
                                            </a>
                                 </li>
                             </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- menus END -->
    </div>
        </aside>
        
        </div>
        
        
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
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:2px;">10</span>
                            </a>
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
                            <a class="card-footer text-white clearfix small z-1" href="#">
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
                            <span>Skill Upgrade</span>
                           
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
<style>
.employ_tab {
    margin-top: 55px;
    border: solid 1px #cecbcb;
    padding: 20px;
    border-radius: 13px;   
}
@media (min-width: 768px){
.nav-justified>li {
    display: inline-block;
    width: 225px;
    height: 30px;
	margin-right:30px;
}
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color:#fff;
	 border: solid 2px #a5a5a5;
	  color: #949494;
}
.nav li a {
    color: #949494;
    background-color: #fff;
    border: solid 2px #a5a5a5;
    border-radius: 30px;
    padding: 4px 10px;
	font-weight: 700;
}
.nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
    color:  #18c5bd;
   background-color:#fff;
    border: solid 2px #18c5bd;
	font-weight: 700;
}
.tab-content {
    margin-top: 45px;
}
.panel-body {
    padding: 4px;
}
input[type="text"] {
    border: solid 1px #dcdede;
    border-radius: 0px 22px 22px 0px;
    padding: 4px 12px;
    margin-bottom: 25px;
}
</style>
<body>
<!---header-->
<div class="container-fluid gradient_strip" >
<div class="container">
<div class="col-md-12">
	<div class="col-md-3">
   <div class="menu_logo">
      <img src="http://www.tele-kinetics.com/assets/img/logo.png" />
   </div> 
   </div>
   
		
   <div class="col-md-2">
 

   <div class="sear-bar">
   <form class="search-form">
  <input type="search">
 <i class="fas fa-search"></i>
</form>
     </div>          

	</div>

<div class="col-md-3">

	 <div class="switch switch-yellow">
      <input type="radio" class="switch-input" name="view3" value="week3" id="week3" checked>
      <label for="week3" class="switch-label switch-label-off">Job Search</label>
      <input type="radio" class="switch-input" name="view3" value="month3" id="month3">
      <label for="month3" class="switch-label switch-label-on">People Search</label>
      <span class="switch-selection"></span>
    </div>
</div>

<div class="col-md-1">
	 <div class="notification">
    	<i class="fas fa-comment-alt"></i><br>
        Messaging
    </div>    
   
</div>

<div class="col-md-1">
	 <div class="bell">
    	<i class="fas fa-bell"></i><br>
        Notifications
   	 </div>  
   
</div>     
    
    <div class="col-md-2">
    	 <div class="dropdown">
  <i class="fas fa-user-circle"></i>&emsp;<a class=" dropdown-toggle" data-toggle="dropdown">
    
    <span class="caret"></span>
    <p class="profile-accoutnt-p">supriya</p>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#"><i class="fas fa-user"></i></a> My Profile</li>
      <li><a href="#"><i class="fas fa-lock"></i></a>Change Password</li>
      <li><a href="#"><i class="fas fa-power-off"></i></a>Logout</li>
    </ul>
  </div>
    </div>
    
    </div>
  </div>

</div>
<!---header--->


<div class="container-fluid main-d">
	<div class="container">
        <div class="col-md-12">
        	<div class="col-md-3">
            
            <aside id="left-panel" style="margin-top:75px;
                 margin-left: 14px;height:auto; border-right: 1px solid rgba(240, 240, 240, 0.3);box-shadow: 2px 2px 4px 0px   #00000033;position: fixed;
            z-index: 999;vertical-align:baseline;">
            <div class="inner-left-pannel">
                
                
                <!-- WHAT MOVES START -->
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
                                        <span class="text item">CV Bank</span>
                                              </a>
                                       </li>
                                       
                                      <li>
                                     <a data-dl-view="true" data-dl-title="Contacts" href="/candidate">
                                       <span class="icon-container">
                                         <i class="fas fa-phone-volume"></i>
                                     </span>
                                        <span class="text item">Post New Job</span>
                                     </a>
                                      </li>
                                         <li>
                                         <a data-dl-view="true" data-dl-title="Recruitments" href="/campaign">
                                            <span class="icon-container">
                                              <i class="fas fa-filter"></i>
                                              </span>
                                        <span class="text item">Active Job Post</span>

                                          </a>
                                        </li>
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Pending Jobs</span>
                                              </a>
                                         </li>
                                            
                                          
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Question Bank</span>
                                              </a>
                                         </li>
                                         
                                          <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Employee Management</span>
                                              </a>
                                         </li>
                                         
                                          <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Company / Recruiter</span>
                                              </a>
                                         </li>
                                         
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">OceanChamp</span>
                                              </a>
                                         </li>
                                         
                                         
                                     </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- WHAT MOVES END -->
            </div>
                </aside>
            </div>
			<div class="col-md-9" style="margin-top:75px;">   
            
            
            <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
    <li class="active"><a href="#Commentary" data-toggle="tab">OceanChamp Test</a></li>
    <li><a href="#Videos" data-toggle="tab">OceanChamp History !</a></li>
   
  </ul>

            <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="Commentary">
    <div class="row note">
                	<span>No Tests Have Been Given By You !</span>
                </div>
    <div class="row">
  
    

			
				<div class="tabbable-line">
					<ul class="nav nav-tabs ">
						<li class="active">
							<a href="#tab_default_1" data-toggle="tab">
Freshers </a>
						</li>
						<li>
							<a href="#tab_default_2" data-toggle="tab">
Profetional</a>
						</li>
						
         
           
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_default_1">
							<h6 style="text-align: center;color: #18c5bd;font-size: 15px;font-weight: 700;margin-bottom:20px;"></h6>
                            <div class="col-md-12 row rexp" style="padding-left:465px;">
                                <div class="col-md-1 exp-box exp-box-active">0</div>
                                
                                </div>	
						</div>
						<div class="tab-pane" id="tab_default_2">
							<h6 style="text-align: center;color: #18c5bd;font-size: 15px;font-weight: 700;margin-bottom:20px;">Select Experience</h6>
                            <div class="col-md-12 row rexp">
                                <div class="col-md-1 exp-box exp-box-active">1</div>
                                <div class="col-md-1 exp-box">2</div>
                                <div class="col-md-1 exp-box">3</div>   
                                <div class="col-md-1 exp-box">4</div>
                                <div class="col-md-1 exp-box">5</div>
                                <div class="col-md-1 exp-box">6</div>
                                <div class="col-md-1 exp-box">7</div>
                                <div class="col-md-1 exp-box">8</div>
                                <div class="col-md-1 exp-box">9</div>
                                <div class="col-md-1 exp-box">10+</div>
                                </div>	
						</div>
						
               
					</div>
				</div>
                
                
                
                <div class="subjects">
                <h5 style="color:#159993;">Become an OceanChamp !</h5>
                 <h4 style="margin-bottom:20px;">Select the Skillset You Want To Become a Champ !</h4>
                 
                 
                   <form action="/action_page.php">
                          <button class="sort-serach" type="submit"><i class="fas fa-search"></i></button>
                          <input type="text" placeholder="Search.." name="search">
   		   			 </form>
            
                 
                <div class="row">
                	<div class="col-md-2 ">
                    <div class="box box-active">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                
                </div>
                <div class="row">
                	<div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                
                </div>
                <div class="row">
                	<div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                    <div class="col-md-2 ">
                    <div class="box">
                    	wdwk
                        </div>
                    </div>
                    
                
                </div>
                <div class="row col-md-12">
                <span class="show_more">Show more..</span>
                </div>
                <div class="row" style="text-align:center;">
               
                 <button class="take_test">Take a test</button>
                
                </div>
            </div>
			</div>
    
    </div>
   
   
    <div role="tabpanel" class="tab-pane fade" id="Videos">
    
    <div class="table-responsive">
            
          </div>
    
    </div>
    <div role="tabpanel" class="tab-pane fade" id="Events">
    
    
    <div class="table-responsive">
            
          </div>
    
    </div>
     <div role="tabpanel" class="tab-pane fade" id="music">
    
    
    
    
    </div>
  </div>
            
            
            
            	
            
            	
  

   




            
            
            
            
            
            </div>
            
            
            
            
            
            
            
            
            
            
        </div>
        
     </div>
</div>            

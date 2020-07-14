
<style>
.employer_menu {
    background-color:#fff;   
   margin-top: 38px;
    border-radius: 13px;
    /* border: 1px solid #d9dde2; */
    position: fixed;
    width: 20%;
    border: solid 1px #dedbdb;
    box-shadow: 1px 0px 3px #e0dddd;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 9999;
  top: 0;
  left: 0;    
  background-color:#fff;
  overflow-x: hidden;
  transition: 0.5s;  
}

.sidenav a {
  padding: 8px 8px 8px 32px;    
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;   
}      
.open_sidebar{font-size: 30px;
    cursor: pointer;
    z-index: 999;
    position: absolute;
    top: -30px;}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


</style>    
<?php $activemenu = $this->session->userdata('activemenu'); 
$employer_id = $this->session->userdata('company_profile_id');
?>
<div class="col-md-3">
<div class="employer_menu">







            
            <aside id="left-panel" style="margin-top:9px;
                 margin-left: 14px;height:auto; 
            z-index: 999;vertical-align:baseline;">
            <div class="inner-left-pannel">
                
                
                <!-- WHAT MOVES START -->
                <div class="my-moving-parts">
                  <div class="my-param-content"></div>
                    <div class="my-normal-content">
                      <div class="inner-tabs-navigation" data-active="menu"></div>
                        <div class="inner-tabs">
                          <div class="account-tab">
                            <div class="language-selection" title="Change language">
                              <div class="btn-header transparent pull-right dropdown" style="margin-top: -1px;">
                                <span><a href="#" class="dropdown-toggle locale" data-toggle="dropdown"><i class="flag flag-us"></i></a></span>
                              </div>
                            </div>
                          </div>
                          <div class="menu-tab">
                            <nav class="menu-principal">
                              <ul class="menu-principal-list" style="">
                                <li <?php if ($activemenu == 'dashboard') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Dashboard" href="<?php echo base_url(); ?>employer">
                                    <span class="icon-container">
                                      <i class="fas fa-tachometer-alt"></i>
                                    </span>
                                    <span class="text item">Dashboard</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'cv_bank') { ?>
                                 class="active"
                                <?php } ?>>
                                  <a data-dl-view="true" data-dl-title="My profile" href="<?php echo base_url() ?>employer/corporate-cv-bank">
                                    <span class="icon-container"><i class="fas fa-university"></i></span>
                                    <span class="text item">CV Bank</span>
                                  </a>
                                  <div class="row tree well">
                                                 
                                    <ul>        
                                      <?php $wheres       = "status='1' AND company_id='$employer_id' and parent_id = '0'";
                                      $folders     = $this->Master_model->getMaster('cv_folder', $where = $wheres); 
                                        if (!empty($folders)) { 
                                        foreach ($folders as $row) { ?>
                                        
                                          <li>
                                           <a href="<?php echo base_url() ?>employer/corporate-cv-bank/"<?php echo $row['id'] ?> > <span><i class="fas fa-folder-open"></i> <?php echo $row['folder_name']; ?></span></a>
                                             <ul>
                                            <?php 
                                            $parent_id = $row['id']; 
                                            $where_child  = "status='1' AND company_id='$employer_id' and parent_id = '$parent_id'";
                                            $child_folders  = $this->Master_model->getMaster('cv_folder', $where = $where_child); 
                                              if (!empty($child_folders)) { 
                                              foreach ($child_folders as $row1) { ?>
                                             
                                                <li>
                                                  <span><i class="fas fa-folder-open"></i> <?php echo $row1['folder_name']; ?></span> 
                                                  <ul>
                                                    <?php $cparent_id = $row1['id']; 
                                                    $where_child  = "status='1' AND company_id='$employer_id' and parent_id = '$cparent_id'";
                                                    $grand_child_folders  = $this->Master_model->getMaster('cv_folder', $where = $where_child); 
                                                    if (!empty($grand_child_folders)) { 
                                                    foreach ($grand_child_folders as $row2) { ?>
                                                    
                                                      <li>
                                                        <span><i class="fas fa-folder-open"></i><?php echo $row2['folder_name']; ?></span>
                                                      </li>
                                                    <?php } } ?>
                                                    </ul>
                                                </li>
                                                  <?php } } ?>
                                              </ul>
                                            </li>
                               <?php } } ?>
                               </ul> 

                                            <!-- <li>
                                                <span><i class="fas fa-folder-open"></i> Parent</span>
                                                <ul>
                                                    <li>
                                                        <span><i class="fas fa-folder-open"></i> Child</span> 
                                                        <ul>
                                                            <li>
                                                                <span><i class="fas fa-folder-open"></i>Grand Child</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <span><i class="fas fa-folder-open"></i> Child</span> 
                                                        <ul>
                                                            <li>
                                                                <span><i class="fas fa-folder-open"></i> Grand Child</span> 
                                                            </li>
                                                            
                                                        </ul>
                                                    </li>
                                                </ul>
                                                 -->
                                            <!-- </li>
                                            
                                        </ul>  --> 
                                                   
                                                     
                                                    </div>
                                </li>
                                <li <?php if ($activemenu == 'job_post') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Contacts" href="<?php echo base_url(); ?>employer/job_post">
                                    <span class="icon-container">
                                    <i class="fas fa-phone-volume"></i>
                                    </span>
                                    <span class="text item">Post New Job</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'active_job') { ?>
                                 class="active"
                                <?php } ?>>
                                  <a data-dl-view="true" data-dl-title="Recruitments" href="<?php echo base_url() ?>employer/active-job">
                                    <span class="icon-container">
                                    <i class="fas fa-filter"></i></span>
                                      <span class="text item">Active Job Post</span>
                                  </a>
                                </li>
                                <li>
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/pending-job">
                                    <span class="icon-container">
                                      <i class="fas fa-map-signs"></i></span>
                                        <span class="text item">Pending Jobs</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'questionbank') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>employer/all-questions">
                                    <span class="icon-container">
                                      <i class="fas fa-map-signs"></i>
                                    </span>
                                    <span class="text item">Question Bank</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'oceanchamp') { ?>


                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/ocean_champ_test">
                                      <span class="icon-container">
                                        <i class="fas fa-map-signs"></i>
                                      </span>
                                      <span class="text item">OceanChamp</span>
                                  </a>
                                </li>
                                <li>
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/Employee">
                                      <span class="icon-container">
                                        <i class="fas fa-map-signs"></i>
                                      </span>
                                      <span class="text item">Skill Upgrade</span>
                                  </a>    
                                </li>
                                <li <?php if ($activemenu == 'Recruiter') { ?>
                                 class="active"
                                <?php } ?>>
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/Recruiter">
                                    <span class="icon-container">
                                       <i class="fas fa-map-signs"></i>
                                    </span>
                                    <span class="text item"> Company / Recruiter</span>
                                  </a>
                                </li>
                                
                                 <li <?php if ($activemenu == 'addemployee') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/addemployee">
                                    <span class="icon-container">
                                       <i class="fas fa-map-signs"></i>
                                    </span>
                                    <span class="text item">Employee Management</span>
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
  
  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <li <?php if ($activemenu == 'dashboard') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Dashboard" href="<?php echo base_url(); ?>employer">
                                    <span class="icon-container">
                                      <i class="fas fa-tachometer-alt"></i>
                                    </span>
                                    <span class="text item">Dashboard</span>
                                  </a>
                                </li>
   <li <?php if ($activemenu == 'cv_bank') { ?>
                                 class="active"
                                <?php } ?>>
                                  <a data-dl-view="true" data-dl-title="My profile" href="<?php echo base_url() ?>employer/corporate-cv-bank">
                                    <span class="icon-container"><i class="fas fa-user-alt"></i></span>
                                    <span class="text item">CV Bank</span>
                                  </a>
                                  <div class="row tree well">
                                                 
                                                     <ul>
                                            <li>
                                                <span><i class="fas fa-folder-open"></i> Parent</span>
                                                <ul>
                                                    <li>
                                                        <span><i class="fas fa-folder-open"></i> Child</span> 
                                                        <ul>
                                                            <li>
                                                                <span><i class="fas fa-folder-open"></i>Grand Child</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <span><i class="fas fa-folder-open"></i> Child</span> 
                                                        <ul>
                                                            <li>
                                                                <span><i class="fas fa-folder-open"></i> Grand Child</span> 
                                                            </li>
                                                            
                                                        </ul>
                                                    </li>
                                                </ul>
                                                
                                            </li>
                                            
                                        </ul>  
                                                   
                                                     
                                                    </div>
                                </li>
                                <li <?php if ($activemenu == 'job_post') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Contacts" href="<?php echo base_url(); ?>employer/job_post">
                                    <span class="icon-container">
                                    <i class="fas fa-phone-volume"></i>
                                    </span>
                                    <span class="text item">Post New Job</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'active_job') { ?>
                                 class="active"
                                <?php } ?>>
                                  <a data-dl-view="true" data-dl-title="Recruitments" href="<?php echo base_url() ?>employer/active-job">
                                    <span class="icon-container">
                                    <i class="fas fa-filter"></i></span>
                                      <span class="text item">Active Job Post</span>
                                  </a>
                                </li>
                                <li>
                                  <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                    <span class="icon-container">
                                      <i class="fas fa-map-signs"></i></span>
                                        <span class="text item">Pending Jobs</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'questionbank') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>employer/all-questions">
                                    <span class="icon-container">
                                      <i class="fas fa-map-signs"></i>
                                    </span>
                                    <span class="text item">Question Bank</span>
                                  </a>
                                </li>
                                <li <?php if ($activemenu == 'oceanchamp') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/ocean_champ_test">
                                      <span class="icon-container">
                                        <i class="fas fa-map-signs"></i>
                                      </span>
                                      <span class="text item">OceanChamp</span>
                                  </a>
                                </li>
                                <li>
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/Employee">
                                      <span class="icon-container">
                                        <i class="fas fa-map-signs"></i>
                                      </span>
                                      <span class="text item">Skill Upgrade</span>
                                  </a>    
                                </li>
                                <li <?php if ($activemenu == 'Recruiter') { ?>
                                 class="active"
                                <?php } ?>>
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/Recruiter">
                                    <span class="icon-container">
                                       <i class="fas fa-map-signs"></i>
                                    </span>
                                    <span class="text item"> Company / Recruiter</span>
                                  </a>
                                </li>
                                
                                 <li <?php if ($activemenu == 'addemployee') { ?>
                                 class="active"
                                <?php } ?> >
                                  <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/addemployee">
                                    <span class="icon-container">
                                       <i class="fas fa-map-signs"></i>
                                    </span>
                                    <span class="text item">Employee Management</span>
                                  </a>
                                </li>    
  
  
  
  
</div>
 <span class="open_sidebar"  onclick="openNav()">&#9776; open</span>   
</div>
           
               
           
           <script>
$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });    
});
</script>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
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


</style>    
<?php $activemenu = $this->session->userdata('activemenu'); ?>
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

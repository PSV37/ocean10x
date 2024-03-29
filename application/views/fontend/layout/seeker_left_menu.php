<div class="col-md-3 ">
  <div class="main-height"style="height: 400px">
    <aside id="left-panel" style="
      margin-left: 14px;height:auto; position: fixed;
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
              <div class="menu-tab" id="menu-tab">
                <nav class="menu-principal">
                  <ul class="menu-principal-list" style="">
                    <li class="menu <?php if ($activemenu == 'dashboard') { 
                      echo 'active'; } ?>">
                      <a data-dl-view="true" data-dl-title="Dashboard" href="<?php echo base_url(); ?>seeker/dashboard">
                      <span class="icon-container">
                      <i class="fas fa-tachometer-alt"></i>
                      </span>
                      <span class="text item">Dashboard</span>
                      </a>
                    </li>
                    <li class="menu <?php if ($activemenu == 'seeker_info') { echo 'active';  } ?> ">
                      <a data-dl-view="true" data-dl-title="My profile" href="<?php echo base_url() ?>job_seeker/seeker_info">
                      <span class="icon-container">
                      <i class="fas fa-user-alt"></i>
                      </span>
                      <span class="text item">My Ocean Profile</span>
                      </a>
                    </li>
                    <li class="menu <?php if ($activemenu == 'oceanhunt') { echo 'active';  } ?> ">
                      <a data-dl-view="true" data-dl-title="Contacts" href="<?php echo base_url(); ?>seeker/oceanhunt"> 
                      <span class="icon-container">
                      <i class="fas fa-phone-volume"></i>
                      </span>
                      <span class="text item">OcearnHunt Activities</span>
                      </a>
                    </li>
                    <!--   <li class="menu <?php if ($activemenu == 'test') { echo 'active';  } ?> ">
                      <a data-dl-view="true" data-dl-title="Contacts" href="<?php echo base_url(); ?>seeker/test"> 
                        <span class="icon-container">
                          <i class="fas fa-phone-volume"></i>
                      </span>
                         <span class="text item">test</span>
                      </a>
                       </li> -->
                    <li class="menu">
                      <a data-dl-view="true" data-dl-title="Recruitments" href="<?php echo base_url(); ?>seeker/my-inbound-job-invitations">
                      <span class="icon-container">
                      <i class="fas fa-filter"></i>
                      </span>
                      <span class="text item">Skill Upgrade</span>
                      </a>
                    </li>
                    <li class="menu <?php if ($activemenu == 'oceanchamp') { echo 'active';  } ?> ">
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>seeker/oceanchamp-test">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Become an OceanChamp</span>
                      </a>
                    </li>
                     <li class="menu <?php if ($activemenu == 'ocean_bank') { echo 'active';  } ?> ">
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>seeker/ocean-test">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Ocean T-Bank</span>
                      </a>
                    </li>
                    <li class="menu <?php if ($activemenu == 'ocean_champ') { echo 'active';  } ?> ">
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>seeker/ocean-champ">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Ocean Champ !</span>
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
  // Add active class to the current button (highlight it)
  var header = document.getElementById("menu-tab");
  var btns = header.getElementsByClassName("menu");
  for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
    });
  }
</script>
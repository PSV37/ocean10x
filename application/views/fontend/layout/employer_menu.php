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
  .custom-menu {
  display: none;
  z-index: 1000;
  position: absolute;
  overflow: hidden;
  border: 1px solid #CCC;
  white-space: nowrap;
  font-family: sans-serif;
  background: #FFF;
  color: #333;
  border-radius: 5px;
  margin-left: -70px;
  }
  .custom-menu li {
  padding: 8px 12px;
  cursor: pointer;
  }
  .custom-menu li:hover {
  background-color: #DEF;
  }
  .custom-menu1 {
  display: none;
  z-index: 1000;
  position: absolute;
  overflow: hidden;
  border: 1px solid #CCC;
  white-space: nowrap;
  font-family: sans-serif;
  background: #FFF;
  color: #333;
  border-radius: 5px;
  margin-left: -70px;
  }
  .custom-menu1 li {
  padding: 8px 12px;
  cursor: pointer;
  }
  .custom-menu1 li:hover {
  background-color: #DEF;
  }
  button.btn.btn-default {
  /*width: 100px;*/
  }
  button.btn.btn-default:hover {
  /*width: 100px;*/
  background-color: #09a59d;
  }
  #left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li:focus span.icon-container i {
  left: 0;
  }
  #left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li.active div.tree ul.right_click li.active span.txt {
  font-weight: 500!important;
  color: #18c5bd!important;
  }
  #left-panel .inner-left-pannel .inner-tabs .menu-tab .menu-principal ul li.active div.tree  ul.second_level li.active span.subtxt {
  font-weight: 500!important;
  color: #18c5bd!important;
  }
  /*li:active, li:focus {border: solid 2px #18c5bd;}*/
</style>
<?php $activemenu = $this->session->userdata('activemenu'); 
  $employer_id = $this->session->userdata('company_profile_id');
  ?>
<div class="col-md-3 emp">
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
                      <?php } ?>  tabindex="1" >
                      <a data-dl-view="true" data-dl-title="Dashboard" href="<?php echo base_url(); ?>employer">
                      <span class="icon-container">
                      <i class="fas fa-tachometer-alt"></i>
                      </span>
                      <span class="text item">Dashboard</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'cv_bank') { ?>
                      class="active"
                      <?php } ?> tabindex="2">
                      <a data-dl-view="true" data-dl-title="My profile" href="<?php echo base_url() ?>employer/corporate-cv-bank">
                      <span class="icon-container"><i class="fas fa-university"></i></span>
                      <span class="text item cv">CV Bank</span>
                      </a>
                      <input type="hidden" name="fid" id="fid">
                      <div class="row tree well">
                        <ul class="right_click">
                          <?php 
                            $activesubmenu = $this->session->userdata('activesubmenu');
                             
                            
                            $wheres       = "status='1' AND company_id='$employer_id' and parent_id = '0'";
                            $folders     = $this->Master_model->getMaster('cv_folder', $where = $wheres); 
                             if (!empty($folders)) { 
                             foreach ($folders as $row) { ?>
                          <li id="submenu" data-action=" <?php echo $row['id'] ?>"<?php if ($activesubmenu ==  $row['id']) { ?>
                            class="active"
                            <?php } ?>  >
                            <a href="<?php echo base_url() ?>employer/corporate_cv_bank/<?php echo $row['id'] ?>" > <span   ><i class="fas fa-folder-open"></i></span><span class="txt" data-action=" <?php echo $row['id'] ?>" id="r<?php echo $row['id']; ?>"> <?php echo $row['folder_name']; ?></span></a>
                            <!--  <input type="text" id="<?php echo $row['id']; ?>" class="edit" style="display:none"/ value="<?php echo $row['folder_name']; ?>"> -->
                            <ul class="second_level">
                              <?php 
                                $parent_id = $row['id']; 
                                $where_child  = "status='1' AND company_id='$employer_id' and parent_id = '$parent_id'";
                                $child_folders  = $this->Master_model->getMaster('cv_folder', $where = $where_child); 
                                  if (!empty($child_folders)) { 
                                  foreach ($child_folders as $row1) { ?>
                              <li id="submenu"  <?php if ($activesubmenu ==  $row1['id']) { ?> class="active" <?php } ?> data-action=" <?php echo $row1['id'] ?>">
                                <a href="<?php echo base_url() ?>employer/corporate_cv_bank/<?php echo $row1['id'] ?>"><span><i class="fas fa-folder-open"></i></span>
                                <span class="subtxt"data-action=" <?php echo $row1['id'] ?>"> <?php echo $row1['folder_name']; ?></span> </a>
                                <input type="text" class="edit" style="display:none"/ value="<?php echo $row1['folder_name']; ?>">
                                <ul>
                                  <?php $cparent_id = $row1['id']; 
                                    $where_child  = "status='1' AND company_id='$employer_id' and parent_id = '$cparent_id'";
                                    $grand_child_folders  = $this->Master_model->getMaster('cv_folder', $where = $where_child); 
                                    if (!empty($grand_child_folders)) { 
                                    foreach ($grand_child_folders as $row2) { ?>
                                  <li id="submenu"  data-action=" <?php echo $row2['id'] ?>" <?php if ($activesubmenu ==  $row2['id']) { ?>  class="active" <?php } ?>>
                                    <a href="<?php echo base_url() ?>employer/corporate_cv_bank/<?php echo $row2['id'] ?>"><span><i class="fas fa-folder-open"></i></span>
                                    <span class="display"  data-action=" <?php echo $row2['id'] ?>"><?php echo $row2['folder_name']; ?></span></a> 
                                    <input type="text" class="edit" style="display:none"/ value="<?php echo $row2['folder_name']; ?>">
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
                                          <span><i class="fas fa-folder-open"></i>Grand Child</span> 
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
                      <?php } ?> tabindex="3" >
                      <a data-dl-view="true" data-dl-title="Contacts" href="<?php echo base_url(); ?>employer/job_post">
                      <span class="icon-container">
                      <i class="fas fa-phone-volume"></i>
                      </span>
                      <span class="text item">Post New Job</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'active_job') { ?>
                      class="active"
                      <?php } ?> tabindex="4">
                      <a data-dl-view="true" data-dl-title="Recruitments" href="<?php echo base_url() ?>employer/active-job">
                      <span class="icon-container">
                      <i class="fas fa-filter"></i></span>
                      <span class="text item">Active Job Post</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'pending_job') { ?>
                      class="active"
                      <?php } ?> tabindex="5">
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/pending-job">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i></span>
                      <span class="text item">Draft Jobs</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'internal_tracker') { ?>
                      class="active"
                      <?php } ?>  tabindex="6" >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/internal_tracker">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Internal Tracker</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'external_tracker') { ?>
                      class="active"
                      <?php } ?>  tabindex="7" >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/external_tracker">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">External Tracker</span>
                      </a>
                    </li>
                    <!-- <li <?php if ($activemenu == 'shared_tracker') { ?>
                      class="active"
                      <?php } ?>  tabindex="8" >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/shared_tracker">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Shared Tracker</span>
                      </a>
                      </li> -->
                    <li <?php if ($activemenu == 'questionbank') { ?>
                      class="active"
                      <?php } ?>  tabindex="9" >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>employer/all-questions">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Corp Q-bank</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'test_papers') { ?>
                      class="active"
                      <?php } ?>  tabindex="10" >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url(); ?>employer/all-tests">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Ocean T-Bank</span>
                      </a>
                    </li>
                    <li <?php if ($activemenu == 'oceanchamp') { ?>
                      class="active"
                      <?php } ?>  tabindex="11" >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/ocean_champ_test">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">OceanChamp</span>
                      </a>
                    </li>
                    <li  tabindex="12">
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/oceantest">
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
                    <!--  <li <?php if ($activemenu == 'addemployee') { ?>
                      class="active"
                      <?php } ?> >
                      <a data-dl-view="true" data-dl-title="Mobility" href="<?php echo base_url() ?>employer/addemployee">
                      <span class="icon-container">
                      <i class="fas fa-map-signs"></i>
                      </span>
                      <span class="text item">Employee Management</span>
                      </a>
                      </li> -->
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
  <ul class='custom-menu' tabindex="-1">
    <li data-action = "first">Add Folder</li>
    <li data-action = "second">Delete Folder</li>
    <li data-action = "third">Rename Folder</li>
  </ul>
  <ul class='custom-menu1' tabindex="-1">
    <li data-action = "first">Add Folder</li>
  </ul>
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
<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/rename_folder">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Rename folder</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="sample3">Folder Name:</label>
                <input type="text"  name="folder_name"  id="folder_name" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required>
              </div>
            </div>
          </div>
          <input type="hidden" name="folder_id" id="folder_id">
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" style="width: 100px" class="btn btn-default">Rename</button>
          <button type="button" style="width: 100px" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  <?php if ($activemenu == 'internal_tracker') { ?>
   var somethingChanged = false;
   
  $('ul.menu-principal-list li').click(function(e) 
   { 
     $('.save').click();
    
   //  if (confirm('All the changes you made will get overwritten?')) {
   //     // myForm.submit();
   // } else {
   //     e.preventDefault();
   //     // window.location = 'http://google.com'; // redirect to your own URL here
   // }
   });
  <?php } ?>
</script>
<script>
  <?php if ($activemenu == 'cv_bank') { ?>
    $('.menu-principal-list ul').show();
  <?php  }else { ?>
    $('.menu-principal-list ul').hide();
  
  <?php } ?>
  //
  
  $('.cv').click(function() {
  $(this).find('ul').slideToggle();
  });
  
</script>
<script>
  // Trigger action when the contexmenu is about to be shown
  $('.right_click').bind("contextmenu", function (event) {
  
   event.preventDefault();
  
   $(".custom-menu").finish().toggle(100).
   
   css({
       top: event.pageY + "px",
       left: event.pageX + "px"
   });
  });
  $('.cv').bind("contextmenu", function (event) {
  
   event.preventDefault();
  
   $(".custom-menu1").finish().toggle(100).
   
   css({
       top: event.pageY + "px",
       left: event.pageX + "px"
   });
  });
  
  // If the document is clicked somewhere
  $(document).bind("mousedown", function (e) {
  
   if (!$(e.target).parents(".custom-menu").length > 0) {
    
       $(".custom-menu").hide(100);
      
   }
  
   if (!$(e.target).parents(".custom-menu1").length > 0) {
     
       $(".custom-menu1").hide(100);
    
   }
   
   
  });
  
  (function() {
  
  "use strict";
  
  var taskItems = document.querySelectorAll(".right_click");
  
  for ( var i = 0, len = taskItems.length; i < len; i++ ) {
   var taskItem = taskItems[i];
   contextMenuListener(taskItem);
  }
  
  function contextMenuListener(el) {
   el.addEventListener( "contextmenu", function(e) {
     console.log(e, el);
  
     var name = $(e.target).data('action');
     // console.log(e.target.getAttribute('data-action'));
     // console.log(name);
     $('#fid').val(name);
     $('#folder_id').val(name);
  
   });
  }
  
  })();
  
  
  
  // If the menu element is clicked
  $(".custom-menu li").click(function(){
   
  var valueee = document.getElementById('fid').value;
   // This is the triggered action name
   switch($(this).attr("data-action")) {
       
       // A case for each action. Your actions here
       case "first": 
       // alert("first"); 
         $.ajax({
                url:"<?php echo base_url();?>Employer/add_cv_folder",
                data: {parent:valueee},
                type: 'post',
                success: function(response){
                  
                  window.location.reload();
                }
              });
  
  
       break;
       case "second": 
          if (confirm("By deleting this folder all the content of this folder will get deleted!!")) {
           $.ajax({
                url:"<?php echo base_url();?>Employer/delete_folder",
                data: {id:valueee},
                type: 'post',
                success: function(response){
                  
                  window.location.reload();
                }
              });
  
         } else {
           txt = "You pressed Cancel!";
         }
          
        break;
       case "third": 
       // $("#"+ valueee).attr("contentEditable", true);
         // $('#').attr('contentEditable',true);
           $('#myModal').modal('show');
       break;
   }
  
   // Hide it AFTER the action was triggered
   $(".custom-menu").hide(100);
  });
  
  $(".custom-menu1 li").click(function(){
   
  var valueee = 0;
   // This is the triggered action name
   switch($(this).attr("data-action")) {
       
       // A case for each action. Your actions here
       case "first": 
       // alert("first"); 
         $.ajax({
                url:"<?php echo base_url();?>Employer/add_cv_folder",
                data: {parent:valueee},
                type: 'post',
                success: function(response){
                  
                  window.location.reload();
                }
              });
  
  
       break;
      
   }
  
   // Hide it AFTER the action was triggered
   $(".custom-menu1").hide(100);
  });
</script> 
</script>          
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
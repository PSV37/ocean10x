<?php $this->load->view('fontend/layout/employer_new_header.php');?>
<style>
   .cv_bank{margin-top:65px;
   }
   button.saerch_btn {
   background-color: #18c5bd;
   border: none;
   padding: 7px 40px;
   color: #fff;
   font-weight: 700;
   }
   button.saerch_btn:hover{
   background-color:#14a39d;
   }
   .dropdown {
   display: inline-block;
   position: relative;
   }
   .dd-button {
   display: inline-block;
   border: 1px solid #dedede;
   border-radius: 4px;
   padding: 5px 30px 5px 20px;
   background-color:#18c5bd;
   cursor: pointer;
   white-space: nowrap;
   border-radius: 33px;
   color:#fff;
   font-size:12px;
   }
   .dd-button:after {
   content: '';
   position: absolute;
   top: 50%;
   right: 15px;
   transform: translateY(-50%);
   width: 0; 
   height: 0; 
   border-left: 5px solid transparent;
   border-right: 5px solid transparent;
   border-top: 5px solid #7a7c7c;
   }
   .dd-button:hover {
   background-color:#18c5bd;
   }
   .rounded{border-radius:20px;}
   .dd-input {
   display: none;
   }
   .dd-menu {
   position: absolute;
   top: 100%;
   border: 1px solid #ccc;
   border-radius: 4px;
   padding: 0;
   margin: 2px 0 0 0;
   box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
   background-color: #ffffff;
   list-style-type: none;
   }
   .dd-input + .dd-menu {
   display: none;
   } 
   .dd-input:checked + .dd-menu {
   display: block;
   z-index:999;
   } 
   .dd-menu li {
   padding: 10px 20px;
   cursor: pointer;
   white-space: nowrap;
   font-size: 12px;
   color: #404040;
   }
   .dd-menu li:hover {
   background-color: #f6f6f6;
   }
   .dd-menu li a {
   display: block;
   margin: -10px -20px;
   padding: 10px 20px;
   }
   .dd-menu li.divider{
   padding: 0;
   border-bottom: 1px solid #cccccc;
   }
   .send{margin-top: 12px;
   background-color: #18c5bd;
   border: none;
   padding: 4px 20px;
   border-radius: 20px;
   color: #fff;
   font-size: 12px;
   float: right;
   }
   .active-job label {
   -webkit-perspective: 1000px;
   perspective: 1000px;
   -webkit-transform-style: preserve-3d;
   transform-style: preserve-3d;
   display: block;
   width:100%;
   position: absolute;
   left: 50%;
   top: 50%;
   -webkit-transform: translate(-50%, -50%);
   transform: translate(-50%, -50%);
   }
   .card {
   position: relative;
   height: auto;
   width: 100%;
   -webkit-transform-style: preserve-3d;  
   transform-style: preserve-3d;
   -webkit-transition: all 600ms;
   transition: all 600ms;
   border-radius:13px;
   padding:0px;
   margin-top:15px;
   }
   .card div {
   -webkit-backface-visibility: hidden;
   backface-visibility: hidden;
   border-radius: 5px;
   }
   .card .back {
   background: #222;
   -webkit-transform: rotateX(180deg);
   transform: rotateX(180deg);
   }
   /*
   :checked + .card {
   transform: rotateX(180deg);
   -webkit-transform: rotateX(180deg);
   }
   */
   .active-job {
   margin-top:168px;
   }
   .dropdown-menu>li>a{padding:3px 20px;}
   .front{padding:11px;height:auto;}
   .job-info {
   margin-left: 40px;
   margin-top:0px;
   }
   li.left-title {
   list-style-type: none;
   float: left;
   font-size: 12px;
   font-weight: 100;
   width:97px;
   height:15px;
   }
   li.right-title {
   list-style-type: none;
   font-size: 12px;
   font-weight: 100;
   width:260px;
   }
   .icon-info {
   margin-left:60px;
   margin-bottom:10px;
   }
   li.left-icon-title{
   list-style-type: none;
   float: left;
   }
   .left-icon-title i{color:#18c5bd;}
   li.right-icon-title {
   list-style-type: none;
   float: left;
   margin-right: 20px;
   font-weight:100;
   }
   .front .dropdown {
   top: -8px;
   width: 63px;
   position: absolute;
   right: 0px;
   }
   .detail-btn{
   background-color: #fff;
   padding: 3px 19px;
   border-radius: 20px;
   background-color: #18c5bd;
   border: none;
   color: #fff;
   font-weight: 100;
   float:right;
   margin-left:10px;}
   .detail-btn:hover{
   background-color:#107773;
   transition:0.8s; 
   }   
   .following-info {
   float:left;
   line-height:30px;
   margin-top:0px;
   margin-left:18px;
   }
   .following-info2 {
   margin-left:309px;
   line-height:30px;
   margin-top:0px;
   margin-bottom:15px;
   }
   .active-span{
   position: absolute;
   top: 12px;
   left: 405px;
   background-color: #8BC34A;
   padding: 1px 17px;
   border-radius: 9px;
   color: #fff;
   font-size: 11px;
   }
   .following-info3 {
   float: right;
   margin-top: -144px;
   line-height:30px;
   }
   label{display:block;}
   .test_history{margin-top:80px;}
   .result {
   margin-left: 42px;
   }
   .open>.dropdown-menu {
   display: block;
   width: fit-content;
   }
   .dropdown-menu-right {
   right: 0;
   left: auto;
   }
   button#gedf-drop1 {
   top: 0px;
   position: absolute;
   right: 0px;
   }
   .dropdown-menu {
   position: absolute;
   top:35;
   right: 0;
   z-index: 1000;
   display: none;
   float: left;
   min-width: 160px;
   padding: 5px 0;
   margin: 2px 0 0;
   font-size: 14px;
   text-align: left;
   list-style: none;
   background-color: #fff;
   background-clip: padding-box;
   border: 1px solid #ccc;
   border: 1px solid rgba(0,0,0,.15);
   border-radius: 4px;
   -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
   box-shadow: 0 6px 12px rgba(0,0,0,.175);
   }
   .check{right: 28px;
   z-index: 999;
   margin-top: 29px;
   position:absolute;}
   @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
   @keyframes bake-pie {
   from {
   transform: rotate(0deg) translate3d(0,0,0);
   }
   }
   main {
   margin: 30px auto;
   }
   .pieID {
   display: inline-block;
   vertical-align: top;
   }
   .pie {
   height: 200px;
   width: 200px;
   position: relative;
   }
   .pie::before {
   content: "";
   display: block;
   position: absolute;
   z-index: 1;
   width: 100px;
   height: 100px;
   background: #fff;
   border-radius: 50%;
   top: 50px;
   left: 50px;
   }
   .pie::after {
   content: "";
   display: block;
   width: 120px;
   height: 2px;
   background: rgba(0,0,0,0.1);
   border-radius: 50%;
   box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
   margin: 220px auto;
   }
   section {
   padding: 0px 45px 25px;
   }
   .slice {
   position: absolute;
   width: 200px;
   height: 200px;
   clip: rect(0px, 200px, 200px, 100px);
   animation: bake-pie 1s;
   }
   .slice span {
   display: block;
   position: absolute;
   top: 0;
   left: 0;
   background-color: black;
   width: 200px;
   height: 200px;
   border-radius: 50%;
   clip: rect(0px, 200px, 200px, 100px);
   }
   .legend {
   margin-left:31px;
   margin-top:30px !important;
   list-style-type: none;
   padding: 0;
   margin: 0;
   background: #FFF;
   padding: 15px;
   font-size: 13px;
   box-shadow: 1px 1px 0 #DDD,
   2px 2px 0 #BBB;
   }
   .last_section{border:solid 1px #e8e4e4;margin-top: 77px;padding:0px 10px;}
   .panel-title {
   font-size: 13px;
   color: #18c5bd;
   }
   .panel{background-color:#fbfbfb;}
   i.glyphicon.glyphicon-filter {
   color: #18c5bd;
   }
   .legend li {
   width: 166px;
   height: 1.25em;
   margin-bottom: 0.7em;
   padding-left: 0.5em;
   border-left: 1.25em solid black;
   }
   .legend em {
   font-style: normal;
   }
   .legend span {
   float: right;
   }
   .right_side{background-color:#fff;
   border:solid 1px #CCCCCC;
   border-radius:13px;
   margin-top:43px;
   }
   select.bs-select-hidden,
   select.selectpicker {
   display: none !important;
   }
   .bootstrap-select {
   width: 220px \0;
   /*IE9 and below*/
   }
   .bootstrap-select > .dropdown-toggle {
   width: 100%;
   padding-right: 25px;
   z-index: 1;
   }
   .bootstrap-select > .dropdown-toggle.bs-placeholder,
   .bootstrap-select > .dropdown-toggle.bs-placeholder:hover,
   .bootstrap-select > .dropdown-toggle.bs-placeholder:focus,
   .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
   color: #999;
   }
   .bootstrap-select > select {
   position: absolute !important;
   bottom: 0;
   left: 50%;
   display: block !important;
   width: 0.5px !important;
   height: 100% !important;
   padding: 0 !important;
   opacity: 0 !important;
   border: none;
   }
   .bootstrap-select > select.mobile-device {
   top: 0;
   left: 0;
   display: block !important;
   width: 100% !important;
   z-index: 2;
   }
   .has-error .bootstrap-select .dropdown-toggle,
   .error .bootstrap-select .dropdown-toggle {
   border-color: #b94a48;
   }
   .bootstrap-select.fit-width {
   width: auto !important;
   }
   .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
   width: 100%;
   }
   .bootstrap-select .dropdown-toggle:focus {
   outline: thin dotted #333333 !important;
   outline: 5px auto -webkit-focus-ring-color !important;
   outline-offset: -2px;
   }
   .bootstrap-select.form-control {
   margin-bottom: 0;
   padding: 0;
   border: none;
   }
   .bootstrap-select.form-control:not([class*="col-"]) {
   width: 100%;
   }
   .bootstrap-select.form-control.input-group-btn {
   z-index: auto;
   }
   .bootstrap-select.form-control.input-group-btn:not(:first-child):not(:last-child) > .btn {
   border-radius: 0;
   }
   .bootstrap-select.btn-group:not(.input-group-btn),
   .bootstrap-select.btn-group[class*="col-"] {
   float: none;
   display: inline-block;
   margin-left: 0;
   }
   .bootstrap-select.btn-group.dropdown-menu-right,
   .bootstrap-select.btn-group[class*="col-"].dropdown-menu-right,
   .row .bootstrap-select.btn-group[class*="col-"].dropdown-menu-right {
   float: right;
   }
   .form-inline .bootstrap-select.btn-group,
   .form-horizontal .bootstrap-select.btn-group,
   .form-group .bootstrap-select.btn-group {
   margin-bottom: 0;
   }
   .form-group-lg .bootstrap-select.btn-group.form-control,
   .form-group-sm .bootstrap-select.btn-group.form-control {
   padding: 0;
   }
   .form-inline .bootstrap-select.btn-group .form-control {
   width: 100%;
   }
   .bootstrap-select.btn-group.disabled,
   .bootstrap-select.btn-group > .disabled {
   cursor: not-allowed;
   }
   .bootstrap-select.btn-group.disabled:focus,
   .bootstrap-select.btn-group > .disabled:focus {
   outline: none !important;
   }
   .bootstrap-select.btn-group.bs-container {
   position: absolute;
   height: 0 !important;
   padding: 0 !important;
   }
   .bootstrap-select.btn-group.bs-container .dropdown-menu {
   z-index: 1060;
   }
   .bootstrap-select.btn-group .dropdown-toggle .filter-option {
   display: inline-block;
   overflow: hidden;
   width: 100%;
   text-align: left;
   }
   .bootstrap-select.btn-group .dropdown-toggle .caret {
   position: absolute;
   top: 50%;
   right: 12px;
   margin-top: -2px;
   vertical-align: middle;
   }
   .bootstrap-select.btn-group[class*="col-"] .dropdown-toggle {
   width: 100%;
   }
   .bootstrap-select.btn-group .dropdown-menu {
   min-width: 100%;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bootstrap-select.btn-group .dropdown-menu.inner {
   position: static;
   float: none;
   border: 0;
   padding: 0;
   margin: 0;
   border-radius: 0;
   -webkit-box-shadow: none;
   box-shadow: none;
   }
   .bootstrap-select.btn-group .dropdown-menu li {
   position: relative;
   }
   .bootstrap-select.btn-group .dropdown-menu li.active small {
   color: #fff;
   }
   .bootstrap-select.btn-group .dropdown-menu li.disabled a {
   cursor: not-allowed;
   }
   .bootstrap-select.btn-group .dropdown-menu li a {
   cursor: pointer;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }
   .bootstrap-select.btn-group .dropdown-menu li a.opt {
   position: relative;
   padding-left: 2.25em;
   }
   .bootstrap-select.btn-group .dropdown-menu li a span.check-mark {
   display: none;
   }
   .bootstrap-select.btn-group .dropdown-menu li a span.text {
   display: inline-block;
   }
   .bootstrap-select.btn-group .dropdown-menu li small {
   padding-left: 0.5em;
   }
   .bootstrap-select.btn-group .dropdown-menu .notify {
   position: absolute;
   bottom: 5px;
   width: 96%;
   margin: 0 2%;
   min-height: 26px;
   padding: 3px 5px;
   background: #f5f5f5;
   border: 1px solid #e3e3e3;
   -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
   pointer-events: none;
   opacity: 0.9;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bootstrap-select.btn-group .no-results {
   padding: 3px;
   background: #f5f5f5;
   margin: 0 5px;
   white-space: nowrap;
   }
   .bootstrap-select.btn-group.fit-width .dropdown-toggle .filter-option {
   position: static;
   }
   .bootstrap-select.btn-group.fit-width .dropdown-toggle .caret {
   position: static;
   top: auto;
   margin-top: -1px;
   }
   .bootstrap-select.btn-group.show-tick .dropdown-menu li.selected a span.check-mark {
   position: absolute;
   display: inline-block;
   right: 15px;
   margin-top: 5px;
   }
   .bootstrap-select.btn-group.show-tick .dropdown-menu li a span.text {
   margin-right: 34px;
   }
   .bootstrap-select.show-menu-arrow.open > .dropdown-toggle {
   z-index: 1061;
   }
   .bootstrap-select.show-menu-arrow .dropdown-toggle:before {
   content: '';
   border-left: 7px solid transparent;
   border-right: 7px solid transparent;
   border-bottom: 7px solid rgba(204, 204, 204, 0.2);
   position: absolute;
   bottom: -4px;
   left: 9px;
   display: none;
   }
   .bootstrap-select.show-menu-arrow .dropdown-toggle:after {
   content: '';
   border-left: 6px solid transparent;
   border-right: 6px solid transparent;
   border-bottom: 6px solid white;
   position: absolute;
   bottom: -4px;
   left: 10px;
   display: none;
   }
   .bootstrap-select.show-menu-arrow.dropup .dropdown-toggle:before {
   bottom: auto;
   top: -3px;
   border-top: 7px solid rgba(204, 204, 204, 0.2);
   border-bottom: 0;
   }
   .bootstrap-select.show-menu-arrow.dropup .dropdown-toggle:after {
   bottom: auto;
   top: -3px;
   border-top: 6px solid white;
   border-bottom: 0;
   }
   .bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle:before {
   right: 12px;
   left: auto;
   }
   .bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle:after {
   right: 13px;
   left: auto;
   }
   .bootstrap-select.show-menu-arrow.open > .dropdown-toggle:before,
   .bootstrap-select.show-menu-arrow.open > .dropdown-toggle:after {
   display: block;
   }
   .bs-searchbox,
   .bs-actionsbox,
   .bs-donebutton {
   padding: 4px 8px;
   }
   .bs-actionsbox {
   width: 100%;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bs-actionsbox .btn-group button {
   width: 50%;
   }
   .bs-donebutton {
   float: left;
   width: 100%;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bs-donebutton .btn-group button {
   width: 100%;
   }
   .bs-searchbox + .bs-actionsbox {
   padding: 0 8px 4px;
   }
   .bs-searchbox .form-control {
   margin-bottom: 0;
   width: 100%;
   float: none;
   }
   button.reset_filter {
   background-color: #18c5bd;
   width: 100%;
   margin-top: 20px;
   padding: 9px;
   border: none;
   margin-bottom: 20px;
   border-radius: 46px;
   color: #fff;
   font-weight: 700;
   }
   button.reset_filter:hover {
   background-color:#15a8a1;
   }
   .range-wrap {
   position: relative;
   margin: 0 auto 3rem;
   }
   .range {
   width: 100%;
   }
   .bubble {
   background:#afe1de;
   color: #000;
   padding: 4px 12px;
   position: absolute;
   border-radius: 4px;
   left: 50%;
   transform: translateX(-50%);
   }
   .bubble::after {
   content: "";
   position: absolute;
   width: 2px;
   height: 2px;
   background:#afe1de;  
   top: -1px;
   left: 50%;
   }
   .input-group-btn:last-child>.btn{background-color:#18c5bd;
   color:#fff;}

    button.btn.btn-primary {
    float: right;
    background-color: #18c5bd;
    border: none;
    border-radius: 35px;
}
</style>
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-md-6 cv_bank">
            <div class="row">
               <div class="col-md-8">
                  <form class="navbar-form" role="search">
                     <div class="input-group add-on" style="width:100%;margin-left:-15px;">
                        <input class="form-control" placeholder="Search based oh Name, Email id, Phone no." name="srch-term" id="srch-term" type="text">
                        <div class="input-group-btn">
                           <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                     </div>
                  </form>
                  <div class="clear"></div>
               </div>
               <div class="col-md-4">
                  <label class="dropdown" style="float:right;">
                     <div class="dd-button">
                        Sort by
                     </div>
                     <input type="checkbox" class="dd-input" id="test">
                     <ul class="dd-menu">
                        <li>Name</li>
                        <li>Experience</li>
                        <li>Education</li>
                     </ul>
                  </label>
               </div>
            </div>
            <div class="row" style="margin-top:20px;">
               <div class="col-md-4">
                  <label class="dropdown">
                     <div class="dd-button" style="background-color: #f3f3f3;color: #aeadad;">
                        Bulk Downlode
                     </div>
                     <input type="checkbox" class="dd-input" id="test">
                     <ul class="dd-menu">
                        <li>Bulk Downlode</li>
                        <li>Bulk Forward</li>
                     </ul>
                  </label>
               </div>
            </div>
            <div class="row">
               <div class="col-md-9">
                  <div class="placeholder_cmmn" id="auto_loc_wrap_srp">    
                     <input type="text" class="form-control rounded" tabindex="3" monstab="3" placeholder="Type The Job Post That You Want To Forward to the Below CV'S" onfocus="if(this.value==&quot;&quot;)this.value=&quot;&quot;" onblur="if(this.value=='')this.value=''" id="lmy_header" name="lmy">
                     <button class="send">send</button>
                     <a href="<?php echo base_url() ?>employer/add-new-cv"><button class="btn btn-primary"><i class="fas fa-plus"></i> Add New CV</button></a>
                  </div>
               </div>
            </div>
            <div class="box">
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
               <label>
                  <div class="check">
                     <input type="checkbox" />
                  </div>
                  <div class="card">
                     <div class="front">
                        <?php
                           if($on_ocean == 'Yes')
                             {
                           if(!empty($photo)){ ?>
                        <img src="<?php echo  base_url(); ?>upload/<?php if(!empty($photo[0]['photo_path'])){echo $photo[0]['photo_path'];} ?>" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php }else{ ?>
                        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                       <?php } }else{ ?>
                        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php } ?>
                        <div class="job-info">
                           <div class="a">
                              <li class="right-title" style="font-size:19px;margin-top:-4px;" ><?php echo $cv_row['js_name']; ?></li>
                           </div>
                        </div>
                        <div class="following-info">
                           <li class="left-title"
                              >Email</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_email']; ?></li>
                           <li class="left-title">Current Sal</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_current_ctc']; ?></li>
                           <li class="left-title">SkillSet</li>
                           <li class="right-title">&nbsp;: <?php echo $cv_row['js_skill_set']; ?></li>
                           <li class="left-title">Work Experince</li>
                           <li class="right-title">&nbsp;: <?php echo $cv_row['js_experience']; ?></li>
                           <div class="clear"></div>
                        </div>
                        <div class="following-info2">
                           <li class="left-title">Current Org</li>
                           <li class="right-title">&nbsp;:TKNS</li>
                           <li class="left-title">Notice Period </li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_current_notice_period']; ?></li>
                           <li class="left-title">Phone</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_mobile']; ?></li>
                           <li class="left-title">Designation</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_current_designation']; ?></li>
                           <div class="clear"></div>
                        </div>
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:47px;">
                           <li><a class="dropdown-item" href="#">Forward Job Post</a></li>
                           <li> <a class="dropdown-item" href="#">Downlode this cv</a></li>
                           <li> <a class="dropdown-item" href="#">Dummy 1</a></li>
                        </div>
                     </div>
                  </div>
               </label>
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
         <div class="col-md-3 right_side">
            <div class="pai_chart">
               <main>
                  <section>
                     <div class="pieID pie">
                     </div>
                     <ul class="pieID legend">
                        <li>
                           <em>Total cv</em>
                           <span>5000</span>
                        </li>
                        <li>
                           <em>Active cv</em>
                           <span>4500</span>
                        </li>
                        <li>
                           <em>Own cv's</em>
                           <span>3500</span>
                        </li>
                        <li>
                           <em>Consultant cv's</em>
                           <span>344</span>
                        </li>
                     </ul>
                  </section>
               </main>
            </div>
            <div class="filter1">
               <p style="font-size:18px;">Domain</p>
               <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">
                  <optgroup label="Driver Groups">
                     <option>BEC</option>
                     <option>VMA</option>
                  </optgroup>
                  <optgroup label="Drivers">
                     <option>Stan</option>
                     <option>Fanny</option>
                     <option>Rudy</option>
                     <option>Ahmed</option>
                  </optgroup>
               </select>
            </div>
            <div class="filter1">
               <p style="font-size:18px;margin-top:15px;">Experience</p>
               <div class="range-wrap">
                  <input type="range" class="range" min="0" max="20">
                  <output class="bubble"></output>
               </div>
            </div>
            <div class="filter1">
               <p style="font-size:18px;margin-top:15px;">Education</p>
               <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">
                  <optgroup label="Driver Groups">
                     <option>BEC</option>
                     <option>VMA</option>
                  </optgroup>
                  <optgroup label="Drivers">
                     <option>Stan</option>
                     <option>Fanny</option>
                     <option>Rudy</option>
                     <option>Ahmed</option>
                  </optgroup>
               </select>
            </div>
            <div class="filter1">
               <p style="font-size:18px;margin-top:15px;">Availability</p>
               <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">
                  <optgroup label="Driver Groups">
                     <option>BEC</option>
                     <option>VMA</option>
                  </optgroup>
                  <optgroup label="Drivers">
                     <option>Stan</option>
                     <option>Fanny</option>
                     <option>Rudy</option>
                     <option>Ahmed</option>
                  </optgroup>
               </select>
            </div>
            <div class="filter1">
               <p style="font-size:18px;margin-top:15px;">Current CTC</p>
               <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">
                  <optgroup label="Driver Groups">
                     <option>BEC</option>
                     <option>VMA</option>
                  </optgroup>
                  <optgroup label="Drivers">
                     <option>Stan</option>
                     <option>Fanny</option>
                     <option>Rudy</option>
                     <option>Ahmed</option>
                  </optgroup>
               </select>
            </div>
            <div class="filter1">
               <p style="font-size:18px;margin-top:15px;">Stability Filter</p>
               <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">
                  <optgroup label="Driver Groups">
                     <option>BEC</option>
                     <option>VMA</option>
                  </optgroup>
                  <optgroup label="Drivers">
                     <option>Stan</option>
                     <option>Fanny</option>
                     <option>Rudy</option>
                     <option>Ahmed</option>
                  </optgroup>
               </select>
            </div>
            <button class="reset_filter">Reset Filter</button>
         </div>
      </div>
   </div>
</div>
<script>
   function sliceSize(dataNum, dataTotal) {
     return (dataNum / dataTotal) * 360;
   }
   function addSlice(sliceSize, pieElement, offset, sliceID, color) {
     $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
     var offset = offset - 1;
     var sizeRotation = -179 + sliceSize;
     $("."+sliceID).css({
       "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
     });
     $("."+sliceID+" span").css({
       "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
       "background-color": color
     });
   }
   function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
     var sliceID = "s"+dataCount+"-"+sliceCount;
     var maxSize = 179;
     if(sliceSize<=maxSize) {
       addSlice(sliceSize, pieElement, offset, sliceID, color);
     } else {
       addSlice(maxSize, pieElement, offset, sliceID, color);
       iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
     }
   }
   function createPie(dataElement, pieElement) {
     var listData = [];
     $(dataElement+" span").each(function() {
       listData.push(Number($(this).html()));
     });
     var listTotal = 0;
     for(var i=0; i<listData.length; i++) {
       listTotal += listData[i];
     }
     var offset = 0;
     var color = [
      
       "#15dfb0", 
       "#21e5dc", 
       "#18c5bd", 
       "#11807b", 
       
      
     ];
     for(var i=0; i<listData.length; i++) {
       var size = sliceSize(listData[i], listTotal);
       iterateSlices(size, pieElement, offset, i, 0, color[i]);
       $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
       offset += size;
     }
   }
   createPie(".pieID.legend", ".pieID.pie");
   
</script>
<script>
   /**
   *   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables 
   *   but will likely encounter performance issues on larger tables.
   *
   *   <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
   *   $(input-element).filterTable()
   *   
   * The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
   */
   (function(){
      'use strict';
   
   
   
   
   
     var $ = jQuery;
   $.fn.extend({
     filterTable: function(){
       return this.each(function(){
         $(this).on('keyup', function(e){
           $('.filterTable_no_results').remove();
           var $this = $(this), 
                          search = $this.val().toLowerCase(), 
                          target = $this.attr('data-filters'), 
                          $target = $(target), 
                          $rows = $target.find('tbody tr');
                          
           if(search == '') {
             $rows.show(); 
           } else {
             $rows.each(function(){
               var $this = $(this);
               $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
             })
             if($target.find('tbody tr:visible').size() === 0) {
               var col_count = $target.find('tr').first().find('td').size();
               var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
               $target.find('tbody').append(no_results);
             }
           }
         });
       });
     }
   });
   $('[data-action="filter"]').filterTable();
   })(jQuery);
   
   $(function(){
      // attach table filter plugin to inputs
   $('[data-action="filter"]').filterTable();
   
   $('.container').on('click', '.panel-heading span.filter', function(e){
     var $this = $(this), 
       $panel = $this.parents('.panel');
     
     $panel.find('.panel-body').slideToggle();
     if($this.css('display') != 'none') {
       $panel.find('.panel-body input').focus();
     }
   });
   $('[data-toggle="tooltip"]').tooltip();
   })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>
   // Basic Slider
   var slider = new Slider("#basic", {
     tooltip: 'always'
   });
   
   // Vertical Slider
   var slider = new Slider("#vertical", {
     orientation: 'vertical',
     tooltip: 'always'
   });
   
   // Range Slider
   var slider = new Slider("#range", {
     min: 0,
     max: 100,
     value: [50, 80],
     range: true,
     tooltip: 'always'
   });
</script> 
<script>
   window.addEventListener("DOMContentLoaded",() => {
     let range1 = new NeumorphicRange({
         element: "#range1",
         tick: 1
       }),
       
       range3 = new NeumorphicRange({
         element:"#range3",
         tick: 10
       });
   });
   
   class NeumorphicRange {
     constructor(args) {
       this.el = document.querySelector(args.element);
       this.min = +this.el.min || 0;
       this.max = +this.el.max || 100;
       this.step = +this.el.step || 1;
       this.tick = args.tick || this.step;
       this.addTicks();
     }
     addTicks() {
       // div to contain everything
       let wrap = document.createElement("div");
       wrap.className = "range";
       this.el.parentElement.insertBefore(wrap,this.el);
       wrap.appendChild(this.el);
   
       // div to contain the ticks
       let ticks = document.createElement("div");
       ticks.className = "range__ticks";
       wrap.appendChild(ticks);
   
       // draw the ticks
       for (let t = this.min; t <= this.max; t += this.tick) {
         // zero-width span to allow proper space between each tick
         let tick = document.createElement("span");
         tick.className = "range__tick";
         ticks.appendChild(tick);
   
         let tickText = document.createElement("span");
         tickText.className = "range__tick-text";
         tick.appendChild(tickText);
         tickText.textContent = t;
       }
     }
   }
</script>
<script>
   /*!
    * Bootstrap-select v1.11.0 (https://silviomoreto.github.io/bootstrap-select)
    *
    * Copyright 2013-2016 bootstrap-select
    * Licensed under MIT (https://github.com/silviomoreto/bootstrap-select/blob/master/LICENSE)
    */
   
   (function (root, factory) {
     if (typeof define === 'function' && define.amd) {
       // AMD. Register as an anonymous module unless amdModuleId is set
       define(["jquery"], function (a0) {
         return (factory(a0));
       });
     } else if (typeof exports === 'object') {
       // Node. Does not work with strict CommonJS, but
       // only CommonJS-like environments that support module.exports,
       // like Node.
       module.exports = factory(require("jquery"));
     } else {
       factory(jQuery);
     }
   }(this, function (jQuery) {
   
   (function ($) {
     'use strict';
   
     //<editor-fold desc="Shims">
     if (!String.prototype.includes) {
       (function () {
         'use strict'; // needed to support `apply`/`call` with `undefined`/`null`
         var toString = {}.toString;
         var defineProperty = (function () {
           // IE 8 only supports `Object.defineProperty` on DOM elements
           try {
             var object = {};
             var $defineProperty = Object.defineProperty;
             var result = $defineProperty(object, object, object) && $defineProperty;
           } catch (error) {
           }
           return result;
         }());
         var indexOf = ''.indexOf;
         var includes = function (search) {
           if (this == null) {
             throw new TypeError();
           }
           var string = String(this);
           if (search && toString.call(search) == '[object RegExp]') {
             throw new TypeError();
           }
           var stringLength = string.length;
           var searchString = String(search);
           var searchLength = searchString.length;
           var position = arguments.length > 1 ? arguments[1] : undefined;
           // `ToInteger`
           var pos = position ? Number(position) : 0;
           if (pos != pos) { // better `isNaN`
             pos = 0;
           }
           var start = Math.min(Math.max(pos, 0), stringLength);
           // Avoid the `indexOf` call if no match is possible
           if (searchLength + start > stringLength) {
             return false;
           }
           return indexOf.call(string, searchString, pos) != -1;
         };
         if (defineProperty) {
           defineProperty(String.prototype, 'includes', {
             'value': includes,
             'configurable': true,
             'writable': true
           });
         } else {
           String.prototype.includes = includes;
         }
       }());
     }
   
     if (!String.prototype.startsWith) {
       (function () {
         'use strict'; // needed to support `apply`/`call` with `undefined`/`null`
         var defineProperty = (function () {
           // IE 8 only supports `Object.defineProperty` on DOM elements
           try {
             var object = {};
             var $defineProperty = Object.defineProperty;
             var result = $defineProperty(object, object, object) && $defineProperty;
           } catch (error) {
           }
           return result;
         }());
         var toString = {}.toString;
         var startsWith = function (search) {
           if (this == null) {
             throw new TypeError();
           }
           var string = String(this);
           if (search && toString.call(search) == '[object RegExp]') {
             throw new TypeError();
           }
           var stringLength = string.length;
           var searchString = String(search);
           var searchLength = searchString.length;
           var position = arguments.length > 1 ? arguments[1] : undefined;
           // `ToInteger`
           var pos = position ? Number(position) : 0;
           if (pos != pos) { // better `isNaN`
             pos = 0;
           }
           var start = Math.min(Math.max(pos, 0), stringLength);
           // Avoid the `indexOf` call if no match is possible
           if (searchLength + start > stringLength) {
             return false;
           }
           var index = -1;
           while (++index < searchLength) {
             if (string.charCodeAt(start + index) != searchString.charCodeAt(index)) {
               return false;
             }
           }
           return true;
         };
         if (defineProperty) {
           defineProperty(String.prototype, 'startsWith', {
             'value': startsWith,
             'configurable': true,
             'writable': true
           });
         } else {
           String.prototype.startsWith = startsWith;
         }
       }());
     }
   
     if (!Object.keys) {
       Object.keys = function (
         o, // object
         k, // key
         r  // result array
         ){
         // initialize object and result
         r=[];
         // iterate over object keys
         for (k in o)
             // fill result array with non-prototypical keys
           r.hasOwnProperty.call(o, k) && r.push(k);
         // return result
         return r;
       };
     }
   
     // set data-selected on options that are programmatically selected
     // prior to initialization of bootstrap-select
     var _val = $.fn.val;
     $.fn.val = function(value){
       if (this.is('select') && value) {
         this.find('option[value="' + value + '"]').data('selected', true);
       }
       
       return _val.apply(this, arguments);
     };
   
     var changed_arguments = null;
     $.fn.triggerNative = function (eventName) {
       var el = this[0],
           event;
   
       if (el.dispatchEvent) {
         if (typeof Event === 'function') {
           // For modern browsers
           event = new Event(eventName, {
             bubbles: true
           });
         } else {
           // For IE since it doesn't support Event constructor
           event = document.createEvent('Event');
           event.initEvent(eventName, true, false);
         }
   
         el.dispatchEvent(event);
       } else {
         if (el.fireEvent) {
           event = document.createEventObject();
           event.eventType = eventName;
           el.fireEvent('on' + eventName, event);
         }
   
         this.trigger(eventName);
       }
     };
     //</editor-fold>
   
     // Case insensitive contains search
     $.expr.pseudos.icontains = function (obj, index, meta) {
       var $obj = $(obj);
       var haystack = ($obj.data('tokens') || $obj.text()).toString().toUpperCase();
       return haystack.includes(meta[3].toUpperCase());
     };
   
     // Case insensitive begins search
     $.expr.pseudos.ibegins = function (obj, index, meta) {
       var $obj = $(obj);
       var haystack = ($obj.data('tokens') || $obj.text()).toString().toUpperCase();
       return haystack.startsWith(meta[3].toUpperCase());
     };
   
     // Case and accent insensitive contains search
     $.expr.pseudos.aicontains = function (obj, index, meta) {
       var $obj = $(obj);
       var haystack = ($obj.data('tokens') || $obj.data('normalizedText') || $obj.text()).toString().toUpperCase();
       return haystack.includes(meta[3].toUpperCase());
     };
   
     // Case and accent insensitive begins search
     $.expr.pseudos.aibegins = function (obj, index, meta) {
       var $obj = $(obj);
       var haystack = ($obj.data('tokens') || $obj.data('normalizedText') || $obj.text()).toString().toUpperCase();
       return haystack.startsWith(meta[3].toUpperCase());
     };
   
     /**
      * Remove all diatrics from the given text.
      * @access private
      * @param {String} text
      * @returns {String}
      */
     function normalizeToBase(text) {
       var rExps = [
         {re: /[\xC0-\xC6]/g, ch: "A"},
         {re: /[\xE0-\xE6]/g, ch: "a"},
         {re: /[\xC8-\xCB]/g, ch: "E"},
         {re: /[\xE8-\xEB]/g, ch: "e"},
         {re: /[\xCC-\xCF]/g, ch: "I"},
         {re: /[\xEC-\xEF]/g, ch: "i"},
         {re: /[\xD2-\xD6]/g, ch: "O"},
         {re: /[\xF2-\xF6]/g, ch: "o"},
         {re: /[\xD9-\xDC]/g, ch: "U"},
         {re: /[\xF9-\xFC]/g, ch: "u"},
         {re: /[\xC7-\xE7]/g, ch: "c"},
         {re: /[\xD1]/g, ch: "N"},
         {re: /[\xF1]/g, ch: "n"}
       ];
       $.each(rExps, function () {
         text = text.replace(this.re, this.ch);
       });
       return text;
     }
   
   
     function htmlEscape(html) {
       var escapeMap = {
         '&': '&amp;',
         '<': '&lt;',
         '>': '&gt;',
         '"': '&quot;',
         "'": '&#x27;',
         '`': '&#x60;'
       };
       var source = '(?:' + Object.keys(escapeMap).join('|') + ')',
           testRegexp = new RegExp(source),
           replaceRegexp = new RegExp(source, 'g'),
           string = html == null ? '' : '' + html;
       return testRegexp.test(string) ? string.replace(replaceRegexp, function (match) {
         return escapeMap[match];
       }) : string;
     }
   
     var Selectpicker = function (element, options, e) {
       // bootstrap-select has been initialized - revert val back to its original function
       if (_val) {
         $.fn.val = _val;
         _val = null;
       }
   
       if (e) {
         e.stopPropagation();
         e.preventDefault();
       }
   
       this.$element = $(element);
       this.$newElement = null;
       this.$button = null;
       this.$menu = null;
       this.$lis = null;
       this.options = options;
   
       // If we have no title yet, try to pull it from the html title attribute (jQuery doesnt' pick it up as it's not a
       // data-attribute)
       if (this.options.title === null) {
         this.options.title = this.$element.attr('title');
       }
   
       //Expose public methods
       this.val = Selectpicker.prototype.val;
       this.render = Selectpicker.prototype.render;
       this.refresh = Selectpicker.prototype.refresh;
       this.setStyle = Selectpicker.prototype.setStyle;
       this.selectAll = Selectpicker.prototype.selectAll;
       this.deselectAll = Selectpicker.prototype.deselectAll;
       this.destroy = Selectpicker.prototype.destroy;
       this.remove = Selectpicker.prototype.remove;
       this.show = Selectpicker.prototype.show;
       this.hide = Selectpicker.prototype.hide;
   
       this.init();
     };
   
     Selectpicker.VERSION = '1.11.0';
   
     // part of this is duplicated in i18n/defaults-en_US.js. Make sure to update both.
     Selectpicker.DEFAULTS = {
       noneSelectedText: 'Nothing selected',
       noneResultsText: 'No results matched {0}',
       countSelectedText: function (numSelected, numTotal) {
         return (numSelected == 1) ? "{0} item selected" : "{0} items selected";
       },
       maxOptionsText: function (numAll, numGroup) {
         return [
           (numAll == 1) ? 'Limit reached ({n} item max)' : 'Limit reached ({n} items max)',
           (numGroup == 1) ? 'Group limit reached ({n} item max)' : 'Group limit reached ({n} items max)'
         ];
       },
       selectAllText: 'Select All',
       deselectAllText: 'Deselect All',
       doneButton: false,
       doneButtonText: 'Close',
       multipleSeparator: ', ',
       styleBase: 'btn',
       style: 'btn-default',
       size: 'auto',
       title: null,
       selectedTextFormat: 'values',
       width: false,
       container: false,
       hideDisabled: false,
       showSubtext: false,
       showIcon: true,
       showContent: true,
       dropupAuto: true,
       header: false,
       liveSearch: false,
       liveSearchPlaceholder: null,
       liveSearchNormalize: false,
       liveSearchStyle: 'contains',
       actionsBox: false,
       iconBase: 'glyphicon',
       tickIcon: 'glyphicon-ok',
       showTick: false,
       template: {
         caret: '<span class="caret"></span>'
       },
       maxOptions: false,
       mobile: false,
       selectOnTab: false,
       dropdownAlignRight: false
     };
   
     Selectpicker.prototype = {
   
       constructor: Selectpicker,
   
       init: function () {
         var that = this,
             id = this.$element.attr('id');
   
         this.$element.addClass('bs-select-hidden');
   
         // store originalIndex (key) and newIndex (value) in this.liObj for fast accessibility
         // allows us to do this.$lis.eq(that.liObj[index]) instead of this.$lis.filter('[data-original-index="' + index + '"]')
         this.liObj = {};
         this.multiple = this.$element.prop('multiple');
         this.autofocus = this.$element.prop('autofocus');
         this.$newElement = this.createView();
         this.$element
           .after(this.$newElement)
           .appendTo(this.$newElement);
         this.$button = this.$newElement.children('button');
         this.$menu = this.$newElement.children('.dropdown-menu');
         this.$menuInner = this.$menu.children('.inner');
         this.$searchbox = this.$menu.find('input');
   
         this.$element.removeClass('bs-select-hidden');
   
         if (this.options.dropdownAlignRight === true) this.$menu.addClass('dropdown-menu-right');
   
         if (typeof id !== 'undefined') {
           this.$button.attr('data-id', id);
           $('label[for="' + id + '"]').click(function (e) {
             e.preventDefault();
             that.$button.focus();
           });
         }
   
         this.checkDisabled();
         this.clickListener();
         if (this.options.liveSearch) this.liveSearchListener();
         this.render();
         this.setStyle();
         this.setWidth();
         if (this.options.container) this.selectPosition();
         this.$menu.data('this', this);
         this.$newElement.data('this', this);
         if (this.options.mobile) this.mobile();
   
         this.$newElement.on({
           'hide.bs.dropdown': function (e) {
             that.$menuInner.attr('aria-expanded', false);
             that.$element.trigger('hide.bs.select', e);
           },
           'hidden.bs.dropdown': function (e) {
             that.$element.trigger('hidden.bs.select', e);
           },
           'show.bs.dropdown': function (e) {
             that.$menuInner.attr('aria-expanded', true);
             that.$element.trigger('show.bs.select', e);
           },
           'shown.bs.dropdown': function (e) {
             that.$element.trigger('shown.bs.select', e);
           }
         });
   
         if (that.$element[0].hasAttribute('required')) {
           this.$element.on('invalid', function () {
             that.$button
               .addClass('bs-invalid')
               .focus();
   
             that.$element.on({
               'focus.bs.select': function () {
                 that.$button.focus();
                 that.$element.off('focus.bs.select');
               },
               'shown.bs.select': function () {
                 that.$element
                   .val(that.$element.val()) // set the value to hide the validation message in Chrome when menu is opened
                   .off('shown.bs.select');
               },
               'rendered.bs.select': function () {
                 // if select is no longer invalid, remove the bs-invalid class
                 if (this.validity.valid) that.$button.removeClass('bs-invalid');
                 that.$element.off('rendered.bs.select');
               }
             });
           });
         }
   
         setTimeout(function () {
           that.$element.trigger('loaded.bs.select');
         });
       },
   
       createDropdown: function () {
         // Options
         // If we are multiple or showTick option is set, then add the show-tick class
         var showTick = (this.multiple || this.options.showTick) ? ' show-tick' : '',
             inputGroup = this.$element.parent().hasClass('input-group') ? ' input-group-btn' : '',
             autofocus = this.autofocus ? ' autofocus' : '';
         // Elements
         var header = this.options.header ? '<div class="popover-title"><button type="button" class="close" aria-hidden="true">&times;</button>' + this.options.header + '</div>' : '';
         var searchbox = this.options.liveSearch ?
         '<div class="bs-searchbox">' +
         '<input type="text" class="form-control" autocomplete="off"' +
         (null === this.options.liveSearchPlaceholder ? '' : ' placeholder="' + htmlEscape(this.options.liveSearchPlaceholder) + '"') + ' role="textbox" aria-label="Search">' +
         '</div>'
             : '';
         var actionsbox = this.multiple && this.options.actionsBox ?
         '<div class="bs-actionsbox">' +
         '<div class="btn-group btn-group-sm btn-block">' +
         '<button type="button" class="actions-btn bs-select-all btn btn-default">' +
         this.options.selectAllText +
         '</button>' +
         '<button type="button" class="actions-btn bs-deselect-all btn btn-default">' +
         this.options.deselectAllText +
         '</button>' +
         '</div>' +
         '</div>'
             : '';
         var donebutton = this.multiple && this.options.doneButton ?
         '<div class="bs-donebutton">' +
         '<div class="btn-group btn-block">' +
         '<button type="button" class="btn btn-sm btn-default">' +
         this.options.doneButtonText +
         '</button>' +
         '</div>' +
         '</div>'
             : '';
         var drop =
             '<div class="btn-group bootstrap-select' + showTick + inputGroup + '">' +
             '<button type="button" class="' + this.options.styleBase + ' dropdown-toggle" data-toggle="dropdown"' + autofocus + ' role="button">' +
             '<span class="filter-option pull-left"></span>&nbsp;' +
             '<span class="bs-caret">' +
             this.options.template.caret +
             '</span>' +
             '</button>' +
             '<div class="dropdown-menu open" role="combobox">' +
             header +
             searchbox +
             actionsbox +
             '<ul class="dropdown-menu inner" role="listbox" aria-expanded="false">' +
             '</ul>' +
             donebutton +
             '</div>' +
             '</div>';
   
         return $(drop);
       },
   
       createView: function () {
         var $drop = this.createDropdown(),
             li = this.createLi();
   
         $drop.find('ul')[0].innerHTML = li;
         return $drop;
       },
   
       reloadLi: function () {
         //Remove all children.
         this.destroyLi();
         //Re build
         var li = this.createLi();
         this.$menuInner[0].innerHTML = li;
       },
   
       destroyLi: function () {
         this.$menu.find('li').remove();
       },
   
       createLi: function () {
         var that = this,
             _li = [],
             optID = 0,
             titleOption = document.createElement('option'),
             liIndex = -1; // increment liIndex whenever a new <li> element is created to ensure liObj is correct
   
         // Helper functions
         /**
          * @param content
          * @param [index]
          * @param [classes]
          * @param [optgroup]
          * @returns {string}
          */
         var generateLI = function (content, index, classes, optgroup) {
           return '<li' +
               ((typeof classes !== 'undefined' & '' !== classes) ? ' class="' + classes + '"' : '') +
               ((typeof index !== 'undefined' & null !== index) ? ' data-original-index="' + index + '"' : '') +
               ((typeof optgroup !== 'undefined' & null !== optgroup) ? 'data-optgroup="' + optgroup + '"' : '') +
               '>' + content + '</li>';
         };
   
         /**
          * @param text
          * @param [classes]
          * @param [inline]
          * @param [tokens]
          * @returns {string}
          */
         var generateA = function (text, classes, inline, tokens) {
           return '<a tabindex="0"' +
               (typeof classes !== 'undefined' ? ' class="' + classes + '"' : '') +
               (typeof inline !== 'undefined' ? ' style="' + inline + '"' : '') +
               (that.options.liveSearchNormalize ? ' data-normalized-text="' + normalizeToBase(htmlEscape(text)) + '"' : '') +
               (typeof tokens !== 'undefined' || tokens !== null ? ' data-tokens="' + tokens + '"' : '') +
               ' role="option">' + text +
               '<span class="' + that.options.iconBase + ' ' + that.options.tickIcon + ' check-mark"></span>' +
               '</a>';
         };
   
         if (this.options.title && !this.multiple) {
           // this option doesn't create a new <li> element, but does add a new option, so liIndex is decreased
           // since liObj is recalculated on every refresh, liIndex needs to be decreased even if the titleOption is already appended
           liIndex--;
   
           if (!this.$element.find('.bs-title-option').length) {
             // Use native JS to prepend option (faster)
             var element = this.$element[0];
             titleOption.className = 'bs-title-option';
             titleOption.appendChild(document.createTextNode(this.options.title));
             titleOption.value = '';
             element.insertBefore(titleOption, element.firstChild);
             // Check if selected or data-selected attribute is already set on an option. If not, select the titleOption option.
             // the selected item may have been changed by user or programmatically before the bootstrap select plugin runs,
             // if so, the option will have the data-selected attribute
             var $opt = $(element.options[element.selectedIndex]);
             if ($opt.attr('selected') === undefined && $opt.data('selected') === undefined) {
               titleOption.selected = true;
             }
           }
         }
   
         this.$element.find('option').each(function (index) {
           var $this = $(this);
   
           liIndex++;
   
           if ($this.hasClass('bs-title-option')) return;
   
           // Get the class and text for the option
           var optionClass = this.className || '',
               inline = this.style.cssText,
               text = $this.data('content') ? $this.data('content') : $this.html(),
               tokens = $this.data('tokens') ? $this.data('tokens') : null,
               subtext = typeof $this.data('subtext') !== 'undefined' ? '<small class="text-muted">' + $this.data('subtext') + '</small>' : '',
               icon = typeof $this.data('icon') !== 'undefined' ? '<span class="' + that.options.iconBase + ' ' + $this.data('icon') + '"></span> ' : '',
               $parent = $this.parent(),
               isOptgroup = $parent[0].tagName === 'OPTGROUP',
               isOptgroupDisabled = isOptgroup && $parent[0].disabled,
               isDisabled = this.disabled || isOptgroupDisabled;
   
           if (icon !== '' && isDisabled) {
             icon = '<span>' + icon + '</span>';
           }
   
           if (that.options.hideDisabled && (isDisabled && !isOptgroup || isOptgroupDisabled)) {
             liIndex--;
             return;
           }
   
           if (!$this.data('content')) {
             // Prepend any icon and append any subtext to the main text.
             text = icon + '<span class="text">' + text + subtext + '</span>';
           }
   
           if (isOptgroup && $this.data('divider') !== true) {
             if (that.options.hideDisabled && isDisabled) {
               if ($parent.data('allOptionsDisabled') === undefined) {
                 var $options = $parent.children();
                 $parent.data('allOptionsDisabled', $options.filter(':disabled').length === $options.length);
               }
   
               if ($parent.data('allOptionsDisabled')) {
                 liIndex--;
                 return;
               }
             }
   
             var optGroupClass = ' ' + $parent[0].className || '';
   
             if ($this.index() === 0) { // Is it the first option of the optgroup?
               optID += 1;
   
               // Get the opt group label
               var label = $parent[0].label,
                   labelSubtext = typeof $parent.data('subtext') !== 'undefined' ? '<small class="text-muted">' + $parent.data('subtext') + '</small>' : '',
                   labelIcon = $parent.data('icon') ? '<span class="' + that.options.iconBase + ' ' + $parent.data('icon') + '"></span> ' : '';
   
               label = labelIcon + '<span class="text">' + label + labelSubtext + '</span>';
   
               if (index !== 0 && _li.length > 0) { // Is it NOT the first option of the select && are there elements in the dropdown?
                 liIndex++;
                 _li.push(generateLI('', null, 'divider', optID + 'div'));
               }
               liIndex++;
               _li.push(generateLI(label, null, 'dropdown-header' + optGroupClass, optID));
             }
   
             if (that.options.hideDisabled && isDisabled) {
               liIndex--;
               return;
             }
   
             _li.push(generateLI(generateA(text, 'opt ' + optionClass + optGroupClass, inline, tokens), index, '', optID));
           } else if ($this.data('divider') === true) {
             _li.push(generateLI('', index, 'divider'));
           } else if ($this.data('hidden') === true) {
             _li.push(generateLI(generateA(text, optionClass, inline, tokens), index, 'hidden is-hidden'));
           } else {
             var showDivider = this.previousElementSibling && this.previousElementSibling.tagName === 'OPTGROUP';
   
             // if previous element is not an optgroup and hideDisabled is true
             if (!showDivider && that.options.hideDisabled) {
               // get previous elements
               var $prev = $(this).prevAll();
   
               for (var i = 0; i < $prev.length; i++) {
                 // find the first element in the previous elements that is an optgroup
                 if ($prev[i].tagName === 'OPTGROUP') {
                   var optGroupDistance = 0;
   
                   // loop through the options in between the current option and the optgroup
                   // and check if they are hidden or disabled
                   for (var d = 0; d < i; d++) {
                     var prevOption = $prev[d];
                     if (prevOption.disabled || $(prevOption).data('hidden') === true) optGroupDistance++;
                   }
   
                   // if all of the options between the current option and the optgroup are hidden or disabled, show the divider
                   if (optGroupDistance === i) showDivider = true;
   
                   break;
                 }
               }
             }
   
             if (showDivider) {
               liIndex++;
               _li.push(generateLI('', null, 'divider', optID + 'div'));
             }
             _li.push(generateLI(generateA(text, optionClass, inline, tokens), index));
           }
   
           that.liObj[index] = liIndex;
         });
   
         //If we are not multiple, we don't have a selected item, and we don't have a title, select the first element so something is set in the button
         if (!this.multiple && this.$element.find('option:selected').length === 0 && !this.options.title) {
           this.$element.find('option').eq(0).prop('selected', true).attr('selected', 'selected');
         }
   
         return _li.join('');
       },
   
       findLis: function () {
         if (this.$lis == null) this.$lis = this.$menu.find('li');
         return this.$lis;
       },
   
       /**
        * @param [updateLi] defaults to true
        */
       render: function (updateLi) {
         var that = this,
             notDisabled;
   
         //Update the LI to match the SELECT
         if (updateLi !== false) {
           this.$element.find('option').each(function (index) {
             var $lis = that.findLis().eq(that.liObj[index]);
   
             that.setDisabled(index, this.disabled || this.parentNode.tagName === 'OPTGROUP' && this.parentNode.disabled, $lis);
             that.setSelected(index, this.selected, $lis);
           });
         }
   
         this.togglePlaceholder();
   
         this.tabIndex();
   
         var selectedItems = this.$element.find('option').map(function () {
           if (this.selected) {
             if (that.options.hideDisabled && (this.disabled || this.parentNode.tagName === 'OPTGROUP' && this.parentNode.disabled)) return;
   
             var $this = $(this),
                 icon = $this.data('icon') && that.options.showIcon ? '<i class="' + that.options.iconBase + ' ' + $this.data('icon') + '"></i> ' : '',
                 subtext;
   
             if (that.options.showSubtext && $this.data('subtext') && !that.multiple) {
               subtext = ' <small class="text-muted">' + $this.data('subtext') + '</small>';
             } else {
               subtext = '';
             }
             if (typeof $this.attr('title') !== 'undefined') {
               return $this.attr('title');
             } else if ($this.data('content') && that.options.showContent) {
               return $this.data('content');
             } else {
               return icon + $this.html() + subtext;
             }
           }
         }).toArray();
   
         //Fixes issue in IE10 occurring when no default option is selected and at least one option is disabled
         //Convert all the values into a comma delimited string
         var title = !this.multiple ? selectedItems[0] : selectedItems.join(this.options.multipleSeparator);
   
         //If this is multi select, and the selectText type is count, the show 1 of 2 selected etc..
         if (this.multiple && this.options.selectedTextFormat.indexOf('count') > -1) {
           var max = this.options.selectedTextFormat.split('>');
           if ((max.length > 1 && selectedItems.length > max[1]) || (max.length == 1 && selectedItems.length >= 2)) {
             notDisabled = this.options.hideDisabled ? ', [disabled]' : '';
             var totalCount = this.$element.find('option').not('[data-divider="true"], [data-hidden="true"]' + notDisabled).length,
                 tr8nText = (typeof this.options.countSelectedText === 'function') ? this.options.countSelectedText(selectedItems.length, totalCount) : this.options.countSelectedText;
             title = tr8nText.replace('{0}', selectedItems.length.toString()).replace('{1}', totalCount.toString());
           }
         }
   
         if (this.options.title == undefined) {
           this.options.title = this.$element.attr('title');
         }
   
         if (this.options.selectedTextFormat == 'static') {
           title = this.options.title;
         }
   
         //If we dont have a title, then use the default, or if nothing is set at all, use the not selected text
         if (!title) {
           title = typeof this.options.title !== 'undefined' ? this.options.title : this.options.noneSelectedText;
         }
   
         //strip all html-tags and trim the result
         this.$button.attr('title', $.trim(title.replace(/<[^>]*>?/g, '')));
         this.$button.children('.filter-option').html(title);
   
         this.$element.trigger('rendered.bs.select');
       },
   
       /**
        * @param [style]
        * @param [status]
        */
       setStyle: function (style, status) {
         if (this.$element.attr('class')) {
           this.$newElement.addClass(this.$element.attr('class').replace(/selectpicker|mobile-device|bs-select-hidden|validate\[.*\]/gi, ''));
         }
   
         var buttonClass = style ? style : this.options.style;
   
         if (status == 'add') {
           this.$button.addClass(buttonClass);
         } else if (status == 'remove') {
           this.$button.removeClass(buttonClass);
         } else {
           this.$button.removeClass(this.options.style);
           this.$button.addClass(buttonClass);
         }
       },
   
       liHeight: function (refresh) {
         if (!refresh && (this.options.size === false || this.sizeInfo)) return;
   
         var newElement = document.createElement('div'),
             menu = document.createElement('div'),
             menuInner = document.createElement('ul'),
             divider = document.createElement('li'),
             li = document.createElement('li'),
             a = document.createElement('a'),
             text = document.createElement('span'),
             header = this.options.header && this.$menu.find('.popover-title').length > 0 ? this.$menu.find('.popover-title')[0].cloneNode(true) : null,
             search = this.options.liveSearch ? document.createElement('div') : null,
             actions = this.options.actionsBox && this.multiple && this.$menu.find('.bs-actionsbox').length > 0 ? this.$menu.find('.bs-actionsbox')[0].cloneNode(true) : null,
             doneButton = this.options.doneButton && this.multiple && this.$menu.find('.bs-donebutton').length > 0 ? this.$menu.find('.bs-donebutton')[0].cloneNode(true) : null;
   
         text.className = 'text';
         newElement.className = this.$menu[0].parentNode.className + ' open';
         menu.className = 'dropdown-menu open';
         menuInner.className = 'dropdown-menu inner';
         divider.className = 'divider';
   
         text.appendChild(document.createTextNode('Inner text'));
         a.appendChild(text);
         li.appendChild(a);
         menuInner.appendChild(li);
         menuInner.appendChild(divider);
         if (header) menu.appendChild(header);
         if (search) {
           // create a span instead of input as creating an input element is slower
           var input = document.createElement('span');
           search.className = 'bs-searchbox';
           input.className = 'form-control';
           search.appendChild(input);
           menu.appendChild(search);
         }
         if (actions) menu.appendChild(actions);
         menu.appendChild(menuInner);
         if (doneButton) menu.appendChild(doneButton);
         newElement.appendChild(menu);
   
         document.body.appendChild(newElement);
   
         var liHeight = a.offsetHeight,
             headerHeight = header ? header.offsetHeight : 0,
             searchHeight = search ? search.offsetHeight : 0,
             actionsHeight = actions ? actions.offsetHeight : 0,
             doneButtonHeight = doneButton ? doneButton.offsetHeight : 0,
             dividerHeight = $(divider).outerHeight(true),
             // fall back to jQuery if getComputedStyle is not supported
             menuStyle = typeof getComputedStyle === 'function' ? getComputedStyle(menu) : false,
             $menu = menuStyle ? null : $(menu),
             menuPadding = {
               vert: parseInt(menuStyle ? menuStyle.paddingTop : $menu.css('paddingTop')) +
                     parseInt(menuStyle ? menuStyle.paddingBottom : $menu.css('paddingBottom')) +
                     parseInt(menuStyle ? menuStyle.borderTopWidth : $menu.css('borderTopWidth')) +
                     parseInt(menuStyle ? menuStyle.borderBottomWidth : $menu.css('borderBottomWidth')),
               horiz: parseInt(menuStyle ? menuStyle.paddingLeft : $menu.css('paddingLeft')) +
                     parseInt(menuStyle ? menuStyle.paddingRight : $menu.css('paddingRight')) +
                     parseInt(menuStyle ? menuStyle.borderLeftWidth : $menu.css('borderLeftWidth')) +
                     parseInt(menuStyle ? menuStyle.borderRightWidth : $menu.css('borderRightWidth'))
             },
             menuExtras =  {
               vert: menuPadding.vert +
                     parseInt(menuStyle ? menuStyle.marginTop : $menu.css('marginTop')) +
                     parseInt(menuStyle ? menuStyle.marginBottom : $menu.css('marginBottom')) + 2,
               horiz: menuPadding.horiz +
                     parseInt(menuStyle ? menuStyle.marginLeft : $menu.css('marginLeft')) +
                     parseInt(menuStyle ? menuStyle.marginRight : $menu.css('marginRight')) + 2
             }
   
         document.body.removeChild(newElement);
   
         this.sizeInfo = {
           liHeight: liHeight,
           headerHeight: headerHeight,
           searchHeight: searchHeight,
           actionsHeight: actionsHeight,
           doneButtonHeight: doneButtonHeight,
           dividerHeight: dividerHeight,
           menuPadding: menuPadding,
           menuExtras: menuExtras
         };
       },
   
       setSize: function () {
         this.findLis();
         this.liHeight();
   
         if (this.options.header) this.$menu.css('padding-top', 0);
         if (this.options.size === false) return;
   
         var that = this,
             $menu = this.$menu,
             $menuInner = this.$menuInner,
             $window = $(window),
             selectHeight = this.$newElement[0].offsetHeight,
             selectWidth = this.$newElement[0].offsetWidth,
             liHeight = this.sizeInfo['liHeight'],
             headerHeight = this.sizeInfo['headerHeight'],
             searchHeight = this.sizeInfo['searchHeight'],
             actionsHeight = this.sizeInfo['actionsHeight'],
             doneButtonHeight = this.sizeInfo['doneButtonHeight'],
             divHeight = this.sizeInfo['dividerHeight'],
             menuPadding = this.sizeInfo['menuPadding'],
             menuExtras = this.sizeInfo['menuExtras'],
             notDisabled = this.options.hideDisabled ? '.disabled' : '',
             menuHeight,
             menuWidth,
             getHeight,
             getWidth,
             selectOffsetTop,
             selectOffsetBot,
             selectOffsetLeft,
             selectOffsetRight,
             getPos = function() {
               var pos = that.$newElement.offset(),
                   $container = $(that.options.container),
                   containerPos;
   
               if (that.options.container && !$container.is('body')) {
                 containerPos = $container.offset();
                 containerPos.top += parseInt($container.css('borderTopWidth'));
                 containerPos.left += parseInt($container.css('borderLeftWidth'));
               } else {
                 containerPos = { top: 0, left: 0 };
               }
   
               selectOffsetTop = pos.top - containerPos.top - $window.scrollTop();
               selectOffsetBot = $window.height() - selectOffsetTop - selectHeight - containerPos.top;
               selectOffsetLeft = pos.left - containerPos.left - $window.scrollLeft();
               selectOffsetRight = $window.width() - selectOffsetLeft - selectWidth - containerPos.left;
             };
   
         getPos();
   
         if (this.options.size === 'auto') {
           var getSize = function () {
             var minHeight,
                 hasClass = function (className, include) {
                   return function (element) {
                       if (include) {
                           return (element.classList ? element.classList.contains(className) : $(element).hasClass(className));
                       } else {
                           return !(element.classList ? element.classList.contains(className) : $(element).hasClass(className));
                       }
                   };
                 },
                 lis = that.$menuInner[0].getElementsByTagName('li'),
                 lisVisible = Array.prototype.filter ? Array.prototype.filter.call(lis, hasClass('hidden', false)) : that.$lis.not('.hidden'),
                 optGroup = Array.prototype.filter ? Array.prototype.filter.call(lisVisible, hasClass('dropdown-header', true)) : lisVisible.filter('.dropdown-header');
   
             getPos();
             menuHeight = selectOffsetBot - menuExtras.vert;
             menuWidth = selectOffsetRight - menuExtras.horiz;
   
             if (that.options.container) {
               if (!$menu.data('height')) $menu.data('height', $menu.height());
               getHeight = $menu.data('height');
   
               if (!$menu.data('width')) $menu.data('width', $menu.width());
               getWidth = $menu.data('width');
             } else {
               getHeight = $menu.height();
               getWidth = $menu.width();
             }
   
             if (that.options.dropupAuto) {
               that.$newElement.toggleClass('dropup', selectOffsetTop > selectOffsetBot && (menuHeight - menuExtras.vert) < getHeight);
             }
   
             if (that.$newElement.hasClass('dropup')) {
               menuHeight = selectOffsetTop - menuExtras.vert;
             }
   
             if (that.options.dropdownAlignRight === 'auto') {
               $menu.toggleClass('dropdown-menu-right', selectOffsetLeft > selectOffsetRight && (menuWidth - menuExtras.horiz) < (getWidth - selectWidth));
             }
   
             if ((lisVisible.length + optGroup.length) > 3) {
               minHeight = liHeight * 3 + menuExtras.vert - 2;
             } else {
               minHeight = 0;
             }
   
             $menu.css({
               'max-height': menuHeight + 'px',
               'overflow': 'hidden',
               'min-height': minHeight + headerHeight + searchHeight + actionsHeight + doneButtonHeight + 'px'
             });
             $menuInner.css({
               'max-height': menuHeight - headerHeight - searchHeight - actionsHeight - doneButtonHeight - menuPadding.vert + 'px',
               'overflow-y': 'auto',
               'min-height': Math.max(minHeight - menuPadding.vert, 0) + 'px'
             });
           };
           getSize();
           this.$searchbox.off('input.getSize propertychange.getSize').on('input.getSize propertychange.getSize', getSize);
           $window.off('resize.getSize scroll.getSize').on('resize.getSize scroll.getSize', getSize);
         } else if (this.options.size && this.options.size != 'auto' && this.$lis.not(notDisabled).length > this.options.size) {
           var optIndex = this.$lis.not('.divider').not(notDisabled).children().slice(0, this.options.size).last().parent().index(),
               divLength = this.$lis.slice(0, optIndex + 1).filter('.divider').length;
           menuHeight = liHeight * this.options.size + divLength * divHeight + menuPadding.vert;
   
           if (that.options.container) {
             if (!$menu.data('height')) $menu.data('height', $menu.height());
             getHeight = $menu.data('height');
           } else {
             getHeight = $menu.height();
           }
   
           if (that.options.dropupAuto) {
             //noinspection JSUnusedAssignment
             this.$newElement.toggleClass('dropup', selectOffsetTop > selectOffsetBot && (menuHeight - menuExtras.vert) < getHeight);
           }
           $menu.css({
             'max-height': menuHeight + headerHeight + searchHeight + actionsHeight + doneButtonHeight + 'px',
             'overflow': 'hidden',
             'min-height': ''
           });
           $menuInner.css({
             'max-height': menuHeight - menuPadding.vert + 'px',
             'overflow-y': 'auto',
             'min-height': ''
           });
         }
       },
   
       setWidth: function () {
         if (this.options.width === 'auto') {
           this.$menu.css('min-width', '0');
   
           // Get correct width if element is hidden
           var $selectClone = this.$menu.parent().clone().appendTo('body'),
               $selectClone2 = this.options.container ? this.$newElement.clone().appendTo('body') : $selectClone,
               ulWidth = $selectClone.children('.dropdown-menu').outerWidth(),
               btnWidth = $selectClone2.css('width', 'auto').children('button').outerWidth();
   
           $selectClone.remove();
           $selectClone2.remove();
   
           // Set width to whatever's larger, button title or longest option
           this.$newElement.css('width', Math.max(ulWidth, btnWidth) + 'px');
         } else if (this.options.width === 'fit') {
           // Remove inline min-width so width can be changed from 'auto'
           this.$menu.css('min-width', '');
           this.$newElement.css('width', '').addClass('fit-width');
         } else if (this.options.width) {
           // Remove inline min-width so width can be changed from 'auto'
           this.$menu.css('min-width', '');
           this.$newElement.css('width', this.options.width);
         } else {
           // Remove inline min-width/width so width can be changed
           this.$menu.css('min-width', '');
           this.$newElement.css('width', '');
         }
         // Remove fit-width class if width is changed programmatically
         if (this.$newElement.hasClass('fit-width') && this.options.width !== 'fit') {
           this.$newElement.removeClass('fit-width');
         }
       },
   
       selectPosition: function () {
         this.$bsContainer = $('<div class="bs-container" />');
   
         var that = this,
             $container = $(this.options.container),
             pos,
             containerPos,
             actualHeight,
             getPlacement = function ($element) {
               that.$bsContainer.addClass($element.attr('class').replace(/form-control|fit-width/gi, '')).toggleClass('dropup', $element.hasClass('dropup'));
               pos = $element.offset();
   
               if (!$container.is('body')) {
                 containerPos = $container.offset();
                 containerPos.top += parseInt($container.css('borderTopWidth')) - $container.scrollTop();
                 containerPos.left += parseInt($container.css('borderLeftWidth')) - $container.scrollLeft();
               } else {
                 containerPos = { top: 0, left: 0 };
               }
   
               actualHeight = $element.hasClass('dropup') ? 0 : $element[0].offsetHeight;
   
               that.$bsContainer.css({
                 'top': pos.top - containerPos.top + actualHeight,
                 'left': pos.left - containerPos.left,
                 'width': $element[0].offsetWidth
               });
             };
   
         this.$button.on('click', function () {
           var $this = $(this);
   
           if (that.isDisabled()) {
             return;
           }
   
           getPlacement(that.$newElement);
   
           that.$bsContainer
             .appendTo(that.options.container)
             .toggleClass('open', !$this.hasClass('open'))
             .append(that.$menu);
         });
   
         $(window).on('resize scroll', function () {
           getPlacement(that.$newElement);
         });
   
         this.$element.on('hide.bs.select', function () {
           that.$menu.data('height', that.$menu.height());
           that.$bsContainer.detach();
         });
       },
   
       /**
        * @param {number} index - the index of the option that is being changed
        * @param {boolean} selected - true if the option is being selected, false if being deselected
        * @param {JQuery} $lis - the 'li' element that is being modified
        */
       setSelected: function (index, selected, $lis) {
         if (!$lis) {
           this.togglePlaceholder(); // check if setSelected is being called by changing the value of the select
           $lis = this.findLis().eq(this.liObj[index]);
         }
   
         $lis.toggleClass('selected', selected).find('a').attr('aria-selected', selected);
       },
   
       /**
        * @param {number} index - the index of the option that is being disabled
        * @param {boolean} disabled - true if the option is being disabled, false if being enabled
        * @param {JQuery} $lis - the 'li' element that is being modified
        */
       setDisabled: function (index, disabled, $lis) {
         if (!$lis) {
           $lis = this.findLis().eq(this.liObj[index]);
         }
   
         if (disabled) {
           $lis.addClass('disabled').children('a').attr('href', '#').attr('tabindex', -1).attr('aria-disabled', true);
         } else {
           $lis.removeClass('disabled').children('a').removeAttr('href').attr('tabindex', 0).attr('aria-disabled', false);
         }
       },
   
       isDisabled: function () {
         return this.$element[0].disabled;
       },
   
       checkDisabled: function () {
         var that = this;
   
         if (this.isDisabled()) {
           this.$newElement.addClass('disabled');
           this.$button.addClass('disabled').attr('tabindex', -1);
         } else {
           if (this.$button.hasClass('disabled')) {
             this.$newElement.removeClass('disabled');
             this.$button.removeClass('disabled');
           }
   
           if (this.$button.attr('tabindex') == -1 && !this.$element.data('tabindex')) {
             this.$button.removeAttr('tabindex');
           }
         }
   
         this.$button.click(function () {
           return !that.isDisabled();
         });
       },
   
       togglePlaceholder: function () {
         var value = this.$element.val();
         this.$button.toggleClass('bs-placeholder', value === null || value === '');
       },
   
       tabIndex: function () {
         if (this.$element.data('tabindex') !== this.$element.attr('tabindex') && 
           (this.$element.attr('tabindex') !== -98 && this.$element.attr('tabindex') !== '-98')) {
           this.$element.data('tabindex', this.$element.attr('tabindex'));
           this.$button.attr('tabindex', this.$element.data('tabindex'));
         }
   
         this.$element.attr('tabindex', -98);
       },
   
       clickListener: function () {
         var that = this,
             $document = $(document);
   
         this.$newElement.on('touchstart.dropdown', '.dropdown-menu', function (e) {
           e.stopPropagation();
         });
   
         $document.data('spaceSelect', false);
   
         this.$button.on('keyup', function (e) {
           if (/(32)/.test(e.keyCode.toString(10)) && $document.data('spaceSelect')) {
               e.preventDefault();
               $document.data('spaceSelect', false);
           }
         });
   
         this.$button.on('click', function () {
           that.setSize();
         });
   
         this.$element.on('shown.bs.select', function () {
           if (!that.options.liveSearch && !that.multiple) {
             that.$menuInner.find('.selected a').focus();
           } else if (!that.multiple) {
             var selectedIndex = that.liObj[that.$element[0].selectedIndex];
   
             if (typeof selectedIndex !== 'number' || that.options.size === false) return;
   
             // scroll to selected option
             var offset = that.$lis.eq(selectedIndex)[0].offsetTop - that.$menuInner[0].offsetTop;
             offset = offset - that.$menuInner[0].offsetHeight/2 + that.sizeInfo.liHeight/2;
             that.$menuInner[0].scrollTop = offset;
           }
         });
   
         this.$menuInner.on('click', 'li a', function (e) {
           var $this = $(this),
               clickedIndex = $this.parent().data('originalIndex'),
               prevValue = that.$element.val(),
               prevIndex = that.$element.prop('selectedIndex'),
               triggerChange = true;
   
           // Don't close on multi choice menu
           if (that.multiple && that.options.maxOptions !== 1) {
             e.stopPropagation();
           }
   
           e.preventDefault();
   
           //Don't run if we have been disabled
           if (!that.isDisabled() && !$this.parent().hasClass('disabled')) {
             var $options = that.$element.find('option'),
                 $option = $options.eq(clickedIndex),
                 state = $option.prop('selected'),
                 $optgroup = $option.parent('optgroup'),
                 maxOptions = that.options.maxOptions,
                 maxOptionsGrp = $optgroup.data('maxOptions') || false;
   
             if (!that.multiple) { // Deselect all others if not multi select box
               $options.prop('selected', false);
               $option.prop('selected', true);
               that.$menuInner.find('.selected').removeClass('selected').find('a').attr('aria-selected', false);
               that.setSelected(clickedIndex, true);
             } else { // Toggle the one we have chosen if we are multi select.
               $option.prop('selected', !state);
               that.setSelected(clickedIndex, !state);
               $this.blur();
   
               if (maxOptions !== false || maxOptionsGrp !== false) {
                 var maxReached = maxOptions < $options.filter(':selected').length,
                     maxReachedGrp = maxOptionsGrp < $optgroup.find('option:selected').length;
   
                 if ((maxOptions && maxReached) || (maxOptionsGrp && maxReachedGrp)) {
                   if (maxOptions && maxOptions == 1) {
                     $options.prop('selected', false);
                     $option.prop('selected', true);
                     that.$menuInner.find('.selected').removeClass('selected');
                     that.setSelected(clickedIndex, true);
                   } else if (maxOptionsGrp && maxOptionsGrp == 1) {
                     $optgroup.find('option:selected').prop('selected', false);
                     $option.prop('selected', true);
                     var optgroupID = $this.parent().data('optgroup');
                     that.$menuInner.find('[data-optgroup="' + optgroupID + '"]').removeClass('selected');
                     that.setSelected(clickedIndex, true);
                   } else {
                     var maxOptionsText = typeof that.options.maxOptionsText === 'string' ? [that.options.maxOptionsText, that.options.maxOptionsText] : that.options.maxOptionsText,
                         maxOptionsArr = typeof maxOptionsText === 'function' ? maxOptionsText(maxOptions, maxOptionsGrp) : maxOptionsText,
                         maxTxt = maxOptionsArr[0].replace('{n}', maxOptions),
                         maxTxtGrp = maxOptionsArr[1].replace('{n}', maxOptionsGrp),
                         $notify = $('<div class="notify"></div>');
                     // If {var} is set in array, replace it
                     /** @deprecated */
                     if (maxOptionsArr[2]) {
                       maxTxt = maxTxt.replace('{var}', maxOptionsArr[2][maxOptions > 1 ? 0 : 1]);
                       maxTxtGrp = maxTxtGrp.replace('{var}', maxOptionsArr[2][maxOptionsGrp > 1 ? 0 : 1]);
                     }
   
                     $option.prop('selected', false);
   
                     that.$menu.append($notify);
   
                     if (maxOptions && maxReached) {
                       $notify.append($('<div>' + maxTxt + '</div>'));
                       triggerChange = false;
                       that.$element.trigger('maxReached.bs.select');
                     }
   
                     if (maxOptionsGrp && maxReachedGrp) {
                       $notify.append($('<div>' + maxTxtGrp + '</div>'));
                       triggerChange = false;
                       that.$element.trigger('maxReachedGrp.bs.select');
                     }
   
                     setTimeout(function () {
                       that.setSelected(clickedIndex, false);
                     }, 10);
   
                     $notify.delay(750).fadeOut(300, function () {
                       $(this).remove();
                     });
                   }
                 }
               }
             }
   
             if (!that.multiple || (that.multiple && that.options.maxOptions === 1)) {
               that.$button.focus();
             } else if (that.options.liveSearch) {
               that.$searchbox.focus();
             }
   
             // Trigger select 'change'
             if (triggerChange) {
               if ((prevValue != that.$element.val() && that.multiple) || (prevIndex != that.$element.prop('selectedIndex') && !that.multiple)) {
                 // $option.prop('selected') is current option state (selected/unselected). state is previous option state.
                 changed_arguments = [clickedIndex, $option.prop('selected'), state];
                 that.$element
                   .triggerNative('change');
               }
             }
           }
         });
   
         this.$menu.on('click', 'li.disabled a, .popover-title, .popover-title :not(.close)', function (e) {
           if (e.currentTarget == this) {
             e.preventDefault();
             e.stopPropagation();
             if (that.options.liveSearch && !$(e.target).hasClass('close')) {
               that.$searchbox.focus();
             } else {
               that.$button.focus();
             }
           }
         });
   
         this.$menuInner.on('click', '.divider, .dropdown-header', function (e) {
           e.preventDefault();
           e.stopPropagation();
           if (that.options.liveSearch) {
             that.$searchbox.focus();
           } else {
             that.$button.focus();
           }
         });
   
         this.$menu.on('click', '.popover-title .close', function () {
           that.$button.click();
         });
   
         this.$searchbox.on('click', function (e) {
           e.stopPropagation();
         });
   
         this.$menu.on('click', '.actions-btn', function (e) {
           if (that.options.liveSearch) {
             that.$searchbox.focus();
           } else {
             that.$button.focus();
           }
   
           e.preventDefault();
           e.stopPropagation();
   
           if ($(this).hasClass('bs-select-all')) {
             that.selectAll();
           } else {
             that.deselectAll();
           }
         });
   
         this.$element.change(function () {
           that.render(false);
           that.$element.trigger('changed.bs.select', changed_arguments);
           changed_arguments = null;
         });
       },
   
       liveSearchListener: function () {
         var that = this,
             $no_results = $('<li class="no-results"></li>');
   
         this.$button.on('click.dropdown.data-api touchstart.dropdown.data-api', function () {
           that.$menuInner.find('.active').removeClass('active');
           if (!!that.$searchbox.val()) {
             that.$searchbox.val('');
             that.$lis.not('.is-hidden').removeClass('hidden');
             if (!!$no_results.parent().length) $no_results.remove();
           }
           if (!that.multiple) that.$menuInner.find('.selected').addClass('active');
           setTimeout(function () {
             that.$searchbox.focus();
           }, 10);
         });
   
         this.$searchbox.on('click.dropdown.data-api focus.dropdown.data-api touchend.dropdown.data-api', function (e) {
           e.stopPropagation();
         });
   
         this.$searchbox.on('input propertychange', function () {
           if (that.$searchbox.val()) {
             var $searchBase = that.$lis.not('.is-hidden').removeClass('hidden').children('a');
             if (that.options.liveSearchNormalize) {
               $searchBase = $searchBase.not(':a' + that._searchStyle() + '("' + normalizeToBase(that.$searchbox.val()) + '")');
             } else {
               $searchBase = $searchBase.not(':' + that._searchStyle() + '("' + that.$searchbox.val() + '")');
             }
             $searchBase.parent().addClass('hidden');
   
             that.$lis.filter('.dropdown-header').each(function () {
               var $this = $(this),
                   optgroup = $this.data('optgroup');
   
               if (that.$lis.filter('[data-optgroup=' + optgroup + ']').not($this).not('.hidden').length === 0) {
                 $this.addClass('hidden');
                 that.$lis.filter('[data-optgroup=' + optgroup + 'div]').addClass('hidden');
               }
             });
   
             var $lisVisible = that.$lis.not('.hidden');
   
             // hide divider if first or last visible, or if followed by another divider
             $lisVisible.each(function (index) {
               var $this = $(this);
   
               if ($this.hasClass('divider') && (
                 $this.index() === $lisVisible.first().index() ||
                 $this.index() === $lisVisible.last().index() ||
                 $lisVisible.eq(index + 1).hasClass('divider'))) {
                 $this.addClass('hidden');
               }
             });
   
             if (!that.$lis.not('.hidden, .no-results').length) {
               if (!!$no_results.parent().length) {
                 $no_results.remove();
               }
               $no_results.html(that.options.noneResultsText.replace('{0}', '"' + htmlEscape(that.$searchbox.val()) + '"')).show();
               that.$menuInner.append($no_results);
             } else if (!!$no_results.parent().length) {
               $no_results.remove();
             }
           } else {
             that.$lis.not('.is-hidden').removeClass('hidden');
             if (!!$no_results.parent().length) {
               $no_results.remove();
             }
           }
   
           that.$lis.filter('.active').removeClass('active');
           if (that.$searchbox.val()) that.$lis.not('.hidden, .divider, .dropdown-header').eq(0).addClass('active').children('a').focus();
           $(this).focus();
         });
       },
   
       _searchStyle: function () {
         var styles = {
           begins: 'ibegins',
           startsWith: 'ibegins'
         };
   
         return styles[this.options.liveSearchStyle] || 'icontains';
       },
   
       val: function (value) {
         if (typeof value !== 'undefined') {
           this.$element.val(value);
           this.render();
   
           return this.$element;
         } else {
           return this.$element.val();
         }
       },
   
       changeAll: function (status) {
         if (!this.multiple) return;
         if (typeof status === 'undefined') status = true;
   
         this.findLis();
   
         var $options = this.$element.find('option'),
             $lisVisible = this.$lis.not('.divider, .dropdown-header, .disabled, .hidden'),
             lisVisLen = $lisVisible.length,
             selectedOptions = [];
             
         if (status) {
           if ($lisVisible.filter('.selected').length === $lisVisible.length) return;
         } else {
           if ($lisVisible.filter('.selected').length === 0) return;
         }
             
         $lisVisible.toggleClass('selected', status);
   
         for (var i = 0; i < lisVisLen; i++) {
           var origIndex = $lisVisible[i].getAttribute('data-original-index');
           selectedOptions[selectedOptions.length] = $options.eq(origIndex)[0];
         }
   
         $(selectedOptions).prop('selected', status);
   
         this.render(false);
   
         this.togglePlaceholder();
   
         this.$element
           .triggerNative('change');
       },
   
       selectAll: function () {
         return this.changeAll(true);
       },
   
       deselectAll: function () {
         return this.changeAll(false);
       },
   
       toggle: function (e) {
         e = e || window.event;
   
         if (e) e.stopPropagation();
   
         this.$button.trigger('click');
       },
   
       keydown: function (e) {
         var $this = $(this),
             $parent = $this.is('input') ? $this.parent().parent() : $this.parent(),
             $items,
             that = $parent.data('this'),
             index,
             next,
             first,
             last,
             prev,
             nextPrev,
             prevIndex,
             isActive,
             selector = ':not(.disabled, .hidden, .dropdown-header, .divider)',
             keyCodeMap = {
               32: ' ',
               48: '0',
               49: '1',
               50: '2',
               51: '3',
               52: '4',
               53: '5',
               54: '6',
               55: '7',
               56: '8',
               57: '9',
               59: ';',
               65: 'a',
               66: 'b',
               67: 'c',
               68: 'd',
               69: 'e',
               70: 'f',
               71: 'g',
               72: 'h',
               73: 'i',
               74: 'j',
               75: 'k',
               76: 'l',
               77: 'm',
               78: 'n',
               79: 'o',
               80: 'p',
               81: 'q',
               82: 'r',
               83: 's',
               84: 't',
               85: 'u',
               86: 'v',
               87: 'w',
               88: 'x',
               89: 'y',
               90: 'z',
               96: '0',
               97: '1',
               98: '2',
               99: '3',
               100: '4',
               101: '5',
               102: '6',
               103: '7',
               104: '8',
               105: '9'
             };
   
         if (that.options.liveSearch) $parent = $this.parent().parent();
   
         if (that.options.container) $parent = that.$menu;
   
         $items = $('[role="listbox"] li', $parent);
   
         isActive = that.$newElement.hasClass('open');
   
         if (!isActive && (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 96 && e.keyCode <= 105 || e.keyCode >= 65 && e.keyCode <= 90)) {
           if (!that.options.container) {
             that.setSize();
             that.$menu.parent().addClass('open');
             isActive = true;
           } else {
             that.$button.trigger('click');
           }
           that.$searchbox.focus();
           return;
         }
   
         if (that.options.liveSearch) {
           if (/(^9$|27)/.test(e.keyCode.toString(10)) && isActive && that.$menu.find('.active').length === 0) {
             e.preventDefault();
             that.$menu.parent().removeClass('open');
             if (that.options.container) that.$newElement.removeClass('open');
             that.$button.focus();
           }
           // $items contains li elements when liveSearch is enabled
           $items = $('[role="listbox"] li' + selector, $parent);
           if (!$this.val() && !/(38|40)/.test(e.keyCode.toString(10))) {
             if ($items.filter('.active').length === 0) {
               $items = that.$menuInner.find('li');
               if (that.options.liveSearchNormalize) {
                 $items = $items.filter(':a' + that._searchStyle() + '(' + normalizeToBase(keyCodeMap[e.keyCode]) + ')');
               } else {
                 $items = $items.filter(':' + that._searchStyle() + '(' + keyCodeMap[e.keyCode] + ')');
               }
             }
           }
         }
   
         if (!$items.length) return;
   
         if (/(38|40)/.test(e.keyCode.toString(10))) {
           index = $items.index($items.find('a').filter(':focus').parent());
           first = $items.filter(selector).first().index();
           last = $items.filter(selector).last().index();
           next = $items.eq(index).nextAll(selector).eq(0).index();
           prev = $items.eq(index).prevAll(selector).eq(0).index();
           nextPrev = $items.eq(next).prevAll(selector).eq(0).index();
   
           if (that.options.liveSearch) {
             $items.each(function (i) {
               if (!$(this).hasClass('disabled')) {
                 $(this).data('index', i);
               }
             });
             index = $items.index($items.filter('.active'));
             first = $items.first().data('index');
             last = $items.last().data('index');
             next = $items.eq(index).nextAll().eq(0).data('index');
             prev = $items.eq(index).prevAll().eq(0).data('index');
             nextPrev = $items.eq(next).prevAll().eq(0).data('index');
           }
   
           prevIndex = $this.data('prevIndex');
   
           if (e.keyCode == 38) {
             if (that.options.liveSearch) index--;
             if (index != nextPrev && index > prev) index = prev;
             if (index < first) index = first;
             if (index == prevIndex) index = last;
           } else if (e.keyCode == 40) {
             if (that.options.liveSearch) index++;
             if (index == -1) index = 0;
             if (index != nextPrev && index < next) index = next;
             if (index > last) index = last;
             if (index == prevIndex) index = first;
           }
   
           $this.data('prevIndex', index);
   
           if (!that.options.liveSearch) {
             $items.eq(index).children('a').focus();
           } else {
             e.preventDefault();
             if (!$this.hasClass('dropdown-toggle')) {
               $items.removeClass('active').eq(index).addClass('active').children('a').focus();
               $this.focus();
             }
           }
   
         } else if (!$this.is('input')) {
           var keyIndex = [],
               count,
               prevKey;
   
           $items.each(function () {
             if (!$(this).hasClass('disabled')) {
               if ($.trim($(this).children('a').text().toLowerCase()).substring(0, 1) == keyCodeMap[e.keyCode]) {
                 keyIndex.push($(this).index());
               }
             }
           });
   
           count = $(document).data('keycount');
           count++;
           $(document).data('keycount', count);
   
           prevKey = $.trim($(':focus').text().toLowerCase()).substring(0, 1);
   
           if (prevKey != keyCodeMap[e.keyCode]) {
             count = 1;
             $(document).data('keycount', count);
           } else if (count >= keyIndex.length) {
             $(document).data('keycount', 0);
             if (count > keyIndex.length) count = 1;
           }
   
           $items.eq(keyIndex[count - 1]).children('a').focus();
         }
   
         // Select focused option if "Enter", "Spacebar" or "Tab" (when selectOnTab is true) are pressed inside the menu.
         if ((/(13|32)/.test(e.keyCode.toString(10)) || (/(^9$)/.test(e.keyCode.toString(10)) && that.options.selectOnTab)) && isActive) {
           if (!/(32)/.test(e.keyCode.toString(10))) e.preventDefault();
           if (!that.options.liveSearch) {
             var elem = $(':focus');
             elem.click();
             // Bring back focus for multiselects
             elem.focus();
             // Prevent screen from scrolling if the user hit the spacebar
             e.preventDefault();
             // Fixes spacebar selection of dropdown items in FF & IE
             $(document).data('spaceSelect', true);
           } else if (!/(32)/.test(e.keyCode.toString(10))) {
             that.$menuInner.find('.active a').click();
             $this.focus();
           }
           $(document).data('keycount', 0);
         }
   
         if ((/(^9$|27)/.test(e.keyCode.toString(10)) && isActive && (that.multiple || that.options.liveSearch)) || (/(27)/.test(e.keyCode.toString(10)) && !isActive)) {
           that.$menu.parent().removeClass('open');
           if (that.options.container) that.$newElement.removeClass('open');
           that.$button.focus();
         }
       },
   
       mobile: function () {
         this.$element.addClass('mobile-device');
       },
   
       refresh: function () {
         this.$lis = null;
         this.liObj = {};
         this.reloadLi();
         this.render();
         this.checkDisabled();
         this.liHeight(true);
         this.setStyle();
         this.setWidth();
         if (this.$lis) this.$searchbox.trigger('propertychange');
   
         this.$element.trigger('refreshed.bs.select');
       },
   
       hide: function () {
         this.$newElement.hide();
       },
   
       show: function () {
         this.$newElement.show();
       },
   
       remove: function () {
         this.$newElement.remove();
         this.$element.remove();
       },
   
       destroy: function () {
         this.$newElement.before(this.$element).remove();
   
         if (this.$bsContainer) {
           this.$bsContainer.remove();
         } else {
           this.$menu.remove();
         }
   
         this.$element
           .off('.bs.select')
           .removeData('selectpicker')
           .removeClass('bs-select-hidden selectpicker');
       }
     };
   
     // SELECTPICKER PLUGIN DEFINITION
     // ==============================
     function Plugin(option, event) {
       // get the args of the outer function..
       var args = arguments;
       // The arguments of the function are explicitly re-defined from the argument list, because the shift causes them
       // to get lost/corrupted in android 2.3 and IE9 #715 #775
       var _option = option,
           _event = event;
       [].shift.apply(args);
   
       var value;
       var chain = this.each(function () {
         var $this = $(this);
         if ($this.is('select')) {
           var data = $this.data('selectpicker'),
               options = typeof _option == 'object' && _option;
   
           if (!data) {
             var config = $.extend({}, Selectpicker.DEFAULTS, $.fn.selectpicker.defaults || {}, $this.data(), options);
             config.template = $.extend({}, Selectpicker.DEFAULTS.template, ($.fn.selectpicker.defaults ? $.fn.selectpicker.defaults.template : {}), $this.data().template, options.template);
             $this.data('selectpicker', (data = new Selectpicker(this, config, _event)));
           } else if (options) {
             for (var i in options) {
               if (options.hasOwnProperty(i)) {
                 data.options[i] = options[i];
               }
             }
           }
   
           if (typeof _option == 'string') {
             if (data[_option] instanceof Function) {
               value = data[_option].apply(data, args);
             } else {
               value = data.options[_option];
             }
           }
         }
       });
   
       if (typeof value !== 'undefined') {
         //noinspection JSUnusedAssignment
         return value;
       } else {
         return chain;
       }
     }
   
     var old = $.fn.selectpicker;
     $.fn.selectpicker = Plugin;
     $.fn.selectpicker.Constructor = Selectpicker;
   
     // SELECTPICKER NO CONFLICT
     // ========================
     $.fn.selectpicker.noConflict = function () {
       $.fn.selectpicker = old;
       return this;
     };
   
     $(document)
         .data('keycount', 0)
         .on('keydown.bs.select', '.bootstrap-select [data-toggle=dropdown], .bootstrap-select [role="listbox"], .bs-searchbox input', Selectpicker.prototype.keydown)
         .on('focusin.modal', '.bootstrap-select [data-toggle=dropdown], .bootstrap-select [role="listbox"], .bs-searchbox input', function (e) {
           e.stopPropagation();
         });
   
     // SELECTPICKER DATA-API
     // =====================
     $(window).on('load.bs.select.data-api', function () {
       $('.selectpicker').each(function () {
         var $selectpicker = $(this);
         Plugin.call($selectpicker, $selectpicker.data());
       })
     });
   })(jQuery);
   
   
   }));
   
</script>
<script>
   const allRanges = document.querySelectorAll(".range-wrap");
   allRanges.forEach(wrap => {
     const range = wrap.querySelector(".range");
     const bubble = wrap.querySelector(".bubble");
   
     range.addEventListener("input", () => {
       setBubble(range, bubble);
     });
     setBubble(range, bubble);
   });
   
   function setBubble(range, bubble) {
     const val = range.value;
     const min = range.min ? range.min : 0;
     const max = range.max ? range.max : 100;
     const newVal = Number(((val - min) * 100) / (max - min));
     bubble.innerHTML = val;
   
     // Sorta magic numbers based on size of the native UI thumb
     bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
   }
</script>
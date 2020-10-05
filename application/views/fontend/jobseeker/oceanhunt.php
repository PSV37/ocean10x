<style>
  .apply-invi{margin-top:-22px !important;}    
</style>
<?php 
  $this->load->view('fontend/layout/new_seeker_header.php');
  
  ?> 
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">

<!---header end--->  
<style>    
   .border-top1{
   height: 3px;
   background-color: #16b7b0 !important;
   border-radius: 13px 13px 0px 0px !important;
   margin-bottom: 10px;
   }
   .pasive-span{
   position: absolute;
   top: 0px;
   left: 421px;
   background-color: red;
   padding: 1px 17px;
   border-radius: 9px;    
   color: #fff;
   font-size: 11px;
   }       
   .front .dropdown {   
   top: 0px;   
   width: 63px;
   position: absolute;
   right:3px;
   }
   .front{height:263px;padding:0px 10px 10px 10px;}
   :checked + span {
   background: #18c5bd !important;
   display: inline-block;
   width: 100%;
   color: #fff;    
   padding: 4px 15px;
   border-radius: 30px;
   cursor:pointer;
   }
  button#sklbtn {
    background-color: #18c5bd;
    color: #fdfdfd;
    border-radius: 20px;
    border: none;
    padding: 1px 10px;
    margin-bottom: 7px;
    font-size: 11px;
}
   .btn-default1:not(:checked) + span {
   padding: 4px 15px;
   border-radius: 30px;
   background: #e4e2e2;
   /* padding: 8px 0; */
   width: 100%;
   border-radius: 10px;
   cursor: pointer;
   }    
   .card {
    height: auto;
    display: flow-root;
    padding: 0px !important;
    border: none !important;
    /*width: 599px;*/
}    
   .btn_all {
   color: #539617;
   background-color: #fff;
   height: 35px;
   width: 70px;
   border: solid 1px;
   border-radius: 50px;
   }
   .active-job {
   margin-top:40px;
   }
   .btn_all:hover {
   color: #fff;
   background-color: #a6e026;
   border-color: #87cf56;
   }
   .all_dropdown{float:left;margin-right:20px;}
   .btn_sort{
   color: #319fda;
   background-color: #fff;
   height: 35px;
   width: 70px;
   border: solid 1px;
   border-radius: 50px;
   }
   .btn_sort:hover{
   color: #fff;
   background-color: #44afe1;
   border-color: #168bd8;}  
   .hide_btn{margin-top:20px;}
   #myDIV {
   width: 100%;
   background-color:#eef7fa;
   margin-top: 20px;
   }
   .horizontal_box {
   width: 7%;
   background-color: #a9e224;
   height: 140px;
   padding: 0px;
   }
   .try_bt{
   height: 30px;
   width: 70px;
   border: none;
   background-color: #a3df2d;
   color: #fff;
   }
   .horizontal_box{position:relative;
   width: 3%;
   background-color: #a9e224;
   height: 270px;
   padding: 0px;
   margin-left: 15px;}  
   .p-i {
   position: absolute;
   top: 19px;
   right: -24px;
   background-color: #fff;
   height: 50px;
   width: 50px;
   line-height: 50px;
   border-radius: 35px;
   border: solid 2px #73b102;
   text-align:center;
   }
   .details-box {
   padding: 30px 0px;
   }
   .head-box strong{line-height:3;}
   .head-box-a strong{line-height:3;
   font-weight: 400;}
   .bg-lb:hover .p-i{color:#fff;
   background-color:#62a910;}
   button.apply-cv-btn {
   padding: 8px 20px;
   border-radius: 40px;
   border: solid 2px #F44336;
   background-color: #fff;
   color: #000;
   }  
   button.apply-cv-btn:hover{background-color:#F44336;
   /*new*/
   color:#fff;}
   .all_b {
   float: left;
   margin-right: 30px;
   background-color: #fff;
   padding: 3px 32px;
   border-radius: 20px;
   border: solid 1px #a7e126;
   }
   .sort_b {
   background-color: #fff;
   padding: 3px 32px;
   border-radius: 20px;
   border: solid 1px #a7e126;
   }
   .seperate-btn {
   margin-top:34px;
   }
   .active_save_btn{background-color:#a7e126;
   color:#fff;}
   .sort_b:hover{background-color:#a7e126;
   color:#fff;}
   .all_b:hover{background-color:#a7e126;
   color:#fff;}
   .job-voucher{background-color:#fff;border-radius:3px;height:130px;padding: 15px 20px 15px 20px;box-shadow: 0px 2px 6px #00000038;
   line-height:20px;}
   .dimen_img-s{height:60px;
   width:60px;float:left;margin-right: 20px;
   margin-bottom:20px;}
   .dimen_img-s{height:60px;
   width:60px;} 
   .job_title{font-size:18px;
   cursor: pointer;
   margin-bottom:10px;
   }
   .job_title:hover{text-decoration:underline;}   
   .organization {
   color: #868383;
   font-size: 12px;
   }
   .location{color: #868383;
   font-size: 12px;
   }
   .alert-dismissable .close, .alert-dismissible .close {
   position: relative;
   top: 0px;
   right: 0px;
   color: inherit;
   }
   .job_dis_btn{padding: 2px 16px;
   border: none;
   margin-left: 79px;
   font-size:12px;}
   .job_dis_btn:hover{
   background-color: #81c3f8;
   color: #fff;
   }
   .apply_job_btn {
   float: right;
   background-color: #fff;
   padding: 2px 21px;
   border: solid 1px #18c5bd;
   color: #159d96;
   font-weight: 700;
   font-size: 11px;
   cursor: pointer;
   border-radius: 29px;
   margin-top: -5px;
   }
   .apply_job_btn:hover{
   background-color:#159d96;
   color: #fff;
   transition:0.7s;
   }
   .bd-2 {
   margin-top: 20px;
   padding:0px;
   }  
   /*end*/
   .dropdown.right-arrow {
   position: absolute;
   top: -3px;
   right: 69px;
   border: none;
   }
   .btn{padding:0px;}
   .btn-default{border:none;font-size: 20px;}
   .btn-default:hover{
   background-color:#fff;
   border:none;}
   .dropdown-menu li {
   font-size: 11px;
   padding: 8px 13px;
   cursor: pointer;
   }
   .post-job {
   margin-bottom: 20px;
   }  
   div#next {
   float: right;
   /* margin-left: 385px; */
   margin-right: 59px !important;
   }
   :checked + span{background: #18c5bd !important;
   display: inline-block;
   width: 100% !important;     
   color: #fff;
   padding: 6px 17px !important;
   border-radius: 13px;
   }
   div#skills {
   float: left;
   margin-bottom: -18px;
   padding: 8px 21px -7px 0px;
   }
   .card div {border-radius:0px !important;}    
   .following-info{margin-bottom:10px;
    float: left;
    line-height: 30px;
}
   .following-info2{margin-bottom:10px;margin-left: 210px;
    line-height: 30px;}   
   .following-info3 {
    margin-bottom: 10px;
    margin-top: -100px;
    margin-right: -35px;
    line-height: 30px;
}
   .active-job label {
   transform-style: preserve-3d;
   display: block;
   width: 100%;
   position: relative !important;
   border-radius: 7px;
   border: solid 1px #d6d3d3;
   background-color:#fff;
   }
   input#subject {
   display: block;
   }
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
   margin:0px 30px 30px 0px;
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
  /* .pie::after {
   content: "";
   display: block;
   width: 120px;
   height: 2px;
   background: rgba(0,0,0,0.1);
   border-radius: 50%;
   box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
   margin: 220px auto;
   }*/
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
    margin-left: -31px;
    margin-top: 3px !important;
    list-style-type: none;
    padding: 0;
    /* margin: 0; */
    background: #FFF;
    padding: 15px;
    font-size: 12px;
    box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;
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
  width: 200px;
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
   footer {
   position: fixed;
   bottom: 0;
   right: 0;
   font-size: 13px;
   background: #DDD;
   padding: 5px 10px;
   margin: 5px;
   }
   .fade-rotate {
   transform: rotate(180deg);
   opacity: 0;
   -webkit-transition: all .25s linear;
   -o-transition: all .25s linear;
   transition: all .25s linear;
   }
   .fade-rotate.in {
   opacity: 1;
   transform: rotate(0deg);
   }
   .fade-rotate .modal-dialog {
   position: absolute;
   left: 0;
   right: 0;
   top: 50%;
   transform: translateY(-50%) !important;
   }
   input{padding:7px 25px;}
   .modal-footer{text-align:center;}
   .modal-body {
   padding: 0px 65px;
   }
   button.btn-save {
   font-size: 12px;
   padding: 10px 52px;
   background-color: #14a99b;
   color: #fff;
   border: none;
   border-radius:20px;
   box-shadow: 2px 2px 6px #a8a4a4;
   float: right;
   }
   .modal-content {
   background-image: linear-gradient(#18c5bd, #d4efec);
   }
   .sendEmail label{color:black;font-size:13px;}
   .sendEmail input{background-color: #f3f7f663;}
   .sendEmail textarea.form-control{background-color:#fbffff80;}
   .modal-body {
    background-color: white;
    color: black;
}
   @media (min-width: 768px){
   .modal-dialog {
   width: 460px;
   margin: 30px auto;
   }
   }
   .fade-rotate .modal-dialog{top:45%;}
   .modal-footer{border-top:none;}
   .modal-header{border-bottom:none;}
   button.btn-save:hover{background-color:#0e776d;
   transition:0.9s;color:#fff;}
   .clickable{
   cursor: pointer;   
   }
   .panel-heading div {
   margin-top: -18px;
   font-size: 15px;
   }
   .panel-heading div span{
   margin-left:5px;
   }
   .panel-body{
   display: none;
   }
   .alert {
   padding: 8px;
   background-color: #18c5bd;
   color: white;
   width: fit-content;
   height: 13px;
   border-radius: 20px;
   line-height: 0px;
   margin-right: 7px;
   float: left;
   }
   .closebtn {
   margin-top: -9px;
   margin-left: 15px;
   color: white;
   font-weight: bold;
   float: right;
   font-size: 22px;
   line-height: 20px;
   cursor: pointer;
   transition: 0.3s;
   }
  
  
   /* Dark mode */
   @media (prefers-color-scheme: dark) {
   :root {
   --bg: #2e3138;
   --fg: #e3e4e8;
   --bs1: #3c4049;
   --bs2: #202227;
   --tick: #c7cad1;
   }
   }
   .modal-footer {
   background: none;
   }
   .alert.alert-success.alert-dismissable {
   /* margin-bottom: -17px; */
   margin-left: 175px;
   /* margin-top: 0px; */
   /* background: black; */
   height: 26px;
   width: auto;
   padding: 14px;
   }
   .alert.alert-success.text-center {
   width: 100%;
   height: 30px;
   border-radius: 0;
   text-align: center;
   padding: 13px;
   background: transparent;
   background-color: #68dcd7;
   font-weight: bold;
   }
   .alert.alert-warning.text-center {
   width: 100%;
   height: 30px;
   border-radius: 0;
   text-align: center;
   padding: 13px;
   background: transparent;
   background-color: #f0ad4e;
   font-weight: bold;
   }
   /*.ui-autocomplete-input {
   border: none; 
   font-size: 14px;
   width: 300px;
   height: 24px;
   margin-bottom: 5px;
   padding-top: 2px;
   border: 1px solid #DDD !important;
   padding-top: 0px !important;
   z-index: 1511;
   position: relative;
   }*/
   .ui-autocomplete {
   z-index: 5000;
   background: #b3ebe8;;
   width: 0%;
   }
   .highlight_div {
   border: 1px solid ;
   padding: 10px;
   box-shadow: 5px 5px #888888;
   }
   .active-job label:hover {
   /* box-shadow: 0 4px 6px -1px rgba(0,0,0,.1),0 2px 4px -1px rgba(0,0,0,.06)!important; */
   }
   input#posted_job {
   display: none;
   }
 .icon_backg {
    background-color: #18c5bd;
    padding: 12px;
    border-radius: 34px;
    color: #fff;
    cursor: pointer;
    float: right;
    margin-right: 5px;
}
.btn-group {
    float: right;
    margin-top: 3px;
    /*margin-right: 10px;*/
}
a.myclass {
    font-weight: 600;
    /* float: right; */
    margin-right: 7px;
    /* width: 35px; */
}
sup {
   top: -1px;
    font-size: 16px;
    color: red;
}
span.right-side {
    display: table-cell;
    padding-left: 10px;
    padding-top: -32px;
}
.skl_bnft {
    display: inline-flex;
}
li.right-title {
    list-style-type: none;
    font-size: 12px;
    font-weight: 100;
    width: 202px;
}
button.btn.btn-primary.trash {
    background-color: #18c5bd;
    width: 85px;
    border: none;
    margin-top: 0px;
    margin-left: 2px;
    border-radius: 128px;
        float: right;
}
.icon-info {
    margin-left: 16px;
    margin-bottom: 20px;
    margin-top: 30px;
}
.last-row-invitation ul li {
    float: left;
    margin-right: 13px;
    list-style-type: none;
    margin-top: 20px;
}
.location-inv {
    background-color: #18c5bd;
    color: white;
    border-radius: 41px;
        width: 100px;
}
.last-row-invitation {
    margin-left: -30px;
}
.nav-tabs>li {
    margin-right: 15px;
    margin-top: 10px;
}
</style>      
<div class="container-fluid">
<div class="container">
  <div class="col-md-12" >
    <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
    <div class="col-md-6 ocen-activities" >
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#activity1">Invitations</a></li>
        <li><a data-toggle="tab" href="#activity2">Applications</a></li>
        <li><a data-toggle="tab" href="#activity3">Interview</a></li>
        <li><a data-toggle="tab" href="#activity4">Calender</a></li>
        <li><a data-toggle="tab" href="#activity5">Forwarded Tests</a></li>
      </ul>
      <div class="tab-content">
        <div id="activity1" class="tab-pane fade in active">
         
          <div id="job_trash">
   <?php  if (!empty($forward_applicationlist)): foreach ($forward_applicationlist as $forward_applicaiton) : 

      $singlejob    = $this->job_posting_model->get_job_details_employer($forward_applicaiton->job_post_id);
          $job_seeker_id = $this->session->userdata('job_seeker_id');
          $job_post_id = $forward_applicaiton->job_post_id;
        $company_id = $singlejob->company_profile_id;

          $where = "job_seeker_id='$job_seeker_id' and company_id = '$company_id' and job_post_id = '$job_post_id'  and is_test_done = '0'";
          $apply = $this->Master_model->get_master_row('job_apply', $select = FALSE, $where , $join = FALSE);
            // print_r($this->db->last_query());
                        $sr_no++; ?>
   <label class="checkbox_label">
      <div class="border-top1"></div>
      <input type="checkbox" id='posted_job' class="posted_job" onchange="get_report_data(<?php echo $singlejob->job_post_id ?>)" />
      <div class="card">
         <div class="front">



            <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($forward_applicaiton->company_id);?>" style="height:50px; width:50px;border-radius:5px;float:left;border:solid 1px #eae9e9b8;margin-right:15px;" />
            <div class="job-info">
               <a href="<?php echo base_url(); ?>job/show/<?php echo $forward_applicaiton->job_slugs; ?>" class="job_title"><?php echo $singlejob->job_title; ?></a>
            </div>
            <div class="icon-info">
               <li class="left-icon-title"><i class="far fa-money-bill-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $singlejob->salary_range; ?> (Yearly)  </li>
               <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $singlejob->city_id; ?></li>
               <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
               <li class="right-title" style="width:100%;"> &emsp;<?php echo $singlejob->experience; ?> (Experience)</li>
               <div class="clear"></div>
            </div>

            <div class="following-info">
               <li class="left-title"
                  >Job Role </li>
                  <li class="right-title">&nbsp;: <?php echo $singlejob->job_role_title; ?></li>
                  <li class="left-title">Education</li>
               <li class="right-title">&nbsp;: <?php echo $singlejob->education_level_name; ?></li>
               
               
               <li class="left-title">Domain</li>
               <li class="right-title">&nbsp;:<?php echo $singlejob->job_category_name; ?></li>
              
              
               <div class="clear"></div>
            </div>
            <div class="following-info2">
               
             <li class="left-title">Vacancies</li>
               <li class="right-title">&nbsp;: <?php echo $singlejob->no_jobs; ?></li>
               <li class="left-title">Engagement</li>
               <li class="right-title">&nbsp;: <?php echo $singlejob->job_nature_name; ?></li>
               
              
                <li class="left-title">Published on</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($singlejob->posting_date)) { echo date('j M Y',strtotime($singlejob->posting_date)); } ?></li>
               <div class="clear"></div>
            </div>
            <div class="following-info3">
               
               
               <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:<?php echo $singlejob->is_test_required; ?>
               <?php if ($singlejob->is_test_required == 'Yes' && empty($singlejob->test_for_job)) { ?>
                  <sup><span title="Marked yes but test is not attached" class="required">*</span></sup>
             <?php  }elseif ($singlejob->is_test_required == 'Yes' && !empty($singlejob->test_for_job) && !empty($apply)) { 
              $apply_id=$apply['job_apply_id'];
              $test_id = $singlejob->test_for_job;
              ?>
              <a style="margin-left: 15px" title="Give test" href="<?php echo base_url() ?>job_seeker/ocean_test_start/<?php echo base64_encode($test_id) ?>/<?php echo base64_encode($apply_id); ?>/<?php echo $singlejob->job_post_id ?>" ><lable class=""><button id="sklbtn"><i class="fa fa-file-text" aria-hidden="true"></i>Start Test</button></lable></a>
            <?php } ?></li>
             <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>

               <li class="right-title">&nbsp;: <?php if (isset($singlejob->jd_file) && !empty($singlejob->jd_file)) { echo "Yes"; ?>  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $singlejob->jd_file; ?>" download> <i class="fa fa-download" aria-hidden="true"></i></a> <?php } else { echo "No";} ?></li>
              
               <li class="left-title">Job expiry</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($singlejob->job_deadline)) { echo date('j M Y',strtotime($singlejob->job_deadline)); } ?></li>
               <div class="clear"></div>
            </div>
             <br>
            <div class="skl_bnft">
              
            <span>Skill sets</span>:
            <span class="right-side">
            <?php 
               $sk=$singlejob->skills_required;
               if (isset($sk) && !empty($sk)) {
                  $where_sk= "id IN (".$sk.") AND status=1";
                $select_sk = "skill_name ,id";
                $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                if(!empty($skills)){ 
                  foreach($skills as $skill_row){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $skill_row['skill_name'];?></button></lable>
            <?php }
               } }   ?>
            </span>
               <div class="clear"></div>
               </div> 
           
            <br>
            <div class="skl_bnft">
            <span>Benefits</span>:
            <span class="right-side">
            <?php 
               $benefits=explode(',', $singlejob->benefits);
               
                if(!empty($benefits)){ 
                  $i=0;
                  foreach($benefits as $benefit){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $benefits[$i];?></button></lable>
            <?php $i++; }
               }    ?>
            </span>
             <div class="clear"></div>
            </div>  
           <div class="last-row-invitation">
                <ul>
                  <li>
                    <span class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $forward_applicaiton->city_id;  ?></span>
                  </li>
                  <li>
                    <span class="location-inv"><i class="fas fa-save"></i>&emsp;<?php echo $forward_applicaiton->experience;  ?> years</span>
                  </li>
                  <li>
                    <span class="location-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($forward_applicaiton->created_at)) { $mtime = time_ago_in_php($forward_applicaiton->created_at);
                      echo $mtime;} ?></span>
                  </li>
                  <li>
                    <span class="location-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $forward_applicaiton->job_nature_name;  ?></span>
                  </li>
                </ul>
              </div>
               <br>       
            <a title="details" href=" <?php echo base_url(); ?>job/show/<?php echo $forward_applicaiton->job_slugs; ?>"><i class="fa fa-info-circle icon_backg"></i></a>
            <div class="btn-group">
                        <!-- <a title="Edit" href=" <?php echo base_url() ?>employer/update_job/<?php echo $singlejob->job_post_id ?>"><i class="far fa-edit icon_backg"></i></a> -->
                        <a title="Delete" href="<?php echo base_url('employer/deactivate_job/' . $singlejob->job_post_id); ?>"><i class="fas fa-trash-alt icon_backg"></i></a>
                     </div>

            <?php  if ($singlejob->job_deadline > date('Y-m-d')){
               // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
               echo '<span class="active-span">Active</span>';
               }
               else {
               // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
               echo '<span class="pasive-span">Expired</span>';
               } ?>
             <div class="dropdown">
               <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $singlejob->job_post_id; ?>"> <i class="fas fa-share"></i></a>
              <!--  <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-h"></i>
               </button> -->
               <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                  <li><a class="dropdown-item" href="#">View post job</a></li>
                   <li> <a class="dropdown-item" href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs['job_post_id'] ?>">Edit job post</a></li> 
                 <li ><a class="dropdown-item" href="#" id="attach_to_job" data-toggle="modal" data-target="#attach_test<?php echo $v_companyjobs['job_post_id'] ?>" >Attach Test</a></li>
               </div> -->
            </div>
         </div>
      </div>
   </label>
   <?php endforeach; 
      else : ?> 
   <li>
      <strong>There are no Invitations to Display !</strong>
   </li>
   <?php endif; ?>
</div>
<div class="container-fluid">
             <div class="col-md-6"></div>
            <div class="col-md-6">
            <span><?php echo $links; ?></span>   
            </div>
               
          </div>
   </div>

            
            
        <?php foreach ($forward_applicationlist as $applicaiton) : ?>
        <div id="ApplyJob1<?php echo $applicaiton->job_post_id; ?>" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Apply Job</h4>
              </div>
              <div class="modal-body">
                <form  class="form-horizontal" action="<?php echo base_url() ?>job/apply_job" method="post" style="padding: 30px;">
                  <input type="hidden" name="forward_status" class="form-control" id="forward_status" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
                    echo $frow['forword_job_status'];
                    } }?>" placeholder="">
                  <input type="hidden" name="job_apply_id" class="form-control" id="job_apply_id" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
                    echo $frow['job_apply_id'];
                    } }?>" placeholder="">
                  <?php
                    $job_seeker=$this->session->userdata('job_seeker_id');
                    $js_name= $this->Job_seeker_model->jobseeker_name($job_seeker); ?>
                  <input type="hidden" name="job_seeker_id" value="<?php echo $job_seeker ?>">
                  <input type="hidden" name="job_post_id" value="<?php echo $applicaiton->job_post_id; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-4" for="email">Company Name:</label>
                    <div class="col-sm-8">
                      <input type="text" name="company_name" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$applicaiton->company_profile_id;
                        echo $this->company_profile_model->company_name($company_id);?>">
                    </div>
                  </div>
                  <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
                  <div class="form-group">
                    <label class="control-label col-sm-4" for="email"> Expected Salary:</label>
                    <div class="col-sm-8">
                      <input type="text" name="expected_salary" required class="form-control allownumericwithdecimal" id="avaliable" placeholder="Expected Salary"
                        >
                    </div>
                  </div>
                  <?php $test=$applicaiton->is_test_required;
                    if ($test=='Yes') {
                    ?>
                  <div><b>Note: This job has a Online Test.</b></div>
                  <div class="panel-body"></div>
                  <?php }else{} ?>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Apply</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php  endforeach;  ?>
        <div id="activity5" class="tab-pane fade ">
          <?  if (!empty($oceanchamp_tests)): foreach ($oceanchamp_tests as $forward_applicaiton) :
            // for ($i=0; $i <sizeof($forward_applicationlist) ; $i++) { 
            $singlejob    = $this->job_posting_model->get_job_details_employer($forward_applicaiton->job_post_id);
            
            
                        $sr_no++; ?>
          <div class="invi-div">
            <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($forward_applicaiton->company_id); ?>" class="invitation-img"/>
            <div class="info-invitation">
              <p class="head-invi"><?php echo $this->job_posting_model->job_title_by_name($forward_applicaiton->test_name); ?></p>
              <span class="salary-info">Topics: <?php echo $this->job_posting_model->job_salary_by_id($forward_applicaiton->topics); ?></span>
              <p>Company name:<?php echo $this->company_profile_model->company_name($forward_applicaiton->company_id); ?></p>
              <div class="detail-b"><a href="<?php echo base_url(); ?>job/show/<?php echo $forward_applicaiton->job_slugs; ?>">Details</a></div>
              <div class="last-row-invitation">
              </div>
              <a href="<?php echo base_url(); ?>job_seeker/ocean_test_start/<?php if(!empty($test_id))echo base64_encode($test_id); ?>"><button class="apply-invi" >Give Test</button></a>
            </div>
            <div class="clear"></div>
          </div>
          <?php
            // $sr_no++;
             // }
            
            endforeach;
            ?>
          <?php else : ?> 
          <div>
            <strong>There is no data to display</strong>
          </div>
          <?php endif; ?>
          <div class="btn-more">
            <button class="more-btn">show more</button>
          </div>
        </div>
        <div id="activity2" class="tab-pane fade">
         <div id="job_trash">
  <?  if (!empty($applicationlist)): foreach ($applicationlist as $forward_applicaiton) :
            // for ($i=0; $i <sizeof($forward_applicationlist) ; $i++) { 
            $singlejob    = $this->job_posting_model->get_job_details_employer($forward_applicaiton->job_post_id);
            // print_r($forward_applicaiton->job_post_id);
            $salary= $this->job_posting_model->job_salary_by_id($forward_applicaiton->job_post_id); 
            // print_r($salary);

            
            
                        $sr_no++; ?>
   <label class="checkbox_label">
      <div class="border-top1"></div>
      <input type="checkbox" id='posted_job' class="posted_job" onchange="get_report_data(<?php echo $singlejob->job_post_id ?>)" />
      <div class="card">
         <div class="front">



            <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($forward_applicaiton->company_id);?>" style="height:50px; width:50px;border-radius:5px;float:left;border:solid 1px #eae9e9b8;margin-right:15px;" />
            <div class="job-info">
               <a href="<?php echo base_url(); ?>job/show/<?php echo $forward_applicaiton->job_slugs; ?>" class="job_title"><?php echo $singlejob->job_title; ?></a>
            </div>
            <div class="icon-info">
               <li class="left-icon-title"><i class="far fa-money-bill-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $singlejob->salary_range; ?> (Yearly)  </li>
               <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $singlejob->city_id; ?></li>
               <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
               <li class="right-title" style="width:100%;"> &emsp;<?php echo $singlejob->experience; ?> (Experience)</li>
               <div class="clear"></div>
            </div>

            <div class="following-info">
               <li class="left-title"
                  >Job Role </li>
                  <li class="right-title">&nbsp;: <?php echo $singlejob->job_role_title; ?></li>
                  <li class="left-title">Education</li>
               <li class="right-title">&nbsp;: <?php echo $singlejob->education_level_name; ?></li>
               
               
               <li class="left-title">Domain</li>
               <li class="right-title">&nbsp;:<?php echo $singlejob->job_category_name; ?></li>
              
              
               <div class="clear"></div>
            </div>
            <div class="following-info2">
               
             <li class="left-title">Vacancies</li>
               <li class="right-title">&nbsp;: <?php echo $singlejob->no_jobs; ?></li>
               <li class="left-title">Engagement</li>
               <li class="right-title">&nbsp;: <?php echo $singlejob->job_nature_name; ?></li>
               
              
                <li class="left-title">Published on</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($singlejob->posting_date)) { echo date('j M Y',strtotime($singlejob->posting_date)); } ?></li>
               <div class="clear"></div>
            </div>
            <div class="following-info3">
               
               
               <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:<?php echo $singlejob->is_test_required; ?>
               <?php if ($singlejob->is_test_required == 'Yes' && empty($singlejob->test_for_job)) { ?>
                  <sup><span title="Marked yes but test is not attached" class="required">*</span></sup>
             <?php  }elseif ($singlejob->is_test_required == 'Yes' && !empty($singlejob->test_for_job)) { ?>
              <a style="margin-left: 15px" title="Give test" href="<?php echo base_url() ?>upload/job_description/<?php echo $singlejob->jd_file; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a>
            <?php } ?></li>
             <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>

               <li class="right-title">&nbsp;: <?php if (isset($singlejob->jd_file) && !empty($singlejob->jd_file)) { echo "Yes"; ?>  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $singlejob->jd_file; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a> <?php } else { echo "No";} ?></li>
              
               <li class="left-title">Job expiry</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($singlejob->job_deadline)) { echo date('j M Y',strtotime($singlejob->job_deadline)); } ?></li>
               <div class="clear"></div>
            </div>
             <br>
            <div class="skl_bnft">
              
            <span>Skill sets</span>:
            <span class="right-side">
            <?php 
               $sk=$singlejob->skills_required;
               if (isset($sk) && !empty($sk)) {
                  $where_sk= "id IN (".$sk.") AND status=1";
                $select_sk = "skill_name ,id";
                $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                if(!empty($skills)){ 
                  foreach($skills as $skill_row){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $skill_row['skill_name'];?></button></lable>
            <?php }
               } }   ?>
            </span>
               <div class="clear"></div>
               </div> 
           
            <br>
            <div class="skl_bnft">
            <span>Benefits</span>:
            <span class="right-side">
            <?php 
               $benefits=explode(',', $singlejob->benefits);
               
                if(!empty($benefits)){ 
                  $i=0;
                  foreach($benefits as $benefit){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $benefits[$i];?></button></lable>
            <?php $i++; }
               }    ?>
            </span>
             <div class="clear"></div>
            </div>  
           <div class="last-row-invitation">
                <ul>
                  <li>
                    <span class="location-inv"><i class="fas fa-map-marker-alt"></i><?php echo $forward_applicaiton->city_id;  ?></span>
                  </li>
                  <li>
                    <span class="location-inv"><i class="fas fa-save"></i>&emsp;<?php echo $forward_applicaiton->experience;  ?> years</span>
                  </li>
                  <li>
                    <span class="location-inv"><i class="far fa-calendar-alt"></i>&emsp; <?php if(!is_null($forward_applicaiton->created_at)) { $mtime = time_ago_in_php($forward_applicaiton->created_at);
                      echo $mtime;} ?></span>
                  </li>
                  <li>
                    <span class="location-inv"><i class="fas fa-clock"></i>&emsp;<?php echo $forward_applicaiton->job_nature_name;  ?></span>
                  </li>
                </ul>
              </div>
               <br>       
            <a title="details" href=" <?php echo base_url(); ?>job/show/<?php echo $forward_applicaiton->job_slugs; ?>"><i class="fa fa-info-circle icon_backg"></i></a>
            <div class="btn-group">
                        <!-- <a title="Edit" href=" <?php echo base_url() ?>employer/update_job/<?php echo $singlejob->job_post_id ?>"><i class="far fa-edit icon_backg"></i></a> -->
                        <a title="Delete" href="<?php echo base_url('employer/deactivate_job/' . $singlejob->job_post_id); ?>"><i class="fas fa-trash-alt icon_backg"></i></a>
                     </div>

            <?php  if ($singlejob->job_deadline > date('Y-m-d')){
               // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
               echo '<span class="active-span">Active</span>';
               }
               else {
               // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
               echo '<span class="pasive-span">Expired</span>';
               } ?>
             <div class="dropdown">
               <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $singlejob->job_post_id; ?>"> <i class="fas fa-share"></i></a>
              <!--  <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-h"></i>
               </button> -->
               <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                  <li><a class="dropdown-item" href="#">View post job</a></li>
                   <li> <a class="dropdown-item" href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs['job_post_id'] ?>">Edit job post</a></li> 
                 <li ><a class="dropdown-item" href="#" id="attach_to_job" data-toggle="modal" data-target="#attach_test<?php echo $v_companyjobs['job_post_id'] ?>" >Attach Test</a></li>
               </div> -->
            </div>
         </div>
      </div>
   </label>
   <?php endforeach; 
      else : ?> 
   <li>
      <strong>There are no Invitations to Display !</strong>
   </li>
   <?php endif; ?>
</div>
<div class="container-fluid">
             <div class="col-md-6"></div>
            <div class="col-md-6">
            <span><?php echo $links; ?></span>   
            </div>
               
          </div>
   </div>
       
        <div id="activity3" class="tab-pane fade">
        </div>
        <div id="activity4" class="tab-pane fade">
        </div>
      </div>
</div>
    <div class="col-md-3 ">
        <div class="last_section">
          <div class="pai_chart">
            <main>
              <section>
                <ul class="pieID legend">
                   <li class="cv">
                  <em id="spanid1">Questions in Q Bank</em>
                  <span>10</span>
                </li>
                <li class="cv">
                  <em id="spanid2">Appeared in Test Papers</em>

                  <span id="active_cv">10</span>
                </li>
                
                <div class="pieID pie">
                </div>
               
                  <li>
                    <em id="spanid3">Total Questions</em>
                    <span>10</span>
                   
                  </li>
               
                  <li>
                    <em id="spanid4">Appeared in Test Papers</em>
                    <span id='appeared_in_test_paper'>10 </span>
                   
                  </li>
                  <li>
                    <em id="spanid5">Not Appeared in Test Papers</em>
                    <span id='not_appeared_in_test_papers'>10 </span>
                  
                  </li>
                  <li>
                    <em id="spanid6">Expert Level </em> 
                    <span id='expert_level'>10 </span>
                  
                  </li>
                  <li>
                    <em id="spanid7">Medium Level</em>
                    <span id='Medium_level'>10</span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid8">Beginners Level</em> 
                    <span id='Beginners_level'>10</span>
                    
                  </li>
                  <li>
                    <em id="spanid9">Attempted</em>
                    <span id='attempted'>10</span>
                 
                  </li>
                  <li>
                    <em id="spanid10">Answered Correctly</em>
                    <span id='answered_correctly'>10</span>
                 
                  </li>
                  <li>
                    <em id="spanid11">Answered Wrongly </em>
                    <span id='answered_wrongly'>10</span>
                    
                  </li>
                </ul>
              </section>
            </main>
          </div>
          <div class="filter1">
            <div class="panel ">
              <div class="panel-heading">
                <h3 class="panel-title">Location</h3>
                <div class="pull-right">
                  <span class="clickable filter" data-toggle="tooltip"  data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
                </div>
              </div>
              <div class="panel-body">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter location" />
                <div class="location_fil">
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="filter1">
            <div class="panel ">
              <div class="panel-heading">
                <h3 class="panel-title">Education</h3>
                <div class="pull-right">
                  <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
                </div>
              </div>
              <div class="panel-body">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
                <div class="location_fil">
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="filter1">
            <div class="panel ">
              <div class="panel-heading">
                <h3 class="panel-title">Mandatory</h3>
                <div class="pull-right">
                  <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
                </div>
              </div>
              <div class="panel-body">
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
                <div class="location_fil">
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                  <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                    <strong>css</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="experience">
            <form class="exp_level">
              <label for="range1">Experience</label>
              <input id="range1" type="range" name="range1" min="1" max="10" step="0.1" value="5">
              <label for="range3">Availability</label>
              <input id="range3" type="range" name="range3" min="0" max="100" step="1" value="50">
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
</div>
<?php foreach ($applicationlist as $applicaiton) : ?>
<div id="ApplyJob2<?php echo $applicaiton->job_post_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Apply Job</h4>
      </div>
      <?php
        $job_seeker=$this->session->userdata('job_seeker_id');
        $js_name= $this->Job_seeker_model->jobseeker_name($job_seeker); ?>
      <div class="modal-body">
        <form  class="form-horizontal" action="<?php echo base_url() ?>job/apply_job" method="post" style="padding: 30px;">
          <input type="hidden" name="forward_status" class="form-control" id="forward_status" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['forword_job_status'];
            } }?>" placeholder="">
          <input type="hidden" name="job_apply_id" class="form-control" id="job_apply_id" value="<?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            echo $frow['job_apply_id'];
            } }?>" placeholder="">
          <input type="hidden" name="job_seeker_id" value="<?php echo $job_seeker ?>">
          <input type="hidden" name="job_post_id" value="<?php echo $applicaiton->job_post_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Company Name:</label>
            <div class="col-sm-8">
              <input type="text" name="company_name" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$applicaiton->company_profile_id;
                echo $this->company_profile_model->company_name($company_id);?>">
            </div>
          </div>
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email"> Expected Salary:</label>
            <div class="col-sm-8">
              <input type="text" name="expected_salary" required class="form-control allownumericwithdecimal" id="avaliable" placeholder="Expected Salary">
            </div>
          </div>
          <?php $test=$applicaiton->is_test_required;
            if ($test=='Yes') {
            ?>
          <div><b>Note: This job has a Online Test.</b></div>
          <div class="panel-body"></div>
          <?php }else{} ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Apply</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php  endforeach;  ?>
<?php
 if (!empty($forward_applicationlist)): foreach ($forward_applicationlist as $forward_applicaiton) : 

      $singlejob    = $this->job_posting_model->get_job_details_employer($forward_applicaiton->job_post_id); ?>
<div class="modal" id="rotateModal<?php echo $singlejob->job_post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <input type="hidden" name="company_profile_id" id="company_profile_id" value="<?php echo $this->session->userdata('company_profile_id'); ?>">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Job Post</h5>
         </div>
         <form action="<?php echo base_url() ?>job_seeker/forword_job_post" class="sendEmail" method="post" autocomplete="off">
            <div class="modal-body" style="padding:15px 40px;">
               <input type="hidden" name="job_post_id" value="<?php echo $singlejob->job_post_id; ?>">
               <input type="hidden" name="employer_id" value="<?php echo $forward_applicaiton->company_id; ?>">  
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <label class="mdl-textfield__label" for="sample3">E-mail:</label>
                  <input type="email"  class="form-control" name="candiate_email"  id="email" placeholder="Enter comma seperated Emails"  data-required="true" multiple style="display: inline-block;" required>
               </div>
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">Message:</label>
                  <textarea class="form-control" name="message" rows="5" id="comment" required></textarea>
               </div>
               
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-save">Send</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php
   endforeach;endif;
   ?>
<script>
  $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script>
<script>
   $(document).ready (function(){
     $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
     $("#smsg").slideUp(500);
     });  
     $("#email").autocomplete({
             
             source: "<?php echo base_url();?>Employer/get_candidate_by_email",
             minLength: 2,
              // append: "#rotateModal",
            
    
            
           }); 
   });
</script>
<script>
  function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
  }
  function addSlice(sliceSize, pieElement, offset, sliceID, color,dataCount) {
     var val = $('#spanid'+dataCount).text();
  
     console.log(val);
  
    $(pieElement).append("<div class='slice "+sliceID+"'><span title='"+val+"'></span></div>");
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
      addSlice(sliceSize, pieElement, offset, sliceID, color,dataCount);
    } else {
      addSlice(maxSize, pieElement, offset, sliceID, color,dataCount);
      iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount, color);
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
      "#6050DC", 
      "#D52DB7", 
      "#FF2E7E", 
      "#FF6B45", 
      "#FFAB05", 
      "#EC6B56", 
      "#FFC154", 
      "#47B39C", 
      "#E6F69D",
      "#64C2A6",
      "#2D87BB",
      "#377B2B"
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
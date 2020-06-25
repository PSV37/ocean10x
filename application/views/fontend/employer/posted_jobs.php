<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
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
    top: -10px;   
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
   background-color: #afe1de;
    color: #6f6e6e;
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

.card{height:auto;display: flow-root;padding:0px !important;
border:none !important;}    
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

    display: initial !important;
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
.following-info{margin-bottom:10px;}
.following-info2{margin-bottom:10px;}   
.following-info3{margin-bottom:10px; margin-top: -154px;}
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
  margin:0 30px 30px -23px;
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
  margin-left:8px !important;
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
  width: 110px;
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

}
.modal-content {
    background-image: linear-gradient(#18c5bd, #d4efec);
}
.sendEmail label{color:#fff;font-size:13px;}
.sendEmail input{background-color: #f3f7f663;}
.sendEmail textarea.form-control{background-color:#fbffff80;}
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

.closebtn:hover {
  color: black;
}





:root {
  --bg: #e3e4e8;
  --fg: #17181c;
  --bs1: #ffffff;
  --bs2: #c1c2c5;
  --tick: #454954;
  --transDur: 0.1s;
  font-size: calc(20px + (40 - 20)*(100vw - 320px)/(2560 - 320));
}
.exp_level input {
  color: var(--fg);
  font: 1em/1.5 Muli, sans-serif;
}

.range__ticks {
  display: flex;
}
.exp_level {
  margin: auto;
  max-width:20em;
  padding: 0 -0.5em;
  width: 100%;
}
.exp_level label {
  display: block;
  font-weight: bold;
}
.exp_level input[type=range], label {
  -webkit-tap-highlight-color: transparent;
}
.exp_level input[type=range], .range {
  border-radius: 0.75em;
  overflow: hidden;
  margin-bottom: 1.5em;
}
.range input{margin:0px;}
.exp_level input[type=range] {
  background-color: #d4efec;
  box-shadow:
    0.3em 0.3em 0.4em var(--bs2) inset,
    -0.3em -0.3em 0.4em var(--bs1) inset;
  display: block;
  padding: 0 0.1em;
  width: 100%;
  height: 1.5em;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}
.exp_level input[type=range]:focus {
  outline: transparent;
}
.exp_level input[type=range]::-webkit-slider-thumb {
  background-color: #255ff4;
  border: 0;
  border-radius: 50%;
  box-shadow:
    -0.3em -0.3em 0.5em #0937aa inset,
    0 -0.2em 0.2em 0 #0004,
    0.3em 0.9em 0.8em #0007;
  cursor: pointer;
  position: relative;
  width: 1.3em;
  height: 1.3em;
  transition: all var(--transDur) linear;
  z-index: 1;
  -webkit-appearance: none;
  appearance: none;
}
.exp_level input[type=range]:focus::-webkit-slider-thumb {
  background-color: #5583f6;
  box-shadow:
    -0.3em -0.3em 0.5em #0b46da inset,
    0 -0.2em 0.2em 0 #0004,
    0.3em 0.9em 0.8em #0007;
}
.exp_level input[type=range]::-moz-range-thumb {
  background-color: #255ff4;
  border: 0;
  border-radius: 50%;
  box-shadow:
    -0.3em -0.3em 0.5em #0937aa inset,
    0 -0.2em 0.2em 0 #0004,
    0.3em 0.9em 0.8em #0007;
  cursor: pointer;
  position: relative;
  width: 1.3em;
  height: 1.3em;
  transform: translateZ(1px);
  transition: all var(--transDur) linear;
  z-index: 1;
  -moz-appearance: none;
  appearance: none;
}
.exp_level input[type=range]:focus::-moz-range-thumb {
  background-color: #5583f6;
  box-shadow:
    -0.3em -0.3em 0.5em #0b46da inset,
    0 -0.2em 0.2em 0 #0004,
    0.3em 0.9em 0.8em #0007;
}
.exp_level input[type=range]::-moz-focus-outer {
  border: 0;
}
.range {
  position: relative;
  height: 1.5em;
}
.range__ticks {
  justify-content: space-between;
  align-items: center;
  pointer-events: none;
  position: absolute;
  top: 0;
  left: 0.75em;
  width: calc(100% - 1.5em);
  height: 100%;
}
.range__tick, .range__tick-text {
  display: inline-block;
}
.range__tick {
  color: var(--tick);
  font-size:9px;
  text-align: center;
  width: 0;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}
.range__tick-text {
  transform: translateX(-50%);
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

</style>



      


<!---header-->
<?php 
$company_profile_id = $this->session->userdata('company_profile_id');

 $this->load->view('fontend/layout/employer_new_header.php');
 
?>
<!---header--->


<div class="container-fluid main-d">
	<div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
       <!-- <div class="panel-body"></div> -->
       
            <div class="col-md-6 active-job">
               <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
              <label>
               <div class="border-top1"></div>
                <input type="checkbox" />
                
                  <div class="card">
                 
                    <div class="front">
                    
                      <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_profile_id);?>" style="height:50px; width:50px;border-radius:5px;float:left;border:solid 1px #eae9e9b8;margin-right:15px;" />
                      <div class="job-info">
                        <p class="job_title"><?php echo $v_companyjobs->job_title; ?></p>
                      </div>   
                      <div class="icon-info">
                        <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
                        <li class="right-icon-title"> &emsp;<?php echo $v_companyjobs->city_id; ?></li>
                        <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
                        <li class="right-title" style="width:100%;"> &emsp;<?php echo $v_companyjobs->experience; ?>(experience)</li>
                        <div class="clear"></div>
                      </div>
                      <div class="following-info">
                        <li class="left-title"
                          >Job Roll</li><li class="right-title">&nbsp;: <?php echo $v_companyjobs->job_role; ?></li>
                          <li class="left-title">Engagement</li>
                          <li class="right-title">&nbsp;: <?php echo $v_companyjobs->job_nature_name; ?></li>
                          <li class="left-title">Domain</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->job_category_name; ?></li>
                          <li class="left-title">Role Type </li><li class="right-title">&nbsp;:</li>
                          <li class="left-title">Dummy1</li><li class="right-title">&nbsp;:</li>
                          <li class="left-title">Dummy2</li><li class="right-title">&nbsp;:</li>
                         
                          <div class="clear"></div>
                      </div>
                      <div class="following-info2">
                        <li class="left-title">Education</li><li class="right-title">&nbsp;: <?php echo $v_companyjobs->education_level_name; ?></li>
                        <li class="left-title">Specialization</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->education_specialization; ?></li>
                        <li class="left-title">experience</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->experience; ?></li>
                        <li class="left-title">Joining ETA</li><li class="right-title">&nbsp;:30 days</li>
                        <li class="left-title">Benifits</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->benefits; ?> </li>
                       
                        <li class="left-title">Dummy3</li><li class="right-title">&nbsp;:value</li>

                        <div class="clear"></div>
                      </div>
                      <div class="following-info3">
                        <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li><li class="right-title">&nbsp;: yes</li>
                        <li class="left-title">CTC</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->salary_range; ?></li>
                        <li class="left-title">Vacancies</li><li class="right-title">&nbsp;: <?php echo $v_companyjobs->no_jobs; ?></li>
                        <li class="left-title">Ocean Test</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->is_test_required; ?></li>
                        <li class="left-title">Published on</li><li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs->created_at)) { echo date('M j Y',strtotime($v_companyjobs->created_at)); } ?></li>
                        <li class="left-title">Job expiry</li><li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs->job_deadline)) { echo date('M j Y',strtotime($v_companyjobs->job_deadline)); } ?></li>
                        <div class="clear"></div>
                      </div>

                          <!-- <div id="skills"> -->
                             <span>Skill sets</span>:
                             <?php 
                             $sk=$v_companyjobs->skills_required;
                             if (isset($sk) && !empty($sk)) {
                                $where_sk= "id IN (".$sk.") AND status=1";
                              $select_sk = "skill_name ,id";
                              $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                              if(!empty($skills)){ 
                                      foreach($skills as $skill_row){
                                       ?>

                                        
                                        <lable class="btn-default1"><button id="sklbtn"><?php echo  $skill_row['skill_name'];?></button></lable>


                                     <?php }
                                    }
                             }   
                            
                              ?>

                           <!--  <div class="clear"></div>
                          </div> -->         
                                   
                <button class="detail-btn">details</button>
               <?php  if ($v_companyjobs->job_deadline > date('Y-m-d')){
                                        // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
                                        echo '<span class="active-span">Active</span>';
                                    }
                                    else {
                                        // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
                                        echo '<span class="pasive-span">Expired</span>';
                                    } ?>
                
                <div class="dropdown">
                 <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $v_companyjobs->job_post_id; ?>"> <i class="fas fa-share"></i></a>
                  <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-h"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                    <li><a class="dropdown-item" href="#">View post job</a></li>
                    <li> <a class="dropdown-item" href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs->job_post_id ?>">Edit job post</a></li>
                    <li> <a class="dropdown-item" href="#">Edit test topic</a></li>
                  </div>
                </div>
              </div>
             </div>
              
            </label>
            <?php endforeach; 
          else : ?> 
            <li>
              <strong>There is no active Vacancy Post to Show</strong>
            </li>
          <?php endif; ?>
        </div>
        
			 <div class="col-md-3">
          <div class="last_section">
            <div class="pai_chart">
              <main>
                <section>
                  <div class="pieID pie">
                  
                  </div>
                  <ul class="pieID legend">
                    <li>
                      <em>Humans</em>
                      <span>718</span>
                    </li>
                    <li>
                      <em>Dogs</em>
                      <span>531</span>
                    </li>
                    <li>
                      <em>Cats</em>
                      <span>868</span>
                    </li>
                    <li>
                      <em>Slugs</em>
                      <span>344</span>
                    </li>
                    <li>
                      <em>Aliens</em>
                      <span>1145</span>
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
                      <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
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

   <!-- <div class=" text-center">
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#rotateModal">Rotate Modal</button>
    </div> -->
    <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
  <div class="modal" id="rotateModal<?php echo $v_companyjobs->job_post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="company_profile_id" id="company_profile_id" value="<?php echo $this->session->userdata('company_profile_id'); ?>">
    <div class="modal-dialog" role="document">    
        <div class="modal-content">    
          <div class="modal-header" style="border-bottom:none;">    
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward this job post</h5>
          </div>
          <form action="<?php echo base_url() ?>employer/forword_job_post" class="sendEmail" method="post" autocomplete="off">
        <div class="modal-body" style="padding:15px 40px;">
             <input type="hidden" name="job_post_id" value="<?php echo $v_companyjobs->job_post_id; ?>">
            <input type="hidden" name="consultant" value="JobSeeker">  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">E-mail</label>
            <input type="text"  name="candiate_email"  placeholder="Enter comma seperated Emails"  id="subject" data-required="true" required>
          </div>
        
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">Message</label>

          <textarea class="form-control" name="message" rows="5" id="comment" required></textarea>
          </div>
              
         
       
        </div>
        <div class="modal-footer">
                           
       <button type="submit" class="btn btn-save">Forward Job Post</button>
         
      </div>
      </form>
    </div>
  </div>

</div> 
 <?php
endforeach;endif;
?>
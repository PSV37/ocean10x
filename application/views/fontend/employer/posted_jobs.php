<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<style>    

.border-top1{
    height: 4px;
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
    top: -16px;
    width: 63px;
    position: absolute;
    right:3px;
}
	
.front{height:260px;padding:0px 10px 10px 10px;}
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

.active-job label {
   
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    display: block;
    width: 100%;
     position:relative !important;
	 
    border-radius: 13px;
}
.card{height:auto;display: flow-root;padding:0px !important;}    
.btn_all {
    color: #539617;
    background-color: #fff;
    height: 35px;
    width: 70px;
    border: solid 1px;
    border-radius: 50px;
}
    
.active-job {
    margin-top: 209px;
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
                    <li> <a class="dropdown-item" href="#">Edit job post</a></li>
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
            <!--future use-->
          </div>            
		</div>
  </div>
</div>       

   <!-- <div class=" text-center">
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#rotateModal">Rotate Modal</button>
    </div> -->
    <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
  <div class="modal fade-rotate" id="rotateModal<?php echo $v_companyjobs->job_post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <input type="hidden" name="company_profile_id" id="company_profile_id" value="<?php echo $this->session->userdata('company_profile_id'); ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 24px;font-weight: 600;color:#fff;">Forward this job post</h5>
          </div>
          <form action="<?php echo base_url() ?>employer/forword_job_post" class="sendEmail" method="post" autocomplete="off">
        <div class="modal-body">
             <input type="hidden" name="job_post_id" value="<?php echo $v_companyjobs->job_post_id; ?>">
            <input type="hidden" name="consultant" value="JobSeeker">  
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">E-mail</label>
            <input class="mdl-textfield__input" name="candiate_email"  placeholder="Enter comma seperated Emails" type="text" id="subject" data-required="true" required>
          </div>
        
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
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
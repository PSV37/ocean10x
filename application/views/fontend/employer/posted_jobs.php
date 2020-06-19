<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<style>
@charset "utf-8";
/* CSS Document */

.btn_all {
    color: #539617;
    background-color: #fff;
    height: 35px;
    width: 70px;
    border: solid 1px;
    border-radius: 50px;
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


.col-md-6.active-job {
    margin-top: 1523px;
}
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

.required
  {
    color: red;
  }
  label.control-label {
    margin-top: 15px;
}
div#next {
    float: right;
    margin-right: 4px;
}

.form-group {
    margin-bottom: 26px;
}

.star-text {
    width: 53%;
    margin-top: 32px;
}



@media only screen and (max-width: 320px){
.myfields ul {
     margin-left: -10px !important;
}
}

@media only screen and (max-width: 375px){
.myfields ul {
    width: 267px !important;
    margin-left: 19px;
}

.star-text {
    width: 50%;
    margin-top: 13px;
    margin-left: 6px;
}
}


@media only screen and (max-width: 500px){
    .rate {
    float: none !important;
    padding: 0px !important;
    width: 157px !important;
    margin: 0 auto !important;
}

[type="checkbox"] + span {
    padding: 10px 7px !important;
}

.myfields ul {
    float: left !important;
    width: 167px; 
}

.btn-default1:not(:checked) + span {
    padding: 17px 10px !important;
    width: 154px !important;
    border-radius: 4px !important;
}

.btn-default1:input(:checked){
    padding: 17px 10px !important;
    width: 154px !important;
    border-radius: 4px !important; 

}


.myfields {
    margin-left: 5px !important;
    margin-top: 26px !important;
}

:checked + span {
    padding: 17px 10px !important;
    width: 154px !important;
    border-radius: 4px !important; 
}



}




.myfields > input:checked ~ label {
    color: #2ea148;    
}
.myfields:not(:checked) > label:hover,
.myfields:not(:checked) > label:hover ~ label {
    color: #2ea148;  
}
.myfields > label:hover + input:checked,
.myfields > label:hover ~ label,
.myfields > label:hover ~ input:checked ,
.myfields > label:hover ~ label ~ input:checked ,
.myfields > input:checked ~ label ~ label:hover  {
    color: #2ea148;
}

input[type="checkbox"] {
    margin: 4px 0 0;
    margin-top: 1px \9;
    line-height: normal;
    display: none;
}



.btn-default1:not(:checked) + span {
    background: #e4e2e2;
    /*padding: 8px 0;*/
    width: 100%;
    border-radius: 10px;
    cursor: pointer;
}

.btn-bottom_3 {
    float: right;
    margin-right: 47px;
}
/*.btn-default1:input(:checked){
    background-color: red;
}*/


.star-rating .fa-star{color: green;}
}



/*example*/
label {
    position:relative;   
    cursor:pointer;
}
/*label [type="checkbox"] {
    display:none;
}*/
[type="checkbox"] + span {
    display:inline-block;
    padding:1em;
    border-radius: 10px;
    cursor: pointer;
}


/*.btn-default1:not(:checked) + span:hover {
    background-color: #2ea148 !important;
}*/

:checked + span {
    background:#18c5bd !important;
    display:inline-block; 
    width: 100%;
    color: #fff;   
}

[type="checkbox"][disabled] + span {
    background:#f00;  
}
section {
    padding: 5px 45px 25px !important;
}
input{
  border-radius: 4px;
    border: 1px solid lightgrey;}
  
span.options_beni {
    background: #18c5bd !important;
    display: inline-block;
   
    color: #fff;
    padding: 5px 12px !important;   
    font-size: 11px;
  border-radius:13px !important; }

  

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
              <label>
                <input type="checkbox" />
                 <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
                  <div class="card">
                    <div class="front">
                      <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_profile_id);?>" style="height:40px; width:40px;border-radius:5px;float:left" />
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
                          </div>
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
                      <div>
                        <li class="left-title">Skillls</li>
                        
            <?php 
            $sk =  $v_companyjobs->skills_required; 
            $where_sk= "id IN (".$sk.") AND status=1";
            $select_sk = "skill_name ,id";
            $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=false,$start=false, $search=false);
              
               $result = '';
                if(!empty($skills)){ 
                    foreach($skills as $skill_row){ ?>
                      <input type='checkbox' name='skill_set[]' style='height:15px; width:20px;' id='skill_set' value=".$skill_row['id']." checked> ".$skill_row['skill_name']."";
                        $result .= '
                          <div  id="myfields" class="myfields" >
                          <ul class="rating-comments" >


                            <label>
                                <input type="checkbox" name="skill_set[]"  value="<?php echo $skill_row['skill_name']; ?>" class="btn-default1" checked>
                                <span><?php echo $skill_row['skill_name']?></span>
                            </label>

                        
                         </ul>
                       
                     </div>';

                    } 
                  }
                     <div class="clear"></div>
                  </div>
                                   
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
              <?php endforeach; 
          else : ?> 
            <li>
              <strong>There is no active Vacancy Post to Show</strong>
            </li>
          <?php endif; ?>
            </label>
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
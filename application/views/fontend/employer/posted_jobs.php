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
    margin-top: 77px;
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
        <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
            <div class="row">
            <div class="col-md-12">
              <div class="col-md-3"></div>
            <div class="col-md-9 active-job">
           
            <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                  <a href="<?php echo base_url(); ?>job/show/<?php echo $v_companyjobs->job_slugs; ?>"> <div class="job_title">
                  <?php echo $v_companyjobs->job_title; ?>
                   </div> </a>
                    <div class="organization">
                      Published : <?php if(!is_null($v_companyjobs->created_at)) { echo date('F j Y',strtotime($v_companyjobs->created_at)); } ?>
                    </div>
                    <div class="location">
                      Deadline :<?php if(!is_null($v_companyjobs->job_deadline)) { echo date('F j Y',strtotime($v_companyjobs->job_deadline)); } ?>
                    </div>
                   <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $v_companyjobs->job_post_id; ?>"><div class="apply_job_btn">forward</div></a> 
                   
                   
                    <div class="dropdown right-arrow">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">...
                       </button>
                        <ul class="dropdown-menu">
                          
                          <li><a href="#">Copy link to post</a></li>
                          <li><a href="#">save job</a></li>
                          <li><a href="#">JavaScript</a></li>
                          
                        </ul>
                      </div>
                   
                </div>
            
            
            
            </div>
            </div>
          </div>
          
            <?php
            endforeach;
            ?>
            <?php else : ?> 
                <li>
                    <strong>There is no active Vacancy Post to Show</strong>
                </li>
            <?php endif; ?>
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
            <label class="mdl-textfield__label" for="sample3">email</label>
            <input class="mdl-textfield__input" name="candiate_email"  placeholder="Enter comma seperated Emails" type="text" id="subject" data-required="true" >
          </div>
        
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">message</label>

          <textarea class="form-control" name="message" rows="5" id="comment"></textarea>
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
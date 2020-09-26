<?php 
$company_profile_id = $this->session->userdata('company_profile_id');

$jobseeker_id = $this->session->userdata('job_seeker_id');
$emp_id = $this->session->userdata('emp_id');
if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_new_header.php');

            }

        elseif($jobseeker_id != null) {

             $this->load->view('fontend/layout/new_seeker_header.php');

        } elseif($emp_id != null) {

             $this->load->view('fontend/layout/employee_header.php');
    

    }else
    {
      $this->load->view('fontend/layout/header.php');
    }
    // $this->load->view('fontend/layout/new_seeker_header.php');

?>
<style>
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
  margin-top:75px;
  }
  .card div {
  background: #FFF;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  border-radius: 13px;
  height: auto;
  }
  .card .back {
  background: #222;
  -webkit-transform: rotateX(180deg);
  transform: rotateX(180deg);
  }
  input {
  display: none;
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
  .front{padding:11px;height:264px;}
  .job-info {
  margin-left: 55px;
  margin-top:-4px;
  }
  li.left-title {
  list-style-type: none;
  float: left;
  font-size: 12px;
  font-weight: 100;
  width:105px;
  height:15px;
  }
  li.right-title {
  list-style-type: none;
  font-size: 12px;
  font-weight: 100;
  width:310px;
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
  margin-top:10px;
  float:right;}
  .detail-btn:hover{
  background-color:#107773;
  transition:0.8s; 
  }
  .following-info {
  float: left;
  line-height:24px;
  }
  .following-info2 {
  margin-left:256px;
  line-height:24px;
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
  margin-top: -46px;
  line-height:24px;
  }
  .skils_benifit {
  margin-top: 25px;
  list-style-type: none;
  }
  li.left-title_seperate {
  float: left;
  width: 58px;
  font-size: 13px;
  color: #3c3c3c;
  }
  :checked + span {
  background: #18c5bd !important;
  display: inline-block;
  width: 100%;
  color: #fff;
  padding: 4px 15px;
  border-radius: 30px;
  cursor:pointer;
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
  .left-title_detail{
  width: 152px;
  font-size: 13px;
  list-style-type: none;
  float:left;
  height:auto;
  }
  .right-title_detail{width:100%;list-style-type:none;}
  button.back_btn {
  padding: 5px 35px;
  border-radius: 30px;
  border: none;
  background-color: #18c5bd;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  }
  button.back_btn:hover{
  background-color: #11a59e;
  box-shadow: 2px 2px 3px #ceccccba;
  transition:0.5s;
  }
  button.edit_btn {
  padding: 5px 35px;
  border-radius: 30px;
  border: none;
  background-color: #18c5bd;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  margin-left: 10px;
  } 
  button.edit_btn:hover{
  background-color: #11a59e;
  box-shadow: 2px 2px 3px #ceccccba;
  transition:0.5s;
  } 
  button.Postjob_btn {
  padding: 5px 35px;
  border-radius: 30px;
  border: none;
  background-color: #18c5bd;
  color: #fff;
  font-size: 13px;
  font-weight: 600;
  margin-left:10px;
  }
  button.Postjob_btn:hover{
  background-color: #11a59e;
  box-shadow: 2px 2px 3px #ceccccba;
  transition:0.5s;
  } 
  .preview_btns {
  text-align: end;
  margin: 20px 0px 0px 0px;
  }
  li.right-title_seperate {
  margin-left: 58px;
  }
  span.select2-results {
  margin-top: 30px;
  }
  p.right-title_detail {
  white-space: pre-wrap;
  }
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: 700;
    font-size: 11px;
}
</style>
<div class="container-fluid main-d">
  <div class="container">
    <div class="col-md-12">
     <?php 
           if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_menu.php');

            }

          elseif($jobseeker_id != null) 
          {

               $this->load->view('fontend/layout/seeker_left_menu.php');

          } elseif($emp_id != null) 
          {

               $this->load->view('fontend/layout/employer_menu.php');
      
          }else
          {
            $this->load->view('fontend/layout/employer_menu.php');
          }
               // $this->load->view('fontend/layout/seeker_left_menu.php'); 
        ?>
      <div class="col-md-9">
        <div class="card">
          <form action="#" method="post">
            <div class="front">
              <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($singlejob->company_id);?>" style="height:40px; width:40px;border-radius:5px;float:left" />
              <div class="job-info">
                <p class="job_title"><?php echo $singlejob->job_title; ?></p>
              </div>
              <div class="icon-info">
                <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
                <li class="right-icon-title"> &emsp;<?php echo $singlejob->city_id; ?></li>
                <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
                <li class="right-title" style="width:100%;font-size:14px;"> &emsp;<?php echo $singlejob->experience;?> Years (Desired Experience)</li>
                <div class="clear"></div>
              </div>
              <div class="following-info">
                <li class="left-title">Education Level</li>
                <li class="right-title">&nbsp; : <?php echo $singlejob->education_level_name; ?></li>
                <li class="left-title">Job Role</li>
                <li class="right-title">&nbsp; : <?php echo $singlejob->job_role_title; ?></li>
                <div class="clear"></div>
              </div>
              <div class="following-info2">
                <li class="left-title">Engagement Type</li>
                <li class="right-title">&nbsp; : <?php echo $singlejob->job_nature_name; ?></li>
                <li class="left-title">No. of Positions</li>
                <li class="right-title"> &nbsp; : <?php echo $singlejob->no_jobs; ?></li>
                <div class="clear"></div>
              </div>
              <div class="following-info3">
                <li class="left-title">JD attached &nbsp;<i class="fas fa-link"></i></li>
                <li class="right-title">
                  &nbsp; : <?php if (isset($singlejob->jd_file) && !empty($singlejob->jd_file)) {
                    echo "Yes"; ?>
                  <!-- <a href="<?php echo base_url() ?>upload/job_description/<?php echo $jd_file; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $singlejob->jd_file; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a>
                  <?php   }else{
                    echo "No";
                    } ?> 
                </li>
                <li class="left-title">Yearly Salary (<?php  $currency = $this->session->userdata('currency'); if (isset($currency) && !empty($currency)) {
                  $locale='en-US'; //browser or user locale
                   // $currency='JPY';
                   $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
                   $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                   header("Content-Type: text/html; charset=UTF-8;");
                      echo $symbol;echo $symbol;
                  } ?> Lakh)</li>
                <li class="right-title">&nbsp; : <?php echo $singlejob->salary_range; ?></li>
                <div class="clear"></div>
              </div>
              <div class="skils_benifit">
                <li class="left-title_seperate"style="margin-top: 3px;font-weight: 600;">skills &nbsp;&nbsp; </li>
                <li class="right-title_seperate">: 
                  <?php  $sk=$singlejob->skills_required;
                    if (isset($sk) && !empty($sk)) {
                       $where_sk= "id IN (".$sk.") AND status=1";
                     $select_sk = "skill_name ,id";
                     $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                     if(!empty($skills)){ 
                             foreach($skills as $skill_row){
                              ?>
                  <label>
                  <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                  <span><?php echo $skill_row['skill_name']; ?></span>
                  </label>
                  <?php } }}?>
                </li>
              </div>
              <div class="skils_benifit">
                <li class="left-title_seperate"style="margin-top: 3px;font-weight: 600;">Benefits</li>
                <li class="right-title_seperate">
                   &nbsp;: 
                  <?php
                    $benefits = explode(',', $singlejob->benefits);
                    foreach ($benefits as $row) { ?>
                  <label>
                  <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                  <span><?php echo $row; ?></span>
                  </label>
                  <?php } ?>
                  <!-- <label>
                    <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                    <span>Insurance</span>
                    </label>
                    <label>
                    <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                    <span>Insurance</span>
                    </label> -->
                </li>
              </div>
              <hr>
              <div class="job_dis">
                <li class="left-title_detail" >Detailed Job Description  : </li>
                <br>
                <p class="right-title_detail"><?php echo $singlejob->job_desc; ?></p>
              </div>
              <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
              <div class="preview_btns">
               <?php  
               $job_post_id = $singlejob->job_post_id;
                $company_id = $singlejob->company_profile_id;
                           
                  if ($this->job_apply_model->check_apply_job($jobseeker_id, $company_id, $job_post_id)) { ?>

                <a href="#" ><button class="apply-cv" id="b3">Applied</button></a>
                    
               
                 <?php    }else{ ?>
                
               <a href="#" data-toggle="modal" data-target="#ApplyJob"><button class="apply-cv" id="b3">Apply with Ocean CV</button></a>
             <?php } ?>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="ApplyJob" class="modal fade" role="dialog">
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
                   
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">User Name:</label>
            <div class="col-sm-8">
              <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder=""

                   value="<?php if(!empty($jobseeker_id)){ echo $this->Job_seeker_model->jobseeker_name($jobseeker_id);} ?>">
            </div>
          </div>
          <input type="hidden" name="job_seeker_id" value="<?php echo $jobseeker_id ?>">
          <input type="hidden" name="job_post_id" value="<?php echo $singlejob->job_post_id; ?>">
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Company Name:</label>
            <div class="col-sm-8">
              <input type="text" name="js_career_salary" disabled="" class="form-control" id="js_career_salary" placeholder="" value="<?php $company_id=$singlejob->company_profile_id;
                         echo $this->company_profile_model->company_name($company_id);?>">
            </div>
          </div>
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>">
         <!--  <div class="form-group">
            <label class="control-label col-sm-4" for="email"> Expected Salary:</label>
            <div class="col-sm-8">
              <input type="text" name="expected_salary" required class="form-control" id="avaliable" placeholder="Expected Salary"

                   >
            </div>
          </div> -->
         <?php if(!empty($forward_status)){ foreach($forward_status as $frow){
            $m_para = explode(',',$frow['mandatory_parameters']);
          } }
          foreach ($m_para as $row) { 
            $name = explode('_', $row);
            $para_name = ucfirst($name[0]).' '.ucfirst($name[1]);
            ?>
           <div class="form-group">
            <label class="control-label col-sm-4" for="email"> <?php echo  $para_name; ?>:</label>
            <div class="col-sm-8">
              <input type="text" name="<?php echo $row; ?>" required class="form-control" id="avaliable" placeholder="<?php echo  $para_name; ?>"

                   >
            </div>
          </div>
         <?php }

          ?>
        
          <?php $test=$singlejob->is_test_required;
            if ($test=='Yes') {
          ?>
          <div><b>Note: This job has a Online Test.</b></div>
          <div class="panel-body"></div>
        <?php }else{} ?>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
<?php 
  $company_profile_id = $this->session->userdata('company_profile_id');
  
   $this->load->view('fontend/layout/employer_new_header.php');
   
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
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <div class="col-md-9">
        <div class="card">
          <form action="<?php echo base_url() ?>employer/job_post" method="post">
            <div class="front">
              <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Rivian_company_logo.jpg" style="height:40px; width:40px;border-radius:5px;float:left" />
              <div class="job-info">
                <p class="job_title"><?php echo $job_title; ?></p>
              </div>
              <div class="icon-info">
                <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
                <li class="right-icon-title"> &emsp;<?php echo $city_id; ?></li>
                <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
                <li class="right-title" style="width:100%;font-size:14px;"> &emsp;<?php echo $experience; ?> Years (Desired Experience)</li>
                <div class="clear"></div>
              </div>
              <div class="following-info">
                <li class="left-title">Education Level</li>
                <li class="right-title">&nbsp;:<?php echo $education['education_level_name']; ?></li>
                <li class="left-title">Job Role</li>
                <li class="right-title">&nbsp;: <?php echo $job_role['job_role_title']; ?></li>
                <div class="clear"></div>
              </div>
              <div class="following-info2">
                <li class="left-title">Engagement Type</li>
                <li class="right-title">&nbsp;:<?php echo $job_nature['job_nature_name']; ?></li>
                <li class="left-title">No. of Positions</li>
                <li class="right-title">&nbsp;:<?php echo $no_jobs; ?></li>
                <div class="clear"></div>
              </div>
              <div class="following-info3">
                 <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:<?php 
                if ($is_test_required == 'Yes' && empty($test_for_job)) { echo $is_test_required;  ?>
                  <sup><span title="Marked yes but test is not attached" class="required">*</span></sup>
             <?php  } elseif ($is_test_required == 'Yes' && !empty($test_for_job)) { ?>
               <a style="margin-left: 15px" title="<?php echo $test_name ?>" href="<?php echo base_url() ?>employer/show_test_details/<?php echo base64_encode($test_for_job); ?>/" >Yes</a>
            <?php }else{echo $is_test_required; } ?> </li>
                <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>
                <li class="right-title">
                  &nbsp;: <?php if (isset($jd_file) && !empty($jd_file)) {
                    echo "Yes"; ?>
                  <!-- <a href="<?php echo base_url() ?>upload/job_description/<?php echo $jd_file; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> -->
                  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $jd_file; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a>
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
                <li class="right-title">&nbsp;: <?php echo $salary_range; ?></li>
                <div class="clear"></div>
              </div>
              <div class="skils_benifit">
                <li class="left-title_seperate"style="margin-top: 3px;font-weight: 600;">skills&nbsp;&nbsp; </li>
                <li class="right-title_seperate">:
                  <?php  $sk=$skills_required;
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
                    // print_r($benefits);
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
                <li class="left-title_detail" >Detailed Job Description :</li>
                <br>
                <p class="right-title_detail"><?php echo $job_desc; ?></p>
              </div>
              <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
              <div class="preview_btns">
                  <a href="<?php echo base_url() ?>employer/active-job"> <button type="button" class="back_btn">Back</button></a>
               
               
                <?php if (isset($preview)) { ?>
                    <a href=" <?php echo base_url() ?>employer/update_job/<?php echo $job_id; ?>"><button type="button" name="edit" class="edit_btn">Edit</button></a>
               <?php }elseif ($job_status == '0') { ?>
                   <button type="submit" class="Postjob_btn" name="post_preview">Post Job</button>

                     <button type="submit" class="edit_btn" name="edit">Edit</button>


               <?php  }
                else{ ?>
                     <button type="submit" class="Postjob_btn" name="post_preview">Post Job</button>
                     <button type="submit" class="edit_btn" name="edit">Edit</button>
               <?php } ?>
              
             
               
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
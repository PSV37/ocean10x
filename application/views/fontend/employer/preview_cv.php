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
  width:fit-content;
  height:15px;
  }
  li.right-title {
  list-style-type: none;
  font-size: 12px;
  font-weight: 100;
  width:310px;
  }
  .icon-info {
  margin-left: 60px;
  margin-bottom: 60px;
  width: fit-content;
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
  line-height:30px;
  }
  .following-info2 {
  margin-left:256px;
  line-height:30px;
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
  margin-top: -123px;
  line-height: 30px;
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
  section {
  padding-bottom: 40px;
  }
  .card .card-header {
  cursor: pointer;
  }
  .card {
  overflow: hidden;
  margin-top: 60px;
  }
  button.btn.btn-primary {
  /*float: right;*/
  background-color: #18c5bd;
  border: none;
  border-radius: 35px;
  margin-top: 13px;
  font-size: 12px;
  font-weight: 600;
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
                <p class="job_title"><?php echo $cv_bank_data['js_name']; ?></p>
              </div>
              <div class="icon-info">
                <li class="left-icon-title"><i class="fa fa-envelope"></i></li>
                <li class="right-icon-title"> &emsp;<?php echo $cv_bank_data['js_email']; ?></li>
                <li class="left-icon-title"><i class="fa fa-phone-alt"></i></li>
                <li class="right-icon-title"> &emsp;<?php echo $cv_bank_data['js_mobile']; ?></li>
                <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
                <li class="right-icon-title"> &emsp;<?php echo $cv_bank_data['js_experience']; ?> years</li>

                <div class="clear"></div>
              </div>
              <div class="following-info">
                 <li class="left-title">Current Location</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['js_current_work_location']; ?></li>
                <li class="left-title">Education</li>
                <li class="right-title">&nbsp;:<?php echo $cv_bank_data['education_level_name']; ?></li>
                <li class="left-title">Designation</li>
                <li class="right-title">&nbsp;: <?php echo $cv_bank_data['js_current_designation']; ?></li>
                <li class="left-title">Current Location</li>
                <li class="right-title">&nbsp;: <?php echo $cv_bank_data['js_current_work_location']; ?></li>
                <div class="clear"></div>
              </div>
              <div class="following-info2">
                <li class="left-title">Current CTC</li>
                <li class="right-title">&nbsp;:<?php echo $cv_bank_data['js_current_ctc']; ?></li>
                <li class="left-title">Notice Period</li>
                <li class="right-title">&nbsp;:<?php echo $cv_bank_data['js_current_notice_period']; ?></li>
                <li class="left-title">Desired Location</li>
                <li class="right-title">&nbsp;: <?php echo $cv_bank_data['js_desired_work_location']; ?></li>
                 <li class="left-title">Resume attached&nbsp;<i class="fas fa-link"></i></li>
                <li class="right-title">
                  &nbsp;: <?php if (isset($cv_bank_data['js_resume']) && !empty($cv_bank_data['js_resume'])) {
                    echo "Yes"; ?>
                  <a href="<?php echo base_url() ?>upload/job_description/<?php echo $jd_file; ?>" target="_blank"><i class="fa fa-file" aria-hidden="true"></i></a> 
                  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/Resumes/<?php echo $cv_bank_data['js_resume']; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a>
                  <?php   }else{
                    echo "No";
                    } ?> 
                </li>
                 
                <div class="clear"></div>
              </div>
              <div class="following-info3">
                 <li class="left-title">SkypeID</li>
                 <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_bank_data['skypeid']; ?></li>
               <li class="left-title">Last Hike</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['js_last_salary_hike']; ?></li>
                <li class="left-title">Expected CTC (LPA)</li>
                <li class="right-title">&nbsp;: <?php echo $cv_bank_data['js_expected_salary']; ?></li>
                <li class="left-title">Current Organization</li>
                <li class="right-title">&nbsp;: <?php echo $cv_bank_data['current_org']; ?></li>
                <div class="clear"></div>
              </div>
              <br>
              <div class="skils_benifit">
                <li class="left-title_seperate"><b>skills</b>&nbsp;&nbsp; </li>
                <li class="right-title_seperate">:
                  <?php  $skills=explode(',',$cv_bank_data['js_skill_set']);
                    if(!empty($skills)){ 
                            foreach($skills as $skill_row){
                             ?>
                  <label>
                  <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                  <span><?php echo $skill_row; ?></span>
                  </label>
                  <?php } }?>
                </li>
              </div>
              <hr>
              <?php if (isset($js_details) && !empty($js_details)) { ?>
              <!-- EXPERIENCE --------------------------------------------->
              <h3>Experience</h3>
              <section id="experience" class="container">
                <?php  foreach ($js_details as $row) { ?>
                <div class="card" style="max-width: 68%;border: none;margin-top: 10px;">
                  <div class="card-header collapse show" data-toggle="collapse" data-target="#exp1">
                    <div class="row" style="display: inline-flex;width: 100%">
                      <h5 class="col-md-8 mb-0"><b><?php echo $row['designation_name']; ?></b></h5>
                      <em class="col-md-4 text-md-right" >Apr <?php echo $row['start_date']; ?> - <?php echo $row['end_date']; ?></em>
                    </div>
                  </div>
                  <div class="card-block collapse" id="exp1">
                    <h5><b>Organization</b></h5>
                    <p>
                      <?php echo $row['company_profile_id']; ?>
                    </p>
                    <h5><b>Responsibilities</b></h5>
                    <p>
                      <?php echo $row['responsibilities']; ?>
                    </p>
                    <h5><b>Achievements</b></h5>
                    <p>
                      <?php echo $row['achievement']; ?>
                    </p>
                    <!--  <p>
                      Capitalized on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.
                      </p> -->
                  </div>
                </div>
                <?php } ?>
              </section>
              <?php } 
                else
                { ?>
              <p>There is no Experience Details Available to display.. </p>
              <?php  }
                $cv_id =$cv_bank_data['cv_id'];
                $where="forwarded_jobs_cv.cv_id ='$cv_id'";
                $join = array('job_posting'=>'job_posting.job_post_id = forwarded_jobs_cv.job_post_id');
                $jobs_data = $this->Master_model->getMaster('forwarded_jobs_cv', $where , $join, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false); ?>
              <button  class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Forwarded Jobs list
              </button>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card-body">
                  <?php $i=1; if (!empty($jobs_data)) {
                    # code...
                    foreach ($jobs_data as $row) { ?>
                  <p><?php echo $i; ?>.  <?php echo $row['job_title']; ?> - Job Post sent on <?php echo date('d-m-y H:i',strtotime($row['created_on'])) ; ?>
                    <?php $i++;  } } ?>
                </div>
              </div>
              <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
              <div class="preview_btns">
                <a href="<?php echo base_url() ?>employer/corporate-cv-bank"><button type="button"   class="back_btn">Back</button></a>
                <!--  <button type="submit" name="edit" class="edit_btn">Edit</button>
                  <?php if (isset($preview)) {
                    # code...
                    }else{ ?>
                       <button type="submit" class="Postjob_btn" name="post_preview">Post Job</button>
                  <?php } ?> -->
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
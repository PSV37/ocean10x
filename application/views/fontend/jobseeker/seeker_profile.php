<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
  /*use-itty-bitty-template*/
  /*.formpanel {background: #ececec;}*/
  h1, h2, h4, h5 {
    /*border-bottom: 1px solid #ccc;*/
    /*color: #3F51B5;*/
    padding-bottom: 10px
  }

  .listFlex {display: flex; /*justify-content: center;*/}

  img {
    width: 15%;
  }
  .career{
    border-radius: 6px;
    /*background: #cbced247;*/
    margin: 2px;
    padding: 15px;
  }
  .tag_line{
    text-align: unset !important;
  }
  .title-career{
    font-size: 20px;
    font-style: bold;
  }
</style>
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="job-header">
          <div class="contentbox">
            <div class="formpanel">
              <?php 
              // echo "<pre>"; 

             // print_r($skill_data);
              // print_r($exp_data);
              // print_r($personal_data);

              ?>
              <?php echo $this->session->flashdata('change_password'); ?>
                <h2 align="center">Personal Profile</h2>
                <img src="<?php echo base_url() ?>upload/<?php echo $intro_data['photo_path'];?>" alt="profile-picture" border="0" class="img img-thumbnail">
                <h3><?php echo $intro_data['full_name']; ?> </h3>
                <p><?php echo $personal_data['city_name'].', '.$personal_data['state_name'].', '.$personal_data['country_name']; ?></p>
                <hr>
                 <h4>About Me</h4>
                 <p><?php echo $intro_data['about_me']; ?></p>
                <hr>
                 <h4>Skills</h4>
                 <div class="listFlex">
                  <?php if (!empty($skill_data)): foreach ($skill_data as $sk_row) : ?>
                      <div>
                        <ul>
                          <li><?php echo $sk_row['skills']; ?></li>
                        </ul>
                      </div>
                  <?php endforeach;  ?>
                  <?php else : ?> 
                    <div>
                      <strong>There is no data to display</strong>
                    </div>
                  <?php endif; ?>
                 </div>
                  <hr>
                 <h4>Experience</h4>
                  <div class="row career">
                    <?php if (!empty($exp_data)): foreach ($exp_data as $exp_row) : 
                      if($exp_row['end_date']!='') {
                      $end =  date('M Y', strtotime($exp_row['end_date']));
                     }else{
                       $end = "Present";
                     }
                      ?>
                    <div class="col-md-12">
                      <div class="col-md-1"><i class="fa fa-user" aria-hidden="true"></i></div>
                      <div class="col-md-11">
                        <sapn class="title-career"><b><?php echo $exp_row['designation_id']; ?></b></sapn> <br>
                        <span><?php echo $exp_row['company_profile_id']; ?></span><br>
                        <p class="tag_line"><?php echo date('M Y', strtotime($exp_row['start_date'])).' - '.$end; ?></p><br>
                        <p class="tag_line"><?php echo $exp_row['address']; ?></p><br>
                        <p class="tag_line"><?php echo $exp_row['responsibilities']; ?></p><hr>
                      </div>
                    </div>
                  <?php endforeach;  ?>
                  <?php else : ?> 
                    <div>
                      <strong>There is no data to display</strong>
                    </div>
                  <?php endif; ?>
                    <!-- <div class="col-md-12">
                      <div class="col-md-1"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                      <div class="col-md-11">
                        <span class="title-career"><b>Career Interests</b></span><br><br>
                        <span>Let recruiters know you’re open: <a href="#">Off</a></span><br> 
                        <p class="tag_line">Choose the types of opportunities you’d like to be connected with</p><hr>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="col-md-1"><i class="fa fa-money" aria-hidden="true"></i></div>
                      <div class="col-md-11">
                        <span class="title-career"><b>Salary Insights</b></span><br><br>
                        <p class="tag_line">See how your salary compares to others in the community</p><hr>
                      </div>
                    </div><br><hr> -->
                  </div>


                 <!-- Catch me on Twitter - <a href="https://twitter.com/DanEnglishby">@DanEnglishby</a> -->
                 <hr>
            </div><!-- end post-padding -->
          </div>
        </div>

       
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>

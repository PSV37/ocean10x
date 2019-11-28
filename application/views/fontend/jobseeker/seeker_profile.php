<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
  /*use-itty-bitty-template*/
  /*.formpanel {background: #ececec;}*/
 h2, h4, h5 {
    border-bottom: 1px solid #ccc;
    /*color: #3F51B5;*/
    padding-bottom: 10px
  }

  .listFlex {display: flex; justify-content: center;}

  img {
    width: 15%;
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
              // echo "<pre>"; print_r($intro_data);   
             // print_r($skill_data);
              print_r($exp_data);
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
                 <h4>Experience</h4>
                 <!-- Catch me on Twitter - <a href="https://twitter.com/DanEnglishby">@DanEnglishby</a> -->
              
            </div><!-- end post-padding -->
          </div>
        </div>

       
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>


<div class="section lb">
  <div class="container">                                
                         
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount">
          <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
        <hr>
          <?php echo $this->session->flashdata('msg'); ?>
                  <div id="vsphoto" class="tab-pane fade in">
                    <h5>Profile Summary</h5>
                    
                    <?php echo $this->session->flashdata('msg'); ?>
                    <?php if(!empty($error)){echo $error;};?>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="containe1r">

                          <form class="avatar-form" action="<?php echo base_url();?>Job_seeker/profile_summary/<?php if(!empty($job_seeker_profile['id'])){echo $job_seeker_profile['id'];} ?>" enctype="multipart/form-data" method="post">
                            <!-- <input type="hidden" name="prof_id" value="<?php if(!empty($job_seeker_profile['id'])){echo $job_seeker_profile['id'];} ?>"> -->
                          
                              <div class="col-md-12">
                                <!-- <label for="avatarInput">Upload Resume</label> -->
                              <textarea name="profile_summary" id="profile_summary" class="form-control" placeholder="Profile Summary"><?php if(!empty($job_seeker_profile['about_me'])){echo $job_seeker_profile['about_me'];} ?></textarea>
                              </div>

                              <div class="panel-body"></div>
                              <p>Write a meaningful summary of more than 50 characters.</p><br>
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block avatar-save2">Save</button>

                              </div>
                           
                          </form>

                        </div>
                                                  
                      </div>
                      
                    </div>
                  </div>
                             
        </div><!-- end col -->
      </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->
</div>
  
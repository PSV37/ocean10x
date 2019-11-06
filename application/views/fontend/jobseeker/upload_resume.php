
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
            <h5>Your Profile Picture</h5>
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="row">
              <div class="col-md-4">
                <div class="containe1r">
  
                  <form class="avatar-form" action="<?php echo base_url('Job_seeker/save_photo');?>/<?php if(!empty($job_seeker_photo->js_photo_id)){echo $job_seeker_photo->js_photo_id;} ?>" enctype="multipart/form-data" method="post">
                   
                  
                      <div class="avatar-body">

                        <!-- Upload image and data -->
                        <div class="avatar-upload">
                          <input type="hidden" class="avatar-src" name="avatar_src">
                          <input type="hidden" class="avatar-data" name="avatar_data">
                          <label for="avatarInput">Upload Photo</label>
                          <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                        </div>

                        <!-- Crop and preview -->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="avatar-wrapper"></div>
                            <div class="dragtxt">Drag frame to adjust portrait.</div>
                          </div>
                          <div class="col-md-3">
                            <div class="avatar-preview preview-lg"></div>
                            <p>Must be an actual picture of you! Logos, clip-art, group pictures, and digitally-altered images not allowed.</p>
                          </div>
                        </div>

                        <div class="row avatar-btns">
                          <div class="col-md-9">
                          </div>
                          <div class="col-md-3">
                            <button type="submit" class="btn btn-primary btn-block avatar-save2">Save Photo</button>
                          </div>
                        </div>
                      </div>
                    
                  </form>

                </div>
                                          
              </div>
              <div class="col-md-8">
                          
                <?php if(!empty($error)){
                  echo $error;
                  };?>
                <?php if($job_seeker_photo->photo_path==""){
                      echo "Please Upload Your Photo ";
                  } ?>
                <div class="formpanel">
                  <h4>Please Upload Your Photo Max Size 300*300 pixel</h4><br>
                 	<a href="#." onClick="runit();" class="btn">Click here to Upload Photo</a>
                </div>
              </div>
            </div>
          </div>
                             
                         
              </div><!-- end col -->
          </div><!-- end row -->  
      </div><!-- end container -->
  </div><!-- end section -->

</div>
  
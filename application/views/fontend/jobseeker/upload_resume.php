
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
            <h5>Attach Your Resume</h5>
            
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">

                  <form class="avatar-form" action="<?php echo base_url('Job_seeker/save_attached_resume');?>" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="resume_id" value="<?php if(!empty($job_seeker_resume['id'])){echo $job_seeker_resume['id'];} ?>">
                      <!-- Upload image and data -->
                    <div class="col-md-6">
                      <div class="col-md-12">
                        <label for="avatarInput">Current Resume</label>
                        <p>"<?php if(!empty($job_seeker_resume['resume'])){echo $job_seeker_resume['resume'];} ?></p>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- Upload image and data -->
                      <div class="col-md-12">
                        <label for="avatarInput">Upload Resume</label>
                        <input type="file" class="form-control" id="txt_resume" name="txt_resume">

                        <input type="hidden" class="form-control" id="" name="oldresume" value="<?php if(!empty($job_seeker_resume['resume'])){echo $job_seeker_resume['resume'];} ?>">
                      </div>
                      <div class="panel-body"></div>
                      <div class="col-md-12">
                        <button type="submit" class="btn btn-success btn-block avatar-save2">Upload Resume</button>
                      </div>
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
  
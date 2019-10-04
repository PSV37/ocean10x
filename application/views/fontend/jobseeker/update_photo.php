<link rel="stylesheet" href="<?php echo base_url('asset/crop/dist/cropper.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/crop/css/main.css');?>">

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
                                          
                                          <div class="containe1r" id="crop-avatar">

    <!-- Current avatar -->
    <div class="avatar-view" title="Change the Photo">
      <img src="<?php echo base_url() ?>upload/<?php if(!empty($job_seeker_photo->photo_path)) { echo $job_seeker_photo->photo_path;} else { echo "image-notfound.png";} ?>" alt="Photo">
    </div>

    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="<?php echo base_url('Job_seeker/save_photo');?>/<?php if(!empty($job_seeker_photo->js_photo_id)){echo $job_seeker_photo->js_photo_id;} ?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Photo</h4>
            </div>
            <div class="modal-body">
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
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
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
                            
                            
                            
                            
                            
                            <!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->

</div>
  
  
  
  <!-- Popup Modal-->
  <div id="addPhotomy" class="modal" role="dialog">
  <div class="modal-dialog" style="width:800px;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Photo</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
        	<div class="col-md-8">
            <div class="previewbox">
            <form class="form-inline" action="<?php echo base_url(); ?>job_seeker/save_photo/<?php if(!empty($job_seeker_photo->js_photo_id)){echo $job_seeker_photo->js_photo_id;} ?>" method="post" enctype="multipart/form-data" onsubmit="return checkCoords();">
                          <div class="formrow">
                            <label class="" for="email">Upload Image:
                            <input type="file" class="form-control" id="photo_path"  name="photo_path" value="<?php if(!empty($job_seeker_photo->photo_path)){
                              echo $job_seeker_photo->photo_path;
                              } ?>">
                            </label>
                          </div>
                          <br>
                           <img src="" id="cropbox" />
                           <input type="hidden" id="x" name="x" />
                        <input type="hidden" id="y" name="y" />
                        <input type="hidden" id="w" name="w" />
                        <input type="hidden" id="h" name="h" />
                          <br />
                          <button type="submit" class="btn btn-default">Save Photo</button>
                        </form>
            </div>
            </div>
            <div class="col-md-4">
            	<div class="preview"><img src="" id="preview" /></div>
            </div>
        </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
$("#photo_path").change(function(){
    readURL(this);
	
	
	setTimeout(function(){ 
	 $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });
}, 1000);
	
});

function runit(){
	$('.avatar-view').click();	
}
</script>

<script src="<?php echo base_url('asset/crop/dist/cropper.min.js');?>"></script>
  <script src="<?php echo base_url('asset/crop/js/main.js');?>"></script>
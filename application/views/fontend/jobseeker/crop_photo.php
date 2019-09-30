<?php 
//phpinfo(); exit;
    $this->load->view('fontend/layout/seeker_header.php');
?>      
  

        
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Crop Photo</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Crop Photo</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

          <div class="section lb">
                <div class="container">
                    <div class="row">
                      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                            <div class="userccount">
                                  <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                            <h5>
                      Your Profile Picture                 
                            </h5>
                                  <?php echo $this->session->flashdata('msg'); ?>
                            <div class="row">
                              
                            <div class="col-md-12">
              
              <?php if(!empty($error)){
                echo $error;
                };?>
              <?php if($job_seeker_photo->photo_path==""){
                    echo "Please Upload Your Photo ";
                } ?>
                <div class="formpanel">
               <img src="<?php echo  base_url('upload/'.$job_seeker_photo->photo_path);?>" id="cropbox" />
             <form class="form-inline" action="<?php echo base_url(); ?>job_seeker/save_cropped_photo/<?php if(!empty($job_seeker_photo->js_photo_id)){echo $job_seeker_photo->js_photo_id;} ?>" method="post" enctype="multipart/form-data"  onsubmit="return checkCoords();">
              <div class="formrow">
                <input type="hidden" id="file_name" name="file_name" value="<?php echo $job_seeker_photo->photo_path;?>" />
                <input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
            
              </div>
              <br>
              <button type="submit" class="btn btn-default">Save Photo</button>
            </form>
            </div>
            </div>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


  

 <?php $this->load->view("fontend/layout/footer.php"); ?>
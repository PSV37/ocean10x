<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
             

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <?php print_r($skill_data); ?>
      <div class="content col-md-9">
        <div class="userccount">
          <div class="formpanel">
            <?php echo $this->session->flashdata('change_password'); ?>
            <form id="submit" class="submit-form" action="<?php echo base_url(); ?>employer/change_password" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <label class="control-label ">Skill Name<span class="required">*</span> </label>
                  <select name="skill_name" id="skill_name" required class="form-control industry" data-style="btn-default" data-live-search="true">
                    <option value="">Select Skill</option>
                    <?php if(!empty($skill_data)) foreach ($skill_data as $svalue) { ?>
                      <option value="<?php echo $svalue['id']; ?>"><?php echo $svalue['skill_name']; ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                <div class="col-md-6 col-sm-12">
                  <label class="control-label ">Topics<span class="required">*</span> </label>
                  <select name="topics" id="skill_name" required class="form-control industry" data-style="btn-default" data-live-search="true">
                    <option value="">Select Topics</option>
                    <?php if(!empty($skill_data)) foreach ($skill_data as $svalue) { ?>
                      <option value="<?php echo $svalue['id']; ?>"><?php echo $svalue['skill_name']; ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                  <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
              </div>
            </form>
          </div><!-- end post-padding -->
        </div>
      </div>

    </div> <!--end row -->
  </div><!-- end container -->
</div><!-- end section -->


  
 <?php $this->load->view("fontend/layout/footer.php"); ?>
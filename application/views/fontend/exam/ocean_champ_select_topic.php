<?php 
$this->load->view('fontend/layout/seeker_header.php');
?>
<style>
  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    color: #463d3d !important;
    text-decoration: none !important;
    outline: 0 !important;
}
</style>                
             
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount">
          <div class="formpanel">
            <?php echo $this->session->flashdata('msg'); ?>
        
            <form id="submit" class="submit-form" action="<?php echo base_url(); ?>exam/ocean_champ_test" method="post">
              <div class="row">
                <h5>System recommended</h5>
                <div class="col-md-6 col-sm-12">
                  <label class="control-label">Subject<span class="required">*</span> </label>
                  <select name="skill_name" id="skill_name" required class="form-control skill" data-style="btn-default" data-live-search="true" >
                    <option value="">Select Skill</option>
                    <?php if(!empty($skill_data)) foreach ($skill_data as $svalue) { ?>
                      <option value="<?php echo $svalue['id']; ?>"><?php echo $svalue['skill_name']; ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                 <div class="col-md-6 col-sm-12">
                  <label class="control-label ">Level<span class="required">*</span> </label>
                  <select name="level" id="level" required class="form-control">
                    <option value="">Select Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Medium">Medium</option>
                    <option value="Expert">Expert</option>
                  </select>
                </div>
                <div class="col-md-12 col-sm-12">
                  <label class="control-label ">Topics<span class="required">*</span> </label>
                  <div id="topic"></div>
                 
                </div>
                  <button id="next" type="submit" class="btn btn-primary pull-right">Next</button>
              </div>
            </form>
        </div><!-- end post-padding -->

        <div class="formpanel">
            <?php echo $this->session->flashdata('msg'); ?>
        
            <form id="submit" class="submit-form" action="<?php echo base_url(); ?>exam/ocean_champ_additional" method="post">
              <div class="row">
                <h5>Additional</h5>
                <div class="col-md-6 col-sm-12">
                  <label class="control-label">Subject<span class="required">*</span> </label>
                  <select name="add_skill_name" id="add_skill_name" required class="form-control skill" data-style="btn-default" data-live-search="true" >
                    <option value="">Select Skill</option>
                    <?php if(!empty($add_skill_data)) foreach ($add_skill_data as $value) { ?>
                      <option value="<?php echo $value['id']; ?>"><?php echo $value['skill_name']; ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                 <div class="col-md-6 col-sm-12">
                  <label class="control-label ">Level<span class="required">*</span> </label>
                  <select name="add_level" id="add_level" required class="form-control">
                    <option value="">Select Level</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Medium">Medium</option>
                    <option value="Expert">Expert</option>
                  </select>
                </div>
                <div class="col-md-12 col-sm-12">
                  <label class="control-label ">Topics<span class="required">*</span> </label>
                  <div id="add_topics"></div>
                 
                </div>
                  <button id="next" type="submit" class="btn btn-primary pull-right">Next</button>
              </div>
            </form>
        </div><!-- end post-padding -->
      </div>
    </div>

  </div> <!--end row -->
</div><!-- end container -->
</div><!-- end section -->


  
<?php $this->load->view("fontend/layout/footer.php"); ?>
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>

<script>
  $("#skill_name").select2( {
    placeholder: "Select Skill",
    allowClear: true
  });

  $(document).delegate('#skill_name', 'change', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var id = $(this).val();
      $.ajax({
            url:'<?php echo base_url();?>exam/gettopic',
            type: "POST",
            data:{id:id},
            success: function(data)
            {
              $('#topic').html(data);
            }
        });//end ajax
  });

 $(document).delegate('#add_skill_name', 'change', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    var id = $(this).val();
      $.ajax({
            url:'<?php echo base_url();?>exam/gettopic',
            type: "POST",
            data:{id:id},
            success: function(data)
            {
              $('#add_topics').html(data);
            }
        });//end ajax
  });

</script>
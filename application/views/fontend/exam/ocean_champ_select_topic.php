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
            <?php echo $this->session->flashdata('change_password'); ?>
        
            <form id="submit" class="submit-form" action="<?php echo base_url(); ?>exam/save_champdata" method="post">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <label class="control-label ">Subject<span class="required">*</span> </label>
                  <select name="skill_name" id="skill_name" required class="form-control skill" data-style="btn-default" data-live-search="true" onchange="getTopic(this.value)">
                    <option value="">Select Skill</option>
                    <?php if(!empty($skill_data)) foreach ($skill_data as $svalue) { ?>
                      <option value="<?php echo $svalue['id']; ?>"><?php echo $svalue['skill_name']; ?></option>
                    <?php  }
                    ?>
                  </select>
                </div>
                <div class="col-md-6 col-sm-12">
                  <label class="control-label ">Topics<span class="required">*</span> </label>
                  <select name="topics" id="topic" required class="form-control" multiple="">
                    <!-- <option value="">Select Topics</option> -->
                  </select>
                </div>
                 <!--  <button type="submit" class="btn btn-primary">Update Password</button> -->
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
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>

<script>
  $("#skill_name").select2( {
    placeholder: "Select Skill",
    allowClear: true
  });

  // $("#topic").select2( {
  //   placeholder: "Select Topics",
  //   allowClear: true
  // });

  function getTopic(id){
    if(id){
      $.ajax({
        type:'POST',
        url:'<?php echo base_url();?>exam/gettopic',
        data:{id:id},
        success:function(res){
          $('#topic').html(res);
          alert(res);
          // $('#topic').multiselect({
          //   includeSelectAllOption: true
          // });
        }
        
      }); 
    }
  }
</script>
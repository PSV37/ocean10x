<?php 
$company_id=$this->session->userdata('company_profile_id'); 
$emp_id=$this->session->userdata('emp_id');

if ($company_id != null) {?>

 <form id="interview-info" class="form-horizontal" action="<?php echo base_url();?>employer/update_inter_status" method="post">
<?} else{?>

<form id="interview-info" class="form-horizontal" action="<?php echo base_url();?>employee/update_inter_status" method="post">

  <?php }
?>



  <input type="hidden" name="interview_id" id="interview" value="<?php if(!empty($interview_data)) echo $interview_data['id']; ?>">
  <input type="hidden" name="job_id" id="job_id" value="<?php if(!empty($interview_data)) echo $interview_data['job_post_id']; ?>">
  <div class="form-group">
  <div class="col-sm-12">
    <label class="control-label" for="email">Interview Status<span class="required">*</span></label>
    <select  name="interview_status" id="interview_status" class="form-control" required="">
      <option value="">Select Status</option>
      <option value="1"<?php if(!empty($interview_data)) if($interview_data['interview_complete_status']=='1') echo 'selected'; ?>>Completed</option>
      <option value="0"<?php if(!empty($interview_data)) if($interview_data['interview_complete_status']=='0') echo 'selected'; ?>>Not Completed</option>
    </select>

  </div>
  <!-- <div class="col-sm-1"></div> -->
</div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
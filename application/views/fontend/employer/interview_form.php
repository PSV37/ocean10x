<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
  <form id="interview-info" class="form-horizontal" action="<?php echo base_url('employer/update_education');?>" method="post">
      <?php print_r($js_info_data); ?>
     <input type="hidden" name="job_seeker_id" value="<?php if(!empty($js_info_data)) echo $js_info_data['job_seeker_id']; ?>">
      <div class="form-group">
        <div class="col-sm-6">
          <label class="control-label" for="email">Date<span class="required">*</span></label>
          <input type="text" name="interview_date" id="datepicker" class="form-control"> 
        </div>
        <div class="col-sm-3">
           <label class="control-label" for="email">Start Time<span class="required">*</span></label>
           <input type="text" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="col-sm-3">
           <label class="control-label" for="email">End Time<span class="required">*</span></label>
           <input type="text" name="end_time" id="end_time" class="form-control">
        </div>
      </div>
      
      <div class="form-group">
        <!-- <div class="col-sm-1"></div> -->
        <div class="col-sm-12">
          <label class="control-label" for="email">Interview Type<span class="required">*</span></label>
          <input type="radio" name="interview_type" id="interview_type" value="in_person" style="margin: 0 15px;">In-Person
          <input type="radio" name="interview_type" id="interview_type" value="phone" style="margin: 0 15px;">Phone
          <input type="radio" name="interview_type" id="interview_type" value="video" style="margin: 0 15px;">Video
        </div>
        <!-- <div class="col-sm-1"></div> -->
      </div>
      
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email">Interview Address<span class="required">*</span></label>
          <input type="text" name="interview_address" class="form-control" id="interview_address">
        </div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email">Message To <?php  if(!empty($js_info_data)) echo $js_info_data['full_name'];?><span class="required">*</span></label>
         
          <textarea class="form-control" name="message" id="message" rows="5"></textarea>

        </div>
      </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Send Invitation</button>
    </div>
  </form>
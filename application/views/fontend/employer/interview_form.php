<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
#start_time,#end_time{
  line-height: 15px !important; 
}
</style>
  <form id="interview-info" class="form-horizontal" action="<?php echo base_url();?>employer/send_interview_invitation/<?php if(!empty($js_apply_data)) echo $js_apply_data['job_apply_id']; ?>" method="post">
      
      <input type="hidden" name="interview_id" value="<?php if(!empty($interview_data)) echo $interview_data['id']; ?>">
      <div class="form-group">
        <div class="col-sm-6">
          <label class="control-label" for="email">Date<span class="required">*</span></label>
          <input type="text" name="interview_date" id="datepicker" class="form-control" value="<?php if(!empty($interview_data)) echo date('d-m-Y', strtotime($interview_data['interview_date'])); ?>"> 
        </div>
        <div class="col-sm-3">
           <label class="control-label" for="email">Start Time<span class="required">*</span></label>
           <input type="time" name="start_time" id="start_time" class="form-control" value="<?php if(!empty($interview_data)){ echo $interview_data['start_time'];} else{ echo date('H:i'); } ?>">
        </div>
        <div class="col-sm-3">
           <label class="control-label" for="email">End Time<span class="required">*</span></label>
           <input type="time" name="end_time" id="end_time" class="form-control" value="<?php if(!empty($interview_data)){ echo $interview_data['end_time'];} else{ echo date('H:i'); } ?>">
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email">Interview Type<span class="required">*</span></label>
          <select  name="interview_type" id="interview_type" class="form-control" onchange="changelable(this.value);">
            <option value="In_Person"<?php if(!empty($interview_data)) if($interview_data['interview_type']=='In_Person') echo 'selected'; ?>>In-Person</option>
            <option value="Phone"<?php if(!empty($interview_data)) if($interview_data['interview_type']=='Phone') echo 'selected'; ?>>Phone</option>
            <option value="Video"<?php if(!empty($interview_data)) if($interview_data['interview_type']=='Video') echo 'selected'; ?>>Video</option>
          </select>

        </div>
        <!-- <div class="col-sm-1"></div> -->
      </div>
      
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email" id="interview_label">Interview Address<span class="required">*</span></label>
          <input type="text" name="interview_address" class="form-control" id="interview_address" value="<?php if(!empty($interview_data)) echo $interview_data['interview_details']; ?>">
        </div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email">Message To <?php  if(!empty($js_info_data)) echo $js_info_data['full_name'];?><span class="required">*</span></label>
         
          <textarea class="form-control" name="message" id="message" rows="5"><?php if(!empty($interview_data)) echo $interview_data['message_to_candidate']; ?></textarea>

        </div>
      </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Send Invitation</button>
    </div>
  </form> 

  <script>
    function changelable(type)
      {
        var int_type = type;

        if(int_type=='In_Person')
        {
            $('#interview_label').html('Interview Address<span class="required">*</span>');
        }else if(int_type=='Phone')
        {
            $('#interview_label').html('Interviewers Phone number<span class="required">*</span>');
        }else if(int_type=='Video')
        {
            $('#interview_label').html('Add instructions for the candidate<span class="required">*</span>');
        } 


      }
      $(document).ready(function(){
        function changelableload()
        {
          
          var int_type = $('#interview_type').val();

          if(int_type=='In_Person')
          {
              $('#interview_label').html('Interview Address<span class="required">*</span>');
          }else if(int_type=='Phone')
          {
              $('#interview_label').html('Interviewers Phone number<span class="required">*</span>');
          }else if(int_type=='Video')
          {
              $('#interview_label').html('Add instructions for the candidate<span class="required">*</span>');
          } 


        }
        changelableload();
      });
  </script>
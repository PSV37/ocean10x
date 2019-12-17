
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
      
      <input type="hidden" name="interview_id" value="">
      <!-- <div class="form-group">
        <div class="col-sm-6">
          <label class="control-label" for="email">Date<span class="required">*</span></label>
          <input type="text" name="interview_date" id="datepicker" class="form-control" value=""> 
        </div>
        <div class="col-sm-3">
           <label class="control-label" for="email">Start Time<span class="required">*</span></label>
           <input type="time" name="start_time" id="start_time" class="form-control" value="<?php echo date('H:i');?>">
        </div>
        <div class="col-sm-3">
           <label class="control-label" for="email">End Time<span class="required">*</span></label>
           <input type="time" name="end_time" id="end_time" class="form-control" value="<?php echo date('H:i'); ?>">
        </div>
      </div> -->
    <div class="input-group">
      <button class="btn btn-info btn-xs pull-left add-more" type="button"><i class="fa fa-plus"></i> Suggest multile times</button> <br><br>
      <div class="input-group control-group after-add-more">
      <div>
        <div class="form-group">
          <div class="col-sm-6"> 
            <label class="control-label" for="email">Date<span class="required">*</span></label>
            <input type="text" name="interview_date[]" id="interview_date" class="form-control datepicker" value=""> 
          </div>
          <div class="col-sm-3">  
            <label class="control-label" for="email" onchange="handler(event);">Start Time<span class="required">*</span></label>
            <!-- <input type="time" name="start_time[]" id="start_time" class="form-control" value="<?php echo date('H:i');?>"> -->
             <select class="form-control">
                <?php
                $start = "1:00";
                $end = "24:00";

                $tStart = strtotime($start);
                $tEnd = strtotime($end);
                $tNow = $tStart;

                while($tNow <= $tEnd){?>
                <option value="<?php echo date("H:i A",$tNow); ?>"><?php echo date("H:i",$tNow)."\n"; ?> </option>
                <?php $tNow = strtotime('+30 minutes',$tNow); }?>
            </select>
                  
  
 
          </div>
          <div class="col-sm-3">  
            <label class="control-label" for="email">End Time<span class="required">*</span></label>
            <!-- <input type="time" name="end_time[]" id="end_time" class="form-control" value="<?php echo date('H:i'); ?>"> -->
            <select id="select1" class="form-control"> 
            <!-- <option value="free">Free</option> 
            <option value="basic">Basic</option> --> 
            </select> 
          </div>
        </div>
      </div>
    </div>
  </div>

      
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email">Interview Type<span class="required">*</span></label>
          <select  name="interview_type" id="interview_type" class="form-control" onchange="changelable(this.value);">
            <option value="In_Person">In-Person</option>
            <option value="Phone">Phone</option>
            <option value="Video">Video</option>
          </select>

        </div>
        <!-- <div class="col-sm-1"></div> -->
      </div>
      
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email" id="interview_label">Interview Address<span class="required">*</span></label>
          <input type="text" name="interview_address" class="form-control" id="interview_address" value="">
        </div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-12">
          <label class="control-label" for="email">Message To <?php  if(!empty($js_info_data)) echo $js_info_data['full_name'];?><span class="required">*</span></label>
         
          <textarea class="form-control" name="message" id="message" rows="5"></textarea>

        </div>
      </div>

      <!-- Copy Fields -->
      <div class="copy hide">
        <div class="control-group input-group">
          <div>
            <div class="form-group">
              <div class="col-sm-5"> 
                <label class="control-label" for="email">Date<span class="required">*</span></label>
                <input type="text" name="interview_date[]" id="interview_date" class="form-control datepicker" value=""> 
              </div>
              <div class="col-sm-3">  
                <label class="control-label" for="email">Start Time<span class="required">*</span></label>
                <input type="time" name="start_time[]" id="start_time" class="form-control" value="<?php echo date('H:i');?>">
              </div>
              <div class="col-sm-3">  
                <label class="control-label" for="email">End Time<span class="required">*</span></label>
                <input type="time" name="end_time[]" id="end_time" class="form-control" value="<?php echo date('H:i'); ?>">
              </div>
              <div class="col-sm-1">  
                <button class="btn btn-danger btn-xs pull-right remove" type="button"><i class="fa fa-trash"></i></button><br/>
              </div>

            </div>
          </div>
        
          <br/>
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

    $(document).ready(function() {

      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
          $(".datepicker").datepicker({
            dateFormat: 'dd-mm-yy'     
          });
      });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
     
    });

    function handler(e){
  var start_date=e.target.value;
  var end_start=(start_date+30);
  console.log(end_start);
   $('#select1').append(`<option value=""> 
                                       ${end_start} 
                                  </option>`); 

}
</script>

<style>
  .datepicker{z-index:1151 !important;}
</style> 
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
<input type="hidden" name="interview_id" id="interview" value="<?php if(!empty($interview_data)) echo $interview_data['id']; ?>">
  <input type="hidden" name="job_id" id="job_id" value="<?php if(!empty($interview_data)) echo $interview_data['job_post_id']; ?>">
  <div class="form-group">
  <div class="col-sm-12">
    <label class="control-label" for="email">Access given<span class="required">*</span></label>
      <table>
        <?php foreach ($access_data as $row) {
          $data=explode(",", $row['access_to_employee']);
          print_r($data);
        } ?>
      </table>

  </div>
  <!-- <div class="col-sm-1"></div> -->
</div>
<style>
  .datepicker{z-index:1151 !important;}
</style> 
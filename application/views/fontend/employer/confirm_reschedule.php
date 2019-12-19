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
<?php 
$company_id=$this->session->userdata('company_profile_id'); 
$emp_id=$this->session->userdata('emp_id'); 
if ($company_id != null) {?>
  <form id="Personal-info" class="form-horizontal" action="<?php echo base_url('Confirm_interview/confirm_rescheduled?apply_id='.base64_encode($interview_id));?>"  method="post" autocomplete="off">
    <?} else{?>
<form id="Personal-info" class="form-horizontal" action="<?php echo base_url('employee/confirm_rescheduled?apply_id='.base64_encode($interview_id));?>"  method="post" autocomplete="off">
  <?php }
?>
        <input type="hidden" value="" name="lang_id" id="lang_id">
                
        <div class="panel-body"></div>   
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-12 col-sm-12">
                <label class="control-label" for="email">Message to jobseeker<span class="required">*</span></label>
                    <textarea class="form-control" name="message" id="message" rows="5"></textarea>
                </div>     
              </div>
            </div>
          
             
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>


<style>
  .datepicker{z-index:1151 !important;}
</style> 
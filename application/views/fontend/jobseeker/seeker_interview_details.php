<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Exam Result </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Exam Result</span></div>
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
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>

           <style>
              .btn-primary,.btn-info{
                  width: 232px;
                  color: #fff;
                  text-align: center;
                  margin: 0 0 0 5%;
                  background-color: #6495ED;
                  padding: 5px;
                  text-decoration: none;
              }
          </style>
          <?php $sr_bo=1; if (!empty($interview_details)): foreach ($interview_details as $ct_row) :
          echo $sr_bo;
          if($ct_row['interview_complete_status']==1){
          echo '<a href="#" title="Interview Completed" data-toggle="tooltip" data-placement="top" class="pull-right"><i class="fa fa-check" style="color: green;"></i> Completed</a>';
        }else{
          echo '<a href="#" title="Interview Not Completed" data-toggle="tooltip" data-placement="top" class="pull-right"><i class="fa fa-remove" style="color: red;"></i> Not Completed</a>';
        }
           $message = '<div style="max-width:600px!important;padding:4px"><table style="padding:0 45px;width:100%!important;padding-top:45px;#f0f0f0;background-color:#ffffff" align="center" cellspacing="0" cellpadding="0" border="0"><tbody><tr><td align="center">
                <table width="100%" cellspacing="0" border="0"><tbody><tr><td style="font-size:0px;text-align:left" valign="top"></td></tr></tbody></table><table width="100%" cellspacing="0" cellpadding="0" border="0"><tbody><tr style="font-size:16px;font-weight:300;color:#404040;line-height:26px;text-align:left"><td>
                    <br>Hi '.$js_data['full_name'].',<br>'.$ct_row["message_to_candidate"].'<br/><br/>Please check the following rescheduled interview details: <br/>

                    <table>
                        <tr><td><b>Interview Date</b></td><td><b>Start Time</b></td><td><b>End Time</b></td></tr>';
                    $interview_datess = getinerviewdates($ct_row["id"]);
                if(sizeof($interview_datess)==1)
                    {
                        for($l1=0;$l1<sizeof($interview_datess);$l1++)
                        {
                            $message .='<tr><td>'.$interview_datess[$l1]['interview_date'].'</td><td>'.$interview_datess[$l1]['start_time'].'</td><td>'.$interview_datess[$l1]['end_time'].'</td><td></td></tr>';
                        }
                            $message .= '
                                </table><br/><b>Interview Type: </b> '.$interview_type.'<br/><b>Interview Details: </b> '.$interview_address.'<br>';
                                
                            $message .= '
                                <br><a href="'.base_url().'Confirm_interview/confirm_interview_now?apply_id='.base64_encode($ct_row["id"]).'&js_id='.base64_encode($js_data['email']).'" class="btn btn-primary" value="Confirm Interview" align="center" target="_blank">Confirm Interview</a>
                                 <a href="'.base_url().'Confirm_interview/reschedule_interview?apply_id='.base64_encode($ct_row["id"]).'&js_id='.base64_encode($js_data['email']).'" class="btn btn-info" value="Reschedule Interview" align="center" target="_blank">Reschedule Interview</a><br>';
                    }else{

                        for($l1=0;$l1<sizeof($interview_datess);$l1++)
                        {
                          
                            $message .='<tr><td>'.$interview_datess[$l1]['interview_date'].'</td><td>'.$interview_datess[$l1]['start_time'].'</td><td>'.$interview_datess[$l1]['end_time'].'</td><td><a href="'.base_url().'Confirm_interview/select_slot?apply_id='.base64_encode($interview_datess[$l1]['id']).'&js_id='.base64_encode($js_data['email']).'" target="_blank">Select</a></td></tr>';
                        }
                        $message .= '
                                </table><br/><b>Interview Type: </b> '.$ct_row["interview_type"].'<br/><b>Interview Details: </b> '.$ct_row["interview_details"].'<br>';
                    }
                    $message .='<br>Good Luck!<br/> Team ConsultnHire!<br>© 2017 ConsultnHire. All Rights Reserved.</td></tr><tr><td height="40"></td></tr></tbody></table></td></tr></tbody></table></div>';
                
                echo $message;
                $sr_bo++;
                echo "<hr>";
                endforeach;
                endif; 
            ?>
            

          </div>
        </div>
        <!-- end post-padding --> 
      </div>
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
<!-- end section --> 

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>



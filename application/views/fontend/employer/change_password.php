<style>
.btn-pass{background-color:#18c5bd;
border-radius:30px;
padding:0px 25px;border:none;}
.btn-pass:hover{background-color:#16a9a2;
}
@media (min-width: 768px){
.modal-dialog {
    width: 600px;
    margin: 165px auto;
}    
 .modal-dialog{width:250px;}

}
 .modal-footer{border-top:none;text-align:center;padding: 20px 15px 20px 15px;}
.modal-header{border-bottom:none;padding:20px 15px 0px 15px}
.modal-title{padding-top:15px;}
.btn-default {
    color: #fff;
    background-color:#18c5bd;
	border:none;
}
.btn-default1{
    color: #fff;
    background-color:#18c5bd;
	border:none;
}
.btn-default:hover{
	 background-color:#118c86;
	  color: #fff;}
.btn-default1:hover{
	 background-color:#118c86;
	  color: #fff;
}
.modal-title {
    padding-top: 0px;
    font-size: 15px;
    color: #403e3e;
    font-weight: 700;
	text-align:center;
}

</style>



<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Change Password</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Change Password</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->              

          <div class="section lb">
                <div class="container">
                   <div class="row">
                     <?php $this->load->view('fontend/layout/employer_left.php'); ?>

                        <div class="content col-md-9">
                        <div class="userccount">
                            <div class="formpanel">
                           <?php echo $this->session->flashdata('change_password'); ?>
                               <form id="submit" class="submit-form" action="<?php echo base_url(); ?>employer/change_password" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label class="control-label">Current Password </label>
                                            <input type="password" name="oldpassword" class="form-control" placeholder="Type your current password">
                                            <br>
                                            <label class="control-label">New Password</label>
                                            <input type="password" name="newpassword" class="form-control" placeholder="Type your new password">
                                            <br>
                                            <div class="change-pass_btn" style="text-align:end;">
                                               <button type="submit" class="btn-pass" data-toggle="modal" data-target="#modal_pass">Update Password</button>
                                          	 </div>
                                             
                                             
                                             
                                       
                            
                      <!-- Modal -->
                      <div class="modal fade" id="modal_pass" role="dialog">
                        <div class="modal-dialog">
                            
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                             
                              <h4 class="modal-title">Your password has been changed successfully .</h4>
                            </div>
                           
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      

                                             
                                             
                                             
                                             
                                             
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
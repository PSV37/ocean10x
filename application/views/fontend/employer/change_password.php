<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<style type="text/css">
   .required
   {
   color: red;
   }
   label.error {
   color: red;
   }
   input.select2-search__field {
   display: inline;
   border-radius: 0px;
   margin-top: 0px;
   }
   ul.select2-results__options {
   margin-top: 30px;
   }
   div#errorbox {
   margin-top: 25px;
   /*font-weight: bold;*/
   color: red;
   }
   .add-question {
    margin-top: 100px;
    padding: 20px;
}
form#submit {
    margin-left: 30px;
}
.emp
{
  margin-top: 65px;
}
</style>

<div class="container">
   <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <?php echo $this->session->flashdata('change_password'); ?>
    
         <div class="col-md-9 add-question">
            <div class="header-bookbank">
               Change Password
            </div>
              <form id="submit" class="submit-form" action="<?php echo base_url(); ?>employer/change_password" method="post">
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group lineitem_id ">
                     <label for="exampleInputEmail1">Current Password<span class="required">*</span></label>
                     <input type="password" name="oldpassword" class="form-control" placeholder="Type your current password">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-4">
                  <div class="form-group ques_type">
                     <label for="exampleInputEmail1">New Password<span class="required">*</span></label>
                     <input type="password" name="newpassword" class="form-control" placeholder="Type your new password">
                  </div>
               </div>
            </div>
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align:right;">
               <button id="submit" type="Submit" class="save_question">Update Password</button>
            </div>
        </form>
      </div>
   </div>
</div>
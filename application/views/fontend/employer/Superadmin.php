<?php 
    $this->load->view('fontend/layout/employer_new_header.php');
?>               

<script type="text/javascript">
   function checkPassword(form) { 
                password1 = form.password.value; 
                password2 = form.cnfpass.value; 
  
                // If password not entered 
                if (password1 == '') 
                    alert ("Please enter Password"); 
                      
                // If confirm password not entered 
                else if (password2 == '') 
                    alert ("Please enter confirm password"); 
                      
                // If Not same return False.     
                else if (password1 != password2) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 
  
                // If same return True. 
                else{ 
                    // alert("Password Match: Welcome to GeeksforGeeks!") 
                    return true; 
                } 
            } 
        </script> 
</script> 
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Super Admin</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Super Admin</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->              

          <div class="section lb">
                <div class="container">
                   <div class="row">
            <?php $this->load->view('fontend/layout/employer_menu.php'); 
            $email=$this->session->userdata('email');

            ?>
                  

                        <div class="content col-md-9">
                        <div class="userccount">
                            <div class="formpanel">
                           <?php echo $this->session->flashdata('emp_msg'); ?>
                               <form id="submit" class="submit-form" action="<?php echo base_url(); ?>employer/superadmin" method="post">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                           <label class="control-label">User Name</label>
                                            <input type="username" name="username" class="form-control" readonly value="SuperAdmin" >
                                            <br>
                                            <label class="control-label">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="Superadmin Email">
                                            <br>
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder=" password">
                                            <br>
                                            <label class="control-label">Confirm Password</label>
                                            <input type="password" name="cnfpass" class="form-control" placeholder="confirm password">
                                               <button type="submit" class="btn btn-primary">submit</button>
                                        </div>

                                    </div>
                                </form>
                            </div><!-- end post-padding -->
                        </div>
                        </div>

                </div> <!--end row -->
                </div><!-- end container -->
            </div><!-- end section -->


  
 
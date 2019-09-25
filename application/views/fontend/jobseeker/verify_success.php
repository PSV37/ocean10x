<?php 
    $this->load->view('fontend/layout/header.php');
?>

            <div class="section lb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                         <div class="userccount">
                            <div class="notfound">
                                <h5>Congratulations!</h5>
                               <p>Your Account has been activated  successfully.</p>
                              <a href="<?php echo base_url(); ?>seeker-login" class="btn btn-custom">Login</a>
                           </div>
                           </div>
                       </div>
                    </div>
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>


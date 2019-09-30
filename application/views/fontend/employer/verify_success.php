<?php 
    $this->load->view('fontend/layout/header.php');
?>

            <div class="section lb">
                <div class="container">
                    <div class="row">
                        <div class="content col-md-6 col-md-offset-3">
                            <div class="userccount">
                            <div class="notfound confirm">
                                <h5>Congratulations</h5>
                                <p>Your Account has been Activated  successfully </p>
                                <a href="<?php echo base_url(); ?>employer-login" class="btn btnform">Login</a>
                                <div class="clearfix"></div>
                           </div>
                           </div>
                       </div>
                    </div>
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
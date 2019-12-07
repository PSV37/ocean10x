<?php 
    $this->load->view('fontend/layout/header.php');
?>

            <div class="section lb">
                <div class="container">
                    <div class="row">
                        <div class="content col-md-6 col-md-offset-3">
                            <div class="userccount">
                            <div class="notfound confirm">
                                <?php echo $company_name; ?>
                                <h3>Congratulations <?php echo $company_name ?></h3>
                                <p>You have successfully registered your presence on TheOcean ! 
Please activate your Corporate Account by accessing the secure link sent to your e-mail account ! </p>
                               
                                <div class="clearfix"></div>
                           </div>
                           </div>
                       </div>
                    </div>
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
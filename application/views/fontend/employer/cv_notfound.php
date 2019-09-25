<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>                
             
   

            <div class="section lb">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notfound">
                                <h2>404 <span>Error!</span></h2> 
                                <p>Sorry, we can't find the page you are looking for. <br>Please go to <a href="<?php echo base_url(); ?>">Home </a> or search something from search form.</p>
                                <a href="<?php echo base_url(); ?>" class="btn btn-custom">Back to Home</a>
                           </div>
                       </div>
                    </div>
                </div><!-- end container -->
            </div><!-- end section -->






  
 <?php $this->load->view("fontend/layout/footer.php"); ?>
<?php 
    $this->load->view('fontend/layout/header.php');
?>                

          <div class="section wb">
                <div class="container">
                    <div class="section-title text-center clearfix">
                        <h4>Pricing & Plan</h4>
                        <p class="lead">Lorem ipsum dolor sit amet, non odio tincidunt ut ante, lorem a euismod suspendisse vel, sed quam nulla mauris iaculis. Erat eget vitae malesuada, tortor tincidunt porta lorem lectus.</p>
                    </div>

                    <div class="row">
                       <?php
foreach($results as $data) {
    echo $data->job_category_id . " - " . $data->job_category_name . "<br>";
}
?>
   <p><?php echo $links; ?></p>
  </div>
                        </div>
                <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                            </li>
                        </ul>
                    </nav>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
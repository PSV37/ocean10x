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
                        <div class="col-md-12">
                            <div class="row pricing-tables text-center">
                            <?php $colspan_one=1; $colspan_two=2; foreach ($package_lists as  $v_package): ?>
                                <div class="col-md-3 col-sm-3 col-xs-12">
                                    <div class="pricing-box">
                                        <div class="pricing-header">
                                            <h3><i class="icon icon-flag"></i><?php echo $v_package->job_package_service_name ?></h3>
                                        </div>
                                        <div class="pricing-price">
                                            <p> <sub>৳</sub><?php echo $v_package->package_price; ?></p>
                                        </div>
                                        <!-- end price -->
                                        <div class="pricing-desc text-center">
                                            <p><?php echo $v_package->package_desc; ?></p>
                                        </div>
                                        <!-- end desc -->
                                        <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $colspan_one; ?>" aria-expanded="true" aria-controls="collapseOne">CV Search <?php echo $v_package->package_cv_search; ?></a>
                                                    </h4>
                                                </div>
                                                <!-- end heading -->
                                                <div id="collapse<?php echo $colspan_one; ?>" class="panel-collapse collapse" role="tabpanel" >
                                                    <div class="panel-body">
                                                        <p>dddddAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end panel -->
                                            <div class="panel panel-default">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $colspan_two; ?>" aria-expanded="true" aria-controls="collapseOne"><?php echo $v_package->package_category_job; ?></a>
                                                    </h4>
                                                </div>
                                                <!-- end heading -->
                                                <div id="collapse<?php echo $colspan_two; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                    <div class="panel-body">
                                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end panel-group -->
                                        <div class="pricing-footer text-center">
                                            <a href="<?php echo base_url().'employer/order/'.$v_package->job_package_service_id; ?>" data-scroll class="btn btn-primary btn-block">Order Now</a>
                                        </div>
                                        <!-- end desc -->
                                    </div>
                                    <!-- end pricing-box -->
                                </div>
                                <!-- end col -->
                                <?php $colspan_one=$colspan_one+2; ?>
                                <?php $colspan_two=$colspan_two+2; ?>
                                  <?php endforeach; ?>
                             
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
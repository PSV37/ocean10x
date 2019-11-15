<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>        
<style>
	.element-box {
    border-radius: 6px;
    background-color: #fff;
    -webkit-box-shadow: 0px 2px 4px rgba(126, 142, 177, 0.12);
    box-shadow: 0px 2px 4px;
    padding: 1.5rem 2rem;
    margin-bottom: 1rem;
    } 
    .element-wrapper .element-header {
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    padding-bottom: 1rem;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}
</style>
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Active Jobs</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Active Jobs</span></div>
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
        <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>Your Dashboard</h5>
           
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">

                 	

	<div class="content-i">
            <div class="content">
              <div class="row pt-4">
                <div class="col-md-12">
                  <!--START - Grid of tablo statistics-->
                  <div class="element-wrapper">
                    <h6 class="element-header">
                      Support Service Dashboard
                    </h6>
                    <div class="element-content">
                      <div class="tablo-with-chart">
                        <div class="row">
                          <div class="col-sm-5 col-xxl-4">
                            <div class="tablos">
                              <div class="row mb-xl-2 mb-xxl-3">
                                <div class="col-sm-6">
                                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
                                    <div class="value">
                                      24
                                    </div>
                                    <div class="label">
                                      New Tickets
                                    </div>
                                    <div class="trending trending-up-basic">
                                      <span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-sm-6">
                                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
                                    <div class="value">
                                      12
                                    </div>
                                    <div class="label">
                                      Closed Today
                                    </div>
                                    <div class="trending trending-down-basic">
                                      <span>12%</span><i class="os-icon os-icon-arrow-down"></i>
                                    </div>
                                  </a>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
                                    <div class="value">
                                      52
                                    </div>
                                    <div class="label">
                                      Agent Replies
                                    </div>
                                    <div class="trending trending-up-basic">
                                      <span>12%</span><i class="os-icon os-icon-arrow-up2"></i>
                                    </div>
                                  </a>
                                </div>
                                <div class="col-sm-6">
                                  <a class="element-box el-tablo centered trend-in-corner padded bold-label" href="apps_support_index.html">
                                    <div class="value">
                                      7
                                    </div>
                                    <div class="label">
                                      New Replies
                                    </div>
                                    <div class="trending trending-down-basic">
                                      <span>12%</span><i class="os-icon os-icon-arrow-down"></i>
                                    </div>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END - Grid of tablo statistics-->
                </div>
              </div>

          
			  
	
            </div>
          </div>
		                  
                </div>
                                          
              </div>
              
            </div>
          </div>
                             
        </div><!-- end col -->
      </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->
</div>
  

<?php $this->load->view("fontend/layout/footer.php"); ?>
 
 
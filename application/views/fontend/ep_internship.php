<?php 

  $company_profile_id = $this->session->userdata('company_profile_id');
 $jobseeker_id = $this->session->userdata('job_seeker_id');
        if ($company_profile_id != null) {
             $this->load->view('fontend/layout/employer_header.php');
            }
        elseif($jobseeker_id != null) {
             $this->load->view('fontend/layout/seeker_header.php');
        } else {
    $this->load->view('fontend/layout/header.php');
    }
?> 

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">University Info</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>University Info</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

               
            <div class="listpgWraper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="job-header">
                                <div class="contentbox">
                                	<h1 class="postitle"><?php echo $company_info->company_name; ?></h1>
                                    <div style="margin-bottom:30px;"> 
									<?php if(!empty($this->company_profile_model->company_logoby_id($company_info->company_profile_id))): ?>
                                    <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_info->company_profile_id);?>" alt="" width="120" class="full-logo  img-responsive">
                                    <?php else: ?>
            <img src="<?php echo base_url() ?>upload/notfound.gif?>" alt="" class="full-logo img-responsive">
        <?php endif; ?>
        </div>
 
        
                             <h3>Special Features</h3>
    						 <p><?php echo $company_info->company_aboutus; ?></p>
                             
                             <h3>Attractive Offers</h3>
                             <p><?php echo $company_info->company_service; ?></p>

                             <h3>Head Office</h3>
                             <p><?php echo $company_info->company_address; ?></p>
                                </div>
                            </div><!-- end post-padding -->
<?php   $companyJobs=$this->job_posting_model->get_company_active_internship_jobs($company_info->company_profile_id);  if (!empty($companyJobs)): ?>
                            
                            <div class="job-header">
                                <div class="contentbox">
                                    <h4 class="small-title">Vacancy Information</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive job-table">
                                                <table id="mytable" class="table table-bordred table-striped">

                                                    <thead>
                                                        <tr>
                                                        <th>Job Title</th>
                                                        <th>Salary</th>
                                                        <th>Date</th>
                                                        <th>View</th>
                                                        </tr>
                                                    </thead>
                                             <?php  foreach ($companyJobs as $v_jobs) :
                                                   ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                            <h4 class="jbtitle"><a href="#"><?php echo $v_jobs->job_title;  ?></a><br>
                                                            </h4>
                                                            </td>
                                                             <td><?php  echo $v_jobs->salary_range;  ?></td>
                                                            <td><?php echo date('j F Y', strtotime($v_jobs->created_at));?></td>
                                                            <td><a href="<?php echo base_url(); ?>job/show/<?php echo $v_jobs->job_slugs;?>" class="btn btn-primary">View </a></td>
                                                        </tr>

                                                        <?php
                                                        endforeach;
                                                        ?><!--get all category if not this empty-->
                                                    </tbody>
                                                </table>
                                            </div><!-- end table -->
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end post-padding -->
                        <?php endif; ?>
                        </div><!-- end col -->  

                        <div class="col-md-4">
                             <div class="sidebar">
                                <div class="postpager liststylepost">
                                    <ul class="post-blog">
                                        <li>
                                            <div class="post">
                                              <div class="content-title">
                                     <h3>Contact Info</h3>   
                                   
                                    </div>
                                  <ul class="contact-details contact-details-link">
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="#"><?php echo $company_info->company_email; ?></a></li>                                             
                  <li>     <?php echo (!empty($company_info->company_url)?'<i class="fa fa-globe" aria-hidden="true"></i> <a href="'.$company_info->company_url.'" target="_blank">'.$company_info->company_url.'</a>':''); ?></li>        
 <li>     <?php echo (!empty($company_info->company_career_link)?'<i class="fa fa-black-tie" aria-hidden="true"></i> <a href="'.$company_info->company_career_link.'" target="_blank">'.$company_info->company_career_link.'</a>':''); ?></li> 
                                                  
                                </ul>

                                            </div>  
                                        </li>
                                    </ul>   
                                </div><!-- end postpager -->
                            </div><!-- end widget -->

<div class="job-header">
                            <div class="jobdetail">
             <?php $ads_right = get_ads('rightside');
 
 if($ads_right): foreach($ads_right as $row_right):?>

  <div class="adbanner2"><a href="<?php echo $row_right->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$row_right->ad_image); ?>" alt=""></a></div>
  <?php endforeach; endif;?>
          </div>
                        </div>    
                            
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>
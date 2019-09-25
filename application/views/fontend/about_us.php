<?php 



  $company_profile_id = $this->session->userdata('company_profile_id');

 $jobseeker_id = $this->session->userdata('job_seeker_id');

        if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_header.php');

            }

        elseif($jobseeker_id != null) {

             $this->load->view('fontend/layout/seeker_header.php');

        } else {

    $this->load->view('fontend/layout/header_for_cms.php');

    }

?>

<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <h1 class="page-heading"><?php echo $row['heading'];?></h1>
  </div>
</div>

<!-- Page Title End -->

<div class="innerpageconeten">
<div class="container">
  <div class="whoweare">
  	
	<?php echo $row['description'];?>
   
  </div>
  <!-- end container --> 
  
</div></div>
<!-- end section -->

<?php $this->load->view("fontend/layout/footer.php"); ?>

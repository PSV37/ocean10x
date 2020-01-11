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
    <h1 class="page-heading">How to build CV</h1>
  </div>
</div>

<!-- Page Title End -->
                     
    <div class="row">
     <?php  if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_left.php');

            }

        elseif($jobseeker_id != null) {

              $this->load->view('fontend/layout/seeker_left.php'); 

        }?>
      <!--  -->
      <div class="content col-md-9">
<div class="innerpageconeten" style="padding:80px 0;">
<div class="container">
  <div class="whoweare row">
  	<div class="col-md-8">
    <div class="about-widget">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry  standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    
   
    </div>
    <div class="col-md-4"></div>
  </div>
  <!-- end container --> 
  
</div></div>
</div>
</div>
<!-- end section -->

<?php $this->load->view("fontend/layout/footer.php"); ?>

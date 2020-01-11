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
<!-- <div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Dashboard</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Dashboard</span></div>
      </div>
    </div>
  </div>
</div> -->
<!-- Page Title End -->             

<div class="section lb">
  <div class="container">                                
                         
    <div class="row">
        <?php  if ($company_profile_id != null) {

             $this->load->view('fontend/layout/employer_left.php');

            }

        elseif($jobseeker_id != null) {

              $this->load->view('fontend/layout/seeker_left.php'); 

        }?>
      <div class="content col-md-9">
        <div class="userccount">

           <div class="about-widget">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry  standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>
                             
        </div><!-- end col -->
      </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->
</div>
  

<?php $this->load->view("fontend/layout/footer.php"); ?>
 
 <script>
  $(document).ready (function(){
    $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
    $("#smsg").slideUp(500);
    });   
  });
 </script>
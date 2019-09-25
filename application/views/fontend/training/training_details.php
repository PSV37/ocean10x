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

    $admin_id = $this->session->userdata('admin_user_id');
?>



<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading"><?php echo $training_info->training_title; ?></h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><?php if(!empty($admin_id)) {
                    echo '<a href="'.base_url().'/admin/all-training" class="btn btn-primary">Back </a>';
                    } ?></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

<div class="listpgWraper">
        <div class="container">
        
        
        <div class="job-header">
      
      <div class="jobButtons trainbtn">      
     <span class="btn"><i class="fa fa-clock-o" aria-hidden="true"></i> <strong>Start Date:</strong> <?php echo date('j F',strtotime($training_info->start_date)) ?> - <?php echo date('j F Y',strtotime($training_info->end_date)) ?></span>
     
     <span class="btn"><i class="fa fa-clock-o" aria-hidden="true"></i> <strong>Deadline:</strong> <?php echo date('j F Y',strtotime($training_info->deadline)) ?></span>
     
     <span class="btn"><i class="fa fa-tags" aria-hidden="true"></i>
     <?php if($training_info->training_type=='1')
     { echo "Workshop";}
			else if($training_info->training_type=="2"){
				echo "Customized Course";
			} else {
				echo "International";
			}
	 ?>
      </span>
      <a href="<?php echo base_url().'registration/'.$training_info->training_slug ?>" class="btn apply">Register For Training</a>
     </div>
    </div>
        
        
        
        
        
        
        
        
        
   <div class="single-job">
         <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
              
        <!-- Job Description start -->
        <div class="job-header">
          <div class="contentbox">
            <?php  echo $training_info->training_content; ?>
            <h3>Venue</h3>
             <span> <?php echo $training_info->venus; ?> </span>
          </div>
        </div>
        <!-- Job Description end --> 

                

                             
                                
                            </div>                                                             

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="sidebar">
                                    <h3>Facilitator</h3>
                              <img src="<?php echo base_url().'upload/training/'.$training_info->trainer_image; ?>" alt="" class="img-circle facilitator">
                              <h4>
                              <?php echo $training_info->trainar_name; ?>
                                <!-- Abdulla Al Mamun-->
                              </h4>
                              <p class="tr_tag">
                            <?php echo $training_info->trainer_details; ?>
                              </p>
                              </div>

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end job-tab -->
                    </div><!-- end single-job -->

                </div>

 <script type="text/javascript">
  $(document).ready(function(){
    var text = $('#heading_title').text();
    var text_array = text.split(" ");
    var element = "<p class='main-title'>";
    for(var i =0 ; i< text_array.length; i++){
        //alert(text_array[i][0]);
        var split_text = "";
        for(var j =1; j< text_array[i].length; j++){
            split_text+=text_array[i][j];
        }
        element += "<span class='s'>"+text_array[i][0]+"</span>"+split_text+"&nbsp";
        
    }
    element+="</p>";
    $("#heading_title").html(element);
  })
</script>
        
 <?php $this->load->view("fontend/layout/footer.php"); ?>
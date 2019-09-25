<?php 

  $company_profile_id = $this->session->userdata('company_profile_id');
  
  $jobseeker_id = $this->session->userdata('job_seeker_id');
    
    if ($company_profile_id != null) {
             $this->load->view('fontend/layout/employer_header.php');
    }elseif($jobseeker_id != null) {
             $this->load->view('fontend/layout/seeker_header.php');
    } else {
        $this->load->view('fontend/layout/header.php');
    }
    
?>
<?php
	$ads_home = get_ads('home');
?>

<!-- Search start -->

<div class="searchwrap">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <h3>Over One million success stories.</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur porta molestie nunc, ut dapibus arcu tempus tincidunt. Duis viverra posuere dolor, at venenatis est accumsan vitae.</p>
        <form action="<?php echo base_url() ?>job" method="post">
          <div class="searchbar">
            <div class="col-md-7 col-sm-6">
              <input type="text" name="keyword" class="form-control" id="keyword" placeholder="Job Title, Keywords">
            </div>
            <div class="col-md-3 col-sm-4">
              <select name="location_name[]" class="form-control">
                <option value=""> Select Location</option>
                <?php echo $this->job_location_model->selected(); ?>
              </select>
            </div>
            <div class="col-md-2 col-sm-2">
              <button type="submit" class="btn job-search"><i class="fa fa-search"></i> Search</button>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
        
        <div class="seekerwrap">
        	<h4>Get Started Now</h4>
          	<a href="<?php echo site_url('seeker-login') ?>" class="seekerbx"><i class="fa fa-user-o" aria-hidden="true"></i> Upload Resume</a>
        	<a href="<?php echo base_url() ?>employer_login" class="seekercv"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Post a New Job</a>
  		</div>

        
        
      </div>
    </div>
  </div>
</div>
<!-- Search End -->


<div class="homeboxwrap"> 

	<!-- Top Employers start -->
  <div class="section">
    <div class="container"> 
      <!-- title start -->
      <div class="titleTop">
        <h3>Top <span>Employers</span></h3>
      </div>
      <!-- title end -->
      
      <ul class="employerList">
        <?php
             
                $r=1;
                foreach ($selected_company as $v_selected_jobs){

                    $logo=$this->company_profile_model->company_logoby_id($v_selected_jobs->company_profile_id);
            ?>
        <!--employer-->
        <li data-toggle="tooltip" data-placement="top" title="<?php echo $company_info->company_name; ?>"><a href="<?php echo base_url();?>selected-cv/<?php echo $this->company_profile_model->get_slug_name($v_selected_jobs->company_profile_id) ?>" class=""><img class="comapany-logo" src="<?php echo base_url() ?>upload/<?php if(!empty($logo)) {echo $logo;} else {echo "notfound.gif";} ?>"></a></li>
        <?php $r++; } ?>
      </ul>
    </div>
  </div>
  <!-- Top Employers ends --> 
	
    <!-- Google Ads start -->
  <div class="gads">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="adbanner1"><a href="<?php echo $ads_home[0]->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$ads_home[0]->ad_image); ?>" alt=""></a></div>
        </div>
        <div class="col-md-4">
          <div class="adbanner1"><a href="<?php echo $ads_home[1]->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$ads_home[1]->ad_image); ?>" alt=""></a></div>
        </div>
        <div class="col-md-4">
          <div class="adbanner1"><a href="<?php echo $ads_home[1]->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$ads_home[1]->ad_image); ?>" alt=""></a></div>
        </div>
      </div>
    </div>
  </div>
    
   <div class="appwraper applyjb">
    <div class="container"> 
      
      <!--app info Start-->
      <div class="titleTop">
        <h3>Are You Looking For Job</h3>
      </div>
      <div class="subtitle2">Submit Your Resume To Help You</div>
      <div class="appbtn"> <a href="#lookingjob" role="button" data-toggle="modal" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Apply Now</a> </div>
      <!--app info end--> 
      
    </div>
  </div>
  
  <!-- Latest Jobs start -->
  <div class="section greybg">
    <div class="container"> 
      <!-- title start -->
      <div class="titleTop">
        <h3>Latest <span>Jobs</span></h3>
      </div>
      <!-- title end -->
      
      <ul class="jobslist row">
        <?php
  if($result_latest_jobs): foreach($result_latest_jobs as $row_latest):
 // print_r($row_latest);
  //exit;
  ?>
        <!--Job 1-->
        <li class="col-md-6">
          <div class="jobint">
            <div class="row">
              <div class="col-md-2 col-sm-3"> <img src="<?php echo base_url() ?>upload/<?php echo (!empty($row_latest->company_logo)?$row_latest->company_logo:"notfound.gif"); ?>"> </div>
              <div class="col-md-10 col-sm-9">
                <div class="row">
                  <div class="col-sm-8">
                    <h4><a href="<?php echo base_url('job/show/'.$row_latest-> job_slugs);?>"><?php echo $row_latest->job_title;?></a></h4>
                    <!--<div class="desi">Elee Consulting</div>-->
                    <div class="company"><a href="<?php echo base_url('selected-cv/'.$row_latest->company_slug);?>"><?php echo $row_latest->company_name;?></a></div>
                    <p><?php echo strip_tags(substr($row_latest->job_desc,0,50)); ?>...</p>
                  </div>
                  <div class="col-sm-4">
                    <div class="detailview"><a href="<?php echo base_url('job/show/'.$row_latest-> job_slugs);?>">View Detail</a></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="greybox">
              <div class="infobox"><i class="fa fa-map-marker" aria-hidden="true"></i> <span><?php echo $row_latest->job_location_name;?></span></div>
              <div class="infobox"><i class="fa fa-file-text" aria-hidden="true"></i> <?php echo $row_latest->experience;?> year(s)</div>
              <div class="infobox"><i class="fa fa-calendar" aria-hidden="true"></i>
                <?php if(!is_null($row_latest->created_at)) { echo date('F j Y',strtotime($row_latest->created_at)); } ?>
              </div>
              <div class="infobox"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $row_latest->job_nature_name;?></div>
              <div class="clearfix"></div>
            </div>
          </div>
        </li>
        <!--Job end-->
        <?php endforeach; endif;?>
      </ul>
    </div>
  </div>
  <!-- Latest Jobs ends -->
  
  
  <!-- Categories start -->
  <div class="section">
    <div class="container">
     
        <div class="titleTop">
        <h3>Browse By <span>Categories</span></h3>
      </div>
      
        <ul class="row catelist">
            <?php  $i = 0;?>
            <?php if (!empty($categorys)): foreach ($categorys as $v_category) : ?>
            <li class="col-md-4 col-sm-6">
             <a href="<?php echo base_url(); ?>job/category_and_level_job/<?php echo $v_category->job_category_id; ?>/3"><?php echo $v_category->job_category_name; ?> </a>
           </li>
            <?php
                    endforeach;

                    ?>

                   
            <!--get all category if not this empty-->
            <input type="hidden" id="countOfi" value="<?php  echo $i++;?>">
            <?php else : ?>
            <!--get error message if this empty-->
            <li> <strong>There is no record for display</strong> </li>
            <!--/ get error message if this empty-->
            <?php
                    endif; ?>
          </ul>
       
      </div>
      
     
  </div>
  <!-- Categories ends -->

  
  
  <!-- APP start -->
  <div class="appwraper">
    <div class="container"> 
      
      <!--app info Start-->
      <div class="titleTop">
        <h3>Download Our App</h3>
      </div>
      <div class="subtitle2">A world market in your hand</div>
      <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui non, semper orci.</p>
      <div class="appbtn"> <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download From Play Store"><i class="fa fa-android" aria-hidden="true"></i> Download</a> <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download From App Store"><i class="fa fa-apple" aria-hidden="true"></i> Download</a> <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Download From Windows Store"><i class="fa fa-windows" aria-hidden="true"></i> Download</a> </div>
      <!--app info end--> 
      
    </div>
  </div>
  
  
  <div class="gads">
    <div class="container">
  <div class="row">
    <div class="col-md-6">
      <div class="adbanner1"><a href="<?php echo $ads_home[3]->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$ads_home[3]->ad_image); ?>" alt=""></a></div>
    </div>
    <div class="col-md-6">
      <div class="adbanner1"><a href="<?php echo $ads_home[4]->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$ads_home[4]->ad_image); ?>" alt=""></a></div>
    </div>
  </div>
  </div>
  </div>
  
  
  
</div>
<script>
// Load this when the DOM is ready
$(function(){
  // You used .myCarousel here. 
  // That's the class selector not the id selector,
  // which is #myCarousel
  $('#clients-slider').carousel({
    interval: 2000,
  cycle: true
  });
});


$(document).ready(function(){
var count = $("#countOfi").val();
for(var i =0; i< count ; i++){
  var _id = "job_cat_id_"+i;
  formatHeader(_id);
}
});

function formatHeader(title){
  var text = $('#'+title).text();
 
    var text_array = text.split(" ");
  //alert(text_array);
    var element = "<p class='main-category-title'>";
    for(var i =0 ; i< text_array.length; i++){
        //alert(text_array[i][0]);
        var split_text = "";
        for(var j =1; j< text_array[i].length; j++){
            split_text+=text_array[i][j];
        }
        element += "<span class='job-catgeory-style'>"+text_array[i][0]+"</span>"+split_text+"&nbsp";
        
    }
    element+="</p>";
   
   $("#"+title).html(element);
}


</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>

<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>    
<style>
li.list-group-item:hover{color:#8ac640;}
.panel-default>.panel-heading{cursor:pointer;background-color:#fff;}

	.panel-default>.panel-heading:hover {
    border-left:solid 3px #89c740;
    border-radius: 0px;
	background-color:#fff;    
	color:#89c740;  
}
.panel-group .panel{margin-bottom:0px;}
   
.list-group-item{cursor:pointer;}      
.panel-title>a{font-size:12px;font-weight:600;}
.panel-title>a:hover{text-decoration:none;}   
.summary {
    background-color: #f4f9fd;
    padding: 20px 32px;
    margin-right: 65px;
    box-shadow: 2px 2px 3px 0px #ece9e9;
	margin-bottom:20px;
}
.summary h6{font-size:25px;}
   
.lb{background-color:#f5f5f585;}
.panel-default {   
    border-color: #dddddd8a;
	
}      
.panel-group .panel+.panel {
   margin-top: 0px;   
}
li.list-group-item {
    background-color: #edeff1;
	font-size: 13px;
}
.summary i{
    float: left;
    margin-right: 25px;
    font-size: 25px;
}  
.userccount p{margin-top:5px;}  
</style>
   

    

<div class="section lb">
  <div class="container">                                
                         
    <div class="row">
     <div class="content col-md-3">
  <div id="accordion" class="panel panel-group" role="tablist">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
      <h4 class="panel-title active">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup1" aria-expanded="true" aria-controls="collapseListGroup1"><i class="fa fa-dashboard" aria-hidden="true"></i>&emsp;My Dashboard</a>
      </h4>
    </div>
    <div id="collapseListGroup1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>
        <li class="list-group-item">Second eros</li>
        <li class="list-group-item">Second eros</li>
        <li class="list-group-item">Second eros</li>
        <li class="list-group-item">Second eros</li>   
        <li class="list-group-item">Second eros</li>
      </ul>   
    </div>
  </div>   

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
      <h4 class="panel-title">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup2" aria-expanded="true" aria-controls="collapseListGroup2"><i class="fa fa-pencil" aria-hidden="true"></i>&emsp;My Profile</a>
      </h4>
    </div>
    <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>
        <li class="list-group-item">Second eros</li>
      </ul>
    </div>   
  </div>   

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
      <h4 class="panel-title">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup3" aria-expanded="true" aria-controls="collapseListGroup3"><i class="fad fa-cog" aria-hidden="true"></i>&emsp; My Training</a>
      </h4>
    </div>   
    <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>   
        <li class="list-group-item">Second eros</li>
      </ul>
    </div>
  </div>
  
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
      <h4 class="panel-title">
        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseListGroup3" aria-expanded="true" aria-controls="collapseListGroup3"><i class="fad fa-cog" aria-hidden="true"></i>&emsp; Ocean Services</a>
      </h4>
    </div>   
    <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3" aria-expanded="true">
      <ul class="list-group">
        <li class="list-group-item">Bootply</li>
        <li class="list-group-item">One itmus ac facilin</li>   
        <li class="list-group-item">Second eros</li>
      </ul>
    </div>
  </div>
</div>
<!-- Accordion wrapper -->
<!-- Accordion wrapper -->
  	 </div>   
     
<script>
// http://stackoverflow.com/questions/12733238/retain-twitter-bootstrap-collapse-state-on-page-refresh-navigation

$(document).ready(function () {
  //when a group is shown, save it as the active accordion group
  $("#accordion").on('shown.bs.collapse', function () {
      var active = $("#accordion .in").attr('id');
      Cookies.set('activeAccordionGroup', active, { expires: 7 });
      alert(active);
  });
  $("#accordion").on('hidden.bs.collapse', function () {
      Cookies.remove('activeAccordionGroup');
  });
  var last = Cookies.get('activeAccordionGroup');
  if (last != null) {
    //remove default collapse settings
    $("#accordion .collapse").removeClass('in');
    //show the account_last visible group
    $("#" + last).addClass("in");
  }
});

</script>     
     
     
     
     
      <div class="content col-md-9">
        <div class="userccount">

          <div id="vsphoto" class="tab-pane fade in">
            <h5>My Dashboard</h5>
           
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
					<div class="row">
		                <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Saved Jobs</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Job Alerts</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fad fa-eye"></i><h6>100</h6>
		            	  		<p>Profile Views</p>
			           	 	</div>   
			           	 	  
		             	</div>
                        <div class="col-md-12">
		            	 	<div class="col-md-3 summary">
		            	  	<i class="fa fa-briefcase" aria-hidden="true"></i><h6>45</h6>
		            	  		<p>Courses Completed</p>   
		            	  	</div>
		            	  	<div class="col-md-3 summary">
		            	  		<i class="fa fa-bell"></i><h6>10</h6>
		            	  		<p>Article Views</p>
		            	  	</div>
			            	<div class="col-md-3 summary">
			            	  	<i class="fad fa-eye"></i><h6>100</h6>
		            	  		<p>News Feed</p>
			           	 	</div>   
			           	 	
		             	</div>
					</div>
					<div class="panel-body"></div>

					<div class="row career">
						<div class="col-md-12">
		                	<div class="col-md-1"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
		                	<div class="col-md-11">
				           	 	<sapn class="title-career"><b>Profile Percentage</b></sapn> <br><br>
				           	 	<?php $each=100/6;
				           	 		// echo $each;
				           	 		$personal_info=$each;
				           	 		$education=$each;
				           	 		$skills=$each;
				           	 		$work_experience=$each;
				           	 		$Desired_profile=$each;
				           	 		$attach_resume=$each;

				           	 		$personal_info_each=$personal_info/14;
				           	 		$education_each=$education/5;
				           	 		$Desired_profile_each=$Desired_profile/11;
				           	 		
				           	 		//for personal info
                					 $job_seeker=$this->session->userdata('job_seeker_id');  

				           	 		$name=$this->Job_seeker_model->jobseeker_name($job_seeker);
				           	 		// print_r($this->db->last_query());
				           	 		if (isset($name) && !empty($name)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		$job_seeker_photo = $this->Job_seeker_photo_model->photo_by_seeker($job_seeker);
				           	 		if (isset($job_seeker_photo->js_photo_id) && !empty($job_seeker_photo->js_photo_id)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		$js_personal_info = $this->job_seeker_personal_model->personalinfo_list_by_id($job_seeker);

				           	 		if (isset($js_personal_info->date_of_birth) && !empty($js_personal_info->date_of_birth)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->mobile) && !empty($js_personal_info->mobile)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->present_address) && !empty($js_personal_info->present_address)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->city_name) && !empty($js_personal_info->city_name)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->state_name) && !empty($js_personal_info->state_name)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->country_name) && !empty($js_personal_info->country_name)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->marital_status) && !empty($js_personal_info->marital_status)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->work_permit_usa) && !empty($js_personal_info->work_permit_usa)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->work_permit_countries) && !empty($js_personal_info->work_permit_countries)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->website) && !empty($js_personal_info->website)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->resume_title) && !empty($js_personal_info->resume_title)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

				           	 		if (isset($js_personal_info->resume_title) && !empty($js_personal_info->resume_title)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 			
				           	 		}

				           	 $where_lang="job_seeker_id='$job_seeker' ORDER BY language ASC";
            			$languages = $this->Master_model->getMaster('js_languages',$where_lang);

            						if (isset($languages) && !empty($languages)) 
				           	 		{
				           	 			$personal_total +=$personal_info_each;
				           	 		}

			$education_level = $this->Master_model->getMaster('education_level',$where=false);
			// foreach ($education_level as $v_education) :
				$seeker_edu_id = $v_education['education_level_id'];

							$where_ress = "js_education.job_seeker_id='$job_seeker'";
				           $education_data = geSeekerEducationByid($job_seeker,$seeker_edu_id);
				           $select='education_level_id';
							$education_data = $this->Master_model->getMaster('js_education',$where_ress, $join = FALSE, $order = false, $field = false, $select = $select,$limit=false,$start=false, $search=false);
								foreach ($education_data as $row) 
								{
									if (in_array('1', $row)) {
									$education_total +=$education_each;
										}
										if (in_array('2', $row)) {
											$education_total +=$education_each;
										}
										if (in_array('3', $row)) {
											$education_total +=$education_each;
										}
										if (in_array('4', $row)) {
											$education_total +=$education_each;
										}
										if (in_array('5', $row)) {
											$education_total +=$education_each;
										}
										if (in_array('6', $row)) {
											$education_total +=$education_each;
										}
								}

								$where_skill['job_seeker_id']=$job_seeker;
			$js_skills = $this->Master_model->getMaster('job_seeker_skills',$where_skill);
			// print_r($js_skills);

								if (isset($js_skills) && !empty($js_skills)) 
				           	 		{
				           	 			$skill_total +=$skills;
				           	 			
				           	 		}

				           	 		$where_ex['job_seeker_id']=$job_seeker;
			$js_experience = $this->Master_model->getMaster('js_experience',$where_ex);
			// print_r($js_skills);

								if (isset($js_experience) && !empty($js_experience)) 
				           	 		{
				           	 			$work_experience_total+=$work_experience;
				           	 			
				           	 		}
		
				          
				          $job_seeker_resume = $this->Master_model->get_master_row('js_attached_resumes', $select =FALSE ,$where="job_seeker_id='$job_seeker'",$join = false);

				          if (isset($job_seeker_resume) && !empty($job_seeker_resume)) 
				           	 		{
				           	 			$attach_resume_total+=$attach_resume;
				           	 			
				           	 		}


							$where_sek['job_seeker_id'] = $job_seeker;

							$js_desired_profile = $this->Master_model->get_master_row("js_career_info", $select = false, $where_sek);
							// print_r($js_desired_profile);

								if (isset($js_desired_profile['industry_id']) && !empty($js_desired_profile['industry_id'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 		}

				           	 		if (isset($js_desired_profile['dept_id']) && !empty($js_desired_profile['dept_id'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['job_role']) && !empty($js_desired_profile['job_role'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 			}		           	 		

				           	 		if (isset($js_desired_profile['shift_id']) && !empty($js_desired_profile['shift_id'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['salary_type']) && !empty($js_desired_profile['salary_type'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['last_salary_hike']) && !empty($js_desired_profile['last_salary_hike'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['availability_date']) && !empty($js_desired_profile['availability_date'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['notice_period']) && !empty($js_desired_profile['notice_period'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['job_area']) && !empty($js_desired_profile['job_area'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['desired_industry']) && !empty($js_desired_profile['desired_industry'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		if (isset($js_desired_profile['avaliable']) && !empty($js_desired_profile['avaliable'])) 
				           	 		{
				           	 			$career_total +=$Desired_profile_each;
				           	 			
				           	 		}

				           	 		

				           	 		// endforeach;

						$total=$personal_total+$education_total+$skill_total+$work_experience_total+$attach_resume_total+$career_total;
				           	 		

				           	 	 ?>
				           	 	 <div class="progress bg-warning">
								 <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $total;?>%"><?php echo round($total); ?> percent Profile completed.
								
								 </div>
								</div>
				           	 	<!-- <div class="progress-bar bg-success" style="width:<?php echo $total;?>%"><?php echo round($total); ?> percent Profile completed.</div> -->
				           	 	<hr>
				           	 	<br>
				           	</div>
		             	</div>
		                <div class="col-md-12">
		                	<div class="col-md-1"><i class="fa fa-user" aria-hidden="true"></i></div>
		                	<div class="col-md-11">
				           	 	<sapn class="title-career"><b>Career Advice</b></sapn> <br><br>
				           	 	<span>Participate in the career advice platform: <a href="#">On</a></span><br>
				           	 	<p class="tag_line">Get career advice by conversing with other LinkedIn users who are leaders in their fields</p><hr>
				           	</div>
		             	</div>
		             	<div class="col-md-12">
		             		<div class="col-md-1"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
		             		<div class="col-md-11">
			           	 		<span class="title-career"><b>Career Interests</b></span><br><br>
			           	 		<span>Let recruiters know you’re open: <a href="#">Off</a></span><br>	
			           	 		<p class="tag_line">Choose the types of opportunities you’d like to be connected with</p><hr>
			           	 	</div>
		             	</div>
		             	<div class="col-md-12">
		             		<div class="col-md-1"><i class="fa fa-money" aria-hidden="true"></i></div>
		             		<div class="col-md-11">
			           	 		<span class="title-career"><b>Salary Insights</b></span><br><br>
			           	 		<p class="tag_line">See how your salary compares to others in the community</p><hr>
			           	 	</div>
		             	</div><br><hr>
					</div>

		                  
                </div> <!-- container end -->
                                          
              </div>
              
            </div>
          </div>
                             
        </div><!-- end col -->
      </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->
</div>





<?php $this->load->view("fontend/layout/footer.php"); ?>
 
<div class="col-md-3">
<?php /*?><div class="userdashnav">
<ul class="usernavdash">
<li><a href="<?php echo base_url(); ?>seeker/personal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Profile</a></li>
<li><a href="<?php echo base_url(); ?>seeker/my-applicaiton"><i class="fa fa-black-tie" aria-hidden="true"></i> Job Application</a></li>
<li><a href="<?php echo base_url(); ?>seeker/resume"><i class="fa fa-file-text-o" aria-hidden="true"></i> View Resume</a></li>
<li><a href="<?php echo base_url(); ?>seeker/downloadcv"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download CV</a></li>
<li><a href="<?php echo base_url() ?>seeker/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>  Logout</a></li>


<li><a title="" href="<?php echo base_url(); ?>">Home</a></li>
<li class="<?=(current_url()==base_url('about-us')) ? 'active':''?>"><a title="" href="<?php echo base_url(); ?>about-us">About Us</a></li>
<li><a title="" href="<?php echo base_url() ?>training">Training</a></li>
<li><a title="" href="<?php echo base_url() ?>/seeker-login">Post Resume</a></li>
<li class="<?=(current_url()==base_url('job')) ? 'active':''?>"><a title="" href="<?php echo base_url() ?>job">All Jobs</a></li>
<li><a title="" href="<?php echo base_url() ?>contact">Contact Us</a></li>

</ul>
    
    
</div><?php */?>

<nav class="side-menu hidden-sm hidden-xs">
  <ul>
    <li> <a href="<?php echo base_url(); ?>seeker/dashboard" class=""> <i class="fa fa-dashboard" aria-hidden="true"></i>My Dashboard </a> </li>
    <li class="title">MY OCEAN RESUME</li>
    <li> <a href="<?php echo base_url() ?>job_seeker/seeker_info" class=""> <i class="fa fa-pencil" aria-hidden="true"></i> My Ocean Profile </a> </li>
    <li> <a href="<?php echo base_url(); ?>seeker/resume" class=""> <i class="fa fa-file-text" aria-hidden="true"></i> View Ocean Resume </a> </li>
   
    <li><a href="<?php echo base_url(); ?>seeker/downloadcv"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Ocean Resume</a></li>
    <!-- <li> <a href="<?php echo base_url(); ?>job_seeker/deletecv" onClick="return confirm('Do you really want to delete your resume?');" class=""> <i class="fa fa-trash" aria-hidden="true"></i> Delete Resume </a> </li> -->
    
    <li class="title">My OceanHunt Activities</li>
    <!-- <li> <a href="<?php echo base_url(); ?>seeker/my-applicaiton" class=""> <i class="fa fa-laptop" aria-hidden="true"></i> My Application</a></li> -->
    
    <li><a href="<?php echo base_url(); ?>seeker/my-saved-jobs"> <i class="fa fa-star" aria-hidden="true"></i>Saved Job Searches in the Ocean</a></li>
    <li><a href="<?php echo base_url(); ?>seeker/my-inbound-job-invitations"> <i class="fa fa-level-down" aria-hidden="true"></i>Inbound Job Invitations </a></li>
    <li><a href="<?php echo base_url(); ?>seeker/my-applicaiton"> <i class="fa fa-level-up" aria-hidden="true"></i>Outbound Job Applications </a></li>
    <li><a href="<?php echo base_url(); ?>how-to-build-cv"> <i class="fa fa-calendar" aria-hidden="true"></i>Ocean Interview Calendar </a></li>
    <li><a href="<?php echo base_url(); ?>seeker/instant-message"> <i class="fa fa-envelope" aria-hidden="true"></i> Ocean Instant Messaging </a></li>
       
     
    <li class="divider"></li>
    <li><a href="<?php echo base_url(); ?>how-to-build-cv"> <i class="fa fa-file-text" aria-hidden="true"></i> How to creat Resume</a></li>
    <li> <a href="<?php echo base_url() ?>training" class=""> <i class="fa fa-television" aria-hidden="true"></i> Trainings </a> </li>
    <li> <a href="<?php echo base_url() ?>job" class=""> <i class="fa fa-search" aria-hidden="true"></i>Search Jobs</a> </li>

    <li class="title">Become an OceanChamp ! </li>

    <li><a href="<?php echo base_url(); ?>seeker/oceanchamp-test"> <i class="fa fa-star" aria-hidden="true"></i> OceanChamp Online Test</a></li>
    <li> <a href="<?php echo base_url() ?>how-to-build-cv" class=""> <i class="fa fa-black-tie" aria-hidden="true"></i> OceanTest Results</a> </li>

    <!--<li> <a href="<?php echo base_url() ?>seeker/logout" class=""> <i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out </a> </li>-->
    
       
    
  </ul>
</nav>


</div><!-- end col -->
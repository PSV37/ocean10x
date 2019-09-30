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
    <style>
* Job Details Page */

.job-details .job-ad-item {
  border: 0;
  margin: 0 0 20px;
  padding: 35px 25px;
}

.job-details .job-ad-item.section {
  padding-bottom: 50px;
} 

.job-details .ad-info {
  margin-bottom: 40px;
}

.job-details .ad-info span,
.job-details .ad-info span a {
  display: inline-block;
  font-size: 30px;
}

.social-media {
  width: 100%;
  overflow: hidden;
  margin-left: 120px;
}

.social-media .button {
  float: left;
  margin-right: 15px;
}

.social-media .btn.btn-primary i {
  font-size: 22px;
  float: left;
  margin-right: 10px;
}

.social-media .btn.btn-primary.bookmark {
  background-color: #0d79bf;
}

.social-media .btn.btn-primary {
  background-color: #93c949;
  margin-top: 0;
  padding: 10px 20px;
}

.social-media .btn.btn-primary:hover {
  background-color: #00a651;
}

.share-social {
  margin-top: 10px;
  display: inline-block;
}

.share-social li {
  float: left;  
  font-weight: 500;
  color: #272727;
}

.share-social li+li {
  margin-left: 25px;
}

.share-social li,
.share-social li a {
  font-size: 18px;
}

.share-social li a .fa-facebook-official {
  color: #0072bc;
}

.share-social li a .fa-twitter-square {
  color: #00aeef;
}

.share-social li a .fa-google-plus-square { 
  color: #eb434a;
}

.share-social li a .fa-linkedin-square {
  color: #448ccb;
}

.share-social li a .fa-pinterest-square {
  color: #ed1c24;
}

.share-social li a .fa-tumblr-square {
  color: #0054a6;
}

.job-description {
  color: #272727;
  font-size: 14px;
  line-height: 22px;
}

.job-details-info h1 {
  font-size: 18px;
  font-weight: 500;
  margin:0 0 20px;
  color: #272727;
}

.description-info span {
  margin-bottom: 20px;
  display: block;
}

.responsibilities span {
  display: block;
}

.job-short-info li,
.company-info li {
  color: #707070;
  margin-bottom: 15px;
  font-size: 16px;
}

.company-info li a,
.job-short-info li a {
  color: #707070;
}

.job-short-info li span.icon {
  font-size: 18px;
  color: #000;
  margin-right: 20px;
  width: 25px;
  display: inline-block;
}

.responsibilities h1,
.requirements h1 {
  margin-top: 45px;
}

.requirements li {
  margin-bottom: 6px;
}

.requirements li:last-child {
  margin-bottom: 0;
}

.job-short-info li span.text-center {
  display: block;
}

.job-short-info li:last-child {
  line-height: 25px;
  margin: 0;
}

.company-info .share-social li {
  margin-bottom: 0;
}

.see-more button {
  background-color: transparent;
  border: 0;
  padding: 0;
  color: #a0a0a0;
  font-size: 14px;
  margin-top: 5px;
}

.see-more i {
  font-size: 16px;
  margin-right: 10px;
}
    </style>  
                


<div class="container">


        <div class="section ad-item job-ad-item">
          <div class="item-info">
            <div class="item-image-box">
              <div class="item-image">
                <img src="images/job/4.png" alt="Image" class="img-responsive">
              </div><!-- item-image -->
            </div>

            <div class="ad-info">
              <span><span><a href="#" class="title">Human Resource Manager</a></span> @ <a href="#"> Dropbox Inc</a></span>
              <div class="ad-meta">
                <ul>
                  <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US</a></li>
                  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                  <li><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</li>
                  <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>HR/Org. Development</a></li>
                  <li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : Oct 27, 2016</li>
                </ul>
              </div><!-- ad-meta -->                  
            </div><!-- ad-info -->
          </div><!-- item-info -->
          <div class="social-media">
            <div class="button">
              <a href="#" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
              <a href="#" class="btn btn-primary bookmark"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Bookmark</a>
            </div>
            <ul class="share-social">
              <li>Share this ad</li>
              <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a></li>
            </ul>
          </div>          
        </div><!-- job-ad-item -->
        
        <div class="job-details-info">
          <div class="row">
            <div class="col-sm-8">
              <div class="section job-description">
                <div class="description-info">
                  <h1>Description</h1>
                  <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
                  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni।</p>
                </div>
                <div class="responsibilities">
                  <h1>Key Responsibilities:</h1>
                  <p>-Execute all visual design stages of website design from concept to final hand-off to development-Create print advertisements, social media advertisements, client collateral &amp; digital resizes according to Client <span> demands</span> With direction of the Creative team, input into new design ideas for client branding-Update &amp; keep all agency collateral materials, including keeping records of Client's logos, fonts, images, etc.  </p>
                </div>
                <div class="requirements">
                  <h1>Minimum Requirements</h1>
                  <ul>
                    <li>Bachelor's Degree</li>
                    <li>2-5 years of relevant experience ( or equivalent educational experience)</li>
                    <li>Experience developing in Wordpress and other web design platforms</li>
                    <li>HTML, CSS and JavaScript experience a plus</li>
                    <li>In depth knowledge &amp; technical experience of Photoshop, Illustrator, InDesign, Adobe PDF, Keynote, PowerPoint, Microsoft Word &amp; Excel</li>
                    <li>Exceptional eye for design, deep understanding of creativity and ability to recognize fresh approaches to Advertising </li>
                    <li>Must be fluent in Spanish; working written and spoken proficiency</li>
                    <li>**All applicants must be eligible to work in the U.S. without sponsorship</li>
                  </ul>
                </div>              
              </div>              
            </div>
            <div class="col-sm-4">
              <div class="section job-short-info">
                <h1>Short Info</h1>
                <ul>
                  <li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posted: 1 day ago</li>
                  <li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job poster: <a href="#">Lance Ladaga</a></li>
                  <li><span class="icon"><i class="fa fa-industry" aria-hidden="true"></i></span>Industry: <a href="#">Marketing and Advertising</a></li>
                  <li><span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>Experience: <a href="#">Entry level</a></li>
                  <li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>Job function: Advertising,Design, <span class="text-center"> Art/Creative</span></li>
                </ul>
              </div>
              <div class="section company-info">
                <h1>Company Info</h1>
                <ul>
                  <li>Compnay Name: <a href="#">Dropbox Inc</a></li>
                  <li>Address: London, United Kingdom</li>
                  <li>Compnay SIze:  2k Employee</li>
                  <li>Industry: <a href="#">Technology</a></li>
                  <li>Phone: +1234 567 8910</li>
                  <li>Email: <a href="#">info@dropbox.com</a></li>
                  <li>Website: <a href="#">www.dropbox.com</a></li>
                </ul>
                <ul class="share-social">
                  <li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                </ul>               
              </div>
            </div>
          </div><!-- row -->          
        </div><!-- job-details-info -->       
      
      <!-- end job-tab -->
   </div>






 <?php $this->load->view("fontend/layout/footer.php"); ?>
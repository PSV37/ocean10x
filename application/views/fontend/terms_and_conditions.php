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


<div class="pageTitle">
  <div class="container">
    <h1 class="page-heading">Terms and conditions</h1>
  </div>
</div>

              
            <div class="section wb">
                <div class="container">
                    <div class="row whoweare">
                        <div class="col-md-8">
                            <div class="about-widget termspage">

<p>You must be 18 years of age or older to visit or use vorerpata-vacancy in any manner. By visiting yourdomain.com or accepting these Terms of Use, You represent and warrant to the Company that You are 18 years of age or older, and that you have the right, authority and capacity to use the Web Site and agree to and abide by these Terms of Use. You also represent and warrant to the company that you will use yourdomain.com in a manner consistent with any and all applicable laws and regulations. </p>
                                
<h4>RESUME DISPLAY</h4>
<ol>
<li>Vorerpata-vacancy Limited requests to provide authentic information/data. </li>
<li>Vorerpata-vacancy Limited can post your CV anywhere that has vacancy and matches the duty and responsibilities. After posting your resume vorerpata-vacancy will have the complete right to it. </li>
<li>Vorerpata-vacancy Limited’s logo and name will be used on every resume. </li>
<li>Vorerpata-vacancy Limited would not be held liable for loss of any data technical or otherwise. </li>
<li>Vorerpata-vacancy Limited reserves its right to reject any insertion or information/data provided by the user without assigning any reason.</li>
<li>Vorerpata-vacancy Limited has the right to make all such modifications/editing of resume in order to fit resume in database.</li>
<li>The user shall have no right to demand any information regarding the organizations to which the resume has been sent and Vorerpata-vacancy Limited would be in no legal or other obligation to disclose/reveal the particulars of the organizations.</li>
</ol>
                                
<h4>JOB LISTING </h4>
<p>We take vacancy post on two different categories that are down below:</p>

<ul>                                
<li><strong>Selected Resume:</strong> In this category, yourdomain.com Limited will sort out the resumes of best applicants that match the job description of the employer. yourdomain.com Limited shall have the sole authority to control these selected resumes.</li>
<li><strong>Commonly searched jobs/browse by categories:</strong> yourdomain.com Limited has no responsibilities over the vacancy posts in this category. The employer should be responsible to control the CV’s and contact the applicants for their vacancy post. </li>
</ul>

<ol>
<li>yourdomain.com Limited will check the vacancy posted by employer and will active the post after 2 hours. </li>
<li>Employer can post vacancies by themselves or they can email the vacancy description to yourdomain.com Limited to post it for them. There is no other way of posting vacancies. </li>
<li>The job posted on yourdomain.com Limited will be up for a period of maximum 60 days, which period is subject to change without notice.</li>
<li>yourdomain.com Limited will add its own logo on the left side of every job post. </li>
<li>yourdomain.com Limited has the right to change the look, design, feature, and illustration of the vacancy post section but will not make any changes to the input given by employer. </li>
<li>yourdomain.com Limited has the right to use employer’s company logo for client list and vacancy branding. </li>
<li>Vorerpata-vacancy Limited reserves its right to reject any insertion or information/data provided by the user without notice if there is any proof of fabrication. </li>
<li>yourdomain.com Limited will send a team to visit the employer’s company when they posts vacancies for the first time on the portal. </li>
<li>Employer cannot make any kind of financial deal/transaction with any applicant from yourdomain.com Limited about giving applicant’s jobs. </li>
<li>Employer will have to make the payment to yourdomain.com Limited within 48 hours of vacancy post, if not then yourdomain.com Limited has the right to remove the vacancy post and all the applicant’s cv from the post. </li>
<li>Payments should be sent to the official Bkash number or bank account of yourdomain.com Limited. yourdomain.com Limited does not accept raw cash as payment. </li>
<li>Vorerpata-vacancy Limited has the right to make all such modifications/editing of the vacancy details in order to fit in the database. </li>
</ol>



<p>
<strong>Please be noted that we can take legal action against you if we find any proof of fabrication of any information on your resume.</strong> <br><br>
Understanding your rights and responsibilities as a Vorerpata-vacancy Limited privacy reminder- <br>
Protect your personal information by never providing credit card, bank account numbers or any other personal information open to misuse, to prospective employers.</p>

<h4>Registration and Password </h4>
<p>
You are responsible for maintaining the confidentiality of your account access information and passwords. You shall be responsible for all uses of your Web Site registrations and passwords, whether or not authorized by you. You are not authorized to share your password or other account access information with any other party, temporarily or permanently, and breach of this obligation may tantamount to disabling the Vorerpata-vacancy Limited account and Services. You agree to immediately notify the Company of any unauthorized use of your Account, and passwords. <br><br>

<strong>Vorerpata-vacancy Limited</strong> has the right to remove any job posting or content from any vorerpata-vacancy web Site, which in the reasonable exercise of <strong>Vorerpata-vacancy Limited</strong> discretion, does not comply with the above Terms, or if any content is posted that vorerpata-vacancy believes is not in the best interest of Vorerpata-vacancy Limited. 
<br><br>
If at any time during your use of the vacancy Services, you made a misrepresentation of fact to Vorerpata-vacancy  or otherwise misled <strong>Vorerpata-vacancy Limited</strong> in regards to the nature of your business activities, <strong>Vorerpata-vacancy Limited</strong> will have grounds to terminate your use of the <strong>Vorerpata-vacancy Limited</strong> Services.
</p>
                                
                                
                                
                            </div>
                            
                        </div>

                        <div class="col-md-4">
                           
                        </div>
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->

 <?php $this->load->view("fontend/layout/footer.php"); ?>
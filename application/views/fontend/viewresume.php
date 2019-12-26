<?php 

  $company_profile_id = $this->session->userdata('company_profile_id');
 $jobseeker_id = $this->session->userdata('job_seeker_id');
 $emp_id = $this->session->userdata('emp_id');
        if ($company_profile_id != null) {
             $this->load->view('fontend/layout/employer_header.php');
            }
        elseif($jobseeker_id != null) {
             $this->load->view('fontend/layout/seeker_header.php');
        }
        elseif ($emp_id != null) {
             $this->load->view('fontend/layout/employee_header.php');
          # code...
        }
         else {
    $this->load->view('fontend/layout/header.php');
    }
?>

<style>
    
.resume-headingone {
    font-size: 14px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: bold;
    padding-left: 10px;
    padding-top: 2px;
    padding-bottom: 2px;
    color: #00A0C6; 
    border-radius: 10px;
}

.resume-textone {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 14px;
    font-weight: normal;
    padding-left: 7px;
    padding-top: 7px;
    padding-bottom: 10px;
}

.resume-texttwo {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 14px;
    font-weight: normal;
    padding-left: 0px;
    padding-top: 2px;
    padding-bottom: 2px;
}

.resume-textthree {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 14px;
    font-weight: normal;
    padding-left: 7px;
    padding-top: 2px;
    padding-bottom: 2px;
}
   .resume-texttfour {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 11px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: normal;
    padding-left: 7px;
    padding-top: 2px;
    padding-bottom: 2px;
}

.resume-header {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 22px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: bold;
    color: #12C560;
    text-align: left;
    padding-bottom:5px;
}
.txt1{font-size:14px; margin-bottom:10px;}
.applicant-name{
   font-size: 18px;
}

#signaturename {
  text-align: center;
  font-weight: bold;
  font-size: 14px;
}

.back-button {
  margin: 30px;
}
.back-button:hover {
  color: #fff !important;
}
#resume{max-width:750px; margin:0 auto}
table td{line-height:24px;}
</style>

<div class="container">
<div id="resume"> 
     <a href="<?php echo base_url().'all-applicants/'.$job_id; ?>" class="btn btn-info back-button" role="button">Back</a>
     <div class="table-responsive">
     <table class="table">
  <tr>
    <td valign="top">
    	<!--Applicant's Name:-->
         <div class="resume-header">Resume of <?php echo $resume->full_name; ?></div>
          
           <!--Contact Address:-->
            <div class="txt1"><strong>Address:</strong> <?php echo $resume->present_address; ?></div>    
         <!--Home Phone:-->
             <div class="txt1"><strong>Voice:</strong> +88<?php echo $resume->mobile; ?> </div>    
         <!--Mobile:-->  
             <div class="txt1"><strong>e-mail:</strong> <?php echo $resume->email; ?></div>    
    </td>
    <td valign="top"><img src="<?php echo base_url() ?>/upload/<?php echo $resume->photo_path; ?>" width="124"></td>
  </tr>
</table>
	</div>

<!-- CAREER SUMMARY : -->
 <?php if(!empty($resume->js_career_sum)): ?>
     <div class="table-responsive">
     <table class="table">      
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Career Summary:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->js_career_sum; ?>   
       </td>
       </tr>      
   </table>
   </div>
<?php endif; ?>
<!-- SPECIAL QUALIFICATION : -->

<!-- <!-
CAREER OBJECTIVE:
-->
  <?php if(!empty($resume->field_sepicalization)): ?>
	<div class="table-responsive">
     <table class="table">       
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Field of Specialization:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->field_sepicalization; ?>
       </td>
       </tr>      
   </table>
   </div>
<?php endif; ?>

<!-- <!-
CAREER OBJECTIVE:
-->
  <?php if(!empty($resume->extracurricular)): ?>

     <div class="table-responsive">
     <table class="table">        
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Extra Curriculum Activities:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->extracurricular; ?>
       </td>
       </tr>      
   </table>
   </div>
<?php endif; ?>



<!-- EMPLOYMENT HISTORY, TOTAL YEAR OF EXPERIENCE: -->

 <?php if(!empty($experinece_list)): ?>
   <div class="table-responsive">
     <table class="table"> 
        <!--
        Employment History:
        -->
        <tbody><tr>
        <td colspan="6" bgcolor="#F4F4F4" class="resume-headingone">Employment History:</td>
        </tr>
        <!--Total Year of Experience:-->
        <?php foreach ($experinece_list as $v_experience) : ?>

      
                 <tr>
                 <td class="resume-headingtwo" align="center">&nbsp;</td>
                 <td colspan="5" class="resume-textone" align="left">
                <!--Company Name:-->
                 <strong><?php echo $v_experience->company_name ;?></strong>
                <br>                
                
                <!--Department:-->
                  <div class="txt1">Address: <?php echo $v_experience->address ;?></div>
                    
                  <div class="txt1">Designation: <?php echo $v_experience->designation ;?></div>
                    
                   <div class="txt1">Department: <?php echo $v_experience->department ;?></div>
                      
                   <div class="txt1">Job Level: <?php echo $this->job_level_model->get_job_level_by_id($v_experience->job_level) ;?></div>
                        
                     <div class="txt1">Duration: <?php $today=date("Y-m-d"); if($v_experience->end_date=="2017-08-30") {
                      echo date_calculate($today, $v_experience->start_date);
                    }else { echo date_calculate($v_experience->end_date, $v_experience->start_date); }?></div>
                    
                    
                <?php if(!empty($v_experience->achievement)): ?>
                <div class="txt1"><strong><i>Achievement:</i></strong> </div>                
                <div class="txt1"><?php echo $v_experience->achievement;?></div>
                 <?php endif; ?>
                
                <?php if(!empty($v_experience->major_activity)): ?>
                <div class="txt1"><strong><i>Major Activity:</i></strong></div> 
                
                <div class="txt1"><?php echo $v_experience->major_activity;?></div>
                  
                  <?php endif; ?>
                 <?php if(!empty($v_experience->responsibilities)): ?>
                 <div class="txt1"><strong><i>Job Responsibilty:</i></strong>  </div>
                <div class="txt1"><?php echo $v_experience->responsibilities;?></div>
                <?php endif; ?>
                <!--Area of Experience :-->
                <!--IMPLEMENT LATER<br />-->
                
                 </td>
                 </tr>

                 <?php
                    endforeach;
                    ?>            
   </tbody>
   </table>
   </div>
<?php endif; ?>

   <!-- <!-
Jobs Duty & Responsibility::
--><?php if(!empty($resume->responsibilities)): ?>
     <div class="table-responsive">
     <table class="table">  
                   
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Jobs Duty & Responsibility:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->responsibilities; ?>
       </td>
       </tr>      
   </table>
 </div>
<?php endif; ?>
      <!-- <!-
Achievement:
-->

 <?php if(!empty($resume->achievement)): ?>
     <div class="table-responsive">
     <table class="table">    
       
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Achievement:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->achievement; ?>
       </td>
       </tr>      
   </table>
   </div>
<?php endif; ?>
<!-- <!-
Major Activities::
--> 
<?php if(!empty($resume->major_activity)): ?>
     <div class="table-responsive">
     <table class="table">     
       
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Major Activities:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->major_activity; ?>
       </td>
       </tr>      
   </table>
   </div>
   <?php endif; ?>

   <!-- <!-
Skills:
-->
<?php if(!empty($resume->skills)): ?>
     <div class="table-responsive">
     <table class="table">       
       <tr>
       <td bgcolor="#F4F4F4" class="resume-headingone">Skills:</td>
       </tr>
       
       <tr>
       <td class="resume-textone" align="left">
       <?php echo $resume->skills; ?>
       </td>
       </tr>      
   </table>
   </div>
      <?php endif; ?>


<?php if(!empty($edcuaiton_list)): ?>
    <div class="table-responsive">
     <table class="table">
       <tbody><tr>
       <td colspan="6" class="resume-headingone">Educations:</td>
       </tr>
   
       <tr>
       <td colspan="6" align="left">
       <table width="100%">
           <tbody><tr class="resume-texttwo">
           <td width="20%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Exam Title</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Specialization</strong></td>
           <td width="20%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Institute</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Result</strong></td>
           
                <td width="15%"  align="center" bgcolor="#f4f4f4"><strong>Pas.Year</strong></td>              

           </tr>         
            <?php foreach ($edcuaiton_list as $v_education) : ?>

                 <tr class="resume-texttwo">
               <!--Exam Title:-->
                <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="20%">
               <?php echo $v_education->education_level_name ; ?>
               &nbsp;
               </td>
                <!--Concentration/Major:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
              <?php echo $v_education->education_specialization ; ?>
               &nbsp;
               </td>
                <!--Institute:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
               <?php echo $v_education->js_institute_name ; ?>
               &nbsp;            
               </td>
                <!--Result:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_education->js_resut  ; ?>
               &nbsp;               
               </td>
                <!--Passing Year:-->
               
                   <td style="border-top:1px solid #EAE7E7;" align="center" width="12.5%">
                    <?php echo $v_education->js_year_of_passing ; ?>
                   &nbsp;
                    </td>
                  </tr>
               
                <?php
                       endforeach;
                    ?>
                    
                      
       </tbody></table> 
       </td>
       </tr>
    </tbody></table>
	</div>
 <?php endif; ?>

    
  
<?php if(!empty($training_list)): ?>
    <div class="table-responsive">
     <table class="table">
       <tbody><tr>
       <td colspan="6" bgcolor="#F4F4F4" class="resume-headingone">Trainings:</td>
       </tr>
   
       <tr>
       <td colspan="6" align="left">
       <table width="100%">
           <tbody>
             <tr class="resume-texttwo">
           <td width="20%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Title</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Topic</strong></td>
           <td width="20%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Institute</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Location</strong></td>
		   <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>State</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Country</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Year</strong></td>
           
                <td width="15%"  align="center" bgcolor="#f4f4f4"><strong>Duration</strong></td>              

           </tr>         
            <?php foreach ($training_list as $v_training) : ?>

                 <tr class="resume-texttwo">
               <!--Exam Title:-->
                <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="20%">
               <?php echo $v_training->training_title  ; ?>
               &nbsp;
               </td>
                <!--Concentration/Major:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
              <?php echo $v_training->training_topic  ; ?>
               &nbsp;
               </td>
                <!--Institute:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
               <?php echo $v_training->institute ; ?>
               &nbsp;            
               </td>
                <!--city:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_training->city_name  ; ?>
               &nbsp;               
               </td>
			    <!--state:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_training->state_name  ; ?>
               &nbsp;               
               </td>
			    <!--country:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_training->country_name  ; ?>
               &nbsp;               
               </td>

               <!--Result:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_training->training_year; ?>
               &nbsp;               
               </td>
                <!--Passing Year:-->
               
                   <td style="border-top:1px solid #EAE7E7;" align="center" width="12.5%">
                    <?php echo $v_training->duration  ; ?>
                   &nbsp;
                   </td>
                </tr>
               
                <?php
                       endforeach;
                    ?>
                    
                      
       </tbody></table> 
       </td>
       </tr>
    </tbody></table>
</div>
 <?php endif; ?>

<!-- <!-
Career and Application Information::
-->
<div class="table-responsive">
     <table class="table">
    <!--
    Career and Application Information:
    -->
    <tbody><tr>
    <td colspan="6" bgcolor="#F4F4F4" class="resume-headingone">Salary and Location:</td>
    </tr>
  
    <tr>
    <td colspan="6" class="BDJNormalText01" align="left">
    <table width="100%">
      <!--Looking For:-->
      
         <tbody>
            
      <!--Available For:-->
      <?php if(!empty($resume->avaliable)): ?>
         <tr class="resume-textthree">
         <td align="left">Available  For</td>
         <td align="left">
         <?php echo $resume->avaliable ?>
         </td>
         </tr>
       <?php endif; ?>
      
      <!--Present Salary:-->
      
      <!--Expected Salary:-->
      <?php if(!empty($resume->js_career_salary)):?>

      <tr class="resume-textthree">
      <td align="left">Expected Salary</td>
      <td align="left">
     <?php  echo $resume->js_career_salary;  ?>
      </td>
      </tr>
    <?php endif; ?>

    <!--Preferable Job Area:-->
      <?php if(!empty($resume->job_area)):?>

      <tr class="resume-textthree">
      <td align="left" width="22%">Preferable Job Area</td>
      <td align="center" width="2%">:</td>
      <td align="left" width="76%">
     <?php  echo $resume->job_area;  ?>
      </td>
      </tr>
    <?php endif; ?>
               
    </tbody></table>
    </td>
    </tr>
  </tbody></table>
</div>
     





<!--
Specialization:
-->
<?php if(!empty($resume->specialization)): ?>

     <div class="table-responsive">
     <table class="table">
      <tbody><tr>
      <td colspan="6" class="resume-headingone">Specialization:</td>
      </tr>
             
          <tr>
          <td colspan="6" class="resume-textone" align="left">
          <table class="table">
            <tbody><tr>
            
                <td class="resume-texttwo" style="border-bottom:1px solid #EAE7E7;" align="center" width="40%">
                <strong>Fields of Specialization</strong>
                </td>
            
            </tr><tr>
            
                 <td class="resume-textthree" align="left" width="40%">
                    <?php echo $resume->specialization; ?><br> 
                    &nbsp;
              </td>
                    
            </tr>    
          </tbody></table> 
          </td>
          </tr>
      
</tbody></table>
</div>
<?php endif; ?>
<!--
EXTRA CURRICULAR ACTIVITIES, LANGUAGE PROFICIENCY:
-->

<!--
Language Proficiency:
-->
<!--
PERSONAL DETAILS:
-->

    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="750">
      <!--
      Personal Details
      -->
      <tbody><tr>
      <td colspan="6" class="resume-headingone">Personal Details :</td>
      </tr>
   
      <tr>
      <td colspan="6" class="resume-textone" align="left">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
         <!--Fathers Name:-->
         
             <tbody><tr class="resume-textthree">
             <td style="padding-left:10px;" align="left" width="22%">Father's Name </td>
             <td align="center" width="2%">:</td>
             <td align="left" width="76%">
             <?php echo $resume->father_name; ?>
             </td>
             </tr>
         
         <!--Mothers Name:-->
         
             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left" width="22%">Mother's Name </td>
             <td align="center" width="2%">:</td>
             <td align="left" width="76%">
            <?php echo $resume->mother_name; ?>
             </td>
             </tr>
         
         <!--Date of Birth:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left" width="22%">Date  of Birth</td>
         <td align="center" width="2%">:</td>
         <td align="left" width="76%">
         <?php echo date('j F Y',strtotime($resume->date_of_birth)); ?>  
         </td>
         </tr>
         <!--Gender:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left" width="22%">Gender</td>
         <td align="center" width="2%">:</td>
         <td align="left" width="76%">
         Male
         </td>
         </tr>
        
         <!--Nationality:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left">Nationality</td>
         <td align="center">:</td>
         <td align="left">
         <?php echo $resume->nationality; ?> 
         </td>
         </tr>
            
         <!--Religion:-->
         
             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left">NID</td>
             <td align="center">:</td>
             <td align="left">
             <?php if($resume->national_id=="0") { echo "";} else { echo $resume->national_id;} ?>
             </td>
             </tr>
         
         <!--Permanent Address:-->
         
             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left">Permanent  Address</td>
             <td align="center">:</td>
             <td align="left">
             <?php echo $resume->parmanent_address; ?>
             </td>
             </tr>
         
         <!--Current Location:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left">Current  Location</td>
         <td align="center">:</td>
         <td align="left">       
         <?php echo $resume->present_address; ?>   
         </td>
         </tr>
      </tbody></table>
      </td>
      </tr>
   </tbody></table>
   <?php if(!empty($final_result)): ?>
    <div class="table-responsive">
     <table class="table">
       <tbody><tr>
       <td colspan="6" class="resume-headingone"><?php echo $resume->full_name; ?> Is an Ocean-champ</td>
       </tr>
   
       <tr>
       <td colspan="6" align="left">
       <table width="100%">
           <tbody><tr class="resume-texttwo">
           <td width="20%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Skill</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Topics</strong></td>
           <td width="20%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Level</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Result</strong></td>
           <td width="15%" align="center" bgcolor="#f4f4f4" style="border-right:1px solid #EAE7E7"><strong>Performance</strong></td>              

           </tr>         
            <?php $sr_no=0; foreach ($final_result as $result) : 

              $sr_no++; 

              $skill_id = $result['skill_id'];
             
              $exam_res = getOceanExamResultByID($jobseeker_id,$skill_id); 

              $exam_topic = getOceanExamTopicByID($result->topic_id); 
              // echo "<pre>";
              // print_r($exam_topic);
              if (!empty($exam_res)): foreach ($exam_res as $res_row) :
              $marks = $res_row['total_marks']; 
              $percentage = ($marks * 100)/NUMBER_QUESTIONS; ?>

                 <tr class="resume-texttwo">
               <!--Exam Title:-->
                <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="20%">
               <?php echo $result->skill_name ; ?>
               &nbsp;
               </td>
                <!--Concentration/Major:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
              
               <?php
                if (!empty($exam_topic)){ 
                  foreach ($exam_topic as $top_row) { 
                    echo  $top_row['topic_name'].', '; 
                  } 
                } 
              ?>
               &nbsp;
               </td>
                <!--Institute:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
                <td><?php echo $result->level; ?></td>
               &nbsp;            
               </td>
                <!--Result:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
               <td><?php echo $res_row->total_marks; ?></td>
               &nbsp;               
               </td>
                <!--Passing Year:-->
               
                   <td style="border-top:1px solid #EAE7E7;" align="center" width="12.5%">
                    <?php
                   $per = round($percentage, 2).'%'; 
                   if($per<=25)
                   {
                      echo '<span class="label label-danger">Average</span>';
                   }
                   else if($per > 25 && $per <= 50)
                   {
                      echo '<span class="label label-warning">Good</span>';
                   } else if($per > 50 && $per <= 75)
                   {
                      echo '<span class="label label-info">Very Good</span>';
                   }
                   else if($per > 75 && $per <= 100)
                   {
                      echo '<span class="label label-success">Excelent</span>';
                   }
                ?>
                   &nbsp;
                    </td>
                  </tr>
               
                <?php
                       endforeach;
                    ?>
                    
                      
       </tbody></table> 
       </td>
       </tr>
    </tbody></table>
  </div>
 <?php endif; ?>



<!--
REFERENCE:
-->
<?php if (!empty($reference_list)): ?>
    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="750">
      <!--
      Reference:
      -->
      <tbody><tr>
      <td colspan="6" class="resume-headingone">Reference (s):</td>
      </tr>
      
      <tr>
      <td colspan="6" class="resume-textone" align="left">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
         
              <!--Name:-->
                    <?php  foreach ($reference_list as $v_reference) : ?>
                      <tbody><tr class="resume-textthree">
                    
                      <td style="padding-left:10px;" align="left" width="22%">Full Name </td>
                      <td align="center" width="2%">:</td>
                      <td align="left" width="35%">
                      <?php echo $v_reference->name;; ?>
                      &nbsp;
                      </td>
                      
                          <td align="left" width="41%">
                          
                          </td>
                        
                      </tr>
               
              <!--Organization:-->
                   
              <tr class="resume-textthree">
                  
              <td style="padding-left:10px;" align="left" width="22%">Organization</td>
              <td align="center" width="2%">:</td>
              <td align="left" width="35%">
             <?php echo $v_reference->company_profile_id; ?>
              &nbsp;
              </td>
                  
                      <td align="left" width="41%">
                                   
                      </td>
                  
              </tr>
                   
              <!--Designation:-->    
                  
                      <tr class="resume-textthree">
                     
                      <td style="padding-left:10px;" align="left" width="22%">Designation</td>
                      <td align="center" width="2%">:</td>
                      <td align="left" width="35%">
                      <?php echo $v_reference->designation_name; ?>
                      &nbsp;
                      </td>
                      
                              <td align="left" width="41%">
                                            
                              </td>
                        
                      </tr>
                 
                              
              <!--Phone(Off):--> 
                 
              <!--Phone(Res):-->
                   
              <!--Mobile:-->
                   
                      <tr class="resume-textthree">
                     
                      <td style="padding-left:10px;" align="left">Voice</td>
                      <td align="center">:</td>
                      <td align="left">
                     <?php echo $v_reference->mobile; ?>
                      &nbsp;
                      </td>
                       
                          <td align="left">
                                      
                          </td>
                     
                      </tr>
                  
              <!--E-Mail:-->
                     
                      <tr class="resume-textthree">
                      
                      <td style="padding-left:10px;" align="left">E-Mail</td>
                      <td align="center">:</td>
                      <td align="left">
                     <?php echo $v_reference->email; ?>
                      &nbsp;
                      </td>
                      
                          <td align="left">
                                      
                          </td>
                      
                      </tr>
                  
              <!--Relation:-->
                  
                      <tr class="resume-textthree">
                      
                      <td style="padding-left:10px;" align="left">Relation</td>
                      <td align="center">:</td>
                      <td align="left">
                      <?php echo $v_reference->relation; ?>
                      &nbsp;
                      </td>
                     
                          <td align="left">
                                                  
                          </td>
                  
                      </tr>
                  
              
              <tr class="resume-textthree">
              <td align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td colspan="2" align="left">
              </td>
              </tr>
            
      </tbody>
<?php
                    endforeach;
                    ?>
      </table>
      </td>
      </tr>
   </tbody></table>
<?php endif; ?>

    <table style="margin-bottom:30px !important;" align="center" border="0" cellpadding="0" cellspacing="0" width="750"> 
    <tr class="resume-textthree">
          <td style="padding-left:10px; border-top:1px solid;" align="left" width="22%">
      <div id="signaturename">
        Signature:
      </div>

          </td>

          <!--<td style="padding-right:50px;" align="right" width="70%"><?php echo get_logo();?> </td>-->


    </table>     
    

  </tbody></table>
        </div>
</div>
 <?php $this->load->view("fontend/layout/footer.php"); ?>
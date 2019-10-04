<?php
$Filename=$resume->full_name;
$Filename=str_replace(" ", "_", $Filename);
header("Content-type: application/msword");
header("Content-Disposition: attachment;Filename={$Filename}.doc");
?>


<style type="text/css">
   
.resume-headingone {
    font-size: 13px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: bold;
    padding-left: 20px;
    padding-top: 2px;
    padding-bottom: 2px;
    color: #00A0C6; 
    border-radius: 10px;
}

.resume-textone {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 11px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: normal;
    padding-left: 40px;
    padding-top: 7px;
    padding-bottom: 10px;
}

.resume-texttwo {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 11px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: normal;
    padding-top: 2px;
    padding-bottom: 2px;
}

.resume-textthree {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 11px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: normal;
    padding-left: 45px;
    padding-top: 2px;
    padding-bottom: 2px;
}
   .resume-texttfour {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 11px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: normal;
    padding-left: 45px;
    padding-top: 2px;
    padding-bottom: 2px;
}

.resume-header {
    background: #FFF none repeat scroll 0% 0%;
    font-size: 22px;
    font-family: Verdana,Geneva,sans-serif;
    font-weight: bold;
    color: #12C560;
    padding-left: 7px;
    text-align: center;
    padding-bottom: 3.5px;
}

.applicant-name{
   font-size: 18px;
}

#signaturename {
  text-align: center;
  font-weight: bold;
  font-size: 12px;
}

</style>

<div id="resume"> 
         <center><h4>Resume</h4></center>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">
      <tbody><tr>
      <td colspan="6">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
         <tbody><tr>
         <td class="resume-header" align="center" height="" valign="bottom" width="73%">
         <!--Applicant's Name:-->
         </td>

         <td rowspan="2" align="right" valign="bottom" width="27%">
         <!--Photograph:-->
         
            <table align="center" border="0" cellpadding="0" cellspacing="7" height="140" width="140">
               <tbody><tr> 
               <td align="center" height="135" valign="middle" width="126"> 
               <img src="<?php echo base_url() ?>upload/<?php if(!empty($job_seeker_photo->photo_path)) { echo $job_seeker_photo->photo_path;} else { echo "image-notfound.png";} ?>" alt="Photo" height="120" width="124">
               </td>
               </tr>
            </tbody></table>
         
         </td>
         </tr>
        
      </tbody></table>
      </td>
      </tr>
   </tbody></table>
 <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">
      <tbody><tr>
      <td colspan="6">
         <tr>
           <td colspan="6" style="padding-left:20px;" class="resume-textone" align="left">
			<?php if(!empty($resume->full_name)) {echo "Name " . $resume->full_name;} ?><br/>
            <?php if(!empty($resume->present_address)) {echo "Address " . $resume->present_address;} ?> <br/>       
            <?php if(!empty($resume->mobile)) {echo "Mobile:" . $resume->mobile;} ?> <br/>       
            <?php if(!empty($resume->email)) {echo "E-mail: " . $resume->email;} ?>        

            </td>
         </tr>
         
         </td>
         </tr>
        
      </tbody></table>
      </td>
      </tr>
   </tbody></table>

<!-- CAREER SUMMARY : -->
 <?php if(!empty($resume->js_career_sum)): ?>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>
       <tr>
       <td colspan="6" class="resume-headingone"><u>Career Summary:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:20px;" class="resume-textone" align="left">
       <?php echo $resume->js_career_sum; ?>   
       </td>
       </tr>      
   </tbody></table>
<?php endif; ?>
<!-- SPECIAL QUALIFICATION : -->

<!-- <!-
CAREER OBJECTIVE:
-->
  <?php if(!empty($resume->field_sepicalization)): ?>

     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>       
       <tr>
       <td colspan="6" class="resume-headingone"><u>Field of Specialization:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:20px;" class="resume-textone" align="left">
       <?php echo $resume->field_sepicalization; ?>
       </td>
       </tr>      
   </tbody></table>
<?php endif; ?>


 <!-- <!-
 extracurricular activity:
-->
  <?php if(!empty($resume->extracurricular)): ?>

     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>
       <tr>
       <td colspan="6" class="resume-headingone"><u>Extra Curricular Activities:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:20px;" class="resume-textone" align="left">
       <?php echo $resume->extracurricular; ?>
       </td>
       </tr>      
   </tbody></table>
<?php endif; ?>




<!-- EMPLOYMENT HISTORY, TOTAL YEAR OF EXPERIENCE: -->

 <?php if(!empty($experinece_list)): ?>
    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
        <!--
        Employment History:
        -->
        <tbody><tr>
        <td colspan="6" class="resume-headingone"><u>Employment History:</u></td>
        </tr>
        <!--Total Year of Experience:-->
        <?php $i=1; foreach ($experinece_list as $v_experience) : ?>

      
                 <tr>
                 <td class="resume-headingtwo" align="center">&nbsp;</td>
                 <td colspan="5" class="resume-textone" align="left">
                <!--Company Name:-->
                 <strong><?php echo $i++.'. '.$v_experience->company_name ;?></strong>
                <br>                
                
                <!--Department:-->
                  Address: <?php echo $v_experience->address ;?>
                    <br> 
                      Designation: <?php echo $v_experience->designation ;?>
                    <br> 
                      Department: <?php echo $v_experience->department ;?>
                    <br>  
                     Job Level: <?php echo $this->job_level_model->get_job_level_by_id($v_experience->job_level) ;?>
                       <br>  
                     Duration: <?php if($v_experience->end_date=="1970-01-01" || $v_experience->end_date==null) {
                      echo date('j F,Y',strtotime($v_experience->start_date)).' - Continuing';
                    }else {
                      $start_date=date('j F,Y',strtotime($v_experience->start_date));
                      $end_date=date('j F,Y',strtotime($v_experience->end_date));
                     echo $start_date." - ".$end_date;}
                     ?>
                    <br>
                    <?php if(!empty($v_experience->achievement)): ?>
                <strong><i><u>Achievement:</u></i></strong>    
                 <?php echo $v_experience->achievement;?>
                 <?php endif; ?>
                 <br>
                <?php if(!empty($v_experience->major_activity)): ?>
                <strong><i><u>Major Activity:</u></i></strong> 
                <br>   
                <?php echo $v_experience->major_activity;?>
                  <?php endif; ?>
                 <?php if(!empty($v_experience->responsibilities)): ?>
                  <br>
                 <strong><i><u>Job Responsibility:</u></i></strong>   
                 <br> 
                <?php echo $v_experience->responsibilities;?>
                <?php endif; ?>
                <!--Area of Experience :-->
                <!--IMPLEMENT LATER<br />-->
                
                 </td>
                 </tr>

                 <?php
                    endforeach;
                    ?>            
   </tbody></table>
<?php endif; ?>

   <!-- <!-
Jobs Duty & Responsibility::
--><?php if(!empty($resume->responsibilities)): ?>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>               
       <tr>
       <td colspan="6" class="resume-headingone"><u>Jobs Duty & Responsibility:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:5px;  text-align:justify;" class="resume-textone" align="justify">
       <?php echo $resume->responsibilities; ?>
       </td>
       </tr>      
   </tbody></table>
<?php endif; ?>
      <!-- <!-
Achievement:
-->

 <?php if(!empty($resume->achievement)): ?>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>        
       <tr><td colspan="6">&nbsp;</td></tr>      
       
       <tr>
       <td colspan="6" class="resume-headingone"><u>Achievement:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:5px;" class="resume-textone" align="left">
       <?php echo $resume->achievement; ?>
       </td>
       </tr>      
   </tbody></table>
<?php endif; ?>
<!-- <!-
Major Activities::
--> 
<?php if(!empty($resume->major_activity)): ?>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>        
       <tr><td colspan="6">&nbsp;</td></tr>      
       
       <tr>
       <td colspan="6" class="resume-headingone"><u>Major Activities:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:5px;" class="resume-textone" align="left">
       <?php echo $resume->major_activity; ?>
       </td>
       </tr>      
   </tbody></table>
   <?php endif; ?>

   <!-- <!-
Skills:
-->
<?php if(!empty($resume->skills)): ?>
     <table align="center" border="0" cellpadding="0" cellspacing="0" width="630">  
       <tbody>               
       <tr>
       <td colspan="6" class="resume-headingone"><u>Skills:</u></td>
       </tr>
       
       <tr>
       <td colspan="6" style="padding-left:40px;" class="resume-textone" align="left">
       <?php echo $resume->skills; ?>
       </td>
       </tr>      
   </tbody></table>
      <?php endif; ?>


<?php if(!empty($edcuaiton_list)): ?>
    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
       <tbody><tr>
       <td colspan="6" class="resume-headingone"><u>Education:</u></td>
       </tr>
   
       <tr>
       <td colspan="6" style="padding-left:20px;" class="resume-textone" align="left">
       <table style="border:1px solid #EAE7E7" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
           <tbody><tr class="resume-texttwo">
           <td style="border-right:1px solid #EAE7E7" align="center" width="20%"><strong>Exam Title</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="15%"><strong>Concentration/Major</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="20%"><strong>Institute</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="15%"><strong>Result</strong></td>
           
                <td  align="center" width="15%"><strong>Pas.Year</strong></td>              

           </tr>         
            <?php foreach ($edcuaiton_list as $v_education) : ?>

                 <tr class="resume-texttwo">
               <!--Exam Title:-->
                <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="20%">
               <?php echo $v_education->js_degree ; ?>
               &nbsp;
               </td>
                <!--Concentration/Major:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="15%">
              <?php echo $v_education->js_group ; ?>
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

 <?php endif; ?>

    
  
<?php if(!empty($training_list)): ?>
    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
       <tbody><tr>
       <td colspan="6" class="resume-headingone"><u>Training:</u></td>
       </tr>
   
       <tr>
       <td colspan="6" style="padding-left:20px;" class="resume-textone" align="left">
       <table style="border:1px solid #EAE7E7" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
           <tbody><tr class="resume-texttwo">
           <td style="border-right:1px solid #EAE7E7" align="center" width="20%"><strong>Title</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Topic</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Institute</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Country</strong></td>
           <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Year</strong></td>
            <td style="border-right:1px solid #EAE7E7" align="center" width="12%"><strong>Location</strong></td>
           
                <td  align="center" width="12%"><strong>Duration</strong></td>              

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
                <!--Result:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_training->country  ; ?>
               &nbsp;               
               </td>

               <!--Result:-->
               <td style="border-right:1px solid #EAE7E7;border-top:1px solid #EAE7E7;" align="center" width="12.5%">
              <?php echo $v_training->training_year; ?>
               &nbsp;               
               </td>
                <!--Passing Year:-->
               
                   <td style=" border-right:1px solid #EAE7E7; border-top:1px solid #EAE7E7; border-top:1px solid #EAE7E7;" align="center" width="12.5%">
                    <?php echo $v_training->location; ?>
                   &nbsp;
                    </td>

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

 <?php endif; ?>



<!-- <!-
Career and Application Information::
-->
<?php if(!empty($resume->avaliable) ||  !empty($resume->js_career_salary) || !empty($resume->job_area)): ?>
<table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
    <!--
    Career and Application Information:
    -->
    <tbody>
           <tr><td colspan="6">&nbsp;</td></tr>    
    <tr>
    <td colspan="6" class="resume-headingone"><u>Salary, Job Level and Location:</u></td>
    </tr>
  
    <tr>
    <td colspan="6" class="resume-textone" align="left">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
      <!--Looking For:-->
      
         <tbody>
            
      <!--Available For:-->
      <?php if(!empty($resume->avaliable)): ?>
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left" width="22%">Available  For</td>
         <td align="center" width="2%">:</td>
         <td align="left" width="76%">
         <?php echo $resume->avaliable ?>
         </td>
         </tr>
       <?php endif; ?>
      
      <!--Present Salary:-->
      
      <!--Expected Salary:-->
      <?php if(!empty($resume->js_career_salary)):?>

      <tr class="resume-textthree">
      <td style="padding-left:10px;" align="left" width="22%">Expected Salary</td>
      <td align="center" width="2%">:</td>
      <td align="left" width="76%">
     <?php  echo $resume->js_career_salary;  ?>
      </td>
      </tr>
    <?php endif; ?>

    <!--Preferable Job Area:-->
      <?php if(!empty($resume->job_area)):?>

      <tr class="resume-textthree">
      <td style="padding-left:10px;" align="left" width="22%">Preferable Area</td>
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

<?php elseif(!empty($resume->avaliable) &&  !empty($resume->js_career_salary) && !empty($resume->job_area)): ?>

<?php endif; ?>


<!--
Specialization:
-->
<?php if(!empty($resume->specialization)): ?>

     <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
      <tbody><tr>
      <td colspan="6" class="resume-headingone"><u>Specialization:</u></td>
      </tr>
             
          <tr>
          <td colspan="6" style="padding-left:5px;" class="resume-textone" align="left">
          <table style="border:1px solid #EAE7E7" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
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

    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
      <!--
      Personal Details
      -->
      <tbody><tr>
      <td colspan="6" class="resume-headingone"><u>Personal Details :</u></td>
      </tr>
   
      <tr>
      <td colspan="6" class="resume-textone" align="left">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
         <!--Fathers Name:-->
         
             <tbody>

            <?php if(!empty($resume->father_name)): ?>

             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left" width="22%">Father's Name </td>
             <td align="center" width="2%">:</td>
             <td align="left" width="76%">
             <?php echo $resume->father_name; ?>
             </td>
             </tr>
           <?php endif; ?>
         
         <!--Mothers Name:-->
         <?php if(!empty($resume->mother_name)): ?>
             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left" width="22%">Mother's Name </td>
             <td align="center" width="2%">:</td>
             <td align="left" width="76%">
            <?php echo $resume->mother_name; ?>
             </td>
             </tr>
             <?php endif; ?>
         
          <?php if(!empty($resume->date_of_birth) && $resume->date_of_birth!="0000-00-00"): ?>
         <!--Date of Birth:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left" width="22%">Date  of Birth</td>
         <td align="center" width="2%">:</td>
         <td align="left" width="76%">
         <?php echo date('j F Y',strtotime($resume->date_of_birth)); ?>  
         </td>
         </tr>
          <?php endif; ?>

           <?php if(!empty($resume->gender)): ?>
         <!--Gender:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left" width="22%">Gender</td>
         <td align="center" width="2%">:</td>
         <td align="left" width="76%">
          <?php if($resume->gender=="1"){ echo "Male";} else { echo "female";}?>
         </td>
         </tr>
          <?php endif; ?>
        
         <!--Nationality:-->
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left">Nationality</td>
         <td align="center">:</td>
         <td align="left">
         Bangladeshi
         </td>
         </tr>
            
         <!--Religion:-->
         
<?php if(!empty($resume->national_id) && $resume->national_id!="0"): ?>

             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left">NID</td>
             <td align="center">:</td>
             <td align="left">
             <?php if($resume->national_id=="0") { echo "";} else { echo $resume->national_id;} ?>
             </td>
             </tr>
         
          <?php endif; ?>
         <!--Permanent Address:-->
           <?php if(!empty($resume->parmanent_address)): ?>
             <tr class="resume-textthree">
             <td style="padding-left:10px;" align="left">Permanent  Address</td>
             <td align="center">:</td>
             <td align="left">
             <?php echo $resume->parmanent_address; ?>
             </td>
             </tr>
         <?php endif; ?>

         <!--Current Location:-->
 <?php if(!empty($resume->present_address)): ?>
         <tr class="resume-textthree">
         <td style="padding-left:10px;" align="left">Current  Location</td>
         <td align="center">:</td>
         <td align="left">       
         <?php echo $resume->present_address; ?>   
         </td>
         </tr>
      <?php endif; ?>
      </tbody></table>
      </td>
      </tr>
   </tbody></table>
   



<!--
REFERENCE:
-->
<?php if (!empty($reference_list)): ?>
    <table style="margin-top:3px;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
      <!--
      Reference:
      -->
      <tbody><tr>
      <td colspan="6" class="resume-headingone"><u>Reference (s):</u></td>
      </tr>
      
      <tr>
      <td colspan="6" class="resume-textone" align="left">
      <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
         

              <!--Name:-->
                    <?php $i=1; foreach ($reference_list as $v_reference) : ?>
                      <tbody>

                    <tr class="resume-textthree"> 
                  <td style="padding-left:10px;" align="left" width="22"><b>Reference : <?php echo $i++; ?></b></td>
                    </tr>
                      <tr class="resume-textthree">
                      <td style="padding-left:10px;" align="left" width="22%">Full Name </td>
                      <td align="center" width="2%">:</td>
                      <td align="left" width="70%">
                      <?php echo $v_reference->name;; ?>
                      &nbsp;
                      </td>

                        
                      </tr>
               
              <!--Organization:-->
                   
              <tr class="resume-textthree">
                  
              <td style="padding-left:10px;" align="left" width="22%">Organization</td>
              <td align="center" width="2%">:</td>
              <td align="left" width="70%">
              <?php echo $v_reference->org_name; ?>
              &nbsp;
              </td>
                  
                  
              </tr>
                   
              <!--Designation:-->    
                  
                      <tr class="resume-textthree">
                     
                      <td style="padding-left:10px;" align="left" width="22%">Designation</td>
                      <td align="center" width="2%">:</td>
                      <td align="left" width="70%">
                      <?php echo $v_reference->designation; ?>
                      &nbsp;
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
                     
                      </tr>
                  
              <!--E-Mail:-->
                     
                      <tr class="resume-textthree">
                      
                      <td style="padding-left:10px;" align="left">E-Mail</td>
                      <td align="center">:</td>
                      <td align="left">
                     <?php echo $v_reference->email; ?>
                      &nbsp;
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

  
    <table style="margin-top:100px !important;" align="center" border="0" cellpadding="0" cellspacing="0" width="630">
           <tr><td colspan="6">&nbsp;</td></tr>     
                  <tr><td colspan="6">&nbsp;</td></tr>     
                  <tr><td colspan="6">&nbsp;</td></tr>     
                  <tr><td colspan="6">&nbsp;</td></tr>     
    <tr>
          <td align="left" width="22%" style="padding-left: 30px;">
      <div id="signaturename" style="border-top:1px solid;">
        Signature:
      </div>

          </td>

           <td style="margin-left:300px;" align="right" width="40%"><?php echo get_logo();?> </td>
          </tr>


    </table>     
    

  </tbody></table>
        </div>
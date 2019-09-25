<?php
$Filename=$resume->full_name;
$Filename=str_replace(" ", "_", $Filename);
header("Content-type: application/msword");
header("Content-Disposition: attachment;Filename={$Filename}.doc");
?>
<!--  -->
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Resume Here</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
   </head>
   <body>
      <div class="container" style="width: 595px">
         <table width="100%">
            <tbody>
               <tr>
                  <td width="60%">
                     <p>&nbsp;</p>
                  </td>
                  <td width="40%">
                     <p>Powered By Vacancy.solutions</p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><strong><?php echo $resume->resume_title; ?> </strong></p>
                  </td>
                  <td><img src="<?php echo base_url() ?>/upload/<?php echo $resume->photo_path; ?>"> </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table>
            <tbody>
               <tr>
                  <td>
                     <p><em>Source: Vacancy.Solutions Online CV Bank</em></p>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <table width="100%">
                        <tbody>
                           <tr>
                              <td width="73%">
                                 <p><strong><?php echo $resume->full_name; ?> </strong></p>
                                 <p><?php echo $resume->present_address; ?><br />  Mobile : <?php echo $resume->mobile; ?> <br /> email:<?php echo $resume->email; ?></p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Career Objective:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><?php echo $resume->js_career_obj; ?></p>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Career Summary:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><?php echo $resume->js_career_sum ?></p>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Special Qualification:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><?php echo $resume->specialization; ?></p>
                  </td>
               </tr>
            </tbody>
         </table>

         <p>&nbsp;</p>
           <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Your Skills:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <p><?php echo $resume->skills; ?></p>
                  </td>
               </tr>
            </tbody>
         </table>
          <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td colspan="2">
                     <p><strong><u>Employment History:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td colspan="2">
                     <p><strong>Total Year of Experience :</strong> 4.4 Year(s)</p>
                  </td>
               </tr>
            <?php $i=1; if (!empty($experinece_list)): foreach ($experinece_list as $v_experience) : ?>
               <tr>
                  <td width="22">
                     <p><?php echo $i++;?></p>
                  </td>
                  <td width="578">
                     <p><strong><u><?php  echo $v_experience->designation ;?> ( March 1, 2015 - Continuing)</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>&nbsp;</td>
                  <td>
                     <p><strong>Company Name: <?php echo $v_experience->company_name ;?></strong> <br /> Department: <?php echo $v_experience->department ;?> <br /> <br /> Job Nature: <?php echo $this->job_category_model->get_job_nature_by_id($v_experience->job_category) ;?><br /> Job Level: <?php echo $this->job_level_model->get_job_level_by_id($v_experience->job_level) ;?> <br /> Duration: <?php echo date_calculate($v_experience->end_date, $v_experience->start_date) ;?><br /></p>
                  </td>
               </tr>

                     <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>

            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Academic Qualification:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <table border="1px" width="100%">
                        <tbody>
                           <tr>
                              <td width="20%">
                                 <p><strong>Exam Title</strong></p>
                              </td>
                              <td width="20%">
                                 <p><strong>Concentration/Major</strong></p>
                              </td>
                              <td width="20%">
                                 <p><strong>Institute</strong></p>
                              </td>
                              <td width="20%">
                                 <p><strong>Result</strong></p>
                              </td>
                              <td width="20%">
                                 <p><strong>Pas.Year</strong></p>
                              </td>
                           </tr>
            <?php if (!empty($edcuaiton_list)): foreach ($edcuaiton_list as $v_education) : ?>
                           <tr>
                              <td width="20%">
                                 <p><?php echo $this->education_level_model->get_education_level_name_by_id($v_education->js_degree) ; ?> </p>
                              </td>
                              <td width="20%">
                                 <p><?php echo $v_education->js_group ; ?></p>
                              </td>
                              <td width="35%">
                                 <p><?php echo $v_education->js_institute_name ; ?></p>
                              </td>
                              <td width="12%">
                                 <p><?php echo $v_education->js_resut  ; ?></p>
                              </td>
                              <td width="12%">
                                 <p><?php echo $v_education->js_year_of_passing ; ?></p>
                              </td>
                           </tr>
                   <?php
                       endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Training Summary:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <table border="1px" width="100%">
                        <tbody>
                           <tr>
                              <td width="19%">
                                 <p><strong>Training Title</strong></p>
                              </td>
                              <td width="19%">
                                 <p><strong>Topic</strong></p>
                              </td>
                              <td width="15%">
                                 <p><strong>Institute</strong></p>
                              </td>
                              <td width="15%">
                                 <p><strong>Country</strong></p>
                              </td>
                              <td width="15%">
                                 <p><strong>Location</strong></p>
                              </td>
                              <td width="25%">
                                 <p><strong>Duration</strong></p>
                              </td>
                           </tr>
                           <?php if (!empty($training_list)): foreach ($training_list as $v_training) : ?>
                           <tr>
                              <td width="15%">
                                 <p><?php echo $v_training->training_title; ?></p>
                              </td>
                              <td width="15%">
                                 <p><?php echo $v_training->training_topic; ?></p>
                              </td>
                              <td width="15%">
                                 <p><?php echo $v_training->institute; ?></p>
                              </td>
                              <td width="15%">
                                 <p><?php echo $v_training->country; ?></p>
                              </td>
                              <td width="15%">
                                 <p><?php echo $v_training->location; ?></p>
                              </td>
                              <td width="10%">
                                 <p><?php echo $v_training->duration; ?></p>
                              </td>
                           </tr>
                           <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>    
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Career and Application Information:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <table width="100%">
                        <tbody>
                            <tr>
                              <td width="32%">
                                 <p>Available For</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="66%">
                                 <p><?php echo $resume->avaliable ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="32%">
                                 <p>Expected Salary</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="66%">
                                 <p><?php echo $resume->js_career_salary;  ?></p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Language Proficiency:</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <table width="100%">
                        <tbody>
                           <tr>
                              <td width="25%">
                                 <p><strong>Language</strong></p>
                              </td>
                              <td width="25%">
                                 <p><strong>Reading</strong></p>
                              </td>
                              <td width="25%">
                                 <p><strong>Writing</strong></p>
                              </td>
                              <td width="25%">
                                 <p><strong>Speaking</strong></p>
                              </td>
                           </tr>
               <?php if (!empty($language_list)): foreach ($language_list as $v_language) : ?>
                           <tr>
                              <td width="25%">
                                 <p><?php echo $v_language->language ?></p>
                              </td>
                              <td width="25%">
                                 <p><?php echo $v_language->reading ?></p>
                              </td>
                              <td width="25%">
                                  <p><?php echo $v_language->writing; ?></p>
                              </td>
                              <td width="25%">
                                <p><?php echo $v_language->speaking ?></p>
                              </td>
                           </tr>
                 <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>      
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
         <p>&nbsp;</p>
         <table width="600">
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Personal Details :</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <table width="100%">
                        <tbody>
                           <tr>
                              <td width="22%">
                                 <p>Father's Name</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php echo $resume->father_name; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Mother's Name</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p> <?php echo $resume->mother_name; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Date of Birth</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php echo $resume->date_of_birth; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Gender</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p>Male</p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Marital Status</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php if(!empty($js_personal_info->marital_status))
                                  if($js_personal_info->marital_status=="1") {
                                    echo "Married";
                                    } else {
                                      echo "Unmarried";
                                      } ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p>Nationality</p>
                              </td>
                              <td>
                                 <p>:</p>
                              </td>
                              <td>
                                 <p>Bangladeshi</p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p>NID</p>
                              </td>
                              <td>
                                 <p>:</p>
                              </td>
                              <td>
                                 <p> <?php echo $resume->national_id; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p>Parmanent Address</p>
                              </td>
                              <td>
                                 <p>:</p>
                              </td>
                              <td>
                                 <p><?php echo $resume->parmanent_address; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p>Current Location</p>
                              </td>
                              <td>
                                 <p>:</p>
                              </td>
                              <td>
                                 <p><?php echo $resume->present_address; ?></p>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
                  <p>&nbsp;</p>
         <table width="600">
                    <?php $i=1; if (!empty($reference_list)): foreach ($reference_list as $v_reference) : ?>
            <tbody>
               <tr>
                  <td>
                     <p><strong><u>Reference <?php echo $i++;?> :</u></strong></p>
                  </td>
               </tr>
               <tr>
                  <td>
                     <table width="100%">
                        <tbody>
                           <tr>
                              <td width="22%">
                                 <p>Name:</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php echo $v_reference->name;; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Organization Name</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p> <?php echo $v_reference->org_name; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Designation </p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php echo $v_reference->designation; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Email</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php echo $v_reference->email; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td width="22%">
                                 <p>Mobile</p>
                              </td>
                              <td width="2%">
                                 <p>:</p>
                              </td>
                              <td width="76%">
                                 <p><?php echo $v_reference->mobile; ?></p>
                              </td>
                           </tr>
                            <tr>
                              <td>
                                 <p>Relation</p>
                              </td>
                              <td>
                                 <p>:</p>
                              </td>
                              <td>
                                 <p><?php echo $v_reference->relation; ?></p>
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <p>Realtion</p>
                              </td>
                              <td>
                                 <p>:</p>
                              </td>
                              <td>
                                 <p><?php echo $v_reference->relation; ?></p>
                              </td>
                           </tr>
                        </tbody>
                        <?php
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <p>
                            <strong>There is no record for display</strong>
                        </p>
                    <?php
                    endif; ?>     
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </body>
</html>


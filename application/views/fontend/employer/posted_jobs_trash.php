<?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
   <label class="checkbox_label">
      <div class="border-top1"></div>
      <input type="checkbox" id='posted_job' class="posted_job" onchange="get_report_data(<?php echo $v_companyjobs->job_post_id ?>)" />
      <div class="card">
         <div class="front">



            <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_profile_id);?>" style="height:50px; width:50px;border-radius:5px;float:left;border:solid 1px #eae9e9b8;margin-right:15px;" />
            <div class="job-info">
               <p class="job_title"><?php echo $v_companyjobs->job_title; ?></p>
            </div>
            <div class="icon-info">
               <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $v_companyjobs->city_id; ?></li>
               <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
               <li class="right-title" style="width:100%;"> &emsp;<?php echo $v_companyjobs->experience; ?>(experience)</li>
               <div class="clear"></div>
            </div>

            <div class="following-info">
               <li class="left-title"
                  >Job Roll</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs->job_role_title; ?></li>
               <li class="left-title">Engagement</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs->job_nature_name; ?></li>
               <li class="left-title">Domain</li>
               <li class="right-title">&nbsp;:<?php echo $v_companyjobs->job_category_name; ?></li>
               <!--  <li class="left-title">Role Type </li><li class="right-title">&nbsp;:</li> -->
               <li class="left-title">Dummy1</li>
               <li class="right-title">&nbsp;:</li>
               <!--  <li class="left-title">Dummy2</li><li class="right-title">&nbsp;:</li> -->
               <div class="clear"></div>
            </div>
            <div class="following-info2">
               <li class="left-title">Education</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs->education_level_name; ?></li>
               <li class="left-title">experience</li>
               <li class="right-title">&nbsp;:<?php echo $v_companyjobs->experience; ?></li>
               <li class="left-title">CTC</li>
               <li class="right-title">&nbsp;:<?php echo $v_companyjobs->salary_range; ?></li>
               <li class="left-title">Vacancies</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs->no_jobs; ?></li>
               <!-- <li class="left-title">Specialization</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->education_specialization; ?></li> -->
               <!--  <li class="left-title">Joining ETA</li><li class="right-title">&nbsp;:30 days</li> -->
               <!--  <li class="left-title">Benifits</li><li class="right-title">&nbsp;:<?php echo $v_companyjobs->benefits; ?> </li> -->
               <!--   <li class="left-title">Dummy3</li><li class="right-title">&nbsp;:value</li> -->
               <div class="clear"></div>
            </div>
            <div class="following-info3">
               <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>
               <li class="right-title">&nbsp;: <?php if (isset($v_companyjobs->jd_file) && !empty($v_companyjobs->jd_file)) { echo "Yes"; ?>  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $v_companyjobs->jd_file; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a> <?php } else { echo "No";} ?></li>
               <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:<?php echo $v_companyjobs->is_test_required; ?></li>
               <li class="left-title">Published on</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs->created_at)) { echo date('M j Y',strtotime($v_companyjobs->created_at)); } ?></li>
               <li class="left-title">Job expiry</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs->job_deadline)) { echo date('M j Y',strtotime($v_companyjobs->job_deadline)); } ?></li>
               <div class="clear"></div>
            </div>
            <!-- <div id="skills"> -->
               <br><br>
            <span>Skill sets</span>:
            <?php 
               $sk=$v_companyjobs->skills_required;
               if (isset($sk) && !empty($sk)) {
                  $where_sk= "id IN (".$sk.") AND status=1";
                $select_sk = "skill_name ,id";
                $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                if(!empty($skills)){ 
                  foreach($skills as $skill_row){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $skill_row['skill_name'];?></button></lable>
            <?php }
               } }   ?>
            <br>
            <span>Benefits</span>:
            <?php 
               $benefits=explode(',', $v_companyjobs->benefits);
               
                if(!empty($benefits)){ 
                  $i=0;
                  foreach($benefits as $benefit){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $benefits[$i];?></button></lable>
            <?php $i++; }
               }    ?>
            <!--  <div class="clear"></div>
               </div> -->  
               <br>       
            <button class="detail-btn">details</button>
            <div class="btn-group">
                        <a title="restore" href=" <?php echo base_url('employer/recover_job_post/' . $v_companyjobs->job_post_id)); ?>" ><i class="fas fa-trash-restore icon_backg"></i></a>
                       
                     </div>

            <?php  if ($v_companyjobs->job_deadline > date('Y-m-d')){
               // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
               echo '<span class="active-span">Active</span>';
               }
               else {
               // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
               echo '<span class="pasive-span">Expired</span>';
               } ?>
            <!-- <div class="dropdown">
               <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $v_companyjobs->job_post_id; ?>"> <i class="fas fa-share"></i></a>
               <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-h"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                  <li><a class="dropdown-item" href="#">View post job</a></li>
                  <li> <a class="dropdown-item" href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs->job_post_id ?>">Edit job post</a></li>
                 <li ><a class="dropdown-item" href="#" id="attach_to_job" data-toggle="modal" data-target="#attach_test<?php echo $v_companyjobs->job_post_id ?>" >Attach Test</a></li>
               </div>
            </div> -->
         </div>
      </div>
   </label>
   <?php endforeach; 
      else : ?> 
   <li>
      <strong>There are no Active Job Posts to Display !</strong>
   </li>
   <?php endif; ?>
 <div>
                      <button id="submit" type="button" onclick="history.back()" class="save_question">Cancel</button>
                  </div>
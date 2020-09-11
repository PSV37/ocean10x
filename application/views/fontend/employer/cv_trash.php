<?php $key = 1; if (!empty($cv_bank_data)): foreach ($cv_bank_data as $cv_row) : 
                  $on_ocean = $cv_row['ocean_candidate'];
                        if($on_ocean == 'Yes')
                        {
                           $resume = getUploadedResume($cv_row['js_email']);
                           $photo = getSeekerPhoto($cv_row['js_email']);
                           $updates = getSeekerlastUpdates($cv_row['js_email']);
                           if (!empty($updates)) {
                             if($updates[0]['update_at']=='0000-00-00 00:00:00') { 
                               $mtime = date('d-M-y',strtotime($updates[0]['create_at']));
                             } else{
                               $mtime = date('d-M-y',strtotime($updates[0]['update_at']));
                             }
                           }else{
                             $mtime = date('d-M-y',strtotime($cv_row['created_on']));
                           }
                        }else{
                         $mtime = date('d-M-y',strtotime($cv_row['created_on']));
                        }
                       
                       ?>
               <label>
                  <div class="check">
                     <input type="checkbox" value="<?php echo $cv_row['js_email']; ?>" data-valuetwo="<?php echo $cv_row['cv_id'];  ?>" data-valueone="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo $cv_row['js_resume']; } ?>" class="chkbx" />
                  </div>
                  <div class="card content">
                     <div class="front">
                        <?php
                           if($on_ocean == 'Yes')
                             {
                           if(!empty($photo)){ ?>
                        <img src="<?php echo  base_url(); ?>upload/<?php if(!empty($photo[0]['photo_path'])){echo $photo[0]['photo_path'];} ?>" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php }else{ ?>
                        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php } }else{ ?>
                        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php } ?>
                        <div class="job-info">
                           <div class="a" style="display: inline-flex;">
                              <li class="right-title" style="font-size:19px;margin-top:-4px;"  ><a href="<?php echo base_url(); ?>employer/edit_cv/<?php echo base64_encode($cv_row['cv_id']); ?>" style="color: black;cursor: pointer;" ><?php echo $cv_row['js_name']; ?></a></li>
                              <li class="right-title" style="font-size: 15px;margin-top:-4px;font-weight: 600;margin-left: -106px;width: fit-content;"><?php echo $cv_row['js_email']; ?></li>
                           </div>
                        </div>
                        <div class="following-info">
                           <!-- <li class="left-title"
                              >Email</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_email']; ?></li> -->
                           <li class="left-title">Current Sal</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_current_ctc']; ?></li>
                           <li class="left-title">Phone</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_mobile']; ?></li>
                          
                           <li class="left-title">Education</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['education_level_name']; ?></li>
                           <div class="clear"></div>
                        </div>
                        <div class="following-info2">
                          <!--  <li class="left-title">Current Org</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['current_org']; ?></li> -->
                           <li class="left-title">Notice Period </li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_current_notice_period']; ?></li>
                           <li class="left-title">Work Exp</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['js_experience']; ?></li>
                           <li class="left-title">Designation</li>
                           <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_current_designation']; ?></li>
                           <div class="clear"></div>
                        </div><br>
                        <span>Skill Set</span> <?php
                        $skills = explode(',', $cv_row['js_skill_set']) ;
                        if(!empty($cv_row['js_skill_set'])){ 
                  foreach($skills as $skill_row){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $skill_row;?></button></lable>
            <?php }
                }   ?>
                        <br>
                           <div class="btn-group">
                        <a title="restore" href=" <?php echo base_url('employer/recover_cv/' .$cv_row['cv_id']); ?>" ><i class="fas fa-trash-restore icon_backg"></i></a>
                      
                     </div>
                        <!-- <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:20px;">


                           <?php if (isset($company_active_jobs) && !empty($company_active_jobs)) { ?>
                           <li ><a class="dropdown-item" href="#" id="div_frwrd" data-toggle="modal" data-keyboard="true" data-target="#rotateModal<?php echo $cv_row['cv_id']; ?>" >Forward Job Post</a></li>
                        <?php } ?>

                           <?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ ?>
                           <li id="div_download"> <a class="dropdown-item"  href="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo base_url(); echo 'upload/Resumes/'.$cv_row['js_resume']; } ?>" download >Download this cv</a></li>
                           <?php } ?>
                           <li><a onclick="get_copy_folders(<?php echo $cv_row['cv_id']; ?>);" class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-keyboard="true" data-target="#copy_cv<?php echo $cv_row['cv_id']; ?>"  href="#">Copy this CV</a></li>
                           <li><a class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-keyboard="true" data-target="#move_cv<?php echo $cv_row['cv_id']; ?>" href="#">Move this CV</a></li>
                            <li><a href="<?php echo base_url(); ?>employer/edit_cv/<?php echo base64_encode($cv_row['cv_id']); ?>" >Edit CV</a></li>
                             <li><a href="<?php echo base_url(); ?>employer/getocean_profile/<?php echo base64_encode($cv_row['js_email']); ?>" >Get Ocean Profile</a></li>
                        </div> -->
                     </div>
                  </div>
               </label>
               <?php
                  $key++;
                    endforeach;  
                  ?>     
               <?php else : ?> 
               <li colspan="3">
                  <strong>There is no record for display</strong>
               </li>
               <?php endif; ?>
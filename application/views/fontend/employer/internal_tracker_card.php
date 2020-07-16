<div class="box" >
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
                           <div class="a">
                              <li class="right-title" style="font-size:19px;margin-top:-4px;"  ><?php echo $cv_row['js_name']; ?></li>
                           </div>
                        </div>
                        <div class="following-info">
                           <li class="left-title"
                              >Email</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_email']; ?></li>
                           <li class="left-title">Current Sal</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_current_ctc']; ?></li>
                           <li class="left-title">SkillSet</li>
                           <li class="right-title">&nbsp;: <?php echo $cv_row['js_skill_set']; ?></li>
                           <li class="left-title">Work Experince</li>
                           <li class="right-title">&nbsp;: <?php echo $cv_row['js_experience']; ?></li>
                           <div class="clear"></div>
                        </div>
                        <div class="following-info2">
                           <li class="left-title">Current Org</li>
                           <li class="right-title">&nbsp;:TKNS</li>
                           <li class="left-title">Notice Period </li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_current_notice_period']; ?></li>
                           <li class="left-title">Phone</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_mobile']; ?></li>
                           <li class="left-title">Designation</li>
                           <li class="right-title">&nbsp;:<?php echo $cv_row['js_current_designation']; ?></li>
                           <div class="clear"></div>
                        </div>
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:47px;">
                           <li ><a class="dropdown-item" href="#" id="div_frwrd" data-toggle="modal" data-target="#rotateModal<?php echo $cv_row['cv_id']; ?>" >Forward Job Post</a></li>
                        <?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ ?>
                           <li id="div_download"> <a class="dropdown-item"  href="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo base_url(); echo 'upload/Resumes/'.$cv_row['js_resume']; } ?>" download >Download this cv</a></li>
                           <?php } ?>

                           <li><a class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-target="#move_cv<?php echo $cv_row['cv_id']; ?>" href="#">Move this CV</a></li>
                        </div>
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
            </div>
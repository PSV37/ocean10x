<!-- <div class="box" > -->
               <?php print_r($forwarded_job_tracking); $key = 1; if (!empty($forwarded_job_tracking)): foreach ($forwarded_job_tracking as $job_row) : ?>
                 
               <label>
                  <!-- <div class="check">
                    
                     
                  </div>  -->
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
                              <li class="right-title" style="font-size:19px;margin-top:-4px;"  ><?php echo $job_row->full_name; ?></li>
                           </div>
                        </div>
                        <div class="following-info">
                           <li class="left-title"
                              >Email</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->email; ?></li>
                            <li class="left-title"
                              >Mobile</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->mobile_no; ?></li>

                           <li class="left-title">Current Sal</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->js_career_salary; ?></li>
                         
                          
                           <div class="clear"></div>
                        </div>
                        <div class="following-info2">

                           <li class="left-title">Work Experince</li>
                           <li class="right-title">&nbsp;: <?php echo $job_row->js_career_exp; ?></li>

                          

                           <li class="left-title">Notice Period </li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->job_seeker_id; ?></li>

                           <li class="left-title">Education</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->education_level_name; ?></li>

                           <li class="left-title">status</li>
                           <li class="right-title">&nbsp;:</li>
                           <div class="clear"></div>
                        </div>
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        

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
            <!-- </div> -->
<!-- <div class="box" >  -->
               <?php $key = 1; if (!empty($forwarded_job_tracking)): foreach ($forwarded_job_tracking as $job_row) : ?>
                 
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
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-2">
                                <span style="font-size:19px;margin-top:-4px;"  ><?php echo $job_row->js_name; ?></span>
                              </div>
                              <div class="col-md-4">
                                <span style="font-size:16px;margin-top:-4px;margin-left: -89px;"  ><?php echo $job_row->js_email; ?></span>
                              </div>
                               <div class="col-md-2">
                                <span style="font-size:16px;margin-top:-4px;margin-left: -146px;"  ><?php echo $job_row->js_mobile; ?></span>
                              </div>
                              
                            </div>
                            
                          </div>
                          <!--  <div class="a">
                             
                           </div> -->
                        </div>
                        <div class="following-info">
                         <table class="table table-borderless" id="myTable">
                            <thead>
                              <tr>
                                <!-- <th scope="col">Email</th>
                                <th scope="col">Mobile</th> -->
                                <th scope="col">Sal</th>
                                <th scope="col">Work Exp</th>
                                <th scope="col">Notice (days)</th>
                                <th scope="col">Education</th>
                                <th scope="col">Status</th>
                                <th scope="col">Comments</th>
                                <th scope="col">Updated By</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                               <!--  <td ><input id="email<?php echo $job_row->cv_id; ?>" type="text" name="email" value="<?php echo $job_row->js_email; ?>" ></td>

                                <td ><input id="mobile<?php echo $job_row->cv_id; ?>" type="text" name="mobile" value="<?php echo $job_row->js_mobile; ?>" maxlength='10' ></td> -->

                                <td ><input id="ctc<?php echo $job_row->cv_id; ?>" type="text" name="ctc" value="<?php echo $job_row->js_current_ctc; ?>" maxlength='3' ></td>

                                <td ><input id="exp<?php echo $job_row->cv_id; ?>" type="text" name="exp" value="<?php echo $job_row->js_experience; ?>" ></td>

                                <td ><input id="notice<?php echo $job_row->cv_id; ?>" type="text" name="notice" value="<?php echo $job_row->js_current_notice_period; ?>" ></td>

                                <td > <select name="edu" id="edu" class="form-control select2" data-style="btn-default" data-live-search="true"  >
                        <option value=""> </option>
                        <?php   foreach($education_level as $education){?>
                        <option value="<?php echo $job_row->js_top_education; ?>"<?php if($job_row->js_top_education==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                        <?php } ?>
                        <option value="other">Other </option>
                        <option value="other">None </option>
                     </select>
                     <input id="edu<?php echo $job_row->cv_id; ?>" type="text" name="edu" value="<?php echo $job_row->education_level_name; ?>" ></td>

                                <td><input type="text" name="email" value="<?php echo $job_row->cv_id; ?>" ></td>
                                <td ><a></a></td>
                                <td ></td>
                                 <td onclick="saveRow(<?php echo $job_row->cv_id; ?>);"><a>save</a></td>


                              </tr>
                            
                            </tbody>
                          </table>
                        </div>
                      <!--   <div class="following-info">
                           <li class="left-title"
                              >Email</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->email; ?></li>
                            <li class="left-title"
                              >Mobile</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->mobile_no; ?></li>

                           <li class="left-title">Current Sal</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->js_career_salary; ?></li>
                         
                          
                           <div class="clear"></div>
                        </div> -->
                       <!--  <div class="following-info2">

                           <li class="left-title">Work Experince</li>
                           <li class="right-title">&nbsp;: <?php echo $job_row->js_career_exp; ?></li>

                          

                           <li class="left-title">Notice Period </li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->job_seeker_id; ?></li>

                           <li class="left-title">Education</li>
                           <li class="right-title">&nbsp;:<?php echo $job_row->education_level_name; ?></li>

                           <li class="left-title">status</li>
                           <li class="right-title">&nbsp;:</li>
                           <div class="clear"></div>
                        </div> -->
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:47px;">
                           <li ><a class="dropdown-item" href="#" id="edit"  >Edit</a></li>
                       

                           <li id="div_download"> <a class="dropdown-item"  href="" download >Delete</a></li>
                           <?php ?>

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
            <!-- </div>
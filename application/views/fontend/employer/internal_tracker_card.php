<!-- <div class="box" >  -->
               <?php $key = 1; if (!empty($forwarded_job_tracking)): foreach ($forwarded_job_tracking as $job_row) : ?>
                 
               
                  <!-- <div class="check">
                    
                     
                  </div>  -->
                  <div class="card content">
                     <div class="front">
                        
                            <tbody>
                              <tr>
                                <td ><input id="email<?php echo $job_row->cv_id; ?>" type="text" name="email" value="<?php echo $job_row->js_email; ?>" ></td>

                                <td ><input id="mobile<?php echo $job_row->cv_id; ?>" type="text" name="mobile" value="<?php echo $job_row->js_mobile; ?>" maxlength='10' ></td>

                                <td ><input id="ctc<?php echo $job_row->cv_id; ?>" type="text" name="ctc" value="<?php echo $job_row->js_current_ctc; ?>" maxlength='3' ></td>

                                <td ><input id="exp<?php echo $job_row->cv_id; ?>" type="text" name="exp" value="<?php echo $job_row->js_experience; ?>" ></td>

                                <td ><input id="notice<?php echo $job_row->cv_id; ?>" type="text" name="notice" value="<?php echo $job_row->js_current_notice_period; ?>" ></td>

                                <td > <select name="edu" id="edu<?php echo $job_row->cv_id; ?>" class="form-control select2" data-style="btn-default" data-live-search="true"  >
                                  <option value=""> </option>
                                  <?php   foreach($education_level as $education){?>
                                  <option value="<?php echo $job_row->js_top_education; ?>"<?php if($job_row->js_top_education==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                                  <?php } ?>
                                  <option value="other">Other </option>
                                  <option value="other">None </option>
                               </select>
                    <!--  <input id="edu<?php echo $job_row->cv_id; ?>" type="text" name="edu" value="<?php echo $job_row->education_level_name; ?>" ></td> -->

                                <td><input type="text" name="email" value="<?php echo $job_row->cv_id; ?>" ></td>
                                <td ><input type="text" name="email" value="<?php echo $job_row->cv_id; ?>" ></td>
                                <td ><input type="text" name="email" value="<?php echo $job_row->cv_id; ?>" ></td>
                                 <td onclick="saveRow(<?php echo $job_row->cv_id; ?>);"><a>save</a></td>


                              </tr>
                            
                            </tbody>
                          

                        </div>

                 
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
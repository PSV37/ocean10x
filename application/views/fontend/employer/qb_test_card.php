<!-- <div class="box" >  -->
               <?php $key = 1; if (!empty($questionbank)): foreach ($questionbank as $question) : ?>
                 
                              <tr>
                                <input class="attrValue" type="hidden" name="" id="ques_id" value="<?php echo $question['ques_id']; ?>">
                                 <td ><?php echo $key; ?></td>

                                <td ><?php echo $question['title']; ?></td>

                                <td ><?php echo $question['titles']; ?></td>

                                <td ><?php echo $question['question']; ?></td>

                                <td><input type="checkbox" id="update" class="chkbx" name=""></td>
                                
                                   
                             

                           
               <?php
                  $key++;
                    endforeach;  
                  ?>     
               <?php else : ?> 
               <td colspan="3">
                  <strong>There is no record for display</strong>
               </td>
               <?php endif; ?>
            <!-- </div>
              xcccc-->

            
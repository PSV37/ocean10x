<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
	<div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
        <div class="col-md-9 add-question">
          <div class="header-bookbank">
            Add Question
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">                                       
							 <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                <select id="subject" name="technical_id" class="form-control" required="" onchange="getTopic(this.value)">
                  <option value="">Select Subject</option> 
                    <?php if (!empty($skill_master))
                       foreach($skill_master as $skill) 
                       {
                    ?>   
                        <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option> 
                    <?php } ?>
                  </select>
							</div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                <select id="topic_id" name="topic_id" class="form-control" onchange="getSubtopic(this.value)">
                  <option value="">Select Subject</option> 
                  <option value="1">HTML 5</option> 
                </select>
              </div>
            </div>
            <div class="col-md-4">
							<div class="form-group">
                <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                <select id="subtopic_id" name="subtopic_id" class="form-control" onchange="getLineitem(this.value)">
                </select>
							</div>
						</div>               
          </div>
          <div class="row">
            <div class="col-md-4">
							<div class="form-group">
                <label for="exampleInputEmail1">Line Item(Level 1)<span class="required">*</span></label>
                <select id="lineitem_id" name="lineitem_id" class="form-control" onchange="getLineitemlevel(this.value)">
                </select> 
							</div>
						</div>
            <div class="col-md-4">
							<div class="form-group">
                  <label for="exampleInputEmail1">Line Item(Level 2)<span class="required">*</span></label>
                  <select id="lineitemlevel_id" name="lineitemlevel_id" class="form-control">
                  </select> 
							</div>
						</div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                  <select name="level" class="form-control">                                     
										<option value="Expert">Expert</option>
										<option value="Medium" selected="">Medium</option>
										<option value="Beginner">Beginner</option>
									</select>
							</div>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
                <select name="" class="form-control" type="text">
									<option value="Expert">multiple choice</option>
									<option value="Medium">Subjective</option>
									<option value="Beginner">Practical</option>
								</select>
							</div>
            </div>
          </div>
             
             
    <div class="row">
       <div class="col-md-12 form-group">
        <label for="comment">Question </label>
		    <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 1:
        </label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 2:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 3:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 4:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
    </div>    
     <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Correct Answer<span class="required">*</span></label>
              <div class = "panel-body_add">
                <div class="col-md-12">
                  <div class="optionbox-1 col-md-6">
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">1.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">3.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                  </div>
                  <div class="optionbox-2 col-md-6"> 
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">2.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">4.</span>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                        <span>option1</span>
                        </label>
                      </div>
                    </li>
                  </div>
                </div>
              <!-- </ul> -->
              </div>
          </div>
        </div>
        <div class="col-md-4"></div>
          <div class="col-md-4" style="text-align:right;">
            <button type="button" class="save_question">Save question</button>
          </div>
      </div>
    </div>
  </div>
</div>
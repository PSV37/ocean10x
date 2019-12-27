
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
    <?php if(!empty($edit_edu_res))  ?>
     <input type="hidden" name="js_education_id" value="<?php echo $edit_edu_res['js_education_id']; ?>">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select  name="education_level_id" id="education_level_id" class="form-control" required>
           <?php if(!empty($education_level)){?>
            <option value="<?php echo $education_level['education_level_id']; ?>"><?php echo $education_level['education_level_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <?php if(!empty($education_level)) if($education_level['education_level_name']=='Ph.D / Doctorate' || $education_level['education_level_name']=='Masters/Post-Graduation' || $education_level['education_level_name']=='Graduation/Diploma'){?>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select  name="specialization_id" id="specialization_id" class="form-control" required>
            <option value="">Select One</option>
             <?php foreach($education_specialization as $edu_special){?>
              <option value="<?php echo $edu_special['id']; ?>"<?php if(!empty($edit_edu_res)) if($edit_edu_res['specialization_id']==$edu_special['id']) echo "selected";?>><?php echo $edu_special['education_specialization']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University / Name of Institution<span class="required">*</span></label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="<?php if(!empty($edit_edu_res)) echo $edit_edu_res['js_institute_name']; ?>">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</span></label>
          <?php foreach($course as $courses){?>
            <input type="radio" name="education_type_id" required id="education_type_id" value="<?php echo $courses['education_type_id']; ?>"<?php if(!empty($edit_edu_res)) if($edit_edu_res['education_type_id']==$courses['education_type_id']) echo "checked";?> style="margin: 0 1px;"> <?php echo $courses['education_type']; ?>
          <?php } ?>
         

        </div>
        <div class="col-sm-1"></div>
      </div>
    <?php } ?>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select  name="js_year_of_passing" id="ddlYear" class="form-control" required>
           <option value="">Select Completion Year</option>
            <?php
              $currently_selected = date('Y'); 
              $earliest_year = 1940; 
              $latest_year = date('Y'); 
              foreach ( range( $latest_year, $earliest_year ) as $i ) {
              ?>
              <option value="<?php echo $i; ?>"<?php if(!empty($edit_edu_res)) if($edit_edu_res['js_year_of_passing']==$i) echo "selected";?>><?php echo $i; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 
<?php if(!empty($education_level)) if($education_level['education_level_name']=='Ph.D / Doctorate' || $education_level['education_level_name']=='Masters/Post-Graduation' || $education_level['education_level_name']=='Graduation/Diploma'){?>
     <!--  <div class="form-group">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <label class="control-label" for="email">Grading System</label>
          <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
            <option value="">Select Grading System</option>
            <option value="Scale 10 Grading System"<?php if(!empty($edit_edu_res)) if($edit_edu_res['gradding']=='Scale 10 Grading System') echo "selected";?>>Scale 10 Grading System</option>
            <option value="Scale 4 Grading System"<?php if(!empty($edit_edu_res)) if($edit_edu_res['gradding']=='Scale 4 Grading System') echo "selected";?>>Scale 4 Grading System</option>
            <option value="% Marks of 100 Maximum"<?php if(!empty($edit_edu_res)) if($edit_edu_res['gradding']=='% Marks of 100 Maximum') echo "selected";?>>% Marks of 100 Maximum</option>
            <option value="Course Requires a Pass"<?php if(!empty($edit_edu_res))if($edit_edu_res['gradding']=='Course Requires a Pass') echo "selected";?>>Course Requires a Pass</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div> -->
    
      <!-- <div class="form-group" id="comp_name" <?php if(!empty($edit_edu_res)){ if($edit_edu_res['gradding']=='Course Requires a Pass') {?> style="display:none;"<?php }else{ ?>style="display:block;"<?php } }else{ ?>style="display:none;"<?php } ?>> -->
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="<?php if(!empty($edit_edu_res)) echo $edit_edu_res['js_resut']; ?>" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
    <?php } if(!empty($education_level)) if($education_level['education_level_name']=='10th' || $education_level['education_level_name']=='12th'){?>

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Board<span class="required">*</span></label>
          <select  name="board_id" id="board_id" class="form-control">
            <option value="">Select Board</option>
            <?php foreach($schoolboard as $boards){?>
              <option value="<?php echo $boards['schoolboard_id']; ?>"<?php if(!empty($edit_edu_res)) if($edit_edu_res['board_id']==$boards['schoolboard_id']) echo "selected";?>><?php echo $boards['schoolboard_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">School Medium<span class="required">*</span></label>
          <select  name="schoolmedium_id" id="schoolmedium_id" class="form-control">
            <option value="">Select Medium</option>
           <?php foreach($schoolmedium as $medium){?>
            <option value="<?php echo $medium['schoolmedium_id']; ?>"<?php if(!empty($edit_edu_res)) if($edit_edu_res['schoolmedium_id']==$medium['schoolmedium_id']) echo "selected";?>><?php echo $medium['school_medium']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
    
    <div class="form-group">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <label class="control-label" for="email">Total Score<span class="required">*</span></label>
        <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="<?php if(!empty($edit_edu_res)) echo $edit_edu_res['totalmarks_id']; ?>" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
      </div>
      <div class="col-sm-1"></div>
    </div>
  <?php } ?>
    

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form>
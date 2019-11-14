
  <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education</label>
          <select  name="education_level_id" id="education_level_id" class="form-control">
           <?php if(!empty($education_level)){?>
            <option value="<?php echo $education_level['education_level_id']; ?>"><?php echo $education_level['education_level_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      <?php if(!empty($education_level)) if($education_level['education_level_name']=='Ph.D / Doctorate' || $education_level['education_level_name']!='Masters/Post-Graduation' || $education_level['education_level_name']!='Gradution'){?>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization</label>
          <select  name="specialization_id" id="specialization_id" class="form-control">
            <option value="">Select One</option>
             <?php foreach($education_specialization as $edu_special){?>
              <option value="<?php echo $edu_special['id']; ?>"><?php echo $edu_special['education_specialization']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University/Institute Name</label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type:</label>
          <select  name="education_type_id" id="education_type_id" class="form-control">
            <option value="">Select Course Type </option>
            <?php foreach($course as $courses){?>
            <option value="<?php echo $courses['education_type_id']; ?>"><?php echo $courses['education_type']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    <?php } ?>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Passing Year:</label>
          <select  name="js_year_of_passing" id="ddlYear" class="form-control">
           <option value="">Select Passing Year</option>s
          </select>
        </div>
        <div class="col-sm-1"></div>

      </div>

      <div class="form-group">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <label class="control-label" for="email">Grading System:</label>
          <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
            <option>Select Grading System</option>
            <option value="Scale 10 Grading System">Scale 10 Grading System</option>
            <option value="Scale 4 Grading System">Scale 4 Grading System</option>
            <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
            <option value="Course Requires a Pass">Course Requires a Pass</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group" id="comp_name" style="display:none;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Marks:</label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Result GPA/GGPA">
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <?php if(!empty($education_level)) if($education_level['education_level_name']=='10th' || $education_level['education_level_name']=='12th'){?>

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Board:</label>
          <select  name="board_id" id="board_id" class="form-control">
            <option value="">Select Board</option>
            <?php foreach($schoolboard as $boards){?>
              <option value="<?php echo $boards['schoolboard_id']; ?>"><?php echo $boards['schoolboard_name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">School Medium:</label>
          <select  name="schoolmedium_id" id="schoolmedium_id" class="form-control">
            <option value="">Select Medium</option>
           <?php foreach($schoolmedium as $medium){?>
            <option value="<?php echo $medium['schoolmedium_id']; ?>"><?php echo $medium['school_medium']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
    
    <div class="form-group">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <label class="control-label" for="email">Total Marks:</label>
        <select name="totalmarks_id" id="search6" class="form-control">
          <option>Select Marks</option>
          <?php foreach($totalmarks as $total) { ?>
          <option value="<?php echo $total['totalmarks_id'];?>"><?php echo $total['total_marks'];?></option>
          <?php } ?>
        </select>
      </div>
      <div class="col-sm-1"></div>
    </div>
  <?php } ?>
    

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
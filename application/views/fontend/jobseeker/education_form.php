    <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post" style="padding: 30px;">
          <p> Please add your educational information in chronological order.</p> <br>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Education</label>
            <div class="col-sm-9">
              <select  name="education_level_id" id="education_level_id" class="form-control">
               <?php foreach($education_level as $education){?>
                <option value="<?php echo $education['education_level_id']; ?>"><?php echo $education['education_level_name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Specialization</label>
            <div class="col-sm-9">
              <select  name="specialization_id" id="specialization_id" class="form-control">
                <option value="">Select One</option>
                 <?php foreach($education_specialization as $edu_special){?>
                  <option value="<?php echo $edu_special['id']; ?>"><?php echo $edu_special['education_specialization']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">University/Institute Name</label>
            <div class="col-sm-9">
              <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name">
            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Course Type:</label>
            <div class="col-sm-9">
              <select  name="education_type_id" id="education_type_id" class="form-control">
                <option value="">Select Course Type </option>
                <?php foreach($course as $courses){?>
                <option value="<?php echo $courses['education_type_id']; ?>"><?php echo $courses['education_type']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Passing Year:</label>
            <div class="col-sm-9">
              <select  name="js_year_of_passing" id="ddlYear" class="form-control">
               <option value="">Select Passing Year</option>s
              </select>
            </div>
          </div>
      
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Grading System:</label>
            <div class="col-sm-9">
              <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
                <option>Select Grading System</option>
                <option value="Scale 10 Grading System">Scale 10 Grading System</option>
                <option value="Scale 4 Grading System">Scale 4 Grading System</option>
                <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
                <option value="Course Requires a Pass">Course Requires a Pass</option>
              </select>
            </div>
          </div>
        
          <div class="form-group" id="comp_name" style="display:none;">
            <label class="control-label col-sm-3" for="email">Marks:</label>
            <div class="col-sm-9">
             <input type="text" name="js_resut" class="form-control" placeholder="Enter Result GPA/GGPA">
            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Board:</label>
            <div class="col-sm-9">
              <select  name="board_id" id="board_id" class="form-control">
                <option value="">Select Board</option>
              <?php foreach($schoolboard as $boards){?>
                <option value="<?php echo $boards['schoolboard_id']; ?>"><?php echo $boards['schoolboard_name']; ?></option>
              <?php } ?>
             </select>
            </div>
          </div>
        
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">School Medium:</label>
            <div class="col-sm-9">
              <select  name="schoolmedium_id" id="schoolmedium_id" class="form-control">
                <option value="">Select Medium</option>
               <?php foreach($schoolmedium as $medium){?>
                <option value="<?php echo $medium['schoolmedium_id']; ?>"><?php echo $medium['school_medium']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        
        
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Total Marks:</label>
          <div class="col-md-9">
            <select name="totalmarks_id" id="search6" class="form-control">
              <option>Select Marks</option>
              <?php foreach($totalmarks as $total) { ?>
              <option value="<?php echo $total['totalmarks_id'];?>"><?php echo $total['total_marks'];?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </form>
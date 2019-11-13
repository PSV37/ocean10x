           
  <div class="section lb">
        <div class="container">
            <div class="row">
             <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                <div class="content col-md-9">
                  <div class="userccount">
                  <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                    <h5>Education</h5>
                    <hr>
                    <?php 
                    if (!empty($education_level)): foreach ($education_level as $v_education) : ?>  
                      <h5>
                        <!-- Ph.D/Doctorate --> <?php echo $v_education['education_level_name']; ?><a href="#" class="btn btn-xs" title="Add More" data-toggle="modal" data-target="#addEducation"><i class="fa fa-plus"></i></a>
                      </h5>
                      <h5>
                        <a href="#" data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                      </h5>
                          <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Degree:</td>
                                  <td><?php echo $v_education->education_level_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Specialization:</td>
                                    <td><?php echo $v_education->education_specialization; ?></td>
                                </tr>

                                <tr>
                                  <td>Institute Name:</td>
                              <td><?php echo $v_education->js_institute_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Result:</td>
                                <td><?php echo $v_education->js_resut; ?></td>
                                </tr>

                                <tr>
                                  <td>Passing Year:</td>
                                <td><?php echo $v_education->js_year_of_passing; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                          </div>
                        <?php
                          $key++;
                          endforeach;
                          endif;
                        ?>
              <!--         <h5>
                        Masters/Post-Graduation <a href="#" class="btn btn-xs" title="Add More"><i class="fa fa-plus"></i></a>
                      </h5>
                      <h5>
                        <a href="#" data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                      </h5>
                          <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Degree:</td>
                                  <td><?php echo $v_education->education_level_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Specialization:</td>
                                    <td><?php echo $v_education->education_specialization; ?></td>
                                </tr>

                                <tr>
                                  <td>Institute Name:</td>
                              <td><?php echo $v_education->js_institute_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Result:</td>
                                <td><?php echo $v_education->js_resut; ?></td>
                                </tr>

                                <tr>
                                  <td>Passing Year:</td>
                                <td><?php echo $v_education->js_year_of_passing; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                          </div>
                      <h5>
                         Graduation/Diploma <a href="#" class="btn btn-xs" title="Add More"><i class="fa fa-plus"></i> </a>
                      </h5>
                      <h5>
                        <a href="#" data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                      </h5>
                          <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Degree:</td>
                                  <td><?php echo $v_education->education_level_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Specialization:</td>
                                    <td><?php echo $v_education->education_specialization; ?></td>
                                </tr>

                                <tr>
                                  <td>Institute Name:</td>
                              <td><?php echo $v_education->js_institute_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Result:</td>
                                <td><?php echo $v_education->js_resut; ?></td>
                                </tr>

                                <tr>
                                  <td>Passing Year:</td>
                                <td><?php echo $v_education->js_year_of_passing; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                          </div>
                      <h5>
                         <a href="#">Add 12th</a> 
                      </h5>
                      <h5>
                        <a href="#" data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                      </h5>
                          <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Degree:</td>
                                  <td><?php echo $v_education->education_level_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Specialization:</td>
                                    <td><?php echo $v_education->education_specialization; ?></td>
                                </tr>

                                <tr>
                                  <td>Institute Name:</td>
                              <td><?php echo $v_education->js_institute_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Result:</td>
                                <td><?php echo $v_education->js_resut; ?></td>
                                </tr>

                                <tr>
                                  <td>Passing Year:</td>
                                <td><?php echo $v_education->js_year_of_passing; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                          </div>
                      <h5>
                        <a href="#">Add 10th</a> 
                      </h5>
                    <h5>
                        <a href="#" data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                      </h5>
                          <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Degree:</td>
                                  <td><?php echo $v_education->education_level_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Specialization:</td>
                                    <td><?php echo $v_education->education_specialization; ?></td>
                                </tr>

                                <tr>
                                  <td>Institute Name:</td>
                              <td><?php echo $v_education->js_institute_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Result:</td>
                                <td><?php echo $v_education->js_resut; ?></td>
                                </tr>

                                <tr>
                                  <td>Passing Year:</td>
                                <td><?php echo $v_education->js_year_of_passing; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                          </div> -->
                    <hr class="invis">

                     
              </div><!-- end post-padding -->
          </div><!-- end col -->
      </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->

<div id="addEducation" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Educational Information</h4>
      </div>
      <div class="modal-body">
        <form id="Educational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_education');?>" method="post" style="padding: 30px;">
          <p> Please add your educational information in chronological order.</p> <br>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Degree:</label>
            <div class="col-sm-9">
              <select  name="education_level_id" id="education_level_id" class="form-control" onchange="getSpecilizations(this.value)">
                <option value="">Select Degree </option>
                 <?php foreach($education_level as $education){?>
                  <option value="<?php echo $education['education_level_id']; ?>"><?php echo $education['education_level_name']; ?></option>
                  <?php } ?>
                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Specialization:</label>
            <div class="col-sm-9">
              <select  name="specialization_id" id="specialization_id" class="form-control">
                <option value="">Select One</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">University/Institute Name:</label>
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
      </div>
   
    </div>

  </div>
</div>
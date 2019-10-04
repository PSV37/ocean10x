

               
          <div class="section lb">
                <div class="container">
                    <div class="row">
                     <?php $this->load->view('fontend/layout/seeker_left.php'); ?>


                        <div class="content col-md-9">
                            <div class="userccount">
                  <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                   <?php $key = 1 ?>
                    <?php if (!empty($edcuaiton_list)): foreach ($edcuaiton_list as $v_education) : ?>
                            <h5>
                      Your Education No: <?php echo $key; ?>  

                                   <a href="#" data-toggle="modal" data-target="#EditEducation<?php  echo $v_education->js_education_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                   
                                   <a href="<?php echo base_url() ?>/job_seeker/delete_education/<?php echo $v_education->js_education_id ?>" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
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
                    ?><!--get all category if not this empty-->
                    <?php else : ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no Educational Information to show!</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>

                   <hr class="invis">

                <?php if (!empty($edcuaiton_list)) : ?> 
                                    <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal" data-target="#addEducation">Add More Education</a></div>
                      <?php else : ?>

                          <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal" data-target="#addEducation">Add Education</a></div>

                        <?php endif; ?>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->



<?php foreach($edcuaiton_list as $v_education): ?>
<div id="EditEducation<?php echo $v_education->js_education_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
   <?php
    $edcuaiton_list=$this->Job_seeker_education_model->get($v_education->js_education_id); 
    
   ?>
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Educational Information</h4>
      </div>
      <div class="modal-body">
         <form id="UpdateEducational-info" action="<?php echo base_url('job_seeker/update_education');?>" class="form-horizontal" action="" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" name="js_education_id" value="<?php echo $v_education->js_education_id; ?>">
                <label class="control-label col-sm-3" for="email">Degree:</label>
                <div class="col-sm-9">
                  <select  name="education_level_id" id="education_level_id" class="form-control">
				 <?php foreach($education_level as $education){?>
					<option value="<?php echo $education['education_level_id']; ?>"<?php if($edcuaiton_list->education_level_id==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
					<?php } ?>
				 </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Specialization:</label>
                <div class="col-sm-9">
                  <select  name="specilization_id" id="specilization_id" class="form-control">
				 <?php foreach($education_specialization as $specialization){?>
					<option value="<?php echo $specilization['id']; ?>"<?php if($edcuaiton_list->specilization_id==$specialization['id']){ echo "selected"; }?>><?php echo $specialization['education_specialization']; ?></option>
					<?php } ?>
				 </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Title"
                   value="<?php
                         if (!empty($edcuaiton_list->js_institute_name)) {
                           echo $edcuaiton_list->js_institute_name;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Result:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_resut" class="form-control" id="js_resut" placeholder="Enter Result"
               value="<?php
                         if (!empty($edcuaiton_list->js_resut)) {
                           echo $edcuaiton_list->js_resut;
                           }
                       ?>">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Passing Year:</label>
                <div class="col-sm-9">
					   <select  name="js_year_of_passing" id="js_year_of_passing" class="form-control">
				 <?php foreach($passingyear as $passing){?>
					<option value="<?php echo $passing['passing_id']; ?>"<?php if($edcuaiton_list->js_year_of_passing==$passing['passing_id']){ echo "selected"; }?>><?php echo $passing['passing_year']; ?></option>
					<?php } ?>
				 </select>
                </div>
              </div>
            <button type="submit" class="btn btn-default">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</div>
</div>
<?php endforeach; ?>


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
               <select  name="education_level_id" id="education_level_id" class="form-control">
				 <?php foreach($education_level as $education){?>
					<option value="<?php echo $education['education_level_id']; ?>"><?php echo $education['education_level_name']; ?></option>
					<?php } ?>
				 </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Specialization:</label>
                <div class="col-sm-9">
				<select  name="specilization_id" id="specilization_id" class="form-control">
				 <?php foreach($education_specialization as $specialization){?>
					<option value="<?php echo $specialization['id']; ?>"><?php echo $specialization['education_specialization']; ?></option>
					<?php } ?>
				 </select>
				</div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Title">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Result:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_resut" class="form-control" id="js_resut" placeholder="Enter Result GPA/GGPA"
             >
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Passing Year:</label>
                <div class="col-sm-9">
                  <select  name="js_year_of_passing" id="js_year_of_passing" class="form-control">
				 <?php foreach($passingyear as $pass){?>
					<option value="<?php echo $pass['passing_id']; ?>"><?php echo $pass['passing_year']; ?></option>
					<?php } ?>
				 </select>
                </div>
              </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

  <script type="text/javascript">

        $( document ).ready( function () {
               // Education Add form Valiaton
        $( "#Educational-info" ).validate( {
                rules: {

                    js_degree: {
                        required: true,
                    },

                    js_group: {
                        required: true,
                    },

                    js_resut: {
                        required: true,
                    },

                    js_institute_name: {
                        required: true,
                    },
                    js_year_of_passing: {
                        required: true,
                    },

                },
                messages: {
                    js_degree: "Please your degree",
                    js_group: "Please enter your group name ",
                    js_resut: "Please enter your result",
                    js_institute_name: "Please institute name",
                    js_year_of_passing: "Please your passing years",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    js_degree: {
                        required: true,
                    },

                    js_group: {
                        required: true,
                    },

                    js_resut: {
                        required: true,
                    },

                    js_institute_name: {
                        required: true,
                    },
                    js_year_of_passing: {
                        required: true,
                    },

                },
                messages: {
                    js_degree: "Please your degree",
                    js_group: "Please enter your group name ",
                    js_resut: "Please enter your result",
                    js_institute_name: "Please institute name",
                    js_year_of_passing: "Please your passing years",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });

        
            </script>

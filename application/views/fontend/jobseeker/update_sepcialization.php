<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                

          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>


                        <div class="content col-md-9">
                            <div class="post-padding">
                                <div class="job-title nocover hidden-sm hidden-xs"><h5>Update Your Resume</h5></div>
                             <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                            <div class="breadcrumb">
                                  Your Sepicalization Informations
                                   <a href="#" data-toggle="modal" data-target="#UpdateSpecialization" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-edit"></i></a>                
                            </div>
                              <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Specialization:</td>
                                  <td><?php if(!empty($specializations->specialization))
                                          echo $specializations->specialization;
                                   ?></td>
                                </tr>

                                <tr>
                                  <td>Skills:</td>
                                    <td><?php echo $specializations->skills; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                            </div>

                        <div class="breadcrumb">
                                  Your Language Here
                            </div>


                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Serial</th> 
                        <th>Language</th>
                        <th>Reading</th>
                        <th>Writing</th> 
                         <th>Speaking</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php $key = 1 ?>
                    <?php if (!empty($all_language)): foreach ($all_language as $v_language) : ?>
                            <tr>
                            <td><?php echo $key ?></td>
                            <!--Serial No> -->
                            <td><?php echo $v_language->language ?></td>
                            <td><?php echo $v_language->reading ?></td>
                            <td><?php echo $v_language->writing ?></td>
                            <td><?php echo $v_language->speaking ?></td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#EditLanugae<?php  echo $v_language->js_language_id; ?>" class="btn  bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="glyphicon glyphicon-edit"></i></a>  
                                 <a href="<?php echo base_url() ?>/job_seeker/delete_experience/<?php echo $v_language->js_language_id ?>" class=" btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?>
                    <?php else : ?> 
                      <tr>
                        <td colspan="3">
                            <strong>There is no record  Please add YOur Language</strong>
                        </td>

                    <?php
                    endif; ?>
                  </table>

                   <div class="menu text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#addLanguage">Add Language</a></div>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->


<div id="addLanguage" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Language Information</h4>
      </div>
      <div class="modal-body">
         <form id="addLanguage-info" class="form-horizontal" action="<?php echo base_url();?>job_seeker/save_language" method="post" style="padding: 30px;">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Language:</label>
                <div class="col-sm-9">
                  <input type="text" name="language" class="form-control" id="language" placeholder="Enter Resume Title"
                   value="">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Reading Status:</label>
                <div class="col-sm-9">
                    <select name="reading" class="form-control" id="reading">
                    <option value=""> Select One</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                      </select>
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-sm-3" for="email">Writing Status:</label>
                <div class="col-sm-9">
                    <select name="writing" class="form-control" id="writing">
                    <option value=""> Select One</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                      </select>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Speaking Status:</label>
                <div class="col-sm-9">
                    <select name="speaking" class="form-control" id="speaking">
                    <option value=""> Select One</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
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


<?php foreach($all_language as $v_language): ?>
<div id="EditLanugae<?php echo $v_language->js_language_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
   <?php
    $language=$this->Job_language_model->get($v_language->js_language_id);   
   ?>
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Experince Information</h4>
      </div>
      <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url();?>job_seeker/save_language" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" name="js_language_id" value="<?php echo $v_language->js_language_id; ?>">
                <label class="control-label col-sm-3" for="email">Language Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="language" class="form-control" id="language"  value="<?php
                         if (!empty($language->language)) {
                           echo $language->language;
                           }
                       ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Reading Status:</label>
                <div class="col-sm-9">
                    <select name="reading" class="form-control" id="reading">
                    <option value=""<?php if ($v_language->reading == '') echo ' selected="selected"'; ?>>Select One</option>
                    <option value="Low"<?php if ($v_language->reading == 'Low') echo ' selected="selected"'; ?>>Low</option>
                    <option value="Medium"<?php if ($v_language->reading == 'Medium') echo ' selected="selected"'; ?>>Medium</option>
                    <option value="High"<?php if ($v_language->reading == 'High') echo ' selected="selected"'; ?>>High</option>
                      </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Writing Status:</label>
                <div class="col-sm-9">
                    <select name="writing" class="form-control" id="writing">
                    <option value=""<?php if ($v_language->writing == '') echo ' selected="selected"'; ?>>Select One</option>
                    <option value="Low"<?php if ($v_language->writing == 'Low') echo ' selected="selected"'; ?>>Low</option>
                    <option value="Medium"<?php if ($v_language->writing == 'Medium') echo ' selected="selected"'; ?>>Medium</option>
                    <option value="High"<?php if ($v_language->writing == 'High') echo ' selected="selected"'; ?>>High</option>
                      </select>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Speaking Status:</label>
                <div class="col-sm-9">
                    <select name="speaking" class="form-control" id="speaking">
                    <option value=""<?php if ($v_language->speaking == '') echo ' selected="selected"'; ?>>Select One</option>
                    <option value="Low"<?php if ($v_language->speaking == 'Low') echo ' selected="selected"'; ?>>Low</option>
                    <option value="Medium"<?php if ($v_language->speaking == 'Medium') echo ' selected="selected"'; ?>>Medium</option>
                    <option value="High"<?php if ($v_language->speaking == 'High') echo ' selected="selected"'; ?>>High</option>
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





<!-- Modal -->
<div id="UpdateSpecialization" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Specialization Information</h4>
      </div>
      <div class="modal-body">
         <form id="Specialization-info" class="form-horizontal" action="" method="post" style="padding: 30px;">
             
              <div class="form-group">
              <input type="hidden" name="js_specializations_id" value="<?php echo $specializations->js_specialization_id; ?>">
                <label class="control-label col-sm-3" for="email">Specialization:</label>
                <div class="col-sm-9">
                  <input type="text" name="specialization" class="form-control" id="specialization" placeholder="Your Specialization Here"
                   value="<?php
                         if (!empty($specializations->specialization)) {
                           echo $specializations->specialization;
                           }
                       ?>">
                </div>
              </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Your Skills:</label>
                <div class="col-sm-9">
                  <textarea name="skills" class="form-control" rows="5" id="skills"><?php if (!empty($specializations->skills)) {
                           echo $specializations->skills;
                           }
                       ?></textarea>
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
            $( "#addLanguage-info" ).validate( {
                rules: {

                    language: {
                        required: true,
                    },

                    reading: {
                        required: true,
                    },

                    writing: {
                        required: true,
                    },

                    speaking: {
                        required: true,
                    },
               },
                messages: {

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

 <?php $this->load->view("fontend/layout/footer.php"); ?>
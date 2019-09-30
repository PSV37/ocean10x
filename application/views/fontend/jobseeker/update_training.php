
          <div class="section lb">
                <div class="container">
                    <div class="row">
                      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                            <div class="userccount">
    <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                   <?php $key = 1 ?>
                    <?php if (!empty($training_list)): foreach ($training_list as $v_training) : ?>
                            <h5>
                      Your Training No: <?php echo $key; ?>  

                                   <a href="#" data-toggle="modal" data-target="#UdpateTraining<?php  echo $v_training->js_training_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>                    
                                    <a href="<?php echo base_url() ?>/job_seeker/delete_training/<?php echo $v_training->js_training_id ?>" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                            </h5>
                              <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Training Title:</td>
                                  <td><?php echo $v_training->training_title; ?></td>
                                </tr>

                                <?php if(!empty($v_training->training_topic)): ?>

                                <tr>
                                  <td>Training Topic:</td>
                                    <td><?php echo $v_training->training_topic; ?></td>
                                </tr>
                              <?php endif; ?>

                                <tr>
                                  <td>Training Institute:</td>
                              <td><?php echo $v_training->institute; ?></td>
                                </tr>

                                <tr>
                                  <td>Country:</td>
                                <td><?php echo $v_training->country; ?></td>
                                </tr>

                                <tr>
                                  <td>Location:</td>
                                <td><?php echo $v_training->location; ?></td>
                                </tr>

                                <tr>
                                  <td>Duration:</td>
                                <td><?php echo $v_training->duration; ?></td>
                                </tr>
                                 <tr>
                                  <td>Year:</td>
                                <td><?php echo $v_training->training_year; ?></td>
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
                            <strong>There is no Training to show!</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>

                   <hr class="invis">
                      <?php if(!empty($v_training)): ?>
                    
                                    <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal" data-target="#addTraining">Add More Training</button></div>

                      <?php else: ?>
 <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal" data-target="#addTraining">Add Training</button></div>
                      <?php  endif;?>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->



<?php foreach($training_list as $v_training): ?>
<div id="UdpateTraining<?php echo $v_training->js_training_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
   <?php
    $training_list=$this->Job_training_model->get($v_training->js_training_id); 
    
   ?>
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Training Information</h4>
      </div>
      <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_training');?>" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" value="<?php echo $v_training->js_training_id; ?>" name="job_training_id">
                <label class="control-label col-sm-3" for="email">Training Title</label>
                <div class="col-sm-9">
                  <input type="text" name="training_title" class="form-control" id="training_title" placeholder="Training Title"
                   value="<?php
                         if (!empty($training_list->training_title)) {
                           echo $training_list->training_title;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Topic:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic"
                   value="<?php
                         if (!empty($training_list->training_topic)) {
                           echo $training_list->training_topic;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute:</label>
                <div class="col-sm-9">
                  <input type="text" name="institute" class="form-control" id="institute" placeholder="Institiute Name"
                   value="<?php
                         if (!empty($training_list->institute)) {
                           echo $training_list->institute;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <input type="text" name="country" class="form-control" id="country" placeholder="Country Name"
               value="<?php
                         if (!empty($training_list->country)) {
                           echo $training_list->country;
                           }
                       ?>">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Location:</label>
                <div class="col-sm-9">
                  <input name="location" type="text"  class="form-control" id="location" placeholder="Location"

               value="<?php
                         if (!empty($training_list->location)) {
                           echo $training_list->location;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration:</label>
                <div class="col-sm-9">
                  <input name="duration" type="text"  class="form-control" id="duration" placeholder=" 1 years 2 month"

               value="<?php
                         if (!empty($training_list->duration)) {
                           echo $training_list->duration;
                           }
                       ?>">
                </div>
              </div>

                 <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                <div class="col-sm-9">
                  <input name="training_year" type="text"  class="form-control" id="training_year" placeholder="Training Years"    
                  value="<?php
                         if (!empty($training_list->training_year)) {
                           echo $training_list->training_year;
                           }
                       ?>">
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


<div id="addTraining" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Training Information</h4>
      </div>
      <div class="modal-body">
         <form id="Training-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_training');?>" method="post" style="padding: 30px;">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Title:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_title" class="form-control" id="training_title" placeholder="Training Title">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Topic:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute:</label>
                <div class="col-sm-9">
                  <input type="text" name="institute" class="form-control" id="institute" placeholder="Institute Name"
                 >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <input type="text" name="country" class="form-control" id="country" placeholder="Country Name "
              >
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Location:</label>
                <div class="col-sm-9">
                  <input name="location" type="text"  class="form-control" id="location" placeholder="Location">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration:</label>
                <div class="col-sm-9">
                  <input name="duration" type="text"  class="form-control" id="duration" placeholder="1 years 2 months">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                <div class="col-sm-9">
                  <input name="training_year" type="text"  class="form-control" id="training_year" placeholder="Training Years">
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
        $( "#Training-info").validate( {
                rules: {

                    training_title: {
                        required: true,
                        minlength: 5
                    },
                    country: {
                        required: true,
                    },

                    institute: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    duration: {
                      required: true,
                    },
                     training_year: {
                      required: true,
                    },

                },
                messages: {
                    training_title: "Please enter a valid Title",
                    country: "Please enter your country name",
                    institute: "Please enter your institue",
                    location: "Please enter your location",
                    duration: "Please enter your duration",
                    training_year: "Please enter training year",
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

                    training_title: {
                        required: true,
                        minlength: 5
                    },
                    country: {
                        required: true,
                    },

                    institute: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    duration: {
                      required: true,
                    },     
                     training_year: {
                      required: true,
                    },

                },
                messages: {
                    training_title: "Please enter a valid Title",
                    country: "Please enter your country name",
                    institute: "Please enter your institue",
                    location: "Please enter your location",
                    duration: "Please enter your duration",
                    training_year: "Please enter training year",
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


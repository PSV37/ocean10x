           

          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                            <div class="userccount">
                               <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                   <?php $key = 1 ?>
                    <?php if (!empty($reference_list)): foreach ($reference_list as $v_reference) : ?>
                            <h5>
                      Your Reference No: <?php echo $key; ?>  

                                   <a href="#" data-toggle="modal" data-target="#UdpateReference<?php  echo $v_reference->js_reference_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                <a href="<?php echo base_url() ?>/job_seeker/delete_reference/<?php echo $v_reference->js_reference_id ?>" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                            </h5>
                              <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Full Name:</td>
                                  <td><?php echo $v_reference->name; ?></td>
                                </tr>

                                <tr>
                                  <td>Orgranization:</td>
                                    <td><?php echo $v_reference->org_name; ?></td>
                                </tr>

                                <tr>
                                  <td>Desigantion:</td>
                              <td><?php echo $v_reference->designation; ?></td>
                                </tr>

                                <tr>
                                  <td>Mobile:</td>
                                <td><?php echo $v_reference->mobile; ?></td>
                                </tr>

                                <tr>
                                  <td>Email:</td>
                                <td><?php echo $v_reference->email; ?></td>
                                </tr>

                                <tr>
                                  <td>Relation:</td>
                                <td><?php echo $v_reference->relation; ?></td>
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
                            <strong>There is no Reference to show!</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>

                   <hr class="invis">

                    <?php if(!empty($v_reference)): ?>
                                    <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal"  data-target="#addReference">Add More Reference</button></div>
                          <?php else:?>

                            <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal"  data-target="#addReference">Add Reference</button></div>
                          <?php endif; ?>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->



<?php foreach($reference_list as $v_reference): ?>
<div id="UdpateReference<?php echo $v_reference->js_reference_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
   <?php
    $reference_list=$this->Job_reference_model->get($v_reference->js_reference_id); 
    
   ?>
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reference Information</h4>
      </div>
      <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_reference');?>" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" name="reference_info_id" value="<?php echo $v_reference->js_reference_id; ?>">
                <label class="control-label col-sm-3" for="email">Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name"
                   value="<?php
                         if (!empty($reference_list->name)) {
                           echo $reference_list->name;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Orgnization:</label>
                <div class="col-sm-9">
                  <input type="text" name="org_name" class="form-control" id="org_name" placeholder="Enter Orgnization Name"
                   value="<?php
                         if (!empty($reference_list->org_name)) {
                           echo $reference_list->org_name;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation"
                   value="<?php
                         if (!empty($reference_list->designation)) {
                           echo $reference_list->designation;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Mobile:</label>
                <div class="col-sm-9">
                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your Mobile No"
               value="<?php
                         if (!empty($reference_list->mobile)) {
                           echo $reference_list->mobile;
                           }
                       ?>">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Email:</label>
                <div class="col-sm-9">
                  <input name="email" type="text"  class="form-control" id="email" placeholder="Enter email"

               value="<?php
                         if (!empty($reference_list->email)) {
                           echo $reference_list->email;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Relation:</label>
                <div class="col-sm-9">
                  <input name="relation" type="text"  class="form-control" id="rlation" placeholder="Enter relation"

               value="<?php
                         if (!empty($reference_list->relation)) {
                           echo $reference_list->relation;
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


<div id="addReference" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reference Information</h4>
      </div>
      <div class="modal-body">
         <form id="Reference-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_reference');?>" method="post" style="padding: 30px;">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Full Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Orgnization:</label>
                <div class="col-sm-9">
                  <input type="text" name="org_name" class="form-control" id="org_name" placeholder="Enter Organization Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation Name"
                 >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Mobile:</label>
                <div class="col-sm-9">
                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your Mobile No"
              >
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Email:</label>
                <div class="col-sm-9">
                  <input name="email" type="text"  class="form-control" id="email" placeholder="Enter email">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Relation:</label>
                <div class="col-sm-9">
                  <input name="relation" type="text"  class="form-control" id="relation" placeholder="Enter Realtion ">
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
        $( "#Reference-info" ).validate( {
                rules: {

                    name: {
                        required: true,
                        minlength: 5
                    },

                    org_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                realtion: {
                        required: true,
                    },

                },
                messages: {
                    name: "Please enter a full name",
                    org_name: "Please enter organization name ",
                    mobile: "Please enter  mobile number",
                    designation: "Please enter designation ",
                    email: "Please enter email",
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

                    name: {
                        required: true,
                        minlength: 5
                    },

                    org_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },

                },
                messages: {
                    name: "Please enter a full name",
                    org_name: "Please enter organization name ",
                    mobile: "Please enter  mobile number",
                    designation: "Please enter designation ",
                    email: "Please enter email",
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

 
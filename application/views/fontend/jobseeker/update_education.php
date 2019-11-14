           
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
                        <?php echo $v_education['education_level_name']; ?><a href="#" class="btn btn-xs getformbylevel"  data-level_id='<?php echo $v_education['education_level_id']; ?>' title="Add More" data-toggle="modal" data-target="#addEducation" ><i class="fa fa-plus"></i></a>
                      </h5>
                      <?php  $jobseeker_id = $this->session->userdata('job_seeker_id'); 
                        $seeker_edu_id = $v_education['education_level_id'];  
                        $education_data = geSeekerEducationByid($jobseeker_id,$seeker_edu_id);
                      ?>
                       <?php if (!empty($education_data)): foreach ($education_data as $all_education) : ?>
                      <h5>
                        <a href="#" data-edit_level_id='<?php echo $all_education['js_education_id']; ?>|<?php echo $v_education['education_level_id']; ?>' data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs geteditformbylevel" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/<?php echo $all_education['js_education_id']; ?>" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                      </h5>
                          <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                             
                              <tr>
                                  <td width="30%">Education:</td>
                                  <td><?php echo $all_education['education_level_name']; ?></td>
                                </tr>
                                <?php if($all_education['education_level_name']=='Ph.D / Doctorate' || $all_education['education_level_name']=='Masters/Post-Graduation' || $all_education['education_level_name']=='Gradution/Diploma') {?>
                                <tr>
                                  <td>Specialization:</td>
                                    <td><?php echo $all_education['education_specialization']; ?></td>
                                </tr>

                                <tr>
                                  <td>University/Institute Name:</td>
                                  <td><?php echo $all_education['js_institute_name']; ?></td>
                                </tr>
                                 <tr>
                                  <td>Marks:</td>
                                  <td><?php echo $all_education['js_resut'].'%'; ?></td>
                                </tr>
                                <?php } ?>

                                <?php if($all_education['education_level_name']=='10th' || $all_education['education_level_name']=='12th') {?>
                                <tr>
                                  <td>Board:</td>
                                  <td><?php echo $all_education['schoolboard_name']; ?></td>
                                </tr>
                                <tr>
                                  <td>School Medium:</td>
                                  <td><?php echo $all_education['school_medium']; ?></td>
                                </tr>
                                 <tr>
                                  <td>Marks:</td>
                                  <td><?php echo $all_education['totalmarks_id'].'%'; ?></td>
                                </tr>
                                <?php } ?>
                               
                                <tr>
                                  <td>Passing Year:</td>
                                  <td><?php echo $all_education['js_year_of_passing']; ?> </td>
                                </tr>
                              
                              </tbody>
                            </table>
                          </div> 
                          <?php
                            endforeach;
                            else :
                          ?>
                          <td colspan="3">
                              <!-- <strong>There is no Educational Information to show!</strong> -->
                          </td><!--/ get error message if this empty-->
                        <?php
                          endif;
                          $key++;
                          endforeach;
                           endif;
                        ?>
                  
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
        <h4 class="modal-title" align="center">Add Education</h4>
      </div>
      <div class="modal-body education_frm">
    
      </div>
   
    </div>

  </div>
</div>

<script>
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


  $(".getformbylevel").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //(... rest of your JS code)
    var edu_id = $(this).data('level_id');
    // var edu_id = edu_ids[1];
    // var edu_id1 = edu_ids[0];
    // alert(edu_id);

     $.ajax({
              url: "<?php echo base_url();?>job_seeker/education_data",
              type: "POST",
              data: {edu_id:edu_id},
          
              success: function(data)
              {
                $('.education_frm').html(data);
                // Display Modal
                $('#addEducation').modal('show'); 

              }
        });
       
});

$(".geteditformbylevel").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //(... rest of your JS code)
    var edit_edu_idq = $(this).data('edit_level_id');
    var srt = edit_edu_idq.split('|');
   var edit_edu_id = srt[0];
   var edu_id = srt[1];
    
     $.ajax({
              url: "<?php echo base_url();?>job_seeker/education_data",
              type: "POST",
              data: {edit_edu_id:edit_edu_id,edu_id:edu_id},
          
              success: function(data)
              {
                $('.education_frm').html(data);
                // Display Modal
                $('#addEducation').modal('show'); 

              }
        });
       
});
</script>

  <script>
    function hideshowfun()
    {
      var a = $('#category').val();
     
        
      if(a=='Course Requires a Pass')
        {
          $('#comp_name').hide();
        }
       else{
          $('#comp_name').show();
       } 
       
      if(a=='Scale 10 Grading System' || a=='Scale 4 Grading System' || a=='% Marks of 100 Maximum')
        {
          $('#name').hide();
        }
       else{
          $('#name').show();
       } 
    }
</script>
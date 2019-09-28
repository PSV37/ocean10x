          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>


                        <div class="content col-md-9">
                             <div class="userccount">
                            
<?php $key = 1 ?>
                                    <hr>
                            <h5>
                                  Career Information
                                 
 <a href="#" data-toggle="modal" data-target="#UpdateCareer" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
  <a href="<?php echo site_url('job_seeker/delete_career/'.$job_career_info[0]->job_seeker_id.''); ?>" onclick="return confirm('Are you sure?');"  class="btn pull-right bg-red btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></a>               
                            </h5>
                              <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Career Summary:</td>
                                  <td><?php if(!empty($job_career_info[0]->js_career_sum))
                                          echo $job_career_info[0]->js_career_sum;
                                   ?></td>
                                </tr>


                             <tr>
                                  <td width="30%">Total Number of Experience :</td>
                                  <td><?php if(!empty($job_career_info[0]->js_career_exp))
                                          echo $job_career_info[0]->js_career_exp;
                                   ?></td>
                                </tr>
                               <tr>
                                  <td width="30%">Field of Specialization :</td>
                                  <td><?php if(!empty($job_career_info[0]->field_sepicalization))
                                          echo $job_career_info[0]->field_sepicalization;
                                   ?></td>
                                </tr>

                               <tr>
                                  <td width="30%">Extra Curricular Activities:</td>
                                  <td><?php if(!empty($job_career_info[0]->extracurricular))
                                          echo $job_career_info[0]->extracurricular;
                                   ?></td>
                                </tr>

                                <tr>
                                  <td width="30%">Skills:</td>
                                  <td><?php if(!empty($job_career_info[0]->skills))
                                          echo $job_career_info[0]->skills;
                                   ?></td>
                                </tr>



                              <tr>
                                  <td width="30%">Expected Salary:</td>
                                  <td><?php if(!empty($job_career_info[0]->js_career_salary))
                                          echo $job_career_info[0]->js_career_salary;
                                   ?></td>
                                </tr>
                               
                              <tr>
                                  <td width="30%">Avaliable:</td>
                                  <td><?php if(!empty($job_career_info[0]->avaliable))
                                          echo $job_career_info[0]->avaliable;
                                   ?></td>
                                </tr>
    
                              </tbody>
                            </table>
                            </div>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->

<script>
function delete_Career(id) {
    if (confirm('Are you sure you want to Delete Career ?')) {
//   window.location.href = "<?php echo site_url('job_seeker/delete_career/'); ?>";

}
   
} else {
    // Do nothing!
}
}
</script>




<!-- Modal -->
<div id="UpdateCareer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Career Information</h4>
      </div>
      <div class="modal-body">
         <form id="Career-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_career');?>" method="post" style="padding: 30px;">

               <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Career Summary:</label>
                <div class="col-sm-9">
                  <textarea name="js_career_sum" class="form-control" rows="5" id="js_career_sum"><?php if (!empty($job_career_info[0]->js_career_sum)) {
                           echo $job_career_info[0]->js_career_sum;
                           }
                       ?></textarea>
                </div>
              </div>

            <div class="form-group">
            <input type="hidden" name="js_career_id" value="<?php echo $job_career_info[0]->js_career_info_id; ?>">
                <label class="control-label col-sm-3" for="pwd">Field of Specialization:</label>
                <div class="col-sm-9">
                  <textarea name="field_sepicalization" class="form-control" rows="5" id="field_sepicalization"><?php if (!empty($job_career_info[0]->field_sepicalization)) {
                           echo $job_career_info[0]->field_sepicalization;
                           }
                       ?></textarea>
                </div>
              </div>




               <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Extra Curricular Activities:</label>
                <div class="col-sm-9">
                  <textarea name="extracurricular" class="form-control" rows="5" id="extracurricular"><?php if (!empty($job_career_info[0]->extracurricular)) {
                           echo $job_career_info[0]->extracurricular;
                           }
                       ?></textarea>
                </div>
              </div>

         <div class="form-group">
                <label class="control-label col-sm-3" for="email">Skills:</label>
                <div class="col-sm-9">
                  <input type="text" name="skills" class="form-control" id="skills" placeholder="Your Skills"
                   value="<?php
                         if (!empty($job_career_info[0]->skills)) {
                           echo $job_career_info[0]->skills;
                           }
                       ?>">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email"> Expected Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Expected Salary"
                   value="<?php
                         if (!empty($job_career_info[0]->js_career_salary)) {
                           echo $job_career_info[0]->js_career_salary;
                           }
                       ?>">
                </div>
              </div>
 <div class="form-group">
                <label class="control-label col-sm-3" for="email">Year of Experience:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_exp" class="form-control" id="js_career_exp" placeholder="Total Career Number of Experience"
                   value="<?php
                         if (!empty($job_career_info[0]->js_career_exp)) {
                           echo $job_career_info[0]->js_career_exp;
                           }
                       ?>">
                </div>
              </div>
         
         <div class="form-group">
                <label class="control-label col-sm-3" for="email"> Avaliable:</label>
                <div class="col-sm-9">
                  <input type="text" name="avaliable" class="form-control" id="avaliable" placeholder="Enter Full Time/ Half Time"
                   value="<?php
                         if (!empty($job_career_info[0]->avaliable)) {
                           echo $job_career_info[0]->avaliable;
                           }
                       ?>">
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-sm-3" for="email">Preferable Job Area:</label>
                <div class="col-sm-9">
                  <input type="text" name="job_area" class="form-control" id="job_area" placeholder="Preferable Job Area"
                   value="<?php
                         if (!empty($job_career_info[0]->job_area)) {
                           echo $job_career_info[0]->job_area;
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



  <script type="text/javascript">

        $( document ).ready( function () {
            $( "#Career-info" ).validate( {
                rules: {

                    js_career_obj: {
                        required: true,
                    },

                    js_career_sum: {
                        required: true,
                    },

                    js_career_salary: {
                        required: true,
                    },

                    avaliable: {
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

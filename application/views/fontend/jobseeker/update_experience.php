

            <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
                        <div class="content col-md-9">
                            <div class="userccount">
                              <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                   <?php $key = 1?>
                    <?php if (!empty($experinece_list)): foreach ($experinece_list as $v_experience): ?>
                              <h5>
                        Your Experience No: <?php echo $key; ?>

                                     <a href="#" data-toggle="modal" data-target="#EditExperience<?php echo $v_experience->js_experience_id; ?>" onclick="javascript:disableDP('<?php echo $key ?>')"class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                <a href="<?php echo base_url() ?>/job_seeker/delete_experience/<?php echo $v_experience->js_experience_id ?>" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>
                              </h5>
                                <div class="table-responsive">
                              <table class="table">

                                <tbody>
                                  <tr>
                                    <td width="30%">Compnay Name:</td>
                                    <td><?php echo $v_experience->company_profile_id; ?></td>
                                  </tr>

                                  <tr>
                                    <td>Designation:</td>
                                      <td><?php echo $v_experience->designation_name; ?></td>
                                  </tr>

                                  <tr>
                                    <td>Department:</td>
                                    <td><?php echo $v_experience->department_name; ?></td>
                                  </tr>

                                 <!-- <tr>
                                    <td>Job Level:</td>
                                    <td><?php /* echo $this->job_level_model->get_job_level_by_id( $v_experience->job_level); */ ?></td>
                                  </tr>-->

                                  <tr>
                                    <td>Duration:</td>
                                     <td><?php $today=date("Y-m-d"); if($v_experience->end_date=="2017-08-30") {
                                    echo date_calculate($v_experience->start_date,$today);
                                  }else { echo date_calculate($v_experience->start_date,$v_experience->end_date); }?>
                                    
                                  </td>
                                  </tr>
                                  <!--<tr>
                                    <td>Address:</td>
                                     <td><?php echo $v_experience->address; ?></td>
                                  </tr>-->
									<tr>
                                    <td>My Responsibilities:</td>
                                    <td><?php echo $v_experience->responsibilities ; ?></td>
                                  </tr>
								  
								   <tr>
                                    <td>My Achievement:</td>
                                    <td><?php  echo $v_experience->achievement ; ?></td>
                                  </tr>
                                </tbody>
                              </table>
                              </div>
                       <?php
                            $key++;
                            endforeach;
                        ?><!--get all category if not this empty-->
                    <?php else: ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no Experience to show!</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                      endif;?>

                   <hr class="invis">

                      <?php if (!empty($v_experience)) : ?> 
                        <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal" data-target="#addExperience">Add More Experience</a></div>
                      <?php else : ?>

                      <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal" radius-button data-target="#addExperience">Add Experience</a></div>

                        <?php endif; ?>
                                   
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end section -->



<?php $count=1; foreach ($experinece_list as $v_experience): ?>

<div id="EditExperience<?php echo $v_experience->js_experience_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

   <?php
$experinece = $this->Job_seeker_experience_model->get($v_experience->js_experience_id);
?>
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Experince Information</h4>
      </div>
       <script>
      $(document).on("click", ".modal-body", function () {
       $(".datepicker").datepicker({
         // dateFormat: 'dd-mm-yy'     
          //changeMonth: true,

          //changeYear: true,

          dateFormat: 'dd-mm-yy',

          //yearRange: '2000:2019',                               
         });
       });  
    </script> 
      <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
         <input type="hidden" name="js_experience_id" value="<?php echo $v_experience->js_experience_id; ?>">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company Name:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control"  id="edit_company_profile_id" required name="company_profile_id" value="<?php if (!empty($experinece->company_profile_id)) { echo $experinece->company_profile_id;} ?>">

                </div>
              </div>

        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <select  name="designation_id" class="form-control">
					<option value="">Select Desigantion</option>
					<?php foreach($designation as $keys){?>
					<option value="<?php echo $keys['designation_id']; ?>"<?php if($experinece->designation_id==$keys['designation_id']){ echo "selected"; }?>><?php echo $keys['designation_name']; ?></option>
					<?php } ?>
				  </select>

                </div>
              </div>

              <!--<div class="form-group">
                <label class="control-label col-sm-3" for="email">Job Level</label>
                <div class="col-sm-9">
                    <select name="job_level" class="form-control" id="job_level" >
                       <?php /*
echo $this->job_level_model->selected($experinece->job_level); */
?>
                      </select>
                </div>
              </div>-->

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Department:</label>
                <div class="col-sm-9">
				 <select  name="dept_id" class="form-control">
					<option value="">Select Department</option>
					<?php foreach($department as $dept){?>
					<option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
					<?php } ?>
				  </select>
                </div>
              </div>


   <div class="form-group">
                <label class="control-label col-sm-3" for="email">Start Date:</label>
                <div class="col-sm-9"><input class="datepicker form-control"  required name="start_date" value="<?php
if (!empty($experinece->start_date)) {
    echo date('d-m-Y',strtotime($experinece->start_date));
}
?>" class="form-control" >
 <label><input type="checkbox" id="upChkDisable_<?php echo $count?>" onclick="disableUpperDP('<?php echo $count?>')">  Current Job</label>

                </div>
              </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email">End Date:</label>
                <div class="col-sm-9"><input id="resDate_<?php echo $count?>" class="datepicker form-control"  required name="end_date" value="<?php if (!empty($experinece->end_date)) { echo date('d/m/Y',strtotime($experinece->end_date)); }else{ echo "";} ?>" class="form-control" >
                 
                </div>
              </div>

 
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Job Location</label>
                <div class="col-sm-9">
                 <input type="text" name="address" class="form-control" id="job_area" value="<?php 
                         if (!empty($experinece->address)) {
                           echo $experinece->address;
                           }
                       ?>">
                </div>
              </div>
				<div class="form-group">
                <label class="control-label col-sm-3" for="email">Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Salary" value="<?php if (!empty($experinece->js_career_salary)) {
                           echo $experinece->js_career_salary;
                           }
                       ?>">
                </div>
              </div>
			  
			   <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                <div class="col-sm-9">
                 <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"><?php 
                         if (!empty($experinece->responsibilities)) {
                           echo $experinece->responsibilities;
                           }
                       ?></textarea>
                </div>
              </div>
			  
				<div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                <div class="col-sm-9">
                 <textarea name="achievement" class="form-control" rows="5" id="achievement"><?php
                         if (!empty($experinece->achievement )) {
                           echo $experinece->achievement ;
                           }
                        ?></textarea>
                </div>
              </div>

                <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"><?php 
                       /*  if (!empty($experinece->major_activity)) {
                           echo $experinece->major_activity;
                           }
                    */   ?></textarea>
                </div>
              </div>-->

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
      </div>
   
    </div>
</div>
</div>
<?php  $count++; ?>
<?php endforeach;?>
<input type="hidden" name="max_experience" id="max_experience" value="<?php echo $count; ?>">
<div id="addExperience" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Experience Information</h4>
      </div>
      <div class="modal-body">
        <form id="addExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
        <p>Please add your educational information in chronological order.</p>
            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company Name:</label>
                <div class="col-sm-9">
                  <input type="text" id="company_profile_id" name="company_profile_id" class="form-control">
                 
                </div>

            </div>
           
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <select  name="designation_id" class="form-control">
					<option value="">Select Desigantion</option>
					<?php foreach($designation as $keys){?>
					<option value="<?php echo $keys['designation_id']; ?>"><?php echo $keys['designation_name']; ?></option>
					<?php } ?>
				  </select>
                </div>
              </div>

              <!--<div class="form-group">
                <label class="control-label col-sm-3" for="email">Job Level</label>
                <div class="col-sm-9">
                    <select name="job_level" class="form-control" id="job_level">
                        <option value="">Select One</option>
                       <?php echo $this->job_level_model->selected(); ?>
                      </select>
                </div>
              </div>-->

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Department:</label>
                <div class="col-sm-9">
                 	<select  name="dept_id" class="form-control">
          					<option value="">Select Department</option>
          					<?php foreach($department as $depts){?>
          					<option value="<?php echo $depts['dept_id']; ?>"><?php echo $depts['department_name']; ?></option>
          					<?php } ?>
        				  </select>

                </div>
              </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="email">Start Date</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control datepicker"  required id="start_date" name="start_date">
                  <label><input type="checkbox" id="chkDisable" onclick="disableAddDP()">  Current Job</label>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">End Date</label>
                <div  class="col-sm-9"><input type="text" class="form-control datepicker"  required id="end_date" name="end_date">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Job Location</label>
                <div class="col-sm-9">
                 <input type="text" name="address" id="job_area" class="form-control">
                </div>
              </div>
			
			
			 <div class="form-group">
                <label class="control-label col-sm-3" for="email">Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Salary">
                </div>
              </div>
			
			<div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                <div class="col-sm-9">
                 <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"></textarea>
                </div>
              </div>
			
                <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Achievement </label>
                <div class="col-sm-9">
                 <textarea name="achievement" class="form-control" rows="5" id="achievement"></textarea>
                </div>
              </div>

              <!--<div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activities</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
                </div>
              </div>-->

          
           <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="submit" class="btn btn-primary">Submit</button>
          </div>
              

            </form>
            </div>
      </div>
     
    </div>

  </div>
</div>

<script type="text/javascript">
  // $(document).ready(function() {
  //     $("#demo-input-onadd-ondelete").tokenInput("<?php echo base_url(); ?>job_seeker/get_autocomplete", {
  //       zindex: 9999
       
          // onAdd: function (item) {
            //alert(item.name);
          // },
          // onDelete: function (item) {
          //     alert("Deleted " + item.name);
          // }

  //     });
  // }); 
    $(function() {
      $("#company_profile_id").autocomplete({
          source: "<?php echo base_url('job_seeker/get_autocomplete'); ?>",
          select: function(a,b)
            {
              $(this).val(b.item.value); //grabed the selected value
              
            }
        });
    });

    $(function() {
      $("#edit_company_profile_id").autocomplete({
          source: "<?php echo base_url('job_seeker/get_autocomplete'); ?>",
          select: function(a,b)
            {
              $(this).val(b.item.value); //grabed the selected value
            }
        });
    });

  </script>

  <script type="text/javascript">

        $( document ).ready( function () {
               // Education Add form Valiaton
        $( "#addExperience-info" ).validate( {
                rules: {

                    company_name: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },

                    job_level: {
                        required: true,
                    },

                    job_nature: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                      duration: {
                        required: true,
                    },

                },
                messages: {
                    company_name: "Please enter company name",
                    designation: "Please designation name ",
                    job_level: "Please select job level",
                    job_nature: "Please select job nature",
                    department: "Please enter your department",
                    duration: "Please enter your duration",
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
      $( "#UpdateExperience-info" ).validate( {
                rules: {

                    company_name: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },

                    job_level: {
                        required: true,
                    },

                    job_nature: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                      duration: {
                        required: true,
                    },

                },
              messages: {
                    company_name: "Please enter company name",
                    designation: "Please designation name ",
                    job_level: "Please select job level",
                    job_nature: "Please select job nature",
                    department: "Please enter your department",
                    duration: "Please enter your duration",
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


      $(function() {

  // $('#date').datepicker({
  //   dateFormat: 'dd-mm-yy',
  //   altField: '#thealtdate',
  //   altFormat: 'dd-mm-yyyy',
  //   defaultDate: null
  // });
/*var max_experience = $("#max_experience").val();

for(var i =1; i < max_experience; i++){
  if($('#resDate_'+i).val()==''  || $('#resDate_+'+i).val()==null){
    
    $('#upChkDisable_'+i).attr("checked","true");
    $('#resDate_'+i).val('Continue');
     $('#resDate_'+i).attr('disabled',"disabled");
  }
  else{
     alert('error');
  }
}*/

});
  function disableAddDP() {
  $("#end_date").attr("disabled", $("#chkDisable").is(":checked")).val("Continue");
}   

  function disableDP(i) {
//alert($('#resDate_'+i).val());
    if($('#resDate_'+i).val()==''  || $('#resDate_'+i).val()==null){
    
    $('#upChkDisable_'+i).attr("checked","true");
    $('#resDate_'+i).val('Continue');
     $('#resDate_'+i).attr('disabled',"disabled");
  }
  
}  



  function disableUpperDP(count) {
  
  $("#resDate_"+count).attr("disabled", $("#upChkDisable_"+count).is(":checked"));
   if($("#upChkDisable_"+count).is(":checked")){
     $('#resDate_'+count).val("Continue");
   } else {
     $('#resDate_'+count).val("");
   }
}

</script>

<style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
</style>

<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#job_area" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "job_seeker/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.city_name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script>   
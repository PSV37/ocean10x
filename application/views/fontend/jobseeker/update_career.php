          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
                         <!-- <input type="text" class="form-control" id="tokenfield" value="red,green,blue" /> -->

                        <div class="content col-md-9">
                            <div class="userccount">
                            <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                            <?php $key = 1 ?>
                                    <hr>
                            <h5>
                              My Desired Profile
                             <a href="#" data-toggle="modal" data-target="#UpdateCareer" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
                              <a href="<?php echo site_url('job_seeker/delete_career/'.$job_career_info[0]->job_seeker_id.''); ?>" onclick="return confirm('Are you sure?');"  class="btn pull-right bg-red btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></a>               
                            </h5>
                            <div class="table-responsive">          
                            <table class="table">

                              <tbody>
							  <tr>
                                  <td width="30%">Work Title:</td>
                                  <td><?php if(!empty($job_career_info[0]->worktitle))
                                          echo $job_career_info[0]->worktitle;
                                   ?></td>
                                </tr>
								
								<tr>
                                  <td width="30%">URL:</td>
                                  <td><?php if(!empty($job_career_info[0]->url))
                                          echo $job_career_info[0]->url;
                                   ?></td>
                                </tr>
							  
                              <tr>
                                  <td width="30%">Career Summary:</td>
                                  <td><?php if(!empty($job_career_info[0]->js_career_sum))
                                          echo $job_career_info[0]->js_career_sum;
                                   ?></td>
                                </tr>


                             <!--<tr>
                                  <td width="30%">Total Number of Experience :</td>
                                  <td><?php /*if(!empty($job_career_info[0]->js_career_exp))
                                          echo $job_career_info[0]->js_career_exp; */
                                   ?></td>
                                </tr>-->
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

                                <!--<tr>
                                  <td width="30%">Skills:</td>
                                  <td><?php /* if(!empty($job_career_info[0]->skills))
                                          echo $job_career_info[0]->skills;
                                  */ ?></td>
                                </tr>-->



                              <tr>
                                  <td width="30%">Expected Salary:</td>
                                  <td><?php if(!empty($job_career_info[0]->js_career_salary))
                                          echo $job_career_info[0]->js_career_salary;
                                   ?></td>
                                </tr>
                               
                              <tr>
                                  <td width="30%">Job Type:</td>
                                  <td><?php if(!empty($job_career_info[0]->avaliable))
                                          echo $job_career_info[0]->avaliable;
                                   ?></td>
                                </tr>
								
								<tr>
                                  <td width="30%">Preferable Job Location:</td>
                                  <td><?php if(!empty($job_career_info[0]->job_area))
                                          echo $job_career_info[0]->job_area;
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
   
} 
</script>




<!-- Modal -->
<div id="UpdateCareer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update My Desired Profile</h4>
      </div>
      <div class="modal-body">
         <form id="Career-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_career');?>" method="post" style="padding: 30px;">
				
				 <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Work Title:</label>
                <div class="col-sm-9">
                  <input type="text" name="worktitle" id="worktitle" class="form-control" required value="<?php if (!empty($job_career_info[0]->worktitle)) {
                           echo $job_career_info[0]->worktitle;
                           }
                       ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">URL:</label>
                <div class="col-sm-9">
                  <input type="text" name="url" id="url" class="form-control" value="<?php if (!empty($job_career_info[0]->url)) {
                           echo $job_career_info[0]->url;
                           }
                       ?>">
                </div>
              </div>
				
               <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Career Summary:</label>
                <div class="col-sm-9">
                  <textarea name="js_career_sum" class="form-control" rows="5"><?php if (!empty($job_career_info[0]->js_career_sum)) {
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

              <!--<div class="form-group">
                <label class="control-label col-sm-3" for="email">Skills:</label>
                <div class="col-sm-9">
                  <input type="text" name="skills" class="form-control" id="tokenfield" placeholder="Enter Your Skills"
                   value="<?php
                         /* if (!empty($job_career_info[0]->skills)) {
                           echo $job_career_info[0]->skills;
                           }
                       */ ?>">
                  
                </div>
              </div>-->
      

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">Expected Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Expected Salary"
                   value="<?php
                         if (!empty($job_career_info[0]->js_career_salary)) {
                           echo $job_career_info[0]->js_career_salary;
                           } 
                       ?>">
                </div>
              </div>
			  		  
			  <!--<div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration From:</label>
                <div class="col-sm-4">
                  <select name="duration_year" id="duration_year" class="form-control">
					<option value="<?php /*if (!empty($job_career_info[0]->duration_year)) {
                           echo $job_career_info[0]->duration_year;
                           } ?>"><?php  if (!empty($job_career_info[0]->duration_year)) {
                           echo $job_career_info[0]->duration_year;
                           } ?>
				   </option>
				   </select>
                </div>
				
				 <div class="col-sm-4">
                   <select name="duration_month" id="duration_month" class="form-control" style="margin-top:5px;">
				   <?php
				   foreach($worktill as $work){
				   ?>
				   <option value="<?php echo $work['work_id']; ?>"<?php if($job_career_info[0]->duration_month==$work['work_id']){ echo "selected"; }?>><?php echo $work['work_month']; ?></option>
				   <?php } ?>
				   
				   </select>	
                </div>
              </div>
			  
			  <div class="form-group answer">
                <label class="control-label col-sm-3" for="pwd">Duration To:</label>
                <div class="col-sm-4">
                  <select name="duration_to_year" id="duration_years" class="form-control">
				   <option value="<?php if (!empty($job_career_info[0]->duration_to_year)) {
                           echo $job_career_info[0]->duration_to_year;
                           } ?>"><?php  if (!empty($job_career_info[0]->duration_to_year)) {
                           echo $job_career_info[0]->duration_to_year;
                           } ?>
				   </option>
				   </select>	
                </div>
				 <div class="col-sm-4">
                  <select name="duration_to_month" id="duration_to_month" class="form-control" style="margin-top:5px;">
				   <?php
				   foreach($worktill as $workt){
				   ?>
				   <option value="<?php echo $workt['work_id']; ?>"<?php if($job_career_info[0]->duration_to_month==$workt['work_id']){ echo "selected"; }?>><?php echo $workt['work_month']; ?></option>
				   <?php } ?>
				   
				   </select>	
                </div>
				
              </div>
			  
			  <div class="form-group">
               
                <div class="col-sm-12">
                 <input type="checkbox"  value="I am currently working on this" name="currentlyworking" id="coupon_question" >&nbsp;&nbsp;&nbsp;I am currently working on this
                </div>
              </div>
			  
            <!-- <div class="form-group">
               <label class="control-label col-sm-3" for="email">Year of Experience:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_exp" class="form-control" id="js_career_exp" placeholder="Total Career Number of Experience"
                   value="<?php 
                         if (!empty($job_career_info[0]->js_career_exp)) {
                           echo $job_career_info[0]->js_career_exp;
                           }
                      */ ?> ">
                </div>
              </div>-->
         
         <div class="form-group">
                <br/> <label class="control-label col-sm-3"> Job Type:</label>
                <div class="col-sm-9">
                  <select name="avaliable" class="form-control">
				  <option value="<?php if (!empty($job_career_info[0]->avaliable)) {
                           echo $job_career_info[0]->avaliable;
                           } ?>"><?php  if (!empty($job_career_info[0]->avaliable)) {
                           echo $job_career_info[0]->avaliable;
                           } ?></option>
					<option value="Full Time">Full Time</option>
					<option value="Part Time">Part Time</option>
					<option value="Contractual Time">Contractual</option>
				  </select>
                </div>
              </div>

             <div class="form-group">
                <label class="control-label col-sm-3" for="email">Preferable Job Location:</label>
                <div class="col-sm-9">
                  <input type="text" name="job_area" class="form-control" id="job_area" placeholder="Preferable Job Area"
                   value="<?php
                         if (!empty($job_career_info[0]->job_area)) {
                           echo $job_career_info[0]->job_area;
                           }
                       ?>">
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



  <script type="text/javascript">



        $( document ).ready( function () {
            $( "#Career-info" ).validate( {
                rules: {

                    

                    js_career_salary: {
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

              $('#tokenfield').tokenfield({
                autocomplete: {
                  source: "<?php echo base_url('job_seeker/get_skills_autocomplete'); ?>",
                  delay: 100
                },
                showAutocompleteOnFocus: true,

              });
              // to avoid duplications
           $('#tokenfield').on('tokenfield:createtoken', function (event) {
                var existingTokens = $(this).tokenfield('getTokens');
                $.each(existingTokens, function(index, token) {
                    if (token.value === event.attrs.value)
                        event.preventDefault();

                });
            });

        });

    </script>
<style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
  .tokenfield .token .close {
    font-family: Arial !important;
    display: inline-block !important;
    line-height: 100% !important;
    font-size: 1.1em !important;
    line-height: 1.49em !important;
    margin-left: 5px !important;
    float: none !important;
    height: 100% !important;
    vertical-align: top !important;
    padding-right: 4px !important;

    color: #989090f2; 

}
</style>


<script>
$(function() {
  $("#coupon_question").on("click",function() {
    $(".answer").toggle(this.unchecked);
  });
});
</script>


<script type="text/javascript">
        $(function () {
            //Reference the DropDownList.
            var ddlYears = $("#duration_year");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = 1940; i <= currentYear; i++) {
                var option = $("<option />");
                option.html(i);
                option.val(i);
                ddlYears.append(option);
            }
        });
    </script>
	
	
	<script type="text/javascript">
        $(function () {
            //Reference the DropDownList.
            var ddlYears = $("#duration_years");

            //Determine the Current Year.
            var currentYear = (new Date()).getFullYear();

            //Loop and add the Year values to DropDownList.
            for (var i = 1940; i <= currentYear; i++) {
                var option = $("<option />");
                option.html(i);
                option.val(i);
                ddlYears.append(option);
            }
        });
    </script>
	
	
	<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#duration_year").select2( {
	placeholder: "Select Year",
	allowClear: true
	} );
</script>

<script>
$("#duration_years").select2( {
	placeholder: "Select Year",
	allowClear: true
	} );
</script>

<script>
$("#duration_to_month").select2( {
	placeholder: "Select Month",
	allowClear: true
	} );
</script>

<script>
$("#duration_month").select2( {
	placeholder: "Select Month",
	allowClear: true
	} );
</script>


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
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                            <div class="userccount">
                            <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                            <?php $key = 1 ?>
                                    <hr>
                            <h5>
                              I am looking for Better Opportunities !
                             <a href="#" data-toggle="modal" data-target="#UpdateCareer" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
                              <a href="<?php echo site_url('job_seeker/delete_career/'.$job_career_info[0]->job_seeker_id.''); ?>" onclick="return confirm('Are you sure to delete this info?');"  class="btn pull-right bg-red btn-xs" title="Delete" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></a>               
                            </h5>
                            <div class="table-responsive">          
                              <table class="table">
                                
                                <tbody>
  							                  
                                  <tr>
                                    <td width="30%">Industry:</td>
                                    <td><?php echo $results['job_category_name']; ?> </td>
                                  </tr>
  								
  								                <tr>
                                    <td width="30%">Functional Area:</td>
                                    <td><?php echo $results['department_name']; ?></td>
                                  </tr>
  							  
                                  <tr>
                                    <td width="30%">Role:</td>
                                    <td><?php echo $results['job_role_title']; ?></td>
                                  </tr>
  								                <tr>
                                    <td width="30%">Job Type:</td>
                                    <td><?php if(!empty($job_career_info[0]->avaliable))
                                            echo $job_career_info[0]->avaliable;
                                     ?></td>
                                  </tr>
  								
  								                <tr>
                                    <td width="30%">Preferred Shift:</td>
                                     <td><?php echo $results['shift_type']; ?></td>
                                  </tr>

                                  <tr>
                                    <td width="30%">Expected Salary:</td>
                                    <td><?php if(!empty($job_career_info[0]->salary_type)) echo $job_career_info[0]->salary_type;if(!empty($job_career_info[0]->js_career_salary))
                                            echo " ". $job_career_info[0]->js_career_salary;
                                     ?></td>
                                  </tr>

                                   <tr>
                                    <td width="30%">Availability to Join:</td>
                                    <td>
                                      <?php if (!empty($job_career_info[0]->immediate_join)) {
                                          if($job_career_info[0]->immediate_join=='Yes'){ echo 'Immediately';};
                                      }else{
                                         echo date('d M Y', strtotime($job_career_info[0]->availability_date)); 
                                      } ?>
                                    </td>
                                  </tr>
                                		<tr>
                                    <td width="30%">Notice Period</td>
                                    <td>
                                      <?php if(!empty($job_career_info[0]->notice_period))
                                            echo $job_career_info[0]->notice_period.' Days';

                                        if(!empty($job_career_info[0]->serving_notice_period))
                                        if($job_career_info[0]->serving_notice_period=='Yes') {
                                          echo "(Serving)";
                                        }

                                            
                                     ?>
                                    </td>
                                  </tr>	
  								                <tr>
                                    <td width="30%">Desired Location:</td>
                                    <td><?php if(!empty($job_career_info[0]->job_area))
                                            echo $job_career_info[0]->job_area;
                                     ?></td>
                                  </tr>
                                   <tr>
                                    <td width="30%">Desired Industry:</td>
                                    <td><?php if(!empty($job_career_info[0]->desired_industry))
                                            echo $job_career_info[0]->desired_industry;
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
        <form name="f1" id="Career-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_career');?>" method="post" style="padding: 30px;">
				
        <input type="hidden" name="js_career_id" class="form-control" value="<?php
                       if (!empty($job_career_info[0]->js_career_info_id)) {
                         echo $job_career_info[0]->js_career_info_id;
                         } ?>">
				  <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Industry</label>
              <div class="col-sm-9">
                <select  name="industry_id" id="industry_id" class="form-control">
				          <option value="">Select Industry</option>
        				 <?php foreach($industry_master as $industry){?>
        					<option value="<?php echo $industry['job_category_id']; ?>"<?php if($job_career_info[0]->industry_id==$industry['job_category_id']){ echo "selected"; }?>><?php echo $industry['job_category_name']; ?></option>
        					<?php } ?>
        				</select>
              </div>
            </div>
			  
			    <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Functional Area</label>
              <div class="col-sm-9">
                <select  name="dept_id" id="dept_id" class="form-control">
          				<option value="">Select Area</option>
          				<?php foreach($department as $dept){?>
          				<option value="<?php echo $dept['dept_id']; ?>"<?php if($job_career_info[0]->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
          					<?php } ?>
          			</select>
              </div>
          </div>
				
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Job Role</label>
              <div class="col-sm-9">
                <select  name="job_role" id="job_role" class="form-control">
        				  <option value="">Select Role</option>
        				  <?php foreach($job_role as $role){?>
        					<option value="<?php echo $role['id']; ?>"<?php if($job_career_info[0]->job_role==$role['id']){ echo "selected"; }?>><?php echo $role['job_role_title']; ?></option>
        					<?php } ?>
      				  </select>
              </div>
          </div>

				  <div class="form-group">
            <label class="control-label col-sm-3"> Job Type</label>
              <div class="col-sm-9">
                <?php if (!empty($job_career_info[0]->avaliable)) {
                        if($job_career_info[0]->avaliable){
                          $avail = explode(',', $job_career_info[0]->avaliable);
                      } } 
                ?>

                <input type="checkbox" name="avaliable[]" id="avaliable_ft" value="Full Time"<?php if (!empty($job_career_info[0]->avaliable)) {
                          if($avail[0]=='Full Time'){ echo 'checked';};
                         } ?> style="margin: 0 15px;"> Full Time

                <input type="checkbox" name="avaliable[]" id="avaliable_pt" value="Part Time"<?php if (!empty($job_career_info[0]->avaliable)) {
                          if($avail[1]=='Part Time'){ echo 'checked';};
                         } ?> style="margin: 0 15px;"> Part Time
                      
                <input type="checkbox" name="avaliable[]" id="avaliable_ct" value="Contractual"<?php if (!empty($job_career_info[0]->avaliable)) {
                          if($avail[2]=='Contractual'){ echo 'checked';};
                         } ?> style="margin: 0 15px;"> Contractual

              </div>
          </div>

			   <div class="form-group">
          <label class="control-label col-sm-3" for="email">Preferred Shift</label>
            <div class="col-sm-9">
              <select  name="shift_id" id="shift_id" class="form-control">
      				  <option value="">Select Shift</option>
      				 <?php foreach($shift as $shifts){?>
      					<option value="<?php echo $shifts['shift_id']; ?>"<?php if($job_career_info[0]->shift_id==$shifts['shift_id']){ echo "selected"; }?>><?php echo $shifts['shift_type']; ?></option>
      					<?php } ?>
      				</select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Availability to Join</label>
              <div class="col-sm-9">
                <input type="text" class="form-control datepicker" name="avail_to_join" placeholder="Availablity Date " id="avail_to_join" value="<?php echo date('d-m-Y', strtotime($job_career_info[0]->availability_date)); ?>" <?php if (!empty($job_career_info[0]->immediate_join)) {
                          if($job_career_info[0]->immediate_join=='Yes'){ echo 'disabled';};
                         } ?>>
              </div>
        
          </div>
			   <div class="form-group">
          <input type="checkbox" name="join_immediate" id="join_immediate" value="Yes" onclick="enable_text(this.checked)"  style="margin: 0 15px;" <?php if (!empty($job_career_info[0]->immediate_join)) {
                          if($job_career_info[0]->immediate_join=='Yes'){ echo 'checked';};
                         } ?>> Join Immediately
         </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Notice Period In Days</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Notice_period" placeholder="Notice period in days" id="Notice_period" value=" <?php if (!empty($job_career_info[0]->notice_period)) {
                         echo $job_career_info[0]->notice_period;
                         } ?>" onkeypress="javascript:return isNumber(event)">
              </div>
        
          </div>
          <div class="form-group">
            <input type="checkbox" name="Serving_notice_period" value="Yes" style="margin: 0 15px;" <?php if (!empty($job_career_info[0]->serving_notice_period)) {
                          if($job_career_info[0]->serving_notice_period=='Yes'){ echo 'checked';};
                         } ?>>Serving Notice Period
            
          </div>
				  <div class="form-group">
            <label class="control-label col-sm-3" for="email">Expected Salary</label>
              <div class="col-sm-9">
                <br><br>

                <input type="radio" name="salary_type" id="salary_type" value="INR"<?php if (!empty($job_career_info[0]->salary_type)) {
                          if($job_career_info[0]->salary_type=='INR'){ echo 'checked';};
                         } ?> style="margin: 0 15px;"> Indian Rupees

                <input type="radio" name="salary_type" id="salary_type" value="USD"<?php if (!empty($job_career_info[0]->salary_type)) {
                          if($job_career_info[0]->salary_type=='USD'){ echo 'checked';};
                         } ?> style="margin: 0 15px;"> US Dollars <br><br>

                <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Expected Salary"
                  value="<?php
                         if (!empty($job_career_info[0]->js_career_salary)) {
                           echo $job_career_info[0]->js_career_salary;
                           } 
                       ?>" onkeypress="javascript:return isNumber(event)" >
              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Preferred Locations</label>
              <div class="col-sm-9">
                <input type="text" name="job_area" class="form-control" id="tokenfield" placeholder="Enter Location"
                 value="<?php
                       if (!empty($job_career_info[0]->job_area)) {
                         echo $job_career_info[0]->job_area;
                         }
                     ?>">
              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Preferred Industries</label>
              <div class="col-sm-9">
                <input type="text" name="desired_industry" class="form-control" id="tokenfield_indus" placeholder="Enter Industry"
                 value="<?php
                       if (!empty($job_career_info[0]->desired_industry)) {
                         echo $job_career_info[0]->desired_industry;
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

  
    
    $('#tokenfield').tokenfield({
      autocomplete: {
        source: "<?php echo base_url('job_seeker/search_city'); ?>",
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

 $('#tokenfield_indus').tokenfield({
      autocomplete: {
        source: "<?php echo base_url('job_seeker/search_industry'); ?>",
        delay: 100
      },

      showAutocompleteOnFocus: true,
    

    });
    // to avoid duplications
 $('#tokenfield_indus').on('tokenfield_indus:createtoken', function (event) {
      var existingTokens = $(this).tokenfield('getTokens');
      $.each(existingTokens, function(index, token) {
          if (token.value === event.attrs.value)
              event.preventDefault();

      });
  });


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


  });

    function isNumber(evt) {
      var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    

    </script>



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
	
<script>
  function enable_text(status)
    {
      if(status==true){
        $('#avail_to_join').prop('disabled',true);
        $('#avail_to_join').val('');
      }else{
        $('#avail_to_join').prop('disabled',false);
        $('#avail_to_join').val('');
      }
      
    }

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
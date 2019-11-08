<div class="section lb">
  <div class="container">                                
                         
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount">
          <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
        <hr>
          <div id="vsskills" class="tab-pane fade in">
            <div class="row">
              <div class="col-md-12">
                <div class="containe1r">
                  <?php $key = 1 ?>
                          <hr>
                  <h5>
                    Career Information
                   <a href="#" data-toggle="modal" data-target="#Upddelete_careerateCareer" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>   
                    <a href="<?php echo site_url('job_seeker//'.$job_career_info[0]->job_seeker_id.''); ?>" onclick="return confirm('Are you sure?');"  class="btn pull-right bg-red btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-trash" aria-hidden="true"></i></a>               
                  </h5>
                  <div class="table-responsive">          
                    <table class="table">

                      <tbody>
  		  	              <tr>
                          <td width="30%">Skills:</td>
                          <td><?php  if(!empty($job_career_info[0]->skills))
                                  echo $job_career_info[0]->skills;
                           ?></td>
                       </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>


      </div><!-- end post-padding -->
  </div><!-- end col -->
</div><!-- end row -->  
</div><!-- end container -->
</div><!-- end section -->
 
<script>
function delete_skills(id) {
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
        <h4 class="modal-title">Update Skill's</h4>
      </div>
      <div class="modal-body">
         <form id="Career-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_skills');?>" method="post" style="padding: 30px;">
				
				<div class="form-group">
                <label class="control-label col-sm-3" for="email">Skills:</label>
                <div class="col-sm-9">
                  <input type="text" name="skills" class="form-control" id="tokenfield" placeholder="Enter Your Skills"
                   value="<?php
                          if (!empty($job_career_info[0]->skills)) {
                           echo $job_career_info[0]->skills;
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

           
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
                        <!-- Ph.D/Doctorate --> <?php echo $v_education['education_level_name']; ?><a href="#" class="btn btn-xs getformbylevel"  data-level_id='<?php echo $v_education['education_level_id']; ?>' title="Add More" data-toggle="modal" data-target="#addEducation" ><i class="fa fa-plus"></i></a>
                      </h5>
                      <!-- <?php echo $jobseeker_id = $this->session->userdata('job_seeker_id'); echo $v_education['education_level_id'];  ?> -->
                      <h5>
                        <a href="#" data-toggle="modal" data-target="#EditEducation" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                       
                        <a href="<?php echo base_url() ?>/job_seeker/delete_education/" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
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
  $(".getformbylevel").on('click', function(event){
    event.stopPropagation();
    event.stopImmediatePropagation();
    //(... rest of your JS code)
    var edu_id = $(this).data('level_id');
    alert();
     $.ajax({
              url: "<?php echo base_url();?>job_seeker/education_data",
              type: "POST",
              data: {edu_id:edu_id},
              contentType:false,
              processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('#education_frm').html(data);
              }
        });
       
});
</script>
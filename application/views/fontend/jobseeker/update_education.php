           
  <div class="section lb">
        <div class="container">
            <div class="row">
             <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                <div class="content col-md-9">
                  <div class="userccount">
                  <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                    <h5>Education</h5>
                    <hr>
                    <?php if (!empty($edcuaiton_list)): foreach ($edcuaiton_list as $v_education) : ?>  
                      <h5>
                        <!-- Ph.D/Doctorate --> <?php echo $v_education->education_level_name; ?><a href="#" class="btn btn-xs" title="Add More" onclick="open_phdmodel();"><i class="fa fa-plus"></i></a>
                      </h5>
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
              <!--         <h5>
                        Masters/Post-Graduation <a href="#" class="btn btn-xs" title="Add More"><i class="fa fa-plus"></i></a>
                      </h5>
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
                      <h5>
                         Graduation/Diploma <a href="#" class="btn btn-xs" title="Add More"><i class="fa fa-plus"></i> </a>
                      </h5>
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
                      <h5>
                         <a href="#">Add 12th</a> 
                      </h5>
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
                      <h5>
                        <a href="#">Add 10th</a> 
                      </h5>
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
                          </div> -->
                    <hr class="invis">

                     
              </div><!-- end post-padding -->
          </div><!-- end col -->
      </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->

<script>
  function open_phdmodel(){


  }
</script>
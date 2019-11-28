<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
  /*use-itty-bitty-template*/
  /*.formpanel {background: #ececec;}*/
  h1, h2, h4, h5 {
    /*border-bottom: 1px solid #ccc;*/
    /*color: #3F51B5;*/
    padding-bottom: 10px
  }

  .listFlex {display: flex; /*justify-content: center;*/}

  
  .career{
    border-radius: 6px;
    /*background: #cbced247;*/
    margin: 2px;
    padding: 15px;
  }
  .tag_line{
    text-align: unset !important;
  }
  .title-career{
    font-size: 20px;
    font-style: bold;
  }
</style>
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="job-header">
          <div class="contentbox">
            <div class="formpanel">
             
              <?php echo $this->session->flashdata('con_message'); ?>
                <h2 align="center">Personal Profile</h2>

                <img src="<?php echo base_url() ?>upload/<?php echo $intro_data['photo_path'];?>" alt="profile-picture" border="0" class="img img-thumbnail" style="width: 20%;">
              <div class="row">
                <div class="col-md-8">
                  <h3><?php echo $intro_data['full_name']; ?> </h3>
                  <p><?php echo $personal_data['city_name'].', '.$personal_data['state_name'].', '.$personal_data['country_name']; ?></p>
                </div>
                <div class="col-md-4">
                  <?php   
                    print_r($connect_data);
                   //if (!empty($connect_data)): foreach ($connect_data as $sks_row) :?><?php endforeach;  endif;?>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#connect" onclick="$('#js_id').val(<?php echo $intro_data['job_seeker_id']; ?>);">Connect</a>

                  <a href="#" class="btn btn-primary">Message</a>
                </div>
              </div>
                <hr>
                 <h4>About Me</h4>
                 <p><?php echo $intro_data['about_me']; ?></p>
                <hr>
                 <h4>Skills</h4>
                 <div class="listFlex">
                  <?php if (!empty($skill_data)): foreach ($skill_data as $sk_row) : ?>
                      <div>
                        <ul>
                          <li><?php echo $sk_row['skills']; ?></li>
                        </ul>
                      </div>
                  <?php endforeach;  ?>
                  <?php else : ?> 
                    <div>
                      <strong>There is no data to display</strong>
                    </div>
                  <?php endif; ?>
                 </div>
                  <hr>
                 <h4>Experience</h4>
                  <div class="row career">
                    <?php if (!empty($exp_data)): foreach ($exp_data as $exp_row) : 
                      if($exp_row->end_date!='') {
                      $end =  date('M Y', strtotime($exp_row->end_date));
                     }else{
                       $end = "Present";
                     }
                      ?>
                    <div class="col-md-12">
                      <div class="col-md-1"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                      <div class="col-md-11">
                        <sapn class="title-career"><b><?php echo $exp_row->designation_name.' ('.$exp_row->department_name.')'; ?></b></sapn> <br>
                        <span><?php echo $exp_row->company_profile_id; ?></span><br>
                        <p class="tag_line"><?php echo date('M Y', strtotime($exp_row->start_date)).' - '.$end; ?></p>
                        <p class="tag_line"><?php echo $exp_row->address; ?></p><br>
                        <p class="tag_line"><?php echo $exp_row->responsibilities; ?></p><hr>
                      </div>
                    </div>
                  <?php endforeach;  ?>
                  <?php else : ?> 
                    <div>
                      <strong>There is no data to display</strong>
                    </div>
                  <?php endif; ?>
                  </div>


                 <!-- Catch me on Twitter - <a href="https://twitter.com/DanEnglishby">@DanEnglishby</a> -->
                 <hr>
            </div><!-- end post-padding -->
          </div>
        </div>

       
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->

<!-- Modal -->
<div id="connect" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">You can customize this invitation</h4>
      </div>
      <div class="modal-body">
        <form id="Career-info" class="form-horizontal" action="<?php echo base_url('job_seeker/connection_request');?>" method="post">
          <input type="text" name="js_id" id="js_id" value="">
          
          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Message</label>
            <div class="col-sm-9">
              <textarea class="form-control" name='message' placeholder="Enter message"></textarea>
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
 <?php $this->load->view("fontend/layout/footer.php"); ?>

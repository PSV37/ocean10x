<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">All CV's </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>All CV's</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
            <table class="table table-bordered table-striped" id="example">
              <thead>
                <tr>
                  <th class="active">SL</th>
                  <th class="active">Photo</th>
                  <th class="active">Name</th>
                  <th class="active">Email</th>
                  <th class="active">Mobile No</th>
                  <th class="active">Current Work Location</th>
                  <th class="active">Current Job Role</th>
                  <th class="active">Current Notice Period</th>
                  <th class="active">Candidate Uploaded CV </th>
                  <th class="active">Last Profile Update At</th>
                  <!-- <th class="active">Ocean Generated CV</th> -->
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; if (!empty($cv_bank_data)): foreach ($cv_bank_data as $cv_row) : 
                  $resume = getUploadedResume($cv_row['js_email']);
                  $photo = getSeekerPhoto($cv_row['js_email']);
                  $updates = getSeekerlastUpdates($cv_row['js_email']);
                  if (!empty($updates)) {
                   if($updates[0]['update_at']=='0000-00-00 00:00:00') { 
                      echo "js up";
                      $mtime = time_ago_in_php($updates[0]['update_at']);
                    } else{
                        echo "js cr";
                      $mtime = time_ago_in_php($updates[0]['create_at']);
                    }
                  }else{
                     echo "cv cr";
                    $mtime = time_ago_in_php($cv_row['created_on']);
                  }
                ?>
                  <tr>
                      <td><?php echo $key ?></td>
                      <td><img src="<?php echo  base_url(); ?>upload/<?php if(!empty($photo[0]['photo_path'])){echo $photo[0]['photo_path'];} ?>" alt="" style="max-width: 40% !important;"></td>
                      <!-- <td><a target="_blank" href="<?php echo base_url() ?>employer/view-resume/<?php echo $cv_row['job_seeker_id']; ?>"><?php echo $cv_row['js_name']; ?></a></td> -->
                       <td><?php echo $cv_row['js_name']; ?></td>
                      <td><?php echo $cv_row['js_email']; ?></td>
                      <td><?php echo $cv_row['js_mobile']; ?></td>
                      <td><?php echo $cv_row['js_current_work_location']; ?></td>
                      <td><?php echo $cv_row['js_current_designation']; ?></td>
                      <td><?php echo $cv_row['js_current_notice_period']; ?></td>
                      <td><a href="<?php echo  base_url(); ?>upload/Resumes/<?php if(!empty($resume[0]['resume'])){echo $resume[0]['resume'];} ?>" title='Download Attached Resume' download><i class="fa fa-download"></i> </a></td>
                      <td><?php echo $mtime; ?></td>
                  </tr>
                  <?php
                      $key++;
                      endforeach;
                  ?>
                  <?php else : ?> 
                      <td colspan="3">
                          <strong>There is no record for display</strong>
                      </td>
                  <?php
                    endif; ?>
              </tbody>
          </table>



          </div>
        </div>
        <!-- end post-padding --> 
      </div>
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
<!-- end section --> 

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>



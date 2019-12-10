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
                  <th class="active">Current Location</th>
                  <th class="active">Last Profile Update Date</th>
                  <th class="active">Candidate Uploaded CV </th>
                  <th class="active">Ocean Generated CV</th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; if (!empty($cv_bank_data)): foreach ($cv_bank_data as $cv_row) : 

                  $resume = getUploadedResume($cv_row['js_email']);

                //  print_r($resume);
                  echo $resume[0]['resume'];
                ?>
                  <tr>
                      <td><?php echo $key ?></td>
                      <td><?php echo $cv_row['js_name']; ?></td>
                      <td><?php echo $cv_row['js_email']; ?></td>
                      <td><?php echo $cv_row['js_mobile']; ?></td>
                      <td><?php echo $cv_row['js_working_since']; ?></td>
                      <td><?php echo $cv_row['js_current_ctc']; ?></td>
                      <td></td>
                      <td><a href="<?php echo  base_url(); ?>upload/Resumes/<?php if(!empty($resume->resume)){echo $resume->resume;} ?>" title='Download Attached Resume' download>Dowunload</a></td>
                      <td></td>
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



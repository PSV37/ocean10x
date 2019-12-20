<?php 
    $this->load->view('fontend/layout/employee_header.php');
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
        <h1 class="page-heading">All Questions </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>All Questions</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employee_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
                <tr>
                  <th class="active">SL</th>
                  <th class="active">Subject</th>
                  <th class="active">Topic</th>
                  <th class="active">Subtopic</th>
                  <th class="active">Line Item 1</th>
                  <th class="active">Line Item 2</th>
                  <th class="active">Question Type</th>
                  <th class="active">Question</th>
                  <th class="active col-sm-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; if (!empty($questionbank)): foreach ($questionbank as $ct_row) : ?>
                    <tr>
                      <td><?php echo $key ?></td>
                      <td><?php echo $ct_row['skill_name'] ?></td>
                      <td><?php echo $ct_row['topic_name'] ?></td>
                      <td><?php echo $ct_row['subtopic_name'] ?></td>
                      <td><?php echo $ct_row['title'] ?></td>
                      <td><?php echo $ct_row['titles'] ?></td>
                      <td><?php echo $ct_row['ques_type'] ?></td>
                      <td><?php echo $ct_row['question'] ?></td>
                      <td>
                          <?php echo btn_edit('employee/edit_questionbank/' . $ct_row['ques_id']); ?>
                          <?php echo btn_delete('employee/delete_questionbank/' . $ct_row['ques_id']); ?>
                      </td>
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



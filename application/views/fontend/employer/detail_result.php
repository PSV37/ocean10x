<?php 
    $this->load->view('fontend/layout/seeker_header.php');
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
        <h1 class="page-heading">Exam Result </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Exam Result</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
     <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
            <table class="table table-bordered table-striped" id="dataTables-example">
              <thead>
                <tr>
                  <th class="active">SL</th>
                  <th class="active">Total Question</th>
                  <th class="active">Attended Question</th>
                  <th class="active">Total Marks</th>
                  <th class="active">Percenage</th>
                </tr>
              </thead>
              <tbody>
                <?php $key = 1; if (!empty($exam_attended_candidates)): foreach ($exam_attended_candidates as $ct_row) :

                  $js_id = $ct_row['js_id'];
                  // $exam_res = getExamResultByID($js_id,$job_id); 
                  if (!empty($exam_res)): foreach ($exam_res as $res_row) :
                  $marks = $res_row['total_marks']; 
                  $percentage = ($marks * 100)/NUMBER_QUESTIONS;
                ?>
                    <tr>
                      <td><?php echo $key ?></td>
                      <td><?php echo NUMBER_QUESTIONS; ?></td>
                      <td><?php echo $res_row['total_questions'] ?></td>
                      <td><?php echo $res_row['total_marks'] ?></td>
                      <td><?php echo round($percentage, 2).'%'; ?></td>
                     
                  </tr>
                  <?php
                      $key++;
                      endforeach;
                      endif; 
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



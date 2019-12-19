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
        <h1 class="page-heading">Topic's For Test</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Topic's For Test</span></div>
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
          <div class="formpanel"> <?php echo $this->session->flashdata('msg'); ?>
            
            <form role="form" id="test_topicfrm"  enctype="multipart/form-data" action="<?php echo base_url(); ?>employee/topics_for_test/<?php if (!empty($test_job_id)) { echo $test_job_id;} ?>" method="post" onsubmit="return validate_val();">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                        <tr>
                            <th class="active">#</th>
                            <th class="active">Topic Name</th>
                            <th class="active">Level of Test</th>
                            <th class="active">No of Questions</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    <?php if (!empty($topic_master)): foreach ($topic_master as $st_row) : 
                        $checked="";
                        $no_ques = "";
                        $level_of_test = "";
                        if(!empty($test_topic_master)){
                            for($i=0;$i<sizeof($test_topic_master);$i++){

                                if($st_row['topic_id']==$test_topic_master[$i]['test_topic']){
                                  $checked ="checked";
                                  $no_ques = $test_topic_master[$i]['no_questions'];
                                  $level_of_test = $test_topic_master[$i]['test_level'];
                                }

                            }
                        }
                    ?>
                        <tr>
                            <td><input type="checkbox" <?php echo $checked; ?> name="topic_chk[]" id="topic_chk" value="<?php echo $st_row['topic_id']; ?>" class="testchk" style='height:15px; width:20px;'></td>
                            <td><?php echo $st_row['topic_name']; ?></td>
                            <td>
                                <select name="test_level<?php echo $st_row['topic_id']; ?>" class="form-control" data-style="btn-default" data-live-search="true">
                                    <option value="">Select Level</option>
                                    <?php if(!empty($test_level)) foreach($test_level as $level){ ?>
                                        <option value="<?php echo $level['job_level_name']; ?>"<?php if($level_of_test==$level['job_level_name']){echo "selected";} ?>><?php echo $level['job_level_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input type="number" name="no_questions<?php echo $st_row['topic_id']; ?>" id="no_questions<?php echo $st_row['topic_id']; ?>" value="<?php echo $no_ques; ?>">
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
                    <?php endif; ?>
                    </tbody>
                </table>

                <button type="submit" class="btn bg-navy pull-right" name="submit">Submit</button>
                <div class="panel-body"></div>                               
            </form>
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


<script>
    $(document).ready(function(){
        $('.testchk').change(function() {
        var checkboxINstance = $(this);
        var chkval = $(this).val();
        $('#no_questions'+chkval).val('');
          
        });
    });
</script>
<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Exam Instruction</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#">Home</a> / <span>Exam Instruction</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

  <div class="section lb">
    <div class="container">
      <div class="row">
        <div class="content col-md-2"></div>
          <div class="content col-md-8">
            <div class="job-header">
              <div class="contentbox">
                <div class="formpanel">

                  <h3 style="color:#FF0000" align="center">
                    Time Left : <span id='timer'></span>
                  </h3>

                  <form id="submit" class="submit-form" action="<?php echo base_url(); ?>exam/exam_start/<?php echo $this->input->get() ?>" method="post">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <?php print_r($questions); foreach($questions as $row){?>
                        <label><?php echo $row['question']; ?>:</label> 
                          <ul>
                            <li><?php echo $row['option1'];   ?></li>
                            <li><?php echo $row['option2'];   ?></li>
                            <li><?php echo $row['option3'];   ?></li>
                            <li><?php echo $row['option4'];   ?></li>
                            <li><?php echo $row['option5'];   ?></li>
                          </ul>
                        <?php } ?>
                          <button type="submit" class="btn btn-primary pull-right">Submit Test</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div><!-- end post-padding -->
            <div class="content col-md-2"></div>
          </div><!-- end col -->
        </div><!-- end row -->  
    </div><!-- end container -->
  </div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>
 <script>
  //define your time in second
    var c=1800;
    var t;
    timedCount();

    function timedCount()
    {

        var hours = parseInt( c / 3600 ) % 24;
        var minutes = parseInt( c / 60 ) % 60;
        var seconds = c % 60;

        var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
      $('#timer').html(result);
      if(c == 0 )
        {
                //setConfirmUnload(false);
                  //$("#quiz_form").submit();
          // window.location="logout.html";
        }
          c = c - 1;
          t = setTimeout(function()
      {
       timedCount()
      },
      1000);
    }
  </script>
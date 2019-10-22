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

                  <form id="nextques" class="submit-form" action="#" method="post">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <?php 
                          $sr_no=0;
                            if(!empty($questions)) foreach($questions as $row){ 
                              $sr_no++;
                        ?>
                        <input type="text" name="question_id" id="question_id" value="<?php echo $row['ques_id']; ?>">
                        <label><?php echo "Q.No.-". $sr_no.':'.$row['question']; ?></label> 
                          <ul>
                            <li><input type="checkbox" name="option1" id="option1" value="<?php echo $row['option1']; ?>"><?php echo $row['option1'];?></li>
                            <li><input type="checkbox" name="option2" id="option2" value="<?php echo $row['option2'];   ?>"><?php echo $row['option2'];?></li>
                            <li><input type="checkbox" name="option3" id="option3" value="<?php echo $row['option3'];   ?>"><?php echo $row['option3'];?></li>
                            <li><input type="checkbox" name="option4" id="option4" value="<?php echo $row['option4'];   ?>"><?php echo $row['option4'];?></li>
                            <li><input type="checkbox" name="option5" id="option5" value="<?php echo $row['option5'];   ?>"><?php echo $row['option5'];?></li>
                          </ul>
                           <button id="next" type="submit" class="btn btn-primary pull-right">Next</button>
                        <?php } ?>
                         
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

  $('form#nextques').submit(function(e)
  {
      e.preventDefault();
    
    $.ajax({
              url: "<?php echo base_url();?>exam/insert_data/<?php if(!empty($job_id))echo base64_encode($job_id); ?>'",
              type: "POST",
              data: new FormData(this),
              contentType:false,
              processData:false,
               // dataType: "json",
              success: function(data)
              {
                alert(data);
              }
        });
       
  }); 


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
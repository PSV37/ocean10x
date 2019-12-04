<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                

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
                <input type="hidden" name="restart_timer_val" id="restart_timer_val" value="<?php if(!empty($exam_previous_time))echo $exam_previous_time['exam_time']; ?>"> 
                <input type="hidden" name="timer_val" id="timer_val"> 
                <div id="nextshow">

                  <form id="nextques" class="submit-form" action="#" method="post">
                    <div class="row">
                      <div class="col-md-12 col-sm-12">
                        <?php 
                          $ans_cnt = count($questions['answer']);
                            if($ans_cnt > 1){
                              $input_type='checkbox';
                            }else{
                              $input_type='radio';
                            }
                        ?>
                        <input type="text" name="skill_id" id="skill_id" value="<?php if(!empty($skill_id))echo base64_encode($skill_id); ?>">
                        <input type="hidden" name="question_id" id="question_id" value="<?php echo $questions['ques_id']; ?>">
                       
                        <label><?php echo "Question:- ".$questions['question']; ?></label> 
                          <ul>

                            <li><input type="<?php echo $input_type; ?>" name="option[]" id="option1" value="1"> <?php echo $questions['option1'];?></li>

                            <li><input type="<?php echo $input_type; ?>" name="option[]" id="option2" value="2"> <?php echo $questions['option2'];?></li>

                          <?php if(!empty($questions['option3'])){ ?>
                            <li><input type="<?php echo $input_type; ?>" name="option[]" id="option3" value="3"> <?php echo $questions['option3'];?></li>
                          <?php }else{} ?>

                          <?php if(!empty($questions['option4'])){ ?>
                            <li><input type="<?php echo $input_type; ?>" name="option[]" id="option4" value="4"> <?php echo $questions['option4'];?></li>
                          <?php }else{} ?>

                          <?php if(!empty($questions['option5'])){ ?>
                            <li><input type="<?php echo $input_type; ?>" name="option[]" id="option5" value="5"> <?php echo $questions['option5'];?></li>
                          <?php }else{} ?>

                          </ul>
                           <button id="next" type="submit" class="btn btn-primary pull-right">Next</button>
                      </div>
                    </div>
                  </form>
                </div>

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
              url: "<?php echo base_url();?>exam/insert_ocean_data",
              type: "POST",
              data: new FormData(this),
              contentType:false,
              processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('#nextshow').html(data);
              }
        });
       
  }); 


  //define your time in second
var restart_timer_val = $('#restart_timer_val').val();
  if(restart_timer_val)
  {
    var c=restart_timer_val;
  }else{
    var c=1800;
    // var c = 60;
  }
    
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
          $("#nextques").submit();
          window.location="<?php echo base_url();?>exam/autosubmit";
        }
          c = c - 1;
           $('#timer_val').val(c);
          t = setTimeout(function()
      {
       timedCount()
      },
      1000);
    }



  function fetchdata(){
    var timer = $('#timer_val').val();
    var skill_id = $('#skill_id').val();
    $.ajax({
      url: '<?php echo base_url();?>exam/insert_ocean_exam_session',
      type: 'post',
      data:{
        timer:timer,skill_id:skill_id
      },
      success: function(response){
      /// alert(response);
      }
    });
  }

  $(document).ready(function(){
   setInterval(fetchdata,30000);
  });

  </script>
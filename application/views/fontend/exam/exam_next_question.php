
<form id="nextques" class="submit-form" action="#" method="post">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <?php 
        $sr_no=1;
         if(!empty($ans))  $anss = count($ans);
          if(!empty($questions)) foreach($questions as $row){ 
            $sr_no++;
      ?>
      
      <input type="hidden" name="job_id" id="job_id" value="<?php if(!empty($job_id))echo base64_encode($job_id); ?>">
      <input type="hidden" name="question_id" id="question_id" value="<?php echo $row['ques_id']; ?>">
      <label><?php echo "Q.No-". $sr_no.':'.$row['question']; ?></label> 
        <?php if($anss > 1){ ?>
        <ul>
          <li><input type="checkbox" name="option[]" id="option1" value="<?php echo $row['option1']; ?>"><?php echo $row['option1'];?></li>
          <li><input type="checkbox" name="option[]" id="option2" value="<?php echo $row['option2'];   ?>"><?php echo $row['option2'];?></li>
          <li><input type="checkbox" name="option[]" id="option3" value="<?php echo $row['option3'];   ?>"><?php echo $row['option3'];?></li>
          <li><input type="checkbox" name="option[]" id="option4" value="<?php echo $row['option4'];   ?>"><?php echo $row['option4'];?></li>
          <li><input type="checkbox" name="option[]" id="option5" value="<?php echo $row['option5'];   ?>"><?php echo $row['option5'];?></li>
        </ul>
      <?php }else{ ?>
        <ul>
          <li><input type="radio" name="option[]" id="option1" value="<?php echo $row['option1']; ?>"><?php echo $row['option1'];?></li>
          <li><input type="radio" name="option[]" id="option2" value="<?php echo $row['option2'];   ?>"><?php echo $row['option2'];?></li>
          <li><input type="radio" name="option[]" id="option3" value="<?php echo $row['option3'];   ?>"><?php echo $row['option3'];?></li>
          <li><input type="radio" name="option[]" id="option4" value="<?php echo $row['option4'];   ?>"><?php echo $row['option4'];?></li>
          <li><input type="radio" name="option[]" id="option5" value="<?php echo $row['option5'];   ?>"><?php echo $row['option5'];?></li>
        </ul>
      <?php } ?>
         <button id="next" type="submit" class="btn btn-primary pull-right">Next</button>
      <?php } ?>
       
    </div>
  </div>
</form>
              
 <script>

  $('form#nextques').submit(function(e)
  {
      e.preventDefault();
    
    $.ajax({
              url: "<?php echo base_url();?>exam/insert_data",
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
</script>
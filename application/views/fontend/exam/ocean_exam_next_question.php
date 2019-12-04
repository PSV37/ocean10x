
<form id="nextques" class="submit-form" action="#" method="post">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <?php 
       
        $ques_cnt = count($new_json);
        $ans_cnt = count($questions['answer']);
          if($ans_cnt > 1){
            $input_type='checkbox';
          }else{
            $input_type='radio';
          }
      ?>
      <input type="hidden" name="skill_id" id="skill_id" value="<?php if(!empty($skill_id))echo base64_encode($skill_id); ?>">
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
        <?php if($ques_cnt > 1){ ?>
          <button id="next" type="submit" class="btn btn-primary pull-right">Next</button>
       <?php }else{ ?>
          <button id="next" type="submit" class="btn btn-primary pull-right">Submit</button>
       <?php } ?>
    </div>
  </div>
</form>
              
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
</script>
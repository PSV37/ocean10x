
<form id="nextques" class="submit-form" action="#" method="post">
      <!-- <?php print_r($questions); ?> -->
      <input type="hidden" name="question_id" id="question_id" value="<?php echo $questions['ques_id']; ?>">
      <div class="question"> </div>
      <div class="answerOptions"></div>
      <div class="buttonArea">
        <button type="submit" id="next">Next</button>
        <button id="submit"  class="hidden">Submit</button>
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
                $('#quizBox').html(data);
              }
        });
       
  }); 
</script>



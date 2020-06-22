<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
	<div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                    echo $row['ques_id'];
              }
            ?>" method="post">
        <div class="col-md-9 add-question">
          <div class="header-bookbank">
            Add Question
          </div>
         
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">                                       
							 <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                <select id="subject" name="technical_id" class="form-control" required="" onchange="getTopic(this.value)">
                  <option value="">Select Subject</option> 
                    <?php if (!empty($skill_master))
                       foreach($skill_master as $skill) 
                       {
                    ?>   
                        <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option> 
                    <?php } ?>
                  </select>
							</div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                <select id="topic_id" name="topic_id" class="form-control" onchange="getSubtopic(this.value)">
                  <option value="">Select Topic</option> 
                  <!-- <option value="1">HTML 5</option>  -->
                </select>
              </div>
            </div>
            <div class="col-md-4">
							<div class="form-group">
                <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                <select id="subtopic_id" name="subtopic_id" class="form-control" onchange="getLineitem(this.value)">
                </select>
							</div>
						</div>               
          </div>
          <div class="row">
            <div class="col-md-4">
							<div class="form-group">
                <label for="exampleInputEmail1">Line Item(Level 1)<span class="required">*</span></label>
                <select id="lineitem_id" name="lineitem_id" class="form-control" onchange="getLineitemlevel(this.value)">
                </select> 
							</div>
						</div>
            <div class="col-md-4">
							<div class="form-group">
                  <label for="exampleInputEmail1">Line Item(Level 2)<span class="required">*</span></label>
                  <select id="lineitemlevel_id" name="lineitemlevel_id" class="form-control">
                  </select> 
							</div>
						</div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                  <select name="level" class="form-control">                                     
										<option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                    <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                    <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
									</select>
							</div>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
                <select name="ques_type" class="form-control" type="text">
									<option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                    <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                    <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
								</select>
							</div>
            </div>
          </div>
             
             
    <div class="row">
       <div class="col-md-12 form-group">
        <label for="comment">Question </label>
		    <textarea class="form-control" name="question" rows="5" id="comment"><?php if (!empty($edit_questionbank_info)) echo $row['question'];?></textarea>
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 1:
        </label>
        <textarea class="form-control" name="option1" id="option1" rows="5" id="comment"><?php if (!empty($edit_questionbank_info)) echo $row['option1'];?></textarea>
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 2:</label>
        <textarea name="option2" id="option2" class="form-control" rows="5" id="comment"><?php if (!empty($edit_questionbank_info)) echo $row['option2'];?></textarea>
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 3:</label>
        <textarea class="form-control" name="option3" id="option3" rows="5" id="comment"><?php if (!empty($edit_questionbank_info)) echo $row['option3'];?></textarea>
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 4:</label>
        <textarea class="form-control" name="optio4" id="option4" rows="5" id="comment"><?php if (!empty($edit_questionbank_info)) echo $row['option4'];?></textarea>
      </div>
    </div>    
     <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="exampleInputEmail1">Correct Answer<span class="required">*</span></label>
              <div class = "panel-body_add">
                <div class="col-md-12">
                  <div class="optionbox-1 col-md-6">
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">1.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" class="btn-default1" checked="" name="correct_answer[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">3.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" class="btn-default1" checked="" name="correct_answer[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                  </div>
                  <div class="optionbox-2 col-md-6"> 
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">2.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="4" class="btn-default1" checked="" name="correct_answer[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">4.</span>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" value="4" class="btn-default1" checked="" name="correct_answer[]">
                        <span>option1</span>
                        </label>
                      </div>
                    </li>
                  </div>
                </div>
              <!-- </ul> -->
              </div>
          </div>
        </div>
        <div class="col-md-4"></div>
          <div class="col-md-4" style="text-align:right;">
            <button type="submit" class="save_question">Save question</button>
          </div>
      </div>
    </div>
  </form>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>


<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
    
    
    
    <script>
  
  
  function hideshowfun()
  {
  
      var a = $('#category').val();
      
      if(a=='MCQ')
      {
          $('#comp_name').hide();
      }
     else{
         $('#comp_name').show();
     } 
     
     if(a=='Subjective' || a=='Practical')
      {
          $('#name').hide();
      }
     else{
         $('#name').show();
     } 
     
      
  }
</script> 

     
     
     <script>
      function getTopic(id){
        if(id){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>employer/gettopic',
            data:{id:id},
            success:function(res){
              $('#topic_id').html(res);
            }
            
          }); 
          }
       }

    $(document).ready(function(){
    
    function getLineitemlevel_load(){
      var id = $('#lineitem_id').val();
      if(id){
        $.ajax({
          type:'POST',
          url:'<?php echo base_url();?>employer/getlineitemlevel',
          data:{id:id},
          success:function(res){
            $('#lineitemlevel_id').html(res);
            $('#lineitemlevel_id').val(<?php echo $row['lineitemlevel_id']; ?>);
          }
        }); 
        }
        }
    
    function getLineitem_load(){
      var id = $('#subtopic_id').val();

      if(id){
        $.ajax({
          type:'POST',
          url:'<?php echo base_url();?>employer/getlineitem',
          data:{id:id},
          success:function(res){
            $('#lineitem_id').html(res);
            $('#lineitem_id').val(<?php echo $row['lineitem_id']; ?>);
             getLineitemlevel_load();
          }
          
        }); 
        }
   
        }
    
    function getSubtopic_load(){
        var id = $('#topic_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                    $('#subtopic_id').val(<?php echo $row['subtopic_id']; ?>);
          getLineitem_load();
                }
                
            }); 
          }
   
       }
    
    function getTopic_load(){
      var id = $('#subject').val();
      if(id){
        $.ajax({
          type:'POST',
          url:'<?php echo base_url();?>employer/gettopic',
          data:{id:id},
          success:function(res){
            $('#topic_id').html(res);
            $('#topic_id').val(<?php echo $row['topic_id']; ?>);
            getSubtopic_load();
          }
          
        }); 
      }
       }
       getTopic_load();
    });
       
</script>
     <script>
    function getSubtopic(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                }
                
            }); 
          }
   
    }
</script>



 <script>
    function getLineitem(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getlineitem',
                data:{id:id},
                success:function(res){
                    $('#lineitem_id').html(res);
                }
                
            }); 
          }
   
    }
</script>



<script>
    function getLineitemlevel(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getlineitemlevel',
                data:{id:id},
                success:function(res){
                    $('#lineitemlevel_id').html(res);
                }
                
            }); 
          }
   
       }
</script>   

<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->

<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">

<style type="text/css">
   
   .required
   {
   color: red;
   }
   
   label.error {
    color: red;
}
   
</style>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <form id="js" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                    echo $row['ques_id'];
              }
            ?>" method="post|get">
        <div class="col-md-9 add-question">
          <div class="header-bookbank">
            Add Question
          </div>
         
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">                                       
               <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                <select id="subject" name="technical_id" class="form-control"  onchange="getTopic(this.value)">
                  <option value="">Select Subject</option> 
                    <?php if (!empty($skill_master))
                       foreach($skill_master as $skill) 
                       {
                    ?>   
                        <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option> 
                    <?php } ?>
                  </select> <?php echo form_error('technical_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                <select id="topic_id" name="topic_id" class="form-control" onchange="getSubtopic(this.value)">
                  <option value="">Select Topic</option> 
                  <!-- <option value="1">HTML 5</option>  -->
                </select> <?php echo form_error('topic_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                <select id="subtopic_id" name="subtopic_id" class="form-control" onchange="getLineitem(this.value)">
                </select> <?php echo form_error('subtopic_id'); ?>   
              </div>
            </div>               
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Line Item(Level 1)<span class="required">*</span></label>
                <select id="lineitem_id" name="lineitem_id" class="form-control" onchange="getLineitemlevel(this.value)">
                </select>  <?php echo form_error('lineitem_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                  <label for="exampleInputEmail1">Line Item(Level 2)<span class="required">*</span></label>
                  <select id="lineitemlevel_id" name="lineitemlevel_id" class="form-control">
                  </select>  <?php echo form_error('lineitemlevel_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                  <select name="level" class="form-control">                                     
                    <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                    <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                    <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                  </select> <?php echo form_error('level'); ?>   
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
                </select> <?php echo form_error('ques_type'); ?>   
              </div>
            </div>
          </div>
             
             
    <div class="row">
       <div class="col-md-12 form-group">
        <label for="comment">Question </label>
        <textarea class="form-control" name="question" rows="5" id="comment"   ><?php if (!empty($edit_questionbank_info)) echo $row['question'];?></textarea> <?php echo form_error('question'); ?>   
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 1:
        </label>
        <textarea class="form-control" name="option1" id="option1" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option1'];?></textarea> <?php echo form_error('option1'); ?>   
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 2:</label>
        <textarea name="option2" id="option2" class="form-control" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option2'];?></textarea> <?php echo form_error('option2'); ?>   
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 3:</label>
        <textarea class="form-control" name="option3" id="option3" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option3'];?></textarea> <?php echo form_error('option3'); ?>   
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 4:</label>
        <textarea class="form-control" name="option4" id="option4" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option4'];?></textarea> <?php echo form_error('option4'); ?>   
      </div>
    </div>  
      <div class="box-body">
                <input type="hidden" name="is_admin" value="1" class="form-control" id="checkboxjs"> 
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
                          <input type="checkbox" value="1" class="btn-default1"  name="correct_answer[]">
                          <span>option1</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">3.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="3" class="btn-default1"  name="correct_answer[]">
                          <span>option3</span>
                        </label>
                      </div>
                    </li>
                  </div>
                  <div class="optionbox-2 col-md-6"> 
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">2.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="2" class="btn-default1"   name="correct_answer[]">
                          <span>option2</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">4.</span>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" value="4" class="btn-default1"  name="correct_answer[]">
                        <span>option4</span>
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
            <button id="submit" type="Submit" class="save_question">Save question</button>
          </div>
      </div>
    </div>
  </form>
  </div>
</div>


<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script>


<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script>
<script>
   $('#tokenfield').tokenfield({
     autocomplete: {
       source: "<?php echo base_url('Employer/search_city'); ?>",
       delay: 100,
       minLength: 2
     },
   
     showAutocompleteOnFocus: true,
   
   });
   // to avoid duplications
   $('#tokenfield').on('tokenfield:createtoken', function (event) {
     var existingTokens = $(this).tokenfield('getTokens');
   
     $.each(existingTokens, function(index, token) {
       
       if (token.value.toLowerCase() === event.attrs.value.toLowerCase())
             event.preventDefault();
   
     });
   });
   
  </script> 
<script>
   $('.select2').select2();
</script>
<script>
   function check_other(value)
   {
    var x1 = document.getElementById("other_terxtbx");
     // var x = document.getElementById("training_title");
     if (value=='other') 
   {
          $('#other_terxtbx').show();
   }
 
   else
   {
       $('#other_terxtbx').hide();
      
   
     // x1.value = value;
   }
     
   }
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>
<script> 
    function save_benifit()
       {
        var othr_benifit = document.getElementById('other_benifit').value;
        $('#candidate_skills').append('<label><input type="checkbox" value="'+othr_benifit+'" class="btn-default1" checked="" name="candidate_skills[]"><span>'+othr_benifit+'</span></label>');
        document.getElementById('other_benifit').value = '';
        // alert(othr_benifit);
   
       }
   $(document).ready(function() { 
       $('#other_terxtbx').hide();
   
      $(function() { 
     
     $("#my_date_picker").datepicker({ dateFormat: 'yy-mm-dd',maxDate: '0' });
     $("#last_salary_hike").datepicker({ dateFormat: 'yy-mm-dd',maxDate: '0' });
     });

 $("#UpdateExperience-info").validate (  

{

rules:{



'technical_id':{

required: true

},

'topic_id':{

required: true

},

'subtopic_id':{

required: true

},

'lineitem_id':{

required: true

},

'lineitemlevel_id':{

required: true

},

'level':{

required: true

},

'ques_type':{

required: true

},


'correct_answer[]': {required: true}



},


messages:{

  "correct_answer[]":"Please select at least one audience",




'technical_id':{

required: "This field is mandatory!"

},

'topic_id':{

required: "This field is mandatory!"

},


'subtopic_id':{

required: "This field is mandatory!"

},

'lineitem_id':{

required: "This field is mandatory!"

},

'lineitemlevel_id':{

required: "This field is mandatory!"

},

'level':{

required: "This field is mandatory!"

},

'ques_type':{

required: "This field is mandatory!"

},





}



});

});



</script>




<script type="text/javascript">
 function validChk() {
    var chkBox = document.getElementsByName('chkBooks[]');
    var lenChkBox = chkBox.length;
    //alert(lenChkBox)
    var valid=0;
    for(var i=0;i<lenChkBox;i++) {
      if(chkBox[i].checked==true) {
        valid=1;
        break;
      }
    }
    if(valid==0) {
      msg='Please select atleast one book';
      alert(msg);
      return false;
    }
    return true;
  }
</script>
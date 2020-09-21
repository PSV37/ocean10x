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
input.select2-search__field {
    display: inline;
    border-radius: 0px;
    margin-top: 0px;
}
ul.select2-results__options {
    margin-top: 30px;
}
   div#errorbox {
   margin-top: 25px;
    /*font-weight: bold;*/
   color: red;
   }
  div.cke_contents {
    height: 100px !important;
}
</style>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <form id="js" method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                    echo $row['ques_id'];
              }
            ?>" method="post|get">
        <div class="col-md-9 add-question">
          <div class="header-bookbank">
            Add Question
          </div>
         
          <div class="row">
            <div class="col-md-4">
              <div class="form-group technical_id">                                       
               <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                <select id="subject" name="technical_id" class="form-control select2"  onchange="getTopic(this.value)">
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
              <div class="form-group topic_id ">
                <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                <select id="topic_id" name="topic_id" class="form-control select2" onchange="getSubtopic(this.value)">
                  <option value="">Select Topic</option> 
                  <option value="0">General Topic</option> 
                </select> <?php echo form_error('topic_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group subtopic_id">
                <label for="exampleInputEmail1">Subtopic <span class="required">*</span></label>
                <select id="subtopic_id" name="subtopic_id" class="form-control select2" onchange="getLineitem(this.value)">
                  <option value="0">General Subtopic</option> 

                </select> <?php echo form_error('subtopic_id'); ?>   
              </div>
            </div>               
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group lineitem_id ">
                <label for="exampleInputEmail1">Line Item (Level 1) <span class="required">*</span></label>
                <select id="lineitem_id" name="lineitem_id" class="form-control select2" onchange="getLineitemlevel(this.value)">
                  <option value="0">General</option> 

                </select>  <?php echo form_error('lineitem_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group lineitemlevel_id">
                  <label for="exampleInputEmail1">Line Item (Level 2) <span class="required">*</span></label>
                  <select id="lineitemlevel_id" name="lineitemlevel_id" class="form-control select2">
                  <option value="0">General</option> 
                    
                  </select>  <?php echo form_error('lineitemlevel_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group level">
                <label for="exampleInputEmail1">Level <span class="required">*</span></label>
                  <select name="level" class="form-control select2">                                     
                    <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                    <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                    <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                  </select> <?php echo form_error('level'); ?>   
              </div>
            </div>
          </div> 
          <div class="row">
            <div class="col-md-4">
              <div class="form-group ques_type">
                <label for="exampleInputEmail1">Question Type <span class="required">*</span></label>
                <select name="ques_type" class="form-control select2" type="text">
                  <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                    <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                    <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
                </select> <?php echo form_error('ques_type'); ?>   
              </div>
            </div>
             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Time to Answer (sec) <span class="required">*</span></label>
                <input type="number" max="60" min="1" value="<?php if (!empty($edit_questionbank_info)) echo $row['time_for_question'];?>" class="form-control" maxlength="2" name="time" id="time">
              </div>
            </div>
          </div>
             
             
    <div class="row">
       <div class="col-md-12 form-group">
        <label for="comment">Question </label>
        <textarea class="form-control ckeditor" name="question" rows="5"    ><?php if (!empty($edit_questionbank_info)) echo $row['question'];?></textarea> <?php echo form_error('question'); ?>   
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 1:
        </label>
        <textarea class="form-control ckeditor" name="option1" id="option1" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option1'];?></textarea> <?php echo form_error('option1'); ?>   
      </div>
    
       <div class="col-md-12 form-group">
        <label for="comment">Option 2:</label>
        <textarea name="option2" id="option2" class="form-control ckeditor" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option2'];?></textarea> <?php echo form_error('option2'); ?>   
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 3:</label>
        <textarea class="form-control ckeditor" name="option3" id="option3" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option3'];?></textarea> <?php echo form_error('option3'); ?>   
      </div>
       <div class="col-md-12 form-group">
        <label for="comment">Option 4:</label>
        <textarea class="form-control ckeditor" name="option4" id="option4" rows="5" id="comment"  ><?php if (!empty($edit_questionbank_info)) echo $row['option4'];?></textarea> <?php echo form_error('option4'); ?>   
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
                          <input type="checkbox" value="1" class="btn-default1 checkbox"  name="correct_answer[]" <?php if ($row['answer_id'] == 1): echo "checked"; endif ?>>
                          <span>Option 1</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">3.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="3" class="btn-default1 checkbox"  name="correct_answer[]"
                          <?php if ($row['answer_id'] == 3): echo "checked"; endif ?>>
                          <span>Option 3</span>
                        </label>
                      </div>
                    </li>
                  </div>
                  <div class="optionbox-2 col-md-6"> 
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">2.</span>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" value="2" class="btn-default1 checkbox"   name="correct_answer[]"
                          <?php if ($row['answer_id'] == 2): echo "checked"; endif ?>>
                          <span>Option 2</span>
                        </label>
                      </div>
                    </li>
                    <li style="position:relative;"><span style="position:absolute;font-weight: 700;">4.</span>
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" value="4" class="btn-default1 checkbox"  name="correct_answer[]"
                        <?php if ($row['answer_id'] == 4): echo "checked"; endif ?>>
                        <span>Option 4</span>
                        </label>
                      </div>
                    </li>
                  </div>
                </div>
                <div id="errorbox"></div>
              <!-- </ul> -->
              </div>
          </div>
        </div>

        <!-- <div class="col-md-4"></div> -->
          <div class="col-md-6" style="text-align:right;">
            <button id="submit" type="button" onclick="history.back()" class="save_question">Cancel</button>
            <button id="submit" type="Submit" class="save_question">Save Question</button>
            <button id="submit" type="Submit" class="save_question">Submit</button>
          </div>
      </div>
    </div>
  </form>
  </div>
</div>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"> -->

<script>
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
});


</script>
<script>
  $(document).ready(function(){
    
    function getLineitemlevel_load(){
      var id = $('#lineitem_id').val();
      if(id){
        $.ajax({
          type:'POST',
          url:'<?php echo base_url();?>employer/getlineitemlevel',
          data:{id:id},
          success:function(res){
            if (res.length == 1) 
                  {
                    
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#lineitemlevel_id').html(res);
                    $('#lineitemlevel_id').val(<?php echo $row['lineitemlevel_id']; ?>);
                  }
           
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
            if (res.length == 1) 
                  {
                   
                    $('#lineitem_id').attr('disabled', true);
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#lineitem_id').html(res);
                    $('#lineitem_id').val(<?php echo $row['lineitem_id']; ?>);
                     getLineitemlevel_load();
                  }
            
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
                  if (res.length == 1) 
                  {
                    
                    $('#subtopic_id').attr('disabled', true);
                    $('#lineitem_id').attr('disabled', true);
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#subtopic_id').html(res);
                    $('#subtopic_id').val(<?php echo $row['subtopic_id']; ?>);
                    getLineitem_load();
                  }
                    
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
            if (res.length == 1) 
                  {
                    $('#topic_id').attr('disabled', true);
                    $('#subtopic_id').attr('disabled', true);
                    $('#lineitem_id').attr('disabled', true);
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#topic_id').html(res);
                    $('#topic_id').val(<?php echo $row['topic_id']; ?>);
                    getSubtopic_load();
                  }
            
          }
          
        }); 
      }
       }
       getTopic_load();
    });
</script>
<script>
  function getTopic(id){
        if(id){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>employer/gettopic',
            data:{id:id},
            success:function(res){
                  // alert(res.length);
                  if (res.length == 1) 
                  {
                    $('#topic_id').attr('disabled', true);
                    $('#subtopic_id').attr('disabled', true);
                    $('#lineitem_id').attr('disabled', true);
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#topic_id').html(res);
                  }

              
            }
            
          }); 
          }
       }
       function getSubtopic(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                  if (res.length == 1) 
                  {
                    
                    $('#subtopic_id').attr('disabled', true);
                    $('#lineitem_id').attr('disabled', true);
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#subtopic_id').html(res);
                  }
                }
                
            }); 
          }
   
    }
     function getLineitem(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getlineitem',
                data:{id:id},
                success:function(res){
                 if (res.length == 1) 
                  {
                   
                    $('#lineitem_id').attr('disabled', true);
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#lineitem_id').html(res);
                  }
                }
                
            }); 
          }
   
    }
    function getLineitemlevel(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getlineitemlevel',
                data:{id:id},
                success:function(res){
                  if (res.length == 1) 
                  {
                    
                    $('#lineitemlevel_id').attr('disabled', true);

                  }else
                  {
                    $('#lineitemlevel_id').html(res);
                  }
                }
                
            }); 
          }
   
       }
</script>

<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script> -->


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
<!-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script> -->
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

      $("#js").submit(function(){
    var checked = $(".checkbox input:checked").length > 0;
    if (!checked){
       $("#errorbox").html("Select atleast one Answer");
        return false;
    }
})
$.validator.setDefaults(':hidden, [readonly=readonly]');
 $("#js").validate (  

{

errorPlacement: function(error, element) {
             if (element.attr("name") == "technical_id" )
                 error.insertAfter(".technical_id ");
               else if (element.attr("name") == "topic_id" ) 
                 error.insertAfter(".topic_id");

               else if (element.attr("name") == "subtopic_id"  ) 
                 error.insertAfter(".subtopic_id");

               else if (element.attr("name") == "lineitem_id" ) 
                 error.insertAfter(".lineitem_id");

               else if (element.attr("name") == "lineitemlevel_id" ) 
                 error.insertAfter(".lineitemlevel_id");

              else if (element.attr("name") == "level" ) 
                 error.insertAfter(".level");

              else if (element.attr("name") == "ques_type" ) 
                 error.insertAfter(".ques_type");

              
            
         else
       error.insertAfter(element);
    
   
       },
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

"correct_answer[]": { 
                    required: function (element) {
                var boxes = $('.checkbox');
                if (boxes.filter(':checked').length == 0) {
                    return true;
                }
                return false;
            }, 
                    minlength: 1 
            }, 


'time': {required: true},
'question': {required: true},
'option1': {required: true},
'option2': {required: true},
'option3': {required: true},
'option4': {required: true}




},



messages:{

 





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

'correct_answer':{

required: "This field is mandatory!",
maxlength: "Choose atleast One"

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
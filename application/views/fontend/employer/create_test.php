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
button#frwd_btn {
    min-height: 30;
    min-width: 60px;
    background-color: #18c5bd;
    border: none;
}
.modal-footer {
    /* max-height: 13px; */
     background-color: #c4ebe8; 
    /*margin-top: 200px;*/
    margin-left: 40px;
}
   button.btn.btn-default {
    width: 100px;
}
.btn-default {
    border: none;
    font-size: 20px;
}
.btn {
    padding: 0px;
}
.btn-default {
    color: #fff;
    background-color: #18c5bd;
    border: none;
}
button#question_add {
    min-width: 180px;
    min-height: 30px;
    font-size: 15px;
    border-radius: 55px;
    background-color: #18c5bd;
    border: none;
    margin-top: -50px;
}
.radio-inline input[type=radio] {
    position: absolute;
    margin-top: 4px\9;
    margin-left: -46px;
    /* margin-bottom: -59px; */
}
.row {
    margin-right: -15px;
    margin-left: -15px;
    margin-top: 15px;
}
span#select2-test_id-s7-container {
    min-width: 300px;
}
input.select2-search__field {
    display: inline;
    border-radius: 0px;
    margin-top: 0px;
}
ul.select2-results__options {
    margin-top: 30px;
}
span.select2.select2-container.select2-container--default {
    width: 100%;
}
.btn.btn-primary {
    /* float: right; */
    background-color: #18c5bd;
    border: none;
    border-radius: 35px;
    margin-top: 13px;
    font-size: 12px;
}
input.btn.btn-primary {
    margin-left: 90px;
    height: 28px;
    width: 65px;
    font-weight: 700;
}
</style>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      
        <div class="col-md-9 add-question">
          <div class="header-bookbank">
           Create Test
          
          </div>
         <form method="post" action="<?php echo base_url(); ?>employer/add_to_test">
                  <input type="hidden" id="question_id" name="data_arr" value="">
                  <input type="hidden" class="form-control" readonly style="border: none;" id="test_time" name="test_time">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group technical_id">                                       
                        <label for="exampleInputEmail1">Test Name <span class="required">*</span></label>
                        <input type="text" class="form-control" id="test_name" name="test_name" required="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group technical_id">
                        <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                       <select id="subject" name="subject_data" required class="form-control select2"  onchange="getTopic(this.value)">
                          <option value="">Select Subject</option>
                          <?php if (!empty($skill_master))
                            foreach($skill_master as $skill) 
                            {
                            ?>   
                          <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option>
                          <?php } ?>
                        </select>
                        <?php echo form_error('technical_id'); ?>   
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group topic_id">
                        <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                        <select id="topic_id" name="topic_id" class="form-control select2" onchange="getSubtopic(this.value)">
                          <option value="">Select Topic</option>
                          <!-- <option value="1">HTML 5</option>  -->
                        </select>
                        <?php echo form_error('topic_id'); ?>   
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group subtopic_id">
                        <label for="exampleInputEmail1">Sub Topic <span class="required">*</span></label>
                        <select id="subtopic_id" name="subtopic_id" class="form-control select2" onchange="get_questuions();" >
                        </select> <?php echo form_error('subtopic_id'); ?>   
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group level">
                        <label for="exampleInputEmail1">Level <span class="required">*</span></label>
                        <select name="level_data" onchange="get_questuions();" id="level" class="form-control select2">
                          <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                          <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                          <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                        </select>
                        <?php echo form_error('level'); ?>   
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="box" >
                      <p ><b style="float: left;margin-right: 80px">Total Time Duration <span id="total_time"></span></b> <b style="float: right;margin-right: 80px" >Total Questions:<span id="total_questions"></span></b></p>
                      <div class="card content">
                        <!-- <div class="front"> -->
                        <div class="following-info">
                          <table class="table table-borderless" id="myTable">
                            <thead>
                              <tr>
                                <th scope="col">Sr No</th>
                                <th scope="col">Line Item 1</th>
                                <th scope="col">Line Item 2</th>
                                <th scope="col">Question</th>
                                <th scope="col">time</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                        <!-- </div> -->
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                      <div class="col-md-3">
                       <input type="reset"  class="btn btn-primary">
                      </div>
                      <div class="col-md-3" style="margin-left: 20;">
                        <button class="btn btn-primary" id="frwd_btn" type="submit">Create</button>
                      </div>
                    </div>
                  </div>
                </form>
  </div>
</div>

<div class="modal fade" id="add_test" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <form method="post" action="<?php echo base_url(); ?>employer/add_to_test">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Add To</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" id="question_id" name="data_arr" value="">
             <div class="col-md-12">
               <div class="row">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">Test name</label><br>
                 
               <input type="text" class="form-control" id="test_name" name="test_name">
               </div>
            </div>
         </div>
         <span>OR</span>
            <div class="col-md-12" style="margin-top: 20px;">
               <div class="row">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <label class="mdl-textfield__label" for="sample3">Choose Test</label><br>
                  <!-- <input type="text"  name="job_title"  id="job_title" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required> -->
                  <?php 
                  $employer_id = $this->session->userdata('company_profile_id');
                  $wheres  = "status='1' AND company_id='$employer_id' ";
                     $folders     = $this->Master_model->getMaster('oceanchamp_tests', $where = $wheres); ?>
                  <select class="form-control select2" name="test_id">
                     <option value="0">None</option>

                     <?php foreach ($folders as $row) { ?>
                      <option value="<?php echo $row['test_id'] ?>"><?php echo $row['test_name'] ?></option>
                     <? } ?>
                    
                  </select>
               </div>
               </div>
            </div>
           <div class="col-md-12">
               <div class="row">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">Total Time For the Test:</label><br>
                 
               <input type="text" class="form-control" readonly style="border: none;" id="test_time" name="test_time">

               <input type="hidden" class="form-control" readonly style="border: none;" id="level_data" name="level_data">

               <input type="hidden" class="form-control" readonly style="border: none;" id="subject_data" name="subject_data">

                <input type="hidden" class="form-control"  style="border: none;" id="type" name="type">

                <input type="hidden" class="form-control"  style="border: none;" id="timer_data" name="timer" value="">

               <input type="hidden" class="form-control"  style="border: none;" id="previous_option_data" name="previous_option" value="">

               <input type="hidden" class="form-control"  style="border: none;" id="review_option_data" name="review_option" value="">

                <input type="hidden" class="form-control"  style="border: none;" id="negative_data" name="negative" value="">

               <input type="hidden" class="form-control"  style="border: none;" id="each_question_ans_data" name="each_question_ans" value="">

               <input type="hidden" class="form-control"  style="border: none;" id="display_result_data" name="display_result" value="">

                <input type="hidden" class="form-control"  style="border: none;" id="type" name="type">
               </div>
            </div>
         </div>

        
         <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer" style="margin-top: 200px">
          <button type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Follow few instructions.</h6>
    <ul>
    <li>This is a FREE online test. DO NOT pay money to anyone to attend this test.</li>
    <li>All Questions are compulsory.</li>
    <li>Total number of questions : 10.</li>
    <li>Time alloted : 30 minutes.</li>
    <li>Each question carry 1 mark, no negative marks.</li>
    <li>DO NOT refresh the page.</li>
    <li>All the best.</li>
    </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Follow few instructions.</h6>
    <ul>
    <li>This is a FREE online test. DO NOT pay money to anyone to attend this test.</li>
    <li>All Questions are compulsory.</li>
    <li>Total number of questions : 10.</li>
    <li>Time alloted : 30 minutes.</li>
    <li>Each question carry 1 mark, no negative marks.</li>
    <li>DO NOT refresh the page.</li>
    <li>All the best.</li>
    </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Follow few instructions.</h6>
    <ul>
    <li>This is a FREE online test. DO NOT pay money to anyone to attend this test.</li>
    <li>All Questions are compulsory.</li>
    <li>Total number of questions : 10.</li>
    <li>Time alloted : 30 minutes.</li>
    <li>Each question carry 1 mark, no negative marks.</li>
    <li>DO NOT refresh the page.</li>
    <li>All the best.</li>
    </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default">Save</button>
      </div>
    </div>
  </div>
</div>
<script>
  function get_questuions(job_id)
  {
   var subject = $('#subject').val();
   var topic_id = $('#topic_id').val();
   var subtopic_id = $('#subtopic_id').val();
   var ques_type = $('#ques_type').val();
   var level = $('#level').val();
    $.ajax({
              url: "<?php echo base_url();?>employer/get_test_questions",
              type: "POST",
              data: {subject:subject,topic_id:topic_id,subtopic_id:subtopic_id,ques_type:ques_type,level:level},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('tbody').html(data);
              }
        });
       
  }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" type="text/javascript"></script>


<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script> -->
<script>

  function getTopic(id){
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
  
                }
                else
                {
                  $('#topic_id').html(res);
                  $('#topic_id').attr('disabled', false);
                }
             }
             
           }); 
           }
           get_questuions();
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
  
                }
                else
                {
                  $('#subtopic_id').html(res);
                  $('#subtopic_id').attr('disabled', false);
                }
                   
                 }
                 
             }); 
           }
           get_questuions();
       
     }
     
  function get_total(){
    // if ($('#checkbox').is(':checked')) {
      // alert('ff');
      var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                   return this.getAttribute("data-valueone");
               }).get();
               var data_arr1= (checkedValsofname.join(","));
      
            // alert();
            var myNameArray =  data_arr1.split(',');
              // var sum = 0;
          var total_time = sum(myNameArray);

             $('#total_time').html(total_time+' seconds');
             $('#total_questions').html(myNameArray.length);
  }


   
  
     $(function(){
      var test_name = $('#test_name').val();
  $("#frwd_btn").on("click", function() {
    // if (confirm("Selected Rows will be updated in external tracker!!")) {
    //         var data = [];
            var checkedVals = $('.chkbx:checkbox:checked').map(function() {
                   return this.value;
               }).get();
               var data_arr= (checkedVals.join(","));
               $('#question_id').val(data_arr);

               var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                   return this.getAttribute("data-valueone");
               }).get();
               var data_arr1= (checkedValsofname.join(","));
      
            // alert();
            var myNameArray =  data_arr1.split(',');
              // var sum = 0;
          var total_time = sum(myNameArray);

            var level_val = $('')
             $('#test_time').val(total_time+' seconds');
             $('#level_data').val($('#level').val());
             $('#subject_data').val($('#subject').val());
             $('#type').val($('#ques_type').val());

             $('#timer_data').val($('input[name=timer]:checked').val());
             $('#previous_option_data').val($('input[name=previous_option]:checked').val());
             $('#review_option_data').val($('input[name=review_option]:checked').val());
             $('#negative_data').val($('input[name=negative]:checked').val());
             $('#each_question_ans_data').val($('input[name=each_question_ans]:checked').val());
             $('#display_result_data').val($('input[name=display_result]:checked').val());
              
                      if($('#js').valid()) 
                      {
                          $('#add_test').modal('show');


                      }


    
  });
});
function sum(input){
             
 if (toString.call(input) !== "[object Array]")
    return false;
      
            var total =  0;
            for(var i=0;i<input.length;i++)
              {                  
                if(isNaN(input[i])){
                continue;
                 }
                  total += Number(input[i]);
               }
             return total;
            }

  </script> 
<script>
   $('.select2').select2();
</script>



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
// $('#btn').on('click', function() {
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

               else if (element.attr("name") == "timer" ) 
                 error.insertAfter(".timer");

              
            
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

'timer':{

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
'timer':{

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
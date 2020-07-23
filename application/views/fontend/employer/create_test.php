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
           Create Test
          </div>
         
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">                                       
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
              <div class="form-group">
                <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                <select id="topic_id" name="topic_id" class="form-control select2" onchange="getSubtopic(this.value)">
                  <option value="">Select Topic</option> 
                  <!-- <option value="1">HTML 5</option>  -->
                </select> <?php echo form_error('topic_id'); ?>   
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                <select id="subtopic_id" name="subtopic_id" class="form-control select2" onchange="get_questuions();" >
                </select> <?php echo form_error('subtopic_id'); ?>   
              </div>
            </div>               
          </div>
          <div class="row">
           
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                  <select name="level" onchange="get_questuions();" id="level" class="form-control select2">                                     
                    <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                    <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                    <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                  </select> <?php echo form_error('level'); ?>   
              </div>
            </div>
          
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
                <select name="ques_type" id="ques_type" class="form-control select2" type="text" onchange="get_questuions();">
                  <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                    <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                    <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
                </select> <?php echo form_error('ques_type'); ?>   
              </div>
            </div>

             <div class="col-md-4">
              <div class="form-group">
                <label for="exampleInputEmail1">Test name<span class="required">*</span></label>
               <input type="text" class="form-control" id="test_name" name="">
              </div>
            </div>
         </div>
             
             
     
      <div class="box-body">
        <div class="box" >
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
       <span style="float: right; margin-top: 20px;"> 
          <!-- <input  type="checkbox" name="check_all" id="checkAllchk">&nbsp; all -->
            <button type="button" id="frwd_btn" class="btn btn-primary">Add </button>
        </span>
    </div>
  </form>
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
              $('#topic_id').html(res);
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
                    $('#subtopic_id').html(res);
                }
                
            }); 
          }
   
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

            $.ajax({
              url: "<?php echo base_url();?>employer/add_to_test",
              type: "POST",
              data: {data_arr:data_arr,test_name:test_name},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                alert('test added Successfully');
                // window.location.reload();
                 // tracker_card(job_id);
              }
        });

          // } else {
          //   txt = "You pressed Cancel!";
          // }
    

    
  });
});
  </script> 
<script>
   $('.select2').select2();
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
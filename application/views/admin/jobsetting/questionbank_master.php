<?php $this->load->view('admin/components/header'); ?>
<style>
.multiselect {
  width: 100%;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}

</style>
<body class="skin-blue" data-baseurl="<?php echo base_url(); ?>">
    <div class="wrapper">
        
    <?php $this->load->view('admin/components/user_profile'); ?>
       
        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
            <?php $this->load->view('admin/components/navigation'); ?>
        </section>
        <!-- /.sidebar -->
      </aside>

        <div class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>

            <br/>
            <div class="container-fluid">
               <section class="content">
    <div class="row">
        <div class="col-md-12">

            <div class="box box-primary">
                <div class="box-header box-header-background with-border">
                    <div class="col-md-offset-3">
                        <h3 class="box-title ">QuestionBank Master</h3>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-background">
                <!-- form start -->
                <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/questionbank/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                        echo $row['ques_id'];
                      }
                     ?>" method="post">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="box-body">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                        <select id="subject"  name="technical_id" class="form-control" required onchange="getTopic(this.value)">
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
                                        <label for="exampleInputEmail1">Topic <span class="required">*</span></label>
                                        <select id="topic_id"  name="topic_id" class="form-control" required onchange="getSubtopic(this.value)">
                                           <option value="">Select Topic</option> 
                                        <?php if (!empty($topic))
                                           foreach($topic as $st_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $st_row['topic_id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['topic_id']==$st_row['topic_id'])echo "selected";?>><?php echo $st_row['topic_name']; ?></option> 
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                                     <select id="subtopic_id"  name="subtopic_id" class="form-control" required>
                                           <option value="">Select Subopic</option> 
                                        <?php if (!empty($subtopic))
                                           foreach($subtopic as $st_rows) 
                                           {
                                        ?>   
                                             <option value="<?php echo $st_rows['subtopic_id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['subtopic_id']==$st_rows['subtopic_id'])echo "selected";?>><?php echo $st_rows['subtopic_name']; ?></option> 
                                       <?php } ?>
                                        </select> </div>
									</div>
									</div>
									 <div class="box-body">
									 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                                      <select  name="level" class="form-control">
									                                          
										<option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
										<option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
										<option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
									 </select>
									 </div>
                                </div>
								 <div class="col-md-4">
                                    <div class="form-group">
									<label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
									<select  name="ques_type" class="form-control" onchange='hideshowfun()' id="category">
									                                      
                                        <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
										<option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
										<option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
								
									</select>
									 </div>
                                </div>
								</div>
								<div class="box-body">
									<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Question<span class="required">*</span></label>
									 <textarea name="question" id="question" class="form-control" style="height:100px;" required><?php if (!empty($edit_questionbank_info)) echo $row['question'];?></textarea>
								   </div>
								   </div>
                                </div>
								<div class="box-body">
								<div id="name">
					<div class="form-group">
			  
				  
				 <div class="col-sm-4">
				   <label>Option 1:</label>
                    <textarea name="option1" id="option1" class="form-control"><?php if (!empty($edit_questionbank_info)) echo $row['option1'];?></textarea>
                  </div>
                  <div class="col-sm-4">
				   <label>Option 2:</label>
                    <textarea name="option2" id="option2" class="form-control"><?php if (!empty($edit_questionbank_info)) echo $row['option2'];?></textarea>
                  </div>
                  <div class="col-sm-4">
				   <label>Option 3:</label>
                    <textarea name="option3" id="option3" class="form-control"><?php if (!empty($edit_questionbank_info)) echo $row['option3'];?></textarea>
                  </div>
                </div>
				<br/><hr/>
				<br/><div class="form-group">
				
				  <div class="col-sm-4">
				   <label>Option 4:</label>
                    <textarea name="option4" id="option4" class="form-control"><?php if (!empty($edit_questionbank_info)) echo $row['option4'];?></textarea>
                  </div>
                  <div class="col-sm-4">
				   <label>Option 5:</label>
                    <textarea name="option5" id="option5" class="form-control"><?php if (!empty($edit_questionbank_info)) echo $row['option5'];?></textarea>
                  </div>
				  <div class="col-sm-4">
				  <div class="multiselect">
				  <div class="selectBox" onclick="showCheckboxes()">
				  
				   <label>Correct Answer:</label>
				   <select  class="form-control" style="height:100px;">				   
				    <option>Select an option</option>
					</select>
					<div class="overSelect"></div>
				   </div>
				   <div id="checkboxes">
      <label for="one">
        <input type="checkbox" id="one" name="correct_answer[]" value="1" <?php if (!empty($edit_questionbank_info)) if($row['correct_answer']=='1')echo "checked";?>/>&nbsp;Option1</label>
      <label for="two">
        <input type="checkbox" id="two" name="correct_answer[]" value="2" <?php if (!empty($edit_questionbank_info)) if($row['correct_answer']=='2')echo "checked";?>/>&nbsp;Option2</label>
      <label for="three">
        <input type="checkbox" id="three" name="correct_answer[]" value="3" <?php if (!empty($edit_questionbank_info)) if($row['correct_answer']=='3')echo "checked";?>/>&nbsp;Option3</label>
	  <label for="four">
        <input type="checkbox" id="four" name="correct_answer[]" value="4" <?php if (!empty($edit_questionbank_info)) if($row['correct_answer']=='4')echo "checked";?>/>&nbsp;Option4</label>
	  <label for="five">
        <input type="checkbox" id="three" name="correct_answer[]" value="5" <?php if (!empty($edit_questionbank_info)) if($row['correct_answer']=='5')echo "checked";?>/>&nbsp;Option5</label>
		  </div>
				   </div>
				  </div>
				  </div>
				 </div>
		 
								</div>
								<div class="box-body">
								<input type="hidden" name="is_admin" value="1" class="form-control"> 
								</div>
				  <div class="box-body">
				   <div class="col-sm-12">
				  <div class="form-group" id="comp_name" style="display:none;">
                 
				  <label>Answer:</label>
                    <textarea name="sub_answer" id="sub_answer" class="form-control" style="height:100px;"><?php if (!empty($edit_questionbank_info)) echo $row['sub_answer'];?></textarea>
                  </div>
				  
                </div>	
				</div>
                                <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Save Question
                                </button><br/><br/>
                            
                            <!-- /.box-body -->

                        
                    </div>

                </form>
                    </div>
					</div>
                <div class="box-footer">

                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                <table class="table table-bordered table-striped" id="dataTables-example">
                    <thead>
                    <tr>
                        <th class="active">SL</th>
                        <th class="active">Subject</th>
                        <th class="active">Topic</th>
                        <th class="active">Subtopic</th>
						<th class="active">Question Type</th>
						<th class="active">Question</th>
                        <th class="active col-sm-2">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $key = 1 ;?>
                    <?php if (!empty($questionbank)): foreach ($questionbank as $ct_row) : ?>
                        <tr>
                            <td><?php echo $key ?></td>
                            <td><?php echo $ct_row['skill_name'] ?></td>
                            <td><?php echo $ct_row['topic_name'] ?></td>
                            <td><?php echo $ct_row['subtopic_name'] ?></td>
							<td><?php echo $ct_row['ques_type'] ?></td>
							<td><?php echo $ct_row['question'] ?></td>
                            <td>
                                <?php echo btn_edit('admin/questionbank/edit_questionbank/' . $ct_row['ques_id']); ?>
                                <?php echo btn_delete('admin/questionbank/delete_questionbank/' . $ct_row['ques_id']); ?>
                            </td>
                        </tr>
                    <?php
                    $key++;
                    endforeach;
                    ?>
                    <?php else : ?> 
                        <td colspan="3">
                            <strong>There is no record for display</strong>
                        </td>
                    <?php
                    endif; ?>
                    </tbody>
                </table>

                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col end -->
    </div>
    <!-- /.row -->
</section>
</div>

<br />


</div><!-- /.right-side -->

<?php $this->load->view('admin/components/footer'); ?>

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
                url:'<?php echo base_url();?>admin/questionbank/gettopic',
                data:{id:id},
                success:function(res){
                    $('#topic_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	   </script>
	   
	    <script>
	  function getSubtopic(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>admin/questionbank/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	   </script>
       
</script>
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>
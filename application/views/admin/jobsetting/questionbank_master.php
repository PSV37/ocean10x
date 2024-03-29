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
                        <h3 class="box-title ">Add Question Bank</h3>
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
							<div class="container-fluid">
                                <div class="col-md-4">
                                    <div class="form-group">                                       
									   <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                        
										<select id="subject"  name="technical_id" class="form-control subject" required onchange="getTopic(this.value)">
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
                                        <select id="topic_id"  name="topic_id" class="form-control"  onchange="getSubtopic(this.value)">
                                          
                                        </select>
                                    </div>
                                </div>
									 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
                                     <select id="subtopic_id"  name="subtopic_id" class="form-control"  onchange="getLineitem(this.value)">
                                          
                                        </select>
										</div>
									</div>
                                </div>
									 <div class="container-fluid">
									 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Line Item(Level 1)<span class="required">*</span></label>
                                     <select id="lineitem_id"  name="lineitem_id" class="form-control"  onchange="getLineitemlevel(this.value)">
                                          
                                        </select> 
										</div>
									</div>
									
										 <div class="col-md-4">
								  <div class="form-group">
                                        <label for="exampleInputEmail1">Line Item(Level 2)<span class="required">*</span></label>
                                     <select id="lineitemlevel_id"  name="lineitemlevel_id" class="form-control">
                                           
                                        </select> 
										</div>
									</div>
								
									 
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
								
								
								</div>
								<div class="container-fluid">
								<div class="col-md-4">
                                    <div class="form-group">
									<label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
									<select  name="ques_type" class="form-control" onchange="hideshowfun()" id="category">
									                                      
                                        <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
										<option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
										<option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
								
									</select>
									 </div>
                                </div>
								</div>
								<div class="container-fluid">
									<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Question<span class="required">*</span></label>
									 <textarea name="question" id="question" class="form-control ckeditor"  required><?php if (!empty($edit_questionbank_info)) echo $row['question'];?></textarea>
								   </div>
								   </div>
                                </div>
								<div id="name">
								<div class="container-fluid">
								
					<div class="form-group">
			  
				  
				 <div class="col-sm-12">
				   <label>Option 1:</label>
                    <textarea name="option1" id="option1" class="form-control ckeditor"><?php if (!empty($edit_questionbank_info)) echo $row['option1'];?></textarea>
                  </div>
				  </div>
				  </div>
				  <div class="container-fluid">
				  <div class="col-sm-12">
				  <div class="form-group">
                  
				   <label>Option 2:</label>
                    <textarea name="option2" id="option2" class="form-control ckeditor"><?php if (!empty($edit_questionbank_info)) echo $row['option2'];?></textarea>
                  </div>
				  </div>
				  </div>
				  <div class="container-fluid">
				   <div class="col-sm-12">
				  <div class="form-group">
                 
				   <label>Option 3:</label>
                    <textarea name="option3" id="option3" class="form-control ckeditor"><?php if (!empty($edit_questionbank_info)) echo $row['option3'];?></textarea>
                  </div>
                </div>
				</div>
				<div class="container-fluid">
				<div class="form-group">
				
				  <div class="col-sm-12">
				   <label>Option 4:</label>
                    <textarea name="option4" id="option4" class="form-control ckeditor"><?php if (!empty($edit_questionbank_info)) echo $row['option4'];?></textarea>
                  </div>
				  </div>
				  </div>
				  <div class="container-fluid">
				  <div class="form-group">
                  <div class="col-sm-12">
				   <label>Option 5:</label>
                    <textarea name="option5" id="option5" class="form-control ckeditor"><?php if (!empty($edit_questionbank_info)) echo $row['option5'];?></textarea>
                  </div>
				  </div>
				  </div>
				  <div class="container-fluid">
				  <div class="form-group">
				  <div class="col-sm-8">
				  <div class="multiselect">
				  <div class="selectBox" onclick="showCheckboxes()">
				  
				   <label>Correct Answer: <span class="required">*</span></label>
				   <select  class="form-control" style="height:100px;">	
					<option>Select Answer</option>
					</select>
					<div class="overSelect"></div>
				   </div>
				  <div id="checkboxes">
     
					<?php 
					  if(!empty($options))
						foreach($options as $key){
							$checked="";
							for($i=0;$i<sizeof($questionbank_answer);$i++){
								if($key['options_id']==$questionbank_answer[$i]['answer_id']){
									$checked ="checked";
									break;
							}
						}
							 
					?>
                    <input type="checkbox" <?php echo $checked; ?> name="correct_answer[]" id="correct_answer[]" value="<?php echo $key['options_id'];?>">&nbsp;&nbsp;<?php echo $key['options_type']; ?>&nbsp;&nbsp;
				<?php
					}
				?>
			
		 </div>
				   </div>
				  </div>
				  </div>
				  </div>
				  </div>
				 
		 
								
								<div class="box-body">
								<input type="hidden" name="is_admin" value="1" class="form-control"> 
								</div>
				  <div class="container-fluid">
				   <div class="col-sm-12">
				  <div class="form-group" id="comp_name" style="display:none;">
                 
				  <label>Answer: <span class="required">*</span></label>
                    <textarea name="sub_answer" id="sub_answer" class="form-control ckeditor" style="height:100px;"><?php if (!empty($edit_questionbank_info)) echo $row['sub_answer'];?></textarea>
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
<!--<script>
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
	   
	   </script>-->
	   
	   
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

    $(document).ready(function(){
		
		function getLineitemlevel_load(){
			var id = $('#lineitem_id').val();
			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>admin/questionbank/getlineitemlevel',
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
					url:'<?php echo base_url();?>admin/questionbank/getlineitem',
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
                url:'<?php echo base_url();?>admin/questionbank/getsubtopic',
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
					url:'<?php echo base_url();?>admin/questionbank/gettopic',
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
                url:'<?php echo base_url();?>admin/questionbank/getsubtopic',
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
                url:'<?php echo base_url();?>admin/questionbank/getlineitem',
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
                url:'<?php echo base_url();?>admin/questionbank/getlineitemlevel',
                data:{id:id},
                success:function(res){
                    $('#lineitemlevel_id').html(res);
                }
                
            }); 
          }
   
       }
</script>   

<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script>
<script>
$(function() {
  // choose target dropdown
  var select = $('.subject');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>
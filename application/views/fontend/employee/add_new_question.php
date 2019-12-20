<?php 
    $this->load->view('fontend/layout/employee_header.php');
?>
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>
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
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Add Question</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add Question</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employee_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           <form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employee/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                    echo $row['ques_id'];}?>" method="post">

            <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box-body">
						<div class="container-fluid">
                        	<div class="col-md-4">
                            	<div class="form-group">                                       
							   		<label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                	<select id="subject"  name="technical_id" class="form-control" required onchange="getTopic(this.value)">
	                                   <option value="">Select Subject</option> 
	                                <?php if (!empty($skill_master))
	                                   foreach($skill_master as $skill) 
	                                   {?>   
	                                    <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option> 
	                                <?php } ?>
                                	</select>
								</div>
                        	</div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                                    <select id="topic_id"  name="topic_id" class="form-control"
                                    onchange="getSubtopic(this.value)">
                                          
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
                    		  <textarea name="option1" id="option1" class="form-control ckeditor"><?php if(!empty($edit_questionbank_info)) echo $row['option1'];?></textarea>
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
										<?php }?>
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
                    <button type="submit" class="btn bg-navy" type="submit">Save Question</button><br/><br/>
                            
            </div>

           </form>



          </div>
        </div>
        <!-- end post-padding --> 
      </div>
      <!-- end col --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</div>
</div>
</div>
<!-- end section --> 

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


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
						url:'<?php echo base_url();?>employee/gettopic',
						data:{id:id},
						success:function(res){
							$('#topic_id').html(res);

						}
						
					}); 
				  }
		   }

    $(document).ready(function(){
		
		function getTopic_load(){
			 var id = $('#subject').val();
			 alert(id);
			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>employee/gettopic',
					data:{id:id},
					success:function(res){
						$('#topic_id').html(res);
						$('#topic_id').val(<?php echo $row['topic_id']; ?>);
						getSubtopic_load(<?php echo $row['topic_id']; ?>);
					}
					
				}); 
			}
       }
       function getSubtopic_load(id){
        // var id = $('#topic_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employee/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                    $('#subtopic_id').val(<?php echo $row['subtopic_id']; ?>);
					getLineitem_load(<?php  echo $row['subtopic_id']; ?>);
                }
                
            }); 
          }
   
       }
       function getLineitem_load(){
			// var id = $('#subtopic_id').val();

			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>employee/getlineitem',
					data:{id:id},
					success:function(res){
						$('#lineitem_id').html(res);
						$('#lineitem_id').val(<?php echo $row['lineitem_id']; ?>);
						 getLineitemlevel_load(<?php echo $row['lineitem_id']; ?>);
					}
					
				}); 
			  }
   
        }
        function getLineitemlevel_load(id){
			// var id = $('#lineitem_id').val();
			if(id){
				$.ajax({
					type:'POST',
					url:'<?php echo base_url();?>employee/getlineitemlevel',
					data:{id:id},
					success:function(res){
						$('#lineitemlevel_id').html(res);
						$('#lineitemlevel_id').val(<?php echo $row['lineitemlevel_id']; ?>);
					}
				}); 
			  }
        }
		
		
       getTopic_load();
       getSubtopic_load();
       getLineitem_load();
       getLineitemlevel_load();

    });
       
</script>
	   <script>
    function getSubtopic(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employee/getsubtopic',
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
                url:'<?php echo base_url();?>employee/getlineitem',
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
                url:'<?php echo base_url();?>employee/getlineitemlevel',
                data:{id:id},
                success:function(res){
                    $('#lineitemlevel_id').html(res);
                }
                
            }); 
          }
   
       }
</script>   


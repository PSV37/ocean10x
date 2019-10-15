<?php $this->load->view('admin/components/header'); ?>
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
                        <h3 class="box-title ">Question Bank</h3>
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
                                           foreach($subtopic as $stt_row) 
                                           {
                                        ?>   
                                            <option value="<?php echo $stt_row['subtopic_id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['subtopic_id']==$stt_row['subtopic_id'])echo "selected";?>><?php echo $stt_row['subtopic_name']; ?></option> 
                                        <?php } ?>
                                        </select> </div>
									</div>
									</div>
									 <div class="box-body">
									 <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Level<span class="required">*</span></label>
                                      <select  name="level" class="form-control">
										<option value=""></option>
										<option value="Expert">Expert</option>
										<option value="Medium">Medium</option>
										<option value="Beginner">Beginner</option>
									 </select>
									 </div>
                                </div>
								 <div class="col-md-4">
                                    <div class="form-group">
									<label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
									<select  name="ques_type" class="form-control" onchange='hideshowfun()' id="category">
									<option value="MCQ">MCQ</option>
									<option value="Subjective">Subjective</option>
									<option value="Practical">Practical</option>
									</select>
									 </div>
                                </div>
								</div>
								<div class="box-body">
									<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Question<span class="required">*</span></label>
									 <textarea name="question" id="question" class="form-control" style="height:100px;"><?php if (!empty($edit_questionbank_info)) echo $row['question'];?></textarea>
								   </div>
								   </div>
                                </div>
								<div class="box-body">
								<div id="name">
					<div class="form-group">
			  
				  
				 <div class="col-sm-4">
				   <label>Option 1:</label>
                    <textarea name="option1" id="option1" class="form-control"></textarea>
                  </div>
                  <div class="col-sm-4">
				   <label>Option 2:</label>
                    <textarea name="option2" id="option2" class="form-control"></textarea>
                  </div>
                  <div class="col-sm-4">
				   <label>Option 3:</label>
                    <textarea name="option3" id="option3" class="form-control"></textarea>
                  </div>
                </div>
				<br/><hr/>
				<br/><div class="form-group">
				
				  <div class="col-sm-4">
				   <label>Option 4:</label>
                    <textarea name="option4" id="option4" class="form-control"></textarea>
                  </div>
                  <div class="col-sm-4">
				   <label>Option 5:</label>
                    <textarea name="option5" id="option5" class="form-control"></textarea>
                  </div>
				  <div class="col-sm-4">
				   <label>Correct Answer:</label>
				   <select name="correct_answer" class="form-control" style="height:56px;">
				   <option></option>
				   <option value="Option1">Option1</option>
				   <option value="Option2">Option2</option>
				   <option value="Option3">Option3</option>
				   <option value="Option4">Option4</option>
				   <option value="Option5">Option5</option>
				   </select>
				   </div>
				  </div>
				  
				 </div>
								</div>
				  <div class="box-body">
				   <div class="col-sm-12">
				  <div class="form-group" id="comp_name" style="display:none;">
                 
				  <label>Answer:</label>
                    <textarea name="sub_answer" id="sub_answer" class="form-control" style="height:100px;"></textarea>
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

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	  
	  <script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  
  
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
	  

       
<?php $this->load->view('admin/components/footer'); ?>
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
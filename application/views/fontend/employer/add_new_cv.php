<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<style type="text/css">
  label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bold;
}
</style>

<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Add New CV</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add New CV</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End -->

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/save_questionbank/<?php  if (!empty($edit_questionbank_info)) { foreach($edit_questionbank_info as $row)
                    echo $row['ques_id'];
            	}
            ?>" method="post">

           <div class="row">

        	<div class="col-md-12 col-sm-12 col-xs-12">
            
                <div class="col-md-4">
                    <div class="form-group">                                       
					   <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                        
					</div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                        <select id="topic_id"  name="topic_id" class="form-control">
                          
                        </select>
                    </div>
                </div>
				<div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Subtopic<span class="required">*</span></label>
	                 	<select id="subtopic_id"  name="subtopic_id" class="form-control">
	                      
	                    </select>
					</div>
				</div>
              
									 
				<div class="col-md-4">
				  	<div class="form-group">
	                    <label for="exampleInputEmail1">Line Item(Level 1)<span class="required">*</span></label>
	                 	<select id="lineitem_id"  name="lineitem_id" class="form-control">
	                      
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
					                                          
						<option value="Expert">Expert</option>
						<option value="Medium">Medium</option>
						<option value="Beginner">Beginner</option>
					 </select>
					 </div>
                </div>
								
				<div class="col-md-4">
                    <div class="form-group">
					<label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
					<select  name="ques_type" class="form-control" id="category">
					</select>
					 </div>
                </div>
				
				<div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Question<span class="required">*</span></label>
					 	<textarea name="question" id="question" class="form-control ckeditor"  required></textarea>
				   </div>
				</div>
								
                <div class="panel-body"></div>
                <button type="submit" class="btn bg-navy" type="submit">Save CV
                </button>
                <div class="panel-body"></div>
             </div>
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

<!-- end section --> 

<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>



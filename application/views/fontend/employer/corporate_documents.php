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
        <h1 class="page-heading">Add corporate Documents>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add corporate Documents</span></div>
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
           
    		<form role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>employer/savedocumets" method="post">

            	<div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                   <div class="box-body">
					<div class="container-fluid">
                        <div class="col-md-12">
                            <div class="form-group">                                       
							   <label for="exampleInputEmail1">Corporate Name (as in Regd. Docs) <span class="required">*</span></label>
                                <input type="file" name="Corporate name">
								
								</div>
                        </div>

                    </div>
				  </div>
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

<!-- <script src="<?php echo base_url() ?>asset/js/select2.min.js"></script> -->
<!-- <script>
$("#subject").select2( {
	placeholder: "Select Subject",
	allowClear: true
	} );
</script> -->
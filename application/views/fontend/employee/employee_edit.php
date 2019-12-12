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

		


          
<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Edit Profile</h1>
        <?php print_r($employee_info); ?>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Edit Profile</span></div>
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
        <form method="post" action="<?php echo base_url();?>employer/postEditData" enctype="multipart/form-data">
       <input type="hidden" name="cid" id="cid" value="<?php echo $result['emp_id'];?>">
              <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="box-body">
          <div class="container-fluid">
                        <div class="col-md-4">
                            <div class="form-group">                                       
                 <label for="exampleInputEmail1">Employee No <span class="required">*</span></label>
                                
                <input type="number" min="1" name="emp_no" id="emp_no" class="form-control" value="<?php echo $result['emp_no']; ?>">
                </div>
                        </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name <span class="required">*</span></label>
                                         <input type="text" name="emp_name" id="emp_name" class="form-control" value="<?php echo $result['emp_name']; ?>">
                                    </div>
                                </div>
                  <div class="col-md-4">
                                    <div class="form-group">
                  <label for="exampleInputEmail1">Department<span class="required">*</span></label>
                  <select  name="dept_id" id="dept_id" class="form-control department">
                    <option value="">Select Department</option>
                    <?php foreach($department as $key){?>
                    <option value="<?php echo $key['dept_id']; ?>"<?php if($result['dept_id'] == $key['dept_id']){ echo "selected"; }?>><?php echo $key['department_name']; ?></option>
                    <?php } ?>
                    </select>
                   </div>
                                </div>
                                </div>
                   <div class="container-fluid">
                   <div class="col-md-6">
                  <div class="form-group">
                                        <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $result['email']; ?>">
                    </div>
                  </div>
                  
                     
                
                   
                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                                       <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo $result['mobile']; ?>" onkeypress="phoneno()" maxlength="10">
                   </div>
                                </div>
                
                
                </div>
                
                    <div class="container-fluid">
            
                                        
                                          <div class="col-md-4 col-sm-4">
                                            <div class="formrow">
                                          <label class="control-label">Country: <span class="required">*</span></label>
                      <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                      <option value="">Select Country</option>
                      <?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($result['country_id']==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                      <?php } ?>
                      </select>
                                          </div>
                                      </div>

                    
                    <div class="col-md-4 col-sm-4">
                      <div class="formrow">
                      <label class="control-label">State: <span class="required">*</span></label>
                      <select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                      <option value="">Select State</option>
                         
                      </select>
                    </div>
                                      </div>
                    
                    <div class="col-md-4 col-sm-4">
                      <div class="formrow">
                      <label class="control-label">City: <span class="required">*</span></label>
                      <select  name="city_id" id="city_id" class="form-control">
                      <option value="">Select City</option>
                       
                      </select>
                      </div>
                    </div>
                                                     
                    </div>
                <div class="container-fluid">
                  <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address<span class="required">*</span></label>
                  <textarea class="form-control ckeditor" name="address"><?php echo $result['address']; ?></textarea>
                  </div>
                   </div>
                                </div>     
                <div class="container-fluid">
                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pincode<span class="required">*</span></label>
                  <input type="text" name="pincode" id="pincode" class="form-control" autocomplete="off" value="<?php echo $result['pincode']; ?>">
                  </div>
                   </div>
                <div class="col-sm-6">
                   <label>Status:</label>
                  <select name="emp_status" class="form-control">
                    <option value="">Select</option>
                    <option value="1"<?php if($result['emp_status']=='1'){ echo "selected"; } ?>>Active</option>
                    <option value="2"<?php if($result['emp_status']=='2'){ echo "selected"; } ?>>Inactive</option>
                   </select>
                  </div>
                </div>
                   <div class="panel-body"></div>
                                <button type="submit" class="btn bg-navy" type="submit">Edit Employe
                                </button>
                

            </form>

              <span class="text-danger"><?php echo validation_errors(); ?></span>
              
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


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
<div class="text-center">
  <img src="<?php echo base_url(); ?>/fontend/images/loader.gif">
</div>
  </div>
</div>
<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>


<script type="text/javascript">
    
    $(document).ready(function(){
        $('#submit').submit(function(){
            $('#myModal').modal();
        })
    })

</script>


<script>
$(document).ready(function(){
    $("#name").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
});

</script>
  <script src="<?php echo base_url(); ?>asset/js/intlTelInput.js"></script>
  <script src="<?php echo base_url(); ?>asset/js/utils.js"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      utilsScript: "",
    });
  </script>
  
  
    
<script>
	function getStates(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                }
				
            }); 
        }
   
	}
	   
	  
	  function getCitys(id){
		if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
				
            }); 
          }
   
	   }
	   
	  $(document).ready(function(){

    function getStates_load(){
        var id = $('#country_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                    $('#state_id').val(<?php echo $employee_info->state_id; ?>);
                     getCitys_load(<?php echo $employee_info->state_id; ?>);
                }
                
            }); 
          }
   
       }
    
    function getCitys_load(id){
      //var id = $('#state_id').val();
      // alert(id);
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                    $('#city_id').val(<?php echo $employee_info->city_id; ?>);
                }
                
            }); 
          }
   
       }

  getCitys_load();
  getStates_load();
 
});

</script>  

 <script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#country_id").select2( {
	placeholder: "Select Country",
	allowClear: true
	} );
</script>
<script>
$("#company_category").select2( {
	placeholder: "Select Industry",
	allowClear: true
	} );
</script>
<script>
$("#country").select2( {
	placeholder: "Select Country Code",
	allowClear: true
	} );
</script>


<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#company_pincode" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "employer/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.pincode;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
</script>


<script>
$(function() {
  // choose target dropdown
  var select = $('.counrey_code');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>


<script>
$(function() {
  // choose target dropdown
  var select = $('.counrey_code');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>

<script>
$(function() {
  // choose target dropdown
  var select = $('.services');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>

<script>
$(function() {
  // choose target dropdown
  var select = $('.country');
  select.html(select.find('option').sort(function(x, y) {
    // to change to descending order switch "<" for ">"
    return $(x).text() > $(y).text() ? 1 : -1;
  }));

  // select default item after sorting (first item)
  //$('select').get(0).selectedIndex = 0;
});
</script>

		<script>        
           function phoneno(){          
            $('#company_phone').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
	   
	   <script>        
           function phonenoo(){          
            $('#cont_person_mobile').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
		<script type="text/javascript">
	$(document).ready(function() {

      

      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });


      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });


    });
		</script>
	
 <?php $this->load->view("fontend/layout/footer.php"); ?>
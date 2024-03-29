<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>

<style type="text/css">
  .bootstrap-select > .dropdown-toggle {
    display: block;
  }
</style>
<!-- Page Title start -->

<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">Add Employee </h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>Add Employee</span></div>
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
          <div id="smsg"><?php echo $this->session->flashdata('success'); ?></div>  
          <form method="post" action="<?php echo base_url();?>employer/addemployee" enctype="multipart/form-data">

               <input type="hidden" name="cid" id="cid" value="<?php echo $result['emp_id'];?>">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box-body">
                 <div class="container-fluid">
                   <div class="col-md-4">
                    <div class="form-group">                                       
                     <label for="exampleInputEmail1">Employee No<span class="required">*</span></label>
                      <input type="number" min="1"  name="emp_no" id="emp_no" class="form-control" value="<?php echo $result['emp_no']; ?>" required ><?php echo form_error('emp_no'); ?>
                    </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control" value="<?php echo $result['emp_name']; ?>" required><?php echo form_error('emp_name'); ?>
                      </div>
                    </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Department<span class="required">*</span></label>
                      <select  name="dept_id" id="dept_id" class="form-control department" required>
                        <option value="">Select Department</option>
                        <?php foreach($department as $key){?>
                        <option value="<?php echo $key['dept_id']; ?>"<?php if($result['dept_id'] == $key['dept_id']){ echo "selected"; }?>><?php echo $key['department_name']; ?></option>
                        <?php } ?>
                        </select>
                     </div>
                  </div>
                </div>
                  <div class="container-fluid">
                     <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo $result['email']; ?>" required><?php echo form_error('email'); ?>
                        </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Password<span class="required">*</span></label>
                        <input type="Password" name="Password" id="Password" maxlength="15" class="form-control" value="<?php echo $result['Password']; ?>" required ><?php echo form_error('Password'); ?>
                        </div>
                      </div>
                     <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" value="<?php echo $result['mobile']; ?>" onkeypress="phoneno()" maxlength="10" required><?php echo form_error('mobile'); ?>
                       </div>
                    </div>
                </div>
                <div class="container-fluid">
                   <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Designation<span class="required">*</span></label>
                     
                      <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required>
                        <option value="">Select designation</option>
                        <?php foreach($roles as $key){?>
                        <option value="<?php echo $key['user_role_id']; ?>"<?php if($result['user_role'] == $key['user_role_id']){ echo "selected"; }?>><?php echo $key['user_roles']; ?></option>
                        <?php } ?>
                        <!-- <option>HR Manager</option>
                        <option>Project Manager</option>
                        <option>Finance Manager</option> -->
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Give Access To User<span class="required">*</span></label>
                          
                            <select class="selectpicker form-control" multiple data-live-search="true" name="user_acc[]" id="user_accc" required>
                            </select>
                         
                      </div>
                  </div>
                </div>
                  
                <div class="container-fluid">
                    <div class="col-md-4 col-sm-4">
                     <div class="formrow">
                        <label class="control-label">Country: <span class="required">*</span></label>
                        <select  name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)" required>
                           <option value="">Select Country</option>
                          <?php foreach($country as $key){?>
                          <option value="<?php echo $key['country_id']; ?>"<?php if($result['country_id']==$key['country_id']){ echo "selected"; } elseif ($key['country_name']=='India') {echo "selected";}?>><?php echo $key['country_name']; ?></option>
                          <?php } ?>
                        </select>
                       </div>
                     </div>

                    
                    <div class="col-md-4 col-sm-4">
                      <div class="formrow">
                      <label class="control-label">State: <span class="required">*</span></label>
                      <select  name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)" required>
                         <option value="">Select State</option>
                      </select>
                    </div>
                 </div>
                    
                    <div class="col-md-4 col-sm-4">
                      <div class="formrow">
                      <label class="control-label">City: <span class="required">*</span></label>
                      <select  name="city_id" id="city_id" class="form-control" required>
                      <option value="">Select City</option>
                       
                      </select>
                      </div>
                    </div>
                                                     
                    </div>
                <div class="container-fluid">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Address<span class="required">*</span></label>
                       <textarea class="form-control ckeditor" name="address" required><?php echo $result['address']; ?></textarea><?php echo form_error('address'); ?>
                     </div>
                  </div>
                </div>     
                <div class="container-fluid">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1" required>Pincode<span class="required">*</span></label>
                     <input type="text" name="pincode" id="pincode" class="form-control" autocomplete="off" value="<?php echo $result['pincode']; ?>"><?php echo form_error('pincode'); ?>
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
                     <button name="submit_employee" class="btn bg-navy" type="submit">Add Employee</button>
                

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
</div>
<script>
   $(document).ready (function(){
     $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
     $("#smsg").slideUp(500);
     });   
   });
</script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>

<script>
    function getStates(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getstate',
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
                url:'<?php echo base_url();?>employer/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
                
            }); 
          }
   
       }

      function getuseraccess(id){
      if(id){
          
        
              $.ajax({
                  type:'POST',
                  url:'<?php echo base_url();?>employer/get_access_data',
                  data:{id:id},
                  success:function(res){
                      $('#user_accc').html(res);
                      $("#user_accc").selectpicker('refresh');
                  }

          
              }); 
            }
          // $(".empdash .selectpicker").css("display", "block");
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
                    $('#state_id').val(<?php echo $result['state_id']; ?>);
                     getCitys_load(<?php echo $result['state_id']; ?>);
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
                    $('#city_id').val(<?php echo $result['city_id']; ?>);
                }
                
            }); 
          }
   
       }

       function getuseraccess_load(){
         var id = $('#user_role').val();
         alert(id);
      if(id){
          
        
              $.ajax({
                  type:'POST',
                  url:'<?php echo base_url();?>employer/get_access_data',
                  data:{id:id},
                  success:function(res){
                      $('#user_accc').html(res);
                      $("#user_accc").selectpicker('refresh');
                  }

          
              }); 
            }
          // $(".empdash .selectpicker").css("display", "block");
       }

  getCitys_load();
  getStates_load();
  getuseraccess_load();
});


</script>

<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script>
$("#dept_id").select2( {
  placeholder: "Select Department",
  allowClear: true
  } );
</script>

<script>        
  function phoneno(){          
    $('#mobile').keypress(function(e) {
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
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#pincode" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "employer/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                var pincode = obj.pincode;
                var location=  obj.location;
                var city = obj.city;
                var state = obj.state;
                var resData = pincode + ', ' + location + ', ' + city + ', '+ state; 
                    return resData;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
</script>
<script type="text/javascript">
  $("#user_accc").mousedown(function(e){
    e.preventDefault();
    
    var select = this;
    var scroll = select.scrollTop;
    
    e.target.selected = !e.target.selected;
    
    setTimeout(function(){select.scrollTop = scroll;}, 0);
    
    $(select).focus();
}).mousemove(function(e){e.preventDefault()});
</script>


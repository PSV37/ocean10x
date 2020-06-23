<?php 
    $this->load->view('fontend/layout/employer_header.php');
?>
<!----
<style type="text/css">
  .bootstrap-select > .dropdown-toggle {
    display: block;
  }
</style>

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

<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/employer_left.php'); ?>
      <div class="content col-md-9">
        <div class="userccount empdash">
          <div class="formpanel"> <?php echo $this->session->flashdata('success'); ?>
           
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
      
      </div>
     
    </div>

  </div>
 
</div>
</div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/tinymce/tinymce.min.js"></script> 
<script type="text/javascript">
document.getElementsByClassName('form-control').innerHTML+="<br />";
</script>
<?php $this->load->view("fontend/layout/footer.php"); ?>


 
    
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
     
// function getaccess(id)
//       {
//         if(id){
//             $.ajax({
//                 type:'POST',
//                 url:'<?php echo base_url();?>employer/get_access_specifierss',
//                 data:{id:id},
//                 success:function(res){
//                   console.log(res);
//                     $('#accessrr').html(res);
//                 }
                
//             }); 
//           }
//       }
       
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

---->


<div class="col-md-9 employe_add">
            <div class="col-md-12">
            <h4 class="employee_heading">ADD EMPLOYEE</h4>
            </div>
            
            <div class="col-md-12">
            <div class="col-md-4">
                    <div class="form-group">                                       
                     <label for="exampleInputEmail1">Employee No<span class="required">*</span></label>
                      <input type="number" min="1" name="emp_no" id="emp_no" class="form-control" value="" required="">                    </div>
                    </div>
            
            <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control" value="" required="">                      </div>
                    </div>
             
             <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Department<span class="required">*</span></label>
                      <select name="dept_id" id="dept_id" class="form-control department select2-hidden-accessible" required="" tabindex="-1" aria-hidden="true">
                        <option value="">Select Department</option>
                                                <option value="1">Banking / Insurance</option>
                                                <option value="2">IT / Software</option>
                                                </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" style="width: 272px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dept_id-container"><span class="select2-selection__rendered" id="select2-dept_id-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                     </div>
             </div>       
            </div>
            
            <div class="col-md-12">
            	<div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" value="" required="">                        </div>
                       </div>
                       
                 <div class="col-md-4">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Password<span class="required">*</span></label>
                        <input type="Password" name="Password" id="Password" maxlength="15" class="form-control" value="" required="">                        </div>
                      </div>  
                 
                 <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" value="" onkeypress="phoneno()" maxlength="10" required="">                       </div>
                    </div>         
            </div>
            
            <div class="col-md-12">
            <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Designation<span class="required">*</span></label>
                     
                      <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required="">
                        <option value="">Select designation</option>
                                                <option value="1">HR Manager</option>
                                                <option value="2">Project Manager</option>
                                                <option value="3">Finance Manager</option>
                                                <!-- <option>HR Manager</option>
                        <option>Project Manager</option>
                        <option>Finance Manager</option> -->
                      </select>
                    </div>
                  </div>
                  
             <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Give Acces To User<span class="required">*</span></label>
                     
                      <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required="">
                        <option value="">Select designation</option>
                                                <option value="1">HR Manager</option>
                                                <option value="2">Project Manager</option>
                                                <option value="3">Finance Manager</option>
                                                <!-- <option>HR Manager</option>
                        <option>Project Manager</option>
                        <option>Finance Manager</option> -->
                      </select>
                    </div>
                  </div>     
                  
            
            </div>
            
            <div class="col-md-12">
            <div class="col-md-4 col-sm-4">
                     <div class="formrow">
                        <label class="control-label">Country: <span class="required">*</span></label>
                        <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)" required="">
                           <option value="">Select Country</option>
                                                    <option value="1">Afghanistan</option>
                                                    <option value="2">Albania</option>
                                                    <option value="3">Algeria</option>
                                                    <option value="4">American Samoa</option>
                                                    <option value="5">Andorra</option>
                                                    <option value="6">Angola</option>
                                                    <option value="7">Anguilla</option>
                                                    <option value="8">Antarctica</option>
                                                    <option value="9">Antigua And Barbuda</option>
                                                    <option value="10">Argentina</option>
                                                    <option value="11">Armenia</option>
                                                    <option value="12">Aruba</option>
                                                    <option value="13">Australia</option>
                                                    <option value="14">Austria</option>
                                                    <option value="15">Azerbaijan</option>
                                                    <option value="16">Bahamas The</option>
                                                    <option value="17">Bahrain</option>
                                                    <option value="18">Bangladesh</option>
                                                    <option value="19">Barbados</option>
                                                    <option value="20">Belarus</option>
                                                    <option value="21">Belgium</option>
                                                    <option value="22">Belize</option>
                                                    <option value="23">Benin</option>
                                                    <option value="24">Bermuda</option>
                                                    <option value="25">Bhutan</option>
                                                    <option value="26">Bolivia</option>
                                                    <option value="27">Bosnia and Herzegovina</option>
                                                    <option value="28">Botswana</option>
                                                    <option value="29">Bouvet Island</option>
                                                    <option value="30">Brazil</option>
                                                    <option value="31">British Indian Ocean Territory</option>
                                                    <option value="32">Brunei</option>
                                                    <option value="33">Bulgaria</option>
                                                    <option value="34">Burkina Faso</option>
                                                    <option value="35">Burundi</option>
                                                    <option value="36">Cambodia</option>
                                                    <option value="37">Cameroon</option>
                                                    <option value="38">Canada</option>
                                                    <option value="39">Cape Verde</option>
                                                    <option value="40">Cayman Islands</option>
                                                    <option value="41">Central African Republic</option>
                                                    <option value="42">Chad</option>
                                                    <option value="43">Chile</option>
                                                    <option value="44">China</option>
                                                    <option value="45">Christmas Island</option>
                                                    <option value="46">Cocos (Keeling) Islands</option>
                                                    <option value="47">Colombia</option>
                                                    <option value="48">Comoros</option>
                                                    <option value="49">Republic Of The Congo</option>
                                                    <option value="50">Democratic Republic Of The Congo</option>
                                                    <option value="51">Cook Islands</option>
                                                    <option value="52">Costa Rica</option>
                                                    <option value="53">Cote D'Ivoire (Ivory Coast)</option>
                                                    <option value="54">Croatia (Hrvatska)</option>
                                                    <option value="55">Cuba</option>
                                                    <option value="56">Cyprus</option>
                                                    <option value="57">Czech Republic</option>
                                                    <option value="58">Denmark</option>
                                                    <option value="59">Djibouti</option>
                                                    <option value="60">Dominica</option>
                                                    <option value="61">Dominican Republic</option>
                                                    <option value="62">East Timor</option>
                                                    <option value="63">Ecuador</option>
                                                    <option value="64">Egypt</option>
                                                    <option value="65">El Salvador</option>
                                                    <option value="66">Equatorial Guinea</option>
                                                    <option value="67">Eritrea</option>
                                                    <option value="68">Estonia</option>
                                                    <option value="69">Ethiopia</option>
                                                    <option value="70">External Territories of Australia</option>
                                                    <option value="71">Falkland Islands</option>
                                                    <option value="72">Faroe Islands</option>
                                                    <option value="73">Fiji Islands</option>
                                                    <option value="74">Finland</option>
                                                    <option value="75">France</option>
                                                    <option value="76">French Guiana</option>
                                                    <option value="77">French Polynesia</option>
                                                    <option value="78">French Southern Territories</option>
                                                    <option value="79">Gabon</option>
                                                    <option value="80">Gambia The</option>
                                                    <option value="81">Georgia</option>
                                                    <option value="82">Germany</option>
                                                    <option value="83">Ghana</option>
                                                    <option value="84">Gibraltar</option>
                                                    <option value="85">Greece</option>
                                                    <option value="86">Greenland</option>
                                                    <option value="87">Grenada</option>
                                                    <option value="88">Guadeloupe</option>
                                                    <option value="89">Guam</option>
                                                    <option value="90">Guatemala</option>
                                                    <option value="91">Guernsey and Alderney</option>
                                                    <option value="92">Guinea</option>
                                                    <option value="93">Guinea-Bissau</option>
                                                    <option value="94">Guyana</option>
                                                    <option value="95">Haiti</option>
                                                    <option value="96">Heard and McDonald Islands</option>
                                                    <option value="97">Honduras</option>
                                                    <option value="98">Hong Kong S.A.R.</option>
                                                    <option value="99">Hungary</option>
                                                    <option value="100">Iceland</option>
                                                    <option value="101" selected="">India</option>
                                                    <option value="102">Indonesia</option>
                                                    <option value="103">Iran</option>
                                                    <option value="104">Iraq</option>
                                                    <option value="105">Ireland</option>
                                                    <option value="106">Israel</option>
                                                    <option value="107">Italy</option>
                                                    <option value="108">Jamaica</option>
                                                    <option value="109">Japan</option>
                                                    <option value="110">Jersey</option>
                                                    <option value="111">Jordan</option>
                                                    <option value="112">Kazakhstan</option>
                                                    <option value="113">Kenya</option>
                                                    <option value="114">Kiribati</option>
                                                    <option value="115">Korea North</option>
                                                    <option value="116">Korea South</option>
                                                    <option value="117">Kuwait</option>
                                                    <option value="118">Kyrgyzstan</option>
                                                    <option value="119">Laos</option>
                                                    <option value="120">Latvia</option>
                                                    <option value="121">Lebanon</option>
                                                    <option value="122">Lesotho</option>
                                                    <option value="123">Liberia</option>
                                                    <option value="124">Libya</option>
                                                    <option value="125">Liechtenstein</option>
                                                    <option value="126">Lithuania</option>
                                                    <option value="127">Luxembourg</option>
                                                    <option value="128">Macau S.A.R.</option>
                                                    <option value="129">Macedonia</option>
                                                    <option value="130">Madagascar</option>
                                                    <option value="131">Malawi</option>
                                                    <option value="132">Malaysia</option>
                                                    <option value="133">Maldives</option>
                                                    <option value="134">Mali</option>
                                                    <option value="135">Malta</option>
                                                    <option value="136">Man (Isle of)</option>
                                                    <option value="137">Marshall Islands</option>
                                                    <option value="138">Martinique</option>
                                                    <option value="139">Mauritania</option>
                                                    <option value="140">Mauritius</option>
                                                    <option value="141">Mayotte</option>
                                                    <option value="142">Mexico</option>
                                                    <option value="143">Micronesia</option>
                                                    <option value="144">Moldova</option>
                                                    <option value="145">Monaco</option>
                                                    <option value="146">Mongolia</option>
                                                    <option value="147">Montserrat</option>
                                                    <option value="148">Morocco</option>
                                                    <option value="149">Mozambique</option>
                                                    <option value="150">Myanmar</option>
                                                    <option value="151">Namibia</option>
                                                    <option value="152">Nauru</option>
                                                    <option value="153">Nepal</option>
                                                    <option value="154">Netherlands Antilles</option>
                                                    <option value="155">Netherlands The</option>
                                                    <option value="156">New Caledonia</option>
                                                    <option value="157">New Zealand</option>
                                                    <option value="158">Nicaragua</option>
                                                    <option value="159">Niger</option>
                                                    <option value="160">Nigeria</option>
                                                    <option value="161">Niue</option>
                                                    <option value="162">Norfolk Island</option>
                                                    <option value="163">Northern Mariana Islands</option>
                                                    <option value="164">Norway</option>
                                                    <option value="165">Oman</option>
                                                    <option value="166">Pakistan</option>
                                                    <option value="167">Palau</option>
                                                    <option value="168">Palestinian Territory Occupied</option>
                                                    <option value="169">Panama</option>
                                                    <option value="170">Papua new Guinea</option>
                                                    <option value="171">Paraguay</option>
                                                    <option value="172">Peru</option>
                                                    <option value="173">Philippines</option>
                                                    <option value="174">Pitcairn Island</option>
                                                    <option value="175">Poland</option>
                                                    <option value="176">Portugal</option>
                                                    <option value="177">Puerto Rico</option>
                                                    <option value="178">Qatar</option>
                                                    <option value="179">Reunion</option>
                                                    <option value="180">Romania</option>
                                                    <option value="181">Russia</option>
                                                    <option value="182">Rwanda</option>
                                                    <option value="183">Saint Helena</option>
                                                    <option value="184">Saint Kitts And Nevis</option>
                                                    <option value="185">Saint Lucia</option>
                                                    <option value="186">Saint Pierre and Miquelon</option>
                                                    <option value="187">Saint Vincent And The Grenadines</option>
                                                    <option value="188">Samoa</option>
                                                    <option value="189">San Marino</option>
                                                    <option value="190">Sao Tome and Principe</option>
                                                    <option value="191">Saudi Arabia</option>
                                                    <option value="192">Senegal</option>
                                                    <option value="193">Serbia</option>
                                                    <option value="194">Seychelles</option>
                                                    <option value="195">Sierra Leone</option>
                                                    <option value="196">Singapore</option>
                                                    <option value="197">Slovakia</option>
                                                    <option value="198">Slovenia</option>
                                                    <option value="199">Smaller Territories of the UK</option>
                                                    <option value="200">Solomon Islands</option>
                                                    <option value="201">Somalia</option>
                                                    <option value="202">South Africa</option>
                                                    <option value="203">South Georgia</option>
                                                    <option value="204">South Sudan</option>
                                                    <option value="205">Spain</option>
                                                    <option value="206">Sri Lanka</option>
                                                    <option value="207">Sudan</option>
                                                    <option value="208">Suriname</option>
                                                    <option value="209">Svalbard And Jan Mayen Islands</option>
                                                    <option value="210">Swaziland</option>
                                                    <option value="211">Sweden</option>
                                                    <option value="212">Switzerland</option>
                                                    <option value="213">Syria</option>
                                                    <option value="214">Taiwan</option>
                                                    <option value="215">Tajikistan</option>
                                                    <option value="216">Tanzania</option>
                                                    <option value="217">Thailand</option>
                                                    <option value="218">Togo</option>
                                                    <option value="219">Tokelau</option>
                                                    <option value="220">Tonga</option>
                                                    <option value="221">Trinidad And Tobago</option>
                                                    <option value="222">Tunisia</option>
                                                    <option value="223">Turkey</option>
                                                    <option value="224">Turkmenistan</option>
                                                    <option value="225">Turks And Caicos Islands</option>
                                                    <option value="226">Tuvalu</option>
                                                    <option value="227">Uganda</option>
                                                    <option value="228">Ukraine</option>
                                                    <option value="229">United Arab Emirates</option>
                                                    <option value="230">United Kingdom</option>
                                                    <option value="231">United States</option>
                                                    <option value="232">United States Minor Outlying Islands</option>
                                                    <option value="233">Uruguay</option>
                                                    <option value="234">Uzbekistan</option>
                                                    <option value="235">Vanuatu</option>
                                                    <option value="236">Vatican City State (Holy See)</option>
                                                    <option value="237">Venezuela</option>
                                                    <option value="238">Vietnam</option>
                                                    <option value="239">Virgin Islands (British)</option>
                                                    <option value="240">Virgin Islands (US)</option>
                                                    <option value="241">Wallis And Futuna Islands</option>
                                                    <option value="242">Western Sahara</option>
                                                    <option value="243">Yemen</option>
                                                    <option value="244">Yugoslavia</option>
                                                    <option value="245">Zambia</option>
                                                    <option value="246">Zimbabwe</option>
                                                  </select>
                       </div>
                     </div>
                     
             <div class="col-md-4 col-sm-4">
                      <div class="formrow">
                      <label class="control-label">State: <span class="required">*</span></label>
                      <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)" required="">
                         <option value="">Select State</option>
                      </select>
                    </div>
                 </div>        
                     
             <div class="col-md-4 col-sm-4">
                      <div class="formrow">
                      <label class="control-label">City: <span class="required">*</span></label>
                      <select name="city_id" id="city_id" class="form-control" required="">
                      <option value="">Select City</option>
                       
                      </select>
                      </div>
                    </div>        
            </div>
            
            <div class="col-md-12" style="margin-top:10px;">

   
				<div class="col-md-12 form-group">
      <label for="comment">Question </label>
		 <textarea class="form-control" rows="5" id="comment"></textarea>

    </div>            
            </div>
            <div class="col-md-12">
            <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputEmail1" required="">Pincode<span class="required">*</span></label>
                     <input type="text" name="pincode" id="pincode" class="form-control" autocomplete="off" value="">                  </div>
                </div>
            
            <div class="col-sm-6">
                   <label>Status:</label>
                     <select name="emp_status" class="form-control">
                      <option value="">Select</option>
                      <option value="1">Active</option>
                      <option value="2">Inactive</option>
                   </select>
                </div>
            </div>
            <div class="cl-md-12">
            <div class="col-md-12 employ_btn_div">
            	<button class="employ_btn">Add Employee</button>
            </div>
            </div>
            
            
            </div>





<?php 
    $this->load->view('fontend/layout/employer_new_header.php');?>  


<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css"> -->


<style type="text/css">
   
   .required
   {
   color: red;
   }
   
   label.error {
    color: red;
    font-weight: normal !important;
    font-style: italic;
}
   
</style>

<style>
div#music {
    margin-top: 20px;
}
.emplye_n {
   margin-top: 41px;
    margin-bottom: 20px;
    border: solid 1px #eae9e9;
    padding: 25px 25px;    
    border-radius: 13px;
    box-shadow: 0px 1px 4px 0px #e9e8e8;
	background-color:#fff;
}
thead {
    background-color: aliceblue;
    font-size: 12px;
    color: #149a94;
}
button.sort-serach {
    border: none;
    border-radius: 5px;
    background-color: #18c5bd;
}

.search_f input[type="text"]{    border: solid 1px #dadada;
    padding: 3px;
    border-radius: 0px 20px 20px 0px;
}

.table>tbody>tr>td{line-height:2.428571;
font-size:12px;}
button#status {
    width: 98px;
    text-align: center;
}
.add_btn{     
 background-color: #18c5bd;
    border: none;
    padding:4px 27px;
    border-radius: 30px;
    color: #fff;
    font-weight: 600;
	margin-right: 10px;
}
.save_btn{
	 background-color: #18c5bd;
    border: none;
    padding: 4px 27px;
    border-radius: 30px;
    color: #fff;
    font-weight: 600;
	margin-right: 22px;
	}
.add_btn:hover{	
background-color: #109690;
    box-shadow: 2px 2px 7px #d6d2d2;
}
.save_btn:hover{
	background-color: #109690;
    box-shadow: 2px 2px 7px #d6d2d2;
}

.add_employ {
    margin-top: 25px;
}
button.btn.btn-update {
    background-color: #18c5bd;
    color: #fff;
    padding: 6px 30px;
    border-radius: 33px;
    font-weight: 600;
}
button.btn.btn-update:hover{
	background-color: #109690;
    box-shadow: 2px 2px 7px #d6d2d2;

	}
.add_employ h4{	
font-size: 21px;
    margin-bottom: 30px;
   
    border-left: solid 3px #18c5bd;
   
    padding: 6px 0px 6px 15px;
}
:focus {
    outline: none !important;
}

.dropdown {
  display: inline-block;
  position: relative;
  margin-top:0px;
}

.dd-button {
    display: inline-block;
    border: 1px solid #dedede;
    border-radius: 4px;
    padding: 5px 30px 5px 20px;
    background-color:#cde4f5;
    cursor: pointer;
    white-space: nowrap;
    border-radius: 33px;
	color:#848484;
	font-size:12px;
}
.dd-button:after {
  content: '';
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #6f6b6b;
  
}

.dd-button:hover {
  background-color: #eeeeee;
}


.dd-input {
  display: none;
}

.dd-menu {
  position: absolute;
  top: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 0;
  margin: 2px 0 0 0;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
  background-color: #ffffff;
  list-style-type: none;
}

.dd-input + .dd-menu {
  display: none;
} 

.dd-input:checked + .dd-menu {
  display: block;
  z-index:999;
} 

.dd-menu li {
  padding: 10px 20px;
  cursor: pointer;
  white-space: nowrap;
}

.dd-menu li:hover {
  background-color: #f6f6f6;
}

.dd-menu li a {
  display: block;
  margin: -10px -20px;
  padding: 10px 20px;
}

.dd-menu li.divider{
  padding: 0;
  border-bottom: 1px solid #cccccc;
}

  .bootstrap-select > .dropdown-toggle {
    display: block;
}
textarea#comment {
    max-width: 865px;
    max-height: 150px;
}
ul#select2-dept_id-results {
    margin-top: 30px;
}
input.select2-search__field {
    display: inline-block;
    border-radius: 0px;
}
.bootstrap-select > .dropdown-toggle {
    display: block;
  }
.select2-container .select2-selection--single {
    
    width: 200px;
}
td {
    text-align: center;
}
th {
    text-align: center;
}
</style>


<div class="container-fluid main-d">
	<div class="container">
    <div class="col-md-12">
       <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
        <div class="col-md-9 emplye_n">
          <div id="smsg"><?php echo $this->session->flashdata('success'); ?></div>  
          <form action="/action_page.php" style="float: left;margin-right: 25px;">
            <div class="col-md-12">
              <div class="row">
                <button class="sort-serach" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
                <input type="text" placeholder="Search.." name="search">
              </div>
              
            </div>
            
   		    </form>
          <label class="dropdown">

            <div class="dd-button">
              Department
            </div>
            <input type="checkbox" class="dd-input" id="test">
            <ul class="dd-menu">
              <li>Action</li>
              <li>Another action</li>
              <li>Something else here</li>
              <li class="divider"></li>
              <li><a href="http://rane.io">Link to Rane.io</a></li>
            </ul>
          </label>
          <div role="tabpanel" class="tab-pane fade active in" id="music">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTables-example">
                <thead>
                  <tr>
          			  <th>Test Name </th>
          			  <th>JS Name</th>
          			 
          			  <th>email</th>
                  <th>Percentage</th>
          			  <th>View</th>
                  <!-- <th>Update</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $srno=0; foreach($all_test_details as $key){ $srno++; 
                ?>
            		<tr style="background: #fff;">
                  <td><?php echo $key['test_name']; ?></td>
          				<td><?php echo $key['full_name']; ?></td>   
          				<td><?php echo $key['email']; ?></td>
          				<td><?php echo $key['final_percentage']; ?></td>
          				<td><a href="<?php echo base_url();?>employer/detail_reports?t=<?php echo $key['test_id']; ?>&j=<?php echo $key['js_id']; ?>">Detail Report</a></td>	
                   
                </tr>
  			         <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
           <div class="container-fluid">
             <div class="col-md-10"></div>
            <div class="col-md-2">
            <span><?php echo $links; ?></span>   
            </div>
               
          </div>
         <!--  <div class="col-md-6" style="text-align: left;margin-left:-12px;"><button data-toggle="collapse" data-target="#collapseEx" aria-expanded="false" aria-controls="collapseEx" class="add_btn">Add</button></div> -->
           <!--  <div class="col-md-6" style="text-align: right;margin-left: 473px;float: none;"><button class="save_btn">Save</button></div> -->
          

   
        </div>
      </div>
    </div>
  </div>

   

<script>

   $(document).ready (function(){
     $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
     $("#smsg").slideUp(500);
     });   

    $("#city").autocomplete({
             
             source: "<?php echo base_url();?>employer_register/search_city_name",
            minLength: 2,
                 // append: "#rotateModal",
                 focus: function(event, ui) {
                  // prevent autocomplete from updating the textbox
                  event.preventDefault();
                  // manually update the textbox
                  // alert(source);
                  $(this).val(ui.item.label);
               },
               select: function(event, ui) {
                  // prevent autocomplete from updating the textbox
                  event.preventDefault();
                  // manually update the textbox and hidden field
                  $(this).val(ui.item.label);
                  $('#city_id').val(ui.item.value);
                  get_country(ui.item.value);
               }
               
              });
   });

   function get_country(city_id)
   {
    // var city_id = $('#city_id').val();
    $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer_register/getcity_details',
                data:{city_id:city_id},
                success:function(res)
                {
                  var obj = JSON.parse(res);

                      $('#country_id').val(obj.country_id);
                    $('#country').val(obj.country_name);
                    $('#state_id').val(obj.state_id);
                    $('#state').val(obj.state_name);
                    $('#country').prop('disabled', true);
                    $('#state').prop('disabled', true);
                }
    
            }); 

   }
</script>
    <script>
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
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
     

       function Activate_user(id)
{
   // alert(id);
   if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Employer/activate',
                data:{id:id},
                success:function(res){
                     // alert('User Activated  Successfully!');
                    location.reload();
                     // location.reload();
                }
                
            }); 
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
         // alert(id);
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


 $("#js").validate (  

{

rules:{



'emp_no':{

required: true

},

'emp_name':{

required: true,
minlength: 3,
namespace_regex: true

},

'dept_id':{

required: true

},

'mobile':{

required: true,
phonenumber_regex: true

},

'email':{

required: true,
email_regex: true

},

'Password':{

required: true,
password_regex: true

},

'user_role':{

required: true

},


'user_acc[]': {

  required: true
},

'country_id':{

required: true

},

'state_id':{

required: true

},

'city_id':{

required: true

},


'pincode':{

required: true

},

'address':{

required: true

},



},


messages:{



'emp_no':{

required: "This field is mandatory!"

},

'emp_name':{

required: "This field is mandatory!"

},


'dept_id':{

required: "This field is mandatory!"

},

'mobile':{

required: "This field is mandatory!"

},

'email':{

required: "This field is mandatory!"

},

'Password':{

required: "This field is mandatory!"

},

'user_role':{

required: "This field is mandatory!"

},

'user_acc[]':{

required: "This field is mandatory!"

},

'country_id':{

required: "This field is mandatory!"

},

'state_id':{

required: "This field is mandatory!"

},

'city_id':{

required: "This field is mandatory!"

},

'pincode':{

required: "This field is mandatory!",

pincode_regex: true

},





}



});

});

</script>

<script >

  $.validator.addMethod("namespace_regex", function(value, element) {

return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    
}, "Please choose only alphabets");

  $.validator.addMethod("phonenumber_regex", function(value, element) {

return this.optional(element) || /^[1-9]{1}[0-9]{9}$/.test(value);
    
}, "Please type 10 digit mobile number");

  $.validator.addMethod("email_regex", function(value, element) {

return this.optional(element) || /^\w.+@[a-z-A-Z_]+?\.[a-zA-Z\-][\w-]{2,3}$/.test(value);
    
}, "Please type valid Email");

  $.validator.addMethod("password_regex", function(value, element) {

return this.optional(element) || /(?=^.{8,15}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&amp;*()_+}{&quot;:;'?/&gt;.&lt;,])(?!.*\s).*$/.test(value);
    
}, "Please type valid Password");


  $.validator.addMethod("pincode_regex", function(value, element) {

return this.optional(element) || /^[1-9][0-9][0-9][0-9][0-9][0-9]$/.test(value);

}, "Please Enter 6 digits Company Pincode");



</script>

<script>
   $('.select2').select2();
</script>
<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script>



<script>

   $(".allowphonenumber").on("keypress keyup blur",function (event) {
             //this.value = this.value.replace(/[^0-9\.]/g,'');
      $(this).val($(this).val().replace("^(\+\d{1,2}\s?)?1?\-?\.?\s?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$"));
             if ((event.which < 48 || event.which > 57)) {
                 event.preventDefault();
             }
         });

   
   //(^[ A-Za-z0-9_@./#&+-]*$)
   
 

   $(".allownumericwithoutdecimal").on("input", function(evt) {
    var self = $(this);
    self.val(self.val().replace(/[^\d]+/, ""));
    if ((evt.which < 48 || evt.which > 57)) 
     {
     evt.preventDefault();
     }
 });


   
   $(".allowalphabatescomma").keypress(function (e) {
         var regex = new RegExp("^[a-zA-Z, \s]+$");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         else
         {
         e.preventDefault();
         return false;
         }
     });

    $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
   
   $(".allowalphabatesspace").keypress(function (e) {
         var regex = new RegExp("^[a-zA-Z ]*$");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         else
         {
         e.preventDefault();
         return false;
         }
     });
$(".allowalphabates").keypress(function (e) {
         var regex = new RegExp("^[a-zA-Z ]*$");
         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
         if (regex.test(str)) {
             return true;
         }
         else
         {
         e.preventDefault();
         return false;
         }
     });


</script>



<script type="text/javascript">
 function validChk() {
    var chkBox = document.getElementsByName('correct_answer[]');
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

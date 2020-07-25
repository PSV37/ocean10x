<?php $this->load->view('fontend/layout/employer_new_header.php');?>
<style>
   .cv_bank{margin-top:65px;
   }
   button.saerch_btn {
   background-color: #18c5bd;
   border: none;
   padding: 7px 40px;
   color: #fff;
   font-weight: 700;
   }
   button.saerch_btn:hover{
   background-color:#14a39d;
   }
   .dropdown {
   display: inline-block;
   position: relative;
   }
 .dd-button {
    display: inline-block;
    border: 1px solid #dedede;
    border-radius: 4px;
    padding: 5px 30px 5px 20px;
    background-color: #18c5bd;
    cursor: pointer;
    width: 100%;
    white-space: nowrap;
    border-radius: 33px;
    margin-right: 15px;
    margin-top: 0px;
    color: #fff;
    margin-left: 13px;
    font-size: 12px;
    text-align: center;
}
   
   .dd-button:hover {
   background-color:#18c5bd;
   }
   .rounded{border-radius:10px;}
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
   font-size: 12px;
   color: #404040;
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
   .send{margin-top: 12px;
   background-color: #18c5bd;
   border: none;
   padding: 4px 20px;
   border-radius: 20px;
   color: #fff;
   font-size: 12px;
   float: right;
   }
   .active-job label {
   -webkit-perspective: 1000px;
   perspective: 1000px;
   -webkit-transform-style: preserve-3d;
   transform-style: preserve-3d;
   display: block;
   width:100%;
   position: absolute;
   left: 50%;
   top: 50%;
   -webkit-transform: translate(-50%, -50%);
   transform: translate(-50%, -50%);
   }
   .card {
   position: relative;
   height: auto;
   width: 100%;
   -webkit-transform-style: preserve-3d;  
   transform-style: preserve-3d;
   -webkit-transition: all 600ms;
   transition: all 600ms;
   border-radius:13px;
   padding:0px;
   margin-top:15px;
   }
   .card div {
   -webkit-backface-visibility: hidden;
   backface-visibility: hidden;
   border-radius: 5px;
   }
   .card .back {
   background: #222;
   -webkit-transform: rotateX(180deg);
   transform: rotateX(180deg);
   }
   /*
   :checked + .card {
   transform: rotateX(180deg);
   -webkit-transform: rotateX(180deg);
   }
   */
   .card
   {
    overflow-x: scroll;
}

   .active-job {
   margin-top:168px;
   }
   .dropdown-menu>li>a{padding:3px 20px;}
   .front{padding:11px;height:auto;}
   .job-info {
   margin-left: 40px;
   margin-top:0px;
   }
   
   .icon-info {
   margin-left:60px;
   margin-bottom:10px;
   }
  
   .front .dropdown {
   top: -8px;
   width: 63px;
   position: absolute;
   right: 0px;
   }
   .detail-btn{
   background-color: #fff;
   padding: 3px 19px;
   border-radius: 20px;
   background-color: #18c5bd;
   border: none;
   color: #fff;
   font-weight: 100;
   float:right;
   margin-left:10px;}
   .detail-btn:hover{
   background-color:#107773;
   transition:0.8s; 
   }   
   .following-info {
   float:left;
   line-height:30px;
   margin-top:0px;
   margin-left:18px;
   }
   .following-info2 {
   margin-left:309px;
   line-height:30px;
   margin-top:0px;
   margin-bottom:15px;
   }
   .active-span{
   position: absolute;
   top: 12px;
   left: 405px;
   background-color: #8BC34A;
   padding: 1px 17px;
   border-radius: 9px;
   color: #fff;
   font-size: 11px;
   }
   .following-info3 {
   float: right;
   margin-top: -144px;
   line-height:30px;
   }
   label{display:block;}
   .test_history{margin-top:80px;}
   .result {
   margin-left: 42px;
   }
   .open>.dropdown-menu {
   display: block;
   width: fit-content;
   }
   .dropdown-menu-right {
   right: 0;
   left: auto;
   }
   button#gedf-drop1 {
   top: 0px;
   position: absolute;
   right: 0px;
   }
   .dropdown-menu {
   position: absolute;
   top:35;
   right: 0;
   z-index: 1000;
   display: none;
   float: left;
   min-width: 160px;
   padding: 5px 0;
   margin: 2px 0 0;
   font-size: 14px;
   text-align: left;
   list-style: none;
   background-color: #fff;
   background-clip: padding-box;
   border: 1px solid #ccc;
   border: 1px solid rgba(0,0,0,.15);
   border-radius: 4px;
   -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
   box-shadow: 0 6px 12px rgba(0,0,0,.175);
   }
   .check{right: 28px;
   z-index: 999;
   margin-top: 29px;
   position:absolute;}
   @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
   @keyframes bake-pie {
   from {
   transform: rotate(0deg) translate3d(0,0,0);
   }
   }
   main {
   margin: 30px auto;
   }
   
   select.bs-select-hidden,
   select.selectpicker {
   display: none !important;
   }

/* Styles for wrapping the search box */

.main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}


div#bulk {
    margin-top: 20px;
}
  .fade-rotate .modal-dialog {
   position: absolute;
   left: 0;
   right: 0;
   top: 50%;
   transform: translateY(-50%) !important;
   }
   input{padding:7px 25px;}
   .modal-footer{text-align:center;}
   .modal-body {
   padding: 0px 65px;
   }
   button.btn-save {
   font-size: 12px;
   padding: 10px 52px;
   background-color: #14a99b;
   color: #fff;
   border: none;
   border-radius:20px;
   box-shadow: 2px 2px 6px #a8a4a4;
   float: right;
   }
   .modal-content {
   background-image: linear-gradient(#18c5bd, #d4efec);
   }
   .sendEmail label{color:#fff;font-size:13px;}
   .sendEmail input{background-color: #f3f7f663;}
   .sendEmail textarea.form-control{background-color:#fbffff80;}
   @media (min-width: 768px){
   .modal-dialog {
   width: 460px;
   margin: 30px auto;
   }
   }
   .fade-rotate .modal-dialog{top:45%;}
   .modal-footer{border-top:none;}
   .modal-header{border-bottom:none;}
   button.btn-save:hover{background-color:#0e776d;
   transition:0.9s;color:#fff;}
   .clickable{
   cursor: pointer;   
   }
   .panel-heading div {
   margin-top: -18px;
   font-size: 15px;
   }
   .panel-heading div span{
   margin-left:5px;
   }
   .panel-body{
   display: none;
   }
   .alert {
   padding: 8px;
   background-color: #18c5bd;
   color: white;
   width: fit-content;
   height: 13px;
   border-radius: 20px;
   line-height: 0px;
   margin-right: 7px;
   float: left;
   }
   .closebtn {
   margin-top: -9px;
   margin-left: 15px;
   color: white;
   font-weight: bold;
   float: right;
   font-size: 22px;
   line-height: 20px;
   cursor: pointer;
   transition: 0.3s;
   }
   .closebtn:hover {
   color: black;
   }
   :root {
   --bg: #e3e4e8;
   --fg: #17181c;
   --bs1: #ffffff;
   --bs2: #c1c2c5;
   --tick: #454954;
   --transDur: 0.1s;
   font-size: calc(20px + (40 - 20)*(100vw - 320px)/(2560 - 320));
   }
   .ui-autocomplete-input {
  border: none; 
  font-size: 14px;
  width: 300px;
  height: 24px;
  margin-bottom: 5px;
  padding-top: 2px;
  border: 1px solid #DDD !important;
  padding-top: 0px !important;
  z-index: 1511;
  position: relative;
}
.ui-autocomplete {
    z-index: 5000;
    background: #b3ebe8;;
    width: 0%;
}
button#frwd_btn {
    margin-top: -2px;
    margin-left: 10px;
}
button.btn.btn-default {
    margin-left: 5px;
    margin-top: 20px;
}
input.select2-search__field {
    /* margin-top: 40px; */
    display: inline-block;
    border-radius: 0;
}
ul#select2-folder_id-y3-results {
    margin-top: 27px;
}
span.select2-selection.select2-selection--single {
    /*width: 330px;*/
    text-align: center;
}
ul#select2-job_select-results {
    margin-top: 30px;
}
button.btn.btn-primary {
    background-color: #18c5bd;
    border: none;
    border-radius: 30px;
}
.box {
    margin-top: 40px;
}
li.right-title {
    list-style: none;
}
input {
       padding: 0px 0px;
    border: none;
     max-width: 100px;
}
select {
  /* for Firefox */
  -moz-appearance: none;
  /* for Chrome */
  -webkit-appearance: none;
}
input.email {
    min-width: 200px;
}
/* For IE10 */
select::-ms-expand {
  display: none;
}
input.select2-search__field {
    min-width: 100%;
}
input.email {
    min-width: 200px;
    border: none;
}
textarea#comment {
    border: none;
    text-decoration: none;
    resize: none;
}
.required
   {
   color: red;
   }
</style>
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-md-9 cv_bank">
            
              <div class="row">
             
               <div class="col-md-4">
                  
            
                     
                     <select class="form-control select2" id="job_select" onchange="tracker_card(this.value);">
                     <?php  if (isset($company_active_jobs) && !empty($company_active_jobs)) {
                        foreach ($company_active_jobs as $row) { ?>
                          <option <?php if ($this->session->userdata('job_id') == $row->job_post_id)   {
                       echo "selected"; 
                     } ?> value="<?php echo $row->job_post_id; ?>"><?php echo $row->job_title; ?></option>
                     <?php   }
                     } $this->session->unset_userdata('job_id'); ?>
                     </select>
                       
                 

                
                  <div class="clear"></div>
               </div>
               <div class="col-md-3">
                  <form id="int_track" method="post" action="<?php echo base_url(); ?>employer/corporate_cv_bank">
                  <label class="dropdown" style="float:right;">
                     <div class="dd-button">
                        Active Job
                     </div>
                     <input type="checkbox" class="dd-input" id="test">
                     <!-- <ul class="dd-menu" id="test"> -->
                        <!-- <li>Name</li> -->
                        <!-- /<li>Experience</li> -->
                        <!-- <li value="edu">Education</li> -->
                     <!-- </ul> -->
                     <ul id="sizelist" class="dd-menu">
                       <li data-value="js_name" ><a href="#">Active Job</a></li>
                       <li data-value="js_experience"><a href="#">Expired Jobs</a></li>
                     
                       
                     </ul>

                     
                  </label>
                  <input id="sizevalue" size="15" name="sort_val" type="hidden" />
                  <button type="submit" name="sort" class="hidden" id="sort_btn"></button>
                  </form>
               </div>
               <div class="col-md-3">
               <label>
                    <a style="float: right;" id="add_cv" href=""><button class="btn btn-primary"><i class="fas fa-plus"></i> Add New Candidate</button></a>
                     
                  </label>
               </div>
            </div>
           <div class="row">
            <div col-md-12>
               <button style="float: right;" type="button" class="btn btn-default btn-sm save">
          <span class="glyphicon glyphicon-floppy-save"></span> Save
        </button>
        <span style="float: right; margin-top: 20px;"> 
          <input  type="checkbox" name="check_all" id="checkAllchk">&nbsp; all
                     <button type="button" id="frwd_btn" class="btn btn-primary">update external</button></span>
        
        <!--  <label style="float: right;margin-top: 17px;" class="btn btn-default">
          check all
          <input type="checkbox" name="check_all" id="jevattend_id" value="1">
        </label> -->
            </div>
             
           </div>
            
         


            <div class="box" >
               <div class="card content">
                     <!-- <div class="front"> -->
                      <div class="following-info">
                         <table class="table table-borderless" id="myTable">
                            <thead>
                              <tr>

                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Sal</th>
                                <th scope="col">Work Exp</th>
                                <th scope="col">Notice (days)</th>
                                <th scope="col">Education</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action Items</th>
                                <th scope="col">Notes</th>
                                <th scope="col">Reminders</th>
                                <th scope="col">Update external</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                             
                            </tbody>
                          </table>
                        </div>
                     <!-- </div> -->
                   </div>
               
            </div>
            <div class="row">
            <div col-md-12>
              <a id="export" href=""><button style="float: right;margin-bottom: 50px;" type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-export"></span> Export
              </button></a>
            </div>
             
           </div>
             </div>
           
         </div>
         
      </div>
   </div>
</div>

<script>
   $(document).on(' change','input[name="check_all"]',function() {
            $('.chkbx').prop("checked" , this.checked);
    });
  </script>
<script>
   $('.select2').select2();
</script>
<script>
  $(".save").click(function() {
     var job_id = $('#job_select').val();
//    var id = $(".table table-borderless").closest("tr");
// alert (id); // Find the text
   var ary = [];
        $(function () {
            $('.table-borderless tr').each(function (a, b) {
                var value = $('#cv_id', b).val();
                var name = $("#name" , b).val();
                var email = $("#email", b).val();
                var mobile = $("#mobile", b).val();
                var ctc = $("#ctc", b).val();
                var exp = $("#exp", b).val();
                var notice = $("#notice", b).val();
                var edu = $("#edu", b).val();
                var status = $("#status", b).val();
                var comment = $("#comment", b).val();
                var action = $("#action", b).val();
                var reminder = $("#reminder", b).val();
                ary.push({name:name,email:email,mobile:mobile,status:status,ctc:ctc,exp:exp,notice:notice,edu:edu,comment:comment,value:value,action:action,reminder:reminder});
               
            });
            // alert(JSON.stringify( ary));
           var data_arr = JSON.stringify(ary);
            $.ajax({
              url: "<?php echo base_url();?>employer/update_cv",
              type: "POST",
              data: {data_arr:data_arr},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                alert('Updated Successfully');
                // window.location.reload();
                 tracker_card(job_id);
              }
        });
            // alert(ary);
        });
});
  $(function(){
      var job_id = $('#job_select').val();
  $("#frwd_btn").on("click", function() {
    if (confirm("Selected Rows will be updated in external tracker!!")) {
            var data = [];
            $("table > tbody > tr").each(function () {
              var $tr = $(this);
              if ($tr.find(".chkbx").is(":checked")) {
                data.push({
                  value: $tr.find("#cv_id").val(),
                  name: $tr.find("#name").val(),
                  email: $tr.find("#email").val(),
                  mobile: $tr.find("#mobile").val(),
                  ctc: $tr.find("#ctc").val(),
                  exp: $tr.find("#exp").val(),
                  notice: $tr.find("#notice").val(),
                  edu: $tr.find("#edu").val(),
                  status: $tr.find("#status").val(),
                  action: $tr.find("#action").val(),
                  comment: $tr.find("#comment").val(),
                  reminder: $tr.find("#reminder").val(),
                  update: $tr.find("#update").val(),
                });
              }
            });
            console.clear();
            console.log(JSON.stringify(data));
            var data_arr = JSON.stringify(data);
            $.ajax({
              url: "<?php echo base_url();?>employer/update_external",
              type: "POST",
              data: {data_arr:data_arr},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                alert('Updated Successfully');
                // window.location.reload();
                 tracker_card(job_id);
              }
        });

          } else {
            txt = "You pressed Cancel!";
          }
    

    
  });
});

  
//    $("#frwd_btn").click(function() {
//      var job_id = $('#job_select').val();
// //    var id = $(".table table-borderless").closest("tr");
// // alert (id); // Find the text
//    var ary = [];
//         $(function () {
//             $('.table-borderless tr').each(function (a, b) {
//                 var value = $('#cv_id', b).val();
//                 var name = $("#name" , b).val();
//                 var email = $("#email", b).val();
//                 var mobile = $("#mobile", b).val();
//                 var ctc = $("#ctc", b).val();
//                 var exp = $("#exp", b).val();
//                 var notice = $("#notice", b).val();
//                 var edu = $("#edu", b).val();
//                 var status = $("#status", b).val();
//                 var comment = $("#comment", b).val();
//                 var action = $("#action", b).val();
//                 var reminder = $("#reminder", b).val();
//                 var update = $("#update", b).val();
//                 ary.push({name:name,email:email,mobile:mobile,status:status,ctc:ctc,exp:exp,notice:notice,edu:edu,comment:comment,value:value,action:action,reminder:reminder,update:update});
               
//             });
//             alert(JSON.stringify( ary));
//         //    var data_arr = JSON.stringify(ary);
//         //     $.ajax({
//         //       url: "<?php echo base_url();?>employer/update_external",
//         //       type: "POST",
//         //       data: {data_arr:data_arr},
//         //       // contentType:false,
//         //       // processData:false,
//         //        // dataType: "json",
//         //       success: function(data)
//         //       {
//         //         alert('Updated Successfully');
//         //         // window.location.reload();
//         //          tracker_card(job_id);
//         //       }
//         // });
//             // alert(ary);
//         });
// });



</script>

<script>
   $( document ).ready(function() {
     var job_id = $('#job_select').val();
     tracker_card(job_id);
    var url = '<?php echo base_url(); ?>employer/add_new_cv/'+job_id;
    var export_url = '<?php echo base_url(); ?>employer/export_internal_tracker/'+job_id;
    // alert (url);
    $('#add_cv').attr('href',url);
 
    $('#export').attr('href',export_url);



});
     
 function tracker_card(job_id)
  {
    var url = '<?php echo base_url(); ?>employer/add_new_cv/'+job_id;
    $('#add_cv').attr('href',url);

    var export_url = '<?php echo base_url(); ?>employer/export_internal_tracker/'+job_id;
    $('#export').attr('href',export_url);

    
     
    $.ajax({
              url: "<?php echo base_url();?>employer/get_tracker_card",
              type: "POST",
              data: {job_id:job_id},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('tbody').html(data);
              }
        });
       
  }
</script>


<script src="<?php echo base_url(); ?>asset/src/jquery.tokeninput.js"></script>
<script src="<?php echo base_url() ?>asset/js/jquery-ui.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/bootstrap-tokenfield.js"></script>
<script src="<?php echo base_url() ?>asset/tokenjs/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>asset/js/search.js"></script>

<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/additional-methods.js"></script>

<script>
$("#dept_id").select2( {
  placeholder: "Select Department",
  allowClear: true
  } );
</script>


<script>

$(document).ready(function()

{

$("#int_track").validate (  

{

rules:{

'email1':{

email: true


//company_phone_regex: true

},


'mobile':{

required: true,

companyname_regex: true

},

'ctc':{

required: true,

contactname_regex: true

},

'exp': {

required: true,

contpersonlevel_regex: true

}, 

'notice':{

required: true,

email: true


},

'edu':{

required: true,

email: true


},

'status': {
        
  matches: "[0-9]+", 
        
  minlength:10,
        
  maxlength:10,

  required: true
},

'comment':{

required: true,

url: true

}


},

messages:{

'email1':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!"

},

'cont_person_mobile':{

  required: "The name field is mandatory!",

  matches: "Didn't match!", 
        
  minlength: "Minimum length 10 digits!",
        
  maxlength: "Maximum length 10 digits!"
},

'contact_name':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!"

},

'cont_person_level':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!"

},

'company_phone':{

required: "The username field is mandatory!",

minlength: "Choose a username of at least 4 letters!",

company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",

remote: "The username is already in use by another user!"

},


'alternate_email_id':{

required: "The Email is required!",

email: "Please enter a valid email address!",

remote: "The email is already in use by another user!"

},

'cont_person_email' :{

required: "The Email is required!",

email: "Please enter a valid email address!",

remote: "The email is already in use by another user!"

},

'company_url':{

required: "The Web Address is required!"

},

'username':{

required: "The username field is mandatory!",

minlength: "Choose a username of at least 4 letters!",

username_regex: "You have used invalid characters. Are permitted only letters numbers!",

remote: "The username is already in use by another user!"

},

'pass1':{

required: "The password field is mandatory!",

minlength: "Please enter a password at least 8 characters!"

},

'pass2':{ 

equalTo: "The two passwords do not match!"

}

}

});

});

</script>

<script >
   $.validator.addMethod("jobtitle_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i.test(value);
   
   }, "Please choose only alphabets");
   
   
   $.validator.addMethod("cityid_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i.test(value);
   
   }, "Please choose only alphabets");
   
   $.validator.addMethod("contactname_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
   
   }, "Please choose only alphabets");
   
   
   
   $.validator.addMethod("salrangefrom_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
   
   }, "Please choose only alphabets");
   
   
   $.validator.addMethod("salrangeto_regex", function(value, element) {
   
   return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
   
   }, "Please choose only alphabets");
   
   
   $.validator.addMethod("companypincode_regex", function(value, element) {
   
   return this.optional(element) || /^[1-9][0-9][0-9][0-9][0-9][0-9]$/.test(value);
   
   }, "Please Enter 6 digits Company Pincode");
   
</script>

<script>

  

$(".document").on("keypress keyup blur", ".allowphonenumber", function (event) {
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
   
   $(document).on("keypress keyup blur", ".allowalphabatesspace", function (e){
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

   $(document).on("keypress keyup blur", ".allowalphabatesspace",.function (e){
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

<!-- <div class="box" >  -->
               <?php $key = 1; if (!empty($forwarded_job_tracking)): foreach ($forwarded_job_tracking as $job_row1) : ?>
                 
               
                  <!-- <div class="check"> -->
                    
                     
                  <!-- </div>  -->
                  <!-- <div class="card content"> -->
                     <!-- <div class="front"> -->
                        
                            <!-- <tbody> -->
                              <p style="    font-weight: 700;"><?php echo $job_row1->datecreation; ?></p><br>
                              <?php $forwarded_job_tracking_date = $this->job_posting_model->get_job_forwarded_candidate_by_date($job_id,$job_row1->datecreation);
                              // echo $this->db->last_query();die;

                               foreach ($forwarded_job_tracking_date as $job_row) { ?>
                                

                              <tr>
                              
                                <input class="attrValue" type="hidden" name="" id="cv_id" value="<?php echo $job_row->cv_id; ?>">
                                 <td >

                                   <?php $today = date('Y-m-d');  if($job_row->updated_on == $today)
                                { ?> <span class="required"> * </span>

                               <?php } ?>


                                  <input class="email" id="name" type="text" name="email" value="<?php echo $job_row->js_name; ?>" ></td>

                                <td ><input class="email" id="email" type="text" name="email" value="<?php echo $job_row->js_email; ?>" ></td>

                                <td ><input id="mobile" type="text" name="mobile" value="<?php echo $job_row->js_mobile; ?>" maxlength='10' ></td>

                                <td ><input id="ctc" type="text" name="ctc" value="<?php echo $job_row->js_current_ctc; ?>" maxlength='3' ></td>

                                <td ><input id="exp" type="text" name="exp" value="<?php echo $job_row->js_experience; ?>" ></td>

                                <td ><input id="notice" type="text" name="notice" value="<?php echo $job_row->js_current_notice_period; ?>" ></td>

                                <td > <select name="edu" style="min-width: 200px; border: none;"  id="edu" class="form-control select2 email" data-style="btn-default" data-live-search="true"  >
                                  <option value=""> </option>
                                  <?php   foreach($education_level as $education){?>
                                  <option value="<?php echo $education['education_level_id']; ?>"<?php if($job_row->js_top_education==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
                                  <?php } ?>
                                  <option value="other">Other </option>
                                  <option value="other">None </option>
                               </select></td>
                    <!--  <input id="edu" type="text" name="edu" value="<?php echo $job_row->education_level_name; ?>" ></td> -->

                                <td><select name="status" style="min-width: 200px; border: none;" id="status" class="form-control select2" data-style="btn-default" data-live-search="true"  >
                                  <option value=""> </option>
                                  <?php   foreach($tracker_status as $status){?>
                                  <option value="<?php echo $status['status_id']; ?>"<?php if($job_row->tracking_status==$status['status_id']){ echo "selected"; }?>><?php echo $status['status_name']; ?></option>
                                  <?php } ?>
                                 

                               </select></td>
                                <td ><input type="text" class="email" id="action" name="comment" value="<?php echo $job_row->action_item; ?>" ></td>

                                  <td ><textarea class="email" id="comment" name="comment" value=""><?php echo $job_row->comments; ?></textarea></td>

                                    <td ><input type="text" class="email" id="reminder" name="comment" value="<?php echo $job_row->reminder; ?>" ></td>

                                <td style="min-width: 150px;"><input type="checkbox" id="update" class="chkbx" checked name=""></td>
                             


                              </tr>
                            <?php } ?>
                            <!-- </tbody> -->
                          

                        <!-- </div> -->
                      <!-- </div> -->

                 
               <?php
                  $key++;
                    endforeach;  
                  ?>     
               <?php else : ?> 
               <li colspan="3">
                  <strong>There is no record for display</strong>
               </li>
               <?php endif; ?>
            <!-- </div>
              xcccc-->

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

'email':{

email: true,

minlength: 10,

maxlength: 10
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

'company_name':{

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

            
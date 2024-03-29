<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <title>ConsultnHire | Job Listing Site</title>
   <meta name="description" content="">
   <meta name="author" content="">
   <meta name="keywords" content="">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/font-awesome.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/responsive.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/seeker_dashboard.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/profile_css.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/job_liosting_dashboard.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/oceanchamp.css">
   <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/oceantest.css">  -->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jc/css/jquery.Jcrop.css">
   <!-- Data Table  CSS -->
   <link href="<?php echo base_url(); ?>asset/css/plugins/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
   <!--Token-Input CSS-->
   <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>asset/styles/token-input-facebook.css" type="text/css" />
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
   <!-- Token field css -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/tokenfield-typeahead.css" type="text/css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>asset/tokenjs/css/bootstrap-tokenfield.css" type="text/css" />
   <!-- multiselect css -->
   <link href="<?php echo base_url(); ?>asset/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <style type="text/css">
      .box:-moz-placeholder {
      color: white;
      }
      .box::-webkit-input-placeholder {
      color: white;
      }
      .box::-moz-placeholder {
      color: white;
      }
      .stepwizard-step button[disabled] {
      background-color:#d8e8f9;
      }
      button#next {
      background-color: #18c5bd;
      border: none;
      padding: 10px 40px;
      font-weight: 700;
      margin-right: 13px;
      margin-top: -62px;
      }
      .bo-c_active{
      background-color: #0453af;
      color: #fff;
      box-shadow: inset 1px -1px 8px 0px #eae8e8;
      }    
   </style>
</head>
<div class="container-fluid header-image">
   <div class="profile-round">
      <img src="https://image.freepik.com/free-vector/woman-profile-cartoon_18591-58480.jpg" class="rounded-circle" alt="Cinque Terre" width="304" height="236"> 
      <div class="info">
         <p>Hellow </p>
         <span>welcome to OceanHunt</span>
      </div>
   </div>
</div>
<div class="container username">
   <p>supriya@123</p>
</div>
<div class="container">
   <div class="col-md-12">
      <div class="col-md-2"></div>
      <div class="col-md-10">
         <div class="stepwizard">
            <div class="stepwizard-row">
               <div class="stepwizard-step">
                  <button type="button" class="btn btn-primary btn-default btn-circle" >1</button>
                  <p>Cart</p>
               </div>
               <div class="stepwizard-step">
                  <button type="button" class="btn  btn-circle" disabled="disabled">2</button>
                  <p>Shipping</p>
               </div>
               <div class="stepwizard-step">
                  <button type="button" class="btn  btn-circle" disabled="disabled">3</button>
                  <p>Payment</p>
               </div>
               <div class="stepwizard-step">
                  <button type="button" class="btn btn-circle" disabled="disabled">3</button>
                  <p>Shipping</p>
               </div>
               <div class="stepwizard-step">
                  <button type="button" class="btn btn-circle" disabled="disabled">5</button>
                  <p>Shipping</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<form method="post" action="<?php echo base_url(); ?>exam/select_experience">
   <div class="container-fluid skills">
      <div class="container">
         <h5 style="font-size: medium;
            color: #828282;">Choose your programmig prefered languages</h5>
         <div class="row">
            <?php if(!empty($skill_data)) foreach ($skill_data as $svalue) { ?>
            <!-- <option value="<?php echo $svalue['id']; ?>"></option> -->
            <div class="col-md-2">
               <div class="bo-c" id="bo-c<?php echo $svalue['id']; ?>">
                  <span name="skill_names" id="skill_names"  value="<?php echo $svalue['id']; ?>" onclick="gettopic(<?php echo $svalue['id']; ?>);"><?php echo $svalue['skill_name']; ?></span>
               </div>
            </div>
            <?php  } ?>
            <div class="col-md-12 col-sm-12">
               <label class="control-label ">Topics<span class="required">*</span> </label>
               <div id="topic"></div>
            </div>
            <input type="hidden" id="skill_name" name="skill_name" value="">
            <button id="next" type="submit" class="btn btn-primary pull-right">NEXT</button>
         </div>
      </div>
   </div>
</form>
<script type="text/javascript">
   function gettopic(value)
   {
       // alert($(this).val());
       // alert(value);
       $('.bo-c_active').removeClass('bo-c_active');
        var v = document.getElementById("bo-c"+value); 
               v.className += " bo-c_active";
   
       $.ajax({
               url:'<?php echo base_url();?>exam/gettopic',
               type: "POST",
               data:{id:value},
               success: function(data)
               {
                 $('#topic').html(data);
                  $('#skill_name').val(value);
               }
           });//end ajax
   
   }
   
     //    $(document).delegate('#skill_name', 'click', function(event){
     //   event.stopPropagation();
     //   event.stopImmediatePropagation();
     //   alert($(this).val());
   
     //   var id = $(this).val();
     //     $.ajax({
     //           url:'<?php echo base_url();?>exam/gettopic',
     //           type: "POST",
     //           data:{id:id},
     //           success: function(data)
     //           {
     //             $('#topic').html(data);
     //           }
     //       });//end ajax
     // });
</script>
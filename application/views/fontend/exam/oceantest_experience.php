

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

     <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/oceantest.css"> -->
     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/oceanchamp.css">
     

 
  
    

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
.exp-box_active{
    box-shadow: -1px 1px 10px #bfbdbd;
}
     </style>
</head>
  <form action="<?php echo base_url(); ?>exam/oceanchamp_additional_exam" method="post">
<div class="container-fluid">
	<div class="container">
    	<div class="student-pro">
        <h6>Are you a student or professional ?</h6>
        <div class="m">
        <div class="student-b"><i class="fas fa-graduation-cap"></i><p>Student</p></div>
        <div class="professional-b"><i class="fas fa-user-graduate"></i>professional</div>
        </div>
        </div>
    </div>
</div>   
<div class="container-fluid" style="background-color:aliceblue;margin-top:60px;">
    <div class="container experience">
    <h5>How many experience do you have ?</h5>
   
  <?php $i=0;  foreach($all_topics as $key){  ?>
    <input type='hidden' name='topics[]' style='height:15px; width:20px;' id='topics' value="<?php echo $key[$i]; ?>" >
<?php $i++; } ?>
    <!-- <input type="text" name="topics[]" value="<?php echo $all_topics ?>"> -->
    <input type="hidden" name="skill_name" value="<?php echo $skill ?>">
    <input type="hidden" name="level" id="level" value="">
    
    <div class="col-md-12 row rexp">
    <div class="col-md-1 exp-box" id="1" onclick="getval('Beginner','1');"><span name="levels" id="levels"  value="Beginner">1</span></div>
    <div class="col-md-1 exp-box" id="2" onclick="getval('Beginner','2');"><span name="levels" id="levels"   value="Beginner">2</span></div>
    <div class="col-md-1 exp-box" id="3" onclick="getval('Medium','3');"><span name="levels" id="levels"  value="Medium">3</span></div>
    <div class="col-md-1 exp-box" id="4" onclick="getval('Medium','4');"><span name="levels" id="levels"  value="Medium">4</span></div>
    <div class="col-md-1 exp-box" id="5" onclick="getval('Medium','5');"><span name="levels" id="levels"  value="Medium">5</span></div>
    <div class="col-md-1 exp-box" id="6" onclick="getval('Expert','6');"><span name="levels" id="levels"  value="Expert">6</span></div>
    <div class="col-md-1 exp-box" id="7" onclick="getval('Expert','7');"><span name="levels" id="levels"  value="Expert">7</span></div>
    <div class="col-md-1 exp-box" id="8" onclick="getval('Expert','8');"><span name="levels" id="levels"  value="Expert">8</span></div>
    <div class="col-md-1 exp-box" id="9" onclick="getval('Expert','9');"><span name="levels" id="levels"  value="Expert">9</span></div>
    <div class="col-md-1 exp-box" id="10" onclick="getval('Expert','10');"><span name="levels"  id="levels"  value="Expert">10+</span></div>
    </div>
        <button type="submit" class="pro-btn">Proceed to dashboard</button>

    </div>
</div>
</form>
<script type="text/javascript">
function getval(value,id)
{
     $('.exp-box_active').removeClass('exp-box_active');
     var v = document.getElementById(id); 
        v.className += " exp-box_active";
    
               $('#level').val(value);
      

}

</script>
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
</style>
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-md-9 cv_bank">
            
              <div class="row">
             
               <div class="col-md-4">
                  
            
                     
                     <select class="form-control select2" id="job_select" onchange="tracker_card(this.value);">
                     <?php if (isset($company_active_jobs) && !empty($company_active_jobs)) {
                        foreach ($company_active_jobs as $row) { ?>
                          <option value="<?php echo $row->job_post_id; ?>"><?php echo $row->job_title; ?></option>
                     <?php   }
                     } ?>
                     </select>
                       
                 

                
                  <div class="clear"></div>
               </div>
               <div class="col-md-3">
                  <form method="post" action="<?php echo base_url(); ?>employer/corporate_cv_bank">
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
                    <a style="float: right;" href="<?php echo base_url() ?>employer/add-new-cv"><button class="btn btn-primary"><i class="fas fa-plus"></i> Add New Candidate</button></a>
                     
                  </label>
               </div>
            </div>
           
            
         


            <div class="box" >
               
            </div>
         </div>
         
      </div>
   </div>
</div>

<script>
   $('.select2').select2();
</script>
<script>
   $( document ).ready(function() {
     var job_id = $('#job_select').val();
     tracker_card(job_id);


});
</script>
<script>
   
function check()
{
   alert('check');
   var currentTD = $(this).parents('tr').find('td');
              alert(currentTD);
}

          $('.editbtn').click(function() {
            alert('gg');
              var currentTD = $(this).parents('tr').find('td');
              alert(currentTD);
              if ($(this).html() == 'Edit') {
                  currentTD = $(this).parents('tr').find('td');
                  $.each(currentTD, function () {
                      $(this).prop('contenteditable', true)
                  });
              } else {
                 $.each(currentTD, function () {
                      $(this).prop('contenteditable', false)
                  });
              }
    
              $(this).html($(this).html() == 'Edit' ? 'Save' : 'Edit')
    
          });
    
  
    function tracker_card(job_id)
  {
     
      // var job_id = $('#job_select').val();
    
    $.ajax({
              url: "<?php echo base_url();?>employer/get_tracker_card",
              type: "POST",
              data: {job_id:job_id},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('.box').html(data);
              }
        });
       
  }
</script>

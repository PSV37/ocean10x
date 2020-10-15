<!---header-->
<?php  $this->load->view('fontend/layout/employer_new_header.php'); ?>
<!---header--->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">
<style>
   .employ_tab {
   margin-top: 55px;
   border: solid 1px #cecbcb;
   padding: 20px;
   border-radius: 13px;   
   }
   @media (min-width: 768px){
   .nav-justified>li {
   display: inline-block;
   width: 225px;
   height: 30px;
   margin-right:30px;
   }
   }
   .nav>li>a:focus, .nav>li>a:hover {
   text-decoration: none;
   background-color:#fff;
   border: solid 2px #a5a5a5;
   color: #949494;
   }
   .nav li a {
   color: #949494;
   background-color: #fff;
   border: solid 2px #a5a5a5;
   border-radius: 30px;
   padding: 4px 10px;
   font-weight: 700;
   }
   .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
   color:  #18c5bd;
   background-color:#fff;
   border: solid 2px #18c5bd;
   font-weight: 700;
   }
   .tab-content {
   margin-top: 45px;
   }
   .panel-body {
   padding: 4px;
   }
   input[type="text"] {
   border: solid 1px #dcdede;
   border-radius: 0px 22px 22px 0px;
   padding: 4px 12px;
   margin-bottom: 25px;
   }
    .open
   {
      background-color: #18c5bd;
    color: #fff;
    box-shadow: 5px 5px #ede2e2;
   }
</style>
<body>
   <div class="container-fluid main-d">
      <div class="container">
         <div class="col-md-12">
            <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            <div class="col-md-9" style="margin-top:75px;">
               <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                  <li class="active"><a href="#Commentary" data-toggle="tab">OceanChamp Test</a></li>
                  <li><a href="#Videos" data-toggle="tab">OceanChamp History !</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="Commentary">
                     <div class="row note">
                        <span>No Tests Have Been Given By You !</span>
                     </div>
                     <form method="post" action="<?php echo base_url(); ?>employer/ocean_test_instructions">
                       

                     <div class="subjects">
                        <h5 style="color:#159993;">Become an OceanChamp !</h5>
                        <h4 style="margin-bottom:20px;">Select the Skillset You Want To Become a Champ !</h4>
                     <form action="/action_page.php">
                     <button class="sort-serach" type="submit"><i class="fas fa-search"></i></button>
                     <input type="text" placeholder="Search.." name="search">
                     </form>
                     <div class="row">
                     <?php if(!empty($oceanchamp_tests)) foreach ($oceanchamp_tests as $svalue) { ?>
                     <div class="col-md-2" onclick="get_value('<?php echo $svalue['test_id']; ?>')">
                     <div class="box box-active" id="toggle">
                     <span name="name" id="name"   value="<?php echo $svalue['test_id']; ?>"><?php echo $svalue['test_name']; ?></span>
                     

                     </div>
                     </div>
                     <?php  } ?>
                     <input type="hidden" name="test_name" id="test_name" value="">
                     </div>
                     <div class="row col-md-12">
                     <span class="show_more">Show more..</span>
                     </div>
                     
                     <div class="row" style="text-align:center;">
                     <button class="take_test" type="submit" >Take a test</button>
                     </div>
                     </div>
                     
                     </form></div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="Videos">
                     <div class="table-responsive">
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="Events">
                     <div class="table-responsive">
                     </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="music">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script type="text/javascript">
      function gettopic(value)
      {
         
          $.ajax({
                  url:'<?php echo base_url();?>employer/gettopics',
                  type: "POST",
                  data:{id:value},
                  success: function(data)
                  {
                    // alert(data);
                     $('#topic').html(data);
                     $('#skill_name').val(value);
                  }
              });//end ajax
      
      }
       $('.box').on('click', function () {
         $(".box").removeClass( "open" )
        $(this).addClass('open');
         // $('#test_type').val($t);
    });
      
        function get_value(value)
      {
         
          $('#test_name').val(value);
            
      
      }
   </script>
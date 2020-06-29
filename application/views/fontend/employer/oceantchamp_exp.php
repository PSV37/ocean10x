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
                     <form method="post" action="<?php echo base_url(); ?>employer/ocean_champ_test">
                        <input type="hidden" id="skill_name" name="skill_name" value="">
                        <input type="hidden" name="level" id="level" value="">
                        <div class="row">
                           <div class="tabbable-line">
                              <ul class="nav nav-tabs ">
                                 <li class="active">
                                    <a href="#tab_default_1" data-toggle="tab">
                                    Freshers </a>
                                 </li>
                                 <li>
                                    <a href="#tab_default_2" data-toggle="tab">
                                    Profetional</a>
                                 </li>
                              </ul>
                              <div class="tab-content">
                                 <div class="tab-pane active" id="tab_default_1">
                                    <h6 style="text-align: center;color: #18c5bd;font-size: 15px;font-weight: 700;margin-bottom:20px;"></h6>
                                    <div class="col-md-12 row rexp" style="padding-left:465px;">
                                       <div class="col-md-1 exp-box exp-box-active">0</div>
                                    </div>
                                 </div>
                                 <div class="tab-pane" id="tab_default_2">
                                    <h6 style="text-align: center;color: #18c5bd;font-size: 15px;font-weight: 700;margin-bottom:20px;">Select Experience</h6>
                                    <div class="col-md-12 row rexp">
                                       <div class="col-md-1 exp-box exp-box-active"id="1" onclick="getval('Beginner','1');"><span name="levels" id="levels"  value="Beginner">1</span></div>
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
                                 </div>
                              </div>
                           </div>
                           <div class="subjects">
                              <h5 style="color:#159993;">Become an OceanChamp !</h5>
                              <h4 style="margin-bottom:20px;">Select the Skillset You Want To Become a Champ !</h4>
                     <form action="/action_page.php">
                     <button class="sort-serach" type="submit"><i class="fas fa-search"></i></button>
                     <input type="text" placeholder="Search.." name="search">
                     </form>
                     <div class="row">
                     <?php if(!empty($skill_data)) foreach ($skill_data as $svalue) { ?>
                     <div class="col-md-2 ">
                     <div class="box box-active">
                     <span name="skill_names" id="skill_names"  value="<?php echo $svalue['id']; ?>" onclick="gettopic(<?php echo $svalue['id']; ?>);"><?php echo $svalue['skill_name']; ?></span>
                     </div>
                     </div>
                     <?php  } ?>
                     </div>
                     <div class="row col-md-12">
                     <span class="show_more">Show more..</span>
                     </div>
                     <div class="col-md-12 col-sm-12">
                     <label class="control-label ">Topics<span class="required">*</span> </label>
                     <div id="topic"></div>
                     </div>
                     <div class="row" style="text-align:center;">
                     <button class="take_test" type="submit" >Take a test</button>
                     </div>
                     </div>
                     </div>
                     </form>
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
      
        function getval(value,id)
      {
          
          $('#level').val(value);
            
      
      }
   </script>
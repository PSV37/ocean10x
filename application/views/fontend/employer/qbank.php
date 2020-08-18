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
            <div class="col-md-6" style="margin-top:75px;">
               <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                  <li class="active"><a href="#Commentary" data-toggle="tab">Corporate QuestionBank</a></li>
                  <li><a href="#Videos" data-toggle="tab">Ocean QuestionBank !</a></li>
               </ul>
               <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="Commentary">
                     <div class="row">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-secondary active">
                            <a href="#Videos"><input type="radio" name="options" id="option1" autocomplete="off" ></a>I want to choose My Own Questions in the Test !
                          </label>
                          <label class="btn btn-secondary">
                            <input type="radio" name="options" id="option2" autocomplete="off"> Ocean can help me create the Test !
                          </label>
                          
                        </div>
                     </div>
                    
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
            <div class="col-md-3 ">
   <div class="last_section">
      <div class="pai_chart">
         <main>
            <section>
               <div class="pieID pie">
               </div>
               <ul class="pieID legend">
                  <li>
                     <em>Total Job Posts</em>
                     <span><?php echo sizeof($company_active_jobs); ?></span>
                     <!--<span>718</span> -->
                  </li>    
                  <li>
                     <em> Total Job Forwarded</em>
                     <span id='total_forwarded'> </span>
                  </li>
                  <li>
                     <em>Total Job Applied</em>
                     <span id='total_applied'> </span>
                  </li>
                  <li>
                     <em>Total attempted test</em>
                     <span id='total_test'> </span>
                  </li>
                  <li>
                     <em>Total Candidates passed </em>
                     <span id='total_passed'></span>
                  </li>
                  <li>
                     <em>Total Candidates interview and passed</em>
                     <span id='total_test_int_pass'></span>
                  </li>
                  <li>
                     <em>Total Candidates interview and failed</em>
                     <span id='total_test_int_fail'></span>
                  </li>     
                  <li>
                     <em>Total Candidates Accepted Offer</em>
                     <span id='total_offer_accept'></span>
                  </li>

               </ul>
            </section>
         </main>
      </div>
      <div class="filter1">
         <div class="panel ">
            <div class="panel-heading">
               <h3 class="panel-title">Location</h3>
               <div class="pull-right">
                  <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
               </div>
            </div>
            <div class="panel-body">
               <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter location" />
               <div class="location_fil">
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="filter1">
         <div class="panel ">
            <div class="panel-heading">
               <h3 class="panel-title">Education</h3>
               <div class="pull-right">
                  <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
               </div>
            </div>
            <div class="panel-body">
               <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
               <div class="location_fil">
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="filter1">
         <div class="panel ">
            <div class="panel-heading">
               <h3 class="panel-title">Mandatory</h3>
               <div class="pull-right">
                  <span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
               </div>
            </div>
            <div class="panel-body">
               <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
               <div class="location_fil">
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>css</strong>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="experience">
         <form class="exp_level">
            <label for="range1">Experience</label>
            <input id="range1" type="range" name="range1" min="1" max="10" step="0.1" value="5">
            <label for="range3">Availability</label>
            <input id="range3" type="range" name="range3" min="0" max="100" step="1" value="50">
         </form>
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
           $('.exp-box-active').removeClass('exp-box-active');
           var v = document.getElementById(id); 
         v.className += " exp-box-active";
          $('#level').val(value);
            
      
      }
   </script>
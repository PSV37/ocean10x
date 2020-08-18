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
   @keyframes bake-pie {
   from {
   transform: rotate(0deg) translate3d(0,0,0);
   }
   }
   main {
   margin: 30px auto;
   }
   .pieID {
   display: inline-block;
   vertical-align: top;
   }
   .pie {
   height: 200px;
   width: 200px;
   position: relative;
   margin:0 30px 30px -23px;
   }
   .pie::before {
   content: "";
   display: block;
   position: absolute;
   z-index: 1;
   width: 100px;
   height: 100px;
   background: #fff;
   border-radius: 50%;
   top: 50px;
   left: 50px;
   }
   .pie::after {
   content: "";
   display: block;
   width: 120px;
   height: 2px;
   background: rgba(0,0,0,0.1);
   border-radius: 50%;
   box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
   margin: 220px auto;
   }
   section {
   padding: 0px 45px 25px;
   }
   .slice {
   position: absolute;
   width: 200px;
   height: 200px;
   clip: rect(0px, 200px, 200px, 100px);
   animation: bake-pie 1s;
   }
   .slice span {
   display: block;
   position: absolute;
   top: 0;
   left: 0;
   background-color: black;
   width: 200px;
   height: 200px;
   border-radius: 50%;
   clip: rect(0px, 200px, 200px, 100px);
   }
   .legend {
   margin-left:20px !important;
   margin-top: 20px;
   list-style-type: none;
   padding: 0;
   margin: 0;
   background: #FFF;
   padding: 15px;
   font-size: 13px;
   box-shadow: 1px 1px 0 #DDD,
   2px 2px 0 #BBB;
   }
   .last_section{border:solid 1px #e8e4e4;margin-top: 77px;padding:0px 10px;}
   .panel-title {
   font-size: 13px;
   color: #18c5bd;
   }
   .panel{background-color:#fbfbfb;}
   i.glyphicon.glyphicon-filter {
   color: #18c5bd;
   }
   .legend li {
   width: 110px;
   height: 1.25em;
   margin-bottom: 0.7em;
   padding-left: 0.5em;
   border-left: 1.25em solid black;
   }
   .legend em {
   font-style: normal;
   }
   .legend span {
   float: right;
   }
   footer {
   position: fixed;
   bottom: 0;
   right: 0;
   font-size: 13px;
   background: #DDD;
   padding: 5px 10px;
   margin: 5px;
   }
   .fade-rotate {
   transform: rotate(180deg);
   opacity: 0;
   -webkit-transition: all .25s linear;
   -o-transition: all .25s linear;
   transition: all .25s linear;
   }
   .fade-rotate.in {
   opacity: 1;
   transform: rotate(0deg);
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
   .exp_level input {
   color: var(--fg);
   font: 1em/1.5 Muli, sans-serif;
   }
   .range__ticks {
   display: flex;
   }
   .exp_level {
   margin: auto;
   max-width:20em;
   padding: 0 -0.5em;
   width: 100%;
   }
   .exp_level label {
   display: block;
   font-weight: bold;
   }
   .exp_level input[type=range], label {
   -webkit-tap-highlight-color: transparent;
   }
   .exp_level input[type=range], .range {
   border-radius: 0.75em;
   overflow: hidden;
   margin-bottom: 1.5em;
   }
   .range input{margin:0px;}
   .exp_level input[type=range] {
   background-color: #d4efec;
   box-shadow:
   0.3em 0.3em 0.4em var(--bs2) inset,
   -0.3em -0.3em 0.4em var(--bs1) inset;
   display: block;
   padding: 0 0.1em;
   width: 100%;
   height: 1.5em;
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
   }
   .exp_level input[type=range]:focus {
   outline: transparent;
   }
   .exp_level input[type=range]::-webkit-slider-thumb {
   background-color: #255ff4;
   border: 0;
   border-radius: 50%;
   box-shadow:
   -0.3em -0.3em 0.5em #0937aa inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   cursor: pointer;
   position: relative;
   width: 1.3em;
   height: 1.3em;
   transition: all var(--transDur) linear;
   z-index: 1;
   -webkit-appearance: none;
   appearance: none;
   }
   .exp_level input[type=range]:focus::-webkit-slider-thumb {
   background-color: #5583f6;
   box-shadow:
   -0.3em -0.3em 0.5em #0b46da inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   }
   .exp_level input[type=range]::-moz-range-thumb {
   background-color: #255ff4;
   border: 0;
   border-radius: 50%;
   box-shadow:
   -0.3em -0.3em 0.5em #0937aa inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   cursor: pointer;
   position: relative;
   width: 1.3em;
   height: 1.3em;
   transform: translateZ(1px);
   transition: all var(--transDur) linear;
   z-index: 1;
   -moz-appearance: none;
   appearance: none;
   }
   .exp_level input[type=range]:focus::-moz-range-thumb {
   background-color: #5583f6;
   box-shadow:
   -0.3em -0.3em 0.5em #0b46da inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   }
   .exp_level input[type=range]::-moz-focus-outer {
   border: 0;
   }
   .range {
   position: relative;
   height: 1.5em;
   }
   .range__ticks {
   justify-content: space-between;
   align-items: center;
   pointer-events: none;
   position: absolute;
   top: 0;
   left: 0.75em;
   width: calc(100% - 1.5em);
   height: 100%;
   }
   .range__tick, .range__tick-text {
   display: inline-block;
   }
   .range__tick {
   color: var(--tick);
   font-size:9px;
   text-align: center;
   width: 0;
   -webkit-user-select: none;
   -moz-user-select: none;
   user-select: none;
   }
   .range__tick-text {
   transform: translateX(-50%);
   }
   /* Dark mode */
   @media (prefers-color-scheme: dark) {
   :root {
   --bg: #2e3138;
   --fg: #e3e4e8;
   --bs1: #3c4049;
   --bs2: #202227;
   --tick: #c7cad1;
   }
   }
   @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
   @keyframes bake-pie {
   from {
   transform: rotate(0deg) translate3d(0,0,0);
   }
   }
   main {
   margin: 30px auto;
   }
   .pieID {
   display: inline-block;
   vertical-align: top;
   }
   .pie {
   height: 200px;
   width: 200px;
   position: relative;
   margin:0 30px 30px -23px;
   }
   .pie::before {
   content: "";
   display: block;
   position: absolute;
   z-index: 1;
   width: 100px;
   height: 100px;
   background: #fff;
   border-radius: 50%;
   top: 50px;
   left: 50px;
   }
   .pie::after {
   content: "";
   display: block;
   width: 120px;
   height: 2px;
   background: rgba(0,0,0,0.1);
   border-radius: 50%;
   box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
   margin: 220px auto;
   }
   section {
   padding: 0px 45px 25px;
   }
   .slice {
   position: absolute;
   width: 200px;
   height: 200px;
   clip: rect(0px, 200px, 200px, 100px);
   animation: bake-pie 1s;
   }
   .slice span {
   display: block;
   position: absolute;
   top: 0;
   left: 0;
   background-color: black;
   width: 200px;
   height: 200px;
   border-radius: 50%;
   clip: rect(0px, 200px, 200px, 100px);
   }
   .legend {
   margin-left:8px !important;
   list-style-type: none;
   padding: 0;
   margin: 0;
   background: #FFF;
   padding: 15px;
   font-size: 13px;
   box-shadow: 1px 1px 0 #DDD,
   2px 2px 0 #BBB;
   }
   .last_section{border:solid 1px #e8e4e4;margin-top: 77px;padding:0px 10px;}
   .panel-title {
   font-size: 13px;
   color: #18c5bd;
   }
   .panel{background-color:#fbfbfb;}
   i.glyphicon.glyphicon-filter {
   color: #18c5bd;
   }
   .legend li {
   width: 110px;
   height: 1.25em;
   margin-bottom: 0.7em;
   padding-left: 0.5em;
   border-left: 1.25em solid black;
   }
   .legend em {
   font-style: normal;
   }
   .legend span {
   float: right;
   }
   footer {
   position: fixed;
   bottom: 0;
   right: 0;
   font-size: 13px;
   background: #DDD;
   padding: 5px 10px;
   margin: 5px;
   }
   .fade-rotate {
   transform: rotate(180deg);
   opacity: 0;
   -webkit-transition: all .25s linear;
   -o-transition: all .25s linear;
   transition: all .25s linear;
   }
   .fade-rotate.in {
   opacity: 1;
   transform: rotate(0deg);
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
   .exp_level input {
   color: var(--fg);
   font: 1em/1.5 Muli, sans-serif;
   }
   .range__ticks {
   display: flex;
   }
   .exp_level {
   margin: auto;
   max-width:20em;
   padding: 0 -0.5em;
   width: 100%;
   }
   .exp_level label {
   display: block;
   font-weight: bold;
   }
   .exp_level input[type=range], label {
   -webkit-tap-highlight-color: transparent;
   }
   .exp_level input[type=range], .range {
   border-radius: 0.75em;
   overflow: hidden;
   margin-bottom: 1.5em;
   }
   .range input{margin:0px;}
   .exp_level input[type=range] {
   background-color: #d4efec;
   box-shadow:
   0.3em 0.3em 0.4em var(--bs2) inset,
   -0.3em -0.3em 0.4em var(--bs1) inset;
   display: block;
   padding: 0 0.1em;
   width: 100%;
   height: 1.5em;
   -webkit-appearance: none;
   -moz-appearance: none;
   appearance: none;
   }
   .exp_level input[type=range]:focus {
   outline: transparent;
   }
   .exp_level input[type=range]::-webkit-slider-thumb {
   background-color: #255ff4;
   border: 0;
   border-radius: 50%;
   box-shadow:
   -0.3em -0.3em 0.5em #0937aa inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   cursor: pointer;
   position: relative;
   width: 1.3em;
   height: 1.3em;
   transition: all var(--transDur) linear;
   z-index: 1;
   -webkit-appearance: none;
   appearance: none;
   }
   .exp_level input[type=range]:focus::-webkit-slider-thumb {
   background-color: #5583f6;
   box-shadow:
   -0.3em -0.3em 0.5em #0b46da inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   }
   .exp_level input[type=range]::-moz-range-thumb {
   background-color: #255ff4;
   border: 0;
   border-radius: 50%;
   box-shadow:
   -0.3em -0.3em 0.5em #0937aa inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   cursor: pointer;
   position: relative;
   width: 1.3em;
   height: 1.3em;
   transform: translateZ(1px);
   transition: all var(--transDur) linear;
   z-index: 1;
   -moz-appearance: none;
   appearance: none;
   }
   .exp_level input[type=range]:focus::-moz-range-thumb {
   background-color: #5583f6;
   box-shadow:
   -0.3em -0.3em 0.5em #0b46da inset,
   0 -0.2em 0.2em 0 #0004,
   0.3em 0.9em 0.8em #0007;
   }
   .exp_level input[type=range]::-moz-focus-outer {
   border: 0;
   }
   .range {
   position: relative;
   height: 1.5em;
   }
   .range__ticks {
   justify-content: space-between;
   align-items: center;
   pointer-events: none;
   position: absolute;
   top: 0;
   left: 0.75em;
   width: calc(100% - 1.5em);
   height: 100%;
   }
   .range__tick, .range__tick-text {
   display: inline-block;
   }
   .range__tick {
   color: var(--tick);
   font-size:9px;
   text-align: center;
   width: 0;
   -webkit-user-select: none;
   -moz-user-select: none;
   user-select: none;
   }
   .range__tick-text {
   transform: translateX(-50%);
   }
   /* Dark mode */
   @media (prefers-color-scheme: dark) {
   :root {
   --bg: #2e3138;
   --fg: #e3e4e8;
   --bs1: #3c4049;
   --bs2: #202227;
   --tick: #c7cad1;
   }
   }
   .modal-footer {
    background: none;
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
                        <div class="box" >
               <?php $key = 1; if (!empty($oceanchamp_tests)): foreach ($oceanchamp_tests as $tests) : 
                  $on_ocean = $tests['ocean_candidate'];
                        if($on_ocean == 'Yes')
                        {
                           $resume = getUploadedResume($tests['js_email']);
                           $photo = getSeekerPhoto($tests['js_email']);
                           $updates = getSeekerlastUpdates($tests['js_email']);
                           if (!empty($updates)) {
                             if($updates[0]['update_at']=='0000-00-00 00:00:00') { 
                               $mtime = date('d-M-y',strtotime($updates[0]['create_at']));
                             } else{
                               $mtime = date('d-M-y',strtotime($updates[0]['update_at']));
                             }
                           }else{
                             $mtime = date('d-M-y',strtotime($tests['created_on']));
                           }
                        }else{
                         $mtime = date('d-M-y',strtotime($tests['created_on']));
                        }
                       
                       ?>
               <label>
                  <div class="check">
                    
                    <!--  <input type="checkbox" value="<?php echo $cv_row['js_email']; ?>" data-valuetwo="<?php echo $cv_row['cv_id'];  ?>" data-valueone="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo $cv_row['js_resume']; } ?>" class="chkbx" /> -->
                  </div> 
                  <div class="card content">
                     <div class="front">
                        <?php
                           if($on_ocean == 'Yes')
                             {
                           if(!empty($photo)){ ?>
                        <img src="<?php echo  base_url(); ?>upload/<?php if(!empty($photo[0]['photo_path'])){echo $photo[0]['photo_path'];} ?>" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php }else{ ?>
                        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                       <?php } }else{ ?>
                        <img src="<?php echo base_url() ?>fontend/images/no-image.jpg" style="height:25px; width:25px;border-radius:5px;float:left" />
                        <?php } ?>
                        <div class="job-info">
                           <div class="a">
                              <li class="right-title" style="font-size:19px;margin-top:-4px;"  ><?php echo $tests['test_name']; ?></li>
                           </div>
                        </div>
                        <div class="following-info">
                           <li class="left-title"
                              >Type</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['type']; ?></li>
                           <li class="left-title">Total Questions</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['total_questions']; ?></li>
                          
                           <li class="left-title">Timer on Each Question</li>
                           <li class="right-title">&nbsp;: <?php echo $tests['timer_on_each_que']; ?></li>
                           <li class="left-title">Display Correct Answer</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['correct_ans_each_ques']; ?></li>
                            

                           <div class="clear"></div>
                        </div>
                        <div class="following-info2">
                           <li class="left-title">Level</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['level']; ?></li>
                           <li class="left-title">Total Duration</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['test_duration']; ?></li>
                           
                           <li class="left-title">Allowed to Go back</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['previous_option']; ?></li>

                           <li class="left-title">Display Result </li>
                           <li class="right-title">&nbsp;:<?php echo $tests['final_result']; ?></li>

                        


                           <div class="clear"></div>
                        </div>

                        <div class="following-info3">
                          <li class="left-title">Topics</li>
                           <li class="right-title">&nbsp;: <?php echo $tests['topics']; ?></li>
                          <li class="left-title">Allowed to Review</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['review_option']; ?></li>
                            <li class="left-title">Negative Marking</li>
                           <li class="right-title">&nbsp;:<?php echo $tests['negative_marks']; ?></li>
                            

                        


                           <div class="clear"></div>
                        </div>
                        <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:47px;">
                           <li ><a class="dropdown-item" href="#" id="div_frwrd" data-toggle="modal" data-target="#rotateModal<?php echo $tests['test_id'] ?>" >Forward This Test</a></li>
                      
                           <li> <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#edit_test<?php echo $tests['test_id'] ?>" >Edit Test</a></li>
                           
                            <!--  <li><a class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-target="#move_cv" href="#">Move this CV</a></li> -->
                        </div>
                     </div>
                  </div>
               </label>
               <?php
                  $key++;
                    endforeach;  
                  ?>     
               <?php else : ?> 
               <li colspan="3">
                  <strong> No Tests Created. Click on "Create A Test" !</strong>
               </li>
               <?php endif; ?>
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
   <script>
   function sliceSize(dataNum, dataTotal) {
     return (dataNum / dataTotal) * 360;
   }
   function addSlice(sliceSize, pieElement, offset, sliceID, color) {
     $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
     var offset = offset - 1;
     var sizeRotation = -179 + sliceSize;
     $("."+sliceID).css({
       "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
     });
     $("."+sliceID+" span").css({
       "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
       "background-color": color
     });
   }
   function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
     var sliceID = "s"+dataCount+"-"+sliceCount;
     var maxSize = 179;
     if(sliceSize<=maxSize) {
       addSlice(sliceSize, pieElement, offset, sliceID, color);
     } else {
       addSlice(maxSize, pieElement, offset, sliceID, color);
       iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
     }
   }
   function createPie(dataElement, pieElement) {
     var listData = [];
     $(dataElement+" span").each(function() {
       listData.push(Number($(this).html()));
     });
     var listTotal = 0;
     for(var i=0; i<listData.length; i++) {
       listTotal += listData[i];
     }
     var offset = 0;
     var color = [
       "cornflowerblue", 
       "olivedrab", 
       "orange", 
       "tomato", 
       "crimson", 
       "purple", 
       "turquoise", 
       "forestgreen", 
       "navy", 
       "gray"
     ];
     for(var i=0; i<listData.length; i++) {
       var size = sliceSize(listData[i], listTotal);
       iterateSlices(size, pieElement, offset, i, 0, color[i]);
       $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
       offset += size;
     }
   }
   createPie(".pieID.legend", ".pieID.pie");
   
</script>
<script>
   /**
   *   I don't recommend using this plugin on large tables, I just wrote it to make the demo useable. It will work fine for smaller tables 
   *   but will likely encounter performance issues on larger tables.
   *
   *   <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />
   *   $(input-element).filterTable()
   *   
   * The important attributes are 'data-action="filter"' and 'data-filters="#table-selector"'
   */
   (function(){
     'use strict';
   var $ = jQuery;
   $.fn.extend({
     filterTable: function(){
       return this.each(function(){
         $(this).on('keyup', function(e){
           $('.filterTable_no_results').remove();
           var $this = $(this), 
                         search = $this.val().toLowerCase(), 
                         target = $this.attr('data-filters'), 
                         $target = $(target), 
                         $rows = $target.find('tbody tr');
                         
           if(search == '') {
             $rows.show(); 
           } else {
             $rows.each(function(){
               var $this = $(this);
               $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
             })
             if($target.find('tbody tr:visible').size() === 0) {
               var col_count = $target.find('tr').first().find('td').size();
               var no_results = $('<tr class="filterTable_no_results"><td colspan="'+col_count+'">No results found</td></tr>')
               $target.find('tbody').append(no_results);
             }
           }
         });
       });
     }
   });
   $('[data-action="filter"]').filterTable();
   })(jQuery);
   
   $(function(){
     // attach table filter plugin to inputs
   $('[data-action="filter"]').filterTable();
   
   $('.container').on('click', '.panel-heading span.filter', function(e){
     var $this = $(this), 
       $panel = $this.parents('.panel');
     
     $panel.find('.panel-body').slideToggle();
     if($this.css('display') != 'none') {
       $panel.find('.panel-body input').focus();
     }
   });
   $('[data-toggle="tooltip"]').tooltip();
   })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script>
   // Basic Slider
   var slider = new Slider("#basic", {
     tooltip: 'always'
   });
   
   // Vertical Slider
   var slider = new Slider("#vertical", {
     orientation: 'vertical',
     tooltip: 'always'
   });
   
   // Range Slider
   var slider = new Slider("#range", {
     min: 0,
     max: 100,
     value: [50, 80],
     range: true,
     tooltip: 'always'
   });
</script> 
<script>
   window.addEventListener("DOMContentLoaded",() => {
     let range1 = new NeumorphicRange({
         element: "#range1",
         tick: 1
       }),
       
       range3 = new NeumorphicRange({
         element:"#range3",
         tick: 10
       });
   });
   
   class NeumorphicRange {
     constructor(args) {
       this.el = document.querySelector(args.element);
       this.min = +this.el.min || 0;
       this.max = +this.el.max || 100;
       this.step = +this.el.step || 1;
       this.tick = args.tick || this.step;
       this.addTicks();
     }
     addTicks() {
       // div to contain everything
       let wrap = document.createElement("div");
       wrap.className = "range";
       this.el.parentElement.insertBefore(wrap,this.el);
       wrap.appendChild(this.el);
   
       // div to contain the ticks
       let ticks = document.createElement("div");
       ticks.className = "range__ticks";
       wrap.appendChild(ticks);
   
       // draw the ticks
       for (let t = this.min; t <= this.max; t += this.tick) {
         // zero-width span to allow proper space between each tick
         let tick = document.createElement("span");
         tick.className = "range__tick";
         ticks.appendChild(tick);
   
         let tickText = document.createElement("span");
         tickText.className = "range__tick-text";
         tick.appendChild(tickText);
         tickText.textContent = t;
       }
     }
   }
</script>
<script>
  function  get_report_data(id)
  {
       
            if($('#posted_job').is(":checked")){
                console.log("Checkbox is checked.");

                $.ajax({
                 url:"<?php echo base_url();?>Employer/job_post_report",
                 data: {id:id},
                 type: 'post',
                 success: function(response){
                   var getarray = jQuery.parseJSON(response);
                   console.log(getarray.Total_count_forwarded);
                   var total_count = getarray.Total_count_forwarded;

                   console.log(getarray.Total_count_applied);
                   var total_count_applied = getarray.Total_count_applied;

                   console.log(getarray.Total_count_test_given);
                   var total_given_test = getarray.Total_count_test_given;

                   var total_test_passed = getarray.Total_count_test_passed;
                   var total_test_interview_passed = getarray.Total_count_inteviewed_passed;
                   var total_test_interview_failed = getarray.Total_count_inteviewed_failed;

                   var total_offer_accepted = getarray.Total_offer_accepted;

                   $('#total_forwarded').html(total_count.length);
                   $('#total_applied').html(total_count_applied.length);
                   $('#total_test').html(total_given_test.length);

                   $('#total_passed').html(total_test_passed.length);
                   $('#total_test_int_pass').html(total_test_interview_passed.length);
                   $('#total_test_int_fail').html(total_test_interview_failed.length);

                   $('#total_offer_accept').html(total_offer_accepted.length);

                 }
               });
            }


            
        }


   


</script>
<?php 
   $company_profile_id = $this->session->userdata('company_profile_id');
   
    $this->load->view('fontend/layout/employer_new_header.php');
    
   ?>
<!---header--->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">
<style>    
   .border-top1{
   height: 3px;
   background-color: #16b7b0 !important;
   border-radius: 13px 13px 0px 0px !important;
   margin-bottom: 10px;
   }
   .pasive-span{
   position: absolute;
   top: 0px;
   left: 421px;
   background-color: red;
   padding: 1px 17px;
   border-radius: 9px;    
   color: #fff;
   font-size: 11px;
   }       
   .front .dropdown {   
   top: 0px;   
   width: 63px;
   position: absolute;
   right:3px;
   }
   .front{height:263px;padding:0px 10px 10px 10px;}
   :checked + span {
   background: #18c5bd !important;
   display: inline-block;
   width: 100%;
   color: #fff;    
   padding: 4px 15px;
   border-radius: 30px;
   cursor:pointer;
   }
  button#sklbtn {
    background-color: #18c5bd;
    color: #fdfdfd;
    border-radius: 20px;
    border: none;
    padding: 1px 10px;
    margin-bottom: 7px;
    font-size: 11px;
}
   .btn-default1:not(:checked) + span {
   padding: 4px 15px;
   border-radius: 30px;
   background: #e4e2e2;
   /* padding: 8px 0; */
   width: 100%;
   border-radius: 10px;
   cursor: pointer;
   }    
   .card{height:auto;display: flow-root;padding:0px !important;
   border:none !important;}    
   .btn_all {
   color: #539617;
   background-color: #fff;
   height: 35px;
   width: 70px;
   border: solid 1px;
   border-radius: 50px;
   }
   .active-job {
   margin-top:40px;
   }
   .btn_all:hover {
   color: #fff;
   background-color: #a6e026;
   border-color: #87cf56;
   }
   .all_dropdown{float:left;margin-right:20px;}
   .btn_sort{
   color: #319fda;
   background-color: #fff;
   height: 35px;
   width: 70px;
   border: solid 1px;
   border-radius: 50px;
   }
   .btn_sort:hover{
   color: #fff;
   background-color: #44afe1;
   border-color: #168bd8;}  
   .hide_btn{margin-top:20px;}
   #myDIV {
   width: 100%;
   background-color:#eef7fa;
   margin-top: 20px;
   }
   .horizontal_box {
   width: 7%;
   background-color: #a9e224;
   height: 140px;
   padding: 0px;
   }
   .try_bt{
   height: 30px;
   width: 70px;
   border: none;
   background-color: #a3df2d;
   color: #fff;
   }
   .horizontal_box{position:relative;
   width: 3%;
   background-color: #a9e224;
   height: 270px;
   padding: 0px;
   margin-left: 15px;}  
   .p-i {
   position: absolute;
   top: 19px;
   right: -24px;
   background-color: #fff;
   height: 50px;
   width: 50px;
   line-height: 50px;
   border-radius: 35px;
   border: solid 2px #73b102;
   text-align:center;
   }
   .details-box {
   padding: 30px 0px;
   }
   .head-box strong{line-height:3;}
   .head-box-a strong{line-height:3;
   font-weight: 400;}
   .bg-lb:hover .p-i{color:#fff;
   background-color:#62a910;}
   button.apply-cv-btn {
   padding: 8px 20px;
   border-radius: 40px;
   border: solid 2px #F44336;
   background-color: #fff;
   color: #000;
   }  
   button.apply-cv-btn:hover{background-color:#F44336;
   /*new*/
   color:#fff;}
   .all_b {
   float: left;
   margin-right: 30px;
   background-color: #fff;
   padding: 3px 32px;
   border-radius: 20px;
   border: solid 1px #a7e126;
   }
   .sort_b {
   background-color: #fff;
   padding: 3px 32px;
   border-radius: 20px;
   border: solid 1px #a7e126;
   }
   .seperate-btn {
   margin-top:34px;
   }
   .active_save_btn{background-color:#a7e126;
   color:#fff;}
   .sort_b:hover{background-color:#a7e126;
   color:#fff;}
   .all_b:hover{background-color:#a7e126;
   color:#fff;}
   .job-voucher{background-color:#fff;border-radius:3px;height:130px;padding: 15px 20px 15px 20px;box-shadow: 0px 2px 6px #00000038;
   line-height:20px;}
   .dimen_img-s{height:60px;
   width:60px;float:left;margin-right: 20px;
   margin-bottom:20px;}
   .dimen_img-s{height:60px;
   width:60px;} 
   .job_title{font-size:18px;
   cursor: pointer;
   margin-bottom:10px;
   }
   .job_title:hover{text-decoration:underline;}   
   .organization {
   color: #868383;
   font-size: 12px;
   }
   .location{color: #868383;
   font-size: 12px;
   }
   .alert-dismissable .close, .alert-dismissible .close {
   position: relative;
   top: 0px;
   right: 0px;
   color: inherit;
   }
   .job_dis_btn{padding: 2px 16px;
   border: none;
   margin-left: 79px;
   font-size:12px;}
   .job_dis_btn:hover{
   background-color: #81c3f8;
   color: #fff;
   }
   .apply_job_btn {
   float: right;
   background-color: #fff;
   padding: 2px 21px;
   border: solid 1px #18c5bd;
   color: #159d96;
   font-weight: 700;
   font-size: 11px;
   cursor: pointer;
   border-radius: 29px;
   margin-top: -5px;
   }
   .apply_job_btn:hover{
   background-color:#159d96;
   color: #fff;
   transition:0.7s;
   }
   .bd-2 {
   margin-top: 20px;
   padding:0px;
   }  
   /*end*/
   .dropdown.right-arrow {
   position: absolute;
   top: -3px;
   right: 69px;
   border: none;
   }
   .btn{padding:0px;}
   .btn-default{border:none;font-size: 20px;}
   .btn-default:hover{
   background-color:#fff;
   border:none;}
   .dropdown-menu li {
   font-size: 11px;
   padding: 8px 13px;
   cursor: pointer;
   }
   .post-job {
   margin-bottom: 20px;
   }  
   div#next {
   float: right;
   /* margin-left: 385px; */
   margin-right: 59px !important;
   }
   :checked + span{background: #18c5bd !important;
   display: inline-block;
   width: 100% !important;     
   color: #fff;
   padding: 6px 17px !important;
   border-radius: 13px;
   }
   div#skills {
   float: left;
   margin-bottom: -18px;
   padding: 8px 21px -7px 0px;
   }
   .card div {border-radius:0px !important;}    
   .following-info{margin-bottom:10px;
    float: left;
    line-height: 30px;
}
   .following-info2{margin-bottom:10px;margin-left: 210px;
    line-height: 30px;}   
   .following-info3 {
    margin-bottom: 10px;
    margin-top: -100px;
    margin-right: -35px;
    line-height: 30px;
}
   .active-job label {
   transform-style: preserve-3d;
   display: block;
   width: 100%;
   position: relative !important;
   border-radius: 7px;
   border: solid 1px #d6d3d3;
   background-color:#fff;
   }
   input#subject {
   display: block;
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
      margin-left: -10px !important;
    list-style-type: none;
    padding: 0;
    margin: 0;
    background: #FFF;
    padding: 0px;
    font-size: 13px;
    box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;
    width: 190px;
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
   width: 185px;
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
   
   .last_section{border:solid 1px #e8e4e4;margin-top: 77px;padding:0px 10px;}
   .panel-title {
   font-size: 13px;
   color: #18c5bd;
   }
   .panel{background-color:#fbfbfb;}
   i.glyphicon.glyphicon-filter {
   color: #18c5bd;
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
   .alert.alert-success.alert-dismissable {
   /* margin-bottom: -17px; */
   margin-left: 175px;
   /* margin-top: 0px; */
   /* background: black; */
   height: 26px;
   width: auto;
   padding: 14px;
   }
   .alert.alert-success.text-center {
   width: 100%;
   height: 30px;
   border-radius: 0;
   text-align: center;
   padding: 13px;
   background: transparent;
   background-color: #68dcd7;
   font-weight: bold;
   }
   .alert.alert-warning.text-center {
   width: 100%;
   height: 30px;
   border-radius: 0;
   text-align: center;
   padding: 13px;
   background: transparent;
   background-color: #f0ad4e;
   font-weight: bold;
   }
   /*.ui-autocomplete-input {
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
   }*/
   .ui-autocomplete {
   z-index: 5000;
   background: #b3ebe8;;
   width: 0%;
   }
   .highlight_div {
   border: 1px solid ;
   padding: 10px;
   box-shadow: 5px 5px #888888;
   }
   .active-job label:hover {
   /* box-shadow: 0 4px 6px -1px rgba(0,0,0,.1),0 2px 4px -1px rgba(0,0,0,.06)!important; */
   }
   input#posted_job {
   display: none;
   }
 .icon_backg {
    background-color: #18c5bd;
    padding: 12px;
    border-radius: 34px;
    color: #fff;
    cursor: pointer;
    float: right;
    margin-right: 5px;
}
.btn-group {
    float: right;
    margin-top: 3px;
    /*margin-right: 10px;*/
}
a.myclass {
    font-weight: 600;
    /* float: right; */
    margin-right: 7px;
    /* width: 35px; */
}
sup {
   top: -1px;
    font-size: 16px;
    color: red;
}
span.right-side {
    display: table-cell;
    padding-left: 10px;
    padding-top: -32px;
}
.skl_bnft {
    display: inline-flex;
}
li.right-title {
    list-style-type: none;
    font-size: 12px;
    font-weight: 100;
    width: 202px;
}
button.btn.btn-primary.trash {
    background-color: #18c5bd;
    width: 85px;
    border: none;
    margin-top: 0px;
    margin-left: 2px;
    border-radius: 128px;
        float: right;
}
.icon-info {
    margin-left: 16px;
    margin-bottom: 20px;
    margin-top: 30px;
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
</style>
<div class="container-fluid main-d">
<div class="container">
<div class="col-md-12">
<?php $this->load->view('fontend/layout/employer_menu.php'); ?>
<!-- <div class="panel-body"></div> -->
<div class="col-md-6 active-job">
   <div id="smsg"> <?php echo $this->session->flashdata('success'); ?></div>
   <div class="row">
               <div class="col-md-8">
                  <form class="navbar-form" role="search">
                    
                     <input type="text" id="myInput" class="form-control" placeholder="Name | Role | Domain" style="width: 100%">
                    
                  </form>
                  <div class="clear"></div>
               </div>
              <div class="col-md-4">
              <form method="post" action="<?php echo base_url(); ?>employer/active-job">
              <label class="dropdown">
                <div class="dd-button" onclick="myFunction2(event)">
                  Sort by
                </div>
                <input type="checkbox" class="dd-input" id="test">
                <ul id="sizelist" class="dd-menu">
                  <li data-value="job_title" ><a href="#">Job Title</a></li>
                  <li data-value="job_role_title"><a href="#">Job Role</a></li>
                  <li data-value="time_for_question"><a href="#">Time</a></li>
                  <li data-value="topic_name"><a href="#">Topics</a></li>
                </ul>
              </label>
              <input id="sizevalue" value="<?php if(isset($sort))
              {echo $sort; } ?>" size="15" name="sort_val" type="hidden" />
              <button type="submit" name="sort" class="hidden" id="sort_btn"></button>
            </form>
              </div>
             
          </div>
    <a href="#" onclick="get_trash();"><button class="btn btn-primary trash" ><i class="fas fa-trash-alt" ></i> Trash</button></a>
   <br><br>
   <div id="job_trash">
   <?php if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
   <label class="checkbox_label content">
      <div class="border-top1"></div>
      <input type="checkbox" id='posted_job' class="posted_job" onchange="get_report_data(<?php echo $v_companyjobs['job_post_id'] ?>)" />
      <div class="card">
         <div class="front">



            <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_profile_id);?>" style="height:50px; width:50px;border-radius:5px;float:left;border:solid 1px #eae9e9b8;margin-right:15px;" />
            <div class="job-info">
               <p class="job_title"><?php echo $v_companyjobs['job_title']; ?></p>
            </div>
            <div class="icon-info">
               <li class="left-icon-title"><i class="far fa-money-bill-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $v_companyjobs['salary_range']; ?> (Yearly - <?php  $currency = $this->session->userdata('currency');  if (isset($currency) && !empty($currency)) {
                  $locale='en-US'; //browser or user locale
                   // $currency='JPY';
                   $fmt = new NumberFormatter( $locale."@currency=$currency", NumberFormatter::CURRENCY );
                   $symbol = $fmt->getSymbol(NumberFormatter::CURRENCY_SYMBOL);
                   header("Content-Type: text/html; charset=UTF-8;");
                      echo $symbol;echo $symbol;
                  } ?>)  </li>
               <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li>
               <li class="right-icon-title"> &emsp;<?php echo $v_companyjobs['city_id']; ?></li>
               <li class="left-icon-title"><i class="fas fa-briefcase"></i></li>
               <li class="right-title" style="width:100%;"> &emsp;<?php echo $v_companyjobs['experience']; ?> (Experience)</li>
               <div class="clear"></div>
            </div>

            <div class="following-info">
               <li class="left-title"
                  >Job Role </li>
                  <li class="right-title">&nbsp;: <?php echo $v_companyjobs['job_role_title']; ?></li>
                  <li class="left-title">Education</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs['education_level_name']; ?></li>
               
               
               <li class="left-title">Domain</li>
               <li class="right-title">&nbsp;:<?php echo $v_companyjobs['job_category_name']; ?></li>
              
              
               <div class="clear"></div>
            </div>
            <div class="following-info2">
               
             <li class="left-title">Vacancies</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs['no_jobs']; ?></li>
               <li class="left-title">Engagement</li>
               <li class="right-title">&nbsp;: <?php echo $v_companyjobs['job_nature_name']; ?></li>
               
              
                <li class="left-title">Published on</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs['posting_date'])) { echo date('j M Y',strtotime($v_companyjobs['posting_date'])); } ?></li>
               <div class="clear"></div>
            </div>
            <div class="following-info3">
               
               
               <li class="left-title">Ocean Test</li>
               <li class="right-title">&nbsp;:<?php 
                if ($v_companyjobs['is_test_required'] == 'Yes' && empty($v_companyjobs['test_for_job'])) { echo $v_companyjobs['is_test_required'];  ?>
                  <sup><span title="Marked yes but test is not attached" class="required">*</span></sup>
             <?php  } elseif ($v_companyjobs['is_test_required'] == 'Yes' && !empty($v_companyjobs['test_for_job'])) { ?>
               <a style="margin-left: 15px" title=" test details" href="<?php echo base_url() ?>employer/show_test_details/<?php echo base64_encode($v_companyjobs['test_for_job']); ?>/" >Yes</a>
            <?php }else{echo $v_companyjobs['is_test_required']; } ?> </li>
             <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li>

               <li class="right-title">&nbsp;: <?php if (isset($v_companyjobs['jd_file']) && !empty($v_companyjobs['jd_file'])) { echo "Yes"; ?>  <a style="margin-left: 15px" href="<?php echo base_url() ?>upload/job_description/<?php echo $v_companyjobs['jd_file']; ?>" download><i class="fa fa-download" aria-hidden="true"></i></a> <?php } else { echo "No";} ?></li>
              
               <li class="left-title">Job expiry</li>
               <li class="right-title">&nbsp;:<?php if(!is_null($v_companyjobs['job_deadline'])) { echo date('j M Y',strtotime($v_companyjobs['job_deadline'])); } ?></li>
               <div class="clear"></div>
            </div>
             <br>
            <div class="skl_bnft">
              
            <span>Skill sets</span>:
            <span class="right-side">
            <?php 
               $sk=$v_companyjobs['skills_required'];
               if (isset($sk) && !empty($sk)) {
                  $where_sk= "id IN (".$sk.") AND status=1";
                $select_sk = "skill_name ,id";
                $skills = $this->Master_model->getMaster('skill_master',$where_sk,$join = FALSE, $order = false, $field = false, $select_sk,$limit=10,$start=false, $search=false);
                if(!empty($skills)){ 
                  foreach($skills as $skill_row){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $skill_row['skill_name'];?></button></lable>
            <?php }
               } }   ?>
            </span>
               <div class="clear"></div>
               </div> 
           
            <br>
            <div class="skl_bnft">
            <span>Benefits</span>:
            <span class="right-side">
            <?php 
               $benefits=explode(',', $v_companyjobs['benefits']);
               
                if(!empty($benefits)){ 
                  $i=0;
                  foreach($benefits as $benefit){ ?>
            <lable class=""><button id="sklbtn"><?php echo  $benefits[$i];?></button></lable>
            <?php $i++; }
               }    ?>
            </span>
             <div class="clear"></div>
            </div>  
            <?php  
                    $job_post_id = $v_companyjobs['job_post_id'];
                    $employer_id = $this->session->userdata('company_profile_id');
                    $where="job_posting.job_post_id = '$job_post_id' ";
                    $join = array('forwarded_jobs_cv'=>'forwarded_jobs_cv.job_post_id = job_posting.job_post_id |Left OUTER',
                     'corporate_cv_bank'=>'corporate_cv_bank.cv_id=forwarded_jobs_cv.cv_id | LEFT OUTER',
                     
                      'company_profile'=>'company_profile.company_profile_id = job_posting.company_profile_id |Left OUTER');
                    $jobs_data = $this->Master_model->getMaster('job_posting', $where , $join, $order = 'desc', $field = 'date', $select = '*,IFNULL(forwarded_jobs_cv.created_on, job_posting.update_at) AS date',$limit=false,$start=false, $search=false); 
                    // print_r($this->db->last_query());
                      if (!empty($jobs_data)) { ?>

                       <span data-toggle="collapse" data-target="#collapseEx<?php echo $v_companyjobs['job_post_id']?>" aria-expanded="false" aria-controls="collapseEx" style="color: red;font-size: 25px;margin-left: 38px;" title="Click to see the Jobs Forwarded" class="required"> * </span>

                       <div class="collapse" id="collapseEx<?php echo $v_companyjobs['job_post_id']?>">
                      <div class="card-body">
                      <?php $i=1; if (!empty($jobs_data)) { ?>
                         <hr>
                        <?php // print_r($jobs_data);
                        foreach ($jobs_data as $row) {

                          if (isset($row['update_at'])) { ?>
                             <p><?php echo $i; ?>.Job Post Updated - <?php echo date('d-m-y H:i',strtotime($row['date'])) ; ?> - <?php echo $row['company_name']; ?> </p>
                        <?php  }elseif(isset($row['cv_id'])){ ?>
                          <p><?php echo $i; ?>.Job Post Forwarded - <?php echo date('d-m-y H:i',strtotime($row['date'])) ; ?> - <?php echo $row['js_email']; ?>  </p>
                       <?php  }
                         ?>

                       

                            <?php $i++;  } }  ?>
                        
                      </div>
                      </div>
                     <?php  }
                    ?>
               <br>       
            <a title="details" href=" <?php echo base_url() ?>employer/preview_job_post/<?php echo $v_companyjobs['job_post_id'] ?>"><i class="fa fa-info-circle icon_backg"></i></a>
            <div class="btn-group">
                        <a title="Edit" href=" <?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs['job_post_id'] ?>"><i class="far fa-edit icon_backg"></i></a>
                        <a title="Delete" href="<?php echo base_url('employer/deactivate_job/' . $v_companyjobs['job_post_id']); ?>"><i class="fas fa-trash-alt icon_backg"></i></a>
                     </div>

            <?php  if ($v_companyjobs['job_deadline'] > date('Y-m-d')){
               // echo '<button class="btn btn-success btn-xs">Live <i class="fa fa-check-circle" aria-hidden="true"></i></button>';
               echo '<span class="active-span">Active</span>';
               }
               else {
               // echo'<button class="btn btn-danger btn-xs">Expired <i class="fa fa-times" aria-hidden="true"></i></button> ';
               echo '<span class="pasive-span">Expired</span>';
               } ?>
            <div class="dropdown">
               <a href="#" data-toggle="modal" data-target="#rotateModal<?php echo $v_companyjobs['job_post_id']; ?>"> <i class="fas fa-share"></i></a>
               <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-ellipsis-h"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1">
                  <li><a class="dropdown-item" href="#">View post job</a></li>
                  <!-- <li> <a class="dropdown-item" href="<?php echo base_url() ?>employer/update_job/<?php echo $v_companyjobs['job_post_id'] ?>">Edit job post</a></li> -->
                 <li ><a class="dropdown-item" href="#" id="attach_to_job" data-toggle="modal" data-target="#attach_test<?php echo $v_companyjobs['job_post_id'] ?>" >Attach Test</a></li>
               </div>
            </div>

           
         </div>
      </div>
   </label>
   <?php endforeach; 
      else : ?> 
   <li>
      <strong>There are no Active Job Posts to Display !</strong>
   </li>
   <?php endif; ?>
</div>
 <div class="container-fluid">
             <div class="col-md-6"></div>
            <div class="col-md-6">
            <span><?php echo $links; ?></span>   
            </div>
               
          </div>
</div>
 <?php
  $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
  if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
   <div class="modal" id="attach_test<?php echo $v_companyjobs->job_post_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Attach Test To This Job</h5>
         </div>
         <form action="<?php echo base_url() ?>employer/attach_test" class="sendEmail" method="post" autocomplete="off">
            <input type="hidden" name="job_post_id" id="job_post_id" value="<?php echo $v_companyjobs->job_post_id; ?>">
            <div class="modal-body" style="padding:15px 40px;">
               <input type="hidden" name="consultant" value="JobSeeker">  
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <div class="row">
                
                 <div class="form-check">
                  <div class="col-md-6">
                   <label class="form-check-label">
                     <input class="form-check-input radio-inline" type="radio" name="gridRadios" id="gridRadios1" value="option1" onclick="get_test_list('2',<?php echo $v_companyjobs->job_post_id; ?>);" >
                     Ocean Test Paper</label>
                     </div>
                     <div class="col-md-6">
                     <label class="form-check-label">
                     <input class="form-check-input radio-inline" type="radio" name="gridRadios" id="gridRadios2" onclick="get_test_list('1',<?php echo $v_companyjobs->job_post_id; ?>);" value="option2">
                     Use My Q-Bank</label>
                     </div>
                    
                 </div>
              </div>
                  
               </div>
               <span id="msg<?php echo $v_companyjobs->job_post_id ?>"></span>
               <div id="test_div" style="display: none;">
                  
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
              <label class="mdl-textfield__label" for="sample3">Tests</label> 
                  <select class="form-control select2" name="test_id" id="test_id_modal<?php echo $v_companyjobs->job_post_id; ?>" onchange="get_test_details(<?php echo $v_companyjobs->job_post_id; ?>);">
                 
               </select>
            </div>
            <br><br>
            <div class="row">
              <div class="col-md-4">
               <label>Total Questions :</label>
              <span id="total_questions<?php echo $v_companyjobs->job_post_id; ?>"></span>
              </div>
                <div class="col-md-4">
               <label>Total Duration :</label>
              <span id="total_duration<?php echo $v_companyjobs->job_post_id; ?>"></span>
              </div>
               <div class="col-md-4">
               <label>Topics:</label>
              <span id="topics<?php echo $v_companyjobs->job_post_id; ?>"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
               <label>Test Type :</label>
              <span id="test_type<?php echo $v_companyjobs->job_post_id; ?>"></span>
              </div>
                <div class="col-md-4">
               <label>Test Level :</label>
              <span id="level<?php echo $v_companyjobs->job_post_id; ?>"></span>
              </div>
              
            </div>
             
              
           
            <div class="modal-footer">
               <button type="submit" class="btn btn-save">Attach Test</button>
            </div>
         </div>
            </div>
         </form>
      </div>
   </div>
</div>
    <?php endforeach; 
      else : ?> 
   <li>
      <strong>There are no Active Job Posts to Display !</strong>
   </li>
   <?php endif; ?>
<div class="col-md-3 ">
   <div class="last_section">
      <div class="pai_chart">
         <main>
            <section>
               <div class="pieID pie">
               </div>
               <ul class="pieID legend">
                  <li>
                     <em id="spanid0">Total Active Job Posts</em>
                     <span><?php echo sizeof($company_active_jobs); ?></span>
                     <!--<span>718</span> -->
                  </li>
                  <li>
                     <em id="spanid1">Sent to Candidates</em>
                     <span id='total_forwarded'>10</span>
                  </li>
                  <li>
                     <em id="spanid2">Applications Rcvd</em>
                     <span id='total_applied'>10</span>
                  </li>
                  <li>
                     <em id="spanid3">Test Attempted</em> 
                     <span id='total_test'>10</span>
                  </li>
                  <li>
                     <em id="spanid4">Test Passed</em>
                     <span id='total_passed'>10</span>
                  </li>
                  <li>
                     <em id="spanid5">Interview Passed</em> 
                     <span id='total_test_int_pass'>10</span>
                  </li>
                  <li>
                     <em id="spanid6">Interview Failed</em>
                     <span id='total_test_int_fail'>10</span>
                  </li>
                  <li>
                     <em id="spanid7">Offer Accepted</em>
                     <span id='total_offer_accept'>10</span>
                  </li>
                  <li>
                     <em id="spanid8">Early Applications</em>
                     <span id='early_applications'>10</span>
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
                  <span class="clickable filter" data-toggle="tooltip" onchange="get_report_data();"  data-container="body">
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
                  <span class="clickable filter" data-toggle="tooltip"  data-container="body">
                  <i class="glyphicon glyphicon-filter"></i>
                  </span>
               </div>
            </div>
            <div class="panel-body">
               <input type="text" class="form-control" id="dev-table-filter" onchange="get_report_data();" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
               <div class="location_fil">
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>Ph.D/Dr</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>Masters / Post-Grad</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>Graduation</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>ITI / Diploma</strong>
                  </div>
                  <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                     <strong>School</strong>
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
                  <span class="clickable filter" data-toggle="tooltip" onchange="get_report_data();" data-container="body">
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
            <input id="range1" type="range" name="range1" min="1" max="10" onchange="get_report_data();" step="0.1" value="5">
            <label for="range3">Availability</label>
            <input id="range3" type="range" name="range3" min="0" max="100" onchange="get_report_data();" step="1" value="50">
         </form>
      </div>
   </div>
</div>
<!-- <div class=" text-center">
   <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#rotateModal">Rotate Modal</button>
   </div> -->
<?php
 $company_active_jobs = $this->job_posting_model->get_company_active_jobs($employer_id);
 if (!empty($company_active_jobs)): foreach ($company_active_jobs as $v_companyjobs) : ?>
<div class="modal" id="rotateModal<?php echo $v_companyjobs->job_post_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <input type="hidden" name="company_profile_id" id="company_profile_id" value="<?php echo $this->session->userdata('company_profile_id'); ?>">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="border-bottom:none;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Job Post</h5>
         </div>
         <form action="<?php echo base_url() ?>employer/forword_job_post" class="sendEmail" method="post" autocomplete="off">
            <div class="modal-body" style="padding:15px 40px;">
               <input type="hidden" name="job_post_id" value="<?php echo $v_companyjobs->job_post_id; ?>">
               <input type="hidden" name="consultant" value="JobSeeker">  
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <label class="mdl-textfield__label" for="sample3">E-mail:</label>
                  <input type="email"  class="form-control" name="candiate_email"  id="email" placeholder="Enter comma seperated Emails"  data-required="true" multiple style="display: inline-block;" required>
               </div>
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">Message:</label>
                  <textarea class="form-control" name="message" rows="5" id="comment" required></textarea>
               </div>
               <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">Mandatory Info:</label><br>
                  <label>
                  <input type="checkbox" style="display: none;" value="current_ctc" class="btn-default1" id="benifit[]" checked="" name="mandatory[]">
                  <span>Current CTC (Yr)</span>
                  </label>
                  <label>
                  <input type="checkbox" style="display: none;" value="expected_ctc" class="btn-default1" id="benifit[]" checked="" name="mandatory[]">
                  <span>Expected CTC (Yr)</span>
                  </label>
                  <label>
                  <input type="checkbox" style="display: none;" value="Notice_period" class="btn-default1" id="benifit[]" checked="" name="mandatory[]">
                  <span>Notice (days)</span>
                  </label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-save">Send</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php
   endforeach;endif;
   ?>
   <script>
      function confirm_delete(id)
  {
    var newUrl = '<?php echo base_url(); ?>employer/delete_cv/'+id;
    console.log(newUrl);
    console.log(id);
    $('#del_modal').prop('action',newUrl);
    $('#delete').modal("show");
  }
  
function get_trash()
{
   $.ajax({
          type:'POST',
         url:'<?php echo base_url();?>Employer/trash_cv',
         data:{type:'jobs'},
         success:function(res){
             $('#job_trash').html(res);
             // $('#company_pincode').val('');
         }
    })
}
      function get_test_list(test_type,job_id)
      {
         if (test_type) 
         {
            $.ajax({
                type:'POST',
               url:'<?php echo base_url();?>Employer/get_test_list',
               data:{test_status:test_type},
               success:function(res){
                  // alert(res.length);
                  if (res.length > 1) 
                  {
                   $('#test_id_modal'+job_id).html(res);
                   $('#test_div').show();
                  }
                  else
                  {
                     $('#msg'+job_id).text('Tests not Available');
                     $('#test_div').hide();
                  }
               }
            })
         }
      }
      function get_test_details(job_id)
      {
         var test_id = $('#test_id_modal'+job_id).val();
         $.ajax({
                type:'POST',
               url:'<?php echo base_url();?>Employer/get_test_details',
               data:{test_id:test_id},
               success:function(data){
                var obj = jQuery.parseJSON(data);
                console.log(obj[0]['type']);
                
                $('#test_type'+job_id).html(obj[0]['type']);
                $('#total_questions'+job_id).html(obj[0]['total_questions']);
                $('#total_duration'+job_id).html(obj[0]['test_duration']);
                $('#level'+job_id).html(obj[0]['level']);
                $('#topics'+job_id).html(obj[0]['topics']);
                   // $('#company_pincode').val('');
               }
            })
      }
   </script>
<script>
   $('.checkbox_label').click(function ()
   {
   var checkbox = $(this).find('input[type=checkbox]');
   $('.posted_job').prop("checked",false);
   
   checkbox.prop("checked", !checkbox.prop("checked"));
   var addclass = 'highlight_div';
   $('.checkbox_label').removeClass(addclass);
   $(this).addClass(addclass);
   });
   
</script>
<script>
   $(document).ready (function(){
     $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
     $("#smsg").slideUp(500);
     });  
     $("#email").autocomplete({
             
             source: "<?php echo base_url();?>Employer/get_candidate_by_email",
             minLength: 2,
              // append: "#rotateModal",
            
    
            
           }); 

   });
</script>
<script>
   
   
</script>

<script>
   function  get_report_data(id)
   {
        
             // if($('#posted_job').is(":checked")){
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
   
                    var total_count_early_applied = getarray.Total_count_early_applied;
   
                    $('#total_forwarded').html(total_count.length);
                    $('#total_applied').html(total_count_applied.length);
                    $('#total_test').html(total_given_test.length);
   
                    $('#total_passed').html(total_test_passed.length);
                    $('#total_test_int_pass').html(total_test_interview_passed.length);
                    $('#total_test_int_fail').html(total_test_interview_failed.length);
   
                    $('#total_offer_accept').html(total_offer_accepted.length);
   
                    $('#early_applications').html(total_count_early_applied.length);
       createPie(".pieID.legend", ".pieID.pie");
                  }
                });
             // }
   
   
     
   }
   
   
    
   
   
</script>
 <script>
    $("#sizelist").on("click", "a", function(e){
  e.preventDefault();
  var $this = $(this).parent();
  $this.addClass("select").siblings().removeClass("select");
  $("#sizevalue").val($this.data("value"));
  $( "#sort_btn" ).click();
  $( "#test" ).click();
  })
   $(document).ready(function(){
   
    $('#myInput').keyup(function(){
    
     // Search text
     var text1 = $(this).val();
    var text = text1.toUpperCase();
   
     $('.content').hide();
   
     // Search and show
     $('.content:contains("'+text+'")').show();
    
    });
   
   });
   $.expr[":"].contains = $.expr.createPseudo(function(arg) {
   return function( elem ) {
   return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
   };
   });
   
   
</script>
<script>
   function sliceSize(dataNum, dataTotal) {
     return (dataNum / dataTotal) * 360;
   }
   function addSlice(sliceSize, pieElement, offset, sliceID, color,dataCount) {
      var val = $('#spanid'+dataCount).text();

      console.log(val);

     $(pieElement).append("<div class='slice "+sliceID+"'><span title='"+val+"'></span></div>");
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
       addSlice(sliceSize, pieElement, offset, sliceID, color,dataCount);
     } else {
       addSlice(maxSize, pieElement, offset, sliceID, color,dataCount);
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
<!--
<script>
   function  get_report_data(id)
   {
        
             // if($('#posted_job').is(":checked")){
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
   
                    var total_count_early_applied = getarray.Total_count_early_applied;
   
                    $('#total_forwarded').html(total_count.length);
                    $('#total_applied').html(total_count_applied.length);
                    $('#total_test').html(total_given_test.length);
   
                    $('#total_passed').html(total_test_passed.length);
                    $('#total_test_int_pass').html(total_test_interview_passed.length);
                    $('#total_test_int_fail').html(total_test_interview_failed.length);
   
                    $('#total_offer_accept').html(total_offer_accepted.length);
   
                    $('#early_applications').html(total_count_early_applied.length);
   
                  }
                });
             // }
   
   
             createPie(".pieID.legend", ".pieID.pie");
         }
   
   
    
   
   
</script> 
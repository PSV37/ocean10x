<!---header-->
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
<?php $this->load->view('fontend/layout/employer_new_header.php');?>  
<!---header--->

<style>
   body {font-family: Arial, Helvetica, sans-serif;}
   * {box-sizing: border-box;}
   /*.ui-autocomplete {
   z-index: 100;
   }*/
   /* Button used to open the chat form - fixed at the bottom of the page */
   .open-button {
   background-color: #555;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   opacity: 0.8;
   position: fixed;
   bottom: 23px;
   right: 28px;
   width: 280px;
   }
   /* The popup chat - hidden by default */
   .chat-popup {
   display: none;
   position: fixed;
   bottom: 0;
   /*right: 15px;*/
   border: 3px solid #f1f1f1;
   z-index: 9;
   }
   /* Add styles to the form container */
   .form-container {
   max-width: 300px;
   padding: 10px;
   background-color: white;
   }
   /* Full-width textarea */
   .form-container textarea {
   width: 100%;
   padding: 15px;
   margin: 5px 0 22px 0;
   border: none;
   background: #f1f1f1;
   resize: none;
   min-height: 200px;
   }
   /* When the textarea gets focus, do something */
   .form-container textarea:focus {
   background-color: #ddd;
   outline: none;
   }
   /* Set a style for the submit/send button */
   .form-container .btn {
   background-color: #4CAF50;
   color: white;
   padding: 16px 20px;
   border: none;
   cursor: pointer;
   width: 100%;
   margin-bottom:10px;
   opacity: 0.8;
   }
   /* Add a red background color to the cancel button */
   .form-container .cancel {
   background-color: red;
   }
   /* Add some hover effects to buttons */
   .form-container .btn:hover, .open-button:hover {
   opacity: 1;
   }
   .chatperson{
   display: block;
   border-bottom: 1px solid #eee;
   width: 100%;
   display: flex;
   align-items: center;
   white-space: nowrap;
   overflow: hidden;
   margin-bottom: 15px;
   padding: 4px;
   }
   .chatperson:hover{
   text-decoration: none;
   border-bottom: 1px solid orange;
   }
   .namechat {
   display: inline-block;
   vertical-align: middle;
   }
   .chatperson .chatimg img{
   width: 40px;
   height: 40px;
   background-image: url('http://i.imgur.com/JqEuJ6t.png');
   }
   .chatperson .pname{
   font-size: 18px;
   padding-left: 5px;
   }
   .chatperson .lastmsg{
   font-size: 12px;
   padding-left: 5px;
   color: #ccc;
   }
   /*body{
   height:400px;
   position: fixed;
   bottom: 0;
   }*/
   .col-md-2, .col-md-10{
   padding:0;
   }
   .panel{
   margin-bottom: 0px;
   }
   .chat-window{
   bottom:0;
   position:fixed;
   float:right;
   margin-left:10px;
   }
   .chat-window > div > .panel{
   border-radius: 5px 5px 0 0;
   }
   .icon_minim{
   padding:2px 10px;
   }
   .msg_container_base{
   background: #e5e5e5;
   margin: 0;
   padding: 0 10px 10px;
   max-height:300px;
   overflow-x:hidden;
   }
   .top-bar {
   background: #666;
   color: white;
   padding: 10px;
   position: relative;
   overflow: hidden;
   }
   .msg_receive{
   padding-left:0;
   margin-left:0;
   }
   .msg_sent{
   padding-bottom:20px !important;
   margin-right:0;
   }
   .messages {
   background: white;
   padding: 10px;
   border-radius: 2px;
   box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
   max-width:100%;
   }
   .messages > p {
   font-size: 13px;
   margin: 0 0 0.2rem 0;
   }
   .messages > time {
   font-size: 11px;
   color: #ccc;
   }
   .msg_container {
   padding: 10px;
   overflow: hidden;
   display: flex;
   }
   img {
   display: block;
   width: 100%;
   }
   .avatar {
   position: relative;
   }
   .base_receive > .avatar:after {
   content: "";
   position: absolute;
   top: 0;
   right: 0;
   width: 0;
   height: 0;
   border: 5px solid #FFF;
   border-left-color: rgba(0, 0, 0, 0);
   border-bottom-color: rgba(0, 0, 0, 0);
   }
   .base_sent {
   justify-content: flex-end;
   align-items: flex-end;
   }
   .base_sent > .avatar:after {
   content: "";
   position: absolute;
   bottom: 0;
   left: 0;
   width: 0;
   height: 0;
   border: 5px solid white;
   border-right-color: transparent;
   border-top-color: transparent;
   box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
   }
   .msg_sent > time{
   float: right;
   }
   .msg_container_base::-webkit-scrollbar-track
   {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
   background-color: #F5F5F5;
   }
   .msg_container_base::-webkit-scrollbar
   {
   width: 12px;
   background-color: #F5F5F5;
   }
   .msg_container_base::-webkit-scrollbar-thumb
   {
   -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
   background-color: #555;
   }
   .btn-group.dropup{
   position:fixed;
   left:0px;
   bottom:0;
   }
   .panel-heading.top-bar {
   background-color: #18c5bd;
   }
   button#btn-chat {
   height: 30px;
   background-color: #18c5bd;
   border: none;
   }
   div#myForm1 {
   display: none;
   max-width: 350px;
   float: right;
   margin-left: 290px;
   max-height: 300;
   overflow-y: auto;
   }
   div#myForm {
   display: none;
   max-width: 300px;
   margin-left: 55px;
   min-width: 280px;
   min-height: 100;
   background-color: white;
   bottom: 11px;
   }
   .numberCircle {
   border-radius: 50%;
   width: 25px;
   height: 25px;
   padding: 2px;
   background: #98da01;
   /* border: 2px solid #666; */
   color: white;
   text-align: center;
   font: 20px Arial, sans-serif;
   float: right;
   padding-top: -55px;
   margin-top: -15px;
   }
   .bg-dream-pink {
    background-color: #D81B60;
}
.bg-dream-purple {
    background-color: #a612a6;
    color: white;
}
</style>
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-lg-9 mid-section">
            <div class="row">
               <div class="col-md-12 bd-1">
                  <div class="dash-box-w">
                     <h3 class="heading-dash">My Dashboard</h3>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-primary o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-fw fa-download"></i>
                              </div>
                              <span>Active Job Posts </span>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><?php echo sizeof($company_active_jobs); ?></span>
                           </a>  
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-danger o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-volume-up fa-fw"></i>
                              </div>
                              <div >Customers</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">20</span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-warning o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-users fa-fw"></i>
                              </div>
                              <div>CV Bank</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($cv_bank_data); ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-dream-pink o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                <i class="far fa-address-card"></i>
                              </div>
                              <div>CV Bank</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($cv_bank_data); ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-bluish o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-fw fa-download"></i>
                              </div>
                              <span>Open Positions</span>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span>
                           <?php 
                           //print_r($open_positions); 
                           if(isset($open_positions) && isset($open_positions[0]) && isset($open_positions[0]->no_jobs)){
                                 echo $open_positions[0]->no_jobs;
                           }else{
                                 echo "0";
                           } 
                            ?></span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-link o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-volume-up fa-fw"></i>
                              </div>
                              <div>Successful Hiring</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($success_full_hiring); ?></span> 
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-green o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="fas fa-users fa-fw"></i>
                              </div>
                              <div>News Feed</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;">20</span>
                           </a>
                        </div>
                     </div>
                     <div class="col-md-3 card-lb">
                        <div class="card text-white bg-dream-purple o-hidden h-100">
                           <div class="card-body">
                              <div class="card-body-icon">
                                 <i class="far fa-address-card"></i>
                              </div>
                              <div>CV Bank</div>
                           </div>
                           <a class="card-footer text-white clearfix small z-1" href="#">
                           <span class="float-left" style="font-size:22px;"><span><?php echo sizeof($cv_bank_data); ?></span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php if (!empty($jobs)): foreach ($jobs as $v_companyjobs) : ?>
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
               <a style="margin-left: 15px" title="<?php echo $v_companyjobs['test_name'] ?>" href="<?php echo base_url() ?>employer/show_test_details/<?php echo base64_encode($v_companyjobs['test_for_job']); ?>/" >Yes</a>
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

 <div class="container-fluid">
             <div class="col-md-6"></div>
            <div class="col-md-6">
            <span><?php echo $link; ?></span>   
            </div>
               
          </div>
            </div>
            <div class="chat-popup" id="myForm1">
              <div class="chatbody">
                 <div class="panel panel-primary">
                   <div class="msg">
                      
                    </div>
                  <div class="panel-footer">
                   
                     <div class="input-group">
                      
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" value="<?php echo $check['emp_js_connection_id']; ?>" id="btn-chat" onclick="send_msg();"><i class="fa fa-send fa-1x" aria-hidden="true"></i></button>
                        </span>
                     </div>
      
                 </div>
             </div>
            </div>
         </div>
         <div class="col-md-3 pro-bar">
            <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
            <div class="progress yellow">
               <span class="progress-left">
               <span class="progress-bar"></span>
               </span>
               <span class="progress-right">
               <span class="progress-bar"></span>
               </span>
               <div class="progress-value">75%</div>
            </div>
            <div class="paragraph_p_level">
            </div>
            <button class="open-button" onclick="openForm()">Messaging</button>
            <div class="chat-popup" id="myForm" style="    display: none;
               max-width: 300px;  margin-left: 55px;">
              
               <div class="chatbody">
                  <div class="panel panel-primary">
                     <div class="panel-heading top-bar">
                        <div class="col-md-8 col-xs-8">
                           <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Messaging</h3>
                        </div>
                        <span style="margin-left: 40px;" onclick="opensearch()"><i  class="fa fa-plus"></i></span>
                        <span style="float: right;" onclick="closeForm('myForm')"><i  class="fa fa-close"></i></span>
                     </div>
                     <div class="panel-body msg_container_base" >
                        <input type="search" name="search_connection" placeholder="search new connection" id="search_connection" style="display: none;
                           border-radius: 0;margin-top: 43px;max-width: 88%;margin-left: 2px; color: black;">
                        <button class="btn btn-primary btn-sm" id="connection_btn" style="display: none;float: right;margin-right: -9px;margin-top: 1px;height: 36px;background-color: #18c5bd;border: none;"><i class="fa fa-plus fa-1x" onclick="add_connection();" aria-hidden="true"></i></button>
                        <input type="hidden" name="job_seeker_id" value="" id="auto-value">
                        <div class="connections" style="margin-top: 50px;">
                           <?php foreach ($chatbox as $row) { 
                              ?>
                           <div class="row msg_container base_receive" >
                              <div class="col-md-2 col-xs-2 avatar">
                                 <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                              </div>
                              <div class="col-md-10 col-xs-10" onclick="show_box(<?php echo $row['emp_js_connection_id']; ?>);">
                                 <div class="messages msg_receive">
                                    <?php $employer_id = $this->session->userdata('company_profile_id');
                                       $js_id = $row['js_id'];
                                         $whereres   = "msg_to='$employer_id' and message_status = '0' and msg_from = '$js_id'";
                                         $msges = $this->Master_model->getMaster('messaging', $where =  $whereres, $join = false, $order = 'desc', $field = 'message_id', $select = '*',$limit=false,$start=false, $search=false); 

                                         // print_r($msges);

                                         ?>
                                    <?php $employer_id = $this->session->userdata('company_profile_id');
                                       // print_r($)
                                        if ($row['type'] == 'emp-emp' && $row['created_by'] == $this->session->userdata('company_profile_id') ) {
                                          $Join_data      = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.js_id|Left OUTER ');
                                       }
                                       elseif ($row['type'] == 'emp-emp' && $row['created_by'] != $this->session->userdata('company_profile_id') ) {
                                          $Join_data      = array('company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');
                                       }
                                        else
                                          {
                                             $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
                                             } 
                                              $id=$row['emp_js_connection_id'];
                                             $whereres   = "emp_js_connection_id='$id'";
                                            $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);?> 
                                    <p><?php if (!empty($check['full_name'])) 
                                       {
                                         echo $check['full_name']; 
                                         if (sizeof($msges) > 0 ) 
                                           { ?> 
                                    <div class="numberCircle"><?php echo sizeof($msges); ?></div>
                                    <?php } 
                                       }else
                                       {
                                        echo $check['company_name'];
                                        if (sizeof($msges) > 0 ) 
                                           { ?> 
                                    <div class="numberCircle"><?php echo sizeof($msges); ?></div>
                                    <?php }
                                       } ?>
                                    </p>
                                    <p><?php echo $msges[0]['msg'] ?></p>
                                    <time datetime="2009-11-13T20:00"><?php echo $msges[0]['created_date'] ?></time>
                                 </div>
                              </div>
                           </div>
                           <?php } ?>
                        </div>
                       
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(function(){
      $("#search_connection").autocomplete({
                
                 source: "<?php echo base_url();?>Employer/search_people",
                minLength: 2,
                 // append: "#rotateModal",
                 focus: function(event, ui) {
                  // prevent autocomplete from updating the textbox
                  event.preventDefault();
                  // manually update the textbox
                  // alert(source);
                  $(this).val(ui.item.label);
               },
               select: function(event, ui) {
                  // prevent autocomplete from updating the textbox
                  event.preventDefault();
                  // manually update the textbox and hidden field
                  $(this).val(ui.item.label);
                  $("#auto-value").val(ui.item.value);
               }
               
              });
      setInterval(function(){ 
        if ( $('#myForm1').css('display') == 'block')
         {
           var cid = $('#connection_id').val();
             // alert(cid);
             show_box(cid);
         }
         if ( $('#myForm').css('display') == 'block')
         {
           
             get_list();
         }
                      
         }, 20000);
   
   
     });
   
     // setInterval("my_function();",10000);
   function openForm() {
     document.getElementById("myForm").style.display = "block";
     get_list()
   }
   
   function closeForm(id) {
     document.getElementById(id).style.display = "none";
   }
   
   function get_list()
   {
     $.ajax({
                 url: "<?php echo base_url();?>employer/get_list_connections",
                 type: "POST",
               
                 success: function(data)
                 {
                   $('.connections').html(data);
                 }
           });
   }
   
   function send_msg()
   {
     var id = $('#connection_id').val();
   
     var message = $('#btn-input').val();
   if (message.replace(/\s/g, '').length > 0) {

     $.ajax({
                 url: "<?php echo base_url();?>employer/send_message",
                 type: "POST",
                 data: {id:id,message:message},
               
                 success: function(data)
                 {
                   $('.msg').html(data);
                  $('#btn-input').val('');
                 }
           });
  }
   }
   
   function show_box(id){
     // alert(id);/
    
     document.getElementById("myForm1").style.display = "block";
    
          $.ajax({
                 url: "<?php echo base_url();?>employer/get_messages",
                 type: "POST",
                 data: {id:id},
             
                 success: function(data)
                 {
                    
   
                   $('.msg').html(data);
                     get_list();
   
                    
                 }
           });
           
        
      
   }
   
   function opensearch(){
       document.getElementById("search_connection").style.display = "block";
       document.getElementById("connection_btn").style.display = "block";
   }
   $(document).on("keypress", "#btn-input", function (e){
       if (event.which == 13) {
           // validate();
           // alert("You pressed enter");
           $('#btn-chat').click();
        }
   });
   
   
   function add_connection()
   {
     var id = $('#auto-value').val();
     var name = $('#search_connection').val();
     // alert(id);
      $.ajax({
                 url: "<?php echo base_url();?>employer/add_new_connection",
                 type: "POST",
                 data: {id:id,name:name},
                
                 success: function(data)
                 {
                   $('.connections').html(data);
                  $('#search_connection').val('');

                 }
           });
   }
</script>
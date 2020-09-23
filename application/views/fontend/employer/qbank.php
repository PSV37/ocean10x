<!---header-->
<?php  $this->load->view('fontend/layout/employer_new_header.php'); ?>
<!---header--->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">

<style>
   .required
   {
   color: red;
   }
   
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
   margin-top: 10px;
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
   li.left-title {
   list-style-type: none;
   float: left;
   font-size: 12px;
   font-weight: 100;
   width:auto;
   height:15px;
   }
   li.right-title {
   list-style-type: none;
   font-size: 12px;
   font-weight: 100;
   width:260px;
   }
   .icon-info {
   margin-left:60px;
   margin-bottom:10px;
   }
   li.left-icon-title{
   list-style-type: none;
   float: left;
   }
   .left-icon-title i{color:#18c5bd;}
   li.right-icon-title {
   list-style-type: none;
   float: left;
   margin-right: 20px;
   font-weight:100;
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
   .following-info3 {
   margin-left: 309px;
   line-height: 30px;
   margin-top: 0px;
   margin-bottom: 15px;
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
   .pieID {
   display: inline-block;
   vertical-align: top;
   }
   .pie {
   height: 200px;
   width: 200px;
   position: relative;
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
   margin-left:31px;
   margin-top:30px !important;
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
   width: 166px;
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
   .right_side{background-color:#fff;
   border:solid 1px #CCCCCC;
   border-radius:13px;
   margin-top:43px;
   }
   select.bs-select-hidden,
   select.selectpicker {
   display: none !important;
   }
   .bootstrap-select {
   width: 220px \0;
   /*IE9 and below*/
   }
   .bootstrap-select > .dropdown-toggle {
   width: 100%;
   padding-right: 25px;
   z-index: 1;
   }
   .bootstrap-select > .dropdown-toggle.bs-placeholder,
   .bootstrap-select > .dropdown-toggle.bs-placeholder:hover,
   .bootstrap-select > .dropdown-toggle.bs-placeholder:focus,
   .bootstrap-select > .dropdown-toggle.bs-placeholder:active {
   color: #999;
   }
   .bootstrap-select > select {
   position: absolute !important;
   bottom: 0;
   left: 50%;
   display: block !important;
   width: 0.5px !important;
   height: 100% !important;
   padding: 0 !important;
   opacity: 0 !important;
   border: none;
   }
   .bootstrap-select > select.mobile-device {
   top: 0;
   left: 0;
   display: block !important;
   width: 100% !important;
   z-index: 2;
   }
   .has-error .bootstrap-select .dropdown-toggle,
   .error .bootstrap-select .dropdown-toggle {
   border-color: #b94a48;
   }
   .bootstrap-select.fit-width {
   width: auto !important;
   }
   .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
   width: 100%;
   }
   .bootstrap-select .dropdown-toggle:focus {
   outline: thin dotted #333333 !important;
   outline: 5px auto -webkit-focus-ring-color !important;
   outline-offset: -2px;
   }
   .bootstrap-select.form-control {
   margin-bottom: 0;
   padding: 0;
   border: none;
   }
   .bootstrap-select.form-control:not([class*="col-"]) {
   width: 100%;
   }
   .bootstrap-select.form-control.input-group-btn {
   z-index: auto;
   }
   .bootstrap-select.form-control.input-group-btn:not(:first-child):not(:last-child) > .btn {
   border-radius: 0;
   }
   .bootstrap-select.btn-group:not(.input-group-btn),
   .bootstrap-select.btn-group[class*="col-"] {
   float: none;
   display: inline-block;
   margin-left: 0;
   }
   .bootstrap-select.btn-group.dropdown-menu-right,
   .bootstrap-select.btn-group[class*="col-"].dropdown-menu-right,
   .row .bootstrap-select.btn-group[class*="col-"].dropdown-menu-right {
   float: right;
   }
   .form-inline .bootstrap-select.btn-group,
   .form-horizontal .bootstrap-select.btn-group,
   .form-group .bootstrap-select.btn-group {
   margin-bottom: 0;
   }
   .form-group-lg .bootstrap-select.btn-group.form-control,
   .form-group-sm .bootstrap-select.btn-group.form-control {
   padding: 0;
   }
   .form-inline .bootstrap-select.btn-group .form-control {
   width: 100%;
   }
   .bootstrap-select.btn-group.disabled,
   .bootstrap-select.btn-group > .disabled {
   cursor: not-allowed;
   }
   .bootstrap-select.btn-group.disabled:focus,
   .bootstrap-select.btn-group > .disabled:focus {
   outline: none !important;
   }
   .bootstrap-select.btn-group.bs-container {
   position: absolute;
   height: 0 !important;
   padding: 0 !important;
   }
   .bootstrap-select.btn-group.bs-container .dropdown-menu {
   z-index: 1060;
   }
   .bootstrap-select.btn-group .dropdown-toggle .filter-option {
   display: inline-block;
   overflow: hidden;
   width: 100%;
   text-align: left;
   }
   .bootstrap-select.btn-group .dropdown-toggle .caret {
   position: absolute;
   top: 50%;
   right: 12px;
   margin-top: -2px;
   vertical-align: middle;
   }
   .bootstrap-select.btn-group[class*="col-"] .dropdown-toggle {
   width: 100%;
   }
   .bootstrap-select.btn-group .dropdown-menu {
   min-width: 100%;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bootstrap-select.btn-group .dropdown-menu.inner {
   position: static;
   float: none;
   border: 0;
   padding: 0;
   margin: 0;
   border-radius: 0;
   -webkit-box-shadow: none;
   box-shadow: none;
   }
   .bootstrap-select.btn-group .dropdown-menu li {
   position: relative;
   }
   .bootstrap-select.btn-group .dropdown-menu li.active small {
   color: #fff;
   }
   .bootstrap-select.btn-group .dropdown-menu li.disabled a {
   cursor: not-allowed;
   }
   .bootstrap-select.btn-group .dropdown-menu li a {
   cursor: pointer;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }
   .bootstrap-select.btn-group .dropdown-menu li a.opt {
   position: relative;
   padding-left: 2.25em;
   }
   .bootstrap-select.btn-group .dropdown-menu li a span.check-mark {
   display: none;
   }
   .bootstrap-select.btn-group .dropdown-menu li a span.text {
   display: inline-block;
   }
   .bootstrap-select.btn-group .dropdown-menu li small {
   padding-left: 0.5em;
   }
   .bootstrap-select.btn-group .dropdown-menu .notify {
   position: absolute;
   bottom: 5px;
   width: 96%;
   margin: 0 2%;
   min-height: 26px;
   padding: 3px 5px;
   background: #f5f5f5;
   border: 1px solid #e3e3e3;
   -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
   box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.05);
   pointer-events: none;
   opacity: 0.9;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bootstrap-select.btn-group .no-results {
   padding: 3px;
   background: #f5f5f5;
   margin: 0 5px;
   white-space: nowrap;
   }
   .bootstrap-select.btn-group.fit-width .dropdown-toggle .filter-option {
   position: static;
   }
   .bootstrap-select.btn-group.fit-width .dropdown-toggle .caret {
   position: static;
   top: auto;
   margin-top: -1px;
   }
   .bootstrap-select.btn-group.show-tick .dropdown-menu li.selected a span.check-mark {
   position: absolute;
   display: inline-block;
   right: 15px;
   margin-top: 5px;
   }
   .bootstrap-select.btn-group.show-tick .dropdown-menu li a span.text {
   margin-right: 34px;
   }
   .bootstrap-select.show-menu-arrow.open > .dropdown-toggle {
   z-index: 1061;
   }
   .bootstrap-select.show-menu-arrow .dropdown-toggle:before {
   content: '';
   border-left: 7px solid transparent;
   border-right: 7px solid transparent;
   border-bottom: 7px solid rgba(204, 204, 204, 0.2);
   position: absolute;
   bottom: -4px;
   left: 9px;
   display: none;
   }
   .bootstrap-select.show-menu-arrow .dropdown-toggle:after {
   content: '';
   border-left: 6px solid transparent;
   border-right: 6px solid transparent;
   border-bottom: 6px solid white;
   position: absolute;
   bottom: -4px;
   left: 10px;
   display: none;
   }
   .bootstrap-select.show-menu-arrow.dropup .dropdown-toggle:before {
   bottom: auto;
   top: -3px;
   border-top: 7px solid rgba(204, 204, 204, 0.2);
   border-bottom: 0;
   }
   .bootstrap-select.show-menu-arrow.dropup .dropdown-toggle:after {
   bottom: auto;
   top: -3px;
   border-top: 6px solid white;
   border-bottom: 0;
   }
   .bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle:before {
   right: 12px;
   left: auto;
   }
   .bootstrap-select.show-menu-arrow.pull-right .dropdown-toggle:after {
   right: 13px;
   left: auto;
   }
   .bootstrap-select.show-menu-arrow.open > .dropdown-toggle:before,
   .bootstrap-select.show-menu-arrow.open > .dropdown-toggle:after {
   display: block;
   }
   .bs-searchbox,
   .bs-actionsbox,
   .bs-donebutton {
   padding: 4px 8px;
   }
   .bs-actionsbox {
   width: 100%;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bs-actionsbox .btn-group button {
   width: 50%;
   }
   .bs-donebutton {
   float: left;
   width: 100%;
   -webkit-box-sizing: border-box;
   -moz-box-sizing: border-box;
   box-sizing: border-box;
   }
   .bs-donebutton .btn-group button {
   width: 100%;
   }
   .bs-searchbox + .bs-actionsbox {
   padding: 0 8px 4px;
   }
   .bs-searchbox .form-control {
   margin-bottom: 0;
   width: 100%;
   float: none;
   }
   button.reset_filter {
   background-color: #18c5bd;
   width: 100%;
   margin-top: 20px;
   padding: 9px;
   border: none;
   margin-bottom: 20px;
   border-radius: 46px;
   color: #fff;
   font-weight: 700;
   }
   button.reset_filter:hover {
   background-color:#15a8a1;
   }
   .range-wrap {
   position: relative;
   margin: 0 auto 3rem;
   }
   .range {
   width: 100%;
   }
   .bubble {
   background:#afe1de;
   color: #000;
   padding: 4px 12px;
   position: absolute;
   border-radius: 4px;
   left: 50%;
   transform: translateX(-50%);
   }
   .bubble::after {
   content: "";
   position: absolute;
   width: 2px;
   height: 2px;
   background:#afe1de;  
   top: -1px;
   left: 50%;
   }
   .input-group-btn:last-child>.btn{background-color:#18c5bd;
   color:#fff;}
   button.btn.btn-primary {
   /*float: right;*/
   background-color: #18c5bd;
   border: none;
   border-radius: 35px;
   margin-top: 13px;
   font-size: 12px;
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
   .has-search .form-control-feedback {
   position: absolute;
   z-index: 2;
   display: block;
   width: 2.375rem;
   height: 2.375rem;
   line-height: 2.375rem;
   text-align: center;
   pointer-events: none;
   color: #aaa;
   margin-right: 146px;
   margin-top: 15px;
   }
   .dd-button:after {
   content: '';
   position: absolute;
   top: 58%;
   right: 8px;
   transform: translateY(-50%);
   width: 0;
   height: 0;
   border-left: 5px solid transparent;
   border-right: 5px solid transparent;
   border-top: 5px solid #7a7c7c;
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
  /* button#frwd_btn {
   margin-top: -2px;
   margin-left: 10px;
   }*/
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
    width: 185px;
    text-align: center;
}
   input#email {
   width: 100%;
   }
   .sendEmail label {
   color: black;
   font-size: 13px;
   }
   input[type=radio] {
   display: none;
   }
   label.btn.btn-secondary.active {
   border-radius: 20px;
   border: solid 2px;
   color: #18c5bd;
   background-color: #fff;
   border: solid 2px #18c5bd;
   font-weight: 700;
   }
   label.btn.btn-secondary {
   color: #949494;
   background-color: #fff;
   border: solid 2px #a5a5a5;
   border-radius: 30px;
   padding: 4px 10px;
   font-weight: 700;
   }
   button.btn.btn-primary {
    font-size: 15px;
    font-weight: bold;
    margin-left: 80px;
    padding: 5px;
    margin-right: -199px;
    min-width: 80px;
}

</style>
</style>
<body>
   <div class="container-fluid main-d">
      <div class="container">
         <div class="col-md-12">
            <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            <div class="col-md-6" style="margin-top:75px;">
               <!-- <ul id="myTabs" class="nav nav-pills nav-justified" role="tablist" data-tabs="tabs">
                  <li class="active"><a href="#Commentary" data-toggle="tab">Corporate QuestionBank</a></li>
                  <li><a href="#Videos" data-toggle="tab">Ocean QuestionBank !</a></li>
               </ul> -->
               
                 
               
                     <div class="row">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                           <a href="#add_test" data-toggle="tab"><label class="btn btn-secondary active">
                           <input type="radio" name="options" id="option1" autocomplete="off" >I want to choose My Questions in the Test !
                           </label></a>
                           <a href="#create_test" data-toggle="tab"><label class="btn btn-secondary">
                           <input type="radio" name="options" id="option2" autocomplete="off"> Ocean can help me create the Test !
                           </label></a>
                        </div>
                     </div>
                     <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active" id="add_test">
                           <form method="post" action="<?php echo base_url(); ?>employer/add_to_test">
                           <input type="hidden" id="question_id" name="data_arr" value="">
                           <input type="hidden" class="form-control" readonly style="border: none;" id="test_time" name="test_time">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group technical_id">                                       
                                       <label for="exampleInputEmail1">Test Name <span class="required">*</span></label>
                                       <input type="text" class="form-control" id="test_name" name="test_name">
                                    </div>
                                 </div>
                                  <div class="col-md-4">
                                    <div class="form-group technical_id">
                                       <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                       <select id="subject" name="subject_data" required class="form-control select2"  onchange="getTopic(this.value)">
                                          <option value="">Select Subject</option>
                                          <?php if (!empty($skill_master))
                                             foreach($skill_master as $skill) 
                                             {
                                             ?>   
                                          <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <?php echo form_error('technical_id'); ?>   
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group topic_id">
                                       <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                                       <select id="topic_id" name="topic_id" class="form-control select2" onchange="getSubtopic(this.value)">
                                          <option value="">Select Topic</option>
                                          <!-- <option value="1">HTML 5</option>  -->
                                       </select>
                                       <?php echo form_error('topic_id'); ?>   
                                    </div>
                                 </div>
                              
                              </div>
                              <div class="row">
                                
                                
                                 <div class="col-md-4">
                                    <div class="form-group subtopic_id">
                                       <label for="exampleInputEmail1">Sub Topic <span class="required">*</span></label>
                                       <select id="subtopic_id" name="subtopic_id" class="form-control select2" onchange="get_questuions();" >
                                       </select> <?php echo form_error('subtopic_id'); ?>   
                                    </div>
                                 </div>
                                   <div class="col-md-4">
                                   <div class="form-group level">
                                     <label for="exampleInputEmail1">Level <span class="required">*</span></label>
                                       <select name="level_data" onchange="get_questuions();" id="level" class="form-control select2">                                     
                                         <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                                         <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                                         <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                                       </select> <?php echo form_error('level'); ?>   
                                   </div>
                                 </div>
                              </div>
                              <div class="box-body">
                                 <div class="box" >
                                    <p ><b style="float: left;margin-right: 80px">Total Time Duration<span id="total_time"></span></b> <b style="float: right;margin-right: 80px" >Total Questions:<span id="total_questions"></span></b></p>
                                    <div class="card content">
                                       <!-- <div class="front"> -->
                                       <div class="following-info">
                                          <table class="table table-borderless" id="myTable">
                                             <thead>
                                                <tr>
                                                   <th scope="col">Sr No</th>
                                                   <th scope="col">Line Item 1</th>
                                                   <th scope="col">Line Item 2</th>
                                                   <th scope="col">Question</th>
                                                   <th scope="col">time</th>
                                                   <th scope="col">Action</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                          </table>
                                       </div>
                                       <!-- </div> -->
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6"></div>
                                 <div class="col-md-6">
                                    <div class="col-md-3">
                                       <button class="btn btn-primary" type="reset">Discard</button>
                                    </div>
                                    <div class="col-md-3" style="margin-left: 20;">
                                       <button class="btn btn-primary" id="frwd_btn" type="submit">Create</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="create_test">
                           <form method="post" action="<?php echo base_url(); ?>employer/randomly_create_test">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group technical_id">                                       
                                       <label for="exampleInputEmail1">Test Name <span class="required">*</span></label>
                                       <input type="text" class="form-control" id="test_name" name="test_name">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group technical_id">                                       
                                       <label for="exampleInputEmail1">Duration <span class="required">*</span></label>
                                       <input type="Number" max="60" min="1" class="form-control" id="time" name="test_duration">
                                    </div>
                                 </div>
                                   <div class="col-md-4">
                                    <div class="form-group technical_id">
                                       <label for="exampleInputEmail1">Subject <span class="required">*</span></label>
                                       <select id="subject" name="technical_id" required class="form-control select2"  onchange="getTopicocean(this.value)">
                                          <option value="">Select Subject</option>
                                          <?php if (!empty($skill_master))
                                             foreach($skill_master as $skill) 
                                             {
                                             ?>   
                                          <option value="<?php echo $skill['id']; ?>"<?php if (!empty($edit_questionbank_info)) if($row['technical_id']==$skill['id'])echo "selected";?>><?php echo $skill['skill_name']; ?></option>
                                          <?php } ?>
                                       </select>
                                       <?php echo form_error('technical_id'); ?>   
                                    </div>
                                 </div>
                                 
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group topic_id">
                                       <label for="exampleInputEmail1">Main Topic <span class="required">*</span></label>
                                       <select id="topic_id_ocean" name="topic_id" class="form-control select2" onchange="getSubtopics(this.value)">
                                          <option value="">Select Topic</option>
                                          <!-- <option value="1">HTML 5</option>  -->
                                       </select>
                                       <?php echo form_error('topic_id'); ?>   
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group subtopic_id">
                                       <label for="exampleInputEmail1">Sub Topic <span class="required">*</span></label>
                                       <select id="subtopic_id_ocean" name="subtopic_id" class="form-control select2" >
                                       </select> <?php echo form_error('subtopic_id'); ?>   
                                    </div>
                                 </div>
                              
                                 <div class="col-md-4">
                                   <div class="form-group level">
                                     <label for="exampleInputEmail1">Level <span class="required">*</span></label>
                                       <select name="level" onchange="get_questuions();" id="level" class="form-control select2">                                     
                                         <option value="Expert"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Expert')echo "selected";?>>Expert</option>
                                         <option value="Medium"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Medium')echo "selected";?>>Medium</option>
                                         <option value="Beginner"<?php if (!empty($edit_questionbank_info)) if($row['level']=='Beginner')echo "selected";?>>Beginner</option>
                                       </select> <?php echo form_error('level'); ?>   
                                   </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                   <div class="form-group ques_type">
                                     <label for="exampleInputEmail1">Question Type <span class="required">*</span></label>
                                     <select name="ques_type" id="ques_type" class="form-control select2" type="text" onchange="get_questuions();">
                                       <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                                         <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                                         <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
                                     </select> <?php echo form_error('ques_type'); ?>   
                                   </div>
                                 </div>
                                 
                              </div>
                          
                               <div class="row">
                                 <div class="col-md-6"></div>
                                 <div class="col-md-6">
                                    <div class="col-md-3">
                                       <button class="btn btn-primary" type="reset">Discard</button>
                                    </div>
                                    <div class="col-md-3" style="margin-left: 20;">
                                       <button class="btn btn-primary" type="submit">Create</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
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
   <script>
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
});


</script>
   <script>
 function getTopic(id){
        if(id){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>employer/gettopic',
            data:{id:id},
            success:function(res){
              $('#topic_id').html(res);
            }
            
          }); 
          }
       }
       function getTopicocean(id){
        if(id){
          $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>employer/gettopic',
            data:{id:id},
            success:function(res){
              $('#topic_id_ocean').html(res);
            }
            
          }); 
          }
       }
       function getSubtopic(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id').html(res);
                }
                
            }); 
          }
   
    }
    function getSubtopics(id){
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>employer/getsubtopic',
                data:{id:id},
                success:function(res){
                    $('#subtopic_id_ocean').html(res);
                }
                
            }); 
          }
   
    }
  function get_total(){
    // if ($('#checkbox').is(':checked')) {
      // alert('ff');
      var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                   return this.getAttribute("data-valueone");
               }).get();
               var data_arr1= (checkedValsofname.join(","));
      
            // alert();
            var myNameArray =  data_arr1.split(',');
              // var sum = 0;
          var total_time = sum(myNameArray);

             $('#total_time').html(total_time+' seconds');
             $('#total_questions').html(myNameArray.length);

  }

  function get_questuions(job_id)
  {
   var subject = $('#subject').val();
   var topic_id = $('#topic_id').val();
   var subtopic_id = $('#subtopic_id').val();
   var ques_type = $('#ques_type').val();
   var level = $('#level').val();
    $.ajax({
              url: "<?php echo base_url();?>employer/get_test_questions",
              type: "POST",
              data: {subject:subject,topic_id:topic_id,subtopic_id:subtopic_id,ques_type:ques_type,level:level},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('tbody').html(data);
              }
        });
       
  }
   
  
     $(function(){
      var test_name = $('#test_name').val();
  $("#frwd_btn").on("click", function() {
    // if (confirm("Selected Rows will be updated in external tracker!!")) {
    //         var data = [];
            var checkedVals = $('.chkbx:checkbox:checked').map(function() {
                   return this.value;
               }).get();
               var data_arr= (checkedVals.join(","));
               $('#question_id').val(data_arr);

               var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                   return this.getAttribute("data-valueone");
               }).get();
               var data_arr1= (checkedValsofname.join(","));
      
            // alert();
            var myNameArray =  data_arr1.split(',');
              // var sum = 0;
          var total_time = sum(myNameArray);

            var level_val = $('')
             $('#test_time').val(total_time+' seconds');
             $('#level_data').val($('#level').val());
             $('#subject_data').val($('#subject').val());
             $('#type').val($('#ques_type').val());

             $('#timer_data').val($('input[name=timer]:checked').val());
             $('#previous_option_data').val($('input[name=previous_option]:checked').val());
             $('#review_option_data').val($('input[name=review_option]:checked').val());
             $('#negative_data').val($('input[name=negative]:checked').val());
             $('#each_question_ans_data').val($('input[name=each_question_ans]:checked').val());
             $('#display_result_data').val($('input[name=display_result]:checked').val());
              
                      if($('#js').valid()) 
                      {
                          $('#add_test').modal('show');


                      }


    
  });
});
function sum(input){
             
 if (toString.call(input) !== "[object Array]")
    return false;
      
            var total =  0;
            for(var i=0;i<input.length;i++)
              {                  
                if(isNaN(input[i])){
                continue;
                 }
                  total += Number(input[i]);
               }
             return total;
            }

  </script> 
<script>
   $('.select2').select2();
   </script>
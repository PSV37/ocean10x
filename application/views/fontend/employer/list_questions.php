<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">
<style>
  .required
   {
   color: red;
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
  .header-bookbank{margin-bottom:12px !important;}   
  button#question_add {
  background-color: #18c5bd;
  border: none;
  border-radius: 15px;
  width: auto;
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
  .btn-group-toggle {
  margin-left: 139px;
  }
  li.btn.btn-secondary.active {
  box-shadow: none;
  border: solid 2px #18c5bd;
  border-radius: 65px;
  min-width: 40%;
  width: auto;
  }
  li.btn.btn-secondary {
  width: 40%;
  }
  #qbottons
  {
  margin-right: 195px;
  float: right;
  }
  i.fa.fa-plus {
  padding: 2px;
  }
  .box-body {
  height: fit-content;
  }
  span.select2-selection.select2-selection--single {
  width: 180px;
  }
  .following-info {
  float:left;
  line-height:30px;
  margin-top:0px;
  margin-left:18px;
  }
  .following-info2 {
  margin-left: 270px;
  line-height: 30px;
  margin-top: 0px;
  margin-bottom: 15px;
  }.following-info3 {
  margin-left: 309px;
  line-height: 30px;
  margin-top: 0px;
  margin-bottom: 15px;
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
  width:150px;
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
  margin-left: 270px;
  line-height: 30px;
  margin-top: 0px;
  margin-bottom: 15px;
  }.following-info3 {
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
  margin-top: -133px;
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
  :root {
  --bg: #e3e4e8;
  --fg: #17181c;
  --bs1: #ffffff;
  --bs2: #c1c2c5;
  --tick: #454954;
  --transDur: 0.1s;
  font-size: calc(20px + (40 - 20)*(100vw - 320px)/(2560 - 320));
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
  /*.pie::after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: rgba(0,0,0,0.1);
  border-radius: 50%;
  box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
  margin: 220px auto;
  }*/
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
    margin-left: -31px;
    margin-top: 3px !important;
    list-style-type: none;
    padding: 0;
    /* margin: 0; */
    background: #FFF;
    padding: 15px;
    font-size: 13px;
    box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;
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
  a.myclass {
    font-weight: 600;
    /* float: right; */
    margin-right: 7px;
    /* width: 35px; */
}
.box:hover {
    background-color: #18c5bd;
     color: black; 
}
div#trash_append {
    margin-top: 40px;
}
.btn.btn-primary {
    /* float: right; */
    background-color: #18c5bd;
    border: none;
    border-radius: 35px;
    margin-top: 13px;
    font-size: 12px;
}
input.btn.btn-primary {
    margin-left: 90px;
    height: 28px;
    width: 65px;
    font-weight: 700;
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
</style>
<!---header-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<div class="container-fluid main-d">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <div class="col-md-6 question-bank">
        <div id="smsg"><?php echo $this->session->flashdata('success'); ?></div>
        <br><br>
        <!-- <div class="header-bookbank">
          Question Bank
          <a style="float: right;" href="<?php echo base_url(); ?>employer/add-question"><button type="button" id="question_add" class="btn btn-primary"><i class="fa fa-plus"> Add Question</i></button></a>
          </div> -->
        <ul id="myTabs" class="" role="tablist" data-tabs="tabs">
          <li class="btn btn-secondary <?php $submenu=$this->session->userdata('submenu'); $activemenu=$this->session->userdata('activemenu'); 
            if(isset($submenu) && !empty($submenu))
            {
             if($submenu == 'qbank') 
             { echo 'active'; }
             }else{  echo 'active'; } ?> "><a href="#qbank" data-toggle="tab">Question Bank</a></li>
          <li class="btn btn-secondary <?php $submenu=$this->session->userdata('submenu');  if(isset($submenu) && !empty($submenu)){if($submenu == '1' || $submenu == '2'   ) echo 'active'; } ?>"><a href="#Videos" data-toggle="tab">Test Bank</a></li>
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade <?php $submenu=$this->session->userdata('submenu');  if(isset($submenu) && !empty($submenu)){if($submenu == '1' || $submenu == '2'   ) echo 'in active'; } ?>" id="Videos">
            <div class="row" style="float: right;">
             
               <li class="btn btn-secondary Active"><a class="qntn"  href="<?php echo base_url(); ?>employer/choose_questions"><i class="fa fa-plus"> </i> I will select the Questions</a></li>
             
                <li class="btn btn-secondary Active"><a class="qntn" href="<?php echo base_url(); ?>employer/choose_questions/1">
                <i class="fa fa-plus"> </i>  Ocean can select Questions
               </a></li>
              <!-- </div> -->
            </div>
            <div class="row">
              <!-- <div class="btn-group-toggle" data-toggle="buttons" >
                <a href="#add_test" data-toggle="tab"><label class="btn btn-secondary active">
                <input type="radio" name="options" id="option1" autocomplete="off"  style="display: none;">I want to choose My Questions in the Test !
                </label></a>
                <a href="#create_test" data-toggle="tab"><label class="btn btn-secondary">
                <input type="radio" name="options" id="option2" autocomplete="off" style="display: none;"> Ocean can help me create the Test !
                </label></a>
                </div> -->
            </div>
           
               
             
                
                <div class="row">
                  <div class="box" >
                    <?php $key = 1; if (!empty($ocean_tests)): foreach ($ocean_tests as $tests) : 
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
                            <?php  
                    $test_id =$tests['test_id'];
                    $employer_id = $this->session->userdata('company_profile_id');
                    $where="oceanchamp_tests.test_id ='$test_id' and oceanchamp_tests.company_id = '$employer_id' ";
                    $join = array('forwarded_tests'=>'forwarded_tests.test_id = oceanchamp_tests.test_id |Left OUTER',
                      'job_posting'=>'job_posting.test_for_job = oceanchamp_tests.test_id |Left OUTER',
                      'company_profile'=>'company_profile.company_profile_id = oceanchamp_tests.company_id |Left OUTER','js_info'=>'js_info.job_seeker_id = forwarded_tests.job_seeker_id |LEFT OUTER');
                    $jobs_data = $this->Master_model->getMaster('oceanchamp_tests', $where , $join, $order = 'desc', $field = 'date', $select = '*,IFNULL(forwarded_tests.updated_on, job_posting.update_at) AS date',$limit=false,$start=false, $search=false); 
                      if (!empty($jobs_data[0]['job_title'] || !empty($jobs_data[0]['email']))) { ?>
                        <span data-toggle="collapse" data-target="#collapseEx<?php echo $tests['test_id']?>" aria-expanded="false" aria-controls="collapseEx" style="color: red;font-size: 25px;margin-left: 38px;" title="Click to see the Jobs Forwarded" class="required"> * </span>
                        <div class="collapse" id="collapseEx<?php echo $tests['test_id']?>">
                      <div class="card-body">
                      <?php $i=1; if (!empty($jobs_data)) {
                        // print_r($jobs_data);
                        foreach ($jobs_data as $row) {

                          if (isset($row['job_title'])) { ?>
                             <p><?php echo $i; ?>.Attached to Job Post - <?php echo $row['job_title']; ?> - <?php echo date('d-m-y H:i',strtotime($row['date'])) ; ?>  </p>
                        <?php  }elseif(!empty($row['email']))
                        { ?>
                          <p><?php echo $i; ?>. Forwarded to - <?php echo $row['email']; ?>- <?php echo date('d-m-y H:i',strtotime($row['date'])) ; ?>   </p>
                       <?php  }
                         ?>

                       

                            <?php $i++;  } }  ?>
                        
                      </div>
                      </div>
                     <?php  }
                    ?>
                          <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:47px;">
                            <li ><a class="dropdown-item" href="#" id="div_frwrd" data-toggle="modal" data-target="#oceanModal<?php echo $tests['test_id'] ?>" >Forward This Test</a></li>
                            <li ><a class="dropdown-item" href="#" id="attach_to_job" data-toggle="modal" data-target="#ocean_attach_to_job<?php echo $tests['test_id'] ?>" >Attach To Job Post</a></li>
                            <li> <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#ocean_edit_test<?php echo $tests['test_id'] ?>" >Edit Test Parameters</a></li>
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
          <!-- </div> -->
          <div role="tabpanel" class="tab-pane fade <?php $submenu=$this->session->userdata('submenu'); $activemenu=$this->session->userdata('activemenu'); 
            if(isset($submenu) && !empty($submenu))
            {
             if($submenu == 'qbank') 
             { echo 'in active'; }
             }else{  echo 'in active'; } ?> " id="qbank">
             <div class="row">
               <div class="col-md-6">
                  <form class="navbar-form" role="search">
                    
                     <input type="text" id="myInput" class="form-control" placeholder="Subject | Topic | Answer Time" style="width: 100%">
                    
                  </form>
                  <div class="clear"></div>
               </div>
              <div class="col-md-3">
               <a href="#"  onclick="get_trash();"><button style="    margin-left: 60px;" class="btn btn-primary"><i class="fas fa-trash-alt" ></i> Trash</button></a>
              </div>
               <div class="col-md-3">
              
               <a id="qbottons" href="<?php echo base_url(); ?>employer/add-question"><button type="button" id="question_add" class="btn btn-primary"><i class="fa fa-plus"> </i>Add Question</button></a>
            </div>
          </div>
            <br>
            <a id="qbottons" style="margin-top: -25px;" href="#"data-toggle="modal" data-keyboard="true"  data-target="#bulkupload"><i class="fa fa-plus" > </i>Bulk Upload Questions</a>
            <div class="select-option">
              <!--<p style="FONT-SIZE: 12PX;COLOR: #0a5854;">Total No. Of Question:<?php echo $total_question; ?></p>-->
              <div class="col-md-4">
            <form method="post" action="<?php echo base_url(); ?>employer/all_questions">
              <label class="dropdown">
                <div class="dd-button" onclick="myFunction2(event)">
                  Sort by
                </div>
                <input type="checkbox" class="dd-input" id="test">
                <ul id="sizelist" class="dd-menu">
                  <li data-value="skill_name" ><a href="#">Subject</a></li>
                  <li data-value="level"><a href="#">Level</a></li>
                  <li data-value="time_for_question"><a href="#">Time</a></li>
                  <li data-value="topic_name"><a href="#">Topics</a></li>
                </ul>
              </label>
              <input id="sizevalue" value="<?php if(isset($sort))
              {echo $sort; } ?>" size="15" name="sort_val" type="hidden" />
              <button type="submit" name="sort" class="hidden" id="sort_btn"></button>
            </form>
          </div>
              <!-- <label class="dropdown">
                <div class="dd-button" onclick="myFunction(event)">
                  Filter
                </div>
                <input type="checkbox" class="dd-input" id="test">
                <ul class="dd-menu">
                  <li>Subject</li>
                  <li>Level</li>
                  <li>Time</li>
                  <li>Topics</li>
                </ul>
              </label> -->
              <label style=" width: 86px;float: right;">
              <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
              <span>Select all</span>
              </label>
            </div>
            <div id="trash_append">
              <?php $key = 1; if (!empty($questionbank)): foreach ($questionbank as $ct_row) : ?>
              <div class="question-box content">
                <div class="border-top"></div>
                <div class="panel-heading">
                  <img src="https://blog.oxiane.com/wp-content/uploads/2017/04/java-logo-oracle.png" class="logo-subject" />
                  <li><span style="color:#949694;float:left;width:150px;"><?php echo $ct_row['skill_name'] ?>(<?php echo $ct_row['topic_name'] ?>)</span></li>
                  <li><span style="color:#949694;">subtopic&nbsp;:<?php echo $ct_row['subtopic_name'] ?></span></li>
                  <li style="float: right;"><span style="color:#949694;"><b>Time</b>&nbsp;:<?php echo $ct_row['time_for_question'] ?> sec</span></li>
                  <li><span style="color:#949694;float:left;width:150px;"><?php echo $ct_row['title'] ?></span></li>
                  <li><span style="color:#949694;"><?php echo $ct_row['titles'] ?></span></li>
                  <div class="a">
                    <p class="question">
                      <?php echo $ct_row['question'] ?>
                    </p>
                  </div>
                </div>
                <!--.panel-heading-->
                <div class = "panel-body">
                  <ul class = "list-group">
                    <div class="col-md-12" style="margin-left: -27px;">
                      <div class="optionbox-1 col-md-3">
                        <li class = "list-group-item">
                          <div class="checkbox">
                            <input type="checkbox" id="checkbox"  />
                            <label for="checkbox">
                            <?php echo $ct_row['option1'] ?>
                            </label>
                          </div>
                        </li>
                        <li class = "list-group-item" >
                          <div class="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">
                            <?php echo $ct_row['option2'] ?>
                            </label>
                          </div>
                        </li>
                      </div>
                      <div class="optionbox-2 col-md-3">
                        <li class = "list-group-item">
                          <div class="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">
                            <?php echo $ct_row['option3'] ?>
                            </label>
                          </div>
                        </li>
                        <li class = "list-group-item">
                          <div class="checkbox">
                            <input type="checkbox" id="checkbox" />
                            <label for="checkbox">
                            <?php echo $ct_row['option4'] ?>
                            </label>
                          </div>
                        </li>
                      </div>
                    </div>
                  </ul>
                </div>
                <br>
                <p>
                  <a class="toggle btn " href="#example<?php echo $ct_row['question_id'] ?>">show answer</a>
                </p>
                <div class="toggle-content" id="example<?php echo $ct_row['question_id'] ?>">
                  <?php echo 'option'.$ct_row['answer_id'] .': '. $ct_row['option'.$ct_row['answer_id']] ?>
                </div>
                <div class="btn-group">
                  <a href=" <?php echo base_url('employer/edit_questionbank/' . $ct_row['ques_id']); ?>"><i class="far fa-edit icon_backg"></i></a>

                  <a  onclick="confirm_delete(<?php echo $ct_row['ques_id']; ?>);" href="#"><i class="fas fa-trash-alt icon_backg"></i></a>
                </div>
              </div>
              <?php
                $key++;
                endforeach;
                ?>
              <?php else : ?> 
              <div colspan="3">
                <strong>There is no record for display</strong>
              </div>
              <?php
                endif; ?>
              <div class=""></div>
              <div class="container-fluid">
             <div class="col-md-6"></div>
            <div class="col-md-6">
            <span><?php echo $links; ?></span>   
            </div>
               
          </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="last_section">
          <div class="pai_chart">
            <main>
              <section>
                <ul class="pieID legend">
                   <li class="cv">
                  <em id="spanid1">Questions in Q Bank</em>
                  <span><?php echo $Total_questions_in_q_bank; ?></span>
                </li>
                <li class="cv">
                  <em id="spanid2">Appeared in Test Papers</em>

                  <span id="active_cv"><?php echo $Appeared_in_test_papers[0]['TOTAL']; ?></span>
                </li>
                
                <div class="pieID pie">
                </div>
               
                  <li>
                    <em id="spanid0">Total Questions</em>
                    <span><?php echo $total_question; ?></span>
                    <!--<span>718</span> -->
                  </li>
                  <!--<li>
                    <em id="spanid0">Total Active Job Posts</em>
                    <span><?php echo sizeof($company_active_jobs); ?></span>
                    
                  </li>-->
                  <li>
                    <em id="spanid1">Appeared in Test Papers</em>
                    <span id='appeared_in_test_paper'> </span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid2">Not Appeared in Test Papers</em>
                    <span id='not_appeared_in_test_papers'> </span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid3">Expert Level </em> 
                    <span id='expert_level'> </span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid4">Medium Level</em>
                    <span id='Medium_level'></span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid5">Beginners Level</em> 
                    <span id='Beginners_level'></span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid6">Attempted</em>
                    <span id='attempted'></span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid7">Answered Correctly</em>
                    <span id='answered_correctly'></span>
                    <!--<span> 50 </span>-->
                  </li>
                  <li>
                    <em id="spanid8">Answered Wrongly </em>
                    <span id='answered_wrongly'></span>
                    <!--<span> 50 </span>-->
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
                  <span class="clickable filter" data-toggle="tooltip"  data-container="body">
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
<?php $key = 1; if (!empty($oceanchamp_tests)): foreach ($oceanchamp_tests as $tests) : ?>
<div class="modal" id="rotateModal<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Test</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/forword_test" class="sendEmail" method="post" autocomplete="off">
        <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
        <div class="modal-body" style="padding:15px 40px;">
          <input type="hidden" name="consultant" value="JobSeeker">  
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">E-mail</label>
            <input type="email"  name="candiate_email"  id="email1" placeholder="Enter comma seperated Emails"  id="subject" data-required="true" multiple style="display: inline-block;width: 100%;" required>
          </div>
          <input type="hidden" name="job_post_id" value="" id="auto-value">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">Message:</label>
            <textarea class="form-control" name="message" rows="5" id="comment" value="" required>Hello ,

Please take this test as per the instructions given. 

Good Luck !

Warm Regards,

<?php echo $this->session->userdata('company_name'); ?>
Company Name
</textarea>
          </div>
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-save">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="attach_to_job<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Attach This Test To Job</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/attach_to_job" class="sendEmail" method="post" autocomplete="off">
        <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
        <div class="modal-body" style="padding:15px 40px;">
          <input type="hidden" name="consultant" value="JobSeeker">  
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">Active Job:</label>
            <select class="form-control select2" name="job_id">
              <?php foreach ($company_active_jobs as $row) { ?>
              <option value="<?php echo $row->job_post_id ?>"><?php echo $row->job_title ?></option>
              <?php } ?>
            </select>
          </div>
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-save">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="edit_test<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Change Test Parameters</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/update_test" class="sendEmail" method="post" autocomplete="off">
        <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
        <div class="modal-body" style="padding:15px 40px;">
          <div class="col-md-6">
            <div class="form-group ques_type">
              <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
              <select name="ques_type" id="ques_type" class="form-control select2" type="text" onchange="get_questuions();">
                <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
              </select>
              <?php echo form_error('ques_type'); ?>   
            </div>
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-4">
            <div class="form-group timer">
              <label for="male">Timer On each Question</label><br>
              <label class="radio-inline" >
              <input type="radio" name="timer" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="timer" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group previous_option">
              <label for="male">Allowed to Go back</label><br>
              <label class="radio-inline">
              <input type="radio" name="previous_option"  style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="previous_option" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group review_option">
              <label for="male">Allowed to Review</label><br>
              <label class="radio-inline">
              <input type="radio" name="review_option" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="review_option" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group negative">
              <label for="male">Negative Marking</label><br>
              <label class="radio-inline">
              <input type="radio" name="negative" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="negative" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group each_question_ans">
              <label for="male">Display Correct Answer for each Question</label><br>
              <label class="radio-inline">
              <input type="radio" name="each_question_ans" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="each_question_ans" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group display_result">
              <label for="male">Display Test Result to Candidate</label><br>
              <label class="radio-inline">
              <input type="radio" name="display_result" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="display_result" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <input type="hidden" name="job_post_id" value="" id="auto-value">
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer"  style="    margin-top: 340px;">
          <button type="submit" class="btn btn-save">update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  endforeach;endif;?>
<?php $key = 1; if (!empty($ocean_tests)): foreach ($ocean_tests as $tests) : ?>
<div class="modal" id="oceanModal<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Test</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/forword_test" class="sendEmail" method="post" autocomplete="off">
        <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
        <div class="modal-body" style="padding:15px 40px;">
          <input type="hidden" name="consultant" value="JobSeeker">  
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">E-mail</label>
            <input type="email"  name="candiate_email"  id="email" placeholder="Enter comma seperated Emails"  id="subject" data-required="true" multiple style="display: inline-block;width: 100%;" required>
          </div>
          <input type="hidden" name="job_post_id" value="" id="auto-value">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">Message:</label>
            <textarea class="form-control" name="message" rows="5" id="comment" value="" required>Hello ,

Please take this test as per the instructions given. 

Good Luck !

Warm Regards,

<?php echo $this->session->userdata('company_name'); ?>
Company Name</textarea>
          </div>
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-save">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="ocean_attach_to_job<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Attach This Test To Job</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/attach_to_job" class="sendEmail" method="post" autocomplete="off">
        <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
        <div class="modal-body" style="padding:15px 40px;">
          <input type="hidden" name="consultant" value="JobSeeker">  
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">Active Job:</label>
            <select class="form-control select2" name="job_id">
              <?php foreach ($company_active_jobs as $row) { ?>
              <option value="<?php echo $row->job_post_id ?>"><?php echo $row->job_title ?></option>
              <?php } ?>
            </select>
          </div>
          <input type="hidden" name="job_post_id" value="" id="auto-value">
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-save">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="ocean_edit_test<?php echo $tests['test_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Change Test Parameters</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/update_test" class="sendEmail" method="post" autocomplete="off">
        <input type="hidden" name="test_id" id="test_id" value="<?php echo $tests['test_id']; ?>">
        <div class="modal-body" style="padding:15px 40px;">
          <div class="col-md-6">
            <div class="form-group ques_type">
              <label for="exampleInputEmail1">Question Type<span class="required">*</span></label>
              <select name="ques_type" id="ques_type" class="form-control select2" type="text" onchange="get_questuions();">
                <option value="MCQ"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='MCQ')echo "selected";?>>MCQ</option>
                <option value="Subjective"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Subjective')echo "selected";?>>Subjective</option>
                <option value="Practical"<?php if (!empty($edit_questionbank_info)) if($row['ques_type']=='Practical')echo "selected";?>>Practical</option>
              </select>
              <?php echo form_error('ques_type'); ?>   
            </div>
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-4">
            <div class="form-group timer">
              <label for="male">Timer On each Question</label><br>
              <label class="radio-inline" >
              <input type="radio" name="timer" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="timer" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group previous_option">
              <label for="male">Allowed to Go back</label><br>
              <label class="radio-inline">
              <input type="radio" name="previous_option"  style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="previous_option" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group review_option">
              <label for="male">Allowed to Review</label><br>
              <label class="radio-inline">
              <input type="radio" name="review_option" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="review_option" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group negative">
              <label for="male">Negative Marking</label><br>
              <label class="radio-inline">
              <input type="radio" name="negative" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="negative" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group each_question_ans">
              <label for="male">Display Correct Answer for each Question</label><br>
              <label class="radio-inline">
              <input type="radio" name="each_question_ans" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="each_question_ans" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group display_result">
              <label for="male">Display Test Result to Candidate</label><br>
              <label class="radio-inline">
              <input type="radio" name="display_result" style=" margin-right: 11px;" value="Y" checked> Yes
              </label>
              <label class="radio-inline">
              <input type="radio" name="display_result" value="N" style="margin-left: -30px;">No
              </label>
            </div>
          </div>
          <input type="hidden" name="job_post_id" value="" id="auto-value">
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer"  style="    margin-top: 340px;">
          <button type="submit" class="btn btn-save">update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  endforeach;endif;?>
  <div class="modal fade" id="delete" tabindex='-1' role="dialog">
    <div class="modal-dialog">
       <form method="post" id="del_modal" action=""> 
      
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Are you sure want to Delete This ?</h4>
        </div>
       
        <div class="modal-footer">
         <button type="submit" class="btn btn-default" > Ok </button>
          <button type="button" class="btn btn-default1 active_modal" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  <div class="modal fade" id="bulkupload" tabindex='-1' role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url();?>employer/questionbank-import" enctype="multipart/form-data">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Bulk Upload CV</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!-- <label class="mdl-textfield__label" for="sample3">Folder Name:</label> -->
                <small>To Import Question's Download Question Format 
                  <a href="<?php echo base_url(); ?>questionimportpattarn/Questionbank_pattern.csv" download="Questionbank_pattern.csv">
                
                    <strong>Click here To Download</strong></a></small>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input type='file' name='file' required class="form-control" >
              </div>
            </div>
          </div>
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" name='upload' class="btn btn-default">Upload Now</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
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
  $(document).ready (function(){
    $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
    $("#smsg").slideUp(500);
    });   
  });
  $('#myInput').focus(function(){
   $(this).data('placeholder',$(this).attr('placeholder'))
        .attr('placeholder','');
   }).blur(function(){
   $(this).attr('placeholder',$(this).data('placeholder'));
   });
  function confirm_delete(id)
  {
    var newUrl = '<?php echo base_url(); ?>employer/delete_questionbank/'+id;
    console.log(newUrl);
    console.log(id);
    $('#del_modal').prop('action',newUrl);
    $('#delete').modal("show");
  }
  window.onclick = function(event) {
  if ($('#test1').is(":checked")) 
  {
  $('#test1').click();
  }
  if ($('#test').is(":checked")) 
  {
  $('#test').click();
  }
  
  }
  $(document).keyup(function(e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`
     // alert('dd');
     
        if ($('#test').is(":checked")) 
        {
           $('#test').click();
        }
   }
  });
  function get_trash()
  {
  $.ajax({
               type:'POST',
              url:'<?php echo base_url();?>Employer/trash_cv',
              data:{type:'qbqnk'},
              success:function(res){
                  $('#trash_append').html(res);
                  // $('#company_pincode').val('');
              }
           })
  }
</script>
<script>
   $("#email").autocomplete({
             
             source: "<?php echo base_url();?>Employer/get_company_by_email",
             minLength: 2,
              // append: "#rotateModal",
            
    
            
           });
   $("#email1").autocomplete({
             
             source: "<?php echo base_url();?>Employer/get_company_by_email",
             minLength: 2,
              // append: "#rotateModal",
            
    
            
           });
   
</script>
<script>
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
  $(this).closest(".select2-container").siblings('select:enabled').select2('open');
  });
  
  
</script>
<script>
  // Show an element
  var show = function (elem) {
  
   // Get the natural height of the element
   var getHeight = function () {
     elem.style.display = 'block'; // Make it visible
     var height = elem.scrollHeight + 'px'; // Get it's height
     elem.style.display = ''; //  Hide it again
     return height;
   };
  
   var height = getHeight(); // Get the natural height
   elem.classList.add('is-visible'); // Make the element visible
   elem.style.height = height; // Update the max-height
  
   // Once the transition is complete, remove the inline max-height so the content can scale responsively
   window.setTimeout(function () {
     elem.style.height = '';
   }, 350);
  
  };
  
  // Hide an element
  var hide = function (elem) {
  
   // Give the element a height to change from
   elem.style.height = elem.scrollHeight + 'px';
  
   // Set the height back to 0
   window.setTimeout(function () {
     elem.style.height = '0';
   }, 1);
  
   // When the transition is complete, hide it
   window.setTimeout(function () {
     elem.classList.remove('is-visible');
   }, 350);
  
  };
  
  // Toggle element visibility
  var toggle = function (elem, timing) {
  
   // If the element is visible, hide it
   if (elem.classList.contains('is-visible')) {
     hide(elem);
     return;
   }
  
   // Otherwise, show it
   show(elem);
   
  };
  
  // Listen for click events
  document.addEventListener('click', function (event) {
  
   // Make sure clicked element is our toggle
   if (!event.target.classList.contains('toggle')) return;
  
   // Prevent default link behavior
   event.preventDefault();
  
   // Get the content
   var content = document.querySelector(event.target.hash);
   if (!content) return;
  
   // Toggle the content
   toggle(content);
  
  }, false);
</script>
<script>
  function getTopic(id){
         if(id){
           $.ajax({
             type:'POST',
             url:'<?php echo base_url();?>employer/gettopic',
             data:{id:id},
             success:function(res){
                if (res.length == 1) 
                {
                   $('#topic_id').attr('disabled', true);
                   $('#subtopic_id').attr('disabled', true);
  
                }
                else
                {
                  $('#topic_id').html(res);
                }
             }
             
           }); 
           }
           get_questuions();
        }
        function getTopicocean(id){
         if(id){
           $.ajax({
             type:'POST',
             url:'<?php echo base_url();?>employer/gettopic',
             data:{id:id},
             success:function(res){
                 if (res.length == 1) 
                {
                   $('#topic_id_ocean').attr('disabled', true);
                   $('#subtopic_id_ocean').attr('disabled', true);
  
                }
                else
                {
                  $('#topic_id_ocean').html(res);
                }
             
             }
             
           }); 
           }
           get_questuions();
  
        }
        function getSubtopic(id){
         if(id){
             $.ajax({
                 type:'POST',
                 url:'<?php echo base_url();?>employer/getsubtopic',
                 data:{id:id},
                 success:function(res){
                   if (res.length == 1) 
                {
                   
                   $('#subtopic_id').attr('disabled', true);
  
                }
                else
                {
                  $('#subtopic_id').html(res);
                }
                   
                 }
                 
             }); 
           }
           get_questuions();
       
     }
     function getSubtopics(id){
         if(id){
             $.ajax({
                 type:'POST',
                 url:'<?php echo base_url();?>employer/getsubtopic',
                 data:{id:id},
                 success:function(res){
                    if (res.length == 1) 
                {
                   
                   $('#subtopic_id_ocean').attr('disabled', true);
  
                }
                else
                {
                  $('#subtopic_id_ocean').html(res);
                }
                    
                 }
                 
             }); 
           }
           get_questuions();
    
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
      iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount, color);
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
      "purple", 
      "turquoise", 
      "forestgreen", 
      "navy", 
      "gray",
      "#6fc6ef",
      "#e7d712",
      "#fb0097"
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
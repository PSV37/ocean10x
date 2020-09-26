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
  width:120px;
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
    float: left;
    line-height: 30px;
    margin-top: 7px;
    margin-left: 40px;
}
  .following-info2 {
  margin-left:309px;
  line-height:30px;
  margin-top:7px;
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
  .check {
  right: 55px;
  z-index: 999;
  margin-top: 5px;
  position: absolute;
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
    margin-bottom: 20px;
    margin-top: 20px;
    margin-left: -15px;
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
  margin-left:31px;
  margin-top:30px !important;
  list-style-type: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  padding: 15px;
  font-size: 13px;
  /*box-shadow: 1px 1px 0 #DDD,
  2px 2px 0 #BBB;*/
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
  margin-left: -7px;
  }
  button.reset_filter:hover {
  background-color:#15a8a1;
  }
  .range-wrap {
  position: relative;
  margin: 0 auto 2rem;
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
  input{padding:7px 0px;}
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
  select#education_id {
  background-color: #18c5bd;
  border-radius: 4px;
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
  input.btn-default1 {
  position: absolute;
  display: none;
  }
  .btn-default1:not(:checked) + span {
  padding: 4px 15px;
  border-radius: 30px;
  background: #d5e9f7;
  width: 100%;
  border-radius: 30px;
  cursor: pointer;
  display: inline-block;
  font-size: 12px;
  color: black; 
  line-height: 20px;
  }
  :checked + span {
  background: #18c5bd !important;
  display: inline-block; */
  width: 100%; 
  color: #fff; 
  padding: 4px 15px;
  border-radius: 30px; 
  cursor: pointer;
  font-size: 12px;
  line-height: 20px;
  box-shadow: 1px 1px 6px #cccbcb;
  }
  .show {
  display: block !important;
  background-color: yellow;
  }
  button#sklbtn {
  background-color: #18c5bd;
  color: #ffffff;
  border-radius: 20px;
  border: none;
  padding: 1px 10px;
  margin-bottom: 7px;
  font-size: 11px;
  }
  .dropdown-menu li {
  font-size: 11px;
  padding: 5px 0px;
  cursor: pointer;
  }
  .icon_backg {
  background-color: #18c5bd;
  padding: 12px;
  border-radius: 34px;
  color: #fff;
  cursor: pointer;
  }
  .btn-group {
  float: right;
  }
  form.navbar-form {
  margin-top: 0px;
  padding: 0;
  }
  a.myclass {
  font-weight: 600;
  /* float: right; */
  margin-right: 5px;
  /* width: 35px; */
  }
  button.btn.btn-primary.trash {
    background-color: #18c5bd;
    width: 85px;
    /* border: none; */
    margin-top: 0px;
    margin-left: 2px;
    /* border-radius: 128px; */
}
ul.select2-results__options {
    margin-top: 30px;
}
button.folder_popup {
    float: right;
    margin-right: 20px;
    background-color: #18c5bd;
    color: #fff;
    border: none;
    border-radius: 10px;
    width: 120px;
    height: 25px;
}
.highlight_div {
    /* border: 1px solid; */
    padding: 5px;
    box-shadow: 5px 5px #e8e5e5;
    border-radius: 25px;
}
ul#sizelist {
    margin-left: 19px;
}
.email_top {
    font-size: 14px;
    font-weight: 600;
    margin-left: -261px;
    width: fit-content;
    margin-top: 25px;
    color: blue;
}
span.right-side {
    display: table-cell;
    padding-left: 10px;
    padding-top: -32px;
}
.skl_bnft {
    display: inline-flex;
    margin-left: 39px;
}
</style>
<div class="container-fluid main-d">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <div class="col-md-6 cv_bank">
        <div id="smsg">
          <?php echo $this->session->flashdata('success'); ?>
        </div>
        <div class="row">
          <div class="col-md-6">
            <form class="navbar-form" role="search">
              <input type="text" id="myInput" class="form-control" placeholder=" Email / Name / Contact" style="width: 100%"><span class="fa fa-search form-control-feedback"style="margin-right: 17px;
    margin-top: 10px;"></span>
            </form>
            <div class="clear"></div>
          </div>
          <div class="col-md-6">
            <a href="#" style="float: right;margin-right: 34px;background-color: #18c5bd;border-radius: 30px;" onclick="get_trash();"><button class="btn btn-primary trash" ><i class="fas fa-trash-alt" aria-hidden="true"></i> Trash <?php if (!empty($cv_trash_data)) {
              echo "(".sizeof($cv_trash_data).")";
            } ?></button></a>
            <button class="folder_popup"  data-toggle="modal" data-keyboard="true" data-target="#myModal_add" style="float: right;margin-right: 20px;"><i class="fas fa-folder-open"></i> New Folder </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <label class="dropdown bulkdropdown" style="float:left;">
              <div class="dd-button"  onclick="myFunction(event)">
                Bulk Action
              </div>
              <input type="checkbox" class="dd-input" id="test1">
              <ul id="myDropdown"  class="dd-menu">
                <li> <a href="#" id="frwd_btn" data-keyboard="true" onclick="frwd_post();">Forward Job Post</a></li>
                 <li> <a href="#" id="frwd_btn" onclick="frwd_cv();" data-toggle="modal" data-keyboard="true"  data-target="#forward_cv">Forward CVs</a></li>
                <li> <a href="#" id="frwd_btn" data-keyboard="true" onclick="copy_cvs();">Copy CVs</a></li>
                <li> <a href="#" id="frwd_btn" data-keyboard="true" onclick="download_cvs();">Download CVs</a></li>
                <li> <a href="#" id="frwd_btn" data-toggle="modal" data-keyboard="true"  data-target="#bulkupload">Bulk Upload CVs</a></li>
                <li> <a href="#" id="frwd_btn" data-toggle="modal" data-keyboard="true" data-target="#bulkupload_folder">Upload Folder & Contents</a></li>
                <li> <a href="#" id="frwd_btn" data-keyboard="true" onclick="update_cvs();">Sync with Ocean</a></li>
                
                
                
              </ul>
            </label>
            <div class="clear"></div>
          </div>
          <div class="col-md-4">
            <form method="post" action="<?php echo base_url(); ?>employer/corporate_cv_bank/<?php if(!empty($fid)){ echo $fid;} ?>">
              <label class="dropdown">
                <div class="dd-button" onclick="myFunction2(event)">
                  Sort by
                </div>
                <input type="checkbox" class="dd-input" id="test">
                <ul id="sizelist" class="dd-menu">
                  <li data-value="js_name" ><a href="#">Name</a></li>
                  <li data-value="js_experience"><a href="#">Experience</a></li>
                  <li data-value="js_top_education"><a href="#">Education</a></li>
                </ul>
              </label>
              <input id="sizevalue" value="<?php if(isset($sort))
              {echo $sort; } ?>" size="15" name="sort_val" type="hidden" />
              <button type="submit" name="sort" class="hidden" id="sort_btn"></button>
            </form>
          </div>
          <div class="col-md-4">
            <a href="<?php echo base_url() ?>employer/add_new_cv<?php if(!empty($fid)){echo '?fid='.$fid;} ?>"><button class="btn btn-primary"><i class="fas fa-plus"></i> New CV</button></a>
          </div>
        </div>
        <!--  <div class="row"  id="bulk">
          </div> -->
        <div class="row" id="bulk">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
            <label style="float: right;">
            <input type="checkbox" class="btn-default1 checkbox" name="check_all" id="checkAllchk" >
            <span id="check_txt">Select all</span>
            </label>
          </div>
        </div>
        <div class="box" id="trash_box" >
          <?php $key = 1; if (!empty($cv_bank_data)): foreach ($cv_bank_data as $cv_row) : 
            $on_ocean = $cv_row['ocean_candidate'];
                  if($on_ocean == 'Yes')
                  {
                     $resume = getUploadedResume($cv_row['js_email']);
                     $photo = getSeekerPhoto($cv_row['js_email']);
                     $updates = getSeekerlastUpdates($cv_row['js_email']);
                     if (!empty($updates)) {
                       if($updates[0]['update_at']=='0000-00-00 00:00:00') { 
                         $mtime = date('d-M-y',strtotime($updates[0]['create_at']));
                       } else{
                         $mtime = date('d-M-y',strtotime($updates[0]['update_at']));
                       }
                     }else{
                       $mtime = date('d-M-y',strtotime($cv_row['created_on']));
                     }
                  }else{
                   $mtime = date('d-M-y',strtotime($cv_row['created_on']));
                  }
                 
                 ?>
          <label class="checkbox_label">
            <div class="check">
              <input type="checkbox" value="<?php echo $cv_row['js_email']; ?>" data-valuetwo="<?php echo $cv_row['cv_id'];  ?>" data-valueone="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo $cv_row['js_resume']; } ?>" class="chkbx" id="chkbx" />
            </div>
            <div class="card content hoverable">
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
                  <div class="a" style="display: inline-flex;">
                    <li class="right-title" style="font-size:19px;margin-top:-4px;"  ><a href="<?php echo base_url(); ?>employer/preview_cv/<?php echo base64_encode($cv_row['cv_id']); ?>" style="color: black;cursor: pointer;" ><?php echo $cv_row['js_name']; ?></a></li><br>
                    <li class="right-title email_top" ><?php echo $cv_row['js_email']; ?></li>
                    
                  </div>
                </div>
                <div class="following-info">
                  
                  <li class="left-title">Current Sal</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_current_ctc']; ?></li>
                  <li class="left-title">Phone</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_mobile']; ?></li>
                  <li class="left-title">Education</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['education_level_name']; ?></li>
                   <li class="left-title">Current Location</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['js_current_work_location']; ?></li>
                  <div class="clear"></div>
                </div>
                <div class="following-info2">
                
                <li class="left-title">Proposed Interview</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php if ($cv_row['js_proposed_interview_date']!='0000-00-00' || !empty($cv_row['js_proposed_interview_date'])) {
                    echo date('j M Y',strtotime($cv_row['js_proposed_interview_date'])); 
                  }
                   ?></li>
                  <li class="left-title">Notice Period </li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_current_notice_period']; ?></li>
                  <li class="left-title">Work Exp</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span> <?php echo $cv_row['js_experience']; ?></li>
                  <li class="left-title">Designation</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['js_current_designation']; ?></li>
                  <li class="left-title">SkypeID</li>
                  <li class="right-title"><span style="color: blue;margin-right: 7px;">:</span><?php echo $cv_row['skypeid']; ?></li>
                  <div class="clear"></div>
                </div>
                 <div class="skl_bnft">
                <span style="width: 100px;">Skill Set</span> 
                 <span class="right-side">
                <?php
                  $skills = explode(',', $cv_row['js_skill_set']) ;
                  if(!empty($cv_row['js_skill_set'])){ 
                  foreach($skills as $skill_row){ ?>
                <lable class=""><button id="sklbtn"><?php echo  $skill_row;?></button></lable>
                <?php }
                  }   ?>
                </span>
                </div>
                <br>
                <hr>
                <?php  
                    $cv_id =$cv_row['cv_id'];
                    $where="forwarded_jobs_cv.cv_id ='$cv_id'";
                    $join = array('job_posting'=>'job_posting.job_post_id = forwarded_jobs_cv.job_post_id');
                    $jobs_data = $this->Master_model->getMaster('forwarded_jobs_cv', $where , $join, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false); 
                      if (!empty($jobs_data)) { ?>
                       <span data-toggle="collapse" data-target="#collapseEx<?php echo $cv_row['cv_id']?>" aria-expanded="false" aria-controls="collapseEx" style="color: red;font-size: 25px;margin-left: 38px;" title="Click to see the Jobs Forwarded" class="required"> * </span>
                       <div class="collapse" id="collapseEx<?php echo $cv_row['cv_id']?>">
                      <div class="card-body">
                      <?php $i=1; if (!empty($jobs_data)) {
                            foreach ($jobs_data as $row) { ?>
                               <p><?php echo $i; ?>.  <?php echo $row['job_title']; ?> - Job Post sent on <?php echo date('d-m-y H:i',strtotime($row['created_on'])) ; ?>

                            <?php $i++;  } } ?>
                      </div>
                      </div>
                     <?php  }
                    ?>
                    <?php if ($cv_row['forwarded_cv'] == 1 ) { 
                      $comp_id = $cv_row['created_by'];
                      $where_comp="company_profile.company_profile_id = '$comp_id'";
                        $comp_data = $this->Master_model->get_master_row('company_profile', $select = FALSE, $where = $where_comp, $join = FALSE);
                      ?>
                      <span data-toggle="collapse" data-target="#" aria-expanded="false" aria-controls="collapseEx"  style="color: red;font-size: 22px;margin-left: 5px;/* margin-top: 55px; */" title="<?php echo $comp_data['company_name']; ?> has Forwarded this CV " class="required"> # </span>
                   <? } ?>
                <div class="btn-group">
                  <a title="view Details" href="<?php echo base_url(); ?>employer/preview_cv/<?php echo base64_encode($cv_row['cv_id']); ?>"><i class="fa fa-info-circle icon_backg"></i></a>
                  <a  title="Edit" href=" <?php echo base_url(); ?>employer/edit_cv/<?php echo base64_encode($cv_row['cv_id']); ?>?fid=<?php echo $fid; ?>"><i class="far fa-edit icon_backg"></i></a>
                  <a title="Delete" onclick="confirm_delete(<?php echo $cv_row['cv_id'] ?>);" href="#"><i class="fas fa-trash-alt icon_backg"></i></a>
                </div>
                <button class="btn btn-link dropdown-toggle" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-h" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="gedf-drop1" style="top:20px;">
                  <?php if (isset($company_active_jobs) && !empty($company_active_jobs)) { ?>
                  <li ><a class="dropdown-item" href="#" id="div_frwrd" data-toggle="modal" data-keyboard="true" data-target="#rotateModal<?php echo $cv_row['cv_id']; ?>" >Forward Job Post</a></li>
                  <?php } ?>
                  <?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ ?>
                  <li id="div_download"> <a class="dropdown-item"  href="<?php if(isset($cv_row['js_resume']) && !empty($cv_row['js_resume'])){ echo base_url(); echo 'upload/Resumes/'.$cv_row['js_resume']; } ?>" download >Download this cv</a></li>
                  <?php } ?>
                  <li><a onclick="get_copy_folders(<?php echo $cv_row['cv_id']; ?>);" class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-keyboard="true" data-target="#copy_cv<?php echo $cv_row['cv_id']; ?>"  href="#">Copy this CV</a></li>
                  <li><a class="dropdown-item" class="dropdown-item" href="#"  data-toggle="modal" data-keyboard="true" data-target="#move_cv<?php echo $cv_row['cv_id']; ?>" href="#">Move this CV</a></li>
                  <li><a href="#" class="dropdown-item" href="#"  data-toggle="modal" data-keyboard="true" data-target="#forward_cv<?php echo $cv_row['cv_id']; ?>" >Forward This CV</a></li>
                  <li><a href="<?php echo base_url(); ?>employer/getocean_profile/<?php echo base64_encode($cv_row['js_email']); ?><?php if(!empty($fid)){echo '?fid=';echo $fid;} ?>" >Sync with Ocean Profile</a></li>
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
            <strong>There is no record for display</strong>
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
      <div class="col-md-3 right_side">
        <div class="pai_chart" id="pie-chart">
          <main>
            <section>
              <ul class="pieID legend">
                <li class="cv">
                  <em id="spanid1">Total CVs in CV Bank</em>
                  <span><?php echo sizeof($Total_CVs_in_CVBank); ?></span>
                </li>
                <li class="cv">
                  <em id="spanid2">Active CVs</em>
                  <span id="active_cv"><?php echo sizeof($active_cv_total); ?></span>
                </li>
            
              <div class="pieID pie">
              </div>
              <!-- <ul class="pieID legend"> -->
                <li class="cv">
                  <em id="spanid3">Total CVs</em>
                  <span><?php echo $total_cvs; ?></span>
                </li>
                <li class="cv">
                  <em id="spanid4">Active CVs</em>
                  <span id="active_cv"><?php echo sizeof($active_cv); ?></span>
                </li>
                <li class="cv">
                  <em id="spanid5">Own CVs</em>
                  <span id="own_cvs"><?php echo sizeof($own_cvs); ?></span>
                </li>
                <li class="cv">
                  <em id="spanid6">Consultant CVs</em>
                  <span>60</span>
                </li>
              </ul>
            </section>
          </main>
        </div>
        <div id="myForm">
          <div class="filter1">
            <p style="font-size:18px;">Domain</p>
            <!--<select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98">-->
              <select class="form-control select2 filtredu" id="domain" onchange="get_data();" tabindex="-98">
             <!--  <select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" tabindex="-98"> -->
              <!-- <option value=""></option> -->
              <?php
                    $value =  set_value('candidate_industry');
                    if (!empty($value)) {
                      echo $this->job_category_model->selected($value);
                    }
                     if (!empty($this->session->userdata('job_category'))) {
                      echo $this->job_category_model->selected($this->session->userdata('job_category'));
                    } else if(!empty($job_info->job_category)) {
                       echo $this->job_category_model->selected($job_info->job_category);
                       }
                    
                        else {
                       echo $this->job_category_model->selected();
                       }
                       ?>
<!--                       
              <optgroup label="Driver Groups">
                <option>BEC</option>
                <option>VMA</option>
              </optgroup>
              <optgroup label="Drivers">
                <option>Stan</option>
                <option>Fanny</option>
                <option>Rudy</option>
                <option>Ahmed</option>
              </optgroup>-->
            </select>
          </div>
          <div class="filter1">
            <p style="font-size:18px;margin-top:9px;">Experience</p>
            <div class="range-wrap">
              <input type="range" class="range" id="exp_id" onchange="get_data();" min="0" max="20" value="0">
              <output class="bubble"></output>
            </div>
          </div>
          <div class="filter1">
            <p style="font-size:18px;margin-top:9px;">Notice Period</p>
            <div class="range-wrap">
              <input type="range" class="range" id="notice_period_id" onchange="get_data();" min="0" max="90" step="5" value="0">
              <output class="bubble notice_period" ></output>
            </div>
          </div>
          <div class="filter1">
            <p style="font-size:18px;margin-top:15px;">Current CTC</p>
            <div class="range-wrap">
              <input type="range" class="range" id='current_ctc_id' onchange="get_data();" min="0" max="99" value="0">
              <output class="bubble "></output>
            </div>
            <!--<select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" id='current_ctc_id' onchange="get_data();" tabindex="-98">
              <optgroup label="Driver Groups">
                 <option>BEC</option>
                 <option>VMA</option>
              </optgroup>
              <optgroup label="Drivers">
                 <option>Stan</option>
                 <option>Fanny</option>
                 <option>Rudy</option>
                 <option>Ahmed</option>
              </optgroup>
              </select> -->
          </div>
          <div class="filter1">
            <p style="font-size:18px;margin-top:15px;">Education</p>
            <select class="form-control filtredu select2" id="education_id" onchange="get_data();" tabindex="-98">
              <!-- <option value=""> </option> -->
              <?php  $edu_value =  set_value('js_top_education'); foreach($education_level as $education){?>
              <option value="<?php echo $education['education_level_id']; ?>"<?php if($edu_value==$education['education_level_id']){ echo "selected"; }elseif($job_info->job_edu==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
              <?php } ?>
              <!-- <optgroup label="Driver Groups">
                <option>BEC</option>
                <option>VMA</option>
                </optgroup>
                <optgroup label="Drivers">
                <option>Stan</option>
                <option>Fanny</option>
                <option>Rudy</option>
                <option>Ahmed</option>
                </optgroup> -->
            </select>
          </div>
          <div class="filter1">
            <p style="font-size:18px;margin-top:15px;">Duration at Current Job</p>
            <div class="range-wrap">
              <input type="range" class="range" id="stability_id" onchange="get_data();" min="0" max="30" step="6"  value="0">
              <output class="bubble "></output>
              <!--<span id="rngOutput "></span>-->
              <!--<select class="selectpicker"  multiple="" data-live-search="true" data-live-search-placeholder="Search" id='stability_id' tabindex="-98">
                <optgroup label="Driver Groups">
                   <option>BEC</option>
                   <option>VMA</option>
                </optgroup>
                <optgroup label="Drivers">
                   <option>Stan</option>
                   <option>Fanny</option>
                   <option>Rudy</option>
                   <option>Ahmed</option>
                </optgroup>
                </select> -->
            </div>
            <button type="reset" onclick="myFunction();"  class="reset_filter">Reset Filter</button>
            <!--  <input type="button" onclick="myFunction(myForm)" value="Reset Filter"> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if (!empty($cv_bank_data)): foreach ($cv_bank_data as $cv_row) :
  $cv_id =$cv_row['cv_id'];
  $where="forwarded_jobs_cv.cv_id ='$cv_id'";
  $join = array('job_posting'=>'job_posting.job_post_id = forwarded_jobs_cv.job_post_id');
  $jobs_data = $this->Master_model->getMaster('forwarded_jobs_cv', $where , $join, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false);
 ?>
<div class="modal" id="rotateModal<?php echo $cv_row['cv_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <input type="hidden" name="cv_id" id="cv_id" value="<?php $cv_row['cv_id']; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Job Post</h5>
      </div>
      <form action="<?php echo base_url() ?>employer/forward_posted_job/<?php if(!empty($fid)){echo $fid;} ?>" class="sendEmail" method="post" autocomplete="off">
        <div class="modal-body" style="padding:15px 40px;">
          <input type="hidden" name="consultant" value="JobSeeker">  
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">Select Job Post</label>
            <select class="form-control select2" name="job_post_id"  id="job__id">
              <?php foreach ($company_active_jobs as $row) { ?>
              <option data-value="<?php echo $row->job_slugs ?>" value="<?php echo $row->job_post_id ?>"><?php echo $row->job_title?></option>
              <?php } ?>
            </select>
          </div>
          <!--  <input type="hidden" name="job_post_id" value="" id="auto-value"> -->
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">Message</label>
            <textarea class="form-control" name="message" rows="5" id="comment_msg" value="" required>Dear Candidate,

Your Profile matches a Vacancy that we have. Please check the details and apply for this Job, by clicking on the URL provided below.
  


We shall review your Application and move forward on the next steps. 

If you want to update your coordinates / CV on Ocean, you can login to The Ocean → Visit Profile Section.

Best Regards,

<?php echo $this->session->userdata('company_name'); ?>

Phone : <?php echo $this->session->userdata('phone'); ?>

</textarea>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">No. of Candidates (CVs) : 1</label><br>
          </div>
          <p>
  
  <button  class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Forwarded Jobs list
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card-body">
  <?php $i=1; if (!empty($jobs_data)) {
            # code...
           foreach ($jobs_data as $row) { ?>
           <p><?php echo $i; ?>.  <?php echo $row['job_title']; ?> - Job Post sent on <?php echo date('d-m-y H:i',strtotime($row['created_on'])) ; ?>

        <?php $i++;  } } ?>
  </div>
</div>
          
          <input type="hidden" name="forward_job_email" id="forward_job_email" value="<?php echo $cv_row['js_email']; ?>">
        </div>
        <div class="modal-footer">
          <button type="submit" <?php if (empty($company_active_jobs)) {
            echo "disabled";
            } ?> class="btn btn-save">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  endforeach;endif;?>
<div class="modal" id="rotateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <input type="hidden" name="cv_id" id="cv_id" value="<?php $cv_row['cv_id']; ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 style="text-align: center;font-size: 20px;font-weight: 800;color:#fff;">Forward This Job Post</h5>
      </div>

      <form action="<?php echo base_url() ?>employer/forward_posted_job" class="sendEmail" method="post" autocomplete="off">
        <div class="modal-body" style="padding:15px 40px;">
          <input type="hidden" name="job_post_id" value="<?php echo $v_companyjobs->job_post_id; ?>">
          <input type="hidden" name="consultant" value="JobSeeker">  
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="sample3">job Post:</label>
            <select class="form-control select2" name="job_post_id">
              <?php foreach ($company_active_jobs as $row) { ?>
              <option value="<?php echo $row->job_post_id ?>"><?php echo $row->job_title?></option>
              <?php } ?>
            </select>
          </div>
          <!--  <input type="hidden" name="job_post_id" value="" id="autocomplete2-value"> -->
          <!-- <input id="" type="text" name="code"> -->
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">Message:</label>
            <textarea class="form-control" name="message" rows="5" id="comment" required></textarea>
          </div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
            <label class="mdl-textfield__label" for="sample3">No. of CVs:<span id="no_of_cvs"></span></label><br>
          </div>
          <input type="hidden" name="forward_job_emails" id="forward_job_emails" value="">

        </div>
        <div class="modal-footer">
          <button type="submit" <?php if (empty($company_active_jobs)) {
            echo "disabled";
            } ?> class="btn btn-save">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="row" style="text-align: justify;margin: 10 auto;width: fit-content;">
  <?php foreach ($cv_bank_data as $cv_row) :  ?>
  <div class="modal fade" tabindex='-1' id="copy_cv<?php echo $cv_row['cv_id']; ?>" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form method="post" action="<?php echo base_url(); ?>employer/copy_cvto_folder">
          <div class="modal-header">
            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
           <center><h4 class="modal-title">Copy CV</h4></center> 
          </div>
          <div class="modal-body">
            <input type="hidden" name="cv_id" value="<?php echo $cv_row['cv_id']; ?>">
            <div class="col-md-12" style="margin-top: 20px;">
              <div class="row">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <span id="cv_folders_text<?php echo $cv_row['cv_id']; ?>"></span><br>
                  <span id="cv_folders<?php echo $cv_row['cv_id']; ?>"></span><br>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <label class="mdl-textfield__label" for="sample3">Choose Folder</label>
                  <!-- <input type="text"  name="job_title"  id="job_title" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required> -->
                  <?php 
                    $employer_id = $this->session->userdata('company_profile_id');
                    $wheres  = "status='1' AND company_id='$employer_id' ";
                       $folders     = $this->Master_model->getMaster('cv_folder', $where = $wheres); ?>
                  <select class="form-control select2" name="folder_id" id="copy_cv_folder">
                    <option data-value="CV_bank" value="0">CV Bank</option>
                    <?php foreach ($folders as $row) { 
                      if($row['folder_name'] != $fname) { ?>
                    <option data-value="<?php echo $row['folder_name'] ?>" value="<?php echo $row['id'] ?>"><?php echo $row['folder_name'] ?></option>
                    <? } } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label" for="sample3">No. of CVs: 1</label><br>
                </div>
              </div>
            </div>
            <!--  <p>This is a small modal.</p> -->
          </div>
          <div class="modal-footer">
            <button type="submit" id="cpy_btn" class="btn btn-default">Copy</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
    $key++;
      endforeach;  
    ?>
  <?php foreach ($cv_bank_data as $cv_row) :  ?>
</div>
<div class="modal fade" tabindex='-1' id="move_cv<?php echo $cv_row['cv_id']; ?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/move_cvto_folder">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <center><h4 class="modal-title"> Move CV</h4></center>
        </div>
        <div class="modal-body">
          <input type="hidden" name="cv_id" value="<?php echo $cv_row['cv_id']; ?>">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="sample3">Choose Folder</label>
                <!-- <input type="text"  name="job_title"  id="job_title" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required> -->
                <?php 
                  $employer_id = $this->session->userdata('company_profile_id');
                  $wheres  = "status='1' AND company_id='$employer_id' ";
                     $folders     = $this->Master_model->getMaster('cv_folder', $where = $wheres); ?>
                <select class="form-control select2" name="folder_id" id="move_folder">
                  <option data-value="CV_bank" value="0">CV Bank</option>
                    <?php foreach ($folders as $row) { 
                      if($row['folder_name'] != $fname) { ?>
                    <option data-value="<?php echo $row['folder_name'] ?>" value="<?php echo $row['id'] ?>"><?php echo $row['folder_name'] ?></option>
                    <? } } ?>
                  </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                <label class="mdl-textfield__label" for="sample3">No. of CVs: 1</label><br>
              </div>
            </div>
          </div>
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" id="mv_button" class="btn btn-default">Move</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" tabindex='-1' id="forward_cv<?php echo $cv_row['cv_id']; ?>" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/forward_cv">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <center><h4 class="modal-title">Forward This CV</h4></center>
        </div>
        <div class="modal-body">
          <input type="hidden" name="cv_id" value="<?php echo $cv_row['cv_id']; ?>">
           <input type="hidden" name="folder_id" value="<?php echo $fid; ?>">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"style="width: 108%;margin-left: -12px;padding: 0px;">
            <label class="mdl-textfield__label" for="sample3">E-mail:</label>
            <input onchange ="show_text();" type="email"  name="consultant_email"  id="email" placeholder="Enter Email"  id="subject" data-required="true" multiple style="display: inline-block;min-width: 100%;height: 30px;" required>
            
          </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                <label class="mdl-textfield__label" for="sample3">No. of CVs: 1</label><br>
              </div>
            </div>
          </div>
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" id="mv_button" class="btn btn-default">Forward</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
  $key++;
    endforeach;  
  ?>
  <div class="modal fade" tabindex='-1' id="forward_cv" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/forward_cv">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <center><h4 class="modal-title">Forward This CV</h4></center>
        </div>
        <div class="modal-body">
          <input type="hidden" id="frwd_cv_id" name="cv_id" value="<?php echo $cv_row['cv_id']; ?>">
           <input type="hidden" name="folder_id" value="<?php echo $fid; ?>">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label"style="width: 108%;margin-left: -12px;padding: 0px;">
            <label class="mdl-textfield__label" for="sample3">E-mail:</label>
            <input onchange ="show_text();" type="email"  name="consultant_email"  id="email" placeholder="Enter Email"  id="subject" data-required="true" multiple style="display: inline-block;min-width: 100%;height: 30px;" required>
            
          </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                <label class="mdl-textfield__label" for="sample3"><span id="no_of_cvs_forward">No. of CVs: 1</span> </label><br>
              </div>
            </div>
          </div>
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" id="mv_button" class="btn btn-default">Forward</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="bulkcopy_cv" tabindex='-1' role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/copy_cvto_folder">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
         <center><h4 class="modal-title"> Copy CVs</h4></center> 
        </div>
        <div class="modal-body">
          <input type="hidden" name="cv_id" id="cv_id" value="">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="sample3">Choose Folder</label>
                <!-- <input type="text"  name="job_title"  id="job_title" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required> -->
                <?php 
                  $employer_id = $this->session->userdata('company_profile_id');
                  $wheres  = "status='1' AND company_id='$employer_id' ";
                     $folders     = $this->Master_model->getMaster('cv_folder', $where = $wheres); ?>
              <select class="form-control select2" name="folder_id" id="copy_cv_folder">
                    <option data-value="CV_bank" value="0">CV Bank</option>
                    <?php foreach ($folders as $row) { 
                      if($row['folder_name'] != $fname) { ?>
                    <option data-value="<?php echo $row['folder_name'] ?>" value="<?php echo $row['id'] ?>"><?php echo $row['folder_name'] ?></option>
                    <? } } ?>
                  </select>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                <label class="mdl-textfield__label" id="no_of_cvs_move" for="sample3">No. of CVs: 1</label><br>
              </div>
            </div>
          </div>
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" id="mv_button" class="btn btn-default" id="cpy_btn">Copy</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="bulkupdate_cv" tabindex='-1' role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/getocean_profile">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <center><h4 class="modal-title">Pull Updates from Ocean</h4></center>
        </div>
        <div class="modal-body">
          <input type="hidden" name="cv_email" id="cv_email" value="">
          <div class="col-md-12" style="margin-top: 20px;">
            Do You want to update selected  cvs?
            <div class="col-md-12">
              <div class="row">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin-top:10px;">
                  <label class="mdl-textfield__label"  for="sample3">No. of CVs Selected:<span id="no_of_cvs_update"></span></label><br>
                </div>
              </div>
            </div>
            <!--  <p>This is a small modal.</p> -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-default">update</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="bulkupload" tabindex='-1' role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url();?>employer/bulk_upload_cvs" enctype="multipart/form-data">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Bulk Upload CV</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!-- <label class="mdl-textfield__label" for="sample3">Folder Name:</label> -->
                <small>To Import CV's Download CSV Format 
                  <a href="<?php echo base_url(); ?>cv_bank_excel/bulk_upload_format.csv" download="bulk_upload_format.csv">
                
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
<div class="modal fade" id="bulkupload_folder" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url();?>employer/bulk_upload_folder" enctype="multipart/form-data">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Bulk Upload CV</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!-- <label class="mdl-textfield__label" for="sample3">Folder Name:</label> -->
                <small>Import Folder</small>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!--  <input type='file' name='file' required class="form-control" > -->
                <input type='file'  required class="form-control" name="files[]" id="files" multiple="" webkitdirectory >
                <input type="hidden" name="paths" id="paths">
              </div>
            </div>
          </div>
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <!-- <label class="mdl-textfield__label" for="sample3">Folder Name:</label> -->
                 <small>To Import CV's Download CSV Format 
                  <a href="<?php echo base_url(); ?>cv_bank_excel/bulk_upload_format.csv" download="bulk_upload_format.csv">
                
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
<div class="modal fade" id="myModal_add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form method="post" action="<?php echo base_url(); ?>employer/add_cv_folder">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
          <h4 class="modal-title">Add folder</h4>
        </div>
        <div class="modal-body">
          <div class="col-md-12" style="margin-top: 20px;">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="sample3">Folder Name:</label>
                <input type="text"  name="folder_name"  id="folder_name" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="sample3">parent Folder</label>
                <!-- <input type="text"  name="job_title"  id="job_title" placeholder=""  id="subject" data-required="true" multiple style="display: inline-block; width: 100%;" required> -->
                <?php 
                  $employer_id = $this->session->userdata('company_profile_id');
                  $wheres  = "status='1' AND company_id='$employer_id' ";
                     $folders     = $this->Master_model->getMaster('cv_folder', $where = $wheres); ?>
                <select class="form-control select2" name="parent">
                  <option value="0">CV Bank</option>
                  <?php $new_array=array(); $i=0; foreach ($folders as $row) { 
                    $id = $folders[$i]['id'];
                    // echo $id;
                    $p1 = $this->job_posting_model->cv_folder($id);
                    // print_r($this->db->last_query()); .
                    // print_r($p1);
                    if ($p1->parent_id == 0) {
                      array_push($new_array, $row);
                    }
                    else
                    {
                       $p2 =$this->job_posting_model->cv_folder($p1->parent_id);
                       if ($p2->parent_id == 0) {
                         array_push($new_array, $row);
                       }
                    
                    }
                    
                    
                       $i++;  }  ?>
                  <?php foreach ($new_array as $row1) {
                    print_r($row1); ?>
                  <option value="<?php echo $row1['id']; ?>"><?php echo $row1['folder_name']; ?></option>
                  <?  } ?>
                </select>
              </div>
            </div>
          </div>
          <!--  <p>This is a small modal.</p> -->
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
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
<script>
   $("#email").autocomplete({
             
             source: "<?php echo base_url();?>Employer/get_company_by_email",
             minLength: 2,
              // append: "#rotateModal",
            
    
            
           });
   
</script>
<script>
   $('.select2').select2();
</script>
<script>
  $(document).ready (function(){
  $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
  $("#smsg").slideUp(500);
  });   
  });
  
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
   if ($('#test1').is(":checked")) 
      {
         $('#test1').click();
      }
      if ($('#test').is(":checked")) 
      {
         $('#test').click();
      }
  }
  });
  
  function confirm_delete(id)
  {
    var cv_id  = window.btoa(id);
  var newUrl = '<?php echo base_url(); ?>employer/delete_cv/'+cv_id;
  console.log(newUrl);
  console.log(id);
  $('#del_modal').prop('action',newUrl);
  $('#delete').modal("show");
  }

  $("#job__id").change(function () {
      var slug = $(this).find(':selected').data("value");
      var url = "<?php echo base_url() ?>job/show/"+slug;
      $('#comment_msg').append(url);

});

  $("#copy_cv_folder").change(function () {
      var slug = $(this).find(':selected').data("value");
    
      $('#cpy_btn').text('Copy - <?php echo $fname; ?> To '+slug);

});
   $("#move_folder").change(function () {
      var slug = $(this).find(':selected').data("value");
   
      $('#mv_button').text('Move - <?php echo $fname; ?> To '+slug);

});
  // function get_job_url()
  // {
  //     var ddlFruits = document.getElementById("job__id");
  //     var selectedText = ddlFruits.options[ddlFruits.selectedIndex].innerHTML;
  //     var slug = $('#job__id').getAttribute('data-value');
  //     console.log(slug);
  //     var url = "<?php echo base_url() ?>job/show/"+slug;
  //     $('#comment_msg').append(url);
  // }
  
  
</script>
<script>
  function myFunction(){
  
  $("#education_id").val(1);
  $('.range').val(0);
    var allRanges = document.querySelectorAll(".range-wrap");
     allRanges.forEach(wrap => {
       var range = wrap.querySelector(".range");
       var bubble = wrap.querySelector(".bubble");
     
      
     
    
         setBubble(range, bubble);
     
      
     });
  
  // clivk.trigger("input");
  
      // $(document).ready();
      // $("#myForm").load(window.location.href + " #myForm" );
  //    $('.range-wrap').each(function(){
  
  //   var options = $(this).slider( 'option' );
  
  //   $(this).slider( 'values', [ options.min, options.max ] );
  
  // });
  }
  function get_trash()
  {
     $.ajax({
                  type:'POST',
                 url:'<?php echo base_url();?>Employer/trash_cv',
                 data:{type:'cv'},
                 success:function(res){
                     $('#trash_box').html(res);
                     // $('#company_pincode').val('');
                 }
              })
  }
</script>
<script>
  function get_copy_folders(cv_id)
  {
    
        var folder_id = '<?php if(!empty($fid)){echo $fid;} ?>';
        if (folder_id)
      {
         $.ajax({
              url: "<?php echo base_url();?>employer/get_copy_folders",
              type: "POST",
              data:{cv_id:cv_id,folder_id:folder_id},
                success: function(data)
                {
                 
                 var obj = [];
                 const parsed = JSON.parse(data);
                 if (parsed.length>0) 
                 {
                   $('#cv_folders_text'+cv_id).html('This CV is also available in ')

                    jQuery.each(parsed, function(index, item) {
                          obj[item.cv_folder_id] = item.folder_name;
                          var url = '<?php echo base_url(); ?>employer/corporate_cv_bank/'+item.cv_folder_id;
                          var j = index+1;
                          $('#cv_folders'+cv_id).html(+j+'. <a href="'+url+'">'+item.folder_name+'</a><br>');
  
                      });
  
                    console.log(obj);
                  }
                }
          });
      }
    else if (cv_id)
      {
         $.ajax({
              url: "<?php echo base_url();?>employer/get_copy_folders",
              type: "POST",
              data:{cv_id:cv_id},
                success: function(data)
                {
                  $('#cv_folders_text'+cv_id).html('This CV is also available in ')
                 var obj = [];
                 const parsed = JSON.parse(data);
                    jQuery.each(parsed, function(index, item) {
                          obj[item.cv_folder_id] = item.folder_name;
                          var url = '<?php echo base_url(); ?>employer/corporate_cv_bank/'+item.cv_folder_id;
  
                          $('#cv_folders'+cv_id).append(' <a href="'+url+'">'+item.folder_name+'</a>');
  
                      });
  
                    console.log(obj);
                }
          });
      }
  
  }
</script>
<script>
  $(document).ready (function(){
    $("#smsg").fadeTo(2000, 500).slideUp(500, function(){
    $("#smsg").slideUp(500);
    });   
  });
  
</script>
<script>
  document.getElementById("files").addEventListener("change", function(event) {
  let output = document.getElementById("paths");
  let files = event.target.files;
  var paths = [];
  for (let i=0; i<files.length; i++) {
   let item = document.createElement("li");
   item.innerHTML = files[i].webkitRelativePath;
   paths.push(files[i].webkitRelativePath);
  // $('#paths').append(iles[i].webkitRelativePath);
  };
  var energy = paths.join();
  $('#paths').val(energy);
  }, false);
</script>
<script>
  $('.select2').select2();
</script>
<script>
  $('#myInput').focus(function(){
  $(this).data('placeholder',$(this).attr('placeholder'))
       .attr('placeholder','');
  }).blur(function(){
  $(this).attr('placeholder',$(this).data('placeholder'));
  });
  
  $("#sizelist").on("click", "a", function(e){
  e.preventDefault();
  var $this = $(this).parent();
  $this.addClass("select").siblings().removeClass("select");
  $("#sizevalue").val($this.data("value"));
  $( "#sort_btn" ).click();
  $( "#test" ).click();
  })
  
  
</script>
<script>
  $(document).ready(function(){
  
   $('#myInput').keyup(function(){
   
    // Search text
    var text1 = $(this).val();
   var text = text1.toUpperCase();
  
    $('.content').hide();
  
    // Search and show
    $('.content:contains("'+text+'")').show();
   
   });
  createPie();
  });
  $.expr[":"].contains = $.expr.createPseudo(function(arg) {
  return function( elem ) {
  return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
  };
  });
  
  
</script>
<script>
  $(document).on(' change','input[name="check_all"]',function() {
           $('.chkbx').prop("checked" , this.checked);
           if (this.checked == true) 
           {
              $('#check_txt').text('Deselect All');
           }
           else
           {
              $('#check_txt').text('Select All');
  
           }
   });
   $('.checkbox_label').click(function ()
   {
   var checkbox = $(this).find('input[type=checkbox]');
     var addclass = 'highlight_div';
   if (this.checked == true) 
  {
    
     $('.checkbox_label').removeClass(addclass);
     $(this).addClass(addclass);
  }
  else
  {
    $('.checkbox_label').removeClass(addclass);
  }
   // $('.chkbx').prop("checked",false);
   
   // checkbox.prop("checked", !checkbox.prop("checked"));
   
   });
   
   // $(document).on('click','#chkbx',function() {
   //         // $('.chkbx').prop("checked" , this.checked);
   //         if (this.checked == true) 
   //         {
   //            $(this).css('box-shadow','5px 5px #e8e5e5');
   //             var addclass = 'highlight_div';
   //             $('.card').removeClass(addclass);
   //             $(this).addClass(addclass);
   //         }
   //         else
   //         {
   //             $(this).css('box-shadow','0px 0px #fff');
  
   //         }
   // });
   $(document).on(' change','input[name="bulk_download"]',function() {
           $('.chkbx').prop("checked" , this.checked);
           $("input[name='bulk_forward']:checkbox").prop('checked',false);
            if (this.checked) 
           {
               $("#gedf-drop1").hide();
            
           }
           else
           {
               $("#gedf-drop1").show();
  
           }
  
   });
  $(document).on(' change','input[name="bulk_forward"]',function() {
           $('.chkbx').prop("checked" , this.checked);
           $("input[name='bulk_download']:checkbox").prop('checked',false);
  
           // alert(this.checked);
           if (this.checked) 
           {
               $("#gedf-drop1").hide();
             
           }
           else
           {
               $("#gedf-drop1").show();
  
           }
  
   });
  
  function frwd_post()
  {
     var checkedVals = $('.chkbx:checkbox:checked').map(function() {
                  return this.value;
              }).get();
              var emails= (checkedVals.join(","));
              // alert(emails.length);
                if (emails.length > 0) 
              {
              var elements = emails.split(',').length;
            
                 $('#no_of_cvs').html(elements);
                 $('#forward_job_emails').val(checkedVals.join(","));
                 setTimeout(function(){
                 $('#rotateModal').modal('show'); }, 500);
              }else
              {
                 alert('Please select atleast one cv to forward the job!')
              }
              
  }

  function frwd_cv()
  {
  var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                  return this.getAttribute("data-valuetwo");
              }).get();
       var cvs_name= (checkedValsofname.join(","));
           
           
  
              // alert(emails.length);
                if (cvs_name.length > 0) 
              {
              var elements = cvs_name.split(',').length;
            
                 $('#no_of_cvs_forward').html('No. of CVs:'+elements);
                 $('#frwd_cv_id').val(cvs_name);
                 
                 $('#forward_cv').modal('show');
              }else
              {
                 alert('Please select atleast one cv to Forward!')
              }
  }
  
  function download_cvs()
  {
     var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                  return this.getAttribute("data-valueone");
              }).get();
       var cvs_name= (checkedValsofname.join(","));
           
           var myNameArray =  cvs_name.split(',');
               // var totalFiles = myArray.length;
  
   
              
               // alert(totalFiles);
            //Throw an error if no boxes are checked
               if (cvs_name.length == 0) {
                  alert("Please choose a file to download");
               } else {
                 var newArray = myNameArray.filter(value => Object.keys(value).length !== 0);
             //          
               $.ajax({
                url:"<?php echo base_url();?>Employer/create_zip",
                data: {myArray:newArray},
                type: 'post',
                success: function(response){
                  // window.location = response;
                  // alert(response);
                  const url =  response;
                                 const a = document.createElement('a');
                                 a.style.display = 'none';
                                 a.href = url;
                                 // the filename you want
                                 a.download = 'Resumes.zip';
  
                                 document.body.appendChild(a);
                                 a.click();
                                 window.URL.revokeObjectURL(url);
                }
              });
  
  }
  }
  
  function copy_cvs()
  {
  var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                  return this.getAttribute("data-valuetwo");
              }).get();
       var cvs_name= (checkedValsofname.join(","));
           
           
  
              // alert(emails.length);
                if (cvs_name.length > 0) 
              {
              var elements = cvs_name.split(',').length;
            
                 $('#no_of_cvs_move').html('No. of CVs:'+elements);
                 $('#cv_id').val(cvs_name);
                 setTimeout(function(){
                 $('#bulkcopy_cv').modal('show'); }, 500);
              }else
              {
                 alert('Please select atleast one cv move!')
              }
  }
  function update_cvs()
  {
  var checkedValsofname = $('.chkbx:checkbox:checked').map(function() {
                  return this.value;
              }).get();
       var cvs_name= (checkedValsofname.join(","));
           
           
  
              // alert(emails.length);
                if (cvs_name.length > 0) 
              {
              var elements = cvs_name.split(',').length;
            
                 $('#no_of_cvs_update').text(elements);
                 $('#cv_email').val(cvs_name);
                 setTimeout(function(){
                 $('#bulkupdate_cv').modal('show'); }, 500);
              }else
              {
                 alert('Please select atleast one cv update !')
              }
  }
  $("#job_titles").autocomplete({
            
            source: "<?php echo base_url();?>Employer/search_job_keywords",
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
              $("#autocomplete2-value").val(ui.item.value);
           }
   
           
          });
  
  $("#job_title").autocomplete({
            
            source: "<?php echo base_url();?>Employer/search_job_keywords",
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
</script>
<script>
  function get_data()
  {
     var domain_value = $('#domain').val();
     var value = $('#exp_id').val();
     var notice_period_value = $('#notice_period_id').val();
     var education_value = $('#education_id').val();
     var current_ctc_value = $('#current_ctc_id').val();
     var sta_value = $('#stability_id').val();
      $.ajax({
              url: "<?php echo base_url();?>employer/get_active_cvs",
              type: "POST",
              data:{domain:domain_value,exp:value,notice_period:notice_period_value,education:education_value,current_ctc:current_ctc_value,stablity:sta_value},
                success: function(data)
                {
                    var getarray = jQuery.parseJSON(data);
                  $('#active_cv').html(getarray.length);
                }
          });
      
      $.ajax({
              url: "<?php echo base_url();?>employer/get_own_cvs",
              type: "POST",
              data:{exp:value,notice_period:notice_period_value,education:education_value,current_ctc:current_ctc_value,stablity:sta_value},
                success: function(data)
                {
                    var getarray = jQuery.parseJSON(data);
                  $('#own_cvs').html(getarray.length);
                }
          });
     // $('#active_cv').html(value);
     // alert(value);pieID
     // createPie(".pieID.legend", ".pieID.pie");
     createPie();
  }
  
  
  
</script>
<script>
  function sliceSize(dataNum, dataTotal) {
    return (dataNum / dataTotal) * 360;
  }
  function addSlice(sliceSize, pieElement, offset, sliceID, color, dataCount) {
     var val = $('#spanid'+dataCount).text();
  
     console.log(val);
    $(pieElement).append("<div class='slice "+sliceID+"'><span tooltip title='"+val+"'></span></div>");
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
      addSlice(maxSize, pieElement, offset, sliceID, color,dataCount  );
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
     
      "#15dfb0", 
      "#21e5dc", 
      "#18c5bd", 
      "#11807b", 
      "#92d6d3",
      "#519693"
      
     
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
<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script>
  function createPie()
  {
    google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawCharts);
function drawCharts() {
  
  // BEGIN PIE CHART
  
  // pie chart data
  var pieData = google.visualization.arrayToDataTable([
    ['Country', 'Page Hits'],
    ['USA',      7242],
    ['Canada',   4563],
    ['Mexico',   1345],
    ['Sweden',    946],
    ['Germany',  2150]
  ]);
  // pie chart options
  var pieOptions = {
    backgroundColor: 'transparent',
    pieHole: 0.4,
    colors: [ "cornflowerblue", 
              "olivedrab", 
              "orange", 
              "tomato", 
              "crimson", 
              "purple", 
              "turquoise", 
              "forestgreen", 
              "navy", 
              "gray"],
    pieSliceText: 'value',
    tooltip: {
      text: 'percentage'
    },
    fontName: 'Open Sans',
    chartArea: {
      width: '100%',
      height: '94%'
    },
    legend: {
      textStyle: {
        fontSize: 13
      }
    }
  };
  // draw pie chart
  var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
  pieChart.draw(pieData, pieOptions);
}
  }
</script> -->
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
  /*!
   * Bootstrap-select v1.11.0 (https://silviomoreto.github.io/bootstrap-select)
   *
   * Copyright 2013-2016 bootstrap-select
   * Licensed under MIT (https://github.com/silviomoreto/bootstrap-select/blob/master/LICENSE)
   */
  
  (function (root, factory) {
    if (typeof define === 'function' && define.amd) {
      // AMD. Register as an anonymous module unless amdModuleId is set
      define(["jquery"], function (a0) {
        return (factory(a0));
      });
    } else if (typeof exports === 'object') {
      // Node. Does not work with strict CommonJS, but
      // only CommonJS-like environments that support module.exports,
      // like Node.
      module.exports = factory(require("jquery"));
    } else {
      factory(jQuery);
    }
  }(this, function (jQuery) {
  
  (function ($) {
    'use strict';
  
    //<editor-fold desc="Shims">
    if (!String.prototype.includes) {
      (function () {
        'use strict'; // needed to support `apply`/`call` with `undefined`/`null`
        var toString = {}.toString;
        var defineProperty = (function () {
          // IE 8 only supports `Object.defineProperty` on DOM elements
          try {
            var object = {};
            var $defineProperty = Object.defineProperty;
            var result = $defineProperty(object, object, object) && $defineProperty;
          } catch (error) {
          }
          return result;
        }());
        var indexOf = ''.indexOf;
        var includes = function (search) {
          if (this == null) {
            throw new TypeError();
          }
          var string = String(this);
          if (search && toString.call(search) == '[object RegExp]') {
            throw new TypeError();
          }
          var stringLength = string.length;
          var searchString = String(search);
          var searchLength = searchString.length;
          var position = arguments.length > 1 ? arguments[1] : undefined;
          // `ToInteger`
          var pos = position ? Number(position) : 0;
          if (pos != pos) { // better `isNaN`
            pos = 0;
          }
          var start = Math.min(Math.max(pos, 0), stringLength);
          // Avoid the `indexOf` call if no match is possible
          if (searchLength + start > stringLength) {
            return false;
          }
          return indexOf.call(string, searchString, pos) != -1;
        };
        if (defineProperty) {
          defineProperty(String.prototype, 'includes', {
            'value': includes,
            'configurable': true,
            'writable': true
          });
        } else {
          String.prototype.includes = includes;
        }
      }());
    }
  
    if (!String.prototype.startsWith) {
      (function () {
        'use strict'; // needed to support `apply`/`call` with `undefined`/`null`
        var defineProperty = (function () {
          // IE 8 only supports `Object.defineProperty` on DOM elements
          try {
            var object = {};
            var $defineProperty = Object.defineProperty;
            var result = $defineProperty(object, object, object) && $defineProperty;
          } catch (error) {
          }
          return result;
        }());
        var toString = {}.toString;
        var startsWith = function (search) {
          if (this == null) {
            throw new TypeError();
          }
          var string = String(this);
          if (search && toString.call(search) == '[object RegExp]') {
            throw new TypeError();
          }
          var stringLength = string.length;
          var searchString = String(search);
          var searchLength = searchString.length;
          var position = arguments.length > 1 ? arguments[1] : undefined;
          // `ToInteger`
          var pos = position ? Number(position) : 0;
          if (pos != pos) { // better `isNaN`
            pos = 0;
          }
          var start = Math.min(Math.max(pos, 0), stringLength);
          // Avoid the `indexOf` call if no match is possible
          if (searchLength + start > stringLength) {
            return false;
          }
          var index = -1;
          while (++index < searchLength) {
            if (string.charCodeAt(start + index) != searchString.charCodeAt(index)) {
              return false;
            }
          }
          return true;
        };
        if (defineProperty) {
          defineProperty(String.prototype, 'startsWith', {
            'value': startsWith,
            'configurable': true,
            'writable': true
          });
        } else {
          String.prototype.startsWith = startsWith;
        }
      }());
    }
  
    if (!Object.keys) {
      Object.keys = function (
        o, // object
        k, // key
        r  // result array
        ){
        // initialize object and result
        r=[];
        // iterate over object keys
        for (k in o)
            // fill result array with non-prototypical keys
          r.hasOwnProperty.call(o, k) && r.push(k);
        // return result
        return r;
      };
    }
  
    // set data-selected on options that are programmatically selected
    // prior to initialization of bootstrap-select
    var _val = $.fn.val;
    $.fn.val = function(value){
      if (this.is('select') && value) {
        this.find('option[value="' + value + '"]').data('selected', true);
      }
      
      return _val.apply(this, arguments);
    };
  
    var changed_arguments = null;
    $.fn.triggerNative = function (eventName) {
      var el = this[0],
          event;
  
      if (el.dispatchEvent) {
        if (typeof Event === 'function') {
          // For modern browsers
          event = new Event(eventName, {
            bubbles: true
          });
        } else {
          // For IE since it doesn't support Event constructor
          event = document.createEvent('Event');
          event.initEvent(eventName, true, false);
        }
  
        el.dispatchEvent(event);
      } else {
        if (el.fireEvent) {
          event = document.createEventObject();
          event.eventType = eventName;
          el.fireEvent('on' + eventName, event);
        }
  
        this.trigger(eventName);
      }
    };
    //</editor-fold>
  
    // Case insensitive contains search
    $.expr.pseudos.icontains = function (obj, index, meta) {
      var $obj = $(obj);
      var haystack = ($obj.data('tokens') || $obj.text()).toString().toUpperCase();
      return haystack.includes(meta[3].toUpperCase());
    };
  
    // Case insensitive begins search
    $.expr.pseudos.ibegins = function (obj, index, meta) {
      var $obj = $(obj);
      var haystack = ($obj.data('tokens') || $obj.text()).toString().toUpperCase();
      return haystack.startsWith(meta[3].toUpperCase());
    };
  
    // Case and accent insensitive contains search
    $.expr.pseudos.aicontains = function (obj, index, meta) {
      var $obj = $(obj);
      var haystack = ($obj.data('tokens') || $obj.data('normalizedText') || $obj.text()).toString().toUpperCase();
      return haystack.includes(meta[3].toUpperCase());
    };
  
    // Case and accent insensitive begins search
    $.expr.pseudos.aibegins = function (obj, index, meta) {
      var $obj = $(obj);
      var haystack = ($obj.data('tokens') || $obj.data('normalizedText') || $obj.text()).toString().toUpperCase();
      return haystack.startsWith(meta[3].toUpperCase());
    };
  
    /**
     * Remove all diatrics from the given text.
     * @access private
     * @param {String} text
     * @returns {String}
     */
    function normalizeToBase(text) {
      var rExps = [
        {re: /[\xC0-\xC6]/g, ch: "A"},
        {re: /[\xE0-\xE6]/g, ch: "a"},
        {re: /[\xC8-\xCB]/g, ch: "E"},
        {re: /[\xE8-\xEB]/g, ch: "e"},
        {re: /[\xCC-\xCF]/g, ch: "I"},
        {re: /[\xEC-\xEF]/g, ch: "i"},
        {re: /[\xD2-\xD6]/g, ch: "O"},
        {re: /[\xF2-\xF6]/g, ch: "o"},
        {re: /[\xD9-\xDC]/g, ch: "U"},
        {re: /[\xF9-\xFC]/g, ch: "u"},
        {re: /[\xC7-\xE7]/g, ch: "c"},
        {re: /[\xD1]/g, ch: "N"},
        {re: /[\xF1]/g, ch: "n"}
      ];
      $.each(rExps, function () {
        text = text.replace(this.re, this.ch);
      });
      return text;
    }
  
  
    function htmlEscape(html) {
      var escapeMap = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#x27;',
        '`': '&#x60;'
      };
      var source = '(?:' + Object.keys(escapeMap).join('|') + ')',
          testRegexp = new RegExp(source),
          replaceRegexp = new RegExp(source, 'g'),
          string = html == null ? '' : '' + html;
      return testRegexp.test(string) ? string.replace(replaceRegexp, function (match) {
        return escapeMap[match];
      }) : string;
    }
  
    var Selectpicker = function (element, options, e) {
      // bootstrap-select has been initialized - revert val back to its original function
      if (_val) {
        $.fn.val = _val;
        _val = null;
      }
  
      if (e) {
        e.stopPropagation();
        e.preventDefault();
      }
  
      this.$element = $(element);
      this.$newElement = null;
      this.$button = null;
      this.$menu = null;
      this.$lis = null;
      this.options = options;
  
      // If we have no title yet, try to pull it from the html title attribute (jQuery doesnt' pick it up as it's not a
      // data-attribute)
      if (this.options.title === null) {
        this.options.title = this.$element.attr('title');
      }
  
      //Expose public methods
      this.val = Selectpicker.prototype.val;
      this.render = Selectpicker.prototype.render;
      this.refresh = Selectpicker.prototype.refresh;
      this.setStyle = Selectpicker.prototype.setStyle;
      this.selectAll = Selectpicker.prototype.selectAll;
      this.deselectAll = Selectpicker.prototype.deselectAll;
      this.destroy = Selectpicker.prototype.destroy;
      this.remove = Selectpicker.prototype.remove;
      this.show = Selectpicker.prototype.show;
      this.hide = Selectpicker.prototype.hide;
  
      this.init();
    };
  
    Selectpicker.VERSION = '1.11.0';
  
    // part of this is duplicated in i18n/defaults-en_US.js. Make sure to update both.
    Selectpicker.DEFAULTS = {
      noneSelectedText: 'Nothing selected',
      noneResultsText: 'No results matched {0}',
      countSelectedText: function (numSelected, numTotal) {
        return (numSelected == 1) ? "{0} item selected" : "{0} items selected";
      },
      maxOptionsText: function (numAll, numGroup) {
        return [
          (numAll == 1) ? 'Limit reached ({n} item max)' : 'Limit reached ({n} items max)',
          (numGroup == 1) ? 'Group limit reached ({n} item max)' : 'Group limit reached ({n} items max)'
        ];
      },
      selectAllText: 'Select All',
      deselectAllText: 'Deselect All',
      doneButton: false,
      doneButtonText: 'Close',
      multipleSeparator: ', ',
      styleBase: 'btn',
      style: 'btn-default',
      size: 'auto',
      title: null,
      selectedTextFormat: 'values',
      width: false,
      container: false,
      hideDisabled: false,
      showSubtext: false,
      showIcon: true,
      showContent: true,
      dropupAuto: true,
      header: false,
      liveSearch: false,
      liveSearchPlaceholder: null,
      liveSearchNormalize: false,
      liveSearchStyle: 'contains',
      actionsBox: false,
      iconBase: 'glyphicon',
      tickIcon: 'glyphicon-ok',
      showTick: false,
      template: {
        caret: '<span class="caret"></span>'
      },
      maxOptions: false,
      mobile: false,
      selectOnTab: false,
      dropdownAlignRight: false
    };
  
    Selectpicker.prototype = {
  
      constructor: Selectpicker,
  
      init: function () {
        var that = this,
            id = this.$element.attr('id');
  
        this.$element.addClass('bs-select-hidden');
  
        // store originalIndex (key) and newIndex (value) in this.liObj for fast accessibility
        // allows us to do this.$lis.eq(that.liObj[index]) instead of this.$lis.filter('[data-original-index="' + index + '"]')
        this.liObj = {};
        this.multiple = this.$element.prop('multiple');
        this.autofocus = this.$element.prop('autofocus');
        this.$newElement = this.createView();
        this.$element
          .after(this.$newElement)
          .appendTo(this.$newElement);
        this.$button = this.$newElement.children('button');
        this.$menu = this.$newElement.children('.dropdown-menu');
        this.$menuInner = this.$menu.children('.inner');
        this.$searchbox = this.$menu.find('input');
  
        this.$element.removeClass('bs-select-hidden');
  
        if (this.options.dropdownAlignRight === true) this.$menu.addClass('dropdown-menu-right');
  
        if (typeof id !== 'undefined') {
          this.$button.attr('data-id', id);
          $('label[for="' + id + '"]').click(function (e) {
            e.preventDefault();
            that.$button.focus();
          });
        }
  
        this.checkDisabled();
        this.clickListener();
        if (this.options.liveSearch) this.liveSearchListener();
        this.render();
        this.setStyle();
        this.setWidth();
        if (this.options.container) this.selectPosition();
        this.$menu.data('this', this);
        this.$newElement.data('this', this);
        if (this.options.mobile) this.mobile();
  
        this.$newElement.on({
          'hide.bs.dropdown': function (e) {
            that.$menuInner.attr('aria-expanded', false);
            that.$element.trigger('hide.bs.select', e);
          },
          'hidden.bs.dropdown': function (e) {
            that.$element.trigger('hidden.bs.select', e);
          },
          'show.bs.dropdown': function (e) {
            that.$menuInner.attr('aria-expanded', true);
            that.$element.trigger('show.bs.select', e);
          },
          'shown.bs.dropdown': function (e) {
            that.$element.trigger('shown.bs.select', e);
          }
        });
  
        if (that.$element[0].hasAttribute('required')) {
          this.$element.on('invalid', function () {
            that.$button
              .addClass('bs-invalid')
              .focus();
  
            that.$element.on({
              'focus.bs.select': function () {
                that.$button.focus();
                that.$element.off('focus.bs.select');
              },
              'shown.bs.select': function () {
                that.$element
                  .val(that.$element.val()) // set the value to hide the validation message in Chrome when menu is opened
                  .off('shown.bs.select');
              },
              'rendered.bs.select': function () {
                // if select is no longer invalid, remove the bs-invalid class
                if (this.validity.valid) that.$button.removeClass('bs-invalid');
                that.$element.off('rendered.bs.select');
              }
            });
          });
        }
  
        setTimeout(function () {
          that.$element.trigger('loaded.bs.select');
        });
      },
  
      createDropdown: function () {
        // Options
        // If we are multiple or showTick option is set, then add the show-tick class
        var showTick = (this.multiple || this.options.showTick) ? ' show-tick' : '',
            inputGroup = this.$element.parent().hasClass('input-group') ? ' input-group-btn' : '',
            autofocus = this.autofocus ? ' autofocus' : '';
        // Elements
        var header = this.options.header ? '<div class="popover-title"><button type="button" class="close" aria-hidden="true">&times;</button>' + this.options.header + '</div>' : '';
        var searchbox = this.options.liveSearch ?
        '<div class="bs-searchbox">' +
        '<input type="text" class="form-control" autocomplete="off"' +
        (null === this.options.liveSearchPlaceholder ? '' : ' placeholder="' + htmlEscape(this.options.liveSearchPlaceholder) + '"') + ' role="textbox" aria-label="Search">' +
        '</div>'
            : '';
        var actionsbox = this.multiple && this.options.actionsBox ?
        '<div class="bs-actionsbox">' +
        '<div class="btn-group btn-group-sm btn-block">' +
        '<button type="button" class="actions-btn bs-select-all btn btn-default">' +
        this.options.selectAllText +
        '</button>' +
        '<button type="button" class="actions-btn bs-deselect-all btn btn-default">' +
        this.options.deselectAllText +
        '</button>' +
        '</div>' +
        '</div>'
            : '';
        var donebutton = this.multiple && this.options.doneButton ?
        '<div class="bs-donebutton">' +
        '<div class="btn-group btn-block">' +
        '<button type="button" class="btn btn-sm btn-default">' +
        this.options.doneButtonText +
        '</button>' +
        '</div>' +
        '</div>'
            : '';
        var drop =
            '<div class="btn-group bootstrap-select' + showTick + inputGroup + '">' +
            '<button type="button" class="' + this.options.styleBase + ' dropdown-toggle" data-toggle="dropdown"' + autofocus + ' role="button">' +
            '<span class="filter-option pull-left"></span>&nbsp;' +
            '<span class="bs-caret">' +
            this.options.template.caret +
            '</span>' +
            '</button>' +
            '<div class="dropdown-menu open" role="combobox">' +
            header +
            searchbox +
            actionsbox +
            '<ul class="dropdown-menu inner" role="listbox" aria-expanded="false">' +
            '</ul>' +
            donebutton +
            '</div>' +
            '</div>';
  
        return $(drop);
      },
  
      createView: function () {
        var $drop = this.createDropdown(),
            li = this.createLi();
  
        $drop.find('ul')[0].innerHTML = li;
        return $drop;
      },
  
      reloadLi: function () {
        //Remove all children.
        this.destroyLi();
        //Re build
        var li = this.createLi();
        this.$menuInner[0].innerHTML = li;
      },
  
      destroyLi: function () {
        this.$menu.find('li').remove();
      },
  
      createLi: function () {
        var that = this,
            _li = [],
            optID = 0,
            titleOption = document.createElement('option'),
            liIndex = -1; // increment liIndex whenever a new <li> element is created to ensure liObj is correct
  
        // Helper functions
        /**
         * @param content
         * @param [index]
         * @param [classes]
         * @param [optgroup]
         * @returns {string}
         */
        var generateLI = function (content, index, classes, optgroup) {
          return '<li' +
              ((typeof classes !== 'undefined' & '' !== classes) ? ' class="' + classes + '"' : '') +
              ((typeof index !== 'undefined' & null !== index) ? ' data-original-index="' + index + '"' : '') +
              ((typeof optgroup !== 'undefined' & null !== optgroup) ? 'data-optgroup="' + optgroup + '"' : '') +
              '>' + content + '</li>';
        };
  
        /**
         * @param text
         * @param [classes]
         * @param [inline]
         * @param [tokens]
         * @returns {string}
         */
        var generateA = function (text, classes, inline, tokens) {
          return '<a tabindex="0"' +
              (typeof classes !== 'undefined' ? ' class="' + classes + '"' : '') +
              (typeof inline !== 'undefined' ? ' style="' + inline + '"' : '') +
              (that.options.liveSearchNormalize ? ' data-normalized-text="' + normalizeToBase(htmlEscape(text)) + '"' : '') +
              (typeof tokens !== 'undefined' || tokens !== null ? ' data-tokens="' + tokens + '"' : '') +
              ' role="option">' + text +
              '<span class="' + that.options.iconBase + ' ' + that.options.tickIcon + ' check-mark"></span>' +
              '</a>';
        };
  
        if (this.options.title && !this.multiple) {
          // this option doesn't create a new <li> element, but does add a new option, so liIndex is decreased
          // since liObj is recalculated on every refresh, liIndex needs to be decreased even if the titleOption is already appended
          liIndex--;
  
          if (!this.$element.find('.bs-title-option').length) {
            // Use native JS to prepend option (faster)
            var element = this.$element[0];
            titleOption.className = 'bs-title-option';
            titleOption.appendChild(document.createTextNode(this.options.title));
            titleOption.value = '';
            element.insertBefore(titleOption, element.firstChild);
            // Check if selected or data-selected attribute is already set on an option. If not, select the titleOption option.
            // the selected item may have been changed by user or programmatically before the bootstrap select plugin runs,
            // if so, the option will have the data-selected attribute
            var $opt = $(element.options[element.selectedIndex]);
            if ($opt.attr('selected') === undefined && $opt.data('selected') === undefined) {
              titleOption.selected = true;
            }
          }
        }
  
        this.$element.find('option').each(function (index) {
          var $this = $(this);
  
          liIndex++;
  
          if ($this.hasClass('bs-title-option')) return;
  
          // Get the class and text for the option
          var optionClass = this.className || '',
              inline = this.style.cssText,
              text = $this.data('content') ? $this.data('content') : $this.html(),
              tokens = $this.data('tokens') ? $this.data('tokens') : null,
              subtext = typeof $this.data('subtext') !== 'undefined' ? '<small class="text-muted">' + $this.data('subtext') + '</small>' : '',
              icon = typeof $this.data('icon') !== 'undefined' ? '<span class="' + that.options.iconBase + ' ' + $this.data('icon') + '"></span> ' : '',
              $parent = $this.parent(),
              isOptgroup = $parent[0].tagName === 'OPTGROUP',
              isOptgroupDisabled = isOptgroup && $parent[0].disabled,
              isDisabled = this.disabled || isOptgroupDisabled;
  
          if (icon !== '' && isDisabled) {
            icon = '<span>' + icon + '</span>';
          }
  
          if (that.options.hideDisabled && (isDisabled && !isOptgroup || isOptgroupDisabled)) {
            liIndex--;
            return;
          }
  
          if (!$this.data('content')) {
            // Prepend any icon and append any subtext to the main text.
            text = icon + '<span class="text">' + text + subtext + '</span>';
          }
  
          if (isOptgroup && $this.data('divider') !== true) {
            if (that.options.hideDisabled && isDisabled) {
              if ($parent.data('allOptionsDisabled') === undefined) {
                var $options = $parent.children();
                $parent.data('allOptionsDisabled', $options.filter(':disabled').length === $options.length);
              }
  
              if ($parent.data('allOptionsDisabled')) {
                liIndex--;
                return;
              }
            }
  
            var optGroupClass = ' ' + $parent[0].className || '';
  
            if ($this.index() === 0) { // Is it the first option of the optgroup?
              optID += 1;
  
              // Get the opt group label
              var label = $parent[0].label,
                  labelSubtext = typeof $parent.data('subtext') !== 'undefined' ? '<small class="text-muted">' + $parent.data('subtext') + '</small>' : '',
                  labelIcon = $parent.data('icon') ? '<span class="' + that.options.iconBase + ' ' + $parent.data('icon') + '"></span> ' : '';
  
              label = labelIcon + '<span class="text">' + label + labelSubtext + '</span>';
  
              if (index !== 0 && _li.length > 0) { // Is it NOT the first option of the select && are there elements in the dropdown?
                liIndex++;
                _li.push(generateLI('', null, 'divider', optID + 'div'));
              }
              liIndex++;
              _li.push(generateLI(label, null, 'dropdown-header' + optGroupClass, optID));
            }
  
            if (that.options.hideDisabled && isDisabled) {
              liIndex--;
              return;
            }
  
            _li.push(generateLI(generateA(text, 'opt ' + optionClass + optGroupClass, inline, tokens), index, '', optID));
          } else if ($this.data('divider') === true) {
            _li.push(generateLI('', index, 'divider'));
          } else if ($this.data('hidden') === true) {
            _li.push(generateLI(generateA(text, optionClass, inline, tokens), index, 'hidden is-hidden'));
          } else {
            var showDivider = this.previousElementSibling && this.previousElementSibling.tagName === 'OPTGROUP';
  
            // if previous element is not an optgroup and hideDisabled is true
            if (!showDivider && that.options.hideDisabled) {
              // get previous elements
              var $prev = $(this).prevAll();
  
              for (var i = 0; i < $prev.length; i++) {
                // find the first element in the previous elements that is an optgroup
                if ($prev[i].tagName === 'OPTGROUP') {
                  var optGroupDistance = 0;
  
                  // loop through the options in between the current option and the optgroup
                  // and check if they are hidden or disabled
                  for (var d = 0; d < i; d++) {
                    var prevOption = $prev[d];
                    if (prevOption.disabled || $(prevOption).data('hidden') === true) optGroupDistance++;
                  }
  
                  // if all of the options between the current option and the optgroup are hidden or disabled, show the divider
                  if (optGroupDistance === i) showDivider = true;
  
                  break;
                }
              }
            }
  
            if (showDivider) {
              liIndex++;
              _li.push(generateLI('', null, 'divider', optID + 'div'));
            }
            _li.push(generateLI(generateA(text, optionClass, inline, tokens), index));
          }
  
          that.liObj[index] = liIndex;
        });
  
        //If we are not multiple, we don't have a selected item, and we don't have a title, select the first element so something is set in the button
        if (!this.multiple && this.$element.find('option:selected').length === 0 && !this.options.title) {
          this.$element.find('option').eq(0).prop('selected', true).attr('selected', 'selected');
        }
  
        return _li.join('');
      },
  
      findLis: function () {
        if (this.$lis == null) this.$lis = this.$menu.find('li');
        return this.$lis;
      },
  
      /**
       * @param [updateLi] defaults to true
       */
      render: function (updateLi) {
        var that = this,
            notDisabled;
  
        //Update the LI to match the SELECT
        if (updateLi !== false) {
          this.$element.find('option').each(function (index) {
            var $lis = that.findLis().eq(that.liObj[index]);
  
            that.setDisabled(index, this.disabled || this.parentNode.tagName === 'OPTGROUP' && this.parentNode.disabled, $lis);
            that.setSelected(index, this.selected, $lis);
          });
        }
  
        this.togglePlaceholder();
  
        this.tabIndex();
  
        var selectedItems = this.$element.find('option').map(function () {
          if (this.selected) {
            if (that.options.hideDisabled && (this.disabled || this.parentNode.tagName === 'OPTGROUP' && this.parentNode.disabled)) return;
  
            var $this = $(this),
                icon = $this.data('icon') && that.options.showIcon ? '<i class="' + that.options.iconBase + ' ' + $this.data('icon') + '"></i> ' : '',
                subtext;
  
            if (that.options.showSubtext && $this.data('subtext') && !that.multiple) {
              subtext = ' <small class="text-muted">' + $this.data('subtext') + '</small>';
            } else {
              subtext = '';
            }
            if (typeof $this.attr('title') !== 'undefined') {
              return $this.attr('title');
            } else if ($this.data('content') && that.options.showContent) {
              return $this.data('content');
            } else {
              return icon + $this.html() + subtext;
            }
          }
        }).toArray();
  
        //Fixes issue in IE10 occurring when no default option is selected and at least one option is disabled
        //Convert all the values into a comma delimited string
        var title = !this.multiple ? selectedItems[0] : selectedItems.join(this.options.multipleSeparator);
  
        //If this is multi select, and the selectText type is count, the show 1 of 2 selected etc..
        if (this.multiple && this.options.selectedTextFormat.indexOf('count') > -1) {
          var max = this.options.selectedTextFormat.split('>');
          if ((max.length > 1 && selectedItems.length > max[1]) || (max.length == 1 && selectedItems.length >= 2)) {
            notDisabled = this.options.hideDisabled ? ', [disabled]' : '';
            var totalCount = this.$element.find('option').not('[data-divider="true"], [data-hidden="true"]' + notDisabled).length,
                tr8nText = (typeof this.options.countSelectedText === 'function') ? this.options.countSelectedText(selectedItems.length, totalCount) : this.options.countSelectedText;
            title = tr8nText.replace('{0}', selectedItems.length.toString()).replace('{1}', totalCount.toString());
          }
        }
  
        if (this.options.title == undefined) {
          this.options.title = this.$element.attr('title');
        }
  
        if (this.options.selectedTextFormat == 'static') {
          title = this.options.title;
        }
  
        //If we dont have a title, then use the default, or if nothing is set at all, use the not selected text
        if (!title) {
          title = typeof this.options.title !== 'undefined' ? this.options.title : this.options.noneSelectedText;
        }
  
        //strip all html-tags and trim the result
        this.$button.attr('title', $.trim(title.replace(/<[^>]*>?/g, '')));
        this.$button.children('.filter-option').html(title);
  
        this.$element.trigger('rendered.bs.select');
      },
  
      /**
       * @param [style]
       * @param [status]
       */
      setStyle: function (style, status) {
        if (this.$element.attr('class')) {
          this.$newElement.addClass(this.$element.attr('class').replace(/selectpicker|mobile-device|bs-select-hidden|validate\[.*\]/gi, ''));
        }
  
        var buttonClass = style ? style : this.options.style;
  
        if (status == 'add') {
          this.$button.addClass(buttonClass);
        } else if (status == 'remove') {
          this.$button.removeClass(buttonClass);
        } else {
          this.$button.removeClass(this.options.style);
          this.$button.addClass(buttonClass);
        }
      },
  
      liHeight: function (refresh) {
        if (!refresh && (this.options.size === false || this.sizeInfo)) return;
  
        var newElement = document.createElement('div'),
            menu = document.createElement('div'),
            menuInner = document.createElement('ul'),
            divider = document.createElement('li'),
            li = document.createElement('li'),
            a = document.createElement('a'),
            text = document.createElement('span'),
            header = this.options.header && this.$menu.find('.popover-title').length > 0 ? this.$menu.find('.popover-title')[0].cloneNode(true) : null,
            search = this.options.liveSearch ? document.createElement('div') : null,
            actions = this.options.actionsBox && this.multiple && this.$menu.find('.bs-actionsbox').length > 0 ? this.$menu.find('.bs-actionsbox')[0].cloneNode(true) : null,
            doneButton = this.options.doneButton && this.multiple && this.$menu.find('.bs-donebutton').length > 0 ? this.$menu.find('.bs-donebutton')[0].cloneNode(true) : null;
  
        text.className = 'text';
        newElement.className = this.$menu[0].parentNode.className + ' open';
        menu.className = 'dropdown-menu open';
        menuInner.className = 'dropdown-menu inner';
        divider.className = 'divider';
  
        text.appendChild(document.createTextNode('Inner text'));
        a.appendChild(text);
        li.appendChild(a);
        menuInner.appendChild(li);
        menuInner.appendChild(divider);
        if (header) menu.appendChild(header);
        if (search) {
          // create a span instead of input as creating an input element is slower
          var input = document.createElement('span');
          search.className = 'bs-searchbox';
          input.className = 'form-control';
          search.appendChild(input);
          menu.appendChild(search);
        }
        if (actions) menu.appendChild(actions);
        menu.appendChild(menuInner);
        if (doneButton) menu.appendChild(doneButton);
        newElement.appendChild(menu);
  
        document.body.appendChild(newElement);
  
        var liHeight = a.offsetHeight,
            headerHeight = header ? header.offsetHeight : 0,
            searchHeight = search ? search.offsetHeight : 0,
            actionsHeight = actions ? actions.offsetHeight : 0,
            doneButtonHeight = doneButton ? doneButton.offsetHeight : 0,
            dividerHeight = $(divider).outerHeight(true),
            // fall back to jQuery if getComputedStyle is not supported
            menuStyle = typeof getComputedStyle === 'function' ? getComputedStyle(menu) : false,
            $menu = menuStyle ? null : $(menu),
            menuPadding = {
              vert: parseInt(menuStyle ? menuStyle.paddingTop : $menu.css('paddingTop')) +
                    parseInt(menuStyle ? menuStyle.paddingBottom : $menu.css('paddingBottom')) +
                    parseInt(menuStyle ? menuStyle.borderTopWidth : $menu.css('borderTopWidth')) +
                    parseInt(menuStyle ? menuStyle.borderBottomWidth : $menu.css('borderBottomWidth')),
              horiz: parseInt(menuStyle ? menuStyle.paddingLeft : $menu.css('paddingLeft')) +
                    parseInt(menuStyle ? menuStyle.paddingRight : $menu.css('paddingRight')) +
                    parseInt(menuStyle ? menuStyle.borderLeftWidth : $menu.css('borderLeftWidth')) +
                    parseInt(menuStyle ? menuStyle.borderRightWidth : $menu.css('borderRightWidth'))
            },
            menuExtras =  {
              vert: menuPadding.vert +
                    parseInt(menuStyle ? menuStyle.marginTop : $menu.css('marginTop')) +
                    parseInt(menuStyle ? menuStyle.marginBottom : $menu.css('marginBottom')) + 2,
              horiz: menuPadding.horiz +
                    parseInt(menuStyle ? menuStyle.marginLeft : $menu.css('marginLeft')) +
                    parseInt(menuStyle ? menuStyle.marginRight : $menu.css('marginRight')) + 2
            }
  
        document.body.removeChild(newElement);
  
        this.sizeInfo = {
          liHeight: liHeight,
          headerHeight: headerHeight,
          searchHeight: searchHeight,
          actionsHeight: actionsHeight,
          doneButtonHeight: doneButtonHeight,
          dividerHeight: dividerHeight,
          menuPadding: menuPadding,
          menuExtras: menuExtras
        };
      },
  
      setSize: function () {
        this.findLis();
        this.liHeight();
  
        if (this.options.header) this.$menu.css('padding-top', 0);
        if (this.options.size === false) return;
  
        var that = this,
            $menu = this.$menu,
            $menuInner = this.$menuInner,
            $window = $(window),
            selectHeight = this.$newElement[0].offsetHeight,
            selectWidth = this.$newElement[0].offsetWidth,
            liHeight = this.sizeInfo['liHeight'],
            headerHeight = this.sizeInfo['headerHeight'],
            searchHeight = this.sizeInfo['searchHeight'],
            actionsHeight = this.sizeInfo['actionsHeight'],
            doneButtonHeight = this.sizeInfo['doneButtonHeight'],
            divHeight = this.sizeInfo['dividerHeight'],
            menuPadding = this.sizeInfo['menuPadding'],
            menuExtras = this.sizeInfo['menuExtras'],
            notDisabled = this.options.hideDisabled ? '.disabled' : '',
            menuHeight,
            menuWidth,
            getHeight,
            getWidth,
            selectOffsetTop,
            selectOffsetBot,
            selectOffsetLeft,
            selectOffsetRight,
            getPos = function() {
              var pos = that.$newElement.offset(),
                  $container = $(that.options.container),
                  containerPos;
  
              if (that.options.container && !$container.is('body')) {
                containerPos = $container.offset();
                containerPos.top += parseInt($container.css('borderTopWidth'));
                containerPos.left += parseInt($container.css('borderLeftWidth'));
              } else {
                containerPos = { top: 0, left: 0 };
              }
  
              selectOffsetTop = pos.top - containerPos.top - $window.scrollTop();
              selectOffsetBot = $window.height() - selectOffsetTop - selectHeight - containerPos.top;
              selectOffsetLeft = pos.left - containerPos.left - $window.scrollLeft();
              selectOffsetRight = $window.width() - selectOffsetLeft - selectWidth - containerPos.left;
            };
  
        getPos();
  
        if (this.options.size === 'auto') {
          var getSize = function () {
            var minHeight,
                hasClass = function (className, include) {
                  return function (element) {
                      if (include) {
                          return (element.classList ? element.classList.contains(className) : $(element).hasClass(className));
                      } else {
                          return !(element.classList ? element.classList.contains(className) : $(element).hasClass(className));
                      }
                  };
                },
                lis = that.$menuInner[0].getElementsByTagName('li'),
                lisVisible = Array.prototype.filter ? Array.prototype.filter.call(lis, hasClass('hidden', false)) : that.$lis.not('.hidden'),
                optGroup = Array.prototype.filter ? Array.prototype.filter.call(lisVisible, hasClass('dropdown-header', true)) : lisVisible.filter('.dropdown-header');
  
            getPos();
            menuHeight = selectOffsetBot - menuExtras.vert;
            menuWidth = selectOffsetRight - menuExtras.horiz;
  
            if (that.options.container) {
              if (!$menu.data('height')) $menu.data('height', $menu.height());
              getHeight = $menu.data('height');
  
              if (!$menu.data('width')) $menu.data('width', $menu.width());
              getWidth = $menu.data('width');
            } else {
              getHeight = $menu.height();
              getWidth = $menu.width();
            }
  
            if (that.options.dropupAuto) {
              that.$newElement.toggleClass('dropup', selectOffsetTop > selectOffsetBot && (menuHeight - menuExtras.vert) < getHeight);
            }
  
            if (that.$newElement.hasClass('dropup')) {
              menuHeight = selectOffsetTop - menuExtras.vert;
            }
  
            if (that.options.dropdownAlignRight === 'auto') {
              $menu.toggleClass('dropdown-menu-right', selectOffsetLeft > selectOffsetRight && (menuWidth - menuExtras.horiz) < (getWidth - selectWidth));
            }
  
            if ((lisVisible.length + optGroup.length) > 3) {
              minHeight = liHeight * 3 + menuExtras.vert - 2;
            } else {
              minHeight = 0;
            }
  
            $menu.css({
              'max-height': menuHeight + 'px',
              'overflow': 'hidden',
              'min-height': minHeight + headerHeight + searchHeight + actionsHeight + doneButtonHeight + 'px'
            });
            $menuInner.css({
              'max-height': menuHeight - headerHeight - searchHeight - actionsHeight - doneButtonHeight - menuPadding.vert + 'px',
              'overflow-y': 'auto',
              'min-height': Math.max(minHeight - menuPadding.vert, 0) + 'px'
            });
          };
          getSize();
          this.$searchbox.off('input.getSize propertychange.getSize').on('input.getSize propertychange.getSize', getSize);
          $window.off('resize.getSize scroll.getSize').on('resize.getSize scroll.getSize', getSize);
        } else if (this.options.size && this.options.size != 'auto' && this.$lis.not(notDisabled).length > this.options.size) {
          var optIndex = this.$lis.not('.divider').not(notDisabled).children().slice(0, this.options.size).last().parent().index(),
              divLength = this.$lis.slice(0, optIndex + 1).filter('.divider').length;
          menuHeight = liHeight * this.options.size + divLength * divHeight + menuPadding.vert;
  
          if (that.options.container) {
            if (!$menu.data('height')) $menu.data('height', $menu.height());
            getHeight = $menu.data('height');
          } else {
            getHeight = $menu.height();
          }
  
          if (that.options.dropupAuto) {
            //noinspection JSUnusedAssignment
            this.$newElement.toggleClass('dropup', selectOffsetTop > selectOffsetBot && (menuHeight - menuExtras.vert) < getHeight);
          }
          $menu.css({
            'max-height': menuHeight + headerHeight + searchHeight + actionsHeight + doneButtonHeight + 'px',
            'overflow': 'hidden',
            'min-height': ''
          });
          $menuInner.css({
            'max-height': menuHeight - menuPadding.vert + 'px',
            'overflow-y': 'auto',
            'min-height': ''
          });
        }
      },
  
      setWidth: function () {
        if (this.options.width === 'auto') {
          this.$menu.css('min-width', '0');
  
          // Get correct width if element is hidden
          var $selectClone = this.$menu.parent().clone().appendTo('body'),
              $selectClone2 = this.options.container ? this.$newElement.clone().appendTo('body') : $selectClone,
              ulWidth = $selectClone.children('.dropdown-menu').outerWidth(),
              btnWidth = $selectClone2.css('width', 'auto').children('button').outerWidth();
  
          $selectClone.remove();
          $selectClone2.remove();
  
          // Set width to whatever's larger, button title or longest option
          this.$newElement.css('width', Math.max(ulWidth, btnWidth) + 'px');
        } else if (this.options.width === 'fit') {
          // Remove inline min-width so width can be changed from 'auto'
          this.$menu.css('min-width', '');
          this.$newElement.css('width', '').addClass('fit-width');
        } else if (this.options.width) {
          // Remove inline min-width so width can be changed from 'auto'
          this.$menu.css('min-width', '');
          this.$newElement.css('width', this.options.width);
        } else {
          // Remove inline min-width/width so width can be changed
          this.$menu.css('min-width', '');
          this.$newElement.css('width', '');
        }
        // Remove fit-width class if width is changed programmatically
        if (this.$newElement.hasClass('fit-width') && this.options.width !== 'fit') {
          this.$newElement.removeClass('fit-width');
        }
      },
  
      selectPosition: function () {
        this.$bsContainer = $('<div class="bs-container" />');
  
        var that = this,
            $container = $(this.options.container),
            pos,
            containerPos,
            actualHeight,
            getPlacement = function ($element) {
              that.$bsContainer.addClass($element.attr('class').replace(/form-control|fit-width/gi, '')).toggleClass('dropup', $element.hasClass('dropup'));
              pos = $element.offset();
  
              if (!$container.is('body')) {
                containerPos = $container.offset();
                containerPos.top += parseInt($container.css('borderTopWidth')) - $container.scrollTop();
                containerPos.left += parseInt($container.css('borderLeftWidth')) - $container.scrollLeft();
              } else {
                containerPos = { top: 0, left: 0 };
              }
  
              actualHeight = $element.hasClass('dropup') ? 0 : $element[0].offsetHeight;
  
              that.$bsContainer.css({
                'top': pos.top - containerPos.top + actualHeight,
                'left': pos.left - containerPos.left,
                'width': $element[0].offsetWidth
              });
            };
  
        this.$button.on('click', function () {
          var $this = $(this);
  
          if (that.isDisabled()) {
            return;
          }
  
          getPlacement(that.$newElement);
  
          that.$bsContainer
            .appendTo(that.options.container)
            .toggleClass('open', !$this.hasClass('open'))
            .append(that.$menu);
        });
  
        $(window).on('resize scroll', function () {
          getPlacement(that.$newElement);
        });
  
        this.$element.on('hide.bs.select', function () {
          that.$menu.data('height', that.$menu.height());
          that.$bsContainer.detach();
        });
      },
  
      /**
       * @param {number} index - the index of the option that is being changed
       * @param {boolean} selected - true if the option is being selected, false if being deselected
       * @param {JQuery} $lis - the 'li' element that is being modified
       */
      setSelected: function (index, selected, $lis) {
        if (!$lis) {
          this.togglePlaceholder(); // check if setSelected is being called by changing the value of the select
          $lis = this.findLis().eq(this.liObj[index]);
        }
  
        $lis.toggleClass('selected', selected).find('a').attr('aria-selected', selected);
      },
  
      /**
       * @param {number} index - the index of the option that is being disabled
       * @param {boolean} disabled - true if the option is being disabled, false if being enabled
       * @param {JQuery} $lis - the 'li' element that is being modified
       */
      setDisabled: function (index, disabled, $lis) {
        if (!$lis) {
          $lis = this.findLis().eq(this.liObj[index]);
        }
  
        if (disabled) {
          $lis.addClass('disabled').children('a').attr('href', '#').attr('tabindex', -1).attr('aria-disabled', true);
        } else {
          $lis.removeClass('disabled').children('a').removeAttr('href').attr('tabindex', 0).attr('aria-disabled', false);
        }
      },
  
      isDisabled: function () {
        return this.$element[0].disabled;
      },
  
      checkDisabled: function () {
        var that = this;
  
        if (this.isDisabled()) {
          this.$newElement.addClass('disabled');
          this.$button.addClass('disabled').attr('tabindex', -1);
        } else {
          if (this.$button.hasClass('disabled')) {
            this.$newElement.removeClass('disabled');
            this.$button.removeClass('disabled');
          }
  
          if (this.$button.attr('tabindex') == -1 && !this.$element.data('tabindex')) {
            this.$button.removeAttr('tabindex');
          }
        }
  
        this.$button.click(function () {
          return !that.isDisabled();
        });
      },
  
      togglePlaceholder: function () {
        var value = this.$element.val();
        this.$button.toggleClass('bs-placeholder', value === null || value === '');
      },
  
      tabIndex: function () {
        if (this.$element.data('tabindex') !== this.$element.attr('tabindex') && 
          (this.$element.attr('tabindex') !== -98 && this.$element.attr('tabindex') !== '-98')) {
          this.$element.data('tabindex', this.$element.attr('tabindex'));
          this.$button.attr('tabindex', this.$element.data('tabindex'));
        }
  
        this.$element.attr('tabindex', -98);
      },
  
      clickListener: function () {
        var that = this,
            $document = $(document);
  
        this.$newElement.on('touchstart.dropdown', '.dropdown-menu', function (e) {
          e.stopPropagation();
        });
  
        $document.data('spaceSelect', false);
  
        this.$button.on('keyup', function (e) {
          if (/(32)/.test(e.keyCode.toString(10)) && $document.data('spaceSelect')) {
              e.preventDefault();
              $document.data('spaceSelect', false);
          }
        });
  
        this.$button.on('click', function () {
          that.setSize();
        });
  
        this.$element.on('shown.bs.select', function () {
          if (!that.options.liveSearch && !that.multiple) {
            that.$menuInner.find('.selected a').focus();
          } else if (!that.multiple) {
            var selectedIndex = that.liObj[that.$element[0].selectedIndex];
  
            if (typeof selectedIndex !== 'number' || that.options.size === false) return;
  
            // scroll to selected option
            var offset = that.$lis.eq(selectedIndex)[0].offsetTop - that.$menuInner[0].offsetTop;
            offset = offset - that.$menuInner[0].offsetHeight/2 + that.sizeInfo.liHeight/2;
            that.$menuInner[0].scrollTop = offset;
          }
        });
  
        this.$menuInner.on('click', 'li a', function (e) {
          var $this = $(this),
              clickedIndex = $this.parent().data('originalIndex'),
              prevValue = that.$element.val(),
              prevIndex = that.$element.prop('selectedIndex'),
              triggerChange = true;
  
          // Don't close on multi choice menu
          if (that.multiple && that.options.maxOptions !== 1) {
            e.stopPropagation();
          }
  
          e.preventDefault();
  
          //Don't run if we have been disabled
          if (!that.isDisabled() && !$this.parent().hasClass('disabled')) {
            var $options = that.$element.find('option'),
                $option = $options.eq(clickedIndex),
                state = $option.prop('selected'),
                $optgroup = $option.parent('optgroup'),
                maxOptions = that.options.maxOptions,
                maxOptionsGrp = $optgroup.data('maxOptions') || false;
  
            if (!that.multiple) { // Deselect all others if not multi select box
              $options.prop('selected', false);
              $option.prop('selected', true);
              that.$menuInner.find('.selected').removeClass('selected').find('a').attr('aria-selected', false);
              that.setSelected(clickedIndex, true);
            } else { // Toggle the one we have chosen if we are multi select.
              $option.prop('selected', !state);
              that.setSelected(clickedIndex, !state);
              $this.blur();
  
              if (maxOptions !== false || maxOptionsGrp !== false) {
                var maxReached = maxOptions < $options.filter(':selected').length,
                    maxReachedGrp = maxOptionsGrp < $optgroup.find('option:selected').length;
  
                if ((maxOptions && maxReached) || (maxOptionsGrp && maxReachedGrp)) {
                  if (maxOptions && maxOptions == 1) {
                    $options.prop('selected', false);
                    $option.prop('selected', true);
                    that.$menuInner.find('.selected').removeClass('selected');
                    that.setSelected(clickedIndex, true);
                  } else if (maxOptionsGrp && maxOptionsGrp == 1) {
                    $optgroup.find('option:selected').prop('selected', false);
                    $option.prop('selected', true);
                    var optgroupID = $this.parent().data('optgroup');
                    that.$menuInner.find('[data-optgroup="' + optgroupID + '"]').removeClass('selected');
                    that.setSelected(clickedIndex, true);
                  } else {
                    var maxOptionsText = typeof that.options.maxOptionsText === 'string' ? [that.options.maxOptionsText, that.options.maxOptionsText] : that.options.maxOptionsText,
                        maxOptionsArr = typeof maxOptionsText === 'function' ? maxOptionsText(maxOptions, maxOptionsGrp) : maxOptionsText,
                        maxTxt = maxOptionsArr[0].replace('{n}', maxOptions),
                        maxTxtGrp = maxOptionsArr[1].replace('{n}', maxOptionsGrp),
                        $notify = $('<div class="notify"></div>');
                    // If {var} is set in array, replace it
                    /** @deprecated */
                    if (maxOptionsArr[2]) {
                      maxTxt = maxTxt.replace('{var}', maxOptionsArr[2][maxOptions > 1 ? 0 : 1]);
                      maxTxtGrp = maxTxtGrp.replace('{var}', maxOptionsArr[2][maxOptionsGrp > 1 ? 0 : 1]);
                    }
  
                    $option.prop('selected', false);
  
                    that.$menu.append($notify);
  
                    if (maxOptions && maxReached) {
                      $notify.append($('<div>' + maxTxt + '</div>'));
                      triggerChange = false;
                      that.$element.trigger('maxReached.bs.select');
                    }
  
                    if (maxOptionsGrp && maxReachedGrp) {
                      $notify.append($('<div>' + maxTxtGrp + '</div>'));
                      triggerChange = false;
                      that.$element.trigger('maxReachedGrp.bs.select');
                    }
  
                    setTimeout(function () {
                      that.setSelected(clickedIndex, false);
                    }, 10);
  
                    $notify.delay(750).fadeOut(300, function () {
                      $(this).remove();
                    });
                  }
                }
              }
            }
  
            if (!that.multiple || (that.multiple && that.options.maxOptions === 1)) {
              that.$button.focus();
            } else if (that.options.liveSearch) {
              that.$searchbox.focus();
            }
  
            // Trigger select 'change'
            if (triggerChange) {
              if ((prevValue != that.$element.val() && that.multiple) || (prevIndex != that.$element.prop('selectedIndex') && !that.multiple)) {
                // $option.prop('selected') is current option state (selected/unselected). state is previous option state.
                changed_arguments = [clickedIndex, $option.prop('selected'), state];
                that.$element
                  .triggerNative('change');
              }
            }
          }
        });
  
        this.$menu.on('click', 'li.disabled a, .popover-title, .popover-title :not(.close)', function (e) {
          if (e.currentTarget == this) {
            e.preventDefault();
            e.stopPropagation();
            if (that.options.liveSearch && !$(e.target).hasClass('close')) {
              that.$searchbox.focus();
            } else {
              that.$button.focus();
            }
          }
        });
  
        this.$menuInner.on('click', '.divider, .dropdown-header', function (e) {
          e.preventDefault();
          e.stopPropagation();
          if (that.options.liveSearch) {
            that.$searchbox.focus();
          } else {
            that.$button.focus();
          }
        });
  
        this.$menu.on('click', '.popover-title .close', function () {
          that.$button.click();
        });
  
        this.$searchbox.on('click', function (e) {
          e.stopPropagation();
        });
  
        this.$menu.on('click', '.actions-btn', function (e) {
          if (that.options.liveSearch) {
            that.$searchbox.focus();
          } else {
            that.$button.focus();
          }
  
          e.preventDefault();
          e.stopPropagation();
  
          if ($(this).hasClass('bs-select-all')) {
            that.selectAll();
          } else {
            that.deselectAll();
          }
        });
  
        this.$element.change(function () {
          that.render(false);
          that.$element.trigger('changed.bs.select', changed_arguments);
          changed_arguments = null;
        });
      },
  
      liveSearchListener: function () {
        var that = this,
            $no_results = $('<li class="no-results"></li>');
  
        this.$button.on('click.dropdown.data-api touchstart.dropdown.data-api', function () {
          that.$menuInner.find('.active').removeClass('active');
          if (!!that.$searchbox.val()) {
            that.$searchbox.val('');
            that.$lis.not('.is-hidden').removeClass('hidden');
            if (!!$no_results.parent().length) $no_results.remove();
          }
          if (!that.multiple) that.$menuInner.find('.selected').addClass('active');
          setTimeout(function () {
            that.$searchbox.focus();
          }, 10);
        });
  
        this.$searchbox.on('click.dropdown.data-api focus.dropdown.data-api touchend.dropdown.data-api', function (e) {
          e.stopPropagation();
        });
  
        this.$searchbox.on('input propertychange', function () {
          if (that.$searchbox.val()) {
            var $searchBase = that.$lis.not('.is-hidden').removeClass('hidden').children('a');
            if (that.options.liveSearchNormalize) {
              $searchBase = $searchBase.not(':a' + that._searchStyle() + '("' + normalizeToBase(that.$searchbox.val()) + '")');
            } else {
              $searchBase = $searchBase.not(':' + that._searchStyle() + '("' + that.$searchbox.val() + '")');
            }
            $searchBase.parent().addClass('hidden');
  
            that.$lis.filter('.dropdown-header').each(function () {
              var $this = $(this),
                  optgroup = $this.data('optgroup');
  
              if (that.$lis.filter('[data-optgroup=' + optgroup + ']').not($this).not('.hidden').length === 0) {
                $this.addClass('hidden');
                that.$lis.filter('[data-optgroup=' + optgroup + 'div]').addClass('hidden');
              }
            });
  
            var $lisVisible = that.$lis.not('.hidden');
  
            // hide divider if first or last visible, or if followed by another divider
            $lisVisible.each(function (index) {
              var $this = $(this);
  
              if ($this.hasClass('divider') && (
                $this.index() === $lisVisible.first().index() ||
                $this.index() === $lisVisible.last().index() ||
                $lisVisible.eq(index + 1).hasClass('divider'))) {
                $this.addClass('hidden');
              }
            });
  
            if (!that.$lis.not('.hidden, .no-results').length) {
              if (!!$no_results.parent().length) {
                $no_results.remove();
              }
              $no_results.html(that.options.noneResultsText.replace('{0}', '"' + htmlEscape(that.$searchbox.val()) + '"')).show();
              that.$menuInner.append($no_results);
            } else if (!!$no_results.parent().length) {
              $no_results.remove();
            }
          } else {
            that.$lis.not('.is-hidden').removeClass('hidden');
            if (!!$no_results.parent().length) {
              $no_results.remove();
            }
          }
  
          that.$lis.filter('.active').removeClass('active');
          if (that.$searchbox.val()) that.$lis.not('.hidden, .divider, .dropdown-header').eq(0).addClass('active').children('a').focus();
          $(this).focus();
        });
      },
  
      _searchStyle: function () {
        var styles = {
          begins: 'ibegins',
          startsWith: 'ibegins'
        };
  
        return styles[this.options.liveSearchStyle] || 'icontains';
      },
  
      val: function (value) {
        if (typeof value !== 'undefined') {
          this.$element.val(value);
          this.render();
  
          return this.$element;
        } else {
          return this.$element.val();
        }
      },
  
      changeAll: function (status) {
        if (!this.multiple) return;
        if (typeof status === 'undefined') status = true;
  
        this.findLis();
  
        var $options = this.$element.find('option'),
            $lisVisible = this.$lis.not('.divider, .dropdown-header, .disabled, .hidden'),
            lisVisLen = $lisVisible.length,
            selectedOptions = [];
            
        if (status) {
          if ($lisVisible.filter('.selected').length === $lisVisible.length) return;
        } else {
          if ($lisVisible.filter('.selected').length === 0) return;
        }
            
        $lisVisible.toggleClass('selected', status);
  
        for (var i = 0; i < lisVisLen; i++) {
          var origIndex = $lisVisible[i].getAttribute('data-original-index');
          selectedOptions[selectedOptions.length] = $options.eq(origIndex)[0];
        }
  
        $(selectedOptions).prop('selected', status);
  
        this.render(false);
  
        this.togglePlaceholder();
  
        this.$element
          .triggerNative('change');
      },
  
      selectAll: function () {
        return this.changeAll(true);
      },
  
      deselectAll: function () {
        return this.changeAll(false);
      },
  
      toggle: function (e) {
        e = e || window.event;
  
        if (e) e.stopPropagation();
  
        this.$button.trigger('click');
      },
  
      keydown: function (e) {
        var $this = $(this),
            $parent = $this.is('input') ? $this.parent().parent() : $this.parent(),
            $items,
            that = $parent.data('this'),
            index,
            next,
            first,
            last,
            prev,
            nextPrev,
            prevIndex,
            isActive,
            selector = ':not(.disabled, .hidden, .dropdown-header, .divider)',
            keyCodeMap = {
              32: ' ',
              48: '0',
              49: '1',
              50: '2',
              51: '3',
              52: '4',
              53: '5',
              54: '6',
              55: '7',
              56: '8',
              57: '9',
              59: ';',
              65: 'a',
              66: 'b',
              67: 'c',
              68: 'd',
              69: 'e',
              70: 'f',
              71: 'g',
              72: 'h',
              73: 'i',
              74: 'j',
              75: 'k',
              76: 'l',
              77: 'm',
              78: 'n',
              79: 'o',
              80: 'p',
              81: 'q',
              82: 'r',
              83: 's',
              84: 't',
              85: 'u',
              86: 'v',
              87: 'w',
              88: 'x',
              89: 'y',
              90: 'z',
              96: '0',
              97: '1',
              98: '2',
              99: '3',
              100: '4',
              101: '5',
              102: '6',
              103: '7',
              104: '8',
              105: '9'
            };
  
        if (that.options.liveSearch) $parent = $this.parent().parent();
  
        if (that.options.container) $parent = that.$menu;
  
        $items = $('[role="listbox"] li', $parent);
  
        isActive = that.$newElement.hasClass('open');
  
        if (!isActive && (e.keyCode >= 48 && e.keyCode <= 57 || e.keyCode >= 96 && e.keyCode <= 105 || e.keyCode >= 65 && e.keyCode <= 90)) {
          if (!that.options.container) {
            that.setSize();
            that.$menu.parent().addClass('open');
            isActive = true;
          } else {
            that.$button.trigger('click');
          }
          that.$searchbox.focus();
          return;
        }
  
        if (that.options.liveSearch) {
          if (/(^9$|27)/.test(e.keyCode.toString(10)) && isActive && that.$menu.find('.active').length === 0) {
            e.preventDefault();
            that.$menu.parent().removeClass('open');
            if (that.options.container) that.$newElement.removeClass('open');
            that.$button.focus();
          }
          // $items contains li elements when liveSearch is enabled
          $items = $('[role="listbox"] li' + selector, $parent);
          if (!$this.val() && !/(38|40)/.test(e.keyCode.toString(10))) {
            if ($items.filter('.active').length === 0) {
              $items = that.$menuInner.find('li');
              if (that.options.liveSearchNormalize) {
                $items = $items.filter(':a' + that._searchStyle() + '(' + normalizeToBase(keyCodeMap[e.keyCode]) + ')');
              } else {
                $items = $items.filter(':' + that._searchStyle() + '(' + keyCodeMap[e.keyCode] + ')');
              }
            }
          }
        }
  
        if (!$items.length) return;
  
        if (/(38|40)/.test(e.keyCode.toString(10))) {
          index = $items.index($items.find('a').filter(':focus').parent());
          first = $items.filter(selector).first().index();
          last = $items.filter(selector).last().index();
          next = $items.eq(index).nextAll(selector).eq(0).index();
          prev = $items.eq(index).prevAll(selector).eq(0).index();
          nextPrev = $items.eq(next).prevAll(selector).eq(0).index();
  
          if (that.options.liveSearch) {
            $items.each(function (i) {
              if (!$(this).hasClass('disabled')) {
                $(this).data('index', i);
              }
            });
            index = $items.index($items.filter('.active'));
            first = $items.first().data('index');
            last = $items.last().data('index');
            next = $items.eq(index).nextAll().eq(0).data('index');
            prev = $items.eq(index).prevAll().eq(0).data('index');
            nextPrev = $items.eq(next).prevAll().eq(0).data('index');
          }
  
          prevIndex = $this.data('prevIndex');
  
          if (e.keyCode == 38) {
            if (that.options.liveSearch) index--;
            if (index != nextPrev && index > prev) index = prev;
            if (index < first) index = first;
            if (index == prevIndex) index = last;
          } else if (e.keyCode == 40) {
            if (that.options.liveSearch) index++;
            if (index == -1) index = 0;
            if (index != nextPrev && index < next) index = next;
            if (index > last) index = last;
            if (index == prevIndex) index = first;
          }
  
          $this.data('prevIndex', index);
  
          if (!that.options.liveSearch) {
            $items.eq(index).children('a').focus();
          } else {
            e.preventDefault();
            if (!$this.hasClass('dropdown-toggle')) {
              $items.removeClass('active').eq(index).addClass('active').children('a').focus();
              $this.focus();
            }
          }
  
        } else if (!$this.is('input')) {
          var keyIndex = [],
              count,
              prevKey;
  
          $items.each(function () {
            if (!$(this).hasClass('disabled')) {
              if ($.trim($(this).children('a').text().toLowerCase()).substring(0, 1) == keyCodeMap[e.keyCode]) {
                keyIndex.push($(this).index());
              }
            }
          });
  
          count = $(document).data('keycount');
          count++;
          $(document).data('keycount', count);
  
          prevKey = $.trim($(':focus').text().toLowerCase()).substring(0, 1);
  
          if (prevKey != keyCodeMap[e.keyCode]) {
            count = 1;
            $(document).data('keycount', count);
          } else if (count >= keyIndex.length) {
            $(document).data('keycount', 0);
            if (count > keyIndex.length) count = 1;
          }
  
          $items.eq(keyIndex[count - 1]).children('a').focus();
        }
  
        // Select focused option if "Enter", "Spacebar" or "Tab" (when selectOnTab is true) are pressed inside the menu.
        if ((/(13|32)/.test(e.keyCode.toString(10)) || (/(^9$)/.test(e.keyCode.toString(10)) && that.options.selectOnTab)) && isActive) {
          if (!/(32)/.test(e.keyCode.toString(10))) e.preventDefault();
          if (!that.options.liveSearch) {
            var elem = $(':focus');
            elem.click();
            // Bring back focus for multiselects
            elem.focus();
            // Prevent screen from scrolling if the user hit the spacebar
            e.preventDefault();
            // Fixes spacebar selection of dropdown items in FF & IE
            $(document).data('spaceSelect', true);
          } else if (!/(32)/.test(e.keyCode.toString(10))) {
            that.$menuInner.find('.active a').click();
            $this.focus();
          }
          $(document).data('keycount', 0);
        }
  
        if ((/(^9$|27)/.test(e.keyCode.toString(10)) && isActive && (that.multiple || that.options.liveSearch)) || (/(27)/.test(e.keyCode.toString(10)) && !isActive)) {
          that.$menu.parent().removeClass('open');
          if (that.options.container) that.$newElement.removeClass('open');
          that.$button.focus();
        }
      },
  
      mobile: function () {
        this.$element.addClass('mobile-device');
      },
  
      refresh: function () {
        this.$lis = null;
        this.liObj = {};
        this.reloadLi();
        this.render();
        this.checkDisabled();
        this.liHeight(true);
        this.setStyle();
        this.setWidth();
        if (this.$lis) this.$searchbox.trigger('propertychange');
  
        this.$element.trigger('refreshed.bs.select');
      },
  
      hide: function () {
        this.$newElement.hide();
      },
  
      show: function () {
        this.$newElement.show();
      },
  
      remove: function () {
        this.$newElement.remove();
        this.$element.remove();
      },
  
      destroy: function () {
        this.$newElement.before(this.$element).remove();
  
        if (this.$bsContainer) {
          this.$bsContainer.remove();
        } else {
          this.$menu.remove();
        }
  
        this.$element
          .off('.bs.select')
          .removeData('selectpicker')
          .removeClass('bs-select-hidden selectpicker');
      }
    };
  
    // SELECTPICKER PLUGIN DEFINITION
    // ==============================
    function Plugin(option, event) {
      // get the args of the outer function..
      var args = arguments;
      // The arguments of the function are explicitly re-defined from the argument list, because the shift causes them
      // to get lost/corrupted in android 2.3 and IE9 #715 #775
      var _option = option,
          _event = event;
      [].shift.apply(args);
  
      var value;
      var chain = this.each(function () {
        var $this = $(this);
        if ($this.is('select')) {
          var data = $this.data('selectpicker'),
              options = typeof _option == 'object' && _option;
  
          if (!data) {
            var config = $.extend({}, Selectpicker.DEFAULTS, $.fn.selectpicker.defaults || {}, $this.data(), options);
            config.template = $.extend({}, Selectpicker.DEFAULTS.template, ($.fn.selectpicker.defaults ? $.fn.selectpicker.defaults.template : {}), $this.data().template, options.template);
            $this.data('selectpicker', (data = new Selectpicker(this, config, _event)));
          } else if (options) {
            for (var i in options) {
              if (options.hasOwnProperty(i)) {
                data.options[i] = options[i];
              }
            }
          }
  
          if (typeof _option == 'string') {
            if (data[_option] instanceof Function) {
              value = data[_option].apply(data, args);
            } else {
              value = data.options[_option];
            }
          }
        }
      });
  
      if (typeof value !== 'undefined') {
        //noinspection JSUnusedAssignment
        return value;
      } else {
        return chain;
      }
    }
  
    var old = $.fn.selectpicker;
    $.fn.selectpicker = Plugin;
    $.fn.selectpicker.Constructor = Selectpicker;
  
    // SELECTPICKER NO CONFLICT
    // ========================
    $.fn.selectpicker.noConflict = function () {
      $.fn.selectpicker = old;
      return this;
    };
  
    $(document)
        .data('keycount', 0)
        .on('keydown.bs.select', '.bootstrap-select [data-toggle=dropdown], .bootstrap-select [role="listbox"], .bs-searchbox input', Selectpicker.prototype.keydown)
        .on('focusin.modal', '.bootstrap-select [data-toggle=dropdown], .bootstrap-select [role="listbox"], .bs-searchbox input', function (e) {
          e.stopPropagation();
        });
  
    // SELECTPICKER DATA-API
    // =====================
    $(window).on('load.bs.select.data-api', function () {
      $('.selectpicker').each(function () {
        var $selectpicker = $(this);
        Plugin.call($selectpicker, $selectpicker.data());
      })
    });
  })(jQuery);
  
  
  }));
  
</script>
<script>
  const allRanges = document.querySelectorAll(".range-wrap");
  allRanges.forEach(wrap => {
    const range = wrap.querySelector(".range");
    const bubble = wrap.querySelector(".bubble");
  
  
    range.addEventListener("input", () => {
     console.log('input');
      setBubble(range, bubble);
    });
    setBubble(range, bubble);
  });
  
  function setBubble(range, bubble) {
    const val = range.value;
    const min = range.min ? range.min : 0;
    const max = range.max ? range.max : 100;
    const newVal = Number(((val - min) * 100) / (max - min));
    bubble.innerHTML = val;
   
  
    // Sorta magic numbers based on size of the native UI thumb
    bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
  }
</script>
<script> 
  var rng = document.getElementById("stability_id");
  var ro = document.getElementById("rngOutput");
  var myRange = ["6 Months","12 Months","24 Months","30 Months"];
  
  function updateRange(){
     ro.textContent = myRange[parseInt(rng.value, 10)];
     console.log("Selected value is: " + myRange[parseInt(rng.value, 10)] + ", Associated value is: " + rng.value);
  };
  
  window.addEventListener("DOMContentLoaded", updateRange);
  rng.addEventListener("input", updateRange);
</script>

<style>
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{background-color:#88b820;
																				color:#fff;border:none;margin-bottom:1px;border-radius: 3px 3px 0px 0px;}



.nav-tabs>li.active a {
    color: #fff !important;
    border: none;
    background-color: #95ca24;
}
.nav>li>a:hover {
    text-decoration: none;
    background-color:#95ca24;
    color: #fff;
}
.nav-tabs>li:hover{  background-color:#95ca24;}
.nav-tabs>li:focus{ background-color:#95ca24;}
.nav>li>a:focus{
	text-decoration: none;
    background-color: #95ca24;
    color: #fff;
	}
.nav>li>a:active{
	 text-decoration: none;
    background-color: #95ca24;
    color: #fff;
	border-radius: 3px;
	}
.nav-tabs>li.active a {
	text-decoration: none;
    background-color:#95ca24;
    color: #fff;
	border-radius: 3px 3px 0px 0px;
	}		
.nav>li>a:focus, .nav>li>a:hover {
     text-decoration: none !important;
	 border-radius: 3px;
   
}

.nav-tabs>li.active{
	color: #93d643;
    cursor: default;
	 background-color: #b5ff04;
    color: #fff;
	border-radius: 3px;
  }
.nav-tabs{border-bottom:none;} 
  
.nav-tabs ul li a{color:#fff;font-size:12px;}  
 .nav-tabs>li>a{border:none;line-height:normal;margin-right:0px !important;} 
.nav-tabs>li.active a{color:#3310bf;border:none;}
.nav-tabs>li.active>a:hover{border:none;}
.nav-tabs>li>a:hover{border:none !important;}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
    color: #fff;
    font-size: 12px;
}
.jobinfolist li h4 {
    font-size: 12px;
    display: inline-block;
    font-weight: 700;
    width: 46%;
    float: left;
}
.jobinfolist li strong {
    color: #719b0d;
    font-weight: 400;
    font-size: 11px;
    float: left;
    width: 54%;
    line-height: 18px;
    margin-top: 7px;
}
.jobinfolist {
    margin-left: 0 !important;
}
.jobinfolist li:after {
    display: table;
    clear: both;
    content: '';
}
.jobinfolist li {
    padding-left: 0 !important;
    padding: 0px 0 !important;
   
    line-height: 7px !important;
    list-style-type: none;
}
.job-header .contentbox ul li {
    padding: 8px 0 8px 25px;
    position: relative;
    line-height: 24px;
}
.bullet{list-style-type: disc !important;
    font-size: 22px !important;
    color: #a9e222 !important;}
div#menu1 {
   
    line-height: 35px;
   
}

.tab-pane ul li a:hover {
    color:#666;
}
.modal-header{border:none;}
.modal-header {
    border: none;
  
    background-image: linear-gradient(to right, #ace41e , #2196F3);
    box-shadow: 2px 2px 6px #d6cfcfc2;
}
.form-horizontal .control-label{color:#075b23;}
.modal-title {
    margin: 0px 51px;
    line-height: 1.42857143;
    color: #fff;
    font-size: 18px;
}
.tab-pane ul li a {
    font-size: 17px;
    color:#848494;
    text-transform: uppercase;
    font-weight: 700;
}
.form-horizontal .control-label{font-size:13px;}
b{font-size:12px;color:#000;}
.modal-footer .btn+.btn{border-radius:39px;
					background-color:#a8e224;
					border:none;
					}
.uplode-resume .form-control{background-color:#0868af;
						color:#FFF;border: 1px solid #4da8e4;}
.Profile-summery {
    margin: 0px 20px;
}			
.Profile-summery h4{margin-bottom:20px;}	
.resume-link{margin-top:20px;}
.resume-link .form-control{margin:15px 0px;}	
button.save-apply-btn {
    padding: 9px 60px;
    float: right;
    border: solid 2px #F44336;
    border-radius: 39px;
    background-color: #f44336d6;
    color: #fff;
}
button.save-apply-btn:hover{background-color:#f44336;}
.img-circle {
    border-radius: 50%;
    width:150px;
    height: 150px;
	background-image: linear-gradient(to right, #ace41e , #2196F3);
}
.uplode-resume {
    margin: 30px;
    margin-left: 20px;
}
.uplode-resume .form-control{width:31%;}

.tab-content {
    margin-top: 35px;
}
.my-pro-heading{
    font-size: 24PX;
    COLOR: #666;
    FONT-WEIGHT: 700;
    MARGIN-LEFT: 26PX;
    MARGIN-BOTTOM: 24PX;
}

</style>
<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>        

<div class="tabdata"></div>

 <?php $this->load->view("fontend/layout/footer.php"); ?>
 
 
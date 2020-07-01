<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="index-css.css" rel="stylesheet" type="text/css" />


  <title>Navbar con MaterializeCSS</title>
</head>
<style>
.container{max-width:1260px !important;}
.@media only screen and (min-width: 601px){
.container {
  max-width:1260px !important;
}
}
.container {
  max-width:1260px !important;
}
@media only screen and (min-width: 993px){
.container {
  max-width:100%;
}
}
@media only screen and (min-width: 993px){
.container {
    width: 100%;
}
}
.indigo{background-color:#18c5bd !important;
box-shadow: 2px 2px 2px #dedddd !important;
padding:14px 0px;}
nav{line-height:35px;}   
.yellow{background-color:#fff !important;
border-radius: 20px 0px 0px 20px;}
.yellow:hover{background-color:#11a8a1 !important;
}
.yellow a{color:#7b7878;}
.yellow a:hover{background-color:#0f958f;
border-radius: 20px 0px 0px 20px;
color:#fff;
}
.yellow:hover.yellow a {color:#fff !important;}
.yellow2 a{color:#7b7878;}
.yellow2 a:hover{background-color:#0f958f;  
border-radius: 0px 20px 20px 0px;
color:#fff;
}
.yellow2{background-color:#fff !important;
border-radius: 0px 20px 20px 0px;}
.m_icon {   
    width: 50px;
    height: 50px;
    background-color: #d2ebea47;
    border-radius: 48px;
    text-align: center;
    line-height: 50px;
    margin-left: 44px;
    margin-bottom: 20px;
    color: #18c5bd;
  
}
nav ul a:hover{text-decoration:none !important;
border-radius: 30px;
color: #91f8f4;}
nav ul a{font-size:13px;}
.small_t{line-height: 50px;
    font-size: 14px;
    font-weight: 600;
    color: #5f5f60;
  }
.m_icon:after {
    content: '';
    display: block;
    width: 27px;
    height: 4px;
    background: #cecece66;
    margin: 0 auto;
    margin-top: 15px;
    border-radius: 5px;
}
.anchor_link ul li {
    text-align: center;
    float: left;
    margin-right: 30px;
    cursor:pointer;
    width:145px;
}
.anchor_link ul li:hover .m_icon{
  background-color:#18c5bd;
  color:#fff;
  transition:0.5s;
  }
.back_com{background-color:#cecece26;
padding:20px 0px;}

.head ul li{FONT-SIZE: 12PX;
    LINE-HEIGHT: 27PX;
    letter-spacing: 2px;
  color: #5e5d5d;
  cursor:pointer;}
.head ul li:hover{
  color:#000;
  transition:0.5s;} 
.head p:after {
    content: '';
    display: block;
    width: 27px;
    height: 2px;
    background: #cecece66;
    /* margin: 0 auto; */
    margin-top: 4px;
    border-radius: 5px;
}
.head p{letter-spacing:3px;}
button.your_job {
    background-color: #fff;
    border: solid 2px #18c5bd;
    padding: 7px 35px;
    border-radius: 40px;
    color: #18c5bd;
}
button.your_job:hover{
   background-color:#18c5bd;
   color: #fff;
   transition:0.5s;
   }
.footer1 li{list-style-type:none;
color: #6d6c6c;
font-size: 12px;
letter-spacing: 1px;
text-align: justify;
line-height: 3;
cursor:pointer;
}
.footer1 li:hover{
padding-left: 10px;
color:#18c5bd;
transition:0.5s;
}
.icons_w li span{background-color: #18c5bd;
    padding: 6px;
    border-radius: 20px;
    color: #fff;
    margin-right: 10px;
    width: 28px;
    height: 28px;
    display: block;
    float: left;
    line-height: 17px;
    text-align: center;}
.copyright:before {
    content: '';
    display: block;
    width: 71px;
    height: 2px;
    background: #18c5bd;
    margin: 0 auto;
    margin-top: 4px;   
    border-radius: 5px;
  margin-bottom:18px;
} 
</style>
<body>   
  <div class="navbar-fixed">
    <nav class="nav-wrapper indigo">
      <div class="container">
        <a href="#" class="brand-logo"><img src="http://www.tele-kinetics.com/assets/img/logo.png" style="width:152px;margin-top:-4px;"></a>
        <a href="#" class="sidenav-trigger" data-target="mobile-navbar">
          <i class="material-icons">menu</i>  
        </a>
        <ul class="right hide-on-med-and-down" >
          <li><a href="#">Home</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Training</a></li>
          <li><a href="#">Post Resume</a></li>  
         
           <li><a href="#">Contact Us</a></li>
    
        <li class="yellow" style="border-radius: 20px 0px 0px 20px;margin-left:60px;"><a href="<?php echo site_url('employer_login') ?>">Employer Login</a></li>
       <li class="yellow2" style="border-radius: 0px 20px 20px 0px;"><a href="<?php echo site_url('seeker-login') ?>">Candidate Login</a></li>

                  
            
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-navbar">
    <li><a href="#">MENÚ</a></li>
    <hr />
    <li><a href="#">Inicio</a></li>
    <li><a href="#">Portafolio</a></li>
    <li><a href="#">Acerca de mí</a></li>
    <li><a href="#">Contacto</a></li>
    <li><a href="#" class="btn white indigo-text">Inciar sesión</a></li>
  </ul>



<div class="container">
<div class="col-md-12">

<div class="col-sm-6" style="padding:50px 0px;">
<h1 style="font-size: 29px; margin-bottom: 50px;margin-top:60px;">Welcome to the ocean opportunities !</h1>
<div class="anchor_link">
<ul>
<li>
<div class="m_icon">
<i class="fas fa-users"></i>
</div>
<p class="small_t">People Search</p>
</li>
<li>
<div class="m_icon">
<i class="fas fa-book-reader"></i>
</div>
<p class="small_t">Search Skills</p>

</li>
<li>
<div class="m_icon">
<i class="fas fa-briefcase"></i>
</div>
<p class="small_t">Job Search</p>

</li>
</ul>

</div>



</div>
<div class="col-sm-6" style="padding:50px 0px;">
<img src="https://image.freepik.com/free-vector/recruit-agent-analyzing-candidates_74855-4565.jpg" />

</div>
</div>

</div>

<div class="container-fluid back_com">
<div class="container">
<div class="col-md-2 ">
<div class="head">
<p style="margin-top:20px;color:#000;">IT</p>
<ul>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>

</ul>
</div>
</div>
<div class="col-md-2 ">
<div class="head">
<p style="margin-top:20px;color:#000;">Manufacturing</p>
<ul>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>

</ul>
</div>
</div>
<div class="col-md-2 ">
<div class="head">
<p style="margin-top:20px;color:#000;">Retail</p>
<ul>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>

</ul>
</div>
</div>
<div class="col-md-2 ">
<div class="head">
<p style="margin-top:20px;color:#000;">Automobile</p>
<ul>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>

</ul>
</div>
</div>
<div class="col-md-2 ">
<div class="head">
<p style="margin-top:20px;color:#000;">IT</p>
<ul>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>

</ul>
</div>
</div>
<div class="col-md-2 ">
<div class="head">
<p style="margin-top:20px;color:#000;">Reatail</p>
<ul>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>
<li>It Divine</li>

</ul>
</div>
</div>

</div>
</div>

<div class="container">
<div class="col-md-6">
<img src="https://image.freepik.com/free-vector/illustrated-corporatebusiness-people_53876-28562.jpg"/>
</div>
<div class="col-md-6">
<p style="margin-top:60px;color:#18c5bd;">LMS</p>
<h1 style="font-size: 29px; margin-bottom: 50px;">Enhance Your Skills On The Ocean Of Content !</h1>
</div>
</div>   


<div class="container" style="border-top:solid 1px #f2f2f2ba;">
<div class="col-md-6">
<h1 style="font-size: 21px; margin-bottom:25px;margin-top:50px;">Looking For Professionals ??</h1>
<button class="your_job">Post Your Job</button>
</div>
<div class="col-md-6">
<img src="https://image.freepik.com/free-vector/email-messaging-email-marketing-campaign_183665-8.jpg" style="width:400px;margin-left:180px;"/>
</div>
</div>

<div class="container-fluid" style="background-color:#eaf8f9;">
<div class="container">
<div class="col-md-6">
<img src="https://image.freepik.com/free-vector/happy-character-winning-prize-with-flat-design_23-2147894434.jpg" style="width:290px;margin-left: 110px;"/>
</div>
<div class="col-md-6">
<h1 style="font-size: 24px; margin-bottom: 50px;margin-top:112px;">Looking To Become an OCEANCHAMP !</h1>
</div>   
</div>
</div>

<div class="container" style="padding:55px 0px;">

<div class="col-md-3">  
<div class="footer1">
<h5 style="font-weight: 600;">About ConsultnHire</h5>
<p style="color: #6d6c6c;font-size: 12px;letter-spacing: 1px;text-align: justify;line-height:2;">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
</div>
</div>
<div class="col-md-3">
<div class="footer1">
<h5 style="font-weight: 600;">Quick Links</h5>
<li>Home</li>
<li>Search Job</li>
<li>View All Job</li>
<li>Contact Us</li>
<li>Report a bug/Abuse</li>
</div>
</div>
<div class="col-md-3">
<div class="footer1">
<h5 style="font-weight: 600;">Quick Links</h5>
<li>About Company</li>
<li>My Account</li>
<li>Help</li>
<li>Terms Of Use</li>
<li>Privercy Commitment</li>
</div>
</div>



<div class="col-md-3">
<div class="footer1 icons_w">   
<h5 style="font-weight: 600;">Contact Info</h5>
<li><span><i class="fab fa-linkedin-in"></i></span>Linked</li>
<li><span><i class="far fa-paper-plane"></i></span>info@Consultnhire.com</li>
<li><span><i class="fas fa-mobile-alt"></i></span>7865342789</li>
<li><span><i class="fab fa-linkedin-in"></i></span>Contact Us</li>
<li><span><i class="fab fa-facebook-f"></i></span>Facebook</li>
</div>
</div>

</div>
<div class="container">
<p class="copyright" style="text-align:center;font-size:12px;">Copyright © 2020 ConsultnHire. All rights reserved.</p>

</div>
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
  // Show/Hide sidenav mobile
document.addEventListener("DOMContentLoaded", function () {
  $(document).ready(function () {
    $(".sidenav").sidenav();
  });
});
  </script>
</body>

</html>
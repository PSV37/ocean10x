<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Candidate Login</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   </head>
   <style>
      html {
      height: 100%;
      }
      body {
      margin:0;
      padding:0;
      font-family: sans-serif;
      background: #fff;
      }
      .login-box {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 400px;
      padding: 40px;
      transform: translate(-50%, -50%);
      background: #fff;
      box-sizing: border-box;
      box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.32);
      border-radius: 10px;
      }
      .login-box h3 {
      margin: 0 0 30px;
      padding: 0;
      color: #000;
      text-align: center;
      }
      h3:after {
      content: '';
      display: block;
      width: 50px;
      height: 4px;
      background: #18c5bd;
      margin: 0 auto;
      margin-top: 15px;
      border-radius: 5px;
      }
      .login-box .user-box {
      position: relative;
      }
      .login-box .user-box input {
      width: 100%;
      padding: 10px 0;
      font-size: 16px;
      color: #000;
      margin-bottom: 30px;
      border: none;
      border-bottom: 1px solid #444242c7;
      outline: none;
      background: transparent;
      position:relative;
      }
      .login-box .user-box label {
      position: absolute;
      top:0;
      left: 0;
      padding: 10px 0;
      font-size: 14px;
      color: #1f1f1f;
      pointer-events: none;
      transition: .5s;
      }
      .login-box .user-box input:focus ~ label,
      .login-box .user-box input:valid ~ label {
      top: -20px;
      left: 0;
      color: #03e9f4;
      font-size: 12px;
      }
      .login-box form a {
      position: relative;
      display: inline-block;
      padding: 10px 20px;
      color: #03e9f4;
      font-size: 16px;
      text-decoration: none;
      text-transform: uppercase;
      overflow: hidden;
      transition: .5s;
      margin-top: 40px;
      letter-spacing: 4px
      }
      .login-box a{color:#18c5ed;}
      .login-box a:hover {
      color: #18c5ed;
      border-radius: 5px;
      }
      i.fa.fa-user {
      color: #18c5ed;
      }
      .login-box a span {
      position: absolute;
      display: block;
      }
      .login-box a span:nth-child(1) {
      top: 0;
      left: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(90deg, transparent, #03e9f4);
      animation: btn-anim1 1s linear infinite;
      }
      @keyframes btn-anim1 {
      0% {
      left: -100%;
      }
      50%,100% {
      left: 100%;
      }
      }
      .login-box a span:nth-child(2) {
      top: -100%;
      right: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(180deg, transparent, #03e9f4);
      animation: btn-anim2 1s linear infinite;
      animation-delay: .25s
      }
      @keyframes btn-anim2 {
      0% {
      top: -100%;
      }
      50%,100% {
      top: 100%;
      }
      }
      .login-box a span:nth-child(3) {
      bottom: 0;
      right: -100%;
      width: 100%;
      height: 2px;
      background: linear-gradient(270deg, transparent, #03e9f4);
      animation: btn-anim3 1s linear infinite;
      animation-delay: .5s
      }
      @keyframes btn-anim3 {
      0% {
      right: -100%;
      }
      50%,100% {
      right: 100%;
      }
      }
      .login-box a span:nth-child(4) {
      bottom: -100%;
      left: 0;
      width: 2px;
      height: 100%;
      background: linear-gradient(360deg, transparent, #03e9f4);
      animation: btn-anim4 1s linear infinite;
      animation-delay: .75s
      }
      @keyframes btn-anim4 {
      0% {
      bottom: -100%;
      }
      50%,100% {
      bottom: 100%;
      }
      }
      i#eyeIcon {
      position: absolute;
      right: 0px;
      top: 12px;
      cursor:pointer;
      }
      .sign_in{
      background-color: #18c5bd;
      border: none;
      padding: 8px 54px;  
      color: #fff;
      font-weight: 700;
      border-radius: 30px;
      margin-top: 20px;
      }
      .sign_in:hover{
      background-color:#15a7a0;
      }
      .newuser {
      margin-top: 12px;
      }
      .field-icon {
  float: right;
  margin-right: 8px;
  margin-top: -60px;
  position: relative;
  z-index: 2;
  cursor:pointer;    
}   
   </style>
   <body>
      <div class="login-box">
         <h3>Candidate Login</h3>
         <form class="submit-form customform loginform" action="<?php echo base_url() ?>register/check_login" method="post">

             <?php echo $this->session->flashdata('msg'); ?>
           
         


      
            <div class="user-box">
               <input type="text" name="email" required>
               <label>Username</label>
            </div>
            <div class="user-box">
               <input type="password" name="password" id="myInput" required>
               <label>Password </label>
               <span toggle="#password-field" class="fa fa-eye-slash field-icon toggle-password"></span>
            </div>
            <div class="row">
               <div class="col-md-6" style="margin-top:-20px;">
                  <input id="checkbox_qu_01" type="checkbox" class="styled" checked="">
                  <label for="checkbox_qu_01"><small style="color:#7b7a7a;font-weight:100;">Remember me</small></label>
               </div>
            </div>
            <div class="row" style="text-align:center;">
               <button class="sign_in"  type="submit">Sign in</button>
               <a href="<?php echo base_url() . 'register/forgot_pass' ?>">
                  <p class="forgot" style="color:#7b7a7a;font-size: 12px;margin-top: 9px;">Forgot Password ?</p>
               </a>
            </div>
         </form>
         <div class="row" style="text-align:center;">
            <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> Not on Ocean ? <a href="<?php echo base_url() . 'register' ?>">Register Now</a></div>
         </div>
      </div>
   </body>
</html>
<script>
   $(".toggle-password").click(function() {
   
   $(this).toggleClass("fa-eye fa-eye-slash");
   var x = document.getElementById("myInput");
     if (x.type === "password") {
       x.type = "text";
     } else {
       x.type = "password";
     }
   
   });
   
</script>
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

.login-box h4 {
  margin: 0 0 30px;
    padding: 0;
    color: #000;
    text-align: center;
    font-size: 20px;
    line-height: 27px;
    font-weight: 500;
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
    padding: 8px 7px;
    color: #fff;
    font-weight: 700;
    
    width: 157px;
}
.sign_in:hover{
    background-color:#15a7a0;
}
.newuser {
    margin-top: 12px;
}
.divider {
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    -webkit-box-flex: 0;
    flex: 0 1;
    color: #8b95a5;
    font-size: 11px;
    letter-spacing: .5px;
    margin: 2rem auto;
    width: 100%;
}
.divider::before {
    margin-right: 16px;
}
.divider::before, .divider::after {
    content: '';
    -webkit-box-flex: 1;
    flex-grow: 1;
    border-top: 1px solid #ebebeb;
	margin:0px 10px;
}
.fb {
    display: inline-block;
    width: 30px;
    height: 30px;
    background: #365899;
    border-radius: 50%;
    /* float: left; */
    margin-right: 10px;
    color: #fff;
    text-align: center;
    line-height: 30px;
	cursor:pointer;
}
.goog {
    display: inline-block;
    width: 30px;
    height: 30px;
    background: red;
    border-radius: 50%;
    /* float: left; */
   cursor:pointer;
    color: #fff;
    text-align: center;
    line-height: 30px;
}
h4:after {
    content: '';
    display: block;
    width: 50px;
    height: 4px;
    background: #18c5bd;
    margin: 0 auto;
    margin-top: 15px;   
    border-radius: 5px;
}
</style>


<div class="login-box">
  <h4>Employer Forgot Password</h4>
 <form class="submit-form customform forgotform" action="<?php echo base_url() ?>employer_login/forgot_pass" method="post">
   <div class="user-box">
      <input type="text" name="email"  required>
      <label>Email </label>
      <i id="eyeIcon" class="fa fa-eye"></i>


  		<div class="row" style="margin-right:0px;margin-left:0px;">
       <button type="submit"  class="sign_in">Retrieve Password</button>
       <button type="submit"  class="sign_in">Resend Link</button>
      </div>
    </div>
  </form>
</div>


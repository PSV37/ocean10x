<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
  /*use-itty-bitty-template*/
  .formpanel {background: #ececec;}
  h1, h2, h3, h4, h5 {
    border-bottom: 1px solid #ccc;
    color: #3F51B5;
    padding-bottom: 8px
  }
  /*.container {
    margin: auto;
    width: 350px;
    text-align: center;
  }*/
  .listFlex {display: flex; justify-content: center;}

  img {
    width: 100%;
  }
</style>
<div class="section lb">
  <div class="container">
    <div class="row">
      <?php $this->load->view('fontend/layout/seeker_left.php'); ?>
      <div class="content col-md-9">
        <div class="job-header">
          <div class="contentbox">
            <div class="formpanel">
           
             <?php echo $this->session->flashdata('change_password'); ?>
              
                 <h1>Dan Englishby</h1>
                 <h3>Personal Profile</h3>
                 <a href="https://imgbb.com/"><img src="https://i.ibb.co/pdJfzx9/profile-picture.jpg" alt="profile-picture" border="0" /></a>
                 <h4>About Me</h4>
                 <p>Hi, I'm Dan Englishby, I have a huge passion for web-development and programming. I love to learn and thrive from challenges.</p>
                 <h4>My Skills</h4>
                 <div class="listFlex">
                    <div>
                       <ul>
                          <li>PHP</li>
                          <li>HTML</li>
                          <li>CSS</li>
                       </ul>
                    </div>
                    <div>
                       <ul>
                          <li>JavaScript</li>
                          <li>JQuery</li>
                          <li>C#</li>
                       </ul>
                    </div>
                 </div>
                 <h4>Social Media</h4>
                 Catch me on Twitter - <a href="https://twitter.com/DanEnglishby">@DanEnglishby</a>
              
            </div><!-- end post-padding -->
          </div>
        </div>

       
      </div><!-- end col -->
    </div><!-- end row -->  
  </div><!-- end container -->
</div><!-- end section -->


 <?php $this->load->view("fontend/layout/footer.php"); ?>

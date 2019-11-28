<?php 
    $this->load->view('fontend/layout/seeker_header.php');
?>                
 <style>
  /*use-itty-bitty-template*/
  /*.formpanel {background: #ececec;}*/
  h1, h2, h3, h4, h5 {
    border-bottom: 1px solid #ccc;
    /*color: #3F51B5;*/
    padding-bottom: 8px
  }

  .listFlex {display: flex; justify-content: center;}

  img {
    width: 15%;
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
              <?php echo "<pre>"; print_r($intro_data);   
              print_r($skill_data);
              print_r($education_data);
              print_r($personal_data);

              ?>
              <?php echo $this->session->flashdata('change_password'); ?>
                <h2 align="center">Personal Profile</h2>
                <img src="https://i.ibb.co/pdJfzx9/profile-picture.jpg" alt="profile-picture" border="0" class="img img-thumbnail">
                <h3><?php echo $intro_data['full_name']; ?> (<?php echo $intro_data['profession']; ?>)</h3>
                
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

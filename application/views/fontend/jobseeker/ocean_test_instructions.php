
   <!---header-->
   <?php    $this->load->view('fontend/layout/new_seeker_header.php'); ?>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">
   <!---header--->
   <div class="container-fluid main-d">
      <div class="container">
         <div class="col-md-12">
            <<?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
            <!-- <form id="submit" class="submit-form" action="" method="post"> -->
               <form method="post" action="<?php echo base_url(); ?>job_seeker/ocean_test_start/<?php if(!empty($test_id))echo base64_encode($test_id); ?>"> 
                           <div class="col-md-9 instruction_text">
                              <!-- <?php print_r($oceanchamp_tests); ?> -->

               <h4 style="margin-bottom:20px;font-size:22px;color:#14a9a2;">Before You Start The Test Carefully Read The Instructions Below !</h4>
               <li>This is a FREE online test. DO NOT pay money to anyone to attend this test.</li>
               <li>All Questions are compulsory.</li>
               <li>Total number of questions : <?php echo $oceanchamp_tests['total_questions']; ?></li>
               <li>Time alloted :  <?php echo $oceanchamp_tests['test_duration']; ?> Seconds.</li>
               <li>Each question carry 1 mark, no negative marks.</li>
               <li>DO NOT refresh the page.</li>
               <li>All the best.</li>
               <div class="row" style="text-align:end;">
                  <button type="submit">Lets Start</button>
               </div>
            </div>
         </form>
         </div>
      </div>
   </div>
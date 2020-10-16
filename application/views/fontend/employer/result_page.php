<style>
   .report{margin-top:70px;
   border: solid 1px #e4e4e4;
   border-radius: 13px;
   padding:20px;}
   .q1 li{list-style-type:none;
   font-size: 14px;
   font-weight: 700;
   color: #777777;}
   .left_q{float:left;}
   .q1{line-height:35px;}   
   li.left_q {
    width: 185px;
}
</style>
<!---header-->
<?php 
   $company_profile_id = $this->session->userdata('company_profile_id');
   
    $this->load->view('fontend/layout/employer_new_header.php');
    
    // print_r($this->session->userdata());die;
   ?>
<!---header--->
<div class="container-fluid main-d">
   <div class="container">
      <div class="col-md-12">
         <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
         <div class="col-md-6 report">
            <h5 style="text-align:center;font-size:25px;margin-bottom:30px;color:#18c5bd;font-weight:700;">Your Report Card !</h5>
            <div class="a" style="margin-left:150px;">
              <div class="q1">
                  <li class="left_q">Test Start&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $start_time; ?></li>
               </div>
               <div class="q1">
                  <li class="left_q">Test End &nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $end_time; ?></li>
               </div>
               <div class="q1">
                  <li class="left_q">Test - Max Duration (min) &nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo round($test_duration, 2); ?></li>
               </div>
               <div class="q1">
                  <li class="left_q">Time Taken (min) &nbsp;</li>
                   <li class="right_q">:&emsp;<?php  echo round($time_taken, 2);?></li>
                 <!--  <li class="right_q">:&emsp;<?php  echo round((strtotime($end_time) - strtotime($start_time)) /60); ?></li> -->
               </div>
               <div class="q1">
                  <li class="left_q">Total Questions&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $total_questions; ?></li>
               </div>
               <div class="q1">
                  <li class="left_q">Attempted&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $attended_questions; ?></li>
               </div>
                <div class="q1">
                  <li class="left_q">Right Answers&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $correct_ans; ?></li>
               </div>
               
               <div class="q1">
                  <li class="left_q">Wrong Answers&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $wrong_ans; ?></li>
               </div>
               <div class="q1">
                  <li class="left_q">Not Attempted&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $skipped_questions; ?></li>
               </div>

                <div class="q1">
                  <li class="left_q">Av. Time / Question (min)&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $avg_time; ?></li>
               </div>
              
               <div class="q1">
                  <li class="left_q">Total Marks&nbsp;</li>
                  <li class="right_q">:&emsp;<?php echo $result; ?></li>
               </div>
               <?php $percent = ($correct_ans/$total_questions)*100; ?>
               <div class="q1" style="margin-top:20px;">
                  <li class="left_q" style="color:#000;font-size:16px;">Overall Result&nbsp;</li>
                  <li class="right_q" style="color:#000;">
                     :&emsp;
                     <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                        width="100" height="100"
                        viewBox="0 0 172 172"
                        style=" fill:#000000;height: 30px;
                        width: 23px;
                        margin-top: -12px;
                        padding-top: 6px;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                           <path d="M0,172v-172h172v172z" fill="none"></path>
                           <g fill="#1abc9c">
                              <path d="M132.80693,20.22147c-5.63587,0.91733 -9.54027,6.21493 -9.54027,11.92533v37.2724l-10.50347,-29.61267l-22.8932,-22.8932c-4.27707,-4.27707 -11.20293,-4.27707 -15.48,0l-0.73387,0.73387c-4.27707,4.27707 -4.27707,11.20293 0,15.48l18.8684,18.8684l11.18,30.71347l-24.91133,-29.67573l-26.82627,-12.90573c-5.27467,-2.4596 -11.54693,-0.172 -14.00653,5.10267l-0.77973,1.67413c-2.4596,5.2804 -0.17773,11.55267 5.10267,14.01227l22.2396,10.7844l9.59187,11.43227h-26.0924l-19.68253,19.58507c-4.03627,4.03627 -5.0224,10.5436 -1.6856,15.17613c4.25413,5.90533 12.54453,6.3984 17.46947,1.47347l13.30707,-13.30707h16.3056l7.8604,21.59747l-9.94733,9.9416h-7.39027l-8.1012,-8.1012c-6.82267,-6.82267 -17.888,-6.82267 -24.7164,0l-4.9536,4.9536l25.53053,25.58213c2.15,2.15573 5.06827,3.36547 8.1184,3.36547h51.66307c19.00027,0 34.4,-15.39973 34.4,-34.4v-97.46667c0,-6.966 -6.2092,-12.47573 -13.39307,-11.31187z"></path>
                              <path d="M111.8,166.26667h-51.6688c-3.77827,0 -7.47627,-1.53653 -10.148,-4.20253l-27.5544,-27.606l6.9832,-6.9832c0.8772,-0.88293 1.82893,-1.67413 2.83227,-2.36787c-3.15333,-0.84853 -5.92827,-2.76347 -7.92347,-5.53267c-4.03053,-5.59573 -3.182,-13.71413 1.98373,-18.87987l20.5368,-20.42787h21.12733l-5.246,-6.25507l-21.68347,-10.51493c-3.21067,-1.50213 -5.67027,-4.18533 -6.8972,-7.5508c-1.22693,-3.36547 -1.07213,-7.00613 0.44147,-10.2512l0.77973,-1.6684c3.02147,-6.49587 11.28893,-9.53453 17.81347,-6.49587l27.8124,13.66253l14.45373,17.22293l-5.4008,-14.83787l-18.41547,-18.4212c-2.60867,-2.60293 -4.04773,-6.07733 -4.04773,-9.76387c0,-3.68653 1.43907,-7.16093 4.04773,-9.7696l0.73387,-0.73387c5.21733,-5.21733 14.3276,-5.21733 19.53347,0l23.56973,23.96533l4.9364,13.90907v-20.6228c0,-7.29853 5.13707,-13.6396 11.94827,-14.74613c8.95547,-1.46773 16.7184,5.44667 16.7184,14.1384v97.46667c0,20.54827 -16.7184,37.26667 -37.26667,37.26667zM30.54147,134.4524l23.50667,23.55253c1.5996,1.61107 3.8184,2.5284 6.08307,2.5284h51.6688c17.38347,0 31.53333,-14.14987 31.53333,-31.53333v-97.46667c0,-5.22307 -4.644,-9.33387 -10.06773,-8.4796c-4.06493,0.66507 -7.13227,4.56947 -7.13227,9.08733v53.93347l-15.8584,-44.7028l-22.43453,-22.43453c-3.0616,-3.0616 -8.3764,-3.05013 -11.42653,0l-0.73387,0.7396c-1.5308,1.5308 -2.36787,3.55467 -2.36787,5.71613c0,2.15573 0.83707,4.1796 2.36787,5.7104l19.52773,19.9176l16.74133,45.9928l-34.9504,-41.66413l-26.27013,-12.642c-3.6292,-1.67987 -8.43947,0.02867 -10.17093,3.73813l-0.77973,1.6684c-0.86573,1.86333 -0.95747,3.94453 -0.25227,5.87093c0.7052,1.9264 2.10987,3.46293 3.96747,4.3344l23.22573,11.5412l13.54213,16.13933h-31.05747l-18.84547,18.75373c-3.19347,3.1992 -3.784,8.12987 -1.376,11.4724c3.0272,4.20253 9.50587,4.73 13.11213,1.118l14.14413,-14.14413h19.49333l9.17907,25.198l-12.0744,12.06867h-9.75813l-8.944,-8.944c-5.5212,-5.5212 -15.14747,-5.51547 -20.66293,0zM65.45173,134.73333h5.01093l7.80307,-7.80307l-6.54173,-17.99693h-13.11213l-12.46427,12.46427c-0.07453,0.08027 -0.14907,0.14907 -0.22933,0.2236c4.63827,0.47587 8.93827,2.5112 12.27507,5.85373z"></path>
                              <rect x="15.542" y="15" transform="scale(5.73333,5.73333)" width="7.458" height="2.333"></rect>
                           </g>
                        </g>
                     </svg>
                   <?php if ($percent>=75) {
                     echo "Excellent";
                   }elseif ($percent >= 60)
                   {
                     echo "Good";
                   }
                   elseif ($percent >= 40) {
                      echo "Satisfactory";
                   }
                   else
                   {
                     echo "Poor";
                   }
                    ?>
                  </li>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
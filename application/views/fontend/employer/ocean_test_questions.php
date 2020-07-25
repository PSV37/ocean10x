  <!---header-->
      <?php  $this->load->view('fontend/layout/employer_new_header.php'); ?>
      <!---header--->
   <style>
      /*small*/
      .base-timer {
      position: relative;
      width: 60px;
      height: 60px;
      margin:0 auto;
      }
      .base-timer__svg {
      transform: scaleX(-1);
      }
      .base-timer__circle {
      fill: none;
      stroke: none;
      }
      .base-timer__path-elapsed {
      stroke-width: 7px;
      stroke: grey;
      }
      .base-timer__path-remaining {
      stroke-width: 7px;
      stroke-linecap: round;
      transform: rotate(90deg);
      transform-origin: center;
      transition: 1s linear all;
      fill-rule: nonzero;
      stroke: currentColor;
      }
      .base-timer__path-remaining.green {
      color: rgb(65, 184, 131);
      }
      .base-timer__path-remaining.orange {
      color: orange;
      }
      .base-timer__path-remaining.red {
      color: red;
      }
      .base-timer__label {
      position: absolute;
      width: 60px;
      height: 60px;
      top: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 17px;
      }
      svg:not(:root) {
      overflow: overlay;
      background-color: #fff;
      border-radius: 50px;
      box-shadow: 2px 2px 2px #f6f6f6;
      }
      /*dd*/
      #clockdiv {
      font-family: sans-serif;
      color: #fff;
      display: inline-block;
      font-weight: 100;
      /* text-align: center; */
      font-size: 30px;
      position: fixed;
      right: 62px;
      top:153px;
      }
      #clockdiv > div{
      padding: 10px;
      border-radius: 3px;
      background:#18c5bd;
      display: inline-block;
      }
      #clockdiv div > span{
      padding: 15px;
      border-radius: 3px;
      background:#afe1de;
      display: inline-block;
      font-weight:900;
      }
      .smalltext{
      padding-top: 5px;
      font-size: 11px;
      text-align:center;
      }
      /*fg*/
      #quiz {
      margin: -44px 50px 0px;
      position: relative;
      width: calc(100% - 100px);
      }
      #quiz h1 {
      color: #FAFAFA;
      font-weight: 600;
      font-size: 36px;
      text-transform: uppercase;
      text-align: left;
      line-height: 44px;
      }
      #quiz button {
      float: left;
      margin: 8px 0px 0px 8px;
      padding: 4px 8px;
      background: #9ACFCC;
      color: #00403C;
      font-size: 14px;
      cursor: pointer;
      outline: none;
      }
      #quiz button:hover {
      background: #36a39c;
      color: #FFF;
      }
      #quiz button:disabled {
      opacity: 0.5;
      background: #9ACFCC;
      color: #00403C;
      cursor: default;
      }
      #question {
      padding: 20px;
      background: #FAFAFA;
      text-align: center;
      }
      #question h2 {
      margin-bottom: 16px;
      font-weight: 600;
      font-size: 20px;
      }
      #question input[type=radio] {
      display: none;
      }
      #question label {
      display: inline-block;
      margin: 4px;
      padding: 8px;
      background: #FAE3BB;
      color: #4C3000;
      width: calc(50% - 8px);
      min-width: 50px;
      cursor: pointer;
      }
      #question label:hover {
      background: #EBBB67;
      }
      #question input[type=radio]:checked + label {
      background: #CB8306;
      color: #FAFAFA;
      }
      #quiz-results {
      display: flex;
      flex-direction: column;
      justify-content: center;
      position: absolute;
      top: 44px;
      left: 0px;
      background: #FAFAFA;
      width: 100%;
      height: calc(100% - 44px);
      }
      #quiz-results-message {
      display: block;
      color: #00403C;
      font-size: 20px;
      font-weight: bold;
      }
      #quiz-results-score {
      display: block;
      color: #31706c;
      font-size: 20px;
      }
      #quiz-results-score b {
      color: #00403C;
      font-weight: 600;
      font-size: 20px;
      }
      #quiz-retry-button {
      float: left;
      margin: 8px 0px 0px 8px;
      padding: 4px 8px;
      background: #9ACFCC;
      color: #00403C;
      font-size: 14px;
      cursor: pointer;
      outline: none;
      }
      /*2*/
      @import url('https://fonts.googleapis.com/css?family=Roboto+Slab');
      .quizArea{
      width: 95%;
      margin:  auto;
      padding:10px;
      position: relative;
      text-align: center;
      }
      .mc_quiz{
      color: #3a5336;
      margin-bottom: 0px;
      }
      .multipleChoiceQues{
      width: 65%;
      padding: 10px;
      background-color: #afe1de;
      border-radius: 13px;
      padding: 20px;
      float:left;
      }
      .quizBox
      {
      width:90%;
      margin: auto;
      }
      .buttonArea
      {
      text-align: right;
      height: 4.5em;
      }
      button {
      height: 4em;
      width:130px;
      padding: 1.5em auto;
      margin: 1em auto;
      background-color:#f1f2ec;
      border: none;
      border-radius: 3px;
      color: #7aa4a9;
      text-transform: uppercase;
      letter-spacing: 0.5em;
      transition: all 0.2s cubic-bezier(.4,0,.2,1); 
      }
      #next:hover,
      #submit:hover,
      .viewanswer:hover,
      .viewchart:hover,
      .backBtn:hover,
      .replay:hover {
      letter-spacing: 0.8em;
      }
      .viewanswer,
      .viewchart,
      .replay{
      width: 30%;
      }
      .backBtn{
      width:100px;
      height: 2em;
      font-size: 0.8em;
      margin-left: 70%;
      }
      #next:active,
      #submit:active,
      .viewanswer:active,
      .viewchart:active,
      .backBtn:active,
      .replay:active  {
      letter-spacing: 0.3em;
      }
      .resultArea{
      display: none;
      width:70%;
      margin: auto;
      padding: 10px;
      }
      .chartBox{
      width: 60%;
      margin:auto;
      }
      .resultPage1{
      text-align: center;
      }
      .resultBox h1{
      }
      .briefchart
      {
      text-align:center;
      }
      .resultBtns{
      width: 60%;
      margin: auto;
      text-align:center;
      }
      .resultPage2,
      .resultPage3
      {
      display: none;
      text-align: center;
      }
      .allAnswerBox{
      width: 100%;
      margin: 0;
      position: relative;
      }
      ._resultboard{
      position: relative;
      display:inline-block;
      width: 40%;
      padding: 2%;
      height: 190px;
      vertical-align: top;
      border-bottom: 0.6px solid rgba(255,255,255,0.2);
      text-align: left;
      margin-bottom: 4px;
      }
      ._resultboard:nth-child(even){
      margin-left: 5px;
      border-left: 0.6px solid rgba(255,255,255,0.2);
      }
      ._resultboard:nth-last-child(2),
      ._resultboard:nth-last-child(1){
      border-bottom: 0px;
      }
      ._header{
      font-weight: bold;
      margin-bottom: 8px;
      height: 90px;
      }
      ._yourans,
      ._correct{
      margin-bottom: 8px;
      position: relative;
      line-height: 2;
      padding: 5px; 
      }
      ._correct{
      background: #968089 ;
      }
      .h-correct{
      background: #968089;
      }
      .h-correct:after,
      ._correct:after {
      line-height: 1.4;
      position: absolute;
      z-index: 499;
      font-family: 'FontAwesome';
      content: "\f00c";
      bottom: 0;
      right: 7px;
      font-size: 1.9em;
      color: #2dceb1;
      }
      .h-incorrect{
      background: #ab4e6b ;
      }
      .h-incorrect:after {
      line-height: 1.4;
      position: absolute;
      z-index: 499;
      font-family: 'FontAwesome';
      content: "\f00d";
      bottom: 0;
      right: 7px;
      font-size: 1.9em;
      color: #ff383e;
      }
      .resultPage3 h1,
      .resultPage1 h1,
      .resultPage2 h1{
      text-align: center;
      padding-bottom: 10px;
      border-bottom: 1.3px solid rgba(21, 63, 101,0.9);
      color: #3a5336;
      }
      .my-progress {
      position: relative;
      display: block;
      margin: 3rem auto 0rem;
      width: 100%;
      max-width: 950px;
      margin-top:38px;
      margin-bottom:38px;
      }
      progress {
      display: block;
      position: relative;
      top: -5.4px;
      left: 5px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background: #f1f2ec ;
      width: 100%;
      height: 2.5px;
      background: none;
      -webkit-transition: 1s;
      transition: 1s;
      will-change: contents;
      }
      progress::-webkit-progress-bar {
      background-color: #f1f2ec;
      }
      progress::-webkit-progress-value {
      background-color:#153f65;
      -webkit-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out;
      }
      .my-progress-indicator {
      position: absolute;
      top: -6px;
      left: 0;
      display: inline-block;
      width: 5px;
      height: 5px;
      background: #7aa4a9;
      border: 3px solid #f1f2ec;
      border-radius: 50%;
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      -webkit-transition-delay: .3s;
      transition-delay: .3s;
      will-change: transform;
      }
      .my-progress-indicator.progress_1 {
      left: 0;
      }
      .my-progress-indicator.progress_2 {
      left: 9%;
      }
      .my-progress-indicator.progress_3 {
      left: 18%;
      }
      .my-progress-indicator.progress_4{
      left: 27%;
      }
      .my-progress-indicator.progress_5 {
      left: 36%;
      }
      .my-progress-indicator.progress_6 {
      left: 45%;
      }
      .my-progress-indicator.progress_7 {
      left: 54%;
      }
      .my-progress-indicator.progress_8 {
      left: 63%;
      }
      .my-progress-indicator.progress_9 {
      left: 72%;
      }
      .my-progress-indicator.progress_10 {
      left: 81%;
      }
      .my-progress-indicator.progress_11 {
      left: 90%;
      }
      .my-progress-indicator.progress_12 {
      left: 100%;
      }
      .my-progress-indicator.active {
      -webkit-animation: bounce .5s forwards;
      animation: bounce .5s forwards;
      -webkit-animation-delay: .5s;
      animation-delay: .5s;
      border-color: #153f65 ;
      }
      .animation-container {
      position: relative;
      width: 100%;
      -webkit-transition: .3s;
      transition: .3s;
      will-change: padding;
      overflow: hidden;
      }
      .form-step {
      position: absolute;
      -webkit-transition: 1s ease-in-out;
      transition: 1s ease-in-out;
      -webkit-transition-timing-function: ease-in-out;
      transition-timing-function: ease-in-out;
      will-change: transform, opacity;
      }
      .form-step.leaving {
      -webkit-animation: left-and-out .5s forwards;
      animation: left-and-out .5s forwards;
      }
      .form-step.waiting {
      -webkit-transform: translateX(400px);
      transform: translateX(400px);
      }
      .form-step.coming {
      -webkit-animation: right-and-in .5s forwards;
      animation: right-and-in .5s forwards;
      }
      @-webkit-keyframes left-and-out {
      100% {
      opacity: 0;
      -webkit-transform: translateX(-400px);
      transform: translateX(-400px);
      }
      }
      @keyframes left-and-out {
      100% {
      opacity: 0;
      -webkit-transform: translateX(-400px);
      transform: translateX(-400px);
      }
      }
      @-webkit-keyframes right-and-in {
      100% {
      opacity: 1;
      -webkit-transform: translateX(0);
      transform: translateX(0);
      }
      }
      @keyframes right-and-in {
      100% {
      opacity: 1;
      -webkit-transform: translateX(0);
      transform: translateX(0);
      }
      }
      @-webkit-keyframes bounce {
      50% {
      -webkit-transform: scale(1.5);
      transform: scale(1.5);
      }
      100% {
      -webkit-transform: scale(1);
      transform: scale(1);
      }
      }
      @keyframes bounce {
      50% {
      -webkit-transform: scale(1.5);
      transform: scale(1.5);
      }
      100% {
      -webkit-transform: scale(1);
      transform: scale(1);
      }
      }
      .sr-only {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      border: 0;
      }
      .hidden {
      display: none;
      }
      .answerOptions ul{
      list-style-type: none;
      width: 220px;
      text-align: left;
      }
      .answerOptions ul li {
      position: relative;
      padding-left: 40px;
      height:30px;
      }   
      .question h1{
      font-size: 21px;
      text-align: justify;
      }
      .answerOptions label{
      color:#3a3a3a;
      }
      .answerOptions label:before {
      content: "";
      width: 15px;
      height: 15px;
      background:#3a3a3a;
      position: absolute;
      left: 7px;
      top: calc(50% - 13px);
      box-sizing: border-box;
      border-radius: 50%;
      }
      input[type="radio"] {
      opacity: 0;
      -webkit-appearance: none;
      display: inline-block;
      vertical-align: middle;
      z-index: 100;
      margin: 0;
      padding: 0;
      width: 100%;
      height: 30px;
      position: absolute;
      left: 0;
      top: calc(50% - 15px);
      cursor: pointer;
      }
      .bullet {
      position: relative;
      width: 25px;
      height: 25px;
      left: -3px;
      top: 2px;
      border: 5px solid #fff ;
      opacity: 0;
      border-radius: 50%;
      }
      input[type="radio"]:checked ~ .bullet {
      position:absolute;
      opacity: 1;
      animation-name: explode;
      animation-duration: 0.350s;
      margin-top:-5px;
      margin-left:5px;
      }
      .line {
      position: absolute;
      width: 10px;
      height: 2px;
      background-color: #fff ;
      opacity:0;
      }
      .line.zero {
      left: 11px;
      top: -21px;
      transform: translateY(20px);
      width: 2px;
      height: 10px;
      }
      .line.one {
      right: -7px;
      top: -11px;
      transform: rotate(-55deg) translate(-9px);
      }
      .line.two {
      right: -20px;
      top: 11px;
      transform: translate(-9px);
      }
      .line.three {
      right: -8px;
      top: 35px;
      transform: rotate(55deg) translate(-9px);
      }
      .line.four {
      left: -8px;
      top: -11px;
      transform: rotate(55deg) translate(9px);
      }
      .line.five {
      left: -20px;
      top: 11px;
      transform: translate(9px);
      }
      .line.six {
      left: -8px;
      top: 35px;
      transform: rotate(-55deg) translate(9px);
      }
      .line.seven {
      left: 11px;
      bottom: -21px;
      transform: translateY(-20px);
      width: 2px;
      height: 10px;
      }
      input[type="radio"]:checked ~ .bullet .line.zero{
      animation-name:drop-zero;
      animation-delay: 0.100s;
      animation-duration: 0.9s;   
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.one{
      animation-name:drop-one;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.two{
      animation-name:drop-two;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.three{
      animation-name:drop-three;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.four{
      animation-name:drop-four;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.five{
      animation-name:drop-five;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.six{
      animation-name:drop-six;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      input[type="radio"]:checked ~ .bullet .line.seven{
      animation-name:drop-seven;
      animation-delay: 0.100s;
      animation-duration: 0.9s;
      animation-fill-mode: forwards;
      }
      @keyframes explode {
      0%{
      opacity: 0;
      transform: scale(10);
      }
      60%{
      opacity: 1;
      transform: scale(0.5);
      }
      100%{
      opacity: 1;
      transform: scale(1);
      }
      }
      @keyframes drop-zero {
      0% {
      opacity: 0;
      transform: translateY(20px);
      height: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: translateY(-2px);
      height: 0px;
      opacity:0;
      }
      }
      @keyframes drop-one {
      0% {
      opacity: 0;
      transform: rotate(-55deg) translate(-20px);
      width: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: rotate(-55deg) translate(9px);
      width: 0px;
      opacity:0;
      }
      }
      @keyframes drop-two {
      0% {
      opacity: 0;
      transform: translate(-20px);
      width: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: translate(9px);
      width: 0px;
      opacity:0;
      }
      }
      @keyframes drop-three {
      0% {
      opacity: 0;
      transform: rotate(55deg) translate(-20px);
      width: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: rotate(55deg) translate(9px);
      width: 0px;
      opacity:0;
      }
      }
      @keyframes drop-four {
      0% {
      opacity: 0;
      transform: rotate(55deg) translate(20px);
      width: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: rotate(55deg) translate(-9px);
      width: 0px;
      opacity:0;
      }
      }
      @keyframes drop-five {
      0% {
      opacity: 0;
      transform: translate(20px);
      width: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: translate(-9px);
      width: 0px;
      opacity:0;
      }
      }
      @keyframes drop-six {
      0% {
      opacity: 0;
      transform: rotate(-55deg) translate(20px);
      width: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: rotate(-55deg) translate(-9px);
      width: 0px;
      opacity:0;
      }
      }
      @keyframes drop-seven {
      0% {
      opacity: 0;
      transform: translateY(-20px);
      height: 10px;
      }
      20% {
      opacity:1;
      }
      100% {
      transform: translateY(2px);
      height: 0px;
      opacity:0;
      }
      }
      .test_d{margin-top:75px;border: solid 1px #d8d7d7;
      border-radius:13px;padding:20PX 0PX;}
      .skip{margin-top: 156px;
      margin-left: 41px;
      width: 200px;
      background-color: #18c5bd;
      color: #fff;
      border-radius: 3px;}
      .rexp{padding-left:100px;margin-bottom:70px;}
   </style>
   <body>
    
      <div class="container-fluid main-d">
         <div class="container">
            <div class="col-md-12">
               <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
               <div class="col-md-9 test_d">
                  <div id="clockdiv">
                     <div>
                        <span class="hours"></span>
                        <div class="smalltext">Hours</div>
                     </div>
                     <div>
                        <span class="minutes"></span>
                        <div class="smalltext">Minutes</div>
                     </div>
                     <div>
                        <span class="seconds"></span>
                        <div class="smalltext">Seconds</div>
                     </div>
                  </div>
                  <div class="quizArea">
                     <div class="multipleChoiceQues">
                        <div id="app"></div>
                        <div class="my-progress">
                           <progress class="my-progress-bar" min="0" max="100" value="0" step="9" aria-labelledby="my-progress-completion"></progress>    
                           <p id="my-progress-completion" class="js-my-progress-completion sr-only" aria-live="polite">0% complete</p>
                        </div>
                        <div class="quizBox">
                          <form id="nextques" class="submit-form" action="<?php echo base_url();?>employer/insert_ocean_data" method="post">
      <!-- <?php print_r($questions); ?> -->

                          <input type="hidden" name="skill_id" id="skill_id" value="<?php if(!empty($skill_id))echo base64_encode($skill_id); ?>">
                          <input type="hidden" name="question_id" id="question_id" value="<?php echo $questions['ques_id']; ?>">
                           <div class="question"> </div>
                           <div class="answerOptions"></div>
                           <div class="buttonArea">
                              <button id="next"  type="submit">Next</button>
                              <button id="submit"  class="hidden">Submit</button>
                           </div>
                     </form>
                        </div>
                     </div>
                    


                  </div>
                  <button class="skip" onclick="next();">skip question</button>
               </div>
               <script>
                  var $progressValue = 0;
                  var resultList=[];
                  
                  
                  const quizdata=[
                  <?php  $questions = explode(',',$question['questions']);
                // print_r($questions);
                $i=0;
                foreach ($questions as $row) {
                  // print_r($row);
                  // print_r($i);
                  $where['ques_id']   = $row;
                   $join_emp  = array(
                  'skill_master' => 'skill_master.id=questionbank.technical_id |left outer',
                  'topic' => 'topic.topic_id=questionbank.topic_id |left outer',
                  'subtopic' => 'subtopic.subtopic_id=questionbank.subtopic_id |left outer',
                  'lineitem' => 'lineitem.lineitem_id=questionbank.lineitem_id |left outer',
                  'lineitemlevel' => 'lineitemlevel.lineitemlevel_id=questionbank.lineitemlevel_id |left outer',
                  'questionbank_answer' => 'questionbank_answer.question_id = questionbank.ques_id|LEFT OUTER'
              );
                  $questions  = $this->Master_model->get_master_row('questionbank', $select = FALSE, $where, $join = $join_emp)
                
                  ?> 
                       {
                          question:"<?php echo $questions; ?>",
                          options:["<?php echo $questions['option1'];?>", "<?php echo $questions['option2'];?>", "<?php echo $questions['option3'];?>", "<?php echo $questions['option4'];?>"],
                          answer:"Shrewd",
                          category:1
                        }
                         <?php
                 
                }?>
                      ];

                      function next()
                      {
                         $("#next").click();

                      }
                  /** Random shuffle questions **/
                  function shuffleArray(question){
                     var shuffled=question.sort(function() {
                      return .5 - Math.random();
                   });
                     return shuffled;
                  }
                  
                  function shuffle(a) {
                    for (var i = a.length; i; i--) {
                      var j = Math.floor(Math.random() * i);
                      var _ref = [a[j], a[i - 1]];
                      a[i - 1] = _ref[0];
                      a[j] = _ref[1];
                    }
                  }
                  
                  /*** Return shuffled question ***/
                  function generateQuestions(){
                    var questions=shuffleArray(quizdata);    
                    return questions;
                  }
                  
                  /*** Return list of options ***/
                  function returnOptionList(opts, i){
                  
                    var optionHtml='<li class="myoptions">'+
                      '<input value="'+opts+'" name="optRdBtn" type="radio" id="rd_'+i+'">'+
                      '<label for="rd_'+i+'">'+opts+'</label>'+
                      '<div class="bullet">'+
                        '<div class="line zero"></div>'+
                        '<div class="line one"></div>'+
                        '<div class="line two"></div>'+
                        '<div class="line three"></div>'+
                        '<div class="line four"></div>'+
                        '<div class="line five"></div>'+
                        '<div class="line six"></div>'+
                        '<div class="line seven"></div>'+
                      '</div>'+
                    '</li>';
                  
                    return optionHtml;
                  }
                  
                  /** Render Options **/
                  function renderOptions(optionList){
                    var ulContainer=$('<ul>').attr('id','optionList');
                    for (var i = 0, len = optionList.length; i < len; i++) {
                      var optionContainer=returnOptionList(optionList[i], i)
                      ulContainer.append(optionContainer);
                    }
                    $(".answerOptions").html('').append(ulContainer);
                  }
                  
                  /** Render question **/
                  function renderQuestion(question){
                    $(".question").html("<h1>"+question+"</h1>");
                  }
                  
                  /** Render quiz :: Question and option **/
                  function renderQuiz(questions, index){ 
                    var currentQuest=questions[index];  
                    renderQuestion(currentQuest.question); 
                    renderOptions(currentQuest.options); 
                    console.log("Question");
                    console.log(questions[index]);
                  }
                  
                  /** Return correct answer of a question ***/
                  function getCorrectAnswer(questions, index){
                    return questions[index].answer;
                  }
                  
                  /** pushanswers in array **/
                  function correctAnswerArray(resultByCat){
                    var arrayForChart=[];
                    for(var i=0; i<resultByCat.length;i++){
                     arrayForChart.push(resultByCat[i].correctanswer);
                    }
                  
                    return arrayForChart;
                  }
                  /** Generate array for percentage calculation **/
                  function genResultArray(results, wrong){
                    var resultByCat = resultByCategory(results);
                    var arrayForChart=correctAnswerArray(resultByCat);
                    arrayForChart.push(wrong);
                    return arrayForChart
                  }
                  
                  /** percentage Calculation **/
                  function percentCalculation(array, total){
                    var percent = array.map(function (d, i) {
                      return (100 * d / total).toFixed(2);
                    });
                    return percent;
                  }
                  
                  /*** Get percentage for chart **/
                  function getPercentage(resultByCat, wrong){
                    var totalNumber=resultList.length;
                    var wrongAnwer=wrong;
                    //var arrayForChart=genResultArray(resultByCat, wrong);
                    //return percentCalculation(arrayForChart, totalNumber);
                  }
                  
                  /** count right and wrong answer number **/
                  function countAnswers(results){
                  
                    var countCorrect=0, countWrong=0;
                  
                    for(var i=0;i<results.length;i++){
                      if(results[i].iscorrect==true)  
                          countCorrect++;
                      else countWrong++;
                    }
                  
                    return [countCorrect, countWrong];
                  }
                  
                  /**** Categorize result *****/
                  function resultByCategory(results){
                  
                    var categoryCount = [];
                    var ctArray=results.reduce(function (res, value) {
                      if (!res[value.category]) {
                          res[value.category] = {
                              category: value.category,
                              correctanswer: 0           
                          };
                          categoryCount.push(res[value.category])
                      }
                      var val=(value.iscorrect==true)?1:0;
                      res[value.category].correctanswer += val; 
                      return res;
                    }, {});
                  
                    categoryCount.sort(function(a,b) {
                      return a.category - b.category;
                    });
                  
                    return categoryCount;
                  }
                  
                  
                  /** Total score pie chart**/
                  function totalPieChart(_upto, _cir_progress_id, _correct, _incorrect) {
                  
                     $("#"+_cir_progress_id).find("._text_incor").html("Incorrect : "+_incorrect);
                     $("#"+_cir_progress_id).find("._text_cor").html("Correct : "+_correct);
                  
                     var unchnagedPer=_upto;
                     
                      _upto = (_upto > 100) ? 100 : ((_upto < 0) ? 0 : _upto);
                  
                      var _progress = 0;
                  
                      var _cir_progress = $("#"+_cir_progress_id).find("._cir_P_y");
                      var _text_percentage = $("#"+_cir_progress_id).find("._cir_Per");
                  
                      var _input_percentage;
                      var _percentage;
                  
                      var _sleep = setInterval(_animateCircle, 25);
                  
                      function _animateCircle() {
                        //2*pi*r == 753.6 +xxx=764
                          _input_percentage = (_upto / 100) * 764;
                          _percentage = (_progress / 100) * 764;
                  
                          _text_percentage.html(_progress + '%');
                  
                          if (_percentage >= _input_percentage) {
                               _text_percentage.html('<tspan x="50%" dy="0em">'+unchnagedPer + '% </tspan><tspan  x="50%" dy="1.9em">Your Score</tspan>');
                              clearInterval(_sleep);
                          } else {
                  
                              _progress++;
                  
                              _cir_progress.attr("stroke-dasharray",_percentage + ',764');
                          }
                      }
                  }
                  
                  function renderBriefChart(correct, total, incorrect){
                    var percent=(100 * correct / total);
                    if(Math.round(percent) !== percent) {
                            percent = percent.toFixed(2);
                    }
                  
                   totalPieChart(percent, '_cir_progress', correct, incorrect)
                     
                  }
                  /*** render chart for result **/
                  function renderChart(data){
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                      type: 'doughnut',
                      data: {
                      labels: [ "Verbal communication", 
                                "Non-verbal communication", 
                                "Written communication", 
                                "Incorrect"
                              ],
                      datasets: [
                                  {
                                   
                                    data: data,
                                    backgroundColor: [  '#e6ded4',
                                                        '#968089',
                                                        '#e3c3d4',
                                                        '#ab4e6b'
                                                      ],
                                    borderColor: [  'rgba(239, 239, 81, 1)',
                                                    '#8e3407',
                                                    'rgba((239, 239, 81, 1)',
                                                    '#000000'
                                                  ],
                                    borderWidth: 1
                                  }
                                ]
                      },
                      options: {
                           pieceLabel: {
                            render: 'percentage',
                            fontColor: 'black',
                            precision: 2
                          }
                        }
                      
                    });
                  }
                  
                  /** List question and your answer and correct answer  
                  
                  *****/
                  function getAllAnswer(results){
                      var innerhtml="";
                      for(var i=0;i<results.length;i++){
                  
                        var _class=((results[i].iscorrect)?"item-correct":"item-incorrect");
                         var _classH=((results[i].iscorrect)?"h-correct":"h-incorrect");
                        
                  
                        var _html='<div class="_resultboard '+_class+'">'+
                                    '<div class="_header">'+results[i].question+'</div>'+
                                    '<div class="_yourans '+_classH+'">'+results[i].clicked+'</div>';
                  
                          var html="";
                         if(!results[i].iscorrect)
                          html='<div class="_correct">'+results[i].answer+'</div>';
                         _html=(_html+html)+'</div>';
                         innerhtml+=_html;
                      }
                  
                    $(".allAnswerBox").html('').append(innerhtml);
                  }
                  /** render  Brief Result **/
                  function renderResult(resultList){ 
                    
                    var results=resultList;
                    console.log(results);
                    var countCorrect=countAnswers(results)[0], 
                    countWrong=countAnswers(results)[1];
                    
                    
                    renderBriefChart(countCorrect, resultList.length, countWrong);
                  }
                  
                  function renderChartResult(){
                     var results=resultList; 
                    var countCorrect=countAnswers(results)[0], 
                    countWrong=countAnswers(results)[1];
                    var dataForChart=genResultArray(resultList, countWrong);
                    renderChart(dataForChart);
                  }
                  
                  /** Insert progress bar in html **/
                  function getProgressindicator(length){
                    var progressbarhtml=" ";
                    for(var i=0;i<length;i++){
                      progressbarhtml+='<div class="my-progress-indicator progress_'+(i+1)+' '+((i==0)?"active":"")+'"></div>';
                    }
                    $(progressbarhtml).insertAfter(".my-progress-bar");
                  } 
                  
                  /*** change progress bar when next button is clicked ***/
                  function changeProgressValue(){
                    $progressValue+= 9;
                    if ($progressValue >= 100) {
                      
                    } else {
                      if($progressValue==99) $progressValue=100;
                      $('.my-progress')
                        .find('.my-progress-indicator.active')
                        .next('.my-progress-indicator')
                        .addClass('active');      
                      $('progress').val($progressValue);
                    }
                    $('.js-my-progress-completion').html($('progress').val() + '% complete');
                  
                  }   
                  function addClickedAnswerToResult(questions,presentIndex,clicked ){
                    var correct=getCorrectAnswer(questions, presentIndex);
                      var result={
                        index:presentIndex,
                        question:questions[presentIndex].question, 
                        clicked:clicked,
                        iscorrect:(clicked==correct)?true:false,
                        answer:correct, 
                        category:questions[presentIndex].category
                      }
                      resultList.push(result);
                  
                      console.log("result");
                      console.log(result);
                        
                  }
                  
                  $(document).ready(function() {
                    
                    var presentIndex=0;
                     var clicked=0;
                  
                    var questions=generateQuestions();
                    renderQuiz(questions, presentIndex);
                    getProgressindicator(questions.length);
                  
                    $(".answerOptions ").on('click','.myoptions>input', function(e){
                      clicked=$(this).val();   
                  
                      if(questions.length==(presentIndex+1)){
                        $("#submit").removeClass('hidden');
                        $("#next").addClass("hidden");
                      }
                      else{
                  
                        $("#next").removeClass("hidden");
                      }
                  
                       
                    
                    });
                  
                  
                  
                    $("#next").on('click',function(e){
                      e.preventDefault();
                      addClickedAnswerToResult(questions,presentIndex,clicked);
                  
                      $(this).addClass("hidden");
                      
                      presentIndex++;
                      renderQuiz(questions, presentIndex);
                      changeProgressValue();
                    });
                  
                    $("#submit").on('click',function(e){
                       addClickedAnswerToResult(questions,presentIndex,clicked);
                      $('.multipleChoiceQues').hide();
                      $(".resultArea").show();
                      renderResult(resultList);
                  
                    });
                  
                    
                    
                  
                     $(".resultArea").on('click','.viewchart',function(){
                        $(".resultPage2").show();
                         $(".resultPage1").hide();
                         $(".resultPage3").hide();
                         renderChartResult();
                     });
                  
                      $(".resultArea").on('click','.backBtn',function(){
                        $(".resultPage1").show();
                         $(".resultPage2").hide();
                         $(".resultPage3").hide();
                          renderResult(resultList);
                     });
                  
                      $(".resultArea").on('click','.viewanswer',function(){
                        $(".resultPage3").show();
                         $(".resultPage2").hide();
                         $(".resultPage1").hide();
                          getAllAnswer(resultList);
                     });
                  
                    $(".resultArea").on('click','.replay',function(){
                      window.location.reload(true);
                    });
                  
                  });
               </script>
               <script>
                  function getTimeRemaining(endtime) {
                    var t = Date.parse(endtime) - Date.parse(new Date());
                    var seconds = Math.floor((t / 1000) % 60);
                    var minutes = Math.floor((t / 1000 / 60) % 60);
                    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                   
                    return {
                      'total': t,
                     
                      'hours': hours,
                      'minutes': minutes,
                      'seconds': seconds
                    };
                  }
                  
                  function initializeClock(id, endtime) {
                    var clock = document.getElementById(id);
                    
                    var hoursSpan = clock.querySelector('.hours');
                    var minutesSpan = clock.querySelector('.minutes');
                    var secondsSpan = clock.querySelector('.seconds');
                  
                    function updateClock() {
                      var t = getTimeRemaining(endtime);
                  
                    
                      hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                      minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                      secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                  
                      if (t.total <= 0) {
                        clearInterval(timeinterval);
                      }
                    }
                  
                    updateClock();
                    var timeinterval = setInterval(updateClock, 1000);
                  }
                  
                  var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
                  initializeClock('clockdiv', deadline);
               </script>
               <script>
                  // Credit: Mateusz Rybczonec
                  
                  const FULL_DASH_ARRAY = 283;
                  const WARNING_THRESHOLD = 10;
                  const ALERT_THRESHOLD = 5;
                  
                  const COLOR_CODES = {
                    info: {
                      color: "green"
                    },
                    warning: {
                      color: "orange",
                      threshold: WARNING_THRESHOLD
                    },
                    alert: {
                      color: "red",
                      threshold: ALERT_THRESHOLD
                    }
                  };
                  
                  const TIME_LIMIT = 20;
                  let timePassed = 0;
                  let timeLeft = TIME_LIMIT;
                  let timerInterval = null;
                  let remainingPathColor = COLOR_CODES.info.color;
                  
                  document.getElementById("app").innerHTML = `
                  <div class="base-timer">
                    <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                      <g class="base-timer__circle">
                        <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
                        <path
                          id="base-timer-path-remaining"
                          stroke-dasharray="283"
                          class="base-timer__path-remaining ${remainingPathColor}"
                          d="
                            M 50, 50
                            m -45, 0
                            a 45,45 0 1,0 90,0
                            a 45,45 0 1,0 -90,0
                          "
                        ></path>
                      </g>
                    </svg>
                    <span id="base-timer-label" class="base-timer__label">${formatTime(
                      timeLeft
                    )}</span>
                  </div>
                  `;
                  
                  startTimer();
                  
                  function onTimesUp() {
                    clearInterval(timerInterval);
                    $("#next").click();

                  }
                  
                  function startTimer() {
                    timerInterval = setInterval(() => {
                      timePassed = timePassed += 1;
                      timeLeft = TIME_LIMIT - timePassed;
                      document.getElementById("base-timer-label").innerHTML = formatTime(
                        timeLeft
                      );
                      setCircleDasharray();
                      setRemainingPathColor(timeLeft);
                  
                      if (timeLeft === 0) {
                        onTimesUp();
                      }
                    }, 1000);
                  }
                  
                  function formatTime(time) {
                    const minutes = Math.floor(time / 60);
                    let seconds = time % 60;
                  
                    if (seconds < 10) {
                      seconds = `0${seconds}`;
                    }
                  
                    return `${minutes}:${seconds}`;
                  }
                  
                  function setRemainingPathColor(timeLeft) {
                    const { alert, warning, info } = COLOR_CODES;
                    if (timeLeft <= alert.threshold) {
                      document
                        .getElementById("base-timer-path-remaining")
                        .classList.remove(warning.color);
                      document
                        .getElementById("base-timer-path-remaining")
                        .classList.add(alert.color);
                    } else if (timeLeft <= warning.threshold) {
                      document
                        .getElementById("base-timer-path-remaining")
                        .classList.remove(info.color);
                      document
                        .getElementById("base-timer-path-remaining")
                        .classList.add(warning.color);
                    }
                  }
                  
                  function calculateTimeFraction() {
                    const rawTimeFraction = timeLeft / TIME_LIMIT;
                    return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
                  }
                  
                  function setCircleDasharray() {
                    const circleDasharray = `${(
                      calculateTimeFraction() * FULL_DASH_ARRAY
                    ).toFixed(0)} 283`;
                    document
                      .getElementById("base-timer-path-remaining")
                      .setAttribute("stroke-dasharray", circleDasharray);
                  }
               </script>
            </div>
         </div>
      </div>
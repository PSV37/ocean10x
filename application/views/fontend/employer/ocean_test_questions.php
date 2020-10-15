  <!---header-->
      <?php  $this->load->view('fontend/layout/employer_new_header.php'); ?>
      <!---header--->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/oceanchamp_exp.css">
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
     position: relative;
    font-family: sans-serif;
    color: #fff;
    display: inline-block;
    font-weight: 100;
    text-align: center;
    font-size: 30px;
    /* position: fixed; */
    /* right: 62px; */
    /* top: 153px; */
    /* margin-right: -740px; */
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
    float: left;
    margin-right: 25px;
    margin-top: -170px;
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
      width:140px;
      padding: 1.5em auto;
      margin: 1em auto;
      background-color:#f1f2ec;
      border: none;
      border-radius: 3px;
      color: #7aa4a9;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      transition: all 0.2s cubic-bezier(.4,0,.2,1); 
      }
      #next:hover,
      #submit:hover,
      .viewanswer:hover,
      .viewchart:hover,
      .backBtn:hover,
      .replay:hover {
      letter-spacing: 0.2em;
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
      letter-spacing: 0.2em;
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
      .skip
      {
      margin-top: 190px;
      margin-left: 41px;
      width: 200px;
      background-color: #18c5bd;
      color: #fff;
      border-radius: 3px;
}
      .rexp{padding-left:100px;margin-bottom:70px;}
      @import url(https://fonts.googleapis.com/css?family=Work+Sans:300,600);

body{
      font-size: 20px;
      font-family: 'Work Sans', sans-serif;
      color: #333;
  font-weight: 300;
  text-align: center;
  background-color: #f8f6f0;
}
h1{
  font-weight: 300;
  margin: 0px;
  padding: 10px;
  font-size: 20px;
  background-color: #444;
  color: #fff;
}
.question{
  font-size: 30px;
  margin-bottom: 10px;
}
.answers {
  margin-bottom: 20px;
  text-align: left;
  display: inline-block;
}
.answers label{
  display: block;
  margin-bottom: 10px;
}
button{
  font-family: 'Work Sans', sans-serif;
      font-size: 22px;
      background-color: #279;
      color: #fff;
      border: 0px;
      border-radius: 3px;
      /*padding: 20px;*/
      cursor: pointer;
      margin-bottom: 20px;
}
button:hover{
      background-color: #38a;
}

input[type="radio"] {
    margin-top: 1px;
    margin-left: -25px;
}



.slide{
  position: absolute;
  left: 0px;
  top: 0px;
  width: 100%;
  z-index: 1;
  opacity: 0;
  transition: opacity 0.5s;
}

.slide1 {
    position: absolute;
    left: -150px;
    top: 21px;
    width: 100%;
    z-index: 1;
    opacity: 0;
    transition: opacity 0.5s;
}

.slide2{
     position: absolute;
    left: 265px;
    top: 15px;
    width: 100%;
    z-index: 1;
    opacity: 0;
    transition: opacity 0.5s;
}
.active-slide{
  opacity: 1;
  z-index: 2;
}
.quiz-container{
  position: relative;
  height: 200px;
  margin-top: 40px;
}

   </style>
   <body>
    
      <div class="container-fluid main-d">
         <div class="container">
            <div class="col-md-12">
               <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
               <div class="col-md-9 test_d">
                  <div id="clockdiv">
                    <!--  <div>
                        <span class="hours"></span>
                        <div class="smalltext">Hours</div>
                     </div> -->
                     
                     <div style="margin-right: -560px;position: relative;margin-top: 20px;">
                        <span class="seconds"></span>
                        <div class="smalltext">Seconds</div>
                     </div>
                     <!-- <div>
                        <span class="minutes"></span>
                        <div class="smalltext">Minutes</div>
                     </div> -->
                  </div>
                    <div id="skip">
                        
                  </div>
                  <div class="quizArea">
                     <div class="multipleChoiceQues">
                        <div id="app"></div>
                        <div class="my-progress">
                           <progress class="my-progress-bar" min="0" max="100" value="0" step="9" aria-labelledby="my-progress-completion"></progress>    
                           <p id="my-progress-completion" class="js-my-progress-completion sr-only" aria-live="polite">0% complete</p>
                        </div>
                        <div class="quizBox">
                          <form id="nextques" class="submit-form" action="<?php echo base_url();?>employer/insert_test_data" method="post">

                              <input type="hidden" name="test_id" value="<?php echo($test_id); ?>">
                            
                              <div class="quiz-container">
                                <div id="quiz"></div>
                              </div>
                              <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['previous_option'] == 'Y') { ?>
                              <button type="button" id="previous">Previous Question</button>
                        <? } ?>
                              <button type="button" id="next">Next Question</button>
                              <button id="submit">Submit Quiz</button>
                              <div id="results"></div>
                               <div id="total_performance">
                        
                  </div>
                     </form>
                        </div>
                     </div>
                    


                  </div>
                
                  <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['review_option'] == 'Y') { ?>
                      
                 <!--  } ?> -->
                  <div class="row preview" style=" margin-top: 150px;">
                        <?php $i=1; foreach ($all_questions as $row) { ?>
                              <div class="col-md-2 exp-box" id="status<?php echo $i; ?>" onclick="getval(<?php echo $i; ?>);"><span name="levels[]" id="levels"   value=""><?php echo $i; ?></span></div>
                      <? $i++; } } ?>
                        
                  </div>
                 
               </div>
              <script>
                    
// (function(){
  // Functions
  function buildQuiz(){
  console.log('buildQuiz');

    // variable to store the HTML output
    const output = [];
    const timer = [];
    const skip = [];

    // for each question...
    myQuestions.forEach(
      (currentQuestion, questionNumber) => {

        // variable to store the list of possible answers
        const answers = [];
        const time = [];

        // and for each available answer...
        for(letter in currentQuestion.answers){

          // ...add an HTML radio button
          answers.push(
            `<label>
              <input type="radio" onclick="get_checked(${questionNumber});" style="display:block;" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label>
            `
          );
        }

      
                  // document.getElementById("app").innerHTML = `
                  // <div class="base-timer">
                  //   <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                  //     <g class="base-timer__circle">
                  //       <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
                  //       <path
                  //         id="base-timer-path-remaining"
                  //         stroke-dasharray="283"
                  //         class="base-timer__path-remaining ${remainingPathColor}"
                  //         d="
                  //           M 50, 50
                  //           m -45, 0
                  //           a 45,45 0 1,0 90,0
                  //           a 45,45 0 1,0 -90,0
                  //         "
                  //       ></path>
                  //     </g>
                  //   </svg>
                  //   <span id="base-timer-label" class="base-timer__label">${formatTime(
                  //     timeLeft
                  //   )}</span>
                  // </div>
                  // `;

                  // startTimer();


                
                  
                 
                  
  
        // add this question and its answers to the output
        output.push(
          `<div class="slide"  id="${questionNumber}">
            <div class="question" id="${questionNumber}"> ${currentQuestion.question} </div>
            <div class="answers"> ${answers.join("")} </div>
          <input type = "hidden" id="timer${questionNumber}" value="${currentQuestion.time_for_question}">
          </div>`
        );
     
         // set_timer();

              skip.push(`<div class="slide2"><button class="skip skp" id="${questionNumber}" onclick="next(${questionNumber});">skip question</button></div>`
                  );

      
      }
    );

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join('');
     // document.getElementById("app").innerHTML = timer;
     document.getElementById("skip").innerHTML = skip;

     
                
  }

  function showResults(){

    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach( (currentQuestion, questionNumber) => {
      console.log(currentQuestion);
      console.log(questionNumber);
      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;
       <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['correct_ans_each_ques'] == 'Y') { ?>
        // color the answers green
        answerContainers[questionNumber].style.color = '#06bb06';
         <?php } ?>
      }
      else if(userAnswer === {})
      {

      }
      // if answer is wrong or blank
      else{
       <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['correct_ans_each_ques'] == 'Y') { ?>
        // color the answers red
        answerContainers[questionNumber].style.color = 'red';
         <?php } ?>
      }
    });
     <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['correct_ans_each_ques'] == 'Y') { ?>
    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
     <?php } ?>
      $(resultsContainer).append('<input type="hidden" name="correct" value ="'+numCorrect+'" >');
  }

  function show_result(n)
  {
      const answerContainers = quizContainer.querySelectorAll('.answers');
      var currentQuestion = myQuestions[n];
      var questionNumber =n;
    // keep track of user's answers
    let numCorrect = 0;
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
       
        answerContainers[questionNumber].style.color = '#06bb06';
     
      }
      // if answer is wrong or blank
      else{
      
        // color the answers red
        answerContainers[questionNumber].style.color = 'red';
       

      }
  }

  function showSlide(n) {
      // alert(n);
    slides[currentSlide].classList.remove('active-slide');
    slides[n].classList.add('active-slide');

    // slides1[currentSlide].classList.remove('active-slide');
    // slides1[n].classList.add('active-slide');

    slides2[currentSlide].classList.remove('active-slide');
    slides2[n].classList.add('active-slide');
    currentSlide = n;
 <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['previous_option'] == 'Y') { ?>
    if(currentSlide === 0){
      previousButton.style.display = 'none';
    
    }
    else{
     
      previousButton.style.display = 'inline-block';
     $('#previous').css('margin-top',70);

    }
    <?php } ?>
    if(currentSlide === slides.length-1){
      nextButton.style.display = 'none';
      submitButton.style.display = 'inline-block';
     $('#submit').css('margin-top',70);
     

    }
    else{
      nextButton.style.display = 'inline-block';
     $('#next').css('margin-top',70);
     
      submitButton.style.display = 'none';
    }
    
    
 var total_slides=slides.length;
 // console.log(n);
 console.log(myQuestions[n]);
<?php if (isset($oceanchamp_tests) && $oceanchamp_tests['timer_on_each_que'] == 'Y') { ?>

  set_timer(n,total_slides);
<?php } ?>
  }

  function showNextSlide() {
     <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['timer_on_each_que'] == 'Y') { ?>

clearInterval(timerInterval);
<?php } ?>
      
      // $('#timer'+currentSlide).val('00');
    showSlide(currentSlide + 1);
  }

  function showPreviousSlide() {
     <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['timer_on_each_que'] == 'Y') { ?>

clearInterval(timerInterval);
<?php } ?>

      // $('#timer'+currentSlide).val();
    showSlide(currentSlide - 1);
  }

  // Variables
  const quizContainer = document.getElementById('quiz');
  const resultsContainer = document.getElementById('results');
  const submitButton = document.getElementById('submit');
 var myQuestions = <?php echo json_encode($all_questions); ?>;
// console.log(JSON.parse(myQuestions));
 console.log(myQuestions);

// ];
  // const myQuestions = [
  //   {
  //     question: "Who invented JavaScript?",
  //     answers: {
  //       a: "Douglas Crockford",
  //       b: "Sheryl Sandberg",
  //       c: "Brendan Eich"
  //     },
  //     correctAnswer: "c"
  //   },
  //   {
  //     question: "Which one of these is a JavaScript package manager?",
  //     answers: {
  //       a: "Node.js",
  //       b: "TypeScript",
  //       c: "npm"
  //     },
  //     correctAnswer: "c"
  //   },
  //   {
  //     question: "Which tool can you use to ensure code quality?",
  //     answers: {
  //       a: "Angular",
  //       b: "jQuery",
  //       c: "RequireJS",
  //       d: "ESLint"
  //     },
  //     correctAnswer: "d"
  //   }
  // ];

  // Kick things off
  buildQuiz();

  // Pagination
    <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['previous_option'] == 'Y') { ?>
  const previousButton = document.getElementById("previous");
   previousButton.addEventListener("click", showPreviousSlide);
<?php } ?>
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  const slides1 = document.querySelectorAll(".slide1");
  const slides2 = document.querySelectorAll(".slide2");
  let currentSlide = 0;

  // Show the first slide
  showSlide(currentSlide);
  console.log('currentSlide'+currentSlide);

  // Event listeners
 
       submitButton.addEventListener('click', showResults);

 
 
  nextButton.addEventListener("click", showNextSlide);

 // console.log(myQuestions);
 //  var obj = JSON.parse(myQuestions);
 // console.log(obj[currentSlide]);
 

// })();


function get_checked(n)
{
      // alert(n);
      
      var j = n + 1;
       <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['correct_ans_each_ques'] == 'Y') { ?>
      show_result(currentSlide);
      $('input[name = "question'+n+'"]').attr('disabled', true);
<?php } ?>
      $('#status'+j).css('background-color', '#94f36d');
       <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['review_option'] == 'N') 
      { ?>
            $("#next").click();
      <?php } ?>


}

function next(n)
{
   $("#next").click();
    var j = n + 1;
      $('#status'+j).css('background-color', 'gray');

}

function getval(value)
{
      <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['timer_on_each_que'] == 'Y') { ?>

clearInterval(timerInterval);
<?php } ?>
      
      qid = value - 1;
     <?php if (isset($oceanchamp_tests) && $oceanchamp_tests['previous_option'] == 'N') 
     {
      
      }else{ ?>
             showSlide(qid);

      <?php } ?> 
    
    
     
}
  $("#nextques").submit(function(){
     var categories = {},
    category;
      $('.preview div').each(function(i, el){
          category = $(el).css( "background-color" );
          if (categories.hasOwnProperty(category)) {
              categories[category] += 1;
          }
          else {
              categories[category] = 1;
          }
      });

      // $('#result').append('<hr>');
for(var key in categories){
       if (key == 'rgb(255, 255, 255)') 
      {
           var color = 'white';
      }
      else if (key == 'rgb(148, 243, 109)') 
      {
           var color = 'green';
      }
      else if (key == 'rgb(128, 128, 128)') 
      {
           var color = 'gray';
      }

      $("#total_performance").append('<input type="hidden" name="'+color+'" value ="'+categories[key]+'" >');
    // $('#total_performance').innerHTML='';
      // alert(key + ' (' + categories[key] + ')<br>');
     
}

      // $.each(arrayFromPHP, function (i, elem) {
      //       var bodyColor = $('status'+i).attr("style");
      //    alert(bodyColor);
      // });
     // var bodyColor = $(this).attr("style");
})
function set_timer(n,total_slides)
{
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
                   
                  
                          // variable to store the list of possible answers
                         

                       
                 const TIME_LIMIT = $('#timer'+n).val();
                 

                 // alert(currentQuestion.question);
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
                  
                  startTimer(timePassed,TIME_LIMIT,COLOR_CODES,n,total_slides);
                  
}

                  function onTimesUp(n,total_slides) {
                    clearInterval(timerInterval);

                    if (n==total_slides-1) 
                    {
                    $("#submit").click();

                    }
                    else
                    {
                    $("#next").click();


                    }
                    // startTimer();

                  }
                  
                  function startTimer(timePassed,TIME_LIMIT,COLOR_CODES,n,total_slides)
                  {
                    timerInterval = setInterval(() => {
                      timePassed = timePassed += 1;
                      timeLeft = TIME_LIMIT - timePassed;
                      document.getElementById("base-timer-label").innerHTML = formatTime(
                        timeLeft
                      );
                      setCircleDasharray(timePassed,TIME_LIMIT);
                      setRemainingPathColor(timeLeft,COLOR_CODES);
                  
                      if (timeLeft === 0) {
                        onTimesUp(n,total_slides);
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
                  
                  function setRemainingPathColor(timeLeft,COLOR_CODES) {
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
                  
                  function calculateTimeFraction(timePassed,TIME_LIMIT) {
                    const rawTimeFraction = timeLeft / TIME_LIMIT;
                    return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
                  }
                  
                  function setCircleDasharray(timePassed,TIME_LIMIT) {
                    const circleDasharray = `${(
                      calculateTimeFraction(timePassed,TIME_LIMIT) * 283
                    ).toFixed(0)} 283`;
                    document
                      .getElementById("base-timer-path-remaining")
                      .setAttribute("stroke-dasharray", circleDasharray);
                  }

              </script>
              <script>
                  function getTimeRemaining(endtime) {
                    var t = Date.parse(endtime) - Date.parse(new Date());
                    var seconds = Math.floor((t / 1000) % <?php echo $test_duration; ?>);
                    console.log(seconds);
                   
                    return {
                      'total': t,
                     
                      // 'hours': hours,
                      // 'minutes': minutes,
                      'seconds': seconds
                    };
                  }
                  
                  function initializeClock(id, endtime) {
                    var clock = document.getElementById(id);
                    // alert(endtime);
                    // var hoursSpan = clock.querySelector('.hours');
                    // var minutesSpan = clock.querySelector('.minutes');
                    var secondsSpan = clock.querySelector('.seconds');
                  
                    function updateClock() {
                      var t = getTimeRemaining(endtime);
                  
                    
                      // hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                      // minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                      secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                  
                      if (t.total <= 0) {
                        clearInterval(timeinterval);
                        // alert('kf');
                        // $("#submit").click();
                      }
                    }
                  
                    updateClock();
                    var timeinterval = setInterval(updateClock, 1000);
                  }
                  
                  // var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
                  var deadline = <?php echo  $oceanchamp_tests['test_duration'] ?>;
                  initializeClock('clockdiv', deadline);
               </script>
              <!--  <script>
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
                   

                          // variable to store the list of possible answers
                         

                       
                 // const TIME_LIMIT = currentQuestion.;
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
                    // startTimer();

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
                
  

               </script> -->
            </div>
         </div>
      </div>
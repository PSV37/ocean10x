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
     /* #question input[type=radio] {
      display: none;
      }*/
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
      padding: 20px;
      cursor: pointer;
      margin-bottom: 20px;
}
button:hover{
      background-color: #38a;
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
                          <form id="nextques" class="submit-form" action="<?php echo base_url();?>employer/insert_test_data" method="post">

                                  
                              <h1>Quiz on Important Facts</h1>
                              <div class="quiz-container">
                                <div id="quiz"></div>
                              </div>
                              <button type="button" id="previous">Previous Question</button>
                              <button type="button" id="next">Next Question</button>
                              <button id="submit">Submit Quiz</button>
                              <div id="results"></div>
                     </form>
                        </div>
                     </div>
                    


                  </div>
                  <button class="skip" onclick="next();">skip question</button>
               </div>
              <script>
                    
(function(){
  // Functions
  function buildQuiz(){
    // variable to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach(
      (currentQuestion, questionNumber) => {

        // variable to store the list of possible answers
        const answers = [];

        // and for each available answer...
        for(letter in currentQuestion.answers){

          // ...add an HTML radio button
          answers.push(
            `<label>
              <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label> '<div class="bullet">'+
                        '<div class="line zero"></div>'+
                        '<div class="line one"></div>'+
                        '<div class="line two"></div>'+
                        '<div class="line three"></div>'+
                        '<div class="line four"></div>'+
                        '<div class="line five"></div>'+
                        '<div class="line six"></div>'+
                        '<div class="line seven"></div>'+
                      '</div>'+
                    '</li>';`
          );
        }

        // add this question and its answers to the output
        output.push(
          `<div class="slide">
            <div class="question"> ${currentQuestion.question} </div>
            <div class="answers"> ${answers.join("")} </div>
          </div>`
        );
      }
    );

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join('');
  }

  function showResults(){

    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach( (currentQuestion, questionNumber) => {

      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = 'lightgreen';
      }
      // if answer is wrong or blank
      else{
        // color the answers red
        answerContainers[questionNumber].style.color = 'red';
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
  }

  function showSlide(n) {
    slides[currentSlide].classList.remove('active-slide');
    slides[n].classList.add('active-slide');
    currentSlide = n;
    if(currentSlide === 0){
      previousButton.style.display = 'none';
    }
    else{
      previousButton.style.display = 'inline-block';
    }
    if(currentSlide === slides.length-1){
      nextButton.style.display = 'none';
      submitButton.style.display = 'inline-block';
    }
    else{
      nextButton.style.display = 'inline-block';
      submitButton.style.display = 'none';
    }
  }

  function showNextSlide() {
    showSlide(currentSlide + 1);
  }

  function showPreviousSlide() {
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
  const previousButton = document.getElementById("previous");
  const nextButton = document.getElementById("next");
  const slides = document.querySelectorAll(".slide");
  let currentSlide = 0;

  // Show the first slide
  showSlide(currentSlide);

  // Event listeners
  submitButton.addEventListener('click', showResults);
  previousButton.addEventListener("click", showPreviousSlide);
  nextButton.addEventListener("click", showNextSlide);
})();

              </script>
            </div>
         </div>
      </div>
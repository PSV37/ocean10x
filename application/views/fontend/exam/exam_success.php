<!----
<div id="nextshow">
    <div class="row">
      <div class="col-md-12">
        <div class="userccount">
           <h2 align="center">Thank You <span>!</span></h2> 
            <p>Your test completed successfully . <br>
              
            <br>Please go to <a href="<?php echo base_url(); ?>">Home </a> or search something from search form.</p>
            <div class="backtohome"><a href="<?php echo base_url(); ?>" class="btn btn-custom">Back to Home</a></div>
        </div>
      </div>
    </div>

</div>

               --->
<style>
.hedaer-thank-you {
    padding: 45px;
    background-color: aliceblue;
	text-align:center;
}
.back_btn {
    text-align: center;
	margin-top: 50px;
}
.back-b{
    border: none;
    padding: 20px 40px;
    border-radius: 138px;
    background-color: #18afa8;
    color: #fff;
    box-shadow: 1px 4px 6px #e6e5e5;
	cursor:pointer;
}
.back-b:hover{ background-color:#0e8680;}


</style>               
               
               
       <div class="hedaer-thank-you">
<h1>Thank You !</h1>
</div>

<p style="text-align: center;font-size: 18px;">Thanks ! Your test has been Completed Successfully !</p>
<div class="back_btn">
<!-- <a href="<?php echo base_url(); ?>"><button class="back-b">Back to home Page</button></a>
</div> -->
<p>Please wait while we take you back ! <span id="seconds">5</span> seconds.
</p>
<script type="text/javascript">
 

var seconds = 5; // seconds for HTML
var foo; // variable for clearInterval() function

function redirect() {
    document.location.href = '<?php echo base_url() ?>seeker/ocean_champ';
}

function updateSecs() {
    document.getElementById("seconds").innerHTML = seconds;
    seconds--;
    if (seconds == -1) {
        clearInterval(foo);
        redirect();
    }
}

function countdownTimer() {
    foo = setInterval(function () {
        updateSecs()
    }, 1000);
}

countdownTimer();
</script>         
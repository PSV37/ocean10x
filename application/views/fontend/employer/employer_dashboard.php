
<!---header-->
<?php $this->load->view('fontend/layout/employer_new_header.php');?>  

<!---header--->
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  /*right: 15px;*/
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.chatperson{
  display: block;
  border-bottom: 1px solid #eee;
  width: 100%;
  display: flex;
  align-items: center;
  white-space: nowrap;
  overflow: hidden;
  margin-bottom: 15px;
  padding: 4px;
}
.chatperson:hover{
  text-decoration: none;
  border-bottom: 1px solid orange;
}
.namechat {
    display: inline-block;
    vertical-align: middle;
}
.chatperson .chatimg img{
  width: 40px;
  height: 40px;
  background-image: url('http://i.imgur.com/JqEuJ6t.png');
}
.chatperson .pname{
  font-size: 18px;
  padding-left: 5px;
}
.chatperson .lastmsg{
  font-size: 12px;
  padding-left: 5px;
  color: #ccc;
}

/*body{
    height:400px;
    position: fixed;
    bottom: 0;
}*/
.col-md-2, .col-md-10{
    padding:0;
}
.panel{
    margin-bottom: 0px;
}
.chat-window{
    bottom:0;
    position:fixed;
    float:right;
    margin-left:10px;
}
.chat-window > div > .panel{
    border-radius: 5px 5px 0 0;
}
.icon_minim{
    padding:2px 10px;
}
.msg_container_base{
  background: #e5e5e5;
  margin: 0;
  padding: 0 10px 10px;
  max-height:300px;
  overflow-x:hidden;
}
.top-bar {
  background: #666;
  color: white;
  padding: 10px;
  position: relative;
  overflow: hidden;
}
.msg_receive{
    padding-left:0;
    margin-left:0;
}
.msg_sent{
    padding-bottom:20px !important;
    margin-right:0;
}
.messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width:100%;
}
.messages > p {
    font-size: 13px;
    margin: 0 0 0.2rem 0;
  }
.messages > time {
    font-size: 11px;
    color: #ccc;
}
.msg_container {
    padding: 10px;
    overflow: hidden;
    display: flex;
}
img {
    display: block;
    width: 100%;
}
.avatar {
    position: relative;
}
.base_receive > .avatar:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    width: 0;
    height: 0;
    border: 5px solid #FFF;
    border-left-color: rgba(0, 0, 0, 0);
    border-bottom-color: rgba(0, 0, 0, 0);
}

.base_sent {
  justify-content: flex-end;
  align-items: flex-end;
}
.base_sent > .avatar:after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 0;
    border: 5px solid white;
    border-right-color: transparent;
    border-top-color: transparent;
    box-shadow: 1px 1px 2px rgba(black, 0.2); // not quite perfect but close
}

.msg_sent > time{
    float: right;
}



.msg_container_base::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar
{
    width: 12px;
    background-color: #F5F5F5;
}

.msg_container_base::-webkit-scrollbar-thumb
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
}

.btn-group.dropup{
    position:fixed;
    left:0px;
    bottom:0;
}
.panel-heading.top-bar {
    background-color: #18c5bd;
}
button#btn-chat {
    height: 30px;
    background-color: #18c5bd;
    border: none;
}
</style>
<div class="container-fluid main-d">
	<div class="container">
        <div class="col-md-12">
        	<?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            
            <div class="col-lg-6 mid-section">
            <div class="row">           
            <div class="col-md-12 bd-1">
                   
            <div class="dash-box-w">
             <h3 class="heading-dash">My Dashboard</h3>
             
             <div class="col-md-4 card-lb">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-fw fa-download"></i>
                            </div>
                            <span>Saved Job</span>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:2px;">10</span>
                            </a>
                            </div>
                        </div>
              <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-danger o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                          <i class="fas fa-volume-up fa-fw"></i>
                            </div>
                            <div >Job Alerts</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                 <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-warning o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-users fa-fw"></i>
                            </div>
                            <div>Profile Views</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div> 
                     
                     <div class="col-md-4 card-lb">
                        <div class="card text-white bg-bluish o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-fw fa-download"></i>
                            </div>
                            <span>Article Views</span>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">10</span>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-link o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                          <i class="fas fa-volume-up fa-fw"></i>
                            </div>
                            <div>courses Completed</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                          
                        <div class="col-md-4 card-lb">
                        	<div class="card text-white bg-green o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                           <i class="fas fa-users fa-fw"></i>
                            </div>
                            <div>News Feed</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left" style="font-size:22px;">20</span>
                            </a>
                            </div>
                        </div>
                        
                              
                  </div>                
             </div>
             
             <div class="col-md-12 bd-2">
             <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
                <div class="job-voucher alert alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                	<img src="https://media-exp1.licdn.com/dms/image/C4E0BAQHbWPfQdNw1EA/company-logo_200_200/0?e=2159024400&v=beta&t=fWMuJX9leYFsDf-weERHLyIPfRh4aCOwx8wygmhad9Q" class="dimen_img-s" />
                   <div class="job_title">
                   The person/job specification can be presented as a stand-alone 
                   </div> 
                    <div class="organization">
                    	IT Company
                    </div>
                    <div class="location">
                    	Pune ,Kalyani nagar
                    </div>
                    <div class="apply_job_btn">Apply job</div>
                    <button class="job_dis_btn">Details</button>
                </div>
             </div>
             
             
            </div>
             <div class="chat-popup" id="myForm1" style="display: none;
    max-width: 300px;
    float: right;
    margin-left: 290px;">
            
             </div>
           </div>
           
            <div class="col-md-3 pro-bar">
          
            <h3 class="heading-dash_profile">PROFILE LEVEL</h3>
                <div class="progress yellow">
                <span class="progress-left">
                    <span class="progress-bar"></span>
                </span>
                <span class="progress-right">
                    <span class="progress-bar"></span>
                </span>
                <div class="progress-value">75%</div>
            </div>
      
        	
       			 <div class="paragraph_p_level">
       	
        </div>
        <button class="open-button" onclick="openForm()">Messaging</button>
        <div class="chat-popup" id="myForm" style="    display: none;
    max-width: 300px;
    margin-left: 55px;">
              <!-- <form action="/action_page.php" class="form-container">
                <h1>Chat</h1>

                <label for="msg"><b>Message</b></label>
                <textarea placeholder="Type message.." name="msg" required></textarea>

                <button type="submit" class="btn">Send</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
              </form> -->

               <div class="chatbody">
                  <div class="panel panel-primary">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Messaging</h3>
                    </div>
                    <span style="margin-left: 40px;" onclick="opensearch()"><i  class="fa fa-plus"></i></span>
                    <span style="float: right;" onclick="closeForm('myForm')"><i  class="fa fa-close"></i></span>
                </div>


                <div class="panel-body msg_container_base" >
                   <input type="search" name="search_connection" placeholder="search new connection" id="search_connection" style="display: none;
  border-radius: 0;margin-top: 43px;max-width: 88%;margin-left: 2px; color: black;">
  <button class="btn btn-primary btn-sm" id="connection_btn" style="display: none;float: right;margin-right: -9px;margin-top: 1px;height: 36px;background-color: #18c5bd;border: none;"><i class="fa fa-plus fa-1x" onclick="add_connection();" aria-hidden="true"></i></button>
                    <input type="hidden" name="job_seeker_id" value="" id="auto-value">
                    <?php foreach ($chatbox as $row) {?>

                    <div class="row msg_container base_receive" style="margin-top: 50px;">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10" onclick="show_box(<?php echo $row['js_id']; ?>);">
                            <div class="messages msg_receive">
                                <p><?php echo $row['full_name']; ?></p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   <!--  <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p>y</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div> -->
                </div>
               <!--  <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat" onclick="send_msg();"><i class="fa fa-send fa-1x" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </div> -->
            </div>

                 </div>
            </div>
            </div>
            
         </div>
     </div>
</div>   

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm(id) {
  document.getElementById(id).style.display = "none";
}

function send_msg(id)
{
  alert(id);
  var message = $('#btn-input').val();
  $.ajax({
              url: "<?php echo base_url();?>employer/send_message",
              type: "POST",
              data: {id:id,message:message},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('#myForm1').html(data);
              }
        });
}

function show_box(id){
  // var id = $('#auto-value').val();
  alert(id);
   $.ajax({
              url: "<?php echo base_url();?>employer/get_messages",
              type: "POST",
              data: {id:id},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                 document.getElementById("myForm1").style.display = "block";
                
                $('#myForm1').html(data);
              }
        });
   
}

function opensearch(){
    document.getElementById("search_connection").style.display = "block";
    document.getElementById("connection_btn").style.display = "block";
}
$("#search_connection").autocomplete({
             
              source: "<?php echo base_url();?>Employer/search_people",
             minLength: 2,
              // append: "#rotateModal",
              focus: function(event, ui) {
               // prevent autocomplete from updating the textbox
               event.preventDefault();
               // manually update the textbox
               // alert(source);
               $(this).val(ui.item.label);
            },
            select: function(event, ui) {
               // prevent autocomplete from updating the textbox
               event.preventDefault();
               // manually update the textbox and hidden field
               $(this).val(ui.item.label);
               $("#auto-value").val(ui.item.value);
            }
            
           });
function add_connection()
{
  var id = $('#auto-value').val();
  alert(id);
   $.ajax({
              url: "<?php echo base_url();?>employer/add_new_connection",
              type: "POST",
              data: {id:id},
              // contentType:false,
              // processData:false,
               // dataType: "json",
              success: function(data)
              {
                $('#myForm').html(data);
              }
        });
}
</script>
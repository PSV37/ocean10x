
            
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
  <button class="btn btn-primary btn-sm" style="float: right;margin-right: -9px;margin-top: 1px;height: 36px;background-color: #18c5bd;border: none;"><i class="fa fa-plus fa-1x" onclick="add_connection();" aria-hidden="true"></i></button>
                    <input type="hidden" name="job_seeker_id" value="" id="auto-value">
                    <?php foreach ($chatbox as $row) {
                        # code...
                    }?>
                    <div class="row msg_container base_receive" style="margin-top: 50px;">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10" onclick="show_box();">
                            <div class="messages msg_receive">
                                <p><?php echo $row['full_name']; ?></p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row msg_container base_receive">
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
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat"><i class="fa fa-send fa-1x" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </div>
            </div>

                 </div>
            
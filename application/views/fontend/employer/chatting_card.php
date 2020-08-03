<div class="chatbody">
                  <div class="panel panel-primary">
                <div class="panel-heading top-bar">
                    <div class="col-md-8 col-xs-8">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span><?php echo $check['full_name'] ?></h3>
                    </div>
                    <span style="float: right;" onclick="closeForm('myForm1')"><i  class="fa fa-close"></i></span>
                </div>
                <?php foreach ($chatbox as $row) { $date = date('Y-md', $row['created_date']); ?>
                  
              
                <div class="panel-body msg_container_base">
                    <?php if ($row['msg_from'] == $this->session->userdata('company_profile_id')) { ?>
             
               
                    <div class="row msg_container base_sent">
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_sent">
                                <p><?php echo $row['msg']; ?></p>
                                <time datetime="2009-11-13T20:00"><?php if ($date == date('Y-m-d')) { echo $row['created_date']->diff(new DateTime('Y-m-d H:i:s'));
                                   }else{
                                   echo $row['created_date'];
                                   } ?></time>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="row msg_container base_receive">
                        <div class="col-md-2 col-xs-2 avatar">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
                        </div>
                        <div class="col-md-10 col-xs-10">
                            <div class="messages msg_receive">
                                <p><?php echo $row['msg']; ?></p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <?php  } ?>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat" onclick="send_msg(<?php echo $check['job_seeker_id']; ?>);"><i class="fa fa-send fa-1x" aria-hidden="true"></i></button>
                        </span>
                    </div>
                </div>
            </div>

                 </div>
<!-- <div class="chatbody">
   <div class="panel panel-primary"> -->
      <div class="panel-heading top-bar">
         <div class="col-md-8 col-xs-8">
            <h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span><?php if (isset($check['full_name'])) {
               echo $check['full_name'];
               }else{
                echo $check['company_name'];
               }  ?></h3>
         </div>
           <input type="hidden" name="" value="<?php echo $check['emp_js_connection_id']; ?>" id="connection_id">
         <input type="hidden" name="type" value="<?php echo $check['type'] ?>">
         <span style="float: right;" onclick="closeForm('myForm1')"><i  class="fa fa-close"></i></span>
      </div>
      <?php foreach ($chatbox as $row) { $date = date('Y-m-d', $row['created_date']); ?>
      <div class="panel-body msg_container_base">
         <?php if ($row['msg_from'] == $this->session->userdata('company_profile_id')) { ?>
         <div class="row msg_container base_sent">
            <div class="col-md-10 col-xs-10">
               <div class="messages msg_sent">
                  <p><?php echo $row['msg']; ?></p>
                  <time datetime="2009-11-13T20:00">
                  <?php echo $row['created_date']; ?>
                  </time>
               </div>
            </div>
         
         </div>
         <?php }else{ ?>
         <div class="row msg_container base_receive">
           
            <div class="col-md-10 col-xs-10">
               <div class="messages msg_receive">
                  <p><?php echo $row['msg']; ?></p>
                  <time datetime="2009-11-13T20:00">  <?php echo $row['created_date']; ?></time>
               </div>
            </div>
         </div>
         <?php } ?>
      </div>
      <?php  } ?>
      
   <!-- </div>
</div> -->
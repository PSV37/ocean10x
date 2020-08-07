<?php foreach ($chatbox as $row) { ?>
<div class="row msg_container base_receive" style="margin-top: 50px;">
   <div class="col-md-2 col-xs-2 avatar">
      <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">
   </div>
   <div class="col-md-10 col-xs-10" onclick="show_box(<?php echo $row['emp_js_connection_id']; ?>);get_list();">
      <div class="messages msg_receive">
         <?php $js_id = $this->session->userdata('job_seeker_id');
            $emp_id = $row['emp_id'];
              $whereres   = "msg_to='$js_id' and message_status = '0' and msg_from = '$emp_id'";
             $msges = $this->Master_model->getMaster('messaging', $where =  $whereres, $join = false, $order = 'desc', $field = 'message_id', $select = '*',$limit='1',$start=false, $search=false); ?>
         <?php $js_id = $this->session->userdata('job_seeker_id');
            // print_r($)
                                         
                   if ($row['type'] == 'js-js' && $row['created_by'] == $js_id) 
                   {
                                             // echo "string";
                       $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.emp_id|Left OUTER ');
                                            
                   }
                   elseif ($row['type'] == 'js-js' && $row['created_by'] != $js_id) 
                   {
                       $Join_data      = array('js_info' => 'js_info.job_seeker_id = emp_js_connection.js_id|Left OUTER ');
                   }
                   else
                   {
                     $Join_data      = array(
                       
                        'company_profile' => 'company_profile.company_profile_id = emp_js_connection.emp_id|Left OUTER ');   
                   }
                   $id=$row['emp_js_connection_id'];
                  $whereres   = "emp_js_connection_id='$id'";
                 $check = $this->Master_model->get_master_row('emp_js_connection', $select = FALSE, $whereres,$Join_data);?> 
         <p><?php if (!empty($check['full_name'])) 
            {
              echo $check['full_name']; 
              if ($msges[0]['total'] > 0 ) 
                { ?> 
         <div class="numberCircle"><?php echo sizeof($msges); ?></div>
         <?php } 
            }else
            {
             echo $check['company_name'];
             if ($msges[0]['total'] > 0 ) 
                { ?> 
         <div class="numberCircle"><?php echo sizeof($msges); ?></div>
         <?php }
            } ?>
         </p>
         <p><?php echo $msges[0]['msg'] ?></p>
         <time datetime="2009-11-13T20:00"><?php echo $msges[0]['created_date'] ?></time>
      </div>
   </div>
</div>
<?php } ?>
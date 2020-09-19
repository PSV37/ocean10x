<!-- <div class="box" >  -->
<?php $key = 1; if (!empty($shared)): foreach ($shared as $job_row1) : ?>
<!-- <div class="check"> -->
<!-- </div>  -->
<!-- <div class="card content"> -->
<!-- <div class="front"> -->
<!-- <tbody> -->
<p style="    font-weight: 700;"><?php echo $job_row1->datecreation; ?></p>
<br>
<?php $external_tracking_date = $this->job_posting_model->get_shared_tracker_date($job_id,$job_row1->datecreation);
  // echo $this->db->last_query();die;
  
   foreach ($external_tracking_date as $job_row) {
    # code...
  ?>
<tr>
  <input class="attrValue" type="hidden" name="" id="cv_id" value="<?php echo $job_row->cv_id; ?>">
  <td ><input class="email allowalphabates" id="name" type="text" name="email" value="<?php echo $job_row->name; ?>" ></td>
  <td ><input class="email" id="email" type="text" name="email" value="<?php echo $job_row->email; ?>" ></td>
  <td ><input class="allowphonenumber" id="mobile" type="text" name="mobile" value="<?php echo $job_row->mobile; ?>" maxlength='10' ></td>
  <td ><input class="allownumericwithoutdecimal" id="ctc" type="text" name="ctc" value="<?php echo $job_row->salary; ?>" maxlength='2' ></td>
  <td ><input class="allownumericwithdecimal" id="exp" type="text" name="exp" value="<?php echo $job_row->work_exp; ?>" maxlength='2'></td>
  <td ><input class="allownumericwithoutdecimal" id="notice" type="text" name="notice" value="<?php echo $job_row->notice_period; ?>" ></td>
  <td >
    <select name="edu" style="min-width: 200px; border: none;"  id="edu" class="form-control select2 email" data-style="btn-default" data-live-search="true"  >
      <option value=""> </option>
      <?php   foreach($education_level as $education){?>
      <option value="<?php echo $education['education_level_id']; ?>"<?php if($job_row->education==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
      <?php } ?>
      <option value="other">Other </option>
      <option value="other">None </option>
    </select>
  </td>
   <td ><input  type="text" name="org"  value="<?php echo $job_row->current_org; ?>" readonly maxlength='3' ></td>
  <!--  <input id="edu" type="text" name="edu" value="<?php echo $job_row->education_level_name; ?>" ></td> -->
  <td>
    <select name="status" style="min-width: 200px; border: none;" id="status" class="form-control select2" data-style="btn-default" data-live-search="true"  >
      <option value=""> </option>
      <?php   foreach($tracker_status as $status){?>
      <option value="<?php echo $status['status_id']; ?>"<?php if($job_row->tracking_status==$status['status_id']){ echo "selected"; }?>><?php echo $status['status_name']; ?></option>
      <?php } ?>
    </select>
  </td>
  <td ><input type="text" class="email allowalphabatesspace" id="action" name="comment" value="<?php echo $job_row->action_item; ?>" ></td>
  <td ><textarea class="email allowalphabates" id="comment" name="comment" value=""><?php echo $job_row->comments; ?></textarea></td>
  <td ><input type="text" class="email allowalphabates" id="reminder" name="comment" value="<?php echo $job_row->reminder; ?>" ></td>
  <input type="hidden" class="email" id="tracking_id_val" name="comment" value="<?php echo $job_row->id; ?>" >
  <!--  <td style="min-width: 150px;" id="share"> 
    <a href="#" onclick="get_value(<?php echo $job_row->id; ?>)"  > <i class="fas fa-share"></i></a>
    </td> -->
</tr>
<?php } ?>
<!-- </tbody> -->
<!-- </div> -->
<!-- </div> -->
<?php
  $key++;
    endforeach;  
  ?>     
<?php else : ?> 
<tr>
  <th colspan="13">There is no record for display</th>
</tr>
<?php endif; ?>
<!-- </div>
  xcccc-->
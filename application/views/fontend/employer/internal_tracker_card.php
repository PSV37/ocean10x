<!-- <div class="box" >  -->
<?php $key = 1; if (!empty($forwarded_job_tracking)): foreach ($forwarded_job_tracking as $job_row1) : ?>
<!-- <div class="check"> -->
<!-- </div>  -->
<!-- <div class="card content"> -->
<!-- <div class="front"> -->
<!-- <tbody> -->
<p style="    font-weight: 700;"><?php echo date("d-m-Y", strtotime($job_row1->datecreation));?></p>
<br>
<?php $forwarded_job_tracking_date = $this->job_posting_model->get_job_forwarded_candidate_by_date($job_id,$job_row1->datecreation);
  // echo $this->db->last_query();die;
  
   foreach ($forwarded_job_tracking_date as $job_row) { ?>
<tr>
  <input class="attrValue" type="hidden" name="" id="cv_id" value="<?php echo $job_row->cv_id; ?>">
  <td >
    <?php $today = date('Y-m-d');  if($job_row->updated_on == $today)
      { ?> <span class="required"> * </span>
    <?php } ?>
    <input class="email allowalphabatesspace"  id="name" type="text" name="email" value="<?php echo $job_row->js_name; ?>" >
  </td>
  <td ><input class="email " id="email" type="email" name="email1" value="<?php echo $job_row->js_email; ?>" required ></td>
  <td ><input class="email allowphonenumber" id="mobile" type="text" name="mobile" value="<?php echo $job_row->js_mobile; ?>" maxlength='10' ></td>
  <td ><input class="email allownumericwithoutdecimal" id="ctc" type="text" name="ctc" value="<?php echo $job_row->js_current_ctc; ?>" maxlength='2' ></td>
  <td ><input class="email allownumericwithdecimal" id="exp" type="text" name="exp" value="<?php echo $job_row->js_experience; ?>" maxlength='2'></td>
  <td ><input id="notice" class="allownumericwithoutdecimal" type="text" name="notice"  value="<?php echo $job_row->js_current_notice_period; ?>" maxlength='3' ></td>
  <td >
    <select name="edu" style="min-width: 200px; border: none;"  id="edu" class="form-control select2 email" data-style="btn-default" data-live-search="true"  >
      <option value=""> </option>
      <?php   foreach($education_level as $education){?>
      <option value="<?php echo $education['education_level_id']; ?>"<?php if($job_row->js_top_education==$education['education_level_id']){ echo "selected"; }?>><?php echo $education['education_level_name']; ?></option>
      <?php } ?>
      <option value="other">Other </option>
      <option value="other">None </option>
    </select>
  </td>
  <td ><input id="org" type="text" name="org"  value="<?php echo $job_row->current_org; ?>" readonly maxlength='3' ></td>
  <!--  <input id="edu" type="text" name="edu" value="<?php echo $job_row->education_level_name; ?>" ></td> -->
  
  <td ><input type="text" class="email allowalphabatesspace" id="action" name="comment" value="<?php echo $job_row->action_item; ?>" ></td>
  <td ><textarea class="email allowalphabates" id="comment" name="comment" value=""><?php echo $job_row->comments; ?></textarea></td>
  <td ><input type="text" class="email allowalphabates" id="reminder" name="comment" value="<?php echo $job_row->reminder; ?>" ></td>
  <td>
    <select name="stage" style="min-width: 200px; border: none;" id="stage" class="form-control select2" data-style="btn-default" data-live-search="true">
      <option value=""> </option>
      <?php   foreach($tracking_stages as $stage){?>
      <option value="<?php echo $stage['stage_id']; ?>"><?php echo $stage['stage']; ?></option>
      <?php } ?>
    </select>
  </td>
  <td>
    <select name="status" style="min-width: 200px; border: none;" id="status" class="form-control select2" data-style="btn-default" data-live-search="true"  >
      <option value=""> </option>
     
    </select>
  </td>
  <td style="min-width: 150px;"><input type="checkbox" id="update" class="chkbx" checked name=""></td>
  <input type="hidden" class="email allowalphabates" id="tracking_id_val" name="comment" value="<?php echo $job_row->id; ?>" >
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
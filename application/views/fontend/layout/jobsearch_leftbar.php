 <div class="col-md-3 col-sm-6 cateside">
    <div class="sidebar">
    <h2>Refine Search</h2>
    
    <div class="panel-group" id="accordion">
    	<div class="panel panel-default">              
        <div class="widget">
            <h4 class="widget-title"><a data-toggle="collapse" data-parent="#accordion" href="#catgories">Categories</a></h4>
            <div id="catgories" class="panel-collapse collapse in">
            <ul class="optionlist">                             
                
          <?php if (!empty($all_category)): foreach ($all_category as $v_category) : ?>                                       
            <li>                              
             <input <?php echo in_array($v_category->job_category_id,$selectedcategory)?'checked="checked"':''; ?> name="category_name[]" id="<?php echo "category=".$v_category->job_category_id ?>" value="<?php echo $v_category->job_category_id ?>" type="checkbox"  onchange="document.getElementById('allJobsearch').submit()">  
             <label class="checkbox-inline" for="<?php echo "category=".$v_category->job_category_id ?>"></label>
             <?php echo $v_category->job_category_name ?>
            </li>
                        
             <?php
                endforeach;
            ?>
            <?php else : ?> 
                <li>
                    <strong>There is no record for display</strong>
                </li>
            <?php
            endif; ?>
              
            </ul>
            </div>
            
        </div>
        </div>
		
        <div class="panel panel-default">  
        <div class="widget">
            <h4 class="widget-title"><a data-toggle="collapse" data-parent="#accordion" class="collapsed" href="#companies">Company</a></h4>
            <div id="companies" class="panel-collapse collapse">
            <ul class="optionlist">
              
                
                <?php if (!empty($company_list)): foreach ($company_list as $v_compnay) : ?>
                       
                            <li>
       <input <?php echo in_array($v_compnay->company_profile_id,$selectedcompany)?'checked="checked"':''; ?>  name="company_name[]" id="<?php echo "company=".$v_compnay->company_profile_id; ?>" value="<?php echo $v_compnay->company_profile_id ?>" type="checkbox" onchange="document.getElementById('allJobsearch').submit()"><label class="checkbox-inline" for="<?php echo "company=".$v_compnay->company_profile_id; ?>"></label> <?php echo $v_compnay->company_name; ?>                                             </li>
                       
                         <?php
                            endforeach;
                        ?>
                        <?php else : ?> 
                            <li>
                                <strong>There is no record for display</strong>
                            </li>
                        <?php
                        endif; ?>

            </ul>  
            </div>        
        </div>
        </div>
        
        <div class="panel panel-default">  
        <div class="widget">
            <h4 class="widget-title"><a data-toggle="collapse" data-parent="#accordion" class="collapsed" href="#jobType">Job Type</a></h4>
            <div id="jobType" class="panel-collapse collapse">
            <ul class="optionlist">
                
                <?php if (!empty($jobtype_list)): foreach ($jobtype_list as $v_jobtype) : ?>
                        <li>

<input <?php echo in_array($v_jobtype->job_nature_id,$selectednature)?'checked="checked"':''; ?> name="job_nature[]" id="<?php echo "nature=". $v_jobtype->job_nature_id; ?>" value="<?php echo $v_jobtype->job_nature_id; ?>" type="checkbox"><label class="checkbox-inline" for="<?php echo "nature=".$v_jobtype->job_nature_id; ?>"></label> <?php echo $v_jobtype->job_nature_name; ?> 
                            </li>
                        
                         <?php
                            endforeach;
                        ?>
                        <?php else : ?> 
                            <td colspan="3">
                                <strong>There is no record for display</strong>
                            </td>
                        <?php
                        endif; ?>

            </ul>          
            </div>
        </div>
        </div>
    <!-- panel-group -->

            
	</div>
	</div>
</div><!-- container -->
                
  <div class="col-md-3 col-sm-6 pull-right">
 
 <?php $ads_left = get_ads('leftside');
 
 if($ads_left): foreach($ads_left as $row_left):?>

  <div class="adbanner2"><a href="<?php echo $row_left->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$row_left->ad_image); ?>" alt=""></a></div>
  <?php endforeach; endif;?>
        
      </div>              
                
                
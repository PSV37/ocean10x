<?php 

  $company_profile_id = $this->session->userdata('company_profile_id');
 $jobseeker_id = $this->session->userdata('job_seeker_id');
        if ($company_profile_id != null) {
             $this->load->view('fontend/layout/employer_header.php');
            }
        elseif($jobseeker_id != null) {
             $this->load->view('fontend/layout/seeker_header.php');
        } else {
    $this->load->view('fontend/layout/header.php');
    }
?>


        <div class="job-search">
            <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 search-jobs-main-sec">
                    <div class="jobs-all clearfix">
                    <form id="submit" class="submit-form">
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Keyword</label>
                                <input type="text" class="form-control" placeholder="Keyword">
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12">
                            <label class="control-label">Distance</label>
                            <select class="selectpicker" data-style="btn-default" data-live-search="true">
                                 <?php echo $this->job_location_model->selected(); ?>
                            </select>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <div class="form-group form-select-section">
                                <button type="submit" class="btn btn-default job-src"> Search Job </button>
                            </div>
                        </div>                        
                </div>
            </div>
        </div>
    </div>
        
        <div class="container job-list-show">
            <div class="row">
                <div class="col-md-3 col-sm-3 demo">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Categories
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                 <?php if (!empty($all_category)): foreach ($all_category as $v_category) : ?>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <label for="<?php echo "category=".$v_category->job_category_id ?>">
                                                    <input <?php echo in_array($v_category->job_category_id,$selectedcategory)?'checked="checked"':''; ?> name="category_name[]" id="<?php echo "category=".$v_category->job_category_id ?>" value="<?php echo $v_category->job_category_id ?>" type="checkbox"> <?php echo $v_category->job_category_name ?> </label><span></span></a>
                                            </li>
                                        </ul>
                                         <?php
                                            endforeach;
                                        ?>
                                        <?php else : ?> 
                                            <td colspan="3">
                                                <strong>There is no record for display</strong>
                                            </td>
                                        <?php
                                        endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Locations
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                        <?php if (!empty($all_locaiton)): foreach ($all_locaiton as $v_location) : ?>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <label for="<?php echo "location=".$v_location->job_location_id; ?>">
                                                    <input <?php echo in_array($v_location->job_location_id,$selectedlocation)?'checked="checked"':''; ?> name="location_name[]" id="<?php "location=".$v_location->job_location_id; ?>" value="<?php echo $v_location->job_location_id ?>" type="checkbox"> <?php echo $v_location->job_location_name ?> </label><span></span></a>
                                            </li>
                                        </ul>
                                         <?php
                                            endforeach;
                                        ?>
                                        <?php else : ?> 
                                            <td colspan="3">
                                                <strong>There is no record for display</strong>
                                            </td>
                                        <?php
                                        endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Company
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                     <?php if (!empty($company_list)): foreach ($company_list as $v_compnay) : ?>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <label for="<?php echo "company=".$v_compnay->company_profile_id; ?>">
                                                    <input <?php echo in_array($v_compnay->company_profile_id,$selectedcompany)?'checked="checked"':''; ?>  name="company_name[]" id="<?php echo "company=".$v_compnay->company_profile_id; ?>" value="<?php echo $v_compnay->company_profile_id ?>" type="checkbox"> <?php echo $v_compnay->company_name; ?> </label><span></span></a>
                                            </li>
                                        </ul>
                                         <?php
                                            endforeach;
                                        ?>
                                        <?php else : ?> 
                                            <td colspan="3">
                                                <strong>There is no record for display</strong>
                                            </td>
                                        <?php
                                        endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingfour">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        Expected Salary
                                    </a>
                                </h4>
                            </div>
                            <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                <div class="panel-body">
                                      <?php if (!empty($jobtype_list)): foreach ($jobtype_list as $v_jobtype) : ?>
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <label for="<?php echo "nature=".$v_jobtype->job_nature_id; ?>">
                                                    <input <?php echo in_array($v_jobtype->job_nature_id,$selectednature)?'checked="checked"':''; ?> name="job_nature[]" id="<?php echo "nature=". $v_jobtype->job_nature_id; ?>" value="<?php echo $v_jobtype->job_nature_id; ?>" type="checkbox"> <?php echo $v_jobtype->job_nature_name; ?> </label><span></span></a>
                                            </li>
                                        </ul>
                                         <?php
                                            endforeach;
                                        ?>
                                        <?php else : ?> 
                                            <td colspan="3">
                                                <strong>There is no record for display</strong>
                                            </td>
                                        <?php
                                        endif; ?>
                                </div>
                            </div>
                        </div>

                    </div><!-- panel-group -->

                </div><!-- container -->

                <div class="col-md-6 col-sm-6 all-job-list">

                <?php if (!empty($alljobs)): foreach ($alljobs as $v_job) : ?>
                    <a href="<?php echo base_url(); ?>job/show/<?php echo $v_job->job_slugs;?>" class="main-area-job-list">
                        <div class="heading-logo">
                         <?php $logo=$this->company_profile_model->company_logoby_id($v_job->company_profile_id);?>
                            <h3><?php echo $v_job->job_title ?> <img src="<?php echo base_url() ?>upload/<?php if(!empty($logo)) {echo $logo;} else {echo "notfound.gif";} ?>" alt="" class="img-responsive pull-right"></h3>
                            <p class="name-company"><?php echo $v_job->job_position ?></p>
                            <p class="experience-location">
                                <span class="pull-left"><i class="fa fa-flask" aria-hidden="true"></i> <?php echo $v_job->preferred_age ?> Age</span>
                                <span class="location"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php $joblocation=$this->job_location_model->get($v_job->job_location); echo $joblocation->job_location_name;  ?></span></p>
                        </div>
                        <div class="job-sor-description">
                            <p><span>Job Description:</span> Job Responsibilities: IT technical support officers are mainly responsible for the</p>
                        </div>
                        <div class="salary">
                            <p class="pull-left"><i class="fa fa-eur" aria-hidden="true"></i>  <?php $salary=$this->job_salary_range_model->get($v_job->salary_range); echo $salary->salary_range_name;  ?></p>
                            <p class="pull-right"> Posted  by <span><?php echo $this->company_profile_model->company_name($v_job->company_profile_id); ?></span> <?php echo date('d-m-Y',strtotime($v_job->created_at)); ?></p>
                        </div>
                    </a>

                   <?php  endforeach;   ?>
                    <?php else : ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no record for display</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>

                    <?php //echo $links; ?></p>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                        <?php if($offset>0): ?>
                            <li>
                                <a href="<?php echo base_url('job/page/'.($offset-1)); ?>" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                            </li>
                        <?php endif; ?>
                        <?php 
                        $maxpage=ceil($totalrow/$limit);
                        for($i=0; $i<$maxpage; $i++): ?>
                            <li><a class="<?php echo $offset==$i?'active':''; ?>" href="<?php echo base_url('job/page/'.($i*$limit)); ?>"><?php echo $i+1; ?></a></li>
                        <?php endfor; ?>
                        <?php if($offset<$maxpage-1): ?>
                            <li>
                                <a href="<?php echo base_url('job/page/'.($offset+1)); ?>" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                            </li>
                        <?php endif; ?>
                            <?php ?>
                        </ul>
                    </nav>
                </div>
                    </form>
                <div class="col-md-3 col-sm-3 job-list-page-add">
                    <a href="#"><img src="<?php echo base_url() ?>fontend/images/venus.jpg"></a>
                    <a href="#"><img src="<?php echo base_url() ?>fontend/images/venus.jpg"></a>
                </div>
            </div>
        </div>
 <?php $this->load->view("fontend/layout/footer.php"); ?>
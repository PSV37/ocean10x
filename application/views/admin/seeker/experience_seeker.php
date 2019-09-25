<?php $this->load->view('admin/components/header'); ?>
<body class="skin-blue" data-baseurl="<?php echo base_url(); ?>">
<div class="wrapper">
<?php $this->load->view('admin/components/user_profile'); ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar"> 
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar"> 
    <!-- Sidebar user panel -->
    <?php $this->load->view('admin/components/navigation'); ?>
  </section>
  <!-- /.sidebar --> 
</aside>
<div class="right-side"> 
  <!-- Content Header (Page header) -->
  <section class="content-header"> </section>
  <br/>
  <div class="container-fluid">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header box-header-background with-border">
              <h3 class="box-title ">Experience Seeker List</h3>
            </div>
            <div class="box-body"> 
            	<div class="table-striped" id="dataTables-example">
            
              <ul class="viewseekers">
              <?php $i=1;if (!empty($experience_cvlist)): foreach ($experience_cvlist as $v_seeker) : ?>
              <li>
                <div class="row">
                  <div class="col-md-2"> 
                  	<?php if (!empty($v_seeker->photo_path)):  ?>
                      <img src="<?php echo base_url(); ?>upload/<?php echo $v_seeker->photo_path; ?>" />
                      <?php else:?>
                      <img src="<?php echo base_url() ?>upload/notfound.gif" alt="company Image">
                      <?php endif; ?>
                   </div>
                  <div class="col-md-3">
                    <h3><?php echo $v_seeker->full_name; ?></h3>
                    <div class="uniname"><?= $this->Job_seeker_education_model->education_list_by_id($v_seeker->job_seeker_id)[0]->js_institute_name;?></div>  <div class="uniname"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $v_seeker->mobile; ?></div>
                    <div class="uniname"><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $v_seeker->email; ?> </div>
                  </div>
                  <div class="col-md-3">
                  <?php $exp=($this->Job_seeker_experience_model->experience_list_by_id($v_seeker->job_seeker_id));

?>

                    	<div class="exp">
                        	<?=(!empty($exp[0]->company_name)?'<strong>'.$exp[0]->company_name.'</strong>':'');?></strong>
                            <?=(!empty($exp[0]->company_name)?''.$exp[0]->designation.'('.$exp[0]->duration.')':'');?></strong>
                            
                        </div>
                        <div class="exp">
                        	<?=(!empty($exp[1]->company_name)?'<strong>'.$exp[1]->company_name.'</strong>':'');?></strong>
                            <?=(!empty($exp[1]->company_name)?''.$exp[1]->designation.'('.$exp[1]->duration.')':'');?></strong>
                               </div> </div>
                  <div class="col-md-2">
<?php $career = ($this->Job_career_model->js_careerinfo_by_seeker($v_seeker->job_seeker_id));
?>
                    <div class="moreinfo"><i class="fa fa-briefcase" aria-hidden="true"></i> <?=(!empty($career[0]->js_career_exp)?$career[0]->js_career_exp:'');?> Years</div>
                    <div class="moreinfo"><i>$</i>  <?php echo $this->job_apply_model->expedited_salary_admin($v_seeker->job_seeker_id)[0]->expected_salary; ?> 
</div>
                    <div class="sorted"> <span class="label label-success"> <i class="fa fa-check" aria-hidden="true"></i> Final </span> </div>
                    <a href="<?php echo base_url() ?>admin/seeker/downloadcv/<?php echo $v_seeker->job_seeker_id; ?>" class="downcv" title="Download CV"> <i class="fa fa-download" aria-hidden="true"></i> Download </a> </div>
                  <div class="col-md-2">
                    <div class="action"> <?php echo btn_delete('admin/seeker/delete_seeker/' . $v_seeker->job_seeker_id); ?> </div>
                    
                    <?php
					  if($v_seeker->js_status == 0)
					{ ?>
                      <span class="label label-warning"><?php echo 'Inactive' ?></span>
                      <?php } else { ?>
                      <span class="label label-primary"><?php echo 'Active' ?></span>
                      <?php } ?>
                    
                    </div>
                </div>
              </li>
              <?php  endforeach; ?>
  				
                <?php else : ?>                
                  <li><strong>There is no data to display</strong></li>
                  <?php endif; ?>
                
			</ul>
            
            </div>
              <!-- Table -->
              <?php /*?><table class="table table-bordered table-striped" id="dataTables-example">
                <thead >
                  <!-- Table head -->
                  <tr>
                    <th class="active">SL.</th>
                    <th class="active">Image</th>
                    <th class="active">Full Name</th>
                    <th class="active">Experience</th>
                    <th class="active">Email</th>
                    <th class="active">Phone</th>
                    <th class="active">Status</th>
                    <th class="active">Download CV</th>
                    <th class="active">Action</th>
                  </tr>
                </thead>
                <!-- / Table head -->
                <tbody>
                  <!-- / Table body -->
                  
                  <?php $i=1;if (!empty($experience_cvlist)): foreach ($experience_cvlist as $v_seeker) : ?>
                  <tr class="custom-tr">
                    <td class="vertical-td"><?php echo $i++; ?></td>
                    <td class="product-img"><?php if (!empty($v_seeker->photo_path)):  ?>
                      <img src="<?php echo base_url(); ?>upload/<?php echo $v_seeker->photo_path; ?>" />
                      <?php else:?>
                      <img src="<?php echo base_url() ?>upload/notfound.gif" alt="company Image">
                      <?php endif; ?></td>
                    <td class="vertical-td highlight"><a href="#"> <?php echo $v_seeker->full_name; ?></a></td>
                    <td class="vertical-td">2 years</td>
                    <td class="vertical-td"><?php echo $v_seeker->email; ?></td>
                    <td class="vertical-td"><?php echo $v_seeker->mobile; ?></td>
                    <td class="vertical-td"><?php
                                          if($v_seeker->js_status == 0)
                                        { ?>
                      <span class="label label-warning"><?php echo 'Inactive' ?></span>
                      <?php } else { ?>
                      <span class="label label-primary"><?php echo 'Active' ?></span>
                      <?php } ?></td>
                    <td class="vertical-td"><a href="<?php echo base_url() ?>admin/seeker/downloadcv/<?php echo $v_seeker->job_seeker_id; ?>"><span class="label label-primary">Download CV </span></a></td>
                    <td class="vertical-td"><?php echo btn_delete('admin/seeker/delete_seeker/' . $v_seeker->job_seeker_id); ?></td>
                  </tr>
                  <?php

                            endforeach;
                            ?>
                  <!--get all sub category if not this empty-->
                  <?php else : ?>
                  <!--get error message if this empty-->
                
                  <td colspan="8"><strong>There is no data to display</strong></td>
                  <!--/ get error message if this empty-->
                  <?php endif; ?>
                    </tbody>
                  <!-- / Table body -->
              </table><?php */?>
              <!-- / Table --> 
              
            </div>
            <!-- /.box-body --> 
          </div>
          <!-- /.box --> 
        </div>
        <!--/.col end --> 
      </div>
      <!-- /.row --> 
    </section>
    
    <!-- Modal --> 
    
  </div>
  <br />
</div>
<!-- /.right-side -->

<?php ///$this->load->view('admin/_layout_modal'); ?>
<?php //$this->load->view('admin/_layout_modal_small'); ?>
<?php $this->load->view('admin/components/footer'); ?>

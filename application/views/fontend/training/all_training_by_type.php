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

<!-- Page Title start -->
<div class="pageTitle">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <h1 class="page-heading">All Training</h1>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="breadCrumb"><a href="#.">Home</a> / <span>About Us</span></div>
      </div>
    </div>
  </div>
</div>
<!-- Page Title End --> 

<div class="innerpageconeten">
        <div class="container">
            <div class="row">                         
                    
                  <div class="col-md-3 col-sm-3 demo">
                  	<nav class="side-menu hidden-sm hidden-xs">
  <ul>
  <li class="title">Search Training</li>
    <li><a href="<?php echo base_url(); ?>training-type/workshop"><span class="glyphicon glyphicon-star"></span> Workshop</a></li>
    <li><a href="<?php echo base_url(); ?>training-type/customized-course"><span class="glyphicon glyphicon-star"></span> Customized Course </a></li>
    <li><a href="<?php echo base_url(); ?>training-type/international"><span class="glyphicon glyphicon-star"></span> International</a></li>
  </ul>
</nav>
                    
    <br><br>              
                  
                  <?php $ads_left = get_ads('leftside');
 
 if($ads_left): foreach($ads_left as $row_left):?>

  <div class="adbanner2"><a href="<?php echo $row_left->ad_link;?>" target="_blank"><img src="<?php echo base_url('upload/ads/'.$row_left->ad_image); ?>" alt=""></a></div>
  <?php endforeach; endif;?>
                       
                </div><!-- container -->
                
                <div class="col-sm-9 col-md-9 col-lg-9 jobsectionsbottom">
                    <div class="clear"></div>
<ul class="searchList">            
                    <?php if (!empty($traininglist)): foreach ($traininglist as $v_training) : ?>
                <li class="trainingbox">
                    	<div class="row">
                          <div class="col-md-2 col-sm-3">
                          	 <img src="<?php echo base_url(); ?>upload/training/<?php echo $v_training->training_logo; ?>">
                             </div>
                              <div class="col-md-10 col-sm-9">                             
                             <div class="jobinfo">
                              <h3><a href="<?php echo base_url().'training/show/'.$v_training->training_slug; ?>"><?php echo $v_training->training_title.'('.$v_training->training_fee.')'; ?> </a></h3>
                              <div class="inftxt"><strong>Date :</strong> <?php echo date('j F Y',strtotime($v_training->start_date)); ?>  &nbsp; &nbsp; &nbsp; -  &nbsp; &nbsp; &nbsp;  <strong>Facilitator:</strong> <?php echo $v_training->trainar_name; ?></div>
                              <div class="inftxt"><strong>Training Type :</strong> <?php if($v_training->training_type=='1')
                                    { echo "Workshop";}
                                    else if($v_training->training_type=="2"){
                                        echo "Customized Course";
                                    } else {
                                        echo "International";
                                    }
                             ?></div>
                            </div>                            
                          </div>
                          
                          </div>
                        
                       
                    </li>
                <?php endforeach; ?>
                    <?php else : ?> <!--get error message if this empty-->
                        <li>
                            <strong>There is no record for display</strong>
                        </li><!--/ get error message if this empty-->
                    <?php   endif; ?>
</ul>

                <?php if($totalrow>=10): ?>
                  <nav aria-label="Page navigation">
                        <ul class="pagination">
                        <?php     
                         if($training_type=="1"){
                              $training_type="workshop";
                            } else if($training_type=="2") {
                              $training_type="customized-course";
                            } else if($training_type=="3") {
                              $training_type="international";
                            }
           if($offset>0): ?>
                            <li>
                                <a href="<?php echo base_url('training-type/'.$training_type.'/'.($offset-1)); ?>" aria-label="Previous"> <span aria-hidden="true">«</span> </a>
                            </li>
                        <?php endif; ?>

                        <?php 
                        $maxpage=ceil($totalrow/$limit); 
                        for($i=0; $i<$maxpage; $i++): ?>
                            <li><a class="<?php echo $offset==$i?'active':''; ?>" href="<?php echo base_url('training-type/'.$training_type.'/'.$i); ?>"><?php echo $i+1; ?></a></li>
                        <?php endfor; ?>
                        <?php if($offset<$maxpage-1): ?>
                            <li>
                                <a href="<?php echo base_url('training-type/'.$training_type.'/'.($offset+1)); ?>" aria-label="Next"> <span aria-hidden="true">»</span> </a>
                            </li>
                        <?php endif; ?>
                            <?php ?>
                        </ul>
                    </nav>
                <?php endif; ?>

                </div>

			 <!-- container -->

            </div>
        </div>
</div>
        
 <?php $this->load->view("fontend/layout/footer.php"); ?>
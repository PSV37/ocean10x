<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/post_new_job.css">

<?php 
$company_profile_id = $this->session->userdata('company_profile_id');

 $this->load->view('fontend/layout/employer_new_header.php');
 
?>
<style>


</style>

<div class="container-fluid main-d">
    <div class="container">
        <div class="col-md-12">
            <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            <div class="col-md-9">
            
                <div class="card">
                    <div class="front">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Rivian_company_logo.jpg" style="height:40px; width:40px;border-radius:5px;float:left" />
                            <div class="job-info">
                                <p class="job_title">Seniour Software Engineer</p>
                            </div>   
                            <div class="icon-info">
                                <li class="left-icon-title"><i class="fas fa-map-marker-alt"></i></li><li class="right-icon-title"> &emsp;Mumbai ,pune</li>

                                <li class="left-icon-title"><i class="fas fa-briefcase"></i></li><li class="right-title" style="width:100%;font-size:14px;"> &emsp;2 years(Expected Experience)</li>

                                <div class="clear"></div>
                            </div>
                            <div class="following-info">
                                <li class="left-title">Education Level</li><li class="right-title">&nbsp;:Masters</li>
                                   
                                <li class="left-title">Job Roll</li><li class="right-title">&nbsp;: Java Developer</li> 
                                <div class="clear"></div>
                            </div>
                                   
                            <div class="following-info2">
                                <li class="left-title">Engagement Type</li><li class="right-title">&nbsp;:Full Time</li>
                                <li class="left-title">Number Of Position</li><li class="right-title">&nbsp;:4</li>

                                <div class="clear"></div>
                             </div>
                            <div class="following-info3">
                                    <li class="left-title">JD attached&nbsp;<i class="fas fa-link"></i></li><li class="right-title">&nbsp;: yes</li>
                                	 <li class="left-title">CTC</li><li class="right-title">&nbsp;: 500,0000-10,00,000</li>
                                      
                                <div class="clear"></div>
                             </div>
                                   
                            <div class="skils_benifit">
                              <li class="left-title_seperate">skills</li><li class="right-title_seperate">&nbsp;:
                              
                                <label>
                                    <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                                    <span>Java1</span>
                                </label>
                                 <label>
                                    <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                                    <span>Java1</span>
                                </label>
                                <label>
                                    <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                                    <span>Java1</span>
                                </label>
                              </li>
                            </div> 
                                
                              
                              
                              <div class="skils_benifit">
                              <li class="left-title_seperate">Benefit</li><li class="right-title_seperate">&nbsp;:
                              
                              <label>
                                <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                                <span>Insurance</span>
                            </label>
                             <label>
                                <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                                <span>Insurance</span>
                            </label>
                             <label>
                                <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                                <span>Insurance</span>
                            </label>
                            
                            
                            </li>
                              
                              
                              </div>     
                             
                             <hr>
                             <div class="job_dis">
                             		 <li class="left-title_detail" >Detailed Job Description :</li><li class="right-title_detail">&emsp;</li>
                             
                             
                             </div>
                            	
                               <div class="preview_btns">
                               <button type="button" class="back_btn">Back</button>
                               <button type="button" class="edit_btn">Edit</button>
                               <button type="button" class="Postjob_btn">Post Job</button>
                               </div>
                            
                            
                            </div>
                          
                            
                        </div>
            
            
            
            
            
            </div>
        </div>
    </div>
</div>

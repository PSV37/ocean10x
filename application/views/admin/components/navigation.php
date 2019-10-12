      <!-- Sidebar user panel -->
      <aside class="main-sidebar">
         <!-- sidebar: style can be found in sidebar.less -->
         <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">              
              <h3><i class="fa fa-user" aria-hidden="true"></i> User:  <strong><?php echo $user_id=$this->session->userdata('name');?></strong></h3>
            </div>
            <ul class='sidebar-menu'>
               <li >
                  <a href='<?php echo base_url(); ?>admin/dashboard'> <i class='fa fa-dashboard'></i><span>Dashboard</span></a>
               </li>
               <li <?php echo $this->company_profile_model->User_status_check(); ?>><a href='<?php echo base_url(); ?>admin/settings'><i class="fa fa-cog" aria-hidden="true"></i> <span>Site Settings</span></a></li>
               <li <?php echo $this->company_profile_model->User_status_check(); ?>><a href='<?php echo base_url(); ?>admin/social_media'><i class="fa fa-share-alt" aria-hidden="true"></i> <span>Social Media</span></a></li>
               <li <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>admin/manage_content'><i class="fa fa-file-text" aria-hidden="true"></i> <span>Manage Content Pages</span></a>
               </li>
                 <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                  <a href='<?php echo base_url(); ?>admin/jobs'> <i class='fa fa-dashboard'></i><span>All Jobs</span></a>
               </li>
                 <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                  <a href='<?php echo base_url(); ?>admin/jobs/pending-jobs'> <i class='fa fa-dashboard'></i><span>Pending Jobs</span></a>
               </li>
                <li>
                  <a href='<?php echo base_url(); ?>admin/jobs/submit-jobs'> <i class='fa fa-arrow-circle-o-right'></i><span>Post a New Jobs</span></a>
               </li>

               <li class='treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-th-large'></i><span>Manage Training</span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/training/save-training'> <i class='glyphicon glyphicon-plus'></i><span>Post Training</span></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/all-training'> <i class='glyphicon glyphicon-plus'></i><span>All Trainings</span></a>
                     </li>
                  <li>
                        <a href='<?php echo base_url(); ?>admin/enrolled-users'> <i class='glyphicon glyphicon-plus'></i><span>Enrolled</span></a>
                     </li>
                  </ul>
               </li>
               <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>/#'> <i class='fa fa-truck'></i><span>Manage Job </span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                        <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-gift'></i><span>Active Jobs</span> <i class='fa fa-angle-left pull-right'></i> </a>
                        <ul class='treeview-menu' <?php echo $this->company_profile_model->User_status_check(); ?>>

                            <li>
                              <a href='<?php echo base_url(); ?>admin/jobs/active-selected-job'> <i class='glyphicon glyphicon-plus'></i><span>Selected Job</span></a>
                           </li>
                           <li>
                              <a href='<?php echo base_url(); ?>admin/jobs/active-bank-books'> <i class='glyphicon glyphicon-plus'></i><span>Banks Jobs</span></a>
                           </li>

                            <li>
                              <a href='<?php echo base_url(); ?>admin/jobs/active-univeristy'> <i class='glyphicon glyphicon-plus'></i><span>Univeristy</span></a>
                           </li>

                           <li>
                              <a href='<?php echo base_url(); ?>admin/jobs/active-non-selected-job'> <i class='glyphicon glyphicon-briefcase'></i><span>Non Selected Job</span></a>
                           </li>
                        </ul>
                     </li>
                     <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                        <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-credit-card'></i><span>Deactive Jobs</span> <i class='fa fa-angle-left pull-right'></i> </a>
                        <ul class='treeview-menu'>
                           <li>
                              <a href='<?php echo base_url(); ?>admin/jobs/deactive-selected-job'> <i class='glyphicon glyphicon-shopping-cart'></i><span>Selected Jobs</span></a>
                           </li>
                           <li>
                              <a href='<?php echo base_url(); ?>admin/jobs/deactive-non-selected-job'> <i class='glyphicon glyphicon-th-list'></i><span>Non Selected Job</span></a>
                           </li>
                        </ul>
                     </li>
                  </ul>
               </li>

                <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-th-large'></i><span>Companies</span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/company/create-company'> <i class='glyphicon glyphicon-plus'></i><span>Create Company</span></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/company'> <i class='glyphicon glyphicon-plus'></i><span>All Company</span></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/company/active-company'> <i class='glyphicon glyphicon-plus'></i><span>Active Company</span></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/company/deactive-company'> <i class='glyphicon glyphicon-plus'></i><span>Deactive Company</span></a>
                     </li>
                  </ul>
               </li>

                <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?> >
                  <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-th-large'></i><span>Manage Job Seekers</span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/seeker'> <i class='glyphicon glyphicon-plus'></i><span>Seekers' List</span></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/seeker/active-seeker'> <i class='glyphicon glyphicon-plus'></i><span>Active Seeker</span></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/seeker/deactive-seeker'> <i class='glyphicon glyphicon-plus'></i><span>Deactive Seeker</span></a>
                     </li>
                  </ul>
               </li>



                <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-th-large'></i><span>View CV's</span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li>
                        <a href='<?php echo base_url(); ?>admin/seeker/experience'> <i class='glyphicon glyphicon-plus'></i><span>Experienced CV's</span></a>
                     </li>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?>>
                        <a href='<?php echo base_url(); ?>admin/seeker/internship'> <i class='glyphicon glyphicon-plus'></i><span>Interns CV's</span></a>
                     </li>
                  </ul>
               </li>
              <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                  <a href='<?php echo base_url(); ?>admin/public-demand'> <i class='fa fa-users'></i><span>Public Demand</span></a>
               </li>

                <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                  <a href='<?php echo base_url(); ?>admin/create-users'> <i class='fa fa-users'></i><span>Create Admin User</span></a>
               </li>
                <li <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>admin/ads'> <i class='fa fa-users'></i><span>Manage Ads</span></a>
               </li>

                 <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-cog'></i><span>Job Settings</span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/industry-master'> <i class='glyphicon glyphicon-plus'></i><span>Industry Master</span></a>
                     </li>
                   <!--    <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/job-category'> <i class='glyphicon glyphicon-plus'></i><span>Job Category</span></a>
                     </li> -->
                  <!--    <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/job-location'> <i class='glyphicon glyphicon-plus'></i><span>Job Location</span></a>
                     </li> -->
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/job-level'> <i class='glyphicon glyphicon-plus'></i><span>Job Level</span></a>
                     </li>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?>>
                        <a href='<?php echo base_url(); ?>admin/job-nature'> <i class='glyphicon glyphicon-plus'></i><span>Job Nature</span></a>
                     </li>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/salary-range'> <i class='glyphicon glyphicon-plus'></i><span>Job Salary Range</span></a>
                     </li>

                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/skill-master'> <i class='glyphicon glyphicon-plus'></i><span>Skills Master</span></a>
                     </li>

                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/job-role'> <i class='glyphicon glyphicon-plus'></i><span>Job Role</span></a>
                     </li>


                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/education-level'> <i class='glyphicon glyphicon-plus'></i><span>Education Level</span></a>
                     </li>
                      <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/education-specialization'> <i class='glyphicon glyphicon-plus'></i><span>Education Specialization</span></a>
                     </li>

                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/country-master'> <i class='glyphicon glyphicon-plus'></i><span>Country Master</span></a>
                     </li>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/state-master'> <i class='glyphicon glyphicon-plus'></i><span>State Master</span></a>
                     </li>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/city-master'> <i class='glyphicon glyphicon-plus'></i><span>City Master</span></a>
                     </li>

                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/department-master'> <i class='glyphicon glyphicon-plus'></i><span>Department Master</span></a>
                     </li>

                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/designation-master'> <i class='glyphicon glyphicon-plus'></i><span>Designtion Master</span></a>
                     </li>

                    <!--  <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/industry-master'> <i class='glyphicon glyphicon-plus'></i><span>Industry Master</span></a>
                     </li> -->
                      
                  </ul>
               </li>
			   
			   
			   
			   <li class=' treeview' <?php echo $this->company_profile_model->User_status_check(); ?>>
                  <a href='<?php echo base_url(); ?>/#'> <i class='glyphicon glyphicon-book'></i><span>Question Bank</span> <i class='fa fa-angle-left pull-right'></i> </a>
                  <ul class='treeview-menu'>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/topic/$1'> <i class='glyphicon glyphicon-plus'></i><span>Topic</span></a>
                     </li>
                   
                     <li <?php echo $this->company_profile_model->User_status_check(); ?> >
                        <a href='<?php echo base_url(); ?>admin/subtopic'> <i class='glyphicon glyphicon-plus'></i><span>Subtopic</span></a>
                     </li>
                     <li <?php echo $this->company_profile_model->User_status_check(); ?>>
                        <a href='<?php echo base_url(); ?>admin/questionbank'> <i class='glyphicon glyphicon-plus'></i><span>Question Bank</span></a>
                     </li>
                      
                  </ul>
               </li>

               
            </ul>
         </section>
      </aside>

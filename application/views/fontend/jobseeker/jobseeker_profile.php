
<?php 
    $this->load->view('fontend/layout/new_seeker_header.php');

?>
<!---header end--->      
<div class="container-fluid">
  <div class="container">
    <div class="col-md-12">
      <?php $this->load->view('fontend/layout/seeker_left_menu.php'); ?>
      <?php  $job_seeker=$this->session->userdata('job_seeker_id'); ?>
        <div class="col-md-9 profile-section" style="border-radius:13px;margin-top:83px;">
          <div class="profile-tabs">      
            <ul class="nav nav-tabs profile-nav ">
              <li class="active"><a data-toggle="tab" href="#home">My Profile</a></li>
              <li><a data-toggle="tab" href="#menu1">Education</a></li>
              <li><a data-toggle="tab" href="#menu2">Skills</a></li>
              <li><a data-toggle="tab" href="#menu3">Work Experience</a></li>
              <li><a data-toggle="tab" href="#menu4">Certs & Trainning</a></li>
            </ul>
          </div>
            
          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
       

		<div class="header-p-img" style="position:relative;">
        
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS-7Q995g-7kjzS1RbQh7zaxf4eBCciNVp8ebwgueosDLSMFkC0&usqp=CAU" style="width:100%; height:140px;position:relative;margin-bottom:140px;"></img>


            
            
                <div class="text-center" style="position:absolute;top:50px;left:-50px;">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div>
                
                 
                 
                 
                <div class="row">
                    <div class="col-md-6">
                    <ul class="jobinfolist">
                      <li>
                        <h4>First Name | Last name</h4>
                        <strong>: Supriya</strong></li>
                      <li>
                        <h4>Date of birth</h4>
                        <strong>: IT &amp; Telecommunication</strong></li>
                      <li>
                        <h4>Primary phone no</h4>
                        <strong>: Medium</strong></li>
                      <li>
                        <h4>Alternate phone no</h4>
                        <strong>: Medium</strong></li>
                      <li>
                        <h4>Present Address</h4>
                        <strong>: Medium</strong></li>
                     <li>
                        <h4>City</h4>
                        <strong>: Medium</strong></li>
                        <li>
                        <h4>Address</h4>
                        <strong>: Medium</strong></li>
                                                                                           
                                                        
                        
                      
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul class="jobinfolist">
                      <li>
                        <h4>State</h4>
                        <strong>: Supriya</strong></li>
                      <li>
                        <h4>Country</h4>
                        <strong>: IT &amp; Telecommunication</strong></li>
                      <li>
                        <h4>Marital Status</h4>
                        <strong>: Medium</strong></li>
                      <li>
                        <h4>Work premit for USA</h4>
                        <strong>: Medium</strong></li>
                      <li>
                        <h4>Work premit for Other Country</h4>
                        <strong>: Medium</strong></li>
                     <li>
                        <h4>Website</h4>
                        <strong>: Medium</strong></li>
                        <li>
                        <h4>My Tagline</h4>
                        <strong>: Medium</strong></li>
                                                                                           
                                                        
                        
                      
                    </ul>
                  </div>
                </div>
            
            
            <div class="col-md-12">
             <div class="uplode-resume">
                                <label for="avatarInput">Upload Resume<span class="required">*</span></label>
                                <input type="file" class="form-control" id="txt_resume" name="txt_resume" required>

                 </div>
                
            
        	<div class="Profile-summery">
            <h4>Profile summery</h4>
            	<textarea name="profile_summary" id="profile_summary" class="form-control" placeholder="Profile Summary" rows="5"></textarea>
                <p>Add or link to external documents, photos, sites, videos, and presentations.

</p>
            </div>
            </div>
        	<div class="col-md-12 resume-link">
            	<div class="col-md-6">
                                <label for="avatarInput">Upload Media</label>
                                <input type="file" class="form-control" id="txt_media" name="txt_media">
                                <input type="hidden" class="form-control" id="" name="oldmedia" value="">
                                <p style="font-size:12px;margin-top:10px;">Supported Formats: doc, docx, rtf, pdf, gif, jpg, png, ppt, pps, pptx, ppsx, pot, potx, upto 100 MB</p><br>
                              </div>
                <div class="col-md-6">
                <label for="avatarInput">Media Link</label>
                <input type="text" class="form-control" id="txt_link" name="txt_link" value="">
                </div>
                <button class="save-apply-btn">save</button>
            </div>
        </div>  
    </div>
    
    <div id="menu1" class="tab-pane fade">
    
    	<div class="education_header" style="position:relative;">
        	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQofjuD4yOHnpJHZSgGYZucvlOH6nukw95LkKub_HxNl3N6cpTL&usqp=CAU" style="width:100%;position:relative;"></img>
            <div class="icon-education" style="position:absolute;bottom:23px;right:53%;">
            <i class="fas fa-graduation-cap edu-i"></i>
            </div>
        </div>
    
    
    
    
    
      <ul style="margin-top:50px;">
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal">Ph.d / Doctorate</a>
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ph.d / Doctorate</h4>
        </div>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_education" method="post">
         <input type="hidden" name="js_education_id" value="">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="1">Ph.D / Doctorate</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
            <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select name="specialization_id" id="specialization_id" class="form-control" required="">
            <option value="">Select One</option>
                           <option value="6">Computer SC.</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University / Name of Institution<span class="required">*</span></label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</b></label>
                      <input type="radio" name="education_type_id" required id="education_type_id" value="1" style="margin: 0 1px;"> <b>Part Time </b><input type="radio" name="education_type_id" required id="education_type_id" value="2" style="margin: 0 1px;"> <b>Full Time                      </b><input type="radio" name="education_type_id" required id="education_type_id" value="3" style="margin: 0 1px;"> <b>Correspondence/Distance learning </b>                  

        </div>
        <div class="col-sm-1"></div>
      </div>
        
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
        

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
    	                    	<span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal">Edit</a></span>	

      </li>
      
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal1">Masters / Post-Graduation</a>
      <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Masters / Post-Graduation</h4>
        </div>
        <div class="modal-body education_frm">
  <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_education" method="post">
         <input type="hidden" name="js_education_id" value="">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="2">Masters/Post-Graduation</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
            <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select name="specialization_id" id="specialization_id" class="form-control" required="">
            <option value="">Select One</option>
                           <option value="4">IT</option>
                          <option value="5">Physics</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University / Name of Institution<span class="required">*</span></label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</span></label>
                      <input type="radio" name="education_type_id" required id="education_type_id" value="1" style="margin: 0 1px;"> Part Time                      <input type="radio" name="education_type_id" required id="education_type_id" value="2" style="margin: 0 1px;"> Full Time                      <input type="radio" name="education_type_id" required id="education_type_id" value="3" style="margin: 0 1px;"> Correspondence/Distance learning                   

        </div>
        <div class="col-sm-1"></div>
      </div>
        
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 
     <!--  <div class="form-group">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <label class="control-label" for="email">Grading System</label>
          <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
            <option value="">Select Grading System</option>
            <option value="Scale 10 Grading System">Scale 10 Grading System</option>
            <option value="Scale 4 Grading System">Scale 4 Grading System</option>
            <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
            <option value="Course Requires a Pass">Course Requires a Pass</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div> -->
    
      <!-- <div class="form-group" id="comp_name" style="display:none;"> -->
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
        

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
  </div>
        
      </div>
    </div>
  </div>
  	                    	<span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal1">Edit</a></span>	

      </li>
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal2">Graduation / Diploma</a>
      <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Graduation / Diploma</h4>
        </div>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_education" method="post">
         <input type="hidden" name="js_education_id" value="">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="3">Graduation/Diploma</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
            <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Specialization<span class="required">*</span></label>
          <select name="specialization_id" id="specialization_id" class="form-control" required="">
            <option value="">Select One</option>
                           <option value="1">BE&emsp;/&emsp;B.Tech (Comp. Engg.)</option>
                          <option value="2">Diploma (Comp. Engg)</option>
                          <option value="3">Diploma(Civil Engg)</option>
                          <option value="7">BE&emsp;/&emsp;B.Tech(Electrical Engineering)</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">University&emsp;/&emsp;Name of Institution<span class="required">*</span></label>
          <input type="text" name="js_institute_name" class="form-control" id="js_institute_name" placeholder="Enter Institute Name" required value="">
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Course Type<span class="required">*</span></label>
                      <input type="radio" name="education_type_id" required id="education_type_id" value="1" style="margin: 0 1px;"><b> Part Time   </b>                   <input type="radio" name="education_type_id" required id="education_type_id" value="2" style="margin: 0 1px;"><b> Full Time    </b>                  <input type="radio" name="education_type_id" required id="education_type_id" value="3" style="margin: 0 1px;"> <b>Correspondence/Distance learning   </b>                

        </div>
        <div class="col-sm-1"></div>
      </div>
        
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 
     <!--  <div class="form-group">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
        <label class="control-label" for="email">Grading System</label>
          <select  name="gradding"  class="form-control" id="category" onchange='hideshowfun()'>
            <option value="">Select Grading System</option>
            <option value="Scale 10 Grading System">Scale 10 Grading System</option>
            <option value="Scale 4 Grading System">Scale 4 Grading System</option>
            <option value="% Marks of 100 Maximum">% Marks of 100 Maximum</option>
            <option value="Course Requires a Pass">Course Requires a Pass</option>
          </select>
        </div>
        <div class="col-sm-1"></div>
      </div> -->
    
      <!-- <div class="form-group" id="comp_name" style="display:none;"> -->
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Score<span class="required">*</span></label>
          <input type="text" name="js_resut" class="form-control" placeholder="Enter Score" value="" onkeypress="javascript:return isNumber1(event)" required>
        </div>
        <div class="col-sm-1"></div>
      </div>
      
        

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
                    	<span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal2">Edit</a></span>	

      </li>
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal3">12th</a>
      <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">12th</h4>
        </div>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_education" method="post">
         <input type="hidden" name="js_education_id" value="">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="5">12th</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
          
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Board<span class="required">*</span></label>
          <select name="board_id" id="board_id" class="form-control">
            <option value="">Select Board</option>
                          <option value="1">CBSE</option>
                          <option value="2">CISCE(ICSE/ISC)</option>
                          <option value="3">Diploma</option>
                          <option value="4">National Open School</option>
                          <option value="7">IB(International Baccalaureate)</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">School Medium<span class="required">*</span></label>
          <select name="schoolmedium_id" id="schoolmedium_id" class="form-control">
            <option value="">Select Medium</option>
                       <option value="1">Assamese / Asomiya</option>
                        <option value="2">Bengali / Bangla</option>
                        <option value="3">English</option>
                        <option value="4">Gujarati</option>
                        <option value="5">Hindi</option>
                        <option value="6">kannada</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
    
    <div class="form-group">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <label class="control-label" for="email">Total Score<span class="required">*</span></label>
        <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
      </div>
      <div class="col-sm-1"></div>
    </div>
      

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
                  	<span style="float: right;font-size:12px;cursor: pointer;"><a  href="#" data-toggle="modal" data-target="#myModal3">Edit</a></span>	


      </li>
      <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal4">10th</a>
      <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">10th</h4>
        </div>
        <div class="modal-body education_frm">
  <form id="Educational-info" class="form-horizontal" action="http://www.consultnhire.com/job_seeker/update_education" method="post">
         <input type="hidden" name="js_education_id" value="">
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Education<span class="required">*</span></label>
          <select name="education_level_id" id="education_level_id" class="form-control" required="">
                       <option value="6">10th</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
          
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="pwd">Year of Completion<span class="required">*</span></label>
          <select name="js_year_of_passing" id="ddlYear" class="form-control" required="">
           <option value="">Select Completion Year</option>
                          <option value="2020">2020</option>
                          <option value="2019">2019</option>
                          <option value="2018">2018</option>
                          <option value="2017">2017</option>
                          <option value="2016">2016</option>
                          <option value="2015">2015</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                          <option value="1987">1987</option>
                          <option value="1986">1986</option>
                          <option value="1985">1985</option>
                          <option value="1984">1984</option>
                          <option value="1983">1983</option>
                          <option value="1982">1982</option>
                          <option value="1981">1981</option>
                          <option value="1980">1980</option>
                          <option value="1979">1979</option>
                          <option value="1978">1978</option>
                          <option value="1977">1977</option>
                          <option value="1976">1976</option>
                          <option value="1975">1975</option>
                          <option value="1974">1974</option>
                          <option value="1973">1973</option>
                          <option value="1972">1972</option>
                          <option value="1971">1971</option>
                          <option value="1970">1970</option>
                          <option value="1969">1969</option>
                          <option value="1968">1968</option>
                          <option value="1967">1967</option>
                          <option value="1966">1966</option>
                          <option value="1965">1965</option>
                          <option value="1964">1964</option>
                          <option value="1963">1963</option>
                          <option value="1962">1962</option>
                          <option value="1961">1961</option>
                          <option value="1960">1960</option>
                          <option value="1959">1959</option>
                          <option value="1958">1958</option>
                          <option value="1957">1957</option>
                          <option value="1956">1956</option>
                          <option value="1955">1955</option>
                          <option value="1954">1954</option>
                          <option value="1953">1953</option>
                          <option value="1952">1952</option>
                          <option value="1951">1951</option>
                          <option value="1950">1950</option>
                          <option value="1949">1949</option>
                          <option value="1948">1948</option>
                          <option value="1947">1947</option>
                          <option value="1946">1946</option>
                          <option value="1945">1945</option>
                          <option value="1944">1944</option>
                          <option value="1943">1943</option>
                          <option value="1942">1942</option>
                          <option value="1941">1941</option>
                          <option value="1940">1940</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>

      </div>
 

      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">Board<span class="required">*</span></label>
          <select name="board_id" id="board_id" class="form-control">
            <option value="">Select Board</option>
                          <option value="1">CBSE</option>
                          <option value="2">CISCE(ICSE/ISC)</option>
                          <option value="3">Diploma</option>
                          <option value="4">National Open School</option>
                          <option value="7">IB(International Baccalaureate)</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
      <div class="form-group">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
          <label class="control-label" for="email">School Medium<span class="required">*</span></label>
          <select name="schoolmedium_id" id="schoolmedium_id" class="form-control">
            <option value="">Select Medium</option>
                       <option value="1">Assamese / Asomiya</option>
                        <option value="2">Bengali / Bangla</option>
                        <option value="3">English</option>
                        <option value="4">Gujarati</option>
                        <option value="5">Hindi</option>
                        <option value="6">kannada</option>
                      </select>
        </div>
        <div class="col-sm-1"></div>
      </div>
    
    
    <div class="form-group">
      <div class="col-sm-1"></div>
      <div class="col-sm-10">
        <label class="control-label" for="email">Total Score<span class="required">*</span></label>
        <input type="text" name="totalmarks_id" id="totalmarks_id" class="form-control" value="" placeholder="Enter Total Score" onkeypress="javascript:return isNumber(event)">
      </div>
      <div class="col-sm-1"></div>
    </div>
      

    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </form></div>
        
      </div>
    </div>
  </div>
  
  
  
                	<span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal4">Edit</a></span>	

      </li>

      </ul>
      
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    <div id="menu3" class="tab-pane fade">
    <ul>
    <?php  $designation = $this->Master_model->getMaster('designation',$where=false);

            $department = $this->Master_model->getMaster('department',$where=false); ?>
     <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal5">Work Experience</a>
    
      <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Work Experience</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
         <!-- <input type="hidden" name="js_experience_id" value="286"> -->

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company Name:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_company_profile_id" required name="company_profile_id" value="">

                </div>
              </div>

        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <select name="designation_id" class="form-control">
                    <?php foreach($designation as $keys){?>
                    <option value="<?php echo $keys['designation_id']; ?>"><?php echo $keys['designation_name']; ?></option>
                    <?php } ?>
                    </select>

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Department:</label>
                <div class="col-sm-9">
         <select name="dept_id" class="form-control">
          <option value="">Select Department</option>
                   <?php foreach($department as $dept){?>
          <option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
          <?php } ?>
                    </select>
                </div>
              </div>


   <div class="form-group">
                <label class="control-label col-sm-3" for="email">Start Date:</label>
                <div class="col-sm-9"><input class="datepicker form-control" required name="start_date" value="">
 <label><input type="checkbox" id="upChkDisable_1" onclick="disableUpperDP('1')" checked="checked">  Current Job</label>

                </div>
              </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email">End Date:</label>
                <div class="col-sm-9"><input id="resDate_1" class="datepicker form-control" required name="end_date" value="" disabled="disabled">
                 
                </div>
              </div>

 
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Job Location</label>
                <div class="col-sm-9">
                 <input type="text" name="address" class="form-control" id="job_area" value="">
                </div>
              </div>
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Salary" value="25,000">
                </div>
              </div>
        
         <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                <div class="col-sm-9">
                 <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"></textarea>
                </div>
              </div>
        
        <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                <div class="col-sm-9">
                 <textarea name="achievement" class="form-control" rows="5" id="achievement"></textarea>
                </div>
              </div>

                <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
                </div>
              </div>-->

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
      </div>
        
      </div>
    </div>
  </div>
            <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-plus" aria-hidden="true"></i></a></span>  

      </li>

     </ul>
     <div class="col-md-12 bd-2">
                <?php 
        $experinece_list = $this->Job_seeker_experience_model->experience_list_by_id($jobseeker_id);
        // print_r($experinece_list);
                $sr_no=0;
            if (!empty($experinece_list)): foreach ($experinece_list as $v_experience) :

                // print_r($applicaiton);
                // for ($i=0; $i <sizeof($v_experience) ; $i++) { 
                    # code...
               
            ?>
            <div class="invi-div">
                            <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/> 
                            <div class="info-invitation">
                                <p class="head-invi">Compnay Name:<?php echo $v_experience->company_profile_id; ?></p>


                                 <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#EditExperience<?php echo $v_experience->js_experience_id; ?>" onclick="javascript:disableDP('<?php echo $key ?>')"class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></span>

                                <span class="salary-info">Designation: <?php echo $this->job_posting_model->job_salary_by_id($applicaiton[$i]->job_post_id); ?><span>

                                <p>Department: <?php echo $v_experience->department_name; ?></p>

                                <p>Duration: <?php $today=date("Y-m-d"); if($v_experience->end_date=="2017-08-30") {
                                    echo date_calculate($v_experience->start_date,$today);
                                  }else { echo date_calculate($v_experience->start_date,$v_experience->end_date); }?></p>

                                <p>My Responsibilities: <?php echo $v_experience->responsibilities ; ?></p>

                                <p>My Achievement: <?php echo $v_experience->achievement; ?></p>

                                
                                  
                            
                                <!-- <button class="apply-invi">Apply Now</button> -->
                            </div>
                            <div class="clear"></div>   
                        </div>
           
                 <?php
                  // $sr_no++;
                   // }
              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
             </div>
    
    
    
    
    
    </div>
<?php $count=1; foreach ($experinece_list as $v_experience): ?>

<div id="EditExperience<?php echo $v_experience->js_experience_id; ?>" class="modal fade" role="dialog">
 <div class="modal-dialog modal-md">

   <?php
$experinece = $this->Job_seeker_experience_model->get($v_experience->js_experience_id);
           

?>
     <!--  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-md"> -->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Work Experience</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateExperience-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_experience');?>" method="post" style="padding: 30px;">
         <input type="hidden" name="js_experience_id" value="<?php echo $v_experience->js_experience_id; ?>">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company Name:</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="edit_company_profile_id" required name="company_profile_id" value="<?php if (!empty($experinece->company_profile_id)) { echo $experinece->company_profile_id;} ?>">

                </div>
              </div>

        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                  <select name="designation_id" class="form-control">
         <?php foreach($designation as $keys){?>
          <option value="<?php echo $keys['designation_id']; ?>"<?php if($experinece->designation_id==$keys['designation_id']){ echo "selected"; }?>><?php echo $keys['designation_name']; ?></option>
          <?php } ?>
                    </select>

                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Department:</label>
                <div class="col-sm-9">
                 <select name="dept_id" class="form-control">
                  <option value="">Select Department</option>
                  <?php foreach($department as $dept){?>
                  <option value="<?php echo $dept['dept_id']; ?>"<?php if($experinece->dept_id==$dept['dept_id']){ echo "selected"; }?>><?php echo $dept['department_name']; ?></option>
                  <?php } ?>
                    </select>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Start Date:</label>
                <div class="col-sm-9"><input class="datepicker form-control" required name="start_date" value="<?php if (!empty($experinece->start_date)) { echo date('d-m-Y',strtotime($experinece->start_date)); } ?>">
                <label><input type="checkbox" id="upChkDisable_1" onclick="disableUpperDP('1')" checked="checked">  Current Job</label>

                </div>
              </div>


            <div class="form-group">
                <label class="control-label col-sm-3" for="email">End Date:</label>
                <div class="col-sm-9"><input id="resDate_1" class="datepicker form-control" required name="end_date" value="<?php if (!empty($experinece->end_date)) { echo date('d/m/Y',strtotime($experinece->end_date)); }else{ echo "";} ?>" disabled="disabled">
                 
                </div>
              </div>

 
            <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Job Location</label>
                <div class="col-sm-9">
                 <input type="text" name="address" class="form-control" id="job_area" value="<?php 
                         if (!empty($experinece->address)) {
                           echo $experinece->address;
                           }
                       ?>">
                </div>
              </div>
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Salary:</label>
                <div class="col-sm-9">
                  <input type="text" name="js_career_salary" class="form-control" id="js_career_salary" placeholder="Salary" value="<?php if (!empty($experinece->js_career_salary)) {
                           echo $experinece->js_career_salary;
                           }
                       ?>">
                </div>
              </div>
        
         <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Responsibilities</label>
                <div class="col-sm-9">
                 <textarea name="responsibilities" class="form-control" rows="5" id="responsibilities"><?php 
                         if (!empty($experinece->responsibilities)) {
                           echo $experinece->responsibilities;
                           } ?></textarea>
                </div>
              </div>
        
        <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">My Achievement  </label>
                <div class="col-sm-9">
                 <textarea name="achievement" class="form-control" rows="5" id="achievement"><?php
                         if (!empty($experinece->achievement )) {
                           echo $experinece->achievement ;
                           }
                        ?></textarea>
                </div>
              </div>

                <!-- <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Major Activity</label>
                <div class="col-sm-9">
                 <textarea name="major_activity" class="form-control" rows="5" id="major_activity"></textarea>
                </div>
              </div>-->

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
      </div>
        
      </div>
    </div>
  </div>
<?php  $count++; ?>
<?php endforeach;?>

    <div id="menu4" class="tab-pane fade">
    <ul>
            
            <?php 
             $jobseeker_id = $this->session->userdata('job_seeker_id');
            $training_list = $this->Job_training_model->training_list_by_id($jobseeker_id);
      $passingyear = $this->Master_model->getMaster('passingyear',$where=false);
             ?>
    
    <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal7">My Trannings</a>
      <div class="modal fade" id="myModal7" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Trainnings</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_training');?>" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" value="155" name="job_training_id">
                <label class="control-label col-sm-3" for="email">Training Title</label>
                <div class="col-sm-9">
                   <select name="training_title" id="training_title" class="form-control" onchange="check_other(this.value)">
                    <option value="">Select Training title</option>

                                          <?php foreach($training as $key){?>
                      <option value="<?php echo $key['name']; ?>"<?php if($training_list->training_title==$key['name']){ echo "selected"; }?>><?php echo $key['name']; ?></option>
                    <?php } ?>
                                        <option value="other">Other</option>

                  </select>

                  <input type="hidden" name="training_title" class="form-control" id="training_title1" placeholder="Training Title" value="CCNA1"> 
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Topic:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic" value="CCNA">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute:</label>
                <div class="col-sm-9">
                  <input type="text" name="institute" class="form-control" id="institute" placeholder="Institiute Name" value="CCNA">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                    <option value="">Select Country</option>
                                         <?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($training_list->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                    <?php } ?>
                  </select>
                </div> 
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">State:</label>
                <div class="col-sm-9">
                 <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                    <option value="">Select Country First</option>
                   <!--   <?php foreach($state as $val){?>
                      <option value="<?php echo $val['state_id']; ?>"<?php if($training_list->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                      <?php } ?> -->
                    </select>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">City:</label>
                <div class="col-sm-9">
                 <select name="city_id" id="city_id" class="form-control">
                   <option value="">Select State First</option>
                                  <!--      <?php foreach($city as $valu){?>
                    <option value="<?php echo $valu['id']; ?>"<?php if($training_list->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                    <?php } ?> -->
                                      </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration:</label>
                <div class="col-sm-9">
                  <input name="duration" type="text" class="form-control" id="duration" placeholder=" 1 years 2 month" value="">
                </div>
              </div>

                 <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                <div class="col-sm-9">
              <select name="training_year" id="training_year" class="form-control">
                  <?php foreach($passingyear as $traning){?>
          <option value="<?php echo $traning['passing_id']; ?>"<?php if($training_list->training_year==$traning['passing_id']){ echo "selected"; }?>><?php echo $traning['passing_year']; ?></option>
          <?php } ?>
                   </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                    
            </form>
      </div>
        
      </div>
    </div>
  </div>
  
              <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal7"><i class="fa fa-plus"></i></a></span>  

  
      </li>

    </ul>

    <div class="col-md-12 bd-2">
                <?php 
       
        // print_r($experinece_list);
                $sr_no=0;
            if (!empty($training_list)): foreach ($training_list as $v_training) : 

             // print_r($training_list);
                    # code...
               
            ?>
            <div class="invi-div">
                            <!-- <img src="<?php echo base_url()?>upload/<?php echo $this->company_profile_model->company_logoby_id($applicaiton[$i]->company_profile_id); ?>" class="invitation-img"/> -->
                            <div class="info-invitation">
                              <div class="row">
                                <div class="col-sm-6">
                                  <p></p>
                                 <p >Training Title: <span class="salary-info"> <?php echo $v_training->training_title; ?></span></p>

                                   <p >Training Institute:<span class="salary-info">  <?php echo $v_training->institute; ?></span> </p>

                                <p >State: <span class="salary-info">  <?php echo $v_experience->achievement; ?></span></p>
                                <p >Duration: <span class="salary-info"> <?php echo $v_training->duration; ?></span></p>
                                 


                              </div>
                               


                                

                              <div class="col-sm-6">
                                 <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#UdpateTraining<?php  echo $v_training->js_training_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil"></i></a></span>
                              
                                  <p  >Training Topic: <span class="salary-info">  <?php echo $v_training->training_topic; ?></span></p>
                                
                                <p >Country: <span class="salary-info">  <?php echo $v_training->country_name; ?></span></p>

                                <p >City:  <span class="salary-info"> <?php echo $v_training->city_name; ?></span></p>
                                <p >Year:  <span class="salary-info"> <?php echo $v_training->passing_year; ?></span></p>

                              </div>

                              </div>
                              
                            
                            
                                <!-- <button class="apply-invi">Apply Now</button> -->
                            </div>
                            <div class="clear"></div>   
                        </div>
            <!--  -->
                 <?php
                  // $sr_no++;
                   // }
              endforeach;
            ?>
            <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
             </div>
    
    
    </div>

      <?php foreach($training_list as $v_training): ?>
<div id="UdpateTraining<?php echo $v_training->js_training_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
   <?php
    $training_list=$this->Job_training_model->get($v_training->js_training_id); 
    
   ?>    
            
        <!-- <div class="modal fade" id="myModal7" role="dialog"> -->
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">My Trainings</h4>
        </div>
        <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_training');?>" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" value="155" name="job_training_id">
                <label class="control-label col-sm-3" for="email">Training Title</label>
                <div class="col-sm-9">
                   <select name="training_title" id="training_title" class="form-control" onchange="check_other(this.value)">
                    <option value="">Select Training title</option>

                    <?php foreach($training as $key){?>
                      <option value="<?php echo $key['name']; ?>"<?php if($training_list->training_title==$key['name']){ echo "selected"; }?>><?php echo $key['name']; ?></option>
                    <?php } ?>
                    <option value="other">Other</option>
                  <input type="hidden" name="training_title" class="form-control" id="training_title1" placeholder="Training Title"
                   value="<?php
                         if (!empty($training_list->training_title)) {
                           echo $training_list->training_title;
                           }
                       ?>"> 
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Training Topic:</label>
                <div class="col-sm-9">
                  <input type="text" name="training_topic" class="form-control" id="training_topic" placeholder="Training Topic" value="<?php
                         if (!empty($training_list->training_topic)) {
                           echo $training_list->training_topic;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Institute:</label>
                <div class="col-sm-9">
                  <input type="text" name="institute" class="form-control" id="institute" placeholder="Institiute Name" value="<?php
                         if (!empty($training_list->institute)) {
                           echo $training_list->institute;
                           }
                       ?>">
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)">
                    <option value="">Select Country</option>
                                         <?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($training_list->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                    <?php } ?>
                  </select>
                </div> 
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">State:</label>
                <div class="col-sm-9">
                 <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)">
                    <option value="">Select Country First</option>
                     <?php foreach($state as $val){?>
                      <option value="<?php echo $val['state_id']; ?>"<?php if($training_list->state_id==$val['state_id']){ echo "selected"; }?>><?php echo $val['state_name']; ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="email">City:</label>
                <div class="col-sm-9">
                 <select name="city_id" id="city_id" class="form-control">
                   <option value="">Select State First</option>
                                       <?php foreach($city as $valu){?>
                    <option value="<?php echo $valu['id']; ?>"<?php if($training_list->city_id==$valu['id']){ echo "selected"; }?>><?php echo $valu['city_name']; ?></option>
                    <?php } ?>
                                      </select>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Duration:</label>
                <div class="col-sm-9">
                  <input name="duration" type="text" class="form-control" id="duration" placeholder=" 1 years 2 month" value="<?php
                         if (!empty($training_list->duration)) {
                           echo $training_list->duration;
                           }
                       ?>">
                </div>
              </div>

                 <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Training Years:</label>
                <div class="col-sm-9">
              <select name="training_year" id="training_year" class="form-control">
                  <?php foreach($passingyear as $traning){?>
          <option value="<?php echo $traning['passing_id']; ?>"<?php if($training_list->training_year==$traning['passing_id']){ echo "selected"; }?>><?php echo $traning['passing_year']; ?></option>
          <?php } ?>
                   </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Submit</button>
              </div>

                    
            </form>
      </div>
        
      </div>
    </div>
  </div> 

<?php  $count++; ?>
<?php endforeach;?>

<div id="menu2" class="tab-pane fade">
    <ul>
    <?php  $designation = $this->Master_model->getMaster('designation',$where=false);

            $department = $this->Master_model->getMaster('department',$where=false); ?>
     <li class="bullet"><a href="#" data-toggle="modal" data-target="#myModal25">skills</a>
    
      <div class="modal fade" id="myModal25" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Skiils</h4>
        </div>
        <div class="modal-body">
         <form id="Updateskill-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_skills');?>" method="post" style="padding: 30px;">
         

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Skills:</label>
                <div class="col-sm-9">
               
                  <input type="text" name="skills" class="form-control" id="tokenfield" placeholder="Enter Your Skills"
                   value="<?php  

              if(!empty($js_skills)){
                $skill="";
                for($i=0;$i<sizeof($js_skills);$i++){
                  if($i==0){
                  $skill=$skill.$js_skills[$i]['skills'];
                  }else{
                    $skill=$skill.','.$js_skills[$i]['skills'];
                  }
                }
                echo $skill;
              }
                           ?>">

                </div>
              </div>

       


                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
      </div>
        
      </div>
    </div>
  </div>
            <span style="float: right;font-size:12px;cursor: pointer;"><a href="#" data-toggle="modal" data-target="#myModal25"><i class="fa fa-plus" aria-hidden="true"></i></a></span>  

      </li>

     </ul>
     <div class="col-md-12 bd-2">
                <?php 
      $js_skills = $this->Master_model->getMaster('job_seeker_skills',$where_skill);
       

              if (!empty($js_skills)):
            
            ?>
            <div class="invi-div">
                         
                            <div class="info-invitation">
                             


                                 <span style="float: right;font-size:12px;cursor: pointer;"> <a href="#" data-toggle="modal" data-target="#Updateskills" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </span>

                          

                                <p>Skills: <?php  

                              if(!empty($js_skills)){
                                $skill="";
                                for($i=0;$i<sizeof($js_skills);$i++){
                                  if($i==0){
                                  $skill=$skill.$js_skills[$i]['skills'];
                                  }else{
                                    $skill=$skill.','.$js_skills[$i]['skills'];
                                  }
                                }
                                echo $skill;
                              }
                           ?></p>

                               
                                <!-- <button class="apply-invi">Apply Now</button> -->
                            </div>
                            <div class="clear"></div>   
                        </div>
          
                  <?php else : ?> 
            
                <div>
                    <strong>There is no data to display</strong>
                  
                </div>
             
              
            <?php endif; ?>
             </div>
             
              
           
             </div>
    
    
    
    
    
    </div>


<div id="Updateskills" class="modal fade" role="dialog">
 <div class="modal-dialog modal-md">

  
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Skills</h4>
        </div>
        <div class="modal-body">
         <form id="Updateskill-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_skills');?>" method="post" style="padding: 30px;">
        <div class="form-group">
                <label class="control-label col-sm-3" for="email">Skills:</label>
                <div class="col-sm-9">
               
                  <input type="text" name="skills" class="form-control" id="tokenfield" placeholder="Enter Your Skills"
                   value="<?php  

              if(!empty($js_skills)){
                $skill="";
                for($i=0;$i<sizeof($js_skills);$i++){
                  if($i==0){
                  $skill=$skill.$js_skills[$i]['skills'];
                  }else{
                    $skill=$skill.','.$js_skills[$i]['skills'];
                  }
                }
                echo $skill;
              }
                           ?>">

                </div>
              </div>

       


                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
            </form>
      </div>
        
      </div>
    </div>
  </div>

  
  </div>
           
   
            
            
            
            </div>




    
  </div>
    
    
    </div>
 

   <?php $this->load->view("fontend/layout/jobseeker_footer.php"); ?>

</div>

<script>
  
$( "#ed" ).on( "click", function( event ) {
   var value = document.getElementById('education_level_id');
  console.log(value);
})
  
</script>

<script type="text/javascript">


  

  // Personal Info
    $( document ).ready( function () {
            $( "#Personal-info" ).validate( {
                rules: {

                    resume_title: {
                        required: true,
                    },

                    father_name: {
                        required: true,
                    },

                    mother_name: {
                        required: true,
                    },

                    date_of_birth: {
                        required: true,
                    },
                    matrial_status: {
                        required: true,
                    },
                    nationality: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                        minlength:10,
                    },

                    present_address: {
                        required: true,
                    },
                     parmanent_address : {
                        required: true,
                    },
                     country_id: {
                        required: true,
                    },
                    state_id: {
                        required: true,
                    },
                    city_id: {
                        required: true,
                    },


                },
                messages: {
                    email: "Please enter a valid email address",
                    father_name: "Please enter your father name ",
                    mother_name: "Please enter your mother name",
                    date_of_birth: "Please enter your birthday",
                    matrial_status: "Please select your matarial",
                    nationality: "Please select your nationality" ,
                    present_address: "Please enter your present address ",
                    parmanent_address: "Please enter your parmanent address ",
                    country_id: "Please select country ",
                    state_id: "Please select state ",
                    city_id: "Please select city ",

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
  
  // Experience
  $( document ).ready( function () {
               // Education Add form Valiaton
        $( "#addExperience-info" ).validate( {
                rules: {

                    company_name: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },

                    job_level: {
                        required: true,
                    },

                    job_nature: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                      duration: {
                        required: true,
                    },

                },
                messages: {
                    company_name: "Please enter company name",
                    designation: "Please designation name ",
                    job_level: "Please select job level",
                    job_nature: "Please select job nature",
                    department: "Please enter your department",
                    duration: "Please enter your duration",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateExperience-info" ).validate( {
                rules: {

                    company_name: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },

                    job_level: {
                        required: true,
                    },

                    job_nature: {
                        required: true,
                    },
                    department: {
                        required: true,
                    },
                      duration: {
                        required: true,
                    },

                },
              messages: {
                    company_name: "Please enter company name",
                    designation: "Please designation name ",
                    job_level: "Please select job level",
                    job_nature: "Please select job nature",
                    department: "Please enter your department",
                    duration: "Please enter your duration",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
  
  // Reference
    $( document ).ready( function () {
               
        $( "#Reference-info" ).validate( {
                rules: {

                    name: {
                        required: true,
                        minlength: 5
                    },

                    org_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                realtion: {
                        required: true,
                    },

                },
                messages: {
                    name: "Please enter a full name",
                    org_name: "Please enter organization name ",
                    mobile: "Please enter  mobile number",
                    designation: "Please enter designation ",
                    email: "Please enter email",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    name: {
                        required: true,
                        minlength: 5
                    },

                    org_name: {
                        required: true,
                    },

                    mobile: {
                        required: true,
                    },

                    designation: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },

                },
                messages: {
                    name: "Please enter a full name",
                    org_name: "Please enter organization name ",
                    mobile: "Please enter  mobile number",
                    designation: "Please enter designation ",
                    email: "Please enter email",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
    
  // Career Info
  $( document ).ready( function () {
            $( "#Career-info" ).validate( {
                rules: {

                    js_career_obj: {
                        required: true,
                    },

                    js_career_sum: {
                        required: true,
                    },

                    js_career_salary: {
                        required: true,
                    },

                    avaliable: {
                        required: true,
                    },
               },
                messages: {

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
  
  //
  $( document ).ready( function () {
            $( "#addLanguage-info" ).validate( {
                rules: {

                    language: {
                        required: true,
                    },

                    reading: {
                        required: true,
                    },

                    writing: {
                        required: true,
                    },

                    speaking: {
                        required: true,
                    },
               },
                messages: {

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
  
  // Education
  $( document ).ready( function () {
               // Education Add form Valiaton
        $( "#Educational-info" ).validate( {
                rules: {

                    js_degree: {
                        required: true,
                    },

                    js_group: {
                        required: true,
                    },

                    js_resut: {
                        required: true,
                    },

                    js_institute_name: {
                        required: true,
                    },
                    js_year_of_passing: {
                        required: true,
                    },

                },
                messages: {
                    js_degree: "Please your degree",
                    js_group: "Please enter your group name ",
                    js_resut: "Please enter your result",
                    js_institute_name: "Please institute name",
                    js_year_of_passing: "Please your passing years",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    js_degree: {
                        required: true,
                    },

                    js_group: {
                        required: true,
                    },

                    js_resut: {
                        required: true,
                    },

                    js_institute_name: {
                        required: true,
                    },
                    js_year_of_passing: {
                        required: true,
                    },

                },
                messages: {
                    js_degree: "Please your degree",
                    js_group: "Please enter your group name ",
                    js_resut: "Please enter your result",
                    js_institute_name: "Please institute name",
                    js_year_of_passing: "Please your passing years",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
  
  // Training
  $( document ).ready( function () {
               // Education Add form Valiaton
        $( "#Training-info").validate( {
                rules: {

                    training_title: {
                        required: true,
                        minlength: 5
                    },
                    country: {
                        required: true,
                    },

                    institute: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    duration: {
                      required: true,
                    },
                     training_year: {
                      required: true,
                    },

                },
                messages: {
                    training_title: "Please enter a valid Title",
                    country: "Please enter your country name",
                    institute: "Please enter your institue",
                    location: "Please enter your location",
                    duration: "Please enter your duration",
                    training_year: "Please enter training year",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
      $( "#UpdateEducational-info" ).validate( {
                rules: {

                    training_title: {
                        required: true,
                        minlength: 5
                    },
                    country: {
                        required: true,
                    },

                    institute: {
                        required: true,
                    },
                    location: {
                        required: true,
                    },
                    duration: {
                      required: true,
                    },     
                     training_year: {
                      required: true,
                    },

                },
                messages: {
                    training_title: "Please enter a valid Title",
                    country: "Please enter your country name",
                    institute: "Please enter your institue",
                    location: "Please enter your location",
                    duration: "Please enter your duration",
                    training_year: "Please enter training year",
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );


        });
    
  
</script>

<script>$(document).ready(function () {
  //called when key is pressed in textbox
  $("#number").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
<script>
function FillBilling(f) {
  if(f.billingtoo.checked == true) {
    f.parmanent_address.value = f.present_address.value;
  f.country1_id.value = f.country_id.value;
    f.state1_id.value = f.state_id.value;
  f.city1_id.value = f.city_id.value;
  f.pincode1.value = f.pincode.value;
  }else{

    f.parmanent_address.value = '';
  f.country1_id.value = '';
    f.state1_id.value ='';
  f.city1_id.value = '';
  f.pincode1.value = '';
  }
}
</script>    

<script>
    function getStates(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                }
        
            }); 
          }
   
     }
    
    function getCitys(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
        
            }); 
          }
   
     }
     
  
$(document).ready(function(){

    function getStates_load(){
        var id = $('#country_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                    $('#state_id').val(<?php echo $js_personal_info->state_id; ?>);
                     getCitys_load(<?php echo $js_personal_info->state_id; ?>);
                }
                
            }); 
          }
   
       }
    
    function getCitys_load(id){
      //var id = $('#state_id').val();
      // alert(id);
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                    $('#city_id').val(<?php echo $js_personal_info->city_id; ?>);
                }
                
            }); 
          }
   
       }

  

  getCitys_load();
  getStates_load();
  // getCitys_load_permant();
  // getStates_load_permant();
});

</script>        
<style>
  .datepicker{z-index:1151 !important;}
</style> 



<script>        
           function phoneno(){          
            $('#pincode').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
     
     
     <script>        
           function phoneno(){          
            $('#pincode1').keypress(function(e) {
                var a = [];
                var k = e.which;

                for (i = 48; i < 58; i++)
                    a.push(i);

                if (!(a.indexOf(k)>=0))
                    e.preventDefault();
            });
        }
       </script>
<!--Only Numbers are allowed validation-->
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
<!--Only Character and Space are allowed validation-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script type="text/javascript">
$(document).ready(function() {
         $('.name-valid').on('keypress', function(e) {
          var regex = new RegExp("^[a-zA-Z ]*$");
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
             return true;
          }
          e.preventDefault();
          return false;
         });
        });
</script>




<script>
  var BASE_URL = "<?php echo base_url(); ?>";
 
 $(document).ready(function() {
    $( "#job_area" ).autocomplete({
 
        source: function(request, response) {
            $.ajax({
            url: BASE_URL + "job_seeker/search",
            data: {
                    term : request.term
             },
            dataType: "json",
            success: function(data){
               var resp = $.map(data,function(obj){
                    return obj.city_name;
               }); 
 
               response(resp);
            }
        });
    },
    minLength: 1
 });
});
 
</script>
<script type="text/javascript">
  function getlanguage_data(lan_id)
  {
   // alert(lan_id);

    $.ajax({
             url:'<?php echo base_url()?>job_seeker/edit_language',
             type: 'post',
            
             data: {language_id:lan_id},
              dataType: 'json',
             // content_type:'application/json',
             success: function(data){
               
               console.log(data);
               $.each(data, function(index, value) 
              {
                
                  $('#lang_id').val(value.id);

                  $('#language').val(value.language);
                  $('#proficiency').val(value.proficiency);

                  var read = value.lang_read;
                  var write = value.lang_write;
                  var speak = value.lang_speak;
                  if(read == 'Yes')
                  {
                    $('#lang_read').prop('checked', true);

                  }else{
                    $('#lang_read').prop('checked', false);

                  }
                  if(write == 'Yes')
                  {
                    $('#lang_write').prop('checked', true);

                  }else{
                    $('#lang_write').prop('checked', false);

                  } 
                  if(speak == 'Yes')
                  {
                    $('#lang_speak').prop('checked', true);

                  }else{
                    $('#lang_speak').prop('checked', false);

                  }
                
              });
              
                // $('#candiate_email').val(emails);
                     
              
             }
        });
  }
</script>
<style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
  
</style>
<script>
    function getStates(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                }
        
            }); 
          }
   
     }

    function getCitys(id){
    if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                }
        
            }); 
          }
   
     }
       
       $(document).ready(function(){

    function getStates_load(){
        var id = $('#country_id').val();

        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getstate',
                data:{id:id},
                success:function(res){
                    $('#state_id').html(res);
                    $('#state_id').val(<?php echo $training_list->state_id; ?>);
                     getCitys_load(<?php echo $training_list->state_id; ?>);
                }
                
            }); 
          }
   
       }
    
    function getCitys_load(id){
      //var id = $('#state_id').val();
      // alert(id);
        if(id){
            $.ajax({
                type:'POST',
                url:'<?php echo base_url();?>Job_seeker/getcity',
                data:{id:id},
                success:function(res){
                    $('#city_id').html(res);
                    $('#city_id').val(<?php echo $training_list->city_id; ?>);
                }
                
            }); 
          }
   
       }

    


  getCitys_load();
  getStates_load();
});

function check_other(value)
{
  
    var x1 = document.getElementById("training_title1");
    var x = document.getElementById("training_title");
    if (value=='other') 
  {
    if (x1.type === "hidden") {
      x1.type = "text";
      // x.type = "hidden";
    } else {
      x1.type = "hidden";

    }
  }
  else
  {
    x1.type = "hidden";
    x1.value = value;
  }
}
</script> 
<script src="<?php echo base_url() ?>asset/js/select2.min.js"></script>    
<script>
  $(document).ready(function(){
 
  // Initialize select2
  $("#training_title").select2({
    placeholder: "Select Training",
  allowClear: true
  });
});
</script>   
<!---header-->
<?php $this->load->view('fontend/layout/employer_new_header.php');?>  

<!---header--->
<div class="container-fluid main-d">
  <div class="container">
   <div class="col-md-12">
    <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
      <div class="col-md-9 employe_add">
        <div class="col-md-12">
          <h4 class="employee_heading">ADD EMPLOYEE</h4>
        </div>
        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">                                       
              <label for="exampleInputEmail1">Employee No<span class="required">*</span></label>
              <input type="number" min="1" name="emp_no" id="emp_no" class="form-control" value="" required="">                    
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Full Name <span class="required">*</span></label>
              <input type="text" name="emp_name" id="emp_name" class="form-control" value="" required="">                      
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Department<span class="required">*</span></label>
              <select name="dept_id" id="dept_id" class="form-control department select2-hidden-accessible" required="" tabindex="-1" aria-hidden="true">
                <option value="">Select Department</option>
                 <?php foreach($department as $key){?>
                  <option value="<?php echo $key['dept_id']; ?>"<?php if($result['dept_id'] == $key['dept_id']){ echo "selected"; }?>><?php echo $key['department_name']; ?></option>
                <?php } ?>
                 </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" style="width: 272px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dept_id-container"><span class="select2-selection__rendered" id="select2-dept_id-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></span>
            </div>
          </div>       
        </div>
        <div class="col-md-12">
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
              <input type="email" name="email" id="email" class="form-control" value="" required="">                        
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Password<span class="required">*</span></label>
              <input type="Password" name="Password" id="Password" maxlength="15" class="form-control" value="" required="">                        
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
              <input type="tel" name="mobile" id="mobile" class="form-control" value="" onkeypress="phoneno()" maxlength="10" required="">                       
            </div>
          </div>         
        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Designation<span class="required">*</span></label>
              <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required="">
                <option value="">Select designation</option>
                   <?php foreach($roles as $key){?>
                    <option value="<?php echo $key['user_role_id']; ?>"<?php if($result['user_role'] == $key['user_role_id']){ echo "selected"; }?>><?php echo $key['user_roles']; ?>
                    </option>
                  <?php } ?>
                        
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Give Acces To User<span class="required">*</span></label>
              <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required="">
              
              </select>
            </div>
          </div>     
        </div>
        <div class="col-md-12">
          <div class="col-md-4 col-sm-4">
            <div class="formrow">
              <label class="control-label">Country: <span class="required">*</span></label>
                <select name="country_id" id="country_id" class="form-control" onchange="getStates(this.value)" required="">
                   <option value="">Select Country</option>
                    <?php foreach($country as $key){?>
                    <option value="<?php echo $key['country_id']; ?>"<?php if($result['country_id']==$key['country_id']){ echo "selected"; } elseif ($key['country_name']=='India') {echo "selected";}?>><?php echo $key['country_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="formrow">
              <label class="control-label">State: <span class="required">*</span></label>
                <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)" required="">
                  <option value="">Select State</option>
                </select>
            </div>
          </div>        
          <div class="col-md-4 col-sm-4">
            <div class="formrow">
              <label class="control-label">City: <span class="required">*</span></label>
              <select name="city_id" id="city_id" class="form-control" required="">
                <option value="">Select City</option>
              </select>
            </div>
          </div>        
        </div>
        <div class="col-md-12" style="margin-top:10px;">
          <div class="col-md-12 form-group">
            <label for="comment">Question </label>
  		      <textarea class="form-control" rows="5" id="comment"></textarea>
          </div>           
        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group" >
              <label for="exampleInputEmail1" required="">Pincode<span class="required">*</span></label>
              <input type="text" name="pincode" id="pincode" class="form-control" autocomplete="off" value="">                  
            </div>
          </div>
          <div class="col-sm-6">
            <label>Status:</label>
            <select name="emp_status" class="form-control">
              <option value="">Select</option>
              <option value="1"<?php if($result['emp_status']=='1'){ echo "selected"; } ?>>Active</option>
              <option value="2"<?php if($result['emp_status']=='2'){ echo "selected"; } ?>>Inactive</option>
            </select>
          </div>
        </div>
        <div class="cl-md-12">
          <div class="col-md-12 employ_btn_div">
            <button class="employ_btn">Add Employee</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





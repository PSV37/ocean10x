<?php 
    $this->load->view('fontend/layout/employer_new_header.php');?>  
<style>
div#music {
    margin-top: 20px;
}
.emplye_n {
   margin-top: 75px;
    margin-bottom: 20px;
    border: solid 1px #eae9e9;
    padding: 25px 25px;
    border-radius: 13px;
    box-shadow: 0px 1px 4px 0px #e9e8e8;
}
thead {
    background-color: aliceblue;
    font-size: 12px;
    color: #149a94;
}
.table>tbody>tr>td{line-height:2.428571;
font-size:12px;}
button#status {
    width: 98px;
    text-align: center;
}
.add_btn{
 background-color: #18c5bd;
    border: none;
    padding:4px 27px;
    border-radius: 30px;
    color: #fff;
    font-weight: 600;
	margin-right: 10px;
}
.save_btn{
	 background-color: #18c5bd;
    border: none;
    padding: 4px 27px;
    border-radius: 30px;
    color: #fff;
    font-weight: 600;
	margin-right: 22px;
	}
.add_btn:hover{	
background-color: #109690;
    box-shadow: 2px 2px 7px #d6d2d2;
}
.save_btn:hover{
	background-color: #109690;
    box-shadow: 2px 2px 7px #d6d2d2;
}

.add_employ {
    margin-top: 25px;
}
button.btn.btn-update {
    background-color: #18c5bd;
    color: #fff;
    padding: 10px 30px;
    border-radius: 33px;
    font-weight: 600;
}
button.btn.btn-update:hover{
	background-color: #109690;
    box-shadow: 2px 2px 7px #d6d2d2;

	}
.add_employ h4{	
font-size: 21px;
    margin-bottom: 30px;
   
    border-left: solid 3px #18c5bd;
   
    padding: 6px 0px 6px 15px;
}
:focus {
    outline: none !important;
}

.dropdown {
  display: inline-block;
  position: relative;
  margin-top:0px;
}

.dd-button {
    display: inline-block;
    border: 1px solid #dedede;
    border-radius: 4px;
    padding: 5px 30px 5px 20px;
    background-color:#cde4f5;
    cursor: pointer;
    white-space: nowrap;
    border-radius: 33px;
	color:#848484;
	font-size:12px;
}
.dd-button:after {
  content: '';
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  width: 0; 
  height: 0; 
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
  border-top: 5px solid #6f6b6b;
  
}

.dd-button:hover {
  background-color: #eeeeee;
}


.dd-input {
  display: none;
}

.dd-menu {
  position: absolute;
  top: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 0;
  margin: 2px 0 0 0;
  box-shadow: 0 0 6px 0 rgba(0,0,0,0.1);
  background-color: #ffffff;
  list-style-type: none;
}

.dd-input + .dd-menu {
  display: none;
} 

.dd-input:checked + .dd-menu {
  display: block;
  z-index:999;
} 

.dd-menu li {
  padding: 10px 20px;
  cursor: pointer;
  white-space: nowrap;
}

.dd-menu li:hover {
  background-color: #f6f6f6;
}

.dd-menu li a {
  display: block;
  margin: -10px -20px;
  padding: 10px 20px;
}

.dd-menu li.divider{
  padding: 0;
  border-bottom: 1px solid #cccccc;
}
</style>


<div class="container-fluid main-d">
	<div class="container">
    <div class="col-md-12">
       <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
        <div class="col-md-9 emplye_n">
          <form action="/action_page.php" style="float: left;margin-right: 25px;">
            <button class="sort-serach" type="submit"><i class="fas fa-search" aria-hidden="true"></i></button>
				    <input type="text" placeholder="Search.." name="search">
   		    </form>
          <label class="dropdown">

            <div class="dd-button">
              Department
            </div>
            <input type="checkbox" class="dd-input" id="test">
            <ul class="dd-menu">
              <li>Action</li>
              <li>Another action</li>
              <li>Something else here</li>
              <li class="divider"></li>
              <li><a href="http://rane.io">Link to Rane.io</a></li>
            </ul>
          </label>
          <div role="tabpanel" class="tab-pane fade active in" id="music">
            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="dataTables-example">
                <thead>
                  <tr>
          			  <th>Emp Id.</th>
          			  <th>Employee Name</th>
          			  <th>Email Id</th>
          			  <th>Mobile No.</th>
                  <th>Access level</th>
          			  <th>Status</th>
                  <th>Update</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $srno=0; foreach($result as $key){ $srno++; 
                ?>
            		<tr style="background: #fff;">
                  <td><?php echo $key['emp_no']; ?></td>
          				<td><?php echo $key['emp_name']; ?></td>
          				<td><?php echo $key['email']; ?></td>
          				<td><?php echo $key['mobile']; ?></td>
          				<td><?php echo $key['department_name']; ?></td>	
                   <?php if($key['emp_status']=='1')
                 {?>
          				<td style=""><button class="btn btn-success" name="status" id="status" value="3">Active</button></td>	
                   <? } elseif($key['emp_status']=='2')
                  { ?>
                  <td style=""><button class="btn btn-default" name="status" id="status" value="3">Inactive</button></td>
                  <? } elseif($key['emp_status']=='0')
                  { ?>
                  <td style=""><button class="btn btn-danger" name="status" id="status" value="3">Deactivated</button></td>
                  <? } elseif($key['emp_status']=='3')
                  { ?>
                  <td style=""><button class="btn btn-warning" name="status" id="status" value="3">Suspended</button></td>
                <?php } ?>

            		  <td style="text-align:center;color:#18c5bd;cursor:pointer;" ><i class="fas fa-edit"></i></td>
                </tr>
  			       
                </tbody>
              </table>
            </div>
          </div>
           <div class="container-fluid">
             <div class="col-md-10"></div>
            <div class="col-md-2">
            <span><?php echo $links; ?></span>
            </div>
               
          </div>
          <div class="col-md-6" style="text-align: left;margin-left: -13px;"><button class="add_btn">Add</button></div>
            <div class="col-md-6" style="text-align: right;margin-left: 492px;float: none;"><button class="save_btn">Save</button></div>   
            <div class="add_employ">
              <h4>Add Employee</h4>
                <div class="row">
           	      <div class="col-md-3">
                    <div class="form-group">                                       
                     <label for="exampleInputEmail1">Employee ID<span class="required">*</span></label>
                      <input type="number" min="1" name="emp_no" id="emp_no" class="form-control" value="" required="">                    
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Employee Name<span class="required">*</span></label>
                      <input type="text" name="emp_name" id="emp_name" class="form-control" value="" required="">                      
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Department<span class="required">*</span></label>
                      <select name="dept_id" id="dept_id" class="form-control department" required="" tabindex="-1" aria-hidden="true">
                        <option value="">Select Department</option>
                          <?php foreach($department as $key){?>
                          <option value="<?php echo $key['dept_id']; ?>"<?php if($result['dept_id'] == $key['dept_id']){ echo "selected"; }?>><?php echo $key['department_name']; ?></option>
                        <?php } ?>
                         
                    </div>
                  </div> 
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                      <input type="tel" name="mobile" id="mobile" class="form-control" value="" onkeypress="phoneno()" maxlength="10" required="">                       
                    </div>
                  </div>        
                </div>
                <div class="row">
           	      <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
                      <input type="email" name="email" id="email" class="form-control" value="" required="">                        
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password<span class="required">*</span></label>
                      <input type="Password" name="Password" id="Password" maxlength="15" class="form-control" value="" required="">                       
                    </div>
                  </div>
                  <div class="col-md-3">
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
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Give Acces To User<span class="required">*</span></label>
                     
                      <select class="selectpicker form-control" multiple data-live-search="true" name="user_acc[]" id="user_accc" required>
                      </select>
                    </div>
                  </div>                      
                </div>
              <div class="row">
                <div class="col-md-3">
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
                <div class="col-md-3">
                  <div class="formrow">
                    <label class="control-label">State: <span class="required">*</span></label>
                    <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)" required="">
                      <option value="">Select State</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="formrow">
                    <label class="control-label">City: <span class="required">*</span></label>
                    <select name="city_id" id="city_id" class="form-control" required="">
                      <option value="">Select City</option>
                    </select>
                  </div>
                </div>  
                 <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1" required="">Pincode<span class="required">*</span></label>
                      <input type="text" name="pincode" id="pincode" class="form-control" autocomplete="off" value="">                 
                    </div>
                  </div>    
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="comment">Address</label>
    		            <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <button class="btn btn-warning" name="status" id="status" value="3">Suspend</button>
                </div>
                <div class="col-md-6" style="text-align:end;">
                  <button class="btn btn-update">Upadate</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
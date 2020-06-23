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
        	<div class="col-md-3">
            
            <aside id="left-panel" style="margin-top:75px;
                 margin-left: 14px;height:auto; border-right: 1px solid rgba(240, 240, 240, 0.3);box-shadow: 2px 2px 4px 0px   #00000033;position: fixed;
            z-index: 999;vertical-align:baseline;">
            <div class="inner-left-pannel">
                
                
                <!-- WHAT MOVES START -->
                <div class="my-moving-parts">
                    <div class="my-param-content"></div>
                    <div class="my-normal-content">
                       <div class="inner-tabs-navigation" data-active="menu">
                        </div>
                        <div class="inner-tabs">
                            <div class="account-tab">
                                <div class="language-selection" title="Change language">
                                                <div class="btn-header transparent pull-right dropdown" style="margin-top: -1px;">
                                                    <span><a href="#" class="dropdown-toggle locale" data-toggle="dropdown">
                                                      <i class="flag flag-us"></i> 
                                                         </a>
                                                     </span>
                                                </div>
                                </div>
                            </div>
                            
                            <div class="menu-tab">
                               
                                
                                
                                <nav class="menu-principal">
                                
                                    <ul class="menu-principal-list" style="">
                                         <li class="active">
                                             <a data-dl-view="true" data-dl-title="Dashboard" href="#">
                                            <span class="icon-container">
                                                 <i class="fas fa-tachometer-alt"></i>
                                            </span>
                                            <span class="text item">Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                             <a data-dl-view="true" data-dl-title="My profile" href="/candidate/detail">
                                            <span class="icon-container">
                                                <i class="fas fa-user-alt"></i>
                                           </span>
                                        <span class="text item">CV Bank</span>
                                              </a>
                                       </li>
                                       
                                      <li>
                                     <a data-dl-view="true" data-dl-title="Contacts" href="/candidate">
                                       <span class="icon-container">
                                         <i class="fas fa-phone-volume"></i>
                                     </span>
                                        <span class="text item">Post New Job</span>
                                     </a>
                                      </li>
                                         <li>
                                         <a data-dl-view="true" data-dl-title="Recruitments" href="/campaign">
                                            <span class="icon-container">
                                              <i class="fas fa-filter"></i>
                                              </span>
                                        <span class="text item">Active Job Post</span>

                                          </a>
                                        </li>
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Pending Jobs</span>
                                              </a>
                                         </li>
                                            
                                          
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Question Bank</span>
                                              </a>
                                         </li>
                                         
                                          <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Employee Management</span>
                                              </a>
                                         </li>
                                         
                                          <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">Company / Recruiter</span>
                                              </a>
                                         </li>
                                         
                                         <li>
                                            <a data-dl-view="true" data-dl-title="Mobility" href="/jobprofile/generate">
                                            <span class="icon-container">
                                              <i class="fas fa-map-signs"></i>
                                              </span>
                                        <span class="text item">OceanChamp</span>
                                              </a>
                                         </li>
                                         
                                         
                                     </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- WHAT MOVES END -->
            </div>
                </aside>
            </div>
            
            <div class="col-md-9 emplye_n">
            	<form action="/action_page.php" style="float: left;
    margin-right: 25px;">
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
    <li>
      <a href="http://rane.io">Link to Rane.io</a>
    </li>
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
              </tr></thead>
              <tbody>
          		          				
                <tr style="background: #fff;">
                  <td>1</td>
          				<td>4521</td>
          				<td>shr9lk6fde@privacy-mail.top</td>
          				<td>1111111110</td>
          				<td>Admin</td>	
          				<td style=""><button class="btn btn-danger" name="status" id="status" value="3">Deactivated</button></td>				
          		
                  <td style="text-align:center;color:#18c5bd;cursor:pointer;" ><i class="fas fa-edit"></i></td>
                 

                </tr>
			                  				
                <tr style="background:#fff;">
                  <td>2</td>
          				<td>12313</td>
          				<td>testaudit@gmail.com</td>
          				<td>4040404040</td>
          				<td>Super Admin</td>	
          				<td style=""><button class="btn btn-success" name="status" id="status" value="4">Active</button></td>				
          		
                  <td style="text-align:center;color:#18c5bd;cursor:pointer;"><i class="fas fa-edit"></i> </td>
                 

                </tr>
                
                 <tr style="background: #fff;">
                  <td>1</td>
          				<td>4521</td>
          				<td>shr9lk6fde@privacy-mail.top</td>
          				<td>1111111110</td>
          				<td>Admin</td>	
          				<td style=""><button class="btn btn-warning" name="status" id="status" value="3">Suspend</button></td>				
          		
                  <td style="text-align:center;color:#18c5bd;cursor:pointer;" ><i class="fas fa-edit"></i></td>
                 
			                      
            </tbody>
          </table>
          </div>
    
    
    </div>
            
           
            <div class="col-md-6" style="text-align: left;margin-left: -13px;"><button class="add_btn">Add</button></div>
             <div class="col-md-6" style="text-align: right;margin-left: 492px;float: none;"><button class="save_btn">Save</button></div>   
           
           <div class="add_employ">
           <h4>Add Employe</h4>
           <div class="row">
           	<div class="col-md-3">
                    <div class="form-group">                                       
                     <label for="exampleInputEmail1">Employee ID<span class="required">*</span></label>
                      <input type="number" min="1" name="emp_no" id="emp_no" class="form-control" value="" required="">                    </div>
                    </div>
           
           <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Employee Name<span class="required">*</span></label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control" value="" required="">                      </div>
             </div>
           <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Department<span class="required">*</span></label>
                      <select name="dept_id" id="dept_id" class="form-control department select2-hidden-accessible" required="" tabindex="-1" aria-hidden="true">
                        <option value="">Select Department</option>
                                                <option value="1">Banking / Insurance</option>
                                                <option value="2">IT / Software</option>
                                                </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" style="width: 272px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dept_id-container"><span class="select2-selection__rendered" id="select2-dept_id-container"><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                     </span></div>
                  </div> 
           <div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.<span class="required">*</span></label>
                        <input type="tel" name="mobile" id="mobile" class="form-control" value="" onkeypress="phoneno()" maxlength="10" required="">                       </div>
                    </div>        
           </div>
           
           
          
           <div class="row">
           	<div class="col-md-3">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email-Id<span class="required">*</span></label>
                        <input type="email" name="email" id="email" class="form-control" value="" required="">                        </div>
                       </div>
                       
            <div class="col-md-3">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Password<span class="required">*</span></label>
                        <input type="Password" name="Password" id="Password" maxlength="15" class="form-control" value="" required="">                        </div>
                      </div>
                      
             <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Designation<span class="required">*</span></label>
                     
                      <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required="">
                        <option value="">Select designation</option>
                                                <option value="1">HR Manager</option>
                                                <option value="2">Project Manager</option>
                                                <option value="3">Finance Manager</option>
                                                <!-- <option>HR Manager</option>
                        <option>Project Manager</option>
                        <option>Finance Manager</option> -->
                      </select>
                    </div>
                  </div>  
              <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Acces Level<span class="required">*</span></label>
                     
                      <select class="form-control" name="user_role" id="user_role" onchange="getuseraccess(this.value);" required="">
                        <option value="">Select designation</option>
                                                <option value="1">HR Manager</option>
                                                <option value="2">Project Manager</option>
                                                <option value="3">Finance Manager</option>
                                                <!-- <option>HR Manager</option>
                        <option>Project Manager</option>
                        <option>Finance Manager</option> -->
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
                                                    <option value="1">Afghanistan</option>
                                                    <option value="2">Albania</option>
                                                    <option value="3">Algeria</option>
                                                    <option value="4">American Samoa</option>
                                                    <option value="5">Andorra</option>
                                                    <option value="6">Angola</option>
                                                    <option value="7">Anguilla</option>
                                                    <option value="8">Antarctica</option>
                                                    <option value="9">Antigua And Barbuda</option>
                                                    <option value="10">Argentina</option>
                                                    <option value="11">Armenia</option>
                                                    <option value="12">Aruba</option>
                                                    <option value="13">Australia</option>
                                                    <option value="14">Austria</option>
                                                    <option value="15">Azerbaijan</option>
                                                    <option value="16">Bahamas The</option>
                                                    <option value="17">Bahrain</option>
                                                    <option value="18">Bangladesh</option>
                                                    <option value="19">Barbados</option>
                                                    <option value="20">Belarus</option>
                                                    <option value="21">Belgium</option>
                                                    <option value="22">Belize</option>
                                                    <option value="23">Benin</option>
                                                    <option value="24">Bermuda</option>
                                                    <option value="25">Bhutan</option>
                                                    <option value="26">Bolivia</option>
                                                    <option value="27">Bosnia and Herzegovina</option>
                                                    <option value="28">Botswana</option>
                                                    <option value="29">Bouvet Island</option>
                                                    <option value="30">Brazil</option>
                                                    <option value="31">British Indian Ocean Territory</option>
                                                    <option value="32">Brunei</option>
                                                    <option value="33">Bulgaria</option>
                                                    <option value="34">Burkina Faso</option>
                                                    <option value="35">Burundi</option>
                                                    <option value="36">Cambodia</option>
                                                    <option value="37">Cameroon</option>
                                                    <option value="38">Canada</option>
                                                    <option value="39">Cape Verde</option>
                                                    <option value="40">Cayman Islands</option>
                                                    <option value="41">Central African Republic</option>
                                                    <option value="42">Chad</option>
                                                    <option value="43">Chile</option>
                                                    <option value="44">China</option>
                                                    <option value="45">Christmas Island</option>
                                                    <option value="46">Cocos (Keeling) Islands</option>
                                                    <option value="47">Colombia</option>
                                                    <option value="48">Comoros</option>
                                                    <option value="49">Republic Of The Congo</option>
                                                    <option value="50">Democratic Republic Of The Congo</option>
                                                    <option value="51">Cook Islands</option>
                                                    <option value="52">Costa Rica</option>
                                                    <option value="53">Cote D'Ivoire (Ivory Coast)</option>
                                                    <option value="54">Croatia (Hrvatska)</option>
                                                    <option value="55">Cuba</option>
                                                    <option value="56">Cyprus</option>
                                                    <option value="57">Czech Republic</option>
                                                    <option value="58">Denmark</option>
                                                    <option value="59">Djibouti</option>
                                                    <option value="60">Dominica</option>
                                                    <option value="61">Dominican Republic</option>
                                                    <option value="62">East Timor</option>
                                                    <option value="63">Ecuador</option>
                                                    <option value="64">Egypt</option>
                                                    <option value="65">El Salvador</option>
                                                    <option value="66">Equatorial Guinea</option>
                                                    <option value="67">Eritrea</option>
                                                    <option value="68">Estonia</option>
                                                    <option value="69">Ethiopia</option>
                                                    <option value="70">External Territories of Australia</option>
                                                    <option value="71">Falkland Islands</option>
                                                    <option value="72">Faroe Islands</option>
                                                    <option value="73">Fiji Islands</option>
                                                    <option value="74">Finland</option>
                                                    <option value="75">France</option>
                                                    <option value="76">French Guiana</option>
                                                    <option value="77">French Polynesia</option>
                                                    <option value="78">French Southern Territories</option>
                                                    <option value="79">Gabon</option>
                                                    <option value="80">Gambia The</option>
                                                    <option value="81">Georgia</option>
                                                    <option value="82">Germany</option>
                                                    <option value="83">Ghana</option>
                                                    <option value="84">Gibraltar</option>
                                                    <option value="85">Greece</option>
                                                    <option value="86">Greenland</option>
                                                    <option value="87">Grenada</option>
                                                    <option value="88">Guadeloupe</option>
                                                    <option value="89">Guam</option>
                                                    <option value="90">Guatemala</option>
                                                    <option value="91">Guernsey and Alderney</option>
                                                    <option value="92">Guinea</option>
                                                    <option value="93">Guinea-Bissau</option>
                                                    <option value="94">Guyana</option>
                                                    <option value="95">Haiti</option>
                                                    <option value="96">Heard and McDonald Islands</option>
                                                    <option value="97">Honduras</option>
                                                    <option value="98">Hong Kong S.A.R.</option>
                                                    <option value="99">Hungary</option>
                                                    <option value="100">Iceland</option>
                                                    <option value="101" selected="">India</option>
                                                    <option value="102">Indonesia</option>
                                                    <option value="103">Iran</option>
                                                    <option value="104">Iraq</option>
                                                    <option value="105">Ireland</option>
                                                    <option value="106">Israel</option>
                                                    <option value="107">Italy</option>
                                                    <option value="108">Jamaica</option>
                                                    <option value="109">Japan</option>
                                                    <option value="110">Jersey</option>
                                                    <option value="111">Jordan</option>
                                                    <option value="112">Kazakhstan</option>
                                                    <option value="113">Kenya</option>
                                                    <option value="114">Kiribati</option>
                                                    <option value="115">Korea North</option>
                                                    <option value="116">Korea South</option>
                                                    <option value="117">Kuwait</option>
                                                    <option value="118">Kyrgyzstan</option>
                                                    <option value="119">Laos</option>
                                                    <option value="120">Latvia</option>
                                                    <option value="121">Lebanon</option>
                                                    <option value="122">Lesotho</option>
                                                    <option value="123">Liberia</option>
                                                    <option value="124">Libya</option>
                                                    <option value="125">Liechtenstein</option>
                                                    <option value="126">Lithuania</option>
                                                    <option value="127">Luxembourg</option>
                                                    <option value="128">Macau S.A.R.</option>
                                                    <option value="129">Macedonia</option>
                                                    <option value="130">Madagascar</option>
                                                    <option value="131">Malawi</option>
                                                    <option value="132">Malaysia</option>
                                                    <option value="133">Maldives</option>
                                                    <option value="134">Mali</option>
                                                    <option value="135">Malta</option>
                                                    <option value="136">Man (Isle of)</option>
                                                    <option value="137">Marshall Islands</option>
                                                    <option value="138">Martinique</option>
                                                    <option value="139">Mauritania</option>
                                                    <option value="140">Mauritius</option>
                                                    <option value="141">Mayotte</option>
                                                    <option value="142">Mexico</option>
                                                    <option value="143">Micronesia</option>
                                                    <option value="144">Moldova</option>
                                                    <option value="145">Monaco</option>
                                                    <option value="146">Mongolia</option>
                                                    <option value="147">Montserrat</option>
                                                    <option value="148">Morocco</option>
                                                    <option value="149">Mozambique</option>
                                                    <option value="150">Myanmar</option>
                                                    <option value="151">Namibia</option>
                                                    <option value="152">Nauru</option>
                                                    <option value="153">Nepal</option>
                                                    <option value="154">Netherlands Antilles</option>
                                                    <option value="155">Netherlands The</option>
                                                    <option value="156">New Caledonia</option>
                                                    <option value="157">New Zealand</option>
                                                    <option value="158">Nicaragua</option>
                                                    <option value="159">Niger</option>
                                                    <option value="160">Nigeria</option>
                                                    <option value="161">Niue</option>
                                                    <option value="162">Norfolk Island</option>
                                                    <option value="163">Northern Mariana Islands</option>
                                                    <option value="164">Norway</option>
                                                    <option value="165">Oman</option>
                                                    <option value="166">Pakistan</option>
                                                    <option value="167">Palau</option>
                                                    <option value="168">Palestinian Territory Occupied</option>
                                                    <option value="169">Panama</option>
                                                    <option value="170">Papua new Guinea</option>
                                                    <option value="171">Paraguay</option>
                                                    <option value="172">Peru</option>
                                                    <option value="173">Philippines</option>
                                                    <option value="174">Pitcairn Island</option>
                                                    <option value="175">Poland</option>
                                                    <option value="176">Portugal</option>
                                                    <option value="177">Puerto Rico</option>
                                                    <option value="178">Qatar</option>
                                                    <option value="179">Reunion</option>
                                                    <option value="180">Romania</option>
                                                    <option value="181">Russia</option>
                                                    <option value="182">Rwanda</option>
                                                    <option value="183">Saint Helena</option>
                                                    <option value="184">Saint Kitts And Nevis</option>
                                                    <option value="185">Saint Lucia</option>
                                                    <option value="186">Saint Pierre and Miquelon</option>
                                                    <option value="187">Saint Vincent And The Grenadines</option>
                                                    <option value="188">Samoa</option>
                                                    <option value="189">San Marino</option>
                                                    <option value="190">Sao Tome and Principe</option>
                                                    <option value="191">Saudi Arabia</option>
                                                    <option value="192">Senegal</option>
                                                    <option value="193">Serbia</option>
                                                    <option value="194">Seychelles</option>
                                                    <option value="195">Sierra Leone</option>
                                                    <option value="196">Singapore</option>
                                                    <option value="197">Slovakia</option>
                                                    <option value="198">Slovenia</option>
                                                    <option value="199">Smaller Territories of the UK</option>
                                                    <option value="200">Solomon Islands</option>
                                                    <option value="201">Somalia</option>
                                                    <option value="202">South Africa</option>
                                                    <option value="203">South Georgia</option>
                                                    <option value="204">South Sudan</option>
                                                    <option value="205">Spain</option>
                                                    <option value="206">Sri Lanka</option>
                                                    <option value="207">Sudan</option>
                                                    <option value="208">Suriname</option>
                                                    <option value="209">Svalbard And Jan Mayen Islands</option>
                                                    <option value="210">Swaziland</option>
                                                    <option value="211">Sweden</option>
                                                    <option value="212">Switzerland</option>
                                                    <option value="213">Syria</option>
                                                    <option value="214">Taiwan</option>
                                                    <option value="215">Tajikistan</option>
                                                    <option value="216">Tanzania</option>
                                                    <option value="217">Thailand</option>
                                                    <option value="218">Togo</option>
                                                    <option value="219">Tokelau</option>
                                                    <option value="220">Tonga</option>
                                                    <option value="221">Trinidad And Tobago</option>
                                                    <option value="222">Tunisia</option>
                                                    <option value="223">Turkey</option>
                                                    <option value="224">Turkmenistan</option>
                                                    <option value="225">Turks And Caicos Islands</option>
                                                    <option value="226">Tuvalu</option>
                                                    <option value="227">Uganda</option>
                                                    <option value="228">Ukraine</option>
                                                    <option value="229">United Arab Emirates</option>
                                                    <option value="230">United Kingdom</option>
                                                    <option value="231">United States</option>
                                                    <option value="232">United States Minor Outlying Islands</option>
                                                    <option value="233">Uruguay</option>
                                                    <option value="234">Uzbekistan</option>
                                                    <option value="235">Vanuatu</option>
                                                    <option value="236">Vatican City State (Holy See)</option>
                                                    <option value="237">Venezuela</option>
                                                    <option value="238">Vietnam</option>
                                                    <option value="239">Virgin Islands (British)</option>
                                                    <option value="240">Virgin Islands (US)</option>
                                                    <option value="241">Wallis And Futuna Islands</option>
                                                    <option value="242">Western Sahara</option>
                                                    <option value="243">Yemen</option>
                                                    <option value="244">Yugoslavia</option>
                                                    <option value="245">Zambia</option>
                                                    <option value="246">Zimbabwe</option>
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
                     <input type="text" name="pincode" id="pincode" class="form-control" autocomplete="off" value="">                  </div>
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
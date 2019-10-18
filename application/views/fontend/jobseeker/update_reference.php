           

          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                            <div class="userccount">
                               <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                                    <hr>
                   <?php $key = 1 ?>
                    <?php if (!empty($reference_list)): foreach ($reference_list as $v_reference) : ?>
                            <h5>
                      Your Reference No: <?php echo $key; ?>  

                                   <a href="#" data-toggle="modal" data-target="#UdpateReference<?php  echo $v_reference->js_reference_id; ?>" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>                                <a href="<?php echo base_url() ?>/job_seeker/delete_reference/<?php echo $v_reference->js_reference_id ?>" class="pull-right btn  btn-xs" title="Delete" data-toggle="tooltip" data-placement="top" onclick="return confirm('Are you sure want to delete this record ?');"><i class="fa fa-trash-o"></i></a>                   
                            </h5>
                              <div class="table-responsive">          
                            <table class="table">

                              <tbody>
                              <tr>
                                  <td width="30%">Full Name:</td>
                                  <td><?php echo $v_reference->name; ?></td>
                                </tr>

                                <tr>
                                  <td>Orgranization:</td>
                                    <td><?php echo $v_reference->company_profile_id; ?></td>
                                </tr>

                                <tr>
                                  <td>Desigantion:</td>
                              <td><?php echo $v_reference->designation_name; ?></td>
                                </tr>
								<tr>
                                  <td>Mobile:</td>
                                <td><?php echo $v_reference->mobile; ?></td>
                                </tr>

                                <tr>
                                  <td>Email:</td>
                                <td><?php echo $v_reference->email; ?></td>
                                </tr>

                                <tr>
                                  <td>Relation:</td>
                                <td><?php echo $v_reference->relation; ?></td>
                                </tr>
     
                              </tbody>
                            </table>
                            </div>
                     <?php
                    $key++;
                    endforeach;
                    ?><!--get all category if not this empty-->
                    <?php else : ?> <!--get error message if this empty-->
                        <td colspan="3">
                            <strong>There is no Reference to show!</strong>
                        </td><!--/ get error message if this empty-->
                    <?php
                    endif; ?>

                   <hr class="invis">

                    <?php if(!empty($v_reference)): ?>
                                    <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal"  data-target="#addReference">Add More Reference</button></div>
                          <?php else:?>

                            <div class="menu text-right"><button class="btn radius-button btn-primary" data-toggle="modal"  data-target="#addReference">Add Reference</button></div>
                          <?php endif; ?>
                            </div><!-- end post-padding -->
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->



<?php foreach($reference_list as $v_reference): ?>
<div id="UdpateReference<?php echo $v_reference->js_reference_id; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
  
   <?php
    $reference_list=$this->Job_reference_model->get($v_reference->js_reference_id); 
    
   ?>
      <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reference Information</h4>
      </div>
      <div class="modal-body">
         <form id="UpdateEducational-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_reference');?>" method="post" style="padding: 30px;">
              <div class="form-group">
              <input type="hidden" name="reference_info_id" value="<?php echo $v_reference->js_reference_id; ?>">
                <label class="control-label col-sm-3" for="email">Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name"
                   value="<?php
                         if (!empty($reference_list->name)) {
                           echo $reference_list->name;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Orgnization:</label>
                <div class="col-sm-9">
				    <input type="text" class="form-control"  id="edit_company_profile_id" required name="company_profile_id" value="<?php if (!empty($reference_list->company_profile_id)) { echo $reference_list->company_profile_id;} ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation:</label>
                <div class="col-sm-9">
                    <select  name="designation_id" class="form-control">
					<option value="">Select Desigantion</option>
					<?php foreach($designation as $keys){?>
					<option value="<?php echo $keys['designation_id']; ?>"<?php if($reference_list->designation_id==$keys['designation_id']){ echo "selected"; }?>><?php echo $keys['designation_name']; ?></option>
					<?php } ?>
				  </select>
                </div>
              </div>
			  <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country Code:</label>
                <div class="col-sm-9">
											<select id="country" name="country_code" class="form-control" style="height:42px;">
												<option><?php echo $reference_list->country_code?></option>
												<option value="AD - Andorra (+376)">AD - Andorra (+376)</option>
												<option value="AE - United Arab Emirates (+971)">AE - United Arab Emirates (+971)</option>
												<option value="AF - Afghanistan (+93)">AF - Afghanistan (+93)</option>
												<option value="AG - Antigua And Barbuda (+1268)">AG - Antigua And Barbuda (+1268)</option>
												<option value="AI - Anguilla (+1264)">AI - Anguilla (+1264)</option>
												<option value="AL - Albania (+355)">AL - Albania (+355)</option>
												<option value="AM - Armenia (+374)">AM - Armenia (+374)</option>
												<option value="AN - Netherlands Antilles (+599)">AN - Netherlands Antilles (+599)</option>
												<option value="AO - Angola (+244)">AO - Angola (+244)</option>
												<option value="AQ - Antarctica (+672)">AQ - Antarctica (+672)</option>
												<option value="AR - Argentina (+54)">AR - Argentina (+54)</option>
												<option value="AS - American Samoa (+1684)">AS - American Samoa (+1684)</option>
												<option value="AT - Austria (+43)">AT - Austria (+43)</option>
												<option value="AU - Australia (+61)">AU - Australia (+61)</option>
												<option value="AW - Aruba (+297)">AW - Aruba (+297)</option>
												<option value="AZ - Azerbaijan (+994)">AZ - Azerbaijan (+994)</option>
												<option value="BA - Bosnia And Herzegovina (+387)">BA - Bosnia And Herzegovina (+387)</option>
												<option value="BB - Barbados (+1246)">BB - Barbados (+1246)</option>
												<option value="BD - Bangladesh (+880)">BD - Bangladesh (+880)</option>
												<option value="BE - Belgium (+32)">BE - Belgium (+32)</option>
												<option value="BF - Burkina Faso (+226)">BF - Burkina Faso (+226)</option>
												<option value="BG - Bulgaria (+359)">BG - Bulgaria (+359)</option>
												<option value="BH - Bahrain (+973)">BH - Bahrain (+973)</option>
												<option value="BI - Burundi (+257)">BI - Burundi (+257)</option>
												<option value="BJ - Benin (+229)">BJ - Benin (+229)</option>
												<option value="BL - Saint Barthelemy (+590)">BL - Saint Barthelemy (+590)</option>
												<option value="BM - Bermuda (+1441)">BM - Bermuda (+1441)</option>
												<option value="BN - Brunei Darussalam (+673)">BN - Brunei Darussalam (+673)</option>
												<option value="BO - Bolivia (+591)">BO - Bolivia (+591)</option>
												<option value="BR - Brazil (+55)">BR - Brazil (+55)</option>
												<option value="BS - Bahamas (+1242)">BS - Bahamas (+1242)</option>
												<option value="BT - Bhutan (+975)">BT - Bhutan (+975)</option>
												<option value="BW - Botswana (+267)">BW - Botswana (+267)</option>
												<option value="BY - Belarus (+375)">BY - Belarus (+375)</option>
												<option value="BZ - Belize (+501)">BZ - Belize (+501)</option>
												<option value="CA - Canada (+1)">CA - Canada (+1)</option>
												<option value="CC - Cocos (keeling) Islands (+61)">CC - Cocos (keeling) Islands (+61)</option>
												<option value="CD - Congo, The Democratic Republic Of The (+243)">CD - Congo, The Democratic Republic Of The (+243)</option>
												<option value="CF - Central African Republic (+236)">CF - Central African Republic (+236)</option>
												<option value="CG - Congo (+242)">CG - Congo (+242)</option>
												<option value="CH - Switzerland (+41)">CH - Switzerland (+41)</option>
												<option value="CI - Cote D Ivoire (+225)">CI - Cote D Ivoire (+225)</option>
												<option value="CK - Cook Islands (+682)">CK - Cook Islands (+682)</option>
												<option value="CL - Chile (+56)">CL - Chile (+56)</option>
												<option value="CM - Cameroon (+237)">CM - Cameroon (+237)</option>
												<option value="CN - China (+86)">CN - China (+86)</option>
												<option value="CO - Colombia (+57)">CO - Colombia (+57)</option>
												<option value="CR - Costa Rica (+506)">CR - Costa Rica (+506)</option>
												<option value="CU - Cuba (+53)">CU - Cuba (+53)</option>
												<option value="CV - Cape Verde (+238)">CV - Cape Verde (+238)</option>
												<option value="CX - Christmas Island (+61)">CX - Christmas Island (+61)</option>
												<option value="CY - Cyprus (+357)">CY - Cyprus (+357)</option>
												<option value="CZ - Czech Republic (+420)">CZ - Czech Republic (+420)</option>
												<option value="DE - Germany (+49)">DE - Germany (+49)</option>
												<option value="DJ - Djibouti (+253)">DJ - Djibouti (+253)</option>
												<option value="DK - Denmark (+45)">DK - Denmark (+45)</option>
												<option value="DM - Dominica (+1767)">DM - Dominica (+1767)</option>
												<option value="DO - Dominican Republic (+1809)">DO - Dominican Republic (+1809)</option>
												<option value="DZ - Algeria (+213)">DZ - Algeria (+213)</option>
												<option value="EC - Ecuador (+593)">EC - Ecuador (+593)</option>
												<option value="EE - Estonia (+372)">EE - Estonia (+372)</option>
												<option value="EG - Egypt (+20)">EG - Egypt (+20)</option>
												<option value="ER - Eritrea (+291)">ER - Eritrea (+291)</option>
												<option value="ES - Spain (+34)">ES - Spain (+34)</option>
												<option value="ET - Ethiopia (+251)">ET - Ethiopia (+251)</option>
												<option value="FI - Finland (+358)">FI - Finland (+358)</option>
												<option value="FJ - Fiji (+679)">FJ - Fiji (+679)</option>
												<option value="FK - Falkland Islands (malvinas) (+500)">FK - Falkland Islands (malvinas) (+500)</option>
												<option value="FM - Micronesia, Federated States Of (+691)">FM - Micronesia, Federated States Of (+691)</option>
												<option value="FO - Faroe Islands (+298)">FO - Faroe Islands (+298)</option>
												<option value="FR - France (+33)">FR - France (+33)</option>
												<option value="GA - Gabon (+241)">GA - Gabon (+241)</option>
												<option value="GB - United Kingdom (+44)">GB - United Kingdom (+44)</option>
												<option value="GD - Grenada (+1473)">GD - Grenada (+1473)</option>
												<option value="GE - Georgia (+995)">GE - Georgia (+995)</option>
												<option value="GH - Ghana (+233)">GH - Ghana (+233)</option>
												<option value="GI - Gibraltar (+350)">GI - Gibraltar (+350)</option>
												<option value="GL - Greenland (+299)">GL - Greenland (+299)</option>
												<option value="GM - Gambia (+220)">GM - Gambia (+220)</option>
												<option value="GN - Guinea (+224)">GN - Guinea (+224)</option>
												<option value="GQ - Equatorial Guinea (+240)">GQ - Equatorial Guinea (+240)</option>
												<option value="GR - Greece (+30)">GR - Greece (+30)</option>
												<option value="GT - Guatemala (+502)">GT - Guatemala (+502)</option>
												<option value="GU - Guam (+1671)">GU - Guam (+1671)</option>
												<option value="GW - Guinea-bissau (+245)">GW - Guinea-bissau (+245)</option>
												<option value="GY - Guyana (+592)">GY - Guyana (+592)</option>
												<option value="HK - Hong Kong (+852)">HK - Hong Kong (+852)</option>
												<option value="HN - Honduras (+504)">HN - Honduras (+504)</option>
												<option value="HR - Croatia (+385)">HR - Croatia (+385)</option>
												<option value="HT - Haiti (+509)">HT - Haiti (+509)</option>
												<option value="HU - Hungary (+36)">HU - Hungary (+36)</option>
												<option value="ID - Indonesia (+62)">ID - Indonesia (+62)</option>
												<option value="IE - Ireland (+353)">IE - Ireland (+353)</option>
												<option value="IL - Israel (+972)">IL - Israel (+972)</option>
												<option value="IM - Isle Of Man (+44)">IM - Isle Of Man (+44)</option>
												<option value="IN - India (+91)">IN - India (+91)</option>
												<option value="IQ - Iraq (+964)">IQ - Iraq (+964)</option>
												<option value="IR - Iran, Islamic Republic Of (+98">IR - Iran, Islamic Republic Of (+98)</option>
												<option value="IS - Iceland (+354)">IS - Iceland (+354)</option>
												<option value="IT - Italy (+39)">IT - Italy (+39)</option>
												<option value="JM - Jamaica (+1876)">JM - Jamaica (+1876)</option>
												<option value="JO - Jordan (+962)">JO - Jordan (+962)</option>
												<option value="JP - Japan (+81)">JP - Japan (+81)</option>
												<option value="KE - Kenya (+254)">KE - Kenya (+254)</option>
												<option value="KG - Kyrgyzstan (+996)">KG - Kyrgyzstan (+996)</option>
												<option value="KH - Cambodia (+855)">KH - Cambodia (+855)</option>
												<option value="KI - Kiribati (+686)">KI - Kiribati (+686)</option>
												<option value="KM - Comoros (+269)">KM - Comoros (+269)</option>
												<option value="KN - Saint Kitts And Nevis (+1869)">KN - Saint Kitts And Nevis (+1869)</option>
												<option value="KP - Korea Democratic Peoples Republic Of (+850)">KP - Korea Democratic Peoples Republic Of (+850)</option>
												<option value="KR - Korea Republic Of (+82)">KR - Korea Republic Of (+82)</option>
												<option value="KW - Kuwait (+965)">KW - Kuwait (+965)</option>
												<option value="KY - Cayman Islands (+1345)">KY - Cayman Islands (+1345)</option>
												<option value="KZ - Kazakstan (+7)">KZ - Kazakstan (+7)</option>
												<option value="LA - Lao Peoples Democratic Republic (+856)">LA - Lao Peoples Democratic Republic (+856)</option>
												<option value="LB - Lebanon (+961)">LB - Lebanon (+961)</option>
												<option value="LC - Saint Lucia (+1758)">LC - Saint Lucia (+1758)</option>
												<option value="LI - Liechtenstein (+423)">LI - Liechtenstein (+423)</option>
												<option value="LK - Sri Lanka (+94)">LK - Sri Lanka (+94)</option>
												<option value="LR - Liberia (+231)">LR - Liberia (+231)</option>
												<option value="LS - Lesotho (+266)">LS - Lesotho (+266)</option>
												<option value="LT - Lithuania (+370)">LT - Lithuania (+370)</option>
												<option value="LU - Luxembourg (+352)">LU - Luxembourg (+352)</option>
												<option value="LV - Latvia (+371)">LV - Latvia (+371)</option>
												<option value="LY - Libyan Arab Jamahiriya (+218)">LY - Libyan Arab Jamahiriya (+218)</option>
												<option value="MA - Morocco (+212)">MA - Morocco (+212)</option>
												<option value="MC - Monaco (+377)">MC - Monaco (+377)</option>
												<option value="MD - Moldova, Republic Of (+373)">MD - Moldova, Republic Of (+373)</option>
												<option value="ME - Montenegro (+382)">ME - Montenegro (+382)</option>
												<option value="MF - Saint Martin (+1599)">MF - Saint Martin (+1599)</option>
												<option value="MG - Madagascar (+261)">MG - Madagascar (+261)</option>
												<option value="MH - Marshall Islands (+692)">MH - Marshall Islands (+692)</option>
												<option value="MK - Macedonia, The Former Yugoslav Republic Of (+389)">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
												<option value="ML - Mali (+223)">ML - Mali (+223)</option>
												<option value="MM - Myanmar">MM - Myanmar (+95)</option>
												<option value="MN - Mongolia (+976)">MN - Mongolia (+976)</option>
												<option value="MO - Macau (+853)">MO - Macau (+853)</option>
												<option value="MP - Northern Mariana Islands (+1670)">MP - Northern Mariana Islands (+1670)</option>
												<option value="MR - Mauritania (+222)">MR - Mauritania (+222)</option>
												<option value="MS - Montserrat (+1664)">MS - Montserrat (+1664)</option>
												<option value="MT - Malta (+356)">MT - Malta (+356)</option>
												<option value="MU - Mauritius (+230)">MU - Mauritius (+230)</option>
												<option value="MV - Maldives (+960)">MV - Maldives (+960)</option>
												<option value="MW">MV - Maldives (+960)</option>
												<option value="MX - Mexico (+52)">MX - Mexico (+52)</option>
												<option value="MY - Malaysia (+60)">MY - Malaysia (+60)</option>
												<option value="MZ - Mozambique (+258)">MZ - Mozambique (+258)</option>
												<option value="NA - Namibia (+264)">NA - Namibia (+264)</option>
												<option value="NC - New Caledonia (+687)">NC - New Caledonia (+687)</option>
												<option value="NE - Niger (+227)">NE - Niger (+227)</option>
												<option value="NG - Nigeria (+234)">NG - Nigeria (+234)</option>
												<option value="NI - Nicaragua (+505)">NI - Nicaragua (+505)</option>
												<option value="NL - Netherlands (+31)">NL - Netherlands (+31)</option>
												<option value="NO - Norway (+47)">NO - Norway (+47)</option>
												<option value="NP - Nepal (+977)">NP - Nepal (+977)</option>
												<option value="NR - Nauru (+674)">NR - Nauru (+674)</option>
												<option value="NU - Niue (+683)">NU - Niue (+683)</option>
												<option value="NZ - New Zealand (+64)">NZ - New Zealand (+64)</option>
												<option value="OM - Oman (+968)">OM - Oman (+968)</option>
												<option value="PA - Panama (+507)">PA - Panama (+507)</option>
												<option value="PE - Peru (+51)">PE - Peru (+51)</option>
												<option value="PF - French Polynesia (+689)">PF - French Polynesia (+689)</option>
												<option value="PG - Papua New Guinea (+675)">PG - Papua New Guinea (+675)</option>
												<option value="PH - Philippines (+63)">PH - Philippines (+63)</option>
												<option value="PK - Pakistan (+92)">PK - Pakistan (+92)</option>
												<option value="PL - Poland (+48)">PL - Poland (+48)</option>
												<option value="PM - Saint Pierre And Miquelon (+508)">PM - Saint Pierre And Miquelon (+508)</option>
												<option value="PN - Pitcairn (+870)">PN - Pitcairn (+870)</option>
												<option value="PR - Puerto Rico (+1)">PR - Puerto Rico (+1)</option>
												<option value="PT - Portugal (+351)">PT - Portugal (+351)</option>
												<option value="PW - Palau (+680)">PW - Palau (+680)</option>
												<option value="PY - Paraguay (+595">PY - Paraguay (+595)</option>
												<option value="QA - Qatar (+974)">QA - Qatar (+974)</option>
												<option value="RO - Romania (+40)">RO - Romania (+40)</option>
												<option value="RS - Serbia (+381)">RS - Serbia (+381)</option>
												<option value="RU - Russian Federation (+7)">RU - Russian Federation (+7)</option>
												<option value="RW - Rwanda (+250)">RW - Rwanda (+250)</option>
												<option value="SB - Solomon Islands (+677)">SA - Saudi Arabia (+966)</option>
												<option value="SB">SB - Solomon Islands (+677)</option>
												<option value="SC - Seychelles (+248)">SC - Seychelles (+248)</option>
												<option value="SD - Sudan (+249)">SD - Sudan (+249)</option>
												<option value="SE - Sweden (+46)">SE - Sweden (+46)</option>
												<option value="SG - Singapore (+65)">SG - Singapore (+65)</option>
												<option value="SH - Saint Helena (+290)">SH - Saint Helena (+290)</option>
												<option value="SI - Slovenia (+386)">SI - Slovenia (+386)</option>
												<option value="SK - Slovakia (+421)">SK - Slovakia (+421)</option>
												<option value="SL - Sierra Leone (+232)">SL - Sierra Leone (+232)</option>
												<option value="SM - San Marino (+378)">SM - San Marino (+378)</option>
												<option value="SN - Senegal (+221)">SN - Senegal (+221)</option>
												<option value="SO - Somalia (+252)">SO - Somalia (+252)</option>
												<option value="SR - Suriname (+597)">SR - Suriname (+597)</option>
												<option value="ST - Sao Tome And Principe (+239)">ST - Sao Tome And Principe (+239)</option>
												<option value="SV - El Salvador (+503)">SV - El Salvador (+503)</option>
												<option value="SY - Syrian Arab Republic (+963)">SY - Syrian Arab Republic (+963)</option>
												<option value="SZ - Swaziland (+268)">SZ - Swaziland (+268)</option>
												<option value="TC - Turks And Caicos Islands (+1649)">TC - Turks And Caicos Islands (+1649)</option>
												<option value="TD - Chad (+235)">TD - Chad (+235)</option>
												<option value="TG - Togo (+228)">TG - Togo (+228)</option>
												<option value="TH - Thailand (+66)">TH - Thailand (+66)</option>
												<option value="TJ - Tajikistan (+992)">TJ - Tajikistan (+992)</option>
												<option value="TK - Tokelau (+690)">TK - Tokelau (+690)</option>
												<option value="TL - Timor-leste (+670)">TL - Timor-leste (+670)</option>
												<option value="TM - Turkmenistan (+993)">TM - Turkmenistan (+993)</option>
												<option value="TN - Tunisia (+216)">TN - Tunisia (+216)</option>
												<option value="TO - Tonga (+676)">TO - Tonga (+676)</option>
												<option value="TR - Turkey (+90)">TR - Turkey (+90)</option>
												<option value="TT - Trinidad And Tobago (+1868)">TT - Trinidad And Tobago (+1868)</option>
												<option value="TV - Tuvalu (+688)">TV - Tuvalu (+688)</option>
												<option value="TW - Taiwan, Province Of China (+886)">TW - Taiwan, Province Of China (+886)</option>
												<option value="TZ - Tanzania, United Republic Of (+255)">TZ - Tanzania, United Republic Of (+255)</option>
												<option value="UA - Ukraine (+380)">UA - Ukraine (+380)</option>
												<option value="UG - Uganda (+256)">UG - Uganda (+256)</option>
												<option value="US - United States (+1)">US - United States (+1)</option>
												<option value="UY - Uruguay (+598)">UY - Uruguay (+598)</option>
												<option value="UZ - Uzbekistan (+998)">UZ - Uzbekistan (+998)</option>
												<option value="VA - Holy See (vatican City State) (+39)">VA - Holy See (vatican City State) (+39)</option>
												<option value="VC - Saint Vincent And The Grenadines (+1784)">VC - Saint Vincent And The Grenadines (+1784)</option>
												<option value="VE - Venezuela (+58)">VE - Venezuela (+58)</option>
												<option value="VG - Virgin Islands, British (+1284)">VG - Virgin Islands, British (+1284)</option>
												<option value="VI - Virgin Islands, U.s. (+1340)">VI - Virgin Islands, U.s. (+1340)</option>
												<option value="VN - Viet Nam (+84)">VN - Viet Nam (+84)</option>
												<option value="VU - Vanuatu (+678)">VU - Vanuatu (+678)</option>
												<option value="WF - Wallis And Futuna (+681)">WF - Wallis And Futuna (+681)</option>
												<option value="WS - Samoa (+685)">WS - Samoa (+685)</option>
												<option value="XK - Kosovo (+381)">XK - Kosovo (+381)</option>
												<option value="YE - Yemen (+967)">YE - Yemen (+967)</option>
												<option value="YT - Mayotte (+262)">YT - Mayotte (+262)</option>
												<option value="ZA - South Africa (+27)">ZA - South Africa (+27)</option>
												<option value="ZM - Zambia (+260)">ZM - Zambia (+260)</option>
												<option value="ZW - Zimbabwe (+263)">ZW - Zimbabwe (+263)</option>
											</select>			
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Mobile:</label>
                <div class="col-sm-9">
                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your Mobile No"
               value="<?php
                         if (!empty($reference_list->mobile)) {
                           echo $reference_list->mobile;
                           }
                       ?>">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Email:</label>
                <div class="col-sm-9">
                  <input name="email" type="text"  class="form-control" id="email" placeholder="Enter email"

               value="<?php
                         if (!empty($reference_list->email)) {
                           echo $reference_list->email;
                           }
                       ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Relation:</label>
                <div class="col-sm-9">
                  <input name="relation" type="text"  class="form-control" id="rlation" placeholder="Enter relation"

               value="<?php
                         if (!empty($reference_list->relation)) {
                           echo $reference_list->relation;
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
<?php endforeach; ?>


<div id="addReference" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Reference Information</h4>
      </div>
      <div class="modal-body">
         <form id="Reference-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_reference');?>" method="post" style="padding: 30px;">
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Full Name:</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Orgnization:</label>
                <div class="col-sm-9">
                <input type="text" id="company_profile_id" name="company_profile_id" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Designation Name:</label>
                <div class="col-sm-9">
				    <select  name="designation_id" class="form-control">
					<option value="">Select Designation</option>
					<?php foreach($designation as $keys){?>
					<option value="<?php echo $keys['designation_id']; ?>"><?php echo $keys['designation_name']; ?></option>
					<?php } ?>
				  </select>

                </div>
              </div>
			  
			  <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country Code:</label>
                <div class="col-sm-9">
											<select id="country" name="country_code" class="form-control" style="height:42px;">
												
												<option value="AD - Andorra (+376)">AD - Andorra (+376)</option>
												<option value="AE - United Arab Emirates (+971)">AE - United Arab Emirates (+971)</option>
												<option value="AF - Afghanistan (+93)">AF - Afghanistan (+93)</option>
												<option value="AG - Antigua And Barbuda (+1268)">AG - Antigua And Barbuda (+1268)</option>
												<option value="AI - Anguilla (+1264)">AI - Anguilla (+1264)</option>
												<option value="AL - Albania (+355)">AL - Albania (+355)</option>
												<option value="AM - Armenia (+374)">AM - Armenia (+374)</option>
												<option value="AN - Netherlands Antilles (+599)">AN - Netherlands Antilles (+599)</option>
												<option value="AO - Angola (+244)">AO - Angola (+244)</option>
												<option value="AQ - Antarctica (+672)">AQ - Antarctica (+672)</option>
												<option value="AR - Argentina (+54)">AR - Argentina (+54)</option>
												<option value="AS - American Samoa (+1684)">AS - American Samoa (+1684)</option>
												<option value="AT - Austria (+43)">AT - Austria (+43)</option>
												<option value="AU - Australia (+61)">AU - Australia (+61)</option>
												<option value="AW - Aruba (+297)">AW - Aruba (+297)</option>
												<option value="AZ - Azerbaijan (+994)">AZ - Azerbaijan (+994)</option>
												<option value="BA - Bosnia And Herzegovina (+387)">BA - Bosnia And Herzegovina (+387)</option>
												<option value="BB - Barbados (+1246)">BB - Barbados (+1246)</option>
												<option value="BD - Bangladesh (+880)">BD - Bangladesh (+880)</option>
												<option value="BE - Belgium (+32)">BE - Belgium (+32)</option>
												<option value="BF - Burkina Faso (+226)">BF - Burkina Faso (+226)</option>
												<option value="BG - Bulgaria (+359)">BG - Bulgaria (+359)</option>
												<option value="BH - Bahrain (+973)">BH - Bahrain (+973)</option>
												<option value="BI - Burundi (+257)">BI - Burundi (+257)</option>
												<option value="BJ - Benin (+229)">BJ - Benin (+229)</option>
												<option value="BL - Saint Barthelemy (+590)">BL - Saint Barthelemy (+590)</option>
												<option value="BM - Bermuda (+1441)">BM - Bermuda (+1441)</option>
												<option value="BN - Brunei Darussalam (+673)">BN - Brunei Darussalam (+673)</option>
												<option value="BO - Bolivia (+591)">BO - Bolivia (+591)</option>
												<option value="BR - Brazil (+55)">BR - Brazil (+55)</option>
												<option value="BS - Bahamas (+1242)">BS - Bahamas (+1242)</option>
												<option value="BT - Bhutan (+975)">BT - Bhutan (+975)</option>
												<option value="BW - Botswana (+267)">BW - Botswana (+267)</option>
												<option value="BY - Belarus (+375)">BY - Belarus (+375)</option>
												<option value="BZ - Belize (+501)">BZ - Belize (+501)</option>
												<option value="CA - Canada (+1)">CA - Canada (+1)</option>
												<option value="CC - Cocos (keeling) Islands (+61)">CC - Cocos (keeling) Islands (+61)</option>
												<option value="CD - Congo, The Democratic Republic Of The (+243)">CD - Congo, The Democratic Republic Of The (+243)</option>
												<option value="CF - Central African Republic (+236)">CF - Central African Republic (+236)</option>
												<option value="CG - Congo (+242)">CG - Congo (+242)</option>
												<option value="CH - Switzerland (+41)">CH - Switzerland (+41)</option>
												<option value="CI - Cote D Ivoire (+225)">CI - Cote D Ivoire (+225)</option>
												<option value="CK - Cook Islands (+682)">CK - Cook Islands (+682)</option>
												<option value="CL - Chile (+56)">CL - Chile (+56)</option>
												<option value="CM - Cameroon (+237)">CM - Cameroon (+237)</option>
												<option value="CN - China (+86)">CN - China (+86)</option>
												<option value="CO - Colombia (+57)">CO - Colombia (+57)</option>
												<option value="CR - Costa Rica (+506)">CR - Costa Rica (+506)</option>
												<option value="CU - Cuba (+53)">CU - Cuba (+53)</option>
												<option value="CV - Cape Verde (+238)">CV - Cape Verde (+238)</option>
												<option value="CX - Christmas Island (+61)">CX - Christmas Island (+61)</option>
												<option value="CY - Cyprus (+357)">CY - Cyprus (+357)</option>
												<option value="CZ - Czech Republic (+420)">CZ - Czech Republic (+420)</option>
												<option value="DE - Germany (+49)">DE - Germany (+49)</option>
												<option value="DJ - Djibouti (+253)">DJ - Djibouti (+253)</option>
												<option value="DK - Denmark (+45)">DK - Denmark (+45)</option>
												<option value="DM - Dominica (+1767)">DM - Dominica (+1767)</option>
												<option value="DO - Dominican Republic (+1809)">DO - Dominican Republic (+1809)</option>
												<option value="DZ - Algeria (+213)">DZ - Algeria (+213)</option>
												<option value="EC - Ecuador (+593)">EC - Ecuador (+593)</option>
												<option value="EE - Estonia (+372)">EE - Estonia (+372)</option>
												<option value="EG - Egypt (+20)">EG - Egypt (+20)</option>
												<option value="ER - Eritrea (+291)">ER - Eritrea (+291)</option>
												<option value="ES - Spain (+34)">ES - Spain (+34)</option>
												<option value="ET - Ethiopia (+251)">ET - Ethiopia (+251)</option>
												<option value="FI - Finland (+358)">FI - Finland (+358)</option>
												<option value="FJ - Fiji (+679)">FJ - Fiji (+679)</option>
												<option value="FK - Falkland Islands (malvinas) (+500)">FK - Falkland Islands (malvinas) (+500)</option>
												<option value="FM - Micronesia, Federated States Of (+691)">FM - Micronesia, Federated States Of (+691)</option>
												<option value="FO - Faroe Islands (+298)">FO - Faroe Islands (+298)</option>
												<option value="FR - France (+33)">FR - France (+33)</option>
												<option value="GA - Gabon (+241)">GA - Gabon (+241)</option>
												<option value="GB - United Kingdom (+44)">GB - United Kingdom (+44)</option>
												<option value="GD - Grenada (+1473)">GD - Grenada (+1473)</option>
												<option value="GE - Georgia (+995)">GE - Georgia (+995)</option>
												<option value="GH - Ghana (+233)">GH - Ghana (+233)</option>
												<option value="GI - Gibraltar (+350)">GI - Gibraltar (+350)</option>
												<option value="GL - Greenland (+299)">GL - Greenland (+299)</option>
												<option value="GM - Gambia (+220)">GM - Gambia (+220)</option>
												<option value="GN - Guinea (+224)">GN - Guinea (+224)</option>
												<option value="GQ - Equatorial Guinea (+240)">GQ - Equatorial Guinea (+240)</option>
												<option value="GR - Greece (+30)">GR - Greece (+30)</option>
												<option value="GT - Guatemala (+502)">GT - Guatemala (+502)</option>
												<option value="GU - Guam (+1671)">GU - Guam (+1671)</option>
												<option value="GW - Guinea-bissau (+245)">GW - Guinea-bissau (+245)</option>
												<option value="GY - Guyana (+592)">GY - Guyana (+592)</option>
												<option value="HK - Hong Kong (+852)">HK - Hong Kong (+852)</option>
												<option value="HN - Honduras (+504)">HN - Honduras (+504)</option>
												<option value="HR - Croatia (+385)">HR - Croatia (+385)</option>
												<option value="HT - Haiti (+509)">HT - Haiti (+509)</option>
												<option value="HU - Hungary (+36)">HU - Hungary (+36)</option>
												<option value="ID - Indonesia (+62)">ID - Indonesia (+62)</option>
												<option value="IE - Ireland (+353)">IE - Ireland (+353)</option>
												<option value="IL - Israel (+972)">IL - Israel (+972)</option>
												<option value="IM - Isle Of Man (+44)">IM - Isle Of Man (+44)</option>
												<option value="IN - India (+91)">IN - India (+91)</option>
												<option value="IQ - Iraq (+964)">IQ - Iraq (+964)</option>
												<option value="IR - Iran, Islamic Republic Of (+98">IR - Iran, Islamic Republic Of (+98)</option>
												<option value="IS - Iceland (+354)">IS - Iceland (+354)</option>
												<option value="IT - Italy (+39)">IT - Italy (+39)</option>
												<option value="JM - Jamaica (+1876)">JM - Jamaica (+1876)</option>
												<option value="JO - Jordan (+962)">JO - Jordan (+962)</option>
												<option value="JP - Japan (+81)">JP - Japan (+81)</option>
												<option value="KE - Kenya (+254)">KE - Kenya (+254)</option>
												<option value="KG - Kyrgyzstan (+996)">KG - Kyrgyzstan (+996)</option>
												<option value="KH - Cambodia (+855)">KH - Cambodia (+855)</option>
												<option value="KI - Kiribati (+686)">KI - Kiribati (+686)</option>
												<option value="KM - Comoros (+269)">KM - Comoros (+269)</option>
												<option value="KN - Saint Kitts And Nevis (+1869)">KN - Saint Kitts And Nevis (+1869)</option>
												<option value="KP - Korea Democratic Peoples Republic Of (+850)">KP - Korea Democratic Peoples Republic Of (+850)</option>
												<option value="KR - Korea Republic Of (+82)">KR - Korea Republic Of (+82)</option>
												<option value="KW - Kuwait (+965)">KW - Kuwait (+965)</option>
												<option value="KY - Cayman Islands (+1345)">KY - Cayman Islands (+1345)</option>
												<option value="KZ - Kazakstan (+7)">KZ - Kazakstan (+7)</option>
												<option value="LA - Lao Peoples Democratic Republic (+856)">LA - Lao Peoples Democratic Republic (+856)</option>
												<option value="LB - Lebanon (+961)">LB - Lebanon (+961)</option>
												<option value="LC - Saint Lucia (+1758)">LC - Saint Lucia (+1758)</option>
												<option value="LI - Liechtenstein (+423)">LI - Liechtenstein (+423)</option>
												<option value="LK - Sri Lanka (+94)">LK - Sri Lanka (+94)</option>
												<option value="LR - Liberia (+231)">LR - Liberia (+231)</option>
												<option value="LS - Lesotho (+266)">LS - Lesotho (+266)</option>
												<option value="LT - Lithuania (+370)">LT - Lithuania (+370)</option>
												<option value="LU - Luxembourg (+352)">LU - Luxembourg (+352)</option>
												<option value="LV - Latvia (+371)">LV - Latvia (+371)</option>
												<option value="LY - Libyan Arab Jamahiriya (+218)">LY - Libyan Arab Jamahiriya (+218)</option>
												<option value="MA - Morocco (+212)">MA - Morocco (+212)</option>
												<option value="MC - Monaco (+377)">MC - Monaco (+377)</option>
												<option value="MD - Moldova, Republic Of (+373)">MD - Moldova, Republic Of (+373)</option>
												<option value="ME - Montenegro (+382)">ME - Montenegro (+382)</option>
												<option value="MF - Saint Martin (+1599)">MF - Saint Martin (+1599)</option>
												<option value="MG - Madagascar (+261)">MG - Madagascar (+261)</option>
												<option value="MH - Marshall Islands (+692)">MH - Marshall Islands (+692)</option>
												<option value="MK - Macedonia, The Former Yugoslav Republic Of (+389)">MK - Macedonia, The Former Yugoslav Republic Of (+389)</option>
												<option value="ML - Mali (+223)">ML - Mali (+223)</option>
												<option value="MM - Myanmar">MM - Myanmar (+95)</option>
												<option value="MN - Mongolia (+976)">MN - Mongolia (+976)</option>
												<option value="MO - Macau (+853)">MO - Macau (+853)</option>
												<option value="MP - Northern Mariana Islands (+1670)">MP - Northern Mariana Islands (+1670)</option>
												<option value="MR - Mauritania (+222)">MR - Mauritania (+222)</option>
												<option value="MS - Montserrat (+1664)">MS - Montserrat (+1664)</option>
												<option value="MT - Malta (+356)">MT - Malta (+356)</option>
												<option value="MU - Mauritius (+230)">MU - Mauritius (+230)</option>
												<option value="MV - Maldives (+960)">MV - Maldives (+960)</option>
												<option value="MW">MV - Maldives (+960)</option>
												<option value="MX - Mexico (+52)">MX - Mexico (+52)</option>
												<option value="MY - Malaysia (+60)">MY - Malaysia (+60)</option>
												<option value="MZ - Mozambique (+258)">MZ - Mozambique (+258)</option>
												<option value="NA - Namibia (+264)">NA - Namibia (+264)</option>
												<option value="NC - New Caledonia (+687)">NC - New Caledonia (+687)</option>
												<option value="NE - Niger (+227)">NE - Niger (+227)</option>
												<option value="NG - Nigeria (+234)">NG - Nigeria (+234)</option>
												<option value="NI - Nicaragua (+505)">NI - Nicaragua (+505)</option>
												<option value="NL - Netherlands (+31)">NL - Netherlands (+31)</option>
												<option value="NO - Norway (+47)">NO - Norway (+47)</option>
												<option value="NP - Nepal (+977)">NP - Nepal (+977)</option>
												<option value="NR - Nauru (+674)">NR - Nauru (+674)</option>
												<option value="NU - Niue (+683)">NU - Niue (+683)</option>
												<option value="NZ - New Zealand (+64)">NZ - New Zealand (+64)</option>
												<option value="OM - Oman (+968)">OM - Oman (+968)</option>
												<option value="PA - Panama (+507)">PA - Panama (+507)</option>
												<option value="PE - Peru (+51)">PE - Peru (+51)</option>
												<option value="PF - French Polynesia (+689)">PF - French Polynesia (+689)</option>
												<option value="PG - Papua New Guinea (+675)">PG - Papua New Guinea (+675)</option>
												<option value="PH - Philippines (+63)">PH - Philippines (+63)</option>
												<option value="PK - Pakistan (+92)">PK - Pakistan (+92)</option>
												<option value="PL - Poland (+48)">PL - Poland (+48)</option>
												<option value="PM - Saint Pierre And Miquelon (+508)">PM - Saint Pierre And Miquelon (+508)</option>
												<option value="PN - Pitcairn (+870)">PN - Pitcairn (+870)</option>
												<option value="PR - Puerto Rico (+1)">PR - Puerto Rico (+1)</option>
												<option value="PT - Portugal (+351)">PT - Portugal (+351)</option>
												<option value="PW - Palau (+680)">PW - Palau (+680)</option>
												<option value="PY - Paraguay (+595">PY - Paraguay (+595)</option>
												<option value="QA - Qatar (+974)">QA - Qatar (+974)</option>
												<option value="RO - Romania (+40)">RO - Romania (+40)</option>
												<option value="RS - Serbia (+381)">RS - Serbia (+381)</option>
												<option value="RU - Russian Federation (+7)">RU - Russian Federation (+7)</option>
												<option value="RW - Rwanda (+250)">RW - Rwanda (+250)</option>
												<option value="SB - Solomon Islands (+677)">SA - Saudi Arabia (+966)</option>
												<option value="SB">SB - Solomon Islands (+677)</option>
												<option value="SC - Seychelles (+248)">SC - Seychelles (+248)</option>
												<option value="SD - Sudan (+249)">SD - Sudan (+249)</option>
												<option value="SE - Sweden (+46)">SE - Sweden (+46)</option>
												<option value="SG - Singapore (+65)">SG - Singapore (+65)</option>
												<option value="SH - Saint Helena (+290)">SH - Saint Helena (+290)</option>
												<option value="SI - Slovenia (+386)">SI - Slovenia (+386)</option>
												<option value="SK - Slovakia (+421)">SK - Slovakia (+421)</option>
												<option value="SL - Sierra Leone (+232)">SL - Sierra Leone (+232)</option>
												<option value="SM - San Marino (+378)">SM - San Marino (+378)</option>
												<option value="SN - Senegal (+221)">SN - Senegal (+221)</option>
												<option value="SO - Somalia (+252)">SO - Somalia (+252)</option>
												<option value="SR - Suriname (+597)">SR - Suriname (+597)</option>
												<option value="ST - Sao Tome And Principe (+239)">ST - Sao Tome And Principe (+239)</option>
												<option value="SV - El Salvador (+503)">SV - El Salvador (+503)</option>
												<option value="SY - Syrian Arab Republic (+963)">SY - Syrian Arab Republic (+963)</option>
												<option value="SZ - Swaziland (+268)">SZ - Swaziland (+268)</option>
												<option value="TC - Turks And Caicos Islands (+1649)">TC - Turks And Caicos Islands (+1649)</option>
												<option value="TD - Chad (+235)">TD - Chad (+235)</option>
												<option value="TG - Togo (+228)">TG - Togo (+228)</option>
												<option value="TH - Thailand (+66)">TH - Thailand (+66)</option>
												<option value="TJ - Tajikistan (+992)">TJ - Tajikistan (+992)</option>
												<option value="TK - Tokelau (+690)">TK - Tokelau (+690)</option>
												<option value="TL - Timor-leste (+670)">TL - Timor-leste (+670)</option>
												<option value="TM - Turkmenistan (+993)">TM - Turkmenistan (+993)</option>
												<option value="TN - Tunisia (+216)">TN - Tunisia (+216)</option>
												<option value="TO - Tonga (+676)">TO - Tonga (+676)</option>
												<option value="TR - Turkey (+90)">TR - Turkey (+90)</option>
												<option value="TT - Trinidad And Tobago (+1868)">TT - Trinidad And Tobago (+1868)</option>
												<option value="TV - Tuvalu (+688)">TV - Tuvalu (+688)</option>
												<option value="TW - Taiwan, Province Of China (+886)">TW - Taiwan, Province Of China (+886)</option>
												<option value="TZ - Tanzania, United Republic Of (+255)">TZ - Tanzania, United Republic Of (+255)</option>
												<option value="UA - Ukraine (+380)">UA - Ukraine (+380)</option>
												<option value="UG - Uganda (+256)">UG - Uganda (+256)</option>
												<option value="US - United States (+1)">US - United States (+1)</option>
												<option value="UY - Uruguay (+598)">UY - Uruguay (+598)</option>
												<option value="UZ - Uzbekistan (+998)">UZ - Uzbekistan (+998)</option>
												<option value="VA - Holy See (vatican City State) (+39)">VA - Holy See (vatican City State) (+39)</option>
												<option value="VC - Saint Vincent And The Grenadines (+1784)">VC - Saint Vincent And The Grenadines (+1784)</option>
												<option value="VE - Venezuela (+58)">VE - Venezuela (+58)</option>
												<option value="VG - Virgin Islands, British (+1284)">VG - Virgin Islands, British (+1284)</option>
												<option value="VI - Virgin Islands, U.s. (+1340)">VI - Virgin Islands, U.s. (+1340)</option>
												<option value="VN - Viet Nam (+84)">VN - Viet Nam (+84)</option>
												<option value="VU - Vanuatu (+678)">VU - Vanuatu (+678)</option>
												<option value="WF - Wallis And Futuna (+681)">WF - Wallis And Futuna (+681)</option>
												<option value="WS - Samoa (+685)">WS - Samoa (+685)</option>
												<option value="XK - Kosovo (+381)">XK - Kosovo (+381)</option>
												<option value="YE - Yemen (+967)">YE - Yemen (+967)</option>
												<option value="YT - Mayotte (+262)">YT - Mayotte (+262)</option>
												<option value="ZA - South Africa (+27)">ZA - South Africa (+27)</option>
												<option value="ZM - Zambia (+260)">ZM - Zambia (+260)</option>
												<option value="ZW - Zimbabwe (+263)">ZW - Zimbabwe (+263)</option>
											</select>			
                </div>
              </div>
			  
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Mobile:</label>
                <div class="col-sm-9">
                  <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter Your Mobile No">
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Email:</label>
                <div class="col-sm-9">
                  <input name="email" type="text"  class="form-control" id="email" placeholder="Enter email">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Relation:</label>
                <div class="col-sm-9">
                  <input name="relation" type="text"  class="form-control" id="relation" placeholder="Enter Realtion ">
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



  <script type="text/javascript">

        $( document ).ready( function () {
               // Education Add form Valiaton
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

    $(function() {
      $("#company_profile_id").autocomplete({
          source: "<?php echo base_url('job_seeker/get_autocomplete'); ?>",
          select: function(a,b)
            {
              $(this).val(b.item.value); //grabed the selected value
            }
        });
    });
    $(function() {
      $("#edit_company_profile_id").autocomplete({
          source: "<?php echo base_url('job_seeker/get_autocomplete'); ?>",
          select: function(a,b)
            {
              $(this).val(b.item.value); //grabed the selected value
            }
        });
    });
            </script>

 <style>
  ul.ui-autocomplete {
      z-index: 1100;
  }
</style>
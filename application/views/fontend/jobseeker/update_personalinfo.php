


          <div class="section lb">
                <div class="container">
                    <div class="row">
                        <?php $this->load->view('fontend/layout/seeker_left.php'); ?>

                        <div class="content col-md-9">
                             <div class="userccount">
                              <?php $this->load->view('fontend/layout/seeker_resumemenu.php'); ?>
                             
                             <div class="tab-content">
                             
                                 <!-- Your Personal Information -->
                                 <div id="vspinfo" class="tab-pane fade in active">
                                <h5>Your Personal Information
                                <a href="#" data-toggle="modal" data-target="#PersonalinfoUpdate" class="btn pull-right bg-navy btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>                
                                </h5>
                                  <div class="table-responsive">          
                                <table class="table">
    
                                  <tbody>
                                  <tr>
                                      <td width="30%">Father Name:</td>
                                      <td><?php if(!empty($js_personal_info->father_name))
                                              echo $js_personal_info->father_name;
                                              else echo "";
                                       ?></td>
                                    </tr>
    
                                    <tr>
                                      <td>Mother Name:</td>
                                        <td><?php if(!empty($js_personal_info->mother_name))
                                        echo $js_personal_info->mother_name; ?></td>
                                    </tr>
    
                                    <tr>
                                      <td>Date of Birth:</td>
                                  <td><?php if($js_personal_info->date_of_birth=="0000-00-00") {
                                    echo "";
                                  } else {
                                          echo date('j F Y',strtotime($js_personal_info->date_of_birth));
                                    }
                                   ?></td>
                                    </tr>
    
                                    <tr>
                                      <td>National ID:</td>
                                    <td><?php if($js_personal_info->national_id=="0") { echo "";} else { echo $js_personal_info->national_id;} ?></td>
                                    </tr>
                                    <tr>
                                      <td>Nationality:</td>
                                    <td><?php echo $js_personal_info->nationality; ?></td>
                                    </tr>
                                     <tr>
                                      <td>Mobile:</td>
                                    <td>+91<?php echo $js_personal_info->mobile; ?></td>
                                    </tr>
                                    <tr>
                                      <td>Present Address:</td>
                                    <td><?php echo $js_personal_info->present_address; ?></td>
                                    </tr>               
                                     <tr>
                                      <td>Parmanent Address:</td>
                                    <td><?php echo $js_personal_info->parmanent_address; ?></td>
                                    </tr>
         
                                  </tbody>
                                </table>
                                </div>
                                
                                
                              
                                
                                </div>
                  				 
                             
                  
                  				</div>
                  				
                            </div>
                        </div><!-- end col -->
                    </div><!-- end row -->  
                </div><!-- end container -->
            </div><!-- end section -->




<!-- Modal -->
<div id="PersonalinfoUpdate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Personal Information</h4>
      </div>
      <div class="modal-body">
         <form id="Personal-info" class="form-horizontal" action="<?php echo base_url('job_seeker/update_personalinfo');?>"  method="post" autocomplete="off">
              <input type="hidden" value="<?php echo $js_personal_info->job_personal_info_id; ?>" name="js_personal_info_id">
              
              <div class="row">
              <div class="col-md-8 col-md-offset-2">
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="email">Father Name:</label></span>
                  <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Enter Father Name"
                   value="<?php
                         if (!empty($js_personal_info->father_name)) {
                           echo $js_personal_info->father_name;
                           }
                       ?>">
                </div>              
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="email">Mother Name:</label></span>
                  <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Enter Mother Title"
                   value="<?php
                         if (!empty($js_personal_info->mother_name)) {
                           echo $js_personal_info->mother_name;
                           }
                       ?>">
              </div>
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="email">Date of Birth:</label></span>
                  <input class="datepicker form-control"  required name="date_of_birth" value="<?php
                         if  (!empty($js_personal_info->date_of_birth=="0000-00-00")) {
                           echo ""; } else { echo  date('d/m/Y',strtotime($js_personal_info->date_of_birth));}
                       ?>" class="form-control" >
              </div>
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="email">Nationality:</label></span>
                  <select name="nationality" class="form-control" id="national_id">
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                  </select>
              </div>
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="pwd">Adhar NO:</label></span>
                  <input name="national_id" type="text"  class="form-control" id="national_id" placeholder="Enter Adhar No "

               value="<?php
                         if (!empty($js_personal_info->national_id)) {
                           echo $js_personal_info->national_id;
                           }
                       ?>">
              </div>
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="pwd"> Mobile:</label></span>
                  <input name="mobile" type="text"  class="form-control" id="mobile" placeholder="Home/Emargency Contact"

               value="<?php
                         if (!empty($js_personal_info->mobile)) {
                           echo $js_personal_info->mobile;
                           }
                       ?>">
              </div>
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="pwd">Present Address</label></span>
                  <textarea name="present_address" class="form-control" rows="5" id="comment"><?php 
                         if (!empty($js_personal_info->present_address)) {
                           echo $js_personal_info->present_address;
                           }
                       ?></textarea>
              </div>
              
              <div class="input-group">
                  <span class="input-group-addon"><label class="control-label col-sm-3" for="pwd">Parmanent Address</label></span>
                  <textarea name="parmanent_address" class="form-control" rows="5" id="comment"><?php 
                         if (!empty($js_personal_info->parmanent_address)) {
                           echo $js_personal_info->parmanent_address;
                           }
                       ?></textarea>
              </div>
              
              <button type="submit" class="btn btn-default">Submit</button>
              </div>
              </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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
                        minlength:11,
                    },

                    present_address: {
                        required: true,
                    },
                     parmanent_address : {
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
            
            
      
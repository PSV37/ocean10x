<?php 

$company_profile_id = $this->session->userdata('company_profile_id');

 $this->load->view('fontend/layout/employer_new_header.php');
 
?>
<?php $employer_id=$this->session->userdata('company_profile_id'); 
                $type=$this->session->userdata('comp_type');

                $logo=10;
                $full_profile=50;
                $Corporate_docs=40;

                $full_profile_each=$full_profile/12;
                $Corporate_docs_each=$Corporate_docs/4;
                $wheres="status='0' AND company_profile_id='$employer_id'";
                 $branches = $this->Master_model->getMaster('company_branches',$where=$wheres);
                $company_info = $this->company_profile_model->get($employer_id);
                // print_r($Corporate_docs_each);die;

                if (isset($company_info->company_logo) && !empty($company_info->company_logo)) {
                    $logo_total=$logo;
                }

                if (isset($company_info->company_name) && !empty($company_info->company_name)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->company_email) && !empty($company_info->company_email)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->company_phone) && !empty($company_info->company_phone)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->company_category) && !empty($company_info->company_category)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->contact_person_name) && !empty($company_info->contact_person_name)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->cont_person_level) && !empty($company_info->cont_person_level)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->cont_person_email) && !empty($company_info->cont_person_email)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->cont_person_mobile) && !empty($company_info->cont_person_mobile)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->company_address) && !empty($company_info->company_address)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->country_id) && !empty($company_info->country_id)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->state_id) && !empty($company_info->state_id)) {
                     $profile_details_total += $full_profile_each;
                }

                if (isset($company_info->city_id) && !empty($company_info->city_id)) {
                    $profile_details_total += $full_profile_each;
                }

                if (isset($branches) && !empty($branches)) {
                    $profile_details_total += $full_profile_each;
                }

                 $whereres = "company_profile_id='$employer_id' and status!='1'";
                 // $select='document_type'
         $documents = $this->Master_model->getMaster('corporate_documents',$whereres,$join = FALSE, $order = false, $field = false, $select = FALSE,$limit=false,$start=false, $search=false);
          // print_r($documents);

         

                if (isset($documents) && !empty($documents)) {
                   foreach ($documents as $row) {
          
                  if ($row['document_type']=='Incorporation') {
                      $Corporate_docs_total += $Corporate_docs_each;
                  }
                  if ($row['document_type']=='PAN') {
                      $Corporate_docs_total += $Corporate_docs_each;
                  }
                  if ($row['document_type']=='GSTIN') {
                      $Corporate_docs_total += $Corporate_docs_each;
                  }
                  if ($row['document_type']=='Add_proof') {
                      $Corporate_docs_total += $Corporate_docs_each;
                  }
                }
                    
                }
                $profile_total=$Corporate_docs_total+$profile_details_total+$logo;


          ?>
<style>

.edit-profile{margin-top:41px;
border-radius:13px;}
.header-profile {
    background-color: #18c5bd1f;
    /* float: left; */
    padding: 20px;
    box-shadow: -1px 1px 2px #eae8e8;
    border-radius:13px 13px 0px 0px;
    }   

.progresss {
    background-color: #e5edf5;
    height: 18px;
    border-radius: 19px;
    margin-top: 30px;
    box-shadow: -1px -1px 4px #dededeb0;
}
.progress-bar {
    float: left;
    width: 0%;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #128f89;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
    border-radius: 20px;
}
.university{font-size: 12px;
    line-height:0px;
    color: #4e4e4e;}
.f-1{margin-top:170px;} 
.f-2{margin-top:30px;}
.f-3{margin-top:30px;}
.f-4{margin-top:30px;}
.f-5{margin-top:30px;}
.f-6{margin-top:30px;}
.f-7{margin-top:30px;}
.f-8{margin-top:30px;}
.f-9{margin-top:30px;}
.f-10{margin-top:30px;}
.f-11{margin-top:30px;}
.col-md-9.edit-profile {
   margin-bottom:20px;
    padding-left: 0px;
    padding-right: 0px;
    border: solid 1px #e8e7e7;
    box-shadow: -1px 2px 4px #e8e6e6;
    background-color:#fff;
}
.forms {
    padding: 0px 35px;
} 
.img-thumbnail-profile {
    padding: .25rem;
    background-color: #fff;
    border: 3px solid #fff;
    border-radius: .25rem;
    max-width: 100%;
    height: auto;   
    box-shadow:inset 0px 0px 4px #e4e2e2;
}
label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 5px;
    font-weight: bolder;
    font-size: 12px;
}
.form-control{
    color:#99abaad9;}
.btn-save-profile {
    background-color: #14b1aa;
   padding: 3px 3PX;
    text-align: center;
    width: 20%;
   
    
    line-height: 30px;
    
    BORDER-RADIUS: 41PX;
    margin-top: 30px;
    margin-bottom: 20px;
 
    color: #fff;
    cursor: pointer;
}
.btn-save-profile:hover {
    background-color:#0d807a;
    transition:1s;
}

</style>


<div class="container-fluid main-d">
    <div class="container">
        <form id="submit" action="" method="post" class="submit-form" enctype="multipart/form-data"  >
        <input type="hidden" name="company_profile_id" value="<?php echo $company_info->company_profile_id;?>">
        <div class="col-md-12">
            <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
                <div class="col-md-9 edit-profile">
                    <div class="col-md-12 header-profile">
                        <div class="col-md-2">   
                            <img src="<?php echo base_url() ?>upload/<?php echo $this->company_profile_model->company_logoby_id($company_profile_id);?>" style="height:80px;width:80px;border-radius:50%;" class="img-thumbnail-profile" />
                        </div>
                        <div class="col-md-9" style="margin-left:-35px;">   
                            <p style="font-size:18px;"><?php echo $this->company_profile_model->company_name($company_profile_id); ?></p>
                            <p class="university">Nagpur University </p>
                            <div class="progresss">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                          <?php echo $profile_total; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="forms">
                      <div class="row f-1">
                        <div class="col-md-6 col-sm-12">   
                          <div class="formrow">
                            <label class="control-label">Company Name:</label>
                            <input type="text" required="" name="company_name" class="form-control" placeholder="Company Name" value="<?php if(!empty($company_info->company_name)){ echo $company_info->company_name; } ?>" class="form-control" placeholder="Company Name">
                          </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="formrow">
                                <label class="control-label">Company Email: </label>
                                <input type="text" readonly="" name="company_email" class="form-control" placeholder="Company Email" value="<?php  if(!empty($company_info->company_email)){ echo $company_info->company_email; } ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row f-2">
                        <div class="col-md-6 col-sm-12">   
                          <div class="formrow">
                            <label class="control-label">Alternate Email ID <span class="required">*</span></label>
                            <input type="text" required="" name="alternate_email_id"  class="form-control" placeholder="Alternate Email ID" value="<?php if(!empty($company_info->alternate_email_id)){ echo $company_info->alternate_email_id; } ?>">
                           </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                          <div class="formrow">
                            <label class="control-label">Company URL:</label>
                            <input type="text" name="company_url"  class="form-control" placeholder="Company Website" value="<?php  if(!empty($company_info->company_url)){ echo $company_info->company_url; } ?>">
                            </div>
                        </div>
                  </div>
                  <div class="row f-3">
                    <div class="col-md-6 col-sm-12">
                      <div class="formrow">
                        <label class="control-label">Country Code:</label>
                        <select id="country" name="country_code" class="form-control country_code select2-hidden-accessible"  aria-hidden="true">
                            <option>IN - India (+91)</option>
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
                <div class="col-md-6 col-sm-12">
                    <div class="formrow">
                    <label class="control-label">Company Phone:</label>
                      <input type="tel" required="" name="company_phone"  class="allownumericwithdecimal form-control" maxlength="10" id="company_phone" value="<?php 
                       if(!empty($company_info->company_phone)){ echo $company_info->company_phone; } ?>" onkeypress="phoneno()">   
                    </div>
                </div>
            </div>
            <div class="row f-4">
              <div class="col-md-6 col-sm-12">
                <div class="formrow">
                 <label class="control-label">Company Services:</label>
                  <select name="company_category"  class="form-control services select2-hidden-accessible" required="" data-style="btn-default" data-live-search="true" tabindex="-1" aria-hidden="true">
                    <option value="">Select Services</option> 
                      <?php if(!empty($company_info->company_category)) {
                      echo $this->job_category_model->selected($company_info->company_category);
                      } else {
                         echo $this->job_category_model->selected();
                      }
                       ?><?php echo form_error('company_category'); ?></select>
                </div>
              </div>
              <div class="col-md-6 col-sm-12">
                <div class="formrow">
                   <label class="control-label">Company Contact Person:<span class="required">*</span></label>  
                  <input type="text" name="contact_name" required="" class="form-control" id="contact_name" placeholder="Contact Name">
                </div>
              </div>
                                   
            </div>   
            <div class="row f-5">
                <div class="col-md-6 col-sm-12">
                    <div class="formrow">
                      <label class="control-label">Contact Person Level:</label>
                      <input type="text" required="" name="cont_person_level" id="cont_person_level" class="form-control" placeholder="E.g. Administrator" value="<?php  if(!empty($company_info->contact_name)){ echo $company_info->contact_name; } ?>">                                          
                    </div>
                </div>
              <div class="col-md-6 col-sm-12">
               <div class="formrow">
                  <label class="control-label">Contact Person Email:</label>
                  <input type="text" name="cont_person_email" id="cont_person_email" required="" class="form-control" value="<?php if(!empty($company_info->cont_person_email)){ echo $company_info->cont_person_email; } ?>">                  
                </div>
              </div>
            </div>     
            <div class="row f-6">
                <div class="col-md-6 col-sm-12">
                    <div class="formrow">
                    <label class="control-label">Contact Person Mobile: <span class="required">*</span></label>
                     <input type="text" name="cont_person_mobile" id="cont_person_mobile" class="form-control" value="<?php  if(!empty($company_info->cont_person_mobile)){ echo $company_info->cont_person_mobile; } ?>" onkeypress="phonenoo()" maxlength="10" required="">                    
                   </div>
              </div>
            </div>
                                    
            <div class="row f-7">
              <div class="col-md-12 col-sm-12">
               <div class="formrow">
                <label class="control-label">Company Address-1: <span class="required">*</span></label>
                  <textarea name="company_address" class="form-control ckeditor" placeholder="Company Address"><?php if(!empty($company_info->company_address)){ echo $company_info->company_address; } ?></textarea>
                </div>
              </div>
            </div>    
            <div class="row f-8">
              <div class="col-md-12 col-sm-12">
               <div class="formrow">
                <label class="control-label">Company Address-2: <span class="required">*</span></label>
                  <textarea name="company_address" class="form-control ckeditor" placeholder="Company Address"><?php if(!empty($company_info->company_address)){ echo $company_info->company_address2;
                                               } ?></textarea>        
                </div>
              </div>
             </div>
            <div class="row f-9">
                <div class="col-md-4 col-sm-4">
                  <div class="formrow">
                    <label class="control-label">Company Country: <span class="required">*</span></label>
                    <select name="country_id" id="country_id" class="form-control country select2-hidden-accessible" onchange="getStates(this.value)" tabindex="-1" aria-hidden="true"><?php foreach($country as $key){?>
                      <option value="<?php echo $key['country_id']; ?>"<?php if($company_info->country_id==$key['country_id']){ echo "selected"; }?>><?php echo $key['country_name']; ?></option>
                      <?php } ?>
                  </select>
                  </div>
                </div>
            <div class="col-md-4 col-sm-4">
                <div class="formrow">
                    <label class="control-label">Company State: <span class="required">*</span></label>
                    <select name="state_id" id="state_id" class="form-control" onchange="getCitys(this.value)"><option value="">Select State</option>
                    </select>
                </div>
             </div>
            <div class="col-md-4 col-sm-4">
                <div class="formrow">
                    <label class="control-label">Company City: <span class="required">*</span></label>
                    <select name="city_id" id="city_id" class="form-control">
                        <option value="">Select City</option>
                    </select>
                  </div>
                </div>
              </div>
            <div class="row f-10">
                <div class="col-md-6 col-sm-6">
                    <div class="formrow">
                        <label class="control-label">Pincode: <span class="required">*</span></label>
                        <input type="text" name="company_pincode" id="company_pincode" required="" class="form-control ui-autocomplete-input" value="412205, KELEWADI, KELEWADI, MAHARASHTRA" autocomplete="off">                
                         </div>
                         </div>
                       </div>    
              <div class="row f-11">
                <div class="col-md-6 col-sm-6">
                    <div class="formrow">
                    <label class="control-label">Company Logo<small> company logo measures 300 x 300 pixels </small></label>
                    <input type="file" name="company_logo" value="4ce62c1e36ede93d46de44f1de63c4f0.jpg" class="form-control">
                    </div>
                </div>
                                        

              </div>   
              <button class="btn-save-profile">save</button>            
        </div>
      </div>
    </div>
</form>
  </div>
</div>
<script>
  $(".allownumericwithdecimal").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script> 
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!-- jquery validation plugin //-->
<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
<script type="text/javascript" src="validation_reg.js"></script>
<script src="js/jquery.validate.js"></script>


<script>

$(document).ready(function()

{

$("#submit").validate (  

{

rules:{

'company_phone':{

required: true,

minlength: 10,

maxlength: 10
//company_phone_regex: true

},


'company_name':{

required: true,

companyname_regex: true

},

'contact_name':{

required: true,

contactname_regex: true

},

'cont_person_level': {

required: true,

contpersonlevel_regex: true

}, 

'alternate_email_id':{

required: true,

email: true


},

'cont_person_email':{

required: true,

email: true


},

'cont_person_mobile': {
                
  minlength:10,
        
  maxlength:10,

  required: true
},

'company_url':{

required: true,

url: true

},


'company_pincode':{

required: true,

companypincode_regex: true

}





},

messages:{

'company_name':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!"

},

'cont_person_mobile':{

  required: "The name field is mandatory!",

  matches: "Didn't match!", 
        
  minlength: "Please Enter 10 digit phone numbers!",
        
  maxlength: "Maximum length 10 digits!"
},

'contact_name':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!"

},

'cont_person_level':{

required: "The name field is mandatory!",

maxlength: "Choose a company name of at least 14 letters!"

},

'company_phone':{

required: "The username field is mandatory!",

minlength: "Please Enter 10 digit phone numbers!",

company_phone_regex: "You have used invalid characters. Are permitted only letters numbers!",

remote: "The username is already in use by another user!"

},


'alternate_email_id':{

required: "The Email is required!",

email: "Please enter a valid email address!",

remote: "The email is already in use by another user!"

},

'cont_person_email' :{

required: "The Email is required!",

email: "Please enter a valid email address!",

remote: "The email is already in use by another user!"

},

'company_url':{

required: "The Web Address is required!"

},

'username':{

required: "The username field is mandatory!",

minlength: "Choose a username of at least 4 letters!",

username_regex: "You have used invalid characters. Are permitted only letters numbers!",

remote: "The username is already in use by another user!"

}

}

});

});

</script>

<script >
  $.validator.addMethod("companyname_regex", function(value, element) {

return this.optional(element) || /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/i.test(value);

}, "Please choose only alphabets");

 
  $.validator.addMethod("contactname_regex", function(value, element) {

return this.optional(element) || /^[a-zA-Z ]+$/.test(value);

}, "Please choose only alphabets");



  $.validator.addMethod("contpersonlevel_regex", function(value, element) {

return this.optional(element) || /^[a-zA-Z ]+$/.test(value);

}, "Please choose only alphabets");


$.validator.addMethod("companypincode_regex", function(value, element) {

return this.optional(element) || /^[1-9][0-9][0-9][0-9][0-9][0-9]$/.test(value);

}, "Please Enter 6 digits Company Pincode");

</script>


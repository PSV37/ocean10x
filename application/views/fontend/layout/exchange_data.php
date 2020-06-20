
<style>
.card {
    position: relative;
    height: 100%;
    width: 100%;
    -webkit-transform-style: preserve-3d;
    transform-style: preserve-3d;
    -webkit-transition: all 600ms;
    transition: all 600ms;
    border-radius:13px;
	padding:0px;
	margin-top:75px;
}

    .card div {
       
        background: #FFF;
        
       
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        border-radius: 13px;
    }

   .card .back {
        background: #222;
       
        -webkit-transform: rotateX(180deg);
        transform: rotateX(180deg);
    }



input {
    display: none;
}
/*
:checked + .card {
    transform: rotateX(180deg);
    -webkit-transform: rotateX(180deg);
}
*/

.active-job {
    margin-top:168px;
}
.dropdown-menu>li>a{padding:3px 20px;}
.front{padding:11px;height:264px;}
.job-info {
    margin-left: 55px;
	margin-top:-4px;
	
}
li.left-title {
    list-style-type: none;
    float: left;
	font-size: 12px;
    font-weight: 100;
	width:105px;
	height:15px;
}
li.right-title {
    list-style-type: none;
	font-size: 12px;
    font-weight: 100;
	width:310px;
}
.icon-info {
    margin-left:60px;
	margin-bottom:10px;
}
li.left-icon-title{
	 list-style-type: none;
    float: left;
}
.left-icon-title i{color:#18c5bd;}
li.right-icon-title {
    list-style-type: none;
    float: left;
    margin-right: 20px;
	font-weight:100;
}
.front .dropdown {
    top: -8px;
    width: 63px;
    position: absolute;
    right: 0px;
}
.detail-btn{
    background-color: #fff;
    padding: 3px 19px;
    border-radius: 20px;
    background-color: #18c5bd;
    border: none;
    color: #fff;
    font-weight: 100;
	margin-top:10px;
	float:right;}
.detail-btn:hover{
    background-color:#107773;
	transition:0.8s; 
}
.following-info {
    float: left;
	line-height:24px;
	
}
.following-info2 {
    margin-left:256px;
	line-height:24px;
}
.active-span{
   position: absolute;
    top: 12px;
    left: 405px;
    background-color: #8BC34A;
    padding: 1px 17px;
    border-radius: 9px;
    color: #fff;
    font-size: 11px;
}

.following-info3 {
    float: right;
    margin-top: -46px;
   
	line-height:24px;
}

.skils_benifit {
    margin-top: 25px;
    list-style-type: none;
	
}
li.left-title_seperate {
   float: left;
    width: 58px;
    font-size: 13px;
    color: #3c3c3c;
    
}
:checked + span {
    background: #18c5bd !important;
    display: inline-block;
    width: 100%;
    color: #fff;
	padding: 4px 15px;
    border-radius: 30px;
	cursor:pointer;
}
.btn-default1:not(:checked) + span {
	padding: 4px 15px;
    border-radius: 30px;
    background: #e4e2e2;
    /* padding: 8px 0; */
    width: 100%;
    border-radius: 10px;
    cursor: pointer;
}
.left-title_detail{
width: 152px;
    font-size: 13px;
    list-style-type: none;
	float:left;
	height:100px;
}
.right-title_detail{width:100%;list-style-type:none;}

button.back_btn {
    padding: 5px 35px;
    border-radius: 30px;
    border: none;
    background-color: #18c5bd;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
}

button.back_btn:hover{
background-color: #11a59e;
    box-shadow: 2px 2px 3px #ceccccba;
	transition:0.5s;
}
button.edit_btn {
    padding: 5px 35px;
    border-radius: 30px;
    border: none;
    background-color: #18c5bd;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
	margin-left: 10px;
} 
button.edit_btn:hover{
background-color: #11a59e;
    box-shadow: 2px 2px 3px #ceccccba;
	transition:0.5s;
} 
button.Postjob_btn {
    padding: 5px 35px;
    border-radius: 30px;
    border: none;
    background-color: #18c5bd;
    color: #fff;
    font-size: 13px;
    font-weight: 600;
	margin-left:10px;
}
button.Postjob_btn:hover{
background-color: #11a59e;
    box-shadow: 2px 2px 3px #ceccccba;
	transition:0.5s;
} 

.preview_btns {
    text-align: end;
    margin: 20px 0px 0px 0px;
}


</style>






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
                                	<li class="left-title"
                                    >Education Level</li><li class="right-title">&nbsp;:Masters</li>
                                   
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
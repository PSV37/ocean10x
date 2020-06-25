<style>
@keyframes bake-pie {
  from {
    transform: rotate(0deg) translate3d(0,0,0);
  }
}

main {
 
  margin: 30px auto;
}

.pieID {
  display: inline-block;
  vertical-align: top;
}
.pie {
  height: 200px;
  width: 200px;
  position: relative;
  margin:0 30px 30px -23px;
}
.pie::before {
  content: "";
  display: block;
  position: absolute;
  z-index: 1;
  width: 100px;
  height: 100px;
  background: #fff;
  border-radius: 50%;
  top: 50px;
  left: 50px;
}
.pie::after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: rgba(0,0,0,0.1);
  border-radius: 50%;
  box-shadow: 0 0 3px 4px rgba(0,0,0,0.1);
  margin: 220px auto;
  
}
section {
    padding: 0px 45px 25px;
}
.slice {
  position: absolute;
  width: 200px;
  height: 200px;
  clip: rect(0px, 200px, 200px, 100px);
  animation: bake-pie 1s;
}
.slice span {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background-color: black;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  clip: rect(0px, 200px, 200px, 100px);
}
.legend {
	margin-left:8px !important;
  list-style-type: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  padding: 15px;
  font-size: 13px;
  box-shadow: 1px 1px 0 #DDD,
              2px 2px 0 #BBB;
}
.last_section{border:solid 1px #e8e4e4;margin-top: 77px;padding:0px 10px;}
.panel-title {
    font-size: 13px;
    color: #18c5bd;
}
.panel{background-color:#fbfbfb;}
i.glyphicon.glyphicon-filter {
    color: #18c5bd;
}
.legend li {
  width: 110px;
  height: 1.25em;
  margin-bottom: 0.7em;
  padding-left: 0.5em;
  border-left: 1.25em solid black;
}
.legend em {
  font-style: normal;
}
.legend span {
  float: right;
}
footer {
  position: fixed;
  bottom: 0;
  right: 0;
  font-size: 13px;
  background: #DDD;
  padding: 5px 10px;
  margin: 5px;
}

.fade-rotate {
  transform: rotate(180deg);
  opacity: 0;
  -webkit-transition: all .25s linear;
  -o-transition: all .25s linear;
  transition: all .25s linear;
}
.fade-rotate.in {
  opacity: 1;
  transform: rotate(0deg);
}
.fade-rotate .modal-dialog {
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
    transform: translateY(-50%) !important;
}

input{padding:7px 25px;}
.modal-footer{text-align:center;}

.modal-body {
    padding: 0px 65px;
}
button.btn-save {
    font-size: 12px;
    padding: 10px 52px;
    background-color: #14a99b;
    color: #fff;
    border: none;
	border-radius:20px;
	box-shadow: 2px 2px 6px #a8a4a4;

}
.modal-content {
    background-image: linear-gradient(#18c5bd, #d4efec);
}
.sendEmail label{color:#fff;font-size:13px;}
.sendEmail input{background-color: #f3f7f663;}
.sendEmail textarea.form-control{background-color:#fbffff80;}
@media (min-width: 768px){
.modal-dialog {
    width: 460px;
    margin: 30px auto;
}
}

.fade-rotate .modal-dialog{top:45%;}
.modal-footer{border-top:none;}
.modal-header{border-bottom:none;}
button.btn-save:hover{background-color:#0e776d;
transition:0.9s;color:#fff;}


		.clickable{
		    cursor: pointer;   
		}

		.panel-heading div {
			margin-top: -18px;
			font-size: 15px;
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
		}
	.alert {
    padding: 8px;
    background-color: #18c5bd;
    color: white;
    width: fit-content;
    height: 13px;
    border-radius: 20px;
    line-height: 0px;
    margin-right: 7px;
    float: left;
	}

.closebtn {
    margin-top: -9px;
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
  color: black;
}





:root {
	--bg: #e3e4e8;
	--fg: #17181c;
	--bs1: #ffffff;
	--bs2: #c1c2c5;
	--tick: #454954;
	--transDur: 0.1s;
	font-size: calc(20px + (40 - 20)*(100vw - 320px)/(2560 - 320));
}
.exp_level input {
	color: var(--fg);
	font: 1em/1.5 Muli, sans-serif;
}

.range__ticks {
	display: flex;
}
.exp_level {
	margin: auto;
	max-width:20em;
	padding: 0 -0.5em;
	width: 100%;
}
.exp_level label {
	display: block;
	font-weight: bold;
}
.exp_level input[type=range], label {
	-webkit-tap-highlight-color: transparent;
}
.exp_level input[type=range], .range {
	border-radius: 0.75em;
	overflow: hidden;
	margin-bottom: 1.5em;
}
.range input{margin:0px;}
.exp_level input[type=range] {
	background-color: #d4efec;
	box-shadow:
		0.3em 0.3em 0.4em var(--bs2) inset,
		-0.3em -0.3em 0.4em var(--bs1) inset;
	display: block;
	padding: 0 0.1em;
	width: 100%;
	height: 1.5em;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}
.exp_level input[type=range]:focus {
	outline: transparent;
}
.exp_level input[type=range]::-webkit-slider-thumb {
	background-color: #255ff4;
	border: 0;
	border-radius: 50%;
	box-shadow:
		-0.3em -0.3em 0.5em #0937aa inset,
		0 -0.2em 0.2em 0 #0004,
		0.3em 0.9em 0.8em #0007;
	cursor: pointer;
	position: relative;
	width: 1.3em;
	height: 1.3em;
	transition: all var(--transDur) linear;
	z-index: 1;
	-webkit-appearance: none;
	appearance: none;
}
.exp_level input[type=range]:focus::-webkit-slider-thumb {
	background-color: #5583f6;
	box-shadow:
		-0.3em -0.3em 0.5em #0b46da inset,
		0 -0.2em 0.2em 0 #0004,
		0.3em 0.9em 0.8em #0007;
}
.exp_level input[type=range]::-moz-range-thumb {
	background-color: #255ff4;
	border: 0;
	border-radius: 50%;
	box-shadow:
		-0.3em -0.3em 0.5em #0937aa inset,
		0 -0.2em 0.2em 0 #0004,
		0.3em 0.9em 0.8em #0007;
	cursor: pointer;
	position: relative;
	width: 1.3em;
	height: 1.3em;
	transform: translateZ(1px);
	transition: all var(--transDur) linear;
	z-index: 1;
	-moz-appearance: none;
	appearance: none;
}
.exp_level input[type=range]:focus::-moz-range-thumb {
	background-color: #5583f6;
	box-shadow:
		-0.3em -0.3em 0.5em #0b46da inset,
		0 -0.2em 0.2em 0 #0004,
		0.3em 0.9em 0.8em #0007;
}
.exp_level input[type=range]::-moz-focus-outer {
	border: 0;
}
.range {
	position: relative;
	height: 1.5em;
}
.range__ticks {
	justify-content: space-between;
	align-items: center;
	pointer-events: none;
	position: absolute;
	top: 0;
	left: 0.75em;
	width: calc(100% - 1.5em);
	height: 100%;
}
.range__tick, .range__tick-text {
	display: inline-block;
}
.range__tick {
	color: var(--tick);
	font-size:9px;
	text-align: center;
	width: 0;
	-webkit-user-select: none;
	-moz-user-select: none;
	user-select: none;
}
.range__tick-text {
	transform: translateX(-50%);
}

/* Dark mode */
@media (prefers-color-scheme: dark) {
	:root {
		--bg: #2e3138;
		--fg: #e3e4e8;
		--bs1: #3c4049;
		--bs2: #202227;
		--tick: #c7cad1;
	}
}

</style>

<div class="col-md-3 ">
        		<div class="last_section">
              		  <div class="pai_chart">
  			<main>
 
  <section>
    <div class="pieID pie">
      
    </div>
    <ul class="pieID legend">
      <li>
        <em>Humans</em>
        <span>718</span>
      </li>
      <li>
        <em>Dogs</em>
        <span>531</span>
      </li>
      <li>
        <em>Cats</em>
        <span>868</span>
      </li>
      <li>
        <em>Slugs</em>
        <span>344</span>
      </li>
      <li>
        <em>Aliens</em>
        <span>1145</span>
      </li>
    </ul>
  </section>
 
</main>
</div>
           
           			<div class="filter1">
           <div class="panel ">
					<div class="panel-heading">
						<h3 class="panel-title">Location</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter location" />
					
					
                    
                    <div class="location_fil">
                    	<div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                    	
                        <div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                         
                         <div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
				</div>
                
                
                	<div class="filter1">
           <div class="panel ">
					<div class="panel-heading">
						<h3 class="panel-title">Education</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
					
					
                    
                    <div class="location_fil">
                    	<div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                    	
                        <div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                         
                         <div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
				</div>
                
                	<div class="filter1">
           <div class="panel ">
					<div class="panel-heading">
						<h3 class="panel-title">Mandatory</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter education" />
					
					
                    
                    <div class="location_fil">
                    	<div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                    	
                        <div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                         
                         <div class="alert">
                             <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                           		<strong>css</strong>
                         </div>
                    </div>
                    </div>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
				</div>
                
                
                	<div class="experience">
                    <form class="exp_level">
	<label for="range1">Experience</label>
	<input id="range1" type="range" name="range1" min="1" max="10" step="0.1" value="5">
    <label for="range3">Availability</label>
		<input id="range3" type="range" name="range3" min="0" max="100" step="1" value="50">

	
	</form>
                    
                    </div>
                
           		</div>
            </div>
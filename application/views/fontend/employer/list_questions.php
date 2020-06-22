<?php $this->load->view('fontend/layout/employer_new_header.php');?> 
<!---header-->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>fontend/css/employer/questionbank.css">
<div class="container-fluid main-d">
	<div class="container">
        <div class="col-md-12">
        	  <?php $this->load->view('fontend/layout/employer_menu.php'); ?>
            
            <div class="col-md-9 question-bank">
            	<div class="header-bookbank">
                		Question Bank
                 </div>
                	
                
                  <div class="select-option">
                
                
        <p style="FONT-SIZE: 12PX;COLOR: #0a5854;margin-bottom:-5px;">Total No. Of Question:10</p>
        
        
                <label class="dropdown">

  <div class="dd-button">
    Filter
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
                
                
                
                
                
                
                
                
                
                
                
                  <label>
                    <input type="checkbox" value="4" class="btn-default1" checked="" name="benefits[]">
                   	 <span>Select all</span>
                  </label>
                   
                  </div>  
                <div class="question-box">
                	<div class="border-top"></div>
                	<div class="panel-heading">
                    <img src="https://blog.oxiane.com/wp-content/uploads/2017/04/java-logo-oracle.png" class="logo-subject" />
                    
                   
                   <li><span style="color:#949694;float:left;width:150px;">Java<span>(Core java)</span></li>
                    <li><span style="color:#949694;"><span style="color:#949694;">subtopic&nbsp;:Classes and Object</span></li>
                   
                   <li><span style="color:#949694;float:left;width:150px;">Java 2.1</span></li>
                   <li><span style="color:#949694;">dummy</span></li>
                    <div class="a">      
                  <p class="question">
Which among the following statements regarding the Surrogacy (Regulation)
bill, 2016 is incorrect ?
                  </p>
                  </div>
             </div><!--.panel-heading-->
        
                    <div class = "panel-body">
                    <ul class = "list-group">
                    	<div class="col-md-12" style="margin-left: -27px;">
                    <div class="optionbox-1 col-md-3">
                        <li class = "list-group-item">
                              <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">
                                    1 and 2 only
                                </label>
                            </div>
                        </li>
                        <li class = "list-group-item" >
                              <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">
                                    2 and 3 only
                                </label>
                            </div>
                        </li>
                        </div>
                       <div class="optionbox-2 col-md-3"> 
                        <li class = "list-group-item">
                              <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">
                                    1 and 3 only
                                </label>
                            </div>
                        </li>
                        <li class = "list-group-item">
                              <div class="checkbox">
                                <input type="checkbox" id="checkbox" />
                                <label for="checkbox">
                                    1, 2 and 3
                                </label>
                            </div>
                        </li>
                        </div>
                        </div>
                       </ul>
                     </div>
               		
                    	<p>
  <a class="toggle btn " href="#example">show answer</a>
</p>

<div class="toggle-content" id="example">
  Here's some text we want to toggle visibility of.
</div>
                    
                     <div class="btn-group">
      <a href="#" class="btn btn-inverse disabled"><i class="far fa-edit icon_backg"></i></a>
      <a href="#" class="btn btn-inverse disabled"><i class="fas fa-trash-alt icon_backg"></i></a>
  </div>               
  
  
  
               
				</div> 
                
                <div class=""></div> 
        </div>
            
</div>
</div>
</div>
<script>

// Show an element
var show = function (elem) {

	// Get the natural height of the element
	var getHeight = function () {
		elem.style.display = 'block'; // Make it visible
		var height = elem.scrollHeight + 'px'; // Get it's height
		elem.style.display = ''; //  Hide it again
		return height;
	};

	var height = getHeight(); // Get the natural height
	elem.classList.add('is-visible'); // Make the element visible
	elem.style.height = height; // Update the max-height

	// Once the transition is complete, remove the inline max-height so the content can scale responsively
	window.setTimeout(function () {
		elem.style.height = '';
	}, 350);

};

// Hide an element
var hide = function (elem) {

	// Give the element a height to change from
	elem.style.height = elem.scrollHeight + 'px';

	// Set the height back to 0
	window.setTimeout(function () {
		elem.style.height = '0';
	}, 1);

	// When the transition is complete, hide it
	window.setTimeout(function () {
		elem.classList.remove('is-visible');
	}, 350);

};

// Toggle element visibility
var toggle = function (elem, timing) {

	// If the element is visible, hide it
	if (elem.classList.contains('is-visible')) {
		hide(elem);
		return;
	}

	// Otherwise, show it
	show(elem);
	
};

// Listen for click events
document.addEventListener('click', function (event) {

	// Make sure clicked element is our toggle
	if (!event.target.classList.contains('toggle')) return;

	// Prevent default link behavior
	event.preventDefault();

	// Get the content
	var content = document.querySelector(event.target.hash);
	if (!content) return;

	// Toggle the content
	toggle(content);

}, false);
</script>

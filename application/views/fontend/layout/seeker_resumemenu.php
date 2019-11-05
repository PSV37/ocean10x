<?php 
/*$jobseeker_id=$this->session->userdata('job_seeker_id');
if ($this->Job_seeker_model->get_cvtype_by_id($jobseeker_id) == 0) {
    echo '<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#vspinfo" onClick="load_data("personal");">Personal Information</a></li>
			<li><a data-toggle="tab" href="#vsedu">Education</a></li>
			<li><a data-toggle="tab" href="#vscareer">Experience </a></li>
			<li><a data-toggle="tab" href="#vstrain">Training</a></li>
			<li><a data-toggle="tab" href="#vsref">Reference</a></li>
			<li><a data-toggle="tab" href="#vsphoto">Photo</a></li>
		</ul>';
} else {
echo '<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#vspinfo">Personal Information</a></li>
			<li><a data-toggle="tab" href="#vsedu">Education</a></li>
			<li><a data-toggle="tab" href="#vscareer">Experience </a></li>
			<li><a data-toggle="tab" href="#vstrain">Training</a></li>
			<li><a data-toggle="tab" href="#vsref">Reference</a></li>
			<li><a data-toggle="tab" href="#vsphoto">Photo</a></li>
		</ul>';
}*/
?>

		<ul class="nav nav-tabs">
			<li><a data-toggle="tab" href="#vspinfo" onClick="load_data('update_personalinfo','vspinfo');">My Profile</a></li>
			<li><a data-toggle="tab" onClick="load_data('update_education','vsedu');" href="#vsedu" >Education</a></li>
			<li><a data-toggle="tab" href="#vscareer" onClick="load_data('update_experience','vscareer');">Experience </a></li>
            <li class="active"><a data-toggle="tab" href="#vscareers" onClick="load_data('update_career','vscareers');">Work Experience</a></li>
			<li><a data-toggle="tab" href="#vstrain" onClick="load_data('update_training','vstrain');">Certs & Trainings</a></li>
			<li><a data-toggle="tab" href="#vsref" onClick="load_data('update_reference','vsref');">Reference</a></li>
			<!--<li><a data-toggle="tab" href="#vsphoto" onClick="load_data('update_photo','vsphoto');">Photo</a></li>-->
		</ul>
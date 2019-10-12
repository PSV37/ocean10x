<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, howevers, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// foreach ($category as $value) {
// 	$route['job/account-finance']="job/category/2"
// }

// Forntend Route 
$route['selected-cv/(:any)']="home/employer_selectedcv/$1";
$route['university']="home/internship/";
$route['banksbook']="home/banksbook/";
$route['banksbook/(:any)']="home/employer_bankbooks/$1";
$route['university/(:any)']="home/employer_internship/$1";
$route['contact']="home/contact_us";
$route['about-us']="home/about_us";
$route['terms']="home/terms";
$route['how-to-build-cv']="home/how_to_build_cv";

$route['zohoverify/verifyforzoho.html']="home/zohoverify";

// Training List

$route['training-type/(:any)']="training/training_type/$1";
$route['training-type/(:any)/(:any)']="training/training_type/$1/$2";

$route['registration/(:any)']="training/registration/$1";


//job_seeker Router : 
$route['seeker-login']="register/jobseeker_login";
$route['seeker/personal']="job_seeker/update_personalinfo";
$route['seeker/education']="job_seeker/update_education";
$route['seeker/experience']="job_seeker/update_experience";
$route['seeker/career']="job_seeker/update_career";
$route['seeker/sepcialization']="job_seeker/update_sepcialization";
$route['seeker/training']="job_seeker/update_training";
$route['seeker/reference']="job_seeker/update_reference";
$route['seeker/photo']="job_seeker/update_photo";
$route['seeker/resume']="job_seeker/view_resume";
$route['seeker/my-applicaiton']="job_seeker/my_application";
$route['seeker/logout']="job_seeker/logout";
$route['seeker/downloadcv']="job_seeker/downloadcv";



$route['seeker-login']="register/jobseeker_login";



// Employer site routes

$route['employer-login']="employer_login";

$route['employer/all-applicants/(:num)']="employer/all_applicant/$1";
$route['employer/downloadcv/(:num)']="employer/downloadcv/$1";
$route['employer/sortlist-cv/(:num)']="employer/sortlist_cv/$1";
$route['employer/interview-cv/(:num)']="employer/interview_cv/$1";
$route['employer/final-cv/(:num)']="employer/final_cv/$1";

$route['employer/job-post']="employer/job_post";
$route['employer/manage-job']="employer/manage_job";
$route['employer/change-password']="employer/change_password";
$route['employer/active-job']="employer/active_job";
$route['employer/pending-job']="employer/pending_job";
$route['employer/selected-job']="employer/selected_job";
$route['employer/non-selected-job']="employer/non_selected_job";
$route['employer/profile-setting']="employer/profile_setting";

$route['employer/reject-resume/(:num)']="employer/reject_resume/$1";



$route['job-apply/(:any)'] = "job/jobapply/$1";

// Category and Level Search Jobs
$route['jobs/type/(:any)'] = "job/get_job_types_job/$1";
$route['jobs/type/(:any)/(:num)'] = "job/get_job_types_job/$1/$2";

$route['jobs/(:any)/(:any)'] = "job/category_and_level_job/$1/$2";
$route['jobs/(:num)/(:num)/(:num)'] = "job/category_and_level_job/$1/$2/$3";


// Admin Site route 

$route['admin/jobs/job_details/(:num)/(num:)/sortlist_cv']="admin/jobs/sortlist_cv/$1/$2";

$route['admin/jobs/active-selected-job']="admin/jobs/active_selected_job";
$route['admin/jobs/active-bank-books']="admin/jobs/bank_books";
$route['admin/jobs/active-univeristy']="admin/jobs/university_jobs";

$route['admin/jobs/pending-jobs']="admin/jobs/pending_jobs";
$route['admin/jobs/active-non-selected-job']="admin/jobs/active_non_selected_job";
$route['admin/jobs/deactive-selected-job']="admin/jobs/deactive_selected_job";
$route['admin/jobs/deactive-non-selected-job']="admin/jobs/deactive_non_selected_job";

$route['admin/jobs/submit-jobs']="admin/Job_posting/index";

$route['admin/public-demand']="admin/Public_demand";
$route['admin/public-demand/delete-demand/(:num)']="admin/Public_demand/delete_demand/$1";


//admin Job Setting Route 
// $route['admin/job-category']="admin/job_category";
$route['admin/industry-master']="admin/job_category";
$route['admin/job-location']="admin/job_location";
$route['admin/job-level']="admin/job_level";
$route['admin/job-nature']="admin/job_nature";
$route['admin/salary-range']="admin/salary_range";
$route['admin/education-level']="admin/education_level";
$route['admin/education-specialization']="admin/education_specialization";
$route['admin/country-master']="admin/country_master";
$route['admin/state-master']="admin/state_master";
$route['admin/city-master']="admin/city_master";
$route['admin/department-master']="admin/department_master";
$route['admin/designation-master']="admin/designation_master";
// $route['admin/industry-master']="admin/industry_master";
$route['admin/skill-master']="admin/skill_master";
$route['admin/job-role']="admin/job_role";
$route['admin/topic/(:any)']="admin/topic/(':any')/$1";





// User Create 
$route['admin/create-users']="admin/admin_user";



//admin Company Route 
$route['admin/company/create-company']="admin/company/save_company";

$route['admin/company/active-company']="admin/company/active_company";
$route['admin/company/deactive-company']="admin/company/deactive_company";
$route['admin/company/(:num)']="admin/company/company_details/$1/";
$route['admin/company/(:num)/active-jobs']="admin/company/company_active_jobs/$1/";
$route['admin/company/(:num)/deactive-jobs']="admin/company/company_deactive_jobs/$1/";
$route['admin/company/(:num)/pending-jobs']="admin/company/company_pending_jobs/$1/";
$route['admin/company/(:num)/selected-jobs']="admin/company/company_selected_jobs/$1/";
$route['admin/company/(:num)/nonselected-jobs']="admin/company/company_nonselected_jobs/$1/";

//admin Seeker Route

$route['admin/seeker/active-seeker']="admin/seeker/active_seeker";
$route['admin/seeker/deactive-seeker']="admin/seeker/deactive_seeker";
$route['admin/seeker/experience']="admin/seeker/experience_cv";
$route['admin/seeker/internship']="admin/seeker/internship_cv";
$route['admin/seeker/downloadcv/(:num)']="admin/seeker/downloadcv_admin/$1/";


$route['admin/all-training']="admin/training/training_list";
$route['admin/enrolled-users']="admin/training/enrolled_list";
$route['admin/training/save-training']="admin/training/save_training";
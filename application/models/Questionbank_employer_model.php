<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questionbank_employer_model extends MY_Model {

    function insertRecord($record){
        //print_r($record);
		$employer_id = $this->session->userdata('company_profile_id');
        if(count($record) > 0){
                $newquestionsbank = array(
					"technical_id" => trim($record[0]),
                    "topic_id" => trim($record[1]),
                    "subtopic_id" => trim($record[2]),
                    "lineitem_id" => trim($record[3]),
                    "lineitemlevel_id" => trim($record[4]),
					"ques_type" => trim($record[6]),
					"level" => trim($record[5]),
					"question" => trim($record[7]),
					"option1" => trim($record[8]),
					"option2" => trim($record[9]),
					"option3" => trim($record[10]),
					"option4" => trim($record[11]),
					"option5" => trim($record[12]),
					"org_id" => $this->input->post('org_id'),
					"ques_created_date" => date('Y-m-d H:i:s'),
					"ques_created_by" => $employer_id
                );
				
                $question_id=$this->db->insert('questionbank', $newquestionsbank);
				
				$newquestionsbanks = array(
					"question_id"=> $question_id,
					"answer_id" => trim($record[13])
                );
				
                $this->db->insert('questionbank_answer', $newquestionsbanks);
				
        }
        
    }

   function InsertCVData($record){
        //print_r($record);
		$employer_id = $this->session->userdata('company_profile_id');
        if(count($record) > 0){
                $cv_data_array = array(
					"company_id" 				=> $employer_id,
                    "js_name" 					=> trim($record[0]),
                    "js_email" 					=> trim($record[1]),
                    "js_mobile" 				=> trim($record[2]),
                    "js_job_type" 				=> trim($record[3]),
					"js_current_designation" 	=> trim($record[4]),
					"js_current_work_location" 	=> trim($record[5]),
					"js_working_since" 			=> trim($record[6]),
					"js_current_ctc" 			=> trim($record[7]),
					"js_current_notice_period" 	=> trim($record[8]),
					"js_experience" 			=> trim($record[9]),
					"js_last_salary_hike" 		=> trim($record[10]),
					"js_top_education" 			=> trim($record[11]),
					"js_skill_set" 				=> trim($record[12]),
					"js_certifications" 		=> trim($record[13]),
					"js_industry" 				=> trim($record[14]),
					"js_role" 					=> trim($record[15]),
					"js_expected_salary" 		=> trim($record[16]),
					"js_desired_work_location" 	=> trim($record[17]),,
					"created_on" 				=> date('Y-m-d H:i:s'),
					"created_by" 				=> $employer_id
                );
				
                $cv_id=$this->db->insert('corporate_cv_bank', $cv_data_array);
				
        }
        
    }
}
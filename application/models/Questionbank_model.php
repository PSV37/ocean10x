<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questionbank_model extends MY_Model {

    function insertRecord($record){
        
        if(count($record) > 0){
            
            // Check user
            $this->db->select('*');
            $this->db->where('technical_id', $record[0]);
            $q = $this->db->get('questionsbank');
            $response = $q->result_array();
            
            // Insert record
            if(count($response) == 0){
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
					"correct_answer" => trim($record[13])
                );
				print_r($newquestionsbank);die();
                $this->db->insert('questionsbank', $newquestionsbank);
				
            }
            
        }
        
    }

}
<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Training_info_model extends MY_Model
{

    protected $_table_name  = 'training_info';
    protected $_primary_key = 'training_id';
    protected $_order_by    = "training_id desc";

    public function __construct()
    {
        parent::__construct();
    }

    public function check_training_slug($training_slug)
    {
        $this->db->select("*");
        $this->db->where('training_slug', $training_slug);
        $query = $this->db->get($this->_table_name);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_training_by_slug($training_slug)
    {
        $this->db->select("*");
        $this->db->where('training_slug', $training_slug);
        return $query = $this->db->get($this->_table_name)->row();
    }

    public function get_all_training($limit, $offset)
    {
        $training_data = array();
        $this->db->select('*');
        $_thisdb           = clone $this->db->where("deadline >", 'CURDATE()', false);
        $query             = $this->db->get($this->_table_name);
        $training_data['total_row'] = $query->num_rows();
        $_thisdb->limit($limit, $offset);
        $query = $_thisdb->get($this->_table_name);
        if ($query->num_rows() > 0) {
            $training_data['result'] = $query->result();
            return $training_data;
        }
        return false;
    }

    public function get_all_training_by_trainingtype($limit, $offset, $training_type)
    {
        $training_data = array();
        $this->db->select('*');
        $_thisdb           = clone $this->db->where('training_type', $training_type)->where("deadline >", 'CURDATE()', false);
        $query             = $this->db->get($this->_table_name);
        $training_data['total_row'] = $query->num_rows();
        $_thisdb->limit($limit, $offset);
        $query = $_thisdb->get($this->_table_name);
        if ($query->num_rows() > 0) {
            $training_data['result'] = $query->result();
            return $training_data;
        }
        return false;
    }

    public function training_row_count()
    {
        return $this->db->count_all($this->_table_name);
    }

    public function training_title_by_id($id)
    {
        $this->db->select("training_title");
        $this->db->where($this->_primary_key, $id);
        $result = $this->db->get($this->_table_name)->result();
        return isset($result[0]->training_title) ? $result[0]->training_title : '';
    }

}

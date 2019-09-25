<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Cms_model extends MY_Model
{

     protected $table_name = 'content_management';
    protected $_primary_key = 'admin_user_id';
    protected $_order_by = "admin_user_id asc";

    public function __construct()
    {
        parent::__construct();
    }

        public function get_posts() {
        $this->db->select('*');
        $this->db->from($this->table_name);
        
        $this->db->order_by("ID", "DESC");
        $Q = $this->db->get();
        if ($Q->num_rows() > 0) {
            $return = $Q->result();
        } else {
            $return = 0;
        }
        $Q->free_result();
        return $return;
    }
	public function get_post_by_slug($slug) {
            $this->db->select('*');
            $this->db->from($this->table_name);
                    $this->db->where('slug', $slug);
            $Q = $this->db->get();
            if ($Q->num_rows() > 0) {
                $return = $Q->row_array();
            } else {
                $return = 0;
            }
            $Q->free_result();
            return $return;
        }
	public function delete($id){
		$this->db->where('ID', $id);
		$this->db->delete($this->table_name);
	}
    }


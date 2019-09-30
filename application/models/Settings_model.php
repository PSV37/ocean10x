<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Settings_model extends MY_Model
{

     protected $table_name = 'settings';
    protected $_primary_key = 'admin_user_id';
    protected $_order_by = "admin_user_id asc";

    public function __construct()
    {
        parent::__construct();
    }
    public function add($data){
  
            $return = $this->db->insert($this->table_name, $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}
    public function add_email($data){
  
            $return = $this->db->insert('settings', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}
    public function add_address($data){
  
            $return = $this->db->insert('settings', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}
        public function update($id, $data){
		$this->db->where('id', $id);
		$return=$this->db->update($this->table_name, $data);
		return $return;
	}
        public function update_email( $data){
		$this->db->where('id', 2);
		$return=$this->db->update('settings', $data);
		return $return;
	}
        public function update_address( $data){
		$this->db->where('id', 2);
		$return=$this->db->update('settings', $data);
		return $return;
	}
        public function update_metas( $data){
		$this->db->where('id', 2);
		$return=$this->db->update('settings', $data);
		return $return;
	}
        public function update_phone( $data){
		$this->db->where('id', 2);
		$return=$this->db->update('settings', $data);
		return $return;
	}

	public function get_logo_by_id() {
            $this->db->select('*');
            $this->db->from($this->table_name);
            $this->db->where('id',2 );
            $Q = $this->db->get();
            if ($Q->num_rows() > 0) {
                $return = $Q->row_array();
            } else {
                $return = 0;
            }
            $Q->free_result();
            return $return;
        }
	public function get_email_by_id() {
            $this->db->select('*');
            $this->db->from('email');
            $this->db->where('id',2 );
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


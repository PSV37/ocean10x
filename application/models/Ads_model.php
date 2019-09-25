<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class Ads_model extends MY_Model{

    public function __construct()
    {
        parent::__construct();
    }

        public function get_all_ads_by_position($position='')
    {
          $this->db->select("*");
          $this->db->from('tbl_site_ads');
          $this->db->where('position',$position);
          $res=$this->db->get()->result();
          return $res;
    }
public function get_all_ads()
    {
          $this->db->select("*");
          $this->db->from('tbl_site_ads');
          $this->db->where('position !=','home');
          $this->db->order_by('position','ASC');
          $res=$this->db->get()->result();
          return $res;
    }
   
   public function get_ads_by_id($id)
    {
          $this->db->select("*");
          $this->db->from('tbl_site_ads');
          $this->db->where('ID',$id);
          $res=$this->db->get()->row();
          return $res;
    }
     
    public function add($data)
	{
            $return = $this->db->insert('tbl_site_ads', $data);
            if ((bool) $return === TRUE) {
                return $this->db->insert_id();
            } else {
                return $return;
            }       
			
	}
	
	public function update_rec($id, $data)
	{
		$this->db->where('ID', $id);
		$return=$this->db->update('tbl_site_ads', $data);
	//	$this->customer_db->last_query();
		return $return;
	}
	
	public function delete($id)
	{
		$this->db->where('ID', $id);
		$this->db->delete('tbl_site_ads');
	}
	

    }


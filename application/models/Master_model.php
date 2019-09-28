<?php

/**
 * 
 *
 * @package		VCUAE
 * @subpackage           Controller
 * @since		Version 1.0
 * @purpose              To handle Master model for administrator
 */
class Master_model extends CI_Model
{
    
    function __construct()
    {
        $this->load->database();
    }
    
    /**
     * master_insert method 
     *
     * @access	public
     * @param	array data
     * @param	string tablename
     * @return	int last inserted id
     */
    public function master_insert($data, $tablename)
    {
        $this->db->insert($tablename, $data);
        return $this->db->insert_id();
    }
    
    /**
     * master_max_id method 
     *
     * @access	public
     * @param	string column name
     * @param	string tablename
     * @return	array
     */
    public function master_max_id($column_name, $tablename)
    {
        $this->db->select_max($column_name);
        $query = $this->db->get($tablename);
        $row   = $query->row_array();
        return $row[$column_name];
    }
    
    /**
     * master_update method 
     *
     * @access	public
     * @param	array data
     * @param	string tablename
     * @param	array where
     * @return	bool true/false
     */
    public function master_update($data, $tablename, $where)
    {
        if ($where) {
            foreach ($where as $key => $value) {
                
                $this->db->where($key, $value);
            }
        }
        $this->db->update($tablename, $data);
        return true;
    }
    
    /**
     * master_delete method 
     *
     * @access	public
     * @param	array data
     * @param	string tablename
     * @return	bool true/false
     */
    public function master_delete($tablename, $where)
    {
        $this->db->where($where, NULL, FALSE);
        $this->db->delete($tablename);
        return true;
    }
    
    /**
     * getMaster method 
     *
     * @access	public
     * @param	array join
     * @param	string tablename
     * @param	string where
     * @return	array result set
     */
    public function getMaster($tablename, $where = FALSE, $join = FALSE, $order = false, $field = false, $select = false,$limit=false,$start=false, $search=false)
    {

		if($limit){
			$this->db->limit($limit, $start);
		}
		if ($search) {
                $where = $this->searchString($search);
                $query = $this->db->get_where($tablename, $where);
        } 
        if ($where) {
            $this->db->where($where, NULL, FALSE);
        }
        if ($order && $field) {
            $this->db->order_by($field, $order);
        }
        if ($join) {
            if (count($join) > 0) {
                foreach ($join as $key => $value) {
                    $explode = explode('|', $value);
                    $this->db->join($key, $explode[0], $explode[1]);
                }
            }
        }
        if ($select) {
            $this->db->select($select, FALSE);
        } else {
            $this->db->select('*');
        }
		$query = $this->db->get($tablename);
        //echo $this->db->last_query();die;
        return $query->result_array();
    }
    
    /**
     * searchString method 
     * 	Searching the string 
     * @access	public
     * @param	array search
     * @return	string search keywords
     */
    public function searchString($search)
    {
        
        $searchstring = "";
        $count        = 1;
        foreach ($search as $key => $value) {
            
            if (count($search) != $count) {
                if ($count == 1) {
                    $searchstring = "(";
                }
                $searchstring .= "$key LIKE '%$value%' OR ";
            } else {
                if (count($search) == $key + 1) {
                    $searchstring .= "$key LIKE '%$value%' ";
                } else {
                    $searchstring .= "$key LIKE '%$value%') ";
                }
            }
            
            $count++;
        }
        return $searchstring;
    }
    
    /**
     * getList method 
     * 	Get the list with pagination
     * @access	public
     * @param	string condition (rows->return single row,result_set->return reult with pagination,rows->return total count)
     * @param	string field (specifcy column name for sorting)
     * @param	string order (specifcy asc/desc for column)
     * @param	string offset (specifcy offset for pagination result set)
     * @param	string perpage (specifcy perpage for pagination result set)
     * @param	string table (specifcy table name for result set)
     * @param	array search (specifcy search array for searching)
     * @param	array join (specifcy join array for join operation)
     * @param	array where (specifcy where array for where clause)
     * @param	string select (specifcy number of column to return in result set)
     * @return	array result set
     */
    public function getList($condition, $field_by, $order_by, $offset, $perpage, $tablename, $search, $join = FALSE, $where = FALSE, $select = FALSE, $distinct = FALSE, $group_by = FALSE)
    {
        if (isset($_GET['offset']) && $_GET['offset'] != '') {
            $offset = $_GET['offset'] + 0;
        } else {
            $offset = 0;
        }
        if (isset($_GET['field']) && $_GET['field'] != '') {
            $field = $_GET['field'];
            $order = $_GET['order'];
        } else {
            $field = '';
            $order = '';
        }
        if ($distinct) {
            $this->db->distinct();
        }
        if ($select) {
            $this->db->select($select, FALSE);
        } else {
            $this->db->select('*');
        }
        
        if ($join) {
            if (count($join) > 0) {
                foreach ($join as $key => $value) {
                    $explode = explode('|', $value);
                    $this->db->join($key, $explode[0], $explode[1]);
                }
            }
        }
        
        if ($where) {
            if (is_array($where)) {
                foreach ($where as $key => $value) {
                    
                    $this->db->where($key, $value);
                }
            }
            if (!empty($where)) {
                $this->db->where($where, NULL, FALSE);
            }
            
        }
        if ($group_by) {
            $this->db->group_by($group_by);
        }
        if ($condition == "rows") {
            if (isset($_GET['search']) && $_GET['search'] != '') {
                $where = $this->searchString($search);
                $query = $this->db->get_where($tablename, $where);
            } else {
                $query = $this->db->get($tablename);
            }
            
            return $query->num_rows();
        }
        if ($condition == "single_set") {
            $query = $this->db->get($tablename);
            return $query->row_array();
        }
        
        
		if (isset($_GET['search']) && $field != '' && $_GET['search'] != '') {
            
            $where = $this->searchString($search);
            $this->db->order_by($field, $order);
            if ($perpage != '') {
                $query = $this->db->get_where($tablename, $where, $perpage, $offset);
            } else {
                $query = $this->db->get_where($tablename, $where);
            }
        } elseif (isset($_GET['search']) && !empty($_GET['search']) && $field == '') {
            
            $where = $this->searchString($search);
            
            if ($perpage != '') {
                $query = $this->db->get_where($tablename, $where, $perpage, $offset);
            } else {
                $query = $this->db->get_where($tablename, $where);
            }
        } elseif ($field != '' && $order != '') {
            
            $this->db->order_by($field, $order);
            if ($perpage != '') {
                $query = $this->db->get($tablename, $perpage, $offset);
            } else {
                $query = $this->db->get($tablename);
            }
        } else {
            
            
            if ($field_by != '' && $order_by != '') {
                $this->db->order_by($field_by, $order_by);
            }
            if ($field_by != "") {
                $this->db->order_by($field_by);
            }
            if ($perpage != '') {
                $query = $this->db->get($tablename, $perpage, $offset);
            } else {
                $query = $this->db->get($tablename);
            }
        }
        
        return $query->result_array();
    }
    

	 /**
     * master_get_num_rows method 
     *
     * Getting total rows in the table
     * @access	public
     * @param	string tablename
     * @param	array where
     * @param	string $like
     * @return	row(string)number of the rows
     */
    public function master_get_num_rows($tablename, $where = FALSE, $like = false, $join=false, $select = false) {
		if ($select) {
            $this->db->select($select, FALSE);
        } else {
            $this->db->select('*');
        }
        if ($where) {
            if (is_array($where)) {
                foreach ($where as $key => $value) {

                    $this->db->where($key, $value);
                }
            } else {
                $this->db->where($where, NULL, FALSE);
            }
        }

        if ($like) {
            foreach ($like as $key => $value) {
                $this->db->like($key, $value);
            }
        }
		if ($join) {
            if (count($join) > 0) {
                foreach ($join as $key => $value) {
                    $explode = explode('|', $value);
                    $this->db->join($key, $explode[0], $explode[1]);
                }
            }
        }
        $query = $this->db->get($tablename);
        return $query->num_rows();
    }



    /**
     * Common functionality to insert data in the required table
     * @access public
     * @param array $data (containing values to be added to table)
     * $param string $company(Company name)
     * @return function insert_id (returns last insert id of the company)
     */
    
    public function insertData($tablename, $postData,$main_store_id='')
    {
        $fields = $this->db->list_fields($tablename);
        foreach ($postData as $key => $val) {
            if (in_array($key, $fields)) {
                $data[$key] = $val;
            }
        }
        $this->db->insert($tablename, $data);
		$id=$this->db->insert_id();
        return $id;
    }
    
    /**
     * Function to get the keywords as per keyword type
     * @access public
     * return boolean
     */
    public function getKeyWords($keyword_type)
    {
        $query = $this->db->get_where('keywords', array(
            "keyword_type" => $keyword_type
        ));
        return $query->result_array();
    }

	public function plus_counter($table, $field, $where){
	   if ($where) {
	   $this->db->set($field, $field.'+1', FALSE);
	   if (is_array($where)) {
		 foreach ($where as $key => $value) {
		  $this->db->where($key, $value);
		 }
		} else {
		 $this->db->where($where, NULL, FALSE);
		}
	   $this->db->update($table);
	   }
	}

	public function minus_counter($table, $field, $where){
	   if ($where) {
	   $this->db->set($field, $field.'-1', FALSE);
	   if (is_array($where)) {
		 foreach ($where as $key => $value) {
		  $this->db->where($key, $value);
		 }
		} else {
		 $this->db->where($where, NULL, FALSE);
		}
	   $this->db->update($table);
	   }
	}

	/**
     * get_master_row method 
     *
     * @access	public
     * @param	string $tablename
     * @param	string $select
     * @param	string $where
     * @param	array $join
     * @return	mix array on success ,false on fail
     */
    public function get_master_row($tablename, $select = FALSE, $where = FALSE, $join = FALSE) {
        if ($where) {
            $this->db->where($where, NULL, FALSE);
        }

        if ($join) {
            if (count($join) > 0) {
                foreach ($join as $key => $value) {
                    $explode = explode('|', $value);
                    $this->db->join($key, $explode[0], $explode[1]);
                }
            }
        }

        if ($select) {
            $this->db->select($select, FALSE);
        } else {
            $this->db->select('*');
        }
        $query = $this->db->get($tablename);
        $count = $query->num_rows();
        if ($count > 0)
            return $query->row_array();
        else
            return FALSE;
    }
	
	public function AutoSearch($term){
		$my_data = mysql_real_escape_string($term);
        $sql = $this->db->query("SELECT `song_title`, `song_title` from `chords` WHERE song_title LIKE '%$my_data%' and is_verified='1' ORDER BY `song_title`  limit 0,10;");
        return $sql ->result();
	}
	
	public function search_scale($term){
		$my_data = mysql_real_escape_string($term);
        $sql = $this->db->query("SELECT distinct `scale` from `chords` WHERE scale LIKE '%$my_data%' ORDER BY `scale`  limit 0,10;");
        return $sql ->result();
	}
	
	public function search_artist($term){
		$my_data = mysql_real_escape_string($term);
        $sql = $this->db->query("SELECT distinct `artist` from `chords` WHERE artist LIKE '%$my_data%' ORDER BY `artist`  limit 0,10;");
        return $sql ->result();
	}
	
	public function search_album($term){
		$my_data = mysql_real_escape_string($term);
        $sql = $this->db->query("SELECT distinct `album` from `chords` WHERE album LIKE '%$my_data%' ORDER BY `album`  limit 0,10;");
        return $sql ->result();
	}
	
	
	

}

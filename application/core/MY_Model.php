<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MY_Model extends CI_Model
{

    protected $_table_name     = '';
    protected $_primary_key    = '';
    protected $_primary_filter = 'intval';
    protected $_order_by       = '';
    public $rules              = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get($id = null, $single = false)
    {

        if ($id != null) {
            $filter = $this->_primary_filter;
            $id     = $filter($id);
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        } elseif ($single == true) {
            $method = 'row';
        } else {
            $method = 'result';
        }

        $this->db->order_by($this->_order_by);

        return $this->db->get($this->_table_name)->$method();
    }

    public function get_order_by($array = null)
    {
        if ($array != null) {
            $this->db->select()->from($this->_table_name)->where($array)->order_by($this->_order_by);
            $query = $this->db->get();
            return $query->result();
        } else {
            $this->db->select()->from($this->_table_name)->order_by($this->_order_by);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function get_single($array = null)
    {
        if ($array != null) {
            $this->db->select()->from($this->_table_name)->where($array);
            $query = $this->db->get();
            return $query->row();
        } else {
            $this->db->select()->from($this->_table_name)->order_by($this->_order_by);
            $query = $this->db->get();
            return $query->result();
        }
    }

    public function insert($array)
    {
        $this->db->insert($this->_table_name, $array);
        $id = $this->db->insert_id();
        return $id;
    }

    public function update($data, $id = null)
    {
        $filter = $this->_primary_filter;
        $id     = $filter($id);
        $this->db->set($data);
        $this->db->where($this->_primary_key, $id);
        $this->db->update($this->_table_name);
    }

    public function delete($id)
    {
        $filter = $this->_primary_filter;
        $id     = $filter($id);

        if (!$id) {
            return false;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }

    public function hash($string)
    {
        return hash("sha512", $string . config_item("encryption_key"));
    }

    public function pagination($base_url, $row_count, $fetch_data)
    {
        $config                     = array();
        $config["base_url"]         = $base_url;
        $config["total_rows"]       = $row_count;
        $config["uri_segment"]      = 3;
        $config['full_tag_open']    = "<ul class='pagination'>";
        $config['full_tag_close']   = "</ul>";
        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open']    = "<li>";
        $config['next_tagl_close']  = "</li>";
        $config['prev_tag_open']    = "<li>";
        $config['prev_tagl_close']  = "</li>";
        $config['first_tag_open']   = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open']    = "<li>";
        $config['last_tagl_close']  = "</li>";

        $this->pagination->initialize($config);
        $data["results"] = $fetch_data;
        $data["links"]   = $this->pagination->create_links();
        return $data;

    }



    }

/* End of file MY_Model.php */
/* Location: .//D/xampp/htdocs/school/mvc/core/MY_Model.php */

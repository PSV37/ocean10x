<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $config = array(
            'field' => 'slug',
            'table' => 'mytable',
        );
        $this->load->library('slug', $config);
    }

    public function test()
    {
        $datad = "dadta";
        $data['slug'] = $this->slug->create_uri($datad);
        $this->db->insert('mytable', $data)
        echo "sucess";
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
          $this->load->model('job_category_model');
        $this->load->library("pagination");
    }

    public function example1() {
    	$config = array();
    	$config["per_page"]=10;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       	$base_url=base_url() . "welcome/example1";
       	$row_count=$this->job_category_model->record_count();
       	$fetch_data=$this->job_category_model->
            fetch_category($config["per_page"], $page);
    	$data=$this->job_category_model->pagination($base_url,$row_count,$fetch_data);

        $this->load->view("example1", $data);
    }

	public function index()
	{
		$this->load->view('fontend/index.php');
	}
	

	
	

}

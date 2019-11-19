<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts extends CI_Controller
{

    public function __construct()
    {
	parent::__construct();
        $this->load->model("post_model");
        $this->load->library("pagination");
    }

    public function get_posts()
    {
	$config["base_url"] = base_url("posts/get_posts");
	$config["total_rows"] = $this->post_model->get_count();
	$config["uri_segment"] = 3;
    	$config["per_page"] = 4;
    	$config['first_link'] = false;
    	$config['last_link'] = false; 
	
	$this->pagination->initialize($config);
   	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

	$viewData = new stdClass();

    	$viewData->results = $this->post_model->get_records($config['per_page'],$page);
    	$viewData->links = $this->pagination->create_links();

    	$this->load->view("posts_v",$viewData);
    }
}

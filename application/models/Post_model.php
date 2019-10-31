<?php

class Post_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_records($limit,$count){
        return $this->db->limit($limit,$count)->get("posts")->result();
    } 

    public function get_count(){
        return $this->db->count_all("posts");
    } 
}
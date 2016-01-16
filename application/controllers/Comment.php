<?php

class Comment extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->library('template');
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->model('comment_model');
	$this->load->database();
	//$this->load->library('pagination');
	$this->load->library('form_validation');
	$this->load->helper('time_ago_helper');
    }
    public function index() {
	
    }

    public function add() {

	if (!empty($this->session->userdata('id'))) {
	    $user_id = $this->session->userdata('id');
	} else {
	    $user_id = 0;
	}
	if (!empty($this->session->userdata('id'))) {
	    $user_name = $this->session->userdata('username');
	} else {
	    $user_name = '';
	}
	//adding notes in project notes
	$time_ago=time_elapsed_string(strtotime(date("Y-m-d H:i:s")));
	$data_notes = array(
	    'news_id' => $this->input->post('news_id'),
	    'comment' => $this->input->post('news_comment'),
	    'comment_by' => $user_id,
	    'created_date' => date("Y-m-d H:i:s"),
	);
	
	if ($this->comment_model->add_comment($data_notes, TRUE)) {
	    $response = array('status' => 'success', 'msg' => 'Your notes has been successfully added', 'comment' => $this->input->post('news_comment'),'username' => $user_name,'time'=>$time_ago);
	    echo json_encode($response);
	    die();
	} else {
	    $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
	    echo json_encode($response);
	    die();
	}
    }
}
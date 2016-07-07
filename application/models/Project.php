<?php

class Project extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->database();
    $this->load->model('project_model');
    $this->load->library('form_validation');
    /*
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('/login');
    }*/
  }

  public function index() {
    $data['inprogress_list'] = $this->project_model->get_all_inprogress_project();
    $data['idea_list'] = $this->project_model->get_all_idea_project();
    $this->template->load('admin_default', 'project/index', $data);
  }

  

}
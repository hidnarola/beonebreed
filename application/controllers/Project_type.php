<?php

class Project_type extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('project_type_model');
    $this->load->database();
    //$this->load->library('pagination');
    $this->load->library('form_validation');
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('/login');
    }
  }

  public function index() {
    $data['type_list'] = $this->project_type_model->get_all_type();
    $this->template->load('admin_default', 'project_type/index', $data);
  }

  public function add() {
    if ($this->form_validation->run('type') == FALSE) {
      $this->template->load('admin_default', 'project_type/add');
    } else {
      if (!empty($_POST)) {
        $data = array(
            'type' => $this->input->post('type'),
        );

        if ($this->project_type_model->add_records($data, TRUE)) {
          $this->session->set_flashdata('msg', 'Project Type has been successfully added');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('project_type');
      }
    }
  }

  public function edit($id = 0) {
    if ($this->form_validation->run('type') == FALSE) {
      $data['type'] = $this->project_type_model->get($id);
      $this->template->load('admin_default', 'project_type/edit', $data);
    } else {
      if (!empty($_POST)) {
        if ($this->project_type_model->update_records($id, TRUE)) {
          $this->session->set_flashdata('msg', 'Project Type has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('project_type');
      }
    }
  }

  public function delete($id = 0) {
    if ($this->project_type_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Project Type has been successfully deleted');
    } else {
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('project_type');
  }
}
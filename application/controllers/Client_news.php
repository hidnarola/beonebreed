<?php

class Client_news extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('client_news_model');
    $this->load->database();
    //$this->load->library('pagination');
    $this->load->library('form_validation');
    if (!$this->session->userdata('client_user_logged_in')) {
      redirect('login');
    } 
  }

  public function index() {
 
    $data['news_list'] = $this->client_news_model->get_all();
    $this->template->load('mondou_default', 'client_news/index', $data);
  }

  public function add() {

    if ($this->form_validation->run('news') == FALSE) {

      $this->template->load('admin_default', 'news/add');
    } else {
      if (!empty($_POST)) {

        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => '1',
            'visible_to_client' => $this->input->post('client_visibility'),
            'comment' => '',
            'created_date	' => date("Y-m-d H:i:s")
        );
        if ($this->news_model->add_records($data, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully added');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('news/');
      }
    }
  }

  public function edit($id = 0) {
    if ($this->form_validation->run('news') == FALSE) {
      $data['new'] = $this->news_model->get($id);
      $this->template->load('admin_default', 'news/edit', $data);
    } else {
      if (!empty($_POST)) {
        if ($this->new_model->update_records($id, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('news/');
      }
    }
  }

  public function delete($id = 0) {
    if ($this->news_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Your record has been successfully deleted');
    } else {
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('news/');
  }

}
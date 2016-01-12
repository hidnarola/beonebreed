<?php

class Client_login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('client_login_model');
  }

  public function index() {

    if (!empty($_POST)) {
      $username = $this->input->post('username');
      $password = md5($this->input->post('password'));
						
      $result = $this->client_login_model->login($username,$password);
      if ($result) {
											redirect('mondou/news');
      } else {
		
        $data['msg'] = "Please enter Correct login information";
        $this->template->load('admin_login', 'login/index', $data);
      }
    }
    $this->template->load('admin_login', 'login/index');
  }

  public function logout() {
    /*
    $newdata = array(
      'mondou_id'  =>'',
      'mondou_username'  =>'',
      'mondou_email'  =>'',    
      'mondou_logged_in'  =>False,
    );*/
    $newdata = array(
				'client_id'  =>'',
				'client_username'  => '',
				'client_email'  => '',    
				'client_logged_in'  =>False,
    );
    $this->session->unset_userdata($newdata);
    $this->session->sess_destroy();
    redirect('client_login/');
  }

}
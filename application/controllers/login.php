<?php

class Login extends CI_Controller {


    public function __construct() {
	parent::__construct();
	$this->load->library('template');
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->model('login_model');
    }




    public function index($user = null) {
	$data = array();
	$data['company_logo'] = '';
	if (!empty($_POST)) {
	    $username = $this->input->post('username');
	    $password = md5($this->input->post('password'));

	    $result = $this->login_model->login($username, $password, $user);
	    if ($result) {
		$user_type = $result[0]->user_type;
		if ($user_type == 1 || $user_type == 2) {
		    $newdata = array(
			'id' => $result[0]->id,
			'username' => $result[0]->username,
			'admin_logged_in' => TRUE,
			'user_type' => $result[0]->user_type,
		    );
		} else if ($user_type == 3) {
		    
		    $newdata = array(
			'id' => $result[0]->id,
			'username' => $result[0]->username,
			'client_logged_in' => TRUE,
			'user_type' => $result[0]->user_type,
		    );
		    
		}else if($user_type == 4){
		    $newdata = array(
			'id' => $result[0]->id,
			'username' => $result[0]->username,
			'client_user_logged_in' => TRUE,
			'user_type' => $result[0]->user_type,
			'client_id' => $result[0]->client_id,
		    );
		}
		$this->session->set_userdata($newdata);
		if ($user_type == 1 || $user_type == 2) {
		    redirect('dashboard');
		} else if ($user_type == 3) {
		    redirect('client_dashboard');
		}else if($user_type == 4){
		   redirect('client_news');
		}
	    } else {

		$data['msg'] = "Please enter Correct login information";
		//$this->template->load('admin_login', 'login/index', $data);
	    }
	}
	if (!empty($user)) {
	    $client_result = $this->login_model->get_client_info($user);
	    if ($client_result) {
		$data['company_logo'] = $client_result[0]->logo_name;
		//$this->template->load('admin_login', 'login/index',$data);
	    }
	}

	$this->template->load('admin_login', 'login/index', $data);
    }

    public function logout() {
	$user_type = $this->session->userdata('user_type');
	$user_name = $this->session->userdata('username');
	if (!empty($this->session->userdata('client_id'))) {
	    $client_id = $this->session->userdata('client_id');
	}
	if ($user_type == 1 || $user_type == 2) {
	    $newdata = array(
		'id' => '',
		'username' => '',
		'admin_logged_in' => False,
		'user_type' => '',
	    );
	} else if ($user_type == 3) {
	    $newdata = array(
		'id' => '',
		'username' => '',
		'client_logged_in' => False,
		'user_type' => '',
	    );
	}else if($user_type == 4){
	    $newdata = array(
		'id' => '',
		'username' => '',
		'client_user_logged_in' => False,
		'user_type' => '',
		'client_id' => '',
	    );
	    
	    
	    
	    
	}
	$this->session->unset_userdata($newdata);
	$this->session->sess_destroy();
	if ($user_type == 3) {
	    redirect($user_name);
	} else if ($user_type == 4) {
	    $query = $this->db->get_where('users', array('id' => $client_id));
	    $query_result = $query->row_array();
	    redirect($query_result['username']);
	} else {
	    redirect('login');
	}
    }

}
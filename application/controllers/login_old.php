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
      $result = $this->login_model->login($username, $password);
		
      if ($result) {
											$user_type=$result[0]->user_type;	
											if($user_type==1 || $user_type==2){
													$newdata = array(
															'username'  => $result[0]->username,    
															'admin_logged_in'  => TRUE,
															'user_type'=>	$result[0]->user_type,	
														);
												
											}else if($user_type==3 || $user_type==4){
												
													$newdata = array(
															'client_username'  => $result[0]->username,    
															'client_logged_in'  => TRUE,
															'user_type'=>	$result[0]->user_type,	
															'client_id'=>	$result[0]->id,			
													);
											}
											$this->session->set_userdata($newdata);
										
												if($user_type==1 || $user_type==2){
														redirect('dashboard');
												}else if($user_type==3 || $user_type==4){
															redirect('client_news');
												}				
      } else {

        $data['msg'] = "Please enter Correct login information";
        //$this->template->load('admin_login', 'login/index', $data);
      }
    }
				
				if(!empty($user)){		
						$client_result = $this->login_model->get_client_info($user);
						if($client_result){
										$data['company_logo'] =$client_result[0]->logo_name;
										//$this->template->load('admin_login', 'login/index',$data);
						}
			}
				$this->template->load('admin_login', 'login/index', $data);
  }
		
				
  public function logout() {
			
			$newdata = array(
						'client_username'  => $result[0]->username,    
						'client_logged_in'  => TRUE,
						'user_type'=>	$result[0]->user_type,	
						'client_id'=>	$result[0]->id,			
				);
				$newdata = array(
						'username'  => $result[0]->username,    
						'admin_logged_in'  => TRUE,
						'user_type'=>	$result[0]->user_type,	
					);
			
			/*
    $newdata = array(
        'admin_id' => '',
        'username' => '',
        'admin_email' => '',
        'admin_logged_in' => FALSE,
								'client_logged_in'=>FALSE,
        'user_group_id'  =>'',
    );*/
    $this->session->unset_userdata($newdata);
    $this->session->sess_destroy();
    redirect('login/');
  }

}
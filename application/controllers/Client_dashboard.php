<?php

class Client_dashboard extends CI_Controller{
	
	public function __construct(){
            parent::__construct();
            $this->load->library('template');
            $this->load->helper('url');
            $this->load->helper('form');
			//$this->load->model('category_model');
			$this->load->database();
			//$this->load->library('pagination');
			//$this->load->library('form_validation');
			
			if (!$this->session->userdata('client_logged_in'))
			{ 
				redirect('/login');
			}
	
	}	
	public function index(){
		$this->template->load('mondou_default','client_dashboard/index');        
	}
	
	
}
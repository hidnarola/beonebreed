<?php

class Dashboard extends CI_Controller {

    public function __construct() {
		parent::__construct();
		$this->load->library('template');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('news_model');
		$this->load->helper('time_ago_helper');
		
		if (!$this->session->userdata('admin_logged_in')) {
		    redirect('login');
	    }
    }

    public function index() {
		$news_list = $this->news_model->get_all();
		foreach ($news_list as $key => $val) {
		    $news_list[$key]['time_ago'] = time_elapsed_string(strtotime($val['created_date']));
		}
                $user_id = $this->session->userdata('id');
		$data['news_list'] = $news_list;
		$data['products'] = $this->products_model->getfrom('products_new');
		$data['projects'] = $this->products_model->getfrom('projects',false,array('where'=>array('priority'=>'1')));
		
		$this->template->load('admin_default', 'dashboard/index', $data);
    }
    
    public function edit($id = 0) {

		if ($this->form_validation->run('edit_news') == FALSE) {
		    $data['new'] = $this->news_model->get($id);
		    $this->template->load('admin_default', 'news/edit', $data);
		} else {
		    if (!empty($_POST)) {
			if ($this->news_model->update_records($id, TRUE)) {
			    $this->session->set_flashdata('msg', 'Your record has been successfully updated');
			} else {
			    $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
			}
			redirect('dashboard/');
		    }
		}
    }

    public function delete($id = 0) {
		if ($this->news_model->delete_records($id, TRUE)) {
		    $this->session->set_flashdata('msg', 'Your record has been successfully deleted');
		} else {
		    $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
		}
		redirect('dashboard/');
    }

}
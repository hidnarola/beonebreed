<?php class News extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('news_model');
    $this->load->database();
    //$this->load->library('pagination');
    $this->load->library('form_validation');

    if (!$this->session->userdata('admin_logged_in')) {
      redirect('/login');
    }
  }
  public function index() {
    $data['news_list'] = $this->news_model->get_all();
    $this->template->load('admin_default', 'news/index',$data);
  }
  public function add() {

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = '*';
    
    $this->load->library('upload', $config);
    if ($this->form_validation->run('news') == FALSE) { 
     
      $this->template->load('admin_default', 'news/add');
    } else {
      if (!empty($_POST)) {   
     
        if(!empty($this->input->post('client_visibility'))){
          $visibility=$this->input->post('client_visibility');
        }else{
          $visibility=0;
        }
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => '1',
            'visible_to_client' =>$visibility,
            'comment' => '',
            'created_date	' =>date("Y-m-d H:i:s")
        );
        
        $last_inserted_news=$this->news_model->add_records($data, TRUE);
        if (!empty($last_inserted_news)) {
     
          if ($_FILES['file']['name']) {
            if (!$this->upload->do_upload('file')) {
              $error = array('error' => $this->upload->display_errors());
              //$response = array('status' => 'fail', 'msg' => $this->upload->display_errors());
              //echo json_encode($response);
              die();
            } else {
              $upload_data = array('uploads' => $this->upload->data('file'));
              $data_upload = array(
                  'news_id' => $last_inserted_news,
                  'name' => $upload_data['uploads']['file_name'],
              );
              $this->news_model->add_news_attachemnt($data_upload, TRUE);
            }
          }
          
          
          $this->session->set_flashdata('msg', 'Your record has been successfully added');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('news/');
      }
    }
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
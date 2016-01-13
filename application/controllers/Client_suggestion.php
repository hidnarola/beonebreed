<?php

class Client_suggestion extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('client_suggestion_model');
    $this->load->database();
    //$this->load->library('pagination');
    $this->load->library('form_validation');
    
      if (!$this->session->userdata('client_user_logged_in')) {
      redirect('/login');
      } 
  }

  public function index() {
	$client_id=$this->session->userdata('client_id');
	$user_id=$this->session->userdata('id');
    $data['suggestion_list'] = $this->client_suggestion_model->get_all($user_id,$client_id);
	
    $this->template->load('mondou_default', 'client_suggestion/index', $data);
  }

  public function add() {
    if ($this->form_validation->run('suggestion') == FALSE) {
      $data['product_list'] = $this->client_suggestion_model->get_product_list();
      $data['store_list'] = $this->client_suggestion_model->get_store_list();
      $data['suggestion_type'] = $this->client_suggestion_model->get_suggestion_type();
      $this->template->load('mondou_default', 'client_suggestion/add', $data);
    } else {


      if (!empty($_POST)) {

        if (!empty($this->session->userdata('client_id'))) {
          $client_id = $this->session->userdata('client_id');
        } else {
          $client_id = 0;
        }
		if (!empty($this->session->userdata('id'))) {
          $user_id = $this->session->userdata('id');
        } else {
          $user_id = 0;
        }

        $data = array(
            'name' => $this->input->post('name'),
            'suggestion_type' => $this->input->post('suggestion_type'),
            'product' => $this->input->post('product'),
            'subject' => $this->input->post('subject'),
            'description' => $this->input->post('description'),
            'store' => $this->input->post('store'),
            'contact_info' => $this->input->post('contact_info'),
            'status' => '0',
            'user_id' => $user_id,
			'client_id' => $client_id,
            'created_date	' => date("Y-m-d H:i:s")
        );
        $id = $this->client_suggestion_model->add_records($data, TRUE);
        if (!empty($id)) {
          redirect('client_suggestion/add_next/' . $id);
        }

        /*
          if ($this->client_suggestion_model->add_records($data, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully added');
          } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
          }
          redirect('mondou/suggestion/'); */
      }
    }
  }

  public function add_next($id = 0) {
    $data['last_project_id'] = $id;
    $data['attachment'] = $this->client_suggestion_model->get_suggestion_attachment($id);
    $data['notes'] = $this->client_suggestion_model->get_suggestion_notes($id);
    $data['external_link'] = $this->client_suggestion_model->get_suggestion_external_com($id);
    $this->template->load('mondou_default', 'client_suggestion/add_next', $data);
  }

  public function edit($id = 0) {
    if ($this->form_validation->run('suggestion') == FALSE) {
      $data['product_list'] = $this->client_suggestion_model->get_product_list();
      $data['store_list'] = $this->client_suggestion_model->get_store_list();
      $data['suggestion_type'] = $this->client_suggestion_model->get_suggestion_type();
      $data['suggestion'] = $this->client_suggestion_model->get($id);
		$data['attachment'] = $this->client_suggestion_model->get_suggestion_attachment($id);
      $data['notes'] = $this->client_suggestion_model->get_suggestion_notes($id);
      $data['external_link'] = $this->client_suggestion_model->get_suggestion_external_com($id);

      $this->template->load('mondou_default', 'client_suggestion/edit', $data);
    } else {
      if (!empty($_POST)) {
        if ($this->client_suggestion_model->update_records($id, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('client_suggestion/');
      }
    }
  }

  public function delete($id = 0) {

    if ($this->client_suggestion_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Your record has been successfully deleted');
    } else {
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('client_suggestion');
  }

  public function get_contact_info() {

    if (!empty($_POST['id'])) {
      $list = $this->client_suggestion_model->get_contact($_POST['id']);

      if (!empty($list['contact'])) {
        $contact_info = $list['contact'];
      } else {
        $contact_info = '';
      }
      $response = array('status' => 'success', 'contact_info' => $contact_info);
      echo json_encode($response);
      die();
    }
  }

  public function suggestion_upload_form() {
    $config['upload_path'] = './uploads/';
    //$config['max_size']	= '5';
    //$config['max_width']  = '1024';
    //$config['max_height']  = '768';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);

    if ($_FILES['file']['name']) {
      if (!$this->upload->do_upload('file')) {
        //$error = array('error' => $this->upload->display_errors());
        $response = array('status' => 'fail', 'msg' => $this->upload->display_errors());
        echo json_encode($response);
        die();
      } else {
        $upload_data = array('uploads' => $this->upload->data('file'));
      }
    }
    $data_upload = array(
        'suggestion_id' => $this->input->post('hdn_project_id'),
        'name' => $upload_data['uploads']['file_name'],
		'created_date' => date("Y-m-d H:i:s")
    );

    $last_inserted_id = $this->client_suggestion_model->add_attachemnt($data_upload, TRUE);

    if (!empty($last_inserted_id)) {
      $response = array('status' => 'success', 'msg' => 'Your file has been successfully added', 'file_name' => $upload_data['uploads']['file_name'], 'id' => $last_inserted_id);
      echo json_encode($response);
      die();
    } else {
      $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
      echo json_encode($response);
      die();
    }
  }

  //adding link in project notes

  public function suggestion_add_links() {
    $data_link = array(
        'suggestion_id' => $this->input->post('hdn_project_id'),
        'name' => $this->input->post('external_com'),
        'description' => $this->input->post('description'),
		'created_date' => date("Y-m-d H:i:s")
    );
    $last_id = $this->client_suggestion_model->add_external_link($data_link, TRUE);
    if (!empty($last_id)) {
      $created_time = date("d F Y");
      $response = array('status' => 'success', 'msg' => 'Your notes has been successfully added', 'link_name' => $this->input->post('external_com'), 'link_desc' => $this->input->post('description'), 'link_id' => $last_id, 'dates1' => $created_time);
      echo json_encode($response);
      die();
    } else {
      $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
      echo json_encode($response);
      die();
    }
  }

  public function suggestion_add_notes() {
    //adding notes in project notes
    $data_notes = array(
        'suggestion_id' => $this->input->post('hdn_project_id'),
        'name' => $this->input->post('notes_name'),
        'description' => $this->input->post('description'),
		'created_date' => date("Y-m-d H:i:s")
    );

    $last_notes_id = $this->client_suggestion_model->add_notes_records($data_notes, TRUE);

    if (!empty($last_notes_id)) {
      $created_time = date("d F Y");
      $response = array('status' => 'success', 'msg' => 'Your notes has been successfully added', 'notes_name' => $this->input->post('notes_name'), 'id' => $last_notes_id, 'desc' => $this->input->post('description'), 'dates1' => $created_time);
      echo json_encode($response);
      die();
    } else {
      $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
      echo json_encode($response);
      die();
    }
  }

  public function delete_selected_attachemnt() {
			
    if (!empty($_POST['ids'])) {
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('suggestion_attachment')) {
        $response = array('status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }

    echo json_encode($response);
    die();
  }

  public function delete_selected_notes() {

    if (!empty($_POST['ids'])) {
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('suggestion_notes')) {
        $response = array('status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }

    echo json_encode($response);
    die();
  }

  public function delete_selected_link() {

    if (!empty($_POST['ids'])) {
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('suggestion_external_com')) {
        $response = array('status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }
    echo json_encode($response);
    die();
  }

}
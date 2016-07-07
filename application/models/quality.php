<?php

class Quality extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('quality_model');
    $this->load->database();
    //$this->load->library('pagination');
    $this->load->library('form_validation');
      if (!$this->session->userdata('admin_logged_in')) {
      redirect('login');
      } 
  }
  public function index($client_id=0) {
	$data['quality_list']=$this->quality_model->get_all($client_id);
	$data['completed_quality_list']=$this->quality_model->get_all_completed_report($client_id);
	$data['client_name']=$this->quality_model->get_client_name($client_id);
	$data['client_id']=$client_id;
    $this->template->load('admin_default', 'quality/index', $data);
	
  }

  public function add() {

    if ($this->form_validation->run('quality') == FALSE) {
      $data['product_list'] = $this->quality_model->get_product_list();
      $data['store_list'] = $this->quality_model->get_store_list();
      $data['problem_list'] = $this->quality_model->get_problem_list();
      $this->template->load('admin_default', 'quality/add', $data);
    } else {
      if (!empty($_POST)) {

        if ($this->session->userdata('client_id')!='') {
          $client_id = $this->session->userdata('client_id');
        } else {
          $client_id = 0;
        }
		if ($this->session->userdata('id')!='') {
          $user_id = $this->session->userdata('id');
        } else {
          $user_id = 0;
        }

        if ($this->input->post('ds')!='') {
          $ds = $this->input->post('ds');
        } else {
          $ds = 0;
        }
        $data = array(
												'id' => $this->input->post('id'),
            'name' => $this->input->post('name'),
            'store' => $this->input->post('store'),
            'product' => $this->input->post('product'),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'problem_type' => $this->input->post('problem_type'),
            'qty_in_store' => $this->input->post('qty_in_store'),
            'qty_defect' => $this->input->post('qty_defect'),
            'ds' => $ds,
            'contact_info' => $this->input->post('contact_info'),
            'status' => '0',
            'user_id' => $user_id,
			'client_id' => $client_id,
            'created_date	' => date("Y-m-d H:i:s")
        );

        $id = $this->quality_model->add_records($data, TRUE);
        if (!empty($id)) {
          redirect('quality/add_next/' . $id);
        }
        /*
          if ($this->quality_model->add_records($data, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully added');
          } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
          }
          redirect('mondou/mondou/'); */
      }
    }
  }

  public function quality_upload_form() {
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
        'quality_id' => $this->input->post('hdn_project_id'),
        'name' => $upload_data['uploads']['file_name'],
    );

    $last_inserted_id = $this->quality_model->add_attachemnt($data_upload, TRUE);

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

  public function quality_add_links() {
    $data_link = array(
        'quality_id' => $this->input->post('hdn_project_id'),
        'name' => $this->input->post('external_com'),
        'description' => $this->input->post('description'),
    );
    $last_id = $this->quality_model->add_external_link($data_link, TRUE);
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

  public function quality_add_notes() {
    //adding notes in project notes
    $data_notes = array(
        'quality_id' => $this->input->post('hdn_project_id'),
        'name' => $this->input->post('notes_name'),
        'description' => $this->input->post('description'),
    );

    $last_notes_id = $this->quality_model->add_notes_records($data_notes, TRUE);

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

  public function add_next($id = 0) {
    $data['last_project_id'] = $id;
    $data['attachment'] = $this->quality_model->get_quality_attachment($id);
    $data['notes'] = $this->quality_model->get_quality_notes($id);
    $data['external_link'] = $this->quality_model->get_quality_external_com($id);
    $this->template->load('admin_default', 'quality/add_next', $data);
  }

  public function edit($id = 0,$client_id=0) {
    if ($this->form_validation->run('admin_quality') == FALSE) {
      $data['product_list'] = $this->quality_model->get_product_list();
	  $data['status_list'] = $this->quality_model->get_status_list();
      $data['store_list'] = $this->quality_model->get_store_list();
      $data['problem_list'] = $this->quality_model->get_problem_list();
      $data['quality'] = $this->quality_model->get($id);
      $data['attachment'] = $this->quality_model->get_quality_attachment($id);
      $data['notes'] = $this->quality_model->get_quality_notes($id);
      $data['external_link'] = $this->quality_model->get_quality_external_com($id);
	  $data['client_id'] = $client_id ;
	  $data['client_name']=$this->quality_model->get_client_name($client_id);
      $this->template->load('admin_default', 'quality/edit', $data);
    } else {
      if (!empty($_POST)) {
        if ($this->quality_model->update_records($id, TRUE)) {
          $this->session->set_flashdata('msg', 'Report status has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('quality/index/'.$client_id);
      }
    }
  }

  public function delete($id = 0) {

    if ($this->quality_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Report has been successfully deleted');
    } else {
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('quality');
  }

  public function get_contact_info() {

    if (!empty($_POST['id'])) {
      $list = $this->quality_model->get_contact($_POST['id']);

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

  public function delete_selected_attachemnt() {

    if (!empty($_POST['ids'])) {
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('quality_attachment')) {
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
      if ($this->db->delete('quality_notes')) {
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
      if ($this->db->delete('quality_external_com')) {
        $response = array('status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }
    echo json_encode($response);
    die();
  }

}
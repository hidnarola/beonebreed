<?php

class Project extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->database();
    $this->load->model('project_model');
    $this->load->library('form_validation');
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('/login');
    }
  }

  public function index() {

    $data['inprogress_list'] = $this->project_model->get_all_inprogress_project();
    $data['idea_list'] = $this->project_model->get_all_idea_project();
    $this->template->load('admin_default', 'project/index', $data);
  }

  public function archieve_projects() {
    $data['archieve_list'] = $this->project_model->get_all_archieve_project();
    $this->template->load('admin_default', 'project/archieve', $data);
  }

  public function add() {

    if ($this->form_validation->run('project') == FALSE) {
      $data['project_type'] = $this->project_model->get_all_types();
      $data['categories'] = $this->project_model->get_caregory();
      $data['project_manager'] = $this->project_model->get_project_manager();
      $this->template->load('admin_default', 'project/add', $data);
    } else {
      if (!empty($_POST)) {

        if (empty($this->input->post('category_id'))) {
          $category_id = 0;
        } else {
          $category_id = $this->input->post('category_id');
        }

        if (empty($this->input->post('estimated_days'))) {
          $estimated_days = 0;
        } else {
          $estimated_days = $this->input->post('estimated_days');
        }
        if (empty($this->input->post('priority'))) {
          $priority = 0;
        } else {
          $priority = $this->input->post('priority');
        }
        if (empty($this->input->post('project_manager'))) {
          $project_manager = '';
        } else {
          $project_manager = $this->input->post('project_manager');
        }
        if (empty($this->input->post('quick_notes'))) {
          $quick_notes = '';
        } else {
          $quick_notes = $this->input->post('quick_notes');
        }

        $data = array(
            'name' => $this->input->post('name'),
            'project_type_id' => $this->input->post('project_type_id'),
            'category_id' => $category_id,
            'estimated_days' => $estimated_days,
            'priority' => $priority,
            'project_manager' => $project_manager,
            'quick_notes' => $quick_notes,
            'created_date'=>date("Y-m-d H:i:s"),
        );

        $id = $this->project_model->add_records($data, TRUE);
        if ($id) {
          
          redirect('project/add_next/' . $id);
        }
      }
    }
  }

  	
  public function add_next($id = 0) {
    $data['last_project_id'] = $id;
    $data['attachment'] = $this->project_model->get_project_attachment($id);
    $data['notes'] = $this->project_model->get_project_notes($id);
    $data['external_link'] = $this->project_model->get_project_external_link($id);
    $this->template->load('admin_default', 'project/add_next', $data);
  }

  public function project_upload_form() {
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
        'project_id' => $this->input->post('hdn_project_id'),
        'name' => $upload_data['uploads']['file_name'],
    );

    $last_inserted_id = $this->project_model->add_attachemnt($data_upload, TRUE);
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

  public function timesheet_upload_form() {
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
        'timesheet_id' => $this->input->post('hdn_timesheet_id'),
        'name' => $upload_data['uploads']['file_name'],
    );
    $last_inserted_id = $this->project_model->add_timesheet_attachemnt($data_upload, TRUE);
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

  public function project_add_notes() {
    //adding notes in project notes
    $data_notes = array(
        'project_id' => $this->input->post('hdn_project_id'),
        'name' => $this->input->post('notes_name'),
        'description' => $this->input->post('description'),
    );

    $last_notes_id = $this->project_model->add_notes_records($data_notes, TRUE);
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

  //adding notes in project notes     
  public function updates_estimate_level() {
    $project_id = $this->input->post('id');
    if ($this->project_model->update_estimate_level($project_id)) {
      $response = array('status' => 'success');
      echo json_encode($response);
      die();
    } else {
      $response = array('status' => 'fail');
      echo json_encode($response);
      die();
    }
  }

  //adding link in project notes

  public function project_add_links() {
    $data_link = array(
        'project_id' => $this->input->post('hdn_project_id'),
        'name' => $this->input->post('external_com'),
        'description' => $this->input->post('description'),
    );
    $last_id = $this->project_model->add_external_link($data_link, TRUE);
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

  public function project_archieve() {


    //adding notes in project notes	
    $project_id = $this->input->post('id');
    if ($this->project_model->update_project_status($project_id)) {
      $response = array('status' => 'success', 'msg' => 'Project has been successfully archieved');
      echo json_encode($response);
      die();
    } else {

      $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
      echo json_encode($response);
      die();
    }
  }

  /*
    public function adds(){


    if ($this->form_validation->run('project') == FALSE){
    $data['project_type'] = $this->project_model->get_all_types();
    $data['categories'] = $this->project_model->get_caregory();
    $this->template->load('admin_default','project/add',$data);
    }else{

    if(!empty($_POST)){
    $data=array(
    'name'=>$this->input->post('name'),
    'project_type_id'=>$this->input->post('project_type_id'),
    'category_id'=>$this->input->post('category_id'),
    'estimated_days'=>$this->input->post('estimated_days'),
    'priority'=>$this->input->post('priority'),
    'project_manager'=>$this->input->post('project_manager'),
    'quick_notes'=>$this->input->post('quick_notes'),
    );

    $project_id=$this->project_model->add_records($data,TRUE);
    if($project_id){

    //adding notes in project notes
    $data_notes=array(
    'project_id'=>$project_id,
    'name'=>$this->input->post('notes_name'),
    'description'=>$this->input->post('description'),
    );
    $this->project_model->add_notes_records($data_notes,TRUE);

    //adding link in project notes

    $data_link=array(
    'project_id'=>$project_id,
    'name'=>$this->input->post('external_link'),
    );
    $this->project_model->add_external_link($data_link,TRUE);



    //uploading attachment

    $config['upload_path'] = './uploads/';
    //$config['max_size']	= '100';
    //$config['max_width']  = '1024';
    //$config['max_height']  = '768';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);

    if ($_FILES['file']['name']) {
    if (!$this->upload->do_upload('file')) {
    $error = array('error' => $this->upload->display_errors());

    } else {
    $upload_data = array('uploads' => $this->upload->data('file'));
    }
    }

    $data_upload = array(
    'project_id' => $project_id,
    'name' => $upload_data['uploads']['file_name'],
    );

    $this->project_model->add_attachemnt($data_upload,TRUE);


    $this->session->set_flashdata('msg', 'Your record has been successfully added');
    }else{
    $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('project');

    }
    }
    } */

  //adding action plan

  public function add_action_plan($id = 0) {

    if ($this->form_validation->run('action_plan') == FALSE) {
      $data['project_id'] = $id;
      $this->template->load('admin_default', 'project/add_action_plan', $data);
    } else {
      if (!empty($_POST)) {
							
							if (empty($this->input->post('target_date'))) {
									$target_date = '0000-00-00 00:00:00';
							} else {
									$target_date = $this->input->post('target_date');
							}
							if (empty($this->input->post('notes'))) {
									$notes = '';
							} else {
									$notes = $this->input->post('notes');
							}
        $data = array(
            'action' => $this->input->post('action'),
            'project_id' => $id,
            'resposible' => $this->input->post('resposible'),
            'mertic_key' => $this->input->post('mertic_key'),
            'complete_level' => $this->input->post('complete_level'),
												'target_date' => $target_date,
												'notes' => $notes,
												'created_date'=>date("Y-m-d H:i:s"),
        );

        if ($this->project_model->add_action_plan($data, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully added');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('project/edit/' . $id);
      }
    }
  }

  //adding timesheet data

  public function add_timesheet($id = 0) {

    if ($this->form_validation->run('timesheet') == FALSE) {
      $data['project_id'] = $id;
      $this->template->load('admin_default', 'project/add_timesheet', $data);
    } else {
      if (!empty($_POST)) {

        if (empty($this->input->post('total_time'))) {
          $total_time = 0;
        } else {
          $total_time = $this->input->post('total_time');
        }
        if (empty($this->input->post('speciality_date'))) {
          $speciality_date ='0000-00-00 00:00:00';
        } else {
          $speciality_date = $this->input->post('speciality_date');
        }
        
        $data = array(
            'username' => $this->input->post('username'),
            'total_time' => $total_time,
            'dates' => $this->input->post('dates'),
            'today_introduction' => $this->input->post('today_introduction'),
            'today_research_report' => $this->input->post('today_research_report'),
            'speciality_date' => $speciality_date,
            'speciality_username' => $this->input->post('speciality_username'),
            'speciality' => $this->input->post('speciality'),
            'company_name' => $this->input->post('company_name'),
            'subject_discussion' => $this->input->post('Subject_discussion'),
            'Contact_info' => $this->input->post('contact_info'),
            'project_id' => $id,
        );
        
        $timesheet_id = $this->project_model->add_timesheet($data, TRUE);
        if (!empty($id)) {
          redirect('project/add_next_timesheet/' .$timesheet_id);
        }
      }
    }
  }
  
  public function  add_next_timesheet($timesheet_id = 0) {
    
    $result=$this->project_model->get_project_id($timesheet_id);
    $data['project_id']=$result['project_id'];
    $data['last_timesheet_id'] = $timesheet_id;
    $data['attachment'] = $this->project_model->get_timesheet_attachment($timesheet_id);
    $this->template->load('admin_default', 'project/add_next_timesheet',$data);
  }
  public function edit_action_plan($id = 0) {

    if ($this->form_validation->run('action_plan') == FALSE) {


      $data['action_plan'] = $this->project_model->get_action_plan_data($id);

      $this->template->load('admin_default', 'project/edit_action_plan', $data);
    } else {
      if (!empty($_POST)) {
        $data = array(
            'action' => $this->input->post('action'),
            'resposible' => $this->input->post('resposible'),
            'mertic_key' => $this->input->post('mertic_key'),
            'complete_level' => $this->input->post('name'),
        );

        if ($this->project_model->update_action_plan($id)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }

        $data['project'] = $this->project_model->get_action_plan_data($id);
        $project_id = $data['project']['project_id'];
        redirect('project/edit/' . $project_id);
      }
    }
  }

  public function view_action_plan($id = 0) {
    $data['action_plan'] = $this->project_model->get_action_plan_data($id);
    $this->template->load('admin_default', 'project/view_action_plan', $data);
  }

  public function edit_timesheet($id = 0) {

    $data['attachment'] = $this->project_model->get_timesheet_attachment($id);
    if ($this->form_validation->run('timesheet') == FALSE) {
      $data['timesheet_list'] = $this->project_model->get_timesheet_data($id);
      $this->template->load('admin_default', 'project/edit_timesheet', $data);
    } else {
      if (!empty($_POST)) {

        if ($this->project_model->update_timesheet($id)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }

        $data['project'] = $this->project_model->get_timesheet_data($id);
        $project_id = $data['project']['project_id'];
        redirect('project/edit/' . $project_id);
      }
    }
  }

  public function view_timesheet($id = 0) {

    $data['attachment'] = $this->project_model->get_timesheet_attachment($id);
    $data['timesheet_list'] = $this->project_model->get_timesheet_data($id);
    $this->template->load('admin_default', 'project/view_timesheet', $data);
  }

  public function edit($id = 0) {
    /* if ($this->form_validation->run('project') == FALSE){ */

    $data['project_type'] = $this->project_model->get_all_types();
    $data['categories'] = $this->project_model->get_caregory();
    $data['project'] = $this->project_model->get($id);

    $data['action_plan'] = $this->project_model->get_action_plan($id);

    $data['timesheet'] = $this->project_model->get_timesheet($id);

    $data['attachment'] = $this->project_model->get_project_attachment($id);
    $data['notes'] = $this->project_model->get_project_notes($id);
    $data['external_link'] = $this->project_model->get_project_external_link($id);

    if (!empty($data['project'])) {
      $this->template->load('admin_default', 'project/edit', $data);
    } else {
      $this->template->load('admin_default', 'project/edit');
    }
    /* }else{ */
    if (!empty($_POST)) {
      if ($this->project_model->update_records($id, TRUE)) {
        $this->session->set_flashdata('msg', 'Your record has been successfully updated');
      } else {
        $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
      }
      redirect('project');
    }
    /* } */
  }

  public function view_archieve($id = 0) {
    /* if ($this->form_validation->run('project') == FALSE){ */
    $data['project_type'] = $this->project_model->get_all_types();
    $data['categories'] = $this->project_model->get_caregory();
    $data['project'] = $this->project_model->get($id);

    $data['action_plan'] = $this->project_model->get_action_plan($id);

    $data['timesheet'] = $this->project_model->get_timesheet($id);

    $data['attachment'] = $this->project_model->get_project_attachment($id);
    $data['notes'] = $this->project_model->get_project_notes($id);
    $data['external_link'] = $this->project_model->get_project_external_link($id);

    if (!empty($data['project'])) {
      $this->template->load('admin_default', 'project/view_archieve', $data);
    } else {
      $this->template->load('admin_default', 'project/view_archieve');
    }
    /* }else{ */
    /*
      if(!empty($_POST)){
      if($this->project_model->update_records($id,TRUE)){
      $this->session->set_flashdata('msg', 'Your record has been successfully updated');

      }else{
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
      }
      redirect('project');
      } */
    /* } */
  }

  public function delete($id = 0) {

    if ($this->project_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Your record has been successfully deleted');
    } else {

      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('project');
  }

  public function upload($id = 0) {
    $this->template->load('admin_default', 'project/upload');
  }

  public function delete_selected_attachemnt() {

    if (!empty($_POST['ids'])) {
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('project_attachments')) {
        $response = array('status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }

    echo json_encode($response);
    die();
  }

  public function delete_timesheet_attachemnt() {

    if (!empty($_POST['ids'])) {
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('timesheet_attachments')) {
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
      if ($this->db->delete('project_notes')) {
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
      if ($this->db->delete('project_external_notes')) {
        $response = array('status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }
    echo json_encode($response);
    die();
  }
  
  public function get_username() {
    
    $query = $this->db->get('users');
    foreach ($query->result() as $row)
    {
        $username['id']=$row->id;
        $username['name']=$row->username;
    }
      echo json_encode($username);exit;
      
     
  }

}
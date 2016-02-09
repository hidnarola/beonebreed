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
        if ($this->session->userdata('admin_logged_in')=='') {
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

        }else{

            $category_id = 0;
            $quick_notes = '';
            $estimated_days = 0;
            $priority = 0;
            $project_manager = '';

            $category_id = $this->input->post('category_id');
            $estimated_days = $this->input->post('estimated_days');
            $priority = $this->input->post('priority');
            $project_manager = $this->input->post('project_manager');
            $quick_notes = $this->input->post('quick_notes');

            $created_by = $this->session->userdata('id');
            
            $data = array(
                'name' => $this->input->post('name'),
                'project_type_id' => $this->input->post('project_type_id'),
                'category_id' => $category_id,
                'estimated_days' => $estimated_days,
                'priority' => $priority,
                'project_manager' => $project_manager,
                'quick_notes' => $quick_notes,
                'created_by' => $created_by,
                'created_date'=>date("Y-m-d H:i:s"),
            );

            $id = $this->project_model->add_records($data, TRUE);

            if($id){                  
                redirect('project/add_next/' . $id);
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

  //adding notes in project notes
  public function project_add_notes() {
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
    $project_id = $this->input->post('id');
    if ($this->project_model->update_project_status($project_id)) {
      redirect('project');
      // $response = array('status' => 'success', 'msg' => 'Project has been successfully archieved');
      // echo json_encode($response);
      // die();
    } else {
      // $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
      // echo json_encode($response);
      // die();
    }
  }

  //adding action plan
  public function add_action_plan($id = 0) {

    if ($this->form_validation->run('action_plan') == FALSE) {
      $data['project_id'] = $id;
      $this->template->load('admin_default', 'project/add_action_plan', $data);
    } else {
      if (!empty($_POST)) {
							
							if ($this->input->post('target_date')=='') {
									$target_date = '0000-00-00 00:00:00';
							} else {
									$target_date = $this->input->post('target_date');
							}
							if ($this->input->post('notes')=='') {
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

            if ($this->input->post('total_time')=='') {
              $total_time = 0;
            } else {
              $total_time = $this->input->post('total_time');
            }
            if ($this->input->post('speciality_date')=='') {
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
    $data['suppliers']  =$this->products_model->getfrom('suppliers');

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
      $data_append ='';
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('project_attachments')) {
          $data['project_attachment'] = $this->project_model->get_project_attachment($_POST['pid']);
          foreach($data['project_attachment'] as $temp){
                    $data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]' id='chk_attachment' class='chk_notes' value=".$temp->id."><a  class='no_preview'  href=uploads/products/".$temp->name.">".$temp->name."</a></li>"; 
                }
         $response = array('data1' => $data_append,'status' => 'success');
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
      $data_append ='';
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('project_notes')) {
         $data['project_notes'] = $this->project_model->get_project_notes($_POST['project_id']);
          foreach($data['project_notes'] as $temp){
                    $data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]' id='chk_notes' class='chk_notes' value=".$temp->id."><a data-desc=".$temp->description." class='notes_link' id=".$temp->id." href='javascript::void(0)'>".$temp->name."</a><span style=margin-left:60px></span></li>"; 
                }
         $response = array('data1' => $data_append,'status' => 'success');
      } else {
        $response = array('status' => 'fail');
      }
    }

    echo json_encode($response);
    die();
  }

  public function delete_selected_link() {

    if (!empty($_POST['ids'])) {
      $data_append='';
      $ids = $_POST['ids'];
      $this->db->where_in('id', $ids);
      if ($this->db->delete('project_external_notes')) {
       
        $data['project_external'] = $this->project_model->get_project_external_link($_POST['pid']);

          foreach($data['project_external'] as $temp){
                    $data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]' id='chk_external' class='chk_external' value=".$temp->id."><a data-desc=".$temp->description." class='chk_external`' id=".$temp->id." href='javascript::void(0)'>".$temp->name."</a><span style=margin-left:60px></span></li>"; 
                }
         $response = array('data1' => $data_append,'status' => 'success');
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

  //  similar function used to load similar.php view.
  /*  By Parth Viramgama pav */
  public function similar($id){
    $data['project_data'] = $this->project_model->get_all_projects_by_id($id);
    $data['project_action_plan'] = $this->project_model->get_all_actionplan_by_projects_id($id);
    $data['project_type'] = $this->project_model->get_all_types();
    $data['categories'] = $this->project_model->get_caregory();
    $data['project_manager'] = $this->project_model->get_project_manager();
    $data['notes'] = $this->project_model->get_project_notes($id);
    $this->template->load('admin_default','project/similar',$data);
  }

  //  add_similar_prject gives functionlity to create new project as old project.
  /*  By Parth Viramgama pav */
  public function add_similar_project(){
        $old_project_id =  $this->input->post('old_project_id');

        $project_name = $this->input->post('name');
        $cnt = $this->project_model->get_all_project_data_by_name($project_name);
        if($cnt==0){
            $category_id = $this->input->post('category_id');
            $priority =  $this->input->post('priority');
            $quick_notes = $this->input->post('quick_notes');
            $project_type_id = $this->input->post('project_type_id');
            $estimated_days = $this->input->post('estimated_days');
            $project_manager = $this->input->post('project_manager');

            $data = array(
                    'name' => $project_name,
                    'project_type_id' => $project_type_id,
                    'category_id' => $category_id,
                    'estimated_days' => $estimated_days,
                    'priority' => $priority,
                    'project_manager' => $project_manager,
                    'quick_notes' => $quick_notes,
                    'created_date'=> date("Y-m-d H:i:s")
                );

            $id = $this->project_model->add_records($data, TRUE);
            $data['old_action_plan'] = $this->project_model->get_all_actionplan_by_projects_id($old_project_id);
            
            foreach($data['old_action_plan'] as $temp){
              $data1 = array(
                'project_id' => $id,
                'action' => $temp->action,
                'resposible' => $temp->resposible,
                'mertic_key' => $temp->mertic_key,
                'complete_level' => $temp->complete_level,
                'notes' => $temp->notes,
                'created_date'=> date("Y-m-d H:i:s"),
                'target_date' => $temp->target_date
               );
              $temp_id = $this->project_model->add_action_plan($data1);
            }

            echo json_encode(
                        array(
                          'project_id'=>$id,
                          'status'=>'success'
                        )
            );
            die();
        }else{
            echo json_encode(
                array(
                    'status'=>'unsuccess'
                    )
            );
            die();
        }
  }   

  //  add_similar_project_attachment function used to upload attachment .
  /*  By Parth Viramgama pav */
  public function add_similar_project_attachment() {

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);

    if ($_FILES['file']['name']) {
      if (!$this->upload->do_upload('file')) {
        $response = array('status' => 'fail', 'msg' => $this->upload->display_errors());
        echo json_encode($response);
        die();
      } else {
        $upload_data = array('uploads' => $this->upload->data('file'));
      }
    }
    $data_upload = array(
        'project_id' => $this->input->post('project_id'),
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

  //  add_similar_project_notes function used to upload project's notes.
  /*  By Parth Viramgama pav */
  public function add_similar_project_notes(){
    $notes_li_append ='';
    $project_id = $this->input->post('project_id');
    $notes_title = $this->input->post('notes_title');
    $notes_desc = $this->input->post('notes_desc');
    $data = array(
      'project_id' => $project_id,
      'name' => $notes_title,
      'description' => $notes_desc,
      );
    $id = $this->project_model->add_notes_records($data);

    $response =array(
      'status' => 'success',
      'id' => $id,
      'title' => $notes_title,
      'desc' => $notes_desc
      );
    echo json_encode($response);
    die();
  }

  //  add_similar_project_external function used to upload project's external com.
  /*  By Parth Viramgama pav */
  public function add_similar_project_external(){
    $external_li_append ='';
    $project_id = $this->input->post('project_id');
    $external_title = $this->input->post('external_title');
    $external_desc = $this->input->post('external_desc');
    $data = array(
      'project_id' => $project_id,
      'name' => $external_title,
      'description' => $external_desc,
      );
    $id = $this->project_model->add_external_link($data);

    $response =array(
      'status' => 'success',
      'id' => $id,
      'title' => $external_title,
      'desc' => $external_desc
      );
    echo json_encode($response);
    die();
  }
  

}
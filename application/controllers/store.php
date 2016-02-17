<?php 
class Store extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('store_model');
        $this->load->model('user_model');
        $this->load->database();
        //$this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->library('csvimport');
        
        if ($this->session->userdata('admin_logged_in')=='') {
          redirect('login');
        }

      }
    public function index($client_id=0) {
        $data['client_id']=$client_id;
        $data['client'] = $this->user_model->get($client_id);
        $data['store_list'] = $this->store_model->get_all_store($client_id);
        $this->template->load('admin_default', 'store/index', $data);
    }

    public function add($client_id=0) {

        if ($this->form_validation->run('store') == FALSE) { 
            $data['client_id']=$client_id;
            $this->template->load('admin_default', 'store/add',$data);
        } else {
            if (!empty($_POST)) {   
                if(!empty($client_id)){
                  $id=$client_id;
                }else{
                   $id=0;
                }
                $data = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'telephone' => $this->input->post('telephone'),
                    'contact' => $this->input->post('contact'),
                    'fax' => $this->input->post('fax'),
                    'client_id' =>$id,
                );
                if ($this->store_model->add_records($data, TRUE)) {
                  $this->session->set_flashdata('msg', 'Store has been successfully added');
                } else {
                  $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
                }
                redirect('store/index/'.$client_id);
            }
        }
    }

  public function edit($id = 0,$client_id=0) {
    if ($this->form_validation->run('store') == FALSE) {
      $data['client_id']=$client_id;
      $data['store'] = $this->store_model->get($id);
      $this->template->load('admin_default', 'store/edit', $data);
    } else {
      if (!empty($_POST)) {
        if ($this->store_model->update_records($id,$client_id,TRUE)) {
          $this->session->set_flashdata('msg', 'Store has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('store/index/'.$client_id);
      }
    }
  }

  public function delete($id = 0,$client_id=0) {
    if ($this->store_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Store has been successfully deleted');
    } else {
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('store/index/'.$client_id);
  }
  public function export_to_csv($id = 0) {
    $this->store_model->ExportCsv();
  }
  public function importcsv($client_id=0) {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);

    if ($_FILES['file']['name']) {
      if (!$this->upload->do_upload('file')) { 
        
      } else {

        $file_data = $this->upload->data();
        $file_path = './uploads/' . $file_data['file_name'];

        if ($this->csvimport->get_array($file_path)) {
          $csv_array = $this->csvimport->get_array($file_path);
          
          if(!isset($csv_array['0']['name']) || !isset($csv_array['0']['client_id']) || !isset($csv_array['0']['address']) || !isset($csv_array['0']['telephone']) || !isset($csv_array['0']['contact']) || !isset($csv_array['0']['fax'])){
            $this->session->set_flashdata('err_msg', 'Please Select file with appropriate field names');
            redirect('store/index/'.$client_id);exit;
          }
          foreach ($csv_array as $row) {
              $insert_data = array(
              'name' => $row['name'],
              'address' => $row['address'],
              'telephone' => $row['telephone'],
              'contact' => $row['contact'],
              'fax' => $row['fax'],
               'client_id' => $row['client_id'],    
              );
              if($this->store_model->add_records($insert_data)){
                 $this->session->set_flashdata('msg', 'Your Store record has been successfully imported'); 
              }else{
                $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');   
              } 
          }
        }
        
      }
      redirect('store/index/'.$client_id);
    }
  }

}
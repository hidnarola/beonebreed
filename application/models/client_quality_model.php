<?php

class Client_quality_model extends CI_Model {

  public function __construct() {

    $this->load->database();
  }

  public function add_records($data) {
    $id = $this->db->insert('quality', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }

  public function get_all() {
    if ($this->session->userdata('client_id')!='') {
        $client_id = $this->session->userdata('client_id');
     }  
    $this->db->select('quality.*,product.name as product_name,store.name as store_name,report_status.name as report_status,users.username');
    $this->db->from('quality');
    $this->db->join('product', 'quality.product = product.id', 'left');
    $this->db->join('store', 'quality.store = store.id', 'left');
    $this->db->join('report_status', 'quality.status = report_status.id', 'left');
    $this->db->join('users', 'quality.user_id = users.id', 'left');
    //$this->db->where('quality.user_id', $user_id);
    $this->db->where('quality.client_id',$client_id);
    $query = $this->db->get();
    return $query->result();
  }
 
  public function get($id) {
    $query = $this->db->get_where('quality', array('id' => $id));
    return $query->row_array();
  }

  public function get_contact($id) {
    $this->db->select('contact');
    $query = $this->db->get_where('store', array('id' => $id));
    return $query->row_array();
  }

  public function update_records($id) {

    $editData = array(
        'name' => $this->input->post('name'),
        'store' => $this->input->post('store'),
        'product' => $this->input->post('product'),
        'title' => $this->input->post('title'),
        'description' => $this->input->post('description'),
        'problem_type' => $this->input->post('problem_type'),
        'qty_in_store' => $this->input->post('qty_in_store'),
        'qty_defect' => $this->input->post('qty_defect'),
        'ds' => $this->input->post('dcs'),
        'contact_info' => $this->input->post('contact_info'),
    );
    $this->db->where('id', $id);
    return $this->db->update('quality', $editData);
  }

  public function delete_records($id) {
    $this->db->where('id', $id);
    return $this->db->delete('quality');
  }

  //get project types
  public function get_product_list() {
    $query = $this->db->get('product');
    return $query->result();
  }

  public function get_store_list() {
    if ($this->session->userdata('client_id')!='') {
      $user_id = $this->session->userdata('client_id');
    } else {
      $user_id = 0;
    }
    $this->db->where('is_deleted', '0');
    $this->db->where('client_id', $user_id);
    $query = $this->db->get('store');
    return $query->result();
  }

  public function get_problem_list() {
    $query = $this->db->get('problem_type');
    return $query->result();
  }
  
  public function add_external_link($data) {

    $id = $this->db->insert('quality_external_com', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }

  public function add_attachemnt($data) {

    $id = $this->db->insert('quality_attachment', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
    //return $id;
  }  
   public function add_notes_records($data) {

    $this->db->insert('quality_notes', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }
  
public function get_quality_notes($id = 0) {
    $query = $this->db->get_where('quality_notes', array('quality_id' => $id));
    return $query->result();
  }

  public function get_quality_attachment($id = 0) {
    $query = $this->db->get_where('quality_attachment', array('quality_id' => $id));
    return $query->result();
  }

   public function get_quality_external_com($id = 0) {
    $query = $this->db->get_where('quality_external_com', array('quality_id' => $id));
    return $query->result();
  }
}
?>


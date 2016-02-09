<?php

class Quality_model extends CI_Model {

  public function __construct() {

    $this->load->database();
  }

  public function add_records($data) {

    $id = $this->db->insert('quality', $data);
    return $id;
  }

  public function get_all() {
   
    $this->db->select('quality.*,product.name as product_name,store.name as store_name');
    $this->db->from('quality');
    $this->db->join('product', 'quality.product = product.id', 'left');
    $this->db->join('store', 'quality.store = store.id', 'left');
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
          'product' =>$this->input->post('product'),
          'title' => $this->input->post('title'),
          'description' => $this->input->post('description'),
          'problem_type' => $this->input->post('problem_type'),
          'qty_in_store' => $this->input->post('qty_in_store'),
          'qty_defect' =>$this->input->post('qty_defect'),
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
    if($this->session->userdata('client_id') != '' ){
      $user_id=$this->session->userdata('client_id');
      $this->db->where('is_deleted', '0');
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('store');
      return $query->result();
    }
  }
  
  public function get_problem_list() {
    $query = $this->db->get('problem_type');
    return $query->result();
  }

}
?>


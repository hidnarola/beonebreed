<?php

class Suggestion_model extends CI_Model {

  public function __construct() {

    $this->load->database();
  }

  public function add_records($data) {
    $id = $this->db->insert('suggestion', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }
  public function get_status_list() {
    $query = $this->db->get('suggestion_status');
    return $query->result();
  }
  public function get_all($client_id) {		
	//$this->db->order_by("id", "desc");
	//$this->db->where('suggestion.user_id', $user_id);
	$this->db->select('suggestion.*,users.username,store.name as store_name,suggestion_status.name as suggestion_status');
	$this->db->from('suggestion');
    $this->db->join('users', 'suggestion.user_id = users.id', 'left');
	$this->db->join('store', 'suggestion.store = store.id', 'left');
	$this->db->join('suggestion_status', 'suggestion.status = suggestion_status.id', 'left');
	$this->db->where('suggestion.client_id',$client_id);
	$query = $this->db->get();
    return $query->result();
  }
  
  public function get($id) {
    $query = $this->db->get_where('suggestion', array('id' => $id));
    return $query->row_array();
  }
  public function get_contact($id) {
    $this->db->select('contact');
    $query = $this->db->get_where('store', array('id' => $id));
    return $query->row_array();
  }

  public function update_records($id) {
/*
        $editData = array(
            'name' => $this->input->post('name'),
            'suggestion_type' => $this->input->post('suggestion_type'),
            'product' =>$this->input->post('product'),
            'subject' => $this->input->post('subject'),
            'description' => $this->input->post('description'),
            'store' => $this->input->post('store'),
            'contact_info' => $this->input->post('contact_info'),
        ); */
		
		$editData = array(
		'status' => $this->input->post('status'),
		);
		$this->db->where('id', $id);
		return $this->db->update('suggestion', $editData);
  }

  public function delete_records($id) {
    $this->db->where('id', $id);
    return $this->db->delete('suggestion');
  }
  
  //get project types
  public function get_product_list() {
    $query = $this->db->get('product');
    return $query->result();
  }
  
  public function get_store_list() { 

	/*
    if(!empty($this->session->userdata('client_id'))){
      $user_id=$this->session->userdata('client_id');
      $this->db->where('is_deleted', '0');
      $this->db->where('user_id', $user_id);
      $query = $this->db->get('store');
      return $query->result();
    }*/
		$this->db->where('is_deleted', '0');
		$query = $this->db->get('store');
		return $query->result();
  }
  
  public function get_problem_list() {
    $query = $this->db->get('problem_type');
    return $query->result();
  }
  
   public function get_suggestion_type() {
    $query = $this->db->get('categories');
    return $query->result();
  }
   public function add_external_link($data) {

    $id = $this->db->insert('suggestion_external_com', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }

  public function add_attachemnt($data) {

    $id = $this->db->insert('suggestion_attachment', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
    //return $id;
  }  
   public function add_notes_records($data) {
    $this->db->insert('suggestion_notes', $data);
    $last_id = $this->db->insert_id();
    return $last_id;
  }
  
public function get_suggestion_notes($id = 0) {
    $query = $this->db->get_where('suggestion_notes', array('suggestion_id' => $id));
    return $query->result();
  }

  public function get_suggestion_attachment($id = 0) {
    $query = $this->db->get_where('suggestion_attachment', array('suggestion_id' => $id));
    return $query->result();
  }

   public function get_suggestion_external_com($id = 0) {
    $query = $this->db->get_where('suggestion_external_com', array('suggestion_id' => $id));
    return $query->result();
  }

}
?>


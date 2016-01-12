<?php

class Store_model extends CI_Model {

  public function __construct() {

    $this->load->database();
  }

  public function add_records($data) {

    $id = $this->db->insert('store', $data);
    return $id;
  }

  public function get_all_store($client_id=0) {
    $this->db->where('user_id',$client_id);
    $this->db->where('is_deleted', '0');
    $query = $this->db->get('store');
    return $query->result();
  }

  public function get($id) {
    $query = $this->db->get_where('store', array('id' => $id));
    return $query->row_array();
  }

  public function update_records($id,$client_id) {
    $data = array(
        'name' => $this->input->post('name'),
        'address' => $this->input->post('address'),
        'telephone' => $this->input->post('telephone'),
        'contact' => $this->input->post('contact'),
        'fax' => $this->input->post('fax'),
    );
    $this->db->where('id', $id);
    return $this->db->update('store', $data);
  }

  public function delete_records($id) {
    $data = array(
        'is_deleted' => '1',
    );
    $this->db->where('id', $id);
    return $this->db->update('store', $data);
  }

  public function get_language() {
    $query = $this->db->get_where('languages');
    return $query->result();
  }

  public function get_role() {
    $query = $this->db->get_where('client_group');
    return $query->result();
  }

  public function get_department() {
    $query = $this->db->get_where('departments');
    return $query->result();
  }
  public function ExportCsv() {
    $this->load->dbutil();
    $this->load->helper('file');
    $this->load->helper('download');
    $delimiter = ",";
    //$newline = "\r\n";
    $filename = "store.csv";
    $query = "SELECT name,user_id,address,telephone,contact,fax FROM store where is_deleted='0'";
    $result = $this->db->query($query);
    $data = $this->dbutil->csv_from_result($result, $delimiter);
    force_download($filename, $data);
  }

}

?>

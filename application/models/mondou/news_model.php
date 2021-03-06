<?php

class News_model extends CI_Model {

  public function __construct() {

    $this->load->database();
  }

  public function add_records($data) {

    $id = $this->db->insert('newsfeed', $data);
    return $id;
  }

  public function get_all() {
    /* $query = $this->db->get('newsfeed');
      return $query->result(); */
    $this->db->select('newsfeed.*,news_attachments.name');
    $this->db->from('newsfeed');
    $this->db->join('news_attachments', 'news_attachments.news_id = newsfeed.id', 'left');
    $this->db->where('visible_to_client', '1');
    $query = $this->db->get();
    return $query->result();
  }

  public function get($id) {
    $query = $this->db->get_where('newsfeed', array('id' => $id));
    return $query->row_array();
  }

  public function update_records($id) {
    $editData = array(
        'type' => $this->input->post('type'),
    );
    $this->db->where('id', $id);
    return $this->db->update('newsfeed', $editData);
  }

  public function delete_records($id) {
    $this->db->where('id', $id);
    return $this->db->delete('newsfeed');
  }

}
?>


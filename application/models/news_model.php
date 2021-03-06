<?php

class News_model extends CI_Model {

    public function __construct() {

	$this->load->database();
    }

    public function add_records($data) {

	$id = $this->db->insert('newsfeed', $data);
	$last_id = $this->db->insert_id();
	return $last_id;
    }

    public function get_all() {

	$this->db->select('newsfeed.*,news_attachments.name');
	$this->db->from('newsfeed');
	$this->db->join('news_attachments', 'news_attachments.news_id = newsfeed.id', 'left');
	$this->db->where('is_deleted', '0');
	$this->db->order_by("newsfeed.id", "desc");
	$query = $this->db->get();
	return $query->result_array();
    }

    public function get_comments($news_id = 0) {

	$this->db->select('comments.*,users.username');
	$this->db->from('comments');
	$this->db->join('users', 'users.id = comments.comment_by', 'left');
	$this->db->where('comments.news_id', $news_id);
	//$this->db->order_by("comments.id", "desc");
	$query = $this->db->get();
	return $query->result_array();
    }

    public function add_news_attachemnt($data) {

	$id = $this->db->insert('news_attachments', $data);
	$last_id = $this->db->insert_id();
	return $last_id;
	//return $id;
    }

    public function get($id) {
	$query = $this->db->get_where('newsfeed', array('id' => $id));
	return $query->row_array();
    }

    public function update_records($id) {
	$editData = array(
	    'visible_to_client' => $this->input->post('client_visibility'),
	);
	$this->db->where('id', $id);
	return $this->db->update('newsfeed', $editData);
    }

    public function delete_records($id) {
	$editData = array(
	    'is_deleted' => '1',
	);
	$this->db->where('id', $id);
	return $this->db->update('newsfeed', $editData);
    }

}
?>


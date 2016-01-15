<?php

class	Client_user_model	extends	CI_Model	{

	public	function	__construct()	{

		$this->load->database();
	}

	public	function	add_records($data)	{
		$id	=	$this->db->insert('users',	$data);
		return	$id;
	}

	public	function	get_all_user($client_id	=	0)	{
		
		$this->db->select('users.*,store.id as store_id,store.name as store_name');
		$this->db->from('users');
		$this->db->where('user_type',	'4');
		$this->db->where('users.client_id',	$client_id);
		$this->db->where('users.is_deleted',	'0');
		$this->db->join('store', 'users.store_id = store.id', 'left');
		$query = $this->db->get();
		return $query->result();
	}

	public	function	get($id)	{
		$this->db->where('id',	$id);
		$this->db->where('user_type','4');
	//	$this->db->where('id',	$id);
		$query	=	$this->db->get_where('users',	array('id'	=>	$id));
		return	$query->row_array();
	}

	public	function	update_records($id)	{
		$data	=	array(
						'username'	=>	$this->input->post('username'),
						'email'	=>	$this->input->post('email'),
						'store_id'	=>	$this->input->post('store'),
		);
		$this->db->where('id',	$id);
		return	$this->db->update('users',	$data);
	}

	public	function	delete_records($id)	{

		$data	=	array(
						'is_deleted'	=>	'1',
		);
		$this->db->where('id',	$id);
		$this->db->where('user_type','4');
		return	$this->db->update('users',	$data);
	}

}
?>


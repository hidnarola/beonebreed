<?php

class	Client_model	extends	CI_Model	{

	public	function	__construct()	{

		$this->load->database();
	}

	public	function	add_records($data)	{

		$id	=	$this->db->insert('users',	$data);
		return	$id;
	}

	public	function	get_all_client()	{
		$this->db->where('user_type',	'3');
		$this->db->where('is_deleted',	'0');
		$query	=	$this->db->get('users');
		return	$query->result();
	}

	public	function	get($id)	{
		$query	=	$this->db->get_where('users',	array('id'	=>	$id));
		return	$query->row_array();
	}

	public	function	update_records($id)	{
		if	(!empty($this->input->post('language')))	{
			$language	=	$this->input->post('language');
		}	else	{
			$language	=	0;
		}
		if	(!empty($this->input->post('role')))	{
			$role	=	$this->input->post('role');
		}	else	{
			$role	=	0;
		}
		if	(!empty($this->input->post('department')))	{
			$department	=	$this->input->post('department');
		}	else	{
			$department	=	0;
		}
		
			$config['upload_path'] = './uploads/company_logo';
			$config['allowed_types'] = '*';
			$new_name = time().$_FILES["file"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);
							
			if ($_FILES['file']['name']) {
						if (!$this->upload->do_upload('file')) {
								$error = array('error' => $this->upload->display_errors());
						} else {
								$upload_data = array('uploads' => $this->upload->data('file'));
						}
				}
				if(!empty($upload_data['uploads']['file_name'])){
					$upload_file=$upload_data['uploads']['file_name'];
				}else{
					$upload_file=$this->input->post('hdn_logo_name');
				}
		$data	=	array(
						'user_group_id'	=>	$role,
						'username'	=>	$this->input->post('username'),
						'email'	=>	$this->input->post('email'),
						'dept_id'	=>	$department,
						'language_id'	=>	$language,
						'logo_name'=>$upload_file,
		);
		$this->db->where('id',	$id);
		return	$this->db->update('users',	$data);
	}

	public	function	delete_records($id)	{

		$data	=	array(
						'is_deleted'	=>	'1',
		);
		$this->db->where('id',	$id);
		return	$this->db->update('users',	$data);
	}

	public	function	get_language()	{
		$query	=	$this->db->get_where('languages');
		return	$query->result();
	}

	public	function	get_role()	{
		$query	=	$this->db->get_where('client_group');
		return	$query->result();
	}

	public	function	get_department()	{
		$query	=	$this->db->get_where('departments');
		return	$query->result();
	}

}
?>


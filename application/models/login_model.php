
<?php

class	Login_model	extends	CI_Model	{

	public	function	__construct()	{
		$this->load->database();
	}

	function	login($username,	$password,	$user)	{

		if	(!empty($user))	{

			$client_query	=	$this->db->get_where('users',	array('username'	=>	$user));

			if	(!empty($client_query))	{
				$client_result	=	$client_query->row_array();
				$this->db->where("client_id",	$client_result['id']);
			}
		}	
		$this->db->where("username",	$username);
		$this->db->where("password",	$password);

		// $this->db->where('user_type', '1');
		$this->db->where('is_deleted',	'0');
		$query	=	$this->db->get("users");

		if	($query->num_rows()	>	0)	{
			return	$query->result();
		}
		return	false;
		/*
			 if($query->num_rows()>0)
			 {
			 foreach($query->result() as $rows)
			 {
			 //add all data to session
			 $newdata = array(
			 'id'  => $rows->id,
			 'username'  => $rows->username,
			 'email'  => $rows->email,
			 'admin_logged_in'  => TRUE,
			 );
			 }
			 $this->session->set_userdata($newdata);
			 return true;
			 }
			 return false; */
	}

	function	get_client_info($username)	{

		$this->db->where("username",	$username);
		$this->db->where('is_deleted',	'0');
		$query	=	$this->db->get("users");
		if	($query->num_rows()	>	0)	{
			return	$query->result();
		}

		return	false;
	}

}
?>



<?php

class Login_model extends CI_Model {

    public function __construct() {
	$this->load->database();
    }

    function login($username, $password, $user = '') {
	if (!empty($user)) {
	    //client and client user login
	    $client_query = $this->db->get_where('users', array('username' => $user));
	    if (!empty($client_query)) {
		$client_result = $client_query->row_array();
		if($username!=$user){
		    $this->db->where("client_id", $client_result['id']);
		}
	    }
	} else {
	    //admin and admin_user login
	    $usertype = array('1', '2');
	    $this->db->where_in('user_type', $usertype);
	}
	$this->db->where("username", $username);
	$this->db->where("password", $password);
	$this->db->where('is_deleted', '0');
	$query = $this->db->get("users");
	if ($query->num_rows() > 0) {
	    return $query->result();
	}
	return false;
    }

    function get_client_info($username) {

	$this->db->where("username", $username);
	$this->db->where('is_deleted', '0');
	$query = $this->db->get("users");
	if ($query->num_rows() > 0) {
	    return $query->result();
	}
	return false;
    }

}
?>


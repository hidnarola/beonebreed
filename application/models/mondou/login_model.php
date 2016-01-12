
<?php
class Login_model extends CI_Model {
    public function __construct()
	{
            $this->load->database();
			
	}
        
       
	function login($username,$password)
	{	
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('user_type', '2');
		$this->db->where('is_deleted','0');
		$query=$this->db->get("users");
	
		if($query->num_rows()>0)
		{
			
			 foreach($query->result() as $rows)
			 {
			  //add all data to session
			  $newdata = array(
				'client_id'  => $rows->id,
				'client_username'  => $rows->username,
				'client_email'  => $rows->email,    
				'client_logged_in'  => TRUE,
			  );
			 }
		 $this->session->set_userdata($newdata);
		 return true;
		}
		return false;
	}
       
}

?>


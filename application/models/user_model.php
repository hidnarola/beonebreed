
<?php
class User_model extends CI_Model {
    public function __construct()
	{
		
		$this->load->database();
	}
        
        public function add_records($data){           
            $id = $this->db->insert('users',$data);
            return $id;
        }
       
        public function get_all_user(){
		  $user_type = array('1', '2');
		  $this->db->where_in('user_type', $user_type);
          $this->db->where('is_deleted','0');
          $query = $this->db->get('users');
          return $query->result();
        }
    
        public function get($id){
            $query = $this->db->get_where('users',array('id'=>$id));
            return $query->row_array();        
        }
        
        public function update_records($id){
          
          if (!empty($this->input->post('language'))) {
            $language = $this->input->post('language');
          } else {
            $language = 0;
          }
          if (!empty($this->input->post('role'))) {
            $role = $this->input->post('role');
          } else {
            $role = 0;
          }
          if (!empty($this->input->post('department'))) {
            $department = $this->input->post('department');
          } else {
            $department = 0;
          }
          $data = array(
              'user_group_id' => $role,
              'username' => $this->input->post('username'),
              'email' => $this->input->post('email'),
              'dept_id' => $department,
              'language_id' => $language,
          );  
          $this->db->where('id',$id);
          return $this->db->update('users', $data);  
        }
        public function delete_records($id){
          
            $data = array(
              'is_deleted' => '1',
          );
            $this->db->where('id', $id);
            return $this->db->update('users', $data);  
        }
        public function get_language() {
          $query = $this->db->get_where('languages');
          return $query->result();
        }
        public function get_role() {
          $query = $this->db->get_where('user_group');
          return $query->result();
        }
        public function get_department() {
         $query = $this->db->get_where('departments');
         return $query->result();
       } 
      
}

?>


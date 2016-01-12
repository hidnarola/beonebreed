
<?php
class Category_model extends CI_Model {
    public function __construct()
	{
		
		$this->load->database();
	}
        
        public function add_records($data){
           
            $id = $this->db->insert('categories',$data);
            return $id;
        }
       
        public function get_all_category(){
            $query = $this->db->get('categories');
            return $query->result();
        }
    
        public function get($id){
            $query = $this->db->get_where('categories',array('id'=>$id));
            return $query->row_array();        
        }
        
        public function update_records($id){
            $editData=array(
                'name'=>$this->input->post('name'),
            );
            $this->db->where('id',$id);
			return $this->db->update('categories', $editData);
            
        }
        public function delete_records($id){
            $this->db->where('id', $id);
            return $this->db->delete('categories');  
        }
       
	   public function delete_selected_records($id){
            $this->db->where('id', $id);
            return $this->db->delete('tbl_category');  
        }
	   
	   
	   
        function login($email,$password)
        {
            $this->db->where("email",$email);
            $this->db->where("password",$password);

            $query=$this->db->get("users");
            if($query->num_rows()>0)
            {
             foreach($query->result() as $rows)
             {
              //add all data to session
              $newdata = array(
                'user_id'  => $rows->id,
                'user_name'  => $rows->username,
                'user_email'    => $rows->email,
                'logged_in'  => TRUE,
              );
             }
             $this->session->set_userdata($newdata);
             return true;
            }
            return false;
        }
        
      function ChangePassword()
        {   
        $this->db->where('username',$this->session->userdata('user_name'));
        $this->db->where('password',md5($this->input->post('password')));
        $query=$this->db->get('users');   

        if ($query->num_rows() > 0)
         {
                $row = $query->row();
                if($row->id==$this->session->userdata('user_id'))
                {
                    $data = array(
                      'password' => md5($this->input->post('password'))
                     );
                  $this->db->where('username',$this->session->userdata('uname'));
                  $this->db->where('password',md5($this->input->post('password')));
                       if($this->db->update('users', $data)) 
                       {
                       return "Password Changed Successfully";
                       }else{
                        return "Something Went Wrong, Password Not Changed";
                       }
                }else{
                return "Something Went Wrong, Password Not Changed";
                }


         }else{
            return "Wrong Old Password";
         }

        }
       public function record_count() {
            return $this->db->count_all("tbl_category");
        }
       
}

?>


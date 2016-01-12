<?php
class Project_type_model extends CI_Model {
    public function __construct()
	{
		
		$this->load->database();
	}
        
        public function add_records($data){
           
            $id = $this->db->insert('project_types',$data);
            return $id;
        }
       
        public function get_all_type(){
            $query = $this->db->get('project_types');
            return $query->result();
        }
    
        public function get($id){
            $query = $this->db->get_where('project_types',array('id'=>$id));
            return $query->row_array();        
        }
        
        public function update_records($id){
            $editData=array(
                'type'=>$this->input->post('type'),
            );
            $this->db->where('id',$id);
			return $this->db->update('project_types', $editData);
            
        }
        public function delete_records($id){
            $this->db->where('id', $id);
            return $this->db->delete('project_types');  
        }
       
}

?>


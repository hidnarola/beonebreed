<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_model extends CI_Model {

	public function get_all($where=null){
		
		if(!empty($where)){
			$this->db->where($where);
		}

		return $this->db->get('bar_code')->result_array();
	}

	public function get($id){
		if(is_array($id)){
			$this->db->where($id);
		}else{
			$this->db->where('id',$id);
		}		
		return $this->db->get('bar_code')->row_array();
	}

	public function insert($data){
		$this->db->insert('bar_code', $data);
		return $this->db->insert_id();
	}

	public function update($id,$data){
		$result = $this->db->where('id', $id)->set($data)->update('bar_code');
		return $this->db->affected_rows();
	}

	public function delete($table,$id){
		if(is_array($id)){
			$this->db->where($id);
		}else{
			$this->db->where(array('id'=>$id));
		}
		$this->db->delete($table);
	}

}

/* End of file barcode_model.php */
/* Location: ./application/models/barcode_model.php */
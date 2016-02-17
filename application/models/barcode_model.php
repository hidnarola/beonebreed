<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode_model extends CI_Model {

	public function get_all($where=null){

		if(!empty($where)){
			$this->db->where($where);
		}

		return $this->db->get('bar_code')->result_array();
	}

	public function get_all_join($where=null){
		
		if(!empty($where)){
			$this->db->where($where);
		}
		$this->db->select('bar_code.*,products_new.id as p_id,products_new.description as p_desc,products_new.product_name as p_name,bar_code.id as b_id,bar_code.description as b_desc');
		$this->db->join('products_new', 'products_new.barcode_id = bar_code.id', 'left');

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
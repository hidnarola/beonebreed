<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_brand extends CI_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index(){
		$data['brands'] = $this->product_brand_model->get();
		$this->template->load('admin_default', 'product_brand/index',$data);
	}

	public function add(){
		
		$this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');

		if($this->form_validation->run() == false){
			$this->template->load('admin_default', 'product_brand/add');
		}else{
			
			$data_add = array('brand_name'=>$this->input->post('brand_name'));
			$this->product_brand_model->insert($data_add);
			$this->session->set_flashdata('success', 'Brand has been successfully inserted.');
			redirect('product_brand');
		}
	}

	public function edit($id){
		
		$data['brand'] = $this->product_brand_model->get(false,array('where'=>array('id'=>$id)),array('single'=>true));
		
		$this->form_validation->set_rules('brand_name', 'Brand Name', 'trim|required');

		if($this->form_validation->run() == false){
			$this->template->load('admin_default', 'product_brand/edit',$data);
		}else{
			$data_edit = array('brand_name'=>$this->input->post('brand_name'));
			$this->product_brand_model->update($id,$data_edit);
			$this->session->set_flashdata('success', 'Brand has been successfully Updated.');
			redirect('product_brand');
		}	
	}

	public function delete($id){

	}

}

/* End of file Product_brand.php */
/* Location: ./application/controllers/Product_brand.php */
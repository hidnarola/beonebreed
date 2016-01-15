<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index(){
		
		// $data['barcodes'] = $this->barcode_model->get_all();
		$this->template->load('admin_default', 'products/index');	
	}

	public function manage_product(){

		$data['categories'] = $this->category_model->get_all_category(1);																	
		$data['brands'] = $this->product_brand_model->get();

		// p($data);
		// die();
		$this->template->load('admin_default', 'products/manage_products',$data);
	}

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
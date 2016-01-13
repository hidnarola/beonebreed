<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index(){
		
		// $data['barcodes'] = $this->barcode_model->get_all();
		$this->template->load('admin_default', 'products/index');	
	}

	public function manage_product(){
		$this->template->load('admin_default', '');
	}

	public function add(){

	}

	public function edit(){
		
	}

}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
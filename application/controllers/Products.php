<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function index(){
		
		// $data['barcodes'] = $this->barcode_model->get_all();
		$this->template->load('admin_default', 'products/index');	
	}

	public function add(){

		$data['categories'] = $this->category_model->get_all_category(1);																	
		$data['brands'] = $this->product_brand_model->get();

		$this->template->load('admin_default', 'products/add',$data);
	}

	// ------------------------------- START ADMIN TAB FORM -----------------------------------------

	/**
	 * function generate_upc_ean for generate product code which is unassigned to any product
	 * Formula for generate product code is short name of category follwed by last 4 number of UPC number
	 *
	 * @return String
	 * @author Virendra
	 **/
	
	public function generate_upc_ean(){

		$cat_id = $this->input->post('cat_id');
		
		//get all bracode which is not assigned
		$barcodes = $this->barcode_model->get_all(array('id NOT IN (SELECT barcode_id from products_new)'=>null));		
		
		//slice string into last 4 number 
		$random_barcode = $barcodes[array_rand($barcodes)];
		$last_four_characters = substr($random_barcode['upc'],8);			
		$product_code = $cat_id.$last_four_characters;

		$random_barcode['product_code'] = $product_code;

		echo json_encode($random_barcode);
	}

	

	// ------------------------------ // END ADMIN TAB FORM ------------------------------------------
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
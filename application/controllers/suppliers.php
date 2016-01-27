<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$data['suppliers'] = $this->products_model->getfrom('products_suppliers');

		$this->template->load('admin_default', 'products/suppliers/index',$data);
	}

	public function add(){

		$this->form_validation->set_rules('supplier_name', 'Supplier Name', 'trim|required');
		$this->form_validation->set_rules('contact_name', 'Contact Name', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('contact_email', 'Contact Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('tel_no', 'Tel No', 'trim|required');
		$this->form_validation->set_rules('supplier_address', 'Supplier Address', 'trim|required');
		
		if($this->form_validation->run() == false){
			$this->template->load('admin_default', 'products/suppliers/add');
		}else{

			$supplier_name = $this->input->post('supplier_name');
			$contact_name = $this->input->post('contact_name');
			$country = $this->input->post('country');
			$contact_email = $this->input->post('contact_email');
			$tel_no = $this->input->post('tel_no');
			$supplier_address = $this->input->post('supplier_address');

			$data_add = array(
								'supplier_name'=>$supplier_name,
								'contact_name'=>$contact_name,
								'country'=>$country,
								'contact_email'=>$contact_email,
								'tel_no'=>$tel_no,
								'address'=>$supplier_address
							);

			$this->products_model->insert_into('products_suppliers',$data_add);
			$this->session->set_flashdata('success', 'Supplier has been successfully added.');
			redirect('suppliers');

		}
	}

	public function edit($id){

	}

	public function delete($id){

	}

}

/* End of file suppliers.php */
/* Location: ./application/controllers/suppliers.php */
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


    public function __construct() {
        parent::__construct();
    }

	public function index() {
        $this->template->load('admin_default', 'products/index');
    }

    public function add() {

        $data['categories'] = $this->category_model->get_all_category(1);
        $data['brands'] = $this->product_brand_model->get();
        $data['question_list_3'] = $this->products_model->get_question_part_3();
        $data['question_list_4'] = $this->products_model->get_question_part_4();
        $this->template->load('admin_default', 'products/add', $data);
    }

    // ------------------------------- START ADMIN TAB FORM -----------------------------------------
    
    /**
     * function marketting_part_3() for save Marketting Tab-3 Form Data
     *
     * @return string
     * @author Aneel Yadav - Spark id -ay
     * */
    public function marketting_part_3() {
        
        $switch_ans = $_POST['check_list'];
        $switch_txt_description = $_POST['txt_list'];
        if($this->input->post('hdn_marketting_part_3')!=''){
           $product_id=$this->input->post('hdn_marketting_part_3');
        }else{
            $product_id='';
        }
        foreach ($switch_ans as $key => $val) {
            if (empty($val)) {
                $switch_ans[$key] = 0;
            } else {
                $switch_ans[$key] = 1;
            }
        }
        foreach ($switch_ans as $key => $val) {
            if (!empty($switch_txt_description[$key])) {
                $notes = $switch_txt_description[$key];
            } else {
                $notes = '';
            }
            $data = array(
                'question_id' => $key,
                'product_id' =>$product_id,
                'answer' => $val,
                'notes' => $notes,
            );
            if(!empty($_POST['update_marketting'])){
                $result=$this->products_model->update_question_ans_3($data,$key,$product_id);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }   
            }else{
                $result=$this->products_model->add_question_ans_3($data, TRUE);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }
            }
        }
        
        echo json_encode($response);die();
    }
    
    /**
     * function marketting_part_3() for save Marketting Tab-3 Form Data
     *
     * @return string
     * @author Aneel Yadav - Spark id -ay
    **/
    public function marketting_part_4() {
        $switch_ans = $_POST['check_list'];
         if($this->input->post('hdn_marketting_part_4')!=''){
           $product_id=$this->input->post('hdn_marketting_part_4');
        }else{
            $product_id='';
        }
        
        foreach ($switch_ans as $key => $val) {
            if (empty($val)) {
                $switch_ans[$key] = 0;
            } else {
                $switch_ans[$key] = 1;
            }
        }
        foreach ($switch_ans as $key => $val) {
            if (!empty($switch_txt_description[$key])) {
                $notes = $switch_txt_description[$key];
            } else {
                $notes = '';
            }
            $data = array(
                'question_id' => $key,
                'product_id' =>$product_id,
                'answer' => $val,
                'notes' => $notes,
            );
            if(!empty($_POST['update_marketting_part_4'])){
                $result=$this->products_model->update_question_ans_4($data,$key,$product_id);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }   
            }else{
                $result=$this->products_model->add_question_ans_4($data, TRUE);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }
            }
        }
        echo json_encode($response);die();
    }

    // ------------------------------ // END ADMIN TAB FORM ------------------------------------------

    // ------------------------------ START ATTACHMENT TAB FORM ------------------------------------------
    public function product_notes() {

        //adding notes in project notes
        $data_notes = array(
            'product_id' => $this->input->post('product_id'),
            'notes' => $this->input->post('notes_name'),
            'description' => $this->input->post('description'),
        );

        $last_notes_id = $this->products_model->add_notes_records($data_notes, TRUE);

        if (!empty($last_notes_id)) {
            $created_time = date("d F Y");
            $response = array('status' => 'success', 'msg' => 'Your notes has been successfully added', 'notes_name' => $this->input->post('notes_name'), 'id' => $last_notes_id, 'desc' => $this->input->post('description'), 'dates1' => $created_time);
            echo json_encode($response);
            die();
        } else {
            $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
            echo json_encode($response);
            die();
        }
    }

    public function product_attachment() {

        $config['upload_path'] = './uploads/products/';
        $config['allowed_types'] = '*';
        $this->load->library('upload', $config);

        if ($_FILES['file']['name']) {
            if (!$this->upload->do_upload('file')) {
                //$error = array('error' => $this->upload->display_errors());
                $response = array('status' => 'fail', 'msg' => $this->upload->display_errors());
                echo json_encode($response);
                die();
            } else {
                $upload_data = array('uploads' => $this->upload->data('file'));
            }
        }

        $data_upload = array(
            'product_id' => $this->input->post('product_id'),
            'attachment' => $upload_data['uploads']['file_name'],
        );

        $last_inserted_id = $this->products_model->insert_attachment($data_upload, TRUE);
        if (!empty($last_inserted_id)) {
            $response = array('status' => 'success', 'msg' => 'Your file has been successfully added', 'file_name' => $upload_data['uploads']['file_name'], 'id' => $last_inserted_id);
            echo json_encode($response);
            die();
        } else {
            $response = array('status' => 'fail', 'msg' => 'Oops!Something Wrong!');
            echo json_encode($response);
            die();
        }
    }

    // ------------------------------ // END ATTACHMENT TAB FORM ------------------------------------------

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

	// ------------------------------------------------------------------------

	/**
	* function admin_form_tab_1() for save Admin Tab-1 Form Data
	*
	* @return string
	* @author Virendra patel - Spark id -vpa
	**/	
    
	public function admin_form_tab_1(){

		$barcode_id = $this->input->post('barcode_id');	
		$brand_id = $this->input->post('brand_name');
		$cat_short_name = $this->input->post('category');
		$description = $this->input->post('description');
		$product_id = $this->input->post('product_id');
		$product_name = $this->input->post('product_name');
		$product_code = $this->input->post('prod_code');

		$category_data = $this->products_model->getfromtable('categories',array('short_name'=>$cat_short_name));
		
		$cat_id = $category_data['id'];
		
		$data_admin_part_1 = array(		
									'product_name'=>$product_name,
									'category_id'=>$cat_id,
									'brand_id'=>$brand_id,
									'product_code'=>$product_code,
									'description'=>$description,
									'barcode_id'=>$barcode_id
								);

		if(!empty($product_id)){
			$this->products_model->update($product_id,$data_admin_part_1);
		}else{
			$product_id = $this->products_model->insert($data_admin_part_1);
		}
				
		echo json_encode(array('product_id'=>$product_id));
	}

	// ------------------------------------------------------------------------

	/**
	* function admin_form_tab_2() for save Admin Tab-2 Form Data
	*
	* @return string
	* @author Virendra patel - Spark id -vpa
	**/
    
	public function admin_form_tab_2(){

		//For Retail
		$r_length = $this->input->post('r_length');
		$r_width = $this->input->post('r_width');
		$r_height = $this->input->post('r_height');
		$r_gross_weight = $this->input->post('r_gross_weight');
		$r_net_weight = $this->input->post('r_net_weight');
		$dm3_retail = $this->input->post('dm3_retail');
		$product_id = $this->input->post('product_id');
		$product_retail_id = $this->input->post('product_retail_id'); // Retail ID from dimension Table

		$data_retail = array(
							'product_id'=>$product_id,
							'dimension_id'=>'1',
							'length'=>$r_length,
							'width'=>$r_width,
							'height'=>$r_height,
							'gross_weight'=>$r_gross_weight,
							'net_weight'=>$r_net_weight,
							'dm3'=>$dm3_retail		
							);

		// If Id find then UPDATE otherwise insert
		if(!empty($product_retail_id)){
			$this->products_model->update_into('dimension',$product_retail_id,$data_retail);	
		}else{			
			$product_retail_id = $this->products_model->insert_into('dimension',$data_retail);
		}

		// ------------------------------------------------------------------------

		$m_upc = $this->input->post('m_upc');
		$m_length = $this->input->post('m_length');
		$m_width = $this->input->post('m_width');
		$m_height = $this->input->post('m_height');
		$m_gross_weight = $this->input->post('m_gross_weight');
		$m_net_weight = $this->input->post('m_net_weight');
		$dm3_master = $this->input->post('dm3_master');
		$no_pc_master = $this->input->post('no_pc_master');
		$product_master_id = $this->input->post('product_master_id'); // MasterCase ID from dimension Table

		$data_master = array(	
							'product_id'=>$product_id,
							'dimension_id'=>'2',
							'length'=>$m_length,
							'width'=>$m_width,
							'height'=>$m_height,
							'gross_weight'=>$m_gross_weight,
							'net_weight'=>$m_net_weight,
							'dm3'=>$dm3_master,
							'no_of_pc_case'=>$no_pc_master,
							'upc'=>$m_upc			
							);

		// If Id find then UPDATE otherwise insert
		if(!empty($product_master_id)){
			$this->products_model->update_into('dimension',$product_master_id,$data_master);	
		}else{			
			$product_master_id = $this->products_model->insert_into('dimension',$data_master);
		}

		// ------------------------------------------------------------------------

		$i_upc = $this->input->post('i_upc');
		$i_length = $this->input->post('i_length');
		$i_width = $this->input->post('i_width');
		$i_height = $this->input->post('i_height');
		$i_gross_weight = $this->input->post('i_gross_weight');
		$i_net_weight = $this->input->post('i_net_weight');
		$dm3_inner = $this->input->post('dm3_inner');
		$no_pc_inner = $this->input->post('no_pc_inner');
		$product_inner_id = $this->input->post('product_inner_id'); // InnerCase ID from dimension Table

		if(!empty($i_upc)){
			
			$data_inner = array(	
							'product_id'=>$product_id,
							'dimension_id'=>'3',
							'length'=>$i_length,
							'width'=>$i_width,
							'height'=>$i_height,
							'gross_weight'=>$i_gross_weight,
							'net_weight'=>$i_net_weight,
							'dm3'=>$dm3_inner,
							'no_of_pc_case'=>$no_pc_inner,
							'upc'=>$i_upc			
							);

			if(!empty($product_inner_id)){
				$this->products_model->update_into('dimension',$product_inner_id,$data_inner);	
			}else{
				$product_inner_id = $this->products_model->insert_into('dimension',$data_inner);
			}
		}

		// ------------------------------------------------------------------------

		$p_upc = $this->input->post('p_upc');
		$p_length = $this->input->post('p_length');
		$p_width = $this->input->post('p_width');
		$p_height = $this->input->post('p_height');
		$p_gross_weight = $this->input->post('p_gross_weight');
		$p_net_weight = $this->input->post('p_net_weight');
		$dm3_pallet = $this->input->post('dm3_pallet');
		$p_case_row = $this->input->post('p_case_row');
		$p_no_of_row = $this->input->post('p_no_of_row');
		$p_cma_per_pal = $this->input->post('p_cma_per_pal');
		$product_pallet_id = $this->input->post('product_pallet_id');

		$data_pallet =  array(	
							'product_id'=>$product_id,
							'dimension_id'=>'4',
							'length'=>$p_length,
							'width'=>$p_width,
							'height'=>$p_height,
							'gross_weight'=>$p_gross_weight,
							'net_weight'=>$p_net_weight,
							'dm3'=>$dm3_pallet,
							'upc'=>$p_upc,
							'case_row'=>$p_case_row,
							'no_of_rows'=>$p_no_of_row,
							'cma_per_pal'=>$p_cma_per_pal			
							);

		// If Id find then UPDATE otherwise insert
		if(!empty($product_pallet_id)){
			$this->products_model->update_into('dimension',$product_pallet_id,$data_pallet);	
		}else{			
			$product_pallet_id = $this->products_model->insert_into('dimension',$data_pallet);
		}

		echo json_encode(
					array(
						'product_retail_id'=>$product_retail_id,
						'product_master_id'=>$product_master_id,
						'product_pallet_id'=>$product_pallet_id,
						'product_inner_id'=>$product_inner_id,
						'qry'=>$this->db->last_query()
						)
				);
	}

	// ------------------------------------------------------------------------

	/**
	* function admin_form_tab_3() for save Admin Tab-3 Form Data
	*
	* @return string
	* @author Virendra patel - Spark id -vpa
	**/	
    
    
	public function admin_form_tab_3(){

		$switch_11 = $this->input->post('switch_11'); // HAVE YOU SENT THE UPC CODE TO THE SUPPLIER ?
		$switch_12 = $this->input->post('switch_12'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
		$note_13 = $this->input->post('mrsp_canada');
		$note_14 = $this->input->post('hs_code');
		$note_15 = $this->input->post('mrsp_international');
		$note_16 = $this->input->post('country_origin');
		$product_id = $this->input->post('product_id');

		$id_11 = $this->input->post('id_11');
		$id_12 = $this->input->post('id_12');
		$id_13 = $this->input->post('id_13');
		$id_14 = $this->input->post('id_14');
		$id_15 = $this->input->post('id_15');
		$id_16 = $this->input->post('id_16');

		//If Id Found then Update otherwise Insert data
		if(!empty($id_11) || !empty($id_12) || !empty($id_13) || !empty($id_14) || !empty($id_15) || !empty($id_16)){
			
			if(!empty($switch_11)){
                $data_q11 = array('question_id'=>'11','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$id_11,$data_q11);
            }else{
                $data_q11 = array('question_id'=>'11','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$id_11,$data_q11);
            }

            if(!empty($switch_12)){
                $data_q12 = array('question_id'=>'12','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$id_12,$data_q12);
            }else{
                $data_q12 = array('question_id'=>'12','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$id_12,$data_q12);
            }

            $data_q13 = array('question_id'=>'13','product_id'=>$product_id,'notes'=>$note_13);
            $this->products_model->update_into('product_question',$id_13,$data_q13);

            $data_q14 = array('question_id'=>'14','product_id'=>$product_id,'notes'=>$note_14);
            $this->products_model->update_into('product_question',$id_14,$data_q14);
            
            $data_q15 = array('question_id'=>'15','product_id'=>$product_id,'notes'=>$note_15);
            $this->products_model->update_into('product_question',$id_15,$data_q15);

            $data_q16 = array('question_id'=>'16','product_id'=>$product_id,'notes'=>$note_16);
            $this->products_model->update_into('product_question',$id_16,$data_q16);

		}else{

            if(!empty($switch_11)){
                $data_q11 = array('question_id'=>'11','product_id'=>$product_id,'answer'=>'1');
                $id_11 = $this->products_model->insert_into('product_question',$data_q11);
            }else{
                $data_q11 = array('question_id'=>'11','product_id'=>$product_id,'answer'=>'0');
                $id_11 = $this->products_model->insert_into('product_question',$data_q11);
            }

            if(!empty($switch_12)){
                $data_q12 = array('question_id'=>'12','product_id'=>$product_id,'answer'=>'1');
                $id_12 = $this->products_model->insert_into('product_question',$data_q12);
            }else{
                $data_q12 = array('question_id'=>'12','product_id'=>$product_id,'answer'=>'0');
                $id_12 = $this->products_model->insert_into('product_question',$data_q12);
            }

            $data_q13 = array('question_id'=>'13','product_id'=>$product_id,'notes'=>$note_13);
            $id_13 = $this->products_model->insert_into('product_question',$data_q13);

            $data_q14 = array('question_id'=>'14','product_id'=>$product_id,'notes'=>$note_14);
            $id_14 = $this->products_model->insert_into('product_question',$data_q14);
            
            $data_q15 = array('question_id'=>'15','product_id'=>$product_id,'notes'=>$note_15);
            $id_15 = $this->products_model->insert_into('product_question',$data_q15);

            $data_q16 = array('question_id'=>'16','product_id'=>$product_id,'notes'=>$note_16);
            $id_16 = $this->products_model->insert_into('product_question',$data_q16);

		}

        echo json_encode(
                    array(
                        'id_11'=>$id_11,
                        'id_12'=>$id_12,
                        'id_13'=>$id_13,
                        'id_14'=>$id_14,
                        'id_15'=>$id_15,
                        'id_16'=>$id_16,
                        'qry'=>$this->db->last_query()
                        )
                );
	}

	// ------------------------------------------------------------------------

 	// Generate Random UPC NO  
	public function upc_get(){
		$odd_sum = $even_sum = 0;
		for ($i = 1; $i < 12; $i++) {
			$digits[$i] = rand(0,9);
			if($i % 2 == 0)
				$even_sum += $digits[$i];
			else
				$odd_sum += $digits[$i];
		}
		$digits[$i] = 10 - ((3 * $odd_sum + $even_sum) % 10);
		echo implode('',$digits);
	}

	// ------------------------------ // END ADMIN TAB FORM ------------------------------------------

	// ------------------------------ START PRODUCTION TAB FORM ------------------------------------------

	public function production_form_tab_1(){

	}

	public function production_add_more_tab_1(){
		$str = $this->load->view('products/ajax_view/production_tab_part_1', null, TRUE);
		echo json_encode(array('add_more'=>$str));	
	}

	// ------------------------------ // END PRODUCTION TAB FORM ------------------------------------------

}


/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
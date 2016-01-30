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
        $data['suppliers'] = $this->products_model->getfrom('suppliers');

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
		
		// ------------------------------------------------------------------------

		$decode_json = array();
		$product_new_data = $this->products_model->getfrom('products_new',false,
							array('where'=>array('id'=>$product_id)),array('single'=>true));
		
		if($product_new_data['admin_tab_complete'] != ''){
			$decode_json = json_decode($product_new_data['admin_tab_complete'],true);
			$decode_json['part_1'] = '33';
		}else{
			$decode_json['part_1'] = '33';
		}

		$encode_json = json_encode($decode_json);
		$this->products_model->update_into('products_new',$product_id,array('admin_tab_complete'=>$encode_json));
		
		// ------------------------------------------------------------------------

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

		// ------------------------------------------------------------------------

		$decode_json = array();
		$product_new_data = $this->products_model->getfrom('products_new',false,
							array('where'=>array('id'=>$product_id)),array('single'=>true));
		
		if($product_new_data['admin_tab_complete'] != ''){
			$decode_json = json_decode($product_new_data['admin_tab_complete'],true);
			$decode_json['part_2'] = '33';
		}else{
			$decode_json['part_2'] = '33';
		}

		$encode_json = json_encode($decode_json);
		$this->products_model->update_into('products_new',$product_id,array('admin_tab_complete'=>$encode_json));
		
		// ------------------------------------------------------------------------

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

		// ------------------------------------------------------------------------

		$decode_json = array();
		$product_new_data = $this->products_model->getfrom('products_new',false,
							array('where'=>array('id'=>$product_id)),array('single'=>true));
		
		if($product_new_data['admin_tab_complete'] != ''){
			$decode_json = json_decode($product_new_data['admin_tab_complete'],true);
			$decode_json['part_3'] = '34';
		}else{
			$decode_json['part_3'] = '34';
		}

		$encode_json = json_encode($decode_json);
		$this->products_model->update_into('products_new',$product_id,array('admin_tab_complete'=>$encode_json));
		
		// ------------------------------------------------------------------------

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

	public function production_add_more_tab_1(){
		$data['suppliers'] = $this->products_model->getfrom('suppliers');
		$data['cnt'] = $this->input->post('new_cnt');
		$str = $this->load->view('products/ajax_view/production_tab_part_1', $data, TRUE);
		echo json_encode(array('add_more'=>$str));	
	}

	public function fetch_supplier_data(){
		$id = $this->input->post('supplier_id');
		$supplier = array();
		$supplier = $this->products_model->getfrom('suppliers',false,array('where'=>array('id'=>$id)),array('single'=>true));
		echo json_encode($supplier);
	}

	public function production_form_tab_1(){
		
		$production_part_1_count = (int)$this->input->post('production_part_1_count');
		
		$product_id = $this->input->post('product_id');
		$decode_json = array();
		$product_new_data = $this->products_model->getfrom('products_new',false,
							array('where'=>array('id'=>$product_id)),array('single'=>true));
		
		if($product_new_data['production_complete'] != ''){
			$decode_json = json_decode($product_new_data['production_complete'],true);
			$decode_json['part_1'] = '20';
		}else{
			$decode_json['part_1'] = '20';
		}

		$encode_json = json_encode($decode_json);
		$this->products_model->update_into('products_new',$product_id,array('production_complete'=>$encode_json));

		$prod_array = array();

		for ($i=1; $i <=$production_part_1_count; $i++) { 

			$production_hidden = $this->input->post('production_supplier_'.$i); // Hidden Id
			$product_cost = $this->input->post('product_cost_'.$i);
			$supplier_id = $this->input->post('supplier_'.$i);

			$prod_data = array('product_id'=>$product_id,'product_cost'=>$product_cost,'supplier_id'=>$supplier_id);

			$production_hidden_id = $this->input->post('production_supplier_'.$i); // Hidden Id

			if(!empty($production_hidden_id)){
				array_push($prod_array, $production_hidden_id);
				$this->products_model->update_into('products_suppliers',$production_hidden_id,$prod_data);
			}else{
				$last_id = $this->products_model->insert_into('products_suppliers',$prod_data);
				array_push($prod_array, $last_id);
			}
		}

		echo json_encode(array('res'=>$prod_array));
	}	


	// ------------------------------ // END PRODUCTION TAB FORM ------------------------------------------

        
 
     
 
        // ------------------------------ START PRODUCT ATTCHMENT AND NOTES ------------------------------------------
         
        public function delete_selected_attachemnt() {
 
            $data_append='';
            if (!empty($_POST['ids'])) {
              $ids = $_POST['ids'];
              $this->db->where_in('id', $ids);
              
              //changes
              if ($this->db->delete('products_attachments')) {
                $data['product_attachment'] = $this->products_model->get_product_attachment_id($_POST['pid']);
                foreach($data['product_attachment'] as $temp){
                    $data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]' id='chk_attachment' class='chk_notes' value=".$temp->id."><a  class='no_preview'  href=uploads/products/".$temp->attachment.">".$temp->attachment."</a></li>"; 
                	//$data_append.="hi";
                }
                // print_r($data['product_attachment']);
                $response = array('data1' => $data_append,'status' => 'success');
              } else {
                $response = array('status' => 'fail');
              }
            }
            
            echo json_encode($response);    
            die();
        }
        
        public function delete_selected_notes() {
            $notes_data_append='';
            if (!empty($_POST['ids'])) {
              $ids = $_POST['ids'];
              $this->db->where_in('id', $ids);
              if ($this->db->delete('products_notes')) {
                
                $data['product_notes'] = $this->products_model->get_product_notes_id($_POST['pid']);
                
                foreach($data['product_notes'] as $temp){
                    $notes_data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]'' id='chk_attachment' class='chk_notes' value=".$temp->id."><a data-desc=".$temp->description." class='notes_link' id=".$temp->id." href='javascript::void(0)'>".$temp->notes."</a><span style='margin-left:60px'>".$temp->created_date."</span></li>";
                }
                $response = array('notes_data' => $notes_data_append,'status' => 'success');
              } else {
                $response = array('status' => 'fail');
              }
            }
            
            echo json_encode($response);    
            die();
        }
        
        // ------------------------------ END PRODUCT ATTCHMENT AND NOTES ------------------------------------------
        
        // ------------------------------- START MARKETING TAB FORM -----------------------------------------


	
	/**
     * fucntion marketing_part1 uses to save data about product title,highlight,paragraph highlight,introduction
	 *
	 * @return array
	 * @author Parth Viramgama - pav
	 **/
	
	public function marketing_part1(){

        $product_id = $this->input->post('product_id');
                
		$product_name_en = $this->input->post('product_name_en');
        $product_name_fr = $this->input->post('product_name_fr');
                
		$product_highlight1_en = $this->input->post('product_highlight1_en');
        $product_highlight1_fr = $this->input->post('product_highlight1_fr');
                
        $product_highlight2_en = $this->input->post('product_highlight2_en');
        $product_highlight2_fr = $this->input->post('product_highlight2_fr');
                
        $product_highlight3_en = $this->input->post('product_highlight3_en');
        $product_highlight3_fr = $this->input->post('product_highlight3_fr');
		
        $product_paragraph_en = $this->input->post('product_paragraph_en');
        $product_paragraph_fr = $this->input->post('product_paragraph_fr');
                
        $product_introduction_en = $this->input->post('product_introduction_en');
        $product_introduction_fr = $this->input->post('product_introduction_fr');
                
                
        $marketing_part1_1 = $this->input->post('marketing_part1_1');
		$marketing_part1_2 = $this->input->post('marketing_part1_2');
		$marketing_part1_3 = $this->input->post('marketing_part1_3');
		$marketing_part1_4 = $this->input->post('marketing_part1_4');
		$marketing_part1_5 = $this->input->post('marketing_part1_5');
		$marketing_part1_6 = $this->input->post('marketing_part1_6');
                
           
                
		if(!empty($marketing_part1_1) || !empty($marketing_part1_2) || !empty($marketing_part1_3) || 
           !empty($marketing_part1_4) || !empty($marketing_part1_5) || !empty($marketing_part1_6)){
            
            $modified_date = date("Y-m-d H:i:s");

                    $marketing_part1_title = array('product_id'=>$product_id,'en_title'=>$product_name_en,'fr_title'=>$product_name_fr,'part'=>'title','modified_date'=>$modified_date);
                    $this->products_model->update_into('products_marketing_part_1',$marketing_part1_1,$marketing_part1_title);
                    
                    $marketing_part1_highlight1 = array('product_id'=>$product_id,'en_title'=>$product_highlight1_en,'fr_title'=>$product_highlight1_fr,'part'=>'highlight','modified_date'=>$modified_date);
                    $this->products_model->update_into('products_marketing_part_1',$marketing_part1_2,$marketing_part1_highlight1);
                   
                    $marketing_part1_highlight2 = array('product_id'=>$product_id,'en_title'=>$product_highlight2_en,'fr_title'=>$product_highlight2_fr,'part'=>'highlight','modified_date'=>$modified_date);
                    $this->products_model->update_into('products_marketing_part_1',$marketing_part1_3,$marketing_part1_highlight2);
                    
                    $marketing_part1_highlight3 = array('product_id'=>$product_id,'en_title'=>$product_highlight3_en,'fr_title'=>$product_highlight3_fr,'part'=>'highlight','modified_date'=>$modified_date);
                    $this->products_model->update_into('products_marketing_part_1',$marketing_part1_4,$marketing_part1_highlight3);
                    
                    $marketing_part1_paragraph = array('product_id'=>$product_id,'en_title'=>$product_paragraph_en,'fr_title'=>$product_paragraph_fr,'part'=>'paragraph','modified_date'=>$modified_date);
                    $this->products_model->update_into('products_marketing_part_1',$marketing_part1_5,$marketing_part1_paragraph);
                    
                    $marketing_part1_introduction = array('product_id'=>$product_id,'en_title'=>$product_introduction_en,'fr_title'=>$product_introduction_fr,'part'=>'introduction','modified_date'=>$modified_date);
                    $this->products_model->update_into('products_marketing_part_1',$marketing_part1_6,$marketing_part1_introduction);
                }else{
                    $marketing_part1_title = array('product_id'=>$product_id,'en_title'=>$product_name_en,'fr_title'=>$product_name_fr,'part'=>'title');
                    $marketing_part1_1 = $this->products_model->insert_into('products_marketing_part_1',$marketing_part1_title);
                    
                    $marketing_part1_highlight1 = array('product_id'=>$product_id,'en_title'=>$product_highlight1_en,'fr_title'=>$product_highlight1_fr,'part'=>'highlight');
                    $marketing_part1_2 = $this->products_model->insert_into('products_marketing_part_1',$marketing_part1_highlight1);
                   
                    $marketing_part1_highlight2 = array('product_id'=>$product_id,'en_title'=>$product_highlight2_en,'fr_title'=>$product_highlight2_fr,'part'=>'highlight');
                    $marketing_part1_3 = $this->products_model->insert_into('products_marketing_part_1',$marketing_part1_highlight2);
                    
                    $marketing_part1_highlight3 = array('product_id'=>$product_id,'en_title'=>$product_highlight3_en,'fr_title'=>$product_highlight3_fr,'part'=>'highlight');
                    $marketing_part1_4 = $this->products_model->insert_into('products_marketing_part_1',$marketing_part1_highlight3);
                    
                    $marketing_part1_paragraph = array('product_id'=>$product_id,'en_title'=>$product_paragraph_en,'fr_title'=>$product_paragraph_fr,'part'=>'paragraph');
                    $marketing_part1_5 = $this->products_model->insert_into('products_marketing_part_1',$marketing_part1_paragraph);
                    
                    $marketing_part1_introduction = array('product_id'=>$product_id,'en_title'=>$product_introduction_en,'fr_title'=>$product_introduction_fr,'part'=>'introduction');
                    $marketing_part1_6 = $this->products_model->insert_into('products_marketing_part_1',$marketing_part1_introduction);
                }
                
                echo json_encode(
                    array(
                      'marketing_part1_1'=>$marketing_part1_1,
                      'marketing_part1_2'=>$marketing_part1_2,
                      'marketing_part1_3'=>$marketing_part1_3,
                      'marketing_part1_4'=>$marketing_part1_4,
                      'marketing_part1_5'=>$marketing_part1_5,
                      'marketing_part1_6'=>$marketing_part1_6,
                      'status'=>'success',
                      'qry'=>$this->db->last_query()
                    )
                );
	}

    //----------------------------------------------------------------------------------------------------------------

	/**
    * fucntion marketing_part2 uses to save data about title and its description.
	*
	* @return array
	* @author Parth Viramgama - pav
	**/
	
	public function marketing_part2(){
    	$product_id = $this->input->post('product_id');
                
		$marketing_part2_en_title1 = $this->input->post('marketing_part2_en_title1');
        $marketing_part2_en_desc1 = $this->input->post('marketing_part2_en_desc1');
        $marketing_part2_fr_title1 = $this->input->post('marketing_part2_fr_title1');
        $marketing_part2_fr_desc1 = $this->input->post('marketing_part2_fr_desc1');
		
		$marketing_part2_en_title2 = $this->input->post('marketing_part2_en_title2');
        $marketing_part2_en_desc2 = $this->input->post('marketing_part2_en_desc2');
        $marketing_part2_fr_title2 = $this->input->post('marketing_part2_fr_title2');
        $marketing_part2_fr_desc2 = $this->input->post('marketing_part2_fr_desc2');
        
        $marketing_part2_en_title3 = $this->input->post('marketing_part2_en_title3');
        $marketing_part2_en_desc3 = $this->input->post('marketing_part2_en_desc3');
        $marketing_part2_fr_title3 = $this->input->post('marketing_part2_fr_title3');
        $marketing_part2_fr_desc3 = $this->input->post('marketing_part2_fr_desc3');

        $marketing_part2_en_title4 = $this->input->post('marketing_part2_en_title4');
        $marketing_part2_en_desc4 = $this->input->post('marketing_part2_en_desc4');
        $marketing_part2_fr_title4 = $this->input->post('marketing_part2_fr_title4');
        $marketing_part2_fr_desc4 = $this->input->post('marketing_part2_fr_desc4');

        $marketing_part2_en_title5 = $this->input->post('marketing_part2_en_title5');
        $marketing_part2_en_desc5 = $this->input->post('marketing_part2_en_desc5');
        $marketing_part2_fr_title5 = $this->input->post('marketing_part2_fr_title5');
        $marketing_part2_fr_desc5 = $this->input->post('marketing_part2_fr_desc5');

        $marketing_part2_en_title6 = $this->input->post('marketing_part2_en_title6');
        $marketing_part2_en_desc6 = $this->input->post('marketing_part2_en_desc6');
        $marketing_part2_fr_title6 = $this->input->post('marketing_part2_fr_title6');
        $marketing_part2_fr_desc6 = $this->input->post('marketing_part2_fr_desc6');

        $marketing_part2_en_title7 = $this->input->post('marketing_part2_en_title7');
        $marketing_part2_en_desc7 = $this->input->post('marketing_part2_en_desc7');
        $marketing_part2_fr_title7 = $this->input->post('marketing_part2_fr_title7');
        $marketing_part2_fr_desc7 = $this->input->post('marketing_part2_fr_desc7');

        $marketing_part2_en_title8 = $this->input->post('marketing_part2_en_title8');
        $marketing_part2_en_desc8 = $this->input->post('marketing_part2_en_desc8');
        $marketing_part2_fr_title8 = $this->input->post('marketing_part2_fr_title8');
        $marketing_part2_fr_desc8 = $this->input->post('marketing_part2_fr_desc8');  

        $marketing_part2_1 = $this->input->post('marketing_part2_1');
		$marketing_part2_2 = $this->input->post('marketing_part2_2');
		$marketing_part2_3 = $this->input->post('marketing_part2_3');
		$marketing_part2_4 = $this->input->post('marketing_part2_4');
		$marketing_part2_5 = $this->input->post('marketing_part2_5');
		$marketing_part2_6 = $this->input->post('marketing_part2_6');
		$marketing_part2_7 = $this->input->post('marketing_part2_7');
		$marketing_part2_8 = $this->input->post('marketing_part2_8');
                
           
                
		if(!empty($marketing_part2_1) || !empty($marketing_part2_2) || !empty($marketing_part2_3) || !empty($marketing_part2_4) ||
           !empty($marketing_part2_5) || !empty($marketing_part2_6) || !empty($marketing_part2_7) || !empty($marketing_part2_8)){
        	$modified_date = date("Y-m-d H:i:s");
			
			$marketing_part2_title1 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title1,'fr_title'=>$marketing_part2_fr_title1,'en_description'=>$marketing_part2_en_desc1,'fr_description'=>$marketing_part2_fr_desc1,'modified_date'=>$modified_date);
            $this->products_model->update_into('products_marketing_part_2',$marketing_part2_1,$marketing_part2_title1);

            $marketing_part2_title2 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title2,'fr_title'=>$marketing_part2_fr_title2,'en_description'=>$marketing_part2_en_desc2,'fr_description'=>$marketing_part2_fr_desc2,'modified_date'=>$modified_date);
            $this->products_model->update_into('products_marketing_part_2',$marketing_part2_2,$marketing_part2_title2);

            $marketing_part2_title3 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title3,'fr_title'=>$marketing_part2_fr_title3,'en_description'=>$marketing_part2_en_desc3,'fr_description'=>$marketing_part2_fr_desc3,'modified_date'=>$modified_date);
            $this->products_model->update_into('products_marketing_part_2',$marketing_part2_3,$marketing_part2_title3);

            if(!empty($marketing_part2_4)){
            	$marketing_part2_title4 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title4,'fr_title'=>$marketing_part2_fr_title4,'en_description'=>$marketing_part2_en_desc4,'fr_description'=>$marketing_part2_fr_desc4,'modified_date'=>$modified_date);
            	$this->products_model->update_into('products_marketing_part_2',$marketing_part2_4,$marketing_part2_title4);
        	}

        	if(!empty($marketing_part2_5)){
            	$marketing_part2_title5 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title5,'fr_title'=>$marketing_part2_fr_title5,'en_description'=>$marketing_part2_en_desc5,'fr_description'=>$marketing_part2_fr_desc5,'modified_date'=>$modified_date);
            	$this->products_model->update_into('products_marketing_part_2',$marketing_part2_5,$marketing_part2_title5);
            }

            if(!empty($marketing_part2_6)){
            	$marketing_part2_title6 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title6,'fr_title'=>$marketing_part2_fr_title6,'en_description'=>$marketing_part2_en_desc6,'fr_description'=>$marketing_part2_fr_desc6,'modified_date'=>$modified_date);
            	$this->products_model->update_into('products_marketing_part_2',$marketing_part2_6,$marketing_part2_title6);
            }

            if(!empty($marketing_part2_7)){
            	$marketing_part2_title7 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title7,'fr_title'=>$marketing_part2_fr_title7,'en_description'=>$marketing_part2_en_desc7,'fr_description'=>$marketing_part2_fr_desc7,'modified_date'=>$modified_date);
            	$this->products_model->update_into('products_marketing_part_2',$marketing_part2_7,$marketing_part2_title7);
            }

            if(!empty($marketing_part2_8)){
            	$marketing_part2_title8 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title8,'fr_title'=>$marketing_part2_fr_title8,'en_description'=>$marketing_part2_en_desc8,'fr_description'=>$marketing_part2_fr_desc8,'modified_date'=>$modified_date);
            	$this->products_model->update_into('products_marketing_part_2',$marketing_part2_8,$marketing_part2_title8);
            }

        }else{
        	$marketing_part2_title1 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title1,'fr_title'=>$marketing_part2_fr_title1,'en_description'=>$marketing_part2_en_desc1,'fr_description'=>$marketing_part2_fr_desc1);
            $marketing_part2_1 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title1);

            $marketing_part2_title2 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title2,'fr_title'=>$marketing_part2_fr_title2,'en_description'=>$marketing_part2_en_desc2,'fr_description'=>$marketing_part2_fr_desc2);
            $marketing_part2_2 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title2);

            $marketing_part2_title3 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title3,'fr_title'=>$marketing_part2_fr_title3,'en_description'=>$marketing_part2_en_desc3,'fr_description'=>$marketing_part2_fr_desc3);
            $marketing_part2_3 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title3);

            //if(!empty($marketing_part2_en_title4) && !empty($marketing_part2_fr_title4) && !empty($marketing_part2_en_desc4) && !empty($marketing_part2_fr_desc4)){
            	$marketing_part2_title4 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title4,'fr_title'=>$marketing_part2_fr_title4,'en_description'=>$marketing_part2_en_desc4,'fr_description'=>$marketing_part2_fr_desc4);
            	$marketing_part2_4 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title4);
        	//}

        	//if(!empty($marketing_part2_en_title5) && !empty($marketing_part2_fr_title5) && !empty($marketing_part2_en_desc5) && !empty($marketing_part2_fr_desc5)){
            	$marketing_part2_title5 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title5,'fr_title'=>$marketing_part2_fr_title5,'en_description'=>$marketing_part2_en_desc5,'fr_description'=>$marketing_part2_fr_desc5);
            	$marketing_part2_5 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title5);
            //}

            //if(!empty($marketing_part2_en_title6) && !empty($marketing_part2_fr_title6) && !empty($marketing_part2_en_desc6) && !empty($marketing_part2_fr_desc6)){
            	$marketing_part2_title6 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title6,'fr_title'=>$marketing_part2_fr_title6,'en_description'=>$marketing_part2_en_desc6,'fr_description'=>$marketing_part2_fr_desc6);
            	$marketing_part2_6 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title6);
            //}

            //if(!empty($marketing_part2_en_title7) && !empty($marketing_part2_fr_title7) && !empty($marketing_part2_en_desc7) && !empty($marketing_part2_fr_desc7)){
            	$marketing_part2_title7 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title7,'fr_title'=>$marketing_part2_fr_title7,'en_description'=>$marketing_part2_en_desc7,'fr_description'=>$marketing_part2_fr_desc7);
            	$marketing_part2_7 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title7);
            //}

            //if(!empty($marketing_part2_en_title8) && !empty($marketing_part2_fr_title8) && !empty($marketing_part2_en_desc8) && !empty($marketing_part2_fr_desc8)){
            	$marketing_part2_title8 = array('product_id'=>$product_id,'en_title'=>$marketing_part2_en_title8,'fr_title'=>$marketing_part2_fr_title8,'en_description'=>$marketing_part2_en_desc8,'fr_description'=>$marketing_part2_fr_desc8);
            	$marketing_part2_8 = $this->products_model->insert_into('products_marketing_part_2',$marketing_part2_title8);
            //}
        }
                
        echo json_encode(
            array(
                'marketing_part2_1'=>$marketing_part2_1,
                'marketing_part2_2'=>$marketing_part2_2,
                'marketing_part2_3'=>$marketing_part2_3,
                'marketing_part2_4'=>$marketing_part2_4,
                'marketing_part2_5'=>$marketing_part2_5,
                'marketing_part2_6'=>$marketing_part2_6,
                'marketing_part2_7'=>$marketing_part2_7,
                'marketing_part2_8'=>$marketing_part2_8,
                'status'=>'success',
                'qry'=>$this->db->last_query()
                    )
                );
	}

    //----------------------------------------------------------------------------------------------------------------

	/**
    * fucntion marketing_part5 uses to save data like cost,supplier name,generated UPC Code,Notes
	*
	* @return array
	* @author Parth Viramgama - pav
	**/
	public function marketing_part5(){
		$product_id = $this->input->post('product_id');

		$marketing_part5_switch1 = $this->input->post('marketing_part5_switch1'); 
		$marketing_part5_cost1 = $this->input->post('marketing_part5_cost1');
		$marketing_part5_supplier1 = $this->input->post('marketing_part5_supplier1');
		$marketing_part5_upc1 = $this->input->post('marketing_part5_upc1');

		$marketing_part5_switch2 = $this->input->post('marketing_part5_switch2');
		$marketing_part5_cost2 = $this->input->post('marketing_part5_cost2');
		$marketing_part5_supplier2 = $this->input->post('marketing_part5_supplier2');
		$marketing_part5_upc2 = $this->input->post('marketing_part5_upc2');
		$marketing_part5_notes1 = $this->input->post('marketing_part5_notes1');

		$marketing_part5_1 = $this->input->post('marketing_part5_1');

		if(!empty($marketing_part5_1)){
			$modified_date = date("Y-m-d H:i:s");
			if(!empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'1','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'1','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1,'modified_date'=>$modified_date);
            		$this->products_model->update_into('products_marketing_part_5',$marketing_part5_1,$marketing_part5_data);
			}else if(!empty($marketing_part5_switch1) && empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'1','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'0','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1,'modified_date'=>$modified_date);
            		$this->products_model->update_into('products_marketing_part_5',$marketing_part5_1,$marketing_part5_data);
			}else if(empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'0','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'1','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1,'modified_date'=>$modified_date);
            		$this->products_model->update_into('products_marketing_part_5',$marketing_part5_1,$marketing_part5_data);
			}else if(empty($marketing_part5_switch1) && empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'0','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'0','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1,'modified_date'=>$modified_date);
            		$this->products_model->update_into('products_marketing_part_5',$marketing_part5_1,$marketing_part5_data);
			}
		}else{
			if(!empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'1','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'1','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1);
            		$marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5',$marketing_part5_data);
			}else if(!empty($marketing_part5_switch1) && empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'1','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'0','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1);
            		$marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5',$marketing_part5_data);
			}else if(empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'0','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'1','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1);
            		$marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5',$marketing_part5_data);
			}else if(empty($marketing_part5_switch1) && empty($marketing_part5_switch2)){
			 		$marketing_part5_data = array('product_id'=>$product_id,'display_used'=>'0','cost1'=>$marketing_part5_cost1,'supplier1'=>$marketing_part5_supplier1,'upc1'=>$marketing_part5_upc1,'plv_store_used'=>'0','cost2'=>$marketing_part5_cost2,'supplier2'=>$marketing_part5_supplier2,'upc2'=>$marketing_part5_upc2,'notes1'=>$marketing_part5_notes1);
            		$marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5',$marketing_part5_data);
			}
		}

		echo json_encode(
                    array(
                      'marketing_part5_1'=>$marketing_part5_1,
                      'status'=>'success',
                      'qry'=>$this->db->last_query()
                    )
                );
	}

	//----------------------------------------------------------------------------------------------------------------
	
	/**
     * fucntion production_part3 used to save PERMANENT MARKINGS AND LABELS Details.
	 *
	 * @return array
	 * @author Parth Viramgama - pav
	 **/
	public function production_part3(){
		$product_id = $this->input->post('product_id');
		$production_part3_notes1 = $this->input->post('production_part3_notes1');
		$production_part3_notes2 = $this->input->post('production_part3_notes2');
		$production_part3_switch1 = $this->input->post('production_part3_switch1');
		$production_part3_switch2 = $this->input->post('production_part3_switch2');
		$production_part3_switch3 = $this->input->post('production_part3_switch3');
		$production_part3_switch4 = $this->input->post('production_part3_switch4');
		$production_part3_switch5 = $this->input->post('production_part3_switch5');
		$production_part3_switch6 = $this->input->post('production_part3_switch6');

		$production_part3_h1 = $this->input->post('production_part3_h1');
		$production_part3_h2 = $this->input->post('production_part3_h2');
		$production_part3_h3 = $this->input->post('production_part3_h3');
		$production_part3_h4 = $this->input->post('production_part3_h4');
		$production_part3_h5 = $this->input->post('production_part3_h5');
		$production_part3_h6 = $this->input->post('production_part3_h6');
		$production_part3_h7 = $this->input->post('production_part3_h7');

		if(!empty($production_part3_h1) || !empty($production_part3_h2) || !empty($production_part3_h3) || 
			!empty($production_part3_h4) || !empty($production_part3_h5) || !empty($production_part3_h6) ||
			!empty($production_part3_h7)){
			
			if(!empty($production_part3_switch1)){
                $production_part3_q1 = array('question_id'=>'17','product_id'=>$product_id,'answer'=>'1','notes'=>$production_part3_notes1);
                $this->products_model->update_into('product_question',$production_part3_h1,$production_part3_q1);
            }else{
               	$production_part3_q1 = array('question_id'=>'17','product_id'=>$product_id,'answer'=>'0','notes'=>$production_part3_notes1);
                $this->products_model->update_into('product_question',$production_part3_h1,$production_part3_q1);
            }

            if(!empty($production_part3_switch2)){
                $production_part3_q2 = array('question_id'=>'18','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part3_h2,$production_part3_q2);
            }else{
               	$production_part3_q2 = array('question_id'=>'18','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part3_h2,$production_part3_q2);
            }

            if(!empty($production_part3_switch3)){
                $production_part3_q3 = array('question_id'=>'19','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part3_h3,$production_part3_q3);
            }else{
               	$production_part3_q3 = array('question_id'=>'19','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part3_h3,$production_part3_q3);
            }

            if(!empty($production_part3_switch4)){
                $production_part3_q4 = array('question_id'=>'20','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part3_h4,$production_part3_q4);
            }else{
               	$production_part3_q4 = array('question_id'=>'20','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part3_h4,$production_part3_q4);
            }

            if(!empty($production_part3_switch5)){
                $production_part3_q5 = array('question_id'=>'21','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part3_h5,$production_part3_q5);
            }else{
               	$production_part3_q5 = array('question_id'=>'21','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part3_h5,$production_part3_q5);
            }

            if(!empty($production_part3_switch6)){
                $production_part3_q6 = array('question_id'=>'22','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part3_h6,$production_part3_q6);
            }else{
               	$production_part3_q6 = array('question_id'=>'22','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part3_h6,$production_part3_q6);
            }

            $production_part3_q7 = array('question_id'=>'23','product_id'=>$product_id,'notes'=>$production_part3_notes2);
            $this->products_model->update_into('product_question',$production_part3_h7,$production_part3_q7);

		}else{
			if(!empty($production_part3_switch1)){
                $production_part3_q1 = array('question_id'=>'17','product_id'=>$product_id,'answer'=>'1','notes'=>$production_part3_notes1);
                $production_part3_h1 = $this->products_model->insert_into('product_question',$production_part3_q1);
            }else{
               	$production_part3_q1 = array('question_id'=>'17','product_id'=>$product_id,'answer'=>'0','notes'=>$production_part3_notes1);
                $production_part3_h1 = $this->products_model->insert_into('product_question',$production_part3_q1);
            }

            if(!empty($production_part3_switch2)){
                $production_part3_q2 = array('question_id'=>'18','product_id'=>$product_id,'answer'=>'1');
                $production_part3_h2 = $this->products_model->insert_into('product_question',$production_part3_q2);
            }else{
               	$production_part3_q2 = array('question_id'=>'18','product_id'=>$product_id,'answer'=>'0');
                $production_part3_h2 = $this->products_model->insert_into('product_question',$production_part3_q2);
            }

            if(!empty($production_part3_switch3)){
                $production_part3_q3 = array('question_id'=>'19','product_id'=>$product_id,'answer'=>'1');
                $production_part3_h3 = $this->products_model->insert_into('product_question',$production_part3_q3);
            }else{
               	$production_part3_q3 = array('question_id'=>'19','product_id'=>$product_id,'answer'=>'0');
                $production_part3_h3 = $this->products_model->insert_into('product_question',$production_part3_q3);
            }

            if(!empty($production_part3_switch4)){
                $production_part3_q4 = array('question_id'=>'20','product_id'=>$product_id,'answer'=>'1');
                $production_part3_h4 = $this->products_model->insert_into('product_question',$production_part3_q4);
            }else{
               	$production_part3_q4 = array('question_id'=>'20','product_id'=>$product_id,'answer'=>'0');
                $production_part3_h4 = $this->products_model->insert_into('product_question',$production_part3_q4);
            }

            if(!empty($production_part3_switch5)){
                $production_part3_q5 = array('question_id'=>'21','product_id'=>$product_id,'answer'=>'1');
                $production_part3_h5 = $this->products_model->insert_into('product_question',$production_part3_q5);
            }else{
               	$production_part3_q5 = array('question_id'=>'21','product_id'=>$product_id,'answer'=>'0');
                $production_part3_h5 = $this->products_model->insert_into('product_question',$production_part3_q5);
            }

            if(!empty($production_part3_switch6)){
                $production_part3_q6 = array('question_id'=>'22','product_id'=>$product_id,'answer'=>'1');
                $production_part3_h6 = $this->products_model->insert_into('product_question',$production_part3_q6);
            }else{
               	$production_part3_q6 = array('question_id'=>'22','product_id'=>$product_id,'answer'=>'0');
                $production_part3_h6 = $this->products_model->insert_into('product_question',$production_part3_q6);
            }

            $production_part3_q7 = array('question_id'=>'23','product_id'=>$product_id,'notes'=>$production_part3_notes2);
            $production_part3_h7 = $this->products_model->insert_into('product_question',$production_part3_q7);


            echo json_encode(
                    array(
                        'production_part3_1'=>$production_part3_h1,
                        'production_part3_2'=>$production_part3_h2,
                        'production_part3_3'=>$production_part3_h3,
                        'production_part3_4'=>$production_part3_h4,
                        'production_part3_5'=>$production_part3_h5,
                        'production_part3_6'=>$production_part3_h6,
                        'production_part3_7'=>$production_part3_h7,
                        'status'=>'success',
                        'qry'=>$this->db->last_query()
                        )
                );
		}
	}

	//----------------------------------------------------------------------------------------------------------------
	
	/**
     * fucntion production_part4 used to save MARKINGS FOR THE MASTER BOX details
	 *
	 * @return array
	 * @author Parth Viramgama - pav
	 **/
	public function production_part4(){
		$product_id = $this->input->post('product_id');
		$production_part4_switch1 = $this->input->post('production_part4_switch1');
		$production_part4_switch2 = $this->input->post('production_part4_switch2');

		$production_part4_h1 = $this->input->post('production_part4_h1');
		$production_part4_h2 = $this->input->post('production_part4_h2');

		if(!empty($production_part4_h1) || !empty($production_part4_h2)){

			if(!empty($production_part4_switch1)){
                $production_part4_q1 = array('question_id'=>'24','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part4_h1,$production_part4_q1);
            }else{
               	$production_part4_q1 = array('question_id'=>'24','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part4_h1,$production_part4_q1);
            }

            if(!empty($production_part4_switch2)){
                $production_part4_q2 = array('question_id'=>'25','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part4_h2,$production_part4_q2);
            }else{
               	$production_part4_q2 = array('question_id'=>'25','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part4_h2,$production_part4_q2);
            }

		}else{
			if(!empty($production_part4_switch1)){
                $production_part4_q1 = array('question_id'=>'24','product_id'=>$product_id,'answer'=>'1');
                $production_part4_h1 = $this->products_model->insert_into('product_question',$production_part4_q1);
            }else{
               	$production_part4_q1 = array('question_id'=>'24','product_id'=>$product_id,'answer'=>'0');
                $production_part4_h1 = $this->products_model->insert_into('product_question',$production_part4_q1);
            }

            if(!empty($production_part4_switch2)){
                $production_part4_q2 = array('question_id'=>'25','product_id'=>$product_id,'answer'=>'1');
                $production_part4_h2 = $this->products_model->insert_into('product_question',$production_part4_q2);
            }else{
               	$production_part4_q2 = array('question_id'=>'25','product_id'=>$product_id,'answer'=>'0');
                $production_part4_h2 = $this->products_model->insert_into('product_question',$production_part4_q2);
            }

            echo json_encode(
                    array(
                        'production_part4_1'=>$production_part4_h1,
                        'production_part4_2'=>$production_part4_h2,
                        'status'=>'success',
                        'qry'=>$this->db->last_query()
                        )
                );
		}
	}

	//----------------------------------------------------------------------------------------------------------------

	/**
     * fucntion production_part4 used to save FIRST INSPECTION details
	 *
	 * @return array
	 * @author Parth Viramgama - pav
	 **/
	public function production_part5(){
		$product_id = $this->input->post('product_id');
		$production_part5_notes1 = $this->input->post('production_part5_notes1');
		$production_part5_switch1 = $this->input->post('production_part5_switch1');
		$production_part5_switch2 = $this->input->post('production_part5_switch2');

		$production_part5_h1 = $this->input->post('production_part5_h1');
		$production_part5_h2 = $this->input->post('production_part5_h2');

		if(!empty($production_part5_h1) || !empty($productio_part5_h2)){
			if(!empty($production_part5_switch1)){
				$production_part5_q1 = array('question_id'=>'26','product_id'=>$product_id,'answer'=>'1','notes'=>$production_part5_notes1);
                $this->products_model->update_into('product_question',$production_part5_h1,$production_part5_q1);
			}else{
				$production_part5_q1 = array('question_id'=>'26','product_id'=>$product_id,'answer'=>'0','notes'=>$production_part5_notes1);
                $this->products_model->update_into('product_question',$production_part5_h1,$production_part5_q1);
			}

			if(!empty($production_part5_switch2)){
				$production_part5_q2 = array('question_id'=>'27','product_id'=>$product_id,'answer'=>'1');
                $this->products_model->update_into('product_question',$production_part5_h2,$production_part5_q2);
			}else{
				$production_part5_q2 = array('question_id'=>'27','product_id'=>$product_id,'answer'=>'0');
                $this->products_model->update_into('product_question',$production_part5_h2,$production_part5_q2);
			}
		}else{
			if(!empty($production_part5_switch1)){
				$production_part5_q1 = array('question_id'=>'26','product_id'=>$product_id,'answer'=>'1','notes'=>$production_part5_notes1);
                $production_part5_h1 = $this->products_model->insert_into('product_question',$production_part5_q1);
			}else{
				$production_part5_q1 = array('question_id'=>'26','product_id'=>$product_id,'answer'=>'0','notes'=>$production_part5_notes1);
                $production_part5_h1 = $this->products_model->insert_into('product_question',$production_part5_q1);
			}

			if(!empty($production_part5_switch2)){
				$production_part5_q2 = array('question_id'=>'27','product_id'=>$product_id,'answer'=>'1');
                $production_part5_h2 = $this->products_model->insert_into('product_question',$production_part5_q2);
			}else{
				$production_part5_q2 = array('question_id'=>'27','product_id'=>$product_id,'answer'=>'0');
                $production_part5_h2 = $this->products_model->insert_into('product_question',$production_part5_q2);
			}
		}

		echo json_encode(
                   array(
                        'production_part5_1'=>$production_part5_h1,
                        'production_part5_2'=>$production_part5_h2,
                        'status'=>'success',
                        'qry'=>$this->db->last_query()
                        )
        );
	}
	//----------------------------------------------------------------------------------------------------------------
}
        



/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
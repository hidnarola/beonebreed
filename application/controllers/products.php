<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('quality_model');
        if ($this->session->userdata('admin_logged_in') == '') {
            redirect('/login');
        }
    }

    public function index($tab = false) {

        if ($tab == false) {
            $data['products_new'] = $this->products_model->get_all_products();
            $this->template->load('admin_default', 'products/index', $data);
        } else {
            $data['tab'] = $tab;
            if ($tab == 'admin') {
                $view = 'index_for_admin';
            }
            if ($tab == 'marketing') {
                $view = 'index_for_marketing';
            }
            if ($tab == 'production') {
                $view = 'index_for_production';
            }
            if (in_array($tab, array('admin', 'marketing', 'production')) == false) {
                show_404();
            }
            $data['products_new'] = $this->products_model->get_all_products();
            $this->template->load('admin_default', 'products/' . $view, $data);
        }
    }

    public function add() {

        $data['categories'] = $this->category_model->get_all_category(1);
        $data['brands'] = $this->product_brand_model->get();
        $data['question_list_3'] = $this->products_model->get_question_part_3();
        $data['question_list_4'] = $this->products_model->get_question_part_4();
        $data['suppliers'] = $this->products_model->getfrom('suppliers');
        $data['quality_list'] = array();

        $this->template->load('admin_default', 'products/add', $data);
    }

    public function edit($pid) {

        $data['categories'] = $this->category_model->get_all_category(1);
        $data['brands'] = $this->product_brand_model->get();
        $data['question_list_3'] = $this->products_model->get_question_part_3();
        $data['question_list_4'] = $this->products_model->get_question_part_4();
        $data['suppliers'] = $this->products_model->getfrom('suppliers');
        // $data['quality_list']=$this->quality_model->product_tab_get_all($pid);	
        $data['quality_list'] = $this->quality_model->product_tab_get_all($pid);

        // p($data['quality_list'],true);

        $data['product_id'] = $pid;

        // ------------------------------------------------------------------------
        // Admin Tab's Data
        $data['data_admin_part_1'] = $this->products_model->getfrom('products_new', 'products_new.id as pid,products_new.*,bar_code.*,products_new.description as p_desc,categories.short_name', array('where' => array('products_new.id' => $pid)), array('single' => true, 'join' => array(
                array(
                    'table' => 'bar_code',
                    'condition' => 'products_new.barcode_id=bar_code.id'
                ),
                array(
                    'table' => 'categories',
                    'condition' => 'categories.id=products_new.category_id'
                ),
            )
        ));
        $data['data_admin_part_2'] = $this->products_model->getfrom('dimension', false, array('where_in' => array('dimension_id' => ['1', '2', '3', '4']), 'where' => array('product_id' => $pid)));
        $data['data_admin_part_3'] = $this->products_model->getfrom('product_question', false, array('where_in' => array('question_id' => ['11', '12', '13', '14', '15', '16', '24','25']), 'where' => array('product_id' => $pid)));
        // p($data['data_admin_part_3'],true);
        // ------------------------------------------------------------------------
        // ------------------------------------------------------------------------
        // Marketing Tab's Data                
        $data['marketing_part1_title'] = $this->products_model->getfrom('products_marketing_part_1', false, array('where' => array('product_id' => $pid, 'part' => 'title')), array('single' => true));
        $data['marketing_part1_highlight'] = $this->products_model->getfrom('products_marketing_part_1', false, array('where' => array('product_id' => $pid, 'part' => 'highlight')));
        $data['marketing_part1_paragraph'] = $this->products_model->getfrom('products_marketing_part_1', false, array('where' => array('product_id' => $pid, 'part' => 'paragraph')), array('single' => true));
        $data['marketing_part1_introduction'] = $this->products_model->getfrom('products_marketing_part_1', false, array('where' => array('product_id' => $pid, 'part' => 'introduction')), array('single' => true));

        $data['marketing_part2_data'] = $this->products_model->getfrom('products_marketing_part_2', false, array('where' => array('product_id' => $pid)));

        $data['marketing_part5_data'] = $this->products_model->getfrom('products_marketing_part_5', false, array('where' => array('product_id' => $pid)), array('single' => true));
        // p($data['marketing_part1_title'],true);
        // ------------------------------------------------------------------------

        $data['all_attachment'] = $this->products_model->getfrom('products_attachments', false, array('where' => array('product_id' => $pid, 'tab' => 'attachments')));
        $data['all_notes'] = $this->products_model->getfrom('products_notes', false, array('where' => array('product_id' => $pid)));

        // ------------------------------------------------------------------------
        // Attachment and Notes Tab's Data
        // ------------------------------------------------------------------------
        // ------------------------------------------------------------------------
        // Production Tab's Data
        $data['data_production_part_1'] = $this->products_model->getfrom('products_suppliers', 'products_suppliers.id as prod_supp_id,
        													products_suppliers.*,suppliers.*', array('where' => array('products_suppliers.product_id' => $pid)), array('join' => array(array('table' => 'suppliers',
                    'condition' => 'products_suppliers.supplier_id=suppliers.id')))
        );

        if (!empty($data['data_production_part_1'][0]['product_cost'])) {
            $data['data_production_part_1'][0]['product_cost'] = number_format($data['data_production_part_1'][0]['product_cost'], 2, '.', '');
            ;
        }
        // p($data['data_production_part_1'],1);

        $data['data_production_part_2'] = $this->products_model->getfrom('products_sample', false, array('where' => array('product_id' => $pid)));
        $data['data_production_part_2_all_attachment'] = $this->products_model->getfrom('products_attachments', false, array('where' => array('product_id' => $pid, 'tab' => 'production')));
        //p($data['data_production_part_1'],true);
        // ------------------------------------------------------------------------
        // qry();
        // p($data['data_admin_part_3']);	
        // exit();
//        var_dump($data);
//        die();
        $this->template->load('admin_default', 'products/edit/edit', $data);
    }

    // ------------------------------- START ADMIN TAB FORM -----------------------------------------

    /**
     * function generate_upc_ean for generate product code which is unassigned to any product
     * Formula for generate product code is short name of category follwed by last 4 number of UPC number
     * Function for admin_form_tab_1 to 3
     * @return String
     * @author Virendra
     * */
    public function generate_upc_ean() {

        $cat_id = $this->input->post('cat_id');
        $list_upc = array();
        $er = $this->session->userdata('UPC');
        if (!empty($er)) {
            $list_upc = $this->session->userdata('UPC');
        } else {
            $this->session->set_userdata('UPC', []);
        }
        //$this->session->unset_userdata('some_name');
        $not_in = array_values($list_upc);
        $barcodes = $this->barcode_model->get_unique_barcode($not_in);

        if (empty($barcodes)) {
            echo json_encode(['upc' => 0]);
            return;
        }

        $list_upc[$this->input->post('type')] = $barcodes[0]['upc'];
        $this->session->set_userdata('UPC', $list_upc);

        $random_barcode = $barcodes[array_rand($barcodes)];
        $last_four_characters = substr($random_barcode['upc'], 8);
        $product_code = $cat_id . $last_four_characters;
        $random_barcode['product_code'] = $product_code;

        echo json_encode($random_barcode);
    }

    public function admin_form_alltab() {
        $form_data = $this->input->post();

        //add or update part 1
        $barcode_id = $this->input->post('barcode_id');
        $brand_id = $this->input->post('brand_name');
        $cat_short_name = $this->input->post('category');
        $description = $this->input->post('description');
        $description = empty($description)?NULL:$description;
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $product_code = $this->input->post('prod_code');

        $category_data = $this->products_model->getfromtable('categories', array('short_name' => $cat_short_name));
        $cat_id = $category_data['id'];

        $data_admin_part_1 = array(
            'product_name' => $product_name,
            'category_id' => $cat_id,
            'brand_id' => $brand_id,
            'product_code' => $product_code,
            'description' => $description,
            'barcode_id' => $barcode_id
        );
        if (!empty($product_id)) {
            unset($data_admin_part_1['barcode_id']);
            unset($data_admin_part_1['product_code']);
            $this->products_model->update($product_id, $data_admin_part_1);
        } else {
            $product_id = $this->products_model->insert($data_admin_part_1);
            $this->db->where('id', $barcode_id);
            $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for product : ' . $product_name]);

            $list_upc = $this->session->userdata('UPC');
            if (isset($list_upc['#upc'])) {
                unset($list_upc['#upc']);
                $this->session->set_userdata('UPC', $list_upc);
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['admin_tab_complete'] != '') {
            $decode_json = json_decode($product_new_data['admin_tab_complete'], true);
            $decode_json['part_1'] = '33';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3']));
        } else {
            $decode_json['part_1'] = '33';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $complete_bar_no = '33';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('admin_tab_complete' => $encode_json));

        //add or update part 2
        //For Retail
        $r_length = $this->input->post('r_length');
        $r_length = empty($r_length)?NULL:$r_length;
        
        $r_width = $this->input->post('r_width');
        $r_width = empty($r_width)?NULL:$r_width;
        
        $r_height = $this->input->post('r_height');
        $r_height = empty($r_height)?NULL:$r_height;
        
        $r_gross_weight = $this->input->post('r_gross_weight');
        $r_gross_weight = empty($r_gross_weight)?NULL:$r_gross_weight;
        
        $r_net_weight = $this->input->post('r_net_weight');
        $r_net_weight = empty($r_net_weight)?NULL:$r_net_weight;
        
        $dm3_retail = $this->input->post('dm3_retail');
        $dm3_retail = empty($dm3_retail)?NULL:$dm3_retail;
        
        $product_retail_id = $this->input->post('product_retail_id'); // Retail ID from dimension Table

        $data_retail = array(
            'product_id' => $product_id,
            'dimension_id' => '1',
            'length' => $r_length,
            'width' => $r_width,
            'height' => $r_height,
            'gross_weight' => $r_gross_weight,
            'net_weight' => $r_net_weight,
            'dm3' => $dm3_retail
        );

        // If Id find then UPDATE otherwise insert
        if (!empty($product_retail_id)) {
            $this->products_model->update_into('dimension', $product_retail_id, $data_retail);
        } else {
            $product_retail_id = $this->products_model->insert_into('dimension', $data_retail);
        }

        // ------------------------------------------------------------------------

        $m_upc = $this->input->post('m_upc');
        
        $m_length = $this->input->post('m_length');
        $m_length = empty($m_length)?NULL:$m_length;
        
        $m_width = $this->input->post('m_width');
        $m_width = empty($m_width)?NULL:$m_width;
        
        $m_height = $this->input->post('m_height');
        $m_height = empty($m_height)?NULL:$m_height;
        
        $m_gross_weight = $this->input->post('m_gross_weight');
        $m_gross_weight = empty($m_gross_weight)?NULL:$m_gross_weight;
        
        $m_net_weight = $this->input->post('m_net_weight');
        $m_net_weight = empty($m_net_weight)?NULL:$m_net_weight;
        
        $dm3_master = $this->input->post('dm3_master');
        $dm3_master = empty($dm3_master)?NULL:$dm3_master;
        
        $no_pc_master = $this->input->post('no_pc_master');
        $no_pc_master = empty($no_pc_master)?NULL:$no_pc_master;
        
        $product_master_id = $this->input->post('product_master_id'); // MasterCase ID from dimension Table

        $data_master = array(
            'product_id' => $product_id,
            'dimension_id' => '2',
            'length' => $m_length,
            'width' => $m_width,
            'height' => $m_height,
            'gross_weight' => $m_gross_weight,
            'net_weight' => $m_net_weight,
            'dm3' => $dm3_master,
            'no_of_pc_case' => $no_pc_master,
            'upc' => $m_upc
        );

        // If Id find then UPDATE otherwise insert
        if (!empty($product_master_id)) {
            unset($data_master['upc']);
            $this->products_model->update_into('dimension', $product_master_id, $data_master);
        } else {

            $product_master_id = $this->products_model->insert_into('dimension', $data_master);
            $this->db->where('upc', $m_upc);
            $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for mastercase  UPC']);

            $list_upc = $this->session->userdata('UPC');
            if (isset($list_upc['#m_upc'])) {
                unset($list_upc['#m_upc']);
                $this->session->set_userdata('UPC', $list_upc);
            }
        }

        // ------------------------------------------------------------------------

        $i_upc = $this->input->post('i_upc');
        $i_length = $this->input->post('i_length');
        $i_length = empty($i_length)?NUll:$i_length;
        
        $i_width = $this->input->post('i_width');
        $i_width = empty($i_width)?NULL:$i_width;
        
        $i_height = $this->input->post('i_height');
        $i_height = empty($i_height)?NULL:$i_height;
        
        $i_gross_weight = $this->input->post('i_gross_weight');
        $i_gross_weight = empty($i_gross_weight)?NULL:$i_gross_weight;
        
        $i_net_weight = $this->input->post('i_net_weight');
        $i_net_weight = empty($i_net_weight)?NULL:$i_net_weight;
        
        $dm3_inner = $this->input->post('dm3_inner');
        $dm3_inner = empty($dm3_inner)?NULL:$dm3_inner;
        
        $no_pc_inner = $this->input->post('no_pc_inner');
        $no_pc_inner = empty($no_pc_inner)?NULL:$no_pc_inner;
        
        $product_inner_id = $this->input->post('product_inner_id'); // InnerCase ID from dimension Table

        if (!empty($i_upc)) {

            $data_inner = array(
                'product_id' => $product_id,
                'dimension_id' => '3',
                'length' => $i_length,
                'width' => $i_width,
                'height' => $i_height,
                'gross_weight' => $i_gross_weight,
                'net_weight' => $i_net_weight,
                'dm3' => $dm3_inner,
                'no_of_pc_case' => $no_pc_inner,
                'upc' => $i_upc
            );

            if (!empty($product_inner_id)) {
                unset($data_master['upc']);
                $this->products_model->update_into('dimension', $product_inner_id, $data_inner);
            } else {
                $product_inner_id = $this->products_model->insert_into('dimension', $data_inner);
                $this->db->where('upc', $i_upc);
                $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for intercase UPC']);

                $list_upc = $this->session->userdata('UPC');
                if (isset($list_upc['#i_upc'])) {
                    unset($list_upc['#i_upc']);
                    $this->session->set_userdata('UPC', $list_upc);
                }
            }
        }

        // ------------------------------------------------------------------------

        $p_upc = $this->input->post('p_upc');
        
        $p_length = $this->input->post('p_length');
        $p_length = empty($p_length)?NULL:$p_length;
        
        $p_width = $this->input->post('p_width');
        $p_width = empty($p_width)?NULL:$p_width;
        
        $p_height = $this->input->post('p_height');
        $p_height = empty($p_height)?NULL:$p_height;
        
        $p_gross_weight = $this->input->post('p_gross_weight');
        $p_gross_weight = empty($p_gross_weight)?NULL:$p_gross_weight;
        
        $p_net_weight = $this->input->post('p_net_weight');
        $p_net_weight = empty($p_net_weight)?NULL:$p_net_weight;
        
        $dm3_pallet = $this->input->post('dm3_pallet');
        $dm3_pallet = empty($dm3_pallet)?NULL:$dm3_pallet;
        
        $p_case_row = $this->input->post('p_case_row');
        $p_case_row = empty($p_case_row)?NULL:$p_case_row;
        
        $p_no_of_row = $this->input->post('p_no_of_row');
        $p_no_of_row = empty($p_no_of_row)?NULL:$p_no_of_row;
        
        $p_cma_per_pal = $this->input->post('p_cma_per_pal');
        $p_cma_per_pal = empty($p_cma_per_pal)?NULL:$p_cma_per_pal;
        
        $product_pallet_id = $this->input->post('product_pallet_id');

        $data_pallet = array(
            'product_id' => $product_id,
            'dimension_id' => '4',
            'length' => $p_length,
            'width' => $p_width,
            'height' => $p_height,
            'gross_weight' => $p_gross_weight,
            'net_weight' => $p_net_weight,
            'dm3' => $dm3_pallet,
            'upc' => $p_upc,
            'case_row' => $p_case_row,
            'no_of_rows' => $p_no_of_row,
            'cma_per_pal' => $p_cma_per_pal
        );

        // If Id find then UPDATE otherwise insert
        if (!empty($product_pallet_id)) {
            unset($data_master['upc']);
            $this->products_model->update_into('dimension', $product_pallet_id, $data_pallet);
        } else {
            $product_pallet_id = $this->products_model->insert_into('dimension', $data_pallet);
            $this->db->where('upc', $p_upc);
            $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for pallet UPC']);

            $list_upc = $this->session->userdata('UPC');
            if (isset($list_upc['#p_upc'])) {
                unset($list_upc['#p_upc']);
                $this->session->set_userdata('UPC', $list_upc);
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['admin_tab_complete'] != '') {
            $decode_json = json_decode($product_new_data['admin_tab_complete'], true);
            $decode_json['part_2'] = '33';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3']));
        } else {
            $decode_json['part_2'] = '33';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('admin_tab_complete' => $encode_json));

        //add or update part-3 data
        $switch_11 = $this->input->post('switch_11'); // HAVE YOU SENT THE UPC CODE TO THE SUPPLIER ?
        $switch_12 = $this->input->post('switch_12'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
        $switch_24 = $this->input->post('switch_24'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
        $switch_25 = $this->input->post('switch_25'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
        
        $note_13 = $this->input->post('mrsp_canada');
        $note_13 = empty($note_13)?NULL:$note_13;
        
        $note_14 = $this->input->post('hs_code');
        $note_14 = empty($note_14)?NULL:$note_14;
        
        $note_15 = $this->input->post('mrsp_international');
        $note_15 = empty($note_15)?NULL:$note_15;
        
        $note_16 = $this->input->post('country_origin');
        $note_16 = empty($note_16)?NULL:$note_16;
        

        $id_11 = $this->input->post('id_11');
        $id_12 = $this->input->post('id_12');
        $id_13 = $this->input->post('id_13');
        $id_14 = $this->input->post('id_14');
        $id_15 = $this->input->post('id_15');
        $id_16 = $this->input->post('id_16');
        $id_24 = $this->input->post('id_24');
        $id_25 = $this->input->post('id_25');

        //If Id Found then Update otherwise Insert data
        if (!empty($id_11) || !empty($id_12) || !empty($id_13) || !empty($id_14) || !empty($id_15) || !empty($id_16)) {

            if (!empty($switch_11)) {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_11, $data_q11);
            } else {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_11, $data_q11);
            }

            if (!empty($switch_12)) {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_12, $data_q12);
            } else {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_12, $data_q12);
            }

            if (!empty($switch_24)) {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_24, $data_q24);
            } else {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_24, $data_q24);
            }

            if (!empty($switch_25)) {
                $data_q25 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_25, $data_q25);
            } else {
                $data_q25 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_25, $data_q25);
            }

            $data_q13 = array('question_id' => '13', 'product_id' => $product_id, 'notes' => $note_13);
            $this->products_model->update_into('product_question', $id_13, $data_q13);

            $data_q14 = array('question_id' => '14', 'product_id' => $product_id, 'notes' => $note_14);
            $this->products_model->update_into('product_question', $id_14, $data_q14);

            $data_q15 = array('question_id' => '15', 'product_id' => $product_id, 'notes' => $note_15);
            $this->products_model->update_into('product_question', $id_15, $data_q15);

            $data_q16 = array('question_id' => '16', 'product_id' => $product_id, 'notes' => $note_16);
            $this->products_model->update_into('product_question', $id_16, $data_q16);
        } else {

            if (!empty($switch_11)) {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '1');
                $id_11 = $this->products_model->insert_into('product_question', $data_q11);
            } else {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '0');
                $id_11 = $this->products_model->insert_into('product_question', $data_q11);
            }

            if (!empty($switch_12)) {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '1');
                $id_12 = $this->products_model->insert_into('product_question', $data_q12);
            } else {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '0');
                $id_12 = $this->products_model->insert_into('product_question', $data_q12);
            }

            if (!empty($switch_24)) {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '1');
                $id_24 = $this->products_model->insert_into('product_question', $data_q24);
            } else {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $id_24 = $this->products_model->insert_into('product_question', $data_q24);
            }

            if (!empty($switch_25)) {
                $data_q25 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '1');
                $id_25 = $this->products_model->insert_into('product_question', $data_q25);
            } else {
                $data_q25 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $id_25 = $this->products_model->insert_into('product_question', $data_q25);
            }

            $data_q13 = array('question_id' => '13', 'product_id' => $product_id, 'notes' => $note_13);
            $id_13 = $this->products_model->insert_into('product_question', $data_q13);

            $data_q14 = array('question_id' => '14', 'product_id' => $product_id, 'notes' => $note_14);
            $id_14 = $this->products_model->insert_into('product_question', $data_q14);

            $data_q15 = array('question_id' => '15', 'product_id' => $product_id, 'notes' => $note_15);
            $id_15 = $this->products_model->insert_into('product_question', $data_q15);

            $data_q16 = array('question_id' => '16', 'product_id' => $product_id, 'notes' => $note_16);
            $id_16 = $this->products_model->insert_into('product_question', $data_q16);
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['admin_tab_complete'] != '') {
            $decode_json = json_decode($product_new_data['admin_tab_complete'], true);
            $decode_json['part_3'] = '34';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3']));
        } else {
            $decode_json['part_3'] = '34';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('admin_tab_complete' => $encode_json));
        echo json_encode(
                array(
                    'product_id' => $product_id, 
                    'complete_bar_no' => $complete_bar_no,
                    'product_retail_id' => $product_retail_id,
                    'product_master_id' => $product_master_id,
                    'product_pallet_id' => $product_pallet_id,
                    'product_inner_id' => $product_inner_id,
                    'id_11' => $id_11,
                    'id_12' => $id_12,
                    'id_13' => $id_13,
                    'id_14' => $id_14,
                    'id_15' => $id_15,
                    'id_16' => $id_16,
                    'id_24' => $id_24,
                    'id_25' => $id_25,
                ));
    }

    public function admin_form_tab_1() {

        $barcode_id = $this->input->post('barcode_id');
        $brand_id = $this->input->post('brand_name');
        $cat_short_name = $this->input->post('category');
        $description = $this->input->post('description');
        $product_id = $this->input->post('product_id');

        $product_name = $this->input->post('product_name');
        $product_code = $this->input->post('prod_code');

        $category_data = $this->products_model->getfromtable('categories', array('short_name' => $cat_short_name));
        $cat_id = $category_data['id'];

        $data_admin_part_1 = array(
            'product_name' => $product_name,
            'category_id' => $cat_id,
            'brand_id' => $brand_id,
            'product_code' => $product_code,
            'description' => $description,
            'barcode_id' => $barcode_id
        );
        if (!empty($product_id)) {
            unset($data_admin_part_1['barcode_id']);
            unset($data_admin_part_1['product_code']);
            $this->products_model->update($product_id, $data_admin_part_1);
        } else {
            $product_id = $this->products_model->insert($data_admin_part_1);
            $this->db->where('id', $barcode_id);
            $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for product : ' . $product_name]);

            $list_upc = $this->session->userdata('UPC');
            if (isset($list_upc['#upc'])) {
                unset($list_upc['#upc']);
                $this->session->set_userdata('UPC', $list_upc);
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['admin_tab_complete'] != '') {
            $decode_json = json_decode($product_new_data['admin_tab_complete'], true);
            $decode_json['part_1'] = '33';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3']));
        } else {
            $decode_json['part_1'] = '33';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $complete_bar_no = '33';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('admin_tab_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(array('product_id' => $product_id, 'complete_bar_no' => $complete_bar_no));
    }

    public function admin_form_tab_2() {

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
            'product_id' => $product_id,
            'dimension_id' => '1',
            'length' => $r_length,
            'width' => $r_width,
            'height' => $r_height,
            'gross_weight' => $r_gross_weight,
            'net_weight' => $r_net_weight,
            'dm3' => $dm3_retail
        );

        // If Id find then UPDATE otherwise insert
        if (!empty($product_retail_id)) {
            $this->products_model->update_into('dimension', $product_retail_id, $data_retail);
        } else {
            $product_retail_id = $this->products_model->insert_into('dimension', $data_retail);
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
            'product_id' => $product_id,
            'dimension_id' => '2',
            'length' => $m_length,
            'width' => $m_width,
            'height' => $m_height,
            'gross_weight' => $m_gross_weight,
            'net_weight' => $m_net_weight,
            'dm3' => $dm3_master,
            'no_of_pc_case' => $no_pc_master,
            'upc' => $m_upc
        );

        // If Id find then UPDATE otherwise insert
        if (!empty($product_master_id)) {
            unset($data_master['upc']);
            $this->products_model->update_into('dimension', $product_master_id, $data_master);
        } else {

            $product_master_id = $this->products_model->insert_into('dimension', $data_master);
            $this->db->where('upc', $m_upc);
            $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for mastercase  UPC']);

            $list_upc = $this->session->userdata('UPC');
            if (isset($list_upc['#m_upc'])) {
                unset($list_upc['#m_upc']);
                $this->session->set_userdata('UPC', $list_upc);
            }
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

        if (!empty($i_upc)) {

            $data_inner = array(
                'product_id' => $product_id,
                'dimension_id' => '3',
                'length' => $i_length,
                'width' => $i_width,
                'height' => $i_height,
                'gross_weight' => $i_gross_weight,
                'net_weight' => $i_net_weight,
                'dm3' => $dm3_inner,
                'no_of_pc_case' => $no_pc_inner,
                'upc' => $i_upc
            );

            if (!empty($product_inner_id)) {
                unset($data_master['upc']);
                $this->products_model->update_into('dimension', $product_inner_id, $data_inner);
            } else {
                $product_inner_id = $this->products_model->insert_into('dimension', $data_inner);
                $this->db->where('upc', $i_upc);
                $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for intercase UPC']);

                $list_upc = $this->session->userdata('UPC');
                if (isset($list_upc['#i_upc'])) {
                    unset($list_upc['#i_upc']);
                    $this->session->set_userdata('UPC', $list_upc);
                }
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

        $data_pallet = array(
            'product_id' => $product_id,
            'dimension_id' => '4',
            'length' => $p_length,
            'width' => $p_width,
            'height' => $p_height,
            'gross_weight' => $p_gross_weight,
            'net_weight' => $p_net_weight,
            'dm3' => $dm3_pallet,
            'upc' => $p_upc,
            'case_row' => $p_case_row,
            'no_of_rows' => $p_no_of_row,
            'cma_per_pal' => $p_cma_per_pal
        );

        // If Id find then UPDATE otherwise insert
        if (!empty($product_pallet_id)) {
            unset($data_master['upc']);
            $this->products_model->update_into('dimension', $product_pallet_id, $data_pallet);
        } else {
            $product_pallet_id = $this->products_model->insert_into('dimension', $data_pallet);
            $this->db->where('upc', $p_upc);
            $this->db->update('bar_code', ['is_assigned' => '1', 'description' => 'Assigned for pallet UPC']);

            $list_upc = $this->session->userdata('UPC');
            if (isset($list_upc['#p_upc'])) {
                unset($list_upc['#p_upc']);
                $this->session->set_userdata('UPC', $list_upc);
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['admin_tab_complete'] != '') {
            $decode_json = json_decode($product_new_data['admin_tab_complete'], true);
            $decode_json['part_2'] = '33';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3']));
        } else {
            $decode_json['part_2'] = '33';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('admin_tab_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(
                array(
                    'product_retail_id' => $product_retail_id,
                    'product_master_id' => $product_master_id,
                    'product_pallet_id' => $product_pallet_id,
                    'product_inner_id' => $product_inner_id,
                    'complete_bar_no' => $complete_bar_no,
                    'qry' => $this->db->last_query()
                )
        );
    }

    public function admin_form_tab_3() {

        $switch_11 = $this->input->post('switch_11'); // HAVE YOU SENT THE UPC CODE TO THE SUPPLIER ?
        $switch_12 = $this->input->post('switch_12'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
        $switch_24 = $this->input->post('switch_24'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
        $switch_25 = $this->input->post('switch_25'); // HAVE YOU CREATED THE PRODUCT IN OUR ERP (ACOMBA) ?
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
        $id_24 = $this->input->post('id_24');
        $id_25 = $this->input->post('id_25');

        //If Id Found then Update otherwise Insert data
        if (!empty($id_11) || !empty($id_12) || !empty($id_13) || !empty($id_14) || !empty($id_15) || !empty($id_16)) {

            if (!empty($switch_11)) {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_11, $data_q11);
            } else {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_11, $data_q11);
            }

            if (!empty($switch_12)) {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_12, $data_q12);
            } else {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_12, $data_q12);
            }

            if (!empty($switch_24)) {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_24, $data_q24);
            } else {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_24, $data_q24);
            }

            if (!empty($switch_25)) {
                $data_q25 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $id_25, $data_q25);
            } else {
                $data_q25 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $id_25, $data_q25);
            }

            $data_q13 = array('question_id' => '13', 'product_id' => $product_id, 'notes' => $note_13);
            $this->products_model->update_into('product_question', $id_13, $data_q13);

            $data_q14 = array('question_id' => '14', 'product_id' => $product_id, 'notes' => $note_14);
            $this->products_model->update_into('product_question', $id_14, $data_q14);

            $data_q15 = array('question_id' => '15', 'product_id' => $product_id, 'notes' => $note_15);
            $this->products_model->update_into('product_question', $id_15, $data_q15);

            $data_q16 = array('question_id' => '16', 'product_id' => $product_id, 'notes' => $note_16);
            $this->products_model->update_into('product_question', $id_16, $data_q16);
        } else {

            if (!empty($switch_11)) {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '1');
                $id_11 = $this->products_model->insert_into('product_question', $data_q11);
            } else {
                $data_q11 = array('question_id' => '11', 'product_id' => $product_id, 'answer' => '0');
                $id_11 = $this->products_model->insert_into('product_question', $data_q11);
            }

            if (!empty($switch_12)) {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '1');
                $id_12 = $this->products_model->insert_into('product_question', $data_q12);
            } else {
                $data_q12 = array('question_id' => '12', 'product_id' => $product_id, 'answer' => '0');
                $id_12 = $this->products_model->insert_into('product_question', $data_q12);
            }

            if (!empty($switch_24)) {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '1');
                $id_24 = $this->products_model->insert_into('product_question', $data_q24);
            } else {
                $data_q24 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $id_24 = $this->products_model->insert_into('product_question', $data_q24);
            }

            if (!empty($switch_25)) {
                $data_q25 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '1');
                $id_25 = $this->products_model->insert_into('product_question', $data_q25);
            } else {
                $data_q25 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $id_25 = $this->products_model->insert_into('product_question', $data_q25);
            }

            $data_q13 = array('question_id' => '13', 'product_id' => $product_id, 'notes' => $note_13);
            $id_13 = $this->products_model->insert_into('product_question', $data_q13);

            $data_q14 = array('question_id' => '14', 'product_id' => $product_id, 'notes' => $note_14);
            $id_14 = $this->products_model->insert_into('product_question', $data_q14);

            $data_q15 = array('question_id' => '15', 'product_id' => $product_id, 'notes' => $note_15);
            $id_15 = $this->products_model->insert_into('product_question', $data_q15);

            $data_q16 = array('question_id' => '16', 'product_id' => $product_id, 'notes' => $note_16);
            $id_16 = $this->products_model->insert_into('product_question', $data_q16);
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['admin_tab_complete'] != '') {
            $decode_json = json_decode($product_new_data['admin_tab_complete'], true);
            $decode_json['part_3'] = '34';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3']));
        } else {
            $decode_json['part_3'] = '34';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('admin_tab_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(
                array(
                    'id_11' => $id_11,
                    'id_12' => $id_12,
                    'id_13' => $id_13,
                    'id_14' => $id_14,
                    'id_15' => $id_15,
                    'id_16' => $id_16,
                    'id_24' => $id_24,
                    'id_25' => $id_25,
                    'complete_bar_no' => $complete_bar_no,
                    'qry' => $this->db->last_query()
                )
        );
    }

    public function upc_get() {
        // Generate Random UPC NO  
        $odd_sum = $even_sum = 0;
        for ($i = 1; $i < 12; $i++) {
            $digits[$i] = rand(0, 9);
            if ($i % 2 == 0)
                $even_sum += $digits[$i];
            else
                $odd_sum += $digits[$i];
        }
        $digits[$i] = 10 - ((3 * $odd_sum + $even_sum) % 10);
        echo implode('', $digits);
    }

    // ------------------------------ // END ADMIN TAB FORM ------------------------------------------
    // ------------------------------ START PRODUCTION TAB FORM ------------------------------------------

    public function production_add_more_tab_1() {
        $data['suppliers'] = $this->products_model->getfrom('suppliers');
        $data['cnt'] = $this->input->post('new_cnt');
        $str = $this->load->view('products/ajax_view/production_tab_part_1', $data, TRUE);
        echo json_encode(array('add_more' => $str));
    }

    public function fetch_supplier_data() {
        $id = $this->input->post('supplier_id');
        $supplier = array();
        $supplier = $this->products_model->getfrom('suppliers', false, array('where' => array('id' => $id)), array('single' => true));
        echo json_encode($supplier);
    }

    public function production_form_tab_1() {

        $production_part_1_count = (int) $this->input->post('production_part_1_count');
        $product_id = $this->input->post('product_id');

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['production_complete'] != '') {
            $decode_json = json_decode($product_new_data['production_complete'], true);
            $decode_json['part_1'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '20';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '0';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('production_complete' => $encode_json));

        // ------------------------------------------------------------------------


        $prod_array = array();
        $test = '';

        for ($i = 1; $i <= $production_part_1_count; $i++) {

            $production_hidden = $this->input->post('production_supplier_' . $i); // Hidden Id
            $product_cost = $this->input->post('product_cost_' . $i);
            $supplier_id = $this->input->post('supplier_' . $i);

            $prod_data = array('product_id' => $product_id, 'product_cost' => $product_cost, 'supplier_id' => $supplier_id);

            $production_hidden_id = $this->input->post('production_supplier_' . $i); // Hidden Id

            if (!empty($production_hidden_id)) {
                $test .= 'If';
                array_push($prod_array, $production_hidden_id);
                $this->products_model->update_into('products_suppliers', $production_hidden_id, $prod_data);
            } else {
                $test .= 'ELSE';
                $last_id = $this->products_model->insert_into('products_suppliers', $prod_data);
                array_push($prod_array, $last_id);
            }
        }

        echo json_encode(array('res' => $prod_array, 'complete_bar_no' => $complete_bar_no, 'test' => $test));
    }

    public function delete($id = 0) {

        if ($this->products_model->delete_records($id, TRUE)) {
            $this->session->set_flashdata('msg', 'Your product has been successfully deleted');
        } else {

            $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('project');
    }

    public function prod_part_1_delete() {
        $id = $this->input->post('production_supplier');
        $this->products_model->deletefrom('products_suppliers', $id);
    }

    public function production_add_more_tab_2() {
        $data['cnt'] = $this->input->post('new_cnt');
        $str = $this->load->view('products/ajax_view/production_tab_part_2', $data, TRUE);
        echo json_encode(array('add_more' => $str, 'new_cnt' => $data['cnt']));
    }

    public function prod_part_2_delete() {
        $id = $this->input->post('production_sample');
        $this->products_model->deletefrom('products_sample', $id);
    }

    public function production_form_tab_2() {
        $production_part_2_count = (int) $this->input->post('production_part_2_count');
        $product_id = $this->input->post('product_id');

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['production_complete'] != '') {
            $decode_json = json_decode($product_new_data['production_complete'], true);
            $decode_json['part_2'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '0';
            $decode_json['part_2'] = '20';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '0';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('production_complete' => $encode_json));

        // ------------------------------------------------------------------------

        $prod_array = array();

        for ($i = 1; $i <= $production_part_2_count; $i++) {

            $prod_date = $this->input->post('prod_date_' . $i);
            $is_approve = (int) $this->input->post('is_approve_' . $i);
            $prod_note = $this->input->post('prod_note_' . $i);
            $improvement_needed = $this->input->post('improvement_needed_' . $i);

            $prod_data = array('is_approve' => $is_approve, 'notes' => $prod_note,
                'improvement_needed' => $improvement_needed,
                'sample_date' => $prod_date, 'product_id' => $product_id);

            $production_hidden_id = $this->input->post('production_sample_' . $i); // Hidden Id

            if (!empty($production_hidden_id)) {
                array_push($prod_array, $production_hidden_id);
                $this->products_model->update_into('products_sample', $production_hidden_id, $prod_data);
            } else {
                $last_id = $this->products_model->insert_into('products_sample', $prod_data);
                array_push($prod_array, $last_id);
            }
        }

        echo json_encode(array('res' => $prod_array, 'complete_bar_no' => $complete_bar_no));
    }

    public function production_part3() {
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

        if (!empty($production_part3_h1) || !empty($production_part3_h2) || !empty($production_part3_h3) ||
                !empty($production_part3_h4) || !empty($production_part3_h5) || !empty($production_part3_h6) ||
                !empty($production_part3_h7)) {

            if (!empty($production_part3_switch1)) {
                $production_part3_q1 = array('question_id' => '17', 'product_id' => $product_id, 'answer' => '1', 'notes' => $production_part3_notes1);
                $this->products_model->update_into('product_question', $production_part3_h1, $production_part3_q1);
            } else {
                $production_part3_q1 = array('question_id' => '17', 'product_id' => $product_id, 'answer' => '0', 'notes' => $production_part3_notes1);
                $this->products_model->update_into('product_question', $production_part3_h1, $production_part3_q1);
            }

            if (!empty($production_part3_switch2)) {
                $production_part3_q2 = array('question_id' => '18', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part3_h2, $production_part3_q2);
            } else {
                $production_part3_q2 = array('question_id' => '18', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part3_h2, $production_part3_q2);
            }

            if (!empty($production_part3_switch3)) {
                $production_part3_q3 = array('question_id' => '19', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part3_h3, $production_part3_q3);
            } else {
                $production_part3_q3 = array('question_id' => '19', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part3_h3, $production_part3_q3);
            }

            if (!empty($production_part3_switch4)) {
                $production_part3_q4 = array('question_id' => '20', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part3_h4, $production_part3_q4);
            } else {
                $production_part3_q4 = array('question_id' => '20', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part3_h4, $production_part3_q4);
            }

            if (!empty($production_part3_switch5)) {
                $production_part3_q5 = array('question_id' => '21', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part3_h5, $production_part3_q5);
            } else {
                $production_part3_q5 = array('question_id' => '21', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part3_h5, $production_part3_q5);
            }

            if (!empty($production_part3_switch6)) {
                $production_part3_q6 = array('question_id' => '22', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part3_h6, $production_part3_q6);
            } else {
                $production_part3_q6 = array('question_id' => '22', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part3_h6, $production_part3_q6);
            }

            $production_part3_q7 = array('question_id' => '23', 'product_id' => $product_id, 'notes' => $production_part3_notes2);
            $this->products_model->update_into('product_question', $production_part3_h7, $production_part3_q7);
        } else {
            if (!empty($production_part3_switch1)) {
                $production_part3_q1 = array('question_id' => '17', 'product_id' => $product_id, 'answer' => '1', 'notes' => $production_part3_notes1);
                $production_part3_h1 = $this->products_model->insert_into('product_question', $production_part3_q1);
            } else {
                $production_part3_q1 = array('question_id' => '17', 'product_id' => $product_id, 'answer' => '0', 'notes' => $production_part3_notes1);
                $production_part3_h1 = $this->products_model->insert_into('product_question', $production_part3_q1);
            }

            if (!empty($production_part3_switch2)) {
                $production_part3_q2 = array('question_id' => '18', 'product_id' => $product_id, 'answer' => '1');
                $production_part3_h2 = $this->products_model->insert_into('product_question', $production_part3_q2);
            } else {
                $production_part3_q2 = array('question_id' => '18', 'product_id' => $product_id, 'answer' => '0');
                $production_part3_h2 = $this->products_model->insert_into('product_question', $production_part3_q2);
            }

            if (!empty($production_part3_switch3)) {
                $production_part3_q3 = array('question_id' => '19', 'product_id' => $product_id, 'answer' => '1');
                $production_part3_h3 = $this->products_model->insert_into('product_question', $production_part3_q3);
            } else {
                $production_part3_q3 = array('question_id' => '19', 'product_id' => $product_id, 'answer' => '0');
                $production_part3_h3 = $this->products_model->insert_into('product_question', $production_part3_q3);
            }

            if (!empty($production_part3_switch4)) {
                $production_part3_q4 = array('question_id' => '20', 'product_id' => $product_id, 'answer' => '1');
                $production_part3_h4 = $this->products_model->insert_into('product_question', $production_part3_q4);
            } else {
                $production_part3_q4 = array('question_id' => '20', 'product_id' => $product_id, 'answer' => '0');
                $production_part3_h4 = $this->products_model->insert_into('product_question', $production_part3_q4);
            }

            if (!empty($production_part3_switch5)) {
                $production_part3_q5 = array('question_id' => '21', 'product_id' => $product_id, 'answer' => '1');
                $production_part3_h5 = $this->products_model->insert_into('product_question', $production_part3_q5);
            } else {
                $production_part3_q5 = array('question_id' => '21', 'product_id' => $product_id, 'answer' => '0');
                $production_part3_h5 = $this->products_model->insert_into('product_question', $production_part3_q5);
            }

            if (!empty($production_part3_switch6)) {
                $production_part3_q6 = array('question_id' => '22', 'product_id' => $product_id, 'answer' => '1');
                $production_part3_h6 = $this->products_model->insert_into('product_question', $production_part3_q6);
            } else {
                $production_part3_q6 = array('question_id' => '22', 'product_id' => $product_id, 'answer' => '0');
                $production_part3_h6 = $this->products_model->insert_into('product_question', $production_part3_q6);
            }

            $production_part3_q7 = array('question_id' => '23', 'product_id' => $product_id, 'notes' => $production_part3_notes2);
            $production_part3_h7 = $this->products_model->insert_into('product_question', $production_part3_q7);

            // ------------------------------------------------------------------------

            $decode_json = array();
            $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

            if ($product_new_data['production_complete'] != '') {
                $decode_json = json_decode($product_new_data['production_complete'], true);
                $decode_json['part_3'] = '20';
                $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                    $decode_json['part_4'], $decode_json['part_5']));
            } else {
                $decode_json['part_1'] = '0';
                $decode_json['part_2'] = '0';
                $decode_json['part_3'] = '20';
                $decode_json['part_4'] = '0';
                $decode_json['part_5'] = '0';
                $complete_bar_no = '20';
            }

            $encode_json = json_encode($decode_json);
            $this->products_model->update_into('products_new', $product_id, array('production_complete' => $encode_json));

            // ------------------------------------------------------------------------

            echo json_encode(
                    array(
                        'production_part3_1' => $production_part3_h1,
                        'production_part3_2' => $production_part3_h2,
                        'production_part3_3' => $production_part3_h3,
                        'production_part3_4' => $production_part3_h4,
                        'production_part3_5' => $production_part3_h5,
                        'production_part3_6' => $production_part3_h6,
                        'production_part3_7' => $production_part3_h7,
                        'status' => 'success',
                        'complete_bar_no' => $complete_bar_no,
                        'qry' => $this->db->last_query()
                    )
            );
        }
    }

    public function production_part4() {
        $product_id = $this->input->post('product_id');
        $production_part4_switch1 = $this->input->post('production_part4_switch1');
        $production_part4_switch2 = $this->input->post('production_part4_switch2');

        $production_part4_h1 = $this->input->post('production_part4_h1');
        $production_part4_h2 = $this->input->post('production_part4_h2');

        if (!empty($production_part4_h1) || !empty($production_part4_h2)) {

            if (!empty($production_part4_switch1)) {
                $production_part4_q1 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part4_h1, $production_part4_q1);
            } else {
                $production_part4_q1 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part4_h1, $production_part4_q1);
            }

            if (!empty($production_part4_switch2)) {
                $production_part4_q2 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part4_h2, $production_part4_q2);
            } else {
                $production_part4_q2 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part4_h2, $production_part4_q2);
            }
        } else {
            if (!empty($production_part4_switch1)) {
                $production_part4_q1 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '1');
                $production_part4_h1 = $this->products_model->insert_into('product_question', $production_part4_q1);
            } else {
                $production_part4_q1 = array('question_id' => '24', 'product_id' => $product_id, 'answer' => '0');
                $production_part4_h1 = $this->products_model->insert_into('product_question', $production_part4_q1);
            }

            if (!empty($production_part4_switch2)) {
                $production_part4_q2 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '1');
                $production_part4_h2 = $this->products_model->insert_into('product_question', $production_part4_q2);
            } else {
                $production_part4_q2 = array('question_id' => '25', 'product_id' => $product_id, 'answer' => '0');
                $production_part4_h2 = $this->products_model->insert_into('product_question', $production_part4_q2);
            }

            // ------------------------------------------------------------------------

            $decode_json = array();
            $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

            if ($product_new_data['production_complete'] != '') {
                $decode_json = json_decode($product_new_data['production_complete'], true);
                $decode_json['part_4'] = '20';
                $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                    $decode_json['part_4'], $decode_json['part_5']));
            } else {
                $decode_json['part_1'] = '0';
                $decode_json['part_2'] = '0';
                $decode_json['part_3'] = '0';
                $decode_json['part_4'] = '20';
                $decode_json['part_5'] = '0';
                $complete_bar_no = '20';
            }

            $encode_json = json_encode($decode_json);
            $this->products_model->update_into('products_new', $product_id, array('production_complete' => $encode_json));

            // ------------------------------------------------------------------------

            echo json_encode(
                    array(
                        'production_part4_1' => $production_part4_h1,
                        'production_part4_2' => $production_part4_h2,
                        'status' => 'success',
                        'complete_bar_no' => $complete_bar_no,
                        'qry' => $this->db->last_query()
                    )
            );
        }
    }

    public function production_part5() {
        $product_id = $this->input->post('product_id');
        $production_part5_notes1 = $this->input->post('production_part5_notes1');
        $production_part5_switch1 = $this->input->post('production_part5_switch1');
        $production_part5_switch2 = $this->input->post('production_part5_switch2');

        $production_part5_h1 = $this->input->post('production_part5_h1');
        $production_part5_h2 = $this->input->post('production_part5_h2');

        if (!empty($production_part5_h1) || !empty($productio_part5_h2)) {
            if (!empty($production_part5_switch1)) {
                $production_part5_q1 = array('question_id' => '26', 'product_id' => $product_id, 'answer' => '1', 'notes' => $production_part5_notes1);
                $this->products_model->update_into('product_question', $production_part5_h1, $production_part5_q1);
            } else {
                $production_part5_q1 = array('question_id' => '26', 'product_id' => $product_id, 'answer' => '0', 'notes' => $production_part5_notes1);
                $this->products_model->update_into('product_question', $production_part5_h1, $production_part5_q1);
            }

            if (!empty($production_part5_switch2)) {
                $production_part5_q2 = array('question_id' => '27', 'product_id' => $product_id, 'answer' => '1');
                $this->products_model->update_into('product_question', $production_part5_h2, $production_part5_q2);
            } else {
                $production_part5_q2 = array('question_id' => '27', 'product_id' => $product_id, 'answer' => '0');
                $this->products_model->update_into('product_question', $production_part5_h2, $production_part5_q2);
            }
        } else {
            if (!empty($production_part5_switch1)) {
                $production_part5_q1 = array('question_id' => '26', 'product_id' => $product_id, 'answer' => '1', 'notes' => $production_part5_notes1);
                $production_part5_h1 = $this->products_model->insert_into('product_question', $production_part5_q1);
            } else {
                $production_part5_q1 = array('question_id' => '26', 'product_id' => $product_id, 'answer' => '0', 'notes' => $production_part5_notes1);
                $production_part5_h1 = $this->products_model->insert_into('product_question', $production_part5_q1);
            }

            if (!empty($production_part5_switch2)) {
                $production_part5_q2 = array('question_id' => '27', 'product_id' => $product_id, 'answer' => '1');
                $production_part5_h2 = $this->products_model->insert_into('product_question', $production_part5_q2);
            } else {
                $production_part5_q2 = array('question_id' => '27', 'product_id' => $product_id, 'answer' => '0');
                $production_part5_h2 = $this->products_model->insert_into('product_question', $production_part5_q2);
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['production_complete'] != '') {
            $decode_json = json_decode($product_new_data['production_complete'], true);
            $decode_json['part_5'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '0';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '20';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('production_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(
                array(
                    'production_part5_1' => $production_part5_h1,
                    'production_part5_2' => $production_part5_h2,
                    'status' => 'success',
                    'complete_bar_no' => $complete_bar_no,
                    'qry' => $this->db->last_query()
                )
        );
    }

    // ------------------------------ // END PRODUCTION TAB FORM ------------------------------------------
    // ------------------------------ START PRODUCT ATTCHMENT AND NOTES ------------------------------------------

    /**
     * function delete_selected_attachemnt() used to delete attachments tab attachments.
     *
     * @return string
     * @author Parth,Anil
     * */
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
        if ($this->input->post('tab')) {
            $tab = $this->input->post('tab');
        } else {
            $tab = "attachments";
        }
        if ($_FILES['file']['name']) {
            if (!$this->upload->do_upload('file')) {
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
            'tab' => $tab
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

    public function delete_selected_attachemnt() {
        $data_append = '';
        if (!empty($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->db->where_in('id', $ids);
            $tab = "attachment";
            if ($this->db->delete('products_attachments')) {

                $prod_id = $_POST['pid'];
                $data['product_attachment'] = $this->products_model->getfrom('products_attachments', false, array('where' => array('product_id' => $prod_id, 'tab' => 'attachments')));

                foreach ($data['product_attachment'] as $temp) {
                    $data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]' id='chk_attachment' class='chk_notes' value=" . $temp['id'] . "><a  class='no_preview'  href=uploads/products/" . $temp['attachment'] . ">" . $temp['attachment'] . "</a></li>";
                }
                $response = array('data1' => $data_append, 'status' => 'success');
            } else {
                $response = array('status' => 'fail');
            }
        }

        echo json_encode($response);
        die();
    }

    public function delete_selected_notes() {
        $notes_data_append = '';
        if (!empty($_POST['ids'])) {
            $ids = $_POST['ids'];
            $this->db->where_in('id', $ids);
            if ($this->db->delete('products_notes')) {

                $prod_id = $_POST['pid'];
                // $data['product_notes'] = $this->products_model->get_product_notes_id($_POST['pid']);
                $data['product_notes'] = $this->products_model->getfrom('products_notes', false, array('where' => array('product_id' => $prod_id)));

                foreach ($data['product_notes'] as $temp) {
                    $notes_data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]'' id='chk_attachment' class='chk_notes' value=" . $temp['id'] . "><a data-desc=" . $temp['description'] . " class='notes_link' id=" . $temp['id'] . " href='javascript::void(0)'>" . $temp['notes'] . "</a><span style='margin-left:60px'>" . $temp['created_date'] . "</span></li>";
                }
                $response = array('notes_data' => $notes_data_append, 'status' => 'success');
            } else {
                $response = array('status' => 'fail');
            }
        }

        echo json_encode($response);
        die();
    }

    public function delete_production_tab_selected_attachemnt() {
        $data_append = '';
        if (!empty($_POST['ids'])) {
            $ids = $_POST['ids'];
            $tab = "production";
            $this->db->where_in('id', $ids);
            if ($this->db->delete('products_attachments')) {
                $data['product_attachment'] = $this->products_model->get_product_attachment_id($_POST['pid'], $tab);

                foreach ($data['product_attachment'] as $temp) {
                    $data_append.="<li style=list-style-type:none;><input type='checkbox' name='chk[]' id='chk_production_attachment' class='chk_notes' value=" . $temp->id . "><a  class='no_preview'  href=uploads/products/" . $temp->attachment . ">" . $temp->attachment . "</a></li>";
                }
                $response = array('data1' => $data_append, 'status' => 'success');
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
     * function marketing_part uses to save data like cost,supplier name,generated UPC Code,Notes
     *
     * @return array
     * @author Parth,Anil
     * */
    public function marketing_part1() {

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

        if (!empty($marketing_part1_1) || !empty($marketing_part1_2) || !empty($marketing_part1_3) ||
                !empty($marketing_part1_4) || !empty($marketing_part1_5) || !empty($marketing_part1_6)) {

            $modified_date = date("Y-m-d H:i:s");

            $marketing_part1_title = array('product_id' => $product_id, 'en_title' => $product_name_en, 'fr_title' => $product_name_fr, 'part' => 'title', 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_1', $marketing_part1_1, $marketing_part1_title);

            $marketing_part1_highlight1 = array('product_id' => $product_id, 'en_title' => $product_highlight1_en, 'fr_title' => $product_highlight1_fr, 'part' => 'highlight', 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_1', $marketing_part1_2, $marketing_part1_highlight1);

            $marketing_part1_highlight2 = array('product_id' => $product_id, 'en_title' => $product_highlight2_en, 'fr_title' => $product_highlight2_fr, 'part' => 'highlight', 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_1', $marketing_part1_3, $marketing_part1_highlight2);

            $marketing_part1_highlight3 = array('product_id' => $product_id, 'en_title' => $product_highlight3_en, 'fr_title' => $product_highlight3_fr, 'part' => 'highlight', 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_1', $marketing_part1_4, $marketing_part1_highlight3);

            $marketing_part1_paragraph = array('product_id' => $product_id, 'en_title' => $product_paragraph_en, 'fr_title' => $product_paragraph_fr, 'part' => 'paragraph', 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_1', $marketing_part1_5, $marketing_part1_paragraph);

            $marketing_part1_introduction = array('product_id' => $product_id, 'en_title' => $product_introduction_en, 'fr_title' => $product_introduction_fr, 'part' => 'introduction', 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_1', $marketing_part1_6, $marketing_part1_introduction);
        } else {
            $marketing_part1_title = array('product_id' => $product_id, 'en_title' => $product_name_en, 'fr_title' => $product_name_fr, 'part' => 'title');
            $marketing_part1_1 = $this->products_model->insert_into('products_marketing_part_1', $marketing_part1_title);

            $marketing_part1_highlight1 = array('product_id' => $product_id, 'en_title' => $product_highlight1_en, 'fr_title' => $product_highlight1_fr, 'part' => 'highlight');
            $marketing_part1_2 = $this->products_model->insert_into('products_marketing_part_1', $marketing_part1_highlight1);

            $marketing_part1_highlight2 = array('product_id' => $product_id, 'en_title' => $product_highlight2_en, 'fr_title' => $product_highlight2_fr, 'part' => 'highlight');
            $marketing_part1_3 = $this->products_model->insert_into('products_marketing_part_1', $marketing_part1_highlight2);

            $marketing_part1_highlight3 = array('product_id' => $product_id, 'en_title' => $product_highlight3_en, 'fr_title' => $product_highlight3_fr, 'part' => 'highlight');
            $marketing_part1_4 = $this->products_model->insert_into('products_marketing_part_1', $marketing_part1_highlight3);

            $marketing_part1_paragraph = array('product_id' => $product_id, 'en_title' => $product_paragraph_en, 'fr_title' => $product_paragraph_fr, 'part' => 'paragraph');
            $marketing_part1_5 = $this->products_model->insert_into('products_marketing_part_1', $marketing_part1_paragraph);

            $marketing_part1_introduction = array('product_id' => $product_id, 'en_title' => $product_introduction_en, 'fr_title' => $product_introduction_fr, 'part' => 'introduction');
            $marketing_part1_6 = $this->products_model->insert_into('products_marketing_part_1', $marketing_part1_introduction);
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['marketing_complete'] != '') {
            $decode_json = json_decode($product_new_data['marketing_complete'], true);
            $decode_json['part_1'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '20';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '0';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('marketing_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(
                array(
                    'marketing_part1_1' => $marketing_part1_1,
                    'marketing_part1_2' => $marketing_part1_2,
                    'marketing_part1_3' => $marketing_part1_3,
                    'marketing_part1_4' => $marketing_part1_4,
                    'marketing_part1_5' => $marketing_part1_5,
                    'marketing_part1_6' => $marketing_part1_6,
                    'status' => 'success',
                    'complete_bar_no' => $complete_bar_no,
                    'qry' => $this->db->last_query()
                )
        );
    }

    public function marketing_part2() {
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



        if (!empty($marketing_part2_1) || !empty($marketing_part2_2) || !empty($marketing_part2_3) || !empty($marketing_part2_4) ||
                !empty($marketing_part2_5) || !empty($marketing_part2_6) || !empty($marketing_part2_7) || !empty($marketing_part2_8)) {
            $modified_date = date("Y-m-d H:i:s");

            $marketing_part2_title1 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title1, 'fr_title' => $marketing_part2_fr_title1, 'en_description' => $marketing_part2_en_desc1, 'fr_description' => $marketing_part2_fr_desc1, 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_2', $marketing_part2_1, $marketing_part2_title1);

            $marketing_part2_title2 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title2, 'fr_title' => $marketing_part2_fr_title2, 'en_description' => $marketing_part2_en_desc2, 'fr_description' => $marketing_part2_fr_desc2, 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_2', $marketing_part2_2, $marketing_part2_title2);

            $marketing_part2_title3 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title3, 'fr_title' => $marketing_part2_fr_title3, 'en_description' => $marketing_part2_en_desc3, 'fr_description' => $marketing_part2_fr_desc3, 'modified_date' => $modified_date);
            $this->products_model->update_into('products_marketing_part_2', $marketing_part2_3, $marketing_part2_title3);

            if (!empty($marketing_part2_4)) {
                $marketing_part2_title4 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title4, 'fr_title' => $marketing_part2_fr_title4, 'en_description' => $marketing_part2_en_desc4, 'fr_description' => $marketing_part2_fr_desc4, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_2', $marketing_part2_4, $marketing_part2_title4);
            }

            if (!empty($marketing_part2_5)) {
                $marketing_part2_title5 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title5, 'fr_title' => $marketing_part2_fr_title5, 'en_description' => $marketing_part2_en_desc5, 'fr_description' => $marketing_part2_fr_desc5, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_2', $marketing_part2_5, $marketing_part2_title5);
            }

            if (!empty($marketing_part2_6)) {
                $marketing_part2_title6 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title6, 'fr_title' => $marketing_part2_fr_title6, 'en_description' => $marketing_part2_en_desc6, 'fr_description' => $marketing_part2_fr_desc6, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_2', $marketing_part2_6, $marketing_part2_title6);
            }

            if (!empty($marketing_part2_7)) {
                $marketing_part2_title7 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title7, 'fr_title' => $marketing_part2_fr_title7, 'en_description' => $marketing_part2_en_desc7, 'fr_description' => $marketing_part2_fr_desc7, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_2', $marketing_part2_7, $marketing_part2_title7);
            }

            if (!empty($marketing_part2_8)) {
                $marketing_part2_title8 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title8, 'fr_title' => $marketing_part2_fr_title8, 'en_description' => $marketing_part2_en_desc8, 'fr_description' => $marketing_part2_fr_desc8, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_2', $marketing_part2_8, $marketing_part2_title8);
            }
        } else {
            $marketing_part2_title1 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title1, 'fr_title' => $marketing_part2_fr_title1, 'en_description' => $marketing_part2_en_desc1, 'fr_description' => $marketing_part2_fr_desc1);
            $marketing_part2_1 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title1);

            $marketing_part2_title2 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title2, 'fr_title' => $marketing_part2_fr_title2, 'en_description' => $marketing_part2_en_desc2, 'fr_description' => $marketing_part2_fr_desc2);
            $marketing_part2_2 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title2);

            $marketing_part2_title3 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title3, 'fr_title' => $marketing_part2_fr_title3, 'en_description' => $marketing_part2_en_desc3, 'fr_description' => $marketing_part2_fr_desc3);
            $marketing_part2_3 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title3);

            //if(!empty($marketing_part2_en_title4) && !empty($marketing_part2_fr_title4) && !empty($marketing_part2_en_desc4) && !empty($marketing_part2_fr_desc4)){
            $marketing_part2_title4 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title4, 'fr_title' => $marketing_part2_fr_title4, 'en_description' => $marketing_part2_en_desc4, 'fr_description' => $marketing_part2_fr_desc4);
            $marketing_part2_4 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title4);
            //}
            //if(!empty($marketing_part2_en_title5) && !empty($marketing_part2_fr_title5) && !empty($marketing_part2_en_desc5) && !empty($marketing_part2_fr_desc5)){
            $marketing_part2_title5 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title5, 'fr_title' => $marketing_part2_fr_title5, 'en_description' => $marketing_part2_en_desc5, 'fr_description' => $marketing_part2_fr_desc5);
            $marketing_part2_5 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title5);
            //}
            //if(!empty($marketing_part2_en_title6) && !empty($marketing_part2_fr_title6) && !empty($marketing_part2_en_desc6) && !empty($marketing_part2_fr_desc6)){
            $marketing_part2_title6 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title6, 'fr_title' => $marketing_part2_fr_title6, 'en_description' => $marketing_part2_en_desc6, 'fr_description' => $marketing_part2_fr_desc6);
            $marketing_part2_6 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title6);
            //}
            //if(!empty($marketing_part2_en_title7) && !empty($marketing_part2_fr_title7) && !empty($marketing_part2_en_desc7) && !empty($marketing_part2_fr_desc7)){
            $marketing_part2_title7 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title7, 'fr_title' => $marketing_part2_fr_title7, 'en_description' => $marketing_part2_en_desc7, 'fr_description' => $marketing_part2_fr_desc7);
            $marketing_part2_7 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title7);
            //}
            //if(!empty($marketing_part2_en_title8) && !empty($marketing_part2_fr_title8) && !empty($marketing_part2_en_desc8) && !empty($marketing_part2_fr_desc8)){
            $marketing_part2_title8 = array('product_id' => $product_id, 'en_title' => $marketing_part2_en_title8, 'fr_title' => $marketing_part2_fr_title8, 'en_description' => $marketing_part2_en_desc8, 'fr_description' => $marketing_part2_fr_desc8);
            $marketing_part2_8 = $this->products_model->insert_into('products_marketing_part_2', $marketing_part2_title8);
            //}
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['marketing_complete'] != '') {
            $decode_json = json_decode($product_new_data['marketing_complete'], true);
            $decode_json['part_2'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '0';
            $decode_json['part_2'] = '20';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '0';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('marketing_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(
                array(
                    'marketing_part2_1' => $marketing_part2_1,
                    'marketing_part2_2' => $marketing_part2_2,
                    'marketing_part2_3' => $marketing_part2_3,
                    'marketing_part2_4' => $marketing_part2_4,
                    'marketing_part2_5' => $marketing_part2_5,
                    'marketing_part2_6' => $marketing_part2_6,
                    'marketing_part2_7' => $marketing_part2_7,
                    'marketing_part2_8' => $marketing_part2_8,
                    'status' => 'success',
                    'complete_bar_no' => $complete_bar_no,
                    'qry' => $this->db->last_query()
                )
        );
    }

    public function marketting_part_3() {

        $switch_ans = $_POST['check_list'];
        $switch_txt_description = $_POST['txt_list'];
        if ($this->input->post('hdn_marketting_part_3') != '') {
            $product_id = $this->input->post('hdn_marketting_part_3');
        } else {
            $product_id = '';
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
                'product_id' => $product_id,
                'answer' => $val,
                'notes' => $notes,
            );
            if (!empty($_POST['update_marketting'])) {
                $result = $this->products_model->update_question_ans_3($data, $key, $product_id);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }
            } else {
                $result = $this->products_model->add_question_ans_3($data, TRUE);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['marketing_complete'] != '') {
            $decode_json = json_decode($product_new_data['marketing_complete'], true);
            $decode_json['part_3'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '0';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '20';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '0';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('marketing_complete' => $encode_json));

        // ------------------------------------------------------------------------

        $response['complete_bar_no'] = $complete_bar_no;

        echo json_encode($response);
        die();
    }

    public function marketting_part_4() {

        $switch_ans = $_POST['check_list'];

        if ($this->input->post('hdn_marketting_part_4') != '') {
            $product_id = $this->input->post('hdn_marketting_part_4');
        } else {
            $product_id = '';
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
                'product_id' => $product_id,
                'answer' => $val,
                'notes' => $notes,
            );

            if (!empty($_POST['update_marketting_part_4'])) {
                $result = $this->products_model->update_question_ans_4($data, $key, $product_id);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }
            } else {
                $result = $this->products_model->add_question_ans_4($data, TRUE);
                if ($result) {
                    $response = array('status' => 'success');
                } else {
                    $response = array('status' => 'fail');
                }
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['marketing_complete'] != '') {
            $decode_json = json_decode($product_new_data['marketing_complete'], true);
            $decode_json['part_4'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '0';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '20';
            $decode_json['part_5'] = '0';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('marketing_complete' => $encode_json));

        // ------------------------------------------------------------------------

        $response['complete_bar_no'] = $complete_bar_no;

        echo json_encode($response);
        die();
    }

    public function marketing_part5() {
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

        if (!empty($marketing_part5_1)) {
            $modified_date = date("Y-m-d H:i:s");
            if (!empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '1', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '1', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_5', $marketing_part5_1, $marketing_part5_data);
            } else if (!empty($marketing_part5_switch1) && empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '1', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '0', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_5', $marketing_part5_1, $marketing_part5_data);
            } else if (empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '0', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '1', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_5', $marketing_part5_1, $marketing_part5_data);
            } else if (empty($marketing_part5_switch1) && empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '0', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '0', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1, 'modified_date' => $modified_date);
                $this->products_model->update_into('products_marketing_part_5', $marketing_part5_1, $marketing_part5_data);
            }
        } else {
            if (!empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '1', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '1', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1);
                $marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5', $marketing_part5_data);
            } else if (!empty($marketing_part5_switch1) && empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '1', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '0', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1);
                $marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5', $marketing_part5_data);
            } else if (empty($marketing_part5_switch1) && !empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '0', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '1', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1);
                $marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5', $marketing_part5_data);
            } else if (empty($marketing_part5_switch1) && empty($marketing_part5_switch2)) {
                $marketing_part5_data = array('product_id' => $product_id, 'display_used' => '0', 'cost1' => $marketing_part5_cost1, 'supplier1' => $marketing_part5_supplier1, 'upc1' => $marketing_part5_upc1, 'plv_store_used' => '0', 'cost2' => $marketing_part5_cost2, 'supplier2' => $marketing_part5_supplier2, 'upc2' => $marketing_part5_upc2, 'notes1' => $marketing_part5_notes1);
                $marketing_part5_1 = $this->products_model->insert_into('products_marketing_part_5', $marketing_part5_data);
            }
        }

        // ------------------------------------------------------------------------

        $decode_json = array();
        $product_new_data = $this->products_model->getfrom('products_new', false, array('where' => array('id' => $product_id)), array('single' => true));

        if ($product_new_data['marketing_complete'] != '') {
            $decode_json = json_decode($product_new_data['marketing_complete'], true);
            $decode_json['part_5'] = '20';
            $complete_bar_no = array_sum(array($decode_json['part_1'], $decode_json['part_2'], $decode_json['part_3'],
                $decode_json['part_4'], $decode_json['part_5']));
        } else {
            $decode_json['part_1'] = '0';
            $decode_json['part_2'] = '0';
            $decode_json['part_3'] = '0';
            $decode_json['part_4'] = '0';
            $decode_json['part_5'] = '20';
            $complete_bar_no = '20';
        }

        $encode_json = json_encode($decode_json);
        $this->products_model->update_into('products_new', $product_id, array('marketing_complete' => $encode_json));

        // ------------------------------------------------------------------------

        echo json_encode(
                array(
                    'marketing_part5_1' => $marketing_part5_1,
                    'status' => 'success',
                    'qry' => $this->db->last_query(),
                    'complete_bar_no' => $complete_bar_no
                )
        );
    }

    //----------------------------------------------------------------------------------------------------------------
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
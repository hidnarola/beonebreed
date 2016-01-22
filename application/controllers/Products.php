<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        // $data['barcodes'] = $this->barcode_model->get_all();
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
     * function generate_upc_ean for generate product code which is unassigned to any product
     * Formula for generate product code is short name of category follwed by last 4 number of UPC number
     *
     * @return String
     * @author Virendra
     * */
    public function generate_upc_ean() {

        $cat_id = $this->input->post('cat_id');

        //get all bracode which is not assigned
        $barcodes = $this->barcode_model->get_all(array('id NOT IN (SELECT barcode_id from products_new)' => null));

        //slice string into last 4 number 
        $random_barcode = $barcodes[array_rand($barcodes)];
        $last_four_characters = substr($random_barcode['upc'], 8);
        $product_code = $cat_id . $last_four_characters;

        $random_barcode['product_code'] = $product_code;

        echo json_encode($random_barcode);
    }

    /**
     * function admin_form_tab_1() for save Admin Tab-1 Form Data
     *
     * @return string
     * @author Virendra patel - Spark id -vpa
     * */
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
            $this->products_model->update($product_id, $data_admin_part_1);
        } else {
            $product_id = $this->products_model->insert($data_admin_part_1);
        }

        echo json_encode(array('product_id' => $product_id));
    }

    /**
     * function admin_form_tab_1() for save Admin Tab-1 Form Data
     *
     * @return string
     * @author Virendra patel - Spark id -vpa
     * */
    public function marketting_part_3() {
        $switch_ans = $_POST['check_list'];
        $switch_txt_description = $_POST['txt_list'];
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
                'product_id' => '1',
                'answer' => $val,
                'notes' => $notes,
            );
            if ($this->products_model->add_question_ans($data, TRUE)) {
                $response = array('status' => 'success');
                
            } else {
                $response = array('status' => 'fail');
                
            }
            
        }
        echo json_encode($response);die();
    }

    /**
     * function admin_form_tab_2() for save Admin Tab-2 Form Data
     *
     * @return string
     * @author Virendra patel - Spark id -vpa
     * */
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
            $this->products_model->update_into('dimension', $product_master_id, $data_master);
        } else {
            $product_master_id = $this->products_model->insert_into('dimension', $data_master);
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
            $this->products_model->update_into('dimension', $product_pallet_id, $data_pallet);
        } else {
            $product_pallet_id = $this->products_model->insert_into('dimension', $data_pallet);
        }

        echo json_encode(
                array(
                    'product_retail_id' => $product_retail_id,
                    'product_master_id' => $product_master_id,
                    'product_pallet_id' => $product_pallet_id,
                    'qry' => $this->db->last_query()
                )
        );
    }

    /**
     * function admin_form_tab_2() for save Admin Tab-2 Form Data
     *
     * @return string
     * @author Virendra patel - Spark id -vpa
     * */
    public function admin_form_tab_3() {

        p($_POST);
    }

    // Generate UPC NO  
    public function upc_get() {
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
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
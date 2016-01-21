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
     * function admin_form_tab_2() for save Admin Tab-2 Form Data
     *
     * @return string
     * @author Virendra patel - Spark id -vpa
     * */
    public function admin_form_tab_2() {

        p($_POST);
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
     public function product_notes(){
         
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
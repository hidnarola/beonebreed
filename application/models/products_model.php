<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {

    public $table = 'products_new';

    public function insert($data) {
        $table = $this->table;
        $this->db->insert($table, $data);
        $id = $this->db->insert_id(); // fetch last inserted id in table
        return $id;
    }

    public function update($id = null, $data) {

        $table = $this->table;

        if (is_array($id)) {
            $this->db->where($id);
        } else {
            $this->db->where('id', $id);
        }
        $this->db->update($table, $data);
        $update_id = $this->db->affected_rows(); // fetch affected rown in table.
        return $update_id;
    }

    public function delete($id) {
        $table = $this->table;
        if (is_array($id)) {
            $this->db->where($id);
        } else {
            $this->db->where(array('id' => $id));
        }
        $this->db->delete($table);
    }

    public function get($select = null, $where = null, $options = null) {

        $table = $this->table;

        if (!empty($select)) {
            $this->db->select($select);
        }

        $this->db->from($table);

        /* Check wheather where conditions is required or not. */
        if (!empty($where)) {

            if (is_array($where)) {
                $check_where = array(
                    'where',
                    'or_where',
                    'where_in',
                    'or_where_in',
                    'where_not_in',
                    'or_where_not_in',
                    'like', 'or_like',
                    'not_like',
                    'or_not_like'
                );

                foreach ($where as $key => $value) {
                    if (in_array($key, $check_where)) {

                        foreach ($value as $k => $v) {
                            if (in_array($key, array('like', 'or_like', 'not_like', 'or_not_like'))) {
                                $check = 'both';
                                if ($v[0] == '%') {
                                    $check = 'before';
                                    $v = ltrim($v, '%');
                                } else if ($v[strlen($v) - 1] == '%') {
                                    $check = 'after';
                                    $v = rtrim($v, '%');
                                }
                                $this->db->$key($k, $v, $check);
                            } else {
                                $this->db->$key($k, $v);
                            }
                        }
                    }
                }
            } else {
                //$this->db->where($where);
            }

            if (!empty($where['where_str'])) {

                // p($where['where_str'],true);
                foreach ($where['where_str'] as $w_str) {
                    $this->db->where($w_str, null, false);
                }
            }

            if (!empty($where['where_str_or'])) {
                foreach ($where['where_str_or'] as $w_str_or) {
                    $this->db->or_where($w_str_or, null, false);
                }
            }
        }

        /* Check fourth parameter is passed and process 4th param. */
        if (!empty($options) && is_array($options)) {
            $check_key = array('group_by', 'order_by');
            foreach ($options as $key => $value) {
                if (in_array($key, $check_key)) {
                    if (is_array($value)) {
                        foreach ($value as $k => $v) {
                            $this->db->$key($v);
                        }
                    } else {
                        $this->db->$key($value);
                    }
                }
            }
        }

        /* Check query needs to limit or not.  */
        if (isset($options['limit']) && !empty($options['limit']) && isset($options['offset']) && !empty($options['offset'])) {
            $this->db->limit($options['limit'], $options['offset']);
        } else if (isset($options['limit'])) {
            $this->db->limit($options['limit']);
        }

        /* Check tables need to join or not */
        if (isset($options['join']) && !empty($options['join'])) {
            foreach ($options['join'] as $join) {
                if (!isset($join['join']))
                    $join['join'] = 'left';
                $this->db->join($join['table'], $join['condition'], $join['join']);
            }
        }

        $method = 'result_array';
        /* Check wheather return only single row or not. */
        if (isset($options) && ((!is_array($options) && $options == true) || (isset($options['single']) && $options['single'] == true ))) {
            $method = 'row_array';
        }

        /* Check to return only count or full data */
        if (isset($options['count']) && $options['count'] == true) {
            return $this->db->count_all_results();
        } else {
            return $this->db->get()->$method();
        }
    }

    public function getfrom($table, $select = null, $where = null, $options = null) {


        if (!empty($select)) {
            $this->db->select($select);
        }

        $this->db->from($table);

        /* Check wheather where conditions is required or not. */
        if (!empty($where)) {

            if (is_array($where)) {
                $check_where = array(
                    'where',
                    'or_where',
                    'where_in',
                    'or_where_in',
                    'where_not_in',
                    'or_where_not_in',
                    'like', 'or_like',
                    'not_like',
                    'or_not_like'
                );

                foreach ($where as $key => $value) {
                    if (in_array($key, $check_where)) {

                        foreach ($value as $k => $v) {
                            if (in_array($key, array('like', 'or_like', 'not_like', 'or_not_like'))) {
                                $check = 'both';
                                if ($v[0] == '%') {
                                    $check = 'before';
                                    $v = ltrim($v, '%');
                                } else if ($v[strlen($v) - 1] == '%') {
                                    $check = 'after';
                                    $v = rtrim($v, '%');
                                }
                                $this->db->$key($k, $v, $check);
                            } else {
                                $this->db->$key($k, $v);
                            }
                        }
                    }
                }
            } else {
                //$this->db->where($where);
            }

            if (!empty($where['where_str'])) {

                // p($where['where_str'],true);
                foreach ($where['where_str'] as $w_str) {
                    $this->db->where($w_str, null, false);
                }
            }

            if (!empty($where['where_str_or'])) {
                foreach ($where['where_str_or'] as $w_str_or) {
                    $this->db->or_where($w_str_or, null, false);
                }
            }
        }

        /* Check fourth parameter is passed and process 4th param. */
        if (!empty($options) && is_array($options)) {
            $check_key = array('group_by', 'order_by');
            foreach ($options as $key => $value) {
                if (in_array($key, $check_key)) {
                    if (is_array($value)) {
                        foreach ($value as $k => $v) {
                            $this->db->$key($v);
                        }
                    } else {
                        $this->db->$key($value);
                    }
                }
            }
        }

        /* Check query needs to limit or not.  */
        if (isset($options['limit']) && !empty($options['limit']) && isset($options['offset']) && !empty($options['offset'])) {
            $this->db->limit($options['limit'], $options['offset']);
        } else if (isset($options['limit'])) {
            $this->db->limit($options['limit']);
        }

        /* Check tables need to join or not */
        if (isset($options['join']) && !empty($options['join'])) {
            foreach ($options['join'] as $join) {
                if (!isset($join['join']))
                    $join['join'] = 'left';
                $this->db->join($join['table'], $join['condition'], $join['join']);
            }
        }

        $method = 'result_array';
        /* Check wheather return only single row or not. */
        if (isset($options) && ((!is_array($options) && $options == true) || (isset($options['single']) && $options['single'] == true ))) {
            $method = 'row_array';
        }

        /* Check to return only count or full data */
        if (isset($options['count']) && $options['count'] == true) {
            return $this->db->count_all_results();
        } else {
            return $this->db->get()->$method();
        }
    }

    public function getfromtable($table, $id) {

        if (is_array($id)) {
            $this->db->where($id);
        } else {
            $this->db->where('id', $id);
        }
        return $this->db->get($table)->row_array();
    }

    // ---------------------------------------------------------------------------------------------------------

    /* For Insert into Attachment tab with product Data */
    public function insert_into($table, $data) {
        $this->db->insert($table, $data);
        $id = $this->db->insert_id(); // fetch last inserted id in table
        return $id;
    }

    /* For inserting attachment data */

    public function insert_attachment($data) {
        $id = $this->db->insert('products_attachments', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    //for inserting notes
    public function add_notes_records($data) {
        $id = $this->db->insert('products_notes', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }

    public function update_into($table, $id = null, $data) {

        if (is_array($id)) {
            $this->db->where($id);
        } else {
            $this->db->where('id', $id);
        }
        $this->db->update($table, $data);
        $update_id = $this->db->affected_rows(); // fetch affected rown in table.
        return $update_id;
    }

    public function get_question_part_3() {

        $this->db->where('part', '3');
        $this->db->where('tab', 'marketting');
        $query = $this->db->get('question_master');
        return $query->result();
    }

    public function get_question_part_4() {
        $this->db->where('part', '4');
        $this->db->where('tab', 'marketting');
        $query = $this->db->get('question_master');
        return $query->result();
    }

    public function add_question_ans_3($data) {
        $id = $this->db->insert('product_question', $data);
        return $id;
    }

    public function update_question_ans_3($data, $question_id, $product_id) {

        $this->db->where('question_id', $question_id);
        $this->db->where('product_id', $product_id);
        return $this->db->update('product_question', $data);
    }

    public function update_question_ans_4($data, $question_id, $product_id) {

        $this->db->where('question_id', $question_id);
        $this->db->where('product_id', $product_id);
        return $this->db->update('product_question', $data);
    }

    public function add_question_ans_4($data) {
        $id = $this->db->insert('product_question', $data);
        return $id;
    }

    /**
     * This returns attachment_data as per paricular product_id
     *
     * @param  $data as integer
     * @return  return object
     */
    public function get_product_attachment_id($data, $tab) {
        $query = $this->db->where(array('product_id' => $data, 'tab' => $tab))->get('products_attachments');
        return $query->result();
    }

    /**
     * This returns notesdata as per paricular product_id
     *
     * @param  $data as integer
     * @return  return object
     */
    public function get_product_notes_id($data) {
        $query = $this->db->where('product_id', $data)->get('products_notes');
        return $query->result();
    }

    public function deletefrom($table, $id = null) {
        if (is_array($id)) {
            $this->db->where($id);
        } else {
            $this->db->where('id', $id);
        }

        $this->db->delete($table);
        return '1';
    }

    public function delete_records($id) {
        $this->delete_records_by_product_id($id);
        $this->db->where('id', $id);
        return $this->db->delete('products_new');
    }

    public function delete_records_by_product_id($id) {
        $tables = array('dimension', 'products_attachments', 'products_marketing_part_1', 'products_marketing_part_2', 'products_marketing_part_5', 'products_notes', 'products_sample', 'products_suppliers', 'product_question');
        foreach ($tables as $table) {
            $this->db->where('product_id', $id);
            $q = $this->db->get($table);
            if ($q->num_rows() > 0) {
                $this->db->where('product_id', $id);
                $this->db->delete($table);
            }
        }
    }

    /**
     * This returns all products data
     *
     * @param  $data as none
     * @return  return object
     */
    public function get_all_products() {
        $this->db->select("products_new.id as p_id,products_new.*,categories.name,bar_code.*, `pa`.`attachment` as `profile_image`");
        $this->db->from('products_new');
        $this->db->join('categories', 'products_new.category_id=categories.id');
        $this->db->join('bar_code', 'products_new.barcode_id=bar_code.id');
        $this->db->join('products_attachments pa', "pa.product_id = products_new.id");
       // $this->db->group_by('products_new.id');
        $query = $this->db->get();
        return $query->result();
    }

    // public function get_all_category_by_product(){
    // 	$query = $this->db->get('categories');
    // 	return $query->result();
    // }

    public function get_all_products_by_id($pid) {
        $this->db->select('products_new.id as p_id,products_new.description as p_desc,products_new.*,categories.name,bar_code.id as b_id,bar_code.*,product_brand.*');
        $this->db->where('products_new.id', $pid);
        $this->db->from('products_new');
        $this->db->join('categories', 'products_new.category_id=categories.id');
        $this->db->join('bar_code', 'products_new.barcode_id=bar_code.id');
        $this->db->join('product_brand', 'products_new.brand_id=product_brand.id');
        $query = $this->db->get();
        return $query->result_array();
    }

}

/* End of file Products_model.php */
/* Location: ./application/models/Products_model.php */
<?php

/**
 * 	Print array/string.
 * 	@param - data  = data that you want to print
 * 	@param -is_die = if true. Excecution will stop after print. 
 * @author = Virendra Patel - VPA
 * 	@modified = Sandip Gopani (SAG)
 */
function p($data, $is_die = false) {

    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    } else {
        echo $data;
    }

    if ($is_die)
        die;
}

function exists($string) {
    if ($string != '') {
        return $string;
    }
    return '';
}

/**
 * function will return alert box with alert alert-danger class and mostly used for indivisual error in form validation
 * @return String
 * @author Virendra Patel - Sparks ID-VPA
 * */
function myform_error($field) {

    $error = form_error($field);
    $str = '';
    if (!empty($error)) {
        $str .= '<div class="alert alert-danger">' . strip_tags($error, '') . '</div>';
    }
    return $str;
}

function myflash_message($field, $class = '') {

    $CI = & get_instance();
    $error = $CI->session->flashdata($field);

    if (empty($class)) {
        $class = 'danger';
    } else {
        $class = 'success';
    }

    $str = '';
    if (!empty($error)) {
        $str .= '<div class="alert alert-' . $class . '">' . strip_tags($error, '') . '</div>';
    }
    return $str;
}

/**
 * This function simply return output of sql_select function of common_model.  
 * This is just to simplify function call.
 * @author = Sandip Gopani (SAG)
 */
function select($table, $select = null, $where = null, $options = null) {
    $CI = & get_instance();
    return $CI->common_model->sql_select($table, $select, $where, $options);
}

/**
 * This function simply return output of update function of common_model.  
 * This is just to simplify function call.
 * @author = Sandip Gopani (SAG)
 */
function update($table, $id = null, $data) {
    $CI = & get_instance();
    return $CI->common_model->update($table, $id, $data);
}

/**
 * This function simply return output of insert function of common_model.  
 * This is just to simplify function call.
 * @author = Sandip Gopani (SAG)
 */
function insert($table, $data) {
    $CI = & get_instance();
    return $CI->common_model->insert($table, $data);
}

/**
 * This function simply return output of insert function of common_model.  
 * This is just to simplify function call.
 * @author = Sandip Gopani (SAG)
 */
function fetch_notes($app_id) {
    $CI = & get_instance();
    return $CI->common_model->fetch_notes_model($app_id);
}

/**
 * This function simply return output of delete function of common_model.  
 * This is just to simplify function call.
 * @author = Sandip Gopani (SAG)
 */
function delete($table, $id) {
    $CI = & get_instance();
    return $CI->common_model->delete($table, $id);
}

/**
 * This function simply return output of delete_all function of common_model.  
 * This is just to simplify function call.
 * @author = Virendra Patel (vpa)
 */
function delete_all($table) {
    $CI = & get_instance();
    return $CI->common_model->delete_all($table, $id);
}

/**
 * This function simply print last executed query
 * @bool = boolean execution stopped if true 
 * @author = Sandip Gopani (SAG)
 */
function qry($bool = false) {
    $CI = & get_instance();
    echo $CI->db->last_query();
    if ($bool)
        die;
}

/**
 * This function simply check user is loggedin or not 
 * @author = VPA
 */
function is_loggedin() {
    $CI = & get_instance();
    return $CI->session->userdata('loggedin');
}

function pagination_config() {

    $config['full_tag_open'] = '<div class="pagination"><ul>';
    $config['full_tag_close'] = '</ul></div>';

    $config['num_tag_open'] = '<li class="pagi">';
    $config['num_tag_close'] = '</li>';

    $config['first_link'] = 'First';
    $config['first_tag_open'] = '<li class="pagi">';
    $config['first_tag_close'] = '</li>';

    $config['cur_tag_open'] = '<li style="display:none"></li><li class="active"><a>';
    $config['cur_tag_close'] = '</a></li><li style="display:none"></li>';

    $config['prev_link'] = '<i class="fui-arrow-left"></i>';
    $config['prev_tag_open'] = '<li class="previous pagi">';
    $config['prev_tag_close'] = '</li><li style="display:none"></li>';

    $config['next_link'] = '<i class="fui-arrow-right"></i>';
    $config['next_tag_open'] = '<li style="display:none" ></li><li class="next pagi">';
    $config['next_tag_close'] = '</li><li style="display:none"></li>';

    $config['last_link'] = 'Last';
    $config['last_tag_open'] = '<li class="pagi">';
    $config['last_tag_close'] = '</li>';

    return $config;
}

function between($x, $min, $max) {
    $x = (int) $x; // Typecast into integer
    $min = (int) $min; // Typecast into integer
    $max = (int) $max;  // Typecast into integer

    if ($x >= $min && $x <= $max) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function wp_encode_emoji($content) {
    if (function_exists('mb_convert_encoding')) {
        $regex = '/(
             \x23\xE2\x83\xA3               # Digits
             [\x30-\x39]\xE2\x83\xA3
           | \xF0\x9F[\x85-\x88][\xA6-\xBF] # Enclosed characters
           | \xF0\x9F[\x8C-\x97][\x80-\xBF] # Misc
           | \xF0\x9F\x98[\x80-\xBF]        # Smilies
           | \xF0\x9F\x99[\x80-\x8F]
           | \xF0\x9F\x9A[\x80-\xBF]        # Transport and map symbols
        )/x';

        $matches = array();
        if (preg_match_all($regex, $content, $matches)) {
            if (!empty($matches[1])) {
                foreach ($matches[1] as $emoji) {
                    /*
                     * UTF-32's hex encoding is the same as HTML's hex encoding.
                     * So, by converting the emoji from UTF-8 to UTF-32, we magically
                     * get the correct hex encoding.
                     */
                    $unpacked = unpack('H*', mb_convert_encoding($emoji, 'UTF-32', 'UTF-8'));
                    if (isset($unpacked[1])) {
                        $entity = '&#x' . ltrim($unpacked[1], '0') . ';';
                        $content = str_replace($emoji, $entity, $content);
                    }
                }
            }
        }
    }

    return $content;
}

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

<?php 

/**
*	Print array/string.
*	@param - data  = data that you want to print
*	@param -is_die = if true. Excecution will stop after print. 
* @author = Virendra Patel - VPA
*	@modified = Sandip Gopani (SAG)
*/


function p($data, $is_die = false){

	if(is_array($data)){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}else{
		echo $data;
	}

	if($is_die)
	die;	
}


/**
 * function will return alert box with alert alert-danger class and mostly used for indivisual error in form validation
 * @return String
 * @author Virendra Patel - Sparks ID-VPA
 **/

function myform_error($field){
  
  $error = form_error($field);
  $str = '';
  if(!empty($error)){
    $str .= '<div class="alert alert-danger">'.strip_tags($error,'').'</div>';
  }
  return $str;
}


function myflash_message($field,$class=''){
  
  $CI =& get_instance();
  $error = $CI->session->flashdata($field);
  
  if(empty($class)){ $class = 'danger'; }else{ $class='success'; }

  $str = '';
  if(!empty($error)){
    $str .= '<div class="alert alert-'.$class.'">'.strip_tags($error,'').'</div>';
  }
  return $str;
}


/** 
* This function simply return output of sql_select function of common_model.  
* This is just to simplify function call.
* @author = Sandip Gopani (SAG)
*/
function select($table, $select = null, $where = null, $options = null){
	$CI =& get_instance();
	return $CI->common_model->sql_select($table, $select , $where , $options );
}	

/** 
* This function simply return output of update function of common_model.  
* This is just to simplify function call.
* @author = Sandip Gopani (SAG)
*/
function update($table, $id = null, $data){
	$CI =& get_instance();
	return $CI->common_model->update($table, $id, $data);
}

/** 
* This function simply return output of insert function of common_model.  
* This is just to simplify function call.
* @author = Sandip Gopani (SAG)
*/
function insert($table,$data){	
	$CI =& get_instance();
	return $CI->common_model->insert($table,$data);
}

/** 
* This function simply return output of insert function of common_model.  
* This is just to simplify function call.
* @author = Sandip Gopani (SAG)
*/
function fetch_notes($app_id){  
  $CI =& get_instance();
  return $CI->common_model->fetch_notes_model($app_id);
}

/** 
* This function simply return output of delete function of common_model.  
* This is just to simplify function call.
* @author = Sandip Gopani (SAG)
*/
function delete($table,$id){
	$CI =& get_instance();
	return $CI->common_model->delete($table,$id);
}

/** 
* This function simply return output of delete_all function of common_model.  
* This is just to simplify function call.
* @author = Virendra Patel (vpa)
*/
function delete_all($table){
  $CI =& get_instance();
  return $CI->common_model->delete_all($table,$id);
}


/**
* This function simply print last executed query
* @bool = boolean execution stopped if true 
* @author = Sandip Gopani (SAG)
*/
function qry($bool = false){
	$CI =& get_instance();
	echo $CI->db->last_query();
	if($bool)
	die;
}

/**
* This function simply check user is loggedin or not 
* @author = VPA
*/
function is_loggedin(){
	$CI =& get_instance();
	return $CI->session->userdata('loggedin');
}

function pagination_config(){

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


  function between($x,$min,$max){
    $x = (int)$x; // Typecast into integer
    $min = (int)$min; // Typecast into integer
    $max = (int)$max;  // Typecast into integer
        
     if($x >= $min && $x <= $max){
        return TRUE;
     }else{
        return FALSE;
     }
  }

  function android_categories(){
      
      $new_str = '';

      $new_str .='<option value="2">Books & Reference</option>';
      $new_str .= '<option value="6">Education</option>';
      $new_str .= '<option value="7">Entertainment</option>';
      $new_str .= '<option value="8">Finance</option>';
      $new_str .='<option value="9">Health & Fitness</option>';
      $new_str .='<option value="10">Lifestyle</option>';
      $new_str .= '<option value="11">Media & Video</option>';
      $new_str .='<option value="12">Medical</option>';
      $new_str .='<option value="13">Music & Audio</option>';
      $new_str .='<option value="14">News & Megazines</option>';
      $new_str .='<option value="15">Personalization</option>';
      $new_str .='<option value="16">Photography</option>';
      $new_str .='<option value="17">Productivity</option>';
      $new_str .='<option value="18">Shopping</option>';
      $new_str .='<option value="19">Social</option>';
      $new_str .='<option value="20">Sports</option>';
      $new_str .='<option value="21">Tools</option>';
      $new_str .='<option value="22">Transportation</option>';
      $new_str .='<option value="23">Travel & Local</option>';
      $new_str .='<option value="24">Weather</option>';
      $new_str .='<option value="25">Libraries & Demo</option>';
      $new_str .='<option value="26"> Arcade</option>';
      $new_str .='<option value="27">Puzzle</option>';
      $new_str .='<option value="28">Cards</option>';
      $new_str .='<option value="29">Casual</option>';
      $new_str .='<option value="30">Racing</option>';
      $new_str .='<option value="31">Sport Games</option>';
      $new_str .='<option value="32">Action</option>';
      $new_str .='<option value="33"> Adventure</option>';
      $new_str .='<option value="34">Board</option>';
      $new_str .='<option value="35">Casino</option>';
      $new_str .='<option value="36">Educational</option>';
      $new_str .='<option value="37">Family</option>';
      $new_str .='<option value="39">Music Games</option>';
      $new_str .='<option value="40">Role Playing</option>';
      $new_str .='<option value="41">Simulation</option>';
      $new_str .='<option value="42">Strategy</option>';
      $new_str .='<option value="43">Trivia</option>';
      $new_str .='<option value="44">Game Widgets</option>';
      $new_str .='<option value="45">Word Games</option>';

      return $new_str;
   
  }

  function ios_categories(){

        $new_str = '';

        $new_str.='<option value="6014">Games</option>';
        $new_str.='<option value="6018">Books</option>    ';
        $new_str.='<option value="6000">Business</option>';
        $new_str.='<option value="6022">Catalogs</option>';
        $new_str.='<option value="6017">Education</option>';
        $new_str.='<option value="6016">Entertainment</option>';
        $new_str.='<option value="6015">Finance</option>';
        $new_str.='<option value="6013">Health & Fitness</option>';
        $new_str.='<option value="6012">Lifestyle</option>';
        $new_str.='<option value="6020">Medical</option>';
        $new_str.='<option value="6011">Music</option>';
        $new_str.='<option value="6010">Navigation</option>';
        $new_str.='<option value="6009">News</option>';
        $new_str.='<option value="6008">Photo & Video</option>';
        $new_str.='<option value="6007">Productivity</option>';
        $new_str.='<option value="6006">Reference</option>';
        $new_str.='<option value="6005">Sports</option>';
        $new_str.='<option value="6004">Social Networking</option>';
        $new_str.='<option value="6003">Travel</option>';
        $new_str.='<option value="6002">Utilities</option>';
        $new_str.='<option value="6001">Weather</option>';
        $new_str.='<option value="7001">( Game Category ) Action</option> ';
        $new_str.='<option value="7002">( Game Category ) Adventure</option> ';
        $new_str.='<option value="7003">( Game Category ) Arcade</option> ';
        $new_str.='<option value="7004">( Game Category ) Board</option> ';
        $new_str.='<option value="7005">( Game Category ) Card</option> ';
        $new_str.='<option value="7006">( Game Category ) Casino</option> ';
        $new_str.='<option value="7007">( Game Category ) Dice</option> ';
        $new_str.='<option value="7008">( Game Category ) Educational</option> ';
        $new_str.='<option value="7009">( Game Category ) Family</option> ';
        $new_str.='<option value="7010">( Game Category ) Kids</option> ';
        $new_str.='<option value="7011">( Game Category ) Music</option> ';
        $new_str.='<option value="7012">( Game Category ) Puzzle</option> ';
        $new_str.='<option value="7013">( Game Category ) Racing</option> ';
        $new_str.='<option value="7014">( Game Category ) Role Playing</option> ';
        $new_str.='<option value="7015">( Game Category ) Simulation</option> ';
        $new_str.='<option value="7016">( Game Category ) Sports</option> ';
        $new_str.='<option value="7017">( Game Category ) Strategy</option> ';
        $new_str.='<option value="7018">( Game Category ) Trivia</option> ';
        $new_str.='<option value="7019">( Game Category ) Word</option>';

        return $new_str;
  }

  // function fetch_notes($app_id){
    
  //   $CI =& get_instance();
  //   $user_id = $CI->session->userdata('id');
  //   $fetch_data = select('note_users',false,array('where'=>array('app_id'=>$app_id,'user_id'=>$user_id)),array('limit'=>1,'single'=>TRUE));

  //   // p($fetch_data);
  //   // die();
  //   if(!empty($fetch_data['notes'])){
  //       return $fetch_data['notes'];
  //   }else{
  //       return '';
  //   }
  // } 

  function get_prev($array, $key) {
    if($key != 0){
        $new_key = $key - 1;
        if(array_key_exists($new_key,$array)){
            return $array[$new_key];
        }else{
            return '';
        }
    }
  } 

  function get_next($array, $key) {
    $new_key = $key + 1;
    if(array_key_exists($new_key,$array)){
        return $array[$new_key];
    }else{
        return '';
    }
  }  




function wp_encode_emoji( $content ) {
    if ( function_exists( 'mb_convert_encoding' ) ) {
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
        if ( preg_match_all( $regex, $content, $matches ) ) {
            if ( ! empty( $matches[1] ) ) {
                foreach ( $matches[1] as $emoji ) {
                    /*
                     * UTF-32's hex encoding is the same as HTML's hex encoding.
                     * So, by converting the emoji from UTF-8 to UTF-32, we magically
                     * get the correct hex encoding.
                     */
                    $unpacked = unpack( 'H*', mb_convert_encoding( $emoji, 'UTF-32', 'UTF-8' ) );
                    if ( isset( $unpacked[1] ) ) {
                        $entity = '&#x' . ltrim( $unpacked[1], '0' ) . ';';
                        $content = str_replace( $emoji, $entity, $content );
                    }
                }
            }
        }
    }
 
    return $content;
}

  function remove_br_end($string){
    $string_1 = preg_replace('/(>\s+<)|(>\n+<)/', ' ', $string); // Remove Space between HTML Tags
    $new_str = preg_replace('/(<br\/>)+$/', '', $string_1);  //Remove BR tag 
    return $new_str;
  }

  function formatSizeUnits_ios($bytes) {
        $bytes = $bytes / 1000000; // Convert into MB
        return $bytes;
    }

  function formatSizeUnits_android($bytes) {
        $bytes = $bytes / 1048576; // Convert into MB
        return $bytes;
    }


function replace_invalid_chars($data = null) {
    // $data = utf8_encode(wp_encode_emoji($data, ENT_QUOTES));
    $data = preg_replace('/[^A-Za-z0-9\-\(\) ]/', '', $data);
    return $data;
}


function notify_str(){
  $new_str = '';
  // <div class="container-fluid">
  $new_str .='{
            element: "body",
            type: "success",
            allow_dismiss: false,
            newest_on_top: false,
            placement: {
                from: "top",
                align: "center"
            },
            offset: 85,
            spacing: 10,
            z_index: 1031,
            delay: 500,
            timer: 500,
            url_target: "_blank",
            mouse_over: null,
            animate: {
                enter: "animated fadeInDown",
                exit: "animated fadeOutUp"
            }
        }';
  return $new_str;
}




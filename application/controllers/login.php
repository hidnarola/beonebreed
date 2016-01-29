<?php

class Login extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');

    }
    public function index($user = null) {
        $data = array();
        $data['company_logo'] = '';

        //Get All username
        $where_in_array = array('3','4');
        $all_db_users = $this->login_model->getfrom('users',false,array('where'=>array('is_deleted'=>'0'),'where_in'=>array('user_type'=>$where_in_array)) );

        $all_users = array('bob');

        if(!empty($all_db_users)){
            foreach($all_db_users as $db_user){
                array_push($all_users, $db_user['username']);
            }
        }

        if(empty($user)){
            $cur_url =  current_url();            
            preg_match('/([^.]+)\.beonebreed\.com/', $_SERVER['SERVER_NAME'], $matches);
            if(isset($matches[1])) {
               $user = $matches[1];
            }
        }

        if(in_array($user, $all_users) == false){
            //show_404();
        }
    
        if (!empty($_POST)) {


            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $result = $this->login_model->login($username, $password, $user);

            if ($result) {

                $user_type = $result[0]->user_type;

                if ($user_type == 1 || $user_type == 2) {
                    $newdata = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->username,
                        'admin_logged_in' => TRUE,
                        'user_type' => $result[0]->user_type,
                    );
                } else if ($user_type == 3) {

                    $newdata = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->username,
                        'client_user_logged_in' => TRUE,
                        'user_type' => $result[0]->user_type,
                    );
                } else if ($user_type == 4) {
                    $newdata = array(
                        'id' => $result[0]->id,
                        'username' => $result[0]->username,
                        'client_user_logged_in' => TRUE,
                        'user_type' => $result[0]->user_type,
                        'client_id' => $result[0]->client_id,
                    );
                }

                $this->session->set_userdata($newdata);

                if ($user_type == 1 || $user_type == 2) {
                    redirect('dashboard');
                } else if ($user_type == 3) {
                    redirect('client_news');
                } else if ($user_type == 4) {
                    redirect('client_news');
                }

            } else {

                $data['msg'] = "Please enter Correct login information";
            }
        }
        
        if (!empty($user)) {
            $client_result = $this->login_model->get_client_info($user);
            if ($client_result) {
                $data['company_logo'] = $client_result[0]->logo_name;
            }
        }else{

            $client_result = $this->login_model->get_client_info($user);
            if ($client_result) {
                $data['company_logo'] = $client_result[0]->logo_name;
            }         

        }

        $this->template->load('admin_login', 'login/index', $data);
    }

    public function logout() {

        $user_type = $this->session->userdata('user_type');
        $user_name = $this->session->userdata('username');

        if ($user_type == 1 || $user_type == 2) {
            $newdata = array(
                'id' => '',
                'username' => '',
                'admin_logged_in' => False,
                'user_type' => '',
            );
        } else if ($user_type == 3) {
            $newdata = array(
                'id' => '',
                'username' => '',
                'client_logged_in' => False,
                'user_type' => '',
            );
        } else if ($user_type == 4) {
            $newdata = array(
                'id' => '',
                'username' => '',
                'client_user_logged_in' => False,
                'user_type' => '',
                'client_id' => '',
            );
        }
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        if ($user_type == 3) {
            redirect($user_name);
        } else if ($user_type == 4) {
            $query = $this->db->get_where('users', array('id' => $client_id));
            $query_result = $query->row_array();
            redirect($query_result['username']);
        } else {
            redirect('login');
        }
    }

}
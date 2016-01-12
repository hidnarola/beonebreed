<?php

class Client extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->model('client_model');
    $this->load->database();
    //$this->load->library('pagination');
    $this->load->library('form_validation');
    if (!$this->session->userdata('admin_logged_in')) {
      redirect('/login');
    }
  }

  public function index() {
   
    $data['client_list'] = $this->client_model->get_all_client();
    $this->template->load('admin_default', 'client/index', $data);
  }

  public function add() {
  
    if ($this->form_validation->run('user') == FALSE) {
      $this->template->load('admin_default', 'client/add');
    } else {
      if (!empty($_POST)) {
							
							$config['upload_path'] = './uploads/company_logo';
							$config['allowed_types'] = '*';
							$new_name = time().$_FILES["file"]['name'];
							$config['file_name'] = $new_name;
							$this->load->library('upload', $config);
							
							if ($_FILES['file']['name']) {
										if (!$this->upload->do_upload('file')) {
												$error = array('error' => $this->upload->display_errors());
										} else {
												$upload_data = array('uploads' => $this->upload->data('file'));
										}
								}
        if(!empty($upload_data['uploads']['file_name'])){
								
									$upload_file=$upload_data['uploads']['file_name'];
								}else{
									$upload_file='';
								}
        $email=$this->input->post('email');
        $username=$this->input->post('username');
        $data = array(
            'user_group_id' =>0,
            'username' =>$username,
            'email' =>$email,
            'password' => md5($this->input->post('password')),
            'dept_id' => 0,
            'language_id' =>0,
            'user_type' =>'3',
												'client_id'=>0,
												'store_id'=>0,
												'user_group_id' => 0,
												'logo_name'=>$upload_file,
        );
								
								
										$subject="Generated Password";
          $password=$this->input->post('password');
          
  
         $message='<html>
                      <head>
                          <meta content=text/html; charset=utf-8 http-equiv=Content-Type>
                          <meta content=width=device-width, initial-scale=1.0 name=viewport>
                          <title>Beonebreed</title>
                          <style>
                          </style>
                      </head>
                      <body style=background: #f4f7f9; font-family:Helvetica Neue, Helvetica, Arial;>
                      <table align=center bgcolor=#f4f7f9 border=0 cellpadding=0 cellspacing=0 id=backgroundTable style=background: #f4f7f9; width=100%>
                          <tr>
                              <td align=center>
                                  <center>
                                      <table border=0 cellpadding=50 cellspacing=0 style=margin-left: auto;margin-right: auto;width:600px;text-align:center; width=600>
                                          <tr>
                                              <td align=center valign=top>
                                                  <img height="75" src="assets/images/BOB-logo.png" style="outline:none; text-decoration:none;border:none,display:block;" width="100" />
                                              </td>
                                          </tr>
                                      </table>
                                  </center>
                              </td>
                          </tr>
                          <tr>
                              <td align=center>
                                  <center>
                                      <table border=0 cellpadding=30 cellspacing=0 style=margin-left: auto;margin-right: auto;width:600px;text-align:center; width=600>
                                          <tr>
                                              <td align=left style=background: #ffffff; border: 1px solid #dce1e5; valign=top width=>
                                                  <table border=0 cellpadding=0 cellspacing=0 width=100%>
                                                      <tr>
                                                          <td align=center valign=top>
                                                              <h2>Welcome!</h2>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td align=center valign=top>
                                                              <h4 style=color: #f34541 !important>Account Information</h4>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <td align=center style=border-top: 1px solid #dce1e5;border-bottom: 1px solid #dce1e5; valign=top>
                                                              <p style=margin: 1em 0;>
                                                                  <strong>Username:</strong>'.
                                                                  $username
                                                              .'</p>
                                                              <p style=margin: 1em 0;>
                                                                  <strong>Password:</strong>'.$password.

                                                              '</p>
                                                          </td>
                                                      </tr>


                                                  </table>
                                              </td>
                                          </tr>
                                      </table>
                                  </center>
                              </td>
                          </tr>
                        </table>
                          </body>
                        </html>';
        if ($this->client_model->add_records($data, TRUE)) {
          //$this->session->set_flashdata('msg', 'Your record has been successfully added');
            $this->sendEmail($email,$subject,$message);
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('client');
      }
    }
  }
  public function sendEmail($email,$subject,$message)
    {

        $config = Array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_port' => 465,
          'smtp_client' => 'demo.narola@gmail.com', 
          'smtp_pass' => 'Ke6g7sE70Orq3Rqaqa', 
          'mailtype' => 'html',
          'charset' => 'iso-8859-1',
          'wordwrap' => TRUE
        );
          $this->load->library('email', $config);
          $this->email->set_newline("\r\n");
          $this->email->from('demo.narola@gmail.com');
          $this->email->to($email);
          $this->email->subject($subject);
          $this->email->message($message);
          if($this->email->send()){
              $this->session->set_flashdata('msg', 'User have been successfully created and account details have been sent');
          }else{
             $this->session->set_flashdata('msg', 'Your record has been successfully added');
          } 
          redirect('client');
    }
  public function edit($id = 0) {
    if ($this->form_validation->run('edit_user') == FALSE) {
      $data['client'] = $this->client_model->get($id);
      $this->template->load('admin_default', 'client/edit', $data);
    } else {
      if (!empty($_POST)) {
        if ($this->client_model->update_records($id, TRUE)) {
          $this->session->set_flashdata('msg', 'Your record has been successfully updated');
        } else {
          $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
        redirect('client');
      }
    }
  }
  public function delete($id = 0) {
    if ($this->client_model->delete_records($id, TRUE)) {
      $this->session->set_flashdata('msg', 'Your record has been successfully deleted');
    } else {
      $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
    }
    redirect('client');
  } 
}
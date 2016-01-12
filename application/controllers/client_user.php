<?php

class	Client_user	extends	CI_Controller	{

	public	function	__construct()	{
		parent::__construct();
		$this->load->library('template');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('client_user_model');
		$this->load->model('store_model');
		$this->load->database();
		//$this->load->library('pagination');
		$this->load->library('form_validation');
		if	(!$this->session->userdata('admin_logged_in'))	{
			redirect('/login');
		}
	}

	public	function	index($client_id	=	0)	{
		$data['client_id']	=	$client_id;
		$data['client_user_list']	=	$this->client_user_model->get_all_user($client_id);
		$this->template->load('admin_default',	'client_user/index',	$data);
	}

	public	function	add($client_id	=	0)	{

		if	($this->form_validation->run('client_user')	==	FALSE)	{
			$data['client_id']	=	$client_id;
			$data['store_list']	=	$this->store_model->get_all_store($client_id);
			$this->template->load('admin_default',	'client_user/add',	$data);
		}	else	{
			if	(!empty($_POST))	{
				if	(!empty($client_id))	{
					$id	=	$client_id;
				}	else	{
					$id	=	0;
				}
				if	(!empty($this->input->post('language')))	{

					$language	=	$this->input->post('language');
				}	else	{
					$language	=	0;
				}
				if	(!empty($this->input->post('role')))	{
					$role	=	$this->input->post('role');
				}	else	{
					$role	=	0;
				}
				if	(!empty($this->input->post('department')))	{
					$department	=	$this->input->post('department');
				}	else	{
					$department	=	0;
				}
				$email	=	$this->input->post('email');
				$username	=	$this->input->post('username');
				$data	=	array(
								'username'	=>	$username,
								'email'	=>	$email,
								'password'	=>	md5($this->input->post('password')),
								'client_id'	=>	$id,
								'store_id'	=>	$this->input->post('store'),
								'user_group_id'	=>	0,
								'user_type'	=>	4,
								'dept_id' => $department,
								'language_id' => $language,
								'logo_name'=>'',
				);
				$subject	=	"Generated Password";
				$password	=	$this->input->post('password');
				$message	=	'<html>
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
                                                                  <strong>Username:</strong>'	.
												$username
												.	'</p>
                                                              <p style=margin: 1em 0;>
                                                                  <strong>Password:</strong>'	.	$password	.
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
				if	($this->client_user_model->add_records($data,	TRUE))	{
					//$this->session->set_flashdata('msg', 'Your record has been successfully added');
					$this->sendEmail($email,	$subject,	$message);
				}	else	{
					$this->session->set_flashdata('err_msg',	'Oops!Something Wrong!');
				}
				redirect('client_user/index/'	.	$id);
			}
		}
	}

	public	function	sendEmail($email,	$subject,	$message)	{

		$config	=	Array(
						'protocol'	=>	'smtp',
						'smtp_host'	=>	'ssl://smtp.googlemail.com',
						'smtp_port'	=>	465,
						'smtp_client'	=>	'demo.narolainfotech@gmail.com',
						'smtp_pass'	=>	'Narola102',
						'mailtype'	=>	'html',
						'charset'	=>	'iso-8859-1',
						'wordwrap'	=>	TRUE
		);
		$this->load->library('email',	$config);
		$this->email->set_newline("\r\n");
		$this->email->from('demo.narolainfotech@gmail.com');
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);


		if	($this->email->send())	{
			$this->session->set_flashdata('msg',	'User have been successfully created and account details have been sent');
		}	else	{
			//echo $this->email->print_debugger();die();
			$this->session->set_flashdata('msg',	'Your record has been successfully added');
		}
	}

	public	function	edit($id	=	0,	$client_id	=	0)	{
		if	($this->form_validation->run('edit_client_user')	==	FALSE)	{
			$data['client_id']	=	$client_id;
			$data['store_list']	=	$this->store_model->get_all_store($client_id);
			$data['client']	=	$this->client_user_model->get($id);
			$this->template->load('admin_default',	'client_user/edit',	$data);
		}	else	{
			if	(!empty($_POST))	{
				if	($this->client_user_model->update_records($id,	TRUE))	{
					$this->session->set_flashdata('msg',	'Your record has been successfully updated');
				}	else	{
					$this->session->set_flashdata('err_msg',	'Oops!Something Wrong!');
				}
				redirect('client_user/index/'	.	$client_id);
			}
		}
	}

	public	function	delete($id	=	0,	$client_id	=	0)	{
		if	($this->client_user_model->delete_records($id,	TRUE))	{
			$this->session->set_flashdata('msg',	'Your record has been successfully deleted');
		}	else	{
			$this->session->set_flashdata('err_msg',	'Oops!Something Wrong!');
		}
		redirect('client_user/index/'	.	$client_id);
	}

}
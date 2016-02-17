<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index(){
		$sess_user_id = $this->session->userdata('id');
		$data['all_notifications'] = $this->products_model->getfrom('notifications',false,
																	array('where'=>array('user_id'=>$sess_user_id)),
                        											array('order_by'=>'created_date desc','limit'=>'5'));
		$this->template->load('admin_default', 'notifications/index',$data);
	}

	public function change_status($id){
		$data=array('status'=>'0');
		$this->products_model->update_into('notifications',$id,$data);
		$this->session->set_flashdata('success', 'Notification status has been updated.');
		redirect('notifications');
	}

	public function delete($id){
		$this->products_model->deletefrom('notifications',$id);
		$this->session->set_flashdata('success', 'Notification has been deleted.');
		redirect('notifications');
	}

}

/* End of file notifications.php */
/* Location: ./application/controllers/notifications.php */
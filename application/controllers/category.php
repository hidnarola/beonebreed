<?php

class Category extends CI_Controller{
	
	public function __construct(){
        parent::__construct();
        $this->load->library('template');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('category_model');
        $this->load->database();
        //$this->load->library('pagination');
        $this->load->library('form_validation');

        if (!$this->session->userdata('admin_logged_in')){ 
          redirect('/login');
        }
	}	
	
	public function index(){
		$data['category_list'] = $this->category_model->get_all_category();
		$this->template->load('admin_default','category/index',$data);        
	}
	
	public function add(){

		 if ($this->form_validation->run('category') == FALSE){	 
            
            $this->template->load('admin_default','category/add'); 

		  }else{

          if(!empty($_POST)){                
                $data=array(
                  'name'=>$this->input->post('name'),
                );

                if($this->category_model->add_records($data,TRUE)){
                  $this->session->set_flashdata('msg', 'Your record has been successfully added');
                }else{
                  $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
                }
                redirect('category');
           }
		}	            
	}
	
	public function edit($id=0){

		if ($this->form_validation->run('category') == FALSE){

            $data['category'] = $this->category_model->get($id);
            $this->template->load('admin_default','category/edit',$data);        
		}else{	
            
        if(!empty($_POST)){
            if($this->category_model->update_records($id,TRUE)){
              $this->session->set_flashdata('msg', 'Your record has been successfully updated');

            }else{
              $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
            }
            redirect('category');
        }
		}
	}
	
	 public function delete($id=0){
        if($this->category_model->delete_records($id,TRUE)){ 
            $this->session->set_flashdata('msg', 'Your record has been successfully deleted');          
        }else{
           $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');
        }
      redirect('category');
  }
	
}
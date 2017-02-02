<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$data['barcodes'] = $this->barcode_model->get_all_join();
		// qry();	
		// p($data,true);
		// die();
		$this->template->load('admin_default', 'barcode/index',$data);
	}

	public function edit($id){
		
		$data['barcode'] = $this->barcode_model->get($id);

		if($_POST){
			
			$upc = $this->input->post('upc');
			$ean = $this->input->post('ean');

			if($data['barcode']['upc'] !== $upc){
				$upc_rule = 'trim|required|exact_length[12]|is_unique[bar_code.upc]';
			}else{
				$upc_rule = 'trim|required|exact_length[12]';
			}

			if($data['barcode']['ean'] !== $ean){
				$ean_rule = 'trim|required|exact_length[12]|is_unique[bar_code.ean]';
			}else{
				$ean_rule = 'trim|required|exact_length[12]';
			}

		}else{
			$upc_rule = 'trim|required|exact_length[12]';
			$ean_rule = 'trim|required|exact_length[12]';
		}

		$this->form_validation->set_rules('upc', 'UPC', $upc_rule);
		$this->form_validation->set_rules('ean', 'EAN', $ean_rule);

		if($this->form_validation->run() == false){
			$this->template->load('admin_default', 'barcode/edit',$data);
		}else{
			$data = array(
						'upc'=>$upc,
						'ean'=>$ean,
						'description'=>$this->input->post('description'),
						'modified_date'=>date('Y-m-d H:i:s')
					);
			$this->barcode_model->update($id,$data);
			$this->session->set_flashdata('success', 'Barcode has been Successfully Updated.');
			redirect('barcode');
		}
	}

	public function test(){

		$barcodes = $this->barcode_model->get_all();

		// p($barcodes,true);
		ob_start();
		ob_clean();
		ob_end_clean();
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Barcode');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'upc');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('B1', 'ean');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('C1', 'description');

		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
		
		$this->excel->getActiveSheet()->getStyle("A1:C1")->getFont()->setSize(14);
		
		$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

		$this->excel->getActiveSheet()->freezePane('A2'); //Freeze panel Above of A2 row

		$this->excel->getActiveSheet()->getStyle('A1:C1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(100);
		
		$cnt = 2;

		//No of Credentials loop will run if that username does not exist in users.username table.field
		
		for($i=0;$i<10;$i++){	

			$upc = random_string('numeric', 12);
			$ean = random_string('numeric', 13);

			$this->excel->getActiveSheet()->setCellValue('A'.$cnt, $upc);
			$this->excel->getActiveSheet()->setCellValue('B'.$cnt, $ean);
			$this->excel->getActiveSheet()->setCellValue('C'.$cnt, 'Description');
			$this->excel->getActiveSheet()->getStyle('A'.$cnt.':C'.$cnt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getRowDimension($cnt)->setRowHeight(17); //set Height After first Row
			$cnt++;
		}	

		$filename='barcode.csv'; //save our workbook as this file name	
		header('Content-Type: text/csv'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'CSV');
        $objWriter->save('php://output'); 
	}

	public function import(){

		if($_POST){
			$config['upload_path'] = './uploads/barcode/';
			$config['allowed_types'] = 'csv';

			// $this->upload->initialize($config);
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('file')){
				
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error', $error['error']);
				redirect('barcode/import');

			} else {

				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];
				$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/barcode/'.$file_name;
				$data = $this->csvimport->get_array($path, "", TRUE);

				if(!empty($data)){
					foreach($data as $d){	

						$upc = $d['upc'];
						$ean = $d['ean'];
						$description = $d['description'];

						$error_cnt = 0;

						$fetch_upc = $this->barcode_model->get_all(array('upc'=>$upc));
						$fetch_ean = $this->barcode_model->get_all(array('ean'=>$ean));	

						if(empty($fetch_upc) && empty($fetch_ean) && 
						  !empty($upc) && !empty($ean) && strlen($upc) == 12 && 
						   strlen($ean) == 12){
							
							$data_barcode = array(
												'upc'=>$upc,
												'ean'=>$ean,
												'description'=>$description
											);
							$this->barcode_model->insert($data_barcode);									
						}
					}				
				}
				$this->session->set_flashdata('success', 'Barcode has been imported successfully.');
				redirect('barcode');
			}
		}
		

		$this->template->load('admin_default', 'barcode/import');
	}

	public function export(){

		$barcodes = $this->barcode_model->get_all();

		// p($barcodes,true);
		ob_start();
		ob_clean();
		ob_end_clean();
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle('Barcode');
		//set cell A1 content with some text
		$this->excel->getActiveSheet()->setCellValue('A1', 'Number');
		//set cell B1 content with some text
		$this->excel->getActiveSheet()->setCellValue('B1', 'UPC');
		//set cell C1 content with some text
		$this->excel->getActiveSheet()->setCellValue('C1', 'EAN');
		//set cell D1 content with some text
		$this->excel->getActiveSheet()->setCellValue('D1', 'Description');

		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);

		$this->excel->getActiveSheet()->getStyle("A1:D1")->getFont()->setSize(14);
		
		$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

		$this->excel->getActiveSheet()->freezePane('A2'); //Freeze panel Above of A2 row

		$this->excel->getActiveSheet()->getStyle('A1:D1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(100);
		
		$cnt = 2;

		//No of Credentials loop will run if that username does not exist in users.username table.field
		
		foreach($barcodes as $barcode) {	
			$this->excel->getActiveSheet()->setCellValue('A'.$cnt, $cnt-1);
			$this->excel->getActiveSheet()->setCellValue('B'.$cnt, $barcode['upc']);
			$this->excel->getActiveSheet()->setCellValue('C'.$cnt, $barcode['ean']);
			$this->excel->getActiveSheet()->setCellValue('D'.$cnt, $barcode['description']);
			$this->excel->getActiveSheet()->getStyle('A'.$cnt.':D'.$cnt)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getRowDimension($cnt)->setRowHeight(17); //set Height After first Row
			$cnt++;
		}	

		ob_clean();
		ob_end_clean();

        $filename='barcode.xls'; //save our workbook as this file name	
		header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        $objWriter->save('php://output'); 
	}
}

/* End of file Barcode.php */
/* Location: ./application/controllers/Barcode.php */
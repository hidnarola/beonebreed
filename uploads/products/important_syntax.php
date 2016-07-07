for templates
<base href="<?php echo base_url(); ?>">


for language transaltion

 
http://jeromejaglale.com/doc/php/codeigniter_i18n


for ajax form transition

 var data = new FormData($("#project_external_form")[0]);
        $('#response_msg').html('');
        $.ajax({
            url: '<?php echo site_url('project/project_add_links'); ?>',
            processData: false,
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success: function(response) {

                if (response.status == 'success') {
                    $('#myexternalModal').modal('hide');

                    //$('#external_links').append( '<li style=list-style-type:none;><a data-desc="'+response.desc+'" class="notes_link" id="'+response.id+'" href="javascript::void(0)"></a></li>' );
                   // $("#external_links").append($("<li style=list-style-type:none;>").text(response.link_name));
                   // $('#external_links').append('<li style=list-style-type:none;><a data-desc="' + response.desc + '" class="notes_link_data" id="' + response.id + '" href="javascript::void(0)">' + description + '</a></li>');
                    $('#external_links').append('<li style=list-style-type:none;><a data-desc="' + response.link_desc + '" class="external_link_data"  href="javascript::void(0)">' + response.link_name + '</a><span style=margin-left:60px>'+response.dates1+'</span></li>');
                    $('#project_external_form')[0].reset();
                }
            }
        });
 
 import and export csv
 
 
   public function ExportCsv() {
    $this->load->dbutil();
    $this->load->helper('file');
    $this->load->helper('download');
    $delimiter = ",";
    //$newline = "\r\n";
    $filename = "store.csv";
    $query = "SELECT name,client_id,address,telephone,contact,fax FROM store where is_deleted='0'";
    $result = $this->db->query($query);
    $data = $this->dbutil->csv_from_result($result, $delimiter);
    force_download($filename, $data);
  }
 
 public function export_to_csv($id = 0) {
    $this->store_model->ExportCsv();
  }
   public function importcsv($client_id=0) {
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = '*';
    $this->load->library('upload', $config);

    if ($_FILES['file']['name']) {
      if (!$this->upload->do_upload('file')) { 
        
      } else {

        $file_data = $this->upload->data();
        $file_path = './uploads/' . $file_data['file_name'];

        if ($this->csvimport->get_array($file_path)) {
          $csv_array = $this->csvimport->get_array($file_path);
          
          if(!isset($csv_array['0']['name']) || !isset($csv_array['0']['client_id']) || !isset($csv_array['0']['address']) || !isset($csv_array['0']['telephone']) || !isset($csv_array['0']['contact']) || !isset($csv_array['0']['fax'])){
            $this->session->set_flashdata('err_msg', 'Please Select file with appropriate field names');
            redirect('store/index/'.$client_id);exit;
          }
          foreach ($csv_array as $row) {
              $insert_data = array(
              'name' => $row['name'],
              'address' => $row['address'],
              'telephone' => $row['telephone'],
              'contact' => $row['contact'],
              'fax' => $row['fax'],
               'client_id' => $row['client_id'],    
              );
              if($this->store_model->add_records($insert_data)){
                 $this->session->set_flashdata('msg', 'Your Store record has been successfully imported'); 
              }else{
                $this->session->set_flashdata('err_msg', 'Oops!Something Wrong!');   
              } 
          }
        }
        
      }
      redirect('store/index/'.$client_id);
    }
  }
  
  
 
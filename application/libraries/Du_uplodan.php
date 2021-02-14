<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Du_uplodan
{
	public function __construct()
	{
        $this->CI = &get_instance();
    }
    
	private function ktp_kegiatan()
	{
		$ktp_kegiatan = date('d-m-Y').'-'.$_FILES["ktp"]['name'];

        $config['upload_path'] 		= 'assets/uploads/binsyar/';
        $config['allowed_types'] 	= 'gif|jpg|jpeg|png';
        $config['max_size'] 		= 1024;
        $config['max_widht'] 		= 1000;
        $config['max_height']  		= 1000;
        $config['file_name'] 		= $ktp_kegiatan;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ktp')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            redirect('');
        }
        return $this->upload->data('file_name');
	}

}

/* End of file Du_uplodan.php */
/* Location: ./application/libraries/Du_uplodan.php */
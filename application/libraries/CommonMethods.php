<?php

/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of do_upload_multiple_files
 *
 * @author centos
 */
class CommonMethods {

    private $CI;

    public function __construct() {
        $this->CI = &get_instance();
    }

    public function do_upload_multiple_files($fieldName, $options) {
        $files = $_FILES;
        $cpt = count($_FILES[$fieldName]['name']);
        for ($i = 0; $i < $cpt; $i++) {
            $_FILES[$fieldName]['name'] = $files[$fieldName]['name'][$i];
            $_FILES[$fieldName]['type'] = $files[$fieldName]['type'][$i];
            $_FILES[$fieldName]['tmp_name'] = $files[$fieldName]['tmp_name'][$i];
            $_FILES[$fieldName]['error'] = $files[$fieldName]['error'][$i];
            $_FILES[$fieldName]['size'] = $files[$fieldName]['size'][$i];

            $this->CI->load->library('upload');
            $this->CI->upload->initialize($options);

            //upload the image
            if (!$this->CI->upload->do_upload($fieldName)) {
                log_message('error', $this->upload->display_errors('<p>', '</p>'));
                $result = false;
            } else {
                $data = $this->upload->data();
//            $picture = ['id' => '', 'nik' => $this->result[0]->nik, 'nopen' => $this->uri->segment(4), 'tgl_input' => date("Y-m-d h:i:s"), 'path' => "assets/images/lap_marketing/" . $data['file_name']];
//            $this->M_Interaksi->Insertpict($picture);
                $result = $data;
            }
        }

        return $result;
    }

}

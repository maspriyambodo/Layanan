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
        $result = [];
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
                log_message('error', $this->CI->upload->display_errors('<p>', '</p>'));
                $result['status'][] = false;
            } else {
                $result['status'][] = $this->CI->upload->data();
            }
        }
        return $result;
    }

    public function do_upload_cv()
    {
        $image_name = 'narsum_'.date('YmdHis').$_FILES["cv"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('cv')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function sc_sertifikat()
    {
        $image_name = 'narsum_'.date('YmdHis').$_FILES["sc_sertifikat"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('sc_sertifikat')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function passport()
    {
        $image_name = 'narsum_'.date('YmdHis').$_FILES["fc_passport"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('fc_passport')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function ktp()
    {
        $image_name = 'narsum_'.date('YmdHis').$_FILES["sc_ktp"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('sc_ktp')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function poto()
    {
        $image_name = 'narsum_'.date('YmdHis').$_FILES["pas_foto"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('pas_foto')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function super()
    {
        $image_name = 'Layanan4_'.date('YmdHis').$_FILES["surat_permohonan_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('surat_permohonan_safari')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function prosal()
    {
        $image_name = 'Layanan4_'.date('YmdHis').$_FILES["proposal_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('proposal_safari')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function super_dalam()
    {
        $image_name = 'Layanan3_'.date('YmdHis').$_FILES["surat_permohonan_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('surat_permohonan_dalam')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

    public function prosal_dalam()
    {
        $image_name = 'Layanan3_'.date('YmdHis').$_FILES["proposal_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->CI->load->library('upload');
        $this->CI->upload->initialize($config);
        if (!$this->CI->upload->do_upload('proposal_dalam')) {
            echo $this->CI->upload->display_errors('', '');
            // return $this->kegiatan();
        }
        return $this->CI->upload->data('file_name');
    }

}

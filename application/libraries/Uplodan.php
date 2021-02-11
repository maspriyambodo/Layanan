<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uplodan
{
	public function __construct()
	{
        $this->CI = &get_instance();
    }

    //--------------------------------------------- Punya Kegiatan Keagamaan
    public function doupload_ktp_kegiatan()
    {   $user['tampil'] = $this->bm->get_identitas();
        $type = explode('.', $_FILES["ktp"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["ktp"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y')."_".$user['tampil']->fullname."_".$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["ktp"]["tmp_name"]))
                if(move_uploaded_file($_FILES["ktp"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    private function doupload_proposal_kegiatan()
    {   
        $user['tampil'] = $this->bm->get_identitas();
        $type = explode('.', $_FILES["proposal_keg"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["proposal_keg"]["name"];
        $url = "./assets/uploads/binsyar/".date('dy')."_".$user['tampil']->fullname."_"."_".$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["proposal_keg"]["tmp_name"]))
                if(move_uploaded_file($_FILES["proposal_keg"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    private function doupload_permohonan_kegiatan()
    {   
        $user['tampil'] = $this->bm->get_identitas();
        $type = explode('.', $_FILES["surat_permohonan_keg"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["surat_permohonan_keg"]["name"];
        $url = "./assets/uploads/binsyar/".date('dy')."_".$user['tampil']->fullname."_"."_".$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["surat_permohonan_keg"]["tmp_name"]))
                if(move_uploaded_file($_FILES["surat_permohonan_keg"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    //--------------------------------------------- Punya Penceramah Keluar Negeri
    public function doupload_sp_luar()
    {
        $type = explode('.', $_FILES["surat_permohonan_luar"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["surat_permohonan_luar"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["surat_permohonan_luar"]["tmp_name"]))
                if(move_uploaded_file($_FILES["surat_permohonan_luar"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_proposal_luar()
    {
        $type = explode('.', $_FILES["proposal_luar"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["proposal_luar"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["proposal_luar"]["tmp_name"]))
                if(move_uploaded_file($_FILES["proposal_luar"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_cv_luar()
    {
        $type = explode('.', $_FILES["cv_crmh_luar"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["cv_crmh_luar"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["cv_crmh_luar"]["tmp_name"]))
                if(move_uploaded_file($_FILES["cv_crmh_luar"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_paspor_luar()
    {
        $type = explode('.', $_FILES["pasp_crmh_luar"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pasp_crmh_luar"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pasp_crmh_luar"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pasp_crmh_luar"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_pengundang_luar()
    {
        $type = explode('.', $_FILES["pasp_pengundang_luar"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pasp_pengundang_luar"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pasp_pengundang_luar"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pasp_pengundang_luar"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_foto_luar()
    {
        $type = explode('.', $_FILES["pas_foto_crmh_luar"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pas_foto_crmh_luar"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pas_foto_crmh_luar"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pas_foto_crmh_luar"]["tmp_name"], $url))
                    return $url;
        return "";
    }

}

/* End of file Uplodan.php */
/* Location: ./application/libraries/Uplodan.php */
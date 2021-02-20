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
<<<<<<< HEAD
    {   $user['tampil'] = $this->bm->get_identitas();
=======
    {   
        // $user['tampil'] = $this->CI->binsyar_m->get_identitas();
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
        $type = explode('.', $_FILES["ktp"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["ktp"]["name"];
<<<<<<< HEAD
        $url = "./assets/uploads/binsyar/".date('d-m-Y')."_".$user['tampil']->fullname."_".$file_name;
=======
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["ktp"]["tmp_name"]))
                if(move_uploaded_file($_FILES["ktp"]["tmp_name"], $url))
                    return $url;
        return "";
    }

<<<<<<< HEAD
    private function doupload_proposal_kegiatan()
    {   
        $user['tampil'] = $this->bm->get_identitas();
=======
    public function doupload_proposal_kegiatan()
    {   
        // $user['tampil'] = $this->CI->binsyar_m->get_identitas();
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
        $type = explode('.', $_FILES["proposal_keg"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["proposal_keg"]["name"];
<<<<<<< HEAD
        $url = "./assets/uploads/binsyar/".date('dy')."_".$user['tampil']->fullname."_"."_".$file_name;
=======
        $url = "./assets/uploads/binsyar/".date('dy').$file_name;
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["proposal_keg"]["tmp_name"]))
                if(move_uploaded_file($_FILES["proposal_keg"]["tmp_name"], $url))
                    return $url;
        return "";
    }

<<<<<<< HEAD
    private function doupload_permohonan_kegiatan()
    {   
        $user['tampil'] = $this->bm->get_identitas();
=======
    public function doupload_permohonan_kegiatan()
    {   
        // $user['tampil'] = $this->CI->binsyar_m->get_identitas();
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
        $type = explode('.', $_FILES["surat_permohonan_keg"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["surat_permohonan_keg"]["name"];
<<<<<<< HEAD
        $url = "./assets/uploads/binsyar/".date('dy')."_".$user['tampil']->fullname."_"."_".$file_name;
=======
        $url = "./assets/uploads/binsyar/".date('dy').$file_name;
>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44

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

    //--------------------------------------------- Punya Penceramah Dari Luar Negeri
    public function doupload_sp_dalam()
    {
        $type = explode('.', $_FILES["surat_permohonan_dalam"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["surat_permohonan_dalam"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["surat_permohonan_dalam"]["tmp_name"]))
                if(move_uploaded_file($_FILES["surat_permohonan_dalam"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_proposal_dalam()
    {
        $type = explode('.', $_FILES["proposal_dalam"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["proposal_dalam"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["proposal_dalam"]["tmp_name"]))
                if(move_uploaded_file($_FILES["proposal_dalam"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_cv_dalam()
    {
        $type = explode('.', $_FILES["cv_crmh_dalam"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["cv_crmh_dalam"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["cv_crmh_dalam"]["tmp_name"]))
                if(move_uploaded_file($_FILES["cv_crmh_dalam"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_paspor_dalam()
    {
        $type = explode('.', $_FILES["pasp_crmh_dalam"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pasp_crmh_dalam"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pasp_crmh_dalam"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pasp_crmh_dalam"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_ktp_dalam()
    {
        $type = explode('.', $_FILES["ktp_dalam"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["ktp_dalam"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["ktp_dalam"]["tmp_name"]))
                if(move_uploaded_file($_FILES["ktp_dalam"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_foto_dalam()
    {
        $type = explode('.', $_FILES["pas_foto_crmh_dalam"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pas_foto_crmh_dalam"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pas_foto_crmh_dalam"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pas_foto_crmh_dalam"]["tmp_name"], $url))
                    return $url;
        return "";
    }

<<<<<<< HEAD
=======
    //--------------------------------------------- Punya Safari Dakwah Dalam Negeri
    public function doupload_sp_safari()
    {
        $type = explode('.', $_FILES["surat_permohonan_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["surat_permohonan_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["surat_permohonan_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["surat_permohonan_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_proposal_safari()
    {
        $type = explode('.', $_FILES["proposal_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["proposal_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["proposal_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["proposal_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_cv_safari()
    {
        $type = explode('.', $_FILES["cv_crmh_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["cv_crmh_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["cv_crmh_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["cv_crmh_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_paspor_safari()
    {
        $type = explode('.', $_FILES["pasp_crmh_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pasp_crmh_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pasp_crmh_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pasp_crmh_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_ktp_safari()
    {
        $type = explode('.', $_FILES["ktp_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["ktp_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["ktp_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["ktp_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_foto_safari()
    {
        $type = explode('.', $_FILES["pas_foto_crmh_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["pas_foto_crmh_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["pas_foto_crmh_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["pas_foto_crmh_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    public function doupload_crt_safari()
    {
        $type = explode('.', $_FILES["crt_crmh_safari"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["crt_crmh_safari"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y').$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["crt_crmh_safari"]["tmp_name"]))
                if(move_uploaded_file($_FILES["crt_crmh_safari"]["tmp_name"], $url))
                    return $url;
        return "";
    }

>>>>>>> 89c42021394fa964f82606712b8e449ebea12f44
}

/* End of file Uplodan.php */
/* Location: ./application/libraries/Uplodan.php */
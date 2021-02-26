<?php

defined('BASEPATH') OR exit('No direct script access allowed');
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
 * Description of L1_Setuju
 * LAYANAN IZIN KEGIATAN KEAGAMAAN YANG TELAH DISETUJUI!
 * @author centos
 */
class L4_Setuju extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan4');
        $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    public function index() {
        $this->template->setPageId("DISETUJUI_SDDN");
        $data = [];
        $sitetitle = "Permohonan yang telah disetujui";
        $pagetitle = "Permohonan Disetujui";
        $view = "layanan4/v_setuju";
        $breadcrumbs = [
            [
                "title" => "Urais & Binsyar",
                "link" => "",
                "is_actived" => true
            ]
        ];
        $sql = "";
        $mejo = new Mejo();
        $mejo->setQuery($sql);
        $tampilan = $mejo->metungul();
        $metune = $tampilan->metune;
        $js_lib_files = $tampilan->js_lib_files;
        $css_lib_files = $tampilan->css_lib_files;
        $js_inlines = $tampilan->js_inlines;
        $this->template->setCssFiles($css_lib_files);
        $this->template->setJsFiles($js_lib_files);
        $data["js_inlines"] = $js_inlines;
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    //-------------------------------------------------------- Query Bagus
    public function Joinan_binsyar()
    {
        $kondisi = array(
            "id_stat" => 3
        );

        $query = $this->db->select("*")
                ->from("v_safari_data")
                ->where($kondisi);

        $get = $this->db->get();
        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
    }

    public function Detail($id)
    {
        $this->template->setPageId("DISETUJUI_SDDN");
        $data = array();

        $sitetitle = "Permohonan yang telah disetujui";
        $pagetitle = "Permohonan Disetujui";
        $view = "layanan4/v_detaill4_setuju";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Urais & Binsyar",
                    "link" => "",
                    "is_actived" => true,
                ),
            );

        $sql = "";
        $mejo = new Mejo();
        $mejo->setQuery($sql);
        $tampilan = $mejo->metungul();
        
        $metune = $tampilan->metune;
        $js_lib_files = $tampilan->js_lib_files;
        $css_lib_files = $tampilan->css_lib_files;
        $js_inlines = $tampilan->js_inlines;

        $this->template->setCssFiles($css_lib_files);
        $this->template->setJsFiles($js_lib_files);
        $data['detail'] = $this->M_layanan4->detail_permohonan($id);
        $data['penceramah'] = $this->M_layanan4->detail_penceramah($id);
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

    }

}

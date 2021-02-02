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
 * Description of Layanan_1
 * LAYANAN IZIN KEGIATAN KEAGAMAAN
 * @author centos
 */
class Layanan_1 extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan1');
    }

    public function index() {
        $this->template->setPageId("Urais_Binsyar");
        $data = [];
        $sitetitle = "IZIN KEGIATAN KEAGAMAAN";
        $pagetitle = "Izin Kegiatan Keagamaan";
        $view = "layanan1/v_index";
        $breadcrumbs = [
            [
                "title" => "Izin Kegiatan Keagamaan",
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

    public function Get_all() {
        $result = ["data" => $this->M_layanan1->index(), "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Detail($id) {
        $this->template->setPageId("Urais_Binsyar");
        $data = [];
        $data['detil'] = $this->M_layanan1->Detail($id);
        $sitetitle = "IZIN KEGIATAN KEAGAMAAN";
        $pagetitle = "Izin Kegiatan Keagamaan";
        $view = "layanan1/v_detail";
        $breadcrumbs = [
            [
                "title" => "Izin Kegiatan Keagamaan",
                "link" => base_url('Urais/Layanan_1/index/'),
                "is_actived" => false
            ],
            [
                "title" => "Detail",
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

}

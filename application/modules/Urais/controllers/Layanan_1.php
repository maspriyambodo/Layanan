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
        $this->template->setPageId("DITERIMA_IKK");
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
        $data = [
            'id_stat' => $this->input->get('id')/* input get id_stat */,
            'jenis_layanan' => $this->input->get('jenis_layanan')/* input get jenis_layanan */
        ];
        $result = ["data" => $this->M_layanan1->index($data), "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Detail($id) {
        $this->template->setPageId("DITERIMA_IKK");
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

    public function Update($id_layanan) {
        $data = [
            '`dt_layanan`.`id_stat`' => 2 + false,
            '`dt_layanan`.`sysupdateuser`' => $this->session->userdata('DX_user_id') + false,
            'dt_layanan.sysupdatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_layanan1->Update($id_layanan, $data);
        if ($exec == true) {
            $direct = redirect(base_url('Urais/Layanan_1/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('Urais/Layanan_1/index/'), 'refresh');
        }
        return $direct;
    }

    public function Proses() {//permohonan status proses
        $this->template->setPageId("DIPROSES_IKK");
        $data = [];
        $sitetitle = "Permohonan dalam Proses";
        $pagetitle = "Daftar Permohonan di Proses";
        $view = "layanan1/v_proses";
        $breadcrumbs = [["title" => "Proses Permohonan", "link" => "", "is_actived" => true]];
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

    public function Detail_Proses($id) {
        $this->template->setPageId("DIPROSES_IKK");
        $data = [];
        $data['detil'] = $this->M_layanan1->Detail($id);
        $data['stat'] = $this->M_layanan1->Stat($id);
        $sitetitle = "Detil Permohonan | " . $data['detil'][0]->nm_keg;
        $pagetitle = "Detil Data Permohonan";
        $view = "layanan1/v_prosesdetail";
        $breadcrumbs = [["title" => "Proses Permohonan", "link" => base_url('Urais/Layanan_1/Proses/'), "is_actived" => false,], ["title" => "Detail", "link" => "", "is_actived" => true,]];
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

    public function Proses_verif() {
        if (empty($this->input->post('alasan'))) {
            $alasan = "NULL";
        } else {
            $alasan = '"' . $this->input->post('alasan') . '"';
        }
        $data = ['a' => $this->input->post('hasil'), 'b' => $alasan, 'c' => $this->session->userdata('DX_user_id'), 'd' => date("Y-m-d H:i:s"), 'e' => $this->input->post('id_layanan')];
        $this->M_layanan1->Proses_verif($data);
        redirect(base_url('Urais/Layanan_1/Proses/'), 'refresh');
    }

}

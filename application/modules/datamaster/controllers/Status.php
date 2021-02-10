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
 * Description of Status
 *
 * @author centos
 */
class Status extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Status');
    }

    public function index() {
        $this->template->setPageId("MASTER_STATUS_LAYANAN");
        $data = [];

        $sitetitle = "Status Nama Layanan";
        $pagetitle = "Status Nama Layanan";
        $view = "status_layanan/index";
        $breadcrumbs = [
            [
                "title" => "Status Layanan",
                "link" => "",
                "is_actived" => false
            ],
            [
                "title" => "Status Nama Layanan",
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
        $data = $this->M_Status->index();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Tambah() {
        $this->template->setPageId("MASTER_STATUS_LAYANAN");
        $data = [];

        $sitetitle = "Tambah Status Layanan";
        $pagetitle = "Tambah Status Layanan";
        $view = "status_layanan/v_add";
        $breadcrumbs = [
            [
                "title" => "Data Status Layanan",
                "link" => base_url('datamaster/Layanan/index/'),
                "is_actived" => false
            ],
            [
                "title" => "Tambah Status Layanan",
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

    public function Delete() {
        $id = $this->input->post('id', true);
        $data = [
            '`mt_status_layanan`.`stat`' => 3 + false,
            '`mt_status_layanan`.`sysdeleteuser`' => $this->session->userdata('DX_user_id') + false,
            'mt_status_layanan.sysdeletedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Status->Update($id, $data);
        if ($exec == true) {
            $direct = toJSON(resultSuccess("OK", 1));
        } else {
            $direct = toJSON(resultSuccess("Error", 0));
        }
        return $direct;
    }

    public function Edit($id) {
        $this->template->setPageId("MASTER_STATUS_LAYANAN");
        $data = [];

        $sitetitle = "Status Nama Layanan";
        $pagetitle = "Status Nama Layanan";
        $view = "status_layanan/v_edit";
        $breadcrumbs = [
            [
                "title" => "Status Layanan",
                "link" => "",
                "is_actived" => false
            ],
            [
                "title" => "Status Nama Layanan",
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
        $data['dt_stat'] = $this->M_Status->Get($id);
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Update() {
        $id = $this->input->post('e_id', true);
        $data = [
            'mt_status_layanan.nama_stat' => $this->input->post('nama'),
            'mt_status_layanan.keterangan' => $this->input->post('ket'),
            '`mt_status_layanan`.`sysupdateuser`' => $this->session->userdata('DX_user_id') + false,
            'mt_status_layanan.sysupdatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Status->Update($id, $data);
        if ($exec == true) {
            $direct = redirect(base_url('datamaster/Status/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('datamaster/Status/index/'), 'refresh');
        }
        return $direct;
    }

    public function Add() {
        $data = [
            'mt_status_layanan.nama_stat' => $this->input->post('nama'),
            'mt_status_layanan.keterangan' => $this->input->post('ket'),
            '`mt_status_layanan`.`stat`' => 1 + false,
            '`mt_status_layanan`.`syscreateuser`' => $this->session->userdata('DX_user_id') + false,
            'mt_status_layanan.syscreatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Status->Add($data);
        if ($exec == true) {
            $direct = redirect(base_url('datamaster/Status/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('datamaster/Status/index/'), 'refresh');
        }
        return $direct;
    }

}

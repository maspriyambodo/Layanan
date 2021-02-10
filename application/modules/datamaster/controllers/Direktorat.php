<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Direktorat extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Direktorat');
    }

    public function index() {
        $this->template->setPageId("SETTING_DIREKTORAT");
        $data = [];

        $sitetitle = "Daftar Nama Direktorat";
        $pagetitle = "Daftar Nama Direktorat";
        $view = "direktorat/direktorat";
        $breadcrumbs = [
            [
                "title" => "Data Direktorat",
                "link" => "",
                "is_actived" => false
            ],
            [
                "title" => "Daftar Nama Direktorat",
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
        $data['direktorat'] = $this->M_Direktorat->index();
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Get_all() {
        $data = $this->M_Direktorat->index();
        $result = ["data" => $data, "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Add() {
        $this->template->setPageId("SETTING_DIREKTORAT");
        $data = [];

        $sitetitle = "Tambah Nama Direktorat";
        $pagetitle = "Tambah Nama Direktorat";
        $view = "direktorat/direktorat_add";
        $breadcrumbs = [
            [
                "title" => "Data Direktorat",
                "link" => base_url('datamaster/Direktorat/index/'),
                "is_actived" => false,
            ],
            [
                "title" => "Tambah Nama Direktorat",
                "link" => "",
                "is_actived" => true,
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

    public function Edit($id) {
        $this->template->setPageId("SETTING_DIREKTORAT");
        $data = [];

        $sitetitle = "Tambah Nama Direktorat";
        $pagetitle = "Tambah Nama Direktorat";
        $view = "direktorat/direktorat_edit";
        $breadcrumbs = [
            [
                "title" => "Data Direktorat",
                "link" => base_url('datamaster/Direktorat/index/'),
                "is_actived" => false,
            ],
            [
                "title" => "Tambah Nama Direktorat",
                "link" => "",
                "is_actived" => true,
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
        $data['direktorat'] = $this->M_Direktorat->Get($id);
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Save() {
        $data = [
            'mt_direktorat.nama' => $this->input->post('nama', true),
            'mt_direktorat.keterangan' => $this->input->post('ket', true),
            '`mt_direktorat`.`stat`' => 1 + false,
            '`mt_direktorat`.`syscreateuser`' => $this->session->userdata('DX_user_id') + false,
            'mt_direktorat.syscreatedate' => date('Y-m-d H:i:s')
        ];
        $exec = $this->M_Direktorat->Add($data);
        if ($exec == true) {
            $direct = redirect(base_url('datamaster/Direktorat/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('datamaster/Direktorat/index/'), 'refresh');
        }
        return $direct;
    }

    public function Update() {
        $id = $this->input->post('e_id', true);
        $data = [
            'mt_direktorat.nama' => $this->input->post('e_direk', true),
            'mt_direktorat.keterangan' => $this->input->post('e_ket', true),
            '`mt_direktorat`.`sysupdateuser`' => $this->session->userdata('DX_user_id') + false,
            'mt_direktorat.sysupdatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Direktorat->Update($id, $data);
        if ($exec == true) {
            $direct = redirect(base_url('datamaster/Direktorat/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('datamaster/Direktorat/index/'), 'refresh');
        }
        return $direct;
    }

    public function Delete() {
        $id = $this->input->post('id');
        $data = [
            '`mt_direktorat`.`stat`' => 3 + false,
            'mt_direktorat.sysdeletedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Direktorat->Update($id, $data);
        if ($exec == true) {
            $direct = toJSON(resultSuccess("OK", 1));
        } else {
            $direct = toJSON(resultError("Error", 0));
        }
        return $direct;
    }

}

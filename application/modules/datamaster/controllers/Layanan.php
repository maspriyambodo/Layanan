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
 * Description of Layanan
 *
 * @author centos
 */
class Layanan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Layanan');
    }

    public function index() {
        $this->template->setPageId("MASTER_LAYANAN");
        $data = array();

        $sitetitle = "Daftar Nama Layanan";
        $pagetitle = "Daftar Nama Layanan";
        $view = "layanan/layanan";
        $breadcrumbs = array(
            array(
                "title" => "Data Layanan",
                "link" => "",
                "is_actived" => false,
            ),
            array(
                "title" => "Daftar Nama Layanan",
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
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Add() {
        $data = [
            'mt_layanan.nama_layanan' => $this->input->post('nama', true),
            'mt_layanan.jenis_layanan' => $this->input->post('direk', true),
            'mt_layanan.keterangan' => $this->input->post('ket', true),
            '`mt_layanan`.`stat`' => 1 + false,
            '`mt_layanan`.`syscreateuser`' => $this->session->userdata('id') + false,
            'mt_layanan.syscreatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Layanan->Add($data);
        if ($exec == true) {
            $direct = redirect(base_url('datamaster/Layanan/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('datamaster/Layanan/index/'), 'refresh');
        }
        return $direct;
    }

    public function Tambah() {
        $this->template->setPageId("MASTER_LAYANAN");
        $data = array();

        $sitetitle = "Tambah Nama Layanan";
        $pagetitle = "Tambah Nama Layanan";
        $view = "layanan/layanan_add";
        $breadcrumbs = array(
            array(
                "title" => "Data Layanan",
                "link" => base_url('datamaster/Layanan/index/'),
                "is_actived" => false,
            ),
            array(
                "title" => "Tambah Nama Layanan",
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
        $data["js_inlines"] = $js_inlines;
        $data['direktorat'] = $this->M_Layanan->Direktorat();
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Delete() {
        $id = $this->input->post('id', true);
        $data = [
            '`mt_layanan`.`stat`' => 3 + false,
            '`mt_layanan`.`sysdeleteuser`' => $this->session->userdata('id') + false,
            'mt_layanan.sysdeletedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Layanan->Update($id, $data);
        if ($exec == true) {
            $direct = toJSON(resultSuccess("OK", 1));
        } else {
            $direct = toJSON(resultSuccess("Error", 0));
        }
        return $direct;
    }

    public function Edit($id) {
        $this->template->setPageId("MASTER_LAYANAN");
        $data = [];
        $sitetitle = "Ubah Nama Layanan";
        $pagetitle = "Ubah Nama Layanan";
        $view = "layanan/layanan_edit";
        $breadcrumbs = [
            [
                "title" => "Data Layanan",
                "link" => base_url('datamaster/Layanan/index/'),
                "is_actived" => false
            ],
            [
                "title" => "Ubah Nama Layanan",
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
        $data['layanan'] = $this->M_Layanan->Get($id);
        $data['direktorat'] = $this->M_Layanan->Direktorat();
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Update() {
        $id = $this->input->post('e_id', true);
        $data = [
            'mt_layanan.nama_layanan' => $this->input->post('e_nama', true),
            'mt_layanan.keterangan' => $this->input->post('ket', true),
            '`mt_layanan`.`jenis_layanan`' => $this->input->post('e_direk', true) + false,
            '`mt_layanan`.`sysupdateuser`' => $this->session->userdata('id') + false,
            'mt_layanan.sysupdatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Layanan->Update($id, $data);
        if ($exec == true) {
            $direct = redirect(base_url('datamaster/Layanan/index/'), 'refresh');
        } else {
            $direct = redirect(base_url('datamaster/Layanan/index/'), 'refresh');
        }
        return $direct;
    }

    public function Get_all() {
        $data = $this->M_Layanan->index();
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

}

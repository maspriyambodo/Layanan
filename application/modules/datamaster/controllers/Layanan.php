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
        $data = [
            'username' => $this->session->userdata('username'),
            'title' => 'Daftar Layanan | Master Data',
            'notif_diterima' => $this->M_App->Diterima(),
            'csrf' => $this->Csrf(),
            'layanan' => $this->M_Layanan->index(),
            'kategori' => $this->M_Layanan->Kategori()
        ];
        $data['content'] = $this->parser->parse('V_layanan', $data, true);
        return $this->parser->parse('Template', $data);
    }

    public function Add() {
        $data = [
            'mst_layanan.nama_layanan' => $this->input->post('nama', true),
            'mst_layanan.jenis_layanan' => $this->bodo->Dec($this->input->post('kategori', true)),
            '`mst_layanan`.`stat`' => 1 + false,
            '`mst_layanan`.`syscreateuser`' => $this->session->userdata('id') + false,
            'mst_layanan.syscreatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Layanan->Add($data);
        if ($exec == true) {
            $direct = redirect(base_url('Admin/Layanan/index/'), $this->session->set_flashdata('success', 'Nama Layanan berhasil disimpan!'));
        } else {
            $direct = redirect(base_url('Admin/Layanan/index/'), $this->session->set_flashdata('error', 'Nama Layanan gagal disimpan!'));
        }
        return $direct;
    }

    public function Delete() {
        $id = $this->bodo->Dec($this->input->post('h_id', true));
        $data = [
            '`mst_layanan`.`stat`' => 3 + false,
            '`mst_layanan`.`sysdeleteuser`' => $this->session->userdata('id') + false,
            'mst_layanan.sysdeletedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Layanan->Update($id, $data);
        if ($exec == true) {
            $direct = redirect(base_url('Admin/Layanan/index/'), $this->session->set_flashdata('success', 'Nama Layanan berhasil dihapus!'));
        } else {
            $direct = redirect(base_url('Admin/Layanan/index/'), $this->session->set_flashdata('error', 'Nama Layanan gagal dihapus!'));
        }
        return $direct;
    }

    public function Update() {
        $id = $this->bodo->Dec($this->input->post('e_id', true));
        $data = [
            'mst_layanan.nama_layanan' => $this->input->post('e_nama', true),
            '`mst_layanan`.`jenis_layanan`' => $this->bodo->Dec($this->input->post('e_direk', true)) + false,
            '`mst_layanan`.`sysupdateuser`' => $this->session->userdata('id') + false,
            'mst_layanan.sysupdatedate' => date("Y-m-d H:i:s")
        ];
        $exec = $this->M_Layanan->Update($id, $data);
        if ($exec == true) {
            $direct = redirect(base_url('Admin/Layanan/index/'), $this->session->set_flashdata('success', 'Nama Layanan berhasil diubah!'));
        } else {
            $direct = redirect(base_url('Admin/Layanan/index/'), $this->session->set_flashdata('error', 'Nama Layanan gagal diubah!'));
        }
        return $direct;
    }

}

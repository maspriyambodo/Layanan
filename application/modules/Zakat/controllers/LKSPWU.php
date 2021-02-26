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
 * Description of LKSPWU
 *
 * @author centos
 */
class LKSPWU extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['M_lkspwu' => 'M_lkspwu']);
    }

    private function Upload_dokmohon($param) {
        $config['upload_path'] = FCPATH . 'assets/uploads/zakat/lkspwu/';
        $config['file_name'] = date("YmdHis");
        $config['allowed_types'] = 'gif|jpg|png|jpeg|gif|bmp|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = 2048;
        $config['maintain_ratio'] = true;
        $config['file_ext_tolower'] = true;
        $config['remove_spaces'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param) == true) {
            $data = $this->upload->data();
//            $picture = ['id' => '', 'nik' => $this->result[0]->nik, 'nopen' => $this->uri->segment(4), 'tgl_input' => date("Y-m-d h:i:s"), 'path' => "assets/images/lap_marketing/" . $data['file_name']];
//            $this->M_Interaksi->Insertpict($picture);
            $result = $data;
        } else {
            log_message('error', $this->upload->display_errors('<p>', '</p>'));
            $result = false;
        }
        return $result;
    }

    private function Remove_residual($data) {
        unlink(FCPATH . 'assets/uploads/zakat/lkspwu/' . $data['dok1']['file_name']);
        unlink(FCPATH . 'assets/uploads/zakat/lkspwu/' . $data['dok2']['file_name']);
        unlink(FCPATH . 'assets/uploads/zakat/lkspwu/' . $data['dok3']['file_name']);
        unlink(FCPATH . 'assets/uploads/zakat/lkspwu/' . $data['dok4']['file_name']);
        unlink(FCPATH . 'assets/uploads/zakat/lkspwu/' . $data['dok5']['file_name']);
        return true;
    }

    public function index() {
        $this->template->setPageId("DITERIMA_IPLKSPWU");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Lembaga Keuangan Syariah Penerima Wakaf Uang";
        $pagetitle = "Penunjukkan LKSPWU";
        $view = "lkspwu/index";
        $breadcrumbs = [
            [
                "title" => "Permohonan Masuk",
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
        $result = ["data" => $this->M_lkspwu->index($data), "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Tambah() {
        $this->template->setPageId("DITERIMA_IPLKSPWU");
        $data = [];
        $data['provinsi'] = $this->M_lkspwu->Provinsi();
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Tambah Penunjukkan LKSPWU";
        $pagetitle = "Penunjukkan LKSPWU";
        $view = "lkspwu/tambah";
        $breadcrumbs = [["title" => "Permohonan", "link" => base_url('Zakat/LKSPWU/index/'), "is_actived" => false,], ["title" => "Tambah", "link" => "", "is_actived" => true,]];
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

    public function Simpan() {
        $data = [
            'user_input' => $this->session->userdata('DX_user_id'),
            'dok1' => $this->Upload_dokmohon("sp_1"),
            'dok2' => $this->Upload_dokmohon("anggaran"),
            'dok3' => $this->Upload_dokmohon("sk_hukum"),
            'dok4' => $this->Upload_dokmohon("skdu"),
            'dok5' => $this->Upload_dokmohon("lapkeu"),
            'sys_user' => [
                'satu' => $this->input->post('ktp'),
                'dua' => $this->input->post('lahir_pemohon'),
                'tiga' => $this->input->post('uname'),
                'empat' => $this->input->post('nama'),
                'lima' => $this->input->post('mali'),
                'enam' => $this->input->post('telpon')
            ],
            'dt_layanan' => [
                'id_stat' => 1,
                'tujuh' => $this->input->post('provinsi_pemohon'),
                'delapan' => $this->input->post('kabupaten_pemohon'),
                'sembilan' => $this->input->post('kectxt_pemohon'),
                'sepuluh' => $this->input->post('keltxt_pemohon'),
                'keterangan_kegiatan' => null,
                'jenis_layanan' => 6
            ],
            'nm_instansi' => [
                'sebelas' => $this->input->post('instansi'),
                'duabelas' => $this->input->post('prov_instansi'),
                'tigabelas' => $this->input->post('kabupaten_instansi'),
                'empatbelas' => $this->input->post('kec_instansi'),
                'limabelas' => $this->input->post('kel_instansi'),
                'enambelas' => $this->input->post('alamat_instansi'),
                'tujuhbelas' => $this->input->post('tlepon_instansi'),
                'delapanbelas' => $this->input->post('mali_instansi'),
                'sembilanbelas' => $this->input->post('sk_keu'),
                'duapuluh' => $this->input->post('titipan')
            ]
        ];
        return $this->Simpenan($data);
    }

    private function Simpenan($data) {
        if (!$data['dok1']) {
            log_message('error', APPPATH . 'modules/Zakat/LKSPWU/Simpenan/ ' . ' error ketika upload surat permohonan tertulis kepada menteri agama');
            $this->Remove_residual($data);
            redirect(base_url('Zakat/LKSPWU/Tambah'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokmohon surat permohonan'));
        } elseif (!$data['dok2']) {
            log_message('error', APPPATH . 'modules/Zakat/LKSPWU/Simpenan/ ' . ' error ketika upload anggaran dasar');
            $this->Remove_residual($data);
            redirect(base_url('Zakat/LKSPWU/Tambah'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokmohon anggaran dasa'));
        } elseif (!$data['dok3']) {
            log_message('error', APPPATH . 'modules/Zakat/LKSPWU/Simpenan/ ' . ' error ketika upload SK badan hukum');
            $this->Remove_residual($data);
            redirect(base_url('Zakat/LKSPWU/Tambah'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokmohon SK badan hukum'));
        } elseif (!$data['dok4']) {
            log_message('error', APPPATH . 'modules/Zakat/LKSPWU/Simpenan/ ' . ' error ketika upload SKDU');
            $this->Remove_residual($data);
            redirect(base_url('Zakat/LKSPWU/Tambah'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokmohon SKDU'));
        } elseif (!$data['dok5']) {
            log_message('error', APPPATH . 'modules/Zakat/LKSPWU/Simpenan/ ' . ' error ketika upload laporan keuangan wakaf uang');
            $this->Remove_residual($data);
            redirect(base_url('Zakat/LKSPWU/Tambah'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokmohon laporan keuangan wakaf uang'));
        } else {
            $exec = $this->M_lkspwu->Simpan($data);
            if ($exec['status'] == true) {
                redirect(base_url('Zakat/LKSPWU/index/'), $this->session->set_flashdata('sukses', 'Berhasil tambah data LKSPWU!'));
            } else {
                $this->Remove_residual($data);
                redirect(base_url('Zakat/LKSPWU/Tambah/'), $this->session->set_flashdata('gagal', $exec['pesan']));
            }
        }
    }

    public function Edit($id) {
        $this->template->setPageId("DITERIMA_IPLKSPWU");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => null
        ];
        $data['detil'] = $this->M_lkspwu->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url('Zakat/LKSPWU/index/'), 'refresh');
        } else {
            $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
            $data['provinsi'] = $this->M_lkspwu->Provinsi();
            $sitetitle = $data['detil']['nm_instansi'];
            $pagetitle = "LKSPWU";
            $view = "lkspwu/edit";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Zakat/LKSPWU/index/'),
                    "is_actived" => false
                ],
                [
                    "title" => "Edit",
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

    public function Update_dokmohon() {
        $data = [
            'id_layanan' => $this->input->post('id_layanan'),
            'id_dokmohon' => $this->input->post('id_dokmohon'),
            'file' => $this->Upload_dokmohon($this->input->post_get('dokmohon'))
        ];
        $field = $this->input->post_get('field');
        if ($data['file'] == false) {
            log_message('error', APPPATH . 'modules/Zakat/LKSPWU/Update_dokmohon ' . ' gagal ketika unggah dokumen anggaran_dasar');
            $respon = ['status' => 0, 'pesan' => 'error ketika unggah ' . str_replace('_', ' ', $this->input->post_get('dokmohon')) . '!'];
        } else {
            $exec = $this->M_lkspwu->Update_dokmohon($data, $field);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/zakat/lkspwu/' . $data['file']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'gagal ketika menyimpan data ' . str_replace('_', ' ', $this->input->post_get('dokmohon')) . '!'];
            } else {
                $respon = ['status' => 1, 'pesan' => str_replace('_', ' ', $this->input->post_get('dokmohon')) . ' berhasil diubah!', 'file_name' => $data['file']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

}

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
 * Description of Layanan_4
 *
 * @author centos
 */
class Layanan_4 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan4');
        $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    public function index() {
        $this->template->setPageId("DITERIMA_SDDN");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Data Izin Safari Dakwah Dalam Negeri";
        $pagetitle = "Data Izin Safari Dakwah Dalam Negeri";
        $view = "layanan4/v_index";
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

    public function Get_all() {
        $data = [
            'id_stat' => $this->input->get('id')/* input get id_stat */,
            'jenis_layanan' => $this->input->get('jenis_layanan')/* input get jenis_layanan */
        ];
        $result = ["data" => $this->M_layanan4->index($data), "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Get_negara() {
        $exec = $this->M_layanan4->Get_negara();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Get_provinsi() {
        $exec = $this->M_layanan4->Provinsi();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Tambah() {
        $this->template->setPageId("DITERIMA_SDDN");
        $data = [];
        $data['user_demo'] = $this->M_layanan4->get_userdemo();
        $data['provinsi'] = $this->M_layanan4->Provinsi();
        $data['negara'] = $this->M_layanan4->Get_negara();
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Izin Safari Dakwah Dalam Negeri";
        $pagetitle = "Izin Safari Dakwah Dalam Negeri";
        $view = "layanan4/v_tambah";
        $breadcrumbs = [["title" => "Permohonan Masuk", "link" => base_url('Urais/Layanan_4/index/'), "is_actived" => false,], ["title" => "Tambah", "link" => "", "is_actived" => true,]];
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

    private function Upload_dokmohon($param) {
        $config['upload_path'] = FCPATH . 'assets/uploads/binsyar/';
        $config['file_name'] = 'Layanan4_' . date("YmdHis");
        $config['allowed_types'] = 'gif|jpg|png|jpeg|gif|bmp|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = 2048;
        $config['maintain_ratio'] = true;
        $config['file_ext_tolower'] = true;
        $config['remove_spaces'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param) == true) {
            $result = $this->upload->data();
        } else {
            redirect(base_url('Urais/Layanan_4/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokumen kegiatan!'));
        }
        return $result;
    }

    private function Dok_array($param) {
        $config['upload_path'] = FCPATH . 'assets/uploads/binsyar/';
        $config['file_name'] = 'narsum_' . date("YmdHis");
        $config['allowed_types'] = 'gif|jpg|png|jpeg|gif|bmp|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = 2048;
        $config['maintain_ratio'] = true;
        $config['file_ext_tolower'] = true;
        $config['remove_spaces'] = true;
        $this->load->library('CommonMethods');
        $uploads = $this->commonmethods->do_upload_multiple_files($param, $config);
        if ($uploads['status'] == false) {
            redirect(base_url('Urais/Layanan_4/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokumen penceramah!'));
        } else {
            $result = $uploads['status'];
        }
        return $result;
    }

    public function Simpan() {
        $cv_narsum = $this->Dok_array("cv_narsum");
        $paspor_narsum = $this->Dok_array("paspor_narsum");
        $scan_doks = $this->Dok_array("scan_doks");
        $ktp_docs = $this->Dok_array("ktp_docs");
        $foto_narsum = $this->Dok_array("foto_narsum");
        $sp_keg = $this->Upload_dokmohon("sp_keg");
        $proposal = $this->Upload_dokmohon("proposal");
        $data = [
            'sys_user' => [
                'no_ktp' => $this->input->post('ktp'),
                'tanggal_lahir' => $this->input->post('lahir_pemohon'),
                'uname' => $this->input->post('uname'),
                'nama_lengkap' => $this->input->post('nama'),
                'mail_user' => $this->input->post('mali'),
                'telepon' => $this->input->post('telpon')
            ],
            'dt_layanan' => [
                'provinsi' => $this->input->post('provinsi_pemohon'),
                'kabupaten' => $this->input->post('kabupaten_pemohon'),
                'kecamatan' => $this->input->post('kectxt_pemohon'),
                'kelurahan' => $this->input->post('keltxt_pemohon'),
                'keterangan_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('keterangan_kegiatan')),
                'mt_layanan' => 13
            ],
            'dt_kegiatan' => [
                'nama_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('nm_keg')),
                'jumlah_peserta' => $this->input->post('esti_keg'),
                'lembaga' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('lemb_keg')),
                'tmt_awal' => $this->input->post('tgl_awal_keg'),
                'tmt_akhir' => $this->input->post('tgl_akhir_keg'),
                'alamat_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('alamat_kegiatan'))
            ],
            'dt_layanan_dokumen' => [
                'surat_permohonan_safari' => $sp_keg['file_name'],
                'proposal_safari' => $proposal['file_name']
            ],
            'dt_penceramah' => [
                'narsum' => $this->input->post('ceramah'),
                'tmp_lhr' => $this->input->post('tmp_lahir'),
                'tgl_lhr' => $this->input->post('lahir_narsum'),
                'kelamin' => $this->input->post('jkel'),
                'pendidikan' => $this->input->post('pddk_formal'),
                'pendidikan_non' => $this->input->post('pddk_non'),
                'almt_penceramah' => $this->input->post('alamat_ceramah'),
                'cv' => $cv_narsum,
                'fc_passport' => $paspor_narsum,
                'sc_ktp' => $ktp_docs,
                'pas_foto' => $foto_narsum,
                'sc_sertifikat' => $scan_doks
            ]
        ];
        // print_array($data['dt_penceramah']);
        // die();
        $this->Simpenan($data);
    }

    private function Simpenan($data) {// fungsi untuk simpan tambah data baru, dibuat kerna kepanjangan beut!
        $exec = $this->M_layanan4->Simpenan($data);
        if ($exec['status'] == true) {
            redirect(base_url('Urais/Layanan_4/index/'), $this->session->set_flashdata('sukses', 'Berhasil tambah permohonan safari dakwah dalam negeri!'));
        } else {
            redirect(base_url('Urais/Layanan_4/Tambah/'), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
    }

    public function Hapus() {
        $data = [
            'id_layanan' => $this->input->post('id'),
            'user_id' => $this->session->userdata('DX_user_id'),
            'status_id' => 3
        ];
        $exec = $this->M_layanan4->Delete_layanan($data);
        if (empty($exec) or $exec->conn_id->sqlstate != 00000) {
            $direct = toJSON(resultError("Error", 0));
        } else {
            $direct = toJSON(resultSuccess("OK", 1));
        }
        return $direct;
    }

    public function Detail($id) {
        $this->template->setPageId("DITERIMA_SDDN");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => null
        ];
        $data['detil'] = $this->M_layanan4->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url(''), 'refresh');
        } else {
            $sitetitle = $data['detil'][0]->nm_keg;
            if ($data['detil'][0]->stat_id == 1) {
                $pagetitle = "<b>Status: </b><span class='text-info'>" . $data['detil'][0]->nama_stat . "</span>";
            } elseif ($data['detil'][0]->stat_id == 2) {
                $pagetitle = "<b>Status: </b><span class='text-warning'>" . $data['detil'][0]->nama_stat . "</span>";
            } elseif ($data['detil'][0]->stat_id == 3) {
                $pagetitle = "<b>Status: </b><span class='text-success'>" . $data['detil'][0]->nama_stat . "</span>";
            } else {
                $pagetitle = "<b>Status: </b><span class='text-danger'>" . $data['detil'][0]->nama_stat . "</span>";
            }
            $view = "layanan3/v_detail";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Urais/Layanan_4/index/'),
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

    public function Edit($id) {
        $this->template->setPageId("DITERIMA_SDDN");
        $data = [];
        $detil_param = [
            'id' => $id,
            'stat_id' => null
        ];
        $data['detil'] = $this->M_layanan4->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url('Urais/Layanan_4/index/'), 'refresh');
        } else {
            $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
            $data['provinsi'] = $this->M_layanan4->Provinsi();
            $sitetitle = $data['detil'][0]->nm_keg;
            $pagetitle = "Edit Izin Safari Dakwah Dalam Negeri";
            $view = "layanan4/v_edit";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Urais/Layanan_4/index/'),
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

    //-------------------------------------------------------- Query Bagus
    public function Proses()
    {
        $this->template->setPageId("DIPROSES_SDDN");
        $data = array();

        $sitetitle = "Data Ijin Safari Dakwah Dalam Negeri";
        $pagetitle = "Data Ijin Safari Dakwah Dalam Negeri";
        $view = "layanan3/v_prosess";
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
        $data['proses'] = $this->M_layanan4->data_diproses();
        // var_dump($data['proses']);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    function UpdatePemohon()
    {
        $id = $this->input->post("id");
        $data = array(
            "id_user" => $this->input->post("id_user"),
            "id_provinsi" => $this->input->post("provinsi"),
            "id_kabupaten" => $this->input->post("kabupaten"),
            "id_kecamatan" => $this->input->post("kecamatan"),
            "id_kelurahan" => $this->input->post("kelurahan"),
            "keterangan" => $this->input->post("keterangan_pemohon"),
            "id_stat" => 1,
            "stat" => 1,
            "sysupdateuser" => $this->input->post("id_user"),
            "sysupdatedate" => date("Y-m-d H:i:s")
        );

        if(!empty($data)){
            $this->M_layanan4->UpdateLayanan($id, $data);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        }else{
            $this->Edit($id);
        }
    }

    function UpdateKegiatan()
    {
        $id_layanan = $this->input->post("id_layanan");
        $data = array(
            "nm_keg" => $this->input->post("nm_keg"),
            "tgl_awal_keg" => $this->input->post("tgl_awal_keg"),
            "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg"),
            "esti_keg" => $this->input->post("esti_keg"),
            "lemb_keg" => $this->input->post("lemb_keg"),
            "alamat_keg" => $this->input->post("alamat_kegiatan"),
            "ket_keg" => $this->input->post("keterangan_kegiatan"),
            "code_negara" => 101
        );

        if(!empty($data)){
            $this->M_layanan4->UpdateAcara($id_layanan, $data);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        }else{
            $this->Edit($id);
        }
    }

    function UpdatePenceramah()
    {
        $id = $this->input->post("id");
        $cek = array(
            "id_layanan" => $this->input->post("id_layanan"),
            "ceramah" => $this->input->post("ceramah"),
            "tmp_lahir" => $this->input->post("tmp_lahir"),
            "lahir_narsum" => $this->input->post("lahir_narsum"),
            "jkel" => $this->input->post("jkel"),
            "pddk_formal" => $this->input->post("pddk_formal"),
            "pddk_non" => $this->input->post("pddk_non"),
            "alamat_ceramah" => $this->input->post("alamat_ceramah")
        );

        $teks = array();
        $index = 0;
        foreach($id as $i)
        {
            array_push($teks, array(
                'id' => $i,
                'id_layanan' => $cek['id_layanan'][$index],
                'narsum' => $cek['ceramah'][$index],
                'tmp_lhr' => $cek['tmp_lahir'][$index],
                'tgl_lhr' => $cek['lahir_narsum'][$index],
                'jns_kelamin' => $cek['jkel'][$index],
                'pddk_formal' => $cek['pddk_formal'][$index],
                'pddk_non' => $cek['pddk_non'][$index],
                'almt_penceramah' => $cek['alamat_ceramah'][$index]
            ));
            $index++;
        }
    }

    function Status_Diproses()
    {
        $kondisi = array(
            "a.stat" => 1,
            "a.id_stat" => 2,
            "a.jenis_layanan" => 3,
            // "b.role_id" => 6,
            "f.id" => 2
        );

        $query = $this->db->select("a.id, a.id_stat, concat(LPAD(f.id, 2, 0),'.',LPAD(c.id, 2, 0),'.',LPAD(MONTH(a.syscreatedate), 2, 0),'.',YEAR(a.syscreatedate),'.',LPAD(a.id, 4, 0)) as kode, b.fullname, b.nik, c.nama_layanan, d.nm_keg, d.tgl_awal_keg, d.tgl_akhir_keg, d.esti_keg, count(e.id) as jumlah,
            case
            when g.id = 1 then '<b><span class=text-info>permohonan masuk</span></b>'
            when g.id = 2 then '<b><span class=text-warning>permohonan diproses</span></b>'
            when g.id = 3 then '<b><span class=text-success>direkomendasi</span></b>'
            when g.id = 4 then '<b><span class=text-danger>tidak direkomendasi</span></b>'
            end as nama_stat
            ")
                ->from("dt_layanan a")
                ->join("sys_users b", "a.id_user = b.id", "LEFT")
                ->join("mt_layanan c", "a.jenis_layanan = c.id", "LEFT")
                ->join("dt_kegiatan d", "a.id = d.id_layanan", "LEFT")
                ->join("dt_penceramah e", "a.id = e.id_layanan", "LEFT")
                ->join("mt_direktorat f", "c.jenis_layanan = f.id", "LEFT")
                ->join("mt_status_layanan g","a.id_stat = g.id","LEFT")
                ->where($kondisi)
                ->group_by("a.id");

        $get = $this->db->get();
        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
    }

    public function Joinan_binsyar()
    {
        $kondisi = array(
            "a.stat" => 1,
            "a.jenis_layanan" => 13,
            "b.role_id" => 6,
            "f.id" => 2
        );

        $query = $this->db->select("a.id, a.id_stat, concat(LPAD(f.id, 2, 0),'.',LPAD(c.id, 2, 0),'.',LPAD(MONTH(a.syscreatedate), 2, 0),'.',YEAR(a.syscreatedate),'.',LPAD(a.id, 4, 0)) as kode, b.fullname, b.nik, c.nama_layanan, d.nm_keg, d.tgl_awal_keg, d.tgl_akhir_keg, d.esti_keg, count(e.id) as jumlah,
            case
            when g.id = 1 then '<b><span class=text-info>permohonan masuk</span></b>'
            when g.id = 2 then '<b><span class=text-warning>permohonan diproses</span></b>'
            when g.id = 3 then '<b><span class=text-success>direkomendasi</span></b>'
            when g.id = 4 then '<b><span class=text-danger>tidak direkomendasi</span></b>'
            end as nama_stat
            ")
                ->from("dt_layanan a")
                ->join("sys_users b", "a.id_user = b.id", "LEFT")
                ->join("mt_layanan c", "a.jenis_layanan = c.id", "LEFT")
                ->join("dt_kegiatan d", "a.id = d.id_layanan", "LEFT")
                ->join("dt_penceramah e", "a.id = e.id_layanan", "LEFT")
                ->join("mt_direktorat f", "c.jenis_layanan = f.id", "LEFT")
                ->join("mt_status_layanan g","a.id_stat = g.id","LEFT")
                ->where($kondisi)
                // ->limit(1)
                // ->order_by("a.id","DESC")
                ->group_by("a.id");

        $get = $this->db->get();
        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
    }

    public function DiProses()
    {
        $id = $this->input->post("id");
        $kondisi = array(
            'id_stat' => 2,
            'sysupdateuser' => $this->session->userdata('DX_user_id'),
            'sysupdatedate' => date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id', $id);
        $this->db->update('dt_layanan');

        echo toJSON(resultSuccess("OK",1));
    }

    public function Hapuss()
    {
        $id = $this->input->post("id");
        $kondisi = array(
            'stat' => 3,
            'sysdeleteuser' => $this->session->userdata('DX_user_id'),
            'sysdeletedate' => date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id', $id);
        $this->db->update('dt_layanan');

        echo toJSON(resultSuccess("OK",1));
    }

    public function Verifikasi($id)
    {
        $this->template->setPageId("DIPROSES_SDDN");
        $data = array();

        $sitetitle = "Data Ijin Safari Dakwah Dalam Negeri";
        $pagetitle = "Data Ijin Safari Dakwah Dalam Negeri";
        $view = "layanan3/v_rekomendasi";
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
        $data['pemohon'] = $this->M_layanan4->detail_permohonan($id);
        $data['kegiatan'] = $this->M_layanan4->detail_kegiatan($id);
        $data['narsum'] = $this->M_layanan4->detail_narsum($id);
        $data['lampiran'] = $this->M_layanan4->detail_lampiran($id);
        $data['status'] = $this->M_layanan4->status_rekomendasi();
        // var_dump($data['proses']);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function Proses_verifikasi()
    {
        $id_layanan = $_POST['id_layanan'];
        $id_stat = $_POST['id_stat'];
        $alasan_tolak = $_POST['alasan_tolak'];

        if($id_stat == 3){
            $data = array(
                "id_stat" => $id_stat,
                "sysupdateuser" => $this->session->userdata('DX_user_id'),
                "sysupdatedate" => date('Y-m-d h:i:s')
            );
            $this->M_layanan4->kirim_rekomendasi($data, $id_layanan);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('Urais/L4_Setuju')."';</script>";
        }else if($id_stat == 4){
            $data = array(
                "id_stat" => $id_stat,
                "alasan_tolak" => $alasan_tolak,
                "sysupdateuser" => $this->session->userdata('DX_user_id'),
                "sysupdatedate" => date('Y-m-d h:i:s')
            );
            $this->M_layanan4->kirim_rekomendasi($data, $id_layanan);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('Urais/L4_Tolak')."';</script>";
        }
    }

    public function Details($id) {
        $this->template->setPageId("DITERIMA_IDDLN");
        $data = array();

        $sitetitle = "Detail Ijin Safari Dakwah Dalam Negeri";
        $pagetitle = "Detail Ijin Safari Dakwah Dalam Negeri";
        $view = "layanan3/v_details";
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
        $data['pemohon'] = $this->M_layanan4->detail_permohonan($id);
        $data['kegiatan'] = $this->M_layanan4->detail_kegiatan($id);
        $data['narsum'] = $this->M_layanan4->detail_narsum($id);
        $data['lampiran'] = $this->M_layanan4->detail_lampiran($id);
        // var_dump($data['lampiran'][1]->proposal_luar);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
        }

}

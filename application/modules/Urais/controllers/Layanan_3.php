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
 * Description of Layanan_3
 *
 * @author centos
 */
class Layanan_3 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan3');
        $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    public function index() {
        $this->template->setPageId("DITERIMA_IDDLN");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Data Izin Pengiriman Da'i Dari Luar Negeri";
        $pagetitle = "Data Izin Pengiriman Da'i Dari Luar Negeri";
        $view = "layanan3/v_index";
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
        $result = ["data" => $this->M_layanan3->index($data), "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Get_negara() {
        $exec = $this->M_layanan3->Get_negara();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Get_provinsi() {
        $exec = $this->M_layanan3->Provinsi();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Tambah() {
        $this->template->setPageId("DITERIMA_IDDLN");
        $data = [];
        $data['user_demo'] = $this->M_layanan3->get_userdemo();
        $data['provinsi'] = $this->M_layanan3->Provinsi();
        $data['negara'] = $this->M_layanan3->Get_negara();
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Izin Pengiriman Da'i Dari Luar Negeri";
        $pagetitle = "Izin Pengiriman Da'i Dari Luar Negeri";
        $view = "layanan3/v_tambah";
        $breadcrumbs = [["title" => "Permohonan Masuk", "link" => base_url('Urais/Layanan_3/index/'), "is_actived" => false,], ["title" => "Tambah", "link" => "", "is_actived" => true,]];
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
        $data["id_layanan"] = $this->M_layanan3->last_ID();
        // var_dump($data['id_layanan']->id);
        // die();
        $data["js_inlines"] = $js_inlines;
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    private function Upload_dokmohon($param) {
        $config['upload_path'] = FCPATH . 'assets/uploads/binsyar/';
        $config['file_name'] = 'Layanan3_' . date("YmdHis");
        $config['allowed_types'] = 'gif|jpg|png|jpeg|gif|bmp|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = 2048;
        $config['maintain_ratio'] = true;
        $config['file_ext_tolower'] = true;
        $config['remove_spaces'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param) == true) {
            $result = $this->upload->data();
        } else {
            redirect(base_url('Urais/Layanan_3/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokumen kegiatan!'));
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
            redirect(base_url('Urais/Layanan_3/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokumen penceramah!'));
        } else {
            $result = $uploads['status'];
        }
        return $result;
    }

    public function Simpan() {
        $cv_narsum = $this->Dok_array("cv_narsum");
        $paspor_narsum = $this->Dok_array("paspor_narsum");
        $ktp_docs = $this->Dok_array("ktp_docs");
        $foto_narsum = $this->Dok_array("foto_narsum");
        $sp_keg = $this->Upload_dokmohon("sp_keg");
        $proposal = $this->Upload_dokmohon("proposal");
        // $data["id_layanan"] = $this->M_layanan3->last_ID();

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
                'mt_layanan' => 3
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
                'surat_permohonan_dalam' => $sp_keg['file_name'],
                'proposal_dalam' => $proposal['file_name']
            ],
            'dt_penceramah' => [
                'narsum' => $this->input->post('ceramah'),
                'tmp_lhr' => $this->input->post('tmp_lahir'),
                'tgl_lhr' => $this->input->post('lahir_narsum'),
                'kelamin' => $this->input->post('jkel'),
                'no_paspor' => $this->input->post('pasport'),
                'almt_penceramah' => $this->input->post('alamat_ceramah'),
                'cv' => $cv_narsum,
                'fc_passport' => $paspor_narsum,
                'sc_ktp' => $ktp_docs,
                'pas_foto' => $foto_narsum
            ]
        ];
        // print_array($data);
        // // // // var_dump($data);
        // die();
        $this->Simpenan($data);
    }

    private function Simpenan($data) {// fungsi untuk simpan tambah data baru, dibuat kerna kepanjangan beut!
        $exec = $this->M_layanan3->Simpenan($data);
        if ($exec['status'] == true) {
            redirect(base_url('Urais/Layanan_3/index/'), $this->session->set_flashdata('sukses', 'Berhasil tambah permohonan penceramah dari luar negeri!'));
        } else {
            redirect(base_url('Urais/Layanan_3/Tambah/'), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
    }

    public function Hapus() {
        $data = [
            'id_layanan' => $this->input->post('id'),
            'user_id' => $this->session->userdata('DX_user_id'),
            'status_id' => 3
        ];
        $exec = $this->M_layanan3->Delete_layanan($data);
        if (empty($exec) or $exec->conn_id->sqlstate != 00000) {
            $direct = toJSON(resultError("Error", 0));
        } else {
            $direct = toJSON(resultSuccess("OK", 1));
        }
        return $direct;
    }

    public function Detail($id) {
        $this->template->setPageId("DITERIMA_IDDLN");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => null
        ];
        $data['detil'] = $this->M_layanan3->Detail($detil_param);
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
                    "link" => base_url('Urais/Layanan_3/index/'),
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
        $this->template->setPageId("DITERIMA_IDDLN");
        $data = array();

        $sitetitle = "Edit Data Ijin Penceramah Dari Luar Negeri";
        $pagetitle = "Edit Data Ijin Penceramah Dari Luar Negeri";
        // $view = "/users/binsyar/v_editdata_kegiatan";
        $view = "layanan3/v_edit";
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
        $data["pemohon"] = $this->M_layanan3->get_edit_pemohon($id);
        $data['provinsi'] = $this->M_layanan3->get_edit_provinsi();
        $data['kegiatan'] = $this->M_layanan3->get_edit_kegiatan($id);
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    //-------------------------------------------------------- Query Bagus
    public function Proses()
    {
        $this->template->setPageId("DIPROSES_IDDLN");
        $data = array();

        $sitetitle = "Data Ijin Penceramah Dari Luar Negeri";
        $pagetitle = "Data Ijin Penceramah Dari Luar Negeri";
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
        $data['proses'] = $this->M_layanan3->data_diproses();
        // var_dump($data['proses']);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
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
            "a.jenis_layanan" => 3,
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
        $this->template->setPageId("DIPROSES_IDDLN");
        $data = array();

        $sitetitle = "Data Ijin Penceramah Dari Luar Negeri";
        $pagetitle = "Data Ijin Penceramah Dari Luar Negeri";
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
        $data['pemohon'] = $this->M_layanan3->detail_permohonan($id);
        $data['kegiatan'] = $this->M_layanan3->detail_kegiatan($id);
        $data['narsum'] = $this->M_layanan3->detail_narsum($id);
        $data['lampiran'] = $this->M_layanan3->detail_lampiran($id);
        $data['status'] = $this->M_layanan3->status_rekomendasi();
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
            $this->M_layanan3->kirim_rekomendasi($data, $id_layanan);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('Urais/L3_Setuju')."';</script>";
        }else if($id_stat == 4){
            $data = array(
                "id_stat" => $id_stat,
                "alasan_tolak" => $alasan_tolak,
                "sysupdateuser" => $this->session->userdata('DX_user_id'),
                "sysupdatedate" => date('Y-m-d h:i:s')
            );
            $this->M_layanan3->kirim_rekomendasi($data, $id_layanan);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('Urais/L3_Tolak')."';</script>";
        }
    }

    public function Details($id) {
        $this->template->setPageId("DITERIMA_IDDLN");
        $data = array();

        $sitetitle = "Detail Ijin Penceramah Dari Luar Negeri";
        $pagetitle = "Detail Ijin Penceramah Dari Luar Negeri";
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
        $data['pemohon'] = $this->M_layanan3->detail_permohonan($id);
        $data['kegiatan'] = $this->M_layanan3->detail_kegiatan($id);
        $data['narsum'] = $this->M_layanan3->detail_narsum($id);
        $data['lampiran'] = $this->M_layanan3->detail_lampiran($id);
        // var_dump($data['lampiran'][1]->proposal_luar);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
        }

}

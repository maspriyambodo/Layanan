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
 * Description of Layanan_2
 *
 * @author centos
 */
class Layanan_2 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan2');
    }

    public function index() {
        $this->template->setPageId("DITERIMA_IDKLN");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "IZIN PENGIRIMAN DA`I ke LUAR NEGERI";
        $pagetitle = "Izin Pengiriman Da`i ke Luar Negeri";
        $view = "layanan2/v_index";
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
        $result = ["data" => $this->M_layanan2->index($data), "success" => true];
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Get_negara() {
        $exec = $this->M_layanan2->Get_negara();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Get_provinsi() {
        $exec = $this->M_layanan2->Provinsi();
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($exec, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Tambah() {
        $this->template->setPageId("DITERIMA_IDKLN");
        $data = [];
        $data['provinsi'] = $this->M_layanan2->Provinsi();
        $data['negara'] = $this->M_layanan2->Get_negara();
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "IZIN PENGIRIMAN DA`I ke LUAR NEGERI";
        $pagetitle = "IZIN PENGIRIMAN DA`I ke LUAR NEGERI";
        $view = "layanan2/v_tambah";
        $breadcrumbs = [["title" => "Permohonan Masuk", "link" => base_url('Urais/Layanan_2/index/'), "is_actived" => false,], ["title" => "Tambah", "link" => "", "is_actived" => true,]];
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
        $config['file_name'] = 'Layanan2_' . date("YmdHis");
        $config['allowed_types'] = 'gif|jpg|png|jpeg|gif|bmp|doc|docx|xls|xlsx|pdf';
        $config['max_size'] = 2048;
        $config['maintain_ratio'] = true;
        $config['file_ext_tolower'] = true;
        $config['remove_spaces'] = true;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload($param) == true) {
            $result = $this->upload->data();
        } else {
            redirect(base_url('Urais/Layanan_2/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokumen kegiatan!'));
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
            redirect(base_url('Urais/Layanan_2/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah dokumen penceramah!'));
        } else {
            $result = $uploads['status'];
        }
        return $result;
    }

    public function Simpan() {
        $cv_narsum = $this->Dok_array("cv_narsum");
        $paspor_narsum = $this->Dok_array("paspor_narsum");
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
                'mt_layanan' => 2
            ],
            'dt_kegiatan' => [
                'nama_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('nm_keg')),
                'jumlah_peserta' => $this->input->post('esti_keg'),
                'lembaga' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('lemb_keg')),
                'tmt_awal' => $this->input->post('tgl_awal_keg'),
                'tmt_akhir' => $this->input->post('tgl_akhir_keg'),
                'alamat_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('alamat_kegiatan')),
                'negara_tujuan' => $this->input->post('negara')
            ],
            'dt_layanan_dokumen' => [
                'surat_permohonan_luar' => $sp_keg['file_name'],
                'proposal_luar' => $proposal['file_name']
            ],
            'dt_penceramah' => [
                'narsum' => $this->input->post('ceramah'),
                'tmp_lhr' => $this->input->post('tmp_lahir'),
                'tgl_lhr' => $this->input->post('lahir_narsum'),
                'kelamin' => $this->input->post('jkel'),
                'no_paspor' => $this->input->post('pasport'),
                'id_provinsi' => $this->input->post('provinsi_narsum'),
                'id_kabupaten' => $this->input->post('kabupaten_narsum'),
                'id_kecamatan' => $this->input->post('kectxt_narsum'),
                'id_kelurahan' => $this->input->post('keltxt_narsum'),
                'almt_penceramah' => $this->input->post('alamat_ceramah'),
                'cv' => $cv_narsum,
                'fc_passport' => $paspor_narsum,
                'pas_foto' => $foto_narsum
            ]
        ];
        $this->Simpenan($data);
    }

    private function Simpenan($data) {// fungsi untuk simpan tambah data baru, dibuat kerna kepanjangan beut!
        $exec = $this->M_layanan2->Simpenan($data);
        if ($exec['status'] == true) {
            redirect(base_url('Urais/Layanan_2/index/'), $this->session->set_flashdata('sukses', 'Berhasil tambah permohonan penceramah keluar negeri!'));
        } else {
            redirect(base_url('Urais/Layanan_2/Tambah/'), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
    }

    public function Hapus() {
        $data = [
            'id_layanan' => $this->input->post('id'),
            'user_id' => $this->session->userdata('DX_user_id'),
            'status_id' => 3
        ];
        $exec = $this->M_layanan2->Delete_layanan($data);
        if (empty($exec) or $exec->conn_id->sqlstate != 00000) {
            $direct = toJSON(resultError("Error", 0));
        } else {
            $direct = toJSON(resultSuccess("OK", 1));
        }
        return $direct;
    }

    public function Detail($id) {
        $this->template->setPageId("DITERIMA_IDKLN");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => null
        ];
        $data['detil'] = $this->M_layanan2->Detail($detil_param);
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
            $view = "layanan2/v_detail";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Urais/Layanan_2/index/'),
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
        $this->template->setPageId("DITERIMA_IDKLN");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => null
        ];
        $data['detil'] = $this->M_layanan2->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url('Urais/Layanan_2/index/'), 'refresh');
        } else {
            $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
            $data['negara'] = $this->M_layanan2->Get_negara();
            $data['provinsi'] = $this->M_layanan2->Provinsi();
            $sitetitle = $data['detil'][0]->nm_keg;
            $pagetitle = "Izin Kegiatan Keagamaan";
            $view = "layanan2/v_edit";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Urais/Layanan_2/index/'),
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

    public function Get_narsum() {
        $data = [
            'id_layanan' => $this->input->post('id_layanan'),
            'id_penceramah' => $this->input->post('id_penceramah')
        ];
        $exec = $this->M_layanan2->Get_narsum($data);
        if (empty($exec)) {
            $result = [
                'status' => false,
                'msg' => 'kesalahan saat mengambil data penceramah!'
            ];
        } else {
            $result = [
                'status' => true,
                'data' => $exec
            ];
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function S_Cv() {
        $data = ['layanan_id' => $this->input->post('id_layanan'), 'penceramah_id' => $this->input->post('id_penceramah'), 'cv_penceramah' => $this->Upload_dokmohon('cv_penceramah')];
        if ($data['cv_penceramah'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_2/S_Cv/ ' . ' Gagal ketika unggah cv_penceramah');
            $respon = ['status' => 0, 'pesan' => 'kesalahan ketika unggah cv_penceramah!'];
        } else {
            $exec = $this->M_layanan2->S_Cv($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['cv_penceramah']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'kesalahan ketika menyimpan data cv_penceramah!'];
            } else {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $exec['old_cv']); //hapus berkas lama, agar tidak menjadi residu file dalam serper
                $respon = ['status' => 1, 'pesan' => 'cv penceramah berhasil diubah!', 'file_name' => $data['cv_penceramah']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function S_paspor() {
        $data = ['layanan_id' => $this->input->post('id_layanan'), 'penceramah_id' => $this->input->post('id_penceramah'), 'paspor_penceramah' => $this->Upload_dokmohon('paspor_penceramah')];
        if ($data['paspor_penceramah'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_2/S_paspor/ ' . ' Gagal ketika unggah paspor_penceramah');
            $respon = ['status' => 0, 'pesan' => 'kesalahan ketika unggah passport penceramah!'];
        } else {
            $exec = $this->M_layanan2->S_paspor($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['paspor_penceramah']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'kesalahan ketika menyimpan data paspor_penceramah!'];
            } else {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $exec['old_cv']); //hapus berkas lama, agar tidak menjadi residu file dalam serper
                $respon = ['status' => 1, 'pesan' => 'passport penceramah berhasil diubah!', 'file_name' => $data['paspor_penceramah']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function S_foto() {
        $data = ['layanan_id' => $this->input->post('id_layanan'), 'penceramah_id' => $this->input->post('id_penceramah'), 'foto_penceramah' => $this->Upload_dokmohon('foto_penceramah')];
        if ($data['foto_penceramah'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_2/S_foto/ ' . ' Gagal ketika unggah foto_penceramah');
            $respon = ['status' => 0, 'pesan' => 'kesalahan ketika unggah pas foto penceramah!'];
        } else {
            $exec = $this->M_layanan2->S_foto($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['foto_penceramah']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'kesalahan ketika menyimpan data foto_penceramah!'];
            } else {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $exec['old_cv']); //hapus berkas lama, agar tidak menjadi residu file dalam serper
                $respon = ['status' => 1, 'pesan' => 'pas foto penceramah berhasil diubah!', 'file_name' => $data['foto_penceramah']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function Update_narsum() {
        $data = [
            'nomor_passport' => $this->input->post('nomor_passport'),
            'nama_penceramah' => $this->input->post('nama_penceramah'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'id_prov' => $this->input->post('id_prov'),
            'id_kab' => $this->input->post('id_kab'),
            'id_kec' => $this->input->post('id_kec'),
            'id_kel' => $this->input->post('id_kel'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat_rumah' => $this->input->post('alamat_rumah'),
            'id_narsum' => $this->input->post('id_narsum'),
            'layanan_id' => $this->input->post('layanan_id'),
        ];
        $exec = $this->M_layanan2->Update_narsum($data);
        if (empty($exec) or $exec['status'] == false) {
            $result = [
                'status' => false,
                'msg' => $exec['pesan']
            ];
        } else {
            $result = [
                'status' => true,
                'msg' => 'data penceramah berhasil diperbarui'
            ];
        }
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function S_spk() {
        $data = ['id_layanan' => $this->input->post('id_layanan'), 'sp_keg' => $this->Upload_dokmohon('sp_keg')];
        if ($data['sp_keg'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_2/S_spk/ ' . ' Gagal ketika unggah Surat Permohonan Kegiatan');
            $respon = ['status' => 0, 'pesan' => 'error ketika unggah Surat Permohonan Kegiatan!'];
        } else {
            $exec = $this->M_layanan2->S_spk($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['sp_keg']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'gagal ketika menyimpan data Surat Permohonan Kegiatan!'];
            } else {
                $respon = ['status' => 1, 'pesan' => 'Surat Permohonan Kegiatan berhasil diubah!', 'file_name' => $data['sp_keg']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function S_proposal() {
        $data = ['id_layanan' => $this->input->post('id_layanan'), 'proposal' => $this->Upload_dokmohon('proposal')];
        if ($data['proposal'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/S_proposal/ ' . ' Gagal ketika unggah Proposal Kegiatan');
            $respon = ['status' => 0, 'pesan' => 'error ketika unggah proposal!'];
        } else {
            $exec = $this->M_layanan2->S_proposal($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['proposal']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'error ketika menyimpan data proposal!'];
            } else {
                $respon = ['status' => 1, 'pesan' => 'proposal berhasil diubah!', 'file_name' => $data['proposal']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function Change() {
        $data = [
            'p1' => $this->input->post('id_layanan'),
            'p2' => $this->input->post('id_user'),
            'sys_users' => [
                'no_ktp' => $this->input->post('ktp'),
                'tanggal_lahir' => $this->input->post('tgl_lahir'),
                'nama_lengkap' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('nama')),
                'mail_user' => $this->input->post('mali'),
                'telepon' => $this->input->post('telpon')
            ],
            'dt_layanan' => [
                'provinsi' => $this->input->post('provinsi'),
                'kabupaten' => $this->input->post('kabupaten'),
                'kecamatan' => $this->input->post('kectxt'),
                'kelurahan' => $this->input->post('keltxt'),
                'keterangan_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('keterangan_kegiatan')),
            ],
            'dt_kegiatan' => [
                'nama_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('nm_keg')),
                'jumlah_peserta' => $this->input->post('esti_keg'),
                'lembaga' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('lemb_keg')),
                'tmt_awal' => $this->input->post('tgl_awal_keg'),
                'tmt_akhir' => $this->input->post('tgl_akhir_keg'),
                'alamat_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('alamat_kegiatan'))
            ]
        ];
        $exec = $this->M_layanan2->Change($data);
        if ($exec['status'] == true) {
            redirect(base_url('Urais/Layanan_2/index/'), $this->session->set_flashdata('sukses', 'data permohonan berhasil diperbarui!'));
        } else {
            redirect(base_url('Urais/Layanan_2/Edit/' . $data['p1']), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
    }

    public function Proses() {
        $this->template->setPageId("DIPROSES_IDKLN");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "IZIN PENGIRIMAN DA`I ke LUAR NEGERI";
        $pagetitle = "Izin Pengiriman Da`i ke Luar Negeri";
        $view = "layanan2/v_proses";
        $breadcrumbs = [
            [
                "title" => "Proses Permohonan",
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

    public function Detail_Proses($id) {
        $this->template->setPageId("DIPROSES_IDKLN");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => 2
        ];
        $data['detil'] = $this->M_layanan2->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url(''), 'refresh');
        } else {
            $data['stat'] = $this->M_layanan2->Stat($id);
            $sitetitle = "Detil Permohonan | " . $data['detil'][0]->nm_keg;
            $pagetitle = "Detil Data Permohonan";
            $view = "layanan2/v_prosesdetail";
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
    }

    public function Proses_verif() {
        if (empty($this->input->post('alasan'))) {
            $alasan = "NULL";
        } else {
            $alasan = '"' . $this->input->post('alasan') . '"';
        }
        $data = ['a' => $this->input->post('hasil'), 'b' => $alasan, 'c' => $this->session->userdata('DX_user_id'), 'd' => date("Y-m-d H:i:s"), 'e' => $this->input->post('id_layanan')];
        $exec = $this->M_layanan2->Proses_verif($data);
        //$mail = $this->M_layanan1->Detail($this->input->post('id_layanan'));
        //$this->Mail($mail);
        if ($exec['status'] == true) {
            $result = redirect(base_url('Urais/Layanan_2/Proses/'), $this->session->set_flashdata('sukses', 'Berhasil verifikasi permohonan!'));
        } else {
            $result = redirect(base_url('Urais/Layanan_2/Detail_Proses/' . $this->input->post('id_layanan')), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
        return $result;
    }

}

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
class Layanan_1 extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['M_layanan1']);
    }

    private function Mail($exec) {
        //$exec = Array ( [0] => stdClass Object ( [id_layanan] => 4 [id_user] => 12 [nik] => 3175063838830001 [tgl_lhr] => 1981-02-01 [telp] => 085714411167 [nama_user] => Hj. Muslihah [mail] => muslihah@mail.com [nm_keg] => Tuntas Baca Tulis [tgl_awal_keg] => 2021-02-07 [tgl_akhir_keg] => 2021-02-08 [alamat_keg] => SUGIHWARAS [narsum] => Mumu Mubarok [esti_keg] => 60 [lemb_keg] => AISIYAH RANTNG SUGIHWARAS [keterangan] => secara khusus mengatur pelaksanaan jeni-jenis kegiatan ekstrakurikuler PAI di sekolah. [nama_stat] => di proses [nama_layanan] => Izin Kegiatan Keagamaan [nama_direktorat] => URAIS & BINSYAR [nama_file] => uiosas_as.pdf [provinsi] => SUMATERA BARAT [kabupaten] => KOTA PADANG PANJANG [kecamatan] => Padang Panjang Barat [kelurahan] => Pasar Usang ) )
        $exec['value'] = $exec;
        $this->load->library('email');
        $config = [
            'useragent' => 'DITJEN BIMASISLAM',
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'layanan.bimasislam@gmail.com',
            'smtp_pass' => 'R4h4514N394R4',
            '_smtp_auth' => true,
            'smtp_crypto' => 'tls',
            'charset' => 'utf-8',
            'wordwrap' => true,
            'mailtype' => 'html',
            'smtp_port' => 587
        ];
        $this->email->initialize($config)
                ->set_newline("\r\n")
                ->from('layanan.bimasislam@gmail.com', 'Direktorat Jenderal Bimas Islam')
//                ->to(['fia.meliaa@gmail.com', 'maspriyambodo@gmail.com']) if multi sending email
                ->to(['baguspermadi736@gmail.com', 'maspriyambodo@gmail.com'])// jangan lupa di ganti saat production
                ->subject('Status Permohonan: ' . $exec[0]->nm_keg)
                ->message($this->load->view("layanan1/v_email", $exec, true))
                ->send();
    }

    public function Contoh($param) {
        $mail['value'] = $this->M_layanan1->Detail($param);
//        $this->Mail($mail);
        $this->load->view('layanan1/v_email', $mail);
    }

    public function index() {
        $this->template->setPageId("DITERIMA_IKK");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "IZIN KEGIATAN KEAGAMAAN";
        $pagetitle = "Izin Kegiatan Keagamaan";
        $view = "layanan1/v_index";
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
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => 1
        ];
        $data['detil'] = $this->M_layanan1->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url(''), 'refresh');
        } else {
            $sitetitle = $data['detil'][0]->nm_keg;
            $pagetitle = "Izin Kegiatan Keagamaan";
            $view = "layanan1/v_detail";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
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

    public function Edit($id) {
        $this->template->setPageId("DITERIMA_IKK");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => 1
        ];
        $data['detil'] = $this->M_layanan1->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url('Urais/Layanan_1/index/'), 'refresh');
        } else {
            $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
            $data['provinsi'] = $this->M_layanan1->Provinsi();
            $sitetitle = $data['detil'][0]->nm_keg;
            $pagetitle = "Izin Kegiatan Keagamaan";
            $view = "layanan1/v_edit";
            $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Urais/Layanan_1/index/'),
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

    public function Update() {
        $data = [
            'id_layanan' => $this->input->post('id'),
            'user_id' => $this->session->userdata('DX_user_id'),
            'status_id' => 2
        ];
        $exec = $this->M_layanan1->Update($data);
        if (empty($exec) or $exec == 0) {
            $direct = toJSON(resultError("Error", 0));
        } else {
            $direct = toJSON(resultSuccess("OK", 1));
        }
        return $direct;
    }

    public function Hapus() {
        $data = [
            'id_layanan' => $this->input->post('id'),
            'user_id' => $this->session->userdata('DX_user_id'),
            'status_id' => 3
        ];
        $exec = $this->M_layanan1->Delete_layanan($data);
        if (empty($exec) or $exec->conn_id->sqlstate != 00000) {
            $direct = toJSON(resultError("Error", 0));
        } else {
            $direct = toJSON(resultSuccess("OK", 1));
        }
        return $direct;
    }

    public function Reject() {
        $data = [
            'id_layanan' => $this->input->post('id'),
            'user_id' => $this->session->userdata('DX_user_id'),
            'status_id' => 4
        ];
        $exec = $this->M_layanan1->Update($data);
        if (empty($exec) or $exec == 0) {
            $direct = toJSON(resultError("Error", 0));
        } else {
            $direct = toJSON(resultSuccess("OK", 1));
        }
        return $direct;
    }

    public function Proses() {//permohonan status proses
        $this->template->setPageId("DIPROSES_IKK");
        $data = [];
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
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
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => 2
        ];
        $data['detil'] = $this->M_layanan1->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url(''), 'refresh');
        } else {
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
    }

    public function Proses_verif() {
        if (empty($this->input->post('alasan'))) {
            $alasan = "NULL";
        } else {
            $alasan = '"' . $this->input->post('alasan') . '"';
        }
        $data = ['a' => $this->input->post('hasil'), 'b' => $alasan, 'c' => $this->session->userdata('DX_user_id'), 'd' => date("Y-m-d H:i:s"), 'e' => $this->input->post('id_layanan')];
        $exec = $this->M_layanan1->Proses_verif($data);
        //$mail = $this->M_layanan1->Detail($this->input->post('id_layanan'));
        //$this->Mail($mail);
        if ($exec['status'] == true) {
            $result = redirect(base_url('Urais/Layanan_1/Proses/'), $this->session->set_flashdata('sukses', 'Berhasil verifikasi permohonan!'));
        } else {
            $result = redirect(base_url('Urais/Layanan_1/Detail_Proses/' . $this->input->post('id_layanan')), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
        return $result;
    }

    public function Tambah() {
        $this->template->setPageId("DITERIMA_IKK");
        $data = [];
        $data['provinsi'] = $this->M_layanan1->Provinsi();
        $data['msg'] = ['gagal' => $this->session->flashdata('gagal'), 'sukses' => $this->session->flashdata('sukses')];
        $sitetitle = "Tambah Izin Kegiatan Keagamaan";
        $pagetitle = "Izin Kegiatan Keagamaan";
        $view = "layanan1/v_tambahikk";
        $breadcrumbs = [["title" => "Izin Kegiatan Keagamaan", "link" => base_url('Urais/Layanan_1/index/'), "is_actived" => false,], ["title" => "Tambah", "link" => "", "is_actived" => true,]];
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

    public function Getkab() {
        $id = $this->input->post_get('id_provinsi');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($this->M_layanan1->Getkab($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Getkec() {
        $id = $this->input->post_get('id_kabupaten');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($this->M_layanan1->Getkec($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    public function Getkel() {
        $id = $this->input->post_get('id_kecamatan');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($this->M_layanan1->Getkel($id), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
                ->_display();
        exit;
    }

    private function Upload_dokmohon($param) {
        $config['upload_path'] = FCPATH . 'assets/uploads/binsyar/';
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

    public function Simpan() {
        //$data['sys_user']['no_ktp'];
        //Array ( [file_name] => kacm.png [file_type] => image/png [file_path] => /var/www/layanan/assets/uploads/binsyar/ [full_path] => /var/www/layanan/assets/uploads/binsyar/kacm.png [raw_name] => kacm [orig_name] => kacm.png [client_name] => QR_code_trade_api.png [file_ext] => .png [file_size] => 2.56 [is_image] => 1 [image_width] => 200 [image_height] => 200 [image_type] => png [image_size_str] => width="200" height="200" ) 
        $ktp = $this->Upload_dokmohon("ktp_keg");
        $proposal = $this->Upload_dokmohon("proposal");
        $sp_keg = $this->Upload_dokmohon("sp_keg");
        if ($ktp == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/Simpan/ ' . ' Gagal ketika unggah KTP Pemohon');
            unlink(FCPATH . 'assets/uploads/binsyar/' . $proposal['file_name']);
            unlink(FCPATH . 'assets/uploads/binsyar/' . $sp_keg['file_name']);
            redirect(base_url('Urais/Layanan_1/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah KTP Pemohon'));
        } elseif ($proposal == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/Simpan/ ' . ' Gagal ketika unggah Proposal Kegiatan');
            unlink(FCPATH . 'assets/uploads/binsyar/' . $ktp['file_name']);
            unlink(FCPATH . 'assets/uploads/binsyar/' . $sp_keg['file_name']);
            redirect(base_url('Urais/Layanan_1/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah Proposal Kegiatan'));
        } elseif ($sp_keg == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/Simpan/ ' . ' Gagal ketika unggah Surat Permohonan Kegiatan');
            unlink(FCPATH . 'assets/uploads/binsyar/' . $ktp['file_name']);
            unlink(FCPATH . 'assets/uploads/binsyar/' . $proposal['file_name']);
            redirect(base_url('Urais/Layanan_1/Tambah/'), $this->session->set_flashdata('gagal', 'Gagal ketika unggah Surat Permohonan Kegiatan'));
        } else {
            $data = [
                'sys_user' => [
                    'no_ktp' => $this->input->post('ktp'),
                    'tanggal_lahir' => $this->input->post('tgl_lahir'),
                    'uname' => $this->input->post('uname'),
                    'nama_lengkap' => $this->input->post('nama'),
                    'mail_user' => $this->input->post('mali'),
                    'telepon' => $this->input->post('telpon')
                ],
                'dt_layanan' => [
                    'provinsi' => $this->input->post('provinsi'),
                    'kabupaten' => $this->input->post('kabupaten'),
                    'kecamatan' => $this->input->post('kectxt'),
                    'kelurahan' => $this->input->post('keltxt'),
                    'keterangan_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('keterangan_kegiatan')),
                    'mt_layanan' => 1
                ],
                'dt_kegiatan' => [
                    'nama_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('nm_keg')),
                    'jumlah_peserta' => $this->input->post('esti_keg'),
                    'lembaga' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('lemb_keg')),
                    'tmt_awal' => $this->input->post('tgl_awal_keg'),
                    'tmt_akhir' => $this->input->post('tgl_akhir_keg'),
                    'alamat_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('alamat_kegiatan'))
                ],
                'dt_penceramah' => [
                    'penceramah' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('narsum'))
                ],
                'dt_layanan_dokumen' => [
                    'ktp_kegiatan' => $ktp['file_name'],
                    'proposal_kegiatan' => $proposal['file_name'],
                    'sp_keg' => $sp_keg['file_name']
                ]
            ];
            $exec = $this->M_layanan1->Insert_user($data);
            if ($exec['status'] == true) {
                redirect(base_url('Urais/Layanan_1/index/'), $this->session->set_flashdata('sukses', 'Berhasil tambah izin kegiatan keagamaan!'));
            } else {
                redirect(base_url('Urais/Layanan_1/Tambah/'), $this->session->set_flashdata('gagal', $exec['pesan']));
            }
        }
    }

    public function Change() {
        $data = [
            'id_layanan' => $this->input->post('id_layanan'),
            'id_user' => $this->input->post('id_user'),
            'sys_user' => [
                'no_ktp' => $this->input->post('ktp'),
                'tanggal_lahir' => $this->input->post('tgl_lahir'),
                'nama_lengkap' => $this->input->post('nama'),
                'mail_user' => $this->input->post('mali'),
                'telepon' => $this->input->post('telpon')
            ],
            'dt_layanan' => [
                'provinsi' => $this->input->post('provinsi'),
                'kabupaten' => $this->input->post('kabupaten'),
                'kecamatan' => $this->input->post('kectxt'),
                'kelurahan' => $this->input->post('keltxt'),
                'keterangan_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('keterangan_kegiatan')),
                'user_update' => $this->session->userdata('DX_user_id')
            ],
            'dt_kegiatan' => [
                'nama_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('nm_keg')),
                'jumlah_peserta' => $this->input->post('esti_keg'),
                'lembaga' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('lemb_keg')),
                'tmt_awal' => $this->input->post('tgl_awal_keg'),
                'tmt_akhir' => $this->input->post('tgl_akhir_keg'),
                'alamat_kegiatan' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('alamat_kegiatan'))
            ],
            'dt_penceramah' => [
                'penceramah' => str_replace(['"', "'", '‘', '’', '“', '”', '′', '″'], ['&quot;', '&apos;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&prime;', '&Prime;'], $this->input->post('narsum'))
            ]
        ];
//        echo '<pre>';
//        print_r($data);
//        echo '<pre>';die;
        $exec = $this->M_layanan1->Change($data);
        if ($exec['status'] == true) {
            redirect(base_url('Urais/Layanan_1/index/'), $this->session->set_flashdata('sukses', 'Berhasil ubah data izin kegiatan keagamaan!'));
        } else {
            redirect(base_url('Urais/Layanan_1/Edit/' . $data['id_layanan']), $this->session->set_flashdata('gagal', $exec['pesan']));
        }
    }

    public function S_proposal() {
        $data = ['id_layanan' => $this->input->post('id_layanan'), 'proposal' => $this->Upload_dokmohon('proposal')];
        if ($data['proposal'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/S_proposal/ ' . ' Gagal ketika unggah Proposal Kegiatan');
            $respon = ['status' => 0, 'pesan' => 'error ketika unggah proposal!'];
        } else {
            $exec = $this->M_layanan1->S_proposal($data);
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

    public function S_ktp() {
        $data = ['id_layanan' => $this->input->post('id_layanan'), 'ktp_keg' => $this->Upload_dokmohon('ktp_keg')];
        if ($data['ktp_keg'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/S_ktp/ ' . ' Gagal ketika unggah KTP Pemohon');
            $respon = ['status' => 0, 'pesan' => 'error ketika unggah KTP Pemohon!'];
        } else {
            $exec = $this->M_layanan1->S_proposal($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['ktp_keg']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'error ketika menyimpan data KTP Pemohon!'];
            } else {
                $respon = ['status' => 1, 'pesan' => 'KTP berhasil diubah!', 'file_name' => $data['ktp_keg']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

    public function S_spk() {
        $data = ['id_layanan' => $this->input->post('id_layanan'), 'sp_keg' => $this->Upload_dokmohon('sp_keg')];
        if ($data['sp_keg'] == false) {
            log_message('error', APPPATH . 'modules/Urais/Layanan_1/S_spk/ ' . ' Gagal ketika unggah Surat Permohonan Kegiatan');
            $respon = ['status' => 0, 'pesan' => 'error ketika unggah Surat Permohonan Kegiatan!'];
        } else {
            $exec = $this->M_layanan1->S_spk($data);
            if ($exec == 0) {
                unlink(FCPATH . 'assets/uploads/binsyar/' . $data['sp_keg']['file_name']);
                $respon = ['status' => 0, 'pesan' => 'error ketika menyimpan data Surat Permohonan Kegiatan!'];
            } else {
                $respon = ['status' => 1, 'pesan' => 'Surat Permohonan Kegiatan berhasil diubah!', 'file_name' => $data['sp_keg']['file_name']];
            }
        }
        $this->output->set_status_header(200)->set_content_type('application/json', 'utf-8')->set_output(json_encode($respon, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))->_display();
        exit;
    }

}

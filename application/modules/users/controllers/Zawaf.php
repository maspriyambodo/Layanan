<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Zawaf extends MX_Controller {
    function __construct() {
      parent::__construct();
      $this->load->model('Zawaf_m','zm');
      $this->load->library('upload');
      $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    //------------------------------ Tampilan Data Hasil Inputan Masing Masing Layanan
    public function datalkspwu() {
        $this->template->setPageId("DATA_LKSPWU");
        $data = array();

        $sitetitle = "Data Permohonan Ijin Penetapan LKSPWU";
        $pagetitle = "Data Permohonan Ijin Penetapan LKSPWU";
        $view = "/users/zawaf/v_datalkspwu";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Zakat Wakaf",
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

    public function datalaz() {
        $this->template->setPageId("DATA_LAZ");
        $data = array();

        $sitetitle = "Data Permohonan Ijin Pendirian LAZ";
        $pagetitle = "Data Permohonan Ijin Pendirian LAZ";
        $view = "/users/zawaf/v_datalaz";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Zakat Wakaf",
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

    //------------------------------ Data Joinan Tabel Dari Masing Masing Form
    public function joinan_lkspwu()
    {
        $kondisi = array(
            "a.jenis_layanan" => 6,
            "a.stat" => 1,
            "a.id_user" => $this->session->userdata("DX_user_id")
        );

        $this->setGroup;
        $this->db->select("a.id, d.fullname, e.nama_layanan, f.nm_instansi, f.telp_instansi, f.email_instansi, g.nama");
        $this->db->from("dt_layanan a");
        $this->db->join("dt_instansi b", "a.id = b.id_layanan");
        $this->db->join("dt_layanan_dokumen c", "a.id = c.id_layanan");
        $this->db->join("sys_users d", "a.id_user = d.id");
        $this->db->join("mt_layanan e", "a.jenis_layanan = e.id");
        $this->db->join("dt_instansi f", "a.id = f.id_layanan");
        $this->db->join("mt_wil_provinsi g", "b.id_provinsi = g.id_provinsi");
        $this->db->join("dt_layanan_dokumen h", "a.id = h.id_layanan");
        $this->db->where($kondisi);
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function joinan_laz()
    {
        $kondisi = array(
            "a.jenis_layanan" => 6,
            "a.stat" => 1,
            "a.id_user" => $this->session->userdata("DX_user_id")
        );

        $this->setGroup;
        $this->db->select("a.id, d.fullname, e.nama_layanan, f.nm_instansi, f.telp_instansi, f.email_instansi, g.nama");
        $this->db->from("dt_layanan a");
        $this->db->join("dt_instansi b", "a.id = b.id_layanan");
        $this->db->join("dt_layanan_dokumen c", "a.id = c.id_layanan");
        $this->db->join("sys_users d", "a.id_user = d.id");
        $this->db->join("mt_layanan e", "a.jenis_layanan = e.id");
        $this->db->join("dt_instansi f", "a.id = f.id_layanan");
        $this->db->join("mt_wil_provinsi g", "b.id_provinsi = g.id_provinsi");
        $this->db->join("dt_layanan_dokumen h", "a.id = h.id_layanan");
        $this->db->where($kondisi);
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    //------------------------------ Form Inputan Dari Masing Masing Menu Layanan Zawaf
    public function lkspwu()
    {
        $this->template->setPageId("SUB_ZAKAT_WAKAF_LKSPWU");
        // $data["title"] = $this->zm->get_title();
        $data = array();

        $sitetitle = "Form LKSPWU";
        $pagetitle = "Form Permohonan Ijin Penetapan LKSPWU";
        $view = "/users/zawaf/v_tambahsatu";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Zakat & Wakaf",
                    "link" => "",
                    "is_actived" => true,
                ),
            );
        
        // $metune = $tampilan->metune;
        $js_lib_files = $tampilan->js_lib_files;
        $css_lib_files = $tampilan->css_lib_files;
        $js_inlines = $tampilan->js_inlines;

        $this->template->setCssFiles($css_lib_files);
        $this->template->setJsFiles($js_lib_files);
        $data['id_session'] = $this->zm->get_identitas();
        $data['ambil_provinsi'] = $this->zm->get_provinsi();
        $data['jenis_layanan'] = $this->zm->get_layanan_zawaf();
        // var_dump($data['jenis_layanan'][2]->nama_layanan);
        // die();
        $data['id_dtlayanan'] = $this->zm->get_id_dtlayanan();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function laz()
    {
        $this->template->setPageId("SUB_ZAKAT_WAKAF_LAZ");
        // $data["title"] = $this->zm->get_title();
        $data = array();

        $sitetitle = "Form LAZ";
        $pagetitle = "Form Permohonan Ijin Pendirian LAZ";
        $view = "/users/zawaf/v_tambahdua";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Zakat & Wakaf",
                    "link" => "",
                    "is_actived" => true,
                ),
            );
        
        // $metune = $tampilan->metune;
        $js_lib_files = $tampilan->js_lib_files;
        $css_lib_files = $tampilan->css_lib_files;
        $js_inlines = $tampilan->js_inlines;

        $this->template->setCssFiles($css_lib_files);
        $this->template->setJsFiles($js_lib_files);
        $data['id_session'] = $this->zm->get_identitas();
        $data['ambil_provinsi'] = $this->zm->get_provinsi();
        $data['jenis_layanan'] = $this->zm->get_layanan_zawaf();
        // var_dump($data['jenis_layanan'][0]->nama_layanan);
        // die();
        $data['id_dtlayanan'] = $this->zm->get_id_dtlayanan();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    //------------------------------ Kumpulan Data Proses Simpan Masing Masing Form
    public function simpan_forma()
    {
        // Data Instansi
        $this->form_validation->set_rules('nm_instansi', 'nama instansi', 'trim|required');
        $this->form_validation->set_rules('almt_instansi', 'alamat instansi', 'trim|required');
        $this->form_validation->set_rules('telp_instansi', 'telepon instansi', 'trim|required');
        $this->form_validation->set_rules('email_instansi', 'email instansi', 'trim|required|valid_email');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required');

        // Data Lampiran
        if(empty($_FILES['srt_prmhn_tertulis_lkspwu']['name'])){
            $this->form_validation->set_rules('srt_prmhn_tertulis_lkspwu', 'upload surat permohonan', 'required');}
        if(empty($_FILES['agrn_dsr_lkspwu']['name'])){
            $this->form_validation->set_rules('agrn_dsr_lkspwu', 'upload anggaran dasar', 'required');}
        if(empty($_FILES['sk_bdn_hkm_lkspwu']['name'])){
            $this->form_validation->set_rules('sk_bdn_hkm_lkspwu', 'upload suket badan hukum', 'required');}
        if(empty($_FILES['dmsl_ush_lkspwu']['name'])){
            $this->form_validation->set_rules('dmsl_ush_lkspwu', 'upload domisili usaha', 'required');}
        if(empty($_FILES['suket_keuangan_lkspwu']['name'])){
            $this->form_validation->set_rules('suket_keuangan_lkspwu', 'upload suket keuangan', 'required');}
        if(empty($_FILES['trm_ttpn_lkspwu']['name'])){
            $this->form_validation->set_rules('trm_ttpn_lkspwu', 'upload bukti titipan ceklis', 'required');}
        if(empty($_FILES['lprn_keuangan_lkspwu']['name'])){
            $this->form_validation->set_rules('lprn_keuangan_lkspwu', 'upload laporan keuangan', 'required');}

        if($this->form_validation->run() == TRUE)
        {
            // Mengambil id layanan terakhir
            $id_dt_layanan['id'] = $this->zm->get_id_dtlayanan();

            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "stat" => 1,
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE)
            );
            $this->zm->kirim_dt_layanan_lkspwu($layanan);

            $instansi = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "nm_instansi" => $this->input->post("nm_instansi", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "almt_instansi" => $this->input->post("almt_instansi", TRUE),
                "telp_instansi" => $this->input->post("telp_instansi", TRUE),
                "email_instansi" => $this->input->post("email_instansi", TRUE)
            );
            $this->zm->kirim_dt_instansi_lkspwu($instansi);

            $lampiran = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "srt_prmhn_tertulis_lkspwu" => $this->_do_upload_srt_prmhn_tertulis_lkspwu(),
                "agrn_dsr_lkspwu" => $this->_do_upload_agrn_dsr_lkspwu(),
                "sk_bdn_hkm_lkspwu" => $this->_do_upload_sk_bdn_hkm_lkspwu(),
                "dmsl_ush_lkspwu" => $this->_do_upload_dmsl_ush_lkspwu(),
                "suket_keuangan_lkspwu" => $this->_do_upload_suket_keuangan_lkspwu(),
                "trm_ttpn_lkspwu" => $this->_do_upload_trm_ttpn_lkspwu(),
                "lprn_keuangan_lkspwu" => $this->_do_upload_lprn_keuangan_lkspwu()
            );
            $this->zm->kirim_dt_lampiran_lkspwu($lampiran);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/zawaf/datalkspwu/')."';</script>";
        } else {
            return $this->lkspwu();
        }
    }

    //------------------------------ Edit Kumpulan Data Per Form
    function editlkspwu($id)
    {
        $this->template->setPageId("DATA_LKSPWU");
        $data = array();

        $sitetitle = "Edit Data Ijin Penetapan LKSPWU";
        $pagetitle = "Edit Data Ijin Penetapan LKSPWU";
        $view = "/users/zawaf/v_editdata_lkspwu";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Edit Zakat Wakaf",
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
        $data["dt_provinsi"] = $this->zm->get_provinsi();
        $data["dt_kabupaten"] = $this->zm->get_kabupaten();
        $data["dt_kecamatan"] = $this->zm->get_kecamatan();
        $data["dt_kelurahan"] = $this->zm->get_kelurahan();
        $data["pemohon"] = $this->zm->get_edit_pemohon($id);
        $data["instansi"] = $this->zm->get_edit_instansi($id);
        $data["lampiran"] = $this->zm->get_edit_lampiran($id);
        // var_dump(json_encode($data['lampiran']));
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    //------------------------------ Kumpulan Edit Form Kirim Ke Model
    function simpanedit_instansi_lkspwu()
    {
        // Data Instansi
        $this->form_validation->set_rules('nm_instansi', 'nama instansi', 'trim|required');
        $this->form_validation->set_rules('almt_instansi', 'alamat instansi', 'trim|required');
        $this->form_validation->set_rules('telp_instansi', 'telepon instansi', 'trim|required');
        $this->form_validation->set_rules('email_instansi', 'email instansi', 'trim|required|valid_email');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("id", TRUE);
            $data = array(
                "id_layanan" => $this->input->post("id_layanan", TRUE),
                "nm_instansi" => $this->input->post("nm_instansi", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "almt_instansi" => $this->input->post("almt_instansi", TRUE),
                "telp_instansi" => $this->input->post("telp_instansi", TRUE),
                "email_instansi" => $this->input->post("email_instansi", TRUE)
            );
            $this->zm->kirim_editinstansi_lkspwu($data, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editlkspwu($id);
        }
    }

    function simpanedit_lampiran_lkspwu()
    {
        $id = $this->input->post("id", TRUE);
        $id_layanan = $this->input->post("id_layanan", TRUE);

        if (!empty($_FILES['srt_prmhn_tertulis_lkspwu']['name'])) {
            $srt_prmhn_tertulis_lkspwuimage = $this->_do_upload_srt_prmhn_tertulis_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->srt_prmhn_tertulis_lkspwu) && $upload->srt_prmhn_tertulis_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->srt_prmhn_tertulis_lkspwu);
            }
            $data['srt_prmhn_tertulis_lkspwu'] = $srt_prmhn_tertulis_lkspwuimage;
        }

        if (!empty($_FILES['agrn_dsr_lkspwu']['name'])) {
            $agrn_dsr_lkspwuimage = $this->_do_upload_agrn_dsr_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->agrn_dsr_lkspwu) && $upload->agrn_dsr_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->agrn_dsr_lkspwu);
            }
            $data['agrn_dsr_lkspwu'] = $agrn_dsr_lkspwuimage;
        }

        if (!empty($_FILES['sk_bdn_hkm_lkspwu']['name'])) {
            $sk_bdn_hkm_lkspwuimage = $this->_do_upload_sk_bdn_hkm_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->sk_bdn_hkm_lkspwu) && $upload->sk_bdn_hkm_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->sk_bdn_hkm_lkspwu);
            }
            $data['sk_bdn_hkm_lkspwu'] = $sk_bdn_hkm_lkspwuimage;
        }

        if (!empty($_FILES['dmsl_ush_lkspwu']['name'])) {
            $dmsl_ush_lkspwuimage = $this->_do_upload_dmsl_ush_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->dmsl_ush_lkspwu) && $upload->dmsl_ush_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->dmsl_ush_lkspwu);
            }
            $data['dmsl_ush_lkspwu'] = $dmsl_ush_lkspwuimage;
        }

        if (!empty($_FILES['suket_keuangan_lkspwu']['name'])) {
            $suket_keuangan_lkspwuimage = $this->_do_upload_suket_keuangan_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->suket_keuangan_lkspwu) && $upload->suket_keuangan_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->suket_keuangan_lkspwu);
            }
            $data['suket_keuangan_lkspwu'] = $suket_keuangan_lkspwuimage;
        }

        if (!empty($_FILES['trm_ttpn_lkspwu']['name'])) {
            $trm_ttpn_lkspwuimage = $this->_do_upload_trm_ttpn_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->trm_ttpn_lkspwu) && $upload->trm_ttpn_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->trm_ttpn_lkspwu);
            }
            $data['trm_ttpn_lkspwu'] = $trm_ttpn_lkspwuimage;
        }

        if (!empty($_FILES['lprn_keuangan_lkspwu']['name'])) {
            $lprn_keuangan_lkspwuimage = $this->_do_upload_lprn_keuangan_lkspwu();

            $upload = $this->zm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/zakat/'.$upload->lprn_keuangan_lkspwu) && $upload->lprn_keuangan_lkspwu) {
                unlink('assets/uploads/zakat/'.$upload->lprn_keuangan_lkspwu);
            }
            $data['lprn_keuangan_lkspwu'] = $lprn_keuangan_lkspwuimage;
        }

        $this->zm->kirim_editlampiran_lkspwu($data, $id);
        echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
    }

    //------------------------------ Kumpulan Hapus Data Masing Masing Form
    public function hapus_dt_lkspwu()
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

    //------------------------------ Kumpulan Uplodan Gambar
    private function _do_upload_srt_prmhn_tertulis_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["srt_prmhn_tertulis_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('srt_prmhn_tertulis_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_agrn_dsr_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["agrn_dsr_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('agrn_dsr_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_sk_bdn_hkm_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["sk_bdn_hkm_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('sk_bdn_hkm_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_dmsl_ush_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["dmsl_ush_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('dmsl_ush_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_suket_keuangan_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["suket_keuangan_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('suket_keuangan_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_trm_ttpn_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["trm_ttpn_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('trm_ttpn_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_lprn_keuangan_lkspwu()
    {
        $data['user'] = $this->zm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["lprn_keuangan_lkspwu"]['name'];

        $config['upload_path']      = 'assets/uploads/zakat/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('lprn_keuangan_lkspwu')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

}
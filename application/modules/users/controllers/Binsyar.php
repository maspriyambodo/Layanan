<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Binsyar extends MX_Controller {
    function __construct()
    {
      parent::__construct();
      $this->load->model('Binsyar_m','bm');
      $this->load->library('upload');
      $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    //------------------------------ Tampilan Data Hasil Inputan Masing Masing Layanan
    public function datakegiatan() {
        $this->template->setPageId("DATA_BINSYAR_KEGIATAN");
        $data = array();

        $sitetitle = "Data Ijin Kegiatan Keagamaan";
        $pagetitle = "Data Ijin Kegiatan Keagamaan";
        $view = "/users/binsyar/v_datakegiatan";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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

    public function joinan_kegiatan()
    {
        $kondisi = array(
            "b.jenis_layanan" => 1,
            "b.stat" => 1,
            "b.id_user" => $this->session->userdata("DX_user_id")
        );

        $this->setGroup;
        $this->db->select("b.id, e.fullname, c.nm_keg, c.tgl_awal_keg, c.esti_keg, lemb_keg,
        count(a.id) as jumlah_penceramah");
        $this->db->from("dt_penceramah a");
        $this->db->join("dt_layanan b", "a.id_layanan = b.id");
        $this->db->join("dt_kegiatan c","b.id = c.id_layanan");
        $this->db->join("sys_users e", "b.id_user = e.id");
        $this->db->where($kondisi);
        $this->db->group_by("b.id");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function dataekspor() {
        $this->template->setPageId("DATA_BINSYAR_KELUARNEGERI");
        $data = array();

        $sitetitle = "Data Penceramah Keluar Negeri";
        $pagetitle = "Data Penceramah Keluar Negeri";
        $view = "/users/binsyar/v_dataekspor";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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

    public function joinan_ekspor()
    {
        $kondisi = array(
            "b.jenis_layanan" => 2,
            "b.stat" => 1,
            "b.id_user" => $this->session->userdata("DX_user_id")
        );

        $this->setGroup;
        $this->db->select("b.id, e.fullname, c.nm_keg, c.tgl_awal_keg, f.country, c.alamat_keg,
        count(a.id) as jumlah");
        $this->db->from("dt_penceramah a");
        $this->db->join("dt_layanan b", "a.id_layanan = b.id");
        $this->db->join("dt_kegiatan c","b.id = c.id_layanan");
        $this->db->join("dt_layanan_dokumen d","b.id = d.id_layanan");
        $this->db->join("sys_users e", "b.id_user = e.id");
        $this->db->join("mt_country f", "c.code_negara = f.id");
        $this->db->where($kondisi);
        $this->db->group_by("b.id");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function dataimpor() {
        $this->template->setPageId("DATA_BINSYAR_DARILUARNEGERI");
        $data = array();

        $sitetitle = "Data Penceramah Dari Luar Negeri";
        $pagetitle = "Data Penceramah Dari Luar Negeri";
        $view = "/users/binsyar/v_dataimpor";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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

    public function joinan_impor()
    {
        $kondisi = array(
            "b.jenis_layanan" => 3,
            "b.stat" => 1,
            "b.id_user" => $this->session->userdata("DX_user_id")
        );

        $this->setGroup;
        $this->db->select("b.id, c.fullname, d.nm_keg, d.tgl_awal_keg, e.nama, f.country, count(a.id) as jumlah");
        $this->db->from("dt_penceramah a");
        $this->db->join("dt_layanan b", "a.id_layanan = b.id");
        $this->db->join("sys_users c", "b.id_user = c.id");
        $this->db->join("dt_kegiatan d","b.id = d.id_layanan");
        $this->db->join("mt_wil_provinsi e","d.id_provinsi = e.id_provinsi");
        $this->db->join("mt_country f", "a.negara_asl = f.id");
        $this->db->where($kondisi);
        $this->db->group_by("b.id");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function datasafari() {
        $this->template->setPageId("DATA_BINSYAR_SAFARI");
        $data = array();

        $sitetitle = "Data Penceramah Safari Dakwah Dalam Negeri";
        $pagetitle = "Data Penceramah Safari Dakwah Dalam Negeri";
        $view = "/users/binsyar/v_datasafari";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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

    public function joinan_safari()
    {
        $kondisi = array(
            "b.jenis_layanan" => 13,
            "b.stat" => 1,
            "b.id_user" => $this->session->userdata("DX_user_id")
        );

        $this->setGroup;
        $this->db->select("b.id, a.fullname, c.nm_keg, c.esti_keg, c.tgl_awal_keg, e.nama, count(d.id) as jumlah");
        $this->db->from("sys_users a");
        $this->db->join("dt_layanan b", "a.id = b.id_user");
        $this->db->join("dt_kegiatan c","b.id = c.id_layanan");
        $this->db->join("dt_penceramah d","b.id = d.id_layanan");
        $this->db->join("mt_wil_provinsi e","c.id_provinsi = e.id_provinsi");
        $this->db->where($kondisi);
        $this->db->group_by("b.id");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    //------------------------------ Kumpulan Fungsi Hapusan Masing Masing Form Layanan
    public function hapus_dt_kegiatan()
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

    public function hapus_dt_ekspor()
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

    public function hapus_dt_impor()
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

    public function hapus_dt_safari()
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

    //------------------------------ Form Inputan Dari Masing Masing Menu Layanan Binsyar
    public function kegiatan()
    {
        $this->template->setPageId("SUB_BINSYAR_KEGIATAN");
        $data["title"] = $this->bm->get_title();
        $data = array();

        $sitetitle = "Form Binsyar";
        $pagetitle = "Form Permohonan Kegiatan Keagamaan";
        $view = "/users/binsyar/v_tambahsatu";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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
        $data['id_session'] = $this->bm->get_identitas();
        $data['ambil_provinsi'] = $this->bm->get_provinsi();
        $data['jenis_layanan'] = $this->bm->get_layanan_binsyar();
        $data['id_dtlayanan'] = $this->bm->get_id_dtlayanan();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function lembaga()
    {
        $this->template->setPageId("SUB_BINSYAR_KEGIATAN_LEMBAGA");
        $data["title"] = $this->bm->get_title();
        $data = array();

        $sitetitle = "Form Binsyar";
        $pagetitle = "Form Permohonan Kegiatan Keagamaan Kategori Lembaga";
        $view = "/users/binsyar/v_tambahlima";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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
        $data['id_session'] = $this->bm->get_identitas();
        $data['ambil_provinsi'] = $this->bm->get_provinsi();
        $data['jenis_layanan'] = $this->bm->get_layanan_binsyar();
        $data['id_dtlayanan'] = $this->bm->get_id_dtlayanan();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function ekspor()
    {
        $this->template->setPageId("SUB_BINSYAR_EKSPOR");
        $data["title"] = $this->bm->get_title();
        $data = array();

        $sitetitle = "Form Binsyar";
        $pagetitle = "Form Permohonan Penceramah KeLuar Negeri";
        $view = "/users/binsyar/v_tambahdua";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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
        $data['id_session'] = $this->bm->get_identitas();
        $data['ambil_provinsi'] = $this->bm->get_provinsi();
        $data['jenis_layanan'] = $this->bm->get_layanan_binsyar();
        $data['id_dtlayanan'] = $this->bm->get_id_dtlayanan();
        $data['dt_negara'] = $this->bm->get_dtnegara();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function import()
    {
        $this->template->setPageId("SUB_BINSYAR_IMPORT");
        $data["title"] = $this->bm->get_title();
        $data = array();

        $sitetitle = "Form Binsyar";
        $pagetitle = "Form Permohonan Penceramah Dari Luar Negeri";
        $view = "/users/binsyar/v_tambahtiga";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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
        $data['id_session'] = $this->bm->get_identitas();
        $data['ambil_provinsi'] = $this->bm->get_provinsi();
        $data['jenis_layanan'] = $this->bm->get_layanan_binsyar();
        $data['id_dtlayanan'] = $this->bm->get_id_dtlayanan();
        $data['dt_negara'] = $this->bm->get_dtnegara();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function safari()
    {
        $this->template->setPageId("SUB_BINSYAR_SAFARI");
        $data["title"] = $this->bm->get_title();
        $data = array();

        $sitetitle = "Form Binsyar";
        $pagetitle = "Form Permohonan Safari Dakwah Dalam Negeri";
        $view = "/users/binsyar/v_tambahempat";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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
        $data['id_session'] = $this->bm->get_identitas();
        $data['ambil_provinsi'] = $this->bm->get_provinsi();
        $data['jenis_layanan'] = $this->bm->get_layanan_binsyar();
        $data['id_dtlayanan'] = $this->bm->get_id_dtlayanan();
        $data['dt_negara'] = $this->bm->get_dtnegara();
        $data["js_inlines"] = $js_inlines;
        // var_dump($data['jenis_layanan'][5]->id);
        // die();

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function safaripendidikan()
    {
        $this->template->setPageId("SUB_BINSYAR_SAFARI");
        $data["title"] = $this->bm->get_title();
        $data = array();

        $sitetitle = "Form Binsyar";
        $pagetitle = "Form Pendidikan Safari Dakwah Dalam Negeri";
        $view = "/users/binsyar/v_tambahpendidikan";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Binsyar",
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
        $data['id_session'] = $this->bm->get_identitas();
        $data['hitung'] = $this->bm->get_count_crmh();
        $data['dt_last'] = $this->bm->get_last_crmh();
        $data["js_inlines"] = $js_inlines;
        // var_dump($data['dt_last'][1]->narsum);
        // die();

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    //------------------------------ Kumpulan Data Edit Masing Masing Form Layanan
    public function editkegiatan($id) {
        $this->template->setPageId("DATA_BINSYAR_KEGIATAN");
        $data = array();

        $sitetitle = "Edit Data Ijin Kegiatan Keagamaan";
        $pagetitle = "Edit Data Ijin Kegiatan Keagamaan";
        $view = "/users/binsyar/v_editdata_kegiatan";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Edit Binsyar",
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
        $data["dt_provinsi"] = $this->bm->get_provinsi();
        $data["dt_kabupaten"] = $this->bm->get_kabupaten();
        $data["dt_kecamatan"] = $this->bm->get_kecamatan();
        $data["dt_kelurahan"] = $this->bm->get_kelurahan();
        $data["pemohon"] = $this->bm->get_edit_pemohon($id);
        $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
        $data["penceramah"] = $this->bm->get_edit_penceramah($id);
        $data["lampiran"] = $this->bm->get_edit_lampiran($id);
        // var_dump(json_encode($data['dataku'][3]->proposal_keg));
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function editekspor($id) {
        $this->template->setPageId("DATA_BINSYAR_KELUARNEGERI");
        $data = array();

        $sitetitle = "Edit Data Penceramah Keluar Negeri";
        $pagetitle = "Edit Data Penceramah Keluar Negeri";
        $view = "/users/binsyar/v_editdata_ekspor";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Edit Binsyar",
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
        $data["dt_provinsi"] = $this->bm->get_provinsi();
        $data["dt_kabupaten"] = $this->bm->get_kabupaten();
        $data["dt_kecamatan"] = $this->bm->get_kecamatan();
        $data["dt_kelurahan"] = $this->bm->get_kelurahan();
        $data["dt_negara"] = $this->bm->get_negara();
        $data["pemohon"] = $this->bm->get_edit_pemohon_ekspor($id);
        $data["kegiatan"] = $this->bm->get_edit_kegiatan_ekspor($id);
        $data["crmh_array"] = $this->bm->get_edit_crmharray_ekspor($id);
        $data["crmh"] = $this->bm->get_edit_crmh_ekspor($id);
        $data["lampiran"] = $this->bm->get_edit_lampiran_ekspor($id);
        // var_dump($data['crmh']->tmp_lhr);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function editimpor($id)
    {
        $this->template->setPageId("DATA_BINSYAR_DARILUARNEGERI");
        $data = array();

        $sitetitle = "Edit Data Penceramah Dari Luar Negeri";
        $pagetitle = "Edit Data Penceramah Dari Luar Negeri";
        $view = "/users/binsyar/v_editdata_impor";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Edit Binsyar",
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
        $data["dt_provinsi"] = $this->bm->get_provinsi();
        $data["dt_kabupaten"] = $this->bm->get_kabupaten();
        $data["dt_kecamatan"] = $this->bm->get_kecamatan();
        $data["dt_kelurahan"] = $this->bm->get_kelurahan();
        $data["dt_negara"] = $this->bm->get_negara();
        $data["dataku"] = $this->bm->get_dt_impor($id);
        $data["pemohon"] = $this->bm->get_edit_pemohon_impor($id);
        $data["kegiatan"] = $this->bm->get_edit_kegiatan_impor($id);
        $data["crmh_array"] = $this->bm->get_edit_crmharray_impor($id);
        $data["crmh"] = $this->bm->get_edit_crmh_impor($id);
        $data["lampiran"] = $this->bm->get_edit_lampiran_impor($id);
        // var_dump($data['dataku'][4]->ktp_dalam);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    //------------------------------ Kumpulan Data Proses Simpan Masing Masing Form
    public function simpan_forma()
    {
        // Data kegiatan
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jumlah jamaah', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga penyelenggara', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('alamat_keg', 'alamat kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan kegiatan', 'trim|required|is_numeric');

        // Data Lampiran
        if(empty($_FILES['ktp']['name'])){
            $this->form_validation->set_rules('ktp', 'upload ktp', 'required');}
        if(empty($_FILES['proposal_keg']['name'])){
            $this->form_validation->set_rules('proposal_keg', 'upload proposal kegiatan', 'required');}
        if(empty($_FILES['surat_permohonan_keg']['name'])){
            $this->form_validation->set_rules('surat_permohonan_keg', 'upload surat permohonan kegiatan', 'required');}

        if ($this->form_validation->run() == TRUE) {
            // Mengambil id layanan terakhir
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            // Data single
            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "stat" => 1,
                "kategori_pemohon" => 1,
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE)
            );
            $this->bm->kirim_dataLayanan($layanan);

            $kegiatan = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "nm_keg" => $this->input->post('nm_keg'),
                "esti_keg" => $this->input->post('esti_keg'),
                "lemb_keg" => $this->input->post('lemb_keg'),
                "tgl_awal_keg" => $this->input->post('tgl_awal_keg'),
                "tgl_akhir_keg" => $this->input->post('tgl_akhir_keg'),
                "alamat_keg" => $this->input->post('alamat_keg')
            );
            $this->bm->kirim_dataKegiatan($kegiatan);

            $narsum = $_POST['narsum'];
            $narsum_single = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
            );
            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id_layanan'=>$narsum_single['id_layanan'],
                    'narsum'=>$nm,
                ));
                $index++;
            }
            $this->bm->kirim_dataPenceramah($data);

            $dokumen = array(
                "id_layanan" => $this->input->post('id_layanan'),
                "ktp" => $this->_do_upload_ktp(),
                "proposal_keg" => $this->_do_upload_proposal_keg(),
                "surat_permohonan_keg" => $this->_do_upload_surat_permohonan_keg()
            );
            $this->bm->kirim_dataDokumen($dokumen);
            
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/datakegiatan/')."';</script>";
        } else {
            return $this->kegiatan();
        }
    }

    public function simpan_formb()
    {
        // Data Penceramah
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('no_paspor', 'nomor passport', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('almt_penceramah', 'alamat lengkap', 'trim|required');

        // Data Kegiatan
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('code_negara', 'negara tujuan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('alamat_keg', 'lokasi kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jumlah jamaah', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga penyelenggara', 'trim|required');

        // Data Lampiran
        if(empty($_FILES['surat_permohonan_luar']['name'])){
            $this->form_validation->set_rules('surat_permohonan_luar', 'upload surat permohonan', 'required');}
        if(empty($_FILES['proposal_luar']['name'])){
            $this->form_validation->set_rules('proposal_luar', 'upload proposal', 'required');}
        if(empty($_FILES['cv_crmh_luar']['name'])){
            $this->form_validation->set_rules('cv_crmh_luar', 'upload cv penceramah', 'required');}
        if(empty($_FILES['pasp_crmh_luar']['name'])){
            $this->form_validation->set_rules('pasp_crmh_luar', 'upload paspor penceramah', 'required');}
        if(empty($_FILES['pasp_pengundang_luar']['name'])){
            $this->form_validation->set_rules('pasp_pengundang_luar', 'upload paspor pengundang', 'required');}
        if(empty($_FILES['pas_foto_crmh_luar']['name'])){
            $this->form_validation->set_rules('pas_foto_crmh_luar', 'upload pas foto penceramah', 'required');}

        if ($this->form_validation->run() == TRUE) {
            // Mengambil id layanan terakhir
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            // Data layanan
            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "stat" => 1,
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE)
            );
            $this->bm->kirim_dataLayanan_ekspor($layanan);

            // Data Penceramah
            $narsum = $_POST['narsum'];
            $narsum_single = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "jns_kelamin" => $this->input->post("jns_kelamin", TRUE),
                "tmp_lhr" => $this->input->post("tmp_lhr", TRUE),
                "tgl_lhr" => $this->input->post("tgl_lhr", TRUE),
                "no_paspor" => $this->input->post("no_paspor", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "almt_penceramah" => $this->input->post("almt_penceramah", TRUE)
            );

            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id_layanan'=>$narsum_single['id_layanan'],
                    'jns_kelamin' => $narsum_single['jns_kelamin'],
                    'tmp_lhr' => $narsum_single['tmp_lhr'],
                    'tgl_lhr' => $narsum_single['tgl_lhr'],
                    'no_paspor' => $narsum_single['no_paspor'],
                    'id_provinsi' => $narsum_single['id_provinsi'],
                    'id_kabupaten' => $narsum_single['id_kabupaten'],
                    'id_kecamatan' => $narsum_single['id_kecamatan'],
                    'id_kelurahan' => $narsum_single['id_kelurahan'],
                    'almt_penceramah' => $narsum_single['almt_penceramah'],
                    'narsum'=>$nm
                ));
                $index++;
            }
            $this->bm->kirim_dataPenceramah_ekspor($data);

            // Data Kegiatan
            $kegiatan = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "nm_keg" => $this->input->post("nm_keg", TRUE),
                "tgl_awal_keg" => $this->input->post("tgl_awal_keg", TRUE),
                "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg", TRUE),
                "code_negara" => $this->input->post("code_negara", TRUE),
                "alamat_keg" => $this->input->post("alamat_keg", TRUE),
                "esti_keg" => $this->input->post("esti_keg", TRUE),
                "lemb_keg" => $this->input->post("lemb_keg", TRUE)
            );
            $this->bm->kirim_dataKegiatan_ekspor($kegiatan);

            // Data Lampiran
            $lampiran = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "surat_permohonan_luar" => $this->_do_upload_surat_permohonan_luar(),
                "proposal_luar" => $this->_do_upload_proposal_luar(),
                "cv_crmh_luar" => $this->_do_upload_cv_crmh_luar(),
                "pasp_crmh_luar" => $this->_do_upload_pasp_crmh_luar(),
                "pasp_pengundang_luar" => $this->_do_upload_pasp_pengundang_luar(),
                "pas_foto_crmh_luar" => $this->_do_upload_pas_foto_crmh_luar()
            );
            $this->bm->kirim_dataLampiran_ekspor($lampiran);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/dataekspor/')."';</script>";
        } else {
            return $this->ekspor();
        }
    }

    public function simpan_formc()
    {
        // Data Penceramah
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('no_paspor', 'nomor passport', 'trim|required');
        $this->form_validation->set_rules('negara_asl', 'negara asal', 'trim|required|is_numeric');

        // Data Kegiatan
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('esti_keg', 'estimasi jumlah jamaah', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga penyelenggara', 'trim|required');

        // Data Lampiran
        if(empty($_FILES['surat_permohonan_dalam']['name'])){
            $this->form_validation->set_rules('surat_permohonan_dalam', 'upload surat permohonan', 'required');}
        if(empty($_FILES['proposal_dalam']['name'])){
            $this->form_validation->set_rules('proposal_dalam', 'upload proposal', 'required');}
        if(empty($_FILES['cv_crmh_dalam']['name'])){
            $this->form_validation->set_rules('cv_crmh_dalam', 'upload cv penceramah', 'required');}
        if(empty($_FILES['pasp_crmh_dalam']['name'])){
            $this->form_validation->set_rules('pasp_crmh_dalam', 'upload paspor penceramah', 'required');}
        if(empty($_FILES['ktp_dalam']['name'])){
            $this->form_validation->set_rules('ktp_dalam', 'upload ktp', 'required');}
        if(empty($_FILES['pas_foto_crmh_dalam']['name'])){
            $this->form_validation->set_rules('pas_foto_crmh_dalam', 'upload pas foto penceramah', 'required');}

        if($this->form_validation->run() == TRUE)
        {
            // Mengambil id layanan terakhir
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            // Data Layanan
            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE),
                "stat" => 1
            );
            $this->bm->kirim_dataLayanan_impor($layanan);

            // Data Penceramah
            $narsum = $_POST['narsum'];
            $single = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "jns_kelamin" => $this->input->post("jns_kelamin", TRUE),
                "tmp_lhr" => $this->input->post("tmp_lhr", TRUE),
                "tgl_lhr" => $this->input->post("tgl_lhr", TRUE),
                "no_paspor" => $this->input->post("no_paspor", TRUE),
                "negara_asl" => $this->input->post("negara_asl", TRUE)
            );

            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id_layanan' => $single['id_layanan'],
                    'jns_kelamin' => $single['jns_kelamin'],
                    'tmp_lhr' => $single['tmp_lhr'],
                    'tgl_lhr' => $single['tgl_lhr'],
                    'no_paspor' => $single['no_paspor'],
                    'negara_asl' => $single['negara_asl'],
                    'narsum'=>$nm
                ));
                $index++;
            }
            $this->bm->kirim_dataPenceramah_impor($data);

            // Data Kegiatan
            $kegiatan = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "nm_keg" => $this->input->post("nm_keg", TRUE),
                "tgl_awal_keg" => $this->input->post("tgl_awal_keg", TRUE),
                "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg", TRUE),
                "esti_keg" => $this->input->post("esti_keg", TRUE),
                "lemb_keg" => $this->input->post("lemb_keg", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE)
            );
            $this->bm->kirim_dataKegiatan_impor($kegiatan);

            // Data Lampiran
            $lampiran = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "surat_permohonan_dalam" => $this->_do_upload_surat_permohonan_dalam(),
                "proposal_dalam" => $this->_do_upload_proposal_dalam(),
                "cv_crmh_dalam" => $this->_do_upload_cv_crmh_dalam(),
                "pasp_crmh_dalam" => $this->_do_upload_pasp_crmh_dalam(),
                "ktp_dalam" => $this->_do_upload_ktp_dalam(),
                "pas_foto_crmh_dalam" => $this->_do_upload_pas_foto_crmh_dalam()
            );
            $this->bm->kirim_dataLampiran_impor($lampiran);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/dataimpor/')."';</script>";
        } else {
            return $this->import();
        }
    }

    public function simpan_formd()
    {
        // Data Penceramah
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jenis kelamin', 'trim|required|is_numeric');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');

        // Data Kegiatan
        $this->form_validation->set_rules('nm_keg', 'nama program', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal pelaksanaan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir pelaksanaan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jamaah', 'trim|required');
        $this->form_validation->set_rules('lemb_keg', 'nama lembaga', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');

        // Data Lampiran
        if(empty($_FILES['surat_permohonan_safari']['name'])){
            $this->form_validation->set_rules('surat_permohonan_safari', 'upload surat permohonan', 'required');}
        if(empty($_FILES['proposal_safari']['name'])){
            $this->form_validation->set_rules('proposal_safari', 'upload proposal', 'required');}
        if(empty($_FILES['cv_crmh_safari']['name'])){
            $this->form_validation->set_rules('cv_crmh_safari', 'upload cv penceramah', 'required');}
        if(empty($_FILES['pasp_crmh_safari']['name'])){
            $this->form_validation->set_rules('pasp_crmh_safari', 'upload paspor penceramah', 'required');}
        if(empty($_FILES['ktp_safari']['name'])){
            $this->form_validation->set_rules('ktp_safari', 'upload ktp', 'required');}
        if(empty($_FILES['pas_foto_crmh_safari']['name'])){
            $this->form_validation->set_rules('pas_foto_crmh_safari', 'upload pas foto penceramah', 'required');}
        if(empty($_FILES['crt_crmh_safari']['name'])){
            $this->form_validation->set_rules('crt_crmh_safari', 'scan sertifikat penceramah', 'required');}
        
        if ($this->form_validation->run() == TRUE)
        {
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            // Data Layanan
            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE),
                "stat" => 1
            );
            $this->bm->kirim_dataLayanan_safari($layanan);

            // Data Penceramah
            $narsum = $_POST['narsum'];
            $single = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "jns_kelamin" => $this->input->post("jns_kelamin", TRUE),
                "tmp_lhr" => $this->input->post("tmp_lhr", TRUE),
                "tgl_lhr" => $this->input->post("tgl_lhr", TRUE)
            );

            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id_layanan' => $single['id_layanan'],
                    'jns_kelamin' => $single['jns_kelamin'],
                    'tmp_lhr' => $single['tmp_lhr'],
                    'tgl_lhr' => $single['tgl_lhr'],
                    'narsum'=>$nm
                ));
                $index++;
            }
            $this->bm->kirim_dataPenceramah_safari($data);

            // Data Kegiatan
            $kegiatan = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "nm_keg" => $this->input->post("nm_keg", TRUE),
                "tgl_awal_keg" => $this->input->post("tgl_awal_keg", TRUE),
                "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg", TRUE),
                "esti_keg" => $this->input->post("esti_keg", TRUE),
                "lemb_keg" => $this->input->post("lemb_keg", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE)
            );
            $this->bm->kirim_dataKegiatan_safari($kegiatan);

            $lampiran = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "surat_permohonan_safari" => $this->_do_upload_surat_permohonan_safari(),
                "proposal_safari" => $this->_do_upload_proposal_safari(),
                "cv_crmh_safari" => $this->_do_upload_cv_crmh_safari(),
                "pasp_crmh_safari" => $this->_do_upload_pasp_crmh_safari(),
                "ktp_safari" => $this->_do_upload_ktp_safari(),
                "pas_foto_crmh_safari" => $this->_do_upload_pas_foto_crmh_safari(),
                "crt_crmh_safari" => $this->_do_upload_crt_crmh_safari()
            );
            $this->bm->kirim_dataLampiran_safari($lampiran);
            echo "<script>alert('Data berhasil disimpan, mohon isi data pendidikan');window.location = '".site_url('users/binsyar/safaripendidikan/')."';</script>";
        } else {
            return $this->safari();
        }
    }

    public function simpan_forme()
    {
        // Data kegiatan
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jumlah jamaah', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga penyelenggara', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('alamat_keg', 'alamat kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan kegiatan', 'trim|required|is_numeric');

        // Data Lampiran
        if(empty($_FILES['ktp']['name'])){
            $this->form_validation->set_rules('ktp', 'upload ktp', 'required');}
        if(empty($_FILES['proposal_keg']['name'])){
            $this->form_validation->set_rules('proposal_keg', 'upload proposal kegiatan', 'required');}
        if(empty($_FILES['surat_permohonan_keg']['name'])){
            $this->form_validation->set_rules('surat_permohonan_keg', 'upload surat permohonan kegiatan', 'required');}

        if ($this->form_validation->run() == TRUE) {
            // Mengambil id layanan terakhir
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            // Data single
            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "stat" => 1,
                "kategori_pemohon" => 2,
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE)
            );
            $this->bm->kirim_dataLayanan_lembaga($layanan);

            $kegiatan = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "nm_keg" => $this->input->post('nm_keg'),
                "esti_keg" => $this->input->post('esti_keg'),
                "lemb_keg" => $this->input->post('lemb_keg'),
                "tgl_awal_keg" => $this->input->post('tgl_awal_keg'),
                "tgl_akhir_keg" => $this->input->post('tgl_akhir_keg'),
                "alamat_keg" => $this->input->post('alamat_keg')
            );
            $this->bm->kirim_dataKegiatan_lembaga($kegiatan);

            $narsum = $_POST['narsum'];
            $narsum_single = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
            );
            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id_layanan'=>$narsum_single['id_layanan'],
                    'narsum'=>$nm,
                ));
                $index++;
            }
            $this->bm->kirim_dataPenceramah_lembaga($data);

            $dokumen = array(
                "id_layanan" => $this->input->post('id_layanan'),
                "ktp" => $this->_do_upload_ktp(),
                "proposal_keg" => $this->_do_upload_proposal_keg(),
                "surat_permohonan_keg" => $this->_do_upload_surat_permohonan_keg()
            );
            $this->bm->kirim_dataDokumen_lembaga($dokumen);
            
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/datakegiatan/')."';</script>";
        } else {
            return $this->lembaga();
        }
    }

    public function simpan_formpendidikan()
    {
        $id_crmh = $_POST['id_crmh'];
        $pddk = $_POST['pddk'];
        $program_pddk = $_POST['program_pddk'];
        $almt_pddk = $_POST['almt_pddk'];
        $lulus_pddk = $_POST['lulus_pddk'];

        $single = array(
            "pddk_non" => $this->input->post("pddk_non", TRUE)
        );

        $data = array();
        $index = 0;

        foreach($pddk as $nm)
            {
                array_push($data, array(
                    'id_crmh' => $id_crmh[$index],
                    'program_pddk' => $program_pddk[$index],
                    'almt_pddk' => $almt_pddk[$index],
                    'lulus_pddk' => $lulus_pddk[$index],
                    'pddk_non' => $single['pddk_non'],
                    'pddk'=> $nm
                ));
                $index++;
            }
        var_dump($data);
        die();
    }

    //------------------------------ Kumpulan Data Proses Edit Ke DB
    public function simpanedit_layanankegiatan()
    {
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');

        $id = $this->input->post("id", TRUE);
        $data_layanan = array(
            "id_user" => $this->input->post("id_user", TRUE),
            "id_provinsi" => $this->input->post("id_provinsi", TRUE),
            "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
            "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
            "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
            "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
            "sysupdateuser" => $this->input->post("sysupdateuser", TRUE),
            "sysupdatedate" => $this->input->post("sysupdatedate", TRUE),
            "id_stat" => $this->input->post("id_stat", TRUE),
            "kategori_pemohon" => 1,
        );
        $this->bm->save_tbl_layananprop($data_layanan, $id);
        echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
    }

    public function simpanedit_kegiatan()
    {
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jamaah kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('alamat_keg', 'alamat kegiatan', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("id", TRUE);
            $data_kegiatan = array(
                "id_layanan" => $this->input->post("id_layanan", TRUE),
                "nm_keg" => $this->input->post("nm_keg", TRUE),
                "esti_keg" => $this->input->post("esti_keg", TRUE),
                "lemb_keg" => $this->input->post("lemb_keg", TRUE),
                "tgl_awal_keg" => $this->input->post("tgl_awal_keg", TRUE),
                "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg", TRUE),
                "alamat_keg" => $this->input->post("alamat_keg", TRUE)
            );
            $this->bm->save_tbl_kegiatan($data_kegiatan, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editkegiatan($id);
        }
    }    

    public function simpanedit_penceramah()
    {
        $this->form_validation->set_rules('narsum[]', 'nama penceramah', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $narsum = $_POST['narsum'];
            $id = $_POST['id'];
            $id_layanan = $_POST['id_layanan'];

            $single = array(
                "id_layanan" => $this->input->post('id_layanan'),
                "id" => $this->input->post('id')
            );

            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id'=>$id[$index],
                    'id_layanan'=>$id_layanan[$index],
                    'narsum'=>$nm
                ));
                $index++;
            }
            // var_dump($data);
            // die();
            $this->db->update_batch('dt_penceramah', $data, 'id');
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editkegiatan($id);
        }
    }

    public function simpanedit_lampiran()
    {
        $id = $this->input->post('id');
        $id_layanan = $this->input->post('id_layanan');
        $data = array(
            "id_layanan" => $this->input->post('id_layanan')
        );

        if (!empty($_FILES['ktp']['name'])) {
            $ktpimage = $this->_do_upload_ktp();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->ktp) && $upload->ktp) {
                unlink('assets/uploads/binsyar/'.$upload->ktp);
            }
            $data['ktp'] = $ktpimage;
        }

        if (!empty($_FILES['proposal_keg']['name'])) {
            $proposal_kegimage = $this->_do_upload_ktp();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->proposal_keg) && $upload->proposal_keg) {
                unlink('assets/uploads/binsyar/'.$upload->proposal_keg);
            }
            $data['proposal_keg'] = $proposal_kegimage;
        }

        if (!empty($_FILES['surat_permohonan_keg']['name'])) {
            $surat_permohonan_kegimage = $this->_do_upload_ktp();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->surat_permohonan_keg) && $upload->surat_permohonan_keg) {
                unlink('assets/uploads/binsyar/'.$upload->surat_permohonan_keg);
            }
            $data['surat_permohonan_keg'] = $surat_permohonan_kegimage;
        }

        $this->bm->save_tbl_lampiran($data, $id);
        echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
    }

    public function simpanedit_ekspor_kegiatan()
    {
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jamaah kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('alamat_keg', 'alamat kegiatan', 'trim|required');
        $this->form_validation->set_rules('code_negara', 'kode negara', 'trim|required|is_numeric');

        if($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("id", TRUE);
            $data_kegiatan = array(
                "id_layanan" => $this->input->post("id_layanan", TRUE),
                "nm_keg" => $this->input->post("nm_keg", TRUE),
                "esti_keg" => $this->input->post("esti_keg", TRUE),
                "lemb_keg" => $this->input->post("lemb_keg", TRUE),
                "tgl_awal_keg" => $this->input->post("tgl_awal_keg", TRUE),
                "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg", TRUE),
                "alamat_keg" => $this->input->post("alamat_keg", TRUE),
                "code_negara" => $this->input->post("code_negara", TRUE)
            );

            $this->bm->save_tbl_ekspor($data_kegiatan, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editekspor($id);
        }
    }

    public function simpanedit_ekspor_penceramah()
    {
        $this->form_validation->set_rules('narsum[]', 'nama penceramah', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jenis kelamin', 'trim|required|is_numeric');
        $this->form_validation->set_rules('no_paspor', 'nomor pasport', 'trim|required|is_numeric');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('almt_penceramah', 'alamat penceramah', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $id = $_POST['id'];
            $id_layanan = $_POST['id_layanan'];
            $narsum = $_POST['narsum'];

            $single = array(
                "jns_kelamin" => $this->input->post('jns_kelamin', TRUE),
                "no_paspor" => $this->input->post('no_paspor', TRUE),
                "tmp_lhr" => $this->input->post('tmp_lhr', TRUE),
                "tgl_lhr" => $this->input->post('tgl_lhr', TRUE),
                "id_provinsi" => $this->input->post('id_provinsi', TRUE),
                "id_kabupaten" => $this->input->post('id_kabupaten', TRUE),
                "id_kecamatan" => $this->input->post('id_kecamatan', TRUE),
                "id_kelurahan" => $this->input->post('id_kelurahan', TRUE),
                "almt_penceramah" => $this->input->post('almt_penceramah', TRUE)
            );

            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'id' => $id[$index],
                    'id_layanan' => $id_layanan[$index],
                    'jns_kelamin' => $single['jns_kelamin'],
                    'no_paspor' => $single['no_paspor'],
                    'tmp_lhr' => $single['tmp_lhr'],
                    'tgl_lhr' => $single['tgl_lhr'],
                    'id_provinsi' => $single['id_provinsi'],
                    'id_kabupaten' => $single['id_kabupaten'],
                    'id_kecamatan' => $single['id_kecamatan'],
                    'id_kelurahan' => $single['id_kelurahan'],
                    'almt_penceramah' => $single['almt_penceramah'],
                    'narsum' => $nm
                ));
                $index++;
            }
            $this->db->update_batch('dt_penceramah', $data, 'id');
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editekspor($id);
        }
    }

    public function simpanedit_ekspor_lampiran()
    {
        $id = $this->input->post('id');
        $id_layanan = $this->input->post('id_layanan');
        $data = array(
            "id_layanan" => $this->input->post('id_layanan')
        );

        if (!empty($_FILES['surat_permohonan_luar']['name'])) {
            $surat_permohonan_luarimage = $this->_do_upload_surat_permohonan_luar();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->surat_permohonan_luar) && $upload->surat_permohonan_luar) {
                unlink('assets/uploads/binsyar/'.$upload->surat_permohonan_luar);
            }
            $data['surat_permohonan_luar'] = $surat_permohonan_luarimage;
        }

        if (!empty($_FILES['proposal_luar']['name'])) {
            $proposal_luarimage = $this->_do_upload_proposal_luar();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->proposal_luar) && $upload->proposal_luar) {
                unlink('assets/uploads/binsyar/'.$upload->proposal_luar);
            }
            $data['proposal_luar'] = $proposal_luarimage;
        }

        if (!empty($_FILES['cv_crmh_luar']['name'])) {
            $cv_crmh_luarimage = $this->_do_upload_cv_crmh_luar();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->cv_crmh_luar) && $upload->cv_crmh_luar) {
                unlink('assets/uploads/binsyar/'.$upload->cv_crmh_luar);
            }
            $data['cv_crmh_luar'] = $cv_crmh_luarimage;
        }

        if (!empty($_FILES['pasp_crmh_luar']['name'])) {
            $pasp_crmh_luarimage = $this->_do_upload_pasp_crmh_luar();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->pasp_crmh_luar) && $upload->pasp_crmh_luar) {
                unlink('assets/uploads/binsyar/'.$upload->pasp_crmh_luar);
            }
            $data['pasp_crmh_luar'] = $pasp_crmh_luarimage;
        }

        if (!empty($_FILES['pasp_pengundang_luar']['name'])) {
            $pasp_pengundang_luarimage = $this->_do_upload_pasp_pengundang_luar();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->pasp_pengundang_luar) && $upload->pasp_pengundang_luar) {
                unlink('assets/uploads/binsyar/'.$upload->pasp_pengundang_luar);
            }
            $data['pasp_pengundang_luar'] = $pasp_pengundang_luarimage;
        }

        if (!empty($_FILES['pas_foto_crmh_luar']['name'])) {
            $pas_foto_crmh_luarimage = $this->_do_upload_pas_foto_crmh_luar();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->pas_foto_crmh_luar) && $upload->pas_foto_crmh_luar) {
                unlink('assets/uploads/binsyar/'.$upload->pas_foto_crmh_luar);
            }
            $data['pas_foto_crmh_luar'] = $pas_foto_crmh_luarimage;
        }

        $this->bm->save_tbl_ekspor_lampiran($data, $id);
        echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
    }

    public function simpanedit_impor()
    {
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jamaah kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');

        if($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post("id", TRUE);
            $data_kegiatan = array(
                "id_layanan" => $this->input->post("id_layanan", TRUE),
                "nm_keg" => $this->input->post("nm_keg", TRUE),
                "esti_keg" => $this->input->post("esti_keg", TRUE),
                "lemb_keg" => $this->input->post("lemb_keg", TRUE),
                "tgl_awal_keg" => $this->input->post("tgl_awal_keg", TRUE),
                "tgl_akhir_keg" => $this->input->post("tgl_akhir_keg", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "code_negara" => 101
            );

            $this->bm->save_tbl_impor($data_kegiatan, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editimpor($id);
        }
    }

    public function simpanedit_impor_penceramah()
    {
        $this->form_validation->set_rules('narsum[]', 'nama penceramah', 'trim|required');
        $this->form_validation->set_rules('jns_kelamin', 'jenis kelamin', 'trim|required|is_numeric');
        $this->form_validation->set_rules('no_paspor', 'nomor pasport', 'trim|required|is_numeric');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('negara_asl', 'negara asal', 'trim|required|is_numeric');

        if ($this->form_validation->run() == TRUE)
        {
            $id = $_POST['id'];
            $id_layanan = $_POST['id_layanan'];
            $narsum = $_POST['narsum'];

            $single = array(
                "jns_kelamin" => $this->input->post('jns_kelamin', TRUE),
                "no_paspor" => $this->input->post('no_paspor', TRUE),
                "tmp_lhr" => $this->input->post('tmp_lhr', TRUE),
                "tgl_lhr" => $this->input->post('tgl_lhr', TRUE),
                "negara_asl" => $this->input->post('negara_asl', TRUE)
            );

            $data = array();
            $index = 0;

            foreach($narsum as $nm)
            {
                array_push($data, array(
                    'narsum' => $nm,
                    'id' => $id[$index],
                    'id_layanan' => $id_layanan[$index],
                    'jns_kelamin' => $single['jns_kelamin'],
                    'no_paspor' => $single['no_paspor'],
                    'tmp_lhr' => $single['tmp_lhr'],
                    'tgl_lhr' => $single['tgl_lhr'],
                    'negara_asl' => $single['negara_asl']
                ));
                $index++;
            }
            $this->db->update_batch('dt_penceramah', $data, 'id');
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editimpor($id);
        }
    }

    public function simpanedit_impor_lampiran()
    {
        $id = $this->input->post('id');
        $id_layanan = $this->input->post('id_layanan');
        $data = array(
            "id_layanan" => $this->input->post('id_layanan')
        );

        if (!empty($_FILES['surat_permohonan_dalam']['name'])) {
            $surat_permohonan_dalamimage = $this->_do_upload_surat_permohonan_dalam();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->surat_permohonan_dalam) && $upload->surat_permohonan_dalam) {
                unlink('assets/uploads/binsyar/'.$upload->surat_permohonan_dalam);
            }
            $data['surat_permohonan_dalam'] = $surat_permohonan_dalamimage;
        }

        if (!empty($_FILES['proposal_dalam']['name'])) {
            $proposal_dalamimage = $this->_do_upload_proposal_dalam();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->proposal_dalam) && $upload->proposal_dalam) {
                unlink('assets/uploads/binsyar/'.$upload->proposal_dalam);
            }
            $data['proposal_dalam'] = $proposal_dalamimage;
        }

        if (!empty($_FILES['cv_crmh_dalam']['name'])) {
            $cv_crmh_dalamimage = $this->_do_upload_cv_crmh_dalam();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->cv_crmh_dalam) && $upload->cv_crmh_dalam) {
                unlink('assets/uploads/binsyar/'.$upload->cv_crmh_dalam);
            }
            $data['cv_crmh_dalam'] = $cv_crmh_dalamimage;
        }

        if (!empty($_FILES['pasp_crmh_dalam']['name'])) {
            $pasp_crmh_dalamimage = $this->_do_upload_pasp_crmh_dalam();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->pasp_crmh_dalam) && $upload->pasp_crmh_dalam) {
                unlink('assets/uploads/binsyar/'.$upload->pasp_crmh_dalam);
            }
            $data['pasp_crmh_dalam'] = $pasp_crmh_dalamimage;
        }

        if (!empty($_FILES['ktp_dalam']['name'])) {
            $ktp_dalamimage = $this->_do_upload_ktp_dalam();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->ktp_dalam) && $upload->ktp_dalam) {
                unlink('assets/uploads/binsyar/'.$upload->ktp_dalam);
            }
            $data['ktp_dalam'] = $ktp_dalamimage;
        }

        if (!empty($_FILES['pas_foto_crmh_dalam']['name'])) {
            $pas_foto_crmh_dalamimage = $this->_do_upload_pas_foto_crmh_dalam();

            $upload = $this->bm->cek_gambar($id_layanan);
            if (file_exists('assets/uploads/binsyar/'.$upload->pas_foto_crmh_dalam) && $upload->pas_foto_crmh_dalam) {
                unlink('assets/uploads/binsyar/'.$upload->pas_foto_crmh_dalam);
            }
            $data['pas_foto_crmh_dalam'] = $pas_foto_crmh_dalamimage;
        }

        $this->bm->save_tbl_impor_lampiran($data, $id);
        echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
    }

    // Kumpulan Uplodan per form
    private function _do_upload_ktp()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["ktp"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ktp')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_proposal_keg()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["proposal_keg"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('proposal_keg')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_surat_permohonan_keg()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["surat_permohonan_keg"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('surat_permohonan_keg')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->ekspor();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_surat_permohonan_luar()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["surat_permohonan_luar"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('surat_permohonan_luar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->ekspor();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_proposal_luar()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["proposal_luar"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('proposal_luar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->ekspor();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_cv_crmh_luar()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["cv_crmh_luar"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('cv_crmh_luar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->ekspor();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pasp_crmh_luar()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pasp_crmh_luar"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pasp_crmh_luar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->ekspor();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pasp_pengundang_luar()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pasp_pengundang_luar"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pasp_pengundang_luar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->ekspor();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pas_foto_crmh_luar()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pas_foto_crmh_luar"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pas_foto_crmh_luar')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->kegiatan();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_surat_permohonan_dalam()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["surat_permohonan_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('surat_permohonan_dalam')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_proposal_dalam()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["proposal_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('proposal_dalam')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_cv_crmh_dalam()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["cv_crmh_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('cv_crmh_dalam')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pasp_crmh_dalam()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pasp_crmh_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pasp_crmh_dalam')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_ktp_dalam()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["ktp_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ktp_dalam')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pas_foto_crmh_dalam()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pas_foto_crmh_dalam"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pas_foto_crmh_dalam')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_surat_permohonan_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["surat_permohonan_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('surat_permohonan_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_proposal_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["proposal_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('proposal_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_cv_crmh_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["cv_crmh_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('cv_crmh_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pasp_crmh_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pasp_crmh_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pasp_crmh_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_ktp_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["ktp_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('ktp_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_pas_foto_crmh_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["pas_foto_crmh_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('pas_foto_crmh_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    private function _do_upload_crt_crmh_safari()
    {
        $data['user'] = $this->bm->get_identitas();
        $image_name = date('d-m-Y').'_'.$data['user']->fullname.'_'.$_FILES["crt_crmh_safari"]['name'];

        $config['upload_path']      = 'assets/uploads/binsyar/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png|doc|docx|xls|xlsx|pdf';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        // $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('crt_crmh_safari')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->import();
        }
        return $this->upload->data('file_name');
    }

    // Kumpulan Data-Data Provinsi, Kabupaten, Kecamtan, Kelurahan
    public function add_ajax_kab($id_prov)
    {
        $query = $this->db->get_where('mt_wil_kabupaten',array('id_provinsi'=>$id_prov));
        $data = "<option value=''>- Pilih Kabupaten -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_kabupaten."'>".$value->nama."</option>";
        }
        echo $data;
    }

    public function add_ajax_kec($id_kab)
    {
        $query = $this->db->get_where('mt_wil_kecamatan',array('id_kabupaten'=>$id_kab));
        $data = "<option value=''> - Pilih Kecamatan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_kecamatan."'>".$value->nama."</option>";
        }
        echo $data;
    }

    public function add_ajax_kel($id_kel)
    {
        $query = $this->db->get_where('mt_wil_kelurahan',array('id_kecamatan'=>$id_kel));
        $data = "<option value=''> - Pilih Kelurahan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_kelurahan."'>".$value->nama."</option>";
        }
        echo $data;
    }

    public function add_ajax_des($id_kec)
    {
        $query = $this->db->get_where('mt_wil_kelurahan',array('id_kecamatan'=>$id_kec));
        $data = "<option value=''> - Pilih Kelurahan - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='".$value->id_kelurahan."'>".$value->nama."</option>";
        }
        echo $data;
    }

}
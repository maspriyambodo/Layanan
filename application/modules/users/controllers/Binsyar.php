<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Binsyar extends MX_Controller {
    function __construct()
    {
      parent::__construct();
      $this->load->model('Binsyar_m','bm');
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
        $data["js_inlines"] = $js_inlines;
        // var_dump($data['jenis_layanan'][5]->id);
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
        $data["dataku"] = $this->bm->get_dt_kegiatan($id);
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
        $data["dataku"] = $this->bm->get_dt_ekspor($id);
        // var_dump($data['dataku'][2]->id_provinsi);
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
        // $this->form_validation->set_rules('ktp', 'dokumen KTP', 'required');
        // $this->form_validation->set_rules('proposal_keg', 'proposal kegiatan', 'required');
        // $this->form_validation->set_rules('surat_permohonan_keg', 'surat permohonan', 'required');

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
                "ktp" => $this->uplodan->doupload_ktp_kegiatan(),
                "proposal_keg" => $this->uplodan->doupload_proposal_kegiatan(),
                "surat_permohonan_keg" => $this->uplodan->doupload_permohonan_kegiatan()
            );
            $this->bm->kirim_dataDokumen($dokumen);
            
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/kegiatan/')."';</script>";
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
        // $this->form_validation->set_rules('surat_permohonan_luar', 'surat permohonan', 'trim|required');
        // $this->form_validation->set_rules('proposal_luar', 'proposal', 'trim|required');
        // $this->form_validation->set_rules('cv_crmh_luar', 'cv penceramah', 'trim|required');
        // $this->form_validation->set_rules('pasp_crmh_luar', 'paspor penceramah', 'trim|required');
        // $this->form_validation->set_rules('pasp_pengundang_luar', 'paspor pengundang', 'trim|required');
        // $this->form_validation->set_rules('pas_foto_crmh_luar', 'pas foto penceramah', 'trim|required');

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
            // var_dump($layanan);
            // die();
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

            // var_dump($data);
            // die();
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
            // var_dump($kegiatan);
            // die();
            $this->bm->kirim_dataKegiatan_ekspor($kegiatan);

            // Data Lampiran
            $lampiran = array(
                "id_layanan" => $id_dt_layanan['id']->id + 1,
                "surat_permohonan_luar" => $this->uplodan->doupload_sp_luar(),
                "proposal_luar" => $this->uplodan->doupload_proposal_luar(),
                "cv_crmh_luar" => $this->uplodan->doupload_cv_luar(),
                "pasp_crmh_luar" => $this->uplodan->doupload_paspor_luar(),
                "pasp_pengundang_luar" => $this->uplodan->doupload_pengundang_luar(),
                "pas_foto_crmh_luar" => $this->uplodan->doupload_foto_luar()
            );
            // var_dump($lampiran);
            // die();
            $this->bm->kirim_dataLampiran_ekspor($lampiran);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/ekspor/')."';</script>";
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
        // $this->form_validation->set_rules('surat_permohonan_dalam', 'surat permohonan', 'trim|required');
        // $this->form_validation->set_rules('proposal_dalam', 'proposal', 'trim|required');
        // $this->form_validation->set_rules('cv_crmh_dalam', 'cv penceramah', 'trim|required');
        // $this->form_validation->set_rules('pasp_crmh_dalam', 'paspor penceramah', 'trim|required');
        // $this->form_validation->set_rules('ktp_dalam', 'paspor pengundang', 'trim|required');
        // $this->form_validation->set_rules('pas_foto_crmh_dalam', 'pas foto penceramah', 'trim|required');

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
                "surat_permohonan_dalam" => $this->uplodan->doupload_sp_dalam(),
                "proposal_dalam" => $this->uplodan->doupload_proposal_dalam(),
                "cv_crmh_dalam" => $this->uplodan->doupload_cv_dalam(),
                "pasp_crmh_dalam" => $this->uplodan->doupload_paspor_dalam(),
                "ktp_dalam" => $this->uplodan->doupload_ktp_dalam(),
                "pas_foto_crmh_dalam" => $this->uplodan->doupload_foto_dalam()
            );
            $this->bm->kirim_dataLampiran_impor($lampiran);
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/import/')."';</script>";

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
        
        // Data Pendidikan Penceramah
        $this->form_validation->set_rules('pddk[]', 'pendidikan formal', 'trim|required');
        $this->form_validation->set_rules('pddk_non[]', 'pendidikan non formal', 'trim|required');

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
        // Data Lampiran
        // $this->form_validation->set_rules('surat_permohonan_safari', 'surat permohonan', 'trim|required');
        // $this->form_validation->set_rules('proposal_safari', 'proposal', 'trim|required');
        // $this->form_validation->set_rules('cv_crmh_safari', 'cv penceramah', 'trim|required');
        // $this->form_validation->set_rules('pasp_crmh_safari', 'paspor penceramah', 'trim|required');
        // $this->form_validation->set_rules('ktp_safari', 'ktp penceramah', 'trim|required');
        // $this->form_validation->set_rules('pas_foto_crmh_safari', 'pas foto penceramah', 'trim|required');
        // $this->form_validation->set_rules('crt_crmh_safari', 'sertifikat penceramah', 'trim|required');

        // if ($this->form_validation->run() == TRUE)
        // {
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            // Data Layanan
            $layanan = array(
                "id_user" => $this->input->post("id_user", TRUE),
                "id_stat" => $this->input->post("id_stat", TRUE),
                "jenis_layanan" => $this->input->post("jenis_layanan", TRUE),
                "syscreateuser" => $this->input->post("id_user", TRUE),
                "syscreatedate" => $this->input->post("syscreatedate", TRUE)
            );
            // var_dump($layanan);
            // die();

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
            // var_dump($data);
            // die();
            $this->bm->kirim_dataPenceramah_safari($data);

            // Data Pendidikan
            $id_dt_penceramah['id'] = $this->bm->get_id_dtpenceramah();
            $pddk = $_POST['pddk'];
            $pddk_non = $_POST['pddk_non'];

            $single = array(
                "id_crmh" => $id_dt_penceramah['id']->id
            );

            $data = array();
            $index = 0;

            foreach($pddk as $nm)
            {
                array_push($data, array(
                    'id_crmh' => $single['id_crmh'],
                    'pddk' => $nm,
                    'pddk_non' => $pddk_non[$index]
                ));
                $index++;
            }
            // var_dump($data);
            // die();
            $this->bm->kirim_dataPendidikan_safari($data);
        // } else {
        //     return $this->safari();
        // }
    }

    //------------------------------ Kumpulan Data Proses Edit Ke DB
    public function simpanedit_kegiatan()
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
        $this->form_validation->set_rules('alamat_keg', 'alamat kegiatan', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
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

            $id_layanan = $this->input->post("id_layanan", TRUE);
            $data_layanan = array(
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
                "sysupdateuser" => $this->input->post("sysupdateuser", TRUE),
                "sysupdatedate" => $this->input->post("sysupdatedate", TRUE)
            );
            $this->bm->save_tbl_layananprop($data_layanan, $id_layanan);
            
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
            // redirect(site_url('pendakwahlokal/update/'.$this->input->post('f_idpendakwah')));
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
            $this->db->update_batch('dt_penceramah', $data, 'id');
            // var_dump($data);
            // die();
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editkegiatan($id);
        }
    }

    public function simpanedit_lampiran()
    {
        $this->form_validation->set_rules('id_layanan', 'layanan', 'trim|required|is_numeric');
        // $this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
        // $this->form_validation->set_rules('proposal_keg', 'proposal kegiatan', 'trim|required');
        // $this->form_validation->set_rules('surat_permohonan_keg', 'surat permohonan kegiatan', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = array(
                "id_layanan" => $this->input->post('id_layanan'),
                "ktp" => $this->uplodan->doupload_ktp_kegiatan(),
                "proposal_keg" => $this->uplodan->doupload_proposal_kegiatan(),
                "surat_permohonan_keg" => $this->uplodan->doupload_permohonan_kegiatan()
            );

            $this->bm->save_tbl_lampiran($data, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editkegiatan($id);
        }
    }

    public function simpanedit_ekspor()
    {
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jamaah kegiatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('alamat_keg', 'alamat kegiatan', 'trim|required');
        $this->form_validation->set_rules('code_negara', 'kode negara', 'trim|required');

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
        $this->form_validation->set_rules('id_layanan', 'layanan', 'trim|required|is_numeric');
        // $this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
        // $this->form_validation->set_rules('proposal_keg', 'proposal kegiatan', 'trim|required');
        // $this->form_validation->set_rules('surat_permohonan_keg', 'surat permohonan kegiatan', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post('id');
            $data = array(
                "id_layanan" => $this->input->post('id_layanan'),
                "surat_permohonan_luar" => $this->uplodan->doupload_sp_luar(),
                "proposal_luar" => $this->uplodan->doupload_proposal_luar(),
                "cv_crmh_luar" => $this->uplodan->doupload_cv_luar(),
                "pasp_crmh_luar" => $this->uplodan->doupload_paspor_luar(),
                "pasp_pengundang_luar" => $this->uplodan->doupload_pengundang_luar(),
                "pas_foto_crmh_luar" => $this->uplodan->doupload_foto_luar()
            );
            // var_dump($data);
            // die();
            $this->bm->save_tbl_ekspor_lampiran($data, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editkegiatan($id);
        }
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
                    'id' => $id[$index],
                    'id_layanan' => $id_layanan[$index],
                    'jns_kelamin' => $single['jns_kelamin'],
                    'no_paspor' => $single['no_paspor'],
                    'tmp_lhr' => $single['tmp_lhr'],
                    'tgl_lhr' => $single['tgl_lhr'],
                    'negara_asl' => $single['negara_asl'],
                    'narsum' => $nm
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
        $this->form_validation->set_rules('id_layanan', 'layanan', 'trim|required|is_numeric');
        // $this->form_validation->set_rules('ktp', 'ktp', 'trim|required');
        // $this->form_validation->set_rules('proposal_keg', 'proposal kegiatan', 'trim|required');
        // $this->form_validation->set_rules('surat_permohonan_keg', 'surat permohonan kegiatan', 'trim|required');

        if ($this->form_validation->run() == TRUE)
        {
            $id = $this->input->post('id');
            $data = array(
                "id_layanan" => $this->input->post('id_layanan'),
                "surat_permohonan_dalam" => $this->uplodan->doupload_sp_dalam(),
                "proposal_dalam" => $this->uplodan->doupload_proposal_dalam(),
                "cv_crmh_dalam" => $this->uplodan->doupload_cv_dalam(),
                "pasp_crmh_dalam" => $this->uplodan->doupload_paspor_dalam(),
                "ktp_dalam" => $this->uplodan->doupload_ktp_dalam(),
                "pas_foto_crmh_dalam" => $this->uplodan->doupload_foto_dalam()
            );

            $this->bm->save_tbl_impor_lampiran($data, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->editimpor($id);
        }
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
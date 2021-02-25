<?php

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
 * Description of L1_Tolak
 * LAYANAN IZIN KEGIATAN KEAGAMAAN YANG TELAH DITOLAK!
 * @author centos
 */
class L4_Tolak extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan4');
        $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    public function index() {
        $this->template->setPageId("DISETUJUI_SDDN");
        $data = [];
        $sitetitle = "Permohonan Yang Telah Ditolak";
        $pagetitle = "Permohonan Di Tolak";
        $view = "layanan4/v_tolak";
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

    //-------------------------------------------------------- Query Bagus
    public function Joinan_binsyar()
    {
        $kondisi = array(
            "a.id_stat" => 4,
            "a.jenis_layanan" => 3,
            "b.role_id" => 6,
            "f.id" => 2
        );

        // $this->setGroup();
        $this->db->select("a.id, a.id_stat, concat(LPAD(f.id, 2, 0),'.',LPAD(c.id, 2, 0),'.',LPAD(MONTH(a.syscreatedate), 2, 0),'.',YEAR(a.syscreatedate),'.',LPAD(a.id, 4, 0)) as kode, b.fullname, b.nik, c.nama_layanan, d.nm_keg, d.tgl_awal_keg, d.tgl_akhir_keg, d.esti_keg, count(e.id) as jumlah,
            case
            when g.id = 1 then '<b><span class=text-info>permohonan masuk</span></b>'
            when g.id = 2 then '<b><span class=text-warning>permohonan diproses</span></b>'
            when g.id = 3 then '<b><span class=text-success>direkomendasi</span></b>'
            when g.id = 4 then '<b><span class=text-danger>tidak direkomendasi</span></b>'
            end as nama_stat
            ");
        $this->db->from("dt_layanan a");
        $this->db->join("sys_users b", "a.id_user = b.id", "LEFT");
        $this->db->join("mt_layanan c", "a.jenis_layanan = c.id", "LEFT");
        $this->db->join("dt_kegiatan d", "a.id = d.id_layanan", "LEFT");
        $this->db->join("dt_penceramah e", "a.id = e.id_layanan", "LEFT");
        $this->db->join("mt_direktorat f", "c.jenis_layanan = f.id", "LEFT");
        $this->db->join("mt_status_layanan g","a.id_stat = g.id","LEFT");
        $this->db->where($kondisi);
        $this->db->group_by("a.id");

        $get = $this->db->get();
        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
    }

    public function Detail($id)
    {
        $this->template->setPageId("DISETUJUI_SDDN");
        $data = [];
        $sitetitle = "Permohonan Yang Telah Di Tolak";
        $pagetitle = "Permohonan Di Tolak";
        $view = "layanan4/v_detail_tolak";
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
        $data['pemohon'] = $this->M_layanan3->detail_permohonan($id);
        $data['kegiatan'] = $this->M_layanan3->detail_kegiatan($id);
        $data['narsum'] = $this->M_layanan3->detail_narsum($id);
        $data['lampiran'] = $this->M_layanan3->detail_lampiran($id);
        $data["js_inlines"] = $js_inlines;
        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }
}

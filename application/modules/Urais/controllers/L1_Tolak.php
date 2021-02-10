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
class L1_Tolak extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_layanan1');
    }

    public function index() {
        $this->template->setPageId("DITOLAK_IKK");
        $data = [];
        $sitetitle = "Permohonan yang telah ditolak";
        $pagetitle = "Permohonan di Tolak";
        $view = "layanan1/v_tolak";
        $breadcrumbs = [
            [
                "title" => "Izin Kegiatan Keagamaan",
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

    public function Detail($id) {
        $this->template->setPageId("DITOLAK_IKK");
        $data = [];
        $detil_param = [
            'id_layanan' => $id,
            'stat_id' => 4
        ];
        $data['detil'] = $this->M_layanan1->Detail($detil_param);
        if (empty($data['detil'])) {
            redirect(base_url(''), 'refresh');
        } else {
            $sitetitle = "IZIN KEGIATAN KEAGAMAAN";
            $pagetitle = "<span class='text-danger'>Permohonan Tidak di Setujui</span>";
            $view = "layanan1/v_detail_setuju";
            $breadcrumbs = [
                [
                    "title" => "Izin Kegiatan Keagamaan",
                    "link" => base_url('Urais/L1_Tolak/index/'),
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

}

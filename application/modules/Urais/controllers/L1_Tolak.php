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

    public function Get_data() {
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

}

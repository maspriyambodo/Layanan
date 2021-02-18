<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Binsyar extends MX_Controller {
    function __construct()
    {
      parent::__construct();
      $this->load->model('Binsyar_m','bm');
      $this->load->helper(array('form', 'url'));
      $this->load->library(array('upload', 'form_validation'));
      $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

    //------------------------------ Kumpulan Data Halaman
    public function index()
    {
        $this->template->setPageId("OPERATOR_BINSYAR_FORMULIR");
        $data = array();

        $sitetitle = "Data Formulir Binsyar & Urais";
        $pagetitle = "Data Formulir Binsyar & Urais";
        $view = "/binsyar/v_dataformulir";
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

    public function data()
    {
        $this->template->setPageId("OPERATOR_BINSYAR_DATA");
        $data = array();

        $sitetitle = "Data Permohonan Binsyar & Urais";
        $pagetitle = "Data Permohonan Binsyar & Urais";
        $view = "/binsyar/v_datapermohonan";
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

    public function tambah()
    {
        $this->template->setPageId("OPERATOR_BINSYAR_TAMBAH");
        $data = array();

        $sitetitle = "Data Penambahan User Di Tempat";
        $pagetitle = "Data Penambahan User Di Tempat";
        $view = "/binsyar/v_tambahuser";
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
        $data["id_layanan"] = $this->bm->get_idlayanan()->row();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function formulir($id)
    {
        $this->template->setPageId("OPERATOR_BINSYAR_FORMULIR");
        // ijin kegiatan keagamaan [0]
        // ijin penceramah keluar negeri [1]
        // ijin penceramah dari luar negeri [2]
        // ijin bantuan arah kiblat [3]
        // ijin bantuan masjid / mushalla [4]
        // ijin safari dakwah dalam negeri [5]
        // var_dump($cek_id[6]->nama_layanan);
        // die();
        $cek_id = $this->bm->get_formulir()->result();
        if($cek_id[0]->id == $id){
            $sitetitle = $cek_id[0]->nama_layanan;
            $pagetitle = $cek_id[0]->nama_layanan;
            $view = "/binsyar/v_tambahsatu";
            $breadcrumbs = array(
                    array(
                        "title" => "",
                        "link" => "",
                        "is_actived" => false,
                    ),
                    array(
                        "title" => "Direktorat Binsyar & Urais",
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
            $data["id_layanan"] = $this->bm->get_idlayanan()->row();
            $data["id_register"] = $this->bm->get_formulir()->result();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
                
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[1]->id == $id){
            $sitetitle = $cek_id[1]->nama_layanan;
            $pagetitle = $cek_id[1]->nama_layanan;
            $view = "/binsyar/v_tambahdua";
            $breadcrumbs = array(
                    array(
                        "title" => "",
                        "link" => "",
                        "is_actived" => false,
                    ),
                    array(
                        "title" => "Direktorat Binsyar & Urais",
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
            $data["id_layanan"] = $this->bm->get_idlayanan()->row();
            $data["id_register"] = $this->bm->get_formulir()->result();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
                
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[2]->id == $id){
            $sitetitle = $cek_id[2]->nama_layanan;
            $pagetitle = $cek_id[2]->nama_layanan;
            $view = "/binsyar/v_tambahtiga";
            $breadcrumbs = array(
                    array(
                        "title" => "",
                        "link" => "",
                        "is_actived" => false,
                    ),
                    array(
                        "title" => "Direktorat Binsyar & Urais",
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
            $data["id_layanan"] = $this->bm->get_idlayanan()->row();
            $data["id_register"] = $this->bm->get_formulir()->result();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
                
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[3]->id == $id){
            echo "<script>alert('Maaf, ".$cek_id[3]->nama_layanan." Belum Tersedia.');window.location = '".site_url('operator/binsyar/index/')."';</script>";

        }else if($cek_id[4]->id == $id){
            echo "<script>alert('Maaf, ".$cek_id[4]->nama_layanan." Belum Tersedia.');window.location = '".site_url('operator/binsyar/index/')."';</script>";

        }else if($cek_id[5]->id == $id){
            $sitetitle = $cek_id[5]->nama_layanan;
            $pagetitle = $cek_id[5]->nama_layanan;
            $view = "/binsyar/v_tambahempat";
            $breadcrumbs = array(
                    array(
                        "title" => "",
                        "link" => "",
                        "is_actived" => false,
                    ),
                    array(
                        "title" => "Direktorat Binsyar & Urais",
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
            $data["id_layanan"] = $this->bm->get_idlayanan()->row();
            $data["id_register"] = $this->bm->get_formulir()->result();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
                
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
        }
    }

    //------------------------------ Kumpulan Data Simpan
    public function simpan_formuser()
    {
        $this->form_validation->set_rules('fieldname', 'fieldlabel', 'trim|required|min_length[5]|max_length[12]');
    }

    //------------------------------ Kumpulan Data Join
    public function ambil_formulir()
    {
        $data = $this->bm->get_formulir()->result();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
    }

    public function joinan_binsyar()
    {
        $data = $this->bm->get_binsyar()->result();
        $result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
    }

    //------------------------------ Kumpulan Data Hapus
    public function hapus_dt_binsyar()
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

    //------------------------------ Kumpulan Data Edit
    public function editbinsyar($id)
    {
        $this->template->setPageId("OPERATOR_BINSYAR_DATA");
        $data = array();
        $cek_id = $this->bm->get_permohonan($id);
        // var_dump($cek_id);
        // die();

        if($cek_id[0]->id == $id){
            // echo $cek_id[0]->nama_layanan;
            $sitetitle = "Edit ". $cek_id[0]->nama_layanan;
            $pagetitle = "Edit ". $cek_id[0]->nama_layanan;
            $view = "/binsyar/v_editsatu";
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
            // $data["dt_provinsi"] = $this->bm->get_provinsi();
            // $data["dt_kabupaten"] = $this->bm->get_kabupaten();
            // $data["dt_kecamatan"] = $this->bm->get_kecamatan();
            // $data["dt_kelurahan"] = $this->bm->get_kelurahan();
            // $data["pemohon"] = $this->bm->get_edit_pemohon($id);
            // $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
            // $data["penceramah"] = $this->bm->get_edit_penceramah($id);
            // $data["lampiran"] = $this->bm->get_edit_lampiran($id);
            // var_dump(json_encode($data['dataku'][3]->proposal_keg));
            // die();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[1]->id == $id){
            $sitetitle = "Edit ". $cek_id[1]->nama_layanan;
            $pagetitle = "Edit ". $cek_id[1]->nama_layanan;
            $view = "/binsyar/v_editdua";
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
            // $data["dt_provinsi"] = $this->bm->get_provinsi();
            // $data["dt_kabupaten"] = $this->bm->get_kabupaten();
            // $data["dt_kecamatan"] = $this->bm->get_kecamatan();
            // $data["dt_kelurahan"] = $this->bm->get_kelurahan();
            // $data["pemohon"] = $this->bm->get_edit_pemohon($id);
            // $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
            // $data["penceramah"] = $this->bm->get_edit_penceramah($id);
            // $data["lampiran"] = $this->bm->get_edit_lampiran($id);
            // var_dump(json_encode($data['dataku'][3]->proposal_keg));
            // die();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[2]->id == $id){
            $sitetitle = "Edit ". $cek_id[2]->nama_layanan;
            $pagetitle = "Edit ". $cek_id[2]->nama_layanan;
            $view = "/binsyar/v_edittiga";
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
            // $data["dt_provinsi"] = $this->bm->get_provinsi();
            // $data["dt_kabupaten"] = $this->bm->get_kabupaten();
            // $data["dt_kecamatan"] = $this->bm->get_kecamatan();
            // $data["dt_kelurahan"] = $this->bm->get_kelurahan();
            // $data["pemohon"] = $this->bm->get_edit_pemohon($id);
            // $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
            // $data["penceramah"] = $this->bm->get_edit_penceramah($id);
            // $data["lampiran"] = $this->bm->get_edit_lampiran($id);
            // var_dump(json_encode($data['dataku'][3]->proposal_keg));
            // die();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[3]->id == $id){
            $sitetitle = "Edit ". $cek_id[3]->nama_layanan;
            $pagetitle = "Edit ". $cek_id[3]->nama_layanan;
            $view = "/binsyar/v_editempat";
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
            // $data["dt_provinsi"] = $this->bm->get_provinsi();
            // $data["dt_kabupaten"] = $this->bm->get_kabupaten();
            // $data["dt_kecamatan"] = $this->bm->get_kecamatan();
            // $data["dt_kelurahan"] = $this->bm->get_kelurahan();
            // $data["pemohon"] = $this->bm->get_edit_pemohon($id);
            // $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
            // $data["penceramah"] = $this->bm->get_edit_penceramah($id);
            // $data["lampiran"] = $this->bm->get_edit_lampiran($id);
            // var_dump(json_encode($data['dataku'][3]->proposal_keg));
            // die();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[4]->id == $id){
            $sitetitle = "Edit ". $cek_id[4]->nama_layanan;
            $pagetitle = "Edit ". $cek_id[4]->nama_layanan;
            $view = "/binsyar/v_editlima";
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
            // $data["dt_provinsi"] = $this->bm->get_provinsi();
            // $data["dt_kabupaten"] = $this->bm->get_kabupaten();
            // $data["dt_kecamatan"] = $this->bm->get_kecamatan();
            // $data["dt_kelurahan"] = $this->bm->get_kelurahan();
            // $data["pemohon"] = $this->bm->get_edit_pemohon($id);
            // $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
            // $data["penceramah"] = $this->bm->get_edit_penceramah($id);
            // $data["lampiran"] = $this->bm->get_edit_lampiran($id);
            // var_dump(json_encode($data['dataku'][3]->proposal_keg));
            // die();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

        }else if($cek_id[5]->id == $id){
            $sitetitle = "Edit ". $cek_id[5]->nama_layanan;
            $pagetitle = "Edit ". $cek_id[5]->nama_layanan;
            $view = "/binsyar/v_editenam";
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
            // $data["dt_provinsi"] = $this->bm->get_provinsi();
            // $data["dt_kabupaten"] = $this->bm->get_kabupaten();
            // $data["dt_kecamatan"] = $this->bm->get_kecamatan();
            // $data["dt_kelurahan"] = $this->bm->get_kelurahan();
            // $data["pemohon"] = $this->bm->get_edit_pemohon($id);
            // $data["kegiatan"] = $this->bm->get_edit_kegiatan($id);
            // $data["penceramah"] = $this->bm->get_edit_penceramah($id);
            // $data["lampiran"] = $this->bm->get_edit_lampiran($id);
            // var_dump(json_encode($data['dataku'][3]->proposal_keg));
            // die();
            $data["js_inlines"] = $js_inlines;

            $this->template->setSiteTitle($sitetitle);
            $this->template->setPageTitle($pagetitle);
            $this->template->setBreadcrumbs($breadcrumbs);
            $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
        }
    }

}
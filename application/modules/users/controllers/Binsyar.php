<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Binsyar extends MX_Controller {
    function __construct() {
      parent::__construct();
      $this->load->model('Binsyar_m','bm');
    }

    // Bagus
    public function datapermohonan() {
        $this->template->setPageId("DATA_BINSYAR");
        $data = array();

        $sitetitle = "Data Permohonan Binsyar & Urais";
        $pagetitle = "Data Permohonan Binsyar & Urais";
        $view = "/users/v_databinsyar";
        $breadcrumbs = array(
                array(
                    "title" => "Setting Wilayah",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Provinsi",
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

    // Bagus
    public function ambil_dt_join()
    {
        $this->db->distinct();
        $this->db->select("b.id, a.fullname, c.nm_keg, c.esti_keg, c.lemb_keg, c.tgl_awal_keg, e.nama_layanan");
        $this->db->from("sys_users a");
        $this->db->join("dt_layanan b", "a.id = b.id_user");
        $this->db->join("dt_kegiatan c","b.id = c.id_layanan");
        $this->db->join("mt_layanan e","b.jenis_layanan = e.id");
        $this->db->where("a.id", $this->session->userdata("DX_user_id"));
        $this->db->where("b.stat", 1);
        // $this->db->group_by("b.id");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    // Bagus
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

    // Bagus untuk kirim ke model -> database
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
            // Data lebih dari satu
            $id_dt_layanan['id'] = $this->bm->get_id_dtlayanan();

            var_dump(json_encode($dokumen));
            die();
            // // Data single
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
                "ktp" => $this->do_upload_1(),
                "proposal_keg" => $this->do_upload_2(),
                "surat_permohonan_keg" => $this->do_upload_3()
            );
            $this->bm->kirim_dataDokumen($dokumen);
            
            echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('users/binsyar/kegiatan/')."';</script>";
        } else {
            return $this->kegiatan();
        }
    }

    // Bagus
    public function edit($id) {
        $this->template->setPageId("DATA_BINSYAR");
        $data = array();

        $sitetitle = "Edit Data Binsyar";
        $pagetitle = "Edit Data Binsyar";
        $view = "/users/binsyar/v_editdata_binsyar";
        $breadcrumbs = array(
                array(
                    "title" => "Edit Binsyar",
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
        $data["dt_provinsi"] = $this->bm->get_provinsi();
        $data["dt_kabupaten"] = $this->bm->get_kabupaten();
        $data["dt_kecamatan"] = $this->bm->get_kecamatan();
        $data["dt_kelurahan"] = $this->bm->get_kelurahan();
        $data["dataku"] = $this->bm->get_ids($id);
        // var_dump(json_encode($data['dataku'][3]->proposal_keg));
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    // Edit kiriman ke DB
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
            return $this->edit($id);
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
            return $this->edit($id);
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
                "ktp" => $this->do_upload_1(),
                "proposal_keg" => $this->do_upload_2(),
                "surat_permohonan_keg" => $this->do_upload_3()
            );

            $this->bm->save_tbl_lampiran($data, $id);
            echo "<script>alert('Data berhasil diperbaharui');window.location = history.go(-1);</script>";
        } else {
            return $this->edit($id);
        }
    }

    // Bagus halaman page
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
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    // Bagus untuk kirim ke model -> database
    public function simpan_formb()
    {
        // Data Penceramah
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('jen_kel', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required|is_numeric');
        $this->form_validation->set_rules('no_pass', 'nomor passport', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required|is_numeric');
        $this->form_validation->set_rules('alamat', 'alamat lengkap', 'trim|required');

        // Data Kegiatan
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('neg_keg', 'negara pilihan', 'trim|required');
        $this->form_validation->set_rules('lok_keg', 'lokasi kegiatan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi jumlah jamaah', 'trim|required|is_numeric');
        $this->form_validation->set_rules('lemb_keg', 'lembaga penyelenggara', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            # code...
        } else {
            return $this->ekspor();
        }
    }

    // Bagus halaman page
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
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    // Bagus untuk kirim ke model -> database
    public function simpan_formc()
    {
        // Data Penceramah
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('jen_kel', 'jenis kelamin', 'trim|required');
        $this->form_validation->set_rules('no_pass', 'nomor passport', 'trim|required');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');
        $this->form_validation->set_rules('neg_keg', 'negara asal', 'trim|required');

        // Data Kegiatan
        $this->form_validation->set_rules('nm_keg', 'nama kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_awal_keg', 'tanggal awal kegiatan', 'trim|required');
        $this->form_validation->set_rules('tgl_akhir_keg', 'tanggal akhir kegiatan', 'trim|required');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'trim|required');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'trim|required');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'trim|required');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'trim|required');
        $this->form_validation->set_rules('esti_keg', 'estimasi kegiatan', 'trim|required');
        $this->form_validation->set_rules('lemb_keg', 'nama lembaga', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            # code...
        } else {
            return $this->import();
        }
    }

    // Bagus halaman page
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

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function simpan_formd()
    {
        // Data Penceramah
        $this->form_validation->set_rules('narsum[]', 'penceramah', 'trim|required');
        $this->form_validation->set_rules('jen_kel', 'jenis kelamin', 'trim|required|is_numeric');
        $this->form_validation->set_rules('tmp_lhr', 'tempat lahir', 'trim|required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'trim|required');
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

        if ($this->form_validation->run() == TRUE) {
            # code...
        } else {
            return $this->safari();
        }
    }

    // Uploadan ijin kegiatan keagamaan
    private function do_upload_1()
    {   $user['tampil'] = $this->bm->get_identitas();
        $type = explode('.', $_FILES["ktp"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["ktp"]["name"];
        $url = "./assets/uploads/binsyar/".date('d-m-Y')."_".$user['tampil']->fullname."_".$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["ktp"]["tmp_name"]))
                if(move_uploaded_file($_FILES["ktp"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    private function do_upload_2()
    {   
        $user['tampil'] = $this->bm->get_identitas();
        $type = explode('.', $_FILES["proposal_keg"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["proposal_keg"]["name"];
        $url = "./assets/uploads/binsyar/".date('dy')."_".$user['tampil']->fullname."_"."_".$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["proposal_keg"]["tmp_name"]))
                if(move_uploaded_file($_FILES["proposal_keg"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    private function do_upload_3()
    {   
        $user['tampil'] = $this->bm->get_identitas();
        $type = explode('.', $_FILES["surat_permohonan_keg"]["name"]);
        $type = $type[count($type)-1];

        $file_name = $_FILES["surat_permohonan_keg"]["name"];
        $url = "./assets/uploads/binsyar/".date('dy')."_".$user['tampil']->fullname."_"."_".$file_name;

        if(in_array($type, array("jpg", "jpeg", "gif", "png", "bmp", "doc", "docx", "xls", "xlsx", "pdf" )))
            if(is_uploaded_file($_FILES["surat_permohonan_keg"]["tmp_name"]))
                if(move_uploaded_file($_FILES["surat_permohonan_keg"]["tmp_name"], $url))
                    return $url;
        return "";
    }

    // Data Wilayah
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
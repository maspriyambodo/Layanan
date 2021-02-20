<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Address extends MX_Controller {
    function __construct() {
      parent::__construct();;
    }

    public function provinsi() {
        $this->template->setPageId("SETTING_PROV");
        $data = array();

	    $sitetitle = "Setting Provinsi";
        $pagetitle = "Setting Provinsi";
        $view = "provinsi";
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

        $get_prov = $this->db->get("mt_wil_provinsi");
        $data["provinsi"] = $get_prov->result();

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function form_provinsi($id = "") {
        $this->template->setPageId("SETTING_PROV");
        $data = array();

	    $sitetitle = "Form Provinsi";
        $pagetitle = "Form Provinsi";
        $view = "form_provinsi";
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

        $data["formMode"] = "new";
		if ($id != "") {
            $data["formMode"] = "edit";
            $this->db->where("id_provinsi",$id);
			$getData = $this->db->get("mt_wil_provinsi");
            $dataProvinsi = $getData->row();
            $data["dataProvinsi"] = json_encode($dataProvinsi);
        }

        $get_rekomendasi = $this->db->query("select max(id_provinsi) as kode from mt_wil_provinsi")->row();
        $kode = $get_rekomendasi->kode;
        $rekomendasi_kode = (int)$kode + 1;
        if($rekomendasi_kode < 10) {
            $rekomendasi_kode = "0". (string)$rekomendasi_kode;
        }
        $data["rekomendasi_kode"] = $rekomendasi_kode;
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function save_provinsi(){
        $mode = $this->input->post("formMode");
		$formData = $this->input->post("formData");
        $dataProvinsi = json_decode($formData,true);
        $id_provinsi = $dataProvinsi["id_provinsi"];

        if ($mode == "new") {
			// --- error will be 1 if success
			$error = $this->db->insert('mt_wil_provinsi', $dataProvinsi);
			if ($error != 1) {
				echo toJSON(resultError("","Error save to table provinsi!"));
				return;
			}

			// echo $this->db->last_query();
			// $masjid_id = $this->db->insert_id();
		} else {
			$this->db->where("id_provinsi",$id_provinsi);
			$error = $this->db->update('mt_wil_provinsi', $dataProvinsi);
			if ($error != 1) {
				echo toJSON(resultError("","Error save to address provinsi!"));
				return;
			}
        }
        
        echo toJSON(resultSuccess($id_provinsi,1));
    }

    public function delete_provinsi(){
        $id = $this->input->post("id");
        $this->db->where('id_provinsi',$id) ;
		$this->db->delete('mt_wil_provinsi');

		echo toJSON(resultSuccess("OK",1));
    }

    public function kabupaten() {
        $this->template->setPageId("SETTING_KAB");
        $data = array();

	    $sitetitle = "Setting Kabupaten";
        $pagetitle = "Setting Kabupaten";
        $view = "kabupaten";
        $breadcrumbs = array(
                array(
                    "title" => "Setting Wilayah",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Kabupaten",
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

    public function form_kabupaten($id = "") {
        $this->template->setPageId("SETTING_KAB");
        $data = array();

	    $sitetitle = "Form Kabupaten";
        $pagetitle = "Form Kabupaten";
        $view = "form_kabupaten";
        $breadcrumbs = array(
                array(
                    "title" => "Setting Wilayah",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Kabupaten",
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

        $data["formMode"] = "new";
		if ($id != "") {
            $data["formMode"] = "edit";
            $this->db->where("id_kabupaten",$id);
			$getData = $this->db->get("mt_wil_kabupaten");
            $dataKabupaten = $getData->row();
            $data["dataKabupaten"] = json_encode($dataKabupaten);
        }
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function save_kabupaten(){
        $mode = $this->input->post("formMode");
		$formData = $this->input->post("formData");
        $dataKabupaten = json_decode($formData,true);
        $id_kabupaten = $dataKabupaten["id_kabupaten"];

        if ($mode == "new") {
			// --- error will be 1 if success
			$error = $this->db->insert('mt_wil_kabupaten', $dataKabupaten);
			if ($error != 1) {

			    // echo $this->db->last_query();
				echo toJSON(resultError("","Error save to table kabupaten!"));
				return;
			}

			// echo $this->db->last_query();
			// $masjid_id = $this->db->insert_id();
		} else {
			$this->db->where("id_kabupaten",$id_kabupaten);
			$error = $this->db->update('mt_wil_kabupaten', $dataKabupaten);
			if ($error != 1) {
				echo toJSON(resultError("","Error save to address kabupaten!"));
				return;
			}
        }
        
        echo toJSON(resultSuccess($id_kabupaten,1));
    }

    public function delete_kabupaten(){
        $id = $this->input->post("id");
        $this->db->where('id_kabupaten',$id) ;
		$this->db->delete('mt_wil_kabupaten');

		echo toJSON(resultSuccess("OK",1));
    }

    public function kecamatan() {
        $this->template->setPageId("SETTING_KEC");
        $data = array();

	    $sitetitle = "Setting Kecamatan";
        $pagetitle = "Setting Kecamatan";
        $view = "kecamatan";
        $breadcrumbs = array(
                array(
                    "title" => "Setting Wilayah",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Kecamatan",
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

    public function form_kecamatan($id = "") {
        $this->template->setPageId("SETTING_KEC");
        $data = array();

	    $sitetitle = "Form Kecamatan";
        $pagetitle = "Form Kecamatan";
        $view = "form_kecamatan";
        $breadcrumbs = array(
                array(
                    "title" => "Setting Wilayah",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Kabupaten",
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

        $data["formMode"] = "new";
		if ($id != "") {
            $data["formMode"] = "edit";
            $this->db->select("kec.*, prov.id_provinsi");
            $this->db->from("mt_wil_kecamatan kec");
            $this->db->join("mt_wil_kabupaten kab","kec.id_kabupaten = kab.id_kabupaten");
            $this->db->join("mt_wil_provinsi prov","kab.id_provinsi = prov.id_provinsi");
            $this->db->where("kec.id_kecamatan",$id);
			$getData = $this->db->get();
            $dataKec = $getData->row();
            $data["dataKecamatan"] = json_encode($dataKec);
        }
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function save_kecamatan(){
        $mode = $this->input->post("formMode");
		$formData = $this->input->post("formData");
        $dataKecamatan = json_decode($formData,true);
        $id_kecamatan = $dataKecamatan["id_kecamatan"];

        unset($dataKecamatan["id_provinsi"]);

        if ($mode == "new") {
			// --- error will be 1 if success
			$error = $this->db->insert('mt_wil_kecamatan', $dataKecamatan);
			if ($error != 1) {

			    // echo $this->db->last_query();
				echo toJSON(resultError("","Error save to table kecamatan!"));
				return;
			}

			// echo $this->db->last_query();
			// $masjid_id = $this->db->insert_id();
		} else {
			$this->db->where("id_kecamatan",$id_kecamatan);
			$error = $this->db->update('mt_wil_kecamatan', $dataKecamatan);
			if ($error != 1) {
				echo toJSON(resultError("","Error save to address kecamatan!"));
				return;
			}
        }
        
        echo toJSON(resultSuccess($id_kecamatan,1));
    }

    public function delete_kecamatan(){
        $id = $this->input->post("id");
        $this->db->where('id_kecamatan',$id) ;
		$this->db->delete('mt_wil_kecamatan');

		echo toJSON(resultSuccess("OK",1));
    }

    public function populateProvincesAllAttributes(){
        $this->db->order_by("id_provinsi");
        $get = $this->db->get('mt_wil_provinsi');

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function populateKabupatenAllAttributes(){
        $this->db->select("kab.*, prov.nama as provinsi_name");
        $this->db->from("mt_wil_kabupaten kab");
        $this->db->join("mt_wil_provinsi prov","kab.id_provinsi = prov.id_provinsi");
        $this->db->order_by("prov.id_provinsi, kab.id_kabupaten, kab.nama");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function populateKecamatanAllAttributes(){
        $this->db->select("kec.*, kab.nama as kabupaten_name, prov.nama as provinsi_name");
        $this->db->from("mt_wil_kecamatan kec");
        $this->db->join("mt_wil_kabupaten kab","kec.id_kabupaten = kab.id_kabupaten");
        $this->db->join("mt_wil_provinsi prov","kab.id_provinsi = prov.id_provinsi");
        $this->db->order_by("prov.id_provinsi, kab.id_kabupaten, kec.id_kecamatan, kec.nama");
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function populateProvinces(){
        $this->db->order_by("id_provinsi");
        $get = $this->db->get('mt_wil_provinsi');

        $data = [];
        foreach($get->result() as $d) {
            array_push($data, (object)[
                    'id' => $d->id_provinsi,
                    'text' => $d->nama,
            ]);
        }
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function populateCities($idprov = ""){
        if($idprov != ""){
            $this->db->where("kab.id_provinsi",$idprov);
        }
        $this->db->join("mt_wil_provinsi prov","kab.id_provinsi = prov.id_provinsi");
        $this->db->order_by("kab.id_kabupaten");
        $this->db->select("kab.*, prov.nama as provinsi_name", FALSE);
        $get = $this->db->get('mt_wil_kabupaten kab');
        $data = [];
        foreach($get->result() as $d) {
            array_push($data, (object)[
                    'id' => $d->id_kabupaten,
                    'text' => $d->nama,
                    'lat' => $d->latitude,
                    'long' => $d->longitude,
                    'prov' => $d->provinsi_name,
            ]);
        }
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function populateDistricts($idcity = ""){
        if($idcity != ""){
            $this->db->where("kec.id_kabupaten",$idcity);
        }
        $this->db->join("mt_wil_kabupaten kab","kec.id_kabupaten = kab.id_kabupaten");
        $this->db->join("mt_wil_provinsi prov","kab.id_provinsi = prov.id_provinsi");
        $this->db->order_by("kec.id_kecamatan");
        $this->db->select("kec.*, kab.nama as kabupaten_name, prov.nama as provinsi_name", FALSE);
        $get = $this->db->get('mt_wil_kecamatan kec');
        $data = [];
        foreach($get->result() as $d) {
            array_push($data, (object)[
                    'id' => $d->id_kecamatan,
                    'text' => $d->kecamatan_name,
                    'address' => trim(strtoupper("KECAMATAN " . $d->kecamatan_name . ", " . $d->kabupaten_name . ", " . $d->provinsi_name)),
            ]);
        }
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    public function populateAllProvinceData() {
        $this->db->order_by("id_provinsi");
        $get = $this->db->get('mt_wil_provinsi');

        $data = [];
        foreach($get->result() as $d) {
            array_push($data, (object)[
                    'id' => $d->id_provinsi,
                    'text' => $d->provinsi_name,
                    'lat' => $d->latitude,
                    'long' => $d->longitude,
            ]);
        }
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    // public function getRekomendasiKodeKabupaten($idprov) {
    //     $query = $this->db->query("select max(id_kabupaten) as kode from mt_wil_kabupaten where id_provinsi = '".$idprov."'")->row();
    //     $maxkode = $query->kode;
    //     $split = explode(".",$maxkode);
    //     $nextkode = 0;
    //     if(count($split) >= 1){
    //         $reckode = (int)$split[1] + 1;
    //         if($reckode < 10) {
    //             $reckode = "0". (string)$reckode;
    //         }
    //         $nextkode = $split[0].".".$reckode;
    //     }

    //     $result = array(
    //         "data" => $nextkode,
    //         "success" => true,
    //       );
    //       toJson($result);
    // }

    public function getRekomendasiKodeKecamatan($idkab) {
        $query = $this->db->query("select max(id_kecamatan) as kode from mt_wil_kecamatan where id_kabupaten = '".$idkab."'")->row();
        $maxkode = $query->kode;
        $split = explode(".",$maxkode);
        $nextkode = 0;
        if(count($split) >= 2){
            $reckode = (int)$split[2] + 1;
            if($reckode < 10) {
                $reckode = "0". (string)$reckode;
            }
            $nextkode = $split[0].".".$split[1].".".$reckode;
        }

        $result = array(
            "data" => $nextkode,
            "success" => true,
          );
          toJson($result);
    }

}
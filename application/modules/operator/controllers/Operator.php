<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	function __construct()
    {
      parent::__construct();
      $this->load->model('Operator_m','om');
      $this->load->library(array('upload', 'form_validation'));
      $this->load->helper(array('form', 'url'));
      $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

	public function index()
	{
		$this->template->setPageId("BINSYAR_BAGUS_FORM");
        $data = array();

        $sitetitle = "Data Formulir Binsyar & Urais";
        $pagetitle = "Data Formulir Binsyar & Urais";
        $view = "/operator/v_operator";
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
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
	}

	public function datauser() {
        $this->template->setPageId("DATA_USER");
        $data = array();

        $sitetitle = "Data Pendaftaran User";
        $pagetitle = "Data Pendaftaran User";
        $view = "/operator/users/v_datausers";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Users",
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

	//------------------------------------------ Kumpulan Data Join
	public function ambil_formulir()
	{
		// $this->setGroup();
		$data = $this->om->get_formulir()->result();
		$result = array(
            "data" => $data,
            "success" => true,
        );
        toJson($result);
	}

	public function dt_join_users()
    {
        $kondisi = array(
            "b.role_id !=" => 1
        );
        // $this->setGroup;
        $this->db->select("b.id, b.role_id, b.fullname, b.username, b.password, b.nik, b.tgl_lhr, a.name, a.description");
        $this->db->from("sys_users b");
        $this->db->join("sys_roles a", "b.role_id = a.id");
        $this->db->where($kondisi);
        $get = $this->db->get();

        $data = $get->result();
        $result = array(
            "data" => $data,
            "success" => true,
          );
          toJson($result);
    }

    //------------------------------------------ Kumpulan Tambah, Edit dan Simpan Data Users
    public function tambah() {
        $this->template->setPageId("TAMBAH_USER");
        $data = array();

        $sitetitle = "Form Pendaftaran User";
        $pagetitle = "Form Pendaftaran User";
        $view = "/operator/users/v_tambahusers";
        $breadcrumbs = array(
                array(
                    "title" => "",
                    "link" => "",
                    "is_actived" => false,
                ),
                array(
                    "title" => "Users",
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
        $data['role_user'] = $this->om->get_role_user();
        $data['last_id_user'] = $this->om->get_lastid_user();
        $data['provinsi'] = $this->om->get_provinsi();
        $data['biodata'] = $this->om->get_biodata_login();
        // var_dump($data['biodata']->fullname);
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    function simpan_formuser()
    {
        // Data User
        $this->form_validation->set_rules('role_id', 'user group', 'required|is_numeric');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('nik', 'nik ktp', 'required|is_numeric');
        $this->form_validation->set_rules('fullname', 'nama lengkap', 'required');
        $this->form_validation->set_rules('tgl_lhr', 'tanggal lahir', 'required');
        $this->form_validation->set_rules('telp', 'telepon', 'required|is_numeric');
        $this->form_validation->set_rules('id_provinsi', 'provinsi', 'required|is_numeric');
        $this->form_validation->set_rules('id_kabupaten', 'kabupaten', 'required|is_numeric');
        $this->form_validation->set_rules('id_kecamatan', 'kecamatan', 'required|is_numeric');
        $this->form_validation->set_rules('id_kelurahan', 'kelurahan', 'required|is_numeric');
        $this->form_validation->set_rules('alamat', 'alamat lengkap', 'required|min_length[5]');
        $this->form_validation->set_rules('nama_kepala', 'nama atasan', 'required');
        $this->form_validation->set_rules('nip_kepala', 'nip atasan', 'required|is_numeric');
        $this->form_validation->set_rules('occupation', 'jabatan', 'required');

        // Data Photo
        if(empty($_FILES['img_photo']['name'])){
            $this->form_validation->set_rules('img_photo', 'upload photo', 'required');}

        if($this->form_validation->run() == FALSE)
        {
            return $this->tambah();
        }else{
            $role_id = $this->input->post("role_id");
            $cek_roles['role_id'] = $this->om->cek_roles_group($role_id);
            if($cek_roles['role_id'] != 0){
                echo "<script>alert('Maaf, user sudah terdaftar');window.location = '".site_url('operator/tambah/')."';</script>";
            }else{
                $data = array(
                "role_id" => $this->input->post("role_id", TRUE),
                "username" => $this->input->post("username", TRUE),
                "email" => $this->input->post("email", TRUE),
                "password" => $this->dx_auth->cryptpassword($this->input->post("password")),
                "re_password" => $this->input->post("password", TRUE),
                "nik" => $this->input->post("nik", TRUE),
                "fullname" => $this->input->post("fullname", TRUE),
                "tgl_lhr" => $this->input->post("tgl_lhr", TRUE),
                "telp" => $this->input->post("telp", TRUE),
                "id_provinsi" => $this->input->post("id_provinsi", TRUE),
                "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
                "id_kecamatan" => $this->input->post("id_kecamatan", TRUE),
                "id_kelurahan" => $this->input->post("id_kelurahan"),
                "alamat" => $this->input->post("alamat", TRUE),
                "nama_kepala" => $this->input->post("nama_kepala", TRUE),
                "nip_kepala" => $this->input->post("nip_kepala", TRUE),
                "occupation" => $this->input->post("occupation", TRUE),
                "created" => $this->input->post("created", TRUE),
                "created_by" => $this->input->post("created_by", TRUE),
                "img_photo" => $this->_do_upload_user()
                );
                // var_dump($data);
                // die();
                $this->om->kirim_user_kedb($data);
                echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('operator/datauser/')."';</script>";
            }   
        }
    }

    public function editusers($id)
    {
        // $this->template->setPageId("DATA_USER");
        $this->template->setPageId("DITERIMA_SDDN");
        $data = array();

        $sitetitle = "Edit Data User";
        // $pagetitle = "Edit Data User";
        // $view = "/operator/users/v_edituser";
        $pagetitle = "Edit Izin Safari Dakwah Dalam Negeri";
        $view = "layanan4/v_edit";
        $breadcrumbs = [
                [
                    "title" => "Permohonan Masuk",
                    "link" => base_url('Urais/Layanan_4/index/'),
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
        // $data['biodata'] = $this->om->get_biodata_login();
        // $data['role_user'] = $this->om->get_role_user();
        // $data['provinsi'] = $this->om->get_provinsi();
        // $data["kabupaten"] = $this->om->get_kabupaten();
        // $data["kecamatan"] = $this->om->get_kecamatan();
        // $data["kelurahan"] = $this->om->get_kelurahan();
        // $data["users"] = $this->om->get_edit_user($id);
        $data['detil'] = $this->M_layanan4->Detail($id);
        // var_dump(json_encode($data['dataku'][3]->proposal_keg));
        // die();
        $data["js_inlines"] = $js_inlines;

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
            
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }

    public function simpan_edituser()
    {
        $id = $this->input->post('id');
        $nik = $this->input->post("nik", TRUE);
        $a['password'] = $this->input->post('password');

        if(empty($a['password'])){
        	$data = array(
        		"role_id" => $this->input->post("role_id", TRUE),
            	"username" => $this->input->post("username", TRUE),
        		"re_password" => $this->input->post('re_password', TRUE),
        		"password" => $this->dx_auth->cryptpassword($this->input->post('re_password')),
        		"email" => $this->input->post("email", TRUE),
	            "nik" => $this->input->post("nik", TRUE),
	            "fullname" => $this->input->post("fullname", TRUE),
	            "tgl_lhr" => $this->input->post("tgl_lhr", TRUE),
	            "telp" => $this->input->post("telp", TRUE),
	            "id_provinsi" => $this->input->post("id_provinsi", TRUE),
	            "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
	            "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
	            "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
	            "alamat" => $this->input->post("alamat", TRUE),
	            "nama_kepala" => $this->input->post("nama_kepala", TRUE),
	            "nip_kepala" => $this->input->post("nip_kepala", TRUE),
	            "occupation" => $this->input->post("occupation", TRUE),
	            "modified" => $this->input->post("modified", TRUE),
	            "modified_by" => $this->input->post("modified_by", TRUE)
        	);
        }else{
        	$data = array(
        		"role_id" => $this->input->post("role_id", TRUE),
	            "username" => $this->input->post("username", TRUE),
        		"password" => $this->dx_auth->cryptpassword($this->input->post('password')),
        		"re_password" => $this->input->post('password', TRUE),
        		"email" => $this->input->post("email", TRUE),
	            "nik" => $this->input->post("nik", TRUE),
	            "fullname" => $this->input->post("fullname", TRUE),
	            "tgl_lhr" => $this->input->post("tgl_lhr", TRUE),
	            "telp" => $this->input->post("telp", TRUE),
	            "id_provinsi" => $this->input->post("id_provinsi", TRUE),
	            "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
	            "id_kabupaten" => $this->input->post("id_kabupaten", TRUE),
	            "id_kelurahan" => $this->input->post("id_kelurahan", TRUE),
	            "alamat" => $this->input->post("alamat", TRUE),
	            "nama_kepala" => $this->input->post("nama_kepala", TRUE),
	            "nip_kepala" => $this->input->post("nip_kepala", TRUE),
	            "occupation" => $this->input->post("occupation", TRUE),
	            "modified" => $this->input->post("modified", TRUE),
	            "modified_by" => $this->input->post("modified_by", TRUE)
        	);
        }

        // var_dump($data);
        // die();

        if (!empty($_FILES['img_photo']['name'])) {
            $photoimage = $this->_do_upload_user();

            $upload = $this->om->cek_gambar($nik);
            if (file_exists('assets/uploads/users/'.$upload->img_photo) && $upload->img_photo) {
                unlink('assets/uploads/users/'.$upload->img_photo);
            }
            $data['img_photo'] = $photoimage;
        }

        $this->om->kirim_edituser($data, $id);
        echo "<script>alert('Data berhasil disimpan');window.location = '".site_url('operator/datauser/')."';</script>";
    }

    public function hapus_dt_user()
    {
        $id = $this->input->post("id");
        $kondisi = array(
            'role_id' => 0,
            'modified_by' => $this->session->userdata('DX_user_id'),
            'modified' => date('Y-m-d h:i:s')
        );

        $this->db->set($kondisi);
        $this->db->where('id', $id);
        $this->db->update('sys_users');

        echo toJSON(resultSuccess("OK",1));
    }

	//------------------------------------------ Kumpulan Form Binsyar
	public function formulir($id)
	{
		$this->template->setPageId("BINSYAR_BAGUS_FORM");
		// ijin kegiatan keagamaan [0]
		// ijin penceramah keluar negeri [1]
		// ijin penceramah dari luar negeri [2]
		// ijin bantuan arah kiblat [3]
		// ijin bantuan masjid / mushalla [4]
		// ijin safari dakwah dalam negeri [5]
		// var_dump($cek_id[6]->nama_layanan);
		// die();
		$cek_id = $this->om->get_formulir()->result();
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
	        $data["js_inlines"] = $js_inlines;

	        $this->template->setSiteTitle($sitetitle);
	        $this->template->setPageTitle($pagetitle);
	        $this->template->setBreadcrumbs($breadcrumbs);
	            
	        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);

		}else if($cek_id[3]->id == $id){
			echo "<script>alert('Maaf, ".$cek_id[3]->nama_layanan." Belum Tersedia.');window.location = '".site_url('operator/index/')."';</script>";

		}else if($cek_id[4]->id == $id){
			echo "<script>alert('Maaf, ".$cek_id[4]->nama_layanan." Belum Tersedia.');window.location = '".site_url('operator/index/')."';</script>";

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
	        $data["js_inlines"] = $js_inlines;

	        $this->template->setSiteTitle($sitetitle);
	        $this->template->setPageTitle($pagetitle);
	        $this->template->setBreadcrumbs($breadcrumbs);
	            
	        $this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
		}
	}

	//------------------------------ Kumpulan File Konfig Uplodan
    private function _do_upload_user()
    {
        $image_name = date('d-m-Y').'_'.$_FILES["img_photo"]['name'];

        $config['upload_path']      = 'assets/uploads/users/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 1024;
        $config['max_widht']        = 1000;
        $config['max_height']       = 1000;
        $config['file_name']        = $image_name;

        $this->upload->initialize($config);
        if (!$this->upload->do_upload('img_photo')) {
            $this->session->set_flashdata('msg', $this->upload->display_errors('', ''));
            return $this->tambah();
        }
        return $this->upload->data('file_name');
    }

    //------------------------------ Kumpulan Data Ambil Provinsi
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

    // public function add_ajax_des($id_kec)
    // {
    //     $query = $this->db->get_where('mt_wil_kelurahan',array('id_kecamatan'=>$id_kec));
    //     $data = "<option value=''> - Pilih Kelurahan - </option>";
    //     foreach ($query->result() as $value) {
    //         $data .= "<option value='".$value->id_kelurahan."'>".$value->nama."</option>";
    //     }
    //     echo $data;
    // }

}

/* End of file Operator.php */
/* Location: ./application/modules/operator/controllers/Operator.php */
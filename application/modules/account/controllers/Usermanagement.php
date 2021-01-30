<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanagement extends MX_Controller {
    protected $_model;
	function __construct() {
		parent::__construct();

		$this->load->model("UserModel");
		$this->_model = $this->UserModel;

		$this->template->setPageId("USER_MANAGEMENT");
    }
    
    function index() {
        $data = array();
		
		$sitetitle = "System User Management";
		$pagetitle = "User Management";
		$view = "usermanagement/index";
		$breadcrumbs = array(
			array(
				"title" => "System",
				"link" => "#",
				"is_actived" => false,
			),
			array(
				"title" => "User Management",
				"link" => "#",
				"is_actived" => true,
			),
		);

		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

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
		
		$this->template->load($view, $data, $this->template->getDefaultLayout(), $metune);
    }
    
    function getdata() {
        $query = $this->_model->getData();
		$cols = $query->list_fields();
		$data = array();
		if($query->num_rows() > 0) {
			$nomor = 0;
			foreach($query->result() as $r) {
				$item = array();
				$nomor++;
				$item["nomor"] = $nomor;
				if(count($cols)>0) {
					foreach($cols as $c) {
						$item[$c] = $r->$c;
					}
				}
				array_push($data, $item);
			}
		}

		$result = array(
            "data" => $data,
            "success" => true,
            "totalCount" => $query->num_rows(),
        );
        toJson($result);
	}

	function delete() {
        $id = $this->input->post("id");
		$isDelete = $this->_model->delete($id);
		$msg = "";
		if(!$isDelete) {
			$msg = "Error occured while deleting data.";
		}

		$results = array(
			"id" => $id,
			"success" => $isDelete,
			"message" => $msg,
		);
		toJson($results);
    }
	
	function form($id = "") {
		$data = array();
		
		$sitetitle = "User Management Form";
		$pagetitle = "User Management Form";
		$view = "usermanagement/form";
		$breadcrumbs = array(
			array(
				"title" => "System",
				"link" => "#",
				"is_actived" => false,
			),
			array(
				"title" => "User Management",
				"link" => base_url() . "account/usermanagement",
				"is_actived" => false,
			),
			array(
				"title" => "User Management Form",
				"link" => "javascript:void(0);",
				"is_actived" => true,
			),
		);

		$data["id"] = $id;
		$data["mode"] = (empty($id)?"add":"edit");

		$userdata = array();
		if(!empty($id)) {
			$this->db->select("*", FALSE);
			$this->db->where("id", $id);
			$query = $this->db->get("sys_users");
			$cols = $query->list_fields();
			$dataUser = array();
			if($query->num_rows() > 0) {
				foreach($query->result() as $r) {
					$item = array();
					if(count($cols)>0) {
						foreach($cols as $c) {
							$item[$c] = $r->$c;
						}
					}
					array_push($dataUser, $item);
				}
			}
			
			$this->db->select("*", FALSE);
			$this->db->where("id_user", $id);
			$this->db->order_by("approver_level", "ASC");
			$query = $this->db->get("sys_user_approval");
			$colsa = $query->list_fields();
			$dataApprovers = array();
			if($query->num_rows() > 0) {
				foreach($query->result() as $r) {
					$item = array();
					if(count($colsa)>0) {
						foreach($colsa as $c) {
							$item[$c] = $r->$c;
						}
					}
					array_push($dataApprovers, $item);
				}
			}
			if(count($dataUser) > 0) {
				$userdata = $dataUser[0];
				$userdata["approvers"] = $dataApprovers;
			}
		}
		if(count($userdata) <= 0) {
			$this->db->select("*", FALSE);
			$this->db->where("id", $id);
			$query = $this->db->get("sys_users");
			$cols = $query->list_fields();
			if(count($cols)>0) {
				foreach($cols as $c) {
					$userdata[$c] = "";
				}
			}
			$userdata["approvers"] = array();
		}
		$checkfile = $this->config->item("path_to_upload") . DIRECTORY_SEPARATOR . "users" . DIRECTORY_SEPARATOR . $userdata["username"] . DIRECTORY_SEPARATOR . $userdata["img_photo"];
		$userdata["checkfile"] = $checkfile;
		$data["formdata"] = $userdata;

		$this->db->select("*", FALSE);
		$this->db->order_by("nama", "ASC");
		$query = $this->db->get("m_wilayah");
		$dataBu = $query->result();
		$data["partners"] = $dataBu;

		$this->db->select("*", FALSE);
		$this->db->order_by("name", "ASC");
		$query = $this->db->get("sys_roles");
		$dataUg = $query->result();
		$data["user_group"] = $dataUg;

		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
		$this->template->setBreadcrumbs($breadcrumbs);

		$this->template->load($view, $data, $this->template->getDefaultLayout());
	}

	function save() {
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST');
		header("Access-Control-Allow-Headers: X-Requested-With");

		$id = $this->input->post("id");
		$mode = $this->input->post("mode");

		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$user_group = $this->input->post("user_group");
		$fullname = $this->input->post("fullname");
		$email = $this->input->post("email");
		$is_actived = $this->input->post("is_actived");
		$company_id = $this->input->post("company_id");
		$business_unit = $this->input->post("business_unit");
		$no_staff = $this->input->post("no_staff");
		$occupation = $this->input->post("occupation");
		$isresetimg = $this->input->post("isresetimg");
		$approvers = json_decode($this->input->post("approvers"));

		$pathToSave = $this->config->item("path_to_upload");
		$pathToSave = join(DIRECTORY_SEPARATOR, array($pathToSave, "users", $username));
		if (!file_exists($pathToSave) && !is_dir($pathToSave)) {
			@mkdir($pathToSave, 0777, true);
		} else {
			@chmod($pathToSave, 0777);
		}

		// upload photo user
		$config['upload_path'] = $pathToSave;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = 10240;
		$config["file_name"] = $username;

		$this->load->library('upload', $config);
		
		$isUpload = true;
		$success = true;
		$msg = "";
		$img_photo = "";
		if (!$this->upload->do_upload('img_photo')) {
			$isUpload = false;
			$msg = $this->upload->display_errors();
			$success = false;
		} else {
			$uploads = $this->upload->data();
		}

		if(!$isUpload && empty($uploads["client_name"])) {
			$isUpload = true;
			$success = true;
			$msg = "";
		} else {
			$img_photo = $uploads["file_name"];
		}

		// upload ttd
		$config_ttd['upload_path'] = $pathToSave;
		$config_ttd['allowed_types'] = 'gif|jpg|png';
		$config_ttd['max_size']     = 10240;
		$config_ttd["file_name"] = $username . "_ttd";

		$this->load->library('upload', $config_ttd);

		$isUploadttd = true;
		$success = true;
		$msg = "";

		if($isUpload) {
			$data = array(
				"id" => $id,
				"role_id" => $user_group,
				"username" => $username,
				"fullname" => $fullname,
				"password" => $this->dx_auth->cryptpassword($password),
				"email" => $email,
				"banned" => ($is_actived=="1"?0:1),
				"last_ip" => "",
				"last_login" => "1900-01-01 00:00:00",
				"id_company" => $company_id,
				"no_staff" => $no_staff,
				"occupation" => $occupation,
				"img_photo" => $img_photo,
			);

			if($mode=="edit" && $password=="") {
				unset($data["password"]);
			}

			if($mode=="edit" && $isresetimg=="0" && empty($uploads["client_name"])) {
				unset($data["img_photo"]);
			}

			$id = $this->_model->save($data, $mode);

			// saving approvers data
			$this->_model->saveApprover($id, $username, $approvers);
		}

		$results = array(
			"id" => $id,
			"success" => $success,
			"message" => $msg,
		);
		toJson($results);
	}
}
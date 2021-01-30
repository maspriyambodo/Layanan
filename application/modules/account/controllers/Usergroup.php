<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usergroup extends MX_Controller {
    protected $_model;
	function __construct() {
		parent::__construct();

		$this->load->model("UsergroupModel");
		$this->_model = $this->UsergroupModel;

		$this->template->setPageId("USER_GROUP");
    }
    
    function index() {
        $data = array();
		
		$sitetitle = "System User Group";
		$pagetitle = "User Group";
		$view = "usergroup/index";
		$breadcrumbs = array(
			array(
				"title" => "System",
				"link" => "#",
				"is_actived" => false,
			),
			array(
				"title" => "User Group",
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
        
        $queryMenu = $this->_model->getDataMenu();
        $cols = $queryMenu->list_fields();
		$dataMenu = array();
		if($queryMenu->num_rows() > 0) {
			foreach($queryMenu->result() as $r) {
				$item = array();
				if(count($cols)>0) {
					foreach($cols as $c) {
						$item[$c] = $r->$c;
					}
				}
				array_push($dataMenu, $item);
			}
		}
        $data["menus"] = $dataMenu;
		
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

    function getdatagroup() {
        $id = $this->input->post("id");
        $query = $this->_model->getDataById($id);
		$cols = $query->list_fields();
		$data = array();
		if($query->num_rows() > 0) {
			foreach($query->result() as $r) {
				$item = array();
				if(count($cols)>0) {
					foreach($cols as $c) {
						$item[$c] = $r->$c;
					}
				}
				array_push($data, $item);
			}
		}
        toJson($data[0]);
    }

    function getgroupaccess() {
        $id = $this->input->post("id");
        $query = $this->_model->getPermissions($id);
		$cols = $query->list_fields();
		$data = array();
		if($query->num_rows() > 0) {
			foreach($query->result() as $r) {
				$item = array();
				if(count($cols)>0) {
					foreach($cols as $c) {
						$item[$c] = $r->$c;
					}
				}
				array_push($data, $item);
			}
		}

        toJson($data);
    }

    function save() {
		$id = $this->input->post("id");
		$mode = $this->input->post("mode");

		$name = $this->input->post("name");
        $description = $this->input->post("description");
        
		$data = array(
			"id" => $id,
			"name" => $name,
			"description" => $description,
		);

		$msg = "";
		$id = $this->_model->save($data, $mode);

		$results = array(
			"id" => $id,
			"success" => true,
			"message" => $msg,
		);
		toJson($results);
	}

    function saveaccess() {
		$id = $this->input->post("id");
		$accesses = $this->input->post("accesses");

		$msg = "";
        
        if(count($accesses) > 0) {
            $this->_model->deleteallaccess($id);
            foreach($accesses as $acc) {
                $id_menu = $acc["id_menu"];
                $view = $acc["view"];
                $add = $acc["add"];
                $edit = $acc["edit"];
                $delete = $acc["delete"];
                $approve = $acc["approve"];
                $publish = $acc["publish"];
                $data = array(
                    "role_id" => $id,
                    "id_menu" => $id_menu,
                    "is_view" => $view,
                    "is_add" => $add,
                    "is_edit" => $edit,
                    "is_delete" => $delete,
                    "is_approve" => $approve,
                    "is_publish" => $publish,
                );
                $this->_model->saveaccess($data, "add");
            }
        }

		$results = array(
			"id" => $id,
			"success" => true,
			"message" => $msg,
		);
		toJson($results);
	}
}
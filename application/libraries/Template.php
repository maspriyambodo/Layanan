<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	protected $CI = null;
	protected $_module;
	protected $_template;
	protected $_accepted_exts = array("php", "html", "tpl", "htm");
	protected $_siteTitle;
	protected $_pageTitle;
	protected $_breadcrumbs;
	protected $_cssFiles;
	protected $_jsFiles;
	protected $_defaultLayout;

	public $omah = null;
	public $gembok = null;
	public $izin = null;
	public $menu = null;
	public $catetan = null;

  function __construct() {
		$this->CI = &get_instance();
		$this->_module = CI::$APP->router->fetch_module();

		$this->CI->load->config('templates');
		$this->_template = $this->CI->config->item('template');
		$this->_defaultLayout = $this->CI->config->item('layout_main');

		$this->CI->load->library("Omah");
		$this->omah = $this->CI->omah;

		$this->CI->load->library("Gembok");
		$this->gembok = $this->CI->gembok;

		$this->CI->load->library("Catetan");
		$this->catetan = $this->CI->catetan;

		$this->_breadcrumbs = array();
		$this->_cssFiles = array();
		$this->_jsFiles = array();

		$access = array(
			"view" => 0,
			"add" => 0,
			"edit" => 0,
			"delete" => 0,
			"approve" => 0,
			"publish" => 0,
			"starter" => 0,
		);
		$this->izin = (object) $access;

		$info = array(
			"id" => "",
			"kode" => "",
			"title" => "",
			"link" => "",
		);
		$this->menu = (object) $info;
	}
	
	function getDefaultLayout() {
		return $this->_defaultLayout;
	}

	function setPageId($pageId) {
		$this->omah->set_pageid($pageId);

		$permission = $this->gembok->permission($pageId);
		$info = $this->gembok->permission_menu($pageId);
		$access = array(
			"view" => $permission->is_view,
			"add" => $permission->is_add,
			"edit" => $permission->is_edit,
			"delete" => $permission->is_delete,
			"approve" => $permission->is_approve,
			"publish" => $permission->is_publish,
			"starter" => $permission->is_starter,
		);
		$access["gapunya"] = false;
		if(!$permission->is_add && !$permission->is_edit && !$permission->is_delete && !$permission->is_approve && !$permission->is_publish) {
			$access["gapunya"] = true;
		}
		$this->izin = (object) $access;
		$this->menu = (object) $info;
	}

	function getPageId() {
		return $this->omah->get_pageid();
	}

	function setSiteTitle($title) {
		$this->_siteTitle = $title;
	}
	
	function setPageTitle($title) {
		$this->_pageTitle = $title;
	}
	
	function setBreadcrumbs($breadcrumbs) {
		$this->_breadcrumbs = $breadcrumbs;
	}

	function setCssFiles($cssFiles) {
		$this->_cssFiles = $cssFiles;
	}
	
	function setJsFiles($jsFiles) {
		$this->_jsFiles = $jsFiles;
	}
	
	function addBreadcrumb($title, $link, $isactived = FALSE) {
		$this->_breadcrumbs[] = array(
			"title" => $title,
			"link" => $link,
			"is_actived" => $isactived,
		);
	}

	private function check_access_page() {
		$currentUrl = base_url(uri_string());
		if(!strpos($currentUrl, "noaccess") && !strpos($currentUrl, "signin") && !strpos($currentUrl, "editprofile") && !strpos($currentUrl, "changepassword") && !strpos($currentUrl, "notfound") && !strpos($currentUrl, "error404") && !strpos($currentUrl, "my404") && !strpos($currentUrl, "signout")) {
			$currentPageId = $this->getPageId();
			$is_granted = false;
			$accesses = $this->gembok->get_access();
			if(is_array($accesses)) {
				if(count($accesses) > 0) {
					foreach($accesses as $pageid=>$acc) {
						$data_access = $acc->access;
						$isview = intval($data_access->is_view);
						if($pageid==$currentPageId && $isview) {
							$is_granted = true;
							break;
						}
					}
				}
			}
		} else {
			$is_granted = true;
		}

		return $is_granted;
	}

  function load($viewname, $data, $templateName = "layout.php", $contentText = "", $return = FALSE) {
		$is_granted = $this->check_access_page();
		if(!$is_granted) {
			redirect("noaccess");
		}

		list($path, $_view) = Modules::find($viewname, $this->_module, 'views/');
		$viewFile = "";
		if($path!=FALSE) {
			$viewFile = $path . $_view;
			foreach($this->_accepted_exts as $ext) {
				$viewPath = $viewFile . "." . $ext;
				if(file_exists($viewPath)) {
					$viewFile = $viewPath;
					break;
				}
 			}
		}

		$contentView = $this->_parseView($viewFile, $data, $contentText);
		if(!is_array($contentView)) {
			$contentView = array();
		}
		$contentView["siteTitle"] = $this->_siteTitle;
		$contentView["pageTitle"] = $this->_pageTitle;
		$contentView["breadcrumbs"] = $this->_breadcrumbs;
		$contentView["cssFiles"] = $this->_cssFiles;
		$contentView["jsFiles"] = $this->_jsFiles;

		$datalog = array(
			"access_type" => $this->catetan->view,
			"access_mode" => $this->catetan->urlMode,
			"page_id" => $this->getPageId(),
			"page_name" => $this->_pageTitle,
			"success" => 1,
			"remark" => null,
			"data_key" => "unknown",
			"data_table" => "unknown",
			"data_prev" => $data,
			"data_update" => array(),        
		);
		$datalog["data_id"] = "unknown";
		if(count($data) > 0) {
			if(array_key_exists("id", $data)) {
				$datalog["data_id"] = $data["id"];
			}
		}
		
		$this->catetan->tambahno($datalog);

		echo $this->_loadView($contentView, $templateName, $return);
	}	
	
	function _loadView($data, $templateName = "layout.php", $return = TRUE) {
		if(count($data) > 0) {
			foreach($data as $key=>$value) {
				$$key = $value;
			}
		}
		$viewfile = APPPATH."views/templates/".$this->_template."/".$templateName;
		if(file_exists($viewfile)) {
			include($viewfile);
		}
		
		if($return) return ob_get_contents();
	}

    function _parseView($viewfile, $data = array(), $contentText) {
		$return = array(
			"js" => "",
			"content" => "",
		);
        if(count($data) > 0) {
			foreach($data as $key=>$value) {
				$$key = $value;
			}
        }

        if(file_exists($viewfile)) {
			ob_start();
			include($viewfile);	
			$contents = ob_get_clean();
			$js = "";
			if(strpos($contents, "{JS START}") > -1) {
				$js = substr($contents, strpos($contents, "{JS START}") + strlen("{JS START}"), strpos($contents, "{JS END}") - strpos($contents, "{JS START}") - strlen("{JS START}"));
			}
			$contents = str_replace("{JS START}", "", $contents);
			$contents = str_replace("{JS END}", "", $contents);
			$contents = str_replace($js, "", $contents);

			$contents = str_replace("{CONTENT BLOCK}", $contentText, $contents);

			$return["js"] = $js;
			$return["content"] = $contents;
		}

		return $return;
    }
}
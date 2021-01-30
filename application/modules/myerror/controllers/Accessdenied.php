<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accessdenied extends MX_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();
		
		$sitetitle = "Access Denied &raquo; Alfabet";
		$pagetitle = "Access Denied";
		$view = "index";
		$breadcrumbs = array();

		$this->template->setPageId("ACCESS_DENIED");
		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
		$this->template->setBreadcrumbs($breadcrumbs);
		
		$this->template->load($view, $data);
    }
}
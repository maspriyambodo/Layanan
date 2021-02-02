<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My404 extends CI_Controller {
    public function __construct() 
    {
        parent::__construct(); 
    }

    public function index() {
        $this->output->set_status_header('404'); 
        
        $data = array();
		
		$sitetitle = "404 - Page Not Found";
		$pagetitle = "404 - Page Not Found";
		$view = "my404";
		$breadcrumbs = array();

		$this->template->setPageId("PAGE_NOT_FOUND");
		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
		$this->template->setBreadcrumbs($breadcrumbs);
		
		$this->template->load($view, $data);
    }
}
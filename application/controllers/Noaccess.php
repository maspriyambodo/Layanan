<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noaccess extends CI_Controller {
    public function __construct() 
    {
        parent::__construct(); 
    }

    public function index() {
      $data = array();
		
			$sitetitle = "No Access";
			$pagetitle = "No Access";
			$view = "noaccess";
			$breadcrumbs = array();

			$this->template->setPageId("NO_ACCESS");
			$this->template->setSiteTitle($sitetitle);
			$this->template->setPageTitle($pagetitle);
			$this->template->setBreadcrumbs($breadcrumbs);
			
			$this->template->load($view, $data);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends MX_Controller {

	public function index()
	{
		
		$data = array();

		$sitetitle = "Dashboard";
		$pagetitle = "Dashboard";
		$view = "start";
		$breadcrumbs = array(
			array(
				"title" => "Dashboard",
				"link" => "",
				"is_actived" => true,
			),
		);

		$this->template->setPageId("DASHBOARD");
		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
		$this->template->setBreadcrumbs($breadcrumbs);

		$this->template->load($view, $data);
	}
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends MX_Controller {
    public function __construct() {
        parent::__construct();
		$this->template->setPageId("PARAMETER");
    }

    public function index()
    {
        $data = array();
        
        $sitetitle = "System Parameter";
        $pagetitle = "System Parameter";
        $view = "parameter";
        $breadcrumbs = array(
			array(
				"title" => "System",
				"link" => "",
				"is_actived" => false,
			),
			array(
				"title" => "Parameter",
				"link" => "",
				"is_actived" => true,
			),
		);

        $this->template->setSiteTitle($sitetitle);
        $this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $tableName = "sys_param";
        $primaryKey = "id";
        $subject = "Data Parameter";
        
        $crud = new Grocery_CRUD();
        $crud->set_subject($subject);
        $crud->set_table($tableName);
        $crud->set_primary_key($primaryKey);
        $crud->columns("id", "param_group", "param_value", "param_desc", "is_actived");
        $crud->fields("id", "param_group", "param_value", "param_desc", "is_actived", "created_by", "created_on", "modified_by", "modified_on");
        $crud->required_fields("id", "param_value", "param_desc", "is_actived");   
        
        $crud->change_field_type('created_by','invisible');
        $crud->change_field_type('created_on','invisible');
        $crud->change_field_type('modified_by','invisible');
        $crud->change_field_type('modified_on','invisible');

        $crud->callback_before_insert(array($this, 'set_data_hidden_fields'));
        $crud->callback_before_update(array($this, 'set_data_hidden_fields_edit'));

        $output = $crud->render();

        $cssFiles = $output->css_files;
        $jsFiles = array_merge($output->js_files, $output->js_lib_files);
        $this->template->setCssFiles($cssFiles);
        $this->template->setJsFiles($jsFiles);
        
        $this->template->load($view, $data, $this->template->getDefaultLayout(), $output->output);
    }

    function set_data_hidden_fields($post_array) {      
        $userid = $this->gembok->get_username(); 
        $post_array['created_by'] = $userid;
        $post_array['created_on'] = date("Y-m-d H:i:s");
        $post_array['modified_by'] = $userid;
        $post_array['modified_on'] = date("Y-m-d H:i:s");

        return $post_array;
    }

    function set_data_hidden_fields_edit($post_array) {
        $userid = $this->gembok->get_username();
        $post_array['modified_by'] = $userid;
        $post_array['modified_on'] = date("Y-m-d H:i:s");

        return $post_array;
    }
}
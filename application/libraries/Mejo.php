<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PHP Mejo
 *
 * LISENSI
 *
 * Mejo iki dibangun mergo enek butuh pas gawe table neng aplikasi iso otomatis sementara iki sik nggawe fancygrid yo sing trial
 * Awakmu iso nggawe file iki bebas sak karepmu, naming lek enek salahe ojo ngak ngek, dibenerno dewe yo.
 *
 * @package    	Mejo
 * @copyright  	Mulai digawe (c) 2017 sampe ngga ngerti sempurnane kapan, Masmeka
 * @version    	1.0.0
 * @author     	Masmeka <masmeka@gmail.com>
 */

// ------------------------------------------------------------------------

/**
 * PHP Mejo
 *
 * Dulinan gawe tabel neng aplikasi ben iso otomatis koyok cah cah liyane
 *
 * @package    	Mejo
 * @author     	Masmeka <masmeka@gmail.com>
 * @license     sakkarepmu arepe mok kapakne, cuman lek enek salahe ojo ngak ngek, ndang dibenerno yoo
 * @link		<sepurane durung enek, iki mung digawe dewe alias lokalan>
 */
class Mejo {

    const VERSION = "1.0.0";

    // base variables init
    protected $_ci = null;
    protected $_config = null;
    private $_statements = array("m_view", "m_info", "m_list", "m_add", "m_edit", "m_delete");

    // common variables init
    protected $_state = "";
    protected $_path_assets = "/assets/mejo/";
    protected $_mejo_grid_id = "mejo_grid";

    // data variables init
    protected $_query = "";
    protected $_data = null;
    protected $_model = null;

    // url variables init
    protected $_view_url = "";
    protected $_add_url = "";
    protected $_edit_url = "";
    protected $_delete_url = "";
    protected $_detail_url = "";
    protected $_save_url = "";
    protected $_save_ajax_url = "";
    protected $_delete_ajax_url = "";

    // init constructor
    public function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->load->config('mejo');
        $this->_model = $this->_ci->load->model("Mejo_model");
        
        $this->_config = (object)array();
        $this->_config->_js_lib = base_url() . $this->_path_assets . "fancygrid/fancy.full.min.js";
        $this->_config->_css_lib = array(
            base_url() . $this->_path_assets . "fancygrid/fancy.min.css",
            base_url() . $this->_path_assets . "mejo.css",
        );
        $this->_config->_js_script_init = array("Fancy.MODULESDIR = '". base_url() . $this->_path_assets ."modules/';");
        $this->_config->_js_inlines = array();
        
        $this->_state = $this->_get_current_state();
        $this->_data = array();
    }

    private function _get_current_state() {
        $currentState = "m_view";
        $currentFunc = "index";
        $currentPos = 0;
        $segments = $this->_ci->uri->segments;
        if(count($segments) > 0) {
            foreach($segments as $idx=>$value) {
                if(in_array($value, $this->_statements)) {
                    $currentPos = $idx;
                    $currentState = $value;
                }
            }
        }

        if($currentState == "m_view") {
            if(count($segments) > 2) {
                $currentFunc = $segments[2];
            } else {
                $currentFunc = "";
            }
        } else {
            $currentFunc = $segments[$currentPos-1];
        }

        return $currentState;
    }

    public function setQuery($sql) {
        $this->_query = $sql;
    }

    public function setMejoGridId($gridId) {
        if(!empty($gridId)) {
            $this->_mejo_grid_id = $gridId;
        }
    }

    private function buildJsElm($jsSrc) {
        return '<script type="text/javascript" src="'.$jsSrc.'"></script>';
    }

    private function buildCssElm($cssSrc) {
        return '<link rel="stylesheet" type="text/css" href="'.$cssSrc.'" />';
    }

    private function buildJsInline($arrScripts) {
        $result = "<script type=\"text/javascript\">";
        if(is_array($arrScripts)) {
            if(count($arrScripts) > 0) {
                foreach($arrScripts as $s) {
                    $result .= $s;
                } 
            }
        }
        $result .= "</script>";

        return $result;
    }

    private function addJsInline($jsScript) {
        if(!is_array($this->_config->_js_inlines)) {
            $this->_config->_js_inlines = array();
        }

        array_push($this->_config->_js_inlines, $jsScript);
    }

    private function getLayout() {
        return "<div id=\"". $this->_mejo_grid_id ."\"></div>";
    }
    
    public function metungul() {
        $results = (object)array(
            "metune" => $this->getLayout(),
            "js_lib_files" => array($this->_config->_js_lib), 
            "css_lib_files" => $this->_config->_css_lib, 
            "js_inlines" => $this->buildJsInline(array_merge($this->_config->_js_script_init, $this->_config->_js_inlines)), 
        ); 

        return $results;
    }
}

class MejoCmd {
    public $text = "Mejo Button";
    public $textIcon = "fa fa-nav";
    public $cssClass = "mejo-btn mejo-btn-default";
    public $action = "javascript:;";
    public $actionType = "link";
    public $width = 100;

    public function metu() {
        return (object)array(
            "text" => $this->text,
            "textIcon" => $this->textIcon,
            "cssClass" => $this->cssClass,
            "action" => $this->action,
            "actionType" => $this->actionType,
            "width" => $this->width,
        );
    }
}

class MejoCol {
    public $title = "auto";
    public $fieldname = "auto";
    public $width = -1;
    public $lockedLeft = false;
    public $lockedRight = false;
    public $columnType = "data";
    public $allowSort = true;
    public $allowFilter = true;
    public $allowResize = false;
    public $colCmd = array();

    public function metu() {
        $result = (object)array(
            "title" => $this->title,
            "fieldname" => $this->fieldname,
            "width" => $this->width,
            "lockedLeft" => $this->lockedLeft,
            "lockedRight" => $this->lockedRight,
            "columnType" => $this->columnType,
            "allowSort" => $this->allowSort,
            "allowFilter" => $this->allowFilter,
            "allowResize" => $this->allowResize,
            "colCmd" => $this->colCmd,
        );
    }
}

class MejoColCmd {
    public $text = "";
    public $textIcon = "";
    public $cssClass = "";
    public $action = "javascript:;";
    public $actionType = "link";

    public function metu() {
        return (object)array(
            "text" => $this->text,
            "textIcon" => $this->textIcon,
            "cssClass" => $this->cssClass,
            "action" => $this->action,
            "actionType" => $this->actionType,
        );
    }
}
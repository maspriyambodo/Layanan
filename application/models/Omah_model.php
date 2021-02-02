<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Omah_model extends CI_Model  {
    protected $_tbl = "sys_menu";
    protected $_tblParam = "sys_param";
    protected $_ci;

    function __construct() {
        parent::__construct();
        $this->_ci = &get_instance();
    }

    function get_data_by_parent_section($parentid = "", $section = "") {
        $this->_ci->db->reset_query();
        $this->_ci->db->select($this->_tbl.".*", FALSE);
        $this->_ci->db->order_by($this->_tbl.".group_order", "ASC");
        $this->_ci->db->order_by($this->_tbl.".order_no", "ASC");
        if($parentid!="" && $parentid!=NULL) {
            $this->_ci->db->where("id_parent", $parentid);
        } else {
            $this->_ci->db->where("(id_parent = '' or id_parent is null)");
        }
        if(!empty($section)) {
            $this->_ci->db->where("group_menu", $section);
        }
        $this->_ci->db->where("is_actived", 1);
        $query = $this->_ci->db->get($this->_tbl);

        return $query;
    }

    function get_param($id) {
        $this->_ci->db->reset_query();
        $this->_ci->db->select($this->_tblParam.".*", FALSE);
        $this->_ci->db->where("is_actived", 1);
        $this->_ci->db->where("id", $id);
        $query = $this->_ci->db->get($this->_tblParam);

        return $query;
    }
}
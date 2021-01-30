<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gembok {
    protected $_data = null;
    protected $_config = null;
    protected $_ci = null;

    public function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->load->config('gembok');

        $this->_config = $this->_ci->config;
        $this->_data = array();
    }

    public function set_session($data) {
        $this->_ci->session->set_userdata($data);
    }

    public function get_session($key) {
        return $this->_ci->session->userdata($key);
    }

    public function build_session() {
        if(count($this->_data) > 0) {
            $this->set_session($this->_data);
        }
    }

    public function clear_session() {
        $this->set_userid(NULL);
        $this->set_username(NULL);
        $this->set_fullname(NULL);
        $this->set_email(NULL);
        $this->set_userphoto(NULL);
        $this->set_groupid(NULL);
        $this->set_groupname(NULL);
        $this->set_access(NULL);
        $this->set_starter(NULL);
        $this->set_region(NULL);
        $this->set_businessunit(NULL);
        $this->set_occupation(NULL);
        $this->set_nostaff(NULL);

        $this->set_session($this->_data);
    }

    public function set_data($sess_name, $value) {
        $key = $this->_config->item("gembok_sess_".$sess_name);
        $this->_data[$key] = $value;
    }

    public function get_data($sess_name) {
        $key = $this->_config->item("gembok_sess_".$sess_name);
        return $this->get_session($key);
    }

    public function permission($item) {
        $access = $this->get_access();
        if($access==null) {
            $access = array();
        }
        if(array_key_exists($item, $access)) {
            return $access[$item]->access; 
        } else {
            $nullitem = array(
                "is_view" => 0,
                "is_add" => 0,
                "is_edit" => 0,
                "is_delete" => 0,
                "is_approve" => 0,
                "is_publish" => 0,
                "is_starter" => 0,
            );
            return (object) $nullitem;
        }
    }

    public function permission_menu($item) {
        $infos = $this->get_access();
        if($infos==null) {
            $infos = array();
        }
        if(array_key_exists($item, $infos)) {
            return $infos[$item]->info;
        } else {
            $nullitem = array(
                "id" => "",
                "kode" => "",
                "title" => "",
                "link" => "",
            );
            return (object) $nullitem;
        }
    }

    /* set session info */
    public function set_userid($val) {
        $this->set_data("userid", $val);
    }
    public function set_username($val) {
        $this->set_data("username", $val);
    }
    public function set_fullname($val) {
        $this->set_data("fullname", $val);
    }
    public function set_email($val) {
        $this->set_data("email", $val);
    }
    public function set_userphoto($val) {
        $this->set_data("userphoto", $val);
    }
    public function set_groupid($val) {
        $this->set_data("groupid", $val);
    }
    public function set_groupname($val) {
        $this->set_data("groupname", $val);
    }
    public function set_access($val) {
        $this->set_data("access", $val);
    }
    public function set_starter($val) {
        $this->set_data("starter", $val);
    }
    public function set_region($val) {
        $this->set_data("region", $val);
    }
    public function set_businessunit($val) {
        $this->set_data("idbusinessunit", $val);
    }
    public function set_nostaff($val) {
        $this->set_data("nostaff", $val);
    }
    public function set_occupation($val) {
        $this->set_data("occupation", $val);
    }
    /* end set session info */
    
    /* get session info */
    public function get_userid() {
        return $this->get_data("userid");
    }
    public function get_username() {
        return $this->get_data("username");
    }
    public function get_fullname() {
        return $this->get_data("fullname");
    }
    public function get_email() {
        return $this->get_data("email");
    }
    public function get_userphoto() {
        return $this->get_data("userphoto");
    }
    public function get_groupid() {
        return $this->get_data("groupid");
    }
    public function get_groupname() {
        return $this->get_data("groupname");
    }
    public function get_region() {
        return $this->get_data("region");
    }
    public function get_businessunit() {
        return $this->get_data("idbusinessunit");
    }
    public function get_nostaff() {
        return $this->get_data("nostaff");
    }
    public function get_occupation() {
        return $this->get_data("occupation");
    }
    public function get_access() {
        return $this->get_data("access");
    }
    public function get_starter() {
        return $this->get_data("starter");
    }
    /* end get session info */
}
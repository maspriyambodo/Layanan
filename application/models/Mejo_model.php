<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mejo_model extends CI_Model  {
    protected $_query = "";
    function set_query($sql) {
        $_query = $sql;
    }

    function get_list() {
        if(!empty($this->_query)) {
            $this->db->reset_query();
            $results = $this->db->query($this->_query);
            return $results;
        }

        return null;
    }
}
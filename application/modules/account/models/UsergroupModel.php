<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UsergroupModel extends CI_Model  {
    protected $_tblParent = "sys_roles";
    protected $_tblPermissions = "sys_permissions";
    protected $_tblMenu = "sys_menu";
    protected $_primaryKey = "id";

    function __construct() {
        parent::__construct();
    }

    function getData($take = 0, $limit = 0) {
        if($take >= 0 AND $limit > 0)
		{
			$this->db->select($this->_tblParent.".*", FALSE);
			$this->db->order_by($this->_tblParent.".id", "ASC");
			
			$query = $this->db->get($this->_tblParent, $take, $limit); 
		}
		else
		{
			$query = $this->db->get($this->_tblParent);
		}
		
		return $query;
    }

    function getDataById($id) {
        $this->db->where('id', $id);
		return $this->db->get($this->_tblParent);
    }

    function getPermissions($id) {
        $this->db->where('role_id', $id);
		return $this->db->get($this->_tblPermissions);
    }

    function getDataMenu($take = 0, $limit = 0) {
        if($take >= 0 AND $limit > 0)
		{
			$this->db->select($this->_tblMenu.".*", FALSE);
			$this->db->order_by($this->_tblMenu.".id", "ASC");
			
			$query = $this->db->get($this->_tblMenu, $take, $limit); 
		}
		else
		{
			$query = $this->db->get($this->_tblMenu);
		}
		
		return $query;
    }
    
    function delete($id) {
        // delete detail
        $this->db->where('role_id', $id);
        $this->db->delete($this->_tblPermissions);
        
        // delete parent
        $this->db->where('id', $id);
        $this->db->delete($this->_tblParent);
        
		return $this->db->affected_rows() > 0;
    }
    
    function deleteallaccess($id) {
        // delete all access
        $this->db->where('role_id', $id);
        $this->db->delete($this->_tblPermissions);
		return $this->db->affected_rows() > 0;
    }

    function save($data, $mode = "add") {
        $user = "sysadmin";
        $id = $data["id"];
        $data["modified_on"] = date("Y-m-d H:i:s");
        $data["modified_by"] = $user;

        if(empty($data["id"])) $mode = "add";

        if($mode=="add") {
            $data["created_on"] = date("Y-m-d H:i:s");
            $data["created_by"] = $user;
        
            $this->db->insert($this->_tblParent, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update($this->_tblParent, $data);
        }

        return $id;
    }

    function saveaccess($data, $mode = "add") {
        $user = "sysadmin";
        $id = $data["role_id"];
        $data["modified_on"] = date("Y-m-d H:i:s");
        $data["modified_by"] = $user;

        if(empty($data["role_id"])) return;

        if($mode=="add") {
            $data["created_on"] = date("Y-m-d H:i:s");
            $data["created_by"] = $user;
        
            $this->db->insert($this->_tblPermissions, $data);
        } else {
            $this->db->where('id', $id);
            $this->db->update($this->_tblPermissions, $data);
        }

        return $id;
    }
}
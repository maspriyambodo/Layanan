<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model  {
    protected $_tblParent = "sys_users";
    protected $_tblApproval = "sys_user_approval";
    protected $_primaryKey = "id";

    function __construct() {
        parent::__construct();
    }

    function getData($take = 0, $limit = 0) {
        if($take >= 0 AND $limit > 0)
		{
            $this->db->join('sys_roles', $this->_tblParent.'.role_id = sys_roles.id', 'left');
			$this->db->select($this->_tblParent.".*, sys_roles.name as user_group", FALSE);
			$this->db->order_by($this->_tblParent.".id", "ASC");
			
			$query = $this->db->get($this->_tblParent, $take, $limit); 
		}
		else
		{
            $this->db->join('sys_roles', $this->_tblParent.'.role_id = sys_roles.id', 'left');
			$this->db->select($this->_tblParent.".*, sys_roles.name as user_group", FALSE);
			$query = $this->db->get($this->_tblParent);
		}
		
		return $query;
    }

    function getDataById($id) {
        $this->db->select($this->_tblParent.".*, sys_roles.name as user_group", FALSE);
        $this->db->join('sys_roles', $this->_tblParent.'.role_id = sys_roles.id', 'left');
        $this->db->where('id', $id);
		return $this->db->get($this->_tblParent);
    }

    function getDataByField($fieldname, $value) {
        $this->db->select($this->_tblParent.".*, sys_roles.name as user_group", FALSE);
        $this->db->join('sys_roles', $this->_tblParent.'.role_id = sys_roles.id', 'left');
        $this->db->where($fieldname, $value);
		return $this->db->get($this->_tblParent);
    }
    
    function delete($id) {
        // delete detail
        $this->db->where('id_user', $id);
        $this->db->delete($this->_tblApproval);
        
        // delete parent
        $this->db->where('id', $id);
        $this->db->delete($this->_tblParent);
        
		return $this->db->affected_rows() > 0;
    }

    function save($data, $mode = "add") {
        $user = "sysadmin";
        $id = $data["id"];
        $data["modified"] = date("Y-m-d H:i:s");
        $data["modified_by"] = $user;

        if(empty($data["id"])) $mode = "add";

        if($mode=="add") {
            $data["created"] = date("Y-m-d H:i:s");
            $data["created_by"] = $user;
        
            $this->db->insert($this->_tblParent, $data);
            $id = $this->db->insert_id();
        } else {
            $this->db->where('id', $id);
            $this->db->update($this->_tblParent, $data);
        }

        return $id;
    }

    function saveApprover($id, $username, $approvers) {
        $user = "sysadmin";
        if(!empty($id)) {
            // reset first all data existing
            $this->db->where('id_user', $id);
            $this->db->delete($this->_tblApproval);

            if(count($approvers)>0) {
                foreach($approvers as $a) {
                    $data = array(
                        "id_user" => $id,
                        "username" => $username,
                        "approver_id" => $a->approver_id,
                        "approver_username" => $a->approver_username,
                        "approver_name" => $a->approver_name,
                        "approver_as" => $a->approver_as,
                        "approver_level" => $a->approver_level,
                    );
                    $data["modified_on"] = date("Y-m-d H:i:s");
                    $data["modified_by"] = $user;
                    $data["created_on"] = date("Y-m-d H:i:s");
                    $data["created_by"] = $user;
                    $this->db->insert($this->_tblApproval, $data);
                }
            }
        }

        return true;
    }
}
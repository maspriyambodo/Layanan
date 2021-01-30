<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Catetan {
    public $login = "LOGIN";
    public $logout = "LOGOUT";
    public $view = "VIEW";
    public $add = "ADD";
    public $edit = "EDIT";
    public $delete = "DELETE";
    public $approve = "APPROVE";
    public $publish = "PUBLISH";

    public $ajaxMode = "AJAX";
    public $urlMode = "URL";

    public $accessType = "";
    public $accessMode = "";
    public $pageId = "";
    public $pageName = "";
    public $dataId = "";
    public $dataKey = "";
    public $dataTableName = "";
    public $dataPrev = array();
    public $dataUpdate = array();
    public $isSuccess = true;
    public $remark = "";

	protected $CI = null;
	protected $gembok = null;

    protected $_tableName = "sys_access_log";
    protected $_fields = "id_user,username,access_type,access_on,ip_local,ip_server,page_id,page_name,data_id,data_key,data_table,data_prev,data_update,success,access_mode,email,remark,page_url,page_mode,page_segments";

    public function __construct() {
        $this->CI = &get_instance();
        
        $this->CI->load->library("Gembok");
        $this->gembok = $this->CI->gembok;
        
        $this->accessType = $this->view;
        $this->accessMode = $this->urlMode;
    }

    public function tambah() {
        $access_type = $this->accessType();
        $access_mode = $this->accessMode();
        $page_id = $this->pageId;
        $page_name = $this->pageName;
        $data_id = $this->dataId;
        $data_key = $this->dataKey;
        $data_table = $this->dataTableName;
        $data_prev = $this->dataPrev;
        $data_update = $this->dataUpdate;
        $success = ($this->isSuccess?1:0);
        $remark = $this->remark;

        $this->addlog($access_type, $access_mode, $page_id, $page_name, $success, $remark, $data_id, $data_key, $data_table, $data_prev, $data_update);
    }

    public function tambahno($data) {
        if(is_array($data)) {
            if(count($data) > 0) {
                $this->addlog(
                    $data["access_type"],
                    $data["access_mode"],
                    $data["page_id"],
                    $data["page_name"],
                    $data["success"],
                    $data["remark"],
                    $data["data_id"],
                    $data["data_key"],
                    $data["data_table"],
                    $data["data_prev"],
                    $data["data_update"]
                );
            }
        }
    }

    public function addlog($access_type,$access_mode,$page_id,$page_name,$success = 1,$remark = "",$data_id = "",$data_key = "",$data_table = "",$data_prev = array(),$data_update = array()) {
        $id_user = $this->gembok->get_userid();
        if($id_user=="" || $id_user==null) {
            $id_user = 0;
        }
        $username = $this->gembok->get_username();
        if($username=="" || $username==null) {
            $username = "Unknown User";
        }
        $email = $this->gembok->get_email();
        if($email=="" || $email==null) {
            $email = "email@unknown.user";
        }
        $ip_local = getIpClient();
        $ip_server = getIpServer();
        $access_on = date("Y-m-d H:i:s");
        $page_url = current_url();
        $page_mode = $this->CI->router->fetch_method();
        $page_segments = $this->CI->uri->segment_array();

        if($page_id==null) {
            $page_id = "UNKNOWN/LOGIN";
        }
        if($page_name==null){
            $page_name= "Unknown / Login Page";
        }

        $fields = explode(",", $this->_fields);
        $data = array();
        foreach($fields as $f) {
            $value = $$f;
            if(is_array($value)) {
                $value = json_encode($value);
            }
            $data[$f] = $value;
        }

        $this->CI->db->insert($this->_tableName, $data);
    }
}
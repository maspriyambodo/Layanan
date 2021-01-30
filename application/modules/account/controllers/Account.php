<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends MX_Controller {
    function __construct() {
        parent::__construct();
    }

	public function login()
	{
        $data = array();

		$sitetitle = "Sign In &raquo; Web Admin";
        $view = "signin";
        $layout = "bodyonly.php";
        
        $ip_address = $this->omah->get_user_ip();
        if(empty($ip_address) || $ip_address == "::1") {
            $ip_address = $this->input->ip_address();
        }
        if(!$this->input->valid_ip($ip_address) || $ip_address == "::1") {
            $ip_address = "0.0.0.0";
        }
        $user_agent = $this->input->user_agent();
        $ab_first_time_2019 = $this->input->cookie("ab_first_time_2019", false);
        $is_first_2019 = false;
        if(empty($ab_first_time_2019) || $ab_first_time_2019 == "" || $ab_first_time_2019 == null) {
            // $ab_first_time_2019_data = array(
            //     "name" => "ab_first_time_2019",
            //     "value" => $ip_address . "|" . $user_agent,
            //     "expiry" => time() + (86400 * 30),
            //     "path" => "/"
            // );
            // setcookie($ab_first_time_2019_data["name"],$ab_first_time_2019_data["value"],$ab_first_time_2019_data["expiry"],$ab_first_time_2019_data["path"]);
            $is_first_2019 = true;
        } else {
            if($ab_first_time_2019 != $user_agent) {
                $is_first_2019 = true;
            }
        }
        $data["is_first_2019"] = false;

		$this->template->setSiteTitle($sitetitle);
		
		$this->template->load($view, $data, $layout);
    }

	public function changepassword()
	{
        $data = array();

		$sitetitle = "Change Password";
		$pagetitle = "Change Password";
		$view = "account/changepassword";
		$breadcrumbs = array(
			array(
				"title" => "Account",
				"link" => "#",
				"is_actived" => false,
			),
			array(
				"title" => "Change Password",
				"link" => "#",
				"is_actived" => true,
			),
		);

		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);
		
		$this->template->load($view, $data, $this->template->getDefaultLayout());
    }

	public function editprofile()
	{
        $data = array();

		$sitetitle = "Edit Profile";
		$pagetitle = "Edit Profile";
		$view = "account/editprofile";
		$breadcrumbs = array(
			array(
				"title" => "Account",
				"link" => "#",
				"is_actived" => false,
			),
			array(
				"title" => "Edit Profile",
				"link" => "#",
				"is_actived" => true,
			),
		);

		$this->template->setSiteTitle($sitetitle);
		$this->template->setPageTitle($pagetitle);
        $this->template->setBreadcrumbs($breadcrumbs);

        $userdata = array();
        $id = $this->gembok->get_userid();
		if(!empty($id)) {
			$this->db->select("*", FALSE);
			$this->db->where("id", $id);
			$query = $this->db->get("sys_users");
			$cols = $query->list_fields();
			$dataUser = array();
			if($query->num_rows() > 0) {
				foreach($query->result() as $r) {
					$item = array();
					if(count($cols)>0) {
						foreach($cols as $c) {
							$item[$c] = $r->$c;
						}
					}
					array_push($dataUser, $item);
				}
            }
            if(count($dataUser) > 0) {
				$userdata = $dataUser[0];
			}
		}
		$checkfile = $this->config->item("path_to_upload") . DIRECTORY_SEPARATOR . "users" . DIRECTORY_SEPARATOR . $userdata["username"] . DIRECTORY_SEPARATOR . $userdata["img_photo"];
		$userdata["checkfile"] = $checkfile;
		$data["formdata"] = $userdata;
		
		$this->template->load($view, $data, $this->template->getDefaultLayout());
    }

    public function savenewpassword() {
        $id = $this->input->post("id");
        $currpass = $this->input->post("currpass");
        $newpass = $this->input->post("newpass");
        $newpassconfirm = $this->input->post("newpassconfirm");

        $notallowedpass = array(
            "password", "p455w0rd", "p4\$\$w0rd", "12345678", "qwertyui", "asdfghj", "zxcvbnm,", "qwertyuiop", "asdfghjkl"
        );

        $success = true;
        $msg = "";
        $others = array();

        if(trim($currpass)=="") {
            $success = false;
            $msg = "Please enter your current password.";
        } 
        else if(trim($newpass)=="" || trim($newpassconfirm)=="") {
            $success = false;
            $msg = "Please enter your new password and confirm new password.";
        }
        else if($newpass!=$newpassconfirm) {
            $success = false;
            $msg = "Your new password is not valid. Please check between your new password & confirm new password.";
        } else if(strlen($newpass) < 8) {
            $success = false;
            $msg = "Please enter minimum 8 character for your new password.";
        } else if(in_array(strtolower($newpass), $notallowedpass)) {
            $success = false;
            $msg = "You're not allowed using insecure password. Please try other password.";
        } else {
            // $passtocheck = $this->dx_auth->checkoldpassword($currpass, "");
            // $others["currpass"] = $passtocheck;
            // $others["currpassori"] = $currpass;
            // $others["newpass"] = $this->dx_auth->cryptpassword($newpass);
            $this->db->where("id", $id);
            //$this->db->where("password", $passtocheck);
            $query = $this->db->get("sys_users");
            if($query->num_rows()>0) {
                $rows = $query->result();
                $row = $rows[0];
                if($this->dx_auth->checkoldpassword($currpass, $row->password) === $row->password) {
                    $this->load->model("UserModel");
                    $model = $this->UserModel;
                    $data = array(
                        "id" => $id,
                        "password" => $this->dx_auth->cryptpassword($newpass),
                    );
                    $id = $model->save($data, "edit");
                } else {
                    $success = false;
                    $msg = "Your current password is invalid.";
                }
            } else {
                $success = false;
                $msg = "Your user id is invalid.";
            }
        }

        $datareturn = array(
            "success" => $success,
            "message" => $msg,
            "others" => $others,
        );

        toJson($datareturn);
    }

    function saveprofile() {
		$id = $this->input->post("id");
		$mode = $this->input->post("mode");

		$username = $this->input->post("username");
        $fullname = $this->input->post("fullname");
        $email = $this->input->post("email");
        $no_staff = $this->input->post("no_staff");
        $occupation = $this->input->post("occupation");
        $isresetimg = $this->input->post("isresetimg");

		$pathToSave = $this->config->item("path_to_upload");
		$pathToSave = join(DIRECTORY_SEPARATOR, array($pathToSave, "users", $username));
		if (!file_exists($pathToSave) && !is_dir($pathToSave)) {
			@mkdir($pathToSave, 0777, true);
		} else {
            @chmod($pathToSave, 0777);
        }
		$config['upload_path'] = $pathToSave;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = 10240;
		$config["file_name"] = $username;

		$this->load->library('upload', $config);
		
		$isUpload = true;
		$success = true;
		$msg = "";
		$img_photo = "";
		if (!$this->upload->do_upload('img_photo')) {
			$isUpload = false;
			$msg = $this->upload->display_errors();
			$success = false;
		} else {
			$uploads = $this->upload->data();
		}

		if(!$isUpload && empty($uploads["client_name"])) {
			$isUpload = true;
			$success = true;
			$msg = "";
		}

		if($isUpload) {		
			if(!empty($uploads["client_name"])) {
				$img_photo = $uploads["file_name"];
			}
			$data = array(
				"id" => $id,
				"fullname" => $fullname,
				"email" => $email,
				"no_staff" => $no_staff,
				"occupation" => $occupation,
				"img_photo" => $img_photo,
			);

			if($mode=="edit" && $isresetimg=="0" && empty($uploads["client_name"])) {
				unset($data["img_photo"]);
            }
            
            $this->load->model("UserModel");
            $model = $this->UserModel;
            $id = $model->save($data, $mode);
            
            $dataret = array(
                "fullname" => $data["fullname"],
                "email" => $data["email"],
                "nostaff" => $data["no_staff"],
                "occupation" => $data["occupation"],
            );
            if(array_key_exists("img_photo", $data)) {
                $dataret["userphoto"] = $data["img_photo"];
            }
            foreach($dataret as $key=>$value) {
                $this->gembok->set_data($key, $value);
            }
            $this->gembok->build_session();
		}

		$results = array(
			"id" => $id,
			"success" => $success,
			"message" => $msg,
		);
		toJson($results);
	}

    public function dologin() {
        $val = $this->form_validation;

        //print_array($val);

        $val->set_rules('email', 'Email', 'trim|required');
        $val->set_rules('password', 'Password', 'trim|required');
        $val->set_rules('remember', 'Remember me', 'integer');

        $status = "OK";
        $error = "";
        $success = TRUE;
        $show_captcha = FALSE;
        $msg = "";
        if ($this->dx_auth->is_max_login_attempts_exceeded())
        {
            $val->set_rules('captcha', 'Confirmation Code', 'trim|required|callback_captcha_check');
        }

        if ($val->run() AND $this->dx_auth->login($val->set_value('email'), $val->set_value('password'), $val->set_value('remember')))
        {
            $error = "";
            $msg = "";
        }
        else
        {
            $msg = $this->dx_auth->get_auth_error();
            if ($this->dx_auth->is_banned())
            {
                $this->dx_auth->deny_access('banned');
                $status = "NOK";
                $error = "access denied!";
                $success = FALSE;
            }
            else
            {
                if ($this->dx_auth->is_max_login_attempts_exceeded())
                {
                    $this->dx_auth->captcha();
                    $show_captcha = TRUE;
                    $status = "NOK";
                    $success = FALSE;
                    $error = "max login attempts exceeded!";
                }
            }

            if($this->dx_auth->get_auth_error()!=null && $this->dx_auth->get_auth_error()!="") {
                $status = "NOK";
                $success = FALSE;
                $error = "Login unsuccessfully!";
            }

            $datalog = array(
                "access_type" => $this->catetan->login,
                "access_mode" => $this->catetan->ajaxMode,
                "page_id" => "LOGIN",
                "page_name" => "Sign In",
                "success" => 0,
                "remark" => "User : ". $val->set_value('email') . " as UNKNOWN user tried to log in.",
                "data_id" => $val->set_value('email'),
                "data_key" => "id",
                "data_table" => "sys_users",
                "data_prev" => array(),
                "data_update" => array(),        
            );
            $this->catetan->tambahno($datalog);
        }

        // manual define userid, username, userphoto, usergroup, grouppermissions
        if($success) {
            $username = $val->set_value('email');
            $this->load->model("UserModel");
		    $model = $this->UserModel;
            $query = $model->getDataByField("username", $username);
            $cols = $query->list_fields();
            $data = array();
            if($query->num_rows() > 0) {
                $nomor = 0;
                foreach($query->result() as $r) {
                    $item = array();
                    $nomor++;
                    $item["nomor"] = $nomor;
                    if(count($cols)>0) {
                        foreach($cols as $c) {
                            $item[$c] = $r->$c;
                        }
                    }
                    $data = $item;
                    break;
                }
            }

            $this->db->join('sys_menu','sys_menu.id = sys_permissions.id_menu', 'left');
            $this->db->select("sys_permissions.*, sys_menu.*", FALSE);
            $this->db->where("sys_permissions.role_id", $data["role_id"]);
            $query = $this->db->get("sys_permissions");
            $permissions = array();
            $starters = array();
            if($query->num_rows() > 0) {
                foreach($query->result() as $r) {
                    $id_menu = $r->id_menu;
                    $kode_menu = $r->kode;
                    $title = $r->menu;
                    $url_menu = str_replace("{{base_url}}/", base_url(), $r->url_link);
                    $url_menu = str_replace("{{base_url}}", base_url(), $r->url_link);
                    $is_v = $r->is_view;
                    $is_a = $r->is_add;
                    $is_e = $r->is_edit;
                    $is_d = $r->is_delete;
                    $is_r = $r->is_approve;
                    $is_p = $r->is_publish;
                    $is_s = $r->is_starter;
                    $access = array(
                        "is_view" => $is_v,
                        "is_add" => $is_a,
                        "is_edit" => $is_e,
                        "is_delete" => $is_d,
                        "is_approve" => $is_r,
                        "is_publish" => $is_p,
                        "is_starter" => $is_s,
                    );
                    $info = array(
                        "id" => $id_menu,
                        "kode" => $kode_menu,
                        "title" => $title,
                        "link" => $url_menu,
                    );
                    $pitem = array(
                        "info" => (object) $info,
                        "access" => (object) $access,
                    );
                    $permissions[$kode_menu] = (object) $pitem;
                    if($is_s==1 && $is_v==1) {
                        array_push($starters, (object) $pitem);
                    }
                }
            }

            $dataret = array(
                "userid" => $data["id"],
                "username" => $data["username"],
                "fullname" => $data["fullname"],
                "email" => $data["email"],
                "userphoto" => $data["img_photo"],
                "groupname" => $data["user_group"],
                "groupid" => $data["role_id"],
                "region" => $data["id_company"],
                "nostaff" => $data["no_staff"],
                "occupation" => $data["occupation"],
                "access" => $permissions,
                "starter" => $starters,
            );
            foreach($dataret as $key=>$value) {
                $this->gembok->set_data($key, $value);
            }
            $this->gembok->build_session();

            $datalog = array(
                "access_type" => $this->catetan->login,
                "access_mode" => $this->catetan->ajaxMode,
                "page_id" => "LOGIN",
                "page_name" => "Sign In",
                "success" => 1,
                "remark" => null,
                "data_id" => $dataret["userid"],
                "data_key" => "id",
                "data_table" => "sys_users",
                "data_prev" => $dataret,
                "data_update" => array(),        
            );
            $this->catetan->tambahno($datalog);
        }

        toJson(
            array(
                "status" => $status,
                "success" => $success,
                "error" => $error,
                "message" => $msg,
                "show_captcha" => $show_captcha,
                "additional_info" => "",
            )
        );
    }
    
    public function logout() {
        $datalog = array(
            "access_type" => $this->catetan->logout,
            "access_mode" => $this->catetan->urlMode,
            "page_id" => "LOGOUT",
            "page_name" => "Sign Out",
            "success" => 1,
            "remark" => null,
            "data_id" => null,
            "data_key" => null,
            "data_table" => null,
            "data_prev" => array(),
            "data_update" => array(),        
        );
        $this->catetan->tambahno($datalog);

        $this->dx_auth->logout();

        $this->gembok->clear_session();

        redirect("signin");
    }

    function _setSession($data) {
        $this->session->set_userdata($data);
    }
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Omah {
    protected $_ci = null;
    protected $_model = null;

    protected $_pageid = null;
    protected $gembok = null;
    protected $access = null;

    public function __construct(){
        $this->_ci = &get_instance();
        $this->_ci->load->model("Omah_model");
        $this->_model = $this->_ci->Omah_model;

        $this->_ci->load->library("Gembok");
        $this->gembok = $this->_ci->gembok;
        
        $this->access = $this->gembok->get_access();
    }

    public function set_pageid($pageid) {
        $this->_pageid = $pageid;
    }

    public function get_pageid() {
        return $this->_pageid;
    }

    public function get_navs($parentid = "", $section = "") {
        $data = array();
        $query = $this->_model->get_data_by_parent_section($parentid, $section);
        $items = $query->result();
        $cols = $query->list_fields();
        if(count($items) > 0) {
            foreach($items as $i) {
                $item = array();
                if(count($cols)>0) {
					foreach($cols as $c) {
						$item[$c] = $i->$c;
					}
                }
                array_push($data, (object) $item);
                $children = $this->get_navs($i->id, $section);
                if(count($children)>0) {
                    $data = array_merge($data, $children);
                }
            }
        }

        return $data;
    }

    public function get_navs_html($parentid = "", $section = "") {
        $data = array();
        $query = $this->_model->get_data_by_parent_section($parentid, $section);
        $items = $query->result();

        if(count($items) > 0) {
            foreach($items as $i) {
                $id = $i->id;
                $parent = $i->id_parent;
                $kode = $i->kode;
                $url = $i->url_link;
                $title = $i->menu;
                $icon_cls = $i->icon_class;
                $icon_txt = $i->icon_text;
                $url = str_replace("{{base_url}}/", base_url(), $url);
                $url = str_replace("{{base_url}}", base_url(), $url);
                $selected = "{{actived}}";
                $found_actived = false;
                if($kode==$this->_pageid) {
                    $found_actived = true;
                }

                $is_view = false;
                if(!is_array($this->access)) {
                    $this->access = array();
                }
                if(count($this->access) > 0) {
                    if(array_key_exists($kode, $this->access)) {
                        $is_view = $this->access[$kode]->access->is_view;
                    }
                }
                if($is_view==1) {
                    $menu = '<li class="'.$selected.'"><a href="'.$url.'" class="ripple"><span class="{{color}}"><i class="'.$icon_cls.'">'.$icon_txt.'</i> <span class="hide-menu">'.$title.'</span></span></a>    
                    </li>';
                    if(!empty($parent)) {
                        $menu = '<li class="'.$selected.'"><a href="'.$url.'" class="ripple"><span class="{{color}}">'.$title.'</a>    
                        </li>';
                    }
                    $children = $this->get_navs_html($i->id, $section);
                    if(count($children)>0) {
                        $menu = '<li class="menu-item-has-children '.$selected.'">
                        <a href="'.$url.'" class="ripple"><span class="{{color}}"><i class="'.$icon_cls.'">'.$icon_txt.'</i> <span class="hide-menu">'.$title.'</span></span></a>
                        <ul class="list-unstyled sub-menu {{collapse}}">';

                        foreach($children as $c) {
                            $menu .= $c;
                            if(strpos($c, "active") > -1) {
                                $found_actived = true;
                            }
                        }

                        $menu .= "</ul></li>";
                    }
                    if($found_actived) {
                        $menu = str_replace("{{actived}}", "active", $menu);
                        $menu = str_replace("{{collapse}}", "collapse in", $menu);
                        $menu = str_replace("{{color}}", "color-color-scheme", $menu);
                    } else {
                        $menu = str_replace("{{actived}}", "", $menu);
                        $menu = str_replace("{{collapse}}", "", $menu);
                        $menu = str_replace("{{color}}", "", $menu);
                    }
                    array_push($data, $menu);
                }
            }
        }

        return $data;
    }

    public function get_param($paramid) {
        $data = array();
        $query = $this->_model->get_param($paramid);
        $items = $query->result();
        $cols = $query->list_fields();
        $data = array();
        if(count($items) > 0) {
            foreach($items as $i) {
                foreach($cols as $c) {
					$dataItem[$c] = $i->$c;
                }
                array_push($data, $dataItem);
            }
        }

        return (object)$data;
    }

    public function get_param_value($paramid) {
        $data = array();
        $query = $this->_model->get_param($paramid);
        $items = $query->result();

        $data = "";
        if(count($items) > 0) {
            $data = $items[0]->param_value;
        }

        return $data;
    }

    function get_user_ip() {
        $headers = array ('HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'HTTP_VIA', 'HTTP_X_COMING_FROM', 'HTTP_COMING_FROM', 'HTTP_CLIENT_IP' );
    
        foreach ( $headers as $header ) {
            if (isset ( $_SERVER [$header]  )) {
            
                if (($pos = strpos ( $_SERVER [$header], ',' )) != false) {
                    $ip = substr ( $_SERVER [$header], 0, $pos );
                } else {
                    $ip = $_SERVER [$header];
                }
                $ipnum = ip2long ( $ip );
                if ($ipnum !== - 1 && $ipnum !== false && (long2ip ( $ipnum ) === $ip)) {
                    if (($ipnum - 184549375) && // Not in 10.0.0.0/8
                    ($ipnum  - 1407188993) && // Not in 172.16.0.0/12
                    ($ipnum  - 1062666241)) // Not in 192.168.0.0/16
                    if (($pos = strpos ( $_SERVER [$header], ',' )) != false) {
                        $ip = substr ( $_SERVER [$header], 0, $pos );
                    } else {
                        $ip = $_SERVER [$header];
                    }
                    return $ip;
                }
            }
            
        }
        return $_SERVER ['REMOTE_ADDR'];
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('PO_NOT_SUBMITTED', 0);
define('PO_SUBMITTED', 1);
define('PO_RECEIVED_INCOMPLETE', 4);
define('PO_RECEIVED_COMPLETE', 5);
define('PO_CANCELED', 6);
function getstatuspo($status) {
  $status_text = "";
  switch($status){
    case PO_SUBMITTED:
      $status_text = "PO Submitted";
      break;
    case PO_RECEIVED_INCOMPLETE:
      $status_text = "Incomplete Received";
      break;
    case PO_RECEIVED_COMPLETE:
      $status_text = "Received All";
      break;
    case PO_CANCELED:
      $status_text = "PO Canceled";
      break;
    default:
      $status_text = "Not yet submitted";
      break;
  }

  return $status_text;
}

function check_is_group($group_param_id) {
  $ci = &get_instance();

  $ci->load->library("Gembok");
  $ci->load->library("Omah");

  $currgroup = $ci->gembok->get_groupid();
  $groupcheck = $ci->omah->get_param_value($group_param_id);

  return ($currgroup==$groupcheck);
}

function is_super_admin() {
  return check_is_group("GROUP_SA");
}

function is_admin() {
  return check_is_group("GROUP_ADMIN");
}

function is_admin_toko() {
  return check_is_group("ADMIN_TOKO");
}

function is_teknisi() {
  return check_is_group("TEKNISI");
}
?>
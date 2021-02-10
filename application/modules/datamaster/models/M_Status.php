<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Product:        System of kementerian agama Republik Indonesia
 * License Type:   Government
 * Access Type:    Multi-User
 * License:        https://maspriyambodo.com
 * maspriyambodo@gmail.com
 * 
 * Thank you,
 * maspriyambodo
 */

/**
 * Description of M_Status
 *
 * @author centos
 */
class M_Status extends CI_Model {

    public function index() {
        $exec = $this->db->select('mt_status_layanan.id, mt_status_layanan.nama_stat,mt_status_layanan.keterangan')
                ->from('mt_status_layanan')
                ->where('`mt_status_layanan`.`stat`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_status_layanan', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function Get($id) {
        $exec = $this->db->select('mt_status_layanan.id, mt_status_layanan.nama_stat, mt_status_layanan.keterangan')
                ->from('mt_status_layanan')
                ->where([
                    '`mt_status_layanan`.`stat`' => 1 + false,
                    '`mt_status_layanan`.`id`' => $id + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function Update($id, $data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`mt_status_layanan`.`id`', $id, false)
                ->update('mt_status_layanan');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

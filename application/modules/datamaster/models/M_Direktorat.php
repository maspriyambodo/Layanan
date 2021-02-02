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
 * Description of M_Direktorat
 *
 * @author centos
 */
class M_Direktorat extends CI_Model {

    public function index() {
        $exec = $this->db->select('SUBSTRING(mt_direktorat.keterangan,1,20) AS keterangan', false)
                ->select('mt_direktorat.id, mt_direktorat.nama')
                ->from('mt_direktorat')
                ->where('`mt_direktorat`.`stat`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_direktorat', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function Get($id) {
        $exec = $this->db->select('mt_direktorat.id, mt_direktorat.nama, mt_direktorat.keterangan')
                ->from('mt_direktorat')
                ->where([
                    '`mt_direktorat`.`stat`' => 1 + false,
                    '`mt_direktorat`.`id`' => $id + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function Update($id, $data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`mt_direktorat`.`id`', $id, false)
                ->update('mt_direktorat');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Layanan extends CI_Model {

    public function Kategori() {
        $exec = $this->db->select('mt_direktorat.id, mt_direktorat.nama')
                ->from('mt_direktorat')
                ->where('mt_direktorat.stat', 1 + false)
                ->get()
                ->result();
        return $exec;
    }

    public function index() {
        $exec = $this->db->select('mt_layanan.id,mt_layanan.nama_layanan, mt_direktorat.nama')
                ->from('mt_layanan')
                ->where('mt_layanan.stat !=', 3, false)
                ->join('mt_direktorat', 'mt_layanan.jenis_layanan = mt_direktorat.id')
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mt_layanan', $data);
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function Update($id, $data) {
        $this->db->trans_begin();
        $this->db->set($data)
                ->where('`mt_layanan`.`id`', $id, false)
                ->update('mt_layanan');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

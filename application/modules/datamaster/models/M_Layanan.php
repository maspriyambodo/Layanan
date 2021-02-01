<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Layanan extends CI_Model {

    public function Kategori() {
        $exec = $this->db->select('mst_direktorat.id, mst_direktorat.nama')
                ->from('mst_direktorat')
                ->where('mst_direktorat.stat', 1 + false)
                ->get()
                ->result();
        return $exec;
    }

    public function index() {
        $exec = $this->db->select('mst_layanan.id,mst_layanan.nama_layanan, mst_direktorat.nama')
                ->from('mst_layanan')
                ->where('mst_layanan.stat !=', 3, false)
                ->join('mst_direktorat', 'mst_layanan.jenis_layanan = mst_direktorat.id')
                ->get()
                ->result();
        return $exec;
    }

    public function Add($data) {
        $this->db->trans_begin();
        $this->db->insert('mst_layanan', $data);
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
                ->where('`mst_layanan`.`id`', $id, false)
                ->update('mst_layanan');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}

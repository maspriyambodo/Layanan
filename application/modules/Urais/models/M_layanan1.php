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
 * Description of M_layanan1
 *
 * @author centos
 */
class M_layanan1 extends CI_Model {

    public function index($data) {
        $exec = $this->db->select()
                ->from('admin_izin_kegiatan_keagamaan')
                ->where([
                    'admin_izin_kegiatan_keagamaan.id_stat' => $data['id_stat'] + false,
                    'admin_izin_kegiatan_keagamaan.jenis_layanan' => $data['jenis_layanan'] + false
                ])
                ->get()
                ->result();
        return $exec;
    }

//    public function index($data) {
//        $exec = $this->db->query('CALL admin_izin_kegiatan_keagamaan(' . $data['id_stat'] . ',' . $data['jenis_layanan'] . ')')->result();
//        return $exec;
//    }

    public function Detail($id) {
        $exec = $this->db->select()
                ->from('detail_izin_kegiatan_keagamaan')
                ->where('`detail_izin_kegiatan_keagamaan`.`id_layanan`', $id, false)
                ->where('`detail_izin_kegiatan_keagamaan`.`stat_id`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

//    public function Update($id, $data) {
//        $this->db->trans_begin();
//        $this->db->set($data)
//                ->where('`dt_layanan`.`id`', $id, false)
//                ->update('dt_layanan');
//        if ($this->db->trans_status() === false) {
//            $this->db->trans_rollback();
//            return false;
//        } else {
//            $this->db->trans_commit();
//            return true;
//        }
//    }

    public function Update($data) {
        $query = $this->db->query('CALL update_proses_layanan(' . $data['id_layanan'] . ',' . $data['user_id'] . ',' . $data['status_id'] . ')');
        return $query->conn_id->affected_rows;
    }

    public function Stat() {
        $exec = $this->db->select()
                ->from('admin_IKK_persetujuan')
                ->get()
                ->result();
        return $exec;
    }

    public function Proses_verif($param) {
        $this->db->query('CALL verif_IKK(' . $param['e'] . ',' . $param['a'] . ',' . $param['b'] . ',' . $param['c'] . ',"' . $param['d'] . '")');
    }

}

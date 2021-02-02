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

    public function index() {
        $exec = $this->db->select()
                ->from('admin_izin_kegiatan_keagamaan')
                ->get()
                ->result();
        return $exec;
    }

    public function Detail($id) {
        $exec = $this->db->select()
                ->from('detail_izin_kegiatan_keagamaan')
                ->where('`detail_izin_kegiatan_keagamaan`.`id_layanan`', $id, false)
                ->get()
                ->result();
        return $exec;
    }

}

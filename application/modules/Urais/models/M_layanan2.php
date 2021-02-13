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
 * Description of M_layanan2
 *
 * @author centos
 */
class M_layanan2 extends CI_Model {

    public function index($data) {
        $exec = $this->db->select()
                ->from('admin_dai_luar')
                ->where([
                    'admin_dai_luar.id_stat' => $data['id_stat'] + false,
                    'admin_dai_luar.jenis_layanan' => $data['jenis_layanan'] + false
                ])
                ->get()
                ->result();
        return $exec;
    }

}

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
                ->from('`admin_izin_kegiatan_keagamaan`')
                ->where([
                    '`admin_izin_kegiatan_keagamaan`.`status_aktif`' => 1 + false,
                    '`admin_izin_kegiatan_keagamaan`.`id_stat`' => $data['id_stat'] + false,
                    '`admin_izin_kegiatan_keagamaan`.`jenis_layanan`' => $data['jenis_layanan'] + false
                ])
                ->get()
                ->result();
        return $exec;
    }

    public function Detail($param) {
        $exec = $this->db->select()
                ->from('`detail_izin_kegiatan_keagamaan`')
                ->where('`detail_izin_kegiatan_keagamaan`.`id_layanan`', $param['id_layanan'], false)
                ->where('`detail_izin_kegiatan_keagamaan`.`stat_id`', $param['stat_id'], false)
                ->get()
                ->result();
        return $exec;
    }

    public function Update($data) {
        $query = $this->db->query('CALL update_proses_layanan(' . $data['id_layanan'] . ',' . $data['user_id'] . ',' . $data['status_id'] . ')');
        return $query->conn_id->affected_rows;
    }

    public function Delete_layanan($param) {
        $query = $this->db->query('CALL delete_dt_layanan(' . $param['id_layanan'] . ',' . $param['user_id'] . ',' . $param['status_id'] . ')');
        return $query;
    }

    public function Stat() {
        $exec = $this->db->select()
                ->from('`admin_IKK_persetujuan`')
                ->get()
                ->result();
        return $exec;
    }

    public function Proses_verif($param) {
        $this->db->query('CALL verif_IKK(' . $param['e'] . ',' . $param['a'] . ',' . $param['b'] . ',' . $param['c'] . ',"' . $param['d'] . '")');
    }

    public function Provinsi() {
        $exec = $this->db->select('`mt_wil_provinsi`.`id_provinsi`, `mt_wil_provinsi`.`nama`')
                ->from('`mt_wil_provinsi`')
                ->where('`mt_wil_provinsi`.`is_actived`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Getkab($id) {
        $exec = $this->db->select('`mt_wil_kabupaten`.`id_kabupaten`, `mt_wil_kabupaten`.`id_provinsi`, `mt_wil_kabupaten`.`nama` AS `kabupaten`')
                ->from('`mt_wil_kabupaten`')
                ->where([
                    '`mt_wil_kabupaten`.`is_actived`' => 1 + false,
                    '`mt_wil_kabupaten`.`id_provinsi`' => $id + false
                ])
                ->get()
                ->result();
        $a[0] = array('kabupaten' => 'Pilih Kabupaten');
        $b = array_merge($a, $exec);
        return $b;
    }

    public function Getkec($id) {
        $exec = $this->db->select('`mt_wil_kecamatan`.`id_kecamatan`, `mt_wil_kecamatan`.`nama` AS `kecamatan`')
                ->from('`mt_wil_kecamatan`')
                ->where([
                    '`mt_wil_kecamatan`.`is_actived`' => 1, false,
                    '`mt_wil_kecamatan`.`id_kabupaten`' => $id + false
                ])
                ->get()
                ->result();
        $a[0] = array('kecamatan' => 'Pilih Kecamatan');
        $b = array_merge($a, $exec);
        return $b;
    }

    public function Getkel($id) {
        $exec = $this->db->select('`mt_wil_kelurahan`.`id_kelurahan`, `mt_wil_kelurahan`.`nama` AS `kelurahan`')
                ->from('`mt_wil_kelurahan`')
                ->where([
                    '`mt_wil_kelurahan`.`is_actived`' => 1, false,
                    '`mt_wil_kelurahan`.`id_kecamatan`' => $id + false
                ])
                ->get()
                ->result();
        $a[0] = array('kelurahan' => 'Pilih Kelurahan');
        $b = array_merge($a, $exec);
        return $b;
    }

    public function Insert_user($data) {
        $exec = $this->db->query('CALL insert_user(' . $data['sys_user']['no_ktp'] . ',"' . $data['sys_user']['tanggal_lahir'] . '","' . $data['sys_user']['uname'] . '","' . $data['sys_user']['nama_lengkap'] . '","' . $data['sys_user']['mail_user'] . '",' . $data['sys_user']['telepon'] . ',@user_id)');
        //$exec->result() = Array ( [0] => stdClass Object ( [id_user] => 10 ) )
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Insert_user' . 'error ketika insert user');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data user'
            ];
        } else {
            $id = [
                'id_user' => $exec->result()[0]->id_user
            ];
            mysqli_next_result($this->db->conn_id);
            $result = $this->Insert_layanan(array_merge($data, $id));
        }
        return $result;
    }

    private function Insert_layanan($data) {
        $exec = $this->db->query('CALL insert_dt_layanan(' . $data['id_user'] . ',' . $data['dt_layanan']['provinsi'] . ',' . $data['dt_layanan']['kabupaten'] . ',' . $data['dt_layanan']['kecamatan'] . ',' . $data['dt_layanan']['kelurahan'] . ',"' . $data['dt_layanan']['keterangan_kegiatan'] . '",' . $data['dt_layanan']['mt_layanan'] . ',@id_layanan)');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Insert_layanan ' . ' error ketika insert detil layanan');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data layanan'
            ];
        } else {
            $id = [
                'id_layanan' => $exec->result()[0]->layanan_id
            ];
            mysqli_next_result($this->db->conn_id);
            $result = $this->Insert_kegiatan(array_merge($data, $id));
        }
        return $result;
    }

    private function Insert_kegiatan($data) {
        $exec = $this->db->query('CALL insert_dt_kegiatan(' . $data['id_layanan'] . ',"' . $data['dt_kegiatan']['nama_kegiatan'] . '",' . $data['dt_kegiatan']['jumlah_peserta'] . ',"' . $data['dt_kegiatan']['lembaga'] . '","' . $data['dt_kegiatan']['tmt_awal'] . '","' . $data['dt_kegiatan']['tmt_akhir'] . '","' . $data['dt_kegiatan']['alamat_kegiatan'] . '")');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Insert_kegiatan ' . ' error ketika insert detil kegiatan');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data kegiatan'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result = $this->Insert_penceramah($data);
        }
        return $result;
    }

    private function Insert_penceramah($data) {
        for ($i = 0; $i < count($data['dt_penceramah']['penceramah']); $i++) {
            $exec = $this->db->query('CALL insert_ceramah_kegiatan(' . $data['id_layanan'] . ',"' . $data['dt_penceramah']['penceramah'][$i] . '")');
            mysqli_next_result($this->db->conn_id);
        }
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data penceramah'
            ];
        } else {
            $result = $this->Insert_dokmohon($data);
        }
        return $result;
    }

    private function Insert_dokmohon($data) {
        $exec = $this->db->query('CALL insert_dokmohon_keg(' . $data['id_layanan'] . ',"' . $data['dt_layanan_dokumen']['ktp_kegiatan'] . '","' . $data['dt_layanan_dokumen']['proposal_kegiatan'] . '","' . $data['dt_layanan_dokumen']['sp_keg'] . '")');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data penceramah'
            ];
        } else {
            $result['status'] = true;
        }
        return $result;
    }

    public function S_proposal($data) {
        $this->db->trans_begin();
        $this->db->set('dt_layanan_dokumen.proposal_keg', $data['proposal']['file_name'])
                ->where('`dt_layanan_dokumen`.`id_layanan`', $data['id_layanan'], false)
                ->update('dt_layanan_dokumen');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = 0;
        } else {
            $this->db->trans_commit();
            $status = 1;
        }
        return $status;
    }

    public function S_ktp($data) {
        $this->db->trans_begin();
        $this->db->set('dt_layanan_dokumen.ktp_keg', $data['ktp_keg']['file_name'])
                ->where('`dt_layanan_dokumen`.`id_layanan`', $data['id_layanan'], false)
                ->update('dt_layanan_dokumen');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = 0;
        } else {
            $this->db->trans_commit();
            $status = 1;
        }
        return $status;
    }

    public function S_spk($data) {
        $this->db->trans_begin();
        $this->db->set('dt_layanan_dokumen.surat_permohonan_keg', $data['sp_keg']['file_name'])
                ->where('`dt_layanan_dokumen`.`id_layanan`', $data['id_layanan'], false)
                ->update('dt_layanan_dokumen');
        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            $status = 0;
        } else {
            $this->db->trans_commit();
            $status = 1;
        }
        return $status;
    }

    public function Change($data) {
        $exec = $this->db->query('CALL update_user(' . $data['id_user'] . ',' . $data['sys_user']['no_ktp'] . ',"' . $data['sys_user']['tanggal_lahir'] . '","' . $data['sys_user']['nama_lengkap'] . '","' . $data['sys_user']['mail_user'] . '","' . $data['sys_user']['telepon'] . '")');
        if ($exec->conn_id->sqlstate != 00000) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Change' . 'error ketika mengubah data pemohon');
            $result = [
                'status' => false,
                'pesan' => 'error ketika mengubah data pemohon'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result = $this->Update_layanan($data);
        }
        return $result;
    }

    private function Update_layanan($data) {
        $exec = $this->db->query('CALL update_dt_layanan(' . $data['id_layanan'] . ',' . $data['dt_layanan']['provinsi'] . ',' . $data['dt_layanan']['kabupaten'] . ',' . $data['dt_layanan']['kecamatan'] . ',' . $data['dt_layanan']['kelurahan'] . ',"' . $data['dt_layanan']['keterangan_kegiatan'] . '",' . $data['dt_layanan']['user_update'] . ')');
        if ($exec->conn_id->sqlstate != 00000) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Update_layanan' . 'error ketika mengubah data layanan');
            $result = [
                'status' => false,
                'pesan' => 'error ketika mengubah data layanan'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result = $this->Update_kegiatan($data);
        }
        return $result;
    }

    private function Update_kegiatan($data) {
        $exec = $this->db->query('CALL update_dt_kegiatan(' . $data['id_layanan'] . ',"' . $data['dt_kegiatan']['nama_kegiatan'] . '",' . $data['dt_kegiatan']['jumlah_peserta'] . ',"' . $data['dt_kegiatan']['lembaga'] . '","' . $data['dt_kegiatan']['tmt_awal'] . '","' . $data['dt_kegiatan']['tmt_akhir'] . '","' . $data['dt_kegiatan']['alamat_kegiatan'] . '")');
        if ($exec->conn_id->sqlstate != 00000) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Update_kegiatan ' . ' error ketika mengubah data kegiatan');
            $result = [
                'status' => false,
                'pesan' => 'error ketika mengubah data kegiatan'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result = $this->Update_penceramah($data);
        }
        return $result;
    }

    private function Update_penceramah($data) {
        $id_ceramah = $this->db->select('`dt_penceramah`.`id`')
                ->from('`dt_penceramah`')
                ->where('`dt_penceramah`.`id_layanan`', $data['id_layanan'], false)
                ->get()
                ->result();
        for ($i = 0; $i < count($data['dt_penceramah']['penceramah']); $i++) {
            $exec = $this->db->query('CALL update_ceramah_kegiatan(' . $id_ceramah[$i]->id . ',' . $data['id_layanan'] . ',"' . $data['dt_penceramah']['penceramah'][$i] . '")');
            mysqli_next_result($this->db->conn_id);
        }
        if ($exec->conn_id->sqlstate != 00000) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Update_penceramah ' . ' error ketika mengubah data penceramah');
            $result = [
                'status' => false,
                'pesan' => 'error ketika mengubah data penceramah'
            ];
        } else {
            $result['status'] = true;
        }
        return $result;
    }

}

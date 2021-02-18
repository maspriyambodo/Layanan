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
        if ($data['id_stat'] == "null") {
            $where = [
                '`admin_izin_kegiatan_keagamaan`.`status_aktif`' => 1 + false,
                '`admin_izin_kegiatan_keagamaan`.`jenis_layanan`' => $data['jenis_layanan'] + false
            ];
        } else {
            $where = [
                '`admin_izin_kegiatan_keagamaan`.`status_aktif`' => 1 + false,
                '`admin_izin_kegiatan_keagamaan`.`id_stat`' => $data['id_stat'] + false,
                '`admin_izin_kegiatan_keagamaan`.`jenis_layanan`' => $data['jenis_layanan'] + false
            ];
        }
        $exec = $this->db->select()
                ->from('`admin_izin_kegiatan_keagamaan`')
                ->where($where)
                ->get()
                ->result();
        print_r($this->db->last_query());
        die;
        return $exec;
    }

    public function Provinsi() {
        $exec = $this->db->select('`mt_wil_provinsi`.`id_provinsi`, `mt_wil_provinsi`.`nama`')
                ->from('`mt_wil_provinsi`')
                ->where('`mt_wil_provinsi`.`is_actived`', 1, false)
                ->get()
                ->result();
        return $exec;
    }

    public function Get_negara() {
        $exec = $this->db->select('mt_country.id, mt_country.country')
                ->from('`mt_country`')
                ->get()
                ->result();
        return $exec;
    }

    public function Simpenan($data) {
        $exec = $this->db->query('CALL insert_user(' . $data['sys_user']['no_ktp'] . ',"' . $data['sys_user']['tanggal_lahir'] . '","' . $data['sys_user']['uname'] . '","' . $data['sys_user']['nama_lengkap'] . '","' . $data['sys_user']['mail_user'] . '",' . $data['sys_user']['telepon'] . ',@user_id)');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan2 -> function Simpenan' . 'error ketika insert user');
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
        $exec = $this->db->query('CALL insert_dt_layanan(' . $data['id_user'] . ',' . $data['dt_layanan']['provinsi'] . ',' . $data['dt_layanan']['kabupaten'] . ',' . $data['dt_layanan']['kecamatan'] . ',"' . $data['dt_layanan']['kelurahan'] . '","' . $data['dt_layanan']['keterangan_kegiatan'] . '",' . $data['dt_layanan']['mt_layanan'] . ',@id_layanan)');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan2 -> function Insert_layanan ' . ' error ketika insert detil layanan');
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
        $exec = $this->db->query('CALL insert_dai_keluar(' . $data['id_layanan'] . ',"' . $data['dt_kegiatan']['nama_kegiatan'] . '",' . $data['dt_kegiatan']['jumlah_peserta'] . ',"' . $data['dt_kegiatan']['lembaga'] . '","' . $data['dt_kegiatan']['tmt_awal'] . '","' . $data['dt_kegiatan']['tmt_akhir'] . '","' . $data['dt_kegiatan']['alamat_kegiatan'] . '",' . $data['dt_kegiatan']['negara_tujuan'] . ')');
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
        for ($i = 0; $i < count($data['dt_penceramah']['narsum']); $i++) {
            $exec = $this->db->query('CALL insert_ceramah_keluar(' . $data['id_layanan'] . ',"' . $data['dt_penceramah']['narsum'][$i] . '","' . $data['dt_penceramah']['tmp_lhr'][$i] . '","' . $data['dt_penceramah']['tgl_lhr'][$i] . '",' . $data['dt_penceramah']['kelamin'][$i] . ',"' . $data['dt_penceramah']['no_paspor'][$i] . '",' . $data['dt_penceramah']['id_provinsi'][$i] . ',' . $data['dt_penceramah']['id_kabupaten'][$i] . ',' . $data['dt_penceramah']['id_kecamatan'][$i] . ',"' . $data['dt_penceramah']['id_kelurahan'][$i] . '","' . $data['dt_penceramah']['almt_penceramah'][$i] . '","' . $data['dt_penceramah']['cv'][$i]['file_name'] . '","' . $data['dt_penceramah']['fc_passport'][$i]['file_name'] . '","' . $data['dt_penceramah']['pas_foto'][$i]['file_name'] . '")');
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
        $exec = $this->db->query('CALL insert_dokmohon_keluar(' . $data['id_layanan'] . ',"' . $data['dt_layanan_dokumen']['surat_permohonan_luar'] . '","' . $data['dt_layanan_dokumen']['proposal_luar'] . '")');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan1 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data dokumen permohonan'
            ];
        } else {
            $result['status'] = true;
        }
        return $result;
    }

    public function Delete_layanan($param) {
        $query = $this->db->query('CALL delete_dt_layanan(' . $param['id_layanan'] . ',' . $param['user_id'] . ',' . $param['status_id'] . ')');
        return $query;
    }

    public function Detail($param) {
        if ($param['stat_id'] == null) {
            $where = [
                '`detail_dai_luar`.`id_layanan`' => $param['id_layanan'] + false,
                '`detail_dai_luar`.`status_aktif`' => 1 + false
            ];
        } else {
            $where = [
                '`detail_dai_luar`.`id_layanan`' => $param['id_layanan'] + false,
                '`detail_dai_luar`.`stat_id`' => $param['stat_id'] + false,
                '`detail_dai_luar`.`status_aktif`' => 1 + false
            ];
        }
        $exec = $this->db->select()
                ->from('`detail_dai_luar`')
                ->where($where)
                ->get()
                ->result();
        return $exec;
    }

}

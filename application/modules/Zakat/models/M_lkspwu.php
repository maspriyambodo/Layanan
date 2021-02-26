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
 * Description of M_lkspwu
 *
 * @author centos
 */
class M_lkspwu extends CI_Model {

    private function Rollback($data, $table) {
        if ($table == "Insert_layanan") {
//            hapus residual data pada table sys_user
//            jika error pada function Insert_layanan maka akan menghapus data pada table sys_user berdasarkan id_user terkait.
            $this->db->where('`sys_users`.`id`', $data['id_user'], false)
                    ->delete('`sys_users`');
            log_message('error', 'Query function Rollback -> ' . $this->db->last_query());
        } elseif ($table == "Insert_instansi") {
//          hapus residual data pada table dt_layanan dan sys_user!
//          jika error pada function Insert_instansi, maka akan menghapus data pada table dt_layanan dan sys_user            
            $this->db->where('`dt_layanan`.`id`', $data['id_layanan'], false)
                    ->delete('dt_layanan');
            log_message('error', 'Query function Rollback -> ' . $this->db->last_query());
            $this->db->where('`sys_users`.`id`', $data['id_user'], false)
                    ->delete('`sys_users`');
            log_message('error', 'Query function Rollback -> ' . $this->db->last_query());
        } elseif ($table == "Insert_dokmohon") {
//          hapus residual data pada table dt_instansi, dt_layanan dan sys_user!
            $this->db->where('`dt_instansi`.`id_layanan`', $data['id_layanan'], false)
                    ->delete('dt_instansi');
            log_message('error', 'Query function Rollback -> ' . $this->db->last_query());
            $this->db->where('`dt_layanan`.`id`', $data['id_layanan'], false)
                    ->delete('dt_layanan');
            log_message('error', 'Query function Rollback -> ' . $this->db->last_query());
            $this->db->where('`sys_users`.`id`', $data['id_user'], false)
                    ->delete('`sys_users`');
            log_message('error', 'Query function Rollback -> ' . $this->db->last_query());
        }
    }

    public function index($data) {
        if ($data['id_stat'] == "null") {
            $p1 = [
                '`admin_lkspwu`.`status_aktif`' => 1 + false,
                '`admin_lkspwu`.`jenis_layanan`' => $data['jenis_layanan'] + false
            ];
        } else {
            $p1 = [
                '`admin_lkspwu`.`status_aktif`' => 1 + false,
                '`admin_lkspwu`.`id_stat`' => $data['id_stat'] + false,
                '`admin_lkspwu`.`jenis_layanan`' => $data['jenis_layanan'] + false
            ];
        }
        $exec = $this->db->select()
                ->from('`admin_lkspwu`')
                ->where($p1)
                ->get()
                ->result();
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

    public function Simpan($data) {
        $exec = $this->db->query('CALL insert_user(' . $data['sys_user']['satu'] . ',"' . $data['sys_user']['dua'] . '","' . $data['sys_user']['tiga'] . '","' . $data['sys_user']['empat'] . '","' . $data['sys_user']['lima'] . '","' . $data['sys_user']['enam'] . '",@user_id);');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Zakat/models/M_lkspwu -> function Simpan ' . 'error ketika insert user');
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
        $exec = $this->db->query('CALL insert_dt_layanan(' . $data['id_user'] . ',' . $data['dt_layanan']['tujuh'] . ',' . $data['dt_layanan']['delapan'] . ',' . $data['dt_layanan']['sembilan'] . ',"' . $data['dt_layanan']['sepuluh'] . '","' . $data['dt_layanan']['keterangan_kegiatan'] . '",' . $data['dt_layanan']['jenis_layanan'] . ',@id_layanan);');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            $this->Rollback($data, "Insert_layanan");
            log_message('error', APPPATH . 'modules/Urais/models/M_lkspwu -> function Insert_layanan ' . ' error ketika insert detil layanan');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data layanan'
            ];
        } else {
            $id = [
                'id_layanan' => $exec->result()[0]->layanan_id
            ];
            mysqli_next_result($this->db->conn_id);
            $result = $this->Insert_instansi(array_merge($data, $id));
        }
        return $result;
    }

    private function Insert_instansi($data) {
        $exec = $this->db->query('CALL Insert_instansi(' . $data['id_layanan'] . ',"' . $data['nm_instansi']['sebelas'] . '",' . $data['nm_instansi']['duabelas'] . ',' . $data['nm_instansi']['tigabelas'] . ',' . $data['nm_instansi']['empatbelas'] . ',"' . $data['nm_instansi']['limabelas'] . '","' . $data['nm_instansi']['enambelas'] . '","' . $data['nm_instansi']['tujuhbelas'] . '","' . $data['nm_instansi']['delapanbelas'] . '",' . $data['nm_instansi']['sembilanbelas'] . ',' . $data['nm_instansi']['duapuluh'] . ',' . $data['id_user'] . ');');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            $this->Rollback($data, "Insert_instansi");
            log_message('error', APPPATH . 'modules/Urais/models/M_lkspwu -> function Insert_instansi ' . ' error ketika insert detil instansi');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data instansi'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result = $this->Insert_dokmohon($data);
        }
        return $result;
    }

    private function Insert_dokmohon($data) {
        $exec = $this->db->query('CALL Insert_dokmohon_lkspwu(' . $data['id_layanan'] . ',"' . $data['dok1']['file_name'] . '","' . $data['dok2']['file_name'] . '","' . $data['dok3']['file_name'] . '","' . $data['dok4']['file_name'] . '","' . $data['dok5']['file_name'] . '");');
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            $this->Rollback($data, "Insert_dokmohon");
            log_message('error', APPPATH . 'modules/Urais/models/M_lkspwu -> function Insert_dokmohon ' . ' error ketika insert data dokmohon lkspwu');
            $result = [
                'status' => false,
                'pesan' => 'error ketika menyimpan data dokmohon lkspwu'
            ];
        } else {
            $result['status'] = true;
        }
        return $result;
    }

    public function Detail($param) {
        if ($param['stat_id'] == null) {
            $where = [
                '`detail_lkspwu`.`id_layanan`' => $param['id_layanan'] + false,
                '`detail_lkspwu`.`status_aktif`' => 1 + false
            ];
        } else {
            $where = [
                '`detail_lkspwu`.`id_layanan`' => $param['id_layanan'] + false,
                '`detail_lkspwu`.`id_stat`' => $param['stat_id'] + false,
                '`detail_lkspwu`.`status_aktif`' => 1 + false
            ];
        }
        $exec = $this->db->select()
                ->from('detail_lkspwu')
                ->where($where)
                ->get()
                ->row_array();
        return $exec;
    }

    public function Update_dokmohon($data, $field) {
        $this->db->trans_begin();
        $this->db->set('dt_layanan_dokumen.' . $field, $data['file']['file_name'])
                ->where([
                    '`dt_layanan_dokumen`.`id`' => $data['id_dokmohon'] + false,
                    'dt_layanan_dokumen.id_layanan' => $data['id_layanan'] + false
                ])
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

    public function Update($data) {
        $exec = $this->db->query('CALL update_user_lkspwu(' . $data['sys_user']['satu'] . ',"' . $data['sys_user']['dua'] . '","' . $data['sys_user']['lima'] . '","' . $data['sys_user']['enam'] . '","' . $data['sys_user']['empat'] . '",' . $data['user_login'] . ',' . $data['id_user'] . ');');
        if ($exec->result()[0]->track_no != 3) {
            log_message('error', APPPATH . 'modules/Zakat/models/M_lkspwu/Update ->' . 'error ketika update sys_users');
            log_message('error', $exec->result()[0]->track_no . '->' . $exec->result()[0]->pesan_eror);
            $result = [
                'status' => false,
                'pesan' => 'gagal ketika mengubah data pemohon'
            ];
        } else {
            mysqli_next_result($this->db->conn_id);
            $result['status'] = true;
        }
        return $result;
    }

}

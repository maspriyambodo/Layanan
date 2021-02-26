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
class M_layanan4 extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->setGroup = $this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
    }

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

        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan4 -> function Simpenan' . 'error ketika insert user');
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
        
        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan4 -> function Insert_layanan ' . ' error ketika insert detil layanan');
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
        $exec = $this->db->query('CALL insert_safari(' . $data['id_layanan'] . ',"' . $data['dt_kegiatan']['nama_kegiatan'] . '",' . $data['dt_kegiatan']['jumlah_peserta'] . ',"' . $data['dt_kegiatan']['lembaga'] . '","' . $data['dt_kegiatan']['tmt_awal'] . '","' . $data['dt_kegiatan']['tmt_akhir'] . '","' . $data['dt_kegiatan']['alamat_kegiatan'] . '")');
        
        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan4 -> function Insert_kegiatan ' . ' error ketika insert detil kegiatan');
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
            $exec = $this->db->query('CALL insert_ceramah_safari(' . $data['id_layanan'] . ',"' . $data['dt_penceramah']['narsum'][$i] . '","' . $data['dt_penceramah']['tmp_lhr'][$i] . '","' . $data['dt_penceramah']['tgl_lhr'][$i] . '",' . $data['dt_penceramah']['kelamin'][$i] . ',"' . $data['dt_penceramah']['pendidikan'][$i] . '","' . $data['dt_penceramah']['pendidikan_non'][$i] . '","' . $data['dt_penceramah']['almt_penceramah'][$i] . '","' . $data['dt_penceramah']['cv'][$i]['file_name'] . '","' . $data['dt_penceramah']['fc_passport'][$i]['file_name'] . '","' . $data['dt_penceramah']['sc_ktp'][$i]['file_name'] . '","' . $data['dt_penceramah']['pas_foto'][$i]['file_name'] . '","' . $data['dt_penceramah']['sc_sertifikat'][$i]['file_name'] . '")');
            
            // print_r($this->db->last_query());
            // die();

            mysqli_next_result($this->db->conn_id);
        }
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan4 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
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
        $exec = $this->db->query('CALL insert_dokmohon_safari(' . $data['id_layanan'] . ',"' . $data['dt_layanan_dokumen']['surat_permohonan_safari'] . '","' . $data['dt_layanan_dokumen']['proposal_safari'] . '")');
        
        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan4 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
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

    public function Detail($id)
    {
        $kondisi = array(
            "id" => $id
        );

        $return = $this->db->select()
                ->from("v_safari_data")
                ->where($kondisi)
                ->get()
                ->result();
        return $return;
    }

    public function Penceramah($id)
    {
        $kondisi = array(
            "id_layanan" => $id
        );

        $return = $this->db->select()
                ->from("v_safari_penceramah")
                ->where($kondisi)
                ->get()
                ->result();
        return $return;
    }

    public function get_userdemo()
    {
        $kondisi = array(
            "a.id" => 38,
            "a.role_id" => 6
        );
        $query = $this->db->select("a.id, a.username, a.email, a.nik, a.fullname, a.tgl_lhr, a.telp")
                ->from("sys_users a")
                ->where($kondisi)
                ->get()->row();
        return $query;
    }

    //------------------------------------------- Query Bagus
    function data_diproses()
    {
        $kondisi = array(
            "id_stat" => 2
        );

        $query = $this->db->select()
                ->from("v_safari_data")
                ->where($kondisi)
                ->get()
                ->result();
        return $query;
    }

    function Narsum($id)
    {
        $kondisi = array(
            "a.id_layanan_penceramah" => $id
        );
        $exec = $this->db->select("a.*")
                ->from("view_safari_narsum a")
                ->where($kondisi)
                ->get()
                ->result();
        return $exec;
    }

    function cek_dokumen($id)
    {
        $kondisi = array(
            "a.id" => $id
        );

        $query = $this->db->from("dt_layanan_dokumen a")
                ->where($kondisi)->get()->row();
        return $query;
    }

    function cek_gambar($id)
    {
        $kondisi = array(
            "a.id" => $id
        );

        $query = $this->db->from("dt_penceramah a")
                ->where($kondisi)->get()->row();
        return $query;
    }

    function UpdateLayanan($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("dt_layanan", $data);
    }

    function UpdateAcara($id_layanan, $data)
    {
        $this->db->where("id_layanan", $id_layanan);
        $this->db->update("dt_kegiatan", $data);
    }

    function UpdateCeramah($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("dt_penceramah", $data);
    }

    function UpdateDokumens($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("dt_layanan_dokumen", $data);
    }

    function get_edit_lampiran($id)
    {
        $kondisi = array(
            "a.id_layanan" => $id
        );

        $query = $this->db->select("a.id, a.id_layanan")
                ->from("dt_layanan_dokumen a")
                ->where($kondisi)
                ->get()->row();
        return $query;
    }

    function detail_permohonan($id)
    {
        $kondisi = array(
            "id" => $id
        );

        $query = $this->db->select()
                ->from("v_safari_data")
                ->where($kondisi)
                ->get()
                ->row();
        return $query;
    }

    function detail_penceramah($id)
    {
        $kondisi = array(
            "id_layanan" => $id
        );

        $query = $this->db->select()
                ->from("v_safari_penceramah")
                ->where($kondisi)
                ->get()
                ->result();
        return $query;
    }

    function detail_kegiatan($id)
    {
        $kondisi = array(
            "a.stat" => 1,
            "b.id_layanan" => $id
        );

        $query = $this->db->select("b.id, b.id_layanan, b.nm_keg, b.esti_keg, b.lemb_keg, b.tgl_awal_keg, b.tgl_akhir_keg, b.alamat_keg")
                ->from("dt_layanan a")
                ->join("dt_kegiatan b","a.id = b.id_layanan","LEFT")
                ->where($kondisi)
                ->get()
                ->row();
        return $query;
    }

    function detail_narsum($id)
    {
        $kondisi = array(
            "a.stat" => 1,
            "b.id_layanan" => $id
        );

        $query = $this->db->select("b.id, b.id_layanan, b.narsum")
                ->from("dt_layanan a")
                ->join("dt_penceramah b","a.id = b.id_layanan","LEFT")
                ->where($kondisi)
                ->get()
                ->result();
        return $query;
    }

    function detail_lampiran($id)
    {
        $kondisi = array(
            "a.stat" => 1,
            "b.id_layanan" => $id
        );

        $query = $this->db->select("b.id, b.id_layanan, b.surat_permohonan_safari, b.proposal_safari, c.cv, c.fc_passport, c.sc_ktp, c.pas_foto, c.sc_sertifikat")
                ->from("dt_layanan a")
                ->join("dt_layanan_dokumen b","a.id = b.id_layanan","LEFT")
                ->join("dt_penceramah c","a.id = c.id_layanan")
                ->where($kondisi)
                ->get()
                ->result();
        return $query;
    }

    function status_rekomendasi()
    {
        $kondisi = array(
            "a.stat" => 1,
            "a.id >" => 2
        );

        $query = $this->db->select("a.id, a.nama_stat")
                ->from("mt_status_layanan a")
                ->where($kondisi)
                ->get()
                ->result();
        return $query;
    }

    function kirim_rekomendasi($data, $id_layanan)
    {
        $this->db->where('id', $id_layanan);
        $this->db->update('dt_layanan', $data);
    }
}

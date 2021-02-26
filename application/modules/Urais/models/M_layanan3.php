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
class M_layanan3 extends CI_Model
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
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan3 -> function Simpenan' . 'error ketika insert user');
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

    //private awalan
    private function Insert_layanan($data) {
        $exec = $this->db->query('CALL insert_dt_layanan("' . $data['id_user'] . '","' . $data['dt_layanan']['provinsi'] . '","' . $data['dt_layanan']['kabupaten'] . '","' . $data['dt_layanan']['kecamatan'] . '","' . $data['dt_layanan']['kelurahan'] . '","' . $data['dt_layanan']['keterangan_kegiatan'] . '",' . $data['dt_layanan']['mt_layanan'] . ',@id_layanan)');

        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan3 -> function Insert_layanan ' . ' error ketika insert detil layanan');
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
        $exec = $this->db->query('CALL insert_dai_dari_luar("' . $data['id_layanan'] . '","' . $data['dt_kegiatan']['nama_kegiatan'] . '","' . $data['dt_kegiatan']['jumlah_peserta'] . '","' . $data['dt_kegiatan']['lembaga'] . '","' . $data['dt_kegiatan']['tmt_awal'] . '","' . $data['dt_kegiatan']['tmt_akhir'] . '","' . $data['dt_kegiatan']['alamat_kegiatan'] . '")');

        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan3 -> function Insert_kegiatan ' . ' error ketika insert detil kegiatan');
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
            $exec = $this->db->query('CALL insert_ceramah_dari_luar(' . $data['id_layanan'] . ',"' . $data['dt_penceramah']['narsum'][$i] . '","' . $data['dt_penceramah']['tmp_lhr'][$i] . '","' . $data['dt_penceramah']['tgl_lhr'][$i] . '",' . $data['dt_penceramah']['kelamin'][$i] . ',"' . $data['dt_penceramah']['no_paspor'][$i] . '","' . $data['dt_penceramah']['almt_penceramah'][$i] . '","' . $data['dt_penceramah']['cv'][$i]['file_name'] . '","' . $data['dt_penceramah']['fc_passport'][$i]['file_name'] . '","' . $data['dt_penceramah']['pas_foto'][$i]['file_name'] . '","' . $data['dt_penceramah']['sc_ktp'][$i]['file_name'] . '")');
            mysqli_next_result($this->db->conn_id);
            // print_r($this->db->last_query());
            // die();
        }
        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan3 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
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
        $exec = $this->db->query('CALL insert_dokmohon_dari_luar(' . $data['id_layanan'] . ',"' . $data['dt_layanan_dokumen']['surat_permohonan_dalam'] . '","' . $data['dt_layanan_dokumen']['proposal_dalam'] . '")');
        
        // print_r($this->db->last_query());
        // die();

        if (empty($exec->conn_id->affected_rows) or $exec->conn_id->affected_rows == 0) {
            log_message('error', APPPATH . 'modules/Urais/models/M_layanan3 -> function Insert_penceramah ' . ' error ketika insert data penceramah');
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

    

    //------------------------------------------- Query Bagus
    function data_diproses()
    {
        $kondisi = array(
            "a.stat" => 1,
            "a.id_stat" => 2,
            "a.jenis_layanan" => 3,
            "b.jenis_layanan" => 2
        );

        $query = $this->db->select("a.id")
                ->from("dt_layanan a")
                ->join("mt_layanan b","a.jenis_layanan = b.id","LEFT")
                ->where($kondisi)
                ->get()
                ->result();
        return $query;
    }

    public function Penceramah($id)
    {
        $kondisi = array(
            "id_layanan" => $id
        );

        $return = $this->db->select()
                ->from("v_dai_kedalam_penceramah")
                ->where($kondisi)
                ->get()
                ->result();
        return $return;
    }

    public function Detail($id)
    {
        $kondisi = array(
            "id" => $id
        );

        $return = $this->db->select()
                ->from("v_dai_kedalam")
                ->where($kondisi)
                ->get()
                ->row();
        return $return;
    }

    function get_edit_pemohon($id)
    {
        $kondisi = array(
            "a.id" => $id,
            "a.stat" => 1,
            "a.jenis_layanan" => 3
        );

        $query = $this->db->select("b.nik, b.fullname, b.tgl_lhr, b.username, b.email, b.telp, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan")
                ->from("dt_layanan a")
                ->join("sys_users b", "a.id_user = b.id", "LEFT")
                ->where($kondisi)
                ->get()->row();
        return $query;
    }

    function get_provinsi()
    {
        $query = $this->db->select("a.id_provinsi, a.nama")
                ->from("mt_wil_provinsi a")
                ->where("a.is_actived !=", 0)
                ->get()
                ->result();
        return $query;
    }

    function get_edit_kegiatan($id)
    {
        $kondisi = array(
            "a.id_layanan" => $id
        );

        $query = $this->db->select("a.id, a.id_layanan, a.nm_keg, a.esti_keg, a.lemb_keg, a.tgl_awal_keg, a.tgl_akhir_keg, a.alamat_keg, a.ket_keg")
                ->from("dt_kegiatan a")
                ->where($kondisi)
                ->get()->row();
        return $query;
    }

    function get_userdemo()
    {
        $kondisi = array(
            "a.id" => 40,
            "a.role_id" => 6
        );
        $query = $this->db->select("a.id, a.username, a.email, a.nik, a.fullname, a.tgl_lhr, a.telp")
                ->from("sys_users a")
                ->where($kondisi)
                ->get()->row();
        return $query;
    }

    function last_ID()
    {
        $query = $this->db->select_max("a.id")
            ->from("dt_layanan a")
            ->limit(1)
            ->get()->row();
        return $query;
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
                ->from("v_dai_kedalam")
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
                ->from("v_dai_kedalam_penceramah")
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

        $query = $this->db->select("b.id, b.id_layanan, b.surat_permohonan_dalam, b.proposal_dalam, b.cv_crmh_dalam, b.pasp_crmh_dalam, b.ktp_dalam, b.pas_foto_crmh_dalam")
                ->from("dt_layanan a")
                ->join("dt_layanan_dokumen b","a.id = b.id_layanan","LEFT")
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

    function cek_gambar($id)
    {
        $kondisi = array(
            "a.id" => $id
        );

        $query = $this->db->from("dt_penceramah a")
                ->where($kondisi)->get()->row();
        return $query;
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

    function UpdateLayanan($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("dt_layanan", $data);
    }

    function UpdateAcara($id, $data)
    {
        $this->db->where("id", $id);
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

    function kirim_rekomendasi($data, $id_layanan)
    {
        $this->db->where('id', $id_layanan);
        $this->db->update('dt_layanan', $data);
    }

    function kirim_dtlayanan($dt_layanan)
    {
        $this->db->insert('dt_layanan', $dt_layanan);
    }

    function kirim_dtkegiatan($dt_kegiatan)
    {
        $this->db->insert('dt_kegiatan', $dt_kegiatan);
    }

    function kirim_dtlayanan_dok($dt_layanan_dokumen)
    {
        $this->db->insert('dt_layanan_dokumen', $dt_layanan_dokumen);
    }

    function kirim_dtpenceramah($data)
    {
        $this->db->insert('dt_penceramah', $data);
    }
}

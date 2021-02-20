<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Binsyar_m extends CI_Model {

	private $dt_layanan = 'dt_layanan as a';
	private $users = 'sys_users as b';

	function get_allDataJoin()
	{
		$kondisi = array(
			"a.stat" => 1
		);

		$this->db->select("a.nm_keg, a.lok_keg, a.esti_keg, a.crmh_keg, a.lemb_keg, b.username, b.fullname");
		$this->db->from($dt_layanan);
		$this->db->join($users, "a.id_user = b.id");
		// $this->db->where($kondisi);
		return $this->db->get();
	}

	// Kumpulan Edit data Layanan Masing Masing Form
	function get_dt_kegiatan($id)
	{
		// cara merge
		$session_user = $this->session->userdata('DX_user_id');
		$query1 = $this->db->query("
			SELECT
			a.id, a.id_user, c.fullname, c.email, c.telp, c.tgl_lhr, c.nik, b.nm_keg, b.tgl_awal_keg, b.tgl_akhir_keg, b.esti_keg, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan, b.alamat_keg, b.lemb_keg, b.id_layanan, b.id
			FROM
			dt_layanan as a
			JOIN dt_kegiatan as b ON a.id = b.id_layanan
			JOIN sys_users as c ON a.id_user = c.id
			WHERE
			a.id = $id AND a.stat = 1 AND a.id_user = $session_user
            ");
		// return $query1->result();

		$query2 = $this->db->query("
			SELECT
			a.id, a.id_layanan, a.narsum
			FROM
			dt_penceramah as a
			WHERE
			a.id_layanan = $id
            ");

		$query3 = $this->db->query("
			SELECT
			a.id, a.id_layanan, a.ktp, a.proposal_keg, a.surat_permohonan_keg
			FROM
			dt_layanan_dokumen as a
			WHERE
			a.id_layanan = $id
			");

		$result1 = $query1->result();
        $result2 = $query2->result();
        $result3 = $query3->result();

        return array_merge($result1, $result2, $result3);
	}

	function get_dt_ekspor($id)
	{
		$kondisi_a = array(
			"a.id" => $this->session->userdata("DX_user_id"),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata("DX_user_id")
		);
		$this->db->select("a.fullname, a.nik, a.telp, a.email, a.tgl_lhr, b.id_user, if(b.jenis_layanan = 2, 'ijin pengiriman dari keluar negeri', 'null') as jenis_layanan")
				 ->from("sys_users a")
				 ->join("dt_layanan b", "a.id = b.id_user")
				 ->where($kondisi_a);
		$query_a = $this->db->get();

		$kondisi_c = array(
			"c.id_layanan" => $id
		);
		$this->db->select("c.id, c.id_layanan, c.nm_keg, c.lemb_keg, c.esti_keg, c.tgl_awal_keg, c.tgl_akhir_keg, c.alamat_keg, c.code_negara")
				 ->from("dt_kegiatan c")
				 ->where($kondisi_c);
		$query_c = $this->db->get();

		$kondisi_d = array(
			"d.id_layanan" => $id
		);
		$this->db->select("d.id, d.id_layanan, d.narsum, d.tmp_lhr, d.tgl_lhr, d.jns_kelamin, d.no_paspor, d.id_provinsi, d.id_kabupaten, d.id_kecamatan, d.id_kelurahan, d.almt_penceramah, d.negara_asl")
				 ->from("dt_penceramah d")
				 ->where($kondisi_d)
				 ->group_by("d.id");
		$query_d = $this->db->get();

		$kondisi_e = array(
			"e.id_layanan" => $id
		);
		$this->db->select("e.id, e.id_layanan, e.surat_permohonan_luar, e.proposal_luar, e.cv_crmh_luar, e.pasp_crmh_luar, e.pasp_pengundang_luar, e.pas_foto_crmh_luar")
				 ->from("dt_layanan_dokumen e")
				 ->where($kondisi_e);
		$query_e = $this->db->get();

		$results = array();
		if($query_a->num_rows()){
			$results = array_merge($results, $query_a->result());
		}

		if($query_c->num_rows()){
			$results = array_merge($results, $query_c->result());
		}

		if($query_d->num_rows()){
			$results = array_merge($results, $query_d->result());
		}

		if($query_e->num_rows()){
			$results = array_merge($results, $query_e->result());
		}

		return $results;
	}

	function get_dt_impor($id)
	{
		$kondisi_a = array(
			"a.id" => $this->session->userdata("DX_user_id"),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata("DX_user_id"),
			"b.jenis_layanan" => 3
		);
		$this->db->select("b.id, a.fullname, a.nik, a.telp, a.email, a.tgl_lhr, b.id_user, if(b.jenis_layanan = 3, 'ijin penceramah dari luar negeri', 'null') as jenis_layanan, case 
			when b.id_stat = 1 then 'permohonan diterima'
			when b.id_stat = 2 then 'permohonan diproses'
			when b.id_stat = 3 then 'permohonan disetujui'
			when b.id_stat = 4 then 'permohonan ditolak' end as status_permohonan
			")
				 ->from("sys_users a")
				 ->join("dt_layanan b", "a.id = b.id_user")
				 ->join("mt_status_layanan c", "b.id_stat = c.id")
				 ->where($kondisi_a);
		$query_a = $this->db->get();

		$kondisi_c = array(
			"c.id_layanan" => $id
		);
		$this->db->select("c.id, c.id_layanan, c.nm_keg, c.lemb_keg, c.esti_keg, c.tgl_awal_keg, c.tgl_akhir_keg, c.id_provinsi, c.id_kabupaten, c.id_kecamatan, c.id_kelurahan")
				 ->from("dt_kegiatan c")
				 ->where($kondisi_c);
		$query_c = $this->db->get();

		$kondisi_d = array(
			"d.id_layanan" => $id
		);
		$this->db->select("d.id, d.id_layanan, d.narsum, d.tmp_lhr, d.tgl_lhr, d.jns_kelamin, d.no_paspor, d.negara_asl")
				 ->from("dt_penceramah d")
				 ->where($kondisi_d)
				 ->group_by("d.id");
		$query_d = $this->db->get();

		$kondisi_e = array(
			"e.id_layanan" => $id
		);
		$this->db->select("e.id, e.id_layanan, e.surat_permohonan_dalam, e.proposal_dalam, e.cv_crmh_dalam, e.pasp_crmh_dalam, e.ktp_dalam, e.pas_foto_crmh_dalam")
				 ->from("dt_layanan_dokumen e")
				 ->where($kondisi_e);
		$query_e = $this->db->get();

		$results = array();
		if($query_a->num_rows()){
			$results = array_merge($results, $query_a->result());
		}

		if($query_c->num_rows()){
			$results = array_merge($results, $query_c->result());
		}

		if($query_d->num_rows()){
			$results = array_merge($results, $query_d->result());
		}

		if($query_e->num_rows()){
			$results = array_merge($results, $query_e->result());
		}

		return $results;
	}

	function get_identitas()
	{
		$kondisi = array(
			"a.id" => $this->session->userdata("DX_user_id"),
			"a.occupation" => "Umum"
		);

		$query = $this->db->select("a.id, a.nik, a.tgl_lhr, a.fullname, a.email, a.telp")
			->from("sys_users a")
			->where($kondisi)->get()->row();
		return $query;
	}

	function get_id_dtlayanan()
	{
		$query = $this->db->select_max("a.id")
			->from("dt_layanan a")
			->limit(1)
			->get()->row();
		return $query;
	}

	function get_id_dtpenceramah()
	{
		$query = $this->db->select_max("a.id")
			->from("dt_penceramah a")
			->limit(1)
			->get()->row();
		return $query;
	}

	function get_idkegiatan()
	{
		$query = $this->db->select("a.id_layanan")
			->from("dt_kegiatan a")
			->limit(1)
			->get()->row();
		return $query;
	}

	function get_provinsi()
	{
		$kondisi = array(
			"a.is_actived" => 1
		);

		$query = $this->db->select("a.id_provinsi, a.nama")
			->from("mt_wil_provinsi a")
			->where($kondisi)->get()->result();
		return $query;
	}

	function get_kabupaten()
	{
		$kondisi = array(
			"a.is_actived" => 1
		);

		$query = $this->db->select("a.id_kabupaten, a.nama")
			->from("mt_wil_kabupaten a")
			->where($kondisi)->get()->result();
		return $query;
	}

	function get_kecamatan()
	{
		$kondisi = array(
			"a.is_actived" => 1
		);

		$query = $this->db->select("a.id_kecamatan, a.nama")
			->from("mt_wil_kecamatan a")
			->join("mt_wil_kabupaten b", "a.id_kabupaten = b.id_kabupaten")
			->where($kondisi)->get()->result();
		return $query;
	}

	function get_kelurahan()
	{
		$kondisi = array(
			"a.is_actived" => 1
		);

		$query = $this->db->select("a.id_kelurahan, a.nama")
			->from("mt_wil_kelurahan a")
			->join("mt_wil_kecamatan b","a.id_kecamatan = b.id_kecamatan")
			->where($kondisi)->get()->result();
		return $query;
	}

	function get_negara()
	{
		$query = $this->db->select("a.id, a.code, a.country")
			->from("mt_country a")
			->get()->result();
		return $query;
	}

	function get_layanan_binsyar()
	{
		$kondisi = array(
			"a.stat" => 1,
			"a.jenis_layanan" => 2
		);

		$query = $this->db->select("a.id, a.nama_layanan, a.jenis_layanan")
			->from("mt_layanan a")
			->where($kondisi)->get()->result();
		return $query;
	}

	function datauplod_binsyar()
	{
		$kondisi = array(
			"a.stat" => 1,
			"a.jenis_layanan" => 2
		);

		$query = $this->db->select("a.id, a.jenis_layanan, b.id")
			->from("mt_layanan a")
			->join("mt_direktorat b", "a.jenis_layanan = b.id")
			->where($kondisi)->get()->result();
		return $query;
	}

	function get_title()
	{
		$kondisi = array(
			"sys_menu.kode" => "SUB_BINSYAR"
		);

		$query = $this->db->select("sys_menu.id, sys_menu.url_link, sys_menu.kode, sys_menu.menu")
			->from("sys_menu")
			->where($kondisi)->get()->result();
		return $query;
	}

	function get_dtnegara()
	{
		$query = $this->db->select("a.id, a.code, a.country")
				->from("mt_country a")
				->get()
				->result();
		return $query;
	}

	function get_count_crmh()
	{
		$kondisi = array(
			"a.jenis_layanan" => 13,
			"a.id_user" => $this->session->userdata("DX_user_id")
		);

		$query = $this->db->select("count(b.id) as jumlah")
				->from("dt_layanan a")
				->join("dt_penceramah b", "a.id = b.id_layanan")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_last_crmh()
	{
		$kondisi = array(
			"a.jenis_layanan" => 13,
			"a.id_user" => $this->session->userdata("DX_user_id")
		);

		$query = $this->db->select("b.id, b.narsum")
				->from("dt_layanan a")
				->join("dt_penceramah b", "a.id = b.id_layanan")
				->where($kondisi)
				->group_by("b.id")
				->order_by("b.id_layanan", "DESC")
				->get()->result();
		return $query;
	}

	// Proses Insert Kegiatan ke DB
	function kirim_dataLayanan($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dataKegiatan($kegiatan)
	{
		$this->db->insert('dt_kegiatan', $kegiatan);
	}

	function kirim_dataPenceramah($data)
	{
		$this->db->insert_batch('dt_penceramah', $data);
	}

	function kirim_dataDokumen($dokumen)
	{
		$this->db->insert('dt_layanan_dokumen', $dokumen);
	}

	// Proses Update ke DB
	function save_tbl_kegiatan($data_kegiatan, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_kegiatan', $data_kegiatan);
	}

	function save_tbl_layananprop($data_layanan, $id_layanan)
	{
		$this->db->where('id', $id_layanan);
		$this->db->update('dt_layanan', $data_layanan);
	}

	function save_tbl_lampiran($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_layanan_dokumen', $data);
	}

	// Proses Insert Penceramah Keluar Negeri ke DB
	function kirim_dataLayanan_ekspor($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dataPenceramah_ekspor($data)
	{
		$this->db->insert_batch('dt_penceramah', $data);
	}

	function kirim_dataKegiatan_ekspor($kegiatan)
	{
		$this->db->insert('dt_kegiatan', $kegiatan);
	}

	function kirim_dataLampiran_ekspor($lampiran)
	{
		$this->db->insert('dt_layanan_dokumen', $lampiran);
	}

	// Proses Query Update ke DB
	function save_tbl_ekspor($data_kegiatan, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_kegiatan', $data_kegiatan);
	}

	function save_tbl_ekspor_lampiran($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_layanan_dokumen', $data);
	}

	// Proses Insert Penceramah Dari Luar Negeri ke DB
	function kirim_dataLayanan_impor($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dataPenceramah_impor($data)
	{
		$this->db->insert_batch('dt_penceramah', $data);
	}

	function kirim_dataKegiatan_impor($kegiatan)
	{
		$this->db->insert('dt_kegiatan', $kegiatan);
	}

	function kirim_dataLampiran_impor($lampiran)
	{
		$this->db->insert('dt_layanan_dokumen', $lampiran);
	}

	// Proses Update Penceramah Dari Luar Negeri ke DB
	function save_tbl_impor($data_kegiatan, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_kegiatan', $data_kegiatan);
	}

	function save_tbl_impor_lampiran($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_layanan_dokumen', $data);
	}

	// Proses insert Safari Dakwah
	function kirim_dataLayanan_safari($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dataPenceramah_safari($data)
	{
		$this->db->insert_batch('dt_penceramah', $data);
	}

	function kirim_dataKegiatan_safari($kegiatan)
	{
		$this->db->insert('dt_kegiatan', $kegiatan);
	}

	function kirim_dataLampiran_safari($lampiran)
	{
		$this->db->insert('dt_layanan_dokumen', $lampiran);
	}

	function kirim_dataPendidikan_safari($data)
	{
		$this->db->insert_batch('dt_pendidikan', $data);
	}
}

/* End of file Binsyar_m.php */
/* Location: ./application/modules/users/models/Binsyar_m.php */
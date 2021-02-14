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

	// Kumpulan Edit data Layanan Izin Kegiatan Keagamaan
	function get_edit_pemohon($id)
	{
		$kondisi = array(
			"a.id" => $this->session->userdata('DX_user_id'),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 1,
			"b.stat" => 1
		);
		$query = $this->db->select("b.id, b.id_user, b.id_stat, b.id_provinsi, b.id_kabupaten, b.id_kecamatan, b.id_kelurahan, b.jenis_layanan, a.nik, a.tgl_lhr, a.fullname, a.email, a.telp")
				->from("sys_users a")
				->join("dt_layanan b", "a.id = b.id_user")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_kegiatan($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.nm_keg, a.esti_keg, a.lemb_keg, a.tgl_awal_keg, a.tgl_akhir_keg, a.alamat_keg")
				->from("dt_kegiatan a")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_penceramah($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.narsum")
				->from("dt_penceramah a")
				->where($kondisi)
				->get()->result();
		return $query;
	}

	function get_edit_lampiran($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.ktp, a.proposal_keg, a.surat_permohonan_keg")
				->from("dt_layanan_dokumen a")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	// Kumpulan Edit data Layanan Izin Penceramah Keluar Negeri
	function get_edit_pemohon_ekspor($id)
	{
		$kondisi = array(
			"a.id" => $this->session->userdata('DX_user_id'),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 2,
			"b.stat" => 1
		);
		$query = $this->db->select("b.id, b.id_user, b.id_stat, b.id_provinsi, b.id_kabupaten, b.id_kecamatan, b.id_kelurahan, b.jenis_layanan, a.nik, a.tgl_lhr, a.fullname, a.email, a.telp, c.nama_layanan, d.nama_stat")
				->from("sys_users a")
				->join("dt_layanan b", "a.id = b.id_user")
				->join("mt_layanan c", "b.jenis_layanan = c.id")
				->join("mt_status_layanan d", "b.id_stat = d.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_kegiatan_ekspor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.nm_keg, a.esti_keg, a.lemb_keg, a.tgl_awal_keg, a.tgl_akhir_keg, a.alamat_keg, a.code_negara")
				->from("dt_kegiatan a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_crmharray_ekspor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.narsum")
				->from("dt_penceramah a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->result();
		return $query;
	}

	function get_edit_crmh_ekspor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);

		$query = $this->db->distinct()
		->select("a.tmp_lhr, a.tgl_lhr, a.jns_kelamin, a.no_paspor, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan, a.almt_penceramah, a.negara_asl")
				->from("dt_penceramah a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_lampiran_ekspor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);

		$query = $this->db->select("a.id, a.id_layanan, a.surat_permohonan_luar, a.proposal_luar, a.cv_crmh_luar, a.pasp_crmh_luar, a.pasp_pengundang_luar, a.pas_foto_crmh_luar")
				->from("dt_layanan_dokumen a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	// Kumpulan Edit data Layanan Izin Penceramah Dari luar Negeri
	function get_edit_pemohon_impor($id)
	{
		$kondisi = array(
			"a.id" => $this->session->userdata('DX_user_id'),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 3,
			"b.stat" => 1
		);
		$query = $this->db->select("b.id, b.id_user, b.id_stat, b.id_provinsi, b.id_kabupaten, b.id_kecamatan, b.id_kelurahan, b.jenis_layanan, a.nik, a.tgl_lhr, a.fullname, a.email, a.telp, c.nama_layanan, d.nama_stat")
				->from("sys_users a")
				->join("dt_layanan b", "a.id = b.id_user")
				->join("mt_layanan c", "b.jenis_layanan = c.id")
				->join("mt_status_layanan d", "b.id_stat = d.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_kegiatan_impor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.nm_keg, a.esti_keg, a.lemb_keg, a.tgl_awal_keg, a.tgl_akhir_keg, a.alamat_keg, a.code_negara, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan")
				->from("dt_kegiatan a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_crmharray_impor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);
		$query = $this->db->select("a.id, a.id_layanan, a.narsum")
				->from("dt_penceramah a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->result();
		return $query;
	}

	function get_edit_crmh_impor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);

		$query = $this->db->distinct()
		->select("a.tmp_lhr, a.tgl_lhr, a.jns_kelamin, a.no_paspor, a.negara_asl")
				->from("dt_penceramah a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_lampiran_impor($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id
		);

		$query = $this->db->select("a.id, a.id_layanan, a.surat_permohonan_dalam, a.proposal_dalam, a.cv_crmh_dalam, a.pasp_crmh_dalam, a.ktp_dalam, a.pas_foto_crmh_dalam")
				->from("dt_layanan_dokumen a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	// Cek Cek Lainnya
	function cek_gambar($id_layanan)
	{
		$kondisi = array(
			"a.id_layanan" => $id_layanan
		);

		$query = $this->db->from("dt_layanan_dokumen a")
				->where($kondisi)->get()->row();
		return $query;
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

	// Proses Insert Kegiatan Versi Lembaga
	function kirim_dataLayanan_lembaga($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dataKegiatan_lembaga($kegiatan)
	{
		$this->db->insert('dt_kegiatan', $kegiatan);
	}

	function kirim_dataPenceramah_lembaga($data)
	{
		$this->db->insert_batch('dt_penceramah', $data);
	}

	function kirim_dataDokumen_lembaga($dokumen)
	{
		$this->db->insert('dt_layanan_dokumen', $dokumen);
	}

	// Proses Update ke DB
	function save_tbl_kegiatan($data_kegiatan, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('dt_kegiatan', $data_kegiatan);
	}

	function save_tbl_layananprop($data_layanan, $id)
	{
		$this->db->where('id', $id);
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
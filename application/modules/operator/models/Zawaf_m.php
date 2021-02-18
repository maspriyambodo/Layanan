<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zawaf_m extends CI_Model {

	//------------------------------------------------------- Ambil Data Data Printilan
	function get_identitas()
	{
		$kondisi = array(
			"a.id" => $this->session->userdata("DX_user_id"),
			"a.occupation" => "Operator"
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

	function get_layanan_zawaf()
	{
		$kondisi = array(
			"a.stat" => 1,
			"a.jenis_layanan" => 4
		);

		$query = $this->db->select("a.id, a.nama_layanan, a.jenis_layanan")
			->from("mt_layanan a")
			->join("mt_direktorat b", "a.jenis_layanan = b.id")
			->where($kondisi)->get()->result();
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

	function cek_gambar($id_layanan)
	{
		$kondisi = array(
			"a.id_layanan" => $id_layanan
		);

		$query = $this->db->from("dt_layanan_dokumen a")
				->where($kondisi)->get()->row();
		return $query;
	}

	//------------------------------------------------------- Kumpulan Ambil Edit Data
	function get_edit_pemohon($id)
	{
		$kondisi = array(
			"a.id" => $this->session->userdata('DX_user_id'),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 6,
			"b.stat" => 1
		);
		$query = $this->db->select("b.id, b.id_user, b.id_stat, b.jenis_layanan, a.nik, a.tgl_lhr, a.fullname, a.email, a.telp, c.nama_stat, d.nama_layanan")
				->from("sys_users a")
				->join("dt_layanan b", "a.id = b.id_user")
				->join("mt_status_layanan c", "b.id_stat = c.id")
				->join("mt_layanan d", "b.jenis_layanan = d.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_instansi($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 6,
			"b.stat" => 1
		);
		$query = $this->db->select("a.id, a.id_layanan, a.nm_instansi, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan, a.almt_instansi, a.telp_instansi, a.email_instansi")
				->from("dt_instansi a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_lampiran($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 6,
			"b.stat" => 1
		);
		$query = $this->db->select("a.id, a.id_layanan, a.srt_prmhn_tertulis_lkspwu, a.agrn_dsr_lkspwu, a.sk_bdn_hkm_lkspwu, a.dmsl_ush_lkspwu, a.suket_keuangan_lkspwu, a.trm_ttpn_lkspwu, a.lprn_keuangan_lkspwu")
				->from("dt_layanan_dokumen a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_pemohon_laz($id)
	{
		$kondisi = array(
			"a.id" => $this->session->userdata('DX_user_id'),
			"b.id" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 4,
			"b.stat" => 1
		);
		$query = $this->db->select("b.id, b.id_user, b.id_stat, b.jenis_layanan, a.nik, a.tgl_lhr, a.fullname, a.email, a.telp, c.nama_stat, d.nama_layanan")
				->from("sys_users a")
				->join("dt_layanan b", "a.id = b.id_user")
				->join("mt_status_layanan c", "b.id_stat = c.id")
				->join("mt_layanan d", "b.jenis_layanan = d.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_instansi_laz($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 4,
			"b.stat" => 1
		);
		$query = $this->db->select("a.id, a.id_layanan, a.nm_instansi, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan, a.almt_instansi, a.telp_instansi, a.email_instansi")
				->from("dt_instansi a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	function get_edit_lampiran_laz($id)
	{
		$kondisi = array(
			"a.id_layanan" => $id,
			"b.id_user" => $this->session->userdata('DX_user_id'),
			"b.jenis_layanan" => 4,
			"b.stat" => 1
		);
		$query = $this->db->select("a.id, a.id_layanan, a.srt_prmhn_mntr_laz, a.rcmd_baznas_laz, a.agrn_dsr_laz, a.sk_bdn_hkm_laz, a.ssn_pngws_laz, a.srt_sbg_pngws_laz, a.dftr_pgw_laz, a.fc_kartubpjs_laz, a.srt_pgw_baznas_laz, a.srt_sediaaudit_laz, a.iktsr_prcn_laz")
				->from("dt_layanan_dokumen a")
				->join("dt_layanan b", "a.id_layanan = b.id")
				->where($kondisi)
				->get()->row();
		return $query;
	}

	//------------------------------------------------------- Kumpulan Kirim Insert Data Ke DB
	function kirim_editinstansi_lkspwu($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("dt_instansi", $data);
	}

	function kirim_editlampiran_lkspwu($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("dt_layanan_dokumen", $data);
	}

	function kirim_editinstansi_laz($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("dt_instansi", $data);
	}

	function kirim_editlampiran_laz($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("dt_layanan_dokumen", $data);
	}

	//------------------------------------------------------- Kumpulan Kirim Insert Data Ke DB
	function kirim_dt_layanan_lkspwu($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dt_instansi_lkspwu($instansi)
	{
		$this->db->insert('dt_instansi', $instansi);
	}

	function kirim_dt_lampiran_lkspwu($lampiran)
	{
		$this->db->insert('dt_layanan_dokumen', $lampiran);
	}

	function kirim_dt_layanan_laz($layanan)
	{
		$this->db->insert('dt_layanan', $layanan);
	}

	function kirim_dt_instansi_laz($instansi)
	{
		$this->db->insert('dt_instansi', $instansi);
	}

	function kirim_dt_lampiran_laz($lampiran)
	{
		$this->db->insert('dt_layanan_dokumen', $lampiran);
	}

}

/* End of file Zawaf_m.php */
/* Location: ./application/modules/users/models/Zawaf_m.php */
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

	function get_ids($id)
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

	// Proses Insert ke DB
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
	
}

/* End of file Binsyar_m.php */
/* Location: ./application/modules/users/models/Binsyar_m.php */
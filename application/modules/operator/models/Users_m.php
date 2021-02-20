<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

	//--------------------------------------- Kumpulan Data Printilan
	function get_role_user()
	{
		$kondisi = array(
			"a.id !=" => 1,
			"a.is_actived !=" => 0
		);

		$query = $this->db->select("a.id, a.name, a.description")
				->from("sys_roles a")
				->where($kondisi)
				->get()->result();
		return $query;
	}

	function get_lastid_user()
	{
		$query = $this->db->select_max("a.id")
			->from("sys_users a")
			->limit(1)
			->get()->row();
		return $query;
	}

	function get_provinsi()
	{
		$kondisi = array(
			"a.is_actived !=" => 0
		);

		$query = $this->db->select("a.id_provinsi, a.nama")
			->from("mt_wil_provinsi a")
			->get()->result();
		return $query;
	}

	function get_biodata_login()
	{
		$kondisi = array(
			"a.id" => $this->session->userdata('DX_user_id')
		);

		$query = $this->db->select("a.id, a.fullname")
			->from("sys_users a")
			->join("sys_roles b", "a.role_id = b.id")
			->where($kondisi)
			->get()->row();
		return $query;
	}

	function cek_roles_group($role_id)
	{
		$kondisi = array(
			"a.role_id" => $role_id,
			"a.role_id !=" => 6
		);

		$query = $this->db->select("a.role_id")
				->from("sys_users a")
				->where($kondisi)
				->limit(1)
				->get()->row();
		return $query;
	}

	function get_edit_user($id)
	{
		$kondisi = array(
			"a.role_id !=" => 0,
			"a.id" => $id
		);

		$query = $this->db->select("a.id, a.role_id, a.fullname, a.username, a.password, a.re_password, a.nik, a.tgl_lhr, b.name, b.description, a.alamat, a.email, a.telp, a.nama_kepala, a.nip_kepala, a.occupation, a.img_photo, a.id_provinsi, a.id_kabupaten, a.id_kecamatan, a.id_kelurahan")
				->from("sys_users a")
				->join("sys_roles b", "a.role_id = b.id")
				->where($kondisi)
				->get()->row();
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

	function cek_gambar($nik)
	{
		$kondisi = array(
			"a.nik" => $nik
		);

		$query = $this->db->from("sys_users a")
				->where($kondisi)->get()->row();
		return $query;
	}

	//--------------------------------------- Kiriman hasil inputan ke DB
	function kirim_user_kedb($data)
	{
		$this->db->insert("sys_users", $data);
	}

	function kirim_edituser($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('sys_users', $data);
	}

}

/* End of file Users_m.php */
/* Location: ./application/modules/operator/models/Users_m.php */
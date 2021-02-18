<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Binsyar_m extends CI_Model
{
	function get_formulir()
	{
		$kondisi = array(
			"a.jenis_layanan" => 2,
			"b.stat" => 1
		);

		$query = $this->db->select("a.id, concat(LPAD(b.id, 2, 0),'.',LPAD(a.id, 2, 0),'.',LPAD(MONTH(NOW()), 2, 0),'.',YEAR(NOW())) as kode, a.nama_layanan, b.nama, b.keterangan,
				case
				when a.stat = 1 then 'Aktif'
				when a.stat = 2 then 'Non Aktif' end as status,
				count(c.id) as jumlah
				")
				->from("mt_layanan a")
				->join("mt_direktorat b", "a.jenis_layanan = b.id", "LEFT")
				->join("dt_layanan c", "c.jenis_layanan = a.id", "LEFT")
				->where($kondisi)
				->group_by("a.id")
				->get();
		return $query;
	}

	function get_idlayanan()
	{
		$query = $this->db->select_max("a.id")
				->from("dt_layanan a")
				->get();
		return $query;
	}

	function get_permohonan($id)
	{
		$kondisi = array(
			"b.jenis_layanan" => 2,
			"c.role_id" => 6,
			"a.stat" => 1,
			"a.id" => $id
		);

		$query = $this->db->select("a.id, b.nama_layanan, d.nm_keg")
				->from("dt_layanan a")
				->join("mt_layanan b", "a.jenis_layanan = b.id")
				->join("sys_users c", "a.id_user = c.id")
				->join("dt_kegiatan d", "a.id = d.id_layanan")
				->where($kondisi)
				->get()->result();
		return $query;
	}

	function get_binsyar()
	{
		$kondisi = array(
			"c.id" => 2,
			"b.jenis_layanan" => 2,
			"d.role_id" => 6,
			"a.stat" => 1
		);

		$query = $this->db->select("a.id, d.fullname, d.nik, b.nama_layanan, e.nm_keg, e.tgl_awal_keg, e.esti_keg, count(f.id) as jumlah")
				->from("dt_layanan a")
				->join("mt_layanan b", "a.jenis_layanan = b.id")
				->join("mt_direktorat c", "b.jenis_layanan = c.id")
				->join("sys_users d", "a.id_user = d.id")
				->join("dt_kegiatan e", "a.id = e.id_layanan")
				->join("dt_penceramah f", "a.id = f.id_layanan")
				->join("sys_roles g", "d.role_id = g.id")
				->where($kondisi)
				->group_by("a.id")
				->get();
		return $query;
	}
}

/* End of file Binsyar_m.php */
/* Location: ./application/modules/users/models/Binsyar_m.php */
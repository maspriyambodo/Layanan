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

}

/* End of file Binsyar_m.php */
/* Location: ./application/modules/users/models/Binsyar_m.php */
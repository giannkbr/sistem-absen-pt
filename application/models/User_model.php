<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	function absendaily($id, $tahun, $bulan, $hari)
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->where('nip', $id);
		$this->db->where('year(waktu)', $tahun);
		$this->db->where('month(waktu)', $bulan);
		$this->db->where('day(waktu)', $hari);
		return $this->db->get();
	}
	
	// function absenid($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('absen');
	// 	$this->db->where('absen.id_absen', $id);
	// 	return $this->db->get()->result();
	// }

	public function getDetailAbsen($id)
	{
		return $this->db->get_where('absen', ['id_absen' => $id])->row_array();
	}

}

/* End of file ModelName.php */

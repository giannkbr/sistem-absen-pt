<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	function absendaily($id, $tgl)
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->where('nip', $id);
		$this->db->where('waktu', $tgl);
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

	public function cek_kehadiran($nip, $tgl)
	{
		$query_str =

			$this->db->where('nip', $nip)
			->where('waktu', $tgl)->get('absen');
		if ($query_str->num_rows() > 0) {
			return $query_str->row();
		} else {
			return false;
		}
	}

}

/* End of file ModelName.php */

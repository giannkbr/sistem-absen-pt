<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_model extends CI_Model
{

	public function absendata()
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('users', 'absen.nip = users.nip');
		$this->db->order_by('absen.waktu', 'desc');
		return $this->db->get();
	}
}

/* End of file ModelName.php */

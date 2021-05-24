<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function getDetailjabatan($id)
	{
		return $this->db->get_where('jabatan', ['jabatan_id' => $id])->row_array();
	}

	public function insertJabatan($data)
	{
		$this->db->insert('jabatan', $data);
	}

	public function editJabatan($id, $data)
	{
		$this->db->update('jabatan', $data, ['jabatan_id' => $id]);
		return $this->db->affected_rows();
	}
}

/* End of file ModelName.php */

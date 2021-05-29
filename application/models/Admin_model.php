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

	public function insertKaryawan($data)
	{
		$this->db->insert('users', $data);
	}

	function karyawan()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('jabatan', 'users.jabatan_id = jabatan.jabatan_id');
		return $this->db->get();
	}

	public function editKaryawan($id, $data)
	{
		$this->db->update('users', $data, ['nip' => $id]);
		return $this->db->affected_rows();
	}

	function usersid($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('jabatan', 'users.jabatan_id = jabatan.jabatan_id');
		$this->db->where('users.nip', $id);
		return $this->db->get();
	}

	public function cuti()
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('users', 'cuti.nip = users.nip');
		$this->db->order_by('cuti.id_cuti', 'desc');
		return $this->db->get();
	}

	public function cuti_karyawan($id)
	{
		$this->db->select('*');
		$this->db->from('cuti');
		$this->db->join('users', 'cuti.nip = users.nip');
		$this->db->where('users.nip', $id);
		$this->db->order_by('cuti.id_cuti', 'desc');
		return $this->db->get();
	}
}

/* End of file ModelName.php */

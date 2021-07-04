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

	public function printabsensi($id)
	{
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->where('absen.id_absen', $id);
		return $this->db->get()->result();
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

	public function overtime()
	{
		$this->db->select('*');
		$this->db->from('overtime');
		$this->db->join('users', 'overtime.nip = users.nip');
		$this->db->order_by('overtime.id_overtime', 'desc');
		return $this->db->get();
	}

	public function overtime_karyawan($id)
	{
		$this->db->select('*');
		$this->db->from('overtime');
		$this->db->join('users', 'overtime.nip = users.nip');
		$this->db->where('users.nip', $id);
		$this->db->order_by('overtime.id_overtime', 'desc');
		return $this->db->get();
	}

	public function karyawanId($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.nip', $id);
		return $this->db->get()->result();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('nip', 'desc');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->row_array();
		}
		$query->free_result();
	}
}

/* End of file ModelName.php */

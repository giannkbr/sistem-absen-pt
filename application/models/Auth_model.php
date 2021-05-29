<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function checkEmail()
	{
		return $this->db->get_where('users', ['email' => $this->input->post('email')])->row_array();
	}

	public function updatePassword($data)
	{
		$this->db->update('users', $data, ['id_users' => 1]);
		return $this->db->affected_rows();
	}
}

/* End of file ModelName.php */

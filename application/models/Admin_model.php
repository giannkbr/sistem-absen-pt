<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function insertJabatan($data)
	{
		$this->db->insert('jabatan', $data);
	}
}

/* End of file ModelName.php */

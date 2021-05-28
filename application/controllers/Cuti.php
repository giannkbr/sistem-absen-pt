<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('admin_model', 'admin');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Cuti',
			'page' => 'admin/cuti/datacuti',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Cuti',
			'data' => $this->admin->cuti()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function cuti_terima($id)
	{
		$this->db->update('cuti', ['status' => 'diterima'], ['id_cuti' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menerima pengajuan cuti", "success");');
		redirect('data-cuti');
	}
	public function cuti_tolak($id)
	{
		$this->db->update('cuti', ['status' => 'ditolak'], ['id_cuti' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menolak pengajuan cuti", "success");');
		redirect('data-cuti');
	}
}

/* End of file Cuti.php */

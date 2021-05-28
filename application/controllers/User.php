<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		date_default_timezone_set('asia/jakarta');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$tahun 			= date('Y');
		$bulan 			= date('m');
		$hari 			= date('d');
		$absen			= $this->user->absendaily($this->session->userdata('nip'), $tahun, $bulan, $hari);
		if ($absen->num_rows() == 0) {
			$data['waktu'] = 'masuk';
		} elseif ($absen->num_rows() == 1) {
			$data['waktu'] = 'pulang';
		} else {
			$data['waktu'] = 'dilarang';
		}

		$data = [
			'title' => 'Dashboard',
			'page' => 'admin/dashboard/user',
			'subtitle' => 'Dashboard',
			'subtitle2' => 'User'
		];

		$this->load->view('templates/app', $data);
	}

	public function proses_absen()
	{
		$id = $this->session->userdata('nip');
		$p = $this->input->post();
		$data = [
			'nip'	=> $id,
			'keterangan' => $p['ket']
		];
		$this->db->insert('absen', $data);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Melakukan absen", "success");');
		redirect('user');
	}
}

/* End of file User.php */

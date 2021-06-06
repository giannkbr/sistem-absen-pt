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
		$data = [
			'title' => 'Dashboard',
			'page' => 'user/index',
			'subtitle' => 'Dashboard',
			'subtitle2' => 'User',
			'users' => $this->db->get('users')->result(),
		];

		if ($absen->num_rows() == 0) {
			$data['waktu'] = 'masuk';
		} elseif ($absen->num_rows() == 1) {
			$data['waktu'] = 'pulang';
		} else {
			$data['waktu'] = 'dilarang';
		}

		$this->load->view('templates/app', $data);
	}

	public function proses_absen()
	{
		$id = $this->session->userdata('nip');
		$p = $this->input->post();
		$tahun 			= date('Y');
		$bulan 			= date('m');
		$hari 			= date('d');
		$absen			= $this->user->absendaily($this->session->userdata('nip'), $tahun, $bulan, $hari);
		if ($absen->num_rows() == 0) {
			$data = [
				'nip'	=> $id,
				'keterangan' => $p['ket'],
				'keterangan_kerja' => $p['keterangan_kerja'],
				'maps_absen' => htmlspecialchars($this->input->post('maps_absen', true)),
				'deskripsi' => $p['deskripsi'],
			];
			$this->db->insert('absen', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Melakukan absen", "success");');
			redirect('user');
		} elseif ($absen->num_rows() == 1) {
			$data = [
				'nip'	=> $id,
				'keterangan' => $p['ket'],
				'keterangan_kerja' => $p['keterangan_kerja'],
				'maps_absen' => htmlspecialchars($this->input->post('maps_absen', true)),
				'deskripsi' => $p['deskripsi'],
				'deskripsi' => $p['deskripsi'],
			];
			$this->db->insert('absen', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Melakukan absen", "success");');
			redirect('user');
		}
	}
}

/* End of file User.php */

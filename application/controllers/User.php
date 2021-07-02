<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('User_model', 'user');
	}

	public function index()
	{
		$tgl = date('Y-m-d');
		$absen			= $this->user->absendaily($this->session->userdata('nip'), $tgl);
		$absen1			= $this->user->absendaily($this->session->userdata('nip'), $tgl)->row();
		$data = [
			'title' => 'Dashboard',
			'page' => 'user/index',
			'subtitle' => 'Dashboard',
			'subtitle2' => 'User',
			'users' => $this->db->get('users')->result(),
		];

		if ($absen->num_rows() == 0) {
			$data['waktu'] = 'masuk';
		} elseif ($absen1->keterangan == 'masuk') {
			$data['waktu'] = 'pulang';
		} elseif($absen1->keterangan == 'pulang') {
			$data['waktu'] = 'dilarang';
		}

		$this->load->view('templates/app', $data);
	}

	public function proses_absen()
	{
		$id = $this->session->userdata('nip');
		$nama = $this->session->userdata('nama');
		$p = $this->input->post();
		$tgl = date('Y-m-d');
		$tahun 			= date('Y');
		$bulan 			= date('m');
		$hari 			= date('d');
		$absen			= $this->user->absendaily($this->session->userdata('nip'), $tgl);
		if ($absen->num_rows() == 0) {
			$data = [
				'nip'	=> $id,
				'nama' => $nama,
				'waktu' => $tgl,
				'keterangan' => $p['ket'],
				'jam_masuk' => date('G:i:s'),
				'keterangan_kerja' => $p['keterangan_kerja'],
				'maps_absen' => $p['location_maps']
			];
			$this->db->insert('absen', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Melakukan absen masuk", "success");');
			redirect('user');
		} elseif ($absen->num_rows() == 1) {
			$data = [
				'nip'	=> $id,
				'keterangan' => $p['ket'],
				'jam_pulang' => date('G:i:s'),
				'deskripsi' => $p['deskripsi'],
			];
			
			$this->db->where('nip', $id);
			$this->db->where('waktu',$tgl);
			$this->db->update('absen', $data); // hrse ambil id_absen

			$this->session->set_flashdata('message', 'swal("Berhasil!", "Melakukan absen pulang", "success");');
			redirect('user');
		}
	}
}

/* End of file User.php */

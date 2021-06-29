<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Absen extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Absen_model', 'absen');
		$this->load->model('Admin_model', 'admin');
		is_login();
	}

	public function index()
	{
		$data = [
			'title' => 'Data Absensi',
			'page' => 'admin/absensi/dataabsensi',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Absensi',
			'bulan' => date('m'),
			'tahun' => date('Y'),
			'data' => $this->absen->absendata()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}
	public function rekapabsensifilter()
	{
		$date = $this->input->post('date');

		$data = [
			'title' => 'Data Absensi',
			'page' => 'admin/absensi/dataabsensi',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Absensi',
			'bulan' => date_format(date_create($date), 'm'),
			'tahun' => date_format(date_create($date), 'Y'),
			'data' => $this->absen->absendata()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function editabsensi($id)
	{
		$this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required', [
			'required' => 'Harap isi kolom Jam Masuk',
		]);

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit Data Absensi',
				'page' => 'admin/absensi/editabsensi',
				'subtitle' => 'Admin',
				'subtitle2' => 'Edit Data Absensi',
				'data' => $this->admin->absenid($id)->row()
			];

			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'nama' => $this->input->post('nama'),
				'jam_masuk' => $this->input->post('jam_masuk'),
				// 'keterangan_kerja' => $this->input->post('keterangan_kerja'),
				'jam_pulang' => $this->input->post('jam_pulang'),
				'deskripsi' => $this->input->post('deskripsi'),
			];

			$this->admin->editabsen($id, $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Absen Berhasil Diedit!", "success");');

			redirect('data-absensi');
		}
	}

	public function getAbsenId($id)
	{
		$data = [
			'title' => 'Data Absensi',
			'page' => 'user/absensi/dataabsensi',
			'subtitle' => 'User',
			'subtitle2' => 'Data Absensi',
			'data' => $this->absen->getAbsenById($id)
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function rekapabsensi()
	{

		$data = [
			'title' => 'Data Rekap Absensi',
			'page' => 'admin/absensi/rekapabsensi',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Rekap',
			'bulan' => date('m'),
			'tahun' => date('Y'),
			'data' => $this->admin->mahasiswa()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function laporanfilter()
	{
		$date = $this->input->post('date');

		$data = [
			'title' => 'Data Rekap Absensi',
			'page' => 'admin/absensi/rekapabsensi',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Rekap',
			'bulan' => date_format(date_create($date), 'm'),
			'tahun' => date_format(date_create($date), 'Y'),
			'data' => $this->admin->mahasiswa()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function printabsensi($id)
	{
		$data = [
			'title' => 'Data Absensi',
			'data' => $this->absen->printabsensi($id)
		];

		$this->load->view('admin/absensi/printabsensi', $data, FALSE);
	}
}

/* End of file Absen.php */

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('absen_model', 'absen');
		$this->load->model('admin_model', 'admin');
	}

	public function index()
	{

		$data = [
			'title' => 'Data Rekap Absensi',
			'page' => 'admin/laporan/rekapabsensi',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Rekap',
			'bulan' => date('m'),
			'tahun' => date('Y'),
			'data' => $this->admin->karyawan()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function laporanfilter()
	{
		$date = $this->input->post('date');

		$data = [
			'title' => 'Data Rekap Absensi',
			'page' => 'admin/laporan/rekapabsensi',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Rekap',
			'bulan' => date_format(date_create($date), 'm'),
			'tahun' => date_format(date_create($date), 'Y'),
			'data' => $this->admin->karyawan()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}
}

/* End of file Laporan.php */

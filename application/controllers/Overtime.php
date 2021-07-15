<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Overtime extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('admin_model', 'admin');
	}

	public function index()
	{
		$data = [
			'title' => 'Data Rekap Overtime',
			'page' => 'admin/overtime/dataovertimekaryawan',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Daryawan',
			'data' => $this->admin->karyawan()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function dataovertime()
	{
		$data = [
			'title' => 'Data Overtime',
			'page' => 'admin/overtime/dataovertime',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Overtime',
			'data' => $this->admin->overtime()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function overtime_terima($id)
	{
		$this->db->update('overtime', ['status' => 'diterima'], ['id_overtime' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menerima pengajuan overtime", "success");');
		redirect('data-overtime');
	}
	public function overtime_tolak($id)
	{
		$this->db->update('overtime', ['status' => 'ditolak'], ['id_overtime' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Menolak pengajuan overtime", "success");');
		redirect('data-overtime');
	}

	// Master overtime Karyawan
	public function overtime_karyawan()
	{
		$users = $this->admin->usersid($this->session->userdata('nip'))->row();
		$dt1 = new DateTime($users->waktu_masuk);
		$dt2 = new DateTime(date('Y-m-d'));
		$d = $dt2->diff($dt1)->days + 1;
		$data = [
			'title' => 'Data Overtime',
			'bakti' => $d,
			'page' => 'user/overtime/dataovertimekaryawan',
			'subtitle' => 'Karyawan',
			'subtitle2' => 'Data Permohonan overtime',
			'data' => $this->admin->overtime_karyawan($this->session->userdata('nip'))->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function overtime_add()
	{
		$users = $this->admin->usersid($this->session->userdata('nip'))->row();
		$dt1 = new DateTime($users->waktu_masuk);
		$dt2 = new DateTime(date('Y-m-d'));
		$d = $dt2->diff($dt1)->days + 1;
		$data = [
			'title' => 'Data Overtime',
			'bakti' => $d,
			'page' => 'user/overtime/adddataovertimekaryawan',
			'subtitle' => 'Karyawan',
			'subtitle2' => 'Data Permohonan overtime',
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function overtime_simpan()
	{
		$this->db->trans_start();
		$tgl1 = $this->input->post('mulai');
		$data = array(
			'nip'			=> $this->session->userdata('nip'),
			'mulai'			=> $this->input->post('mulai'),
			'selesai'			=> $this->input->post('selesai'),
			'status'		=> 'diajukan',
			'waktu_pengajuan' => date('Y-m-d', strtotime($tgl1))
		);
		if (isset($_FILES['bukti']['name'])) {
			$config['upload_path'] 		= './images/overtime/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['overwrite']  		= true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti')) {
				$this->session->set_flashdata('message', 'swal("Ops!", "Bukti gagal diupload", "error");');
				redirect('overtime/overtime_add');
			} else {
				$img = $this->upload->data();
				$data['bukti'] = $img['file_name'];
			}
		}
		$this->db->insert('overtime', $data);
		// $cek = $this->db->query(" select * from overtime order by id_overtime desc limit 1 ")->row();
		// $dt1 = new DateTime($this->input->post('mulai'));
		// $dt2 = new DateTime($this->input->post('akhir'));
		// $jml = $dt2->diff($dt1)->days + 1;
		// $tgl1 = $this->input->post('mulai');
		// $no  = 1;
		// for ($i = 0; $i < $jml; $i++) {
		// 	$insert = array(
		// 		'id_overtime' => $cek->id_overtime,
		// 		'tanggal' => date('Y-m-d', strtotime('+' . $i . ' days', strtotime($tgl1))),
		// 	);
		// 	$this->db->insert('detailovertime', $insert);
		// }

		$this->db->trans_complete();
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Pengajuan overtime", "success");');
		redirect('data-overtime-karyawan');
	}


	public function overtime_delete($id)
	{
		$this->db->delete('overtime', ['id_overtime' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Overtime Berhasil Dihapus!", "success");');
		redirect(base_url('data-overtime'));
	}
}

/* End of file overtime.php */

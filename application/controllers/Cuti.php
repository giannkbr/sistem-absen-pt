<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cuti extends CI_Controller
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
			'title' => 'Data Rekap Cuti',
			'page' => 'admin/cuti/datacutikaryawan',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Daryawan',
			'data' => $this->admin->karyawan()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function datacuti()
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

	// Master Cuti Karyawan
	public function cuti_karyawan()
	{
		$users = $this->admin->usersid($this->session->userdata('nip'))->row();
		$dt1 = new DateTime($users->waktu_masuk);
		$dt2 = new DateTime(date('Y-m-d'));
		$d = $dt2->diff($dt1)->days + 1;
		$data = [
			'title' => 'Data Cuti',
			'bakti' => $d,
			'page' => 'user/cuti/datacutikaryawan',
			'subtitle' => 'Karyawan',
			'subtitle2' => 'Data Permohonan Cuti',
			'data' => $this->admin->cuti_karyawan($this->session->userdata('nip'))->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function cuti_add()
	{
		$users = $this->admin->usersid($this->session->userdata('nip'))->row();
		$dt1 = new DateTime($users->waktu_masuk);
		$dt2 = new DateTime(date('Y-m-d'));
		$d = $dt2->diff($dt1)->days + 1;
		$data = [
			'title' => 'Data Cuti',
			'bakti' => $d,
			'page' => 'user/cuti/adddatacutikaryawan',
			'subtitle' => 'Karyawan',
			'subtitle2' => 'Data Permohonan Cuti',
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function cuti_simpan()
	{
		$this->db->trans_start();
		$tgl1 = $this->input->post('mulai');
		$data = array(
			'nip'			=> $this->session->userdata('nip'),
			'jenis_cuti'	=> $this->input->post('jenis'),
			'alasan'		=> $this->input->post('alasan'),
			'status'		=> 'diajukan',
			'waktu_pengajuan' => date('Y-m-d', strtotime($tgl1))
		);
		if (isset($_FILES['bukti']['name'])) {
			$config['upload_path'] 		= './images/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['overwrite']  		= true;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('bukti')) {
				$this->session->set_flashdata('message', 'swal("Ops!", "Bukti gagal diupload", "error");');
				redirect('cuti/cuti_add');
			} else {
				$img = $this->upload->data();
				$data['bukti'] = $img['file_name'];
			}
		}
		$this->db->insert('cuti', $data);
		// $cek = $this->db->query(" select * from cuti order by id_cuti desc limit 1 ")->row();
		// $dt1 = new DateTime($this->input->post('mulai'));
		// $dt2 = new DateTime($this->input->post('akhir'));
		// $jml = $dt2->diff($dt1)->days + 1;
		
		// $no  = 1;
		// for ($i = 0; $i < $jml; $i++) {
		// 	$insert = array(
		// 		'id_cuti' => $cek->id_cuti,
				
		// 	);
		// 	$this->db->insert('cuti', $insert);
		// }

		$this->db->trans_complete();
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Pengajuan cuti", "success");');
		redirect('data-cuti-karyawan');
	}

	public function delete_cuti($id)
	{
		$this->db->delete('cuti', ['id_cuti' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Cuti Berhasil Dihapus!", "success");');
		redirect(base_url('data-cuti'));
	}
}

/* End of file Cuti.php */

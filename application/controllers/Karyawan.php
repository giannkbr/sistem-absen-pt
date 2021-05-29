<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		$this->load->model('admin_model', 'admin');
	}

	public function jabatan()
	{
		$data = [
			'title' => 'Data Jabatan',
			'page' => 'admin/jabatan/datajabatan',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Jabatan',
			'data' => $this->db->get('jabatan')->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}


	public function addjabatan()
	{

		$this->form_validation->set_rules('jabatan_nama', 'Nama Jabatan', 'required|trim', [
			'required' => 'Nama Jabatan tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Jabatan',
				'page' => 'admin/jabatan/addjabatan',
				'subtitle' => 'Admin',
				'subtitle2' => 'Tambah Data Jabatan'
			];
			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'jabatan_nama' 	=> $this->input->post('jabatan_nama'),
			];
			// var_dump($data);
			$this->admin->insertJabatan($data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Jabatan Berhasil Ditambahkan!", "success");');

			redirect(base_url('data-jabatan'));
		}
	}


	public function deletejabatan($id)
	{
		$this->db->delete('jabatan', ['jabatan_id' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Jabatan Berhasil Dihapus!", "success");');
		redirect(base_url('data-jabatan'));
	}

	public function editjabatan($id)
	{
		$this->form_validation->set_rules('jabatan_nama', 'Nama Jabatan', 'required|trim', [
			'required' => 'Nama Jabatan tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Jabatan',
				'page' => 'admin/jabatan/editjabatan',
				'subtitle' => 'Admin',
				'subtitle2' => 'Edit Data Jabatan',
				'jabatan' => $this->admin->getDetailJabatan($id)
			];
			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'jabatan_nama' 	=> $this->input->post('jabatan_nama'),
				'jabatan_id' => $this->input->post('jabatan_id')
			];

			$this->admin->editJabatan($id, $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Jabatan Berhasil Diedit!", "success");');
			redirect(base_url('data-jabatan'));
		}
	}


	public function index()
	{
		$data = [
			'title' => 'Data Karyawan',
			'page' => 'admin/karyawan/datakaryawan',
			'subtitle' => 'Admin',
			'subtitle2' => 'Data Daryawan',
			'data' => $this->admin->karyawan()->result()
		];

		$this->load->view('templates/app', $data, FALSE);
	}

	public function addkaryawan()
	{

		$this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
			'required' => 'Nomer Induk Pegawai tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required|trim', [
			'required' => 'Nama Karyawan tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
			'required' => 'Role tidak boleh kosong.'
		]);

		// $this->form_validation->set_rules('photo', 'Photo', 'required|trim', [
		// 	'required' => 'Photo tidak boleh kosong.'
		// ]);

		$this->form_validation->set_rules('waktu', 'Waktu Masuk', 'required|trim', [
			'required' => 'Waktu Masuk tidak boleh kosong.'
		]);

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Tambah Data Karyawan',
				'page' => 'admin/karyawan/addkaryawan',
				'subtitle' => 'Admin',
				'subtitle2' => 'Tambah Data Karyawan',
				'jabatan' => $this->db->get('jabatan')->result()
			];
			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post("password")),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'role_id' => $this->input->post('role_id'),
				'jabatan_id' => $this->input->post('jabatan'),
				'waktu_masuk' => $this->input->post('waktu')
			];

			if (isset($_FILES['photo']['name'])) {
				$config['upload_path'] 		= './images/users/';
				$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
				$config['overwrite']  		= true;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('photo')) {
					$this->session->set_flashdata('message', 'swal("Ops!", "photo gagal diupload", "error");');
					redirect('cuti/cuti_add');
				} else {
					$img = $this->upload->data();
					$data['photo'] = $img['file_name'];
				}
			}

			$this->db->insert('users', $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Karyawan Berhasil Ditambahkan!", "success");');

			redirect(base_url('data-karyawan'));
		}
	}

	public function deletekaryawan($id)
	{
		$this->db->delete('users', ['users_id' => $id]);
		$this->session->set_flashdata('message', 'swal("Berhasil!", "Data karyawan Berhasil Dihapus!", "success");');
		redirect(base_url('data-karyawan'));
	}

	public function editkaryawan($id)
	{

		$this->form_validation->set_rules('nip', 'NIP', 'required|trim', [
			'required' => 'Nomer Induk Pegawai tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('nama', 'Nama Karyawan', 'required|trim', [
			'required' => 'Nama Karyawan tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('email', 'Email', 'required|trim', [
			'required' => 'Email tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', [
			'required' => 'Jabatan tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim', [
			'required' => 'Jenis Kelamin tidak boleh kosong.'
		]);

		$this->form_validation->set_rules('role_id', 'Role', 'required|trim', [
			'required' => 'Role tidak boleh kosong.'
		]);


		if ($this->form_validation->run() == FALSE) {
			$data = [
				'title' => 'Edit Data Karyawan',
				'page' => 'admin/karyawan/editkaryawan',
				'subtitle' => 'Admin',
				'subtitle2' => 'Edit Data Karyawan',
				'data' => $this->db->get('jabatan')->result(),
				'detail' => $this->admin->usersid($id)->row()
			];
			$this->load->view('templates/app', $data);
		} else {
			$data = [
				'nip' => $this->input->post('nip'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'role_id' => $this->input->post('role_id'),
				'jabatan_id' => $this->input->post('jabatan')
			];

			$this->admin->editkaryawan($id, $data);
			$this->session->set_flashdata('message', 'swal("Berhasil!", "Data Karyawan Berhasil Ditambahkan!", "success");');

			redirect(base_url('data-karyawan'));
		}
	}
}

/* End of file Karyawan.php */

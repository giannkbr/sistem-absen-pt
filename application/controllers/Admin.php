<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		is_admin();
		// $this->load->model('admin_model', 'admin');
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',
			'page' => 'admin/dashboard/index',
			'subtitle' => 'Dashboard',
			'subtitle2' => 'Index'
		];

		$this->load->view('templates/app', $data);
	}
}

/* End of file Admin.php */

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function index()
	{
		$pegawai = $this->db->get_where('pegawai', ['jabatan' => 'Staff It'])->num_rows();
		$admin = $this->db->get_where('pegawai', ['jabatan' => 'Admin'])->num_rows();
		$data = [
			'pegawai' => $pegawai,
			'admin' => $admin
		];
		$data['title'] = 'Dashboard';
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('themeplates/footer');
	}


}
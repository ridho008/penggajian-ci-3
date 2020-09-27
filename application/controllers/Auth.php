<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Login';
		$this->cekLogin();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('auth/login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username', true);
		$password = sha1($this->input->post('password', true));

		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		if($user != null) {
			if($password == $user['password']) {
				$data = [
					'id_user' => $user['id_user'],
					'username' => $user['username'],
					'role' => $user['role']
				];
				$this->session->set_userdata($data);
				if($user['role'] == 1) {
					redirect('admin/dashboard');
				} else {
					redirect('pegawai/dashboard');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-circle"></i> Password Salah!.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-circle"></i> Akun Belum Terdaftar.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-success"></i> Anda Berhasil Logout.</div>');
		redirect('auth');
	}

	public function cekLogin()
	{
		if($this->session->userdata('role') == 1) {
			redirect('admin/dashboard');
		} else if($this->session->userdata('role') == 2) {
			redirect('pegawai/dashboard');
		}
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

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

		$user = $this->Auth_model->getAuthUserPegawai($username)->row_array();
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
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Anda Berhasil Logout.</div>');
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

	public function ganti_password()
	{
		$data['title'] = 'Ubah Password';
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('auth/ganti_password', $data);
		} else {
			$passwordLama = $this->input->post('password_lama', true);
			$passwordBaru = $this->input->post('password1', true);
			$konfirmasiPassword = $this->input->post('password2', true);

			if(sha1($passwordLama) !== $data['user']['password']) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-danger"></i> Password Lama Salah!.</div>');
				redirect('auth/ganti_password');
			} else {
				if($passwordLama === $passwordBaru) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-danger"></i> Password Lama Sama Dengan Yang Baru! Coba Password Lain.</div>');
					redirect('auth/ganti_password');
				} else {
					$passwordHash = sha1($passwordBaru);

					$this->db->set('password', $passwordHash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="fa fa-bell" aria-hidden="true"></i> Password Berhasil Di Ganti.</div>');
					redirect('auth/ganti_password');
				}
			}
		}
	}

	public function profile()
	{
		$this->load->model('Auth_model');
		$data['title'] = 'User Profile';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->load->view('auth/profile', $data);
	}

}
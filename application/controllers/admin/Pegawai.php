<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pegawai_model');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['title'] = 'Pegawai';
		$data['pegawai'] = $this->Pegawai_model->getAllPegawai();
		$data['jabatan'] = $this->db->get('jabatan')->result_array();
		$data['users'] = $this->db->get('user')->result_array();
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|min_length[9]|is_unique[pegawai.nik]');
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim');
		$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/pegawai/index', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Pegawai_model->tambahDataPegawai();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/pegawai');
		}
	}

	public function getpegawai()
	{
		echo json_encode($this->Pegawai_model->getPegawaiById($_POST['id']));
	}

	public function ubahpegawai()
	{
		$this->Pegawai_model->editPegawai($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/pegawai');
	}

	public function hapus($id)
	{
		$result = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
		$rowPhoto = $result['photo'];
		unlink('assets/img/user/' . $rowPhoto);
		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/pegawai');
	}

	public function tambahUser()
	{
		$data['title'] = 'Tambah Data User';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/pegawai/tambah_user', $data);
			$this->load->view('themeplates/footer');
		} else {
			$data = [
				'username' => html_escape($this->input->post('username', true)),
				'password' => sha1($this->input->post('password', true)),
				'role' => 2
			];

			$this->Pegawai_model->tambahDataUser($data);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data User <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/pegawai');
		}
		
	}


}
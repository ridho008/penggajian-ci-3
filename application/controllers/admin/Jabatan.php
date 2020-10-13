<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jabatan_model');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['title'] = 'Jabatan';
		$data['jabatan'] = $this->Jabatan_model->getAllJabatan();
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->form_validation->set_rules('jabatan', 'Nama Jabatan', 'required|trim');
		$this->form_validation->set_rules('uang_makan', 'Uang Makan', 'required|trim');
		$this->form_validation->set_rules('tj_transport', 'Tunjangan Transport', 'required|trim');
		$this->form_validation->set_rules('gapok', 'Gaji Pokok', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/jabatan/index', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Jabatan_model->tambahDataJabatan();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Jurusan <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/jabatan');
		}
	}

	public function getjabatan()
	{
		echo json_encode($this->Jabatan_model->getJabatanById($_POST['id']));
	}

	public function ubahjabatan()
	{
		$this->Jabatan_model->editJabatan($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Jurusan <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/jabatan');
	}

	public function hapus($id)
	{
		$this->db->delete('jabatan', ['id_jabatan' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Jurusan <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/jabatan');
	}


}
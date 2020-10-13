<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potongangaji extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekSession();
		$this->load->model('Penggajian_model');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['title'] = 'Setting Potongan Gaji';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$data['pot_gaji'] = $this->Penggajian_model->getAllPotonganGaji();

		$this->form_validation->set_rules('potongan', 'Jenis Potongan', 'required|trim');
		$this->form_validation->set_rules('jml', 'Jumlah Potongan', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->load->view('themeplates/header', $data);
			$this->load->view('themeplates/sidebar', $data);
			$this->load->view('admin/potongan_gaji/index', $data);
			$this->load->view('themeplates/footer');
		} else {
			$this->Penggajian_model->tambahDataPotonganGaji();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Pegawai <strong>Berhasil Ditambahkan.</strong></div>');
			redirect('admin/potongangaji');
		}
	}

	public function getpotongan()
	{
		echo json_encode($this->Penggajian_model->getPotonganById($_POST['id']));
	}

	public function ubahpotongan()
	{
		$this->Penggajian_model->ubahDataPotonganGaji($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Potongan Gaji <strong>Berhasil Diubah.</strong></div>');
		redirect('admin/potongangaji');
	}

	public function hapus($id)
	{
		$this->db->delete('potongan_gaji', ['id_poga' => $id]);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-trash"></i> Data Potongan Gaji <strong>Berhasil Dihapus.</strong></div>');
		redirect('admin/potongangaji');
	}


}
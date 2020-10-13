<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekSession();
		$this->load->model('Gaji_model');
		$this->load->model('Auth_model');
		$this->load->model('Penggajian_model');
	}

	public function index()
	{
		$data['title'] = 'Gaji ' . ucfirst($this->session->userdata('username'));
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$data['gaji'] = $this->Gaji_model->getJoinPegawaiJabatan();
		$data['pot_gaji'] = $this->Penggajian_model->getAllPotonganGaji();
		// var_dump($data['gaji']);
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('pegawai/gaji/index', $data);
		$this->load->view('themeplates/footer');
	}

	public function cetakGaji($id)
	{
		$data['title'] = 'Gaji ' . ucfirst($this->session->userdata('username'));
	    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
		$data['cetakSlipGaji'] = $this->Gaji_model->getCetakJoinPegawaiJabatan($id)->row_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('pegawai/cetak/cetak_slip_gaji', $data);
		$this->load->view('themeplates/footer');
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekSession();
		$this->load->model('Gaji_model');
		$this->load->model('Auth_model');
	}

	public function index()
	{
		$data['title'] = 'Gaji Pegawai';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		if((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
	        $bulan = $this->input->post('bulan');
	        $tahun = $this->input->post('tahun');
	        $bulanTahun = $bulan.$tahun;
	      } else {
	        $bulan = date('m');
	        $tahun = date('Y');
	        $bulanTahun = $bulan.$tahun;
	      }
	    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
		$data['gaji'] = $this->Gaji_model->joinJabatanPGajiPegawai($bulanTahun);
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/gaji/index', $data);
		$this->load->view('themeplates/footer');
	}

	public function cetak()
	{
		$data['title'] = 'Cetak Data Gaji Pegawai';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		if((isset($_GET['bulan']) && $_GET['bulan'] != null) && (isset($_GET['tahun']) && $_GET['tahun'] != null)) {
		    $bulan = $_GET['bulan'];
		    $tahun = $_GET['tahun'];
		    $bulanTahun = $bulan.$tahun;
		  } else {
		    $bulan = date('m');
		    $tahun = date('Y');
		    $bulanTahun = $bulan.$tahun;
		  }
	    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
		$data['cetakGaji'] = $this->Gaji_model->joinJabatanPGajiPegawai($bulanTahun);
		$this->load->view('themeplates/header', $data);
		$this->load->view('admin/cetak/gaji', $data);
	}

	// Laporan Gaji
	public function laporan_gaji()
	{
		$data['title'] = 'Laporan Gaji Pegawai';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/cetak/laporan_gaji', $data);
		$this->load->view('themeplates/footer');
	}

	public function cetaklaporangaji()
	{
		$data['title'] = 'Cetak Data Gaji Pegawai';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		if((isset($_GET['bulan']) && $_GET['bulan'] != null) && (isset($_GET['tahun']) && $_GET['tahun'] != null)) {
		    $bulan = $_GET['bulan'];
		    $tahun = $_GET['tahun'];
		    $bulanTahun = $bulan.$tahun;
		  } else {
		    $bulan = date('m');
		    $tahun = date('Y');
		    $bulanTahun = $bulan.$tahun;
		  }
	    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
		$data['cetakGaji'] = $this->Gaji_model->joinJabatanPGajiPegawai($bulanTahun);
		$this->load->view('themeplates/header', $data);
		$this->load->view('admin/cetak/gaji', $data);
	}

	public function slip_gaji()
	{
		$data['title'] = 'Slip Gaji Pegawai';
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['user'] = $this->Auth_model->getAuthUserPegawai($this->session->userdata('username'))->row_array();
		$data['pegawai'] = $this->db->get('pegawai')->result_array();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/gaji/slip_gaji', $data);
		$this->load->view('themeplates/footer');
	}

	public function cetakSlipGaji()
	{
		$this->form_validation->set_rules('pegawai', 'Pegawai', 'required|trim');
		$this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
		$this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
		if($this->form_validation->run() == FALSE) {
			$this->slip_gaji();
		} else {
			$data['title'] = 'Cetak Slip Gaji Pegawai';
			if((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
			    $bulan = $_POST['bulan'];
			    $tahun = $_POST['tahun'];
			    $bulanTahun = $bulan.$tahun;
			} else {
			    $bulan = date('m');
			    $tahun = date('Y');
			    $bulanTahun = $bulan.$tahun;
			}
			$pegawai = $this->input->post('pegawai');
			$data['slip'] = $this->Gaji_model->getJabatanPegawaiWhereName($bulanTahun, $pegawai);
			// var_dump($data['slip']); die;
			$data['potongan'] = $this->db->get('potongan_gaji')->result_array();
			$this->load->view('themeplates/header', $data);
			$this->load->view('admin/cetak/cetak_slip_gaji', $data);
		}
		
	}


}
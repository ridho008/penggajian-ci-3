<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cekSession();
		$this->load->model('Gaji_model');
	}

	public function index()
	{
		$data['title'] = 'Gaji Pegawai';
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
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
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
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


}
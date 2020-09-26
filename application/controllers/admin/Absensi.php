<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Absensi_model');
	}

	public function index()
	{
		$data['title'] = 'Absensi Pegawai';
		if((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$bulanTahun = $bulan.$tahun;
		} else {
			$bulan = date('m');
			$tahun = date('Y');
			$bulanTahun = $bulan.$tahun;
		}

		$data['absensi'] = $this->Absensi_model->joinPegawaiJabatan($bulanTahun);
		// var_dump($data['absensi']); die;
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/absensi/index', $data);
		$this->load->view('themeplates/footer');
	}


	


}
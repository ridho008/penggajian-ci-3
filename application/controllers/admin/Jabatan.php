<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jabatan_model');
	}

	public function index()
	{
		$data['title'] = 'Jabatan';
		$data['jabatan'] = $this->Jabatan_model->getAllJabatan();
		$this->load->view('themeplates/header', $data);
		$this->load->view('themeplates/sidebar', $data);
		$this->load->view('admin/jabatan/index', $data);
		$this->load->view('themeplates/footer');
	}


}
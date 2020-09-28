<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page404 extends CI_Controller {
	public function index()
	{
		$data['title'] = 'Halaman tidak ditemukan';
		$this->load->view('page404', $data);
	}


}
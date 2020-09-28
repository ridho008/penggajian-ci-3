<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {
	public function joinPegawaiJabatan($bulanTahun)
	{
		$this->db->select('*');
		$this->db->from('kehadiran');
		$this->db->join('pegawai', 'pegawai.id_pegawai = kehadiran.id_pegawai');
		$this->db->join('jabatan', 'jabatan.id_jabatan = kehadiran.id_jabatan');
		$this->db->where('kehadiran.bulan', $bulanTahun);
		return $this->db->get()->result_array();
	}

	public function InputjoinPegawaiJabatan($bulanTahun)
	{
		return $this->db->query("
			SELECT pegawai.*, jabatan.nama_jabatan FROM pegawai 
			INNER JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan 
			WHERE NOT EXISTS (SELECT * FROM kehadiran 
			WHERE bulan = '$bulanTahun' AND pegawai.nik = kehadiran.nik)")->result_array();
	}

	public function tambah_batch($data)
	{
		$jumlahData = count($data);
		// var_dump($jumlahData); die;
		if($jumlahData > 0) {
			$this->db->insert_batch('kehadiran', $data);
		}
	}


}
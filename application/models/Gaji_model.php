<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji_model extends CI_Model {
	public function joinJabatanPGajiPegawai($bulanTahun)
	{
		$this->db->select('pegawai.nik, pegawai.nama_pegawai, pegawai.jk_pegawai, jabatan.nama_jabatan, jabatan.gaji_pokok, jabatan.tj_transport, jabatan.uang_makan, kehadiran.alpa');
		$this->db->from('pegawai');
		$this->db->join('kehadiran', 'kehadiran.nik = pegawai.nik');
		$this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
		$this->db->where('kehadiran.bulan', $bulanTahun);
		$this->db->order_by('pegawai.nama_pegawai', 'asc');
		return $this->db->get()->result_array();
	}

	public function getJabatanPegawaiWhereName($bulanTahun, $pegawai)
	{
		$this->db->select('*');
		$this->db->from('kehadiran');
		$this->db->join('jabatan', 'jabatan.id_jabatan = kehadiran.id_jabatan');
		$this->db->join('pegawai', 'pegawai.id_pegawai = kehadiran.id_pegawai');
		$this->db->where('kehadiran.bulan', $bulanTahun);
		$this->db->where('pegawai.id_pegawai', $pegawai);
		return $this->db->get()->row_array();
	}


}
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


}
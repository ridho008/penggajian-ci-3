<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penggajian_model extends CI_Model {
	public function getAllPotonganGaji()
	{
		return $this->db->get('potongan_gaji')->result_array();
	}

	public function tambahDataPotonganGaji()
	{
		$data = [
			'potongan' => html_escape($this->input->post('potongan', true)),
			'jml_potongan' => html_escape($this->input->post('jml', true))
		];

		$this->db->insert('potongan_gaji', $data);
	}

	public function ubahDataPotonganGaji($data)
	{
		$id_poga = $data['id_poga'];
		// var_dump($data); die;
		$arr = [
			'potongan' => $data['potongan'],
			'jml_potongan' => $data['jml']
		];

		$this->db->where('id_poga', $id_poga);
		$this->db->update('potongan_gaji', $arr);
	}

	public function getPotonganById($id)
	{
		return $this->db->get_where('potongan_gaji', ['id_poga' => $id])->row_array();
	}


}
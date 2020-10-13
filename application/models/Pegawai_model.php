<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {
	public function getAllPegawai()
	{
		$this->db->from('pegawai');
		$this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan');
		return $this->db->get()->result_array();
	}

	public function tambahDataPegawai()
	{
		$photo = $_FILES['photo']['name'];

		if($photo) {
			$config['allowed_types'] = 'png|jpg';
			$config['max_sizes'] = '2048';
			$config['upload_path'] = './assets/img/user/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('photo')) {
				$this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
		}

		$data = [
			'nik' => html_escape($this->input->post('nik', true)),
			'nama_pegawai' => html_escape($this->input->post('nama_pegawai', true)),
			'jk_pegawai' => html_escape($this->input->post('jk', true)),
			'id_jabatan' => html_escape($this->input->post('nama_jabatan', true)),
			'tgl_masuk' => html_escape($this->input->post('tgl_masuk', true)),
			'status' => html_escape($this->input->post('status', true)),
			'photo' => $photo,
			'id_user' => html_escape($this->input->post('user', true)),
		];

		$this->db->insert('pegawai', $data);
	}

	public function getPegawaiById($id)
	{
		return $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
	}

	public function editPegawai($data)
	{
		$id_pegawai = $data['id_pegawai'];
		$photo = $_FILES['photo']['name'];

		if($photo) {
			$config['allowed_types'] = 'png|jpg';
			$config['max_sizes'] = '2048';
			$config['upload_path'] = './assets/img/user/';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('photo')) {
				$photoLama = $data['photoLama'];
				$result = $this->db->get_where('pegawai', ['id_pegawai' => $id_pegawai])->row_array();
				$rowPhoto = $result['photo'];
				if($photoLama == $rowPhoto) {
					unlink(FCPATH . 'assets/img/pegawai/' . $rowPhoto);
				}

				$photoBaru = $this->upload->data('file_name');
				$this->db->set('photo', $photoBaru);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$arr = [
			'nik' => html_escape($data['nik']),
			'nama_pegawai' => html_escape($data['nama_pegawai']),
			'jk_pegawai' => html_escape($data['jk']),
			'id_jabatan' => html_escape($data['nama_jabatan']),
			'tgl_masuk' => html_escape($data['tgl_masuk']),
			'status' => html_escape($data['status'])
		];

		$this->db->where('id_pegawai', $id_pegawai);
		$this->db->update('pegawai', $arr);
	}

	public function tambahDataUser($data)
	{
		$this->db->insert('user', $data);
	}

	public function getIdUser()
	{
		return $this->db->get('user');
	}


}
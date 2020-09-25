<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model {
	public function getAllJabatan()
	{
		return $this->db->get('jabatan')->result_array();
	}


}
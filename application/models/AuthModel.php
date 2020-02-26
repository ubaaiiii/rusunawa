<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}


	// daftar_user
	public function daftar_user($nik, $nama, $email, $password, $no_telp, $alamat, $gender)
	{
		$data = [
			'nik' => $nik,
			'nama' => $nama,
			'email' => $email,
			'password' => $password,
			'no_telp' => $no_telp,
			'alamat' => $alamat,
			'gender' => $gender,
			'foto'	=> 'user.png',
			'status' => 0
		];

		$save = $this->db->insert('users', $data);
		return $save;

	}

	// saveKTP
	public function saveKTP($foto)
	{
		$data = ['ktp' => $foto, 'status' => 1];
		return $this->db->set($data)->where('nik', $_SESSION['nik'])->update('users');
	}

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function save_kamar($harga, $lantai, $gender)
	{

		$num = $this->db->get('kamar')->num_rows();
		$code = $num + 1;

		if($gender == 1){
			$data = [

				'code' 		=> 'A'.$code,
				'tingkat'	=> $lantai,
				'gender'	=> $gender,
				'harga'		=> $harga,
				'status'	=> 1
			];
		}else{

			$data = [

				'code' 		=> 'B'.$code,
				'tingkat'	=> $lantai,
				'gender'	=> $gender,
				'harga'		=> $harga,
				'status'	=> 1
			];
		}


		return $this->db->insert('kamar', $data);
		/*
			1 Open
			2 Pending
			3 Close
		*/
	}

	// updateUser
	public function updateUser($nik, $nama, $email, $no_telp, $alamat, $gender, $id)
	{
		$data = [
			'nik' => $nik,
			'nama' => $nama,
			'email' => $email,
			'no_telp' => $no_telp,
			'alamat' => $alamat,
			'gender' => $gender
		];

		return $this->db->set($data)->where('id', $id)->update('users');
	}

	// getSearchKeuangan
	public function getSearchKeuangan($bulan, $tahun)
	{
		if ($bulan == 'all') {

			$waktu = $tahun;

			$this->db->select('*');
			$this->db->from('keuangan');
			$this->db->join('booking', 'keuangan.id_booking = booking.id');
			$this->db->join('users', 'booking.user_nik = users.nik');
			$this->db->join('kamar', 'booking.kamar_id = kamar.id');
			// $this->db->where('booking.status', 1);
			$this->db->like('keuangan.tanggal_confirm', $waktu);

		}else{

			$waktu = $tahun."-".$bulan;

			$this->db->select('*');
			$this->db->from('keuangan');
			$this->db->join('booking', 'keuangan.id_booking = booking.id');
			$this->db->join('users', 'booking.user_nik = users.nik');
			$this->db->join('kamar', 'booking.kamar_id = kamar.id');
			// $this->db->where('booking.status', 1);
			$this->db->like('keuangan.tanggal_confirm', $waktu);
		}

		return $this->db->get()->result_array();
	}

	// saveRekening($no_rek, $nama, $bank)
	public function saveRekening($no_rek, $nama, $bank)
	{
		$data = [
			'no_rek' 	=> $no_rek,
			'nama' 		=> $nama,
			'bank' 		=> $bank,
		];

		return $this->db->insert('rekening', $data);
	}

	// save setting
	public function saveSetting($nama, $alamat, $no_telp, $email, $deskripsi)
	{
		$data = [
			"nama" => $nama,
			"alamat" => $alamat,
			"no_telp" => $no_telp,
			"email" => $email,
			"deskripsi" => $deskripsi
		];

		return $this->db->set($data)->where('id', 1)->update('setting');
	}

	// saveLogo
	public function saveLogo($logo)
	{
		return $this->db->set(['logo' => $logo])->where('id', 1)->update('setting');
	}

	// sisaWaktu
	public function sisaWaktu()
	{

		$this->db->select('*, booking.id as id_booking');
		$this->db->from('booking');
		$this->db->join('users', 'booking.user_id = users.id');
		$this->db->order_by('booking.id', 'desc');
		$this->db->where('booking.status !=', 3);
		return $this->db->get()->result_array();
	}

	// updateProfile($nama, $email, $no_telp, $alamat, $gender, $nik)
	public function updateProfile($nama, $email, $no_telp, $alamat, $gender, $nik)
	{
		$data = [
			'nama' => $nama,
			'email' => $email,
			'no_telp' => $no_telp,
			'alamat' => $alamat,
			'gender' => $gender,
			'nik' => $nik,
		];

		return $this->db->set($data)->where('id', $_SESSION['id'])->update('users');
	}

	// savePdam2
	public function savePdam2($data, $id)
	{
		return $this->db->set($data)->where('id', $id)->update('booking');
	}
}

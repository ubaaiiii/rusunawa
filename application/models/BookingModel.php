<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingModel extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getKamarBooking()
	{
		return $this->db->get_where('kamar', ['status' => 1, 'gender' => $_SESSION['gender']])->result_array();
	}

	public function getKamarBookingId($id)
	{
		return $this->db->get_where('kamar', ['id' => $id])->row_array();
	}

	public function getRekening()
	{
		return $this->db->get('rekening')->result_array();
	}

	public function saveBooking($id_kamar, $tanggal_booking, $no_rek, $foto, $jam){

		$tgl2 = date('Y-m-d', strtotime('+1 month', strtotime($tanggal_booking)));

		$data = [
			'user_nik' 			=> $_SESSION['nik'],
			'code_booking'		=> rand(1234567890, 999999),
			'kamar_id'			=> $id_kamar,
			'tanggal_booking'	=> date('Y-m-d'),
			'tanggal_mulai'		=> $tanggal_booking,
			'jam'				=> $jam,
			'tanggal_selesai'	=> $tgl2,
			'no_rek'			=> $no_rek,
			'upload_bukti'		=> $foto
		];

		return $this->db->insert('booking', $data);
	}

	// updateKamar
	public function updateKamar($id_kamar)
	{
		return $this->db->set(['status' => 2])->where('id', $id_kamar)->update('kamar');
	}

	// getKamarBookingUserId
	public function getKamarBookingUserId($id)
	{
		$this->db->select('*, booking.status as status_booking');
		$this->db->order_by('booking.id', 'desc');
		$this->db->from('booking');
		$this->db->where('booking.user_nik', $_SESSION['nik']);
		$this->db->join('kamar', 'booking.kamar_id = kamar.id');
		return $this->db->get()->result_array();
	}

	// getKamarBookingAdmin
	public function getKamarBookingAdmin()
	{
		return $this->db->select('*, booking.id as booking_id, booking.status as status_booking')->order_by('booking.id', 'desc')->from('booking')->join('users', 'booking.user_nik = users.nik')->where('booking.status !=', 2)->get()->result_array();
	}

	// saveConfirm
	public function saveConfirm($id, $kamar_id, $harga)
	{

		// insert keuangan
		$data = [
			"tanggal_confirm" 	=> date('Y-m-d'),
			'uang'				=> $harga / 2,
			'deskripsi'			=> 'Booking Kamar 50%',
			"id_booking"		=> $id
		];
		$this->db->insert('keuangan', $data);

		$this->db->set(['status' => 1])->where('id', $id)->update('booking');
		return $this->db->set(['status' => 3])->where('id', $kamar_id)->update('kamar');
	}

	// updateStatusKamar
	public function updateStatusKamar($id)
	{
		return $this->db->set(['status' => 1])->where('id', $id)->update('kamar');
	}

	// updateStatusBooking
	public function updateStatusBooking($id)
	{
		return $this->db->set(['status' => 3])->where('id', $id)->update('booking');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('BookingModel', 'Model');
	}

	// Alert
	private function Alert($msg, $url){
		echo "<script>alert('".$msg."'); location = '".base_url($url)."'</script>";
	}

	private function sendEmail($email){
		$config = [
           'mailtype'  => 'html',
           'charset'   => 'utf-8',
           'protocol'  => 'smtp',
           'smtp_host' => 'ssl://smtp.gmail.com',
           'smtp_user' => 'timtam.rpl@gmail.com',
           'smtp_pass' => 'sayang_tia_riska',
           'smtp_port' => 465,
           'crlf'      => "\r\n",
           'newline'   => "\r\n"
       ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@rusun.com', $setting['nama']);

        // Email penerima
        $this->email->to($email);

        // Subject email
        $this->email->subject('Notifikasi Booking Kamar');

        // Isi email
        $this->email->message("Calon Penghuni Baru Rusun atas Nama ... Pada Tanggal ... ");


        $this->email->send();
	}

	public function index()
	{
		if (empty($_SESSION['admin'])) {


			$data['title'] = "Booking Kamar";
			$data['data'] = $this->Model->getKamarBooking();


			$this->load->view('home/layouts/header', $data);
			$this->load->view('home/booking/index');
			$this->load->view('home/layouts/footer');
		}else{

			$data['title'] = "Data Booking User";
			$data['data'] = $this->Model->getKamarBookingAdmin();

			$this->load->view('home/layouts/header', $data);
			$this->load->view('home/booking/index_admin', $data);
			$this->load->view('home/layouts/footer');
		}
	}

	public function proses($id = null)
	{
		$data['data'] = $this->Model->getKamarBookingId($id);
		$data['title'] = "Proses Booking Kamar";
		$data['rekening'] = $this->Model->getRekening();

		$this->load->view('home/layouts/header', $data);
		$this->load->view('home/booking/proses');
		$this->load->view('home/layouts/footer');
	}

	// proses bookinig
	public function proses_booking()
	{
		$id_kamar = $this->input->post('id_kamar');
		$tanggal_booking = $this->input->post('tanggal');
		$no_rek = $this->input->post('no_rek');
		$foto = $this->input->post('foto');
		date_default_timezone_set("Asia/Jakarta");
		$jam = date("H:i:s");

		$config['upload_path']          = './assets/bukti/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 1000000;

       // var_dump($_FILES);
       // die();
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->Alert($error['error'], 'booking/proses/'.$id_kamar);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$datas = $data['upload_data'];

			$foto = $datas['file_name'];

			$save = $this->Model->saveBooking($id_kamar, $tanggal_booking, $no_rek, $foto, $jam);
			$update = $this->Model->updateKamar($id_kamar);

			if ($save) {

		 		$config = [
		           'mailtype'  => 'html',
		           'charset'   => 'utf-8',
		           'protocol'  => 'smtp',
		           'smtp_host' => 'ssl://smtp.gmail.com',
		           'smtp_user' => 'timtam.rpl@gmail.com',
		           'smtp_pass' => 'sayang_tia_riska',
		           'smtp_port' => 465,
		           'crlf'      => "\r\n",
		           'newline'   => "\r\n"
		       ];
		       	$admin = $this->db->get('admin')->result_array();
		       	$setting = $this->db->get_where('setting', ['id' => 1])->row_array();

		       	foreach($admin as $admins){

			        // Load library email dan konfigurasinya
			        $this->load->library('email', $config);

			        // Email dan nama pengirim
			        $this->email->from('no-reply@rusun.com', $setting['nama']);

			        // Email penerima
			        $this->email->to($admins['email']);

			        // Subject email
			        $this->email->subject('Notifikasi Booking Kamar');

			        // Isi email
			        $this->email->message("Calon Penghuni Baru Rusun <br>Nama : <b>".$_SESSION['nama']."</b><br>Tanggal : <b>".date('d-m-Y')."</b><br>Jam : <b>".date('H:i:s')."</b> ");
			        $this->email->send();

		       	}

				$this->Alert('Berhasil MemBooking Kamar', 'booking/history');
			}else{

				$this->Alert('Kesalahan MemBooking Kamar', 'booking/history');
			}
		}

	}

	// history
	public function history()
	{
		if (empty($_SESSION['admin'])) {

			$data['data'] = $this->Model->getKamarBookingUserId($_SESSION['id']);
			$data['title'] = "History Booking";

			$data['count'] = $this->db->get_where('booking', ['user_nik' => $_SESSION['nik']])->row_array();

			$this->load->view('home/layouts/header', $data);
			$this->load->view('home/booking/history');
			$this->load->view('home/layouts/footer');
		}else{
			echo "404";
		}
	}


	//config
	public function confirm($id, $id_kamar)
	{
		if (empty($_SESSION['admin'])) {
			return $this->Alert('Permission Denied', 'home');
		}else{

			$setting = $this->db->get_where('setting', ['id' => 1])->row_array();

			$this->db->select('*');
			$this->db->from('booking');
			$this->db->join('users', 'booking.user_nik = users.nik');
			$users = $this->db->get()->row_array();

			// get kamar harga
			$kamar = $this->db->get_where('kamar', ['id' => $id_kamar])->row_array();
			$harga = $kamar['harga'];

			$save = $this->Model->saveConfirm($id, $id_kamar, $harga);

			// send email

			if ($save) {
				$config = [
	               'mailtype'  => 'html',
	               'charset'   => 'utf-8',
	               'protocol'  => 'smtp',
	               'smtp_host' => 'ssl://smtp.gmail.com',
	               'smtp_user' => 'timtam.rpl@gmail.com',
	               'smtp_pass' => 'sayang_tia_riska',
	               'smtp_port' => 465,
	               'crlf'      => "\r\n",
	               'newline'   => "\r\n"
	           ];

		        // Load library email dan konfigurasinya
		        $this->load->library('email', $config);

		        // Email dan nama pengirim
		        $this->email->from('no-reply@rusun.com', $setting['nama']);

		        // Email penerima
		        $this->email->to($users['email']);

		        // Subject email
		        $this->email->subject('Booking Kamar Confirm');

		        // Isi email
		        $this->email->message("Booking Kamar dengan ID Kamar : $id_kamar telah Berhasil di confirmasi, silahkan untuk login ke aplikasi untuk mengecek Data Booking anda, ".base_url('auth'));


		        $this->email->send();
				return $this->Alert('Berhasil Menconfirm', 'booking');
			}else{

				return $this->Alert('Gagal Menconfirm', 'booking');
			}
		}
	}

	// akhiri
	public function akhiri($id = null)
	{
		if (empty($_SESSION['admin'])) {
			return $this->Alert('Permission Denied', 'home');
		}else{

			$booking = $this->db->get_where('booking', ['id'  => $id])->row_array();
			$users = $this->db->get_where('users', ['nik' => $booking['user_nik']])->row_array();
			$setting = $this->db->get_where('setting', ['id' => 1])->row_array();

			// update kamar status booking, dan send email
			$config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'timtam.rpl@gmail.com',
               'smtp_pass' => 'sayang_tia_riska',
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
           ];

	        // Load library email dan konfigurasinya
	        $this->load->library('email', $config);

	        // Email dan nama pengirim
	        $this->email->from('no-reply@rusun.com', $setting['nama']);

	        // Email penerima
	        $this->email->to($users['email']);

	        // Subject email
	        $this->email->subject('Masa Waktu Kamar Telah Usai');

	        // Isi email
	        $this->email->message("Yang Terhormat untuk ".$users['nama'].", Bahwa Masa Waktu Kamar Anda telah Usai, silahkan untuk login ke aplikasi untuk mengecek Data Booking anda, ".base_url('booking/history'));


	        $this->email->send();

			// update kamar
			$save 	= $this->Model->updateStatusKamar($booking['kamar_id']);
			$save2	= $this->Model->updateStatusBooking($id);

			if($save2){
				return $this->Alert('Berhasil Mengakhiri Masa Waktu', 'booking');
			}
		}
	}

	/*search_code_booking*/
	public function search_code_booking($code_booking)
	{
		$data = $this->db->get_where('booking', ['code_booking' => $code_booking])->row_array();
		$total = $this->db->get_where('booking', ['code_booking' => $code_booking])->num_rows();
		$kamar = $this->db->get_where('kamar', ['id' => $data['kamar_id']])->row_array();

		if ($total > 0) {
			$profile = $this->db->get_where('users', ['nik' => $data['user_nik']])->row_array();
			echo json_encode(['status' => 1, 'data' => $data, 'user' => $profile, 'kamar' => $kamar]);
		}else{
			echo json_encode(['status' => 0, 'data' => 'Code Booking ' . $code_booking." tidak Ditemukan !"]);
		}
	}

	/*search_kamar_by_id*/
	public function search_kamar_by_id($id)
	{
		$data = $this->db->get_where('kamar', ['id' => $id])->row_array();
		echo json_encode($data);
	}

	/*pelunasan*/
	public function pelunasan($id)
	{
		if (empty($_SESSION['admin'])) {
			return $this->Alert('Permission Denied', 'home');
		}else{
			$kamar = $this->db->select('*')->from('booking')->join('kamar', 'booking.kamar_id = kamar.id')->where('booking.id', $id)->get()->row_array();

			$datas = [
				"tanggal_confirm" 	=> date('Y-m-d'),
				'uang'				=> $kamar['harga'] / 2,
				'deskripsi'			=> 'Pelunasan Kamar',
				"id_booking"		=> $id
			];
			$this->db->insert('keuangan', $datas);

			$data = [
				'tanggal_lunas' => date('Y-m-d'),
				'status'		=> 4 // lunas
			];
			$save = $this->db->set($data)->where('id', $id)->update('booking');
			if($save){
				return $this->Alert('Berhasil Melakukan Pembayaran Pelunasan', 'home/pembayaran');
			}else{
				return $this->Alert('Gagal Melakukan Pembayaran Pelunasan', 'home/pembayaran');
			}
		}
	}

	/* perpanjang */
	public function perpanjang($id)
	{
		$booking = $this->db->get_where('booking', ['id' => $id])->row_array();
		$bulan = $this->input->post('perpanjang');
		$total_biaya = $this->input->post('total_biaya');

		$panjang = date('Y-m-d', strtotime('+'.$bulan.' month', strtotime($booking['tanggal_selesai'])));

		$data = [
			'tanggal_selesai' => $panjang
		];

		/* insert to table perpanjang */
		$datas = [
			'booking_id' 	=> $id,
			'tanggal'		=> date('Y-m-d'),
			'biaya'			=> $total_biaya,
			'bulan'			=> $bulan
		];
		$this->db->insert('perpanjang', $datas);

		$save = $this->db->set($data)->where('id', $id)->update('booking');
		if($save){
			return $this->Alert('Berhasil Melakukan Pembayaran Perpanjangan bulan', 'home/pembayaran');
		}else{
			return $this->Alert('Gagal Melakukan Pembayaran Perpanjangan bulan', 'home/pembayaran');
		}
	}
}

/*

Pembayaran : {

	Perpanjang // on progrss => udah tapi blom ke update untuk biaya nya dan masuk ke keuangan
	Pelunasan // done

	dengan berdasarkan ID Transaksi Booking
}

Accept/Reject PDAM => Dome

Sistem Hangus ketika 3 hari



Role: {

	Admin : {
		- Setting : {
			nama sekolah, alamat, no_telp, email, logo (Update)
		}
		- Master Jenis Pembayaran (CRUD){
			spp, buku, gedung
		}
		- Master Kelas(CRUD){
			id, kelas
		}
		- Master Sisa (CRUD) {
			nama, kelas, gender, alamat, no_telp, email, nis
		}
		- Master User(CRUD){
			nis_Sisa(join table Sisa where nis), password (di bkin sma admin)
		}
		- Transaksi (offline)(CRUD){
			1.search berdasarkan nis
			2.pilih jenis pembayaran
			3.bayar
		}
		- Report {
			dari bulan ke bulan dan berdasarkan jenis pembayaran
		}
	}
}

Sisa:  {
	lihat profile,
	lihat transaksi
}


*/

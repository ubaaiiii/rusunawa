<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Kamar');
	}

	public function index()
	{
		$data['setting'] = $this->db->get_where('setting', ['id' => 1])->row_array();
		$data['gallery'] = $this->db->get('gallery')->result_array();
		$data['juml_lantai'] = $this->Kamar->get_lantai();

		for ($i=1; $i <= $data['juml_lantai']; $i++) {
			$data['hCowokL'][$i] = $this->Kamar->get_harga(1,$i,1);			// get_harga(gender,lantai,status);
			$data['hCewekL'][$i] = $this->Kamar->get_harga(2,$i,1);
			$data['kCowokL'][$i] = $this->Kamar->get_kamar(1,$i,1);
			$data['kCewekL'][$i] = $this->Kamar->get_kamar(2,$i,1);
		}

		$data['laki'] = $this->db->get_where('kamar', array('gender' => 1, 'status !=' => 1))->num_rows();
		$data['cewe'] = $this->db->get_where('kamar', array('gender' => 2, 'status !=' => 1))->num_rows();

		$this->load->view('index', $data);
	}

	public function gallery()
	{
		$data['setting'] = $this->db->get_where('setting', ['id' => 1])->row_array();
		$data['gallery'] = $this->db->order_by('id', 'desc')->get('gallery')->result_array();

		$data['laki'] = $this->db->order_by('id', 'desc')->get_where('kamar', ['gender' => 1, 'status' => 1])->result_array();
		$data['cewe'] = $this->db->order_by('id', 'desc')->get_where('kamar', ['gender' => 2, 'status' => 1])->result_array();

		$this->load->view('gallery', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function get_lantai(){
		$this->db->distinct();
		$this->db->select('tingkat');
		return $this->db->get('kamar')->num_rows();
	}

	function get_harga($gender=null,$tingkat=null,$status=null){
		$this->db->distinct();
		$this->db->select('harga');
		$this->db->where(array('gender' => $gender, 'tingkat' => $tingkat, 'status' => $status));
		$this->db->order_by('harga','ASC');
		$result= $this->db->get('kamar');
		$harga = "";
		setlocale (LC_MONETARY, 'id_ID');
		if ($result->num_rows() > 1) {
			$harga = "Rp. ".number_format($result->first_row()->harga,2,',','.')." s/d Rp. ".number_format($result->last_row()->harga,2,',','.');
		} else {
			$res2 = $result->row_array();
			$harga = "Rp. ".number_format($res2['harga'],2,',','.');
		}
		return $harga;
	}

	function get_kamar($gender=null,$tingkat=null,$status=null){
		$awal = $this->db->get_where('kamar',array('gender' => $gender, 'tingkat' => $tingkat))->num_rows();
		$akhir = $this->db->get_where('kamar',array('gender' => $gender, 'tingkat' => $tingkat, 'status !=' => $status))->num_rows();
		return $result = $awal-$akhir;
	}

}

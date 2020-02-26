<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'Model');
        $this->load->helper('url');
    }

    // Alert
    private function Alert($msg, $url)
    {
        echo "<script>alert('".$msg."'); location = '".base_url($url)."'</script>";
    }

    // login user
    public function index()
    {
        if (empty($_SESSION['id'])) {
            $this->load->view('loginUser');
        } elseif (!empty($_SESSION['id'])) {
            header("Location: ".base_url('home'), true);
        }
    }

    // login admin
    public function login_admin()
    {
        if (empty($_SESSION['id'])) {
            $this->load->view('loginAdmin');
        } elseif (!empty($_SESSION['id'])) {
            header("Location: ".base_url('home'), true);
        }
    }

    // proses_admin_login
    public function proses_admin_login()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $cek = $this->db->get_where('admin', ['email' => $email, 'password' => $password]);

        // cek jika ada atau tidak
        $this->Alert('Berhasil Login', 'home');
        if ($cek->num_rows() == 1) {
            $data = $cek->row_array();

            $this->session->set_userdata($data);
        } else {
            $this->Alert('Login Gagal', 'auth/login_admin');
        }
    }

    // login
    public function login()
    {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));

        $cek = $this->db->get_where('users', ['email' => $email, 'password' => $password]);

        // cek jika ada atau tidak
        if ($cek->num_rows() == 1) {
            $data = $cek->row_array();

            $this->session->set_userdata($data);

            if ($data['status'] == 0) {
                // belom upload ketp

                $this->Alert('Berhasil Login', 'home/upload_ktp');
            } else {
                $this->Alert('Berhasil Login', 'home');
            }
        } else {
            $this->Alert('Login Gagal', 'auth');
        }
    }

    // daftar
    public function daftar()
    {
        $this->load->view('daftar');
    }

    // daftar_user
    public function daftar_user()
    {
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $gender = $this->input->post('gender');

        $save = $this->Model->daftar_user($nik, $nama, $email, $password, $no_telp, $alamat, $gender);

        if ($save) {
            $this->Alert('Berhasil Mendaftar, Silahkan Login', 'auth');
        } else {
            $this->Alert('Gagal Melakukan Pendaftaran, Silahkan ulangi lagi', 'auth/daftar');
        }
    }

    //logout
    public function logout()
    {
        $this->session->sess_destroy();
        return header('Location: ' . base_url('auth'));
    }

    // update_ktp
    public function update_ktp()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->Alert($error['error'], 'home/upload_ktp');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $datas = $data['upload_data'];

            $foto = $datas['file_name'];

            $save = $this->Model->saveKTP($foto);

            if ($save) {
                return $this->Alert('Berhasil Mengupload Identitas', 'home');
            } else {
                return $this->Alert('Kesalahan Mengupload Identitas', 'home');
            }
        }
    }
}

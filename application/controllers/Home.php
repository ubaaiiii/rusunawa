<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('HomeModel', 'Model');
    }

    // Alert
    private function Alert($msg, $url)
    {
        echo "<script>alert('".$msg."'); location = '".base_url($url)."'</script>";
    }

    public function index()
    {
        $data['title'] = "Halaman Dashboard";

        $data['laki'] = $this->db->get_where('users', ['gender' => 1])->num_rows();
        $data['cewe'] = $this->db->get_where('users', ['gender' => 2])->num_rows();

        $data['kamar'] = $this->db->get('kamar')->num_rows();
        $data['sisa'] = $this->db->get_where('kamar', ['status' => 1])->num_rows();

        $data['admin'] = $this->db->get('admin')->result_array();

        $this->load->view('home/layouts/header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('home/layouts/footer');
    }


    // kamar
    public function kamar()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "Halaman Kamar";
            $data['data']  = $this->db->order_by('id', 'desc')->get('kamar')->result_array();

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/kamar/index', $data);
            $this->load->view('home/layouts/footer');
        }
    }

    // tambah_kamar
    public function tambah_kamar()
    {
        $harga = $this->input->post('harga');
        $lantai = $this->input->post('lantai');
        $gender = $this->input->post('gender');

        $save = $this->Model->save_kamar($harga, $lantai, $gender);

        if ($save) {
            $this->Alert('Berhasil Menambahkan Kamar', 'home/kamar');
        } else {
            $this->Alert('Gagal Menambahkan Kamar', 'home/kamar');
        }
    }

    // hapus_kamar
    public function hapus_kamar($id = null)
    {
        if ($id) {
            if (isset($_SESSION['admin'])) {
                $del = $this->db->delete('kamar', ['id' => $id]);
                if ($del) {
                    return $this->Alert('Berhasil Menghapus Kamar', 'home/kamar');
                } else {
                    return $this->Alert('Gagal Menghapus Kamar', 'home/kamar');
                }
            } else {
                return $this->Alert('Dilarang', 'auth');
            }
        } else {
            return $this->Alert('ID tidak Ditemukan', 'home');
        }
    }

    // sisa_waktu
    public function sisa_waktu()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "Sisa Waktu Kamar";
            $data['data']  = $this->Model->sisaWaktu();

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/kamar/sisa_waktu', $data);
            $this->load->view('home/layouts/footer');
        }
    }

    // users
    public function users()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "Management Users";
            $data['data']  = $this->db->order_by('nik', 'desc')->get('users')->result_array();

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/users', $data);
            $this->load->view('home/layouts/footer');
        }
    }

    // get_user
    public function get_user($id, $type)
    {
        $data = $this->db->get_where('users', ['id' => $id])->row_array();

        if ($type == 'json') {
            echo json_encode($data);
        } else {
            return $data;
        }
    }

    // updateUser
    public function update_user($id)
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $no_telp = $_POST['no_telp'];
            $alamat = $_POST['alamat'];
            $gender = $_POST['gender'];

            $update = $this->Model->updateUser($nik, $nama, $email, $no_telp, $alamat, $gender, $id);

            if ($update) {
                return true;
            } else {
                return false;
            }
        }
    }

    // del_user
    public function del_user($id = null)
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $del = $this->db->delete('users', ['id' => $id]);

            if ($del) {
                return $this->Alert('Berhasil Menghapus User ID '.$id, 'home/users');
            } else {
                return $this->Alert('Gagal Menghapus User ID '.$id, 'home/users');
            }
        }
    }

    // detail_user
    public function detail_user($id = null)
    {
        $data['title'] = "Management Users";
        $data['data']  = $this->get_user($id, 'data');
        $data['booking'] = $this->db->get_where('booking', ['user_nik' => $id])->result_array();

        $this->load->view('home/layouts/header', $data);
        $this->load->view('home/detail_user', $data);
        $this->load->view('home/layouts/footer');
    }


    // report_keuangan
    public function report_keuangan()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "Laporan Keuangan";

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/keuangan/index', $data);
            $this->load->view('home/layouts/footer');
        }
    }


    public function search_keuangan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['data'] = $this->Model->getSearchKeuangan($bulan, $tahun);
        $data['setting'] = $this->db->get_where('setting', ['id' => 1])->row_array();

        $this->load->view('home/keuangan/report', $data);
    }

    public function view_laporan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['data'] = $this->Model->getSearchKeuangan($bulan, $tahun);

        echo json_encode(['data' => $data['data']]);
    }

    // report_keuangansettings
    public function settings()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "Settings Page";

            $data['data'] = $this->db->get_where('setting', ['id' => 1])->row_array();
            $data['rekening'] = $this->db->order_by('id', 'desc')->get('rekening')->result_array();

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/setting', $data);
            $this->load->view('home/layouts/footer');
        }
    }

    // del_rekening
    public function del_rekening($id = null)
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $del = $this->db->delete('rekening', ['id' => $id]);
            if ($del) {
                return $this->Alert('Rekening telah dihapus', 'home/settings');
            }
        }
    }

    // add_rekening
    public function add_rekening()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home/settings');
        } else {
            $no_rek = $this->input->post('no_rek');
            $nama = $this->input->post('nama');
            $bank = $this->input->post('bank');

            $save = $this->Model->saveRekening($no_rek, $nama, $bank);

            if ($save) {
                return $this->Alert('Berhasil Mengambahkan Data Rekening', 'home/settings');
            }
        }
    }

    // update_setting
    public function update_setting()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $nama 		= $this->input->post('nama');
            $alamat 	= $this->input->post('alamat');
            $no_telp 	= $this->input->post('no_telp');
            $email 		= $this->input->post('email');
            $deskripsi 	= $this->input->post('deskripsi');

            $save = $this->Model->saveSetting($nama, $alamat, $no_telp, $email, $deskripsi);

            if ($save) {
                return $this->Alert('Berhasil Mengupdate Setting', 'home/settings');
            }
        }
    }

    // upload_logo
    public function upload_logo()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home/settings');
        } else {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 10000;
            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->Alert($error['error'], 'home/settings');
            } else {
                $data = array('upload_data' => $this->upload->data());
                $datas = $data['upload_data'];

                $foto = $datas['file_name'];

                $save = $this->Model->saveLogo($foto);

                if ($save) {
                    return $this->Alert('Berhasil Mengupload Logo', 'home/settings');
                } else {
                    return $this->Alert('Kesalahan Mengupload Logo', 'home/settings');
                }
            }
        }
    }

    public function gallery()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "Gallery Page";

            $data['data'] = $this->db->order_by('id', 'desc')->get('gallery')->result_array();

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/gallery', $data);
            $this->load->view('home/layouts/footer');
        }
    }

    // add_gallery
    public function add_gallery()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;


        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->Alert($error['error'], 'home/gallery');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $datas = $data['upload_data'];

            $foto = $datas['file_name'];

            $save = $this->db->insert('gallery', ['foto' => $foto,'deskripsi' => $this->input->post('deskripsi')]);
            if ($save) {
                return $this->Alert('Berhasil Menyimpan Foto', 'home/gallery');
            }
        }
    }

    // del_img
    public function del_img($id = null)
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home/gallery');
        } else {
            $del = $this->db->delete('gallery', ['id' => $id]);
            if ($del) {
                return $this->Alert('Berhasil Menghapus Gambar', 'home/gallery');
            }
        }
    }

    // upload_ktp
    public function upload_ktp()
    {
        $this->load->view('ktp');
    }

    // profile
    public function profile()
    {
        $data['title'] = "My Profile";
        if (empty($_SESSION['admin'])) {
            $data['data'] = $this->db->get_where('users', ['nik' => $_SESSION['nik']])->row_array();
        } else {
            $data['data'] = $this->db->get_where('admin', ['id' => $_SESSION['id']])->row_array();
        }
        $this->load->view('home/layouts/header', $data);
        $this->load->view('home/profile', $data);
        $this->load->view('home/layouts/footer');
    }

    // update_profile
    public function update_profile()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $no_telp = $this->input->post('no_telp');
        $alamat = $this->input->post('alamat');
        $gender = $this->input->post('gender');
        $nik = $this->input->post('nik');

        $save = $this->Model->updateProfile($nama, $email, $no_telp, $alamat, $gender, $nik);
        if ($save) {
            return $this->Alert('Berhasil MengUpdate Profile', 'home/profile');
        } else {
            return $this->Alert('Gagal MengUpdate Profile', 'home/profile');
        }
    }

    // update_foto_profile
    public function update_foto_profile()
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100000;


        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->Alert($error['error'], 'home/profile');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $datas = $data['upload_data'];

            $foto = $datas['file_name'];

            if (empty($_SESSION['admin'])) {
                $save = $this->db->set(['foto' => $foto])->where('id', $_SESSION['id'])->update('users');
            } else {
                $save = $this->db->set(['foto' => $foto])->where('id', $_SESSION['id'])->update('admin');
            }


            if ($save) {
                return $this->Alert('Berhasil Menyimpan Foto', 'home/profile');
            }
        }
    }

    public function reset_pass()
    {
        $data['title'] = "My Profile";

        $this->load->view('home/layouts/header', $data);
        $this->load->view('home/reset_pass');
        $this->load->view('home/layouts/footer');
    }

    public function update_pass()
    {
        $password = sha1($this->input->post('password'));

        $save = $this->db->set(['password' => $password])->where('id', $_SESSION['id'])->update('users');

        if ($save) {
            return $this->Alert('Berhasil Memperbarui Password', 'home/reset_pass');
        } else {
            return $this->Alert('Gagal Memperbarui Password', 'home/reset_pass');
        }
    }

    public function pdam()
    {
        $data['title'] = "Pembarayan PDAM";

        $data['belum'] = $this->db->where('status_pdam !=', 3)->get('booking')->result_array();
        $data['lunas'] = $this->db->get_where('booking', ['status_pdam' => 3])->result_array();

        $data['setting'] = $this->db->get_where('setting', ['id' => 1])->row_array();

        $this->load->view('home/layouts/header', $data);
        $this->load->view('home/pdam', $data);
        $this->load->view('home/layouts/footer');
    }

    // update_pdam
    public function update_pdam($id)
    {
        $setting = $this->db->get_where('setting', ['id' => 1])->row_array();
        $satuan = $this->input->post('satuan');
        $harga = $satuan * $setting['satuan_pdam'];

        $data = [
            'satuan_pdam' 	=> $satuan,
            'harga_pdam'	=> $harga,
            'status_pdam'		=> 1
        ];
        $save = $this->db->set($data)->where('id', $id)->update('booking');
        if ($save) {
            return $this->Alert('Berhasil Mengirim Form Pembayaran PDAM ke Users', 'home/pdam');
        } else {
            return $this->Alert('Berhasil Mengirim Form Pembayaran PDAM ke Users', 'home/pdam');
        }
    }

    // update_pdam2
    public function update_pdam2($id = null)
    {
        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $this->load->library('upload', $config);

        if (! $this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->Alert($error['error'], 'home/settings');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $datas = $data['upload_data'];

            $foto = $datas['file_name'];

            $_data = [
                'bukti_pdam' => $foto,
                'tanggal_pdam' => date('Y-m-d'),
                'status_pdam'	=> 2
            ];

            $save = $this->Model->savePdam2($_data, $id);

            if ($save) {
                return $this->Alert('Berhasil Melakukan Transaksi PDAM', 'home');
            } else {
                return $this->Alert('Gagal Melakukan Transaksi PDAM', 'home');
            }
        }
    }

    // pdam_acc
    public function pdam_acc($id = null)
    {
        $uang = $this->db->get_where('booking', ['id' => $id])->row_array();


        $datas = [
            "tanggal_confirm" 	=> date('Y-m-d'),
            'uang'				=> $uang['harga_pdam'],
            'deskripsi'			=> 'Pembayaran PDAM '.$uang['satuan_pdam']." Liter",
            "id_booking"		=> $id
        ];
        $this->db->insert('keuangan', $datas);

        $update = $this->db->set(['status_pdam' => 3])->where('id', $id)->update('booking');
        if ($update) {
            return $this->Alert('Pembayran PDAM Telah Diterima', 'home/pdam');
        } else {
            return $this->Alert('Pembayran PDAM Gagal Diterima', 'home/pdam');
        }
    }

    /*pdam_reject*/
    public function pdam_reject($id = null)
    {
        $update = $this->db->set(['status_pdam' => 0])->where('id', $id)->update('booking');
        if ($update) {
            return $this->Alert('Pembayran PDAM Telah Dibatalkan', 'home/pdam');
        } else {
            return $this->Alert('Pembayran PDAM Gagal Dibatalkan', 'home/pdam');
        }
    }

    /* pembayaran */
    public function pembayaran()
    {
        if (empty($_SESSION['admin'])) {
            return $this->Alert('Permission Denied', 'home');
        } else {
            $data['title'] = "System Pembayaran";

            $this->load->view('home/layouts/header', $data);
            $this->load->view('home/pembayaran');
            $this->load->view('home/layouts/footer');
        }
    }

    // getKamarId
    public function getKamarId($id)
    {
        echo json_encode($this->db->get_where('kamar', ['id' => $id])->row_array());
    }

    // update_kamar
    public function update_kamar()
    {
        $data = [
            'harga' => $this->input->post('edit_harga'),
            'tingkat' => $this->input->post('edit_lantai'),
            'gender' => $this->input->post('edit_gender')
        ];
        $save = $this->db->set($data)->where('id', $this->input->post('edit_id'))->update('kamar');
        if ($save) {
            return $this->Alert('Update Kamar Berhasil', 'home/kamar');
        } else {
            return $this->Alert('Update Kamar Gagal', 'home/kamar');
        }
    }

    public function add_admin()
    {
        $data['title'] = "Management Admin";
        $data['data']  = $this->db->order_by('id', 'desc')->get('admin')->result_array();

        $this->load->view('home/layouts/header', $data);
        $this->load->view('home/admin', $data);
        $this->load->view('home/layouts/footer');
    }

    public function delete_admin($id)
    {
        $save = $this->db->delete('admin', ['id' => $id]);
        if ($save) {
            $this->Alert('Berhasil Menghapus Admin ID '.$id, 'home/add_admin');
        } else {
            $this->Alert('Kesalahan Menghapus Admin ID '.$id, 'home/add_admin');
        }
    }

    public function save_admin()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
            'password' => sha1($this->input->post('password')),
            'foto' => 'user.png',
            'admin' => 2
        ];
        $save = $this->db->insert('admin', $data);

        if ($save) {
            $this->Alert('Berhasil Menambahkan Admin', 'home/add_admin');
        } else {
            $this->Alert('Kesalahan Menambahkan Admin', 'home/add_admin');
        }
    }

    public function update_admin($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'no_telp' => $this->input->post('no_telp'),
        ];
        $save = $this->db->set($data)->where('id', $id)->update('admin');

        if ($save) {
            $this->Alert('Berhasil MengUpdate Admin', 'home/add_admin');
        } else {
            $this->Alert('Kesalahan MengUpdate Admin', 'home/add_admin');
        }
    }
}

<?php
class Admin extends Controller
{
    public function index()
    {
        session_start();
        if (!(isset($_SESSION['namauser']) && isset($_SESSION['namauser']) && $_SESSION['namauser'] != '' && $_SESSION['passuser'] != '')) {
            die("
		<script>window.alert('ANDA HARUS LOGIN UNTUK MENGAKSES HALAMAN INI');
		window.location=('http://localhost/rubah/admin/login')
		</script>
        ");
            exit;
        } else {
            $id_admin  = $_SESSION['iduser'];
            $nama_user = $_SESSION['namauser'];
        }

        $data['selamat'] = 'Welcome ' . $nama_user;
        $data['judul']   = 'Administrator';
        //$data['tabel'] = $this->model('Admin_model')->getWisataByKategori();
        $this->view('admin/HF_temp/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('admin/HF_temp/footer');
    }

    public function table()
    {
        session_start();
        if (empty($_SESSION['namauser']) and empty($_SESSION['passuser'])) {

            die("
		<script>window.alert('ANDA HARUS LOGIN UNTUK MENGAKSES HALAMAN INI');
		window.location=('http://localhost/quelo/admin/login')
		</script>
        ");
            exit;
        } else {
            $id_admin  = $_SESSION['iduser'];
            $nama_user = $_SESSION['namauser'];
        }

        $data['judul'] = 'Tabel wisata';
        $data['tabel'] = $this->model('Administrator')->getWisataByKategori();
        $this->view('admin/HF_temp/header', $data);
        $this->view('dashboard/tabel', $data);
        $this->view('admin/HF_temp/footer');
    }

    public function peta()
    {
        $data['judul'] = 'Peta';
        $this->view('admin/HF_temp/header', $data);
        $this->view('dashboard/peta');
        $this->view('admin/HF_temp/footer');
    }

    public function detail($id)
    {
        if (isset($id)) {
            $data['judul']  = 'Tempat Wisata';
            $data['detail'] = $this->model('Administrator')->getWisataById($id);
            $this->view('admin/HF_temp/header', $data);
            $this->view('dashboard/detail', $data);
            $this->view('admin/HF_temp/footer');
        }
    }

    public function tambah()
    {
        if ($this->model('Administrator')->tambah($_POST) > 0) {
            header('location:' . URL . 'admin/table');
            exit;
        }
    }
    public function login()
    {
        $data['masuk'] = '';
        $data['pesan'] = '';
        if (isset($_POST['login'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $data['masuk'] = $this->model('Administrator')->login_cek($username, $password);
            if ($data['masuk'] && count($data['masuk']) > 0 && password_verify($password, $data['masuk']['password'])) {
                session_start();
                $_SESSION['iduser']   = $data['masuk']['id'];
                $_SESSION['namauser'] = $data['masuk']['username'];
                $_SESSION['passuser'] = $data['masuk']['password'];

                $data['pesan'] = '<div class="alert alert-success" role="alert">
                <strong>Silahkan!</strong> masuk pak EKO.</div>';
                echo "<script>window.alert('LOGIN BERHASIL.. ANDA AKAN SEGERA KE HALAMAN UTAMA');
                window.location=('index')	</script>";
            } else {
                $data['pesan'] = '<div class="alert alert-danger" role="alert"><strong>Aaa Duuuh!</strong> Username dan Password-nya <strong>Salah</strong> </div>';
            }
        }
        $data['judul'] = 'Admin login';
        $data['masuk'];
        $this->view('admin/HF_temp/loginheader', $data);
        $this->view('admin/home/login', $data);
        $this->view('admin/HF_temp/loginfooter');
    }
    public function logout()
    {
        session_start();
        session_destroy();
        echo "<script>alert('Anda telah keluar dari halaman administrator'); window.location = 'login'</script>";
    }
}

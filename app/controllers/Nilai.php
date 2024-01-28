<?php
class Nilai extends Controller
{
    public function __construct()
    {
        // Pengecekan session login
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Nilai';
        $data['nilai'] = $this->model('NilaiModel')->getAllNilai();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('nilai/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Nilai';
        $data['matakuliah'] = $this->model('MatakuliahModel')->getAllMatakuliah();
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('nilai/create', $data);
        $this->view('templates/footer');
    }

    public function simpanNilai()
    {
        if ($this->model('NilaiModel')->tambahNilai($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/nilai');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/nilai');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Nilai';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $data['matakuliah'] = $this->model('MatakuliahModel')->getAllMatakuliah();
        $data['nilai'] = $this->model('NilaiModel')->getNilaiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('nilai/edit', $data);
        $this->view('templates/footer');
    }

    public function updateNilai()
    {
        if ($this->model('NilaiModel')->updateDataNilai($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/nilai');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/nilai');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('NilaiModel')->deleteNilai($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/nilai');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/nilai');
            exit;
        }
    }

    public function cari()
    {
        $data['title'] = 'Data Nilai';
        $data['nilai'] = $this->model('NilaiModel')->cariNilai();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('nilai/index', $data);
        $this->view('templates/footer');
    }
}

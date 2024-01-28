<?php
class Matakuliah extends Controller
{
    public function __construct()
    {
        // Pastikan aturan login sesuai dengan kebutuhan Anda
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Data Matakuliah';
        $data['matakuliah'] = $this->model('MatakuliahModel')->getAllMatakuliah();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('matakuliah/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Matakuliah';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('matakuliah/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('MatakuliahModel')->tambahMatakuliah($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/matakuliah');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/matakuliah');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Matakuliah';
        $data['matakuliah'] = $this->model('MatakuliahModel')->getMatakuliahById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('matakuliah/edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        if ($this->model('MatakuliahModel')->updateDataMatakuliah($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location:' . base_url . '/matakuliah');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location:' . base_url . '/matakuliah');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('MatakuliahModel')->deleteMatakuliah($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location:' . base_url . '/matakuliah');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/matakuliah');
            exit;
        }
    }
}

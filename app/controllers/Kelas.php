<?php
class Kelas extends Controller
{
    public function __construct()
    {
        // Tambahkan logika otentikasi sesuai kebutuhan
    }

    public function index()
    {
        $data['title'] = 'Data Kelas';
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kelas';
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $data['fakultas'] = $this->model('FakultasModel')->getAllFakultas();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/create', $data);
        $this->view('templates/footer');
    }

    public function simpanKelas()
    {
        if ($this->model('KelasModel')->tambahKelas($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
            header('location: ' . base_url . '/kelas/create');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/kelas/create');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kelas';
        $data['kelas'] = $this->model('KelasModel')->getKelasById($id);
        $data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
        $data['fakultas'] = $this->model('FakultasModel')->getAllFakultas();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kelas/edit', $data);
        $this->view('templates/footer');
    }

    public function updateKelas()
    {
        if ($this->model('KelasModel')->updateDataKelas($_POST) > 0) {
            Flasher::setMessage('Berhasil', 'diupdate', 'success');
            header('location: ' . base_url . '/kelas');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/kelas');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('KelasModel')->deleteKelas($id) > 0) {
            Flasher::setMessage('Berhasil', 'dihapus', 'success');
            header('location: ' . base_url . '/kelas');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/kelas');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Kelas';
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();
        $this->view('kelas/lihatlaporan', $data);
    }

    public function laporan()
    {
        $data['kelas'] = $this->model('KelasModel')->getAllKelas();
        $pdf = new FPDF('p', 'mm', 'A4');

        // Membuat halaman baru
        $pdf->AddPage();
        // Setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 14);
        // Mencetak string
        $pdf->Cell(190, 7, 'LAPORAN KELAS', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(40, 6, 'KelasID', 1);
        $pdf->Cell(50, 6, 'Nama_Kelas', 1);
        $pdf->Cell(40, 6, 'Nama_Mahasiswa', 1);
        $pdf->Cell(50, 6, 'Nama_Fakultas', 1);
        // Tambahkan kolom lain sesuai kebutuhan

        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);

        foreach ($data['kelas'] as $row) {
            $pdf->Cell(40, 6, $row['KelasID'], 1);
            $pdf->Cell(50, 6, $row['Nama_Kelas'], 1);
            $pdf->Cell(40, 6, $row['Nama_Mahasiswa'], 1);
            $pdf->Cell(50, 6, $row['Nama_Fakultas'], 1);
            // Tambahkan kolom lain sesuai kebutuhan
            $pdf->Ln();
        }

        $pdf->Output('I', 'Laporan Kelas.pdf', true);
    }

    public function laporanJumlahKelas()
    {
        $data['title'] = 'Laporan Jumlah Kelas';
        $data['jumlahKelas'] = $this->model('KelasModel')->getAllKelas();
        $data['jumlahMahasiswa'] = $this->model('MahasiswaModel')->getJumlahMahasiswaPerProgramStudi();

        $this->view('kelas/laporan_jk', $data);
    }
}

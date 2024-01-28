<?php
class KelasModel
{
    private $table = 'kelas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getKelasById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE KelasID=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKelas($data)
    {
        $query = "INSERT INTO kelas (Nama_Kelas, MahasiswaID, FakultasID) VALUES (:nama_kelas, :mahasiswa_id, :fakultas_id)";
        $this->db->query($query);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind('fakultas_id', $data['fakultas_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataKelas($data)
    {
        $query = "UPDATE kelas SET Nama_Kelas=:nama_kelas, MahasiswaID=:mahasiswa_id, FakultasID=:fakultas_id WHERE KelasID=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_kelas', $data['nama_kelas']);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind('fakultas_id', $data['fakultas_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteKelas($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE KelasID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getJumlahKelas()
    {
        $query = "SELECT ps.Nama, COUNT(m.MahasiswaID) as JumlahKelas 
        FROM programstudi ps
        LEFT JOIN mahasiswa m ON ps.MahasiswaID = m.MahasiswaID
        GROUP BY ps.Nama";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}

<?php
class NilaiModel
{
    private $table = 'nilai';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllNilai()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getNilaiById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE NilaiID=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahNilai($data)
    {
        $query = "INSERT INTO nilai (MahasiswaID, MataKuliahID, Nilai) VALUES (:mahasiswa_id, :matakuliah_id, :nilai)";
        $this->db->query($query);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind('matakuliah_id', $data['matakuliah_id']);
        $this->db->bind('nilai', $data['nilai']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataNilai($data)
    {
        $query = 'UPDATE nilai SET MahasiswaID=:mahasiswa_id, MataKuliahID=:matakuliah_id, Nilai=:nilai WHERE NilaiID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('mahasiswa_id', $data['mahasiswa_id']);
        $this->db->bind('matakuliah_id', $data['matakuliah_id']);
        $this->db->bind('nilai', $data['nilai']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteNilai($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE NilaiID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function cariNilai()
    {
        $key = $_POST['key'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE MahasiswaID LIKE :key OR MataKuliahID LIKE :key OR Nilai LIKE :key');
        $this->db->bind('key', "%$key%");
        return $this->db->resultSet();
    }
}

<?php

class MatakuliahModel
{
    private $table = 'matakuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMatakuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE MataKuliahID=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahMatakuliah($data)
    {
        $query = "INSERT INTO matakuliah(KodeMataKuliah, NamaMataKuliah, SKS, FakultasID) VALUES (:kode_matakuliah, :nama_matakuliah, :sks, :fakultas_id)";
        $this->db->query($query);
        $this->db->bind('kode_matakuliah', $data['kode_matakuliah']);
        $this->db->bind('nama_matakuliah', $data['nama_matakuliah']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('fakultas_id', $data['fakultas_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataMatakuliah($data)
    {
        $query = 'UPDATE matakuliah SET KodeMataKuliah=:kode_matakuliah, NamaMataKuliah=:nama_matakuliah, SKS=:sks, FakultasID=:fakultas_id WHERE MataKuliahID=:id';
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('kode_matakuliah', $data['kode_matakuliah']);
        $this->db->bind('nama_matakuliah', $data['nama_matakuliah']);
        $this->db->bind('sks', $data['sks']);
        $this->db->bind('fakultas_id', $data['fakultas_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteMatakuliah($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE MataKuliahID=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

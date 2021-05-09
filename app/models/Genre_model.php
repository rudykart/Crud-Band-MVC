<?php

class Genre_model
{
    private $table = 'genre';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllGenre()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function tambahDataGenre($data)
    {
        $query = "INSERT INTO genre VALUES ('', :nama_genre)";
        $this->db->query($query);
        $this->db->bind('nama_genre', $data['nama_genre']);

        $this->db->execute();

        return $this->db->rowCount(); // <-- buat di kembalikan ke di controllr Mahasiswa public function tambah()
    }

    public function updateDataGenre($data)
    {
        $query = "UPDATE genre SET nama_genre = :nama_genre WHERE id_genre = :id_genre";
        $this->db->query($query);
        $this->db->bind('id_genre', $data['id_genre']);
        $this->db->bind('nama_genre', $data['nama_genre']);

        $this->db->execute();

        return $this->db->rowCount(); // <-- buat di kembalikan ke di controllr Mahasiswa public function tambah()
    }

    public function hapusDataGenre($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_genre=:id_genre');
        $this->db->bind('id_genre', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
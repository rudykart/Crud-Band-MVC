<?php
class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBand()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' JOIN genre ON genre.id_genre = band.genre_id');
        return $this->db->resultSet();
    }

    public function getAllBandById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' JOIN genre ON genre.id_genre = band.genre_id WHERE id_band=:id_band');
        $this->db->bind('id_band', $id);
        return $this->db->resultSet();
    }

    public function tambahDataBand($data)
    {
        $query = "INSERT INTO band VALUES ('', :nama_band, :genre_id, :negara, '')";
        $this->db->query($query);
        $this->db->bind('nama_band', $data['nama_band']);
        $this->db->bind('genre_id', $data['genre_id']);
        $this->db->bind('negara', $data['negara']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBand($data)
    {
        $query = "UPDATE band SET nama_band=:nama_band, genre_id=:genre_id, negara=:negara WHERE id_band=:id_band";
        $this->db->query($query);
        $this->db->bind('id_band', $data['id_band']);
        $this->db->bind('genre_id', $data['genre_id']);
        $this->db->bind('nama_band', $data['nama_band']);
        $this->db->bind('negara', $data['negara']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBand($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_band=:id_band');
        $this->db->bind('id_band', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
<?php
class Band_model
{
    private $table = 'band';
    private $db;
    // private $upload;

    public function __construct()
    {
        // $this->upload = new Upload();
        $this->db = new Database;
    }

    public function upload()
    {
        $namaFile = $_FILES['foto_band']['name'];
        $ukuranFile = $_FILES['foto_band']['size'];
        $error = $_FILES['foto_band']['error'];
        $tmpName = $_FILES['foto_band']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
        		alert('pilih gambar terlebih dahulu!');
        	  </script>";
            return false;
        }

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
        		alert('yang anda upload bukan gambar!');
        	  </script>";
            return false;
        }

        // cek jika ukurannya terlalu besar
        if ($ukuranFile > 3000000) {
            echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
            return false;
        }

        // lolos pengecekan, gambar siap diupload
        // generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/img_band/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function hapusFoto($id)
    {
        $band = $this->getAllBandById($id);
        $foto = $band['foto_band'];
        $alamat_foto = 'img/img_band/';

        if ($foto != "") {
            if (file_exists($alamat_foto)) {
                # code...
                unlink($alamat_foto . $foto);
            }
        }
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
        return $this->db->single();
    }

    public function tambahDataBand($data)
    {

        // cek apakah user pilih gambar baru atau tidak
        if ($_FILES['foto_band']['error'] === 4) {
            $data['foto_band'] = "";
            echo "
			<script>
				alert('anda belum upload foto!');
			</script>
		";
        } else {
            $data['foto_band'] = $this->upload();
        }

        $query = "INSERT INTO band VALUES ('', :nama_band, :genre_id, :negara, :foto_band)";
        $this->db->query($query);
        $this->db->bind('nama_band', $data['nama_band']);
        $this->db->bind('genre_id', $data['genre_id']);
        $this->db->bind('negara', $data['negara']);
        $this->db->bind('foto_band', $data['foto_band']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBand($data)
    {
        $band = $this->getAllBandById($data['id_band']);
        $fotoLama = $band['foto_band'];

        // cek apakah user pilih gambar baru atau tidak
        if ($_FILES['foto_band']['error'] === 4) {
            $foto = $fotoLama;
        } else {

            $this->hapusFoto($data['id_band']);
            $foto = $this->upload();
        }

        $query = "UPDATE band SET nama_band=:nama_band, genre_id=:genre_id, negara=:negara, foto_band=:foto_band WHERE id_band=:id_band";
        $this->db->query($query);
        $this->db->bind('id_band', $data['id_band']);
        $this->db->bind('genre_id', $data['genre_id']);
        $this->db->bind('nama_band', $data['nama_band']);
        $this->db->bind('negara', $data['negara']);
        $this->db->bind('foto_band', $foto);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBand()
    {
        $key = $_POST['kata_kunci'];
        $this->db->query("SELECT * FROM band JOIN genre ON genre.id_genre = band.genre_id WHERE nama_band LIKE :kata_kunci OR negara LIKE :kata_kunci OR nama_genre LIKE :kata_kunci");
        $this->db->bind('kata_kunci', "%$key%");
        return $this->db->resultSet();
    }

    public function hapusDataBand($id)
    {
        $this->hapusFoto($id);
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_band=:id_band');
        $this->db->bind('id_band', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
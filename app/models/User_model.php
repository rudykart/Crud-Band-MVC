<?php
class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getAllUserById($id)
    {
        $this->db->query('SELECT * FROM user WHERE id_user = :id_user');
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }

    public function getAllUserByEmail($data)
    {
        $this->db->query('SELECT * FROM user WHERE email_user = :email_user');
        $this->db->bind('email_user', $data['email_user']);
        return $this->db->single();
    }

    public function loginUser($data)
    {
        if ($data['email_user'] == "" || $data['password_user'] == "") {
            return false;
        }

        $user = $this->getAllUserByEmail($data);

        if ($data['email_user'] == $user['email_user']) {
            if (password_verify($data['password_user'], $user['password_user'])) {
                $_SESSION['id_user'] = $user['id_user'];
            } else {
                return false;
            }
        }
        return $this->db->rowCount();
    }

    public function tambahDataUser($data)
    {
        $pass = $data['password_user'];
        $pass2 = $data['konfirmasi_password'];

        if ($pass != $pass2) {
            echo "<script>
				alert('Password Salah!')
		      </script>";
            return false;
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $query = "INSERT INTO user VALUES ('', :nama_user, :email_user, :password_user, '')";
        $this->db->query($query);
        $this->db->bind('nama_user', htmlspecialchars($data['nama_user']));
        $this->db->bind('email_user', htmlspecialchars($data['email_user']));
        $this->db->bind('password_user', htmlspecialchars($pass));
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataUser($id)
    {
        if ($id == $_SESSION['id_user']) {
            return false;
        }
        $this->hapusFoto($id);
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_user=:id_user');
        $this->db->bind('id_user', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function userLogout()
    {
        // session_start();
        session_destroy();
        header('location: ' . BASEURL . '/login');
    }

    public function cariUser()
    {
        $key = $_POST['kata_kunci'];
        $this->db->query("SELECT * FROM user WHERE nama_user LIKE :kata_kunci OR email_user LIKE :kata_kunci");
        $this->db->bind('kata_kunci', "%$key%");
        return $this->db->resultSet();
    }

    public function upload()
    {
        $namaFile = $_FILES['foto_user']['name'];
        $ukuranFile = $_FILES['foto_user']['size'];
        $error = $_FILES['foto_user']['error'];
        $tmpName = $_FILES['foto_user']['tmp_name'];

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

        move_uploaded_file($tmpName, 'img/img_user/' . $namaFileBaru);

        return $namaFileBaru;
    }

    public function hapusFoto($id)
    {
        $band = $this->getAllUserById($id);
        $foto = $band['foto_user'];
        $alamat_foto = 'img/img_user/';

        if ($foto != "") {
            if (file_exists($alamat_foto)) {
                # code...
                unlink($alamat_foto . $foto);
            }
        }
    }

    public function updateDataUser($data)
    {
        $user = $this->getAllUserById($data['id_user']);
        $fotoLama = $user['foto_user'];

        if ($data['password_user'] == "" || $data['konfirmasi_password'] == "") {
            $pass = $user['password_user'];
        } else if ($data['password_user'] == $data['konfirmasi_password']) {
            $pass = password_hash($data['password_user'], PASSWORD_DEFAULT);
        } else if ($data['password_user'] != $data['konfirmasi_password']) {
            $pass = $user['password_user'];
            echo "<script>
            alert('Password tidak sama!')
            </script>";
            header(BASEURL . '/profile');
            return false;
        }

        // cek apakah user pilih gambar baru atau tidak
        if ($_FILES['foto_user']['error'] === 4) {
            $foto = $fotoLama;
        } else {
            $this->hapusFoto($data['id_user']);
            $foto = $this->upload();
        }

        $query = "UPDATE user SET nama_user=:nama_user, email_user=:email_user, password_user=:password_user, foto_user=:foto_user WHERE id_user=:id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nama_user', $data['nama_user']);
        $this->db->bind('email_user', $data['email_user']);
        $this->db->bind('password_user', $pass);
        $this->db->bind('foto_user', $foto);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
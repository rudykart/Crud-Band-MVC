<?php

class Upload
{
    public function tambahFoto($namaFoto)
    {
        $namaFile = $_FILES[$namaFoto]['name'];
        $ukuranFile = $_FILES[$namaFoto]['size'];
        $error = $_FILES[$namaFoto]['error'];
        $tmpName = $_FILES[$namaFoto]['tmp_name'];

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

        $alamat = BASEURL . "/img/img_band/";

        move_uploaded_file($tmpName, $alamat . $namaFileBaru);

        return $namaFileBaru;
    }
}
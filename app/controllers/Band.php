<?php

class Band extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setFlash('Silahkan', 'Login', 'terlebih dahulu.', 'danger');
            header('location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Band';
        $data['band'] = $this->model('Band_model')->getAllBand();
        $data['genre'] = $this->model('Genre_model')->getAllGenre();
        $this->view('templates/header', $data);
        $this->view('band/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Daftar Band';
        $data['band'] = $this->model('Band_model')->cariBand();
        $data['genre'] = $this->model('Genre_model')->getAllGenre();
        $data['kata_kunci'] = $_POST['kata_kunci'];
        $this->view('templates/header', $data);
        $this->view('band/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Band_model')->tambahDataBand($_POST) > 0) {
            Flasher::setFlash('Band', 'Berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/band');
            exit;
        } else {
            Flasher::setFlash('Band', 'Gagal', 'ditambah', 'danger');
            header('Location: ' . BASEURL . '/band');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('Band_model')->updateDataBand($_POST) > 0) {
            Flasher::setFlash('Band', 'Berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/band');
            exit;
        } else {
            Flasher::setFlash('Band', 'Gagal', 'diupdate', 'danger');
            header('Location: ' . BASEURL . '/band');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Band_model')->hapusDataBand($id) > 0) {
            $this->model('Band_model')->getAllBandById($id);
            Flasher::setFlash('Band', 'Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/band');
            exit;
        } else {
            Flasher::setFlash('Band', 'Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/band');
            exit;
        }
    }
}
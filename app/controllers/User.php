<?php

class User extends Controller
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
        $data['title'] = 'Daftar User';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = $this->model('User_model')->cariUser();
        $data['kata_kunci'] = $_POST['kata_kunci'];
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            Flasher::setFlash('User', 'Berhasil', 'ditambah', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('Band', 'Gagal', 'ditambah', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function update()
    {
        if ($this->model('User_model')->updateDataUser($_POST) > 0) {
            Flasher::setFlash('User', 'Berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('User', 'Gagal', 'diupdate', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            Flasher::setFlash('User', 'Berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            Flasher::setFlash('User', 'Gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}